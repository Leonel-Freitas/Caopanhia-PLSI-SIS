<?php


namespace common\tests\Unit;

use common\models\Caes;
use common\models\Consultas;
use common\models\Marcacoesveterinarias;
use common\models\Racas;
use common\models\Userprofile;
use common\tests\UnitTester;

class MarcacoesDbCrudTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testAppointmentsValidationRules()
    {
        $model = new Marcacoesveterinarias();

        //cliente
        $model->idClient = 'cliente';
        $this->assertFalse($model->validate(['idClient']));

        //veterinario
        $model->idVet = 'veterinario';
        $this->assertFalse($model->validate(['idVet']));

        //cao
        $model->idCao = 'cao';
        $this->assertFalse($model->validate(['idCao']));

        //consulta
        $model->idConsulta = 'consulta';
        $this->assertFalse($model->validate(['idConsulta']));

    }

    public function testAppointmentCrud(){
        //CREATE 2 VET, 2 CLIENT, 1 RACA, 2 CAES AND 2 CONSULTAS
            //vets
        $vet1 = new Userprofile();
        $vet1->nome = 'vet1';
        $vet1->morada = 'morada';
        $vet1->codigoPostal = '1111-111';
        $vet1->genero = 'genero';
        $vet1->nif = '111111111';
        $vet1->contacto = '961111111';
        $vet1->save();

        $vet2 = new Userprofile();
        $vet2->nome = 'vet2';
        $vet2->morada = 'morada';
        $vet2->codigoPostal = '1111-111';
        $vet2->genero = 'genero';
        $vet2->nif = '222222222';
        $vet2->contacto = '961111111';
        $vet2->save();

            //clients
        $client1 = new Userprofile();
        $client1->nome = 'client1';
        $client1->morada = 'morada';
        $client1->codigoPostal = '1111-111';
        $client1->genero = 'genero';
        $client1->nif = '333333333';
        $client1->contacto = '961111111';
        $client1->save();

        $client2 = new Userprofile();
        $client2->nome = 'client2';
        $client2->morada = 'morada';
        $client2->codigoPostal = '1111-111';
        $client2->genero = 'genero';
        $client2->nif = '444444444';
        $client2->contacto = '961111111';
        $client2->save();

            //raca
        $r1 = new Racas();
        $r1->designacao = 'designacao';
        $r1->pontos = 10;
        $r1->status=10;
        $r1->save();

            //caes
        $cao1 = new Caes();
        $cao1->nome = 'cao1';
        $cao1->anoNascimento = 2020;
        $cao1->genero = 'macho';
        $cao1->microship = 'sim';
        $cao1->castrado = 'sim';
        $cao1->idUserProfile = $client1->id;
        $cao1->idRaca = $r1->id;
        $cao1->save();

        $cao2 = new Caes();
        $cao2->nome = 'cao2';
        $cao2->anoNascimento = 2022;
        $cao2->genero = 'femea';
        $cao2->microship = 'nao';
        $cao2->castrado = 'nao';
        $cao2->idUserProfile = $client1->id;
        $cao2->idRaca = $r1->id;
        $cao2->save();

            //consultas
        $c1 = new Consultas();
        $c1->tratamento = 'a defenir';
        $c1->diagonostico = 'a defenir';
        $c1->notas = 'a defenir';
        $c1->save();

        $c2 = new Consultas();
        $c2->tratamento = 'a defenir';
        $c2->diagonostico = 'a defenir';
        $c2->notas = 'a defenir';
        $c2->save();

        //CREATE
        $model = new Marcacoesveterinarias();

        $model->data = '2022-12-20';
        $model->hora = '12:00:00';
        $model->idClient = $client1->id;
        $model->idVet = $vet1->id;
        $model->idCao = $cao1->id;
        $model->idConsulta = $c1->id;

        $this->assertTrue($model->save());

        //READ
        $marcacao = Marcacoesveterinarias::findOne($model->id);
        $this->assertCount(1, [$marcacao]);
        $this->assertEquals('2022-12-20', $marcacao->data);
        $this->assertEquals('12:00:00', $marcacao->hora);
        $this->assertEquals($client1->id, $marcacao->idClient);
        $this->assertEquals($vet1->id, $marcacao->idVet);
        $this->assertEquals($cao1->id, $marcacao->idCao);
        $this->assertEquals($c1->id, $marcacao->idConsulta);


        //UPDATE

        $marcacao->data = '2022-11-20';
        $marcacao->hora = '22:00:00';
        $marcacao->idClient = $client2->id;
        $marcacao->idVet = $vet2->id;
        $marcacao->idCao = $cao2->id;
        $marcacao->idConsulta = $c2->id;
        $this->assertTrue($marcacao->save());

        $updatedMarcacao = Marcacoesveterinarias::findOne($marcacao->id);
        $this->assertEquals('2022-11-20', $updatedMarcacao->data);
        $this->assertEquals('22:00:00', $updatedMarcacao->hora);
        $this->assertEquals($client2->id, $updatedMarcacao->idClient);
        $this->assertEquals($vet2->id, $updatedMarcacao->idVet);
        $this->assertEquals($cao2->id, $updatedMarcacao->idCao);
        $this->assertEquals($c2->id, $updatedMarcacao->idConsulta);

        //DELETE

        $idMarcacao = $updatedMarcacao->id;
        $updatedMarcacao->delete();
        $deletedMarcacao = Marcacoesveterinarias::findOne($idMarcacao);
        $this->assertNull($deletedMarcacao);

        //DELETE VETS, CLIENTS, RACA, CAES AND CONSULTAS
        $cao1->delete();
        $cao2->delete();
        $r1->delete();
        $vet1->delete();
        $vet2->delete();
        $client1->delete();
        $client2->delete();
        $c1->delete();
        $c2->delete();
    }
}
