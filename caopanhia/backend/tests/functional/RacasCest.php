<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;
use Yii;

class RacasCest
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
    public function RacasTest(FunctionalTester $I)
    {
        $I->amOnRoute('/racas/index');
        $I->see('Raças', 'h1');

        $I->click('Adicionar raça');
        $I->see('Adicionar raça', 'h1');

        $I->fillField('Designacao', 'teste');
        $I->fillField('Pontos', 10);
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/racas/index');
        $I->see('teste', 'td');
        $I->see('10', 'td');
    }

    public function createWithEmptyFieldsTest(FunctionalTester $I)
    {
        $I->amOnRoute('/racas/index');
        $I->see('Raças', 'h1');

        $I->click('Adicionar raça');
        $I->see('Adicionar raça', 'h1');

        $I->fillField('Designacao', '');
        $I->fillField('Pontos', '');
        $I->click('Guardar');

        $I->seeCurrentUrlEquals('/index-test.php/racas/create');
        $I->see('Designacao cannot be blank.');
        $I->see('Pontos cannot be blank.');
    }
}
