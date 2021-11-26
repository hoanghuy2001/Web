CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(255) UNIQUE,
  `phone_number` varchar(20),
  `addr` varchar(255),
  `pwd` varchar(30) NOT NULL,
  `birthday` datetime,
  `role_id` int,
  `created_at` datetime,
  `updated_at` datetime,
  `is_deleted` int
);

CREATE TABLE `Category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `Product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `title` varchar(350) NOT NULL,
  `price` int,
  `discount` int,
  `thumbnail` varchar(500),
  `description` longtext,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Galery` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `thumbnail` varchar(500) NOT NULL
);

CREATE TABLE `Feedback` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(30),
  `lastname` varchar(30),
  `email` varchar(255),
  `phone_number` varchar(20),
  `subject` varchar(255),
  `content` varchar(255)
);

CREATE TABLE `Order` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `fullname` varchar(60),
  `email` varchar(255),
  `phone_number` varchar(20),
  `address` varchar(255),
  `note` varchar(255),
  `order_date` datetime,
  `status` int,
  `total_money` int
);

CREATE TABLE `OrderDetail` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `quantity` int,
  `total_money` int
);

CREATE TABLE `Token` (
  `user_id` int references `User` (`id`),
  `token` varchar(300) not null,
  `created_at` datetime,
  private key (`user_id`, `token`)
);




ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

ALTER TABLE `Galery` ADD FOREIGN KEY (`id`) REFERENCES `Product` (`id`);

ALTER TABLE `OrderDetail` ADD FOREIGN KEY (`order_id`) REFERENCES `Order` (`id`);

ALTER TABLE `OrderDetail` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);
