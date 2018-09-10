USE dbodbc;
DELIMITER $$
DROP PROCEDURE IF EXISTS registrar_Usuario $$
CREATE PROCEDURE registrar_Usuario(
	_user VARCHAR(45),
	_pass VARCHAR(45),
    _nombre VARCHAR(45),
    _apellido VARCHAR(45),
    _direccion VARCHAR(45),
    _telefono INT(11),
    _email VARCHAR(45)
 )

BEGIN
	INSERT INTO usuario(nombre,apellido,direccion,telefono,email) VALUES (_nombre,_apellido,_direccion,_telefono,_email);
	INSERT INTO login (idLogin,user,pass,idTipoLogin) VALUES (LAST_INSERT_ID(),_user,_pass, '1');
END
$$ 
DELIMITER ;


