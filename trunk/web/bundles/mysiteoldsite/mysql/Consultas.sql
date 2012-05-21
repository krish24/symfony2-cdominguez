--==========================CONSULTAS========================================
--Obtiene Todas las visitas de las diferentes IP's menos la mia.
SELECT * 
FROM  `TVisitorVisit` 
WHERE `ip` NOT 
IN (
'186.176.156.210'
)
ORDER BY `ip`, `dateVisit`
LIMIT 0 , 1000

--Cuenta el número de visitas de una IP's
SELECT  '201.198.57.82' AS  'IP', COUNT( ip ) AS  'NUMERO DE VISITAS'
FROM  `TVisitorVisit` 
WHERE  `ip` =  '201.198.57.82'
LIMIT 0 , 30

--Cuenta el número de visitas de cada IP de la tabla TVisitorVisit
SELECT DISTINCT ip AS  'IP', contarVisitasIp(ip) AS  'NUMERO DE VISITAS'
FROM  `TVisitorVisit` 
ORDER BY  `NUMERO DE VISITAS` DESC 

--Obtiene las fechas de visitas de una IP
SELECT * 
FROM `TVisitorVisit` 
WHERE ip = ''

--Selecciona las funciones creadas en Mysql
SELECT specific_name
FROM information_schema.routines

--Seleccionar las ultimas 15 visitas
SELECT vv.id, vv.ip, vv.dateVisit, v.nomHost
FROM TVisitorVisit as vv inner join TVisitor as v 
		on vv.ip = v.ip 
ORDER BY  vv.dateVisit DESC 
LIMIT 0 , 15;

--Actualizar el nombre del host
UPDATE TVisitor 
SET nomHost = 'IP from my PC in 15 August 2011'
where ip = '186.176.156.210';

--==========================FUNCIONES========================================
--FUNCION QUE CUENTA LAS VISITAS DE UNA IP
CREATE FUNCTION contarVisitasIp(
	pip VARCHAR(20)
) 
RETURNS int
BEGIN
	DECLARE numVisitas int;
	SET numVisitas = ( SELECT COUNT( ip ) FROM  `TVisitorVisit` WHERE  `ip` =  pip);
    RETURN numVisitas;
END;
//

--Borrar una funcion
DROP FUNCTION IF EXISTS holaMundo