<?php


namespace frontend\tests\Functional;

use frontend\tests\FunctionalTester;

class ViewProfileCestTest extends \Codeception\Test\Unit
{

    /*protected function _before()
    {
    }*/

    // tests
    public function testViewProfile(FunctionalTester $I)
    {
        $I->amOnRoute('userprofile/view');
        $I->see('Informação Pessoal', 'h6');
    }
}
