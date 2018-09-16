USE dbodbc;
DELIMITER $$
DROP PROCEDURE IF EXISTS traerCanchas $$
CREATE PROCEDURE traerCanchas()
COMMENT 'Traer todas las canchas para cargar Data Tables'
BEGIN	
	SELECT Filial.idFilial, tipoCancha, deporte, localidad, Cancha.idCancha
FROM Cancha
JOIN TipoCancha ON Cancha.idTipoCancha = TipoCancha.idTipoCancha
JOIN Deporte ON TipoCancha.idDeporte = Deporte.idDeporte
JOIN Filial ON Cancha.idFilial = Filial.idFilial
JOIN Localidad ON Filial.idLocalidad = Localidad.idLocalidad;
END
$$ 
DELIMITER ;

USE dbodbc;
CALL traerCanchas();
