-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema legitize_test
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema legitize_test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `legitize_test` DEFAULT CHARACTER SET utf8 ;
USE `legitize_test` ;

-- -----------------------------------------------------
-- Table `legitize_test`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`wallet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`wallet` (
  `wallet_id` INT NOT NULL AUTO_INCREMENT,
  `wallet_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`wallet_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`social_media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`social_media` (
  `social_media_id` INT NOT NULL AUTO_INCREMENT,
  `social_media_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`social_media_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`social_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`social_group` (
  `social_group_id` INT NOT NULL AUTO_INCREMENT,
  `social_group_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`social_group_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`referral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`referral` (
  `referral_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `referral_link` VARCHAR(45) NOT NULL,
  `unclaimed_value` VARCHAR(45) NOT NULL,
  `total_value` VARCHAR(45) NOT NULL,
  `claimmed_value` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`referral_id`),
  INDEX `fk_tbl_referral_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_tbl_referral_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`remarks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`remarks` (
  `remarks_id` INT NOT NULL AUTO_INCREMENT,
  `remarks_title` VARCHAR(45) NOT NULL,
  `remarks_category` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`remarks_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status_category` VARCHAR(45) NOT NULL,
  `status_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`project` (
  `project_id` INT NOT NULL AUTO_INCREMENT,
  `project_title` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telegram` VARCHAR(45) NOT NULL,
  `website` VARCHAR(100) NOT NULL,
  `note` LONGTEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`project_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`client` (
  `client_id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `client_firstname` VARCHAR(45) NOT NULL,
  `client_middlename` VARCHAR(45) NOT NULL,
  `client_surname` VARCHAR(45) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `crated_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`client_id`),
  INDEX `fk_tbl_client_project_registration1_idx` (`project_id` ASC),
  CONSTRAINT `fk_tbl_client_project_registration1`
    FOREIGN KEY (`project_id`)
    REFERENCES `legitize_test`.`project` (`project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`project_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`project_detail` (
  `project_detail_id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `project_subtitle` VARCHAR(45) NOT NULL,
  `project_tagline` VARCHAR(45) NOT NULL,
  `project_description` VARCHAR(45) NOT NULL,
  `project_token` VARCHAR(45) NOT NULL,
  `eth_value` VARCHAR(45) NOT NULL,
  `symbol` VARCHAR(45) NOT NULL,
  `project_whitepaper` VARCHAR(45) NOT NULL,
  `project_thread` VARCHAR(45) NOT NULL,
  `accepted_language` VARCHAR(45) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `launch_date` DATETIME NOT NULL,
  `bounty_campaign_start` DATETIME NOT NULL,
  `bounty_campaign_end` DATETIME NOT NULL,
  `verification_perion_end` DATETIME NOT NULL,
  `result_displayed` DATETIME NOT NULL,
  `distribution` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`project_detail_id`),
  INDEX `fk_project_detail_project1_idx` (`project_id` ASC),
  CONSTRAINT `fk_project_detail_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `legitize_test`.`project` (`project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`project_campaign`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`project_campaign` (
  `project_campaign_id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `campaign_title` VARCHAR(45) NOT NULL,
  `allocated_token` VARCHAR(45) NOT NULL,
  `allocated_participants` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`project_campaign_id`),
  INDEX `fk_project_campaign_project1_idx` (`project_id` ASC),
  CONSTRAINT `fk_project_campaign_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `legitize_test`.`project` (`project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_campaign_standing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_campaign_standing` (
  `user_campaign_standing_id` INT NOT NULL AUTO_INCREMENT,
  `status_id` INT NOT NULL,
  `remarks_id` INT NOT NULL,
  PRIMARY KEY (`user_campaign_standing_id`),
  INDEX `fk_user_campaign_standing_status1_idx` (`status_id` ASC),
  INDEX `fk_user_campaign_standing_remarks1_idx` (`remarks_id` ASC),
  CONSTRAINT `fk_user_campaign_standing_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `legitize_test`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_campaign_standing_remarks1`
    FOREIGN KEY (`remarks_id`)
    REFERENCES `legitize_test`.`remarks` (`remarks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_campaign`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_campaign` (
  `user_campaign_id` INT NOT NULL AUTO_INCREMENT,
  `user_campaign_standing_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`user_campaign_id`),
  INDEX `fk_user_campaign_user_campaign_standing1_idx` (`user_campaign_standing_id` ASC),
  INDEX `fk_user_campaign_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_campaign_user_campaign_standing1`
    FOREIGN KEY (`user_campaign_standing_id`)
    REFERENCES `legitize_test`.`user_campaign_standing` (`user_campaign_standing_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_campaign_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`spreadsheet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`spreadsheet` (
  `spreadsheet_id` INT NOT NULL AUTO_INCREMENT,
  `user_campaign_id` INT NOT NULL,
  `project_campaign_id` INT NOT NULL,
  `week_1` INT NOT NULL,
  `week_2` INT NOT NULL,
  `week_20` INT NOT NULL,
  PRIMARY KEY (`spreadsheet_id`),
  INDEX `fk_tbl_spreadsheet_project_campaign1_idx` (`project_campaign_id` ASC),
  INDEX `fk_spreadsheet_user_campaign1_idx` (`user_campaign_id` ASC),
  CONSTRAINT `fk_tbl_spreadsheet_project_campaign1`
    FOREIGN KEY (`project_campaign_id`)
    REFERENCES `legitize_test`.`project_campaign` (`project_campaign_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spreadsheet_user_campaign1`
    FOREIGN KEY (`user_campaign_id`)
    REFERENCES `legitize_test`.`user_campaign` (`user_campaign_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_wallet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_wallet` (
  `user_wallet_id` INT NOT NULL AUTO_INCREMENT,
  `wallet_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `wallet_address` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_wallet_id`),
  INDEX `fk_tbl_user_wallet_tbl_wallet_idx` (`wallet_id` ASC),
  INDEX `fk_tbl_user_wallet_tbl_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_tbl_user_wallet_tbl_wallet`
    FOREIGN KEY (`wallet_id`)
    REFERENCES `legitize_test`.`wallet` (`wallet_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_user_wallet_tbl_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_social_media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_social_media` (
  `user_sm_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `social_media_id` INT NOT NULL,
  `link` VARCHAR(100) NOT NULL,
  `num_followers` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_sm_id`),
  INDEX `fk_user_social_media_tbl_social_media1_idx` (`social_media_id` ASC),
  INDEX `fk_user_social_media_tbl_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_social_media_tbl_social_media1`
    FOREIGN KEY (`social_media_id`)
    REFERENCES `legitize_test`.`social_media` (`social_media_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_social_media_tbl_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_social_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_social_group` (
  `user_sg_id` INT NOT NULL AUTO_INCREMENT,
  `social_group_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `link` VARCHAR(100) NOT NULL,
  `rank` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`user_sg_id`),
  INDEX `fk_user_social_group_social_group1_idx` (`social_group_id` ASC),
  INDEX `fk_user_social_group_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_social_group_social_group1`
    FOREIGN KEY (`social_group_id`)
    REFERENCES `legitize_test`.`social_group` (`social_group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_social_group_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_standing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_standing` (
  `user_status_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `remarks_id` INT NOT NULL,
  PRIMARY KEY (`user_status_id`),
  INDEX `fk_user_standing_user1_idx` (`user_id` ASC),
  INDEX `fk_user_standing_status1_idx` (`status_id` ASC),
  INDEX `fk_user_standing_remarks1_idx` (`remarks_id` ASC),
  CONSTRAINT `fk_user_standing_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_standing_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `legitize_test`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_standing_remarks1`
    FOREIGN KEY (`remarks_id`)
    REFERENCES `legitize_test`.`remarks` (`remarks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`project_standing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`project_standing` (
  `project_standing_id` INT NOT NULL AUTO_INCREMENT,
  `remarks_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `project_id` INT NOT NULL,
  PRIMARY KEY (`project_standing_id`),
  INDEX `fk_project_standing_remarks1_idx` (`remarks_id` ASC),
  INDEX `fk_project_standing_status1_idx` (`status_id` ASC),
  INDEX `fk_project_standing_project_registration1_idx` (`project_id` ASC),
  CONSTRAINT `fk_project_standing_remarks1`
    FOREIGN KEY (`remarks_id`)
    REFERENCES `legitize_test`.`remarks` (`remarks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_standing_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `legitize_test`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_standing_project_registration1`
    FOREIGN KEY (`project_id`)
    REFERENCES `legitize_test`.`project` (`project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`project_campaign_standing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`project_campaign_standing` (
  `project_campaign_standing_id` INT NOT NULL AUTO_INCREMENT,
  `project_campaign_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `remarks_id` INT NOT NULL,
  PRIMARY KEY (`project_campaign_standing_id`),
  INDEX `fk_project_campaign_standing_project_campaign1_idx` (`project_campaign_id` ASC),
  INDEX `fk_project_campaign_standing_status1_idx` (`status_id` ASC),
  INDEX `fk_project_campaign_standing_remarks1_idx` (`remarks_id` ASC),
  CONSTRAINT `fk_project_campaign_standing_project_campaign1`
    FOREIGN KEY (`project_campaign_id`)
    REFERENCES `legitize_test`.`project_campaign` (`project_campaign_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_campaign_standing_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `legitize_test`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_campaign_standing_remarks1`
    FOREIGN KEY (`remarks_id`)
    REFERENCES `legitize_test`.`remarks` (`remarks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`contact` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `contact_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`contact_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `legitize_test`.`user_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `legitize_test`.`user_contact` (
  `user_contact_id` INT NOT NULL AUTO_INCREMENT,
  `contact_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `data` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_contact_id`),
  INDEX `fk_user_contact_contact1_idx` (`contact_id` ASC),
  INDEX `fk_user_contact_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_contact_contact1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `legitize_test`.`contact` (`contact_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_contact_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `legitize_test`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
