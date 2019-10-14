/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.1.13-MariaDB : Database - auth
*********************************************************************
*/


/*Table structure for table `aauth_group_to_group` */

DROP TABLE IF EXISTS `aauth_group_to_group`;

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) unsigned NOT NULL,
  `subgroup_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`subgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_group_to_group` */

/*Table structure for table `aauth_groups` */

DROP TABLE IF EXISTS `aauth_groups`;

CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_groups` */

insert  into `aauth_groups`(`id`,`name`,`definition`) values 
(1,'Admin','Super Admin Group'),
(2,'Public','Public Access Group'),
(3,'Default','Default Access Group'),
(5,'DSM','dsm group');

/*Table structure for table `aauth_login_attempts` */

DROP TABLE IF EXISTS `aauth_login_attempts`;

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aauth_login_attempts` */

/*Table structure for table `aauth_perm_to_group` */

DROP TABLE IF EXISTS `aauth_perm_to_group`;

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_group` */

insert  into `aauth_perm_to_group`(`perm_id`,`group_id`) values 
(1,5),
(2,2),
(2,5),
(4,2);

/*Table structure for table `aauth_perm_to_user` */

DROP TABLE IF EXISTS `aauth_perm_to_user`;

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_user` */

/*Table structure for table `aauth_perms` */

DROP TABLE IF EXISTS `aauth_perms`;

CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perms` */

insert  into `aauth_perms`(`id`,`name`,`definition`) values 
(1,'add_post','Post'),
(2,'change_post','Post'),
(4,'delete_post','Post');

/*Table structure for table `aauth_pms` */

DROP TABLE IF EXISTS `aauth_pms`;

CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_pms` */

/*Table structure for table `aauth_user_to_group` */

DROP TABLE IF EXISTS `aauth_user_to_group`;

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_to_group` */

insert  into `aauth_user_to_group`(`user_id`,`group_id`) values 
(1,1),
(1,3),
(2,3);

/*Table structure for table `aauth_user_variables` */

DROP TABLE IF EXISTS `aauth_user_variables`;

CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_variables` */

/*Table structure for table `aauth_users` */

DROP TABLE IF EXISTS `aauth_users`;

CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_users` */

insert  into `aauth_users`(`id`,`email`,`pass`,`username`,`banned`,`last_login`,`last_activity`,`date_created`,`forgot_exp`,`remember_time`,`remember_exp`,`verification_code`,`totp_secret`,`ip_address`) values 
(1,'admin@example.com','dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3','Admin',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0'),
(2,'tahmid@example.com','85331630fca2b67c234b6b57e7affc9403d62cf186989c71675956e3ccc2a20d','tahmidrana',0,NULL,NULL,'2018-04-09 13:18:30',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_app_log` */

DROP TABLE IF EXISTS `tbl_app_log`;

CREATE TABLE `tbl_app_log` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'created by user: from session',
  `log_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_app_log` */

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `ser_id` int(8) NOT NULL AUTO_INCREMENT,
  `menu_label` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_menu` int(8) DEFAULT NULL,
  `menu_level` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ser_id`),
  KEY `fk_tbl_menu_parent_menu_id` (`parent_menu`),
  CONSTRAINT `fk_tbl_menu_parent_menu_id` FOREIGN KEY (`parent_menu`) REFERENCES `tbl_menu` (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`ser_id`,`menu_label`,`menu_url`,`menu_icon`,`parent_menu`,`menu_level`) values 
(2,'Admin Console','#','fa-cog',NULL,1),
(3,'Group','auth/group',NULL,2,3),
(4,'User','auth/user',NULL,2,2),
(6,'Menu','auth/menu',NULL,2,0),
(7,'Home',NULL,'fa-home',NULL,0),
(8,'Permission','auth/permission',NULL,2,0);

/*Table structure for table `tbl_menu_to_group` */

DROP TABLE IF EXISTS `tbl_menu_to_group`;

CREATE TABLE `tbl_menu_to_group` (
  `ser_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `menu_id` int(8) NOT NULL,
  PRIMARY KEY (`ser_id`),
  KEY `fk_aauth_groups_id` (`group_id`),
  KEY `fk_tbl_menu_ser_id` (`menu_id`),
  CONSTRAINT `fk_aauth_groups_id` FOREIGN KEY (`group_id`) REFERENCES `aauth_groups` (`id`),
  CONSTRAINT `fk_tbl_menu_ser_id` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_menu_to_group` */

insert  into `tbl_menu_to_group`(`ser_id`,`group_id`,`menu_id`) values 
(34,5,2),
(35,5,4),
(36,5,6),
(37,5,7);
