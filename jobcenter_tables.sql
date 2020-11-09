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
    `image` VARCHAR(256) NOT NULL
    )
    ENGINE = InnoDB;

  CREATE TABLE `applicants`(
   `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
   `user_id` int(11) NOT NULL,
   `f_name` VARCHAR(256) NOT NULL,
   `l_name` VARCHAR(256) NOT NULL,
   `dob` VARCHAR(100) NOT NULL,    
    `age` VARCHAR(10) NOT NULL ,
    `email` VARCHAR(256) NOT NULL,
    `phone` VARCHAR(25) NOT NULL,
    `country` VARCHAR(50) NOT NULL,
    `dialect` VARCHAR(100),
    `id_typeRadios` VARCHAR(20) NOT NULL,
    `id_image` VARCHAR(256) NOT NULL,
    `genderRadios` VARCHAR(20) NOT NULL,
    `mar_statRadios` VARCHAR(20) NOT NULL,
    `spouse` VARCHAR(256),
    `religion` VARCHAR(256) NOT NULL,
    `residence` VARCHAR(256) NOT NULL,
    `box_addr` VARCHAR(256) NOT NULL,
   `landmark` VARCHAR(256) NOT NULL,
    `street_nm` VARCHAR(256) NOT NULL,
    `suburb` VARCHAR(256) NOT NULL,
    `hse_no` VARCHAR(256) NOT NULL,
    `city_town` VARCHAR(256) NOT NULL,
    `area_of_int_1` VARCHAR(256) NOT NULL,
    `area_of_int_2` VARCHAR(256),
    `area_of_int_3` VARCHAR(256),
    `area_of_int_4` VARCHAR(256),
   `jhs_nm` VARCHAR(256) NOT NULL,
    `jhs_awd` VARCHAR(256),
    `jhs_start` VARCHAR(20) NOT NULL,
    `jhs_end` VARCHAR(20) NOT NULL,
    `shs_nm` VARCHAR(256) NOT NULL,
    `shs_start` VARCHAR(20) NOT NULL,
    `shs_course` VARCHAR(256) NOT NULL,
    `shs_end` VARCHAR(20) NOT NULL,
    `tet_nm` VARCHAR(256) NOT NULL,
    `tet_course` VARCHAR(256) NOT NULL,
    `tet_start` VARCHAR(20) NOT NULL,
    `tet_end` VARCHAR(20) NOT NULL,
    `prev_wkplc` VARCHAR(256) NOT NULL,
    `prev_wkplc_addr` VARCHAR(256) NOT NULL,
    `prev_wkplc_cont` VARCHAR(50) NOT NULL,
    `position` VARCHAR(256) NOT NULL,
    `prev_wkplc_start` VARCHAR(20) NOT NULL,
    `prev_wkplc_end` VARCHAR(20) NOT NULL,
    `reason` VARCHAR(256) NOT NULL,
    `ref_nm` VARCHAR(256) NOT NULL,
    `ref_cont` VARCHAR(50) NOT NULL,
    `statusRadios` VARCHAR(100) NOT NULL,
    `paymentRadios` VARCHAR(100) NOT NULL,
    `job_title` VARCHAR(100) NOT NULL,
    `company` VARCHAR(100) NOT NULL,
    `image` VARCHAR(256) NOT NULL,
    `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    )


id
user_id
f_name
l_name
dob
age
email
phone
country
lang
id_typeRadios
id_image
genderRadios
mar_statRadios
spouse
religion

residence
box_addr
landmark
street_nm
suburb
hse_no
city_town

area_of_int_1
area_of_int_2
area_of_int_3
area_of_int_4

jhs_nm
jhs_awd
jhs_start
jhs_end

shs_nm
shs_course
shs_start
shs_end

tet_nm
tet_course
tet_start
tet_end

prev_wkplc
prev_wkplc_addr
prev_wkplc_cont
position
prev_wkplc_start
prev_wkplc_end
reason
ref_nm
ref_cont
paymentRadios
statusRadios
job_title
company
image
register_date
    


CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
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