CREATE TABLE `applicants`(
   `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
   `user_id` int(11) NOT NULL,
   `name` VARCHAR(256) NOT NULL,
    `email` VARCHAR(256) NOT NULL ,
    `age` VARCHAR(10) NOT NULL ,
    `phone` VARCHAR(256) NOT NULL ,
    `industry` VARCHAR(256) NOT NULL ,
    `levelRadios` VARCHAR(256) NOT NULL ,
    `region` VARCHAR(256) NOT NULL ,
    `district` VARCHAR(256) NOT NULL ,
    `image` VARCHAR(256) NOT NULL)
    ENGINE = InnoDB;

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE `reset` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL UNIQUE,
)

CREATE TABLE `companies` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` VARCHAR(256) NOT NULL,
  `email` VARCHAR(256) NOT NULL,
  `address` VARCHAR(256) NOT NULL,
  `phone` VARCHAR(256) NOT NULL,
  `industry` VARCHAR(256) NOT NULL,
  `region` VARCHAR(256) NOT NULL,
  `district` VARCHAR(256) NOT NULL,
  `image` VARCHAR(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  )  


CREATE TABLE `jobs` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) 


ALTER TABLE `applicants` ADD `payment` varchar(100) NOT NULL  AFTER `district`;

ALTER TABLE `applicants` ADD `job_title` varchar(100) NOT NULL  AFTER `payment`;

ALTER TABLE `applicants` ADD `statusRadios` varchar(100) NOT NULL  AFTER `job_title`;

ALTER TABLE `applicants` ADD `company` varchar(100) NOT NULL  AFTER `statusRadios`;

ALTER TABLE `users` ADD `level` varchar(255) NOT NULL  AFTER `password`;

users
name
contact
email
username
password

Applicants
name
email
age
phone
industry
levelRadios
region
district
image

Company
name
email
address
phone
industry
region
district
image

jobs
company
title
body
image


create jobs table and portal
create a company link in the job description
create an onclick link to post a candidate in job portal