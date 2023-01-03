CREATE DATABASE  IF NOT EXISTS `bdcaopanhia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdcaopanhia`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bdcaopanhia
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
INSERT INTO `anuncios` VALUES (1,'Sou um cão trapalhão mas muito amavel <3','2022-11-23 19:58:07','2022-11-24 12:14:12',2,8),(2,'Gosto de brincar, etc etc ','2022-11-23 20:51:29',NULL,3,4),(4,'Olaaaaa isto é um exemplo de uma descrição para me adotarem','2022-11-24 00:29:37',NULL,5,4),(5,'Sou um pug.','2022-11-24 00:55:41',NULL,6,8),(8,'Descrição para adotarem o Sid ','2022-11-24 15:41:01',NULL,9,4),(9,'Descrição para o pastor alemão','2022-11-24 15:45:34',NULL,10,8);
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
INSERT INTO `auth_assignment` VALUES ('admin','1',1669672771),('admin','5',1669672771),('admin','6',1669672771),('client','14',1671100354),('client','23',1671102029),('client','25',1671819580),('client','4',1669672771),('client','7',1669672771),('gestor','2',1669672771),('vet','10',1670869798),('vet','11',1670870071),('vet','24',1671817830),('vet','3',1669672771),('vet','8',1670856310),('vet','9',1670869673);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caes`
--

LOCK TABLES `caes` WRITE;
/*!40000 ALTER TABLE `caes` DISABLE KEYS */;
INSERT INTO `caes` VALUES (2,'cao_teste.jpg','Jackie',2017,'macho','sim','nao',0,'sim',8,3),(3,'pet.jpg','Snoopy',2017,'macho','sim','nao',0,'nao',4,13),(5,'cao2.jpeg','Xica',2015,'femea','sim','sim',0,'nao',4,10),(6,'pugOracio.jpg','Orácio',2020,'macho','sim','nao',1,'nao',8,3),(9,'caoSuplente.jpg','Sid',2003,'femea','sim','sim',0,'nao',4,8),(10,'pastor-alemão.jpg','Pastor',2015,'femea','nao','nao',0,'nao',8,5);
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
INSERT INTO `carrinho` VALUES (1,1,1,7.75),(1,2,1,3.00),(2,1,3,7.75),(2,2,2,NULL),(2,4,1,NULL),(3,4,2,15.00),(4,3,6,4.00),(5,1,1,7.75),(5,2,1,3.00),(5,3,1,4.00),(5,4,1,15.00),(6,3,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Comida',10),(2,'Brinquedos',10),(3,'Roupa',10),(4,'Acessórios',10);
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
INSERT INTO `comentarios` VALUES (1,'Se não for muito gordo fico com ele!',1,8),(2,'Teste de mensagem1',5,4),(3,'Teste de mensagem 2',5,4),(4,'Teste de mensagem 3',5,4),(5,'Olá!',5,4),(6,'Queroo',5,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (2,'Vacina contra infeção, anti-inflamatórios, pomada','Infeção pulmonar, pata traseira esquerda com corte forte','Dar os anti-inflamatórios de 4 em 4 horas durante 3 dias, pomada aplicar 3 vezes ao dia até cicatrizar'),(3,'a definir','a definir','nada a apontar'),(4,'Comprimidos para constipação','Constipação','Dar apenas 1 comprimido por dia durante no máximo 7 dias');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distritos`
--

LOCK TABLES `distritos` WRITE;
/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` VALUES (1,'Aveiro',10),(2,'Beja',10),(3,'Braga',10),(4,'Bragança',10),(5,'Castelo Branco',10),(6,'Coimbra',10),(7,'Évora',10),(8,'Faro',10),(9,'Guarda',10),(10,'Leiria',10),(11,'Lisboa',10),(12,'Portalegre',10),(13,'Porto',10),(14,'Santarém',10),(15,'Setubal',10),(16,'Viana do Castelo',10),(17,'Vila Real',10),(18,'Viseu',10);
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
INSERT INTO `encomendas` VALUES (1,18.25,'2022-12-07 22:49:14','sim',2,3,4,'entregue'),(2,NULL,NULL,'nao',NULL,NULL,7,'pendente'),(3,32.75,'2022-12-07 22:56:32','sim',3,5,4,'enviada'),(4,29.00,'2022-12-07 23:03:32','sim',1,1,4,'enviada'),(5,32.50,'2022-12-09 15:01:34','sim',3,5,4,'entregue'),(6,NULL,NULL,'nao',NULL,NULL,4,'pendente');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcacoesveterinarias`
--

LOCK TABLES `marcacoesveterinarias` WRITE;
/*!40000 ALTER TABLE `marcacoesveterinarias` DISABLE KEYS */;
INSERT INTO `marcacoesveterinarias` VALUES (2,'2022-11-27','16:45:00',4,3,9,2),(3,'2022-12-01','20:15:00',4,3,3,3),(4,'2022-11-24','09:30:00',4,3,5,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'racao_One.jpg','Ração One 2.5Kg',7.75,15,1,10,'Ração One de 2500g, recomendada para qualquer tipo de cão de porte grande '),(2,'bola.jpg','Bola com buzina',3.00,28,2,10,'Bola de borracha com buzina embutida acionada ao apertar, 300g'),(3,'comida_humida.jpg','Comida humida frango',4.00,8,1,10,'Comida humida da Active Pet com sabor a frango, ideal para qualquer tipo de cão a partir do primeiro ano'),(4,'coleteCao.jpg','Colete para cão',15.00,2,3,10,'Colete de algodão, altura: 45 cm, largura: 30cm');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionario`
--

LOCK TABLES `questionario` WRITE;
/*!40000 ALTER TABLE `questionario` DISABLE KEYS */;
INSERT INTO `questionario` VALUES (1,'Tem uma preferência especial por cães de porte grande?',50,0),(2,'Sente que um cão é um elemento fundamental para a proteção da sua casa?',0,10),(3,'Gosta de brincar com cães?',10,0),(4,'Gosta de dormir com cães?',10,0),(5,'Acha fundamental um cão estar fortemente treinado?',0,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racas`
--

LOCK TABLES `racas` WRITE;
/*!40000 ALTER TABLE `racas` DISABLE KEYS */;
INSERT INTO `racas` VALUES (1,'Golden Retriver',90,10),(3,'Pug',30,10),(5,'Pastor Alemão',60,10),(7,'Labrador',80,10),(8,'Poodle',70,10),(9,'Buldogue',20,10),(10,'Yorkshire terrier',40,10),(11,'Buldogue francês',30,10),(12,'Rottweiler',60,10),(13,'Beagle',40,10),(14,'Dobermann',50,10),(15,'Bull terrier',10,10),(16,'Chihuahua',0,10);
/*!40000 ALTER TABLE `racas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostasquestionario`
--

DROP TABLE IF EXISTS `respostasquestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostasquestionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(3) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPergunta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPergunta` (`idPergunta`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `respostasquestionario_ibfk_1` FOREIGN KEY (`idPergunta`) REFERENCES `questionario` (`id`),
  CONSTRAINT `respostasquestionario_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `userprofile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostasquestionario`
--

LOCK TABLES `respostasquestionario` WRITE;
/*!40000 ALTER TABLE `respostasquestionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `respostasquestionario` ENABLE KEYS */;
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
INSERT INTO `tiposexpedicao` VALUES (1,'CTT',5.00,'5 - 7',10),(2,'Expresso',7.50,'2 -3',10),(3,'Ponto Pickup DPD',2.75,'2 - 5',10);
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
INSERT INTO `tipospagamento` VALUES (1,'Cartão de Crédito',10),(2,'Multibanco',10),(3,'Paypal',10),(4,'MBway',10),(5,'À cobrança',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','8fWtAZKfkjhCXqBipL_Oy2jTWCbn2duU','$2y$13$PT8Y.OxCbj5voB8Gf3w6xO/QViphu20X.Pl2375mJ6vxc4fqY2Mn.',NULL,'Admin@mail.pt',10,1667230787,1667230787,'4wSe3YzhMl2mFhaK8PA9pf1Dg0ujz7rt_1667230787'),(2,'Gestor','-NS7vboub8OXHHriRoC-kjxRTPIY0wES','$2y$13$pwH2S6Iu/V2XryW4a5YCS.AdzENOsEijcWcqZyFlgiShEdT3hIqfq',NULL,'gestor@mail.pt',10,1667230920,1667920919,'egRl44SdoA5lYOE1eHddluiKtfW5j9ld_1667230920'),(3,'Veterinario','N1z0ywv3bVlbFvaVThyx5LQolG0AOShC','$2y$13$/B/cBEI0EQG58B4VJ0g7Wu8EFglp5qxvKofgWZEfbNV7xMAbis78G',NULL,'vet@mail.pt',10,1667230973,1667230973,'r2qyN45wb56bGU0wHuyi5svCmDQFQGrp_1667230973'),(4,'Client','h-thDu-IuI4_MZ7D5iABfLvrLaEFaFMD','$2y$13$.f4g5VvM4Rpqh/8yKdwXy.LkvBUiivjfRZZJ2RaSiti9KYovX2X.6',NULL,'client@mail.pt',10,1667231007,1667231007,'T7ugwSfCWPp4XXPgu_XjWZbW2AlfE9WC_1667231007'),(5,'adminTiago','yKO5uFE2RbfZVRnD6HxSrAdSKPmBKteM','$2y$13$4XZGfKqm4Sya1xDwgmqDqeM48zNk.aO56b8lyPFropzXLxDtG3ysG',NULL,'tiago@mail.pt',10,1668185249,1668185249,'i_05LlB5t-VaRXo_kAw_pg3w922e9SqK_1668185249'),(6,'adminLeonel','f5W-A6hAe0k_m-aE8TOWM8cprlRtMfID','$2y$13$BQjo1lxhqHCsb3VDDEsLjei1G4c3OFnD.jtY7mlIF0ceGMWGROv/C',NULL,'leonel@mail.pt',10,1668186180,1668186180,'9icNR89F4MOsI5Z0c33jQRECEmYBob_N_1668186180'),(7,'Client2','Nlu_EPkfq1DGxJZsj0HnExGSKq7UyMw9','$2y$13$9lCh98ddgIKyoCR68/q4wuOsQWdLZXXjShm8V.zkEg8BE.xOvRATy',NULL,'client2@mail.pt',10,1669250495,1669250495,'uXzVuUZwF7aKPnlziODOjyxaetqJUxnZ_1669250495'),(8,'Vet2','pP4PrmVwJGvTNxAItFplCM5jS08SW0oL','$2y$13$S0Jtbmee2KRUSXEoyBkI9.c3rQResmY3q6BfC/iVjHEULmcw/xNnC',NULL,'emailVet@mail.pt',10,1670856310,1670856310,'RxFPfsvt90iSI0SVM_Ges-lh_jJgiRwd_1670856310'),(9,'Vet3','dY3633UnyZuk1muY0GUKXbVnopjSVPG0','$2y$13$EZ6pcTv32y4BsVFRF4yeR.wdjfc1Vuu8dkE94k0l/UOmGZZn9x2nu',NULL,'maildacatarina@mail.pt',10,1670869673,1670869673,'6wkEGBadP6low1CGSLbXIE39ysW4THHH_1670869673'),(10,'Vet4','rhT2fg1m5qK0n6s_fAalT8qTTBZpGGaP','$2y$13$Rr.gi.djfXvowe0X/.iZ..BXhewej6ASeCjjkTAw6i2ul.Le3HKsO',NULL,'ana@mail.pt',10,1670869798,1670869798,'SIh3b97gV6n8Srb2mY4lTPXxbs9VkoW1_1670869798'),(11,'vet5','weURMow_B5Mhv2m9xcYU5qbNT9IO-y1x','$2y$13$cXpwZj9MtDpaTyyihg5Fh.mogtLsGRtIFEZ6fS83jlOvSEf1YkpWm',NULL,'mailvet5@mail.pt',10,1670870071,1670870071,'74hdyl9VDEjz0L_naQWDnavmGodi0ilS_1670870071'),(14,'Client3','0tzSe_9-0tA6mjMIbnt5ZE3wEdlCbZoU','$2y$13$OzvzeXhMtAji9bmXj3e.a.AbD91Peg0KqkJzecXbHWbclNtU9Vtjy',NULL,'client3@mail.pt',10,1671100354,1671100354,'nMRDU5Xr8lSPCOHbSyMcYELbjs5Q3m_Q_1671100354'),(23,'Client4','KyNG4ZrW7SdiFeVzl1kV-1QCZ1lhFJ1V','$2y$13$fb870QxbPRui533hcncVmetwnDZJA5.NkcGiMtuLwe1hUB.6DHrfq',NULL,'client4@mail.pt',10,1671102029,1671102029,'nxQyydhVNRwmfrmKG3Cu6v6N9b6rYYo8_1671102029'),(24,'Vet6','LZH4Kk8A8uKQZTaoCFIIWNbi8d9JcUkL','$2y$13$YukakgC3b1baX5UVG.DN1uGbMPuB6UzW6DMJllSA1BZc.dqO/BjNm',NULL,'emailVet6@mail.pt',10,1671817830,1671817830,'PTo6bUcAAKVzI3s-ln76u2Zn7ebCNuWI_1671817830'),(25,'Client5','ctZGlsSiZyFTiLd44PDbtubJyjNVeYG_','$2y$13$0JMbXp5.7x36MZYHT1f07uW.iAMb1Xb5ZlETwyC4TZha7lEGx10JK',NULL,'clientEmail5@gmail.com',10,1671819580,1671819580,'YNporXcH4Q6gzBoKfS114JRRsfXk1FlH_1671819580');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprofile`
--

LOCK TABLES `userprofile` WRITE;
/*!40000 ALTER TABLE `userprofile` DISABLE KEYS */;
INSERT INTO `userprofile` VALUES (1,'Administrador','R. Gen. Norton de Matos ','2411-901','masculino',123456789,912345677,1,10,NULL,NULL),(2,'Gestor','R. Gen. Norton de Matos','2411-901','masculino',121212345,961953111,2,1,NULL,NULL),(3,'Veterinário','R. Gen. Norton de Matos','2411-901','feminino',987654321,939393931,3,1,'Doutoramento em veterinária animal','team-4'),(4,'Cliente','R. Gen Norton de Matos','2400-014','feminino',956874539,919132912,4,6,NULL,NULL),(5,'Tiago Vital','Rua D. João II  n 14','2260-029','masculino',123443212,912345413,5,14,NULL,NULL),(7,'Leonel Freitas','Rua do Leonel','4820-645','masculino',987698768,939399993,6,9,NULL,NULL),(8,'Francisco','rua do francisco','2230-028','masculino',732635289,919132912,7,11,NULL,NULL),(9,'Clara','rua da clara em santarem','2260-056','feminino',956874569,956874569,8,14,'douturamento em veterinária','team-5'),(10,'Catarina','rua da catarina','2300-029','feminino',919191944,912837465,9,6,'Licenciatura em médica animal','team-1.jpg'),(11,'Ana','rua da ana','2700-043','feminino',939393939,939393939,10,14,'Mestrado em engenharia animal','team-2.jpg'),(12,'Mariana','rua da mariana','2800-039','feminino',629264839,918273456,11,16,'12º ano em saude animal','team-3.jpg'),(13,'João','rua do joao','2260-029','masculino',987667899,919132912,14,9,NULL,NULL),(14,'Fred','rua do fred','2230-03','masculino',192828194,961982735,23,5,NULL,NULL),(15,'André Salvador','rua do andre','3200-037','masculino',234952837,912345411,24,6,'Licenciatura em saúde dentária animal',NULL),(16,'Maria de Lurdes','rua da maria ','2300-042','feminino',719263016,912384756,25,4,NULL,NULL);
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

-- Dump completed on 2022-12-27 15:30:14
