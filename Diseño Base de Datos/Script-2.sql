-- Tabla users
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone INT,
    rol VARCHAR(100) NOT NULL
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
    description VARCHAR(100)
);

-- Tabla orders
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    discount_id INT,
    date DATETIME NOT NULL,  -- Cambié TIME a DATETIME
    status VARCHAR(100) NOT NULL,
    total_amount INT NOT NULL,
    total_price INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (discount_id) REFERENCES discounts(discount_id)
);

-- Tabla order_details
CREATE TABLE order_details ( 
    order_detail_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    discount_id INT,
    product_id INT NOT NULL,
    price INT NOT NULL,  -- Corregido el nombre de 'price' (había un error de sintaxis)
    amount INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (discount_id) REFERENCES discounts(discount_id)
);

-- Tabla products
CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    order_detail_id INT,
    categorie_id INT,
    discount_id INT,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,

    ---
    FOREIGN KEY (discount_id) REFERENCES discounts(discount_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(categorie_id)
);

-- Tabla ingredients
CREATE TABLE ingredients(
    ingredient_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL
);

-- Tabla shipments
CREATE TABLE shipments (
    shipment_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    address VARCHAR(100),  -- Corregido 'addres' a 'address'
    city VARCHAR(100),
    date_shipment DATE,  -- Cambié el tipo a DATE
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

-- Actualizacion de la tabla products
ALTER TABLE products
ADD CONSTRAINT fk_order_detail
FOREIGN KEY (order_detail_id) REFERENCES order_details(order_detail_id);

-- Actualizacion de la tabla products

ALTER TABLE products
ADD COLUMN image VARCHAR(100);


-- Tabla intermedia users-orders

CREATE TABLE user_orders (
    user_id INT,
    order_id INT,
    PRIMARY KEY (user_id, order_id),  -- Establece una clave primaria compuesta
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

-- Tabla intermedia discounts-products

CREATE TABLE discount_products (
    discount_id INT,
    product_id INT,
    PRIMARY KEY (discount_id, product_id),  -- Establece una clave primaria compuesta
    FOREIGN KEY (discount_id) REFERENCES discounts(discount_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Tabla intermedia order_details-ingredients

CREATE TABLE order_detail_ingredients (
    order_detail_id INT,
    ingredient_id INT,
    PRIMARY KEY (order_detail_id, ingredient_id),  -- Establece una clave primaria compuesta
    FOREIGN KEY (order_detail_id) REFERENCES order_details(order_detail_id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredients(ingredient_id)
);











