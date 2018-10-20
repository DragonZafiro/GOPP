-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_gopp
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `boletin`
--

DROP TABLE IF EXISTS `boletin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `enlace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boletin_business_id_foreign` (`business_id`),
  CONSTRAINT `boletin_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletin`
--

LOCK TABLES `boletin` WRITE;
/*!40000 ALTER TABLE `boletin` DISABLE KEYS */;
INSERT INTO `boletin` VALUES (1,1,'http://www.mcdonalds.com.mx/promociones/mctrio','McTrío 3x3','¡Vuelve la hamburguesa Gourmet!','1','2019','2020'),(2,2,'http://www.priceshoes.com','Nuevas promociones FLEX','¡Vuelve la moda más deseada!','1','2019','2020'),(3,3,'http://www.elektra.com.mx/','Equipos HP','¡Nuevas ofertas en todos nuestros equipos HP!','1','2019','2020');
/*!40000 ALTER TABLE `boletin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `business_nombre_unique` (`nombre`),
  KEY `business_user_id_foreign` (`user_id`),
  KEY `business_category_id_foreign` (`category_id`),
  CONSTRAINT `business_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `business_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (1,5,1,'Mc Donald\'s','Avenida Zapata N4','La mejor comida rápida','5511423125','mcdonalds@mcdonalds.com','www.mcdonalds.com','NO','mcdonalds','NO','NO','$2y$10$K6DaJ4SKPR2yroDPpfibYem/nrBObQdsP8cXTNDfbagJYur6.EzIq','2018-10-20 07:02:54','2018-10-20 07:02:54'),(2,5,7,'Price Shoes','Avenida Homero N6 MZ10','Ropa a la moda','555123555','price@shoes.com','www.priceshoes.com','NO','NO','mcdonalds','NO','$2y$10$pTiuOQ7t6LEgK9edOKKki.gq4XBQ8FF1LXa6f5A8e/bmVZOjsiPmq','2018-10-20 07:02:54','2018-10-20 07:02:54'),(3,6,15,'Elektra','Calle Reforma N1','Tienda en línea','555123555','elektra@grupoelektra.com','www.elektra.com','NO','NO','NO','NO','$2y$10$RBo9Dp6ZYZp/IB22uAgTTueZ5dGMPxdy8G2HLVsnErY1yWaIp8sJi','2018-10-20 07:02:54','2018-10-20 07:02:54'),(4,1,14,'Best Buy','Avenida Zapata N4','Compras en línea','5511423125','bestbuy@bestbuy.com','www.bestbuy.com','NO','Best Buy','NO','NO','$2y$10$C4aNeMzpgrl9Xf.Baa3ax.DbQj.iSG0QwFNlMRNAC.zvNKpkF7CJm','2018-10-20 07:02:55','2018-10-20 07:02:55');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Comida'),(2,'Ocio'),(3,'Entretenimiento'),(4,'Bares'),(5,'Bebidas'),(6,'Belleza'),(7,'Moda'),(8,'Hoteles y viajes'),(9,'Deportes'),(10,'TV y audio'),(11,'Videojuegos'),(12,'Móvil'),(13,'Computación'),(14,'Hogar'),(15,'Electrodomésticos'),(16,'Reloj y accesorios'),(17,'Salud'),(18,'Niños y juguetes'),(19,'Máscotas'),(20,'Educación'),(21,'Servicios profesionales'),(22,'Industria'),(23,'Otros');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (100,'2018_10_19_035754_create_prueba_table',1),(101,'2014_10_12_000000_create_users_table',2),(102,'2014_10_12_100000_create_password_resets_table',2),(103,'2018_10_07_014505_create_categories_table',2),(104,'2018_10_08_215612_create_business_table',2),(105,'2018_10_10_225118_create_products_table',2),(106,'2018_10_11_053705_create_promos_table',2),(107,'2018_10_14_225741_create_boletin_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  KEY `products_business_id_foreign` (`business_id`),
  CONSTRAINT `products_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Producto','Papas Fritas','000523311','500ml','Mc Donalds','18','1500','800','Remate','activo'),(2,1,'Producto','Hamburguesa Doble JR','000523352','Carne de res','Mc Donalds','22','1800','800','Caja especial','activo'),(3,1,'Producto','Refresco mediano','1202213','Coca-Cola, Pepsi, Sprite','Mc Donalds','20','500','800','Refresco mediano','activo'),(4,2,'Producto','BOTA HIKER CATERPILLAR ','0005251223','Talla 27-29','HIKER','1500','800','800','Colores café y negro','activo'),(5,2,'Producto','BOTA HIKER JEEP ','0005251223','Talla 27-29','HIKER','2500','2800','800','Colores café y negro','activo'),(6,2,'Producto','BOTA HIKER TIMBERLAND ','0005251223','Talla 26-29','HIKER','3500','800','800','Colores negro y café oscuro','activo'),(7,2,'Producto','BOTA HEAVY MICHELIN GAEL ','0005251223','Talla 27-29','GAEL','3700','800','800','Colores café y negro','activo'),(8,2,'Producto','BOTA 3/4 HIKER LOCMAN ','0005251223','Talla 27-29','HIKER','3900','800','800','Colores gris y negro','activo'),(9,3,'Producto','Pantalla LED Sony 55 Pulgadas 4K Smart 55X750F','991231233','La marca Sony trae para ti este asombroso Televisor modelo 55X750F, cuenta con una calidad de resolución Ultra HD con tecnología 4K X-Reality Pro','HIKER','12000','8000','800',NULL,'activo'),(10,3,'Producto','Reproductor DVD HKPRO HKD905 - Negro','991231233','DVD reproductor de alta calidad con elegante diseño delgado en color negro. Disfruta de un excelente sonido digital, está equipado con entrada USB. Diviértete viendo tus películas con alta calidad en imágenes.','HKPRO','5000','8000','800','Color negro','activo'),(11,3,'Producto','Motocicleta Deportiva Italika RT 200 Rojo con Blanco','991231233','APROVECHA 12, 18 y HASTA 24 MESES SIN INTERESES en ITALIKA. Cuenta con un motor que te ofrece rendimiento de 25.6 km/l con velocidad máxima aproximada de 116 km/h, desplazamiento de 193.3 CC. Frenos delanteros y traseros de disco','ITALIKA','120000','8000','800',NULL,'activo'),(12,4,'Producto','Sony - Audífonos MDR-ZX110 - Negros','991231233','Los audífonos de Sony en forma de Diadema ZX110 cuenta con diafragmas tipo cúpula de 30 mm para un sonido equilibrado','SONY','259','8000','800',NULL,'activo');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `business_id` int(10) unsigned NOT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compraMinima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encabezado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promos_product_id_foreign` (`product_id`),
  KEY `promos_business_id_foreign` (`business_id`),
  CONSTRAINT `promos_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`),
  CONSTRAINT `promos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promos`
--

LOCK TABLES `promos` WRITE;
/*!40000 ALTER TABLE `promos` DISABLE KEYS */;
INSERT INTO `promos` VALUES (1,1,1,'19','2','Papas 2x1','Llevate 2 y paga 19$','2018-20-10','2018-20-10','1'),(2,2,1,'59','2','Este es el encabezado de la promoción','Esta es una descripción muy larga de la promoción','2018-20-10','2018-20-10','1'),(3,3,1,'22','2','Ofertón','Refresco Manzanita de oferta','2018-20-10','2018-20-10','1'),(4,4,2,'199','1','Botas de remate!','Esta es la descripción','2018-20-10','2018-20-10','1'),(5,5,2,'259','1','Botas café de oferta','De temporada, color negro','2018-20-10','2018-20-10','1'),(6,6,2,'450','1','Oferta de temporada','En talla 27','2018-20-10','2018-20-10','1'),(7,7,2,'499','1','dadsfadsf','asdfasdfasdf','2018-20-10','2018-20-10','1'),(8,8,2,'799','1','Botas de promoción','Sólo por este mes','2018-20-10','2018-20-10','1'),(9,9,3,'9999','1','Buen fin','Aprovecha el buen fin','2018-20-10','2018-20-10','1');
/*!40000 ALTER TABLE `promos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba`
--

DROP TABLE IF EXISTS `prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prueba` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba`
--

LOCK TABLES `prueba` WRITE;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_delegacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loggedAs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vacio',
  `loggedAsBusiness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vacio',
  `loggedIn` tinyint(1) NOT NULL DEFAULT '0',
  `usuario` tinyint(1) NOT NULL DEFAULT '1',
  `empresa` tinyint(1) NOT NULL DEFAULT '0',
  `afiliador` tinyint(1) NOT NULL DEFAULT '0',
  `repartidor` tinyint(1) NOT NULL DEFAULT '0',
  `praemie` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nick_unique` (`nick`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrador','apellidos','root','$2y$10$mKjb6TcEaJhgHBTfaI8hAe81eIk2O3nXO3aEOLzhfRGruPHU4VvVS','admin','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','153','vacio','vacio',0,1,0,0,0,0,1,NULL),(2,'Usuario','apellidos','user','$2y$10$LmGBCejCOe0MblJ1svtQz.TbXrAeoR7nICJNnTQevW/GTrFS3otma','usuario','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','65','vacio','vacio',0,1,0,0,0,0,0,NULL),(3,'Afiliador','apellidos','afiliate','$2y$10$ixuWn8ZFW//HxhDQoCaBZeY6iNNyn4CUILU4fqwvMB5H9xfUN/xyq','afiliador','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','100','vacio','vacio',0,1,0,1,0,0,0,NULL),(4,'Repartidor','apellidos','deliver','$2y$10$whQf70zO53neYg03h3lGwOqItFS9vr0Elt4Z6vPM05zYfH0c2Czc.','repartidor','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','15','vacio','vacio',0,1,0,0,1,0,0,NULL),(5,'Empresa','apellidos','business','$2y$10$hKCfUjF9LILSEiBz20sCU.z4A92tEbd7wdNh0CIDdPyL0T1CnyaAy','empresa','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','2','vacio','vacio',0,1,1,0,0,0,0,NULL),(6,'Otra Empresa','apellidos','business2','$2y$10$/2h21nEK0wNebd1ut4UQPeGH.JY9UwEkUn2AsmZqru3Y4Zb2y7NeW','empresa2','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','104','vacio','vacio',0,1,1,0,0,0,0,NULL),(7,'Usuario Repartidor','apellidos','usuario_repartidor','$2y$10$4sjPAwhoQJekDqjJOwJAmuaUDrWHZTIn9O6tRqh4M0n21fL2wpBNq','usuario_deliver','1996-01-17','mi frase','MZ14','Calle azul','La Paz','54332','Estado de México','México','89','vacio','vacio',0,1,0,0,1,0,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-19 21:08:47
