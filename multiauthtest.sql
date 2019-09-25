-- Adminer 4.6.4-dev MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    job_title varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
    password varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
  UNIQUE KEY admins_email_unique (email)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admins (id, name, email, job_title, email_verified_at, password, remember_token, created_at, updated_at) VALUES
(1,'amiradmin','admin@admin.admin','adviser',NULL,'$2y$10$5HPYgq3O9QdY7pJJOZS.Oud8n3jyRiFQciBGWmpI/XdT.UivuY1v6','jMWD9lSKXy2SpUpqLXhr4pPYUN9uEFENjxtxGKa7TWRBmxxzTYQYlNpWb31g','2019-01-30 09:08:29','2019-01-31 11:09:24'),
(2,'mailtrapadmin','020a9b1ff0-15d083@inbox.mailtrap.io','mailtrap',NULL,'$2y$10$tq8vep1Jm1FpHiGt1dfnauV0/Y2KM6imVwFT2Mr7DFUt8Momj0lv6',NULL,'2019-01-31 10:47:08','2019-01-31 10:47:08');

DROP TABLE IF EXISTS migrations;
CREATE TABLE migrations (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
    migration varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations (id, migration, batch) VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_01_29_085504_create_admins_table',1);

DROP TABLE IF EXISTS password_resets;
CREATE TABLE password_resets (
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    token varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
    KEY password_resets_email_index (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
    UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-02-02 16:12:22
