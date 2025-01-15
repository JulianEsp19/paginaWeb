DELIMITER //

CREATE TRIGGER usuariosEditarBitacora
AFTER UPDATE ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (NEW.IdUsuario, 'Usuario editado', CURRENT_TIMESTAMP, 0, "UPDATE", "");
END //

DELIMITER ;