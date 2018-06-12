# CREATE ALL TABLES 

CREATE TABLE IF NOT EXISTS currency (
  id int(11) NOT NULL auto_increment,
  name varchar(126) NOT NULL,
  abbreviation varchar(16) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS currency_values (
  id int(11) NOT NULL auto_increment,
  currency_id int(11) NOT NULL,
  value float(11,4) NOT NULL,
  timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (currency_id) REFERENCES currency(id)
 );


CREATE TABLE IF NOT EXISTS role (
	id INT(11) NOT NULL auto_increment,
	name INT(11) NOT NULL,
	description VARCHAR(255) DEFAULT 'None',
	PRIMARY KEY (id)

);

CREATE TABLE IF NOT EXISTS user (
	id INT(11) NOT NULL auto_increment,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	email VARCHAR(150) NOT NULL,
	passwordHash VARCHAR(255) NOT NULL,
	role_id INT(11) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE(email),
	FOREIGN KEY (role_id) REFERENCES role(id)

);

CREATE TABLE IF NOT EXISTS user_currency_tracking (
	id INT(11) NOT NULL auto_increment,
	user_id INT(11) NOT NULL,
	currency_id INT(11) NOT NULL,
	threshold FLOAT(11,4),
    direction BOOLEAN,
	PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (currency_id) REFERENCES currency(id)
);


