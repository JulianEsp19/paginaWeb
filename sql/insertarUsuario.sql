DELIMITER //

CREATE TRIGGER usuariosInsertarBitacora
AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (NEW.IdUsuario, 'Usuario Insertado', CURRENT_TIMESTAMP, 0, "INSERT", "DELETE");
END //

DELIMITER ;