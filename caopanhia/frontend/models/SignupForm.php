<?php

namespace frontend\models;

use backend\models\Auth_assignment;
use common\models\Distritos;
use common\models\Userprofile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $nome;
    public $morada;
    public $codigoPostal;
    public $genero;
    public $nif;
    public $contacto;
    public $idDistrito;
    public $formacao;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['nome', 'morada', 'codigoPostal', 'genero', 'nif', 'contacto'], 'required'],
            [['nif', 'contacto', 'idDistrito'], 'integer'],
            [['nome', 'morada', 'formacao'], 'string', 'max' => 255],
            [['codigoPostal'], 'string', 'max' => 8],
            [['genero'], 'string', 'max' => 10],
            [['nif'], 'unique'],
            [['idDistrito'], 'exist', 'skipOnError' => true, 'targetClass' => Distritos::class, 'targetAttribute' => ['idDistrito' => 'id']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup($role)
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;

        $user->save();

        $listaDistritosAtivos = Distritos::find()->where(['status' => 10])->all();
        $distritoEscolhido = $listaDistritosAtivos[$this->idDistrito];
        $distrito = Distritos::find()->where(['designacao' => $distritoEscolhido->designacao])->one();



        $userProfile = new Userprofile();
        $userProfile->nome = $this->nome;
        $userProfile->morada = $this->morada;
        $userProfile->codigoPostal = $this->codigoPostal;
        $userProfile->genero = $this->genero;
        $userProfile->nif = $this->nif;
        $userProfile->contacto = $this->contacto;
        $userProfile->idDistrito = $distrito->id;
        $userProfile->idUser = $user->id;
        if ($role == 'vet'){
            $userProfile->formacao = $this->formacao;
        }

        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole($role), $user->id);



        return $userProfile->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
