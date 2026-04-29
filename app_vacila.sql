-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-04-2026 a las 02:41:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion_corta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `clima_promedio` varchar(20) DEFAULT NULL,
  `link_ubicacion` varchar(2083) DEFAULT NULL,
  `precio_sugerido_usd` decimal(10,2) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(30) NOT NULL,
  `departamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `nombre`, `descripcion`, `clima_promedio`, `link_ubicacion`, `precio_sugerido_usd`, `imagen_url`, `categoria`, `departamento`) VALUES
(34, 'Volcán de Santa Ana', 'Caminata hacia el cráter con una laguna de azufre color turquesa impresionante.', 'Frío', 'https://goo.gl/maps/SantaAnaVolcano', 6.00, 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Ilamatepec2.jpg', 'Naturaleza', 'Santa Ana'),
(35, 'Lago de Coatepeque', 'Antiguo cráter volcánico considerado una de las maravillas del mundo.', 'Templado', 'https://goo.gl/maps/CoatepequeLake', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Coatepeque_Lake.jpg', 'Laguna', 'Santa Ana'),
(36, 'Joyas de Cerén', 'La \"Pompeya de América\", aldea maya preservada por ceniza volcánica.', 'Cálido', 'https://goo.gl/maps/JoyaDeCeren', 1.00, 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Joya_de_Cer%C3%A9n.jpg', 'Cultura', 'La Libertad'),
(37, 'El Pital', 'El punto más alto de El Salvador, ideal para acampar entre pinos y neblina.', 'Frío', 'https://goo.gl/maps/ElPital', 3.00, 'https://upload.wikimedia.org/wikipedia/commons/d/de/Cerro_el_Pital.jpg', 'Naturaleza', 'Chalatenango'),
(38, 'Ruta de las Flores', 'Recorrido por pueblos coloniales como Ataco y Juayúa con mucha cultura.', 'Templado', 'https://goo.gl/maps/RutaFlores', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/2/23/Concepcion_de_Ataco.jpg', 'Cultura', 'Ahuachapán'),
(39, 'Playa El Tunco', 'Referencia mundial del surf con una vibrante vida nocturna y rocas icónicas.', 'Cálido', 'https://goo.gl/maps/ElTunco', 0.00, 'https://images.unsplash.com/photo-1590523741491-345ad1f613a1', 'Playa', 'La Libertad'),
(40, 'Catedral de Santa Ana', 'Joya arquitectónica de estilo neogótico en el corazón del occidente.', 'Templado', 'https://goo.gl/maps/CatedralSA', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/b/b5/Santa_Ana_Cathedral_El_Salvador.jpg', 'Cultura', 'Santa Ana'),
(41, 'Tazumal', 'La estructura arqueológica más grande y mejor conservada de El Salvador.', 'Cálido', 'https://goo.gl/maps/Tazumal', 1.00, 'https://upload.wikimedia.org/wikipedia/commons/5/52/El_Tazumal.jpg', 'Cultura', 'Santa Ana'),
(42, 'Playa Mizata', 'Playa tranquila y exclusiva, perfecta para desconectarse y surfear.', 'Cálido', 'https://goo.gl/maps/Mizata', 0.00, 'https://images.unsplash.com/photo-1544148103-0773bf10d330', 'Playa', 'La Libertad'),
(43, 'Parque El Boquerón', 'Miradores situados en el cráter del volcán de San Salvador.', 'Fresco', 'https://goo.gl/maps/Boqueron', 2.00, 'https://upload.wikimedia.org/wikipedia/commons/f/f3/El_Boqueron_San_Salvador.jpg', 'Naturaleza', 'San Salvador'),
(44, 'Suchitoto', 'Pueblo colonial con calles empedradas y vistas hermosas al Lago Suchitlán.', 'Cálido', 'https://goo.gl/maps/Suchitoto', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/a/ae/Suchitoto_streets.jpg', 'Cultura', 'Cuscatlán'),
(45, 'Laguna de Alegría', 'Cráter azufrado rodeado de cafetales y leyendas locales.', 'Frío', 'https://goo.gl/maps/Alegria', 1.00, 'https://upload.wikimedia.org/wikipedia/commons/7/7a/Laguna_de_Alegria.jpg', 'Naturaleza', 'Usulután'),
(46, 'Playa El Cuco', 'Extensa playa de arena negra, la favorita para vacacionar en el oriente.', 'Cálido', 'https://goo.gl/maps/ElCuco', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/7/79/El_Cuco_Beach.jpg', 'Playa', 'San Miguel'),
(47, 'Puerta del Diablo', 'Formaciones rocosas con una de las mejores vistas panorámicas del país.', 'Fresco', 'https://goo.gl/maps/PuertaDiablo', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/4/4b/Puerta_del_diablo.jpg', 'Mirador', 'San Salvador'),
(48, 'Cascada Los Tercios', 'Curiosa formación de columnas hexagonales de piedra con una caída de agua.', 'Cálido', 'https://goo.gl/maps/LosTercios', 1.00, 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Los_Tercios_Waterfall.jpg', 'Naturaleza', 'Cuscatlán'),
(49, 'Puerto de La Libertad', 'Complejo turístico con muelle, mercado de mariscos y Sunset Park.', 'Cálido', 'https://goo.gl/maps/PuertoLibertad', 0.00, 'https://images.unsplash.com/photo-1580133312320-2117d4f5cc1b', 'Cultura', 'La Libertad'),
(50, 'Volcán de Izalco', 'Conocido como el \"Faro del Pacífico\" por sus antiguas erupciones.', 'Templado', 'https://goo.gl/maps/Izalco', 3.00, 'https://upload.wikimedia.org/wikipedia/commons/c/c5/Izalco_Volcano.jpg', 'Naturaleza', 'Sonsonate'),
(51, 'Banos de Pachimalco', 'Cuna de la cultura Nonualca, famoso por su iglesia y tradiciones.', 'Templado', 'https://goo.gl/maps/Panchimalco', 0.00, 'https://upload.wikimedia.org/wikipedia/commons/1/14/Panchimalco_Church.jpg', 'Cultura', 'San Salvador'),
(52, 'Playa Costa del Sol', 'La zona hotelera más grande del país con esteros y mar abierto.', 'Cálido', 'https://goo.gl/maps/CostaDelSol', 0.00, 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e', 'Playa', 'La Paz'),
(53, 'Golfo de Fonseca', 'Conjunto de islas con paisajes volcánicos compartidos con Honduras y Nicaragua.', 'Tropical', 'https://goo.gl/maps/GolfoFonseca', 5.00, 'https://upload.wikimedia.org/wikipedia/commons/0/07/Golfo_de_Fonseca.jpg', 'Naturaleza', 'La Unión'),
(54, 'Turicentro el capulin', 'Balneario de agua natural perfecto para ir con amigos y familiares', 'fresco', 'https://share.google/Nwp3oCxDeG2e1oatt', 2.00, 'https://tvm.com.sv/wp-content/uploads/2021/08/20210805_152447-2-scaled.jpg', 'Balneario', 'San Miguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('turista','guia','administrador') DEFAULT 'turista'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `user`, `password`, `rol`) VALUES
(1, 'admin', 'admin', 'admin', 'administrador'),
(3, 'fredy gutierrez', 'fredy', '123', 'turista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
