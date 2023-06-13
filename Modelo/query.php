<?php

function createQueries(){
    $query = "CREATE TABLE `estudiante` (
        `es_id_estudiante` varchar(12) NOT NULL,
        `es_password` varchar(50) DEFAULT NULL,
        `es_nombre1` varchar(45) DEFAULT NULL,
        `es_nombre2` varchar(45) DEFAULT NULL,
        `es_apellido1` varchar(45) DEFAULT NULL,
        `es_apellido2` varchar(45) DEFAULT NULL,
        `es_estado` varchar(1) DEFAULT NULL,
        PRIMARY KEY (`es_id_estudiante`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

      CREATE TABLE `laboratorio_computo` (
        `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT,
        `nombre_laboratorio` varchar(45) DEFAULT NULL,
        `total_pc` int(11) DEFAULT NULL,
        `disponible_pc` int(11) DEFAULT NULL,
        `estado` varchar(1) DEFAULT NULL,
        PRIMARY KEY (`id_laboratorio`)
      ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

      CREATE TABLE `reserva_laboratorio` (
        `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
        `id_estudiante` varchar(12) NOT NULL,
        `fecha_reserva` datetime NOT NULL,
        `hora_reserva` varchar(10) NOT NULL,
        `estado_reserva` varchar(1) DEFAULT NULL,
        PRIMARY KEY (`id_reserva`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

        $query .= llenarTablaEstudiante();    
        $query .= llenarTablaLab();
   return $query;
}

function llenarTablaEstudiante(){
    $query = "INSERT INTO bosco.estudiante (es_id_estudiante,es_password,es_nombre1,es_nombre2,es_apellido1,es_apellido2,es_estado) VALUES
    ('11223344','pepito2','Marco','Aurelio','Lopez','Soto','V'),
    ('12345678','pepito','Matias','','Ayra','Valencia','V'),
    ('22334455','pepito3','Maria',NULL,'Robles','Torres','V'),
    ('33445566','pepito4','Camila','Alejandra','Agudelo','Rosales','V');";
     return $query;
}

function llenarTablaLab(){
   $query = "INSERT INTO bosco.laboratorio_computo (nombre_laboratorio,total_pc,disponible_pc,estado) VALUES
	 ('LAB01',20,20,'V'),
	 ('LAB02',15,15,'V'),
	 ('LAB03',30,30,'V'),
	 ('LAB04',18,18,'V');";
        return $query;  
}

?>