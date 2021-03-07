TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `delete_archivosAnteproyectos` BEFORE DELETE ON `anteproyectos` FOR EACH ROW delete from anteproyectos_doc where idAnteproyecto=old.idAnteproyecto' 'CREATE DEFINER=`root`@`localhost` TRIGGER `delete_anteproyecto` BEFORE DELETE ON `anteproyectos` FOR EACH ROW delete from residencias where idAnteproyecto = old.idAnteproyecto'
sql_modes=1098907648 1098907648
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
created=161043622931 161060895379
