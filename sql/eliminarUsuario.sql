DELIMITER //

CREATE TRIGGER usuariosEliminarBitacora
BEFORE DELETE ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (OLD.IdUsuario, 'Usuario eliminado', CURRENT_TIMESTAMP, 0, "DELETE", "INSERT");
END //

DELIMITER ;