CREATE DATABASE IF NOT EXISTS train_booking;

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
    phoneNumber int NOT NULL,
    birthDay varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS guests(
    id int PRIMARY KEY AUTO_INCREMENT,
    fullName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    phoneNumber int NOT NULL,
    birthDay varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS trains(
    id int PRIMARY KEY AUTO_INCREMENT,
    train_type varchar(255) NOT NULL,
    seat_number int NOT NULL
);

CREATE TABLE IF NOT EXISTS train_trips(
    id int PRIMARY KEY AUTO_INCREMENT,
    train_id int,
    start_from varchar(255) NOT NULL,
    end_in varchar(255) NOT NULL,
    distance int,
    trip_date int NOT NULL,
    trip_time int NOT NULL,
    depart_hour int NOT NULL,
    end_hour int NOT NULL,
    class varchar(255) NOT NULL,
    price double NOT NULL
    FOREIGN KEY (train_id) REFERENCES trains(id),
);

CREATE TABLE IF NOT EXISTS reservation_tickets(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_trip int DEFAULT(NULL),
    id_client int DEFAULT(NULL),
    id_guest int DEFAULT(NULL),
    FOREIGN KEY (id_trip) REFERENCES train_trips(id),
    FOREIGN KEY (id_client) REFERENCES clients(id) DEFAULT null,
    FOREIGN KEY (id_guest) REFERENCES guests(id) DEFAULT null
);
