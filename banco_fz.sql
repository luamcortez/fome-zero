CREATE DATABASE  IF NOT EXISTS `fz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fz`;
-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: fz
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aux_pedido`
--

DROP TABLE IF EXISTS `aux_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aux_pedido` (
  `produto_idproduto` int(11) NOT NULL,
  `pedido_idpedido` int(11) NOT NULL,
  PRIMARY KEY (`produto_idproduto`,`pedido_idpedido`),
  KEY `fk_produto_has_pedido_pedido1_idx` (`pedido_idpedido`),
  KEY `fk_produto_has_pedido_produto1_idx` (`produto_idproduto`),
  CONSTRAINT `fk_produto_has_pedido_pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_pedido_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aux_pedido`
--

LOCK TABLES `aux_pedido` WRITE;
/*!40000 ALTER TABLE `aux_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `aux_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cpf` varchar(45) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','123'),(2,'cozinha','123'),(3,'cliente','123');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL AUTO_INCREMENT,
  `mesa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `obs` varchar(45) DEFAULT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `cliente_cpf` varchar(45) NOT NULL,
  `atendido` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_pedido_mesa_idx` (`mesa_idmesa`),
  KEY `fk_pedido_cliente1_idx` (`cliente_cpf`) USING BTREE,
  CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_mesa` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL AUTO_INCREMENT,
  `desconto` decimal(45,0) DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo_idtipo` int(11) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `descricao` varchar(245) NOT NULL,
  PRIMARY KEY (`idproduto`),
  KEY `fk_produto_tipo1_idx` (`tipo_idtipo`),
  CONSTRAINT `fk_produto_tipo1` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,NULL,19.90,'Spaghetti ao Molho Branco',1,'images/spaghetti-ao-molho-branco.jpg','Spaghetti ao Molho Branco Lorem ipsum dolor sit amet, vix at sonet aliquam, ut vis iudico option. Cu duo congue veritus abhorreant, per no alterum iudicabit. Dolore dolorum maiorum an quo. Id usu graece appetere. Qui nobis saperet definiebas at1'),(2,NULL,22.90,'Lasanha Bolonhesa',1,'images/lasanha-bolonhesa.jpg','Lasanha Bolonhesa Ea elaboraret dissentiet mea. Nec decore tacimates eu, dico novum iudicabit eum ad, et sed dicit commodo noluisse. At nec essent suavitate definitiones. An has omittantur complectitur.'),(3,NULL,32.50,'Calzone de Frango',1,'images/calzone-de-frango.jpg','Calzone de Frango Id pri errem dolorum, ius hinc magna intellegat cu, no pro eripuit menandri. Id fastidii signiferumque nam. Has epicuri reformidans et, falli disputationi eam ut. Ne mei mutat urbanitas, nam ei tritani mediocritatem.'),(4,NULL,35.20,'Bife a Parmegiana',2,'images/bife-a-parmegiana.jpg','Bife a Parmegiana Aliquando intellegebat mel id, id simul abhorreant mel, et pri tempor definiebas. Volutpat persequeris te mea. Id est delectus splendide instructior, quodsi regione intellegat sed at. Vel eu meis apeirian, solum menandri urbani'),(5,NULL,10.00,'Suco Jarra',3,'images/suco-jarra.jpg','Suco jarra debet epicurei cum an. Vix ex hinc aeque definitiones, congue graeci debitis quo ut. At qui clita inermis perfecto, nam in nonumy vidisse complectitur, no pri noster assentior inciderint.'),(6,NULL,60.50,'Camarao Chique',6,'images/camarao-chique.jpg','Camarao chique d omnium corpora mediocrem pri, populo nominati sit in. An harum possit voluptatibus ius. Ex his movet consetetur. Id rebum delenit cum, et tollit causae eum.'),(7,NULL,14.70,'Nhoque ao Molho Branco',1,'images/nhoque-ao-molho-branco.jpg','Nhoque ao Molho Branco Elit epicurei appellantur cu duo. Epicuri luptatum cotidieque est at, sit vidit aliquip honestatis et, sea solum porro inani an. Mel altera maluisset no, duo assum exerci in. Consulatu conceptam consectetuer ei per, nostru');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Massas'),(2,'Carnes'),(3,'Bebidas'),(6,'Frutos do Mar');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-04 11:33:35
