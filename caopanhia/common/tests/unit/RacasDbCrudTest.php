<?php


namespace common\tests\Unit;

use common\models\Racas;
use common\tests\UnitTester;

class RacasDbCrudTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testRacasValidationRules()
    {
        $model = new Racas();

        //pontos
        $model->pontos = "pontos";
        $this->assertFalse($model->validate(['pontos']));

        //status
        $model->status = "status";
        $this->assertFalse($model->validate(['status']));

        //designacao
        $model->designacao = "tooLongDesignacaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo";
        $this->assertFalse($model->validate(['designacao']));

    }

    public function testRacasCrud(){
        //CREATE
        $model = new Racas();
        $model->designacao = 'raca';
        $model->pontos = 10;
        $model->status = 10;

        $this->assertTrue($model->save());

        //READ

        $raca = Racas::findOne($model->id);
        $this->assertCount(1, [$raca]);
        $this->assertEquals('raca', $raca->designacao);
        $this->assertEquals(10, $raca->pontos);
        $this->assertEquals(10, $raca->status);

        //UPDATE

        $raca->designacao = 'raca editada';
        $raca->pontos = 20;
        $raca->status = 20;
        $this->assertTrue($raca->save());

        $updatedRaca = Racas::findOne($raca->id);
        $this->assertEquals('raca editada', $updatedRaca->designacao);
        $this->assertEquals(20, $updatedRaca->pontos);
        $this->assertEquals(20, $updatedRaca->status);

        //DELETE

        $idRaca = $updatedRaca->id;
        $updatedRaca->delete();
        $deletedRaca = Racas::findOne($idRaca);
        $this->assertNull($deletedRaca);
    }
}
