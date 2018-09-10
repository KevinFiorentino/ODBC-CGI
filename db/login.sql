USE dbodbc;
DELIMITER $$
DROP PROCEDURE IF EXISTS logear_Usuario $$
CREATE PROCEDURE logear_Usuario(
	_user VARCHAR(45), 
	_pass VARCHAR(45)
)
COMMENT 'Buscar Login por User y Pass, si encuentra devuelve todo el registro'
BEGIN	
	SELECT user, idUsuario, nombre, apellido FROM login
	JOIN usuario ON login.idLogin = usuario.idUsuario
	WHERE user = _user
	AND pass = _pass;
END
$$ 
DELIMITER ;


USE dbodbc;
CALL logear_Usuario('socio', '1111');