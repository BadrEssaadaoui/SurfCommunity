-- ============================================================
--  SurfCommunity – Database Management Script
--  Database: surf1
--  Generated from source code analysis
-- ============================================================

-- Create the database
CREATE DATABASE IF NOT EXISTS `surf1`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `surf1`;

-- ------------------------------------------------------------
-- Table: surfers
-- Stores registered users / surfers
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `surfers` (
  `id`          INT(11)       NOT NULL AUTO_INCREMENT,
  `firstname`   VARCHAR(100)  NOT NULL,
  `lastname`    VARCHAR(100)  NOT NULL,
  `gmail`       VARCHAR(150)  NOT NULL UNIQUE,
  `phone`       VARCHAR(20)   DEFAULT NULL,
  `age`         INT(3)        DEFAULT NULL,
  `password`    VARCHAR(255)  NOT NULL,
  `pic_profile` VARCHAR(255)  NOT NULL DEFAULT 'user.png',
  `level`       ENUM('beginner','intermediate','advanced') NOT NULL DEFAULT 'beginner',
  `admin`       TINYINT(1)    NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: uploads
-- Stores images uploaded by surfers
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `uploads` (
  `iid`   INT(11)       NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(255)  NOT NULL,
  `id`    INT(11)       NOT NULL,
  PRIMARY KEY (`iid`),
  CONSTRAINT `fk_uploads_surfer`
    FOREIGN KEY (`id`) REFERENCES `surfers`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: comments  (prepared for future activation)
-- Stores comments on uploaded images
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `comments` (
  `cid`          INT(11)   NOT NULL AUTO_INCREMENT,
  `iid`          INT(11)   NOT NULL,
  `id`           INT(11)   NOT NULL,
  `commentaire`  TEXT      NOT NULL,
  `datecomment`  DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`),
  CONSTRAINT `fk_comments_upload`
    FOREIGN KEY (`iid`) REFERENCES `uploads`(`iid`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comments_surfer`
    FOREIGN KEY (`id`) REFERENCES `surfers`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table: likes  (prepared for future activation)
-- One like per user per image
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `likes` (
  `iid` INT(11) NOT NULL,
  `id`  INT(11) NOT NULL,
  PRIMARY KEY (`iid`, `id`),
  CONSTRAINT `fk_likes_upload`
    FOREIGN KEY (`iid`) REFERENCES `uploads`(`iid`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_likes_surfer`
    FOREIGN KEY (`id`) REFERENCES `surfers`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
--  RESET / DROP section  (uncomment only if you need a fresh start)
-- ============================================================
-- SET FOREIGN_KEY_CHECKS = 0;
-- DROP TABLE IF EXISTS `likes`;
-- DROP TABLE IF EXISTS `comments`;
-- DROP TABLE IF EXISTS `uploads`;
-- DROP TABLE IF EXISTS `surfers`;
-- SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
--  SAMPLE DATA  (optional – useful for local testing)
-- ============================================================
-- INSERT INTO `surfers` (firstname, lastname, gmail, password, level)
-- VALUES ('Badr', 'Essaadaoui', 'badr@gmail.com', 'password123', 'advanced');
