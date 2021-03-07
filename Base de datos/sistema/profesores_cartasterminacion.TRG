TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `insertar_carta` AFTER INSERT ON `profesores_cartasterminacion` FOR EACH ROW UPDATE residencias set estatus = 2 WHERE idResidencia=new.idResidencia' 'CREATE DEFINER=`root`@`localhost` TRIGGER `update_residencia` BEFORE DELETE ON `profesores_cartasterminacion` FOR EACH ROW IF EXISTS (SELECT * FROM residencias WHERE idResidencia=old.idResidencia)\n       THEN\n        UPDATE residencias set estatus=1 where idResidencia=old.idResidencia;\n    END IF'
sql_modes=1098907648 1098907648
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
created=161060885215 161060879453
