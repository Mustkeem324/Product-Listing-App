CREATE DATABASE product_listing;

USE product_listing;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    sale_status ENUM('on_sale', 'not_on_sale') NOT NULL
);
