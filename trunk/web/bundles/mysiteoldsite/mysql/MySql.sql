create table TVisitor(
id int NOT NULL AUTO_INCREMENT primary key,
ip varchar(20),
country varchar(255) default "" ,
dateVisit datetime,
numVisit int default 0
);

create table TVisitorVisit(
id int NOT NULL AUTO_INCREMENT primary key,
ip varchar(20),
dateVisit datetime,
FOREIGN KEY (ip) REFERENCES TVisitor(ip)
);

ALTER TABLE TVisitor DROP COLUMN nomHost;
ALTER TABLE `u476963084_bd`.`tvisitor` ADD COLUMN `nomHost` VARCHAR(50) NULL DEFAULT 'No especificado'  AFTER `numVisit` ;



insert into TVisitor(ip, country, dateVisit, numVisit) values('10.103.234.2', 'San Jose, Guadalupe', DATE_SUB(NOW(), INTERVAL 2 HOUR), 1);

if (select count(ip) from TVisitor where ip = '10.103.234.2.9') > 0 then select 'hola';
else select 'nada';
end if;

DELIMITER |
CREATE FUNCTION existIp(pip varchar(20)) 
RETURNS INT
BEGIN
    DECLARE contador INT;
    DECLARE result INT;
    
    SELECT count(ip) INTO contador from TVisitor where ip = pip;

    IF contador > 0 
        THEN SET result = 1;
        ELSE SET result = 0;
    END IF;

    RETURN result;
END|
  
  
  //Crear usuario.
  CREATE USER '495972_carlos'@'localhost' IDENTIFIED BY '000797';
  CREATE USER 'a4091027_user'@'localhost' IDENTIFIED BY 'carlosFer000797';

  
  //Otorgar permisos.
  GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, LOCK TABLES 
	ON carlosdominguez_zxq_db.* 
	TO '495972_carlos'@'localhost';

  //Restar y sumar horas a una fecha
  Update TVisitor set dateVisit = DATE_SUB(dateVisit, INTERVAL 6 HOUR) where id = 5;