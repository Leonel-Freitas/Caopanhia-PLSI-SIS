<?php


namespace frontend\tests\Acceptance;

use common\models\User;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class ViewProfileCest
{

    public function _after(AcceptanceTester $I)
    {
        //Delete user
        $user = User::find()->one();
        if ($user != null)
            $user->delete();
    }

    // tests
    public function ViewUserProfileTest(AcceptanceTester $I)
    {
        //Aceder ao sistema
        $I->amOnPage(Url::toRoute('/site/login'));
        //Criar conta no sistema
        $I->click('Crie agora');

        $I->fillField('Username', 'user');
        $I->fillField('Email', 'email@mail.pt');
        $I->fillField('Password', 'userPassword');
        $I->fillField('Nome', 'nomeUser');
        $I->fillField('Morada', 'moradaUser');
        $I->fillField('Codigo Postal', '1234-123');
        $I->fillField('Nif', '123456789');
        $I->fillField('Contacto', '987654321');
        $I->click('#signup-button');

        $I->wait(5);

        //Fazer login com a conta criada
        $I->fillField('Username', 'user');
        $I->fillField('Password', 'userPassword');
        $I->click('#login-button');

        $I->wait(5);

        //Verificar que o utilizador entrou no sistema
        $I->see('CÃOPANHIA');
        $I->see('O teu melhor amigo');

        //Aceder aos dados do utilizador
        $I->click('.buton.navbar-toggler-icon');
        $I->click('Perfil');

        $I->wait(3);

        //Verificar os dados do utilizador
        $I->see('Informação Pessoal');
        $I->see('Email');
        $I->see('Contacto');
        $I->see('Genero');
        $I->see('NIF');
        $I->see('Morada');
        $I->see('Codigo Postal');
        $I->see('Distrito');
    }
}
