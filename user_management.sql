-- Active: 1693133193600@@127.0.0.1@3306@user_manager
DROP DATABASE IF EXISTS user_management;
CREATE DATABASE user_management;
USE user_management;


DROP TABLE IF EXISTS account;
CREATE TABLE account (
    `id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `status` ENUM('A','I') DEFAULT 'I' NOT NULL,
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS profile;
CREATE TABLE profile (
    `id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `account_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `document` char(20) NOT NULL UNIQUE,
    `birth_date` DATE,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `phone` VARCHAR(15) UNIQUE,
    `role` ENUM('ADMIN', 'USER', 'DEV') DEFAULT 'USER' NOT NULL,
    `image` VARCHAR(255),
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(account_id) REFERENCES account(`id`)   
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO account(`username`,`password`,`status`)
VALUES ('tcollins','123456','I');

INSERT INTO profile(`account_id`,`name`,`lastname`,`document`,`birth_date`,`email`,`role`,`image`) 
VALUES(1,'Tedd','Collins','45698412','1990-10-05','tcollins.90@gmail.com','USER','---');

