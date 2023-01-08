<?php

namespace frontend\tests\acceptance;

use common\models\User;
use frontend\tests\AcceptanceTester;
use Yii;
use yii\helpers\Url;

class HomeCest
{

    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));

        $I->see('Login', 'h1');
    }
}
