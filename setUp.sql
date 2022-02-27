CREATE DATABASE IF NOT EXISTS saveTrain;

CREATE TABLE IF NOT EXISTS admins(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS clients(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    birthDay varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS guests(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    birthDay varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS trains(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    seat_number int NOT NULL
);

CREATE TABLE IF NOT EXISTS train_trips(
    id int PRIMARY KEY AUTO_INCREMENT,
    train_id int,
    start_from varchar(255) NOT NULL,
    end_in varchar(255) NOT NULL,
    distance int,
    trip_date int NOT NULL,
    depart_hour int NOT NULL,
    end_hour int NOT NULL,
    class varchar(255) NOT NULL,
    price double NOT NULL,
    FOREIGN KEY (train_id) REFERENCES trains(id)
);

CREATE TABLE IF NOT EXISTS reservation_tickets(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_trip int DEFAULT NULL,
    id_client int DEFAULT NULL,
    id_guest int DEFAULT NULL,
    FOREIGN KEY (id_trip) REFERENCES train_trips(id),
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN KEY (id_guest) REFERENCES guests(id)
);


INSERT INTO `admins`(`fullName`, `email`, `password`) 
        VALUES ('mouhcine daali','admin@savetrain.com','$2y$10$Y2LUd3kM4iqsOBwLA5U23OKU5kbROTq5CVmypCAg9.sdd.ho7gslW');

INSERT INTO `clients`(`fullName`, `email`, `password`, `phoneNumber`, `birthDay`) 
        VALUES ('abdsalam staili','abdsalam@gmail.com','abdsalamstaili','0634175255','2003/02/15');

INSERT INTO `guests`(`fullName`, `email`, `phoneNumber`, `birthDay`) 
        VALUES ('amine mesbahi','amine@gmail.com','0660536586','2002/08/15');

INSERT INTO `reservation_tickets`(`id_trip`, `id_client`, `id_guest`) 
        VALUES ('[value-1]','[value-2]','[value-3]');

INSERT INTO `trains`(`train_type`, `seat_number`) 
        VALUES ('train_type','50');

INSERT INTO `train_trips`(`train_id`, `start_from`, `end_in`, `distance`, `trip_date`, `depart_hour`, `end_hour`, `class`, `price`) 
        VALUES ('train_id','start_from','end_in','distance','trip_date','depart_hour','end_hour','class','price');

