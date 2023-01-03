<?php


namespace common\tests\Unit;

use common\models\Caes;
use common\models\Racas;
use common\models\Userprofile;
use common\tests\UnitTester;
use Yii;

class CaoDBCrudTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }


    // tests
    public function testDogsValidationRules()
    {
        $model = new Caes();

        //nome
        $model->nome = "tooLongNameeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
        $this->assertFalse($model->validate(['nome']));

        //genero
        $model->genero = "tooLongGenero";
        $this->assertFalse($model->validate(['genero']));

        //microship
        $model->microship = "tooLongMicroshipStringggggggg";
        $this->assertFalse($model->validate(['microship']));

        //castrado
        $model->castrado = "tooLongCastradoStringggggggg";
        $this->assertFalse($model->validate(['castrado']));

        //adotado
        $model->adotado = "simNao";
        $this->assertFalse($model->validate(['adotado']));

    }

    public function testDogCrud()
    {
        //CREATE 2 USER PROFILES AND 2 RAÇAS
        $up1 = new Userprofile();
        $up1->nome = 'up1';
        $up1->morada = 'morada';
        $up1->codigoPostal = '1111-111';
        $up1->genero = 'genero';
        $up1->nif = '111111111';
        $up1->contacto = '961111111';
        $up1->save();

        $up2 = new Userprofile();
        $up2->nome = 'up2';
        $up2->morada = 'morada';
        $up2->codigoPostal = '1111-111';
        $up2->genero = 'genero';
        $up2->nif = '222222222';
        $up2->contacto = '961111111';
        $up2->save();

        $r1 = new Racas();
        $r1->designacao = 'designacao';
        $r1->pontos = 10;
        $r1->status=10;
        $r1->save();

        $r2 = new Racas();
        $r2->designacao = 'designacao';
        $r2->pontos = 10;
        $r2->status=10;
        $r2->save();


        //CREATE
        $model = new Caes();

        $model->nome = 'NomeCao';
        $model->anoNascimento = 2010;
        $model->genero = 'macho';
        $model->microship = 'sim';
        $model->castrado = 'sim';
        $model->pedidoConsulta = 0;
        $model->adotado = 'nao';
        $model->idUserProfile = $up1->id;
        $model->idRaca = $r1->id;

        $this->assertTrue($model->save());

        //READ

        $cao = Caes::findOne($model->id);
        $this->assertCount(1, [$cao]);
        $this->assertEquals('NomeCao', $cao->nome);
        $this->assertEquals(2010, $cao->anoNascimento);
        $this->assertEquals('macho', $cao->genero);
        $this->assertEquals('sim', $cao->microship);
        $this->assertEquals('sim', $cao->castrado);
        $this->assertEquals(0, $cao->pedidoConsulta);
        $this->assertEquals('nao', $cao->adotado);
        $this->assertEquals($up1->id, $cao->idUserProfile);
        $this->assertEquals($r1->id, $cao->idRaca);

        //UPDATE

        $cao->nome = 'NomeCaoUpdated';
        $cao->anoNascimento = 2020;
        $cao->genero = 'femea';
        $cao->microship = 'nao';
        $cao->castrado = 'nao';
        $cao->pedidoConsulta = 1;
        $cao->adotado = 'sim';
        $cao->idUserProfile = $up2->id;
        $cao->idRaca = $r2->id;
        $this->assertTrue($cao->save());

        $updatedCao = Caes::findOne($cao->id);
        $this->assertEquals('NomeCaoUpdated', $updatedCao->nome);
        $this->assertEquals(2020, $updatedCao->anoNascimento);
        $this->assertEquals('femea', $updatedCao->genero);
        $this->assertEquals('nao', $updatedCao->microship);
        $this->assertEquals('nao', $updatedCao->castrado);
        $this->assertEquals(1, $updatedCao->pedidoConsulta);
        $this->assertEquals('sim', $updatedCao->adotado);
        $this->assertEquals($up2->id, $updatedCao->idUserProfile);
        $this->assertEquals($r2->id, $updatedCao->idRaca);

        //DELETE

        $idCao = $updatedCao->id;
        $updatedCao->delete();
        $deletedCao = Caes::findOne($idCao);
        $this->assertNull($deletedCao);

        //DELETE USER PROFILES AND RACAS
        $up1->delete();
        $up2->delete();
        $r1->delete();
        $r2->delete();
    }
}
