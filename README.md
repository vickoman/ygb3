ygb3
====
YOGOBIERNO 3.0

La protada es el home.php lo que se muestra al iniciar login

CREATE TABLE IF NOT EXISTS Docentes(
    CodigoDocente int(11)  NOT NULL AUTO_INCREMENT,
    NombreDocnte varchar(100) NULL,
    ApellidoDocente varchar(100) NULL,
    CedulaDocente varchar(10) NULL,
    EmailDocente varchar(100) NULL,
    DireccionDocente varchar(100) NULL,
    fono1docente varchar(10) NULL,
    fono2docente varchar(10) NULL,
    celulardocente varchar(10) NULL,
    PRIMARY KEY (`CodigoDocente`)
) 

