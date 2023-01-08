<?php


namespace backend\tests\Functional;

use backend\models\Auth_assignment;
use backend\tests\FunctionalTester;
use common\models\User;
use Yii;

class DistritosCest
{
    public function _before(FunctionalTester $I)
    {
        //Create user
        $user = new User();
        $user->username = 'user';
        $user->email = 'user@mail.pt';
        $user->setPassword('userPassword');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;
        $user->save();
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole('admin'), $user->id);

        //login on backend
        $I->amOnRoute('/site/login');
        $I->fillField('Username:', 'user');
        $I->fillField('Password:', 'userPassword');
        $I->click('login-button');
    }

    public function _after(){
        $user = User::find()->one();
        $user->delete();
    }

    // tests
    public function DistritoTest(FunctionalTester $I)
    {
        $I->amOnRoute('/distritos/index');
        $I->see('Lista de distritos', 'h1');

        $I->click('Adicionar distrito');
        $I->see('Adicionar distrito', 'h1');

        $I->fillField('Designacao', 'teste');
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/distritos/index');
        $I->see('teste', 'td');
    }
}
