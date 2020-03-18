-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-12-2019 a las 05:53:24
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `speedbikes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicletas`
--

CREATE TABLE `bicicletas` (
  `id_bicicleta` bigint(20) UNSIGNED NOT NULL,
  `nombre_bicicleta` varchar(60) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `gama` varchar(60) NOT NULL,
  `edad` varchar(10) NOT NULL,
  `id_cuadro` bigint(20) UNSIGNED NOT NULL,
  `id_estilo` bigint(20) UNSIGNED NOT NULL,
  `id_detalle` bigint(20) UNSIGNED NOT NULL,
  `id_marca` bigint(20) UNSIGNED NOT NULL,
  `id_rodado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bicicletas`
--

INSERT INTO `bicicletas` (`id_bicicleta`, `nombre_bicicleta`, `fecha_fabricacion`, `precio`, `stock`, `gama`, `edad`, `id_cuadro`, `id_estilo`, `id_detalle`, `id_marca`, `id_rodado`) VALUES
(1, 'Bicicleta Paseo Teknial Vintage', '2018-06-04', '26164.00', 20, 'Alta', 'Adulto', 1, 1, 1, 1, 26),
(2, 'Bicicleta Teknial Tarpan 100ER 29\"', '2019-04-15', '20363.00', 20, 'Media', 'Adulto', 2, 2, 2, 1, 29),
(3, 'Bicicleta Teknial Pixel Freestyle 20', '2017-08-14', '15433.00', 5, 'Baja', 'Adulto', 3, 6, 3, 1, 20),
(4, 'Bicicleta Cube Attain SL (2018)', '2018-07-12', '98516.00', 3, 'Alta', 'Adulto', 4, 3, 4, 3, 29),
(5, 'Bicicleta Cube Attention 29 (2018)', '2018-11-01', '81259.00', 20, 'Alta', 'Adulto', 5, 2, 5, 3, 29),
(6, 'Bicicleta Olmo Reaktor Aluminio R16', '2017-11-14', '12267.00', 30, 'Baja', 'Ninio', 6, 5, 6, 6, 16),
(7, 'Bicicleta Olmo Safari 200 R20', '2019-07-22', '15367.00', 1, 'Media', 'Ninio', 7, 5, 7, 6, 20),
(8, 'Bicicleta Trinx Dolphin 2.0 Plegable', '2018-11-21', '28934.00', 2, 'Media', 'Adulto', 8, 7, 8, 12, 20),
(9, 'Bicicleta Cannondale Slice Carbon (2017)', '2017-11-21', '290781.00', 1, 'Alta', 'Adulto', 9, 4, 9, 5, 28),
(10, 'Bicicleta Haro Midway', '2019-05-13', '40939.00', 2, 'Alta', 'Adulto', 10, 6, 10, 10, 20),
(11, 'Bicicleta Scott Voltage YZ 10 Hidraulico', '2018-02-15', '56989.00', 5, 'Alta', 'Adulto', 11, 6, 11, 4, 20),
(12, 'Bicicleta Nitro Abril Paseo R26', '2019-10-23', '10082.00', 15, 'Baja', 'Adulto', 5, 1, 12, 1, 26),
(13, 'Bicicleta Olmo Amelie Plume Rapide', '2019-05-20', '26817.00', 5, 'Media', 'Adulto', 5, 1, 13, 6, 26),
(14, 'Bicicleta Scott Addict RC 20 Carbono (2018)', '2018-06-03', '225795.00', 2, 'Alta', 'Adulto', 12, 3, 14, 4, 27),
(15, 'Bicicleta SBK Fat Hunter R24', '2019-06-10', '22919.00', 25, 'Media', 'Ninio', 3, 5, 15, 8, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `psw` varchar(200) NOT NULL,
  `perfil` varchar(1) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `desc_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `psw`, `perfil`, `nombre`, `apellido`, `telefono`, `mail`, `desc_usuario`) VALUES
(1, 'e686859d8a43300614ee7767fc287d6d227cb16cd1204f11150f8207302edeb7e15883561621a13a9c54e63a913528a8ec759eb00fb8cfd445e8cbc66b32edf4', 'A', 'Pablo', 'González', 154370855, 'pm.gonzaalez@gmail.com', 'Administrador'),
(2, 'e686859d8a43300614ee7767fc287d6d227cb16cd1204f11150f8207302edeb7e15883561621a13a9c54e63a913528a8ec759eb00fb8cfd445e8cbc66b32edf4', 'A', 'Emanuel', 'Corradi', 154366789, 'e.corradi@gmail.com', 'Administrador'),
(3, '3bd0ec7e54237c798afb6ede6ebc0feaadce5ab191d7d2f6310ad92072f332251aa7e66af79ee9e8f77e62ef2df0dde0e8872ca92e2d4a57adc334c6f8f830b9', 'E', 'Juan', 'Peréz', 0, 'jperez@hotmail.com', 'Encargado'),
(4, '0bf436282e36db0f39a0e5da9a7e3fcbbe044f036d034192dba2168a762f64f424889c17c0b3037a997bd8e6b1ddf0710ec7cdce9c678c7572568057aa9f2c6b', 'E', 'Carlos', 'Fernandez', 2147483647, 'f.carlos@gmail.com', 'Encargado'),
(6, 'e686859d8a43300614ee7767fc287d6d227cb16cd1204f11150f8207302edeb7e15883561621a13a9c54e63a913528a8ec759eb00fb8cfd445e8cbc66b32edf4', 'C', 'Vicente', 'Juarez', 15677341, 'vicente.juarez@hotmail.com', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compran`
--

CREATE TABLE `compran` (
  `id_compra` bigint(20) UNSIGNED NOT NULL,
  `fechacompra` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compran`
--

INSERT INTO `compran` (`id_compra`, `fechacompra`, `total`, `id_cliente`) VALUES
(1, '2019-11-10', '1.00', 1),
(2, '2019-11-10', '1.00', 2),
(3, '2019-11-05', '2.00', 2),
(4, '2019-10-18', '1.00', 4),
(5, '2019-11-06', '2.00', 6),
(6, '2019-10-14', '3.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadros`
--

CREATE TABLE `cuadros` (
  `id_cuadro` bigint(20) UNSIGNED NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `material` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuadros`
--

INSERT INTO `cuadros` (`id_cuadro`, `modelo`, `material`) VALUES
(1, 'TIG WELDED', 'ALUMINIO 6061'),
(2, 'MTB', 'ALUMINIO 6061'),
(3, 'BMX', 'ALUMINIO'),
(4, 'T6 Superlight', 'ALUMINIO 6061'),
(5, 'AMF', 'ALUMINIO'),
(6, 'MAZAS', 'ALUMINIO ACERO 20 H'),
(7, 'MAZAS', 'ALUMINIO ACERO 36 H'),
(8, '', 'ALUMINIO PLEGABLE'),
(9, 'Slice, BallisTec Carbon, AERO SAVE, Di2 ready, PF30A', 'Carbono'),
(10, '', 'Cromo'),
(11, 'Scott Voltage C-frame', 'ALUMINIO 6061'),
(12, 'Addict HMF / IMP', 'Carbono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `imagen`, `descripcion`) VALUES
(1, 'Bicicletas\\teknial_vintage.jpg', 'Combina estilo con seguridad de conducción. La Teknial Vintage está equipada con cubiertas de banda reflectiva, frenos roller que no requieren mantenimiento y cambios sencillos de usar para moverte cómodamente por la ciudad.\r\n\r\nCUADRO – ALUMINIO 6061. TIG WELDED\r\nHORQUILLA – ALUMINIO. TIG WELDED\r\nFRENOS – SHIMANO NEXUS ROLLER DELANTERO Y TRASERO\r\nLLANTA – 700CX14GX36H. ALUMINIO DOBLE PARED\r\nCUBIERTA – 700X35C. CON BANDA REFLECTIVA\r\nPIÑÓN – SHIMANO NEXUS 3 VELOCIDADES INTERNO\r\nLUCES LED DELANTERA Y TRASERA\r\n\r\n'),
(2, 'Bicicletas\\teknial-tarpan-100er-negro-azul-bicicleta.jpg', 'Caracteristicas\r\n\r\n    CUADRO – 29″ ALUMINIO 6061 MTB\r\n    HORQUILLA – TEKNIAL MD-711X-D-29\r\n    SHIFTER – SHIMANO ST – EF51 21S\r\n    DESCARRILADOR – SHIMANO TOURNEY\r\n    CAMBIO – SHIMANO TOURNEY\r\n    CADENA – KMC Z73\r\n    MAZA DELANTERA – ACERO 32H\r\n    MAZA TRASERA – ACERO 32H\r\n    LLANTA – ALUMINIO DOBLE PARED 32H\r\n    CUBIERTA – 29**2.125\r\n    STEAM – TEKNIAL MD-HS078 ALUMINIO\r\n    MANUBRIO – TEKNIAL MD-HB023 ACERO 680MM\r\n    FRENOS – DISCO MECÁNICO\r\n    ASIENTO – TEKNIAL\r\n    CAÑO DE ASIENTO – ACERO 27.2’300MM\r\n\r\n'),
(3, 'Bicicletas\\bicicleta-teknial-pixel.jpg', 'El sueño de todo chico vuelto realidad: tener la libertad de ir a donde quiera arriba de una bici. Dejalo afrontar sus propias aventuras con una bici resistente, sencilla de manejar y apropiada en tamaño y proporción.\r\n\r\nCUADRO – 20″ ALUMINIO BMX\r\nPLATO -40T\r\nPIÑÓN -16T\r\nCADENA – KMC C410\r\nPEDALES – NECO WP-401\r\nLLANTA – ALUMINIO 48H\r\nCUBIERTA – 20*2.125\r\nSTEAM – ALUMINIO/ACERO\r\nFRENOS – V-BRAKE\r\nASIENTO – TEKNIAL\r\nCAÑO DE ASIENTO – 25.4*250MM\r\n'),
(4, 'Bicicletas\\bicicleta-cube-attain-sl-(2018).jpg', 'La Attain SL es la más ligera de la serie Attain, y probablemente también el modelo más versátil. Con auténtica tecnología de bicicleta de competición, es la opción ideal para rutas en las que buscas velocidad, para largas sesiones de entrenamiento... y para carreras, por supuesto. Con una conducción cómoda y dinámica y un peso sorprendentemente bajo, puedes imaginarte jugando con sus marchas y dirigiéndote hasta la cabeza del pelotón. ¿A que resulta inspirador? El grupo Shimano 105 y los frenos de llanta se combinan con la extraordinaria ergonomía del cuadro para ponerte al mando con un control absoluto en cada ascensión, cada descenso y cada curva.\r\n\r\nCuadro Aluminium 6061 T6 Superlight, Road Comfort Geometry\r\nSize 50, 53, 56, 58, 60, 62\r\nHorquilla CUBE CSL Race, One Piece 3D-Forged Steerer/Crown, Carbon Blades, 1 1/8\" - 1 1/4\" Tapered\r\nDireccion FSA Z-t, Top Zero-Stack 1 1/8\" (OD 44mm), Bottom Integrated 1 1/4\"\r\nStem CUBE Performance Stem Pro, 31.8mm\r\nForma CUBE Compact Race Bar\r\nCinta de manubrio CUBE Grip Control\r\nDesviador trasero Shimano 105 RD-5800GS, 11-Speed\r\nDesviador delantero Shimano 105 FD-5801, 31.8mm Clamp\r\nManijas Shimano 105 ST-5800\r\nFreno Shimano 105 BR-5800\r\nPlato Shimano FC-RS510, 50x34T\r\nCassette de piñones Shimano 105 CS-5800, 11-32T\r\nCadena Shimano CN-HG600-11\r\nRueda CUBE RA 0.8 Aero Disc\r\nCubierta Conti Ultra Sport 2, 28-622\r\nAsiento CUBE RP 1.0\r\nPortasilla CUBE Performance Post, 27.2mm\r\nPeso (KG) 9,4 kg'),
(5, 'Bicicletas\\bicicleta-cube-attention.jpg2.jpg', 'Cuadro Aluminium Lite, AMF, Internal Cable Routing, Easy Mount Kickstand Ready, Tapered Headtube\r\nHorquilla Rock Shox XC 30 TK Coil, 100mm, Remote Lockout\r\nDireccion FSA Orbit 1.5E ZS, Top Zero-Stack 1 1/8\" (OD 44mm), Bottom Zero-Stack 1 1/2\" (OD 56mm)\r\nStem CUBE Performance Stem Pro, 31.8mm\r\nForma CUBE Rise Trail Bar, 680mm\r\nGrips CUBE Performance Grip\r\nCambio Shimano XT RD-M781-DSGSL, Shadow, Direct Mount, 10-Speed\r\nDescarrilador Shimano Deore FD-M611 Downswing, 31,8mm\r\nShifter Shimano Deore SL-M610, Rapidfire-Plus\r\nFrenos Shimano BR-M315, Hydr. Disc Brake (160/160)\r\nPlato palanca Shimano FC-MT500, 40x30x22T, 175mm\r\nCassette Shimano CS-HG50, 11-36T\r\nCadena Shimano CN-HG54\r\nLlantas CUBE ZX20, 32H, Disc\r\nMaza delantera Shimano HB-M3050\r\nMaza trasera Shimano FH-M3050\r\nCubiertas Schwalbe Smart Sam, Active, 2.25\r\nPedales CUBE Aluminium MTB\r\nAsiento CUBE Acitve 1.1\r\nPortasilla CUBE Performance Post, 27.2mm\r\nCierre de asiento CUBE Varioclose, 31.8mm\r\nPeso 13.8 kg'),
(6, 'Bicicletas\\bicicleta-olmo-reaktor-aluminio-r162.jpg', 'CUADRO Aluminio MAZAS Acero 20 H\r\nHORQUILLA Suspensión\r\nLLANTAS Aluminio negras\r\nDIRECCION Neco 22,2\r\nFRENOS V-Brake resina Logan\r\nLEVA FRENO Resina niños Logan\r\nFORMA Niños doble altura\r\nSTEM Cross\r\nCADENA KMC 410\r\nCAÑO PS Aluminio\r\nPLATO 36 D con cubre\r\nASIENTO Paseo niño\r\nCAJA Playera Neco\r\nPUÑO Niños\r\nPIÑÓN 1 vel 18 d\r\nPEDAL Resina niños'),
(7, 'Bicicletas\\bicicleta-olmo-safari-200-r202.jpg', 'CUADRO Aluminio Olmo Safari 20\" MAZAS Acero 36 H\r\nHORQUILLA Zoom 375 LLANTAS Aluminio 36 H\r\nDIRRECCION A-Head Neco\r\nFRENOS V-Brake alu Logan\r\nCAMBIO Shimano TX-55\r\nLEVA FRENO Alu Logan\r\nFORMA Tipo descenso corta\r\nMANIJAS Shimano TX-50\r\nSTEM A-Head 80 mm\r\nCADENA KMC Z33 CAÑO PS ALU negro\r\nPLATO 40 dientes con cubre ASIENTO Olmo MTB niños\r\nCAJA Playera Neco\r\nPUÑO MTB negro\r\nPIÑÓN 6 vel Shimano TZ-20\r\nPEDAL Re'),
(8, 'Bicicletas\\bicicleta-trinx-dolphin-2-0-plegable9.jpg', 'La Dolphin 2.0 es una plegable muy fiable con 7 velocidades suficientes para tu recorrido diario dentro de la ciudad. Su rodado 20\" es la medida ideal para este tipo de bicicletas pensadas para combinar transportes o guardarlas en pequeños espacios.\r\n\r\nCuadro: Aluminio, 20\"x305mm plegable\r\nHorquilla: Hi-Ten Steel\r\nShifter: Shimano SL-RS35\r\nDesviador trasero: Shimano Tourney\r\nCassette : 14-28T, de 7.\r\nCadena: KMC 7v\r\nFrenos: De disco mecánicos\r\nLlantas: 20\" en aluminio doble pared.\r\nCubierta: Kenda 20\"x 1 1/8\r\nPlato/palanca: TRINX 52t Largo de biela 170\r\nMazas: Aluminio con rodamientos sellados.\r\nAsiento: TRINX Sport\r\nCaño de asiento: TRINX en aluminio \r\nAvance: TRINX en aluminio.\r\nManubrio: TRINX plano en aluminio.'),
(9, 'Bicicletas\\slice.jpg', 'Bicicleta ideal para triatlón. La CANNONDALE SLICE CARBON 105 esta pensada para atletas serios, que necesitan la mezcla perfecta de comodidad y rendimiento, tanto para sus entrenamientos como para las competencias mas exigentes.\r\n\r\nCuadro Slice, BallisTec Carbon, AERO SAVE, Di2 ready, PF30A\r\nMaterial CARBONO\r\nHorquilla Slice, BallisTec Carbon, 1-1/8\r\nCambio Shimano 105\r\nCambiador Shimano 105\r\nShifters MicroShift bar-end Carbon\r\nPlato y palanca: Cannondale Si, BB30a, FSA rings, 52/36\r\nFrenos Shimano 105, Direct Mount\r\nMazas Vision Team 30 Comp\r\nLlantas Vision Team 30 Comp'),
(10, 'Bicicletas\\bicicleta-haro-midway.jpg', 'Cuadro 3 tube crmo frame (top tube, down tube & seat tube) with removable brake hardware, mid BB shell, integrated head tube and welded seat clamp\r\nHorquilla Internal threaded crmo steer tube fork w/ hi-ten tapered legs\r\nPalancas Haro 1978 3-pc crmo 8 spline 175mm\r\nPedales Haro 1978 plastic 9/16\"\r\nCubiertas Haro La Mesa 20x2.40 F/R\r\nMazas 3/8\" F, 14mm R straight axles, 36h alloy shell sealed cassette w/ 9t sealed driver\r\nRayos Haro Sata 36h alloy single wall\r\nFrenos Haro 1978 alloy 990\r\nManijas de freno Brake Lever Tektro alloy\r\nGrips Haro Team\r\nManubrio Hi-ten 8.75\" rise (20.5\" frame) or 9\" rise (21\" frame)\r\nAsiento Haro padded Tri-pod'),
(11, 'Bicicletas\\bicicleta-scott-voltage-yz20-hidraulico.jpg', 'Cuadro Scott Voltage C-frame, Aluminio 6061 hidroformado\r\nHorquilla Suntour XCM con bloqueo\r\nCambios: 27 Velocidades Shimano Acera\r\nFrenos: Freno a disco Shimano BR-M315 hidraulico, Rotor Shimano SM-RT53 160mm\r\nCubiertas Michelin Country 26x2.00 alambre\r\nLlantas MTI doble pared\r\nRayos acero inoxidable\r\nProtectores de llanta MTI\r\nManubrio doble altura MTI 31.8\r\nStem MTI Dirt aluminio 31.8\r\nCaño portasilla MTI aluminio\r\nCierre de asiento aluminio \r\nAsiento MTI Trax'),
(12, 'Bicicletas\\bicicleta-nitro-abril-paseo-r26-celeste.jpg', 'Cuadro de paseo Rodado 26\" Dama\r\nPortaequipaje soldado al cuadro, apto para sillas de bebe\r\nCubrecadena y guardabarros al tono\r\nCámaras valvula de auto vulcanizadas\r\nLlantas de aluminio\r\nFrenos V-Brake de aluminio\r\nCubiertas con banda blanca\r\nAsiento con resorte muy cómodo\r\nCanasto\r\nPie de apoyo'),
(13, 'Bicicletas\\bicicleta-olmo-amelie-plume-rapide.jpg', 'Rodado: 26\"\r\nMaterial del cuadro: Aluminio\r\nVelocidades: 6\r\nCambio: Shimano TZ-50\r\nFrenos: V-Brake Logan Aluminio pulido\r\nPlato y palanca: 3 piezas\r\nCanasto de rattan ecológico\r\nAsiento y puños de ecocuero Velo\r\nGuardabarros\r\nCubrecadena\r\nCadena KMC dorada\r\nPortaequipaje\r\nStem City aluminio'),
(14, 'Bicicletas\\scott-addict-rc-20.jpg', 'Cuadro Addict HMF / IMP Carbon technology\r\nHorquilla Addict HMF 1 1/8\" - 1 1/4\" Carbon steerer\r\nDireccion Syncros Integrated\r\nCambio Shimano Ultegra RD-R8000-SS 22 Speed\r\nDescarrilador Shimano Ultegra FD-R8000\r\nShifters Shimano Ultegra ST-R8000 Carbon\r\nManijas de cambio 22 Speed\r\nFrenos Shimano Ultegra BR-R8000 Super SLR Dual pivot\r\nPlato palanca Shimano Ultegra FC-R8000 Hollowtech II 52x36 T\r\nCaja Shimano SM-BB72-41B\r\nForma Syncros Creston 2.0 Compact Aluminio 31.8mm\r\nStem Syncros RR2.0 1 1/8\" / four Bolt 31.8mm\r\nPortasilla Syncros Carbon FL1.0 27.2/350mm\r\nAsiento Syncros RR2.0\r\nLlantas Syncros RP2.0 18 Front / 24 Rear\r\nCadena Shimano CN-HG601-11\r\nCassette Shimano CS-5800 11-28\r\nCubiertas Continental Grand Sport Race Fold 700x25C\r\nPeso aproximado KG 7.35'),
(15, 'Bicicletas\\bicicleta-sbk-fat-hunter-r24.jpg', 'Cuadro de aluminio\r\nHorquilla rigida\r\nFrenos a disco mecanico aluminio\r\nManubrio recto de acero\r\nStem aluminio\r\nAsiento vinilo negro\r\nPortasilla de acero\r\nPlatopalanca 3/32\"X32TX152MM\r\nCadena KMC6\r\nLlantas de aluminio simple pared\r\nCubiertas Wanda King 24x4.00\r\nCámaras valvula de auto\r\nCambio Shimano RD-TZ50 GSD Tourney\r\nShifters Shimano 7v SL TX30\r\nPiñon 14-28T\r\nPedales con reflectores\r\nCubrecadenas de acero y guardabarros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `unidades` int(20) NOT NULL,
  `precio_total` decimal(8,2) NOT NULL,
  `id_compra` bigint(20) UNSIGNED NOT NULL,
  `id_bicicleta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `id_estilo` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`id_estilo`, `tipo`) VALUES
(1, 'Paseo'),
(2, 'Mountain Bike'),
(3, 'Ruta'),
(4, 'Triatlon'),
(5, 'Niños'),
(6, 'BMX'),
(7, 'Plegable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` bigint(20) UNSIGNED NOT NULL,
  `nombre_marca` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Teknial'),
(2, 'Giant'),
(3, 'Cube'),
(4, 'Scott'),
(5, 'Cannondale'),
(6, 'Olmo'),
(7, 'Mongoose'),
(8, 'SBK'),
(9, 'Fire Bird'),
(10, 'Haro'),
(11, 'Orbea'),
(12, 'Trinx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rodados`
--

CREATE TABLE `rodados` (
  `medida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rodados`
--

INSERT INTO `rodados` (`medida`) VALUES
(12),
(16),
(20),
(24),
(26),
(27),
(28),
(29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bicicletas`
--
ALTER TABLE `bicicletas`
  ADD PRIMARY KEY (`id_bicicleta`),
  ADD KEY `idx_cuadro` (`id_cuadro`) USING BTREE,
  ADD KEY `idx_estilo` (`id_estilo`) USING BTREE,
  ADD KEY `idx_detalle` (`id_detalle`),
  ADD KEY `idx_marca` (`id_marca`),
  ADD KEY `idx_rodado` (`id_rodado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compran`
--
ALTER TABLE `compran`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `idx_cliente` (`id_cliente`),
  ADD KEY `idx_compran` (`id_compra`);

--
-- Indices de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  ADD PRIMARY KEY (`id_cuadro`),
  ADD UNIQUE KEY `id_cuadro` (`id_cuadro`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD UNIQUE KEY `id_detalle` (`id_detalle`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD UNIQUE KEY `id_compra` (`id_compra`,`id_bicicleta`) USING BTREE,
  ADD KEY `idx_bicicleta` (`id_bicicleta`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`id_estilo`) USING BTREE,
  ADD KEY `idx_estilo` (`id_estilo`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `rodados`
--
ALTER TABLE `rodados`
  ADD PRIMARY KEY (`medida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bicicletas`
--
ALTER TABLE `bicicletas`
  MODIFY `id_bicicleta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `compran`
--
ALTER TABLE `compran`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  MODIFY `id_cuadro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `id_estilo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bicicletas`
--
ALTER TABLE `bicicletas`
  ADD CONSTRAINT `fk_cuadro` FOREIGN KEY (`id_cuadro`) REFERENCES `cuadros` (`id_cuadro`),
  ADD CONSTRAINT `fk_detalle` FOREIGN KEY (`id_detalle`) REFERENCES `detalle` (`id_detalle`),
  ADD CONSTRAINT `fk_estilo` FOREIGN KEY (`id_estilo`) REFERENCES `estilos` (`id_estilo`),
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `fk_rodado` FOREIGN KEY (`id_rodado`) REFERENCES `rodados` (`medida`);

--
-- Filtros para la tabla `compran`
--
ALTER TABLE `compran`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_bicicleta` FOREIGN KEY (`id_bicicleta`) REFERENCES `bicicletas` (`id_bicicleta`),
  ADD CONSTRAINT `fk_compran` FOREIGN KEY (`id_compra`) REFERENCES `compran` (`id_compra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
