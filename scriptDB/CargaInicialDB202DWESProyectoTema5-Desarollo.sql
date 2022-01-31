/*Usamos la base de datos DAW202DBDepartamentos*/

use DB202DWESProyectoTema5; 

/*insert datos en la tabla departamento*/

INSERT INTO T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) VALUES 
('FOL', 'departamento FOL', 1406149672, 102.4),
('DAW', 'departamento DAW', 1406149672, 1000.3),
('DIW', 'departamento DIW', 1406149672, 289.3);

/*insert datos en la tabla usuarios*/

INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario)  VALUES 
 ('albertoF',SHA2('albertoFpaso',256),'ALBERTOF'),
    ('outmane',SHA2('outmanepaso',256),'OUTMANE'),
    ('rodrigo',SHA2('rodrigopaso',256),'RODRIGO'),
    ('isabel',SHA2('isabelpaso',256),'ISABEL'),
    ('david',SHA2('davidpaso',256),'DAVID'),
    ('aroa',SHA2('aroapaso',256),'AROA'),
    ('johanna',SHA2('johannapaso',256),'JOHANNA'),
    ('oscar',SHA2('oscarpaso',256),'OSCAR'),
    ('sonia',SHA2('soniapaso',256),'SONIA'),
    ('heraclio',SHA2('heracliopaso',256),'HERACLIO'),
    ('amor',SHA2('amorpaso',256),'AMOR'),
    ('antonio',SHA2('antoniopaso',256),'ANTONIO'),
    ('albertoB',SHA2('albertoBpaso',256),'ALBERTOB');
