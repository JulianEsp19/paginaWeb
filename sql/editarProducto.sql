DELIMITER //

CREATE TRIGGER productosEditarBitacora
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (NEW.IDProducto, 'producto editado', CURRENT_TIMESTAMP, 1, "UPDATE", "");
END //

DELIMITER ;