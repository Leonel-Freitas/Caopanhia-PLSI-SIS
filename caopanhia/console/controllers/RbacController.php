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
        //Acessar utilizadores
        $viewUsersProfile = $auth->createPermission('viewUsersProfile');
        $viewUsersProfile->description = 'View all users profile';
        $auth->add($viewUsersProfile);

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

        //Desativar um utilizador
        $desactivateUserProfile = $auth->createPermission('desactivateUserProfile');
        $desactivateUserProfile->description = 'Desactivate a user profile';
        $auth->add($desactivateUserProfile);

        //Ativar um utilizador
        $reactivateUserProfile = $auth->createPermission('reactivateUserProfile');
        $reactivateUserProfile->description = 'Reactivate a user profile';
        $auth->add($reactivateUserProfile);


        //Distritos
        //Acessar distritos
        $viewDistrict = $auth->createPermission('viewDistrict');
        $viewDistrict->description = 'View all disctricts';
        $auth->add($viewDistrict);

        //Criar um distrito
        $createDistrict = $auth->createPermission('createDistrict');
        $createDistrict->description = 'Create a new district';
        $auth->add($createDistrict);

        //Editar os dados de um distrito
        $updateDistrict = $auth->createPermission('updateDistrict');
        $updateDistrict->description = 'Update a district details';
        $auth->add($updateDistrict);

        //Desativar um distrito
        $desactivateDistrict = $auth->createPermission('desactivateDistrict');
        $desactivateDistrict->description = 'Desactivate a district';
        $auth->add($desactivateDistrict);

        //Ativar um distrito
        $reactivateDistrict = $auth->createPermission('reactivateDistrict');
        $reactivateDistrict->description = 'Reactivate a district';
        $auth->add($reactivateDistrict);



        //Caes
        //Acessar caes
        $viewDogs = $auth->createPermission('viewDogs');
        $viewDogs->description = 'View all dogs';
        $auth->add($viewDogs);

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


        //Raça
        //Acessar raças
        $viewBreed = $auth->createPermission('viewBreed');
        $viewBreed->description = 'View all breeds';
        $auth->add($viewBreed);

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


        //Questionário
        //Aceder as perguntas
        $viewQuestions = $auth->createPermission('viewQuestions');
        $viewQuestions->description = 'View all questions';
        $auth->add($viewQuestions);

        //Criar perguntas
        $createQuestion = $auth->createPermission('createQuestions');
        $createQuestion->description = 'Create a question';
        $auth->add($createQuestion);

        //Editar uma pergunta
        $updateQuestion = $auth->createPermission('updateQuestion');
        $updateQuestion->description = 'Update a question';
        $auth->add($updateQuestion);

        //Eliminar uma pergunta
        $deleteQuestion = $auth->createPermission('deleteQuestion');
        $deleteQuestion->description = 'Delete a question';
        $auth->add($deleteQuestion);


        //Anuncios
        //Aceder aos anuncios
        $viewAds = $auth->createPermission('viewAds');
        $viewAds->description = 'View all ads';
        $auth->add($viewAds);

        //Criar anuncio
        $createAds = $auth->createPermission('createAds');
        $createAds->description = 'Create ads';
        $auth->add($createAds);

        //Visualizar um anuncio
        $readAds = $auth->createPermission('readAds');
        $readAds->description = 'view ads';
        $auth->add($readAds);

        //Editar um anuncio
        $updateAds = $auth->createPermission('updateAds');
        $updateAds->description = 'Update ads';
        $auth->add($updateAds);

        //Eliminar um anuncio
        $deleteAds = $auth->createPermission('deleteAds');
        $deleteAds->description = 'Delete ads';
        $auth->add($deleteAds);



        //Comentários aos anuncios
        //Aceder aos comentários
        $viewComments = $auth->createPermission('viewComments');
        $viewComments->description = 'View all comments';
        $auth->add($viewComments);

        //Criar comentário
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Create a comment';
        $auth->add($createComment);

        //Visualizar um comentário
        $readComment = $auth->createPermission('readComment');
        $readComment->description = 'read a comment';
        $auth->add($readComment);

        //Editar um comentário
        $updateComments = $auth->createPermission('updateComments');
        $updateComments->description = 'Update a comment';
        $auth->add($updateComments);

        //Eliminar um comentário
        $deleteComment = $auth->createPermission('deleteComment');
        $deleteComment->description = 'Delete a comment';
        $auth->add($deleteComment);


        //Marcações veterinárias
        //Aceder as marcações
        $viewAppointment = $auth->createPermission('viewAppointment');
        $viewAppointment->description = 'View all appointments';
        $auth->add($viewAppointment);

        //Criar marcação
        $createAppointment = $auth->createPermission('createAppointment');
        $createAppointment->description = 'create a new appointment';
        $auth->add($createAppointment);

        //Visualizar uma marcação
        $readAppointment = $auth->createPermission('readAppointment');
        $readAppointment->description = 'view appointments';
        $auth->add($readAppointment);

        //Editar uma marcação
        $updateAppointment = $auth->createPermission('updateAppointment');
        $updateAppointment->description = 'Update a appointment details';
        $auth->add($updateAppointment);

        //Eliminar uma marcação
        $deleteAppointment = $auth->createPermission('deleteAppointment');
        $deleteAppointment->description = 'Delete a appointment';
        $auth->add($deleteAppointment);



        //Consultas veterinárias
        //Criar consulta
        $createExamination = $auth->createPermission('createExamination');
        $createExamination->description = 'create a new examination';
        $auth->add($createExamination);

        //Visualizar uma consulta
        $readExamination = $auth->createPermission('readExamination');
        $readExamination->description = 'view a examination';
        $auth->add($readExamination);

        //Editar uma consulta
        $updateExamination = $auth->createPermission('updateExamination');
        $updateExamination->description = 'Update a examination details';
        $auth->add($updateExamination);

        //Eliminar uma consulta
        $deleteExamination = $auth->createPermission('deleteExamination');
        $deleteExamination->description = 'Delete a examination';
        $auth->add($deleteExamination);



        //Encomenda
        //Acessar encomendas
        $viewPackages = $auth->createPermission('viewPackages');
        $viewPackages->description = 'View all packages';
        $auth->add($viewPackages);

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



        //Metodos de Expedição
        //Acessar expedições
        $viewShippingMethods = $auth->createPermission('viewShippingMethods');
        $viewShippingMethods->description = 'View all shipping methods';
        $auth->add($viewShippingMethods);

        //Criar um metodo de expedição
        $createShippingMethods = $auth->createPermission('createShippingMethods');
        $createShippingMethods->description = 'Create a new shipping method';
        $auth->add($createShippingMethods);

        //Editar os dados de um metodo de expedição
        $updateShippingMethods = $auth->createPermission('updateShippingMethods');
        $updateShippingMethods->description = 'Update a shipping method details';
        $auth->add($updateShippingMethods);

        //Desativar um metodo de expedição
        $desactivateShippingMethods = $auth->createPermission('desactivateShippingMethods');
        $desactivateShippingMethods->description = 'Desactivate a shipping method';
        $auth->add($desactivateShippingMethods);

        //Ativar um metodo de expedição
        $reactivateShippingMethods = $auth->createPermission('reactivateShippingMethods');
        $reactivateShippingMethods->description = 'Reactivate a shipping method';
        $auth->add($reactivateShippingMethods);



        //Metodos de Pagamento
        //Acessar expedições
        $viewPaymentMethods = $auth->createPermission('viewPaymentMethods');
        $viewPaymentMethods->description = 'View all payment methods';
        $auth->add($viewPaymentMethods);

        //Criar um metodo de pagamento
        $createPaymentMethods = $auth->createPermission('createPaymentMethods');
        $createPaymentMethods->description = 'Create a new payment method';
        $auth->add($createPaymentMethods);

        //Editar os dados de um metodo de pagamento
        $updatePaymentMethods = $auth->createPermission('updatePaymentMethods');
        $updatePaymentMethods->description = 'Update a payment method details';
        $auth->add($updatePaymentMethods);

        //Desativar um metodo de pagamento
        $desactivatePaymentMethods = $auth->createPermission('desactivatePaymentMethods');
        $desactivatePaymentMethods->description = 'Desactivate a payment method';
        $auth->add($desactivatePaymentMethods);

        //Ativar um metodo de pagamento
        $reactivatePaymentMethods = $auth->createPermission('reactivatePaymentMethods');
        $reactivatePaymentMethods->description = 'Reactivate a payment method';
        $auth->add($reactivatePaymentMethods);



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



        //Produtos
        //Acessar produtos
        $viewProducts = $auth->createPermission('viewProducts');
        $viewProducts->description = 'View all products';
        $auth->add($viewProducts);

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



        //Tipo de produtos
        //Acessar tipos de procutos
        $viewProductType = $auth->createPermission('viewProductType');
        $viewProductType->description = 'View all product types';
        $auth->add($viewProductType);

        //Criar um tipo de produto
        $createProductType = $auth->createPermission('createProductType');
        $createProductType->description = 'Create a new product type';
        $auth->add($createProductType);

        //Editar os dados de um tipo de produto
        $updateProductType = $auth->createPermission('updateProductType');
        $updateProductType->description = 'Update a product type details';
        $auth->add($updateProductType);

        //Desativar um tipo de produto
        $desactivateProductType = $auth->createPermission('desactivateProductType');
        $desactivateProductType->description = 'Desactivate a product type';
        $auth->add($desactivateProductType);

        //Ativar um tipo de produto
        $reactivateProductType = $auth->createPermission('reactivateProductType');
        $reactivateProductType->description = 'Reactivate a product type';
        $auth->add($reactivateProductType);


        //ROLES
        //Gestor
        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $readUserProfile);
        $auth->addChild($gestor, $viewPackages);
        $auth->addChild($gestor, $readPackage);
        $auth->addChild($gestor, $viewProducts);
        $auth->addChild($gestor, $createProduct);
        $auth->addChild($gestor, $readProduct);
        $auth->addChild($gestor, $updateProduct);
        $auth->addChild($gestor, $deleteProduct);
        $auth->addChild($gestor, $viewProductType);
        $auth->addChild($gestor, $createProductType);
        $auth->addChild($gestor, $updateProductType);
        $auth->addChild($gestor, $desactivateProductType);
        $auth->addChild($gestor, $reactivateProductType);


        //Veterinario
        $vet = $auth->createRole('vet');
        $auth->add($vet);
        $auth->addChild($vet, $readUserProfile);
        $auth->addChild($vet, $viewAds);
        $auth->addChild($vet, $readAds);
        $auth->addChild($vet, $updateAds);
        $auth->addChild($vet, $viewAppointment);
        $auth->addChild($vet, $createAppointment);
        $auth->addChild($vet, $readAppointment);
        $auth->addChild($vet, $updateAppointment);
        $auth->addChild($vet, $deleteAppointment);
        $auth->addChild($vet, $createExamination);
        $auth->addChild($vet, $readExamination);
        $auth->addChild($vet, $updateExamination);
        $auth->addChild($vet, $deleteExamination);


        //Cliente
        $client = $auth->createRole('client');
        $auth->add($client);
        $auth->addChild($client, $readUserProfile);
        $auth->addChild($client, $updateUserProfile);
        $auth->addChild($client, $createDog);
        $auth->addChild($client, $readDog);
        $auth->addChild($client, $updateDog);
        $auth->addChild($client, $deleteDog);
        $auth->addChild($client, $viewAds);
        $auth->addChild($client, $createAds);
        $auth->addChild($client, $readAds);
        $auth->addChild($client, $updateAds);
        $auth->addChild($client, $deleteAds);
        $auth->addChild($client, $viewComments);
        $auth->addChild($client, $createComment);
        $auth->addChild($client, $readComment);
        $auth->addChild($client, $updateComments);
        $auth->addChild($client, $deleteComment);
        $auth->addChild($client, $viewAppointment);
        $auth->addChild($client, $readAppointment);
        $auth->addChild($client, $readExamination);
        $auth->addChild($client, $viewPackages);
        $auth->addChild($client, $createPackage);
        $auth->addChild($client, $readPackage);
        $auth->addChild($client, $updatePackage);
        $auth->addChild($client, $createShopCar);
        $auth->addChild($client, $readShopCar);
        $auth->addChild($client, $updateShopCar);
        $auth->addChild($client, $deleteShopCar);
        $auth->addChild($client, $viewProducts);
        $auth->addChild($client, $readProduct);



        //Admin
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $viewUsersProfile);
        $auth->addChild($admin, $createUserProfile);
        $auth->addChild($admin, $desactivateUserProfile);
        $auth->addChild($admin, $reactivateUserProfile);
        $auth->addChild($admin, $viewDistrict);
        $auth->addChild($admin, $createDistrict);
        $auth->addChild($admin, $updateDistrict);
        $auth->addChild($admin, $desactivateDistrict);
        $auth->addChild($admin, $reactivateDistrict);
        $auth->addChild($admin, $viewBreed);
        $auth->addChild($admin, $createBreed);
        $auth->addChild($admin, $updateBreed);
        $auth->addChild($admin, $deleteBreed);
        $auth->addChild($admin, $viewQuestions);
        $auth->addChild($admin, $createQuestion);
        $auth->addChild($admin, $updateQuestion);
        $auth->addChild($admin, $deleteQuestion);
        $auth->addChild($admin, $viewShippingMethods);
        $auth->addChild($admin, $createShippingMethods);
        $auth->addChild($admin, $updateShippingMethods);
        $auth->addChild($admin, $desactivateShippingMethods);
        $auth->addChild($admin, $reactivateShippingMethods);
        $auth->addChild($admin, $viewPaymentMethods);
        $auth->addChild($admin, $createPaymentMethods);
        $auth->addChild($admin, $updatePaymentMethods);
        $auth->addChild($admin, $desactivatePaymentMethods);
        $auth->addChild($admin, $reactivatePaymentMethods);
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
