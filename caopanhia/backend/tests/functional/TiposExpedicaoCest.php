<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;
use Yii;

class TiposExpedicaoCest
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
    public function TiposExpedicaoTest(FunctionalTester $I)
    {
        $I->amOnRoute('/tiposexpedicao/index');
        $I->see('Métodos de expedição', 'h1');

        $I->click('Adicionar um novo método');
        $I->see('Adicionar método de expedição', 'h1');

        $I->fillField('Designação', 'teste');
        $I->fillField('Custo', 10);
        $I->fillField('Duração em dias', 5);
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/tiposexpedicao/index');
        $I->see('teste', 'td');
        $I->see('5 dias', 'td');
        $I->see('10.00 €', 'td');
        $I->see('sim', 'td');
    }

    public function CreateWithEmptyFieldsTest(FunctionalTester $I)
    {
        $I->amOnRoute('/tiposexpedicao/index');
        $I->see('Métodos de expedição', 'h1');

        $I->click('Adicionar um novo método');
        $I->see('Adicionar método de expedição', 'h1');

        $I->fillField('Designação', '');
        $I->fillField('Custo', '');
        $I->fillField('Duração em dias', '');
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/tiposexpedicao/create');
        $I->see('Designacao cannot be blank.');
        $I->see('Custo cannot be blank.');
        $I->see('Tempo Medio cannot be blank.');
    }
}
