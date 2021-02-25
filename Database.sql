CREATE TABLE `SCANDIWEB`.`Product` ( `id` INT NOT NULL AUTO_INCREMENT, `sku` TEXT NOT NULL , `name` LONGTEXT NOT NULL , `price` DOUBLE NOT NULL , `productType` TEXT NOT NULL, constraint pk_product primary key(`id`) , UNIQUE (`sku`) USING HASH ) ENGINE = InnoDB COMMENT = 'PRODUCT TABLE';
CREATE TABLE `SCANDIWEB`.`Book` ( `id` INT NOT NULL AUTO_INCREMENT, `weight` FLOAT NOT NULL , `productId` INT NOT NULL , constraint pk_book PRIMARY KEY (id) , constraint fk_book FOREIGN KEY (productId) REFERENCES Product(id) ) ENGINE = InnoDB COMMENT = 'BOOK TABLE';
CREATE TABLE `SCANDIWEB`.`Disc` ( `id` INT NOT NULL AUTO_INCREMENT, `size` DOUBLE NOT NULL , `productId` INT NOT NULL , constraint pk_disc PRIMARY KEY (id) , constraint fk_disc FOREIGN KEY (productId) REFERENCES Product(id) ) ENGINE = InnoDB COMMENT = 'DISC TABLE';
CREATE TABLE `SCANDIWEB`.`Furniture` ( `id` INT NOT NULL AUTO_INCREMENT, `height` DOUBLE NOT NULL , `width` DOUBLE NOT NULL , `length` DOUBLE NOT NULL , `productId` INT NOT NULL , constraint pk_furniture PRIMARY KEY (id) , constraint fk_furniture FOREIGN KEY (productId) REFERENCES Product(id) ) ENGINE = InnoDB COMMENT = 'FURNITURE TABLE';



INSERT INTO `Product` (`id`, `sku`, `name`, `price`, `productType`) VALUES (NULL, 'HOIH234ASV', 'Learn Java', '45', 'Book');
INSERT INTO `Book` (`id`, `weight`, `productId`) VALUES (NULL, '1.2', '2');
INSERT INTO `Product` (`id`, `sku`, `name`, `price`, `productType`) VALUES (NULL, 'HOIH234ASX', 'Chinese Made Easy', '21', 'Book');
INSERT INTO `Book` (`id`, `weight`, `productId`) VALUES (NULL, '1', '1');
INSERT INTO `Product` (`id`, `sku`, `name`, `price`, `productType`) VALUES (NULL, 'HOIH234VVF', 'High School Math', '30', 'Book');
INSERT INTO `Book` (`id`, `weight`, `productId`) VALUES (NULL, '.5', '3');