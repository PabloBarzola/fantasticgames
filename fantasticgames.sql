-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-08-2019 a las 13:50:03
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fantasticgames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`, `descripcion`) VALUES
(1, 'destacados', NULL),
(2, 'accion', NULL),
(3, 'aventura', NULL),
(4, 'manejo', NULL),
(5, 'rpg', NULL),
(6, 'disparos', NULL),
(7, 'deportes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `rom_sms` varchar(250) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `video` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `alt` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre`, `id_genero`, `rom_sms`, `descripcion`, `imagen`, `video`, `estado`, `alt`) VALUES
(1, 'Alex Kidd in Miracle World', 1, 'AlexKidd.sms', 'Hermoso juego', 'Alex Kidd in Miracle World.png', NULL, 1, 'Alex Kidd in Miracle World'),
(2, 'Sonic the Hedgehog 2', 1, NULL, NULL, 'Sonic the Hedgehog 2.png', NULL, 1, 'Sonic the Hedgehog 2'),
(3, 'Choplifter', 4, NULL, NULL, 'Choplifter.png', NULL, 1, 'Choplifter'),
(4, 'Alex Kidd', 4, NULL, NULL, 'Alex Kidd in Miracle World.png', NULL, 1, 'Alex Kidd in Miracle World'),
(5, 'Phantasy Star (FM)', 4, NULL, NULL, 'Phantasy Star (FM).png', NULL, 1, 'Phantasy Star (FM)'),
(6, 'BubbleBobble', 2, NULL, NULL, 'Bubble Bobble.png', NULL, 1, 'Bubble Bobble'),
(7, 'Aladdin', 1, 'Aladdin (Europe).sms', 'HOLA', 'Aladdin.png', '', 1, 'Aladdin'),
(8, 'Daffy Duck in Hollywood', 1, NULL, NULL, 'Daffy Duck in Hollywood.png', NULL, 1, 'Daffy Duck in Hollywood'),
(9, 'Wonder Boy', 3, NULL, NULL, 'Wonder Boy.png', NULL, 1, 'Wonder Boy'),
(10, 'Batman Returns', 1, NULL, NULL, 'Batman Returns.png', NULL, 1, 'Batman Returns'),
(11, 'Zaxxon 3-D', 5, NULL, NULL, 'Zaxxon 3-D (FM).png', NULL, 1, 'Zaxxon 3-D (FM)'),
(12, 'Mortal Kombat 3', 1, NULL, NULL, 'MortalKombat3-SMS-TitleScreen.png', NULL, 1, 'Mortal Kombat 3'),
(13, 'Sonic the Hedgehog 2', 4, NULL, NULL, 'Sonic the Hedgehog 2.png', NULL, 1, 'Sonic the Hedgehog 2'),
(14, 'Lion King', 1, NULL, NULL, 'LionKing-SMS-TitleScreen.png', NULL, 1, 'Lion King\"'),
(15, 'Ghost Busters', 6, NULL, NULL, 'Ghostbusters.png', NULL, 1, 'Ghost Busters\"'),
(16, 'Indiana Jones and the Last Crusade', 6, NULL, NULL, 'Indiana Jones and the Last Crusade.png', NULL, 1, 'Indiana Jones and the Last Crusade'),
(17, 'Psycho Fox', 7, NULL, NULL, 'Psycho Fox.png', NULL, 1, 'Psycho Fox\"'),
(18, 'Golden Axe Warrior', 1, NULL, NULL, 'Golden Axe Warrior.png', NULL, 1, 'Golden Axe Warrior'),
(19, 'Zillion', 1, NULL, NULL, 'Zillion.png', NULL, 1, 'Zillion.png'),
(20, 'Castle of Illusion', 1, 'Mickey_Mouse_-_Castle_of_Illusion_(UE)_[!].sms', NULL, 'Castle of Illusion.png', NULL, 1, 'Castle of Illusion\"'),
(21, 'Asterix and the Great Rescue', 7, NULL, NULL, 'Asterix and the Great Rescue.png', NULL, 1, 'Asterix and the Great Rescue'),
(22, 'Daffy Duck in Hollywood', 7, NULL, NULL, 'Daffy Duck in Hollywood.png', NULL, 1, 'Daffy Duck in Hollywood'),
(23, 'Fantasy Zone II (FM)', 1, NULL, NULL, 'Fantasy Zone II (FM).png', NULL, 1, 'Fantasy Zone II (FM)\"'),
(24, 'Golvellius', 1, NULL, NULL, 'Golvellius.png', NULL, 1, 'Golvellius\"'),
(25, 'Indiana Jones and the Last Crusade', 1, NULL, NULL, 'Indiana Jones and the Last Crusade.png', NULL, 1, 'Indiana Jones and the Last Crusade'),
(26, 'Master of Darkness', 7, NULL, NULL, 'Master of Darkness.png', NULL, 1, 'Master of Darkness'),
(27, 'Out Run (FM)', 4, NULL, NULL, 'Out Run (FM).png', NULL, 1, 'Out Run (FM)'),
(28, 'R-Type', 7, NULL, NULL, 'R-Type.png', NULL, 1, 'R-Type\"'),
(29, 'Space Harrier', 7, NULL, NULL, 'Space Harrier.png', NULL, 1, 'Space Harrier'),
(30, 'Alien 3', 1, NULL, NULL, 'Alien 3.png', NULL, 1, 'Alien 3'),
(31, 'Buggy Run', 4, NULL, NULL, 'Buggy Run.png', NULL, 1, 'Buggy Run'),
(32, 'World Grand Prix', 1, NULL, NULL, 'World Grand Prix.png', NULL, 1, 'World Grand Prix\"'),
(33, 'Jungle Book, The', 1, NULL, NULL, 'Jungle Book, The.png', NULL, 1, 'Jungle Book, The\"'),
(34, 'Enduro Racer', 4, NULL, NULL, 'Enduro Racer.png', NULL, 1, 'Enduro Racer\"'),
(35, 'F-16 Fighting Falcon', 4, NULL, NULL, 'F-16 Fighting Falcon.png', NULL, 1, 'F-16 Fighting Falcon'),
(36, 'Great Soccer (Card)', 1, NULL, NULL, 'Great Soccer (Card).png', NULL, 1, 'Great Soccer (Card)'),
(37, 'Jurassic Park', 1, NULL, NULL, 'Jurassic Park.png', NULL, 1, 'Jurassic Park\"'),
(38, 'Kenseiden (FM)', 1, NULL, NULL, 'Kenseiden (FM).png', NULL, 1, 'Kenseiden (FM)'),
(39, 'Lemmings', 1, NULL, NULL, 'Lemmings.png', NULL, 1, 'Lemmings'),
(40, 'Miracle Warriors - Seal of the Dark Lord (FM)', 1, NULL, NULL, 'Miracle Warriors - Seal of the Dark Lord (FM).png', NULL, 1, 'Miracle Warriors - Seal of the Dark Lord (FM)'),
(41, 'Juego de Prueba', 1, 'prueba.sms', 'Descripcion Juego Prueba', '10.jpg', NULL, 0, 'Descripcion imagen prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `top_five`
--

CREATE TABLE `top_five` (
  `id_top_five` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `leyenda` varchar(1100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `top_five`
--

INSERT INTO `top_five` (`id_top_five`, `id_juego`, `titulo`, `leyenda`) VALUES
(1, 1, 'Alex Kidd in Miracle World (Sega, 1987) PONELE', 'El primer juego de la serie Alex Kidd es probablemente el mï¿½s popular y el mï¿½s recordado por todos los jugadores. No en vano, hablamos de un tï¿½tulo que venï¿½a integrado con la mayorï¿½a de las Master System, pero mentirï¿½amos si dijï¿½semos que solo por eso es conocido: se trata de un plataformas brillante (con ligeros toques de rol y estrategia) de gran factura tï¿½cnica que era capaz de hacer frente al Super Mario Bros. de NES. Por desgracia, y como os estï¿½is imaginando, el fontanero saliï¿½ ganando, pero eso no impidiï¿½ que por un tiempo el pequeï¿½o Alex fuese la mascota de la compaï¿½ï¿½a.'),
(2, 9, 'Wonderboy (Sega, 1986)', 'Este pequeï¿½o cavernï¿½cola nos hizo pasar tardes que jamï¿½s olvidaremos mientras intentï¿½bamos salvar a su novia, y nos enseï¿½ï¿½ lo divertido que era patinar mucho antes de que conociï¿½ramos a Tony Hawk. Pese a ser un port de la versiï¿½n para recreativas, el primer Wonder Boy de Master System es una autï¿½ntica joya: Niveles amplios muy diferenciados (bosques, montaï¿½as, cuevas, palacios de hielo...), power-ups (hacha de piedra para lanzar, monopatï¿½n y protecciï¿½n angelical) y saltos, muchos saltos. Ademï¿½s, esta versiï¿½n incluï¿½a dos nuevos niveles que no estaban presentes en la versiï¿½n original, ampliando aï¿½n mï¿½s la aventura. ï¿½Ojo con los huevos malos!'),
(3, 2, 'Sonic the Hedgehog (Ancient, 1991)', 'El tï¿½tulo de mascota de Sega le fue arrebatado a Alex Kidd casi sin darse cuenta: lo ï¿½nico que llegï¿½ a ver fue como una estela azul pasaba a toda velocidad frente a sus narices. Hablamos, como no podï¿½a ser de otra manera, del gran Sonic, que no contento con triunfar en Mega Drive con su primer juego, decidiï¿½ pasarse a recolectar anillos tambiï¿½n en Master System. Se trata de un port de esa primera versiï¿½n, pero pese a las limitaciones tï¿½cnicas en comparaciï¿½n con su hermana mayor, el juego sigue siendo igual de frenï¿½tico y divertido. Ademï¿½s, los notables cambios en la mï¿½sica y en el diseï¿½o de los niveles hacï¿½an de esta versiï¿½n en 8 bits del erizo azulado un juego prï¿½cticamente nuevo.'),
(4, 5, 'Phantasy Star (Sega RD4, 1988)', 'Phantasy Star fue desarrollado con la intenciï¿½n de crear una franquicia rolera que compitiera con el (por aquel entonces) reciente The Legend of Zelda de NES, y se podrï¿½a decir que lo consiguiï¿½. Considerado por muchos como uno de los padres de los juegos de rol actuales, contaba con elementos que hoy en dï¿½a son bien conocidos: perspectiva cenital para caminar por el overworld, que rompe a primera persona cuando tienen lugar los combates aleatorios que se desarrollan por turnos. Ademï¿½s poseï¿½a un apartado grï¿½fico de infarto que en ocasiones simulaba un efecto 3D, algo que en aquella ï¿½poca nos dejï¿½ a todos con la boca abierta. Por si esto fuera poco, fue uno de los primeros videojuegos de la historia en que el protagonista principal era una mujer: Alis, la joven que se ve envuelta en una trama de intrigas polï¿½ticas y que, junto a sus compaï¿½eros de viaje, tendrï¿½ que hacer frente al estado totalitario en que se encuentra sumido el reino de Algol. Un juego gigantesco para su ï¿½poca.'),
(5, 13, 'Sonic the Hedgehog 2 (Aspect, 1992)', 'La primera parte de Sonic en Mega Drive fue relativamente sencilla de llevar a Master System, pero Sonic the Hedgehog 2 incorporaba semejante cantidad de aï¿½adidos tanto jugables como grï¿½ficos que era imposible recrearlo en la consola de 8 bits. Asï¿½ que en lugar de un port, se optï¿½ por realizar un juego totalmente diferente de la versiï¿½n original, pero igualmente divertido: cada fase nos ponï¿½a en una situaciï¿½n distinta, como montar en las carretillas de una mina o en ala delta, consiguiendo que avanzar por los niveles fuese una sucesiï¿½n de sorpresas que nunca se hacï¿½an aburridas. Ademï¿½s, el apartado grï¿½fico del juego exprimï¿½a tan al lï¿½mite las caracterï¿½sticas de Master System que por momentos es fï¿½cil olvidarse de que se trata de un juego de 8 bits.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `ultLogin` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `ultLogin`, `estado`) VALUES
(1, 'z80max300', 'a11afec82b2fa9a7185249e0ecec7e6f', '2019-08-07 18:18:21', 1),
(2, 'evaferreira', 'a11afec82b2fa9a7185249e0ecec7e6f', '2019-08-06 20:31:17', 1),
(3, 'palomabarzola', 'a11afec82b2fa9a7185249e0ecec7e6f', '2019-08-05 10:38:36', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`),
  ADD UNIQUE KEY `id_juego_UNIQUE` (`id_juego`),
  ADD KEY `fk_juego_genero` (`id_genero`);

--
-- Indices de la tabla `top_five`
--
ALTER TABLE `top_five`
  ADD PRIMARY KEY (`id_top_five`),
  ADD UNIQUE KEY `id_top_five_UNIQUE` (`id_top_five`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`clave`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `top_five`
--
ALTER TABLE `top_five`
  MODIFY `id_top_five` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `fk_juego_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
