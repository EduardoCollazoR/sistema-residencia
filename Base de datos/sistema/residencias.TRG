TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `nueva_residencia` AFTER INSERT ON `residencias` FOR EACH ROW update anteproyectos set estatus=3 where idAnteproyecto=new.idAnteproyecto' 'CREATE DEFINER=`root`@`localhost` TRIGGER `update_anteproyecto` BEFORE DELETE ON `residencias` FOR EACH ROW IF EXISTS (SELECT * FROM anteproyectos WHERE idAnteproyecto=old.idAnteproyecto)\n       THEN\n        UPDATE anteproyectos set estatus=2 where idAnteproyecto=old.idAnteproyecto;\n    END IF' 'CREATE DEFINER=`root`@`localhost` TRIGGER `delete_documentos` BEFORE DELETE ON `residencias` FOR EACH ROW DELETE FROM residencias_doc where idResidencia=old.idResidencia' 'CREATE DEFINER=`root`@`localhost` TRIGGER `delete_carta` BEFORE DELETE ON `residencias` FOR EACH ROW delete from profesores_cartasterminacion where idResidencia=old.idResidencia'
sql_modes=524288 1098907648 1098907648 1098907648
definers='root@localhost' 'root@localhost' 'root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4' 'utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_general_ci' 'utf8mb4_unicode_ci' 'utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci' 'utf8mb4_general_ci' 'utf8mb4_general_ci'
created=161043196483 161060871716 161060887055 161060894314
