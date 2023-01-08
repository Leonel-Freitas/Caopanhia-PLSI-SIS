<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;
use Yii;

class TiposPagamentoCest
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
    public function TiposPagamentoTest(FunctionalTester $I)
    {
        $I->amOnRoute('/tipospagamento/index');
        $I->see('Métodos de pagamento', 'h1');

        $I->click('Adicionar um novo método');
        $I->see('Adicionar método de pagamento', 'h1');

        $I->fillField('Designacao', 'teste');
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/tipospagamento/index');
        $I->see('teste', 'td');
    }

    public function CreateWithEmptyFieldTest(FunctionalTester $I)
    {
        $I->amOnRoute('/tipospagamento/index');
        $I->see('Métodos de pagamento', 'h1');

        $I->click('Adicionar um novo método');
        $I->see('Adicionar método de pagamento', 'h1');

        $I->fillField('Designacao', '');
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/tipospagamento/create');
        $I->see('Designacao cannot be blank.');
    }
}
