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
    totalItems INT ,
    totalDiscount FLOAT,
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
(1, 'Classic Cornflakes', 2.3, 'classic_cornflakes.webp', 'Classic Cornflakes es un cereal delicioso y crujiente, ideal para comenzar el día con energía. Hecho con maíz de alta calidad, ofrece una opción saludable y sabrosa para tu desayuno. Su textura ligera y su sabor suave lo convierten en la elección perfecta para acompañar con leche o frutas. Perfecto para quienes buscan un desayuno rápido, nutritivo y lleno de sabor.'),
(1, 'Froot Loops', 1.50, 'froot_loops.webp', 'Disfruta de la simplicidad y el sabor clásico con los Cornflakes. Este cereal está hecho con maíz seleccionado, ofreciendo una opción ligera para el desayuno. Puedes combinarlo con tu leche o bebida vegetal favorita y añadirle frutas o miel para un toque extra de sabor. Una excelente fuente de energía para comenzar el día.'),
(2, 'Energy Boost Oats', 3, 'energy_boost_oats.webp', 'Energy Boost Oats es el desayuno perfecto para aquellos que buscan un impulso de energía natural. Con avena rica en fibra y nutrientes esenciales, este cereal proporciona una liberación constante de energía a lo largo de la mañana. Ideal para acompañar con frutas frescas, frutos secos o tu leche favorita, asegurando un desayuno completo y equilibrado.'),
(2, 'Energy Boost', 3.5, 'energy_boost.webp', 'Energy Boost es una mezcla de cereales energizantes que te dará el impulso que necesitas para afrontar el día. Con ingredientes seleccionados para mejorar tu vitalidad, esta opción es perfecta para aquellos que necesitan energía adicional. Su sabor único y textura crujiente combinan perfectamente con leche o yogur. Además, es una excelente fuente de fibra y nutrientes.'),
(3, 'Relaxing Herbal Cereal', 4, 'relaxin_herbal.webp', 'Relaxing Herbal Cereal es una opción ideal para aquellos que buscan relajarse después de un día agitado. Infusionado con hierbas relajantes como la manzanilla y la lavanda, este cereal está diseñado para promover la calma y el bienestar. Perfecto para la noche, puedes acompañarlo con leche tibia o tu bebida preferida, creando una experiencia reconfortante y relajante.'),
(3, 'Calm & Cozy Oats', 6, 'calm_cozy_oats.webp', 'Calm & Cozy Oats es la mezcla perfecta de avena suave y reconfortante, con ingredientes relajantes que te ayudarán a encontrar la calma. Ideal para una noche tranquila, este cereal combina avena con toques suaves de especias y hierbas, proporcionando una sensación de comodidad. Puedes disfrutarlo caliente, con leche o como más te guste para un descanso reparador.'),
(4, 'Blue Milk', 2.50, 'blue_milk.webp', 'Blue Milk es una bebida láctea innovadora y deliciosa, con un toque único de sabor y un color fascinante. Perfecta para quienes buscan un cambio refrescante, su sabor suave y cremoso la convierte en la opción ideal para disfrutar en cualquier momento del día. Puedes usarla en cereales, café o simplemente disfrutarla sola. Es una bebida que despierta la curiosidad y el placer de cada sorbo.'),
(4, 'White Milk', 1.20, 'white_milk.webp', 'White Milk es la leche tradicional que todos conocemos y amamos. Con su sabor natural y cremoso, es perfecta para acompañar cualquier desayuno o para disfrutar sola. Ideal para agregar a cereales, batidos o café, esta leche aporta todos los beneficios nutricionales esenciales, incluyendo calcio y proteínas. Un básico imprescindible en cada hogar.'),
(4, 'Green Milk', 1.40, 'green_milk.webp', 'Green Milk es una variante fresca y deliciosa de leche que se distingue por su color vibrante y sabor suave. Ideal para quienes buscan algo diferente, esta leche se combina perfectamente con cereales o como base para batidos saludables. Aporta todos los beneficios de la leche tradicional, mientras ofrece una experiencia visualmente atractiva que hará que tu desayuno sea aún más especial.'),
(4, 'Pink Milk', 1.60, 'pink_milk.webp', 'Pink Milk es una leche de color rosa encantador que ofrece una experiencia única en sabor y color. Su sabor suave y ligeramente dulce es perfecto para los más pequeños de la casa, o para quienes disfrutan de una bebida creativa y divertida. Puedes disfrutarla con cereales, postres o simplemente sola. Una excelente opción para agregar un toque de diversión a tu día.'),
(4, 'Purple Milk', 2    , 'purple_milk.webp', 'Purple Milk es una bebida láctea innovadora y colorida que ofrece un sabor suave y encantador. Este producto único es perfecto para quienes desean experimentar con nuevos sabores y colores en su dieta. Puedes disfrutarla con cereales, batidos o como un refresco independiente. No solo es deliciosa, sino que también ofrece todos los beneficios nutricionales de la leche tradicional.'),
(4, 'All Milks Colors', 5.50, 'all_milks_colors.webp', 'All Milks Colors es un conjunto exclusivo de leches en diversos colores vibrantes. Incluye todas las opciones más populares: azul, verde, rosa y morado. Cada leche tiene un sabor suave y delicioso, y es perfecta para quienes buscan explorar nuevas experiencias sensoriales en sus bebidas. Disfrútalas por separado o crea combinaciones divertidas, todo mientras obtienes los beneficios nutricionales que proporciona la leche tradicional. Ideal para ocasiones especiales o para darle un toque único a tus desayunos.'); 











