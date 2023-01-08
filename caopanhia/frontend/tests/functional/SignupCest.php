<?php

namespace frontend\tests\functional;

use common\models\Distritos;
use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before()
    {
        $distrito = new Distritos();
        $distrito->designacao = 'teste';
        $distrito->status = 10;
        $distrito->save();
    }



    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
        $I->see('Sign Up', 'h1');

        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'utilizador',
            'SignupForm[email]' => 'userEmail@mail.pt',
            'SignupForm[password]' => 'userPassword',
            'SignupForm[nome]' => 'userTest',
            'SignupForm[genero]' => 'masculino',
            'SignupForm[morada]' => 'test street',
            'SignupForm[codigoPostal]' => '1111-111',
            'SignupForm[idDistrito]' => 0,
            'SignupForm[nif]' => '123456789',
            'SignupForm[contacro]' => '987654321',
        ]);

        $I->dontSee('Error');

    }
}
