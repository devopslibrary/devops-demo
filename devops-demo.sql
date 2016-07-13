CREATE TABLE dbversion (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,version VARCHAR(30) NOT NULL);
INSERT INTO dbversion (version) VALUES ('1.0');
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' identified by 'devpass';
flush PRIVILEGES;