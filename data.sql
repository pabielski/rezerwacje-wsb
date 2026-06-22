CREATE DATABASE IF NOT EXISTS hotel_reservations
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE hotel_reservations;

ALTER TABLE users
ADD role VARCHAR(20) NOT NULL DEFAULT 'client';

CREATE TABLE hotels (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE rooms (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hotel_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    room_number VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    price_per_night DECIMAL(10,2) NOT NULL,
    description TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (hotel_id) REFERENCES hotels(id)
);

CREATE TABLE amenities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE amenity_room (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_id BIGINT UNSIGNED NOT NULL,
    amenity_id BIGINT UNSIGNED NOT NULL,

    UNIQUE (room_id, amenity_id),

    FOREIGN KEY (room_id) REFERENCES rooms(id),
    FOREIGN KEY (amenity_id) REFERENCES amenities(id)
);

CREATE TABLE reservations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    guest_first_name VARCHAR(255) NULL,
    guest_last_name VARCHAR(255) NULL,
    guest_email VARCHAR(255) NULL,
    guest_phone VARCHAR(50) NULL,
    room_id BIGINT UNSIGNED NOT NULL,
    date_from DATE NOT NULL,
    date_to DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('new', 'confirmed', 'cancelled') NOT NULL DEFAULT 'new',
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    is_active BIT NOT NULL DEFAULT 1,
    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO hotels (name, city, address, description, is_active, created_at, updated_at) VALUES
('Hotel Nad Jeziorem', 'Mikołajki', 'ul. Jeziorna 10', 'Hotel położony blisko jeziora.', 1, NOW(), NOW()),
('Hotel Centrum', 'Kraków', 'ul. Główna 5', 'Hotel w centrum miasta.', 1, NOW(), NOW()),
('Hotel Górski', 'Zakopane', 'ul. Tatrzańska 22', 'Hotel z widokiem na góry.', 1, NOW(), NOW());

INSERT INTO rooms (hotel_id, name, room_number, capacity, price_per_night, description, is_active, created_at, updated_at) VALUES
(1, 'Pokój jednoosobowy', '101', 1, 180.00, 'Mały pokój dla jednej osoby.', 1, NOW(), NOW()),
(1, 'Pokój dwuosobowy', '102', 2, 260.00, 'Pokój dla dwóch osób.', 1, NOW(), NOW()),
(2, 'Apartament', '201', 4, 500.00, 'Duży apartament rodzinny.', 1, NOW(), NOW()),
(3, 'Pokój z widokiem na góry', '301', 2, 320.00, 'Pokój z balkonem.', 1, NOW(), NOW());

INSERT INTO amenities (name, description, is_active, created_at, updated_at) VALUES
('WiFi', 'Dostęp do internetu bezprzewodowego.', 1, NOW(), NOW()),
('Telewizor', 'Telewizor w pokoju.', 1, NOW(), NOW()),
('Klimatyzacja', 'Klimatyzacja w pokoju.', 1, NOW(), NOW()),
('Parking', 'Dostęp do parkingu hotelowego.', 1, NOW(), NOW()),
('Balkon', 'Pokój posiada balkon.', 1, NOW(), NOW());

INSERT INTO amenity_room (room_id, amenity_id) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 5);
