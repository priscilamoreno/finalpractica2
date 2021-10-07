CREATE DATABASE  IF NOT EXISTS `priscila` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `priscila`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: priscila
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Pedro Conte',247345,'Juan Carlos Ruiz 2091','4738098','pedroconte@yahoo.com.ar'),(2,'Laura Quevedos',8888888,'Dean funes 234','7345690','lauraquevedo78@hotmail.com'),(3,'Maria Gonzalez',43567689,'Julian Paz 2901','4345032','mariagonzales2020@gmail.com'),(4,'Lali Esposito',35768790,'Tucuman 34','4328090','laliesposito34@yahoo.com.ar'),(5,'Jimena Monteverde',2346590,'General Paz 1323','745680','jimenamonteverde45@gmail.com'),(6,'Mariano Martinez',32567890,'Avenida Velez Salfriendl 4567','739078100','marianomartinez56@hotmail.com'),(9,'Carlos Adolfo Codesido',24921979,'Piedrabuena 5186','1128707285','ccodesido@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallescompras`
--

DROP TABLE IF EXISTS `detallescompras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallescompras` (
  `id_detalleCompra` int(11) NOT NULL,
  `id_egresos` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Subtotal` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallescompras`
--

LOCK TABLES `detallescompras` WRITE;
/*!40000 ALTER TABLE `detallescompras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallescompras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallesventas`
--

DROP TABLE IF EXISTS `detallesventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallesventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingreso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallesventas`
--

LOCK TABLES `detallesventas` WRITE;
/*!40000 ALTER TABLE `detallesventas` DISABLE KEYS */;
INSERT INTO `detallesventas` VALUES (1,1,14,3,35,105),(2,1,13,6,45,270),(3,1,11,8,22,176),(4,1,10,3,15,45),(5,2,13,20,15,300),(6,2,11,12,8,96),(7,3,2,50,250,12500);
/*!40000 ALTER TABLE `detallesventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egresos`
--

DROP TABLE IF EXISTS `egresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `egresos` (
  `id_egresos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `id_medioPago` int(11) NOT NULL,
  `proveedor` text NOT NULL,
  `observaciones` int(11) NOT NULL,
  PRIMARY KEY (`id_egresos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egresos`
--

LOCK TABLES `egresos` WRITE;
/*!40000 ALTER TABLE `egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `egresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapago`
--

DROP TABLE IF EXISTS `formapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formapago` (
  `id_formaPago` int(11) NOT NULL AUTO_INCREMENT,
  `formapago` varchar(45) NOT NULL,
  PRIMARY KEY (`id_formaPago`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapago`
--

LOCK TABLES `formapago` WRITE;
/*!40000 ALTER TABLE `formapago` DISABLE KEYS */;
INSERT INTO `formapago` VALUES (1,'Efectivo'),(2,'Tarjeta Debito'),(3,'Tarjeta Credito');
/*!40000 ALTER TABLE `formapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `preciocosto` decimal(10,0) NOT NULL,
  `precioventa` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `foto` text,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,'Chocolates','Aguila',120,223,150,'./fotos/1782606bac23c697bb4bddbfb91328d0.png'),(3,'Chupetines','Paleta',12,18,100,'./fotos/484eaf69ab3d1c180c3384a8be291bbb.jpg'),(4,'Palitos Salados','Pehuamar',25,35,1010,'./fotos/a3ddfa6496c77c9eb10303fe1b47404b.jpg'),(5,'Alfajores','La Nirva',8,12,100,NULL),(6,'Caramelos','Lipo',8,13,100,NULL),(7,'Chizitos','Pehuamar',10,10,10,'./fotos/2fffac3fb754acaed11624775d4136ab.jpg'),(8,'Chocolate','Nesquick',125,180,100,'./fotos/700399a757a9474b0ec1b113f6a5f70a.png'),(10,'Gomitas','Mogul',25,41,150,'./fotos/2b06e5b48041fcb461a4d883f12d3a6a.jpg'),(11,'Caramelos','Media Hora',1,2,400,'./fotos/b691d53e57a524b261a2bdb363c82444.jpg'),(15,'Alfajo','Cachafaz',15,25,100,'./fotos/e9c6c1b6cce06caee3a9b8c479b3c359.jpg'),(13,'Chizitos','Pehuamar',89,115,600,''),(14,'Gasesosa','Sprite',25,45,99,'./fotos/5c6e1a6b75f5c424da245b368d4a560e.jpg'),(16,'Caramelos','Acidos',100,126,250,'./fotos/fbbdd2f946a8c5a80b07c136869cfeef.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmpventas`
--

DROP TABLE IF EXISTS `tmpventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tmpventas` (
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmpventas`
--

LOCK TABLES `tmpventas` WRITE;
/*!40000 ALTER TABLE `tmpventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmpventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendedores` (
  `id_vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id_vendedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `id_formaPago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `proceso_venta` text NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `observaciones` text NOT NULL,
  `postventa` text NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,2,596,3,'2020-11-25','Mayorista',0,'','Buena venta',''),(2,4,396,2,'2020-11-25','Minorista',0,'','',''),(3,3,12500,1,'2020-11-25','Mayorista',0,'','',''),(4,3,0,3,'2020-11-30','Minorista',0,'','',''),(5,6,0,2,'2020-11-30','Minorista',0,'','',''),(6,5,0,1,'2020-11-30','Minorista',0,'','',''),(7,5,0,3,'2020-11-30','Minorista',0,'','',''),(8,6,0,1,'2020-11-30','Minorista',0,'','',''),(9,4,0,2,'2020-12-04','Minorista',0,'','Ninguna',''),(10,3,0,2,'2020-12-04','Mayorista',0,'','...',''),(13,4,0,1,'2020-12-08','Minorista',0,'','Hola!','');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'priscila'
--

--
-- Dumping routines for database 'priscila'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_clientes_select` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_clientes_select`()
BEGIN
	SELECT id_cliente, nombre FROM cliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detallesventas_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detallesventas_insert`(pIDIngreso INTEGER)
BEGIN
	-- Variables donde almacenar lo que nos traemos desde el SELECT
    DECLARE pIDProducto INTEGER;
    DECLARE pCantidad INTEGER; 
    DECLARE pPrUnitario DECIMAL(10,2);
    DECLARE pSubtotal DECIMAL(10,2);
    
	-- Variable para controlar el fin del bucle
	DECLARE fin INTEGER DEFAULT 0;

	-- El SELECT que vamos a ejecutar
	DECLARE detalle_cursor CURSOR FOR
    SELECT id_producto, cantidad, precioUnitario, Subtotal FROM tmpventas;

	-- Condición de salida
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;

	OPEN detalle_cursor;
	get_tmpventas: LOOP
		FETCH detalle_cursor INTO pIDProducto, pCantidad, pPrUnitario, pSubtotal;
		IF fin = 1 THEN
		   LEAVE get_tmpventas;
		END IF;

		-- Inserta detalle de productos en tabla detallesventas
        INSERT INTO detallesventas (id_ingreso, id_producto, cantidad, precioUnitario, Subtotal) 
        VALUES (pIDIngreso, pIDProducto, pCantidad, pPrUnitario, pSubtotal);
        
        -- Actualiza stock
        CALL sp_stock_update(pIDProducto, pCantidad * -1);

	END LOOP get_tmpventas;
	CLOSE detalle_cursor;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detallesventas_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detallesventas_list`(
	pIDVenta INTEGER)
BEGIN
	SELECT d.id_detalle, d.id_producto, p.nombre AS producto, d.cantidad, d.precioUnitario, d.Subtotal 
    FROM detallesventas d
    INNER JOIN productos p ON d.id_producto = p.id_producto
	WHERE d.id_ingreso = pIDVenta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_delete`(
	pIDProducto INTEGER(11))
BEGIN
	DELETE FROM productos WHERE id_producto = pIDProducto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_edit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_edit`(
	pIDProducto INTEGER(11),
    pNombre NVARCHAR(50),
    pDescripcion NVARCHAR(50),
    pPrecioCosto DECIMAL(10,0),
    pPrecioVenta DECIMAL(10,0),
    pCantidad INTEGER(11),
    pFoto TEXT)
BEGIN
	UPDATE productos SET nombre = pNombre, descripcion = pDescripcion, 
		preciocosto = pPreciocosto, precioventa = pPrecioventa, cantidad = pCantidad, foto = pFoto
    WHERE id_producto = pIDProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_get`(
	pIDProducto INTEGER(11))
BEGIN
	SELECT * FROM productos WHERE id_producto = pIDProducto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_insert`(
	pNombre NVARCHAR(50),
    pDescripcion NVARCHAR(50),
    pPrecioCosto DECIMAL(10,0),
    pPrecioVenta DECIMAL(10,0),
    pCantidad INTEGER(11),
    pFoto TEXT
)
BEGIN
	INSERT INTO productos (nombre, descripcion, preciocosto, precioventa, cantidad, foto)
	VALUES (pNombre, pDescripcion, pPrecioCosto, pPrecioVenta, pCantidad, pFoto);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_list`()
BEGIN
	SELECT * FROM productos;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_price` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_price`(
	pIDProducto INTEGER(11))
BEGIN
	SELECT precioventa FROM productos WHERE id_producto = pIDProducto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_productos_select` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productos_select`()
BEGIN
	SELECT id_producto, nombre FROM productos;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_stock_update`(pIDProducto INTEGER, pCantidad INTEGER)
BEGIN
	-- Actualiza stock en tabla productos
    UPDATE productos SET cantidad = cantidad + pCantidad WHERE id_producto = pIDProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_tmpventas_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tmpventas_insert`(
	pIDProducto INTEGER, 
    pCantidad INTEGER, 
    pPrUnitario DECIMAL(10,2), 
    pSubtotal DECIMAL(10,2))
BEGIN
	INSERT INTO tmpventas (id_producto, cantidad, precioUnitario, Subtotal)
	VALUES (pIDProducto, pCantidad, pPrUnitario, pSubtotal);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_delete`(
	pIDVenta INTEGER)
BEGIN
	DELETE FROM ventas WHERE id_venta = pIDVenta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_edit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_edit`(
    pIDVenta INTEGER, 
    pIDCliente INTEGER, 
    pFecha DATE, 
    pProcesoVenta TEXT, 
    pIDFormaPago INTEGER, 
    pMonto DECIMAL(10,2), 
    pObservaciones TEXT)
BEGIN
	-- Actualiza tabla ventas
    UPDATE ventas SET id_cliente = pIDCliente, monto = pMonto, id_formaPago = pIDFormaPago, fecha = pFecha, proceso_venta = pProcesoVenta, observaciones = pObservaciones
    WHERE id_venta = pIDVenta;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_get`(
	pIDVenta INTEGER)
BEGIN
	SELECT v.id_venta, v.id_cliente, c.nombre, v.monto, v.id_formaPago, f.formapago, v.fecha, v.proceso_venta, v.id_vendedor, v.observaciones 
	FROM ventas v 
	INNER JOIN cliente c ON v.id_cliente = c.id_cliente
    INNER JOIN formapago f ON v.id_formaPago = f.id_formaPago
	WHERE id_venta = pIDVenta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_insert`(
    pIDCliente INTEGER, 
    pFecha DATE, 
    pProcesoVenta TEXT, 
    pIDFormaPago INTEGER, 
    pMonto DECIMAL(10,2), 
    pObservaciones TEXT)
BEGIN
	-- Determina ID ingreso
	DECLARE pIDIngreso INTEGER;
    SELECT AUTO_INCREMENT INTO pIDIngreso FROM information_schema.TABLES WHERE TABLE_NAME = 'ventas';
    
	-- Inserta en tabla ventas
    INSERT INTO ventas (id_cliente, monto, id_formaPago, fecha, proceso_venta, id_vendedor, descripcion, observaciones, postventa)
	VALUES (pIDCliente, pMonto, pIDFormaPago, pFecha, pProcesoVenta, 0, '', pObservaciones, '');
    
    -- Inserta detalle de productos
    CALL sp_detallesventas_insert(pIDIngreso);
    
    -- Limpia tabla temporal de detalle
    TRUNCATE TABLE tmpventas;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_list`()
BEGIN
	SELECT v.id_venta, v.fecha, v.id_cliente, c.nombre AS cliente,  v.proceso_venta, v.id_formaPago, f.formapago, v.monto
	FROM ventas v
	INNER JOIN cliente c ON v.id_cliente = c.id_cliente
	INNER JOIN formapago f ON v.id_formaPago = f.id_formaPago;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_temp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_temp`()
BEGIN
	SELECT t.id_producto, p.nombre AS producto, t.cantidad, t.precioUnitario, t.Subtotal
	FROM tmpventas t INNER JOIN productos p ON t.id_producto = p.id_producto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventas_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventas_update`(
	pIDVenta INTEGER, 
    pIDCliente INTEGER, 
    pMonto DECIMAL(10,2), 
    pIDFormaPago INTEGER, 
    pFecha DATE, 
    pProcesoVenta TEXT, 
    pIDVendedor INTEGER, 
    pDescripcion TEXT, 
    pObservaciones TEXT, 
    pPostVenta TEXT)
BEGIN
	UPDATE ventas SET id_cliente = pIDCliente, monto = pIDMonto, id_formaPago = pIDFormaPago, fecha = pFecha, 
		proceso_venta = pProcesoVenta, id_vendedor = pIDVendedor, descripcion = pDescripcion, observaciones = pObservaciones, postventa = pPostVenta
	WHERE id_venta = pIDVenta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08 13:21:08
