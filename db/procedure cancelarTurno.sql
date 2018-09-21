USE dbodbc;
DELIMITER $$
DROP PROCEDURE IF EXISTS cancelarTurno $$
CREATE PROCEDURE cancelarTurno(
	_idTurno INT(11)
 )

BEGIN
update turno SET
turno.vigente = IF (DATE_ADD(NOW(), INTERVAL 2 HOUR) < turno.fechaHora ,0, 1)
WHERE turno.idTurno = _idTurno;

END
$$ 
DELIMITER ;
