CREATE DATABASE  IF NOT EXISTS `bdcaopanhia_tests` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdcaopanhia_tests`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bdcaopanhia_tests
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataAdocao` datetime DEFAULT NULL,
  `idCao` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCao` (`idCao`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`idCao`) REFERENCES `caes` (`id`),
  CONSTRAINT `anuncios_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `userprofile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','1',1669672771),('admin','5',1669672771),('admin','6',1669672771),('client','4',1669672771),('client','7',1669672771),('gestor','2',1669672771),('vet','3',1669672771);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,NULL,NULL,NULL,1669672771,1669672771),('client',1,NULL,NULL,NULL,1669672771,1669672771),('createAds',2,'Create ads',NULL,NULL,1669672771,1669672771),('createAppointment',2,'create a new appointment',NULL,NULL,1669672771,1669672771),('createBreed',2,'Create a new breed',NULL,NULL,1669672771,1669672771),('createComment',2,'Create a comment',NULL,NULL,1669672771,1669672771),('createDistrict',2,'Create a new district',NULL,NULL,1669672771,1669672771),('createDog',2,'Create a new dog',NULL,NULL,1669672771,1669672771),('createExamination',2,'create a new examination',NULL,NULL,1669672771,1669672771),('createPackage',2,'create a new package',NULL,NULL,1669672771,1669672771),('createPaymentMethods',2,'Create a new payment method',NULL,NULL,1669672771,1669672771),('createProduct',2,'Create a new product',NULL,NULL,1669672771,1669672771),('createProductType',2,'Create a new product type',NULL,NULL,1669672771,1669672771),('createQuestions',2,'Create a question',NULL,NULL,1669672771,1669672771),('createShippingMethods',2,'Create a new shipping method',NULL,NULL,1669672771,1669672771),('createShopCar',2,'Add a product to shop car',NULL,NULL,1669672771,1669672771),('createUserProfile',2,'Create a new user profile',NULL,NULL,1669672771,1669672771),('deleteAds',2,'Delete ads',NULL,NULL,1669672771,1669672771),('deleteAppointment',2,'Delete a appointment',NULL,NULL,1669672771,1669672771),('deleteBreed',2,'Delete a breed',NULL,NULL,1669672771,1669672771),('deleteComment',2,'Delete a comment',NULL,NULL,1669672771,1669672771),('deleteDog',2,'Delete a dog profile',NULL,NULL,1669672771,1669672771),('deleteExamination',2,'Delete a examination',NULL,NULL,1669672771,1669672771),('deleteProduct',2,'Delete a product',NULL,NULL,1669672771,1669672771),('deleteQuestion',2,'Delete a question',NULL,NULL,1669672771,1669672771),('deleteShopCar',2,'Remove a product from shop car',NULL,NULL,1669672771,1669672771),('desactivateDistrict',2,'Desactivate a district',NULL,NULL,1669672771,1669672771),('desactivatePaymentMethods',2,'Desactivate a payment method',NULL,NULL,1669672771,1669672771),('desactivateProductType',2,'Desactivate a product type',NULL,NULL,1669672771,1669672771),('desactivateShippingMethods',2,'Desactivate a shipping method',NULL,NULL,1669672771,1669672771),('desactivateUserProfile',2,'Desactivate a user profile',NULL,NULL,1669672771,1669672771),('gestor',1,NULL,NULL,NULL,1669672771,1669672771),('reactivateDistrict',2,'Reactivate a district',NULL,NULL,1669672771,1669672771),('reactivatePaymentMethods',2,'Reactivate a payment method',NULL,NULL,1669672771,1669672771),('reactivateProductType',2,'Reactivate a product type',NULL,NULL,1669672771,1669672771),('reactivateShippingMethods',2,'Reactivate a shipping method',NULL,NULL,1669672771,1669672771),('reactivateUserProfile',2,'Reactivate a user profile',NULL,NULL,1669672771,1669672771),('readAds',2,'view ads',NULL,NULL,1669672771,1669672771),('readAppointment',2,'view appointments',NULL,NULL,1669672771,1669672771),('readComment',2,'read a comment',NULL,NULL,1669672771,1669672771),('readDog',2,'Read a dogs details',NULL,NULL,1669672771,1669672771),('readExamination',2,'view a examination',NULL,NULL,1669672771,1669672771),('readPackage',2,'See orders',NULL,NULL,1669672771,1669672771),('readProduct',2,'Read a product details',NULL,NULL,1669672771,1669672771),('readShopCar',2,'See the shop car',NULL,NULL,1669672771,1669672771),('readUserProfile',2,'Read a user profile',NULL,NULL,1669672771,1669672771),('updateAds',2,'Update ads',NULL,NULL,1669672771,1669672771),('updateAppointment',2,'Update a appointment details',NULL,NULL,1669672771,1669672771),('updateBreed',2,'Update a breed details',NULL,NULL,1669672771,1669672771),('updateComments',2,'Update a comment',NULL,NULL,1669672771,1669672771),('updateDistrict',2,'Update a district details',NULL,NULL,1669672771,1669672771),('updateDog',2,'Update a dogs details',NULL,NULL,1669672771,1669672771),('updateExamination',2,'Update a examination details',NULL,NULL,1669672771,1669672771),('updatePackage',2,'Update a order details',NULL,NULL,1669672771,1669672771),('updatePaymentMethods',2,'Update a payment method details',NULL,NULL,1669672771,1669672771),('updateProduct',2,'Update a product details',NULL,NULL,1669672771,1669672771),('updateProductType',2,'Update a product type details',NULL,NULL,1669672771,1669672771),('updateQuestion',2,'Update a question',NULL,NULL,1669672771,1669672771),('updateShippingMethods',2,'Update a shipping method details',NULL,NULL,1669672771,1669672771),('updateShopCar',2,'Update a product details on shop car',NULL,NULL,1669672771,1669672771),('updateUserProfile',2,'Update a user profile',NULL,NULL,1669672771,1669672771),('vet',1,NULL,NULL,NULL,1669672771,1669672771),('viewAds',2,'View all ads',NULL,NULL,1669672771,1669672771),('viewAppointment',2,'View all appointments',NULL,NULL,1669672771,1669672771),('viewBreed',2,'View all breeds',NULL,NULL,1669672771,1669672771),('viewComments',2,'View all comments',NULL,NULL,1669672771,1669672771),('viewDistrict',2,'View all disctricts',NULL,NULL,1669672771,1669672771),('viewDogs',2,'View all dogs',NULL,NULL,1669672771,1669672771),('viewPackages',2,'View all packages',NULL,NULL,1669672771,1669672771),('viewPaymentMethods',2,'View all payment methods',NULL,NULL,1669672771,1669672771),('viewProducts',2,'View all products',NULL,NULL,1669672771,1669672771),('viewProductType',2,'View all product types',NULL,NULL,1669672771,1669672771),('viewQuestions',2,'View all questions',NULL,NULL,1669672771,1669672771),('viewShippingMethods',2,'View all shipping methods',NULL,NULL,1669672771,1669672771),('viewUsersProfile',2,'View all users profile',NULL,NULL,1669672771,1669672771);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','client'),('client','createAds'),('vet','createAppointment'),('admin','createBreed'),('client','createComment'),('admin','createDistrict'),('client','createDog'),('vet','createExamination'),('client','createPackage'),('admin','createPaymentMethods'),('gestor','createProduct'),('gestor','createProductType'),('admin','createQuestions'),('admin','createShippingMethods'),('client','createShopCar'),('admin','createUserProfile'),('client','deleteAds'),('vet','deleteAppointment'),('admin','deleteBreed'),('client','deleteComment'),('client','deleteDog'),('vet','deleteExamination'),('gestor','deleteProduct'),('admin','deleteQuestion'),('client','deleteShopCar'),('admin','desactivateDistrict'),('admin','desactivatePaymentMethods'),('gestor','desactivateProductType'),('admin','desactivateShippingMethods'),('admin','desactivateUserProfile'),('admin','gestor'),('admin','reactivateDistrict'),('admin','reactivatePaymentMethods'),('gestor','reactivateProductType'),('admin','reactivateShippingMethods'),('admin','reactivateUserProfile'),('client','readAds'),('vet','readAds'),('client','readAppointment'),('vet','readAppointment'),('client','readComment'),('client','readDog'),('vet','readDog'),('client','readExamination'),('vet','readExamination'),('client','readPackage'),('gestor','readPackage'),('client','readProduct'),('gestor','readProduct'),('client','readShopCar'),('client','readUserProfile'),('gestor','readUserProfile'),('vet','readUserProfile'),('client','updateAds'),('vet','updateAds'),('vet','updateAppointment'),('admin','updateBreed'),('client','updateComments'),('admin','updateDistrict'),('client','updateDog'),('vet','updateExamination'),('client','updatePackage'),('admin','updatePaymentMethods'),('gestor','updateProduct'),('gestor','updateProductType'),('admin','updateQuestion'),('admin','updateShippingMethods'),('client','updateShopCar'),('client','updateUserProfile'),('admin','vet'),('client','viewAds'),('vet','viewAds'),('client','viewAppointment'),('vet','viewAppointment'),('admin','viewBreed'),('client','viewComments'),('admin','viewDistrict'),('client','viewPackages'),('gestor','viewPackages'),('admin','viewPaymentMethods'),('client','viewProducts'),('gestor','viewProducts'),('gestor','viewProductType'),('admin','viewQuestions'),('admin','viewShippingMethods'),('admin','viewUsersProfile');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caes`
--

DROP TABLE IF EXISTS `caes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(250) DEFAULT NULL,
  `nome` varchar(30) NOT NULL,
  `anoNascimento` int(11) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `microship` varchar(20) NOT NULL,
  `castrado` varchar(20) NOT NULL,
  `pedidoConsulta` int(11) DEFAULT '0',
  `adotado` varchar(3) DEFAULT 'nao',
  `idUserProfile` int(11) NOT NULL,
  `idRaca` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUserProfile` (`idUserProfile`),
  KEY `idRaca` (`idRaca`),
  CONSTRAINT `caes_ibfk_1` FOREIGN KEY (`idUserProfile`) REFERENCES `userprofile` (`id`),
  CONSTRAINT `caes_ibfk_2` FOREIGN KEY (`idRaca`) REFERENCES `racas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caes`
--

LOCK TABLES `caes` WRITE;
/*!40000 ALTER TABLE `caes` DISABLE KEYS */;
/*!40000 ALTER TABLE `caes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `idEncomenda` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorPago` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`idEncomenda`,`idProduto`),
  KEY `idProduto` (`idProduto`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idEncomenda`) REFERENCES `encomendas` (`id`),
  CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(250) NOT NULL,
  `status` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAnuncio` (`idAnuncio`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idAnuncio`) REFERENCES `anuncios` (`id`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `userprofile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tratamento` varchar(250) DEFAULT NULL,
  `diagonostico` varchar(250) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distritos`
--

DROP TABLE IF EXISTS `distritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distritos`
--

LOCK TABLES `distritos` WRITE;
/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `distritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encomendas`
--

DROP TABLE IF EXISTS `encomendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encomendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valorTotal` decimal(8,2) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `finalizada` varchar(3) DEFAULT 'nao',
  `idExpedicao` int(11) DEFAULT NULL,
  `idPagamento` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT 'pendente',
  PRIMARY KEY (`id`),
  KEY `idExpedicao` (`idExpedicao`),
  KEY `idPagamento` (`idPagamento`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `encomendas_ibfk_1` FOREIGN KEY (`idExpedicao`) REFERENCES `tiposexpedicao` (`id`),
  CONSTRAINT `encomendas_ibfk_2` FOREIGN KEY (`idPagamento`) REFERENCES `tipospagamento` (`id`),
  CONSTRAINT `encomendas_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `userprofile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encomendas`
--

LOCK TABLES `encomendas` WRITE;
/*!40000 ALTER TABLE `encomendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `encomendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcacoesveterinarias`
--

DROP TABLE IF EXISTS `marcacoesveterinarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marcacoesveterinarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idClient` int(11) NOT NULL,
  `idVet` int(11) NOT NULL,
  `idCao` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  KEY `idVet` (`idVet`),
  KEY `idCao` (`idCao`),
  KEY `idConsulta` (`idConsulta`),
  CONSTRAINT `marcacoesveterinarias_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `userprofile` (`id`),
  CONSTRAINT `marcacoesveterinarias_ibfk_2` FOREIGN KEY (`idVet`) REFERENCES `userprofile` (`id`),
  CONSTRAINT `marcacoesveterinarias_ibfk_3` FOREIGN KEY (`idCao`) REFERENCES `caes` (`id`),
  CONSTRAINT `marcacoesveterinarias_ibfk_4` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcacoesveterinarias`
--

LOCK TABLES `marcacoesveterinarias` WRITE;
/*!40000 ALTER TABLE `marcacoesveterinarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcacoesveterinarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1666624087),('m130524_201442_init',1666624088),('m190124_110200_add_verification_token_column_to_user_table',1666624088),('m140506_102106_rbac_init',1666624190),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1666624190),('m180523_151638_rbac_updates_indexes_without_prefix',1666624190),('m200409_110543_rbac_update_mssql_trigger',1666624190);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(250) DEFAULT NULL,
  `designacao` varchar(250) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionario`
--

DROP TABLE IF EXISTS `questionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(250) NOT NULL,
  `pontosSim` int(11) NOT NULL,
  `pontosNao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionario`
--

LOCK TABLES `questionario` WRITE;
/*!40000 ALTER TABLE `questionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `questionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `racas`
--

DROP TABLE IF EXISTS `racas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `racas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(250) CHARACTER SET latin1 NOT NULL,
  `pontos` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racas`
--

LOCK TABLES `racas` WRITE;
/*!40000 ALTER TABLE `racas` DISABLE KEYS */;
/*!40000 ALTER TABLE `racas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposexpedicao`
--

DROP TABLE IF EXISTS `tiposexpedicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiposexpedicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) NOT NULL,
  `custo` decimal(8,2) NOT NULL,
  `tempoMedio` varchar(10) NOT NULL,
  `status` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposexpedicao`
--

LOCK TABLES `tiposexpedicao` WRITE;
/*!40000 ALTER TABLE `tiposexpedicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposexpedicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipospagamento`
--

DROP TABLE IF EXISTS `tipospagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipospagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(250) NOT NULL,
  `status` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipospagamento`
--

LOCK TABLES `tipospagamento` WRITE;
/*!40000 ALTER TABLE `tipospagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipospagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `codigoPostal` varchar(8) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `nif` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idDistrito` int(11) DEFAULT NULL,
  `formacao` varchar(255) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif_UNIQUE` (`nif`),
  KEY `idUser` (`idUser`),
  KEY `idDistrito` (`idDistrito`),
  CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`idDistrito`) REFERENCES `distritos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofile`
--

LOCK TABLES `userprofile` WRITE;
/*!40000 ALTER TABLE `userprofile` DISABLE KEYS */;
/*!40000 ALTER TABLE `userprofile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-27 15:31:52
