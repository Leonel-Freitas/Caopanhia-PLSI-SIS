<?php


namespace common\tests\Unit;

use common\models\Distritos;
use common\models\User;
use common\models\Userprofile;
use common\tests\UnitTester;

class UserProfileDbCrudTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testUserProfileValidationRules()
    {
        $model = new Userprofile();

        //nif
        $model->nif = "nif";
        $this->assertFalse($model->validate(['nif']));

        //contacto
        $model->contacto = "contacto";
        $this->assertFalse($model->validate(['contacto']));

        //user
        $model->idUser = "user";
        $this->assertFalse($model->validate(['idUser']));

        //nome
        $model->nome = "tooLongNomeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
        $this->assertFalse($model->validate(['nome']));

        //morada
        $model->morada = "tooLongMoradaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($model->validate(['morada']));

        //formacao
        $model->formacao = "tooLongFormacaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo";
        $this->assertFalse($model->validate(['formacao']));

        //codigo postal
        $model->codigoPostal = "1111-1111";
        $this->assertFalse($model->validate(['codigoPostal']));

        //genero
        $model->genero = "tooLongGeneroooooooo";
        $this->assertFalse($model->validate(['genero']));
    }

    public function testUserProfileCrud(){
        //CREATE 2 DISTRITOS AND 2 USER
        $d1 = new Distritos();
        $d1->designacao = 'd1';
        $d1->save();

        $d2 = new Distritos();
        $d2->designacao = 'd2';
        $d2->save();

        $u1 = new User();
        $u1->username = 'u1';
        $u1->email = 'u1@mail.pt';
        $u1->setPassword('userPassword');
        $u1->generateAuthKey();
        $u1->generateEmailVerificationToken();
        $u1->status = 10;
        $u1->save();

        $u2 = new User();
        $u2->username = 'u2';
        $u2->email = 'u2@mail.pt';
        $u2->setPassword('userPassword');
        $u2->generateAuthKey();
        $u2->generateEmailVerificationToken();
        $u2->status = 10;
        $u2->save();

        //CREATE
        $model = new Userprofile();

        $model->nome = 'user';
        $model->morada = 'morada';
        $model->codigoPostal= '1111-111';
        $model->genero = 'genero';
        $model->nif = '111111111';
        $model->contacto = '961111111';
        $model->formacao = 'formacao';
        $model->imagem = 'imagem.jpg';
        $model->idUser = $u1->id;
        $model->idDistrito = $d1->id;

        $this->assertTrue($model->save());

        //READ

        $user = Userprofile::findOne($model->id);
        $this->assertCount(1, [$user]);
        $this->assertEquals('user', $user->nome);
        $this->assertEquals('morada', $user->morada);
        $this->assertEquals('1111-111', $user->codigoPostal);
        $this->assertEquals('genero', $user->genero);
        $this->assertEquals('111111111', $user->nif);
        $this->assertEquals('961111111', $user->contacto);
        $this->assertEquals('formacao', $user->formacao);
        $this->assertEquals('imagem.jpg', $user->imagem);
        $this->assertEquals($u1->id, $user->idUser);
        $this->assertEquals($d1->id, $user->idDistrito);

        //UPDATE

        $user->nome = 'userUpdated';
        $user->morada = 'morada editada';
        $user->codigoPostal= '2222-222';
        $user->genero = 'masculino';
        $user->nif = '222222222';
        $user->contacto = '962222222';
        $user->formacao = 'formacao editada';
        $user->imagem = 'imagem.png';
        $user->idUser = $u2->id;
        $user->idDistrito = $d2->id;
        $this->assertTrue($user->save());

        $updatedUser = Userprofile::findOne($user->id);
        $this->assertEquals('userUpdated', $updatedUser->nome);
        $this->assertEquals('morada editada', $updatedUser->morada);
        $this->assertEquals('2222-222', $updatedUser->codigoPostal);
        $this->assertEquals('masculino', $updatedUser->genero);
        $this->assertEquals('222222222', $updatedUser->nif);
        $this->assertEquals('962222222', $updatedUser->contacto);
        $this->assertEquals('formacao editada', $updatedUser->formacao);
        $this->assertEquals('imagem.png', $updatedUser->imagem);
        $this->assertEquals($u2->id, $updatedUser->idUser);
        $this->assertEquals($d2->id, $updatedUser->idDistrito);

        //DELETE

        $idUser = $updatedUser->id;
        $updatedUser->delete();
        $deletedUser = Userprofile::findOne($idUser);
        $this->assertNull($deletedUser);

        //DELETE USERS AND DISTRITOS
        $u1->delete();
        $u2->delete();
        $d1->delete();
        $d2->delete();
    }
}
