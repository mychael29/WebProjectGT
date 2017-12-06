-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2017 a las 00:00:56
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `v1_golterra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE `canchas` (
  `idcancha_` int(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `afiliacion` varchar(100) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `propietario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas_canchas`
--

CREATE TABLE `coordenadas_canchas` (
  `idcancha_` int(9) NOT NULL,
  `cancha_long` int(200) NOT NULL,
  `cancha_lat` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idevento_` int(9) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `cancha` varchar(200) NOT NULL,
  `modalidad` varchar(100) NOT NULL,
  `vigencia` datetime(6) NOT NULL,
  `actividad` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_afiliacion_cancha`
--

CREATE TABLE `user_afiliacion_cancha` (
  `idusercancha_` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `cancha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser_` int(9) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser_`, `username`, `email`, `password`, `photo`, `nombres`, `region`) VALUES
(1, 'admin', 'admin@golterra.com', 'admin', NULL, NULL, NULL),
(2, 'mychael29 ', 'mychael29@hotmail.com ', 'mychael29', NULL, 'Maycol Meza Roque', NULL),
(3, 'fernando  2', 'fernado@hotmail.com  ', 'fernando', NULL, 'Fernando Kanh', NULL),
(4, 'admin1', 'admin1@golterra.com', 'admin1', NULL, NULL, NULL),
(5, 'admin2', 'admin2@golterra.com', 'admin2', NULL, NULL, NULL),
(6, 'admin3', 'admin3@golterra.com', 'admin3', NULL, NULL, NULL),
(7, 'admin4', 'admin4@golterra.com', 'admin4', NULL, NULL, NULL),
(8, 'fff  ', 'ff@fhif ', 'admin5', NULL, 'eee', NULL),
(9, 'admin6', 'admin6@golterra.com', 'admin6', NULL, NULL, NULL),
(10, 'admin7', 'admin7@golterra.com', 'admin7', NULL, NULL, NULL),
(12, 'Warchi ', 'warchiwar@smite.com ', 'adc', NULL, 'vacio', NULL),
(13, 'perilla12', 'perill12@smite.com', 'smite', NULL, NULL, NULL),
(14, NULL, 'anime@gmail.com', 'residenttevil29', NULL, '', NULL),
(15, NULL, 'smite@gmail.com', 'admin', NULL, 'warchiwarSMITE', NULL),
(16, NULL, 'smite29@gmail.com', 'admin', NULL, 'warchiwarSMITE', NULL),
(17, NULL, 'smite1992@gmail.com', 'admin', NULL, 'warchiwarSMITE', NULL),
(18, NULL, 'hentai@gg.com', 'hentai', NULL, 'jared', NULL),
(19, NULL, 'hentai2@gg.com', 'hentai', NULL, 'jared', NULL),
(20, NULL, 'hentai3@gg.com', 'hentai', NULL, 'jared', NULL),
(21, NULL, 'hentai4@gg.com', 'hentai', NULL, 'jared', NULL),
(22, NULL, 'hentai5@gg.com', 'hentai', NULL, 'jared', NULL),
(23, NULL, 'android@g.com', 'admin', NULL, 'Android', NULL),
(24, NULL, 'android@dh.m', 'admin', NULL, 'Android', NULL),
(25, NULL, 'sddsdwww@dasd.cm', 'sfsfdf', 'imagenes/Rin Rinaewee.jpg', 'Rin Rinaewee', NULL),
(26, NULL, 'dddds@ttg.yf', 'dasdasda', 'imagenes/Neme.jpg', 'Neme', NULL),
(27, NULL, 'dsdfd@ddad.ii', 'fddfaa', 'imagenes/Saber.jpg', 'Saber', NULL),
(28, NULL, 'rei23@gg.iu', 'sddadad', 'imagenes/Rei Ayanami 4.jpg', 'Rei Ayanami 4', NULL),
(29, NULL, 'scandal@japan.jp', 'dsadsdsa', 'imagenes/Rina.jpg', 'Rina', NULL),
(30, NULL, 're@ghn.jh', 'rfrghe', 'imagenes/Gran Nemesis.jpg', 'Gran Nemesis', NULL),
(31, NULL, 'sser@cb.kj', 'dffsd', 'imagenes/Seiba Sieba.jpg', 'Seiba Sieba', NULL),
(32, NULL, 'fdfsf@ff.jj', 'fsfdfs', 'imagenes/Gfgetgertgre.jpg', 'Gfgetgertgre', NULL),
(33, NULL, 'fdfdfwwr@hj.jjj', 'rewrewfd', 'imagenes/Jill Xxxxx.jpg', 'Jill Xxxxx', NULL),
(34, NULL, 'fdfmdkf@gb.jm', 'dsfsds', 'imagenes/Waifo 3d.jpg', 'Waifo 3d', NULL),
(35, NULL, 'dsdsda@vhn.kjj', 'dsdads', 'imagenes/Nemmmes.jpg', 'Nemmmes', NULL),
(36, NULL, 'dsdamj@hh.mj', 'dsdsadd', 'imagenes/Reeeeei.jpg', 'Reeeeei', NULL),
(37, NULL, 'dasdas@hh.hn', 'sdasdssw', 'imagenes/Sdadadasdsds.jpg', 'Sdadadasdsds', NULL),
(38, NULL, 'DASDSA@fgb.yy', 'DDSADA', 'imagenes/DASDASD.jpg', 'DASDASD', NULL),
(39, NULL, 'dsadsrera@fdfdsag.nh', 'sdadsaa', 'imagenes/Dddastttt.jpg', 'Dddastttt', NULL),
(40, NULL, 'fdrb@b.jj', 'rerfsd', 'sin imagen', 'Fdssdf', NULL),
(41, NULL, 'eqeqewe@hhm.jn', 'ttttt', 'sin imagen', 'Frgrh', NULL),
(42, NULL, 'dssd@ghjm.nn', 'qwdd', 'sin imagen', 'Feece', NULL),
(43, NULL, 'rttrr@ghjf.kk', 'rrdcs', 'sin imagen', 'Tttrtt', NULL),
(44, NULL, 'michael2et@ghn.jj', 'rfssdsa', 'sin imagen', 'Michael', NULL),
(45, NULL, 'solano@hjn.kk', 'wqfdsgth', 'sin imagen', 'Jessica', NULL),
(46, NULL, 'neon@fj.jp', 'resirf', 'imagenes/Rei Ayanamie Evan.jpg', 'Rei Ayanamie Evan', NULL),
(47, NULL, 're3@gmail.com', 'resident', 'image_profile/Jill Valentine Re3.jpg', 'Jill Valentine Re3', NULL),
(48, NULL, 'dsds@fh.nn', 'feddfd', 'image_profile/Rina Rina A.jpg', 'Rina Rina A', NULL),
(49, NULL, 'dsadsa@ddf.hh', 'dsdasdsad', 'sin imagen', 'Dsadsa', NULL),
(50, NULL, 'eeaa@fv.n', 'wqeqeq', 'image_profile/Terereresd.jpg', 'Terereresd', NULL),
(51, NULL, 'dasd@hjn.jdsa', 'dasdsds', 'image_profile/Dfsfdfdsfsde.jpg', 'Dfsfdfdsfsde', NULL),
(52, NULL, 'sxz@zzcg.jj', 'czczxzx', 'image_profile/Dsadascceeed.jpg', 'Dsadascceeed', NULL),
(53, NULL, 'mkocss@fg.hh', 'dsasdda', 'image_profile/Jcowne.jpg', 'Jcowne', NULL),
(54, NULL, 'ddads@f.jad', 'dsadadas', 'image_profile/Wew Ere.jpg', 'Wew Ere', NULL),
(55, NULL, 'ddsdsds@ff.j', 'dsadsdas', 'image_profile/DSDASD.jpg', 'DSDASD', NULL),
(56, NULL, 'dsadasd@ghh.uu', 'dsadece', 'image_profile/Sadwdadas.jpg', 'Sadwdadas', NULL),
(57, NULL, 'dwdwdw@fffv.j', 'wdwwdd', 'image_profile/Dwwwws.jpg', 'Dwwwws', NULL),
(58, NULL, 'dasd@ghhh.nkk', 'dasdas', 'image_profile/Sdsd.jpg', 'Sdsd', NULL),
(59, NULL, 'weqwe@xxxr.nn', 'ewqeqw', 'image_profile/Dsdsds.jpg', 'Dsdsds', NULL),
(60, NULL, 'dasdadad@jj.jj', 'dsdwwww', 'image_profile/Edaawqq.jpg', 'Edaawqq', NULL),
(61, NULL, 'www@dfn.nnw', 'wqewqe', 'image_profile/Ssaadwww.jpg', 'Ssaadwww', NULL),
(62, NULL, 'dadsd@zzfjj.bb', 'dsdweqw', 'image_profile/Admin Rina.jpg', 'Admin Rina', NULL),
(63, NULL, 'addd@xxxv.huil', 'adwqqweq', 'image_profile/Wdwdwss.jpg', 'Wdwdwss', NULL),
(64, NULL, 'resdsd@cchhrn.h', 'dsdsadasd', 'image_profile/Rina Meza.jpg', 'Rina Meza', NULL),
(65, NULL, 'dsadd@hbb.jj', 'ddadad', 'image_profile/Seibaaaa.jpg', 'Seibaaaa', NULL),
(66, NULL, 'asdadsd@suikk.m', 'dsdsada', 'image_profile/Dsdads.jpg', 'Dsdads', NULL),
(67, NULL, 'fdsff@dthh.vvv', 'dsfdsf', 'image_profile/Dsfsd.jpg', 'Dsfsd', NULL),
(68, NULL, 'ddasd@gl.nnnn', 'dsasdassad', 'image_profile/Sasdsad.jpg', 'Sasdsad', NULL),
(69, NULL, 'wqee@ghb.jjm', 'wewqegwegj', 'image_profile/Fryhrref.jpg', 'Fryhrref', NULL),
(70, NULL, 'wwwsada@dfshjdsa.ddsa', 'dsadsad', 'image_profile/Saasasaasq.jpg', 'Saasasaasq', NULL),
(71, NULL, 'dadsadsads@ghj.gf', 'dsdadeqe', 'image_profile/Seiba Real.jpg', 'Seiba Real', NULL),
(72, NULL, 'dasdsad@fitgb.hlkm', 'wqewqeqwe', 'image_profile/Seiba2332.jpg', 'Seiba2332', NULL),
(73, NULL, 'dsadsd@hreeewwhn.com', 'asdsaddsa', 'image_profile/Seiba3.4.jpg', 'Seiba3.4', NULL),
(74, NULL, 'evil232@hfv.hgn', 'ewqedfcsd', 'sin imagen', 'Resident Evil', NULL),
(75, NULL, 'fesdsfwqwewqqqw@gjm.ggh', 'eqewqewewq', 'sin imagen', 'Prueba32222', NULL),
(76, NULL, 'mychael29@hotmail.jp', 'drancerhi', 'image_profile/Rei Rei Rei III.jpg', 'Rei Rei Rei III', NULL),
(77, NULL, 'rei20@fhn.jp', 'wwwwwe', 'image_profile/Rei Rei II.jpg', 'Rei Rei II', NULL),
(78, NULL, 'fate@konichiwai.pe', 'grfsdsd', 'image_profile/Fate Stay Night.jpg', 'Fate Stay Night', NULL),
(79, NULL, 'zero@fate.jp', 'aaaaa', 'image_profile/Fate Zero.jpg', 'Fate Zero', NULL),
(80, NULL, 'reg@fatr.hjk', 'dadadda', 'image_profile/Fate Zero Zero.jpg', 'Fate Zero Zero', NULL),
(81, NULL, 'rest@fnnmm.mm', 'sdsasas', 'image_profile/Reina.jpg', 'Reina', NULL),
(82, NULL, 'ssdddfddd@zzzxfgh.hh', 'deddd', 'image_profile/Rdddffsswc.jpg', 'Rdddffsswc', NULL),
(83, NULL, 'wess@xdcghjnnh.hj', 'wweeds', 'image_profile/Wsqqqwwew.jpg', 'Wsqqqwwew', NULL),
(84, NULL, 'ddfgc@dgbvf.kii', 'vccvv', 'image_profile/Frhygvf.jpg', 'Frhygvf', NULL),
(85, NULL, 'gfff@dfggrrr.ik', 'fdsxd', 'image_profile/Fgggdddryhh.jpg', 'Fgggdddryhh', NULL),
(86, NULL, 'sddsss@hhh.hgg', 'ssdwe', 'image_profile/Sswwssaa.jpg', 'Sswwssaa', NULL),
(87, NULL, 'efeeefd@fjjvfr.jjk', 'ddfdsdsrd', 'image_profile/Ffvfrfffrrrtttj.jpg', 'Ffvfrfffrrrtttj', NULL),
(88, NULL, 'ewdd@fvzs.pi', 'fedede', 'image_profile/Erre.jpg', 'Erre', NULL),
(89, NULL, 'cd@gg.gg', 'dsdsde', 'image_profile/Rfdsxsx.jpg', 'Rfdsxsx', NULL),
(90, NULL, 'ttttee@dfg.b', 'tgfff', 'image_profile/Trttttttt.jpg', 'Trttttttt', NULL),
(91, NULL, 'eeee@eee.ee', 'etrre', 'image_profile/Eeeeee.jpg', 'Eeeeee', NULL),
(92, NULL, 'hii@hiii.hh', 'teere', 'image_profile/Hii.jpg', 'Hii', NULL),
(93, NULL, 'mychael29@gmail.com', 'resident', 'image_profile/Maycol Meza Roque.jpg', 'Maycol Meza Roque', NULL),
(94, NULL, 'rinasuzuki@android.jp', 'admin', 'image_profile/Rina Suzuki.jpg', 'Rina Suzuki', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`idcancha_`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idevento_`);

--
-- Indices de la tabla `user_afiliacion_cancha`
--
ALTER TABLE `user_afiliacion_cancha`
  ADD PRIMARY KEY (`idusercancha_`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser_`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `idcancha_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idevento_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_afiliacion_cancha`
--
ALTER TABLE `user_afiliacion_cancha`
  MODIFY `idusercancha_` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser_` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
