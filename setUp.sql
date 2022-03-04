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
);

CREATE TABLE IF NOT EXISTS guests(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
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
    distance varchar(255),
    trip_date varchar(255) NOT NULL,
    depart_hour varchar(255) NOT NULL,
    end_hour varchar(255) NOT NULL,
    price double NOT NULL,
    available bool DEFAULT(true),
    FOREIGN KEY (train_id) REFERENCES trains(id)
);

CREATE TABLE IF NOT EXISTS reservations(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_trip int NOT NULL,
    id_client int,
    id_guest int,
    time varchar,
    FOREIGN KEY (id_trip) REFERENCES train_trips(id),
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN KEY (id_guest) REFERENCES guests(id)
);


INSERT INTO `admins`(`fullName`, `email`, `password`) 
        VALUES ('mouhcine daali','admin@savetrain.com','$2y$10$Y2LUd3kM4iqsOBwLA5U23OKU5kbROTq5CVmypCAg9.sdd.ho7gslW');

