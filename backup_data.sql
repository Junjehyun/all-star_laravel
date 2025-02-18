-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: awesome-laravel
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT  IGNORE INTO `cache` VALUES ('18a9b48e57e113ea2f7c3708d3888621','i:1;',1737605540),('18a9b48e57e113ea2f7c3708d3888621:timer','i:1737605540;',1737605540),('80f433ddc4ec176a6325d85437d9413d','i:1;',1738417660),('80f433ddc4ec176a6325d85437d9413d:timer','i:1738417660;',1738417660),('c1f96302f7b9e9780506148c01d495dc','i:1;',1738498711),('c1f96302f7b9e9780506148c01d495dc:timer','i:1738498711;',1738498711),('e5e5c1a062dfd4d5341eadedb2322976','i:1;',1738404283),('e5e5c1a062dfd4d5341eadedb2322976:timer','i:1738404283;',1738404283);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT  IGNORE INTO `carts` VALUES (11,NULL,22,3,'2025-01-23 13:09:08','2025-01-24 10:42:09'),(12,NULL,8,1,'2025-01-24 10:36:01','2025-01-24 10:36:01'),(13,NULL,17,1,'2025-01-24 10:44:01','2025-01-24 10:44:01'),(14,NULL,20,1,'2025-01-24 12:50:24','2025-01-24 12:50:24'),(15,NULL,23,1,'2025-01-24 13:42:12','2025-01-24 13:42:12'),(41,6,22,1,'2025-02-01 12:53:08','2025-02-01 13:39:07'),(42,6,11,1,'2025-02-01 13:13:14','2025-02-01 13:13:14'),(43,5,22,1,'2025-02-01 14:08:37','2025-02-01 14:08:37');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT  IGNORE INTO `comments` VALUES (5,NULL,NULL,'user2','?뉎뀋??,5,'2025-01-28 07:21:14','2025-01-28 07:21:14',23),(6,NULL,NULL,'user2','?담뀅?뉎꽮?담뀅?뉎꽮',4,'2025-01-28 07:25:32','2025-01-28 07:25:32',23),(7,NULL,NULL,'user2','?뉎뀋??,3,'2025-01-28 07:38:25','2025-01-28 07:38:25',23),(8,NULL,NULL,'user2','??,2,'2025-01-28 07:40:47','2025-01-28 07:40:47',23),(9,NULL,NULL,'user1','123',1,'2025-01-28 12:29:21','2025-01-28 12:29:21',23),(10,NULL,NULL,'user1','very good',1,'2025-01-28 13:00:22','2025-01-28 13:00:22',23),(11,NULL,NULL,'user1','very nice',3,'2025-01-28 14:14:18','2025-01-28 14:14:18',10),(12,NULL,NULL,'user1','?뉎뀋??,5,'2025-01-29 12:53:33','2025-01-29 12:53:33',22),(13,NULL,NULL,'user1','?곥뀋??,5,'2025-01-29 12:53:38','2025-01-29 12:53:38',22),(14,NULL,NULL,'user1','gd',4,'2025-01-29 12:58:11','2025-01-29 12:58:11',23),(15,NULL,NULL,'user1','123',5,'2025-01-29 12:58:21','2025-01-29 12:58:21',23),(16,NULL,NULL,'user1','5',3,'2025-01-29 12:58:42','2025-01-29 12:58:42',24),(17,NULL,NULL,'user1','3',3,'2025-01-29 12:58:46','2025-01-29 12:58:46',24),(18,NULL,NULL,'user1','醫뗭? ?щ━?쇨뎔??',3,'2025-01-29 13:04:10','2025-01-29 13:04:10',13),(19,NULL,NULL,'user1','???蹂꾨줈?낅땲??',1,'2025-01-29 13:04:18','2025-01-29 13:04:18',13),(20,NULL,NULL,'admin1','5??,5,'2025-02-01 08:48:53','2025-02-01 08:48:53',23),(21,NULL,NULL,'admin1','1??,1,'2025-02-01 08:49:02','2025-02-01 08:49:02',23),(22,NULL,NULL,'admin1','1??,1,'2025-02-01 08:49:15','2025-02-01 08:49:15',23),(23,NULL,NULL,'admin1','5??,5,'2025-02-01 08:49:22','2025-02-01 08:49:22',23),(24,NULL,NULL,'admin1','5??,5,'2025-02-01 08:49:33','2025-02-01 08:49:33',23),(25,NULL,NULL,'admin1','5??,5,'2025-02-01 08:49:39','2025-02-01 08:49:39',23),(26,NULL,NULL,'user2','very comportable',4,'2025-02-01 13:13:30','2025-02-01 13:13:30',11);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT  IGNORE INTO `items` VALUES (1,'Blazer Low \'77 Vintage',26000.00,'260','Blazer Low \'77 Vintage','images/ynkjnm58Fr5O6b9NwRdYzRT7nXO5JpqJ0IE3bALk.png','nike','2025-01-05 21:15:00','2025-01-05 21:15:00',0),(2,'Air Monarch IV',30000.00,'260','Air Monarch IV','images/fIZyoPO4Z5cAEMS19WBw2bPPxupCwiyxcDogwxLB.png','nike','2025-01-05 21:15:45','2025-01-05 21:15:45',0),(3,'Invincible 3 Blueprint',30000.00,'260','Invincible 3 Blueprint','images/O6QPy0isEjtIGECQofOBEtt7JW5zN6gYod1wZMJX.png','nike','2025-01-05 21:16:12','2025-01-05 21:16:12',0),(4,'Journey Run',30000.00,'260','Journey Run','images/BbDZGMFGqHvlfESMwBvextZ1vItZXP9jcwyrf2s6.png','nike','2025-01-05 21:17:44','2025-01-05 21:17:44',0),(5,'Zoom Bomer 5',30000.00,'260','Zoom Bomer 5','images/UrBiIQsLsyesbGDnxUTvBZiYM5bLhqMwTaMiGvw4.png','nike','2025-01-05 22:00:01','2025-01-05 22:00:01',0),(6,'Zoom Bomer Lom',50000.00,'260','Zoom Bomer Lom','images/7pT0mtGECDKu5SbAx55EAAERs9hGWqAXZOpY2BX3.png','nike','2025-01-05 22:01:01','2025-01-05 22:01:01',0),(7,'Zoom Fly 6',19000.00,'260','Zoom Fly 6','images/RnCDLJNX3Wz3jlgmi1EcxmQwzPuxvVKWblcZnBKm.png','nike','2025-01-05 22:01:56','2025-01-05 22:01:56',0),(8,'Court Light 4',15000.00,'260','Court Light 4','images/91GrPVehHNfjbePrwKfRmKWj7KZrQ5UoAy6mHdr3.png','nike','2025-01-05 22:02:30','2025-01-05 22:02:30',0),(9,'?싥궗?듐궧_41_RPM',28000.00,'260','?듽궎???싥궗?듐궧_41_RPM','images/myXFK7wy5roXbLnW6oO7NE9QUoXvVW5ZeECR1WPw.png','nike','2025-01-05 22:03:35','2025-01-05 22:03:35',0),(10,'Luka 3 Photo Finish',38000.00,'250','Luka 3 Photo Finish','images/QY87Oh43dkhTTgOkU5PFcdSpkrJ280xNIbdBtLoy.png','nike','2025-01-05 22:04:44','2025-01-28 14:14:27',1),(11,'Book 1EP',8000.00,'260','Book 1EP','images/znC9G0DdHb5Go9gX9IUFN8ljl3npoIYhtUCGz45g.png','nike','2025-01-05 22:05:11','2025-02-01 13:13:19',2),(12,'Air Jordan 9G',40000.00,'280','Air Jordan 9G','images/B1wMBfOFJkGaDO9BNC6vpcO2BXKJpDERsYWzxZyj.png','nike','2025-01-05 22:05:49','2025-02-01 04:57:22',1),(13,'Jordan Hydro 6',7500.00,'270','Jordan Hydro 6','images/INRL9CoNaZAirdcvlH5fXAhLYngTl9BsHLkKlIxf.png','nike','2025-01-05 22:09:00','2025-01-05 22:09:00',0),(14,'Terrex Winter Slip-On Cold Lady',15000.00,'260','Terrex Winter Slip-On Cold Lady','images/n8d8pzAbArDvdrVJzJvwtb5SPrq51qRicfdTrP7L.jpg','adidas','2025-01-05 22:10:20','2025-01-05 22:10:20',0),(15,'Handball Special',12500.00,'260','Handball Special','images/Yi9hwt7m5PltDQXzxH6ZSzkau1R3sxu5s47cd57m.jpg','adidas','2025-01-05 22:11:15','2025-01-05 22:11:15',0),(16,'Gazelle Indoor JI2061\n',7900.00,'260','Gazelle Indoor JI2061\n','images/Er2uPaS3TZKA5yscw3HJzcReEO8KKafboGyUoYtA.jpg','adidas','2025-01-05 22:11:43','2025-01-28 03:37:36',1),(17,'Galaxy 7',8000.00,'260','Galaxy 7','images/GpxUXGOGCHVgc3vta75gwdf704oPHGUbSPmLttFP.jpg','adidas','2025-01-05 22:13:04','2025-01-28 03:31:06',1),(18,'Rain Boots Adiform Superstar',15000.00,'260','Rain Boots Adiform Superstar','images/tyHShitHDXCcEfBm2iiBgb8o7DxiPd5CsRM5lwDz.jpg','adidas','2025-01-05 22:13:35','2025-01-05 22:13:35',0),(19,'Simba OG ID2056',5500.00,'260','Simba OG ID2056','images/F9NO5kiGVssJJaw9qJyKfeSrwnpHzRDLo2F5h1jR.jpg','adidas','2025-01-05 22:14:34','2025-01-06 19:33:07',0),(20,'Adilette Light Slipper',5500.00,'260','Adilette Light Slipper','images/7N4NKQbX9I0T201EQYC3iMEq5i2euEcJqJW9DZ9t.jpg','adidas','2025-01-05 22:15:29','2025-01-05 22:15:29',0),(21,'Women\'s Gazelle Indoor Bliss Pink',13000.00,'230','Women\'s Gazelle Indoor Bliss Pink','images/p9bje9CjetVHNo1cLxRBlPzhHzWoNQuBQuybczX6.jpg','adidas','2025-01-05 22:16:28','2025-01-05 22:16:28',0),(22,'Women\'s Samba LT JH5705',9900.00,'250','Women\'s Samba LT JH5705','images/u2pp3EOFgYoikP6NNGQcg2oXWIDspQhyMnoXxB66.jpg','adidas','2025-01-05 22:20:22','2025-01-28 03:31:33',2),(23,'Campus Shadow Brown',6000.00,'275','Campus Shadow Brown','images/0jRtOyqT7gRsNp7EfWWmBwvUEdW9Vz2KlHILz49T.jpg','adidas','2025-01-05 22:22:14','2025-02-01 08:48:44',4),(24,'Xenia Schneider W Denim Blue',21000.00,'280','Xenia Schneider W Denim Blue','images/ZbTtpsLWat0yAtCbTWPIIUSVIMjOi2pepNVrUfsS.jpg','adidas','2025-01-05 22:22:46','2025-01-05 22:22:46',0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT  IGNORE INTO `migrations` VALUES (29,'0001_01_01_000000_create_users_table',1),(30,'0001_01_01_000001_create_cache_table',1),(31,'0001_01_01_000002_create_jobs_table',1),(32,'2024_11_15_075838_add_two_factor_columns_to_users_table',1),(33,'2024_11_15_075857_create_personal_access_tokens_table',1),(34,'2024_11_18_070210_create_notices_table',1),(35,'2024_12_05_114057_create_comments_table',1),(36,'2024_12_07_050744_add_parent_id_to_comments_table',1),(37,'2024_12_08_133541_add_like_to_notices_table',1),(38,'2024_12_08_133805_modify_like_position_in_notices_table',1),(39,'2024_12_09_083517_create_items_table',1),(40,'2024_12_10_020724_create_crats_table',1),(41,'2025_01_07_053956_create_orders_table',2),(42,'2025_01_07_074456_modify_user_id_nullable_in_orders_table',3),(43,'2025_01_12_142216_add_customer_info_to_orders_table',4),(44,'2025_01_13_023043_add_address_fields_to_orders_table',5),(45,'2025_01_14_132551_add_role_column_to_users_table',6),(46,'2025_01_24_215915_add_user_id_to_carts_table',7),(47,'2025_01_25_142014_add_quantity_to_orders_table',8),(48,'2025_01_28_105434_add_likes_to_items_table',9),(49,'2025_01_28_154854_add_item_id_to_comments_table',10),(50,'2025_01_28_161530_update_comments_table_nullable_notice_id',11),(53,'2025_01_28_192202_add_rating_to_comments_table',12),(54,'2025_02_01_145132_add_shipping_status_to_orders_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notices`
--

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
INSERT  IGNORE INTO `notices` VALUES (1,'common','?덀걝?볝걹','??걯?곥겲?쀣겍\r\n若쒌걮?뤵걡窈섅걚?담걮?얇걲??,4,0,'嶸←릤??,'2025-01-05 23:30:33','2025-02-01 13:57:41'),(2,'low','??걯?곥겲?쀣겍','榮졿쇀?됥걮?꾠겎?쇻겖??r\n若쒌걮?뤵걡窈섅걚?담걮?얇걲??,2,0,'?꿔궧??,'2025-01-06 00:50:12','2025-01-06 22:55:58'),(3,'high','?듽굙?㎯겏?녴걫?뽧걚?얇걲','?꿰ㅊ?욍궕?쀣꺍?믡걡?곥겎?ⓦ걝?붵걭?꾠겲?쇻?,2,0,'鴉싮빓','2025-01-06 00:51:32','2025-01-23 04:39:02'),(4,'emergency','渶딀γ겒?딁윥?됥걵?㎯걲??,'?볝겎?쇻?,159,2,'縕т뻣??,'2025-01-06 00:52:31','2025-02-01 13:31:07');
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT  IGNORE INTO `orders` VALUES (1,23,NULL,'completed',1.00,1,'pi_3QeXU4FYF3n8hSHo1j1o96sj','?뚯뒪??',NULL,NULL,NULL,'2025-01-06 22:45:54','2025-02-01 13:45:37',NULL,NULL,NULL,'delivery'),(2,8,NULL,'completed',1.00,1,'pi_3QeYFfFYF3n8hSHo1zwhOXQb','?뚯뒪??',NULL,NULL,NULL,'2025-01-06 23:35:05','2025-01-06 23:35:05',NULL,NULL,NULL,'pay-confirm'),(3,7,NULL,'pending',1.00,1,NULL,'?뚯뒪??',NULL,NULL,NULL,'2025-01-13 00:00:10','2025-01-13 00:00:10',NULL,NULL,NULL,'pay-confirm'),(4,22,NULL,'pending',1.00,1,NULL,'?뚯뒪??',NULL,NULL,NULL,'2025-01-13 00:07:15','2025-01-13 00:07:15',NULL,NULL,NULL,'pay-confirm'),(5,23,NULL,'pending',1.00,1,NULL,'?꾩젣??,'h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','2025-01-13 02:39:22','2025-01-13 02:39:22',NULL,NULL,NULL,'pay-confirm'),(6,14,NULL,'pending',15000.00,1,NULL,'?꾩젣??,'h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','2025-01-13 04:01:52','2025-01-13 04:01:52','3520001','?쇘럦???겼벨躍??긷뙒','2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','pay-confirm'),(7,3,NULL,'pending',30000.00,1,NULL,'?꾩젣??23','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','2025-01-13 04:09:04','2025-01-13 04:09:04','3520001','?쇘럦???겼벨躍??긷뙒','2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','pay-confirm'),(8,7,NULL,'complete',19000.00,1,NULL,'?꾩젣??56','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','2025-01-13 04:20:18','2025-01-13 04:20:18','3520001','?쇘럦???겼벨躍??긷뙒','2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','pay-confirm'),(9,6,NULL,'complete',50000.00,1,NULL,'?꾩젣??56','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','2025-01-13 04:34:36','2025-01-13 04:34:36','3520001','?쇘럦???겼벨躍??긷뙒','2訝곭쎅40???룔궋?ャ깛?с궕恙쀦쑉201?룟?','pay-confirm'),(10,11,NULL,'complete',16000.00,1,NULL,'?쇰쭏紐⑦넗??,'h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 蜈욥뇦?룔깵?ャ깯?녈궠?앫꺖301','2025-01-13 05:03:17','2025-01-13 05:03:17','3520001','?쇘럦???겼벨躍??긷뙒','蜈욥뇦?룔깵?ャ깯?녈궠?앫꺖301','pay-confirm'),(11,23,NULL,'complete',12000.00,1,NULL,'jeHyun','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','2025-01-23 07:50:00','2025-01-23 07:50:00','3520001','?쇘럦???겼벨躍??긷뙒','Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','pay-confirm'),(12,24,5,'complete',84000.00,1,NULL,'user1','user1@system.com','07012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302','2025-01-25 00:50:48','2025-02-01 08:04:35','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302','pay-confirm'),(13,17,6,'complete',8000.00,1,NULL,'user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302','2025-01-25 04:49:35','2025-01-25 04:49:35','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302','pay-confirm'),(14,1,6,'complete',130000.00,1,NULL,'user2','user2@system.com','01094051987','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302 2踰덉㎏ 援ъ엯','2025-01-25 05:04:01','2025-01-25 05:04:01','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302 2踰덉㎏ 援ъ엯','pay-confirm'),(15,18,6,'complete',45000.00,1,NULL,'user2','user2@system.com','01094051987','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302 3踰덉㎏ 援ъ엯','2025-01-25 05:29:32','2025-01-25 05:29:32','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302 3踰덉㎏ 援ъ엯','pay-confirm'),(16,20,6,'complete',16500.00,3,NULL,'user2','user2@system.com','01094051987','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302 4踰덉㎏ 援ъ엯','2025-01-25 05:42:30','2025-01-25 05:42:30','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302 4踰덉㎏ 援ъ엯','pay-confirm'),(17,5,6,'complete',30000.00,1,'616563ae-9e3d-41d4-b2af-1c5a1aa483b5','user2','user2@system.com','01094051987','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302 5踰덉㎏ 援ъ엯','2025-01-25 06:27:35','2025-01-25 06:27:35','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302 5踰덉㎏ 援ъ엯','pay-confirm'),(18,23,6,'pending',6000.00,1,'9b1e41bf-c88d-49af-9fb8-1d4614143f1a','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 1踰덉㎏ 援ъ엯','2025-01-27 04:04:57','2025-01-27 04:04:57','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 1踰덉㎏ 援ъ엯','pay-confirm'),(19,22,6,'pending',9900.00,1,'02a54c41-c4a7-4fd0-8715-ee9e837aaf41','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 1踰덉㎏ 援ъ엯','2025-01-27 04:04:57','2025-01-27 04:04:57','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 1踰덉㎏ 援ъ엯','pay-confirm'),(20,11,6,'pending',16000.00,2,'b20cfb59-e85d-429c-9d99-202646ee8bfe','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','2025-01-27 05:49:07','2025-01-27 05:49:07','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','pay-confirm'),(21,11,6,'pending',16000.00,2,'79670315-4344-494a-90fc-a6082acc3230','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','2025-01-27 05:50:43','2025-01-27 05:50:43','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','pay-confirm'),(22,11,6,'pending',16000.00,2,'fc8db3a1-3adf-410a-83b4-fb91710c5dcf','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','2025-01-27 05:52:24','2025-01-27 05:52:24','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','pay-confirm'),(23,11,6,'complete',16000.00,2,'2209b952-bfb4-443a-ac92-0d950ae745bb','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','2025-01-27 06:00:00','2025-01-27 06:00:09','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 2踰덉㎏ 援ъ엯','pay-confirm'),(24,4,6,'complete',60000.00,2,'ccfe9fe4-0806-4611-97d2-86172ad58d95','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 3踰덉㎏ 援ъ엯','2025-01-27 06:07:37','2025-01-27 06:07:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 3踰덉㎏ 援ъ엯','pay-confirm'),(25,5,6,'complete',30000.00,1,'ccfe9fe4-0806-4611-97d2-86172ad58d95','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 3踰덉㎏ 援ъ엯','2025-01-27 06:07:37','2025-01-27 06:07:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 3踰덉㎏ 援ъ엯','pay-confirm'),(26,14,6,'pending',30000.00,2,'e6fe630b-2028-4370-a456-837a1cc31ec7','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302 4踰덉㎏ 援ъ엯','2025-01-27 06:21:00','2025-01-27 06:21:00','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302 4踰덉㎏ 援ъ엯','pay-confirm'),(27,8,6,'pending',15000.00,1,'8f19b077-47e0-43a6-88f8-4058ab087111','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 5踰덉㎏ 援ъ엯','2025-01-27 06:24:42','2025-01-27 06:24:42','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 5踰덉㎏ 援ъ엯','pay-confirm'),(28,7,6,'pending',19000.00,1,'8f19b077-47e0-43a6-88f8-4058ab087111','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 5踰덉㎏ 援ъ엯','2025-01-27 06:24:42','2025-01-27 06:24:42','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 5踰덉㎏ 援ъ엯','pay-confirm'),(29,8,6,'pending',15000.00,1,'b8700ced-65d9-4a5b-9e93-e3eb4199e38e','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 6踰덉㎏ 援ъ엯','2025-01-27 06:25:41','2025-01-27 06:25:41','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 6踰덉㎏ 援ъ엯','pay-confirm'),(30,7,6,'pending',19000.00,1,'b8700ced-65d9-4a5b-9e93-e3eb4199e38e','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 6踰덉㎏ 援ъ엯','2025-01-27 06:25:41','2025-01-27 06:25:41','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 6踰덉㎏ 援ъ엯','pay-confirm'),(31,8,6,'complete',15000.00,1,'ae4ecb34-a8b2-4994-afad-aeb9fd62bd5c','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 7踰덉㎏ 援ъ엯','2025-01-27 06:26:28','2025-01-27 06:26:36','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 7踰덉㎏ 援ъ엯','pay-confirm'),(32,7,6,'complete',19000.00,1,'ae4ecb34-a8b2-4994-afad-aeb9fd62bd5c','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 7踰덉㎏ 援ъ엯','2025-01-27 06:26:28','2025-01-27 06:26:36','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 7踰덉㎏ 援ъ엯','pay-confirm'),(33,14,6,'complete',30000.00,2,'57049a60-7a2e-463e-9f03-237940bf04a1','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','2025-01-27 07:14:36','2025-01-27 07:14:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','pay-confirm'),(34,19,6,'complete',5500.00,1,'57049a60-7a2e-463e-9f03-237940bf04a1','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','2025-01-27 07:14:36','2025-01-27 07:14:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','pay-confirm'),(35,8,6,'complete',15000.00,1,'25c0acf6-8bb1-44ec-a3c2-a68e9c0cf872','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','2025-01-27 07:19:48','2025-01-27 07:20:00','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','pay-confirm'),(36,7,6,'complete',19000.00,1,'25c0acf6-8bb1-44ec-a3c2-a68e9c0cf872','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','2025-01-27 07:19:48','2025-01-27 07:20:00','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 8踰덉㎏ 援ъ엯','pay-confirm'),(37,8,6,'complete',15000.00,1,'04149bd8-926f-4a09-8ac1-f8a3dabc701b','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 10踰덉㎏ 援ъ엯','2025-01-27 07:22:30','2025-01-27 07:22:39','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 10踰덉㎏ 援ъ엯','pay-confirm'),(38,7,6,'complete',19000.00,1,'04149bd8-926f-4a09-8ac1-f8a3dabc701b','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 10踰덉㎏ 援ъ엯','2025-01-27 07:22:30','2025-01-27 07:22:39','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 10踰덉㎏ 援ъ엯','pay-confirm'),(39,8,6,'complete',15000.00,1,'766f7687-c43c-4852-b972-1d8640850af7','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 11踰덉㎏ 援ъ엯','2025-01-27 07:25:19','2025-01-27 07:25:27','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 11踰덉㎏ 援ъ엯','pay-confirm'),(40,7,6,'complete',19000.00,1,'766f7687-c43c-4852-b972-1d8640850af7','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 11踰덉㎏ 援ъ엯','2025-01-27 07:25:19','2025-01-27 07:25:27','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 11踰덉㎏ 援ъ엯','pay-confirm'),(41,8,6,'complete',15000.00,1,'2cd3925f-31f6-4780-9810-1d0b04e730ab','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:26:52','2025-01-27 07:27:05','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(42,7,6,'complete',19000.00,1,'2cd3925f-31f6-4780-9810-1d0b04e730ab','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:26:52','2025-01-27 07:27:05','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(43,8,6,'complete',15000.00,1,'0844e0c0-a670-4bd8-8356-de9cc5b30966','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:30:16','2025-01-27 07:30:28','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(44,7,6,'complete',19000.00,1,'0844e0c0-a670-4bd8-8356-de9cc5b30966','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:30:16','2025-01-27 07:30:28','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(45,8,6,'complete',15000.00,1,'0e3c5121-3616-42b5-a9ae-c0da41b95829','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:31:10','2025-01-27 07:31:19','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(46,7,6,'complete',19000.00,1,'0e3c5121-3616-42b5-a9ae-c0da41b95829','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 ?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','2025-01-27 07:31:10','2025-01-27 07:31:19','1200026','?긴벵??擁녕쳦???껂퐦??뵼','?λ컮援щ땲 蹂듭닔?곹뭹 12踰덉㎏ 援ъ엯','pay-confirm'),(47,19,6,'complete',5500.00,1,'812eea06-a357-4e8f-9fbf-32b5029cc5dc','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302','2025-01-27 10:19:37','2025-01-27 10:19:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302','pay-confirm'),(48,8,6,'complete',15000.00,1,'812eea06-a357-4e8f-9fbf-32b5029cc5dc','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 Akatsuki #302','2025-01-27 10:19:37','2025-01-27 10:19:46','1200026','?긴벵??擁녕쳦???껂퐦??뵼','Akatsuki #302','pay-confirm'),(49,8,6,'complete',15000.00,1,'2f1f2339-82a8-4985-ad09-c0d30d0531dc','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 移댄듃?먯꽌 ?쒓굅媛 ?섎뒗吏 ?뚯뒪???섎뒗 二쇰Ц','2025-01-27 13:03:11','2025-01-27 13:03:22','1200026','?긴벵??擁녕쳦???껂퐦??뵼','移댄듃?먯꽌 ?쒓굅媛 ?섎뒗吏 ?뚯뒪???섎뒗 二쇰Ц','pay-confirm'),(50,7,6,'complete',19000.00,1,'2f1f2339-82a8-4985-ad09-c0d30d0531dc','user2','user2@system.com','09012345678','1200026 ?긴벵??擁녕쳦???껂퐦??뵼 移댄듃?먯꽌 ?쒓굅媛 ?섎뒗吏 ?뚯뒪???섎뒗 二쇰Ц','2025-01-27 13:03:11','2025-01-27 13:03:22','1200026','?긴벵??擁녕쳦???껂퐦??뵼','移댄듃?먯꽌 ?쒓굅媛 ?섎뒗吏 ?뚯뒪???섎뒗 二쇰Ц','pay-confirm'),(51,23,5,'complete',6000.00,1,'4194badd-f2f0-4605-8895-c68fb516da29','jeHyun','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','2025-01-28 14:19:24','2025-02-01 07:51:25','3520001','?쇘럦???겼벨躍??긷뙒','Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','pay-confirm'),(52,22,5,'complete',9900.00,1,'f3c9951c-4da9-4479-b656-a58ae30e29a6','JUN JEHYUN','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','2025-02-01 08:39:22','2025-02-01 08:39:22','3520001','?쇘럦???겼벨躍??긷뙒','Saitama-ken, Niiza-shi, Tohoku2\r\n40-7 Alvireo Shiki #201','pay-confirm'),(53,22,5,'complete',29700.00,3,'87fb4910-7f4b-49ec-a23c-45c1c5edaa88','JUN JEHYUN','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 寃쎌긽?⑤룄 李쎌썝???대같苑곸큹','2025-02-01 08:40:08','2025-02-01 08:40:08','3520001','?쇘럦???겼벨躍??긷뙒','寃쎌긽?⑤룄 李쎌썝???대같苑곸큹','pay-confirm'),(54,16,5,'complete',39500.00,5,'851d75f8-af00-42a5-8ea8-7b1d96efacb6','?꾩젣??,'h94051987@gmail.com','01094051987','3520001 ?쇘럦???겼벨躍??긷뙒 ?ъ씠?留덊쁽','2025-02-01 08:46:40','2025-02-01 08:48:28','3520001','?쇘럦???겼벨躍??긷뙒','?ъ씠?留덊쁽','delivery'),(55,20,5,'complete',5500.00,1,'3ff30d12-f096-469f-be88-dddcd343ff94','?꾩젣??','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 ?꾩퓙','2025-02-01 08:51:45','2025-02-01 08:55:04','3520001','?쇘럦???겼벨躍??긷뙒','?꾩퓙','complete'),(56,19,5,'complete',5500.00,1,'3ff30d12-f096-469f-be88-dddcd343ff94','?꾩젣??','h94051987@gmail.com','07020168772','3520001 ?쇘럦???겼벨躍??긷뙒 ?꾩퓙','2025-02-01 08:51:45','2025-02-01 08:53:44','3520001','?쇘럦???겼벨躍??긷뙒','?꾩퓙','prepare');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT  IGNORE INTO `sessions` VALUES ('QOSPjBQKMPmou5NSTpPpxYXGbXqy2xqwGx0MRfcy',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTUcxT0ttMHRqZ2llVUVzeVhFVWI0cHQwUDRHS2IxNUcwcnFpZ0lGZSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvaXRlbV9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1738498652),('uSoWWRHVHT7VBKPN8lebs63I74xQEzXA46b94VNi',5,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRngyRk1oVUY4TWlBdWhkV25MM3hTbXd3MVZXbzNrVkdxUjc3UjE0VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pdGVtX2luZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9',1738420905);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT  IGNORE INTO `users` VALUES (1,'admin1','admin1@system.com',NULL,'$2y$12$/y45T9AxkT7WEBPuiZ41Qun52LqUgK4m6Os5HU4CuAJsqytWnnsiq',NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-23 04:50:29','2025-01-23 04:50:29','admin'),(5,'user1','user1@system.com',NULL,'$2y$12$1G9PtZtnK6vncXSMx6ekke0ydKYFKwNerGAK7c/dzpkkQIlsGFT0G',NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-23 05:52:25','2025-01-23 05:52:25','user'),(6,'user2','user2@system.com',NULL,'$2y$12$lyoLU2.BpHEwryDhNFsfUO8erop6xYIQwMi7E0jz7pG5547gsUA86',NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-25 01:17:57','2025-01-25 01:17:57','user');
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

-- Dump completed on 2025-02-02 21:38:37
