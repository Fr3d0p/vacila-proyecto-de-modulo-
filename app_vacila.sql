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
(34, 'Volcán de Santa Ana', 'Caminata hacia el cráter con una laguna de azufre color turquesa impresionante.', 'Frío', 'https://share.google/d6ufHNedZV4429ZyJ', 6.00, 'https://www.civitatis.com/f/el-salvador/san-salvador/trekking-volcan-santa-ana-589x392.jpg', 'Naturaleza', 'Santa Ana'),
(35, 'Lago de Coatepeque', 'Antiguo cráter volcánico considerado una de las maravillas del mundo.', 'Templado', 'https://maps.app.goo.gl/E3d42LQeFhUKCzzJA', 0.00, 'https://olaspermanentes.surf/wp-content/uploads/2023/08/Lago-de-Coatepeque-1.jpg', 'Laguna', 'Santa Ana'),
(36, 'Joyas de Cerén', 'La \"Pompeya de América\", aldea maya preservada por ceniza volcánica.', 'Cálido', 'https://maps.app.goo.gl/yCs8N4KEV27nup6A9', 1.00, 'https://gomundomaya.com/wp-content/uploads/2023/04/joyadeceren-El-Salvador.jpeg', 'Cultura', 'La Libertad'),
(37, 'El Pital', 'El punto más alto de El Salvador, ideal para acampar entre pinos y neblina.', 'Frío', 'https://maps.app.goo.gl/TTwp8KCfwGWD33vv9', 3.00, 'https://juanlievano.com/wp-content/uploads/2024/05/PXL_20230804_205939644-scaled.jpg', 'Naturaleza', 'Chalatenango'),
(38, 'Parque de Nueva Guadalupe', 'Parque fresco y hermoso para pasar tiempo en familia, perfecto para niños ', 'fresco', 'https://maps.app.goo.gl/qagvagXECeygvYPu7', 0.00, 'https://i.ytimg.com/vi/IKN5lcX6tRc/hqdefault.jpg', 'Parques', 'San Miguel'),
(39, 'Playa El Tunco', 'Referencia mundial del surf con una vibrante vida nocturna y rocas icónicas.', 'Cálido', 'https://maps.app.goo.gl/kwUiUGM94HvQRmYo8', 0.00, 'https://cartorux.com/wp-content/uploads/2023/12/TuncoWallpaper.jpg', 'Playa', 'La Libertad'),
(40, 'Catedral de Santa Ana', 'Joya arquitectónica de estilo neogótico en el corazón del occidente.', 'Templado', 'https://maps.app.goo.gl/zeGDm9DjKHTYnfVn9', 0.00, 'https://lh4.googleusercontent.com/-imU6q9a33l8/U87egrrjuRI/AAAAAAAAFmo/V_2Klh4aajY/s480/catedral-de-santa-ana.jpg', 'Cultura', 'Santa Ana'),
(41, 'Tazumal', 'La estructura arqueológica más grande y mejor conservada de El Salvador.', 'Cálido', 'https://maps.app.goo.gl/N74fZXFB1Dytjn2C7', 1.00, 'https://www.aerialviews.org/photos/El-Tazumal5.jpg', 'Cultura', 'Santa Ana'),
(42, 'Playa Mizata', 'Playa tranquila y exclusiva, perfecta para desconectarse y surfear.', 'Cálido', 'https://maps.app.goo.gl/uCjoQDyvYmKo9NDM6', 0.00, 'https://www.elsalvadorsurfcamps.com/uploads/5/6/1/0/5610753/mizata01_orig.jpg', 'Playa', 'La Libertad'),
(43, 'Parque El Boquerón', 'Miradores situados en el cráter del volcán de San Salvador.', 'Fresco', 'https://maps.app.goo.gl/VpPJtt3ANpX5E7q87', 2.00, 'https://corsatur.gob.sv/wp-content/uploads/2021/06/El-Boqueron-scaled.jpg', 'Naturaleza', 'San Salvador'),
(44, 'Suchitoto', 'Pueblo colonial con calles empedradas y vistas hermosas al Lago Suchitlán.', 'Cálido', 'https://maps.app.goo.gl/uBL9WTYwkqJzYSiB6', 0.00, 'https://www.passporttheworld.com/wp-content/uploads/2024/09/Suchitoto31-1024x683-3.jpg', 'Cultura', 'Cuscatlán'),
(45, 'Laguna de Alegría', 'Cráter azufrado rodeado de cafetales y leyendas locales.', 'Frío', 'https://maps.app.goo.gl/yhvGCy4PmdNvAcSL9', 1.00, 'https://7s.laprensagrafica.com/wp-content/uploads/2019/08/fsep182019fmalegria5870ca.jpg', 'Naturaleza', 'Usulután'),
(46, 'Playa El Cuco', 'Extensa playa de arena negra, la favorita para vacacionar en el oriente.', 'Cálido', 'https://maps.app.goo.gl/24MaFZEx73avMMyx6', 0.00, 'https://turismo.sv/wp-content/uploads/2019/06/el-cuco-3.jpg', 'Playa', 'San Miguel'),
(47, 'Puerta del Diablo', 'Formaciones rocosas con una de las mejores vistas panorámicas del país.', 'Fresco', 'https://maps.app.goo.gl/3P8a7ofjWAf1ALY56', 0.00, 'https://elsalvadoresbello.com/wp-content/uploads/2019/01/Puerta-del-Diablo-El-Salvador-es-Bello.jpg', 'Mirador', 'San Salvador'),
(48, 'Cascada Los Tercios', 'Curiosa formación de columnas hexagonales de piedra con una caída de agua.', 'Cálido', 'https://maps.app.goo.gl/VAT71Jrthna8AnV69', 1.00, 'https://cdn-pro.elsalvador.com/wp-content/uploads/2025/09/turismo-cascada-los-tercios-suchitoto.jpg', 'Naturaleza', 'Cuscatlán'),
(49, 'Puerto de La Libertad', 'Complejo turístico con muelle, mercado de mariscos y Sunset Park.', 'Cálido', 'https://maps.app.goo.gl/fJm1LigGayqTD2YJA', 0.00, 'https://www.viajeroselsalvador.com/uploads/5/6/1/0/5610753/4072729_orig.jpg', 'Cultura', 'La Libertad'),
(50, 'Volcán de Izalco', 'Volcán hermoso parte de la cultura, perfecto para senderismo', 'Templado', 'https://maps.app.goo.gl/2uDmK87EXWwMrf8S8', 3.00, 'https://turismo.sv/wp-content/uploads/2019/06/volcan-de-izalco-1.jpg', 'Naturaleza', 'Sonsonate'),
(51, 'Panchimalco', 'Cuna de la cultura Nonualca, famoso por su iglesia y tradiciones.', 'Templado', 'https://maps.app.goo.gl/waKQpJ1usbjZUCCL9', 0.00, 'https://elsalvadorviajar.com/wp-content/uploads/2021/09/PANCHIMALCO-Pueblos-de-El-Salvador.jpg', 'Cultura', 'San Salvador'),
(52, 'Playa Costa del Sol', 'La zona hotelera más grande del país con esteros y mar abierto.', 'Cálido', 'https://goo.gl/maps/CostaDelSol', 0.00, 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e', 'Playa', 'La Paz'),
(53, 'Golfo de Fonseca', 'Conjunto de islas con paisajes volcánicos compartidos con Honduras y Nicaragua.', 'Tropical', 'https://maps.app.goo.gl/h2zetN5oCrrxSYKa7', 5.00, 'https://raiadiplomatica.info/wp-content/uploads/2024/10/Isla-Zacatillo-Golfo-de-Fonseca-EDITCDcopia-2-copia.jpg', 'Naturaleza', 'La Unión'),
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
