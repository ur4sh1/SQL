<h1 align="center">:file_cabinet:SQL - Querys</h1>

## :memo: Descrição
Trabalho de banco de dados

## :books: Funcionalidades
* Exibi Querys(consultas) para um banco de dados MySQL

## :wrench: Tecnologias utilizadas
* MySQL;
* PHP;

## :wrench: Script para o banco de dados
```
CREATE DATABASE tribunal;

CREATE TABLE requerente(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
tipo VARCHAR(4),
num VARCHAR(20)
);
INSERT INTO requerente(nome, tipo, num) VALUES ('João Silva', 'CPF', '654.245.685-15');
INSERT INTO requerente(nome, tipo, num) VALUES ('Ricardo Moira', 'CPF', '559.478.147-19');
INSERT INTO requerente(nome, tipo, num) VALUES ('Monalisa Costa', 'CPF', '872.245.685-35');
INSERT INTO requerente(nome, tipo, num) VALUES ('Andre Zack', 'CPF', '485.247.147-78');
INSERT INTO requerente(nome, tipo, num) VALUES ('Bandeirantes', 'CNPJ', '14.238.570\0001-29');
INSERT INTO requerente(nome, tipo, num) VALUES ('Coca-COla', 'CNPJ', '15.654.570\0002-35');
INSERT INTO requerente(nome, tipo, num) VALUES ('Pepsi', 'CNPJ', '18.754.570\0702-97');
INSERT INTO requerente(nome, tipo, num) VALUES ('Carrefour', 'CNPJ', '18.854.570\0002-47');
INSERT INTO requerente(nome, tipo, num) VALUES ('Leandro Marfim', 'CPF', '987.500.574-12');
INSERT INTO requerente(nome, tipo, num) VALUES ('Charles', 'CPF', '888.245.005-14');
INSERT INTO requerente(nome, tipo, num) VALUES ('Cherlock Holmes', 'CPF', '666.570.574-37');
INSERT INTO requerente(nome, tipo, num) VALUES ('Maycon Man', 'CPF', '248.321.984-47');
INSERT INTO requerente(nome, tipo, num) VALUES ('Google', 'CNPJ', '57.854.657\1002-78');
INSERT INTO requerente(nome, tipo, num) VALUES ('AMD', 'CNPJ', '78.878.570\0072-22');
INSERT INTO requerente(nome, tipo, num) VALUES ('NVidia', 'CNPJ', '18.821.570\4402-33');

CREATE TABLE requerido(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
tipo VARCHAR(4)
num VARCHAR(20)
);
INSERT INTO requerido(nome, tipo, num) VALUES ('João Silva', 'CPF', '654.245.685-15');
INSERT INTO requerido(nome, tipo, num) VALUES ('Ricardo Moira', 'CPF', '559.478.147-19');
INSERT INTO requerido(nome, tipo, num) VALUES ('Monalisa Costa', 'CPF', '872.245.685-35');
INSERT INTO requerido(nome, tipo, num) VALUES ('Andre Zack', 'CPF', '485.247.147-78');
INSERT INTO requerido(nome, tipo, num) VALUES ('Bandeirantes', 'CNPJ', '14.238.570\0001-29');
INSERT INTO requerido(nome, tipo, num) VALUES ('Coca-COla', 'CNPJ', '15.654.570\0002-35');
INSERT INTO requerido(nome, tipo, num) VALUES ('Pepsi', 'CNPJ', '18.754.570\0702-97');
INSERT INTO requerido(nome, tipo, num) VALUES ('BEMOL', 'CNPJ', '17.854.990\7802-50');
INSERT INTO requerido(nome, tipo, num) VALUES ('Moises Limão', 'CPF', '124.550.574-41');
INSERT INTO requerido(nome, tipo, num) VALUES ('Leonardo Tonks', 'CPF', '587.245.048-10');
INSERT INTO requerido(nome, tipo, num) VALUES ('Marcelo Moraes', 'CPF', '114.028.874-37');
INSERT INTO requerido(nome, tipo, num) VALUES ('Junior Jr', 'CPF', '446.388.747-63');
INSERT INTO requerido(nome, tipo, num) VALUES ('NETFLIX', 'CNPJ', '12.754.857\8802-27');
INSERT INTO requerido(nome, tipo, num) VALUES ('SANTO REMEDIO', 'CNPJ', '27.788.500\0001-01');
INSERT INTO requerido(nome, tipo, num) VALUES ('FARMA FLEX', 'CNPJ', '91.132.470\8882-11');

CREATE TABLE processo(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
requerente INT,
requerido INT,
id_audiencia INT
);
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Coca-Cola vs Pepsi', '6', '7','1');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Bandeirantes vs Monalisa', '5', '3','2');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('João Silva vs Ricardo', '1', '2','3');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Andre Zack vs Bandeirantes', '4', '5','4');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Bandeirantes vs Pepsi', '5', '7','5');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Pepsi vs Monalisa', '7', '3','6');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Pepsi vs Farma Flex', '7', '15','7');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Coca-Cola vs Bemol', '6', '8','8');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Cherlock Holmes vs Monalisa', '11', '3','9');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Carrefour vs Leonardo Tonks', '8', '10','10');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('AMD vs NETFLIX', '14', '13','11');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Google vs Santo Remedio', '13', '14','12');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Leandro Marfim vs Moises Limão', '9', '9','13');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('João Silva vs Moises Limão', '1', '9','14');
INSERT INTO processo(nome, requerente, requerido, id_audiencia) VALUES ('Bandeirantes vs Bemol', '5', '8','15');

CREATE TABLE audiencia(
id INT AUTO_INCREMENT PRIMARY KEY,
data DATE,
valor DECIMAL(8,2),
juiz INT
);
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-1-12','15000','1');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-2-13','97000','1');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-3-14','99220','2');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-5-10','19880','2');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-6-9','18877','2');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-6-9','17888','3');
INSERT INTO audiencia(data, valor, juiz) VALUES('2020-5-11','19777','4');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-1-1','97885','4');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-2-8','74805','1');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-2-2','97654','4');
INSERT INTO audiencia(data, valor, juiz) VALUES('2022-3-1','10000','2');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-4-18','90000','2');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-2-7','97654','4');
INSERT INTO audiencia(data, valor, juiz) VALUES('2022-3-1','80000','4');
INSERT INTO audiencia(data, valor, juiz) VALUES('2021-4-2','95000','2');

CREATE TABLE juiz(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50)
);
INSERT INTO juiz(nome) VALUES ('Josmar Oliveira');
INSERT INTO juiz(nome) VALUES ('Lana Len');
INSERT INTO juiz(nome) VALUES ('Marisvaldo Pinheiro');
INSERT INTO juiz(nome) VALUES ('Sergio Moro');
INSERT INTO juiz(nome) VALUES ('Lana Len');
INSERT INTO juiz(nome) VALUES ('Hastarorvick');
INSERT INTO juiz(nome) VALUES ('Mark Zuck');
INSERT INTO juiz(nome) VALUES ('Lorrane Alves');
INSERT INTO juiz(nome) VALUES ('Jackson');
INSERT INTO juiz(nome) VALUES ('Rufus');
INSERT INTO juiz(nome) VALUES ('Viviane');
INSERT INTO juiz(nome) VALUES ('Valentine');
INSERT INTO juiz(nome) VALUES ('Ricardo');
INSERT INTO juiz(nome) VALUES ('Caio Cersar');
INSERT INTO juiz(nome) VALUES ('Cesar tompson');
```
