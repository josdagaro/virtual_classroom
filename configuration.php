<?php
    $configuration = Configuration::singleton ();
    //Configuración de MVC
    $configuration->set ('controllersFolder', 'controllers/');
    $configuration->set ('modelsFolder', 'models/');
    $configuration->set ('viewsFolder', 'views/');
    $configuration->set ('defaultController', 'Index');
    //Configuración de base de datos
    $configuration->set ('databaseHost', 'localhost');
    $configuration->set ('databaseName', 'virtual_classroom');
    $configuration->set ('databaseUser', 'root');
    $configuration->set ('databasePassword', '');
    //Configuración de vistas
    $configuration->set ('baseUrl', '/');
    $configuration->set ('applicationName', 'Aula virtual');
    $configuration->set ('applicationCompany', '&copy; Equipo de trabajo (José David García, Argemiro Martinez Medrano)');
    $configuration->set ('applicationSlogan', 'Plataforma para gestión de cursos y matrículas');
?>
