USE DBodbc;
DELIMITER $$
DROP FUNCTION IF EXISTS alta_Turno $$
CREATE FUNCTION alta_Turno(
	_idFilial INT,
	_idCancha INT,
	_fechaHora DATETIME,
	_idUsuario INT
)
RETURNS BOOL
BEGIN
	DECLARE validarHora BOOL;
	DECLARE validarCancha BOOL;
	DECLARE count INT;
	DECLARE existe BOOL;

	-- Validamos que si es el mismo dia, que la hora de reserva sea mayor a una
	IF ( DAY(_fechaHora) = DAY(NOW()) ) AND ( HOUR(_fechaHora) - HOUR(NOW()) <= 1 ) THEN
		SET validarHora := 0;
		SET existe := 1;
	ELSE 
		SET validarHora := 1;
	END IF;

	-- Validamos que no exista un Turno vigente en ese mismo dia y horario en esa cancha
	IF validarHora = 1 THEN
		SELECT COUNT(*) INTO count FROM Turno
		WHERE Turno.fechaHora = _fechaHora
		AND Turno.idCancha = _idCancha
		AND Turno.vigente = true;
		
		-- Si no existe un Turno en ese momento, validamos la cancha
		IF count = 0 THEN
			SET validarCancha := 1;
		ELSE 
			SET validarCancha := 0;
		END IF;

	ELSE 
		SET validarCancha := 0;
	END IF;

	-- Si la cancha es valida, Insertamos el Turno
	IF validarCancha = 1 THEN 
		INSERT INTO Turno(fechaHora, vigente, idFilial, idCancha, idUsuario) 
			VALUES (_fechaHora, TRUE, _idFilial, _idCancha, _idUsuario);
		SET existe := 1;
	ELSE 
		SET existe := 0;
	END IF;

	RETURN existe; -- 0 = No Insertó, 1 = Insertó
END $$
DELIMITER ;


SELECT alta_Turno(1, 1, '2018/09/25 13:00', 1) AS alta;


