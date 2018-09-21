USE dbodbc;
DELIMITER $$
DROP PROCEDURE IF EXISTS traerMisTurnos $$
CREATE PROCEDURE traerMisTurnos(
	_usuarioId INT(11)
 )

BEGIN
	SELECT idTurno, turno.fechaHora, tipoCancha, deporte, localidad, turno.idCancha
FROM turno
JOIN Cancha ON turno.idCancha = cancha.idCancha
JOIN TipoCancha ON cancha.idTipoCancha = TipoCancha.idTipoCancha
JOIN Deporte ON TipoCancha.idDeporte = Deporte.idDeporte
JOIN Filial ON Turno.idFilial = Filial.idFilial
JOIN Localidad ON Filial.idLocalidad = Localidad.idLocalidad

WHERE idUsuario = _usuarioId and fechaHora > NOW() and turno.vigente = TRUE;


END
$$ 
DELIMITER ;
