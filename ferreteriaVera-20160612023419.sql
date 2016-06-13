
--
-- Host info: localhost via TCP/IP
--
--
-- Date: 2016-06-12 02:34:19
--


--
-- Disable foreign key checks, autocommit and start a transaction
--

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Table structure for table `ctacte`
--

DROP TABLE IF EXISTS `ctacte`;

CREATE TABLE IF NOT EXISTS `ctacte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(20) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_emp` (`id_emp`),
  KEY `id_per` (`id_per`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctactelinea`
--

DROP TABLE IF EXISTS `ctactelinea`;

CREATE TABLE IF NOT EXISTS `ctactelinea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ctacte` int(11) NOT NULL,
  `id_lin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ctacte` (`id_ctacte`),
  KEY `id_lin` (`id_lin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE IF NOT EXISTS `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calleNro` varchar(20) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`id`, `calleNro`, `localidad`) VALUES
 ('1', 'BELGRANO 2834', 'VERA');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(20) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `CUIT` int(11) NOT NULL,
  `id_dir` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dir` (`id_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facturadebe`
--

DROP TABLE IF EXISTS `facturadebe`;

CREATE TABLE IF NOT EXISTS `facturadebe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `monto` double NOT NULL,
  `nroFactura` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_emp` (`id_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `linea`
--

DROP TABLE IF EXISTS `linea`;

CREATE TABLE IF NOT EXISTS `linea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` date NOT NULL,
  `cant` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `monto` double NOT NULL,
  `pagado` tinyint(1) DEFAULT '0',
  `fechaPago` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_dir` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dir` (`id_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `id_per` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_per` (`id_per`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctacte`
--

ALTER TABLE `ctacte`
  ADD CONSTRAINT `ctacte_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `ctacte_ibfk_2` FOREIGN KEY (`id_per`) REFERENCES `persona` (`id`);
--
-- Constraints for table `ctactelinea`
--

ALTER TABLE `ctactelinea`
  ADD CONSTRAINT `ctactelinea_ibfk_1` FOREIGN KEY (`id_ctacte`) REFERENCES `ctacte` (`id`),
  ADD CONSTRAINT `ctactelinea_ibfk_2` FOREIGN KEY (`id_lin`) REFERENCES `linea` (`id`);
--
-- Constraints for table `empresa`
--

ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_dir`) REFERENCES `direccion` (`id`);
--
-- Constraints for table `facturadebe`
--

ALTER TABLE `facturadebe`
  ADD CONSTRAINT `facturadebe_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id`);
--
-- Constraints for table `persona`
--

ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_dir`) REFERENCES `direccion` (`id`);
--
-- Constraints for table `usuario`
--

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `persona` (`id`);

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
