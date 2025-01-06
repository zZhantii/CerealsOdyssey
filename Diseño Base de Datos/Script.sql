-- Tabla users
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(100),
    lastName VARCHAR(100),
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    rol VARCHAR(100) NOT NULL DEFAULT 'user'
);

-- Tabla address
CREATE TABLE address (
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    country VARCHAR(100),
    apartment VARCHAR(100),
    address VARCHAR(100),
    city VARCHAR(100),
    state VARCHAR(100),
    zipCode VARCHAR(100)
);

-- Tabla discounts
CREATE TABLE discounts (
    discount_id INT PRIMARY KEY AUTO_INCREMENT,
    start_date DATE, 
    end_date DATE,
    description VARCHAR(100),
    discount_value INT
);

-- Tabla categories
CREATE TABLE categories (
    categorie_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    image VARCHAR(100) NOT NULL,
    description VARCHAR(100),
    type INT
);

-- Tabla products
CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    order_detail_id INT,
    categorie_id INT,
    discount_id INT,
    name VARCHAR(100) NOT NULL,
    price FLOAT NOT NULL,
    priceDiscount FLOAT,
    image VARCHAR(100) NOT NULL,
    description VARCHAR(100)
);

-- Tabla orders
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    discount_id INT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,  
    cardNumber VARCHAR(100),
    status VARCHAR(100) DEFAULT 'Making',
    totalAmount INT NOT NULL,
    totalPrice FLOAT NOT NULL,
    totalItems INT NOT NULL,
    totalDiscount FLOAT NOT NULL,
    discount_value FLOAT NOT NULL
);

-- Tabla order_details
CREATE TABLE order_details ( 
    order_detail_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    discount_id INT,
    product_id INT NOT NULL,
    price FLOAT NOT NULL,  
    amount INT NOT NULL
);

-- Tabla ingredients
CREATE TABLE ingredients(
    ingredient_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL
);

-- Tabla intermedia users-orders
CREATE TABLE user_orders (
    user_id INT,
    order_id INT,
    PRIMARY KEY (user_id, order_id)  
);

-- Tabla intermedia discounts-products
CREATE TABLE discount_products (
    discount_id INT,
    product_id INT,
    PRIMARY KEY (discount_id, product_id)  
);

-- Tabla intermedia order_details-ingredients
CREATE TABLE order_detail_ingredients (
    order_detail_id INT,
    ingredient_id INT,
    PRIMARY KEY (order_detail_id, ingredient_id)  
);

-- Tabla auditoria
CREATE TABLE auditoria (
    user_id INT,
    operation VARCHAR(100),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    new_data TEXT
);

-- Agregar claves foráneas a orders
ALTER TABLE orders
ADD FOREIGN KEY (user_id) REFERENCES users(user_id),
ADD FOREIGN KEY (discount_id) REFERENCES discounts(discount_id);

-- Agregar claves foráneas a order_details
ALTER TABLE order_details
ADD FOREIGN KEY (order_id) REFERENCES orders(order_id),
ADD FOREIGN KEY (product_id) REFERENCES products(product_id),
ADD FOREIGN KEY (discount_id) REFERENCES discounts(discount_id);

-- Agregar claves foráneas a products
ALTER TABLE products
ADD CONSTRAINT fk_order_detail
FOREIGN KEY (order_detail_id) REFERENCES order_details(order_detail_id),
ADD FOREIGN KEY (categorie_id) REFERENCES categories(categorie_id),
ADD FOREIGN KEY (discount_id) REFERENCES discounts(discount_id);

-- Agregar claves foráneas a user_orders
ALTER TABLE user_orders
ADD FOREIGN KEY (user_id) REFERENCES users(user_id),
ADD FOREIGN KEY (order_id) REFERENCES orders(order_id);

-- Agregar claves foráneas a user
ALTER TABLE address
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

-- Agregar claves foráneas a discount_products
ALTER TABLE discount_products
ADD FOREIGN KEY (discount_id) REFERENCES discounts(discount_id),
ADD FOREIGN KEY (product_id) REFERENCES products(product_id);

-- Agregar claves foráneas a order_detail_ingredients
ALTER TABLE order_detail_ingredients
ADD FOREIGN KEY (order_detail_id) REFERENCES order_details(order_detail_id),
ADD FOREIGN KEY (ingredient_id) REFERENCES ingredients(ingredient_id);

-- Insertar datos en la tabla categories
INSERT INTO categories (name, image) VALUES ('Classics', 'category1.webp');
INSERT INTO categories (name, image) VALUES ('Energy Boost', 'category2.webp');
INSERT INTO categories (name, image) VALUES ('Calm & Relax', 'category3.webp');
INSERT INTO categories (name, image) VALUES ('Milks', 'category4.webp');

-- Insertar datos en la tabla Discounts
INSERT INTO discounts (description, discount_value) VALUES ('No Discount', 0);
INSERT INTO discounts (description, discount_value) VALUES ('SALE10', '10');

-- Insertar datos en la tabla Products
INSERT INTO products (categorie_id, name, price, image, description)
VALUES 
( 1,  'Classic Cornflakes', 4,  'classic_cornflakes.webp', 'Classic cornflakes made with whole grain, perfect for breakfast'),
( 2,  'Energy Boost Oats', 5, 'energy_boost_oats.webp', 'Oats packed with vitamins and minerals to give you a morning energy boost'),
( 3,  'Relaxing Herbal Cereal', 6,  'relaxing_herbal_cereal.webp', 'A calming cereal blend with chamomile and lavender, ideal for evening relaxation'),
( 1,  'Honey Crunch Flakes', 4,  'honey_crunch_flakes.webp', 'Crunchy cornflakes sweetened with natural honey for a tasty breakfast'),
( 3,  'Calm & Cozy Oats', 6, 'calm_cozy_oats.webp', 'Oats enriched with lavender and chamomile, perfect for a relaxing breakfast');










