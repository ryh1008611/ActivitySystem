/*
 Navicat Premium Data Transfer

 Source Server         : docker-wu
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : 47.104.214.127:3306
 Source Schema         : laravel_api

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 18/05/2020 10:08:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名称',
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `last_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '登陆时的token',
  `status` tinyint(0) NOT NULL DEFAULT 0 COMMENT '用户状态 -1代表已删除 0代表正常 1代表冻结',
  `role_id` int(0) NULL DEFAULT 0 COMMENT '权限ID\r\n',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_name_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin', '$2y$10$matvU3j0nl7iv217kI0j6O1K1AcR5rSinPWkWeQJ3Pd4Ge1cI8rve', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC5hcGkuY29tXC9hcGlcL3YxXC9hZG1pblwvbG9naW4iLCJpYXQiOjE1ODk3Njc0MTMsImV4cCI6MTU4OTc3NDYxMywibmJmIjoxNTg5NzY3NDEzLCJqdGkiOiJoUTZJVmU2alpBVllUdzdGIiwic3ViIjoxLCJwcnYiOiJkZjg4M2RiOTdiZDA1ZWY4ZmY4NTA4MmQ2ODZjNDVlODMyZTU5M2E5IiwiZ3VhcmQiOiJhZG1pbiJ9.ITfy_iqRLjgKkHLmFLyLkCUyZFDrMhdfdqvNxjLBbxw', 1, 5, '2020-05-11 14:56:41', '2020-05-18 02:03:33');
INSERT INTO `admins` VALUES (2, 'guaosi124', '$2y$10$rQhqYpoTcN//TAbJQ0UieuKD3POWcmiYj.cym2QnB4QvK.Ji0EEsS', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC5hcGkuY29tXC9hcGlcL3YxXC9wZXJtaXNzaW9ucyIsImlhdCI6MTU4OTAxMTA4OCwiZXhwIjoxNTg5MDE4MjkyLCJuYmYiOjE1ODkwMTQ2OTIsImp0aSI6Ijc0UVY5d3JPdEI5SFJXNU4iLCJzdWIiOjIsInBydiI6ImRmODgzZGI5N2JkMDVlZjhmZjg1MDgyZDY4NmM0NWU4MzJlNTkzYTkiLCJndWFyZCI6ImFkbWluIn0.VU__eYof43KEySivLCYIt1vwyEoToiodOs8SR3-IP7E', 0, 4, '2020-05-11 14:56:38', '2020-05-11 07:29:22');
INSERT INTO `admins` VALUES (3, 'test', '$2y$10$HwUiffyVrvC.ZRl4I07HlOeHLdl4oJXScXKVare1QOfxv.QiwYIQm', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC5hcGkuY29tXC9hcGlcL3YxXC9hZG1pblwvbG9naW4iLCJpYXQiOjE1ODk1OTM4MDcsImV4cCI6MTU4OTYwMTAwNywibmJmIjoxNTg5NTkzODA3LCJqdGkiOiJKQkdqTXJzYlZ6eHYxZ3VxIiwic3ViIjozLCJwcnYiOiJkZjg4M2RiOTdiZDA1ZWY4ZmY4NTA4MmQ2ODZjNDVlODMyZTU5M2E5IiwiZ3VhcmQiOiJhZG1pbiJ9.su32P8uzjHR3tAGrV3BInkRUg3X35PJiettvGAhq5lo', 1, 4, '2020-05-11 06:56:05', '2020-05-16 01:50:07');
INSERT INTO `admins` VALUES (4, 'test1', '$2y$10$M36FkVvtrr5FEMZxqd2chuFhKniDnA5kjOFcF6FcaM9ENmsYuTLgq', NULL, 1, 2, '2020-05-11 07:23:17', '2020-05-12 06:43:07');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_03_01_064314_create_admins_table', 1);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(0) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `http_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `http_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'RolePermissioncreate', '新增角色', 'POST', 'roles', '2020-05-09 10:14:35', '2020-05-11 06:05:44');
INSERT INTO `permissions` VALUES (2, 'RolePermissionupdate', '修改角色', 'PUT', 'roles', '2020-05-09 06:01:47', '2020-05-09 06:01:47');
INSERT INTO `permissions` VALUES (3, 'xxx', 'xxx111', 'GET', 'roles', '2020-05-09 06:01:58', '2020-05-09 06:01:58');
INSERT INTO `permissions` VALUES (4, 'xxx', '1123213', 'POST', 'xxxx', '2020-05-09 06:05:58', '2020-05-09 06:05:58');
INSERT INTO `permissions` VALUES (5, '2222', '测试', 'POST', 'xxx', '2020-05-09 06:10:27', '2020-05-09 06:10:27');
INSERT INTO `permissions` VALUES (6, '13213', 'vvv', 'POST', '22', '2020-05-09 07:40:13', '2020-05-11 06:05:23');
INSERT INTO `permissions` VALUES (7, '22112', '222', 'PUT', '221', '2020-05-09 07:40:21', '2020-05-09 07:40:21');
INSERT INTO `permissions` VALUES (8, '是是是', '333', 'DELETE', '21', '2020-05-09 07:40:30', '2020-05-09 07:40:30');
INSERT INTO `permissions` VALUES (9, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (10, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (11, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (12, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (13, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (14, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (15, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (16, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (17, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (18, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (19, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (20, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (21, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (22, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (23, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (24, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (25, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (26, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (27, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (28, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (29, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (30, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (31, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (32, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (33, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (34, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (35, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (36, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (37, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (38, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (39, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (40, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (41, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (42, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (43, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (44, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (45, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');
INSERT INTO `permissions` VALUES (46, '1231', '222', 'PUT', '777', '2020-05-09 07:40:38', '2020-05-09 07:40:38');

-- ----------------------------
-- Table structure for permissions_group
-- ----------------------------
DROP TABLE IF EXISTS `permissions_group`;
CREATE TABLE `permissions_group`  (
  `id` int(0) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '组名',
  `group` json NULL COMMENT '组',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions_group
-- ----------------------------
INSERT INTO `permissions_group` VALUES (1, '权限', '[\"2\", \"1\"]', '2020-05-15 06:24:21', '2020-05-15 08:19:07');
INSERT INTO `permissions_group` VALUES (2, '权限1', '[\"1\"]', '2020-05-15 06:25:24', '2020-05-15 08:19:17');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(0) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menus` json NULL,
  `permissions` json NULL,
  `permissions_group` json NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '测试', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"1\", \"2\"]', '[\"1\"]', '111121', NULL, '2020-05-18 02:03:51');
INSERT INTO `roles` VALUES (2, '测试12', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"2\", \"3\", \"1\", \"4\"]', '[\"2\"]', '奥术大师1112', '2020-05-09 08:36:46', '2020-05-16 03:22:11');
INSERT INTO `roles` VALUES (3, '擦擦擦', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[]', '[\"2\"]', '谢谢', '2020-05-09 08:48:13', '2020-05-16 02:56:17');
INSERT INTO `roles` VALUES (4, '测试权限', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"1\", \"5\", \"2\"]', '[\"1\", \"2\"]', '信息', '2020-05-11 02:28:31', '2020-05-18 01:49:07');
INSERT INTO `roles` VALUES (5, '必须的', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"1\", \"2\", \"5\", \"6\", \"8\"]', '[\"1\"]', 'xxx', '2020-05-12 03:16:43', '2020-05-16 06:13:33');
INSERT INTO `roles` VALUES (6, '测试12321', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"用户列表\"}, \"name\": \"userslist\", \"path\": \"userlist\"}, {\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}, {\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}, {\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"1\", \"2\", \"3\", \"4\"]', '[\"1\", \"2\"]', '测试', '2020-05-15 07:27:41', '2020-05-16 06:18:34');
INSERT INTO `roles` VALUES (7, '测试角色123213', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:18:24');
INSERT INTO `roles` VALUES (8, '测试角色11111111', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:15:03');
INSERT INTO `roles` VALUES (9, '测试角色1111', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\", \"2\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:15:16');
INSERT INTO `roles` VALUES (10, '测试角色11', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:18:15');
INSERT INTO `roles` VALUES (11, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\", \"2\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:19:44');
INSERT INTO `roles` VALUES (12, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\", \"2\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:21:44');
INSERT INTO `roles` VALUES (13, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 02:25:08');
INSERT INTO `roles` VALUES (14, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[\"2\", \"4\"]', '[\"1\"]', '你好的测试1', '2020-05-15 07:35:43', '2020-05-16 05:55:33');
INSERT INTO `roles` VALUES (15, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[\"3\", \"4\"]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 05:59:21');
INSERT INTO `roles` VALUES (16, '测试角色1111111', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 06:00:22');
INSERT INTO `roles` VALUES (17, '测试角色', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[]', '[\"1\"]', '你好的测试', '2020-05-15 07:35:43', '2020-05-16 02:25:08');
INSERT INTO `roles` VALUES (18, '你好', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"权限组\"}, \"name\": \"grouplist\", \"path\": \"grouplist\"}]}]', '[\"4\"]', '[\"2\", \"1\"]', '1111', '2020-05-16 03:24:17', '2020-05-16 06:08:21');
INSERT INTO `roles` VALUES (19, '测试', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"权限列表\"}, \"name\": \"urllist\", \"path\": \"urllist\"}]}]', '[\"3\"]', '[\"1\"]', '123213', '2020-05-16 03:25:28', '2020-05-16 03:25:28');
INSERT INTO `roles` VALUES (20, '测', '[{\"meta\": {\"title\": \"权限模块\"}, \"name\": \"Permission\", \"path\": \"/permission\", \"children\": [{\"meta\": {\"title\": \"角色列表\"}, \"name\": \"RolePermissionlist\", \"path\": \"rolelist\"}]}]', '[\"3\", \"4\"]', '[\"2\"]', '34141', '2020-05-16 03:26:00', '2020-05-16 03:26:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名称',
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `last_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '登陆时的token',
  `status` tinyint(0) NOT NULL DEFAULT 0 COMMENT '用户状态 -1代表已删除 0代表正常 1代表冻结',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'guaosi1', '$2y$10$bU/K1aN6Le/7tgxXZiOMSeBZuFM4nX3P8725GlmUp.qTzEDur4hUK', NULL, 0, NULL, NULL);
INSERT INTO `users` VALUES (2, 'guaosi2', '$2y$10$wN5dzrc.X6gvSAd0GP.IguMBix/Ym0qHvRD6.wyNEKTNl/cZlUhyy', NULL, 0, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
