/* Borra la base de datos si existe */

drop database if exists BDbonsai;

/* Crea la base de datos */

create database BDbonsai;

/* Crea el usuario para acceder a la base de datos */

grant
select,
insert,
update,
delete
,
    create,
    drop on BDbonsai.* to 'UBDPlantas' @'localhost' identified by 'Lo-1234-lo';

/* Selecciona la base de datos */

use BDbonsai;

/* Crea las tablas */

create table
    Usuario (
        email varchar(40) primary key,
        contraseña varchar(20) not null,
        nombre varchar(80) not null,
        apellidos varchar(100) not null,
        fechanacimiento date not null,
        telefono int not null
    );
create table 
    cart(
        id int,
        client_email varchar(255),
        fechañadido date,
        cantidad int
    );

create table
    Productos (
        codProducto int primary key,
        nombreProducto varchar(20),
        descripcion varchar(50),
        cantidad int,
        img varchar(100),
        precio int
    );

create table
    Compras(
        email varchar(40) not null,
        codCompra varchar(30),
        codProducto int not null,
        fechaCompra DATE,
        cantidadProducto int,
        Precio int,
        FOREIGN KEY (email) REFERENCES Usuario(email),
        FOREIGN KEY (codProducto) REFERENCES Productos(codProducto)
    );

create table
    Informacion(
        nombre varchar(20) primary key,
        descripcion varchar(2000),
        cuidados varchar(200),
        img varchar(100)
    );

/* Realizamos la carga inicial de datos. */
insert into
   Usuario (
        email,
        contraseña,
        nombre,
        apellidos,
        fechanacimiento,
        telefono
    )
values (
        'admin@livingroots.es',
        'admin',
        'admin',
        'administrador',
        '06/10/2000',
        '671424198'
    );

insert into
    Productos (
        codProducto,
        nombreProducto,
        descripcion,
        cantidad,
        img,
        precio
    )
values (
        1,
        'Arce palmatum',
        'Un arbol japones con hojas rojas',
        50,
        'arcePrebonsai.jfif',
        30
    ), (
        2,
        'Pino thumbergi',
        'Pino japones',
        30,
        'thunbergiPrebonsai.jpg',
        40
    ), (
        3,
        'Ulmus parvifolia',
        'Olmo Japones',
        100,
        'ulmusPrebonsai.jpg',
        25
    );

insert into
    Informacion(nombre, descripcion, img)
values 
    (
        'Arce palmatum',
        'El arce japonés se trata de una planta de naturaleza muy delicada, que contrariamente a otros arces este es de porte arbustivo.
    Alcanzan una altura de 3 a 8 metros de porte globoso con numerosas ramas ligeramente caedizas que contienen hojas palmeadas, muy regulares, de 5, 7, 9 u 11 lóbulos enteros o finamente recortados.
    Posee numerosas variedades que varían del verde al amarillo dorado y al rojo púrpura. Su crecimiento es bastante lento, característica que hace que se emplee para el cultivo en bonsáis.
    Este arbusto muy empleado en jardinería es remarcable por su porte gracioso, por la forma de sus hojas y la riqueza de sus coloridos, sobre todo en primavera, y nuevamente en otoño, cuando todas sus hojas se vuelven de tonos rojos.
    Es sensible a cochinilla, a carencias de hierro en suelo calizo y a las quemaduras foliares por el sol o el viento',
    'arcePalmatum.jpg'
    ), 
    (
        'Pino thumbergi',
    'El pino japonés de Thunberg puede llegar a la altura de 40 m, 
        pero raramente alcanza este tamaño fuera de su zona de distribución natural. 
        Las acículas están en fascículos de dos con una vaina blanca en la base, 7-12 cm de largo; los conos femeninos tienen una longitud de 4-7 cm, 
        ecamosos, con pequeñas puntas en el extremo de las escamas, tardando dos años en madurar. Los conos masculinos tienen una longitud de 1-2 cm en 
        macizos de 12-20 en las puntas del crecimiento en primavera. La corteza es gris en los árboles jóvenes y pequeñas ramas, cambiando al negro y plateado 
        en ramas más grandes y el tronco; haciéndose bastante espesas en troncos de más edad.',
    'pinusThumbergi.jpg'
    ),
    (
        'Ulmus parvifolia',
    'Es un árbol que alcanza hasta 20 metros, caducifolio, con comportamiento de especie de hoja semiperenne, cultivándolo en clima mediterráneo y temperaturas templadas en invierno.
    El árbol joven presenta un tronco de color gris y corteza fina, formando escamas en su madurez. La madera es de color marrón claro, ocasionalmente con algún tono rojizo.
    Sus hojas son pequeñas, simples, alternas, ovaladas, dentadas y terminadas en punta. Nervadura muy señalada de color verde intenso, que cambia de color durante el otoño a tonos amarillos, naranja y rojizos.
    Al final del verano presenta flores muy pequeñas, hermafroditas, verdosas, blancuzcas o rojizas.
    Fruto sámara aplanado circular, de color verdizo al principio, que termina secándose al final del desarrollo, en el que adopta un tono amarillento. Entre los 15 o 25 años de edad aparecen los primeros frutos.4​',
    'ulmusParvifolia.jpg'
    );