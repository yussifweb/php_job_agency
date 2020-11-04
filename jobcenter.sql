CREATE TABLE `applicants`
 ( `id` INT NOT NULL AUTO_INCREMENT ,
   `name` VARCHAR(256) NOT NULL ,
     `email` VARCHAR(256) NOT NULL ,
       `age` VARCHAR(10) NOT NULL ,
         `phone` VARCHAR(256) NOT NULL ,
           `industry` VARCHAR(256) NOT NULL ,
             `levelRadios` VARCHAR(256) NOT NULL ,
               `region` VARCHAR(256) NOT NULL ,
                 `district` VARCHAR(256) NOT NULL ,
                   `image` VARCHAR(256) NOT NULL ,
                       PRIMARY KEY  (`id`)) ENGINE = InnoDB;


CREATE TABLE `jobcenter`.`users` (
   `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(256) NOT NULL ,
     `email` VARCHAR(256) NOT NULL , 
     `password` VARCHAR(256) NOT NULL , 
      PRIMARY KEY  (`id`)) ENGINE = InnoDB;

CREATE TABLE `companies`
 ( `id` INT NOT NULL AUTO_INCREMENT ,
   `name` VARCHAR(256) NOT NULL ,
     `email` VARCHAR(256) NOT NULL ,
       `address` VARCHAR(256) NOT NULL ,
         `phone` VARCHAR(256) NOT NULL ,
           `industry` VARCHAR(256) NOT NULL ,
               `region` VARCHAR(256) NOT NULL ,
                 `district` VARCHAR(256) NOT NULL ,
                   `image` VARCHAR(256) NOT NULL ,
                       PRIMARY KEY  (`id`))  

Client
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


create jobs table and portal
create a company link in the job description
create an onclick link to post a candidate in job portal