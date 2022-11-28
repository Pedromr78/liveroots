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
        precio int,
        tipo varchar(15),
        descuento varchar(20)
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
        cuidados varchar(2000),
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
    Informacion(nombre, descripcion, cuidados, img)
values 
    (
        'Arce palmatum',
        'El arce japonés se trata de una planta de naturaleza muy delicada, que contrariamente a otros arces este es de porte arbustivo.
    Alcanzan una altura de 3 a 8 metros de porte globoso con numerosas ramas ligeramente caedizas que contienen hojas palmeadas, muy regulares, de 5, 7, 9 u 11 lóbulos enteros o finamente recortados.
    Posee numerosas variedades que varían del verde al amarillo dorado y al rojo púrpura. Su crecimiento es bastante lento, característica que hace que se emplee para el cultivo en bonsáis.
    Este arbusto muy empleado en jardinería es remarcable por su porte gracioso, por la forma de sus hojas y la riqueza de sus coloridos, sobre todo en primavera, y nuevamente en otoño, cuando todas sus hojas se vuelven de tonos rojos.
    Es sensible a cochinilla, a carencias de hierro en suelo calizo y a las quemaduras foliares por el sol o el viento',
    'El arce japonés palmeado no admite sol directo, ya que sus hojas no toleran el calor. Por esa razón y especialmente si vivimos en un clima cálido, lo ideal es que lo plantemos en un lugar en el que reciba luminosidad pero pueda estar
    fresco.El Acer Palmatum no tolera la sequía. Pero no es la única peculiaridad: también demanda ser regado con agua de lluvia o, en su defecto, agua ácida.El Arce Palmatum soporta heladas rigurosas de hasta menos 10 grados. Es más: 
    necesita ese frío para poder rebrotar en condiciones con la llegada de la primavera.',
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
    'El árbol no tolera la sombra ni la semisombra, ya que esto lo debilita. Necesita el frío y que las temperaturas bajen lo suficiente durante el invierno para
    poder hibernar. El paso de las bajas temperaturas permite que las yemas se abran al inicio de la primavera.El riego debe realizarse de forma esporádica, pero no 
    debe abandonarse, de lo contrario afectaría su crecimiento. Se debe regar cada vez que se seque la superficie de la tierra y el proceso es aplicar agua hasta que 
    se sature el sustrato y esta salga por los orificios del cuenco.El abonado es el proceso mediante el cual se enriquece el sustrato con nutrientes y vitaminas para 
    optimizar el crecimiento del bonsái. Es fundamental abonar la especie con abono orgánico, que sea de alta calidad, especialmente para un crecimiento vigoroso.El trasplante 
    del bonsái pino negro japonés se realiza cada 3 años hasta máximo 5 años. Esto se debe realizar antes de la primera brotación del año, que es cuando están hinchados los brotes. 
    El trasplante también puede llevarse a cabo durante otoño y durante el verano, y el indicador para hacerlo es cuando el movimiento de la savia se ha reducido.',
    'pinusThumbergi.jpg'
    ),
    (
        'Ulmus parvifolia',
    'Es un árbol que alcanza hasta 20 metros, caducifolio, con comportamiento de especie de hoja semiperenne, cultivándolo en clima mediterráneo y temperaturas templadas en invierno.
    El árbol joven presenta un tronco de color gris y corteza fina, formando escamas en su madurez. La madera es de color marrón claro, ocasionalmente con algún tono rojizo.
    Sus hojas son pequeñas, simples, alternas, ovaladas, dentadas y terminadas en punta. Nervadura muy señalada de color verde intenso, que cambia de color durante el otoño a tonos amarillos, naranja y rojizos.
    Al final del verano presenta flores muy pequeñas, hermafroditas, verdosas, blancuzcas o rojizas.
    Fruto sámara aplanado circular, de color verdizo al principio, que termina secándose al final del desarrollo, en el que adopta un tono amarillento. Entre los 15 o 25 años de edad aparecen los primeros frutos.4​',
    'El Olmo Chino debe ser regado generosamente tan pronto como el substrato se seca. Deben evitarse las sequías, así como un substrato permanentemente húmedo.Durante la estación de crecimiento debe abonarse bien al 
    Olmo Chino. No requiere ningún abono en particular. Una combinación de abono sólido orgánico y de un producto químico líquido bien equilibrado es un buen concepto.',
    'ulmusParvifolia.jpg'
    );
insert into
    Productos (
        codProducto,
        nombreProducto,
        descripcion,
        cantidad,
        img,
        precio,
        tipo,
        descuento
    )
values (
        1,
        'Arce palmatum',
        'Un arbol japones con hojas rojas',
        50,
        'arcePrebonsai.jfif',
        30,
        'prebonsai',
        '0'
    ), (
        2,
        'Pino thumbergi',
        'Pino japones',
        30,
        'thunbergiPrebonsai.jpg',
        40,
        'prebonsai',
        '0'
    ), (
        12,
        'Arce Palmatum',
        'Arce con hojas rojas',
        32,
        'arcePalmatum.jpg',
        5000,
        'bonsai',
        '0'
    ),(
        10,
        'Junipero Chinensis',
        'Junipero procedente de china',
        10,
        'juniperochinensisBonsai.jpg',
        3200,
        'bonsai',
        '20'
    ), (
        3,
        'Ulmus parvifolia',
        'Olmo Japones',
        100,
        'ulmusPrebonsai.jpg',
        25,
        'prebonsai',
        '0'
    ), (
        4,
        'Ficus Retusa',
        'Arbol tropical, familia de las higueras comunes',
        20,
        'ficusretusaPrebonsai.jpg',
        20,
        'prebonsai',
        '0'
    ), (
        13,
        'Ulmus Parvifolia',
        'Olmo Japones',
        20,
        'ulmusParvifolia.jpg',
        6000,
        'bonsai',
        '0'
    ),(
        5,
        'Sakura',
        'Cerezo Jampones',
        10,
        'sakuraPrebonsai.jpg',
        50,
        'prebonsai',
        '15'
    ),(
        6,
        'Granado Nejikan',
        'Granado Jampones',
        40,
        'nejikanPrebonsai.jpg',
        40,
        'prebonsai',
        '0'
    ),(
        9,
        'Pinus Pinea',
        'Pino Piñonero',
        20,
        'pinuspineaBonsai.jpeg',
        1100,
        'bonsai',
        '0'
    ),(
        7,
        'Pinus Pinea',
        'Pino piñonero',
        80,
        'pinuspineaPrebonsai.jpg',
        20,
        'prebonsai',
        '0'
    ),(
        8,
        'Juniperus Chinensis',
        'Junipero procedente de china',
        40,
        'juniperuschinensisPrebonsai.jpg',
        35,
        'prebonsai',
        '0'
    ),(
        11,
        'Arce Palmatum',
        'Planton de arce palmatum',
        200,
        'arcepalmatumPlanton.jpg',
        10,
        'planton',
        '0'
    ),(
        14,
        'Tijeras',
        'Tijeras para cortar ramas',
        150,
        'tijeras.jpg',
        12,
        'tijeras',
        '0'
    ),(
        15,
        'Rastrillos',
        'Rastrillo para bonsais',
        10,
        'rastrillo.jpg',
        5,
        'rastrillos',
        '0'
    ),(
        16,
        'Podadoras',
        'Podadora para bonsais',
        100,
        'podadora.jpg',
        50,
        'podadora',
        '0'
    ),(
        17,
        'Maceta alta',
        'Maceta para bonsais en cascada',
        10,
        'macetacascada.jpg',
        100,
        'macetacascada',
        '0'
    ),(
        18,
        'Sustrato Kiryu',
        'Sustrato con mucho hierro Japones',
        500,
        'kiryuzuna.jpg',
        35,
        'sustrato',
        '0'
    ),(
        19,
        'Hiryo Gold',
        'Abono especial para bonsais',
        500,
        'hiryogold.jpg',
        40,
        'abono',
        '0'
    ),(
        20,
        'Maceta Obalada',
        'Maceta redonda',
        100,
        'macetaobalada.jpg',
        200,
        'macetaobalada',
        '0'
    ),(
        21,
        'Maceta Rectangular',
        'Maceta cuadrada',
        100,
        'macetarectangular.jpg',
        200,
        'macetacuadrada',
        '0'
    ),(
        22,
        'Sustrato Akadama',
        'Sustrato con una buna retencion de agua',
        100,
        'akadama.jpg',
        40,
        'sustrato',
        '0'
    );


