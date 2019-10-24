/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : manager_student

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 24/10/2019 14:36:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `classes_faculty_id_foreign`(`faculty_id`) USING BTREE,
  CONSTRAINT `classes_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES (1, 1, 'Công nghệ thông tin', '2019-09-18 01:46:55', '2019-09-18 01:46:55');
INSERT INTO `classes` VALUES (2, 1, 'Công nghệ thông tin 1', '2019-10-08 09:39:39', '2019-10-08 09:39:39');
INSERT INTO `classes` VALUES (3, 1, 'Công nghệ thông tin 2', '2019-10-08 09:39:50', '2019-10-08 09:39:50');
INSERT INTO `classes` VALUES (4, 2, 'Kế toán 1', '2019-10-08 09:40:09', '2019-10-08 09:40:09');
INSERT INTO `classes` VALUES (5, 2, 'Kế toán 2', '2019-10-08 09:40:18', '2019-10-08 09:40:18');
INSERT INTO `classes` VALUES (6, 2, 'Kế toán 3', '2019-10-08 09:40:27', '2019-10-08 09:40:27');

-- ----------------------------
-- Table structure for faculties
-- ----------------------------
DROP TABLE IF EXISTS `faculties`;
CREATE TABLE `faculties`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faculties
-- ----------------------------
INSERT INTO `faculties` VALUES (1, 'Khoa học máy tính', 'khoa-hoc-may-tinh', '2019-09-18 01:46:55', '2019-10-08 09:39:14');
INSERT INTO `faculties` VALUES (2, 'Tài chính kế toán', 'tai-chinh-ke-toan', '2019-09-24 04:51:35', '2019-09-24 04:51:35');
INSERT INTO `faculties` VALUES (3, 'Quản trị kinh doanh', 'quan-tri-kinh-doanh', '2019-09-24 04:51:56', '2019-09-24 04:51:56');
INSERT INTO `faculties` VALUES (4, 'Kế hoạch đầu tư', 'ke-hoach-dau-tu', '2019-09-24 04:53:45', '2019-09-24 04:53:45');
INSERT INTO `faculties` VALUES (5, 'Tài nguyên môi trường', 'tai-nguyen-moi-truong', '2019-09-24 06:10:05', '2019-09-24 06:10:05');
INSERT INTO `faculties` VALUES (6, 'Bất động sản', 'bat-dong-san', '2019-09-24 06:10:58', '2019-09-24 06:10:58');
INSERT INTO `faculties` VALUES (44, 'Kế toán kiểm toán', 'ke-toan-kiem-toan', '2019-09-27 04:24:05', '2019-09-27 04:24:05');
INSERT INTO `faculties` VALUES (45, 'Kế hoạch', 'ke-hoach', '2019-09-27 04:24:06', '2019-09-27 04:24:06');
INSERT INTO `faculties` VALUES (47, 'Kế toán kiểm toán 2', 'ke-toan-kiem-toan-2', '2019-09-27 04:25:27', '2019-09-27 04:25:27');
INSERT INTO `faculties` VALUES (48, 'Kế hoạch', 'ke-hoach-1', '2019-09-27 04:25:27', '2019-09-27 04:25:27');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES (1, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084144, 1570084144);
INSERT INTO `jobs` VALUES (2, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084204, 1570084204);
INSERT INTO `jobs` VALUES (3, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084264, 1570084264);
INSERT INTO `jobs` VALUES (4, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084324, 1570084324);
INSERT INTO `jobs` VALUES (5, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084384, 1570084384);
INSERT INTO `jobs` VALUES (6, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084444, 1570084444);
INSERT INTO `jobs` VALUES (7, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084504, 1570084504);
INSERT INTO `jobs` VALUES (8, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084564, 1570084564);
INSERT INTO `jobs` VALUES (9, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084624, 1570084624);
INSERT INTO `jobs` VALUES (10, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084684, 1570084684);
INSERT INTO `jobs` VALUES (11, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084744, 1570084744);
INSERT INTO `jobs` VALUES (12, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084804, 1570084804);
INSERT INTO `jobs` VALUES (13, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084864, 1570084864);
INSERT INTO `jobs` VALUES (14, 'default', '{\"displayName\":\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:64:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Events\\\\StatisticsUpdated\\\":1:{s:28:\\\"\\u0000*\\u0000webSocketsStatisticsEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:72:\\\"BeyondCode\\\\LaravelWebSockets\\\\Statistics\\\\Models\\\\WebSocketsStatisticsEntry\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1570084924, 1570084924);

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (3, 1, 2, 'a', 0, '2019-10-11 10:13:06', '2019-10-11 03:13:06');
INSERT INTO `messages` VALUES (4, 1, 209, 'a', 1, '2019-10-11 10:17:37', '2019-10-11 03:19:17');
INSERT INTO `messages` VALUES (5, 209, 1, 'aaa', 1, '2019-10-11 10:18:26', '2019-10-11 03:19:17');
INSERT INTO `messages` VALUES (6, 209, 1, 'aa', 1, '2019-10-11 10:19:02', '2019-10-11 03:19:17');
INSERT INTO `messages` VALUES (7, 1, 209, 'aaaaaaa', 1, '2019-10-11 10:19:17', '2019-10-11 03:19:17');
INSERT INTO `messages` VALUES (8, 209, 224, 'aaaaaaaaa', 0, '2019-10-11 10:21:24', '2019-10-11 03:21:24');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_07_09_1_faculties', 1);
INSERT INTO `migrations` VALUES (4, '2019_07_09_2_classes', 1);
INSERT INTO `migrations` VALUES (5, '2019_07_09_3_subjects', 1);
INSERT INTO `migrations` VALUES (6, '2019_07_09_5_students', 1);
INSERT INTO `migrations` VALUES (7, '2019_07_09_5_students_subjects', 1);
INSERT INTO `migrations` VALUES (8, '2019_07_09_6_translations', 1);
INSERT INTO `migrations` VALUES (9, '2019_07_12_040704_create_test_table', 1);
INSERT INTO `migrations` VALUES (10, '2019_08_06_064246_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (11, '2019_08_12_045634_create_social_accounts_table', 1);
INSERT INTO `migrations` VALUES (12, '2019_09_04_082225_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (13, '2016_06_01_000001_create_oauth_auth_codes_table', 2);
INSERT INTO `migrations` VALUES (14, '2016_06_01_000002_create_oauth_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (15, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2);
INSERT INTO `migrations` VALUES (16, '2016_06_01_000004_create_oauth_clients_table', 2);
INSERT INTO `migrations` VALUES (17, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);
INSERT INTO `migrations` VALUES (18, '2019_10_02_084517_create_websockets_statistics_entries_table', 2);
INSERT INTO `migrations` VALUES (19, '2019_10_03_085928_create_messages_table', 3);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
INSERT INTO `model_has_permissions` VALUES (1, 'App\\User', 2);
INSERT INTO `model_has_permissions` VALUES (1, 'App\\User', 231);
INSERT INTO `model_has_permissions` VALUES (2, 'App\\User', 231);
INSERT INTO `model_has_permissions` VALUES (3, 'App\\User', 231);
INSERT INTO `model_has_permissions` VALUES (4, 'App\\User', 231);
INSERT INTO `model_has_permissions` VALUES (5, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (9, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (9, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (10, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (10, 'App\\User', 231);
INSERT INTO `model_has_permissions` VALUES (11, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (12, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (13, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (13, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (14, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (15, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (16, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (17, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (17, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (18, 'App\\User', 10);
INSERT INTO `model_has_permissions` VALUES (18, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (19, 'App\\User', 10);
INSERT INTO `model_has_permissions` VALUES (19, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (20, 'App\\User', 10);
INSERT INTO `model_has_permissions` VALUES (20, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (21, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (21, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (22, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (22, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (23, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (23, 'App\\User', 207);
INSERT INTO `model_has_permissions` VALUES (24, 'App\\User', 3);
INSERT INTO `model_has_permissions` VALUES (24, 'App\\User', 207);

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 202);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 203);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 209);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 210);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 211);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 212);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 214);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 216);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 222);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 223);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 225);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 227);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 228);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 229);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 230);
INSERT INTO `model_has_roles` VALUES (2, '', 0);
INSERT INTO `model_has_roles` VALUES (2, 'App\\User', 206);
INSERT INTO `model_has_roles` VALUES (2, 'App\\User', 220);
INSERT INTO `model_has_roles` VALUES (2, 'App\\User', 230);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 205);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 207);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 213);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 215);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 217);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 218);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 219);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 221);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 224);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 226);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 231);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 232);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'role-list', 'web', '2019-09-18 01:46:55', '2019-09-18 01:46:55');
INSERT INTO `permissions` VALUES (2, 'role-create', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (3, 'role-edit', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (4, 'role-delete', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (5, 'student-list', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (6, 'student-create', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (7, 'student-edit', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (8, 'student-delete', 'web', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `permissions` VALUES (9, 'class-list', 'web', '2019-09-18 04:13:56', '2019-09-18 04:13:56');
INSERT INTO `permissions` VALUES (10, 'class-create', 'web', '2019-09-18 04:28:30', '2019-09-18 04:28:30');
INSERT INTO `permissions` VALUES (11, 'class-edit', 'web', '2019-09-18 06:36:56', '2019-09-18 06:36:56');
INSERT INTO `permissions` VALUES (12, 'class-delete', 'web', '2019-09-18 06:37:16', '2019-09-18 06:37:16');
INSERT INTO `permissions` VALUES (13, 'faculty-list', 'web', '2019-09-18 06:49:37', '2019-09-18 06:49:37');
INSERT INTO `permissions` VALUES (14, 'faculty-create', 'web', '2019-09-18 06:49:51', '2019-09-18 06:49:51');
INSERT INTO `permissions` VALUES (15, 'faculty-edit', 'web', '2019-09-18 06:50:15', '2019-09-18 06:50:15');
INSERT INTO `permissions` VALUES (16, 'faculty-delete', 'web', '2019-09-18 06:50:34', '2019-09-18 06:50:34');
INSERT INTO `permissions` VALUES (17, 'mark-list', 'web', '2019-09-18 06:51:05', '2019-09-18 06:51:05');
INSERT INTO `permissions` VALUES (18, 'mark-create', 'web', '2019-09-18 06:54:48', '2019-09-18 06:54:48');
INSERT INTO `permissions` VALUES (19, 'mark-edit', 'web', '2019-09-18 06:54:56', '2019-09-18 06:54:56');
INSERT INTO `permissions` VALUES (20, 'mark-delete', 'web', '2019-09-18 06:55:10', '2019-09-18 06:55:10');
INSERT INTO `permissions` VALUES (21, 'subject-list', 'web', '2019-09-24 07:38:26', '2019-09-24 07:38:26');
INSERT INTO `permissions` VALUES (22, 'subject-create', 'web', '2019-09-24 07:38:52', '2019-09-24 07:38:52');
INSERT INTO `permissions` VALUES (23, 'subject-edit', 'web', '2019-09-24 07:39:26', '2019-09-24 07:39:26');
INSERT INTO `permissions` VALUES (24, 'subject-delete', 'web', '2019-09-24 07:39:41', '2019-09-24 07:39:41');
INSERT INTO `permissions` VALUES (25, 'permission-list', 'web', '2019-09-30 09:53:13', '2019-09-30 09:53:13');
INSERT INTO `permissions` VALUES (26, 'permission-create', 'web', '2019-09-30 09:53:37', '2019-09-30 09:53:37');
INSERT INTO `permissions` VALUES (27, 'permission-edit', 'web', '2019-09-30 09:54:00', '2019-09-30 09:54:00');
INSERT INTO `permissions` VALUES (28, 'permission-delete', 'web', '2019-09-30 09:54:20', '2019-09-30 09:54:20');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (5, 4);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (7, 4);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (9, 2);
INSERT INTO `role_has_permissions` VALUES (9, 4);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (13, 4);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (17, 4);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (21, 4);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2019-09-18 01:46:55', '2019-09-18 01:46:55');
INSERT INTO `roles` VALUES (2, 'User', 'web', '2019-09-18 01:46:55', '2019-09-18 01:46:55');
INSERT INTO `roles` VALUES (4, 'Student', 'web', '2019-09-18 08:28:42', '2019-09-30 02:24:25');

-- ----------------------------
-- Table structure for social_accounts
-- ----------------------------
DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE `social_accounts`  (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_code` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `students_class_code_foreign`(`class_code`) USING BTREE,
  INDEX `students_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `students_class_code_foreign` FOREIGN KEY (`class_code`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1007 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 1, 2, 'K. Zouma', 2, '1993-09-01', '1fa11cc4376972fdccc717d975dc8ac7.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959700', 'k-zouma', '2019-09-18 01:50:36', '2019-10-02 06:35:11');
INSERT INTO `students` VALUES (2, 1, 3, 'Kante', 2, '1991-06-24', 'ea3b8530b328fd09f4e45eaa83f02fb4.jpg', '197 Ramiro Corners Suite 474Lake Lethaburgh, MD 22895', '6413881526', 'kante', '2019-09-18 01:50:36', '2019-10-02 06:36:03');
INSERT INTO `students` VALUES (3, 1, 4, 'Willian Borges da Silva', 2, '1997-05-14', '05eb7ddc245d67c7e830131194908ad6.jpg', '548 McKenzie Point Apt. 949Lake Berrytown, MT 12903', '1234567890000', 'willian-borges-da-silva', '2019-09-18 01:50:36', '2019-10-02 06:37:04');
INSERT INTO `students` VALUES (4, 1, 5, 'Olivier Giroud', 1, '1991-10-21', '6c2f6db8ba2cf586f6f665b5ab9d1945.jpg', '285 Padberg GatewaySeamusville, AR 42355-6235', '12546545498', 'olivier-giroud', '2019-09-18 01:50:36', '2019-10-02 06:39:05');
INSERT INTO `students` VALUES (5, 1, 6, 'Mr. Johnathan Little V', 1, '2002-01-05', '2d3e8a7f47cf4d37bf4714329636ed4f.jpg', '2208 Rosenbaum Courts Apt. 884\nBraulioburgh, MI 91054', '+1-838-782-2315', 'mr-johnathan-little-v', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (6, 1, 7, 'Anabel Ondricka', 2, '2013-03-22', '8991e159a4bd631746a078673383901b.jpg', '184 Christiansen Passage\nNew Alexandrine, PA 94406-7849', '551.774.6840 x5668', 'anabel-ondricka', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (7, 1, 8, 'Enola Steuber', 1, '1988-10-25', 'fb7f172feac669677eb9ad57c0d80221.jpg', '23393 Kozey Mountains\nFerryville, UT 45667', '859-774-8963', 'enola-steuber', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (8, 1, 9, 'Ayden Stroman', 2, '1998-09-25', 'a165e968c6e846b9d40d7aa96914084d.jpg', '757 Lester Fields\nWest Bonita, SC 79839-6807', '441.221.3094 x03790', 'ayden-stroman', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (9, 1, 10, 'Dr. Dora Douglas', 1, '2012-12-29', '64fd0802aeaf4fc8de2fa6870c583a17.jpg', '1814 Cremin Bridge\nToychester, MN 35389', '(435) 531-2811', 'dr-dora-douglas', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (10, 1, 11, 'Dave Morar V', 2, '1982-01-08', '931f4436990893cae0ebec5013067ed7.jpg', '854 Pfeffer Shores Apt. 610\nLemkemouth, MI 62763', '+1-378-444-6013', 'dave-morar-v', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (11, 1, 12, 'Dock Bogisich', 2, '1998-05-18', '1b38662822cd03c2ef7d0328bf3a6c7d.jpg', '998 Lillie Isle Apt. 232\nCarterland, NV 06824-5537', '256-408-2713 x9008', 'dock-bogisich', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (12, 1, 13, 'Prof. Mitchel Reilly II', 1, '1978-09-25', '8736526e740081b21c13ef79f3fb72aa.jpg', '15421 Hiram Stream\nStephenburgh, RI 96290', '1-225-360-9432 x60761', 'prof-mitchel-reilly-ii', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (13, 1, 14, 'Prof. Andre Spencer', 2, '1994-05-30', 'b793ee448830edb17928ba26cb895d97.jpg', '435 Bechtelar Curve\nMurazikbury, WY 17026', '(819) 805-5472', 'prof-andre-spencer', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (14, 1, 15, 'Mrs. Fabiola Davis', 1, '2016-02-09', 'f1ad51480c3c4cc8fc6e7c7d5c482119.jpg', '82218 Leuschke Ville\nIdellaland, MA 91382-2534', '1-329-722-7819 x25736', 'mrs-fabiola-davis', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (15, 1, 16, 'Dr. Eriberto Ruecker', 2, '1989-05-07', 'd53fe7730c05f6f9246b31a6c5bdc6a4.jpg', '2317 Marietta Oval\nLangchester, ME 14334-9554', '1-751-868-4663', 'dr-eriberto-ruecker', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (16, 1, 17, 'Donna Stehr', 1, '1989-07-02', '4cc6432f22d20644af687604ef1c8c73.jpg', '519 Gage Road Suite 770\nCollinschester, WA 68944', '590.469.5612 x2430', 'donna-stehr', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (17, 1, 18, 'Isabel Considine', 1, '1999-04-21', 'acddc3eb8fc4e4bfc3bb3f3bd1cb7dd1.jpg', '5420 Carter Pine Suite 679\nNew Kendrickstad, CO 66330-1423', '1-385-309-7276 x94509', 'isabel-considine', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (18, 1, 19, 'Gregorio Oberbrunner', 2, '2008-12-14', 'd32f22c6e35a0aab9bb2301c1728f855.jpg', '2798 Hane Lodge\nSpencerchester, MA 21405-6844', '+1 (398) 362-2938', 'gregorio-oberbrunner', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (19, 1, 20, 'Mr. Porter Boehm MD', 1, '1991-12-05', '28fca8577e6ab6ad96b318a7be504ab3.jpg', '202 Turner Courts\nVonside, AR 50511', '+1.201.288.8678', 'mr-porter-boehm-md', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (20, 1, 21, 'Prof. Johathan Bahringer', 1, '1992-08-01', '5af0c346f5e39626b53aff0fa6c370b1.jpg', '2353 Jones Circle\nMillston, ND 39767', '1-285-724-6338', 'prof-johathan-bahringer', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (21, 4, 22, 'Heloise Gibson III', 2, '1991-12-03', '8b115e2ab3f90aa67f574ea4003b3ee4.jpg', '50689 Zboncak Throughway\nLake Georgette, FL 42050-3766', '910-977-3855 x705', 'heloise-gibson-iii', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (22, 5, 23, 'Jean Bergnaum', 2, '1983-01-03', '9d33a8c00852a647413282f330170a04.jpg', '1943 Pacocha Squares Apt. 300\nWest Austynfort, FL 73404-1064', '469-490-0660 x816', 'jean-bergnaum', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (23, 6, 24, 'Melyna Rath V', 2, '1975-03-06', '58e414f6c9a0e43d65923328300036f3.jpg', '857 Johnny Unions\nLake D\'angelochester, ME 24378-2042', '525-321-1950', 'melyna-rath-v', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (24, 1, 25, 'Peter Borer', 2, '2007-10-23', 'aefb2742bfe951410273c1174dce7467.jpg', '470 Ozella Island\nKuvalisburgh, NM 10774', '(535) 388-4868 x112', 'peter-borer', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (25, 1, 26, 'Joey Farrell', 1, '1982-05-31', '6397608fecdd97479ebd91601ffd6815.jpg', '419 Tillman Viaduct\nNorth Fredyport, OH 96543-9435', '+1-298-800-8917', 'joey-farrell', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (26, 1, 27, 'Colt Shields', 2, '2010-01-13', '1cc5c7f8102d94b16a713c5bb7b40ee1.jpg', '368 Vince Creek Apt. 919\nLefflerville, MT 53313-1889', '(481) 301-3386', 'colt-shields', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (28, 1, 29, 'Ford Schmeler MD', 1, '1974-12-11', '65b8770ba9be5039232f89954b8a6038.jpg', '5514 Kertzmann Villages Apt. 381\nNorth Billieport, MN 78168-6771', '272.474.7051', 'ford-schmeler-md', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (29, 1, 30, 'Amelia Ziemann', 2, '1997-04-23', '5a36d596f404c5c22dcd79ce4f70d0d2.jpg', '414 Tromp Rapid Suite 316\nEnostown, MD 58591-4777', '601-619-5411', 'amelia-ziemann', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (30, 1, 31, 'Kayley Reilly', 1, '1982-12-24', 'dfdce779d09f0884be58614a27532367.jpg', '23541 Mallie Valley Apt. 221\nEast Hassan, NJ 46954', '967.328.0432 x312', 'kayley-reilly', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (32, 1, 33, 'Florian DuBuque DVM', 1, '2013-03-11', 'f62f9fa78242e96548d4db407d19968b.jpg', '645 Richmond Freeway\nNew Candido, MI 22385', '854.832.6666 x5467', 'florian-dubuque-dvm', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (33, 1, 34, 'Prof. Elmo Gorczany', 1, '1986-11-07', '5963b1c9184516f06e7f01a1a5f9f057.jpg', '53716 Ansley Course Apt. 615\nMireyamouth, RI 26223', '582.524.0998 x898', 'prof-elmo-gorczany', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `students` VALUES (34, 1, 35, 'Alexis Ankunding', 1, '1982-09-21', 'a4d09750a0e2595960746a6bf63ce33e.jpg', '8833 Bailey Orchard Suite 857\nPort Marianna, MN 52278-7535', '+1 (454) 233-5494', 'alexis-ankunding', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (35, 1, 36, 'Mrs. Roberta Orn', 1, '2005-10-23', '83a94e366ee18fc1a0e6068960f06757.jpg', '1154 Cecelia Islands Suite 234\nLewland, NM 00364-7349', '+1.725.807.6690', 'mrs-roberta-orn', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (36, 1, 37, 'Pat Bechtelar', 2, '1988-11-14', '993aa6a2fb494366132437c3819f7bc6.jpg', '3584 Larson Spur Apt. 121\nHarmonyland, WI 98523', '1-625-253-1690 x8683', 'pat-bechtelar', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (37, 1, 38, 'Armani Boehm', 1, '1976-06-05', '8bb64e5ea6a9bd1e802c13da6f255fe0.jpg', '8779 Missouri Villages Apt. 480\nDurganville, OK 41200', '(341) 971-6076 x7701', 'armani-boehm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (38, 1, 39, 'Roma Crona', 1, '1985-01-04', '01f3631abd6c4d6821b32ec8811f53a7.jpg', '351 Kreiger Roads\nEast Vinnieton, MT 65731-9119', '(937) 368-7829 x4361', 'roma-crona', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (39, 1, 40, 'Johnpaul Gottlieb', 1, '2018-02-06', '965e9d460d1e7bb686329696e90cd366.jpg', '4502 Sofia Pike Apt. 442\nGoodwinburgh, IN 29352-4189', '+1.809.327.7531', 'johnpaul-gottlieb', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (40, 1, 41, 'Sheila Ferry III', 1, '1999-06-03', '0ead08d3c9c724fe05a024a13a6636df.jpg', '7819 Carli Avenue Apt. 122\nEast Jarrodtown, HI 84822-2082', '257-339-5524', 'sheila-ferry-iii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (42, 1, 43, 'Vanessa Kemmer MD', 2, '1996-01-10', '3080aa91508267b09a6cafe7469ca041.jpg', '818 King Tunnel\nDelbertborough, OR 52058-2500', '(878) 747-0417', 'vanessa-kemmer-md', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (43, 1, 44, 'Joshuah Mayer', 2, '2007-11-09', '12f33a1e7387869fd9058952d7c72bbe.jpg', '3874 Laila Highway\nMertzborough, KY 30386', '1-330-658-5659 x4123', 'joshuah-mayer', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (44, 1, 45, 'Valerie Bergstrom', 1, '1982-08-10', '636151f393a5b028ffc8c8cf8e49d8ee.jpg', '14561 Adams Rapid Suite 482\nLake Jodie, MA 14115-8958', '+1 (654) 581-8459', 'valerie-bergstrom', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (45, 1, 46, 'Rashawn Hoppe', 1, '2005-06-21', '0cef084ed5f4ed245b41b7b6674980de.jpg', '626 Retta Islands\nLake Freddy, GA 04109', '210-899-6061', 'rashawn-hoppe', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (46, 1, 47, 'Blake Rippin II', 1, '2017-10-08', '4f8d2dcf3561dead52b7711cf2487a5f.jpg', '793 Hayley Alley\nPort Hilma, PA 07651-8790', '(296) 619-6596', 'blake-rippin-ii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (47, 1, 48, 'Viva Purdy', 2, '2015-02-14', '76ed55259958f5c35e59bfe7e52a6014.jpg', '82003 Rosa Underpass\nJarrettberg, CO 70902-0170', '1-587-241-2780', 'viva-purdy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (48, 1, 49, 'Euna Hauck', 1, '1974-04-02', 'c30d8921d58936cb457260078bca777f.jpg', '58127 Lesch Meadows\nEast Judd, IN 23045', '676-457-2425', 'euna-hauck', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (49, 1, 50, 'Ludie Littel III', 1, '2004-04-20', '95283c9f13886f36a6f583ac7485cd66.jpg', '1166 Harley Field\nNorth Ralph, WA 33154-0578', '+1 (330) 476-5496', 'ludie-littel-iii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (50, 1, 51, 'Felipa Harber', 2, '1971-05-29', '331fc5f0c170d1fc44a36a2fc4ab23b2.jpg', '8002 Dorothy Drive\nHeidiville, WA 22172-0090', '1-787-978-2493 x212', 'felipa-harber', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (51, 1, 52, 'Dr. Madalyn Morissette', 2, '2016-05-25', '2450cb0567bd9bf8a4446d1b6a9c3fa1.jpg', '589 Ashley Station\nLake Savanna, FL 84976', '1-386-471-9765 x088', 'dr-madalyn-morissette', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (52, 1, 53, 'Dr. Alberta Runolfsson DDS', 1, '1978-05-13', 'ac47213d13e9d3c4738dd85d7334d36e.jpg', '321 White Cliffs\nMayborough, RI 90649', '670-375-0365 x080', 'dr-alberta-runolfsson-dds', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (53, 1, 54, 'Corrine Abshire', 1, '1996-02-27', 'cd0b04a20ce73f6b2ddf753e6da9a130.jpg', '33456 Hamill Island Suite 126\nConsidineburgh, IN 09348', '245.946.5448 x6909', 'corrine-abshire', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (54, 1, 55, 'Mr. Anastacio Willms', 2, '1976-12-15', 'b1bc15a907f9b8c83834e15f39077482.jpg', '87927 Schinner Expressway\nWest Eugene, MN 47460-2208', '479.223.2194 x9761', 'mr-anastacio-willms', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (55, 1, 56, 'Jaylon Trantow', 1, '2009-04-09', '75bb35daee03b102db03886e4f3d0329.jpg', '9133 Hamill Plain\nWest Bulahchester, AR 77546', '(748) 339-5926 x1114', 'jaylon-trantow', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (56, 1, 57, 'Kristy Bartoletti', 1, '2016-07-20', '5c900f71522cc9f32afab084607b4281.jpg', '85241 Keshawn Valleys Apt. 176\nKulasshire, ND 31750-6920', '(469) 524-8347', 'kristy-bartoletti', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (57, 1, 58, 'Lenore O\'Hara V', 1, '2013-02-24', 'f29376313f54d746ac6c4c0505949225.jpg', '96784 Duncan Inlet Suite 874\nLake Wilbert, AL 54323-1440', '(981) 521-4777', 'lenore-o-hara-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (58, 1, 59, 'Mr. Scottie Heathcote', 1, '2018-04-10', '54c7a8b655c6a9f703438bba638815d1.jpg', '881 Kub Ports Apt. 826\nMarcusport, ID 39728-0671', '+1-316-908-1892', 'mr-scottie-heathcote', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (59, 1, 60, 'Lila Krajcik', 2, '1992-05-16', '99eeac8175c08b0f34978ceb38aa4e33.jpg', '2430 Stoltenberg Course\nLake Reymundo, IA 59896', '780-644-6526 x0892', 'lila-krajcik', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (60, 1, 61, 'Ms. Magdalen Cummings', 1, '1979-09-16', '453e3f8fe141b834b76b7283f2e4e93b.jpg', '435 Kunde Green Apt. 320\nCarterton, NY 61790', '857.845.6077 x2173', 'ms-magdalen-cummings', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (61, 1, 62, 'Ayana Davis', 1, '1978-01-20', 'd45ecfc2a05ea9769997fa4b08955d81.jpg', '242 Keeley Dam\nLake Everardo, NE 74682-3430', '1-337-313-6014', 'ayana-davis', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (62, 1, 63, 'Terrill Dach', 1, '1994-05-26', '5d9d572671fa64f7276640da70a86444.jpg', '8872 Mina Roads\nSouth Katherynmouth, MD 07196-6790', '559.473.4047 x0497', 'terrill-dach', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (63, 1, 64, 'Toby Quitzon DVM', 2, '2002-02-24', '8bc6210cb1503ab30350e81bc81187bf.jpg', '61998 Ratke Inlet\nNew Hallie, ID 16643', '(312) 898-0162 x2758', 'toby-quitzon-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (64, 1, 65, 'Amelia Strosin', 2, '2005-02-25', '7fa3d38358edd009a0ec6e3f2d60a02c.jpg', '22414 Rau Spring Suite 306\nNorberttown, MN 06151', '+15263218509', 'amelia-strosin', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (65, 1, 66, 'Prof. Domenic Gutmann Jr.', 2, '1993-10-12', '056603a0512b62b0c62d45975839ac3b.jpg', '502 Wilderman Hollow\nEast Lavernchester, AR 42680', '1-429-629-1416 x708', 'prof-domenic-gutmann-jr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (66, 1, 67, 'Dr. Ruth Terry II', 2, '1979-06-08', 'cbaf168e66d841d90a1bce2f53c8a136.jpg', '98523 Hahn Plains Apt. 470\nPort Hayleemouth, ID 11730-8258', '+1.440.620.9554', 'dr-ruth-terry-ii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (67, 1, 68, 'Dr. Rogelio Bednar', 2, '2011-01-23', 'a9f43b2f36ef522227e8b32e5bbd17a5.jpg', '931 Gleason Fords Suite 099\nTrantowfort, RI 26222-5468', '+1.453.926.0645', 'dr-rogelio-bednar', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (68, 1, 69, 'Devin Schowalter', 2, '1987-04-19', 'c3aa17489809aff12c1e4773cd4ad770.jpg', '54699 Langosh Road Apt. 700\nBlandatown, HI 93967', '+19053175133', 'devin-schowalter', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (69, 1, 70, 'Prof. Cortez Dooley', 2, '2015-08-25', '7c5bde601c750a1f7062ee4a6d2aa033.jpg', '62336 Orn Rapid\nLaurymouth, VT 33100-1260', '545.955.1994 x46061', 'prof-cortez-dooley', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (70, 1, 71, 'Loma Blick', 1, '1997-12-27', '8cb538b85c2c2446b60b2c9a8f5d7d2a.jpg', '99116 Philip Gateway Apt. 106\nJedediahhaven, KY 41742-8723', '230.963.6043', 'loma-blick', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (71, 1, 72, 'Dr. Reuben Goldner V', 2, '1998-09-21', '27450e72a0a24c39bea52c0ce54097a8.jpg', '71691 Christiansen Valley Suite 923\nSouth Emilieland, AL 15425', '(587) 469-4437 x3720', 'dr-reuben-goldner-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (72, 1, 73, 'Rosalia Bogisich', 2, '1994-08-27', '594e9324e6165202032dd37593f4c8de.jpg', '6828 Labadie Harbor Apt. 330\nPearlinestad, DE 88307', '1-797-366-4628 x767', 'rosalia-bogisich', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (73, 1, 74, 'Aliya Orn', 1, '2007-10-07', 'f60efe10ece26c24fc5d0fa8f91cd00b.jpg', '12412 Prohaska Station\nAbbottberg, TX 73915-5875', '474.226.2395 x9787', 'aliya-orn', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (74, 1, 75, 'Murl Fadel DDS', 2, '2016-05-12', '775f8e2a69fc2dba9d8bbf7b0f3237c4.jpg', '101 Emelie Mill\nNew Gerardtown, UT 11009', '1-802-556-5724', 'murl-fadel-dds', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (75, 1, 76, 'Earnestine Christiansen', 1, '2008-12-16', '8cd10e7538ade040c197f2964df9856e.jpg', '6079 Josh Tunnel Suite 825\nRathton, MD 87476', '+1.335.720.9440', 'earnestine-christiansen', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (76, 1, 77, 'Alessia Eichmann', 1, '1975-05-06', 'b3febf9f29f0efaab9eebe6791d5822b.jpg', '555 Elenora Mountains Suite 309\nGregbury, MO 94925-9073', '(656) 498-5668', 'alessia-eichmann', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (77, 1, 78, 'Jaquan Bruen', 1, '1982-05-29', '94f886010eb0ed56c078aecf1065d901.jpg', '388 Grant Heights\nVeumburgh, DC 95356-3351', '(376) 759-9345', 'jaquan-bruen', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (78, 1, 79, 'Adele Weimann', 1, '2019-09-13', '3778cf5961d4b7c51b33c665477dfb79.jpg', '9995 Hyatt Branch\nEast Marquis, NM 41857', '+1-646-818-8217', 'adele-weimann', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (79, 1, 80, 'Guadalupe Bogan', 1, '1982-12-12', '5ea6bbbf5a25db7197bfbc446e926fee.jpg', '9755 Legros Islands Apt. 809\nLake Deangelo, KY 00529', '+1-440-394-9988', 'guadalupe-bogan', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (80, 1, 81, 'Beryl Hintz', 1, '2008-08-23', 'ffcfb50c6b1dfe559235c85d623dcd85.jpg', '338 Cecelia Camp Suite 725\nLake Silas, ND 43146-1321', '(256) 660-6051', 'beryl-hintz', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (81, 1, 82, 'Tressa Steuber', 2, '1990-05-11', '11d2f894cad9fa6e0c5eea8fb999b75e.jpg', '29893 Mayer Run Apt. 934\nBartonside, TX 98797', '1-647-939-1106 x2449', 'tressa-steuber', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (82, 1, 83, 'Gene Altenwerth DDS', 1, '1992-11-07', '254e6d5a9069d3c9379cdd2f442b660d.jpg', '96578 Rice Brook\nEast Katrinabury, NV 67469-9791', '(341) 534-4843', 'gene-altenwerth-dds', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (83, 1, 84, 'Lyla Koelpin', 2, '1985-01-15', '14c0ec22ad95280d0ec8d96296e4ac2f.jpg', '69367 Boyle Crossing Apt. 266\nSouth Beau, MT 53688', '+1 (387) 559-1190', 'lyla-koelpin', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (84, 1, 85, 'Prof. Bertha Rolfson DVM', 2, '2017-10-29', 'ada2b675e1cca82a52cb0cdb84b5a758.jpg', '46226 Maximilian Mission Apt. 483\nHettingershire, MN 71620', '+1 (340) 273-8315', 'prof-bertha-rolfson-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (85, 1, 86, 'Prof. Rosamond Trantow MD', 2, '1990-01-16', 'cefff84c24f08a0cdca4fed29accde22.jpg', '276 Brekke Burg\nJoaquinmouth, MT 03990', '1-958-860-2073 x06038', 'prof-rosamond-trantow-md', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (86, 1, 87, 'Kelly Bode', 2, '2014-01-10', 'fc9d5d94a4afe2675dd08a58d223e7ae.jpg', '2755 Gleichner Centers\nPort Otha, TX 28119-1591', '210-706-5537', 'kelly-bode', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (87, 1, 88, 'Prof. Erika Simonis PhD', 2, '2005-09-28', '9495ca7acd5390c6651e9557cb00448c.jpg', '45791 Johan Ranch Apt. 666\nLavernland, KY 14878', '708-691-3967', 'prof-erika-simonis-phd', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (88, 1, 89, 'Chelsea Toy', 2, '1973-05-21', 'f41f443a28fa462cd9a4a728c3bf9cd1.jpg', '58834 Lulu Mission\nNew Fritz, NC 10420-2608', '328-950-0692', 'chelsea-toy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (89, 1, 90, 'Prof. Mac Berge', 2, '2001-12-09', 'fb02be9d611641cf005d285fa8e0d11f.jpg', '502 White Path Suite 418\nEast Ashlee, HI 62314', '+1-326-789-3963', 'prof-mac-berge', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (90, 1, 91, 'Rosella O\'Connell', 1, '1995-01-01', '368f981323f4db6ac0ba9639f0702bef.jpg', '1830 Wilkinson Lake\nEast Kara, CO 03988-1514', '+1.995.468.9424', 'rosella-o-connell', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (91, 1, 92, 'Makenna Klocko III', 2, '2009-04-18', '60f34ed6eeb044458832ab5034262afe.jpg', '9079 Ankunding Trail\nAmaniland, LA 52102-3693', '635.469.8155 x9180', 'makenna-klocko-iii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (92, 1, 93, 'Estevan Wisozk', 1, '2006-08-08', '74521768369c443e20f4c59abbf73311.jpg', '56615 Aufderhar Plains\nRogahnton, ND 12526', '240.679.0918', 'estevan-wisozk', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (93, 1, 94, 'Calista Ward', 1, '2003-10-01', '4f6db2d9f92f01f203e0f755053e6551.jpg', '3100 Burnice Squares Suite 598\nKobyburgh, SD 88028-5547', '878.661.1515 x53212', 'calista-ward', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (94, 1, 95, 'Rickey Kunde', 1, '1980-04-28', 'c9876a853b43b35396eea32bad5963e4.jpg', '44972 Brakus Common\nZboncakbury, NJ 40463', '668.637.8091 x01295', 'rickey-kunde', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (95, 1, 96, 'Mrs. Justine Mante', 2, '2012-08-31', '4ba389ee3d14c37676a73ee89e6505a5.jpg', '549 Cruickshank Streets\nWest Bryana, NJ 25109', '1-761-272-4880 x524', 'mrs-justine-mante', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (96, 1, 97, 'Caroline Greenholt', 2, '2006-01-22', 'b38179981db55e2066aef3bee3a66400.jpg', '1597 Colleen Station\nEast Marlin, HI 19835', '1-346-378-4733', 'caroline-greenholt', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (97, 1, 98, 'Casper Brekke', 1, '2018-07-11', '1c6d064a82f931c5ffe88ff78a54fca1.jpg', '220 Schiller Burgs\nSouth Dereck, KS 91231', '949-910-1774 x42901', 'casper-brekke', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (98, 1, 99, 'Mr. Dorcas Vandervort', 2, '1972-09-13', '31d6dfc932f88080aa12b4ad10badb9f.jpg', '1364 Ralph Ferry Apt. 914\nRosalindaville, AZ 58357', '956.325.9325 x0499', 'mr-dorcas-vandervort', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (99, 1, 100, 'Noemi Gulgowski', 1, '1977-02-25', '6926cf2654da22b161eb2325055593a3.jpg', '482 Corrine Gardens Apt. 382\nWildermanhaven, OR 84684-6095', '386.967.9492 x604', 'noemi-gulgowski', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (100, 1, 101, 'Dr. Gerry Huel', 2, '2010-03-15', 'b6e02001c2c6a4db5d1f2a4eefa9c417.jpg', '3133 Polly Crossroad\nCarmineshire, NM 37183-7014', '378-521-8209 x6941', 'dr-gerry-huel', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (101, 1, 102, 'Dr. Milo Wuckert Jr.', 2, '1997-04-07', '0dfb9460ef64484525190c0e4453732e.jpg', '63661 Randall Bypass\nPort Vicenta, CT 57863-1240', '(952) 799-3992 x0318', 'dr-milo-wuckert-jr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (102, 1, 103, 'Amir Franecki', 2, '1981-01-29', '433f911ad4b727288e9fa089a6592826.jpg', '749 Oren Spring Suite 343\nJettiestad, MT 01481-8318', '392.887.0693 x68026', 'amir-franecki', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (103, 1, 104, 'Mr. Muhammad Renner', 1, '2003-05-06', 'b615d3cb588bbc287922d79262a19652.jpg', '797 Sabrina Canyon\nLake Julius, UT 89367', '782-646-2565', 'mr-muhammad-renner', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (104, 1, 105, 'Laurel Lakin I', 2, '1994-04-16', 'ed3552dc862bc008e1e36417942f5364.jpg', '108 Dorcas Pass Apt. 214\nGrahamland, DE 73251', '459-503-5097', 'laurel-lakin-i', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (105, 1, 106, 'Dr. Forest Schumm V', 2, '1997-03-30', '236a1f097bac37cbeb855de7a2becfe0.jpg', '57255 Dejah Fork\nDickishire, RI 41081-2339', '(902) 203-1263', 'dr-forest-schumm-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (106, 1, 107, 'Karli Huels', 2, '1984-10-03', '9f233d29e5a1c5ac745ae0c229524b30.jpg', '3469 Thiel Road Suite 544\nWest Reannaburgh, MS 34126', '(598) 371-2622 x656', 'karli-huels', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (107, 1, 108, 'Talia Schowalter', 2, '1999-04-03', '7f557bb1b903a8e5800a243ad83b5cad.jpg', '5802 Chelsey Way\nHintzhaven, CT 02679', '246.453.8734', 'talia-schowalter', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (108, 1, 109, 'Kristian O\'Conner DVM', 1, '1985-08-07', '351003c1e84cdc7846b4898b17bec565.jpg', '500 Wolff Hill\nEast Claud, DC 73888', '894-721-7534 x159', 'kristian-o-conner-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (109, 1, 110, 'Prof. Colten Dicki', 1, '2000-02-17', '31896bde51a481aa02dec29d7d96e992.jpg', '69079 Bechtelar Spurs Apt. 900\nWest Obie, GA 02184', '+15682784968', 'prof-colten-dicki', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (110, 1, 111, 'Olga Bruen V', 1, '1987-04-04', 'a8da6de16c01ce5b06308bfa576a0612.jpg', '9931 Brakus Isle\nPort Emeraldfurt, WY 71562', '+1 (893) 867-4096', 'olga-bruen-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (111, 1, 112, 'Creola Littel', 1, '2011-06-13', '7b9ce3845f7827ec29cb349485335ac5.jpg', '9670 Marietta Turnpike Suite 105\nHerzogburgh, WI 35356-0668', '317.898.4487 x69700', 'creola-littel', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (112, 1, 113, 'Jazlyn Heidenreich', 1, '2010-10-05', '6c3ea688ba393d83777771b1566d801f.jpg', '460 Grayson Island Suite 751\nLake Chase, NM 58906', '+1 (313) 767-7832', 'jazlyn-heidenreich', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (113, 1, 114, 'Gloria Stamm', 1, '1980-08-31', '65ee7900f650518c6b3649915301a4d4.jpg', '44814 Sanford Passage Suite 082\nCarriemouth, IN 12856-7641', '+17014494508', 'gloria-stamm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (114, 1, 115, 'Prof. Adalberto Rippin IV', 2, '1972-12-20', '911e143c51493dfb7a87f3baf61df85e.jpg', '6940 Jacobs Landing Suite 030\nSouth Daniellaberg, FL 21816-6985', '1-802-832-6113', 'prof-adalberto-rippin-iv', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (115, 1, 116, 'Vivien Hettinger', 1, '1990-08-09', '2912461f6f6ecee5590cd7422e1db7f4.jpg', '17745 Green Dale Suite 828\nOthamouth, AR 10239-8624', '270-242-1137 x9526', 'vivien-hettinger', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (116, 1, 117, 'Miss Yesenia Casper', 1, '2019-03-17', '5752f7518adabfe54ccc48f886cffdcd.jpg', '85083 Wilfrid Harbor\nPort Halle, NC 98722', '409.474.4635', 'miss-yesenia-casper', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (118, 1, 119, 'Prof. Derick Padberg I', 2, '1983-04-25', 'bc6f1b3d2504c15341f3be167469f842.jpg', '42066 Moore Lodge\nCarliechester, ID 38033-2497', '560.603.5805 x806', 'prof-derick-padberg-i', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (119, 1, 120, 'Demetrius Crona', 2, '1982-04-17', '90c1a18877c0a5f2ef290d83bbd172e0.jpg', '16606 Gerhold Corners\nSouth Maybellchester, IA 94109-6719', '1-790-206-4012 x845', 'demetrius-crona', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (120, 1, 121, 'Garrett D\'Amore', 1, '1990-01-05', '135b98aa4a382839d8b54cd62fea9f2e.jpg', '9354 Joe Pass Suite 933\nWilliamland, HI 87799-0916', '+1 (792) 673-7093', 'garrett-d-amore', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (121, 1, 122, 'Miss Eleanore Schinner', 2, '1990-07-22', '1929390b819b590165232d5d110098c3.jpg', '8605 Asa Curve Suite 984\nWatsonmouth, MO 76659-5651', '+1-350-692-0145', 'miss-eleanore-schinner', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (122, 1, 123, 'Watson Zboncak', 1, '1971-09-02', '585fc8043cd642f9a1117e0b6823811b.jpg', '385 Frami Flats Suite 007\nKingland, LA 98224', '245.890.0870 x432', 'watson-zboncak', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (123, 1, 124, 'Mr. Brock Eichmann', 1, '1974-02-17', '56422b51294f773d04cf16ae26ac0f1a.jpg', '6467 Larson Fall Suite 111\nLake Sigmund, FL 75414-6713', '1-694-564-8198 x5317', 'mr-brock-eichmann', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (124, 1, 125, 'Emily Kerluke', 1, '2016-10-26', '4d3ab37fbf0a5455b2b467182d267f5c.jpg', '440 Camryn Park\nDomenicaberg, VT 64047', '+1 (464) 950-8822', 'emily-kerluke', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (125, 1, 126, 'Darlene Dietrich', 1, '1991-08-04', '49e20b9308e14eeebc56078ab0f066a8.jpg', '7594 Bernardo Dale\nSouth Natalie, NE 28234', '559.639.5171', 'darlene-dietrich', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (126, 1, 127, 'Maud Murazik', 2, '1980-08-03', 'a41ec467d26d0ebab7e76e9427552ed3.jpg', '703 Lakin Alley Apt. 125\nGoyetteville, MD 01713', '+1-536-836-9224', 'maud-murazik', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (127, 1, 128, 'Miss Brittany Paucek DDS', 2, '1975-06-04', 'e6d816402ae370084918b87aa2e20f73.jpg', '2515 Adams Cape\nLestershire, CA 15125-3787', '+18307923065', 'miss-brittany-paucek-dds', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (128, 1, 129, 'Tressa DuBuque', 2, '2010-12-31', 'e5dd5073dc78de18718188ce2e8a0248.jpg', '9828 Keegan Bridge\nArchport, TN 15613', '253-952-2157 x270', 'tressa-dubuque', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (129, 1, 130, 'Dr. Bert Wiza Jr.', 2, '2005-12-28', '947474a940f1333fdec55a32a4466547.jpg', '48542 Domenica Wells Suite 517\nEast Rubie, NV 59512-2507', '+1-864-370-7935', 'dr-bert-wiza-jr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (130, 1, 131, 'Leonora Kertzmann', 2, '1983-07-21', '2901300fc252c9b8fca79739936f9c97.jpg', '621 Zemlak River\nArloport, DC 87792-9180', '845.586.9129 x3642', 'leonora-kertzmann', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (131, 1, 132, 'Emilie Spinka', 1, '1997-09-05', 'ae45fbec7758fa8c676fd0926cf5daed.jpg', '4012 Alexanne Spur Suite 565\nRolfsonland, VT 84037-8507', '+1-315-975-5530', 'emilie-spinka', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (132, 1, 133, 'Luis Waters II', 2, '2016-04-17', 'fa51d01ed58ff1da158db09bb700036e.jpg', '98400 Lorenzo Lodge\nZboncakshire, NV 94196', '929-497-5587 x528', 'luis-waters-ii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (133, 1, 134, 'Americo Schamberger', 2, '2018-01-18', 'ebe026764ec883b6ac895ac5bc9da547.jpg', '52241 Drake Ways Suite 030\nLitzyburgh, OK 09281-1242', '819.583.9075 x2991', 'americo-schamberger', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (134, 1, 135, 'Bridie Mayert Sr.', 2, '2015-03-24', '07f2227e8bc490ae12a2e4d79a958641.jpg', '97380 Muller Fields\nFlatleymouth, NV 30676', '325-947-4754 x40276', 'bridie-mayert-sr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (135, 1, 136, 'Anissa Rutherford', 1, '1975-09-22', '5b6d49f888754c69e7817806027e9639.jpg', '37805 Thelma Creek\nLake Meda, AL 76129-4485', '(418) 789-3155 x096', 'anissa-rutherford', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (136, 1, 137, 'Lynn Breitenberg MD', 2, '2017-09-25', '276a32ab20aedd73910180ce1f9d6c76.jpg', '44053 Fannie Creek\nEast Ocie, NC 31326', '(510) 341-3080 x84949', 'lynn-breitenberg-md', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (137, 1, 138, 'Gino Koelpin', 2, '1981-12-14', '8e46bd8807d1d323050fe78713752d99.jpg', '1919 Bechtelar Fork\nWest Julien, MA 78017', '830-614-7978', 'gino-koelpin', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (138, 1, 139, 'Alysha Toy', 2, '2008-05-19', 'b7e41a481babc8e4ede7d3a6ee995322.jpg', '874 Okuneva Plain Suite 208\nEast Jaron, WV 18021-5768', '(724) 291-5712 x2321', 'alysha-toy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (139, 1, 140, 'Lue Renner', 2, '2010-03-24', 'a4f5fd96d01c0efa4a71080092ec019f.jpg', '76340 Kihn Ramp\nSouth Humbertobury, MI 29649-2296', '1-256-974-6399', 'lue-renner', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (140, 1, 141, 'Quinten Crooks', 2, '2016-02-17', 'd78a57bb0117c8d7536718bbba2747ff.jpg', '74106 Purdy Plain\nLouveniaburgh, TN 35949', '1-210-432-3008', 'quinten-crooks', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (141, 1, 142, 'Marina Jaskolski', 2, '2013-06-29', '7861a23bf0aed2976f3354c9deb01d59.jpg', '3491 Abshire Ports Suite 231\nNaderbury, IA 51952-9125', '1-819-409-6713 x114', 'marina-jaskolski', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (142, 1, 143, 'Shyanne Murazik DVM', 2, '1974-12-14', 'd109d6d119d796023ba09e1d769b6007.jpg', '63464 Jaleel Coves Apt. 541\nCassinstad, CT 56219', '662.341.4880', 'shyanne-murazik-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (143, 1, 144, 'Enid Rempel', 1, '1982-12-01', '89e5c0210277b7fb3504d63804d152d4.jpg', '3327 Marcelina Spur\nWest Justus, DC 78329', '+1.752.269.2312', 'enid-rempel', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (145, 1, 146, 'Clovis Conroy', 1, '1972-05-21', '72d5be33f88357ae8cb81a4377fdb24c.jpg', '811 Bud Village\nNew Lucio, CA 46714', '467-617-1533 x445', 'clovis-conroy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (146, 1, 147, 'Amari Hill V', 2, '2013-07-18', '428eae7751e1f4264a033f8a9382b4e8.jpg', '66877 Lemke Drive\nLarsonberg, DE 41995', '+1.797.337.2872', 'amari-hill-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (147, 1, 148, 'Jordon Kuphal', 1, '1999-03-27', '6c6749e94498fcd72b0a254ac234edfe.jpg', '352 Becker Centers\nPort Marcosland, NE 71127', '541.417.1918', 'jordon-kuphal', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (148, 1, 149, 'Jessyca Hermiston', 2, '1990-11-23', '721537804ad732be85e3b1c15eb5a5e6.jpg', '31028 Hoeger Ports\nPort Brodymouth, DE 82206', '1-286-869-2577 x088', 'jessyca-hermiston', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (149, 1, 150, 'Aurore Weber', 1, '2018-10-15', '48eb4e809a7840866441e93108219cca.jpg', '96591 Mellie Lakes Suite 479\nMichealfort, NM 40501', '1-335-332-0923 x33600', 'aurore-weber', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (150, 1, 151, 'Nils Kohler', 2, '1980-09-28', '5096bc1ecbb6a0691e13831eccc82d78.jpg', '670 Johnson Ways Apt. 711\nZiemefurt, UT 56569', '+1-758-474-4581', 'nils-kohler', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (151, 1, 152, 'Barton Metz', 2, '1983-11-19', 'a7b69f690d23a38dc8dd2a528024c70f.jpg', '324 Freida Forges\nRaheemville, MO 50156', '575.536.5491 x160', 'barton-metz', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (152, 1, 153, 'Dr. Lorine Fritsch', 1, '1990-02-13', '5c90201e92da9f877f9522af32a32f0d.jpg', '6372 Pouros Viaduct\nSchmittbury, HI 98426', '(618) 584-4956', 'dr-lorine-fritsch', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (153, 1, 154, 'Dion McCullough', 2, '1976-01-20', 'b0eecea5d708129b2210928a898950d5.jpg', '5186 Leilani Bridge Apt. 289\nSouth Perry, DE 47902-3996', '230.226.5655', 'dion-mccullough', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (154, 1, 155, 'Sarina Shanahan MD', 2, '2014-08-19', 'ab6a1833d1beb12e8dc243a7f5f92e0c.jpg', '95548 Delpha Trail Apt. 655\nWest Jaleelstad, MA 63072-5535', '767-389-4518 x24414', 'sarina-shanahan-md', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (155, 1, 156, 'Leta Gerlach', 2, '1989-01-11', '54f9b61ed8f565334de5e7a5f89fc503.jpg', '82368 Florida Mission Apt. 963\nGoldnerfurt, UT 60087-3698', '(324) 670-8830 x8323', 'leta-gerlach', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (156, 1, 157, 'Florida Fay', 2, '1987-01-30', '59b642c39eaf1747dd31efb745cd0743.jpg', '471 Schulist Mission Apt. 409\nFerryview, AL 95119', '1-713-636-4246', 'florida-fay', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (157, 1, 158, 'Jonathan Buckridge', 2, '2013-10-18', '57f3a0aacd1cd16cfc90e35d6e845018.jpg', '314 Witting Station\nKenyamouth, RI 62294-0545', '+1-412-895-1417', 'jonathan-buckridge', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (158, 1, 159, 'Miss Zoila Gulgowski DVM', 1, '1987-07-11', 'b2e0fd69976f76f41c4754ff1a0bac71.jpg', '1477 Jones Branch\nKonopelskifurt, ID 29409-6305', '+1-843-500-1297', 'miss-zoila-gulgowski-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (159, 1, 160, 'Dr. Curtis Goyette PhD', 2, '1995-12-11', '429b68e477d0e3a7c2efba50721b89ec.jpg', '69113 Schowalter Well Apt. 766\nLake Bethel, RI 54347', '607.704.9737 x843', 'dr-curtis-goyette-phd', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (160, 1, 161, 'Dr. Wilburn Prohaska V', 2, '1992-02-22', 'a137a745f98ad6473f12e6e62ca19e00.jpg', '440 Zula Junction Apt. 440\nAmericaborough, TX 81937-8728', '987.705.3004 x81617', 'dr-wilburn-prohaska-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (161, 1, 162, 'Mrs. Amy Kovacek III', 1, '1975-09-14', '8be70a4088e0495c84b2d1f38224b45b.jpg', '5430 Little Drives\nLelandmouth, AR 07573-9426', '(679) 499-8606', 'mrs-amy-kovacek-iii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (162, 1, 163, 'Garry Hackett', 1, '1988-10-05', '8a3fb0fdc9f46ceb8420695e28af895d.jpg', '455 Little Land\nKilbackview, MA 85963', '+1-939-210-6604', 'garry-hackett', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (163, 1, 164, 'Clint Glover', 2, '2015-12-29', '78ffa6d55de07287ad383d130c966618.jpg', '57338 Bednar Fall\nNew Rogersfurt, UT 91031-7333', '(432) 732-9016 x1700', 'clint-glover', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (164, 1, 165, 'Karolann Crooks', 1, '1983-01-20', '98eedd788dd55d8d6d8b27e20ad1d4e0.jpg', '3666 Homenick Rapids\nArmanimouth, VT 39666-2712', '(581) 933-1771 x6545', 'karolann-crooks', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (165, 1, 166, 'Ms. Meda Muller III', 1, '1983-05-25', '906436b454fffa57a467b1e8efff4a02.jpg', '791 Nikolaus Turnpike\nStiedemannland, ME 61446-9325', '512.397.2182', 'ms-meda-muller-iii', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (166, 1, 167, 'Mervin Durgan', 1, '1987-03-26', '0493c1f3a421898a4544ba9798e8cff6.jpg', '3773 Rosemarie Crescent\nSouth Corine, CO 18766', '+1.607.461.2789', 'mervin-durgan', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (167, 1, 168, 'Dr. Alia Gottlieb', 1, '1996-10-26', '86db49226befe6ad2a6d687d27383871.jpg', '2106 Wehner Shoal Suite 514\nMadonnamouth, GA 02080', '+1-383-535-5475', 'dr-alia-gottlieb', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (168, 1, 169, 'Dr. Johnathan Conn', 2, '1983-09-23', '1ca1ab9cd36221f73676d914ece4e4c6.jpg', '397 Brandi Mountains\nSouth Elenor, MN 92717', '(934) 859-5573', 'dr-johnathan-conn', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (169, 1, 170, 'Guiseppe Stark', 1, '1991-09-10', '4b0951675287b85d425722d8eb77cabf.jpg', '32511 Bud Parkways\nWest Olenburgh, NC 90175', '480.225.3112', 'guiseppe-stark', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (170, 1, 171, 'Jaquelin Harris V', 1, '1998-03-28', 'd4cd325b0ce8a4f1a10a8b881629ac95.jpg', '6795 Antonette Islands\nJoyceside, RI 59998-7896', '+1-751-780-9711', 'jaquelin-harris-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (171, 1, 172, 'Margret Davis', 1, '1987-01-11', 'faa9cc8ca5467cbbbfbe6b2291f6bee5.jpg', '607 Torp Rapid\nKautzerhaven, MA 58673', '1-594-672-2131 x549', 'margret-davis', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (172, 1, 173, 'Marielle Bins', 1, '2018-06-25', '6be9eab8838b36c03d4d8e8513325dca.jpg', '939 Funk Plains\nEldonton, KY 76314', '750.375.7173 x060', 'marielle-bins', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (173, 1, 174, 'Muriel Mueller', 1, '1994-07-15', '453068b630025f03613e52e983833859.jpg', '9086 Bergnaum Street\nSouth Oswald, IL 54815', '+1.426.722.1927', 'muriel-mueller', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (174, 1, 175, 'Dr. Rebekah Johns', 1, '1993-03-05', 'c7d3df21780bfc21edb0ee9a43a3707d.jpg', '7977 Lisette Parkways Suite 969\nCroninmouth, IA 59734', '+14135302420', 'dr-rebekah-johns', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (175, 1, 176, 'Callie Hermiston', 1, '1990-02-27', '67b6be9bc648e7042052aba551f569d9.jpg', '12791 Vandervort Ways\nNew Yvonne, IA 72448-9870', '776.281.0723 x13557', 'callie-hermiston', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (176, 1, 177, 'Rhett Waters DDS', 1, '2000-03-18', '4cf219d73cb05e21e74642592dd7a2d0.jpg', '94821 Windler Extension\nLake Marianeside, NH 84865', '(318) 788-5904 x00540', 'rhett-waters-dds', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (177, 1, 178, 'Monserrat Mertz', 1, '1975-08-28', '0f51de3d764484e32549ed09458d2f32.jpg', '49967 Brakus Route Apt. 336\nSouth Everett, MT 90841', '1-846-883-0656 x571', 'monserrat-mertz', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (178, 1, 179, 'Frida Goyette', 2, '2016-12-13', '3a62d2d934dc987e4a9e7bcc5fdace96.jpg', '5748 Berta Road\nTorpview, LA 82930-8512', '+1-527-776-5777', 'frida-goyette', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (179, 1, 180, 'Miss Helena Bruen', 1, '2016-01-04', '2dba0585657847d87109fbbba7e6684a.jpg', '49980 Lang Ridge Suite 052\nLake Garthstad, IN 93252-2845', '(742) 734-5907 x46455', 'miss-helena-bruen', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (180, 1, 181, 'Bradford Purdy', 1, '2012-04-26', 'a2a347a457b740b6b45ce6f7ed890b57.jpg', '2963 Elvis Loaf\nMaymieborough, OK 17389', '1-339-373-0141', 'bradford-purdy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (181, 1, 182, 'Miss Alize Bednar', 2, '1973-01-24', '7a42bdffecc5093b78e3971ea6b4f4b2.jpg', '701 Hauck Circles\nHudsonview, AL 95656', '708.682.5167', 'miss-alize-bednar', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (182, 1, 183, 'Prof. Heidi Schmidt', 1, '1984-09-14', 'e9ad071727e5b66064d4d2548e982793.jpg', '64079 Johnnie Spring Apt. 609\nBernhardstad, MA 73447', '871.506.1490 x2692', 'prof-heidi-schmidt', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (183, 1, 184, 'Ms. Melyssa Gutmann Jr.', 2, '1978-05-20', 'fc68ffce3cd7c2c6377fb0f36eb3a50a.jpg', '749 Bosco Ridges\nKarleymouth, CT 06035', '882.741.2965 x261', 'ms-melyssa-gutmann-jr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (184, 1, 185, 'Prof. Price Bahringer Sr.', 2, '1976-02-19', '4ae795aff4b69a0319ba8ea3f3ae7e39.jpg', '99573 Johnny Parkways Apt. 298\nOberbrunnermouth, MN 29733-6941', '1-345-972-2957 x7360', 'prof-price-bahringer-sr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (185, 1, 186, 'Mr. Merl Cronin', 2, '1976-08-10', '1f6636cc4dde6db8c43adcdeedd70f62.jpg', '6872 Maida Lodge Apt. 322\nTrinityberg, TX 04194-9218', '(651) 974-3693', 'mr-merl-cronin', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (186, 1, 187, 'Melvina Roberts Sr.', 2, '1978-05-12', 'aca0d717aa02f2267b02c383f48bb6b5.jpg', '577 Boehm Shore\nDerekmouth, UT 29922-8479', '1-893-518-9139 x181', 'melvina-roberts-sr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (187, 1, 188, 'Coty Reinger', 2, '1984-08-10', 'a1754b0aa42ca0cd4253cb1ef024ee46.jpg', '5822 Jayson Glens Suite 733\nNew Vanessa, TX 24768', '1-601-355-9442 x6734', 'coty-reinger', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (188, 1, 189, 'Lindsay Leffler', 1, '1983-05-25', '97790d026d9cf5871de8bc9d10c98976.jpg', '168 Margret Trail\nSouth Estellachester, WV 62307', '(539) 899-0146', 'lindsay-leffler', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (189, 1, 190, 'Kobe Marquardt V', 1, '2016-01-09', '7905fb4f2bd5f3dd09c590f6d9c7ff1b.jpg', '164 Jordi Street\nGerryview, NJ 38483', '(858) 261-6408 x76868', 'kobe-marquardt-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (190, 1, 191, 'Jacquelyn Lemke IV', 1, '1972-12-27', '7747496e2888c22e7f5c48754f1a2537.jpg', '849 Buddy Street\nDakotashire, VT 72502', '+19353936586', 'jacquelyn-lemke-iv', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (191, 1, 192, 'Ms. Angeline Konopelski', 1, '2010-04-14', '39eb1c257918db5c7efa0fbe3b9fb8be.jpg', '13925 Moises Parkway\nNew Keaton, ID 75999', '502.700.6674', 'ms-angeline-konopelski', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (192, 1, 193, 'Dejuan Toy', 1, '2007-08-12', '6b6738b57b2f0b50dc0073a2418ce46d.jpg', '5091 Johnson Turnpike\nMuellerfurt, KS 45818-3816', '1-304-510-5563', 'dejuan-toy', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (193, 1, 194, 'Shany Hegmann', 2, '2001-01-02', '520e058ba65205e1214e734d693b971b.jpg', '57755 Boehm Turnpike Suite 347\nEast Reginald, NY 70098', '+1.238.462.7972', 'shany-hegmann', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (194, 1, 195, 'Scarlett Labadie', 2, '1978-10-21', 'd89f18f66798618cb686079620028dc0.jpg', '8046 Johnson Run Apt. 073\nNew Nelsbury, DC 94173', '+1 (854) 390-3102', 'scarlett-labadie', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (195, 1, 196, 'Dr. Nigel Strosin I', 2, '1993-02-10', '8a01f117d1101daffb160c10688859e6.jpg', '96470 Wilkinson Extensions Apt. 230\nBrennanburgh, MO 14920-0232', '1-248-373-4590', 'dr-nigel-strosin-i', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (196, 1, 197, 'Dr. Darlene Volkman V', 1, '1988-03-01', '18f993b82847b91294dd4daab6cba081.jpg', '1943 Felicia Squares\nWest Michaelahaven, VT 16291', '331-413-5517', 'dr-darlene-volkman-v', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (197, 1, 198, 'Miss Felicia Kutch Sr.', 1, '1988-09-14', 'b883f0c687b34b10a27382beddd97acb.jpg', '8705 Raheem Overpass\nWest Sibylton, DC 07092', '+17045925195', 'miss-felicia-kutch-sr', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (199, 1, 200, 'Halie Swaniawski DVM', 2, '1998-04-29', 'ab741e06ef739daea63eef2597394df2.jpg', '8775 Reilly Trail Apt. 246\nWest Veda, VT 64847-6067', '(201) 273-0623', 'halie-swaniawski-dvm', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (200, 1, 201, 'Casper Fadel', 2, '2018-05-21', 'bb55531c1e3e4a553db209c3fdb48491.jpg', '20178 Hickle Unions Suite 448\nLake Tillman, SC 54468', '671-228-9580 x2703', 'casper-fadel', '2019-09-18 01:50:37', '2019-09-18 01:50:37');
INSERT INTO `students` VALUES (201, 1, 202, 'Cuong Duc', 1, '1997-02-01', '1568776416Ninja-League-of-Legends-mask-sword_3840x2160.jpg', '51 ngõ Thồng Nhất ,Đại La, Hai Bà Trưng', '0971129597', 'cuong-duc', '2019-09-18 03:13:36', '2019-09-18 03:13:36');
INSERT INTO `students` VALUES (202, 1, 203, 'Cuong Ducaaaaaaaaaaa', 2, '1997-02-02', '1568776510Ninja-League-of-Legends-mask-sword_3840x2160.jpg', '51 ngõ Thồng Nhất ,Đại La, Hai Bà Trưng', '0971129597333', 'cuong-ducaaaaaaaaaaa', '2019-09-18 03:15:10', '2019-09-18 03:15:10');
INSERT INTO `students` VALUES (203, 1, 204, 'Cuong Duc bbbbbbbb', 2, '1997-01-01', '1568778168Ninja-League-of-Legends-mask-sword_3840x2160.jpg', '51 ngõ Thồng Nhất ,Đại La, Hai Bà Trưng', '0971129597111111', 'cuong-duc-bbbbbbbb', '2019-09-18 03:42:48', '2019-09-18 03:42:48');
INSERT INTO `students` VALUES (204, 1, 205, 'Lớp trưởng', 1, '1997-01-02', '1568790931Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '0971129597212', 'lop-truong', '2019-09-18 07:15:31', '2019-09-18 07:15:31');
INSERT INTO `students` VALUES (205, 1, 206, 'User', 2, '1997-01-01', '1568791159Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '09711295911', 'user', '2019-09-18 07:19:19', '2019-09-18 07:19:19');
INSERT INTO `students` VALUES (206, 1, 207, 'Lớp trưởng1', 2, '1996-01-01', '1568791480Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '0971129597124', 'lop-truong1', '2019-09-18 07:24:40', '2019-09-18 07:24:40');
INSERT INTO `students` VALUES (207, 1, 208, 'Admin', 1, '1998-01-01', '1568791672Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097111313131', 'admin', '2019-09-18 07:27:52', '2019-09-18 07:27:52');
INSERT INTO `students` VALUES (208, 1, 209, 'Admin1', 1, '1997-01-01', '1568796539Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '09711293232', 'admin1', '2019-09-18 08:48:59', '2019-09-18 08:48:59');
INSERT INTO `students` VALUES (209, 1, 213, 'sinh viên a', 1, '1997-02-11', '1569230262Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959712', 'sinh-vien-a', '2019-09-23 09:17:42', '2019-09-23 09:17:42');
INSERT INTO `students` VALUES (210, 1, 214, 'sinh viên b', 1, '1998-01-01', '1569230446Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '0971129512123', 'sinh-vien-b', '2019-09-23 09:20:46', '2019-09-23 09:20:46');
INSERT INTO `students` VALUES (211, 1, 215, 'studentc', 1, '1997-12-12', '1569231019Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '0971129597111', 'studentc', '2019-09-23 09:30:19', '2019-09-23 09:30:19');
INSERT INTO `students` VALUES (212, 1, 216, 'Cườngaaaaaaa', 1, '1997-12-02', '1569231192Ninja-League-of-Legends-mask-sword_3840x2160.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959712111', 'cuongaaaaaaa', '2019-09-23 09:33:12', '2019-09-23 09:33:12');
INSERT INTO `students` VALUES (213, 1, 217, 'Cuong Duc abcd', 1, '1998-01-01', '156929079348921842_491425418046239_2138644205872873472_n.jpg', '51 ngõ Thồng Nhất ,Đại La, Hai Bà Trưng', '0971129597234', 'cuong-duc-abcd', '2019-09-24 02:06:33', '2019-09-24 02:06:33');
INSERT INTO `students` VALUES (214, 1, 218, 'Cuong Duc', 1, '1997-01-01', '156929091848921842_491425418046239_2138644205872873472_n.jpg', '51 ngõ Thồng Nhất ,Đại La, Hai Bà Trưng', '0971129357', 'cuong-duc-1', '2019-09-24 02:08:38', '2019-09-24 02:08:38');
INSERT INTO `students` VALUES (215, 1, 219, 'aaaaaaaaaaabcwafsdafa', 1, '1998-11-11', '156929103549055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959712121212', 'aaaaaaaaaaabcwafsdafa', '2019-09-24 02:10:35', '2019-09-24 02:10:35');
INSERT INTO `students` VALUES (216, 1, 220, 'adsavca', 1, '1998-11-11', '156929110549055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '09711295971213', 'adsavca', '2019-09-24 02:11:45', '2019-09-24 02:11:45');
INSERT INTO `students` VALUES (217, 1, 221, 'adsaafafaf', 2, '1998-11-11', '156929120149055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '0971129597111212', 'adsaafafaf', '2019-09-24 02:13:21', '2019-09-24 02:13:21');
INSERT INTO `students` VALUES (218, 1, 222, 'adsaafafaf', 2, '1998-11-11', '156929125948921842_491425418046239_2138644205872873472_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959711121222', 'adsaafafaf-1', '2019-09-24 02:14:19', '2019-09-24 02:14:19');
INSERT INTO `students` VALUES (219, 1, 223, 'Cườngaaaaaaaaaaa', 1, '1996-11-11', '156929131049055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '123564649845', 'cuongaaaaaaaaaaa', '2019-09-24 02:15:10', '2019-09-24 02:15:10');
INSERT INTO `students` VALUES (220, 1, 224, 'Cườngavcv', 1, '1998-11-11', '156929137849055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '09711295972123444', 'cuongavcv', '2019-09-24 02:16:19', '2019-09-24 02:16:19');
INSERT INTO `students` VALUES (221, 1, 225, 'Cườngavcv11', 1, '1998-11-11', '156929144749649141_203842677127546_2866992460804915200_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959721234442', 'cuongavcv11', '2019-09-24 02:17:27', '2019-09-24 02:17:27');
INSERT INTO `students` VALUES (222, 1, 226, 'adsfjaosdjfa', 1, '1996-11-11', '156929154549055049_2007815909305156_8654654328901992448_n.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112959712342', 'adsfjaosdjfa', '2019-09-24 02:19:05', '2019-09-24 02:19:05');
INSERT INTO `students` VALUES (1002, 1, 231, 'user chính hiệu', 1, '1997-10-16', '1570778040gala.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '09711295333333333', 'user-chinh-hieu', '2019-10-11 07:14:00', '2019-10-11 07:14:00');
INSERT INTO `students` VALUES (1003, 1, 232, 'student chính hiệu', 1, '1998-10-17', '1571039297gala.jpg', 'Mỹ Lộc- Mỹ Lộc -Nam Định', '097112953232', 'student-chinh-hieu', '2019-10-14 07:48:17', '2019-10-14 07:48:17');
INSERT INTO `students` VALUES (1005, 2, 1, '123123123', 127, '2019-10-15', '2343432432', '123123', '123213213213', 'gia', NULL, NULL);
INSERT INTO `students` VALUES (1006, 2, 1, '123123123', 127, '2019-10-15', '2343432432', '123123', '123213213213', 'gia', NULL, NULL);

-- ----------------------------
-- Table structure for students_subjects
-- ----------------------------
DROP TABLE IF EXISTS `students_subjects`;
CREATE TABLE `students_subjects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_code` bigint(20) UNSIGNED NOT NULL,
  `subject_code` bigint(20) UNSIGNED NOT NULL,
  `score` double(8, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `students_subjects_subject_code_foreign`(`subject_code`) USING BTREE,
  INDEX `students_subjects_student_code_foreign`(`student_code`) USING BTREE,
  CONSTRAINT `students_subjects_student_code_foreign` FOREIGN KEY (`student_code`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `students_subjects_subject_code_foreign` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students_subjects
-- ----------------------------
INSERT INTO `students_subjects` VALUES (1, 202, 1, 3.00);
INSERT INTO `students_subjects` VALUES (2, 202, 2, 3.00);
INSERT INTO `students_subjects` VALUES (3, 202, 3, 3.00);
INSERT INTO `students_subjects` VALUES (4, 202, 4, 3.00);
INSERT INTO `students_subjects` VALUES (5, 202, 5, 3.00);
INSERT INTO `students_subjects` VALUES (6, 207, 1, 3.00);
INSERT INTO `students_subjects` VALUES (7, 207, 2, 3.00);
INSERT INTO `students_subjects` VALUES (8, 207, 3, 3.00);
INSERT INTO `students_subjects` VALUES (9, 207, 4, 3.00);
INSERT INTO `students_subjects` VALUES (10, 207, 5, 3.00);
INSERT INTO `students_subjects` VALUES (13, 206, 3, 5.00);
INSERT INTO `students_subjects` VALUES (14, 206, 4, 7.00);
INSERT INTO `students_subjects` VALUES (15, 206, 5, 9.00);
INSERT INTO `students_subjects` VALUES (16, 208, 1, 3.00);
INSERT INTO `students_subjects` VALUES (17, 208, 2, 3.00);
INSERT INTO `students_subjects` VALUES (18, 208, 3, 3.00);
INSERT INTO `students_subjects` VALUES (19, 208, 4, 3.00);
INSERT INTO `students_subjects` VALUES (20, 208, 5, 3.00);
INSERT INTO `students_subjects` VALUES (21, 1, 1, 10.00);
INSERT INTO `students_subjects` VALUES (22, 1, 2, 10.00);
INSERT INTO `students_subjects` VALUES (23, 2, 1, 8.00);
INSERT INTO `students_subjects` VALUES (24, 2, 2, 7.00);
INSERT INTO `students_subjects` VALUES (25, 2, 3, 8.00);
INSERT INTO `students_subjects` VALUES (26, 33, 1, 4.00);

-- ----------------------------
-- Table structure for subjects
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES (1, 'Lập trình hướng đối tượng', 3, '2019-09-18 03:49:00', '2019-09-18 03:49:00');
INSERT INTO `subjects` VALUES (2, 'Lập trình Php', 2, '2019-09-18 03:49:16', '2019-09-18 03:49:16');
INSERT INTO `subjects` VALUES (3, 'Lập trình Ios', 3, '2019-09-18 03:49:29', '2019-09-18 03:49:29');
INSERT INTO `subjects` VALUES (4, 'Lập trình Java', 3, '2019-09-18 03:49:45', '2019-09-18 03:49:45');
INSERT INTO `subjects` VALUES (5, 'Lập trình Android', 3, '2019-09-18 03:50:00', '2019-09-18 03:50:00');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for translations
-- ----------------------------
DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `translations_student_id_locale_unique`(`student_id`, `locale`) USING BTREE,
  INDEX `translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `translations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 233 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Ms. Vivien Schoen Jr.', 'rusty65@stamm.com', '$2y$10$EY/kLwVCpMoR6P4NZzGCw.4XhrB6Lqa3/ywP6G8azuaYWFJQLK3G2', 2, 'RJORJFlcnAaAS7JYFqwrqZgVO3PE9JPNXZnOA829dDYK5XmecciPCKEVSdom', '2019-09-18 01:46:56', '2019-09-18 01:46:56');
INSERT INTO `users` VALUES (2, 'Marshall Herman Sr.', 'rosendo.prohaska@hudson.com', '$2y$10$v8/9jBe.8ayVUdulDX4AT.FITxzS0oKY.CusYtylOA/hRx5yvHQG.', 2, 'w5hQvIajTSaqOG4uVO7grWy1fqGENfQStVdXSqGl2zB67LqnyHlWXObpCp37', '2019-09-18 01:46:57', '2019-09-30 04:20:31');
INSERT INTO `users` VALUES (3, 'Dr. Elwyn Raynor', 'jade.tromp@hotmail.com', '$2y$10$m/HzrF4V4CtQbP2QNIJfj.PhqVfAjjAOTtk1dzIVB.s83RRjn3DUy', 2, '9OaRm2Oazk', '2019-09-18 01:46:58', '2019-10-02 04:51:45');
INSERT INTO `users` VALUES (4, 'Kip Dibbert DDS', 'yundt.macy@yahoo.com', '$2y$10$Hzbc7sLKbo/ZiiXfgb4fIOFLaopWXdbJ.cC1llZlOQqKSVFrQr37m', 2, 'U7zehWca0VN6NjC3B36VrxMgN8H4f20jIx9E4sr5Nh5e0mVKjXEhC1lbOKh9', '2019-09-18 01:46:59', '2019-09-18 01:46:59');
INSERT INTO `users` VALUES (5, 'Mr. Dallin Douglas', 'rempel.abe@padberg.net', '$2y$10$G2UA1J3YzY2C1Wdv9wa3Te6lEVPXqZkgmQ9DbwxCLAiCd30UARdTG', 2, 'xYDPbYGSHN', '2019-09-18 01:47:00', '2019-09-18 01:47:00');
INSERT INTO `users` VALUES (6, 'Cullen Strosin', 'valentina17@rau.org', '$2y$10$55CWLWcuM8sxlyDx/jjYz.RObEpsyd/Jxffk219ZGALyAmKI8eZN2', 2, 'b5uoOI7enr', '2019-09-18 01:47:01', '2019-09-18 01:47:01');
INSERT INTO `users` VALUES (7, 'Dorcas Lang', 'ashley.connelly@kiehn.net', '$2y$10$gGKmWd7Rv9Pr6edFpR4Jledk0DiqyZGf8bj8FwTiafd09tBp1PwL.', 2, 'KNbniBGwUW', '2019-09-18 01:47:02', '2019-09-18 01:47:02');
INSERT INTO `users` VALUES (8, 'Kamryn Jacobi', 'morgan97@hotmail.com', '$2y$10$6Mz3/Ih2kioQrskz1kVmOuCtD.1wPrAeeobKzsdRXnz3Ack7LsRSe', 2, 'I96pJ2AFKo', '2019-09-18 01:47:03', '2019-09-18 01:47:03');
INSERT INTO `users` VALUES (9, 'Ambrose Runte', 'gunner.hand@hotmail.com', '$2y$10$s.7HJfDcGqJJsxFInGR2/e5ffXGhP0mb14RKLb9K6emzm6KdhPURW', 2, 'mShJ9cCRa4', '2019-09-18 01:47:04', '2019-09-18 01:47:04');
INSERT INTO `users` VALUES (10, 'Rosendo Walter', 'cleora.sanford@hotmail.com', '$2y$10$BsF/S9FdR4krL3b26/oPVunpCQM0aP/8lfkjcrfOPM04QbsZVYA4e', 4, '1HjyMQwEjt', '2019-09-18 01:47:05', '2019-10-02 04:54:50');
INSERT INTO `users` VALUES (11, 'Bailey Bernier', 'maya.johnston@rippin.com', '$2y$10$Oio0jUCuMEPNoU3sRwDjYO1kCNAdbfSxRmLO2hReeUSHdPEADFfR2', 2, 'B2I10JB5j3', '2019-09-18 01:47:06', '2019-09-18 01:47:06');
INSERT INTO `users` VALUES (12, 'Steve Stamm', 'boehm.ashtyn@torp.biz', '$2y$10$JlWB1fZAdJKutrXYuGwOfehDffcn64orhyqW8kZHvZ8Jga/81gVdK', 2, 'koXWLtkaX3', '2019-09-18 01:47:08', '2019-09-18 01:47:08');
INSERT INTO `users` VALUES (13, 'Leonie Baumbach', 'homenick.cassidy@ebert.biz', '$2y$10$fuyrnPAj4sZEhwPcdrIsd.U7wO5cuNjmtXS0ZUiwG4uZkHNAy9hke', 2, 'i5MCra7gsv', '2019-09-18 01:47:09', '2019-09-18 01:47:09');
INSERT INTO `users` VALUES (14, 'Dr. Lisette Tremblay', 'jones.pedro@windler.net', '$2y$10$YqPGXW3/RIORZqlAGwkfVeAiH5jNd7C02UUUEtJFN/1hHH4wwyeIq', 2, 'zL48ctKRxV', '2019-09-18 01:47:10', '2019-09-18 01:47:10');
INSERT INTO `users` VALUES (15, 'Keara Cruickshank Jr.', 'rasheed.larkin@osinski.info', '$2y$10$QQqR3dl5CRZCv2Z0Xn.2YuXnyyKbzF4hZiOvwJLwJ2HbL4am9OvxG', 2, 'FOGHKJL3VD', '2019-09-18 01:47:11', '2019-09-18 01:47:11');
INSERT INTO `users` VALUES (16, 'Miss Heather Gleason', 'cassin.royal@franecki.com', '$2y$10$EXTyrm6gHTho9SFEMwPqXOmLEgfxuyol0Tk705G69msRJUs0RBV62', 2, 'urYKxljKb1', '2019-09-18 01:47:12', '2019-09-18 01:47:12');
INSERT INTO `users` VALUES (17, 'Robyn Wolf', 'angelo.renner@gmail.com', '$2y$10$5r7fOLOsj1MgO/ZWnnTOxe.Lzd1Ow7D1ku8nDDdSoV20UQgJxtB0K', 2, 'aJp7OlULQt', '2019-09-18 01:47:13', '2019-09-18 01:47:13');
INSERT INTO `users` VALUES (18, 'Emmie Schowalter', 'salma.schmidt@yahoo.com', '$2y$10$u3X2HLyWRWzpvwQ5MiA5V.ve6kIE/3.uo8q0zchoNamiC3wzeDxaW', 2, 'Oa2uUB30QB', '2019-09-18 01:47:14', '2019-09-18 01:47:14');
INSERT INTO `users` VALUES (19, 'Jenifer Stokes', 'skyla.kunze@gmail.com', '$2y$10$G7T/yOIuJR8zv/FuDtIy0.oJd1I/wqxhcG0m/KEHuVZ/P3c1ZDGv2', 2, 'jaOlSFlZi7jXoClSrsyGRXSYzAiEmP6EjszNtnKWituLJkD9T67ZRJABibZ9', '2019-09-18 01:47:15', '2019-09-18 01:47:15');
INSERT INTO `users` VALUES (20, 'Joelle Mohr III', 'dubuque.tate@wilkinson.com', '$2y$10$HFdUjQlGbqMS5QH19cOxxuTrhpwd/3DCfSix7fGeICTtnRKsC9PN.', 2, 'q9YAa2Tr58', '2019-09-18 01:47:16', '2019-09-18 01:47:16');
INSERT INTO `users` VALUES (21, 'Miss Iliana Dicki', 'pouros.maxine@yahoo.com', '$2y$10$u4yk4y6UyIvyyivF/yD9cuqgKbic3ZFwCp0GQXggYUzy4iJP5Ud7i', 2, 'N4dcyePbaB', '2019-09-18 01:47:17', '2019-09-18 01:47:17');
INSERT INTO `users` VALUES (22, 'Mr. Titus Nikolaus MD', 'reinhold59@okeefe.com', '$2y$10$a0T66Ig2kY8rsYU99XlfSe4ArjoaC1ScqlEUrfaX3glS7BcaN/Vji', 2, 'YHvZDn3L3C', '2019-09-18 01:47:18', '2019-09-18 01:47:18');
INSERT INTO `users` VALUES (23, 'Henriette Weimann', 'sigmund.jast@weissnat.com', '$2y$10$lKPKF4rJG1NrQd.QjT8GPee82DOdgxrwkHK3B9jwp54PNpHV.bnKK', 2, '2NWWBMYbru', '2019-09-18 01:47:19', '2019-09-18 01:47:19');
INSERT INTO `users` VALUES (24, 'Dr. Claude Stokes III', 'odicki@gmail.com', '$2y$10$p9z5Q2hIuZlX3LEFeyffL.1UTPEVeDLIUFIHh9fd0HC4V614AUSQC', 2, 'h9IptAjFhK', '2019-09-18 01:47:20', '2019-09-18 01:47:20');
INSERT INTO `users` VALUES (25, 'Chanelle Skiles', 'britchie@yahoo.com', '$2y$10$lZiVCHPLhy2uasj9Ybcn.ObTfnhPxisYS12KXK1j/cidwGSQlRQtW', 2, 'c3cqMwEDXs', '2019-09-18 01:47:21', '2019-09-18 01:47:21');
INSERT INTO `users` VALUES (26, 'Marilou Olson', 'wilderman.magdalena@champlin.com', '$2y$10$1p5r6UW6pHTNRBrAfJKchujR6oMz1Z0wc9s.EhyoE3SW5e8au9IZa', 2, '7v3Bs3iTyM', '2019-09-18 01:47:22', '2019-09-18 01:47:22');
INSERT INTO `users` VALUES (27, 'Dedrick DuBuque', 'torp.anahi@bogisich.com', '$2y$10$Xbdj0GUq1jy4CVRazeaITO9SBOH609DttMvBNujPkGOP3UMcIjAUG', 2, 'xzLcVmfdgU', '2019-09-18 01:47:23', '2019-09-18 01:47:23');
INSERT INTO `users` VALUES (29, 'Ms. Alize Bahringer', 'mjast@steuber.net', '$2y$10$PH/mSD02zKjpoCTxgJJA5e4hwyoeyzavMmaLT.BEC1QxySZrMsLNe', 2, '6JPrqfQTxm', '2019-09-18 01:47:25', '2019-09-18 01:47:25');
INSERT INTO `users` VALUES (30, 'Allan Hartmann', 'fay.antonetta@yahoo.com', '$2y$10$rJ/IiW3R36dl1wNXHa3iVuAZykhN3KFc3xNq4NAQK46B3jPiG96RS', 2, '789uAVfdPO', '2019-09-18 01:47:26', '2019-09-18 01:47:26');
INSERT INTO `users` VALUES (31, 'Dr. Breanna Adams V', 'mohammed.cole@botsford.biz', '$2y$10$qYUw1dPmjudoff8rctGoD.RotIuvYdfdDbW92.aKSRdcQP.JtC/We', 2, '8nQHcTU6bM', '2019-09-18 01:47:27', '2019-09-18 01:47:27');
INSERT INTO `users` VALUES (33, 'Blaze Fadel', 'salma30@gmail.com', '$2y$10$.9whAGoi.DKwP6wYbDGdkuhb424OIrqR8Z3RFCzPL8OLpWrWvM2K2', 2, 'HJZ8G1AHzX', '2019-09-18 01:47:29', '2019-09-18 01:47:29');
INSERT INTO `users` VALUES (34, 'Viola D\'Amore', 'scarlett61@dach.com', '$2y$10$TU3zkKH2Lk7BnWhAvr/21.5H/Rof/6DaVPaUpoSjQEI7gpaghJ2Xa', 2, 'JlffziuE7I', '2019-09-18 01:47:30', '2019-09-18 01:47:30');
INSERT INTO `users` VALUES (35, 'Winifred Baumbach', 'stoltenberg.christian@kuhlman.org', '$2y$10$N2VdlmVLqW870OP9XAaZDukh8cEC0AoRpW0Yo6hL6h1ogdfnp/0ka', 2, 'vQX5ARbGSI', '2019-09-18 01:47:31', '2019-09-18 01:47:31');
INSERT INTO `users` VALUES (36, 'Catherine Price', 'dangelo.upton@gmail.com', '$2y$10$BLGqVghNAgqT4PYSd4LCN.KSIy9GyFgwtcC2MrHAgKfxUn7xTdtAm', 2, 'E7iCLFgNcC', '2019-09-18 01:47:32', '2019-09-18 01:47:32');
INSERT INTO `users` VALUES (37, 'Angeline Thiel IV', 'kgulgowski@yahoo.com', '$2y$10$kY4az/rUNUS0RhbcqzqbO.oJy3lsJPESdJMX85XjWXyod84lVibLm', 2, 'QMeN1XICiz', '2019-09-18 01:47:33', '2019-09-18 01:47:33');
INSERT INTO `users` VALUES (38, 'Alberto Heller', 'quincy.metz@stracke.com', '$2y$10$el4Dq7c4x0SYWcdHUFD9celaZOO2NHA4edDysj3gV804qhDsyN9Sm', 2, 'HuRktHwcKd', '2019-09-18 01:47:34', '2019-09-18 01:47:34');
INSERT INTO `users` VALUES (39, 'Hilma Weber', 'mhilpert@yahoo.com', '$2y$10$msaejwcb/NA/RZB02s9whezgUfOAQD5r5c6S46oz/3N8SI5bOk9qC', 2, 'jKycizLj49', '2019-09-18 01:47:35', '2019-09-18 01:47:35');
INSERT INTO `users` VALUES (40, 'Cordia Mohr IV', 'kamryn12@hotmail.com', '$2y$10$yRWKKoBs1Pn6XjBRWCQ6O.OD.dQIqQKgjwW1htwRVmWBEOrqJk.IC', 2, 'aUVTrUMNlb', '2019-09-18 01:47:36', '2019-09-18 01:47:36');
INSERT INTO `users` VALUES (41, 'Barbara Lubowitz', 'rupert78@hotmail.com', '$2y$10$500JZcQAYvwaz1i12dud4.3L6BDP7h6S8FEJGBGr93o4aTqV7pvQy', 2, 'ei4ImW915X', '2019-09-18 01:47:39', '2019-09-18 01:47:39');
INSERT INTO `users` VALUES (43, 'Jordon Schuster', 'weber.darlene@hotmail.com', '$2y$10$shrrBsJsG.eB5CDOizm5iutrjzZtZ2DrmDQg4iBtn1dLQWnTBBJT6', 2, '6kOjRBFNnj', '2019-09-18 01:47:41', '2019-09-18 01:47:41');
INSERT INTO `users` VALUES (44, 'Brianne Huels', 'kristian55@yahoo.com', '$2y$10$gxMJQ6tb5oQX0VXvXjE2kuc/7L4mmZ6uUb.w6QIoEU9cZO.gWbKZu', 2, 'CyW5G8Ph6o', '2019-09-18 01:47:42', '2019-09-18 01:47:42');
INSERT INTO `users` VALUES (45, 'Jasper Mayer', 'konopelski.tess@hotmail.com', '$2y$10$4riGmNgi3cjOF3DjMdLqZuOwGfHe1YBge7/pmSNY6GJ8R6IdZ6Aiu', 2, 'UHhgKeVV55', '2019-09-18 01:47:43', '2019-09-18 01:47:43');
INSERT INTO `users` VALUES (46, 'Madilyn Anderson', 'larkin.morris@kirlin.com', '$2y$10$cEAYr5G.cb0tTHAZ76LbEOiIDC4Pg7TmLcC23nx9MXcDKwxKgRmka', 2, 'xva1eXgiWL', '2019-09-18 01:47:45', '2019-09-18 01:47:45');
INSERT INTO `users` VALUES (47, 'Althea Klocko', 'arnoldo.bartell@yahoo.com', '$2y$10$1FE10nHd6XPlXDBM1w.Y0ulVLsE6ACO31jeoQ5cLuf1jveQvKz8Ri', 2, 'ghkpRr17CL', '2019-09-18 01:47:46', '2019-09-18 01:47:46');
INSERT INTO `users` VALUES (48, 'Mr. Webster Cummings', 'meaghan74@yundt.biz', '$2y$10$iacuNhvo6VwBHUNkzo1nyerYm5BsOWHcK6UaKaMEeiJI94jxk9bye', 2, 'XZ9TSXI9qr', '2019-09-18 01:47:47', '2019-09-18 01:47:47');
INSERT INTO `users` VALUES (49, 'Kaycee Koepp', 'paul22@gmail.com', '$2y$10$HhmvaBQtF7YBG2RUNDXSHuy6D46ppZOb3L.K1DhHastZXN0KwTba2', 2, 'WHQ8Unq10a', '2019-09-18 01:47:48', '2019-09-18 01:47:48');
INSERT INTO `users` VALUES (50, 'Mr. Henry Marquardt', 'bayer.magali@heaney.net', '$2y$10$dfx6AWupilNuDZyzP3O11ea/BRxKj5D3S2kBJjmBNWq.hwFoAcUJu', 2, 'BQScYDjSpf', '2019-09-18 01:47:49', '2019-09-18 01:47:49');
INSERT INTO `users` VALUES (51, 'Sofia Renner', 'mosciski.alec@howell.com', '$2y$10$9N19A5vO85fbqSaBH48UKuOQ/k.v./gtCwrw2IRmICXjcrmpDendu', 2, 'z6la29HnnX', '2019-09-18 01:47:50', '2019-09-18 01:47:50');
INSERT INTO `users` VALUES (52, 'Toy Harber', 'estracke@hotmail.com', '$2y$10$3vBFVcWCx8fdbkEPjnGP7eE3PqBfbfLk9ua9.z32H0r7/1Mdrd3WK', 2, 'Ec98NaZVma', '2019-09-18 01:47:51', '2019-09-18 01:47:51');
INSERT INTO `users` VALUES (53, 'Tamia Walsh', 'gavin.swaniawski@nitzsche.com', '$2y$10$alhn9kzTd1Gj0ITYBRQCyO5DlKGnXpPNdVu4alDWAkwV1n5nmk7fi', 2, 'jhFV3ZWoRb', '2019-09-18 01:47:52', '2019-09-18 01:47:52');
INSERT INTO `users` VALUES (54, 'Mitchel Kihn', 'iwatsica@schamberger.com', '$2y$10$WRNS6ZDoTJd7E9st9zWWPeuC8SalOi0.AiZ2wJt7rWOxlM7OEK9K2', 2, 'YaGH7OJlDe', '2019-09-18 01:47:54', '2019-09-18 01:47:54');
INSERT INTO `users` VALUES (55, 'Amir Walter MD', 'julius.hessel@yahoo.com', '$2y$10$vOYoOO0apVIdCsQeNogdreRW0Pkiq.3RnseKNeQs6UXOh7PQjnvg6', 2, 'bOnSOOca2f', '2019-09-18 01:47:55', '2019-09-18 01:47:55');
INSERT INTO `users` VALUES (56, 'Katharina Wyman', 'glang@schuppe.com', '$2y$10$2Tb2yVOylDv7onPTVUITZu9MkApT88fimIja7Rf8NgLC0oj08L3bm', 2, 'tSI0ZPHbA0', '2019-09-18 01:47:56', '2019-09-18 01:47:56');
INSERT INTO `users` VALUES (57, 'Prof. Myron Lind', 'maeve.okuneva@nitzsche.com', '$2y$10$u/b0rT1pdoBuvzQOvG3PAeX5izY4T1CpAf37945OjOW3L/dkXZkwS', 2, '0dzfYvHIA4', '2019-09-18 01:47:57', '2019-09-18 01:47:57');
INSERT INTO `users` VALUES (58, 'Rickey Gorczany III', 'flatley.florencio@hotmail.com', '$2y$10$20sjvSb9JrXWgsHjqZxJCOFlUcAhhz.IhkSnb1WRgXdqsZup.4QR2', 2, 'kBthoQ2ZRr', '2019-09-18 01:47:58', '2019-09-18 01:47:58');
INSERT INTO `users` VALUES (59, 'Lila Wilkinson', 'akihn@bosco.biz', '$2y$10$r0cKwkXMHZ3VpxHqxsNEDumcH3oeHy6C064IFSE3eLSR2AP99xBgS', 2, 'uXpBg1ZDEM', '2019-09-18 01:47:59', '2019-09-18 01:47:59');
INSERT INTO `users` VALUES (60, 'Prof. Makayla Schmitt I', 'kilback.courtney@yahoo.com', '$2y$10$bKHZYhIvUpGEBZzklO6PBuFYPeXGPB51a3b25Jltg2y488zOGigji', 2, 'wv83nyTojE', '2019-09-18 01:48:00', '2019-09-18 01:48:00');
INSERT INTO `users` VALUES (61, 'Prof. Katelin Lemke DVM', 'schaden.nikolas@legros.org', '$2y$10$d6qAPIj6aMvmazHIFA4asef6jY13p6KkEQN/JZBLMkOxzysLjWsuW', 2, 'q9crUZAALm', '2019-09-18 01:48:01', '2019-09-18 01:48:01');
INSERT INTO `users` VALUES (62, 'Jabari Grimes', 'rhoda.ernser@gmail.com', '$2y$10$sdUF9/v3hx1HSIh0Kj8S4u4kY/9GRQoJulUVjTo6vNLGe.bc3xLuK', 2, 'lB3a7oMtmb', '2019-09-18 01:48:02', '2019-09-18 01:48:02');
INSERT INTO `users` VALUES (63, 'Madelynn Marvin III', 'russel.gay@nolan.info', '$2y$10$4lldknvoA5xV5B1b6rVAaeHvjx8Kq6xuv5Q5.pGSsagLzUpX6GB5.', 2, 'lV8xVVNJNv', '2019-09-18 01:48:03', '2019-09-18 01:48:03');
INSERT INTO `users` VALUES (64, 'Norwood Murray', 'kbrown@pacocha.com', '$2y$10$W1/R/WEoBtaJ7od2bVukNO24W0KE6BX7Yl4rI0fEc1WmtEB7DlIAK', 2, 'jvKoufCHaF', '2019-09-18 01:48:04', '2019-09-18 01:48:04');
INSERT INTO `users` VALUES (65, 'Dr. Estefania O\'Reilly DVM', 'cullen.zboncak@brekke.com', '$2y$10$Hw2KL33zFQNos2IUgImZhu6VkRK7dDX/78RmsZFB8y7rZ.ntac9za', 2, '7xovL4z8kn', '2019-09-18 01:48:05', '2019-09-18 01:48:05');
INSERT INTO `users` VALUES (66, 'Miss Adaline Homenick', 'adams.sage@yahoo.com', '$2y$10$wefq6xBpI8BmnuJOx40f7u9RVCi2G00qwooB3rYbtkOtpGqpGyYZS', 2, 'BSMbJwiEcS', '2019-09-18 01:48:07', '2019-09-18 01:48:07');
INSERT INTO `users` VALUES (67, 'Miss Lysanne Jacobs Jr.', 'stephon.streich@yahoo.com', '$2y$10$kE6Yg1JWM6ORPzvraGY10OiAxwDukkLTpuU1iWt0L48sZ2bjKImPK', 2, '8XJR5bOBYD', '2019-09-18 01:48:08', '2019-09-18 01:48:08');
INSERT INTO `users` VALUES (68, 'Prof. Eleanora Hoeger', 'zander53@hotmail.com', '$2y$10$8azFXeOM1/wpJUOc0NjkguVfJ7FdfzdtyrJI56KN2pnjayB471H2W', 2, 'omabcZjcZh', '2019-09-18 01:48:09', '2019-09-18 01:48:09');
INSERT INTO `users` VALUES (69, 'Miss Creola Jenkins', 'mazie.metz@baumbach.com', '$2y$10$7cbxFQwyqloAlEXNw7EAeulgnOz.jvQdx0bzsDIbTzVRwnqaNSbkC', 2, 'oqAq8JRQ9i', '2019-09-18 01:48:10', '2019-09-18 01:48:10');
INSERT INTO `users` VALUES (70, 'Lorna Terry', 'jamar.nitzsche@thiel.com', '$2y$10$kNNHswPsKTAL79YbBztVe.WHdH8wOe2PNFN0wAOldTAg4ZCxKkDbO', 2, 'bRGznzc3vG', '2019-09-18 01:48:11', '2019-09-18 01:48:11');
INSERT INTO `users` VALUES (71, 'Noemy Balistreri', 'krajcik.fiona@hotmail.com', '$2y$10$Zy963TB.5uHNRE1grZ3csOfJ.kJCFHLoSDmpyBi6qiz1yR50L87si', 2, 'ERDEnUYrZJ', '2019-09-18 01:48:12', '2019-09-18 01:48:12');
INSERT INTO `users` VALUES (72, 'Rafaela Shanahan', 'ullrich.margarett@gmail.com', '$2y$10$BqPXvlnrMujWcxms/UWqO.Z/Q2svBNFO5qBHZP6ipAv0CSrU8lE.a', 2, 'WYAd6YC3aR', '2019-09-18 01:48:13', '2019-09-18 01:48:13');
INSERT INTO `users` VALUES (73, 'Yoshiko Blick', 'gregorio50@spencer.com', '$2y$10$1Cd5LdboXK0/NZ3nCKs8beJZ7nT03HaVW3wsFaAWSaioCyIfpZwL6', 2, 'eCGUugHArh', '2019-09-18 01:48:15', '2019-09-18 01:48:15');
INSERT INTO `users` VALUES (74, 'Mr. Geoffrey Schumm', 'olaf.mckenzie@hotmail.com', '$2y$10$squdnQhLOwbksaW/E83s2uADKIKGulBKmHXaa2wXaQnkPdb.f5u22', 2, 'D8bSFYUS34', '2019-09-18 01:48:16', '2019-09-18 01:48:16');
INSERT INTO `users` VALUES (75, 'Leslie Balistreri', 'sasha59@miller.com', '$2y$10$.JZ/J0dCEN0iBs2xpW/jI.gDWIOzgOx2LHqMUeRt2ECvkvTYQ.Xvy', 2, 'nVG4Wn5xXm', '2019-09-18 01:48:17', '2019-09-18 01:48:17');
INSERT INTO `users` VALUES (76, 'Lorena Yost', 'stoltenberg.tressa@greenholt.com', '$2y$10$hw6c0Nnf/e8F2CFSPC7RwOV00RZTY4GmOjCRIMVvjZibogcfItbPO', 2, 'rz5yfwIxTw', '2019-09-18 01:48:18', '2019-09-18 01:48:18');
INSERT INTO `users` VALUES (77, 'Mrs. Ilene Blick', 'jalen53@christiansen.com', '$2y$10$znAEW8wdlpyEpArKup/buu32qA0TuZOVvU5HgiRuiXD7tY0t78..O', 2, 'OJ0hUGwN4m', '2019-09-18 01:48:19', '2019-09-18 01:48:19');
INSERT INTO `users` VALUES (78, 'Antonetta Jerde', 'crona.katharina@mertz.com', '$2y$10$3VmZIhi4dADSpnPt9fRq1e0GlpHwVhTDW6J6iGzxEvomOyEcLXw1y', 2, 'kk4squZxnj', '2019-09-18 01:48:20', '2019-09-18 01:48:20');
INSERT INTO `users` VALUES (79, 'Deja Terry', 'xbrown@stokes.com', '$2y$10$FvmtGRkTk.HJnmySUc4F/u3mtDwWFMAYbdgH72wbqpi6YU5U8to.a', 2, 'm7JAOkVUtl', '2019-09-18 01:48:21', '2019-09-18 01:48:21');
INSERT INTO `users` VALUES (80, 'Yadira Jacobi', 'ltowne@sauer.com', '$2y$10$olrcKuBYL8v26UeAPBeKIu/hslTMv.eKcTbWC.uUcPXqauEX1.ntK', 2, 'U4SE3UfWv8', '2019-09-18 01:48:22', '2019-09-18 01:48:22');
INSERT INTO `users` VALUES (81, 'Ms. Karelle Farrell', 'ibrakus@halvorson.info', '$2y$10$s/AU5Jp0bzgwFFtB07Op1OlcN2wNpMfF5ta4wUqB1yI6sdb0R1MWC', 2, 'WwVA7ufxkS', '2019-09-18 01:48:24', '2019-09-18 01:48:24');
INSERT INTO `users` VALUES (82, 'Prof. Gussie Metz', 'mhaag@yahoo.com', '$2y$10$IsDNh1gRaE3JQfqI0LxKAOJ6sZ5L2WApv3DaCL.p.JrY0IG9j0s6y', 2, '4DVzDWmuqa', '2019-09-18 01:48:25', '2019-09-18 01:48:25');
INSERT INTO `users` VALUES (83, 'Vivian Johnston', 'brakus.humberto@cole.com', '$2y$10$WKtWTUZBgcOF9xl/25OBe.iWvL9GIXbU5QEGwtmT17BBa3B/0.vYS', 2, 'fvLuBqZVvh', '2019-09-18 01:48:26', '2019-09-18 01:48:26');
INSERT INTO `users` VALUES (84, 'Jettie Becker', 'yweissnat@armstrong.com', '$2y$10$NGbqfiS0WgDNFB4c6DnP.O9BC4vUn2Ob7oj/PwvilltzAxbRooyGa', 2, 'd9936jIYQg', '2019-09-18 01:48:27', '2019-09-18 01:48:27');
INSERT INTO `users` VALUES (85, 'Ms. Maryse Ruecker DDS', 'kohler.minnie@hotmail.com', '$2y$10$IxewookPZ8R4oQjZksP64OWXgn/ZpGubgBkYQMm/xTLUe0rv/fUv6', 2, 'oMV4DKX8km', '2019-09-18 01:48:28', '2019-09-18 01:48:28');
INSERT INTO `users` VALUES (86, 'Alanna Osinski', 'mills.dayne@hotmail.com', '$2y$10$D9dZLYXvvQbKEr5KPE5VWe9Fg1mlkDUtBK5dHXS8b2T2UuU/b4fSK', 2, 'fAnlsjJENq', '2019-09-18 01:48:29', '2019-09-18 01:48:29');
INSERT INTO `users` VALUES (87, 'Prof. Edmond Daniel DDS', 'florian94@gmail.com', '$2y$10$Xo5pijoqz3o2focZTwSCf.ycheM64n4LjOrPlhzhkRsYjv0odu1Gy', 2, 'UNc9fJaBSM', '2019-09-18 01:48:30', '2019-09-18 01:48:30');
INSERT INTO `users` VALUES (88, 'Cedrick Robel', 'fmurazik@pfeffer.info', '$2y$10$XWpEQRcdS3.Kvqniq5XpHewkbLt1O3usE9AgPHAbMFVbsR2UIvIQ2', 2, 'gBEDALcieL', '2019-09-18 01:48:32', '2019-09-18 01:48:32');
INSERT INTO `users` VALUES (89, 'Lauretta Langosh IV', 'vhessel@leffler.info', '$2y$10$wiGFog.ZpQ8fZdZnWxaCkuEWSBk96Cw9Qmuc76Pb8nzF8GFRYibTW', 2, 'xXL7FEGARY', '2019-09-18 01:48:33', '2019-09-18 01:48:33');
INSERT INTO `users` VALUES (90, 'Viviane Bailey', 'gregoria.hessel@schulist.net', '$2y$10$WA/Wd.FNcws3HEHGPzDg9OmNV/09JujgUkFdmsoB0Q81WYKMBRSi.', 2, 'buOy91pk0K', '2019-09-18 01:48:34', '2019-09-18 01:48:34');
INSERT INTO `users` VALUES (91, 'Jamie Marvin', 'braun.jennyfer@boyle.org', '$2y$10$358apIv/WB7nYpWWdI5s3ODc3QMomPIbcoh1NJ3cL0qWA/WjiRVje', 2, 'ByroTEMC46', '2019-09-18 01:48:35', '2019-09-18 01:48:35');
INSERT INTO `users` VALUES (92, 'Icie Rath DVM', 'blittle@wilderman.com', '$2y$10$548O.9AksX.IoDElVBgyiOMi2WYBO/bk/8sO5Kf4O.4l60Iy..GGW', 2, 'apO0ikGmMW', '2019-09-18 01:48:36', '2019-09-18 01:48:36');
INSERT INTO `users` VALUES (93, 'Dr. Will Rodriguez Jr.', 'vdeckow@bartell.com', '$2y$10$zG1MtX8OnMiUFvELJnanL.fWHmIkFjpriU8Em9aVtX1f28nkfhCe2', 2, 'n4xVoZNKQ9', '2019-09-18 01:48:37', '2019-09-18 01:48:37');
INSERT INTO `users` VALUES (94, 'Jonathan Hand', 'lubowitz.hanna@hotmail.com', '$2y$10$EZGqu2P/y.IcQVSi.CCH8eKXkAsHmpw/y8xa7aZYFkZtR4ZVzWLx.', 2, 'ag73dCcLz5', '2019-09-18 01:48:38', '2019-09-18 01:48:38');
INSERT INTO `users` VALUES (95, 'Genesis Dickens', 'stanford.morissette@dickinson.com', '$2y$10$A0NVYYcmEqXr8byzTPtv1OzPDr33yb1.8mDrK5PG5WqhMIaOJ0/O.', 2, '6isaMSIrwE', '2019-09-18 01:48:39', '2019-09-18 01:48:39');
INSERT INTO `users` VALUES (96, 'Isadore Green', 'mckenzie04@gorczany.org', '$2y$10$ALd3dGnUkfwO4GUAnlLThOwQKW15blrkhsNZG0Hu5FuqvojJoxN96', 2, 'CD7GKiIfEW', '2019-09-18 01:48:40', '2019-09-18 01:48:40');
INSERT INTO `users` VALUES (97, 'Pansy Jacobi Sr.', 'rhayes@hotmail.com', '$2y$10$HRHwSHUOH8EZuoDra4DNVentXyKfmbOH8SjwOYZdUewXDf3UP8d3C', 2, 'ac2CxlP2wS', '2019-09-18 01:48:41', '2019-09-18 01:48:41');
INSERT INTO `users` VALUES (98, 'Lavern Walter', 'noel10@hand.info', '$2y$10$K3RLMNylsHPNHkO00onbZ.USrufG/PAUC8KrIorWw34XfFdfdmG7K', 2, 'QvUqgH2YZF', '2019-09-18 01:48:42', '2019-09-18 01:48:42');
INSERT INTO `users` VALUES (99, 'Chaya Rempel MD', 'lenora.hilpert@gmail.com', '$2y$10$R2aPW0X6ZKTsv50zSMuIHehVBX9VQYbcZQHGEMXD8dHYY11/bcP4C', 2, 'gwkL77XYBV', '2019-09-18 01:48:43', '2019-09-18 01:48:43');
INSERT INTO `users` VALUES (100, 'Claud Becker', 'marjorie.bednar@homenick.com', '$2y$10$ohiql5F/v.Sm0u4jucxqAe.VRq2pHMT01qx8/8LDyYiGmvTqeqR7i', 2, 'fYh7UfPnDj', '2019-09-18 01:48:44', '2019-09-18 01:48:44');
INSERT INTO `users` VALUES (101, 'Lon Ziemann', 'bshields@hotmail.com', '$2y$10$V9N84k275WbIb92rDVMtwOUmbtKoMFnFAFP9rznenw7Teke1JN4Hq', 2, 'sfi28SsSwI', '2019-09-18 01:48:45', '2019-09-18 01:48:45');
INSERT INTO `users` VALUES (102, 'Liana Auer DVM', 'carlee29@ratke.com', '$2y$10$cDb4zJtgY/9nkQKVhzfnAOC9eRI.FijOEaZagO7LL.EVMwkRH/9Yi', 2, 'nGit2pvPSl', '2019-09-18 01:48:46', '2019-09-18 01:48:46');
INSERT INTO `users` VALUES (103, 'Dr. Itzel Kuhlman Sr.', 'meredith00@emmerich.org', '$2y$10$XjAnZNAc8bJhzVI1blTaveNfzwYWN48mdlzXAP/AvYNCqVyl/Afuq', 2, 'p2HJMViiAu', '2019-09-18 01:48:47', '2019-09-18 01:48:47');
INSERT INTO `users` VALUES (104, 'Jadon Abshire', 'nettie.effertz@ryan.com', '$2y$10$Y839RHQh5qul8kz.eGBXF.eedJT7YHU/xBf6HXHceMjM0AB.ch74m', 2, '9JTQ7Yivy2', '2019-09-18 01:48:49', '2019-09-18 01:48:49');
INSERT INTO `users` VALUES (105, 'Johnson Ryan', 'felipa.flatley@hintz.net', '$2y$10$V.EA8Y4Kd4UzPb45k1erf.glmpDu2yGltaki7ObZMsizvhd2UdggG', 2, '7w0kLrm7ay', '2019-09-18 01:48:50', '2019-09-18 01:48:50');
INSERT INTO `users` VALUES (106, 'Shanny Marks', 'lorna08@yahoo.com', '$2y$10$iZBmxY5qxUUtZq6a5o7VmOiXRNAsNqgh0qXukYUxB8IOTsjuKezSS', 2, 'renNDINhHw', '2019-09-18 01:48:51', '2019-09-18 01:48:51');
INSERT INTO `users` VALUES (107, 'Ole Sporer', 'yost.america@yahoo.com', '$2y$10$iDqth/7kZOIhPj3TUUk7j.nhOSiZ0jACeE6qcHI4Eugii/Z6aiDqK', 2, 'Gy4qkccPQZ', '2019-09-18 01:48:52', '2019-09-18 01:48:52');
INSERT INTO `users` VALUES (108, 'Prof. Jovani Paucek', 'dillan12@nitzsche.com', '$2y$10$AnzdmALrhLhvqTvmEgGEJebFcW.cdjJkImHmBhGOH.6xE7Ww2rNRa', 2, 'TedXCedQ8S', '2019-09-18 01:48:53', '2019-09-18 01:48:53');
INSERT INTO `users` VALUES (109, 'Granville Walsh', 'golden16@hotmail.com', '$2y$10$MTHPbCMRhYkjnCBHwU6tH.tFQZrqHYuNE5SqhPyWnzKWUgZ.ZVnsu', 2, '3wYqykHeEK', '2019-09-18 01:48:54', '2019-09-18 01:48:54');
INSERT INTO `users` VALUES (110, 'Nicolette White', 'tevin08@lesch.com', '$2y$10$2D/HayNiiA9mUL2BogETKeucDpELapvwV8cXSUXo.AjKXrw/ziHji', 2, 'vvKcQ8qtCA', '2019-09-18 01:48:55', '2019-09-18 01:48:55');
INSERT INTO `users` VALUES (111, 'Malika Mayer', 'schmitt.alberto@ebert.com', '$2y$10$DxLUhS7dAn/uQ5OEJysOh.5b2s5zvznzP6BnqfW/gkqA3etSUaMKS', 2, 'wZTKqIT3TB', '2019-09-18 01:48:57', '2019-09-18 01:48:57');
INSERT INTO `users` VALUES (112, 'Hassan Beier', 'jefferey10@hermiston.info', '$2y$10$mWQmhteHb7MbbQ2AIu5QauscFbjaAm8HGysr4m4Nc.xTzXUn6JPcG', 2, 'wVVe422VpY', '2019-09-18 01:48:58', '2019-09-18 01:48:58');
INSERT INTO `users` VALUES (113, 'Verda Bahringer', 'jones.stefan@yahoo.com', '$2y$10$GzPKKtCcnsoac9Zd50P8Sef/q.QYyz6047gxm24ylEbiiiuFKbrKO', 2, 'ggjPK63t4E', '2019-09-18 01:48:59', '2019-09-18 01:48:59');
INSERT INTO `users` VALUES (114, 'Esmeralda Miller PhD', 'uboyer@hotmail.com', '$2y$10$KbXJ9AxUV1eXV9bj3wKpCOQTVREmMtSpzwZx1QXb6tWBdoIkIVTXy', 2, 'iw5R6y0iXb', '2019-09-18 01:49:00', '2019-09-18 01:49:00');
INSERT INTO `users` VALUES (115, 'Dr. Danyka Gutmann', 'enola.jerde@gmail.com', '$2y$10$SihzVFp9XbN/w0hw4D99yOawLHAAukPDe2Z5xBWyYLxqnUZ9Tx9q2', 2, 'RcRH8hE9HJ', '2019-09-18 01:49:01', '2019-09-18 01:49:01');
INSERT INTO `users` VALUES (116, 'Mr. Johnpaul Thompson', 'lyda.shanahan@hotmail.com', '$2y$10$iNj5Wdu8oTl0fWYpWlCEd.rmqqKaiHIiDp3yD.mw/h70IwM5oHdze', 2, 'RzD8tNRTti', '2019-09-18 01:49:02', '2019-09-18 01:49:02');
INSERT INTO `users` VALUES (117, 'Juanita Pouros PhD', 'trobel@yahoo.com', '$2y$10$BX1p2e9ffhsXkpt1Z3zhn.VSPNPYFa9cgd970pT/MlKmEvQ/mHxm2', 2, '9NLzs1Qh8n', '2019-09-18 01:49:03', '2019-09-18 01:49:03');
INSERT INTO `users` VALUES (119, 'Lula Kuvalis DVM', 'borer.betsy@howell.com', '$2y$10$ty1gsgG4QJjOYrca/gb3Yuh4hXStNb71gaI.2lYvVsfaq3d0/9jpm', 2, 'BH5J3T0obJ', '2019-09-18 01:49:05', '2019-09-18 01:49:05');
INSERT INTO `users` VALUES (120, 'Millie D\'Amore', 'angeline66@yahoo.com', '$2y$10$ve3aJfo7FURniT.cL90R5ujSNxjNdZwkoLs30DmUp9fhSesfuAygG', 2, 'NJwS5oUTC5', '2019-09-18 01:49:06', '2019-09-18 01:49:06');
INSERT INTO `users` VALUES (121, 'Mr. Erwin Jones I', 'evans.hoppe@hotmail.com', '$2y$10$ceG1MikcJMjaxur2vsCP6uFNtSHhaKoj0rTFjpd8ktZIp2f/ZEoau', 2, 'PsLaIRXm48', '2019-09-18 01:49:07', '2019-09-18 01:49:07');
INSERT INTO `users` VALUES (122, 'Merlin Barton PhD', 'haven.mosciski@corwin.biz', '$2y$10$9kGmJWPV.6OTM2vdoVCeuuZz1DVjCzprukOnrANDYyow/PEvW.ld.', 2, 'tnJFLXrPRX', '2019-09-18 01:49:08', '2019-09-18 01:49:08');
INSERT INTO `users` VALUES (123, 'Delta Powlowski', 'kavon.krajcik@gutmann.com', '$2y$10$.3b7tNjaoTO2jXfi7WdDxeglFxha/RfHAncerOyvEGGPXOA3O7vGy', 2, 'dDy94wO2js', '2019-09-18 01:49:09', '2019-09-18 01:49:09');
INSERT INTO `users` VALUES (124, 'Hassie Brekke', 'wilderman.hailey@kautzer.com', '$2y$10$3gM/qc9YaU4pWZ6nmEhWpuYzgR2eET7on/pwAFCSzotFgzp0RE6oq', 2, 'skM3IqStn3', '2019-09-18 01:49:11', '2019-09-18 01:49:11');
INSERT INTO `users` VALUES (125, 'Zella Wolff', 'gerry.streich@yahoo.com', '$2y$10$uXAjeMr7B6MyOuzUh4PSduF3C9611FPVgIbqOp3RQzKRbidSt/7le', 2, 'IY5vNMblwQ', '2019-09-18 01:49:12', '2019-09-18 01:49:12');
INSERT INTO `users` VALUES (126, 'Prof. Marge Crona Jr.', 'ophelia99@steuber.com', '$2y$10$XnMMiHLEA5cys8z.0S9MyuM.Ryi2q7RtIIIAucfE4LXiGdtqE4WlC', 2, 'eUq4duEbqn', '2019-09-18 01:49:13', '2019-09-18 01:49:13');
INSERT INTO `users` VALUES (127, 'Dale Russel DDS', 'angela.satterfield@yahoo.com', '$2y$10$S.9SKwLgA785qS2IGU6lyu0D/L6gObxD4b.Hlzunn1V7CWsXEBo5G', 2, 'hs7Pv14pmR', '2019-09-18 01:49:14', '2019-09-18 01:49:14');
INSERT INTO `users` VALUES (128, 'Randall Hoppe', 'arnaldo47@batz.info', '$2y$10$boqZGYHnzwbtW.RTpUeoouOVsT7ywQ4LRpr.eTRFtJcXkp2FgV86K', 2, '0cIyTZu68g', '2019-09-18 01:49:15', '2019-09-18 01:49:15');
INSERT INTO `users` VALUES (129, 'Jermaine Barrows', 'hammes.roy@strosin.com', '$2y$10$AHgVBbwQEexAfFZbf3b0iOsC7tzXDAbQHj8vt8y3JXdnIhxV78HZa', 2, 'hhytA4CqSa', '2019-09-18 01:49:16', '2019-09-18 01:49:16');
INSERT INTO `users` VALUES (130, 'Dr. Micah Dare II', 'julio46@blick.com', '$2y$10$eBUNM6T4el4vfVQ0dPnpGOaoaxlNX5UwOi8UJwEoRRLU45AppMXsa', 2, 'jweTxsSbgz', '2019-09-18 01:49:17', '2019-09-18 01:49:17');
INSERT INTO `users` VALUES (131, 'Ms. Otilia O\'Connell II', 'mcummings@yahoo.com', '$2y$10$3/AhG3x7KdG/ZHmkSGb17O.Cr2FQlF5V87tasvdwbEiaHn9TQyGV2', 2, 'eiKQH2aoNN', '2019-09-18 01:49:18', '2019-09-18 01:49:18');
INSERT INTO `users` VALUES (132, 'Camylle Mraz', 'jackeline37@gmail.com', '$2y$10$OFXLZCqqDrYGzIMvsRheYOEoG5q5SfZTYhcmHXi6gMtuNXgs1Pbju', 2, '4NbtY2nQs0', '2019-09-18 01:49:19', '2019-09-18 01:49:19');
INSERT INTO `users` VALUES (133, 'Dr. Everett Schultz IV', 'fabshire@gmail.com', '$2y$10$bobppYC7qd.L2Ummh0e/Xex3t.9cKcjtPJGv91cCChzD3ilwhQEAC', 2, '5IzwSLw7qd', '2019-09-18 01:49:21', '2019-09-18 01:49:21');
INSERT INTO `users` VALUES (134, 'Allen Lindgren', 'vern60@kuhlman.com', '$2y$10$d.cLabztF43qLyS6VizNe.2wojY5FyCseWv/FQeOxgxmPaN/5N39u', 2, 'EcN9fpGH41', '2019-09-18 01:49:22', '2019-09-18 01:49:22');
INSERT INTO `users` VALUES (135, 'Kolby Hill', 'qbatz@gmail.com', '$2y$10$QBrp6WMsnegC2UKrBzLZNup2f4sG19RtFVH.1nwMooOsx1.I38pRW', 2, '0i2Nlio2Xu', '2019-09-18 01:49:23', '2019-09-18 01:49:23');
INSERT INTO `users` VALUES (136, 'Coty Kessler', 'edickinson@zemlak.net', '$2y$10$OhF319Z9069xB9ygFKPxdeArpl7cEYGE4q1Ug/Q8fJYhF2RIIfXsO', 2, '4PpyFIqAwO', '2019-09-18 01:49:24', '2019-09-18 01:49:24');
INSERT INTO `users` VALUES (137, 'Era West PhD', 'cleve94@yahoo.com', '$2y$10$Xy8Mc8LLUJ/MiH16OBGEb.ahl1FQwL9yfdCaPMVNgu4TqHHPTU/uK', 2, 'JhGTYZlYhd', '2019-09-18 01:49:25', '2019-09-18 01:49:25');
INSERT INTO `users` VALUES (138, 'Brook Gleichner', 'abel.bradtke@champlin.biz', '$2y$10$DLGVcCI8YPLEl7ingWMyoeGKXAHpr3GEUKPmhXkxH.1IcMLikfxc6', 2, 'CpZkKtDKvL', '2019-09-18 01:49:26', '2019-09-18 01:49:26');
INSERT INTO `users` VALUES (139, 'Gisselle Klein', 'concepcion.orn@lebsack.net', '$2y$10$JfqJ4ryJYmfeCzYB/h8ojOiCbkXIphuB63QdSpUhSyiS96C3.2xtq', 2, 'eI7SDcq04e', '2019-09-18 01:49:27', '2019-09-18 01:49:27');
INSERT INTO `users` VALUES (140, 'Kamren Bailey', 'zane.boyle@borer.com', '$2y$10$pQ1qFVsGR4gPGComwki1Z../usRQGEr6hCO5woOb7RIVjYW4R6MbW', 2, 'l6OVRHsh83', '2019-09-18 01:49:29', '2019-09-18 01:49:29');
INSERT INTO `users` VALUES (141, 'Alberta Wuckert', 'aspencer@torp.com', '$2y$10$2YF4tVwANGMaGqVGAgWNAegyaZcDHDFcdHpyTTHHROJbE8RWAHJPK', 2, 'CCRNawu6CB', '2019-09-18 01:49:30', '2019-09-18 01:49:30');
INSERT INTO `users` VALUES (142, 'Celia Hoeger', 'oceane.hickle@yahoo.com', '$2y$10$ufsk.H2CTEhe5fVeH1x2rOwtPSKszzE4qTeGoMRKYQ2tWw8El5Lvi', 2, 'AAS9DPWYzp', '2019-09-18 01:49:31', '2019-09-18 01:49:31');
INSERT INTO `users` VALUES (143, 'Mrs. Jana Kulas', 'yzieme@marvin.biz', '$2y$10$kzwcjRZJmUyKlYpe5QfCuO1LIrnVE3B629cSld4T72t6f8AE17Fy2', 2, 'kWTYWld3Vp', '2019-09-18 01:49:32', '2019-09-18 01:49:32');
INSERT INTO `users` VALUES (144, 'Miss Mae Adams Sr.', 'ludwig84@kemmer.com', '$2y$10$LDP6UWdwnz2YVg1eLUh3L.a1.ap8iVWLGk19fIoDcy2mhCyQ5SOuW', 2, 'rR0F2AgilW', '2019-09-18 01:49:33', '2019-09-18 01:49:33');
INSERT INTO `users` VALUES (146, 'Milton Pfeffer Jr.', 'rogers.gerhold@hotmail.com', '$2y$10$pxHaCOPbamG.aBtnkUOc.u0IuaLSSUGM4PrVwCXnM9hNV8NgldL9W', 2, 'EbY9hnvksO', '2019-09-18 01:49:35', '2019-09-18 01:49:35');
INSERT INTO `users` VALUES (147, 'Foster Schuster', 'flatley.marisa@gorczany.org', '$2y$10$VJ0IePpGiTuPYOUhXHWqVu5t8Mvpg2J3BttQG2PyX3rdEREyCAV4a', 2, '2kcNwCjx7y', '2019-09-18 01:49:36', '2019-09-18 01:49:36');
INSERT INTO `users` VALUES (148, 'Shany Smith', 'waelchi.ransom@bahringer.org', '$2y$10$pRCiixTEyaHXD6RFjQHeie.WfuvEUvBEwxP.t0bUaczLN4cazvK8K', 2, '0T63y3DFuV', '2019-09-18 01:49:38', '2019-09-18 01:49:38');
INSERT INTO `users` VALUES (149, 'Nannie Roberts', 'schultz.katlynn@yahoo.com', '$2y$10$oHN3y9cpfoJuI6sW8RmdoetE3tkJG5J8nKhUGjT6y.8JGCZchmP0a', 2, 'lBz3lJ4Ms6', '2019-09-18 01:49:39', '2019-09-18 01:49:39');
INSERT INTO `users` VALUES (150, 'Harmony Steuber', 'armstrong.estell@yahoo.com', '$2y$10$AOER/VUtpoZvVd60VblbieuAWe.U7BWK9jYp0blxxrtwezhhcS4He', 2, 'e1ywVeTGrY', '2019-09-18 01:49:40', '2019-09-18 01:49:40');
INSERT INTO `users` VALUES (151, 'Mavis Balistreri', 'rolfson.demetris@reichert.com', '$2y$10$pjKwQjtqp4JORdZSxi.U2u4m73olW338dizYdK.ifCToxzXWFOQJ2', 2, 'wiERISXp9h', '2019-09-18 01:49:41', '2019-09-18 01:49:41');
INSERT INTO `users` VALUES (152, 'Jake Kassulke', 'gutkowski.easton@yahoo.com', '$2y$10$txVSlnyLX6XUbTm6uUtAf.0T3.jL2584z9uAns5KVxOkkjJ8Anwca', 2, 'FHjfKU942P', '2019-09-18 01:49:42', '2019-09-18 01:49:42');
INSERT INTO `users` VALUES (153, 'Jaquan Hauck', 'walker.micheal@yahoo.com', '$2y$10$1KUG2kOqXCibBV6zbYQVBe4jLZnz6Hcq5oC8YWZEPY3hvAUi/IqyS', 2, 'lG85GWjXoc', '2019-09-18 01:49:43', '2019-09-18 01:49:43');
INSERT INTO `users` VALUES (154, 'Velda Schmeler', 'runte.madisyn@beahan.biz', '$2y$10$/NLXsIgkq6eZCgn1enHKi.CyCZFhfbtgLkbUW1n7VMwOwj/dhjGy6', 2, 'cSzTfDNt2q', '2019-09-18 01:49:44', '2019-09-18 01:49:44');
INSERT INTO `users` VALUES (155, 'Miss Michele Treutel', 'salma54@hoppe.com', '$2y$10$H35etbpep25/w4/UdFqU1egV3LAw6//bKTj6GPEfHsA6CHA/w31HC', 2, 'lDWWZdSKAV', '2019-09-18 01:49:46', '2019-09-18 01:49:46');
INSERT INTO `users` VALUES (156, 'Dr. Amparo Gulgowski', 'nikolaus.hilton@yahoo.com', '$2y$10$dSuD/CdVApJ.J0HAYDEhVe/hxam6i4iH700LE.e/qqXdbGGK6g8Sy', 2, '7rr81WTLUM', '2019-09-18 01:49:47', '2019-09-18 01:49:47');
INSERT INTO `users` VALUES (157, 'Assunta Swaniawski', 'areichel@berge.com', '$2y$10$Rb2YuXYxS/yV7DCmQk/b/eB9N7JFyYZy.z75zKVhYtEFe7Jgm5dle', 2, 'rVZ0Fdj54A', '2019-09-18 01:49:48', '2019-09-18 01:49:48');
INSERT INTO `users` VALUES (158, 'Mr. Constantin Wehner', 'dejon.emard@yahoo.com', '$2y$10$NglW1qztcxORSyrsFzhpnuT/eWHMGkLObqip6Fs5P5HFYnaPVaYsS', 2, 'Vfpf3AAnAe', '2019-09-18 01:49:49', '2019-09-18 01:49:49');
INSERT INTO `users` VALUES (159, 'Felton Schamberger', 'quigley.zachery@schumm.com', '$2y$10$iRERy2c3Q8dazZi/7d3BaOuyeGWrt7380auJMZlsO56zugGjh4EK6', 2, '9AfnaTGzDE', '2019-09-18 01:49:50', '2019-09-18 01:49:50');
INSERT INTO `users` VALUES (160, 'Hertha Bechtelar', 'ezieme@bartell.com', '$2y$10$L.tibKxYqTRYUrm/lCHlfONOPlAjs6iEeim8oRm4CdL3IBnaaZbFW', 2, 'wW5yiSzGRi', '2019-09-18 01:49:51', '2019-09-18 01:49:51');
INSERT INTO `users` VALUES (161, 'Miss Eunice Strosin V', 'umccullough@kohler.net', '$2y$10$lFlTEDYMDR.wmXLiIu5Kve9PcL3eqs9lK62Z8vx/jYNKz1h9a8R3q', 2, 'shfKDGQASW', '2019-09-18 01:49:52', '2019-09-18 01:49:52');
INSERT INTO `users` VALUES (162, 'Myra Graham', 'sanford.lysanne@legros.com', '$2y$10$wtsfP3V20qTuauIybKpf9.uVsKxfBEuk4//paD7gS9Q1MmBqny72W', 2, 'UZNJzkwmDf', '2019-09-18 01:49:53', '2019-09-18 01:49:53');
INSERT INTO `users` VALUES (163, 'Adonis Ankunding', 'dorothy.ortiz@yahoo.com', '$2y$10$ZvhbHSZ3lJN1k4P1KBgkl.HDJaFICIXmsf7TmUKq8u.Hd0dn7Odee', 2, 'D3o2jsMvtH', '2019-09-18 01:49:55', '2019-09-18 01:49:55');
INSERT INTO `users` VALUES (164, 'Glen Reichert', 'wilderman.lloyd@cole.com', '$2y$10$mg4u1oxm55cESh/Iy6dJWuVK6HP1uvXPV.9PU1e2.JFE98r7L.fBC', 2, 'svUlvuyBut', '2019-09-18 01:49:56', '2019-09-18 01:49:56');
INSERT INTO `users` VALUES (165, 'Celine Ernser', 'kuhlman.hank@toy.com', '$2y$10$YeYd7roEELW97hDToVMR/u9G6ktKadb8pSiR4QIH1CExPlIFj1if.', 2, 'bskM5uV1vO', '2019-09-18 01:49:57', '2019-09-18 01:49:57');
INSERT INTO `users` VALUES (166, 'Krystel Wunsch', 'wilderman.lonny@yahoo.com', '$2y$10$BNz0HIIm15qI0KlO2omvZepsVwBIUl1L4uOt1aCEJuA9.wdFhdiqe', 2, 'OHl5A8FAxq', '2019-09-18 01:49:58', '2019-09-18 01:49:58');
INSERT INTO `users` VALUES (167, 'Horace O\'Kon', 'mhoppe@lang.com', '$2y$10$J6k98DexICQ1Uf6OcX74FOqZS1Euidt6l3zbdmeSZfWGPVCqOO9Wm', 2, 'XN5zXDi9Ct', '2019-09-18 01:49:59', '2019-09-18 01:49:59');
INSERT INTO `users` VALUES (168, 'Mr. Clifton Kunde I', 'qcorkery@bauch.com', '$2y$10$YaBPA2WWligz/ic8w7.2aeMKNUKJIl5I63rlg1JPTAJ/lIhonwnIa', 2, 'prLVgFPLvq', '2019-09-18 01:50:00', '2019-09-18 01:50:00');
INSERT INTO `users` VALUES (169, 'Ms. Tressa Hauck I', 'cecilia.stanton@gmail.com', '$2y$10$GXCPdoFYhLN7dM6LgcB1Tet2gQOE9t6jwqxIudoejlFgrA/qrbN4K', 2, 'ApMehR078I', '2019-09-18 01:50:01', '2019-09-18 01:50:01');
INSERT INTO `users` VALUES (170, 'Mrs. Imelda Kuphal III', 'eliane83@hotmail.com', '$2y$10$LbW7S8cDTusdYFWOVe82CeKEIgNzgKHQ784JjJw7yt2xjUGeUYvH6', 2, 'SD2vavUgzg', '2019-09-18 01:50:02', '2019-09-18 01:50:02');
INSERT INTO `users` VALUES (171, 'Marty Goodwin', 'robin.morar@toy.com', '$2y$10$vHgIBe/KLGWwTS2My/ZHG.0GddBbK7gD2qrw2U8RX5m7eLSpDA75K', 2, 'tRb979bRR9', '2019-09-18 01:50:03', '2019-09-18 01:50:03');
INSERT INTO `users` VALUES (172, 'Milton Wilderman', 'tremaine51@boehm.info', '$2y$10$bvWPaLsyrYNwSxs6.ZP0jeEhLGR5pE75SAvUR5tFi2BMxKWgvvhRe', 2, 'anpm7wzcWY', '2019-09-18 01:50:04', '2019-09-18 01:50:04');
INSERT INTO `users` VALUES (173, 'Miss Greta Collier PhD', 'queenie.gibson@yahoo.com', '$2y$10$TEcpVhjfKYwvj6iaOmVJ4eK8OYMilOvrZ/ubyATmAU.Eatc5GqMtq', 2, 'RYvJ0YCiwg', '2019-09-18 01:50:05', '2019-09-18 01:50:05');
INSERT INTO `users` VALUES (174, 'Dr. Kaylah Spinka I', 'djohnson@heller.com', '$2y$10$0mdgpt5kmA0xj1RlAE2C/O.3bsdMDO6V4PJL6rBkHYEv9gsyMs7Ey', 2, 'WmBbWKHd8B', '2019-09-18 01:50:06', '2019-09-18 01:50:06');
INSERT INTO `users` VALUES (175, 'Mr. Gustave Terry', 'chad17@gmail.com', '$2y$10$wGRiPGoQTPPoT1lNI5yoHebDkDPy0z0PpEq5AM4HHFNk2cLa6eB8e', 2, 'uKAacesEld', '2019-09-18 01:50:08', '2019-09-18 01:50:08');
INSERT INTO `users` VALUES (176, 'Jaclyn Little', 'vklein@legros.com', '$2y$10$9m14CfodM8RUm.hx3e7ZLukDBca10EO/rF4mKXUA2gx9Ok.C8PM/.', 2, 'nGzXnIFqiK', '2019-09-18 01:50:09', '2019-09-18 01:50:09');
INSERT INTO `users` VALUES (177, 'Chanelle Johnston I', 'hauck.brice@yahoo.com', '$2y$10$k3jZQNri95HQ1aKwGw6NN.v/cYNqQv5QedlpJN28Rk3OXuf03RdI.', 2, 'fdT3ieT2Id', '2019-09-18 01:50:10', '2019-09-18 01:50:10');
INSERT INTO `users` VALUES (178, 'Dr. Lue Dickens', 'faustino48@bergnaum.com', '$2y$10$4c3QNrQyg9Uwakn9raVTMudevPzLMAOV.e.Qub85csJEe7.4KXwAm', 2, 'wrZC2GeWzm', '2019-09-18 01:50:11', '2019-09-18 01:50:11');
INSERT INTO `users` VALUES (179, 'Jaquelin Kuhic', 'schamberger.rodrigo@ondricka.org', '$2y$10$0Bvo9Wv6I5CbLhfR.M.2a.Db4.VDsB0eWE5t5h1h4JnSbi1Wg4uru', 2, 'mpzzeayzl4', '2019-09-18 01:50:12', '2019-09-18 01:50:12');
INSERT INTO `users` VALUES (180, 'Dr. Junior Lemke', 'abigale65@yahoo.com', '$2y$10$RBZ1yhCzmQH6NFxip9asMu.n/Rg1/j0y4e3n2bgD0cinEz5zBWKcy', 2, 'BVl8MNC6E0', '2019-09-18 01:50:13', '2019-09-18 01:50:13');
INSERT INTO `users` VALUES (181, 'Tony Hoppe', 'haleigh.bailey@kshlerin.biz', '$2y$10$YyStHuoYrokuuittd1fQnOGpEMlzf0bEOQy2BACjl236zrI5bg0Ri', 2, 'kH4qAZTUaE', '2019-09-18 01:50:14', '2019-09-18 01:50:14');
INSERT INTO `users` VALUES (182, 'Freeman Wolff', 'zlemke@hotmail.com', '$2y$10$Y9VRsktS6zGpZJku6A.dS.S1HEqluQg/E8a2li1EkVl7TaPBP0/PW', 2, 'YsQtCHkOvq', '2019-09-18 01:50:15', '2019-09-18 01:50:15');
INSERT INTO `users` VALUES (183, 'Dr. Sammy Schumm', 'josephine.quigley@stracke.net', '$2y$10$T5rgLhme8I3/AlU8hgJR.OWMymu.D2L9H8fw37U.jc9vEKpUG79c2', 2, 'CakpQehQaw', '2019-09-18 01:50:16', '2019-09-18 01:50:16');
INSERT INTO `users` VALUES (184, 'Natasha Ward', 'sophie36@miller.com', '$2y$10$IbtRkUby1xgMj7de5PRl7OrKx1kPmA.C3iE/pVuEiYsQ2HYPXkF.K', 2, 'fNoWUrWkBq', '2019-09-18 01:50:17', '2019-09-18 01:50:17');
INSERT INTO `users` VALUES (185, 'Micaela Waelchi', 'estell.lockman@hotmail.com', '$2y$10$aGJzcyJn30fAxAU.9oP4i.GUVjesEHmmDt3SEMc25SGGFRp0PzgB.', 2, 'sZmKB2T3FA', '2019-09-18 01:50:18', '2019-09-18 01:50:18');
INSERT INTO `users` VALUES (186, 'Polly Kilback', 'alena88@yahoo.com', '$2y$10$ySioA/7QPzmePzQgMY/x0eFH2RT27uq71XvCjPApesTDN4CCyiNSq', 2, 'U5wxti2QJD', '2019-09-18 01:50:19', '2019-09-18 01:50:19');
INSERT INTO `users` VALUES (187, 'Dr. Royal Bahringer', 'schmitt.fanny@kirlin.com', '$2y$10$w9R9IfWdSddV2WWhzdy.e./faylMOIHBKMklSZSaUEL/e2mh9f9hW', 2, 'qq24FXUVUc', '2019-09-18 01:50:20', '2019-09-18 01:50:20');
INSERT INTO `users` VALUES (188, 'Maddison Hegmann', 'lmorissette@willms.com', '$2y$10$jK9oDUPJaeQTSNX0e.FTsuq18HvCaCeviqABStIf2EFX2pfvSTD4K', 2, 'Tv33Jc0DYX', '2019-09-18 01:50:22', '2019-09-18 01:50:22');
INSERT INTO `users` VALUES (189, 'Isaiah Ullrich PhD', 'rice.kareem@quitzon.net', '$2y$10$1PyUhWzUf1iHly6PFewyGeamdxZ8Pz/noV.LhBkIwnV1mqofMAs4i', 2, 'ckBkAfmE8A', '2019-09-18 01:50:23', '2019-09-18 01:50:23');
INSERT INTO `users` VALUES (190, 'Erwin Bergstrom II', 'renee33@hotmail.com', '$2y$10$BmffDLxtcqeAEsiZ9BKB.uO3s2UylzseUC3TnTe97vQ5JY9fZ/OtW', 2, 'kwW6HW1bn8', '2019-09-18 01:50:24', '2019-09-18 01:50:24');
INSERT INTO `users` VALUES (191, 'Ms. Lori Gleason DVM', 'mhaley@waters.com', '$2y$10$Ay0ePtl5MeXDhnkfSo0AY.pzX2ceqRFkgGOE6VxrDZwxQiQORdEN.', 2, 'BxuiLwO6kz', '2019-09-18 01:50:25', '2019-09-18 01:50:25');
INSERT INTO `users` VALUES (192, 'Johnathan Effertz', 'ssmitham@hotmail.com', '$2y$10$Nw8guDJHuHYn/2oDvjQJau8aP3ESJVsaYCoQZwSsTSFs7U2DziU7u', 2, 'rzgblYEIAv', '2019-09-18 01:50:26', '2019-09-18 01:50:26');
INSERT INTO `users` VALUES (193, 'Dewitt Donnelly', 'ubernier@wyman.com', '$2y$10$.cFL6AjNdpee/t3M0hnAOO0QToOCy3qjPkOjeOaQJ8K3j2ZAb/3oa', 2, '3zwN162bsp', '2019-09-18 01:50:27', '2019-09-18 01:50:27');
INSERT INTO `users` VALUES (194, 'Ursula Thompson', 'alanna.legros@yahoo.com', '$2y$10$2CM/ueLfZh28PzzpPsupYuP612Jj.IDpeFAjnZtb67iTk511J.RNi', 2, '1lMyRGxOgu', '2019-09-18 01:50:28', '2019-09-18 01:50:28');
INSERT INTO `users` VALUES (195, 'Mrs. Samara Berge DVM', 'abshire.alexandra@grady.com', '$2y$10$ShndXWYunBYqcVACm.K1ouF6ZaSbfmomx8W0Hw7.jWqic3dPVCx3W', 2, 'S9hj16lx43', '2019-09-18 01:50:30', '2019-09-18 01:50:30');
INSERT INTO `users` VALUES (196, 'Dr. Kailey Weissnat', 'madyson.rosenbaum@yahoo.com', '$2y$10$OvQXY/.xRgMknUG9Q51xRuxj5GQBq7ocduSpq9jQ1Saox54GT9atm', 2, 'BNmbxwssc8', '2019-09-18 01:50:31', '2019-09-18 01:50:31');
INSERT INTO `users` VALUES (197, 'Prof. Yadira Bashirian I', 'feeney.victoria@nicolas.net', '$2y$10$NQs57irQcn0XXsBrG/g4qe0Y6fKr6f1quvwWPpKo7QpNnmpfITEvO', 2, 'EkUXqvrf4L', '2019-09-18 01:50:32', '2019-09-18 01:50:32');
INSERT INTO `users` VALUES (198, 'Ms. Adelle Langosh', 'huel.hoyt@yahoo.com', '$2y$10$pv3y43YWwlKbrZ/WLN/yiOy9xl6X/tIm.5atb1UZ5yM8UrQ6gvK9m', 2, 'TwG8xIbBTl', '2019-09-18 01:50:33', '2019-09-18 01:50:33');
INSERT INTO `users` VALUES (200, 'Glennie Deckow', 'medhurst.brian@gmail.com', '$2y$10$E.csi.E251A9d4PQeO3fLuGJzJXpHQ2BSouY1ekzhRmkgVRwd2.dC', 2, 'tvCC36bjqQ', '2019-09-18 01:50:35', '2019-09-18 01:50:35');
INSERT INTO `users` VALUES (201, 'Charles Weber DVM', 'glover.antonio@jacobson.com', '$2y$10$hBHDgDw4EkhEdguCREFoXO9W.xSmKwnUOa9PO5txUd8Ig4lcQQecm', 2, 'CHQmWdoI1I', '2019-09-18 01:50:36', '2019-09-18 01:50:36');
INSERT INTO `users` VALUES (202, 'leduccuong', 'apurdy@wehner.com', '$2y$10$gjjnHh.lbHZiXvZvQbda..OigfS0JCkCzsbY03mGK0uIyYTnym00O', 1, NULL, '2019-09-18 03:13:36', '2019-09-18 03:13:36');
INSERT INTO `users` VALUES (203, 'aaaaaaaaaaaaaaaaaaaa', 'leduccuong.neu@gmail.com', '$2y$10$CkIfb8U5xPkXiRCHk7Yuyu2RvjjmPQZyuON1sLoGOJ8GbbgMPh6X6', 1, NULL, '2019-09-18 03:15:10', '2019-09-18 03:15:10');
INSERT INTO `users` VALUES (204, 'leduccuong.neu', 'leduccuong.neu1@gmail.com', '$2y$10$U6AM7vjq1Yj5mXa7yLv1OuRb8deMRXdEneVeQ8InykRalwelIVWG6', 2, NULL, '2019-09-18 03:42:48', '2019-09-18 03:42:48');
INSERT INTO `users` VALUES (205, 'lớp trưởng', 'loptruong@gmail.com', '$2y$10$PL.p5uuZao5kGzwUJzRwB.VhiT3UqeSjr/Y6MNuLPq8jslTW9Xb.e', 4, NULL, '2019-09-18 07:15:31', '2019-09-18 07:15:31');
INSERT INTO `users` VALUES (206, 'user', 'user@gmail.com', '$2y$10$He9tsb4AOn6/j8K3Wyw8vO6XAjfRag3XMgNWp8mcpF1qVFUQbzl1O', 2, NULL, '2019-09-18 07:19:19', '2019-09-18 07:19:19');
INSERT INTO `users` VALUES (207, 'loptruong1', 'loptruong1@gmail.com', '$2y$10$6hDCnlh6JvN6K56kCDiTMO09b4rlHgyvcR.Y3B2qXthjxZRYvt9/e', 4, NULL, '2019-09-18 07:24:40', '2019-09-19 06:54:07');
INSERT INTO `users` VALUES (208, 'Admin', 'admin@gmail.com', '$2y$10$2.Lj97PYb9cU/NBWsMu0VunhZIHXJNDzPLc.BrPwP7XxxY.clo2jG', 1, NULL, '2019-09-18 07:27:52', '2019-09-18 07:27:52');
INSERT INTO `users` VALUES (209, 'admin1', 'admin1@gmail.com', '$2y$10$LmRzzETTon4ytY7DMFyduuvnumweqNsGwUckgutFPGJr6GwxNcIqC', 1, NULL, '2019-09-18 08:48:59', '2019-09-19 06:53:28');
INSERT INTO `users` VALUES (213, 'student a', 'studenta@gmail.com', '$2y$10$tkKPmD2wx7lb27ds0p7E9Og6mF/mqg8EvpmBYjV2LyZ2MxRSHSwxu', 4, NULL, '2019-09-23 09:17:42', '2019-09-23 09:17:42');
INSERT INTO `users` VALUES (214, 'sinh viên b', 'studentb@gmail.com', '$2y$10$hBs7SBam7uaUAfo7bO9gy.LtNJTBJZDaPujziT7IUXaWov16T0LrC', 1, NULL, '2019-09-23 09:20:46', '2019-09-23 09:20:46');
INSERT INTO `users` VALUES (215, 'studentc', 'studentc@gmail.com', '$2y$10$FgDyUsDBn2mJl.55/prwou4h8sYynQ8qK3DwNTDqTfhOQtsi4WvK.', 4, NULL, '2019-09-23 09:30:19', '2019-09-23 09:30:19');
INSERT INTO `users` VALUES (216, 'cuongaaaaaaaaa', 'cuongaaaaaaaaa@gmail.com', '$2y$10$aXXZWhUxgcDYV0rRp8.bfeuOwlmeI6lcNO/SKkBzaM0ICyKcexTiS', 1, NULL, '2019-09-23 09:33:12', '2019-09-23 09:33:12');
INSERT INTO `users` VALUES (217, 'aaaaaaaaaaaabvc', 'aaaaaaaaaaaabvc@gmail.com', '$2y$10$tyHbpR7.U8y11rhq2dEx7uBaUjVO4gFeRBvT2iN7dHnlm/mno7T9i', 4, NULL, '2019-09-24 02:06:33', '2019-09-24 02:06:33');
INSERT INTO `users` VALUES (218, 'abcdefdsa', 'abcdefdsa.neu@gmail.com', '$2y$10$T/vFvH1tjEbdNFJeqO2ufOAU4T2EkfG7Dq9/K7ni1xzyBhKDkB.Yy', 4, NULL, '2019-09-24 02:08:38', '2019-09-24 02:08:38');
INSERT INTO `users` VALUES (219, 'aaaaaaaaaaabcwafsdafa', 'aaaaaaaaaaabcwafsdafa.neu@gmail.com', '$2y$10$VOUxmB0sUfwnPVp6wFn4tukzxOWnckVuLXB05DGZP6.UOk1zLTB66', 4, NULL, '2019-09-24 02:10:35', '2019-09-24 02:10:35');
INSERT INTO `users` VALUES (220, 'adsavca', 'leduccuoadsavcang.neu@gmail.com', '$2y$10$j/8wfAGJ4YPPQst4gjf7.Oayk5rYRJFa.m96FzR4cKMDkyaMNgn12', 2, NULL, '2019-09-24 02:11:45', '2019-09-24 02:11:45');
INSERT INTO `users` VALUES (221, 'adsavcaaaaaaa', 'adsavca.aaaaaneu@gmail.com', '$2y$10$rKx7GDAzAbygI4QxV5H1YucqMhg0Y/9.40qrnxH5ob4ZycKv2SRVW', 4, NULL, '2019-09-24 02:13:21', '2019-09-24 02:13:21');
INSERT INTO `users` VALUES (222, 'adsavcaaaaaaaa2', 'adsavca.211aaaaaneu@gmail.com', '$2y$10$dP6lIob69PXi3pvy4ArUU.yulKtySirqWzmZU.3uJhj0J.t0jep96', 1, NULL, '2019-09-24 02:14:19', '2019-09-24 02:14:19');
INSERT INTO `users` VALUES (223, 'Cườngaaaaaaaaaaa', 'Cườngaaaaaaaaaaa.neu@gmail.com', '$2y$10$eB1xRSB5ATfIh.IzIw0nyeLqiEHatkVdUiHlXL.YvuAm6PQFVS3H6', 1, NULL, '2019-09-24 02:15:10', '2019-09-24 02:15:10');
INSERT INTO `users` VALUES (224, 'Cườngavcv', 'Cườngavcv.neu@gmail.com', '$2y$10$WwFG6ZuoXqqAvNrAIzmvy.H57gcBYYo1vhFXdTDj1e0.LQeehEn7K', 4, NULL, '2019-09-24 02:16:19', '2019-09-24 02:16:19');
INSERT INTO `users` VALUES (225, 'Cườngavcv1', 'Cườngavcv1.neu@gmail.com', '$2y$10$LrA7FkOYxYWoF9MMYgIlNO5tQX1Gt2JNhqTl2hYUFMqHkXOTw2oni', 1, NULL, '2019-09-24 02:17:27', '2019-09-24 02:17:27');
INSERT INTO `users` VALUES (226, 'adsfjaosdjfa', 'adsfjaosdjfa@aaaa', '$2y$10$D6cAgMzJPd4kc8uyKl9POeIkKi7NreGRCZMvb792b8DYxSk3slgSy', 4, NULL, '2019-09-24 02:19:05', '2019-09-24 02:19:05');
INSERT INTO `users` VALUES (227, 'cuongbdc', 'cuongbdc.neu@gmail.com', '$2y$10$/zCxsDZft8AU4vCzza3fhe8blsjsUVtVwxPkan/H1NGWOk3G4LIde', 1, NULL, '2019-09-24 02:29:38', '2019-09-24 02:29:38');
INSERT INTO `users` VALUES (228, 'elnino2121997aaaaaaaaaa', 'elnino2121997aaaaaaaaaa.neu@gmail.com', '$2y$10$bHai1gt6rVLGhjf7G4Suc.jrwluM/8MJhrcTwzQByFHWKJvhc2dcK', 1, NULL, '2019-09-24 02:33:26', '2019-09-24 02:33:26');
INSERT INTO `users` VALUES (229, 'aaaaaaaaaavvvvvvvvvvvv', 'aaaaaaaaaavvvvvvvvvvvv.neu@gmail.com', '$2y$10$/QmlWv8xtseUsRMnc7wAsugzkwaG5fUyUgDB/qrndbmr5h4bkG73q', 1, NULL, '2019-09-24 02:45:30', '2019-09-24 02:45:30');
INSERT INTO `users` VALUES (230, '322222222222', '322222222222.neu@gmail.com', '$2y$10$I2VnpEvi/AjTq8LDGbOqLOGwNwY8PzlwLUMh2CK4xOWc69pgIRfg6', 1, NULL, '2019-09-24 02:46:34', '2019-09-24 02:46:34');
INSERT INTO `users` VALUES (231, 'user2', 'user2@gmail.com', '$2y$10$ylGOUC58S37.93pB.SctMeiMqyU6pnOAxz9ppjwXfDYywaUmp05tO', 4, NULL, '2019-10-11 07:14:00', '2019-10-11 07:15:36');
INSERT INTO `users` VALUES (232, 'student', 'student2@gmail.com', '$2y$10$CHhRoeMWtiUJHCDPZaDjhOU4yIF9yNVhODuhFy9VaTuEhrVji/dT2', 4, NULL, '2019-10-14 07:48:17', '2019-10-14 07:48:17');

SET FOREIGN_KEY_CHECKS = 1;
