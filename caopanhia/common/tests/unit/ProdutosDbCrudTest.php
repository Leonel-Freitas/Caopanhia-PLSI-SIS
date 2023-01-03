<?php


namespace common\tests\Unit;

use common\models\Categorias;
use common\models\Produtos;
use common\tests\UnitTester;

class ProdutosDbCrudTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testProductsValidationRules()
    {
        $model = new Produtos();

        //desginacao
        $model->designacao = "tooLongDesignacaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo";
        $this->assertFalse($model->validate(['designacao']));

        //valor
        $model->valor = "valor";
        $this->assertFalse($model->validate(['valor']));

        //stock
        $model->stock = "stock";
        $this->assertFalse($model->validate(['stock']));

        //idCategoria
        $model->idCategoria = "categoria";
        $this->assertFalse($model->validate(['idCategoria']));

        //status
        $model->status = "valido";
        $this->assertFalse($model->validate(['status']));

        //descricao
        $model->descricao = "tooLongDescricaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo";
        $this->assertFalse($model->validate(['descricao']));

    }

    public function testProductCrud(){
        //CREATE 2 CATEGORIAS
        $c1 = new Categorias();
        $c1->designacao = 'c1';
        $c1->save();

        $c2 = new Categorias();
        $c2->designacao = 'c2';
        $c2->save();

        //CREATE
        $model = new Produtos();
        $model->imagem = 'imagem.jpg';
        $model->designacao = 'produto';
        $model->valor = 10;
        $model->stock = 10;
        $model->status = 10;
        $model->descricao = 'descricao do produto';
        $model->idCategoria = $c1->id;

        $this->assertTrue($model->save());

        //READ
        $produto = Produtos::findOne($model->id);
        $this->assertCount(1, [$produto]);
        $this->assertEquals('imagem.jpg', $produto->imagem);
        $this->assertEquals('produto', $produto->designacao);
        $this->assertEquals(10, $produto->valor);
        $this->assertEquals(10, $produto->stock);
        $this->assertEquals(10, $produto->status);
        $this->assertEquals('descricao do produto', $produto->descricao);
        $this->assertEquals($c1->id, $produto->idCategoria);

        //UPDATE

        $produto->imagem = 'imagem.png';
        $produto->designacao = 'produtoEditado';
        $produto->valor = 20;
        $produto->stock = 20;
        $produto->status = 20;
        $produto->descricao = 'descricao do produto editado';
        $produto->idCategoria = $c2->id;
        $this->assertTrue($produto->save());

        $updatedProduto = Produtos::findOne($produto->id);
        $this->assertEquals('imagem.png', $updatedProduto->imagem);
        $this->assertEquals('produtoEditado', $updatedProduto->designacao);
        $this->assertEquals(20, $updatedProduto->valor);
        $this->assertEquals(20, $updatedProduto->stock);
        $this->assertEquals(20, $updatedProduto->status);
        $this->assertEquals('descricao do produto editado', $updatedProduto->descricao);
        $this->assertEquals($c2->id, $updatedProduto->idCategoria);

        //DELETE

        $idProduto = $updatedProduto->id;
        $updatedProduto->delete();
        $deletedProduto = Produtos::findOne($idProduto);
        $this->assertNull($deletedProduto);

        //DELETE CATEGORIAS
        $c1->delete();
        $c2->delete();
    }
}
