CREATE DATABASE IF NOT EXISTS `todo_list`;
USE `todo_list`;

CREATE TABLE IF NOT EXISTS `users` (
  id int AUTO_INCREMENT NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `todos` (
  id int AUTO_INCREMENT NOT NULL,
  user_id int NOT NULL,
  title varchar(255) NOT NULL,
  description varchar(255),
  status int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO `users` (username, password, email) VALUES ('admin', 'admin', 'admin@example.com');

INSERT INTO `todos` (user_id, title, description, status) VALUES (1, 'test', 'the relation is working?', 0);

-- testing if the relation etc. is working
SELECT u.username, t.* FROM users AS u JOIN todos AS t ON t.user_id = u.id; 