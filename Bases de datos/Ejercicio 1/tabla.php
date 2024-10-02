<?php 

$sql = "CREATE TABLE usuariosRegistrados (
    email VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
?>