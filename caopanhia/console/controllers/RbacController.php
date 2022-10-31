<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //PERMISSOES

        //Utilizadores
        //Criar um utilizador
        $createUserProfile = $auth->createPermission('createUserProfile');
        $createUserProfile->description = 'Create a new user profile';
        $auth->add($createUserProfile);

        //Visualizar os dados de um utilizador
        $readUserProfile = $auth->createPermission('readUserProfile');
        $readUserProfile->description = 'Read a user profile';
        $auth->add($readUserProfile);

        //Editar os dados de um utilizador
        $updateUserProfile = $auth->createPermission('updateUserProfile');
        $updateUserProfile->description = 'Update a user profile';
        $auth->add($updateUserProfile);

        //Eliminar/Desativar um utilizador
        $deleteUserProfile = $auth->createPermission('deleteUserProfile');
        $deleteUserProfile->description = 'Delete a user profile';
        $auth->add($deleteUserProfile);



        //Caes
        //Criar um cao
        $createDog = $auth->createPermission('createDog');
        $createDog->description = 'Create a new dog';
        $auth->add($createDog);

        //Visualizar os dados de um cao
        $readDog = $auth->createPermission('readDog');
        $readDog->description = 'Read a dogs details';
        $auth->add($readDog);

        //Editar os dados de um cao
        $updateDog = $auth->createPermission('updateDog');
        $updateDog->description = 'Update a dogs details';
        $auth->add($updateDog);

        //Eliminar um cao
        $deleteDog = $auth->createPermission('deleteDog');
        $deleteDog->description = 'Delete a dog profile';
        $auth->add($deleteDog);



        //Produtos
        //Criar um produto
        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create a new product';
        $auth->add($createProduct);

        //Visualizar os dados de um produto
        $readProduct = $auth->createPermission('readProduct');
        $readProduct->description = 'Read a product details';
        $auth->add($readProduct);

        //Editar os dados de um produto
        $updateProduct = $auth->createPermission('updateProduct');
        $updateProduct->description = 'Update a product details';
        $auth->add($updateProduct);

        //Eliminar um produto
        $deleteProduct = $auth->createPermission('deleteProduct');
        $deleteProduct->description = 'Delete a product';
        $auth->add($deleteProduct);



        //Carrinho
        //Adicionar produtos a um carrinho
        $createShopCar = $auth->createPermission('createShopCar');
        $createShopCar->description = 'Add a product to shop car';
        $auth->add($createShopCar);

        //Visualizar produtos no carrinho
        $readShopCar = $auth->createPermission('readShopCar');
        $readShopCar->description = 'See the shop car';
        $auth->add($readShopCar);

        //Editar dados de um produto no carrinho (ex quantidade)
        $updateShopCar = $auth->createPermission('updateShopCar');
        $updateShopCar->description = 'Update a product details on shop car';
        $auth->add($updateShopCar);

        //Remover um produto do carrinho
        $deleteShopCar = $auth->createPermission('deleteShopCar');
        $deleteShopCar->description = 'Remove a product from shop car';
        $auth->add($deleteShopCar);



        //Encomenda
        //Criar uma encomenda
        $createPackage = $auth->createPermission('createPackage');
        $createPackage->description = 'create a new package';
        $auth->add($createPackage);

        //Visualizar encomendas
        $readPackage = $auth->createPermission('readPackage');
        $readPackage->description = 'See orders';
        $auth->add($readPackage);

        //Editar dados de uma encomenda
        $updatePackage = $auth->createPermission('updatePackage');
        $updatePackage->description = 'Update a order details';
        $auth->add($updatePackage);



        //Consultas do veterinário
        //Criar uma consulta
        $createAppointment = $auth->createPermission('createAppointment');
        $createAppointment->description = 'create a new appointment';
        $auth->add($createAppointment);

        //Visualizar consulta
        $readAppointment = $auth->createPermission('readAppointment');
        $readAppointment->description = 'view appointments';
        $auth->add($readAppointment);

        //Editar detalhes de uma consulta
        $updateAppointment = $auth->createPermission('updateAppointment');
        $updateAppointment->description = 'Update a appointment details';
        $auth->add($updateAppointment);



        //District
        //Criar um distrito
        $createDistrict = $auth->createPermission('createDistrict');
        $createDistrict->description = 'Create a new district';
        $auth->add($createDistrict);

        //Editar os dados de um distrito
        $updateDistrict = $auth->createPermission('updateDistrict');
        $updateDistrict->description = 'Update a district details';
        $auth->add($updateDistrict);

        //Eliminar um distrito
        $deleteDistrict = $auth->createPermission('deleteDistrict');
        $deleteDistrict->description = 'Delete a district';
        $auth->add($deleteDistrict);



        //Raça
        //Criar uma raça
        $createBreed = $auth->createPermission('createBreed');
        $createBreed->description = 'Create a new breed';
        $auth->add($createBreed);

        //Editar os dados de uma raça
        $updateBreed = $auth->createPermission('updateBreed');
        $updateBreed->description = 'Update a breed details';
        $auth->add($updateBreed);

        //Eliminar uma raça
        $deleteBreed = $auth->createPermission('deleteBreed');
        $deleteBreed->description = 'Delete a breed';
        $auth->add($deleteBreed);



        //Metodos de Expedição
        //Criar um metodo de expedição
        $createShippingMethods = $auth->createPermission('createShippingMethods');
        $createShippingMethods->description = 'Create a new shipping method';
        $auth->add($createShippingMethods);

        //Editar os dados de um metodo de expedição
        $updateShippingMethods = $auth->createPermission('updateShippingMethods');
        $updateShippingMethods->description = 'Update a shipping method details';
        $auth->add($updateShippingMethods);

        //Eliminar um metodo de expedição
        $deleteShippingMethods = $auth->createPermission('deleteShippingMethods');
        $deleteShippingMethods->description = 'Delete a shipping method';
        $auth->add($deleteShippingMethods);



        //Metodos de Pagamento
        //Criar um metodo de pagamento
        $createPaymentMethods = $auth->createPermission('createPaymentMethods');
        $createPaymentMethods->description = 'Create a new payment method';
        $auth->add($createPaymentMethods);

        //Editar os dados de um metodo de pagamento
        $updatePaymentMethods = $auth->createPermission('updatePaymentMethods');
        $updatePaymentMethods->description = 'Update a payment method details';
        $auth->add($updatePaymentMethods);

        //Eliminar um metodo de pagamento
        $deletePaymentMethods = $auth->createPermission('deletePaymentMethods');
        $deletePaymentMethods->description = 'Delete a payment method';
        $auth->add($deletePaymentMethods);



        //Tipo de produtos
        //Criar um tipo de produto
        $createProductType = $auth->createPermission('createProductType');
        $createProductType->description = 'Create a new product type';
        $auth->add($createProductType);

        //Editar os dados de um tipo de produto
        $updateProductType = $auth->createPermission('updateProductType');
        $updateProductType->description = 'Update a product type details';
        $auth->add($updateProductType);

        //Eliminar um tipo de produto
        $deleteProductType = $auth->createPermission('deleteProductType');
        $deleteProductType->description = 'Delete a product type';
        $auth->add($deleteProductType);




        //ROLES
        //Gestor
        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $createProduct);
        $auth->addChild($gestor, $readProduct);
        $auth->addChild($gestor, $updateProduct);
        $auth->addChild($gestor, $deleteProduct);
        $auth->addChild($gestor, $readPackage);
        $auth->addChild($gestor, $createProductType);
        $auth->addChild($gestor, $updateProductType);
        $auth->addChild($gestor, $deleteProductType);


        //Veterinario
        $vet = $auth->createRole('vet');
        $auth->add($vet);
        $auth->addChild($vet, $readDog);
        $auth->addChild($vet, $updateDog);
        $auth->addChild($vet, $createAppointment);
        $auth->addChild($vet, $readAppointment);
        $auth->addChild($vet, $updateAppointment);

        //Cliente
        $client = $auth->createRole('client');
        $auth->add($client);
        $auth->addChild($client, $readUserProfile);
        $auth->addChild($client, $updateUserProfile);
        $auth->addChild($client, $createDog);
        $auth->addChild($client, $readDog);
        $auth->addChild($client, $updateDog);
        $auth->addChild($client, $deleteDog);
        $auth->addChild($client, $readProduct);
        $auth->addChild($client, $createShopCar);
        $auth->addChild($client, $readShopCar);
        $auth->addChild($client, $updateShopCar);
        $auth->addChild($client, $deleteShopCar);
        $auth->addChild($client, $createPackage);
        $auth->addChild($client, $readPackage);
        $auth->addChild($client, $updatePackage);
        $auth->addChild($client, $readAppointment);

        //Admin
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createUserProfile);
        $auth->addChild($admin, $deleteUserProfile);
        $auth->addChild($admin, $createDistrict);
        $auth->addChild($admin, $updateDistrict);
        $auth->addChild($admin, $deleteDistrict);
        $auth->addChild($admin, $createBreed);
        $auth->addChild($admin, $updateBreed);
        $auth->addChild($admin, $deleteBreed);
        $auth->addChild($admin, $createShippingMethods);
        $auth->addChild($admin, $updateShippingMethods);
        $auth->addChild($admin, $deleteShippingMethods);
        $auth->addChild($admin, $createPaymentMethods);
        $auth->addChild($admin, $updatePaymentMethods);
        $auth->addChild($admin, $deletePaymentMethods);
        $auth->addChild($admin, $gestor);
        $auth->addChild($admin, $vet);
        $auth->addChild($admin, $client);


        // Atribuir roles a users
        $auth->assign($admin, 1);
        $auth->assign($gestor, 2);
        $auth->assign($vet, 3);
        $auth->assign($client, 4);
    }
}
