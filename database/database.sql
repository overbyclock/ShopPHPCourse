
CREATE DATABASE shopProject;

USE shopProject;

CREATE TABLE users(
  id       int(255) auto_increment not null,
  name     varchar(100) not null,
  lastName varchar(150),
  email    varchar(100) not null,
  pass     varchar(100) not null,
  rol      varchar(50),
  img      varchar(200),
  CONSTRAINT pk_id PRIMARY KEY(id),
  CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO users VALUES(null,'admin','admin','admin@gmail.com','123456','admin',null);

CREATE TABLE orders(
  id         int(255) auto_increment not null,
  userID     int(255) not null,
  city       varchar(150) not null,
  address    varchar(200) not null,
  postalCode int(10) not null,
  total      float(200,2) not null,
  state      varchar(20) not null,
  date       date,
  time       time,
  CONSTRAINT pk_id PRIMARY KEY(id),
  CONSTRAINT fk_userID FOREIGN KEY(userID) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE categories(
  id   int(255) auto_increment not null,
  name varchar(200) not null,
  CONSTRAINT pk_id PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categories VALUES(null,'t-shirt');
INSERT INTO categories VALUES(null,'trousers');
INSERT INTO categories VALUES(null,'sweater');
INSERT INTO categories VALUES(null,'jacket');

CREATE TABLE products(
  id          int(255) auto_increment not null,
  categoryID  int(255) not null,
  name        varchar(100) not null,
  description MEDIUMTEXT not null,
  price       float(100,2) not null,
  stock       int(255) not null,
  sale        varchar(2),
  date        date not null,
  img         varchar(200),
  CONSTRAINT pk_id PRIMARY KEY(id),
  CONSTRAINT fk_categoryID FOREIGN KEY(categoryID) REFERENCES categories(id)
)ENGINE=InnoDb;

CREATE TABLE order_product(
  id        int(255) auto_increment not null,
  orderID   int(255) not null,
  productID int(255) not null,
  units     int(255) not null,
  CONSTRAINT pk_id PRIMARY KEY(id),
  CONSTRAINT fk_orderID FOREIGN KEY(orderID) REFERENCES orders(id),
  CONSTRAINT fk_productID FOREIGN KEY(productID) REFERENCES products(id)
)ENGINE=InnoDb;