-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2020 a las 20:07:23
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdrenzot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Cta_nIdCuenta` int(11) NOT NULL,
  `Cta_cGlobal` char(7) CHARACTER SET utf8 NOT NULL,
  `Cta_vDescripcion` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Cta_cTipo` char(1) CHARACTER SET utf8 NOT NULL,
  `Cta_vIcono` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Cta_cEstado` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Cta_nIdCuenta`, `Cta_cGlobal`, `Cta_vDescripcion`, `Cta_cTipo`, `Cta_vIcono`, `Cta_cEstado`) VALUES
(1, '5636000', 'Other Direct COGS', '1', '', '1'),
(2, '5614000', 'Course Materials & Supplies', '1', '', '1'),
(3, '6291000', 'Supplies - Sporting Goods', '1', '', '1'),
(4, '1510000', 'Asset/Property Clearing-Psoft', '1', '', '1'),
(5, '5620000', 'Textbooks', '1', '', '1'),
(6, '5615000', 'Clinical Supplies', '1', '', '1'),
(7, '5000000', 'FT-Teacher Wages', '1', '', '1'),
(8, '5100000', 'PT-Teacher Wages', '1', '', '1'),
(9, '5214000', 'Teaching Assistant Services', '1', '', '1'),
(10, '5213000', 'Short Term Contracts - Teacher', '1', '', '1'),
(11, '5212000', 'Visiting Professor', '1', '', '1'),
(12, '5611000', 'Course Food/Beverage', '1', '', '1'),
(13, '1291600', 'Inventory-Merchandising Goods', '1', '', '1'),
(14, '6335000', 'Membership Fees', '1', '', '1'),
(15, '5638000', 'Course Program Development', '1', '', '1'),
(16, '6334000', 'Subscription Expense', '1', '', '1'),
(17, '6337000', 'Training & Seminars-Employee', '1', '', '1'),
(18, '5632000', 'Third Party Intership Agreement', '1', '', '1'),
(19, '5636500', 'Cafeteria & Bar Food/Beverage', '1', '', '1'),
(20, '5621000', 'Copywrite Fees', '1', '', '1'),
(21, '5630000', 'Dissertation/Thesis Fees', '1', '', '1'),
(22, '6332000', 'University Partner Fees', '1', '', '1'),
(23, '6336000', 'Licensing Fees', '1', '', '1'),
(24, '6338000', 'Sponsorship Fees', '1', '', '1'),
(25, '5631000', 'Exam expense', '1', '', '1'),
(26, '6339000', 'Research & Grant Expense', '1', '', '1'),
(27, '5670000', 'Student Housing Rentals', '1', '', '1'),
(28, '5637000', 'Exchange Student Expense', '1', '', '1'),
(29, '5636800', 'Student Entertainment', '1', '', '1'),
(30, '5633000', 'Technology Direct Expenses', '1', '', '1'),
(31, '4800000', 'Other Revenue', '1', '', '1'),
(32, '6317000', 'Services - Delivery/Courier', '1', '', '1'),
(33, '6316000', 'Services - Copying', '1', '', '1'),
(34, '6401400', 'Mileage', '1', '', '1'),
(35, '6280000', 'Supplies - Other', '1', '', '1'),
(36, '6230000', 'Supplies - Photocopy/Printer', '1', '', '1'),
(37, '6240000', 'Supplies - Stationary/Office', '1', '', '1'),
(38, '6210000', 'Postage-Mail', '1', '', '1'),
(39, '6312500', 'Services - Armoured Car', '1', '', '1'),
(40, '6312000', 'Services - Transportation', '1', '', '1'),
(41, '5636100', 'Student Transportation', '1', '', '1'),
(42, '6401000', 'Air Travel', '1', '', '1'),
(43, '6401100', 'Lodging & Hotels', '1', '', '1'),
(44, '6401600', 'Meals-Travel', '1', '', '1'),
(45, '6401900', 'Oth Travel Exps(Gas/Tolls,etc)', '1', '', '1'),
(46, '6401300', 'Auto Rental', '1', '', '1'),
(47, '6401200', 'Train/Taxi/Limo/Car Services', '1', '', '1'),
(48, '6400000', 'Travel & Entertainment', '1', '', '1'),
(49, '6521000', 'PR Donations/Contrbutions Cash', '1', '', '1'),
(50, '6129000', 'Employee Recognition', '1', '', '1'),
(51, '6401650', 'Meal Allowance', '1', '', '1'),
(52, '1500100', 'CIP-Building', '1', '', '1'),
(53, '1500200', 'CIP-Leasehold Improvements', '1', '', '1'),
(54, '6710010', 'Condominium Fee Expense', '1', '', '1'),
(55, '6710000', 'Leased Space', '1', '', '1'),
(56, '6314000', 'Services - Cleaning', '1', '', '1'),
(57, '6361000', 'Repair & Maintenance-Buildings', '1', '', '1'),
(58, '6363000', 'Repair & Maintenance-Furn&Fix', '1', '', '1'),
(59, '6313000', 'Services - Grounds/Landscaping', '1', '', '1'),
(60, '6315100', 'Services - Safety', '1', '', '1'),
(61, '6310000', 'Services - Trash Removal', '1', '', '1'),
(62, '5634000', 'Repairs Student Damages', '1', '', '1'),
(63, '6220000', 'Supplies - Cleaning', '1', '', '1'),
(64, '6365000', 'Repair & Maintenance-Other', '1', '', '1'),
(65, '6362000', 'Repair & Maintenance-Equipment', '1', '', '1'),
(66, '6401700', 'Catering/Meals - Employees', '1', '', '1'),
(67, '6128000', 'Other Benefits Expense', '1', '', '1'),
(68, '6250000', 'Supplies - Food/Beverage', '1', '', '1'),
(69, '6270000', 'Supplies - Water - Purified', '1', '', '1'),
(70, '6318000', 'Service Coffee', '1', '', '1'),
(71, '6401750', 'Catering/Meals -Students', '1', '', '1'),
(72, '6720000', 'Leased Equipment', '1', '', '1'),
(73, '6771000', 'Rental Equipment and Furniture', '1', '', '1'),
(74, '6290000', 'Supplies - Misc Expense', '1', '', '1'),
(75, '6305000', 'Utilities - Gas/Petrol', '1', '', '1'),
(76, '6302000', 'Utilities - Oil', '1', '', '1'),
(77, '6304000', 'Utilities -Propane/Natural Gas', '1', '', '1'),
(78, '6319000', 'Services - Laundry Expense', '1', '', '1'),
(79, '6190000', 'Temporary Contract Labor Exp', '1', '', '1'),
(80, '6111000', 'Housing Allowance', '1', '', '1'),
(81, '6353000', 'Relocation Expense', '1', '', '1'),
(82, '6311000', 'Services - Moving/Hauling', '1', '', '1'),
(83, '6710050', 'Leased Parking Spaces', '1', '', '1'),
(84, '6343000', 'Consulting Fees', '1', '', '1'),
(85, '6315000', 'Services - Security/Guard', '1', '', '1'),
(86, '6336300', 'Municipal Permits', '1', '', '1'),
(87, '6850000', 'Fines & Penalties', '1', '', '1'),
(88, '6860000', 'Non Recoverable VAT', '1', '', '1'),
(89, '6712000', 'Leased Space Real State Taxes', '1', '', '1'),
(90, '6260000', 'Supplies - Uniforms-G&A', '1', '', '1'),
(91, '5612000', 'Course Uniforms', '1', '', '1'),
(92, '6301000', 'Utilities- Electricity Exp', '1', '', '1'),
(93, '6303000', 'Utilities - Water', '1', '', '1'),
(94, '6750000', 'Leased Auto', '1', '', '1'),
(95, '6364000', 'Repair & Maintenanc-Vehicles', '1', '', '1'),
(96, '5613000', 'Course Space or Equipment Rent', '1', '', '1'),
(97, '6775000', 'Rental Temporary Space', '1', '', '1'),
(98, '6713000', 'Leased Space Insurance', '1', '', '1'),
(99, '6327000', 'Audiovisual Expense', '1', '', '1'),
(100, '1500300', 'CIP-Machinery & Equipment', '1', '', '1'),
(101, '6323000', 'Hardware/Supplies', '1', '', '1'),
(102, '6328000', 'IT Hosting/Maintenance', '1', '', '1'),
(103, '6741000', 'Leased Technology', '1', '', '1'),
(104, '6343100', 'Technology Consulting Fees', '1', '', '1'),
(105, '6322000', 'Non-capitalized Software', '1', '', '1'),
(106, '1500400', 'CIP-Software Development', '1', '', '1'),
(107, '1351400', 'Prepaid Software and Licensing', '1', '', '1'),
(108, '6324000', 'Maintenance Expense', '1', '', '1'),
(109, '6325000', 'Internet/Data Line Charges', '1', '', '1'),
(110, '6320000', 'Telephone Expense', '1', '', '1'),
(111, '6321000', 'Cellular Phone Exp', '1', '', '1'),
(112, '6326000', 'Conference Call/Web Meeting', '1', '', '1'),
(113, '6341000', 'Accounting Fees-General', '1', '', '1'),
(114, '6331000', 'Accreditation Fees', '1', '', '1'),
(115, '1707100', 'CIP- Deferred Projects', '1', '', '1'),
(116, '6513000', 'Production Development-Agency', '1', '', '1'),
(117, '6514000', 'Billboards & Signage', '1', '', '1'),
(118, '6504100', 'Media Theaters', '1', '', '1'),
(119, '6515000', 'Direct Mail Advertising', '1', '', '1'),
(120, '6502000', 'Website - Advertisement', '1', '', '1'),
(121, '6501000', 'Media Print', '1', '', '1'),
(122, '6503000', 'Media Radio', '1', '', '1'),
(123, '6504000', 'Media Television', '1', '', '1'),
(124, '6501100', 'Media Newspaper', '1', '', '1'),
(125, '6501200', 'Media Magazine', '1', '', '1'),
(126, '6508000', 'Media Telemarketing', '1', '', '1'),
(127, '6512000', 'Design - Agency', '1', '', '1'),
(128, '6200000', 'Agent Commission Exp-3rdPrty', '1', '', '1'),
(129, '6341100', 'Accounting Fees-Annual', '1', '', '1'),
(130, '6561000', 'Bank Service Fees', '1', '', '1'),
(131, '6343300', 'Collections Agency Expense', '1', '', '1'),
(132, '5213100', 'Project Collaborator-Teach', '1', '', '1'),
(133, '6313100', 'Services - Events', '1', '', '1'),
(134, '6571000', 'Property Insurance', '1', '', '1'),
(135, '6575000', 'Disability Insurance', '1', '', '1'),
(136, '6573000', 'Life Insurance', '1', '', '1'),
(137, '6576000', 'Medical/Dental Insurance', '1', '', '1'),
(138, '5635000', 'Student Insurance', '1', '', '1'),
(139, '6572000', 'General Liability Insurance', '1', '', '1'),
(140, '6571500', 'Insurance Business Continuity', '1', '', '1'),
(141, '6342000', 'Legal Fees-General', '1', '', '1'),
(142, '6342100', 'Legal Fees-Annual', '1', '', '1'),
(143, '6341200', 'Accounting Fees Acquisition', '1', '', '1'),
(144, '6342200', 'Legal Fees Acquisition', '1', '', '1'),
(145, '6342500', 'Legal Judgment Expense', '1', '', '1'),
(146, '6126000', 'Holiday Gifts', '1', '', '1'),
(147, '6505000', 'Promotional Materials', '1', '', '1'),
(148, '5700100', 'Agent Commission EXP. COGS', '1', '', '1'),
(149, '6127000', 'Physical/Medical Check Ups', '1', '', '1'),
(150, '6523000', 'Public Relations Other', '1', '', '1'),
(151, '6352000', 'Search Fees', '1', '', '1'),
(152, '6351000', 'Back ground checks', '1', '', '1'),
(153, '6354000', 'Assesment & Candidate testing', '1', '', '1'),
(154, '6511000', 'Research Agency', '1', '', '1'),
(155, '6506000', 'Marketing Research', '1', '', '1'),
(156, '6506100', 'Marketing related party Exp.', '1', '', '1'),
(157, '1330000', 'Prepaid Insurance', '1', '', '1'),
(158, '1340000', 'Prepaid Marketing', '1', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpto`
--

CREATE TABLE `dpto` (
  `Dpto_nIdDpto` int(11) NOT NULL,
  `Dpto_cDpto` char(6) CHARACTER SET latin1 NOT NULL,
  `Dpto_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dpto`
--

INSERT INTO `dpto` (`Dpto_nIdDpto`, `Dpto_cDpto`, `Dpto_cEstado`) VALUES
(1, '850030', '1'),
(2, '850100', '1'),
(3, '850020', '1'),
(4, '800500', '1'),
(5, '850500', '1'),
(6, '721100', '1'),
(7, '850000', '1'),
(8, '830100', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpto_proyecto`
--

CREATE TABLE `dpto_proyecto` (
  `DptoProy_nIdDptoProyecto` int(11) NOT NULL,
  `DptoProy_Proy_nIdProyecto` int(11) NOT NULL,
  `DptoProy_Dpto_nIdDpto` int(11) NOT NULL,
  `DptoProy_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dpto_proyecto`
--

INSERT INTO `dpto_proyecto` (`DptoProy_nIdDptoProyecto`, `DptoProy_Proy_nIdProyecto`, `DptoProy_Dpto_nIdDpto`, `DptoProy_cEstado`) VALUES
(1, 1, 1, '1'),
(2, 1, 2, '1'),
(3, 2, 3, '1'),
(4, 2, 5, '1'),
(5, 2, 6, '1'),
(6, 3, 3, '1'),
(7, 3, 6, '1'),
(8, 5, 4, '1'),
(9, 1, 7, '1'),
(10, 3, 8, '1'),
(12, 3, 4, '1'),
(13, 3, 5, '1'),
(14, 2, 8, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `Inc_nIdIncidente` int(11) NOT NULL,
  `Inc_vNroTicket` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `Inc_UExp_nIdUnExp` int(11) NOT NULL,
  `Inc_User_id` int(11) NOT NULL,
  `Inc_vDescripcion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Inc_vComentario` varchar(500) CHARACTER SET latin1 NOT NULL,
  `Inc_vMaterial` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Inc_vFechaReporte` date NOT NULL,
  `Inc_vFechaSolucion` date DEFAULT NULL,
  `Inc_cPrioridad` char(1) CHARACTER SET latin1 NOT NULL,
  `Inc_cEstadoAtencion` char(1) CHARACTER SET latin1 NOT NULL,
  `Inc_created_at` datetime NOT NULL,
  `Inc_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`Inc_nIdIncidente`, `Inc_vNroTicket`, `Inc_UExp_nIdUnExp`, `Inc_User_id`, `Inc_vDescripcion`, `Inc_vComentario`, `Inc_vMaterial`, `Inc_vFechaReporte`, `Inc_vFechaSolucion`, `Inc_cPrioridad`, `Inc_cEstadoAtencion`, `Inc_created_at`, `Inc_cEstado`) VALUES
(1, '10001', 3, 5, 'Soporte del extintor Nro 14 en mal estado', 'Interior biblioteca (Pabellón A)', 'biblioteca', '2020-06-16', NULL, '0', '1', '2020-06-17 20:29:16', '1'),
(2, '10002', 3, 5, 'Sensor de humo no esta funcionando', 'Aula C201 (Pabellón C)', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 20:31:22', '1'),
(3, '10003', 3, 5, 'Rotura de unión de tubería del caño en jardín', 'Jardín parte posterior a Pabellón A - Se colocó tapón temporalmente', NULL, '2020-06-16', NULL, '2', '2', '2020-06-17 20:32:08', '1'),
(4, '10004', 3, 5, 'Sensor fotoeléctrico no funciona (Frente a garita 1)', 'Cerco perimétrico - Zona 01 (Zoilo León)', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 20:34:18', '1'),
(5, '10005', 3, 5, 'Fuga de agua en tanque de cuarto de bombas (Pab B)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 20:37:59', '1'),
(6, '10006', 3, 5, 'Techo cubierto con plástico', 'No tiene tejas', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 20:38:40', '1'),
(7, '10007', 3, 5, 'Goteo en la bomba de agua Nro 2 cuando está en funcionamiento', '', NULL, '2020-06-16', NULL, '2', '1', '2020-06-17 20:43:17', '1'),
(8, '10008', 3, 5, 'Filtración de agua por tubería rota en cuarto de bombas Pabellón A', 'Se cerró la llave de paso desde medidor principal', NULL, '2020-06-16', NULL, '3', '1', '2020-06-17 20:49:43', '1'),
(9, '10009', 3, 5, 'Calentador del GE no funciona automaticamente en cortes de energia electrica', 'Se tiene que encender manualmente', NULL, '2020-06-16', NULL, '3', '1', '2020-06-17 20:51:15', '1'),
(10, '10010', 3, 5, 'Adoquines desnivelados en alameda', 'posible plaga de hormigas', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 20:52:29', '1'),
(11, '10011', 3, 5, 'Plataforma deportiva rajada', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 20:53:04', '1'),
(12, '10012', 3, 5, 'Tuberia de descarga de agua pluvial desprendida (Frente jardín Pabellón F)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 20:54:20', '1'),
(13, '10013', 3, 5, 'Lona de techo desprendida por fuertes vientos (Alameda)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 20:54:51', '1'),
(14, '10014', 2, 2, '02 focos no encienden (Escalera Pabellón A)', 'fifi', NULL, '2020-06-16', '2020-06-23', '0', '3', '2020-06-17 20:57:59', '1'),
(15, '10015', 2, 2, 'Pared húmeda (Pabellón A - colindante con vecino)', 'koko', NULL, '2020-06-16', '2020-06-23', '0', '3', '2020-06-17 20:59:08', '1'),
(16, '10016', 2, 9, 'Techo de drywall sin 2 baldosas (Pabellón A - Vestidor de Damas)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 21:00:39', '1'),
(17, '10017', 2, 2, 'Letrero no enciende (Pabellón A - Pasadizo)', 'Finalizado', NULL, '2020-06-16', '2020-06-23', '0', '3', '2020-06-17 21:00:56', '1'),
(18, '10018', 2, 2, 'Tapa protectora de llave de paso de agua está rota (Pabellón A - Piso 2 - SSHH Hombres)', 'lolo', NULL, '2020-06-16', '2020-06-23', '0', '3', '2020-06-17 21:02:12', '1'),
(19, '10019', 2, 2, 'Foco está descolgado y no enciende (Pabellón A - Piso 2 - Almacén limpieza)', 'comentario2', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:03:05', '1'),
(20, '10020', 2, 2, '01 foco no enciende (Pab A - Piso 4 - Pasadizo)', 'Chevere', NULL, '2020-06-16', '2020-06-23', '0', '3', '2020-06-17 21:03:51', '1'),
(21, '10021', 2, 2, 'SSHH sin puerta (Pab A - Piso 4 - SSHH Damas)', 'df', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:06:38', '1'),
(22, '10022', 2, 2, 'Pared rajada (Pab A - Azotea)', 'gaga', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:07:14', '1'),
(23, '10023', 2, 2, '01 foco no enciende (Pab A - Pasadizo altura plaza hundida)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:08:35', '1'),
(24, '10024', 2, 2, '01 foco no enciende (Pab B - Piso 1 - SSHH Hombes)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:09:14', '1'),
(25, '10025', 2, 2, '01 foco en poste no enciende (Pab B - Estacionamiento)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:09:37', '1'),
(26, '10026', 2, 2, '02 focos no enciendes (Pab B - Piso 2 - Pasadizo)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:09:53', '1'),
(27, '10027', 2, 2, '01 foco no enciende (Pab B - Piso 3 - Escaleras)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:10:11', '1'),
(28, '10028', 2, 2, '02 focos no encienden (Pab B - Piso 3 - SSHH Hombres)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:11:56', '1'),
(29, '10029', 2, 2, '02 focos no encienden (Pab B - Piso 3 - Pasadizo)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:12:40', '1'),
(30, '10030', 2, 2, '01 foco no enciende (Pab B - Piso 4 - SSHH Hombres)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:13:01', '1'),
(31, '10031', 2, 2, 'Toldo de carpa desprendido por fuertes vientos (Pab B - Azotea)', 'ya taaa', NULL, '2020-06-19', '2020-06-23', '2', '3', '2020-06-17 21:15:38', '1'),
(32, '10032', 2, 9, 'Pared con grietas (Pab C - Piso 1 - Lab. de Concreto)', 'okok', NULL, '2020-06-16', NULL, '1', '2', '2020-06-17 21:16:30', '1'),
(33, '10033', 2, 9, 'Cerco eléctrico sin energía y en mal estado (Pab C - Piso 1 - Losa deportiva)', 'lll', NULL, '2020-06-16', NULL, '1', '2', '2020-06-17 21:17:47', '1'),
(34, '10034', 2, 2, 'Desperdicio de residuos sólidos (Pab C - Piso 1 - Lab. de concreto)', 'Ok', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:18:31', '1'),
(35, '10035', 2, 2, 'Vidrio roto del tablero de básquet (Pab C - Losa Deportiva)', '', NULL, '2020-06-16', '2020-06-22', '2', '3', '2020-06-17 21:26:17', '1'),
(36, '10036', 1, 2, 'Cables de energía en el piso', 'se reparó la tuberia', NULL, '2020-06-16', '2020-06-22', '2', '3', '2020-06-17 21:36:28', '1'),
(37, '10037', 1, 9, 'Puerta de tablero electrico en piso', '', NULL, '2020-06-16', NULL, '2', '1', '2020-06-17 21:37:02', '1'),
(38, '10038', 1, 2, 'Cajas de tomacorrientes en piso (Pab D - Piso 3 - Pasadizo)', '', NULL, '2020-06-16', '2020-06-23', '2', '3', '2020-06-17 21:37:36', '1'),
(39, '10039', 1, 2, 'Gabinete contra incendio en piso (Pab E - Azotea)', 'okk', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:39:07', '1'),
(40, '10040', 1, 2, 'Tablero eléctrico abierto (Pab E - Azotea)', 'ok', NULL, '2020-06-16', '2020-06-23', '2', '3', '2020-06-17 21:39:44', '1'),
(41, '10041', 1, 2, 'Pequeño forado (Pab E - Piso 1 - Pasadizo)', 'okok', NULL, '2020-06-16', '2020-06-23', '1', '3', '2020-06-17 21:40:10', '1'),
(42, '10042', 1, 2, 'Extintor requiere recarga - presión baja (Pab B - Zona de acopio)', 'ge', NULL, '2020-06-16', '2020-06-23', '2', '3', '2020-06-17 21:40:51', '1'),
(43, '10043', 1, 2, 'Extintor requiere recarga - presión baja (Pab A - Sala de conferencias)', 'genial', NULL, '2020-06-16', '2020-06-23', '2', '3', '2020-06-17 21:41:21', '1'),
(44, '10044', 1, 2, 'Sensores fotoeléctricos desactivados por trabajos (Pab A - Av. Ejército)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:41:42', '1'),
(45, '10045', 1, 2, 'Sensores fotoeléctricos desactivados por trabajos (Puerta Estudiantes - Calle Borgoño)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:46:04', '1'),
(46, '10046', 1, 2, 'Pared con agujeros (Parte inferior) (Pab H - Piso 3 - Costado de SSHH)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:48:12', '1'),
(47, '10047', 1, 2, '02 faros quemados (Pab H - Piso 4 - Escalera de acceso)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:50:02', '1'),
(48, '10048', 1, 2, 'Pared con Humedad (Pab H - Sótano - Debajo de escalera)', 'ok', NULL, '2020-06-16', NULL, '1', '2', '2020-06-17 21:51:02', '1'),
(49, '10049', 1, 2, 'Techo de drywall sin 3 baldosas (Pab H - Aula 401 y 402)', 'opop', 'tarugos', '2020-06-16', NULL, '1', '2', '2020-06-17 21:52:53', '1'),
(50, '10050', 1, 2, 'Techo de drywall sin 1 baldosa (Pab H - Aula 404 y 405)', 'plpl', NULL, '2020-06-16', NULL, '1', '2', '2020-06-17 21:53:39', '1'),
(51, '10051', 1, 2, 'Cambio de 11 fluorescentes (Pab H - Aula 404 y 405)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:54:05', '1'),
(52, '10052', 4, 3, 'Pared rajada (Pab D - Piso 1 - Garita)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:55:06', '1'),
(53, '10053', 4, 3, 'Ladrillo expuesto (Pab D - Piso 1 - Fachada principal)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:55:51', '1'),
(54, '10054', 4, 3, 'Drywall roto en salida vehicular (Pab D - Puerta de salida de vehículos)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:56:24', '1'),
(55, '10055', 4, 3, 'Reflectores no encienden (Pab D - Fachada principal)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 21:57:11', '1'),
(56, '10056', 4, 3, 'Luminarias no encienden (Rampa de ingreso y salida vehicular)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:58:09', '1'),
(57, '10057', 4, 3, 'Pared con rajaduras por casilleros (Pabellón D - Aula DS2)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 21:58:49', '1'),
(58, '10058', 4, 3, 'Resane de pintura en techo por filtración de agua (Pab D - Piso 1 - Pasdizo admisión)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:01:02', '1'),
(59, '10059', 4, 3, 'Baldosa en piso por goteo en techo (Comedor royal)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:05:00', '1'),
(60, '10060', 4, 3, '01 reflector no enciende (Pab D - Piso 2 - rampa peatonal)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:05:35', '1'),
(61, '10061', 4, 3, '01 baldosa en piso por goteo en tubería (Taller de habilidad)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:06:25', '1'),
(62, '10062', 4, 3, 'Fata ventana corrediza (Pab D - Aula D405)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:07:31', '1'),
(63, '10063', 4, 3, 'Pared de ascensor con rayaduras (Pab D - Ascensor Nro 3)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:09:36', '1'),
(64, '10064', 4, 3, 'Poste de wifi con abrazadera rota (Pab D - Piso 1 - Cuarto de AA)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:10:16', '1'),
(65, '10065', 4, 3, 'Goteo en tubería y válvula de agua potable (Pab D - Cuarto de bombas)', '', NULL, '2020-06-16', NULL, '2', '1', '2020-06-17 22:11:07', '1'),
(66, '10066', 4, 3, 'Lámina de luminaria rota en interio del techo de ascensor (Pab A - Ascensor Nro 2)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:12:08', '1'),
(67, '10067', 4, 3, 'Piso de cerámica roto en interior de ascensor (Pab A - Ascensor Nro 2)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:12:37', '1'),
(68, '10068', 4, 3, 'Techo de interior de ascensor ligeramente levantado (Pab A - Ascensor Nro 2)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:13:15', '1'),
(69, '10069', 4, 3, 'Puerta de metal defectuosa (Pab B - Piso 2 - Costado de laboratorio)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:14:07', '1'),
(70, '10070', 4, 3, 'Escalera de gato sin seguro (Pab B - Piso 4)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:14:37', '1'),
(71, '10071', 4, 3, 'Cerradura de tablero eléctrico defectuoso (Pab A - Piso 5 - AA)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:15:31', '1'),
(72, '10072', 4, 3, 'Pared rota (Pab A - Piso 5 - AA)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:20:31', '1'),
(73, '10073', 4, 3, 'Mayólica despegada (Pab A - Escalera entre piso 5 y 6)', '', NULL, '2020-06-16', NULL, '0', '1', '2020-06-17 22:21:47', '1'),
(74, '10074', 4, 3, 'Falta 01 ventana corrediza (Pab C - Piso 6 - Oficina de investigación)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:22:45', '1'),
(75, '10075', 4, 3, 'Pared con riesgo de derrumbe (Pab C - Piso 7 - Costado de biblioteca)', '', NULL, '2020-06-16', NULL, '2', '1', '2020-06-17 22:24:09', '1'),
(76, '10076', 4, 3, 'Cámara de CCTV con imagen borrosa (Pab C - Piso 7 - Pasadizo)', '', NULL, '2020-06-16', NULL, '1', '1', '2020-06-17 22:24:53', '1'),
(77, '10077', 4, 3, 'Recalentamiento de motor de BCI (Pab C - Sótano - Cuarto de bombas)', 'Se mantiene apagada', NULL, '2020-06-16', NULL, '2', '1', '2020-06-17 22:25:36', '1'),
(78, '10078', 8, 4, 'Perímetro sin cerco eléctrico (Perímetro parte externa)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:31:26', '1'),
(79, '10079', 8, 4, 'Falta de señalética de velocidad 10km (Rampa ingreso vehicular)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:32:12', '1'),
(80, '10080', 8, 4, 'Filtración de agua en techo (Pabellón A - Piso 3 - Aula/Laboratorio)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:32:56', '1'),
(81, '10081', 8, 4, 'Plaga de insectos en jardín principal (arañas, avispas, zancudos, mosquitos, moscas y libélula)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:33:45', '1'),
(82, '10082', 8, 4, 'Interruptor averiado (Pab B - Piso 2 - Cuarto de Data Center)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:36:29', '1'),
(83, '10083', 8, 4, 'Vidrio de ventana roto (Pab C - Piso 1 - Taller de Edición)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:37:39', '1'),
(84, '10084', 8, 4, 'Llave de válvula de gas de la parte externa sin tapa (Exterior de ingreso vehicular)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:38:30', '1'),
(85, '10085', 8, 4, 'Tapa metálica en piso despegada (Pab B - Piso 2 - Pasadizo)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:39:06', '1'),
(86, '10086', 8, 4, 'Adoquines fuera de lugar (Entrada principal - parte externa)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:40:12', '1'),
(87, '10087', 8, 4, 'Adoquines fuera de lugar (Pabellón C - Escalera)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:40:25', '1'),
(88, '10088', 8, 4, 'Adoquines fuera de lugar (Parte central del patio)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:40:38', '1'),
(89, '10089', 8, 4, 'Sensor con fallas (Pab C - Piso 1 - Zona 7 por fotografía)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:41:29', '1'),
(90, '10090', 6, 4, 'Mampara derecha descuadrada y mampara izquierda rota (Pab A - Piso 1 - Ingreso Admisión)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:42:34', '1'),
(91, '10091', 6, 4, 'Ventana sin vidrio (Pab A - Piso 4 - Lab. de Estructura)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:43:04', '1'),
(92, '10092', 8, 4, 'Filtración de agua en pared (Pab C - S2 - Parqueo)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:44:35', '1'),
(93, '10093', 6, 4, 'Malla de la puerta del sistema de AA roto (Pab A - Azotea)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:45:16', '1'),
(94, '10094', 6, 4, 'Mampara derecha descuadrada (Pab A - Piso 7 - Pasadizo lado posterior)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:45:46', '1'),
(95, '10095', 6, 4, 'Cerradura de la puerta de tablero eléctrico con avería (Pab A - Piso 7 - Pasadizo)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:47:30', '1'),
(96, '10096', 6, 4, 'Fluorescente por averiarse (Pab B - Piso 8 - SSHH Hombres)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:48:22', '1'),
(97, '10097', 6, 4, 'Sensor de humo averiado según alarma en panel (Pab B - Piso 7 - Pasadizo)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:49:04', '1'),
(98, '10098', 6, 4, 'Ventana externa con vidrio roto (Pab B - Piso 4 - Aula 406)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 22:49:38', '1'),
(99, '10099', 6, 4, 'Puerta descuadrada (Pab D - Piso 3 - Compartimento almacén de gas)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:50:14', '1'),
(100, '10100', 5, 4, '04 focos no encienden (Pab A - Piso 7 - Pasadizo)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:50:55', '1'),
(101, '10101', 5, 4, '10 focos no encienden (Pab B - Piso 7 - Pasadizo)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:51:11', '1'),
(102, '10102', 5, 4, 'Imán de puerta para acceso averiado (Pab B - Piso 7 - Club de cátedra)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:52:17', '1'),
(103, '10103', 5, 4, '12 focos no encienden (Pab A - Piso 6 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:52:41', '1'),
(104, '10104', 5, 4, '10 focos no encienden (Pab B - Piso 6 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:52:55', '1'),
(105, '10105', 5, 4, '12 focos no encienden (Pab A - Piso 5 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:53:16', '1'),
(106, '10106', 5, 4, '10 focos no encienden (Pab B - Piso 5 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:53:28', '1'),
(107, '10107', 5, 4, '06 focos no encienden (Pab A - Piso 4 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:53:44', '1'),
(108, '10108', 5, 4, '10 focos no encienden (Pab B - Piso 4 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:53:57', '1'),
(109, '10109', 5, 4, '12 focos no encienden (Pab A - Piso 3 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:54:10', '1'),
(110, '10110', 5, 4, '10 focos no encienden (Pab B - Piso 3 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:55:05', '1'),
(111, '10111', 5, 4, '10 focos no encienden (Pab A - Piso 2 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:55:16', '1'),
(112, '10112', 5, 4, '10 focos no encienden (Pab B - Piso 2 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:55:28', '1'),
(113, '10113', 5, 4, '12 focos no encienden (Pab A - Piso 1 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:55:43', '1'),
(114, '10114', 5, 4, '10 focos no encienden (Pab B - Piso 1 - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:55:56', '1'),
(115, '10115', 5, 4, '16 focos no encienden (Pab A - Sótano - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:56:23', '1'),
(116, '10116', 5, 4, '02 focos no encienden (Pab B - Sótano - Pasadizo)	', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 22:56:35', '1'),
(117, '10117', 5, 4, '03 monitores encendidos (Pabellón A - SS - Help Desk)	', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 22:59:27', '1'),
(118, '10118', 7, 3, 'Cojines protectores en mal estado (Pabellón B - Cancha de fútbol)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 23:00:03', '1'),
(119, '10119', 7, 3, 'Pared en mal estado (Ingreso vehicular)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 23:00:35', '1'),
(120, '10120', 7, 3, 'Tomacorriente sin tapa y en mal estado (Pasadizo frente a cancha sintética)', '', NULL, '2020-06-17', NULL, '2', '1', '2020-06-17 23:01:15', '1'),
(121, '10121', 7, 3, 'Tapa de inodoro sin ajustar (SSHH Garita de seguridad)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 23:02:09', '1'),
(122, '10122', 7, 3, 'Cerradura de puerta de garita requiere ajuste (Garita de seguridad)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 23:02:45', '1'),
(123, '10123', 7, 3, '01 foco no enciende (Pab A - Audiovisual)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 23:03:07', '1'),
(124, '10124', 7, 3, '02 inodoros sin tapa (Pab A - Taekwondo SSHH Caballeros)', '', NULL, '2020-06-17', NULL, '0', '1', '2020-06-17 23:03:56', '1'),
(125, '10125', 7, 3, 'Luminarias fuera de lugar ocasionado un posible acidente en el entorno (Pab B - Piso 2 - Sobre máquinas expendedoras)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 23:04:39', '1'),
(126, '10126', 7, 3, 'Candado averiado (Ingreso peatonal principal)', '', NULL, '2020-06-17', NULL, '1', '1', '2020-06-17 23:05:07', '1'),
(127, '10127', 4, 3, 'Ascensor con codigo de error (Pab B)', '', NULL, '2020-06-18', '2020-06-18', '1', '3', '2020-06-18 10:46:07', '1'),
(128, '10128', 1, 2, 'renzo', 'Dale', 'tabla', '2020-07-12', '2020-07-13', '1', '3', '2020-06-22 08:30:37', '1'),
(129, '10129', 1, 9, 'prueba 2', 'ok2', NULL, '2020-07-13', NULL, '2', '1', '2020-06-22 08:32:00', '1'),
(130, '10130', 5, 9, 'prueba4', 'comentario3', NULL, '2020-07-14', NULL, '2', '1', '2020-06-22 08:34:02', '1'),
(131, '10131', 3, 9, 'Cisterna de agua con rajaduras - Pabellón B', '', NULL, '2020-07-14', NULL, '1', '1', '2020-06-22 13:58:26', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_sol`
--

CREATE TABLE `lineas_sol` (
  `Lin_nIdLineaSol` int(11) NOT NULL,
  `Lin_Sol_nIdSolicitud` int(11) NOT NULL,
  `Lin_nNroLinea` tinyint(4) NOT NULL,
  `Lin_SubCat_nIdSubCategoria` int(11) NOT NULL,
  `Lin_UExp_nIdUnExp` int(11) NOT NULL,
  `Lin_Dpto_nIdDpto` int(11) NOT NULL,
  `Lin_Proy_nIdProyecto` int(11) NOT NULL,
  `Lin_vDescripcion` varchar(80) CHARACTER SET latin1 NOT NULL,
  `Lin_nCantidad` smallint(6) NOT NULL,
  `Lin_dSubtotal` decimal(8,2) NOT NULL,
  `Lin_dIGV` decimal(8,2) DEFAULT NULL,
  `Lin_dTotal` decimal(8,2) NOT NULL,
  `Lin_dFechaAprob` date DEFAULT NULL,
  `Lin_OC_nIdOrdenCompra` int(11) DEFAULT NULL,
  `Lin_cTipoRecepcion` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `Lin_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas_sol`
--

INSERT INTO `lineas_sol` (`Lin_nIdLineaSol`, `Lin_Sol_nIdSolicitud`, `Lin_nNroLinea`, `Lin_SubCat_nIdSubCategoria`, `Lin_UExp_nIdUnExp`, `Lin_Dpto_nIdDpto`, `Lin_Proy_nIdProyecto`, `Lin_vDescripcion`, `Lin_nCantidad`, `Lin_dSubtotal`, `Lin_dIGV`, `Lin_dTotal`, `Lin_dFechaAprob`, `Lin_OC_nIdOrdenCompra`, `Lin_cTipoRecepcion`, `Lin_cEstado`) VALUES
(1, 103, 1, 354, 1, 2, 1, 'Suministro e instalación de mampara laminada c/cenefa', 1, '1858.00', '334.44', '2192.44', '2020-04-14', 1, '1', '5'),
(2, 104, 1, 354, 1, 2, 1, 'Suministro e instalación de 6 detectores de humo (Pab A)', 1, '6155.30', '1107.95', '7263.25', '2020-04-17', 108, '1', '5'),
(3, 102, 1, 354, 1, 2, 1, 'Suministro de combustible para GE por MP subestación (Pab B)', 1, '539.35', '97.08', '636.43', '2020-04-14', 2, '1', '5'),
(4, 101, 1, 151, 1, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-06-16', 228, '1', '5'),
(5, 100, 1, 354, 1, 2, 1, 'Alquiler de 1 Grupo Electrógeno 110KW II (48 horas) INDECI', 1, '8000.00', '1440.00', '9440.00', '2020-03-14', 3, '1', '5'),
(6, 99, 1, 354, 1, 2, 1, 'Alquiler de 1 Grupo Electrógeno 110KW I (48 horas) INDECI', 1, '8000.00', '1440.00', '9440.00', '2020-03-14', 4, '1', '5'),
(7, 98, 1, 354, 1, 2, 1, 'Alquiler de 1 Grupo Electrógeno 150KW (48 horas) INDECI', 1, '25806.00', '4645.08', '30451.08', '2020-03-14', 5, '1', '5'),
(8, 97, 1, 354, 1, 2, 1, 'Alquiler de 1 Grupo Electrógeno 135KW (48 horas) INDECI', 1, '19170.00', '3450.60', '22620.60', '2020-03-14', 6, '1', '5'),
(9, 96, 1, 354, 1, 2, 1, 'INDECI Suministro de Materiales para SSGG (Observaciones 2)', 1, '6749.91', '1214.98', '7964.89', '2020-03-12', 7, '1', '5'),
(10, 95, 1, 157, 1, 2, 1, 'Servicio de fumigación, desratización y desinfección de plagas', 1, '2600.00', '468.00', '3068.00', '2020-03-12', 8, '1', '5'),
(11, 94, 1, 354, 1, 2, 1, 'Suministro e instalación de 6 detectores de humo (Pab B y F)', 1, '5630.87', '1013.56', '6644.43', '2020-03-12', 9, '1', '5'),
(12, 93, 1, 354, 1, 2, 1, 'Suministro e Instalacion de 8 Detectores Humo (Pab A)', 1, '7507.83', '1351.41', '8859.24', '2020-03-12', 10, '1', '5'),
(13, 92, 1, 161, 1, 4, 5, 'Papelera de 60 litros color crema (SSHH)', 10, '800.00', '144.00', '944.00', '2020-03-04', 11, '1', '3'),
(14, 91, 1, 161, 1, 4, 5, 'Papelera de Malla Metálica para Oficina Negro (Aulas)', 24, '453.60', '81.65', '535.25', '2020-03-04', 12, '1', '3'),
(15, 90, 1, 354, 1, 4, 5, 'Suministro e instalación de 48 rollers blackout importado (Pab H Exp)', 1, '22372.88', '4027.12', '26400.00', '2020-03-05', 13, '1', '3'),
(16, 89, 1, 191, 1, 4, 5, 'Extintores de 6kg PQS (Nacional)', 12, '1525.42', '274.58', '1800.00', '2020-03-04', 14, '1', '3'),
(17, 89, 2, 191, 1, 4, 5, 'Extintores de 15lb CO2 (Importado)', 8, '3254.24', '585.76', '3840.00', '2020-03-04', 14, '1', '3'),
(18, 89, 3, 191, 1, 4, 5, 'Señaléticas para extintor fotoluminiscentes', 20, '305.08', '54.91', '359.99', '2020-03-04', 14, '1', '3'),
(19, 89, 4, 191, 1, 4, 5, 'Pedestal de metal para extintor', 12, '2135.59', '384.41', '2520.00', '2020-03-04', 14, '1', '3'),
(20, 88, 1, 354, 1, 4, 5, 'Servicio de Instalación de pizarra acrílica en drywall/concreto', 10, '820.00', '147.60', '967.60', '2020-03-04', 15, '1', '3'),
(21, 87, 1, 334, 1, 4, 5, 'Acrílicos transparente portahorario tamaño A4 (Estandar Aulas)', 15, '375.00', '67.50', '442.50', '2020-03-04', 16, '1', '3'),
(22, 87, 2, 334, 1, 4, 5, 'Acrílico negro rotulado con vinilo amarillo calado (Aula + Aforo)', 15, '420.00', '75.60', '495.60', '2020-03-04', 16, '1', '3'),
(23, 86, 1, 150, 1, 1, 1, 'Servicio de Cableado Estructurado en Oficina Marketing (01 punto)', 1, '623.52', '112.23', '735.75', '2020-03-11', 17, '1', '3'),
(24, 85, 1, 178, 1, 1, 1, 'Papel higienico Elite Jumbo longitud 500m (Paq. de 4 rollos)', 100, '1693.00', '304.74', '1997.74', '2020-03-03', 18, '1', '5'),
(25, 85, 2, 355, 1, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos)', 100, '1864.00', '335.52', '2199.52', '2020-03-03', 18, '1', '5'),
(26, 84, 1, 354, 1, 2, 1, 'Acondicionamiento de ventanas e instalación de block de vidrios (Pab F)', 1, '9470.48', '1704.69', '11175.17', '2020-03-12', 19, '1', '5'),
(27, 83, 1, 354, 1, 2, 1, 'Implementación de sistema de alarma en puertas de evacuación Pab F', 1, '4713.12', '848.36', '5561.48', '2020-03-03', 20, '1', '5'),
(28, 82, 1, 354, 1, 2, 1, 'MC pozo tierra de Grupo Electrógeno ', 1, '1272.76', '229.10', '1501.86', '2020-03-02', 21, '1', '5'),
(29, 81, 1, 354, 1, 2, 1, 'Aterramiento de equipos, luminarias, motores y estructuras varias', 1, '7621.20', '1371.82', '8993.02', '2020-03-03', 22, '1', '5'),
(30, 80, 1, 354, 1, 2, 1, 'Aterramiento de 18 estructuras de AA (Pab A)', 1, '6000.00', '1080.00', '7080.00', '2020-03-03', 23, '1', '5'),
(31, 79, 1, 354, 1, 2, 1, 'Aterramiento de 18 estructuras de AA (Pab B)', 1, '6000.00', '1080.00', '7080.00', '2020-03-03', 24, '1', '5'),
(32, 78, 1, 354, 1, 2, 1, 'Aterramiento de 20 estructuras de AA (Pab E, F y G)', 1, '7143.00', '1285.74', '8428.74', '2020-03-03', 25, '1', '5'),
(33, 77, 1, 245, 1, 4, 5, 'Rack universal para proyector (aulas Pab H Exp)', 9, '1086.12', '195.50', '1281.62', '2020-03-04', 26, '1', '3'),
(34, 76, 1, 151, 1, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-03-02', 27, '1', '5'),
(35, 44, 1, 152, 1, 1, 1, 'Reparación de contacto eléctrico para amortiguador de cabina', 1, '593.22', '106.78', '700.00', '2020-02-03', 28, '1', '5'),
(36, 34, 1, 151, 1, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-01-28', 29, '1', '5'),
(37, 7, 1, 151, 1, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-01-06', 30, '1', '5'),
(38, 75, 1, 354, 1, 2, 1, 'Reubicación de transformador termomagnético e instalación de ITM (Bomba Pab C)', 1, '7626.20', '1372.72', '8998.92', '2020-03-03', 31, '1', '5'),
(39, 74, 1, 354, 1, 2, 1, 'Suministro de 18 switchs 8puertos TP-LINK por reubicación de oficinas', 1, '823.73', '148.27', '972.00', '2020-03-02', 32, '1', '5'),
(40, 73, 1, 354, 1, 2, 1, 'Suministro y montaje de barras de cobre a TG', 1, '1533.60', '276.05', '1809.65', '2020-03-02', 33, '1', '5'),
(41, 72, 1, 354, 1, 2, 1, 'Resane y cambio de pared de drywall en centro de acopio (Pab C)', 1, '1263.68', '227.46', '1491.14', '2020-02-27', 34, '1', '5'),
(42, 71, 1, 354, 1, 2, 1, 'Instalación de guardahombre, barandas, cambio de vidrio y fijacion de bomba', 1, '2520.00', '453.60', '2973.60', '2020-02-27', 35, '1', '5'),
(43, 70, 1, 354, 1, 2, 1, 'Instalación y suministro de manómetro y aterramiento de bomba SCI (Pab C)', 1, '2217.60', '399.17', '2616.77', '2020-01-27', 36, '1', '5'),
(44, 69, 1, 354, 1, 2, 1, 'Suministro e instalación de 22 gabinetes y 41 señaléticas', 1, '5198.75', '935.78', '6134.53', '2020-01-27', 37, '1', '5'),
(45, 68, 1, 354, 1, 1, 1, 'Actualización y numeración de planos de pozos a tierra (Pab A al G)', 1, '162.00', '29.16', '191.16', '2020-03-02', 38, '1', '5'),
(46, 67, 1, 354, 1, 2, 1, 'MC de portón metálico y cambio de chapa en subestación', 1, '2370.60', '426.71', '2797.31', '2020-02-24', 39, '1', '5'),
(47, 66, 1, 354, 1, 2, 1, 'Suministro de materiales SSGG por observaciones INDECI', 1, '7359.19', '1324.65', '8683.84', '2020-02-24', 40, '1', '5'),
(48, 65, 1, 354, 1, 1, 1, 'Instalación de vinil arenado y pavonado en 3 mamparas', 1, '235.13', '42.32', '277.45', '2020-02-24', 41, '1', '5'),
(49, 64, 1, 354, 1, 1, 1, 'Reubicacion de estabilizador en cuarto eléctrico Pab D Piso 1 y puerta de LC1', 1, '1836.00', '330.48', '2166.48', '2020-02-20', 42, '1', '5'),
(50, 63, 1, 354, 1, 1, 1, 'Rebobinado, bombeo de respaldo e instalación de bomba en pozo séptico (Pab F)', 1, '4082.00', '734.76', '4816.76', '2020-02-20', 43, '1', '5'),
(51, 62, 1, 245, 1, 1, 1, 'Watson MX AA NiMH Batteries and 8-Bay Rapid Charger Kit WATSON', 6, '516.00', '92.88', '608.88', '2020-02-21', 44, '1', '3'),
(52, 62, 2, 245, 1, 1, 1, 'Micrófono de mano Shure SM58', 2, '264.00', '47.52', '311.52', '2020-02-21', 44, '1', '3'),
(53, 62, 3, 245, 1, 1, 1, 'Pizarra acrílica blanca con caballete móvil ', 2, '230.00', '41.40', '271.40', '2020-02-21', 44, '1', '3'),
(54, 62, 4, 245, 1, 1, 1, 'Escalera de tijera REDLINE de aluminio 4 Pasos', 2, '134.00', '24.12', '158.12', '2020-02-21', 44, '1', '3'),
(55, 61, 1, 245, 1, 1, 1, 'Lámpara FKJ (CP/71) (1,000W / 230V) OSRAM', 4, '216.00', '38.88', '254.88', '2020-02-21', 45, '1', '3'),
(56, 61, 2, 245, 1, 1, 1, 'Lámpara FRL (650W/230V) OSRAM', 6, '180.00', '32.40', '212.40', '2020-02-21', 45, '1', '3'),
(57, 61, 3, 245, 1, 1, 1, 'Lámpara CP81 Lamp - 300 watts/220 volts ARRI', 4, '252.00', '45.36', '297.36', '2020-02-21', 45, '1', '3'),
(58, 61, 4, 245, 1, 1, 1, 'Auray DUSM-1 Universal Shock Mount for Camera Shoes and Boompoles', 2, '72.00', '12.96', '84.96', '2020-02-21', 45, '1', '3'),
(59, 61, 5, 245, 1, 1, 1, 'Auray ABP-59B Aluminum Telescoping Boom Pole with Integrated XLR Cable (9&#39;)', 2, '400.00', '72.00', '472.00', '2020-02-21', 45, '1', '3'),
(60, 61, 6, 245, 1, 1, 1, 'Pearstone Active Braided High Speed Mini HDMI to HDMI Cable with Ethernet - 15\'', 4, '136.00', '24.48', '160.48', '2020-02-21', 45, '1', '3'),
(61, 61, 7, 245, 1, 1, 1, 'Shure PS6 Popper Stopper Pop Filter, 6&#34;/4-Layer Screen, Gooseneck and Clamp', 6, '270.00', '48.60', '318.60', '2020-02-21', 45, '1', '3'),
(62, 61, 8, 245, 1, 1, 1, 'Matthews Super Mafer Clamp with Baby (5/8&#34;) Pin', 5, '245.00', '44.10', '289.10', '2020-02-21', 45, '1', '3'),
(63, 60, 1, 182, 1, 1, 1, 'Pulsioximetro Portatil Marca RIESTER', 1, '466.10', '83.90', '550.00', '2020-02-19', 46, '1', '5'),
(64, 59, 1, 354, 1, 1, 1, 'Mantenimiento de caseta de melamine e instalación de sombrilla', 1, '450.00', '81.00', '531.00', '2020-02-17', 47, '1', '3'),
(65, 58, 1, 354, 1, 2, 1, 'MC de 3 pozos a tierra (Pab C)', 1, '2983.50', '537.03', '3520.53', '2020-02-19', 48, '1', '5'),
(66, 57, 1, 354, 1, 2, 1, 'MC de 3 pozos a tierra (Pab A)', 1, '2983.50', '537.03', '3520.53', '2020-02-19', 49, '1', '5'),
(67, 56, 1, 354, 1, 2, 1, 'Elaboración de 2 pozos a tierra (Pab E)', 1, '2983.50', '537.03', '3520.53', '2020-02-19', 50, '1', '5'),
(68, 55, 1, 354, 1, 2, 1, 'Elaboración de 2 pozos a tierra (Pab B)', 1, '2983.50', '537.03', '3520.53', '2020-02-19', 51, '1', '5'),
(69, 54, 1, 354, 1, 1, 1, 'MC aterramiento de equipos de AA - INDECI', 1, '6998.40', '1259.71', '8258.11', '2020-02-19', 52, '1', '5'),
(70, 53, 1, 175, 1, 1, 1, 'Agua en Botellón (bidón retornable) de 20 Litros (liquido)', 250, '2337.50', '420.75', '2758.25', '2020-02-14', 53, '1', '4'),
(71, 52, 1, 334, 1, 1, 1, 'Display acrílico tamaño A3 transparente doblado en V con riel de aluminio', 3, '195.00', '35.10', '230.10', '2020-02-12', 54, '1', '5'),
(72, 51, 1, 156, 1, 1, 1, 'Servicio de mantenimiento de caja fuerte (Caja EM y SI)', 6, '1647.46', '296.54', '1944.00', '2020-02-12', 55, '1', '3'),
(73, 50, 1, 354, 1, 2, 1, 'Suministro de Materiales para SSGG', 1, '4332.00', '779.76', '5111.76', '2020-02-10', 56, '1', '5'),
(74, 49, 1, 161, 1, 1, 1, 'Papelera de malla metálica para oficina negro (Aulas y oficinas)', 24, '453.60', '81.65', '535.25', '2020-02-24', 57, '1', '3'),
(75, 48, 1, 354, 1, 2, 1, 'Instalación de extintores y señaléticas en azoteas (INDECI)', 1, '6225.93', '1120.67', '7346.60', '2020-02-05', 58, '1', '5'),
(76, 47, 1, 168, 1, 1, 1, 'Servicio de recarga de 15 extintores (08 PQS y 07 CO2)', 1, '868.64', '156.36', '1025.00', '2020-02-05', 59, '1', '5'),
(77, 46, 1, 354, 1, 1, 1, 'Servicio de Mantenimiento de Logo Volumétrico', 1, '600.00', '108.00', '708.00', '2020-02-06', 60, '1', '3'),
(78, 46, 2, 354, 1, 1, 1, 'Servicio de Producción de Letrero Exterior (Letras volumétricas)', 1, '1500.00', '270.00', '1770.00', '2020-02-06', 60, '1', '3'),
(79, 45, 1, 182, 1, 1, 1, 'Frasco de agua oxigenada (120ml)', 6, '10.17', '1.83', '12.00', '2020-02-14', 61, '1', '5'),
(80, 45, 2, 182, 1, 1, 1, 'Frasco de alcohol 70° (120ml)', 2, '3.05', '0.55', '3.60', '2020-02-14', 61, '1', '5'),
(81, 45, 3, 182, 1, 1, 1, 'Tira adhesiva sanitaria (Curitas) x 100 unidades', 1, '6.78', '1.22', '8.00', '2020-02-14', 61, '1', '5'),
(82, 45, 4, 182, 1, 1, 1, 'Gasa esterilizada (Paquete 10cmx10cm)', 32, '35.25', '6.35', '41.60', '2020-02-14', 61, '1', '5'),
(83, 45, 5, 182, 1, 1, 1, 'Apósito mediano (Paquete 10cmx10cm)', 9, '38.14', '6.87', '45.01', '2020-02-14', 61, '1', '5'),
(84, 45, 6, 182, 1, 1, 1, 'Algodon bolsa 100gr', 9, '45.76', '8.24', '54.00', '2020-02-14', 61, '1', '5'),
(85, 45, 7, 182, 1, 1, 1, 'Esparadrapo antialérgico (Rollo 2.5cm x 5m)', 8, '47.46', '8.54', '56.00', '2020-02-14', 61, '1', '5'),
(86, 45, 8, 182, 1, 1, 1, 'Venda elástica (Rollo 2&#34; x 5 yardas)', 3, '3.31', '0.60', '3.91', '2020-02-14', 61, '1', '5'),
(87, 45, 9, 182, 1, 1, 1, 'Venda elástica (Rollo 4&#34; x 5 yardas)', 9, '15.25', '2.75', '18.00', '2020-02-14', 61, '1', '5'),
(88, 45, 10, 182, 1, 1, 1, 'Diclofenaco en gel – crema', 9, '91.53', '16.48', '108.01', '2020-02-14', 61, '1', '5'),
(89, 45, 11, 182, 1, 1, 1, 'Sulfanil (sulfacrem) x 20g', 9, '102.97', '18.53', '121.50', '2020-02-14', 61, '1', '5'),
(90, 45, 12, 182, 1, 1, 1, 'Siverdiazinaal 1% x 25gr', 9, '167.80', '30.20', '198.00', '2020-02-14', 61, '1', '5'),
(91, 45, 13, 182, 1, 1, 1, 'Tijera punta roma', 1, '13.56', '2.44', '16.00', '2020-02-14', 61, '1', '5'),
(92, 45, 14, 182, 1, 1, 1, 'Termómetro', 9, '38.14', '6.87', '45.01', '2020-02-14', 61, '1', '5'),
(93, 45, 15, 182, 1, 1, 1, 'Guantes de látex no estériles', 10, '135.59', '24.41', '160.00', '2020-02-14', 61, '1', '5'),
(94, 43, 1, 354, 1, 1, 1, 'Soporte y MP anual de antenas de seguridad y bookcheck 3M (Pab F)', 1, '1500.00', '270.00', '1770.00', '2020-02-03', 62, '1', '5'),
(95, 42, 1, 354, 1, 2, 1, 'MC de grupo electrógeno DC (cambio de tarjeta de visor)', 1, '5723.37', '1030.21', '6753.58', '2020-01-31', 63, '1', '5'),
(96, 41, 1, 354, 1, 2, 1, 'Adicionales de extintores y señaléticas según mapa de riesgos INDECI', 1, '3581.28', '644.63', '4225.91', '2020-01-31', 64, '1', '5'),
(97, 40, 1, 1, 1, 1, 1, 'MP de 25 equipos de laboratorios PROA (cámaras)', 1, '2898.30', '521.69', '3419.99', '2020-01-31', 65, '1', '5'),
(98, 39, 1, 354, 1, 1, 1, 'Servicio de fabricación de toldo de lona pesado de 5x3m', 1, '1059.32', '190.68', '1250.00', '2020-02-11', 66, '1', '5'),
(99, 39, 2, 354, 1, 1, 1, 'Servicio de fabricación de toldo de lona pesado de 6x3.5m', 1, '1228.81', '221.19', '1450.00', '2020-02-11', 66, '1', '5'),
(100, 38, 1, 153, 1, 1, 1, 'Mantenimiento de carpetas (Pab H)', 35, '2313.56', '416.44', '2730.00', '2020-01-31', 67, '1', '5'),
(101, 38, 2, 153, 1, 1, 1, 'Servicio de fabricación de tableros para carpetas personales (Pab H)', 3, '241.53', '43.48', '285.01', '2020-01-31', 67, '1', '5'),
(102, 38, 3, 153, 1, 1, 1, 'Mantenimiento de sillas giratorias (Pab H)', 30, '2720.34', '489.66', '3210.00', '2020-01-31', 67, '1', '5'),
(103, 38, 4, 153, 1, 1, 1, 'Mantenimiento de sillas apilables (Pab H)', 5, '546.61', '98.39', '645.00', '2020-01-31', 67, '1', '5'),
(104, 38, 5, 153, 1, 1, 1, 'Mantenimiento de sillas apilables en general', 15, '559.32', '100.68', '660.00', '2020-01-31', 67, '1', '5'),
(105, 38, 6, 153, 1, 1, 1, 'Mantenimiento de mesas de dibujo (Pab H)', 40, '4949.15', '890.85', '5840.00', '2020-01-31', 67, '1', '5'),
(106, 37, 1, 169, 1, 1, 1, 'Escalera de seguridad tipo tijera de 3 pasos', 2, '331.78', '59.72', '391.50', '2020-02-11', 68, '1', '3'),
(107, 36, 1, 148, 1, 1, 1, 'Mantenimiento de persianas (oficinas)', 1, '2838.98', '511.02', '3350.00', '2020-01-29', 69, '1', '5'),
(108, 36, 2, 148, 1, 1, 1, 'Suministro e instalación de 35 cortinas', 1, '3855.93', '694.07', '4550.00', '2020-01-29', 69, '1', '5'),
(109, 35, 1, 178, 1, 1, 1, 'Papel higienico Elite Jumbo longitud 500m (Paq. de 4 rollos)', 100, '1693.00', '304.74', '1997.74', '2020-01-28', 70, '1', '5'),
(110, 35, 2, 355, 1, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos)', 100, '1864.00', '335.52', '2199.52', '2020-01-28', 70, '1', '5'),
(111, 8, 1, 178, 1, 1, 1, 'Papel higienico Elite Jumbo longitud 500m (Paq. de 4 rollos)', 90, '1523.70', '274.27', '1797.97', '2020-01-08', 71, '1', '5'),
(112, 8, 2, 355, 1, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos)', 110, '2050.40', '369.07', '2419.47', '2020-01-08', 71, '1', '5'),
(113, 33, 1, 354, 1, 1, 1, 'Suministro y confeccion de estacas y soga para cercar área verde (50m2)', 1, '450.00', '81.00', '531.00', '2020-01-28', 72, '1', '5'),
(114, 32, 1, 354, 1, 2, 1, 'Instalación de mampara en Telemarketing (vidrio templado)', 1, '3920.00', '705.60', '4625.60', '2020-01-28', 73, '1', '5'),
(115, 31, 1, 354, 1, 2, 1, 'Suministro e instalación de protectores para luces de emergencia ante lluvias', 1, '423.50', '76.23', '499.73', '2020-01-28', 74, '1', '5'),
(116, 30, 1, 354, 1, 2, 1, 'Instalación de barandas y protectores en ventanas y pasamanos LC (Pab A)', 1, '684.00', '123.12', '807.12', '2020-01-28', 75, '1', '5'),
(117, 29, 1, 354, 1, 2, 1, 'MP de infraestructura y limpieza de GE', 1, '3364.80', '605.66', '3970.46', '2020-01-28', 76, '1', '5'),
(118, 28, 1, 168, 1, 1, 1, 'Extintores de 6kg (PQS)', 9, '1144.07', '205.93', '1350.00', '2020-01-28', 77, '1', '5'),
(119, 28, 2, 168, 1, 1, 1, 'Servicio de recarga de 22 extintores (13 PQS, 8 CO2 y 1 AC)', 1, '1300.85', '234.15', '1535.00', '2020-01-28', 77, '1', '5'),
(120, 28, 3, 168, 1, 1, 1, 'Extintor de 15lb (CO2)', 1, '406.78', '73.22', '480.00', '2020-01-28', 77, '1', '5'),
(121, 27, 1, 354, 1, 2, 1, 'Instalación de sensores de temperatura en cafetín y GE (INDECI)', 1, '1428.00', '257.04', '1685.04', '2020-01-28', 78, '1', '5'),
(122, 26, 1, 354, 1, 2, 1, 'Instalación de estructura de drywall y puerta en LC1 (INDECI)', 1, '3240.00', '583.20', '3823.20', '2020-01-28', 79, '1', '5'),
(123, 25, 1, 354, 1, 2, 1, 'MP campana extractora cafetín (Pab F)', 1, '1770.00', '318.60', '2088.60', '2020-01-28', 80, '1', '5'),
(124, 105, 1, 153, 1, 1, 1, 'Mantenimiento de 8 bancas fijas (estructura y madera)', 1, '1040.00', '187.20', '1227.20', '2020-01-28', 81, '1', '5'),
(125, 105, 2, 153, 1, 1, 1, 'Suministro de listones de madera de pino', 1, '720.00', '129.60', '849.60', '2020-01-28', 81, '1', '5'),
(126, 105, 3, 153, 1, 1, 1, 'Mantenimiento de 14 mesas con techo 2mx2m', 1, '3080.00', '554.40', '3634.40', '2020-01-28', 81, '1', '5'),
(127, 105, 4, 153, 1, 1, 1, 'Mantenimiento de 39 bancas 1.5mx0.3m (estructura y tablero de madera)', 1, '3120.00', '561.60', '3681.60', '2020-01-28', 81, '1', '5'),
(128, 105, 5, 153, 1, 1, 1, 'Mantenimiento de 13 mesas 1.5mx0.5mx0.7m (estructura y tablero) Pab H', 1, '1560.00', '280.80', '1840.80', '2020-01-28', 81, '1', '5'),
(129, 105, 6, 153, 1, 1, 1, 'Mantenimiento de 50 bancas 1.5mx0.3m (estructura y tablero de madera) Pab H', 1, '4000.00', '720.00', '4720.00', '2020-01-28', 81, '1', '5'),
(130, 106, 1, 354, 1, 1, 1, 'Servicio de remodelación de Lab. de Fotografía', 1, '11100.00', '1998.00', '13098.00', '2020-01-23', 82, '1', '5'),
(131, 107, 1, 206, 1, 1, 1, 'Silla Brescia con apoya cabeza color negro', 2, '894.92', '161.09', '1056.01', '2020-01-29', 83, '1', '5'),
(132, 108, 1, 230, 1, 1, 1, 'Zapatos de seguridad talla 41 REDLINE', 1, '185.00', '33.30', '218.30', '2020-02-13', 84, '1', '5'),
(133, 108, 2, 230, 1, 1, 1, 'Zapatos de seguridad y dieléctricos talla 40', 1, '195.00', '35.10', '230.10', '2020-02-13', 84, '1', '5'),
(134, 108, 3, 230, 1, 1, 1, 'Faja talla XL', 1, '45.00', '8.10', '53.10', '2020-02-13', 84, '1', '5'),
(135, 108, 4, 230, 1, 1, 1, 'Pantalón de trabajo jean industrial con cinta reflexiva talla 38', 2, '84.00', '15.12', '99.12', '2020-02-13', 84, '1', '5'),
(136, 108, 5, 230, 1, 1, 1, 'Pantalón de trabajo jean industrial con cinta reflexiva talla 32', 2, '76.00', '13.68', '89.68', '2020-02-13', 84, '1', '5'),
(137, 108, 6, 230, 1, 1, 1, 'Polo de trabajo azul manga larga talla XL', 2, '50.00', '9.00', '59.00', '2020-02-13', 84, '1', '5'),
(138, 108, 7, 230, 1, 1, 1, 'Polo de trabajo azul manga larga talla M', 2, '50.00', '9.00', '59.00', '2020-02-13', 84, '1', '5'),
(139, 108, 8, 230, 1, 1, 1, 'Gorro de protección contra golpes', 2, '130.00', '23.40', '153.40', '2020-02-13', 84, '1', '5'),
(140, 108, 9, 230, 1, 1, 1, 'Guantes de protección anticortes', 2, '64.00', '11.52', '75.52', '2020-02-13', 84, '1', '5'),
(141, 108, 10, 230, 1, 1, 1, 'Transporte a sede Trujillo', 1, '160.00', '28.80', '188.80', '2020-02-13', 84, '1', '5'),
(142, 109, 1, 354, 1, 1, 1, 'Mantenimiento de 24 tachos de basura (soldadura, lijado y pintado)', 1, '2240.00', '403.20', '2643.20', '2020-02-06', 85, '1', '5'),
(143, 24, 1, 209, 1, 1, 1, 'Lavado de Cortinas (incl. secado, planchado, reconfección e instalación)', 301, '5101.69', '918.30', '6019.99', '2020-01-22', 86, '1', '5'),
(144, 23, 1, 254, 1, 1, 1, 'Conference Microphone CMTECK USB Computer CM003', 1, '159.00', '28.62', '187.62', '2020-01-23', 87, '1', '5'),
(145, 22, 1, 156, 1, 1, 1, 'Copias de llaves de puertas de oficinas, aulas, laboratorios en general', 200, '1000.00', '180.00', '1180.00', '2020-01-23', 88, '1', '3'),
(146, 21, 1, 354, 1, 2, 1, 'Combustible por emergencia para Grupos Electrógenos', 1, '387.93', '69.83', '457.76', '2020-01-21', 89, '1', '5'),
(147, 20, 1, 354, 1, 2, 1, 'Suministro de Materiales para SSGG', 1, '3160.36', '568.86', '3729.22', '2020-01-17', 90, '1', '5'),
(148, 19, 1, 354, 1, 2, 1, 'Reparación de pared y espejo por deterioro SSHH Pab H Piso 1', 1, '1898.40', '341.71', '2240.11', '2020-01-17', 91, '1', '5'),
(149, 18, 1, 354, 1, 2, 1, 'MC por fuga en SSHH Pab A Piso 3 (Fac. Negocios)', 1, '598.00', '107.64', '705.64', '2020-01-17', 92, '1', '5'),
(150, 17, 1, 354, 1, 2, 1, 'Reubicación de 2 cámaras CCTV (Sistemas y HD)', 1, '810.00', '145.80', '955.80', '2020-01-15', 93, '1', '5'),
(151, 16, 1, 206, 1, 1, 1, 'Módulo de escritorio corrido de Club de Cátedra 5 personas MT86', 2, '3135.60', '564.41', '3700.01', '2020-01-15', 94, '1', '3'),
(152, 15, 1, 354, 1, 2, 1, 'Suministro e instalación de tablero eléctrico (TECAP y Acreditación)', 1, '7339.68', '1321.14', '8660.82', '2020-01-14', 95, '1', '5'),
(153, 14, 1, 354, 1, 2, 1, 'Ampliación de sensores de humo (Pab A y F)', 1, '13224.00', '2380.32', '15604.32', '2020-01-13', 96, '1', '5'),
(154, 13, 1, 354, 1, 2, 1, 'MC de 2 equipos de AA (Pab H)', 1, '5831.50', '1049.67', '6881.17', '2020-01-13', 97, '1', '5'),
(155, 12, 1, 354, 1, 2, 1, 'MC de 7 equipos de AA (Pab H)', 1, '4528.95', '815.21', '5344.16', '2020-01-13', 98, '1', '5'),
(156, 11, 1, 354, 1, 2, 1, 'Elaboración de memorias descriptivas del SCI', 1, '1308.00', '235.44', '1543.44', '2020-01-13', 99, '1', '5'),
(157, 10, 1, 354, 1, 2, 1, 'Reubicación de mobiliario y conexión eléctrica (Sistemas)', 1, '1633.00', '293.94', '1926.94', '2020-01-13', 100, '1', '5'),
(158, 9, 1, 161, 1, 1, 1, 'Jabón líquido ELITE glicerina 2x5L (Galón)', 12, '475.92', '85.67', '561.59', '2020-01-06', 101, '1', '5'),
(159, 1, 1, 354, 1, 2, 1, 'Cambio por Emergencia de Bomba de Agua (TECAP y Acreditación)', 1, '2892.25', '520.61', '3412.86', '2020-01-13', 102, '1', '5'),
(160, 6, 1, 195, 1, 1, 1, 'Consumo de Combustible en Campus (Enero a Diciembre 2020)', 1, '10169.49', '1830.51', '12000.00', '2020-01-14', 103, '2', '4'),
(161, 5, 1, 288, 1, 1, 1, 'Servicio de tv por cable (1 servicio)', 1, '935.59', '168.41', '1104.00', '2020-02-05', 104, '2', '4'),
(162, 4, 1, 225, 1, 1, 1, 'Impuesto Predial SATT (El Molino)', 1, '42000.00', '0.00', '42000.00', '2020-01-13', 105, '2', '5'),
(163, 3, 1, 236, 1, 1, 1, 'Servicio de agua potable y alcantarillado', 1, '159618.64', '28731.36', '188350.00', '2020-01-16', 106, '2', '4'),
(164, 2, 1, 234, 1, 1, 1, 'Servicio de energía eléctrica', 1, '402600.85', '72468.15', '475069.00', '2020-01-16', 107, '2', '4'),
(165, 110, 1, 354, 1, 2, 1, 'Suministro e instalación de barandas adicionales (Pab G)', 1, '1980.00', '356.40', '2336.40', '2020-04-23', 110, '1', '5'),
(166, 111, 1, 178, 2, 1, 1, 'Papel higienico Elite Jumbo longitud 500m (Paq. de 4 rollos)', 160, '2708.80', '487.58', '3196.38', '2020-01-06', 109, '1', '5'),
(167, 111, 2, 355, 2, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos)', 30, '559.20', '100.66', '659.86', '2020-01-06', 109, '1', '5'),
(168, 112, 1, 161, 2, 1, 1, 'Jabón líquido ELITE glicerina 2x5L (Galón)', 5, '198.30', '35.69', '233.99', '2020-01-03', 111, '1', '5'),
(169, 113, 1, 234, 1, 1, 1, 'Servicio de energía eléctrica 2020 (Inafecto)', 1, '7600.00', '0.00', '7600.00', '2020-01-14', 112, '2', '4'),
(170, 114, 1, 151, 2, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-01-03', 113, '1', '5'),
(171, 115, 1, 159, 2, 1, 1, 'Eliminación de desmonte enero', 1, '423.73', '76.27', '500.00', '2020-01-06', 114, '1', '5'),
(172, 116, 1, 234, 2, 1, 1, 'Servicio de energía eléctrica', 1, '244237.29', '43962.71', '288200.00', '2020-01-16', 115, '2', '4'),
(173, 117, 1, 234, 2, 1, 1, 'Servicio de energía eléctrica (Inafecto)', 1, '4600.00', '0.00', '4600.00', '2020-01-14', 116, '2', '4'),
(174, 118, 1, 236, 2, 1, 1, 'Servicio de agua potable y alcantarillado', 1, '60932.20', '10967.80', '71900.00', '2020-01-13', 117, '2', '4'),
(175, 119, 1, 236, 2, 1, 1, 'Servicio de agua y alcantarillado campus si (inafecto)', 1, '100.00', '0.00', '100.00', '2020-01-09', 118, '2', '3'),
(176, 120, 1, 194, 2, 1, 1, 'Consumo de Combustible en Campus (Enero a Diciembre 2020)', 1, '26694.92', '4805.09', '31500.01', '2020-01-15', 119, '2', '4'),
(177, 121, 1, 222, 2, 1, 1, 'Impuesto Predial SATT (Sa Isidro)', 1, '28000.00', '0.00', '28000.00', '2020-01-13', 120, '2', '4'),
(178, 122, 1, 288, 2, 1, 1, 'Servicio de tv por cable (2 servicios)', 1, '752.54', '135.46', '888.00', '2020-02-05', 121, '2', '4'),
(179, 123, 1, 1, 2, 1, 1, 'Reparacion estación total servo S3', 1, '290.00', '52.20', '342.20', '2020-01-13', 122, '1', '5'),
(180, 123, 2, 1, 2, 1, 1, 'Reparación de 3 nivel automático spectra precision al series', 3, '156.00', '28.08', '184.08', '2020-01-13', 122, '1', '5'),
(181, 124, 1, 153, 2, 1, 1, 'Mant. carpetas unipersonales', 1, '996.00', '179.28', '1175.28', '2020-01-13', 123, '1', '5'),
(182, 124, 2, 153, 2, 1, 1, 'Mant. silla fija movie', 1, '285.00', '51.30', '336.30', '2020-01-13', 123, '1', '5'),
(183, 124, 3, 153, 2, 1, 1, 'Mant. bancos redondos con espaldar', 1, '2450.00', '441.00', '2891.00', '2020-01-13', 123, '1', '5'),
(184, 124, 4, 153, 2, 1, 1, 'MP Pizarra movil', 1, '170.00', '30.60', '200.60', '2020-01-13', 123, '1', '5'),
(185, 124, 5, 153, 2, 1, 1, 'MP Pizarra fija', 1, '140.00', '25.20', '165.20', '2020-01-13', 123, '1', '5'),
(186, 125, 1, 354, 2, 2, 1, 'Suministro de materiales para trabajos de SSGG', 1, '6436.11', '1158.50', '7594.61', '2020-01-13', 124, '1', '5'),
(187, 126, 1, 217, 2, 1, 1, 'Asesoría técnica y elaboración del expediente ITSE', 1, '20906.78', '3763.22', '24670.00', '2020-01-20', 125, '1', '3'),
(188, 127, 1, 117, 2, 7, 1, 'Mota pizar blanc omega 21090', 40, '277.20', '49.90', '327.10', '2020-01-14', 126, '1', '5'),
(189, 127, 2, 117, 2, 7, 1, 'Tinta cartucho wbs-vb-m plumon azul pilot', 400, '980.00', '176.40', '1156.40', '2020-01-14', 126, '1', '5'),
(190, 127, 3, 117, 2, 7, 1, 'Tinta cartucho wbs-vb-m pplumon rojo pilot', 200, '490.00', '88.20', '578.20', '2020-01-14', 126, '1', '5'),
(191, 127, 4, 117, 2, 7, 1, 'Lapicero pta fina negro  cod: 035 faber castell', 24, '8.64', '1.56', '10.20', '2020-01-14', 126, '1', '5'),
(192, 128, 1, 117, 2, 7, 1, 'Tinta cartucho wbs-vb-m p/plumon verde pilot', 120, '294.00', '52.92', '346.92', '2020-01-17', 127, '1', '5'),
(193, 128, 2, 117, 2, 7, 1, 'Tinta cartucho wbs-vb-m p/plumon negro pilot', 60, '147.00', '26.46', '173.46', '2020-01-17', 127, '1', '5'),
(194, 128, 3, 117, 2, 7, 1, 'Marcador pizarra recarg azul wbma-vbm pilot', 60, '257.40', '46.33', '303.73', '2020-01-17', 127, '1', '5'),
(195, 128, 4, 117, 2, 7, 1, 'Marcador pizarra recarg rojo wbma-vbm pilot', 60, '257.40', '46.33', '303.73', '2020-01-17', 127, '1', '5'),
(196, 128, 5, 117, 2, 7, 1, 'Marcador pizarra recarg verde wbma-vbm pilot', 60, '257.40', '46.33', '303.73', '2020-01-17', 127, '1', '5'),
(197, 128, 7, 117, 2, 7, 1, 'Pila aa x 4+2 un duracell 1.5 v', 10, '96.70', '17.41', '114.11', '2020-01-17', 127, '1', '5'),
(198, 128, 8, 117, 2, 7, 1, 'Pila aaa x 4+2 un duracell 1.5 v', 10, '97.40', '17.53', '114.93', '2020-01-17', 127, '1', '5'),
(199, 128, 9, 117, 2, 7, 1, 'Cuchilla grande g/corta f/presion plastico fultons', 6, '4.80', '0.86', '5.66', '2020-01-17', 127, '1', '5'),
(200, 129, 1, 354, 2, 2, 1, 'MC sistema bombeo de drenaje', 1, '3614.45', '650.60', '4265.05', '2020-01-15', 128, '1', '5'),
(201, 130, 1, 1, 2, 1, 1, 'Reparación estación total s3 2 autolock t/a', 1, '1957.71', '352.39', '2310.10', '2020-01-15', 129, '1', '5'),
(202, 130, 2, 1, 2, 1, 1, 'Reparación estación total trimble m3 dr 2\" laser', 2, '1500.00', '270.00', '1770.00', '2020-01-15', 129, '1', '5'),
(203, 130, 3, 1, 2, 1, 1, 'Reparación estación total trimble m3 dr 5\"', 1, '141.05', '25.39', '166.44', '2020-01-15', 129, '1', '5'),
(204, 131, 1, 354, 2, 1, 1, 'MC Tuberia en pared de laboratorio Ing Minas', 1, '2400.00', '432.00', '2832.00', '2020-01-15', 130, '1', '5'),
(205, 132, 1, 354, 2, 2, 1, 'MC Equipos de AA varios', 1, '5220.00', '939.60', '6159.60', '2020-01-15', 131, '1', '5'),
(206, 133, 1, 156, 2, 1, 1, 'Cambio de claves en chapas de aulas (incluye 3 juegos de llaves)', 36, '1872.00', '336.96', '2208.96', '2020-01-17', 132, '1', '5'),
(207, 134, 1, 354, 2, 1, 1, 'Mantenimiento de piso de estrado de auditorio', 1, '2520.00', '453.60', '2973.60', '2020-01-16', 133, '1', '5'),
(208, 135, 1, 354, 2, 1, 1, 'Mantenimiento de tribuna - losa deportiva', 1, '2170.00', '390.60', '2560.60', '2020-01-16', 134, '1', '5'),
(209, 136, 1, 354, 2, 1, 1, 'Aplicación de plancha de acero inoxidable en paredes de aulas', 15, '4425.00', '796.50', '5221.50', '2020-01-16', 135, '1', '5'),
(210, 137, 1, 354, 2, 1, 1, 'Fabricación de estructura para panel numerico, tablero de baloncesto', 1, '3665.25', '659.75', '4325.00', '2020-01-17', 136, '1', '5'),
(211, 138, 1, 354, 2, 1, 1, 'Servicio de enchapado de pozo de bombas sumergibles', 1, '1004.40', '180.79', '1185.19', '2020-01-17', 137, '1', '5'),
(212, 139, 1, 140, 1, 6, 3, 'Supervisión permanente de obra eléctrica de empresa INGINSEL', 1, '42800.00', '7704.00', '50504.00', '2020-01-30', 138, '1', '5'),
(213, 140, 1, 148, 2, 1, 1, 'Fabricación de pasamanos para plaza hundida', 1, '5900.00', '1062.00', '6962.00', '2020-01-21', 139, '1', '5'),
(214, 141, 1, 354, 2, 1, 1, 'Pintado de losa deportiva', 1, '6200.00', '1116.00', '7316.00', '2020-01-23', 140, '1', '5'),
(215, 142, 1, 170, 2, 1, 1, 'Aplicación laminas de seguridad vidrios estantes de 2 piezas', 15, '1050.00', '189.00', '1239.00', '2020-01-28', 141, '1', '5'),
(216, 142, 2, 170, 2, 1, 1, 'Aplicación laminas de seguridad vidrios estantes de 4 piezas', 40, '5600.00', '1008.00', '6608.00', '2020-01-28', 141, '1', '5'),
(217, 143, 1, 355, 2, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos)', 170, '3168.80', '570.38', '3739.18', '2020-01-28', 142, '1', '5'),
(218, 144, 1, 354, 2, 1, 1, 'MP ventanas (cambio de garrucha, felpa y picaporte)', 72, '6840.00', '1231.20', '8071.20', '2020-01-29', 143, '1', '5'),
(219, 145, 1, 354, 2, 1, 1, 'MP 9 puertas de vidrio en oficinas', 1, '5330.00', '959.40', '6289.40', '2020-01-29', 144, '1', '5'),
(220, 146, 1, 240, 2, 1, 1, 'MP de asientos y planchado (cambio de tapiz)', 1, '4180.00', '752.40', '4932.40', '2020-01-31', 145, '1', '5'),
(221, 147, 1, 354, 2, 1, 1, 'MC de 5 puertas y 1 marco', 1, '2020.00', '363.60', '2383.60', '2020-01-29', 146, '1', '5'),
(222, 148, 1, 153, 2, 1, 1, 'Mantenimiento 4 mesas con techo 200 x 200 cm cafetin', 4, '680.00', '122.40', '802.40', '2020-01-29', 147, '1', '5'),
(223, 148, 2, 153, 2, 1, 1, 'Mantenimiento bancas', 34, '1530.00', '275.40', '1805.40', '2020-01-29', 147, '1', '5'),
(224, 148, 3, 153, 2, 1, 1, 'MP mesas con techo 200cm x 200cm y tablero de 150cm x 70cm', 11, '2420.00', '435.60', '2855.60', '2020-01-29', 147, '1', '5'),
(225, 148, 4, 153, 2, 1, 1, 'Mantenimiento tachos de basura', 12, '420.00', '75.60', '495.60', '2020-01-29', 147, '1', '5'),
(226, 149, 1, 354, 2, 2, 1, 'MC de tableros eléctrico (INDECI)', 1, '35244.30', '6343.97', '41588.27', '2020-02-05', 148, '1', '5'),
(227, 150, 1, 150, 2, 1, 1, 'Servicio de cableado estructurado de 01 pto en auditorio', 1, '574.83', '103.47', '678.30', '2020-02-04', 149, '1', '5'),
(228, 151, 1, 207, 1, 3, 2, 'Silla de visita - S06 CAPEX', 100, '7449.00', '1340.82', '8789.82', '2020-02-11', 150, '1', '3'),
(230, 151, 3, 207, 1, 3, 2, 'Silla giratoria operativa - S01 CAPEX', 42, '7830.48', '1409.49', '9239.97', '2020-02-11', 150, '1', '3'),
(234, 152, 1, 207, 1, 3, 2, 'Banco para laboratorios y talleres - MT32 CAPEX', 80, '5016.80', '903.02', '5919.82', '2020-02-11', 151, '1', '3'),
(237, 158, 2, 55, 1, 5, 2, 'Receptor navegador GPS Garmin', 2, '930.00', '167.40', '1097.40', '2020-02-20', 152, '1', '5'),
(238, 161, 1, 55, 1, 5, 2, 'Nivel automático marca SPECTRA AL32A', 2, '762.71', '137.29', '900.00', '2020-03-16', 153, '1', '3'),
(239, 161, 2, 55, 1, 5, 2, 'GPS submétrico SP20 SPECTRA PRECISION', 1, '4686.44', '843.56', '5530.00', '2020-03-16', 153, '1', '3'),
(240, 162, 1, 55, 6, 5, 2, 'Bomba de vacío', 1, '805.08', '144.91', '949.99', '2020-03-18', 154, '1', '3'),
(241, 162, 2, 55, 4, 5, 2, 'Permeámetro carga constante', 1, '2118.64', '381.36', '2500.00', '2020-03-18', 154, '1', '3'),
(242, 162, 3, 55, 1, 5, 2, 'Viga BENKELMAN doble brazo', 1, '4152.54', '747.46', '4900.00', '2020-03-18', 154, '1', '3'),
(243, 162, 4, 55, 1, 5, 2, 'Equipo de densidad de campo', 3, '1525.41', '274.57', '1799.98', '2020-03-18', 154, '1', '3'),
(244, 162, 5, 55, 6, 5, 2, 'Báscula electrónica HF OHAUS', 2, '6779.66', '1220.34', '8000.00', '2020-03-18', 154, '1', '3'),
(245, 164, 1, 55, 3, 5, 2, 'Plancha de calentamiento HP30A', 1, '1440.68', '259.32', '1700.00', '2020-03-16', 155, '1', '3'),
(246, 166, 1, 4, 1, 5, 2, 'Módulos educativos de plc + sensores industriales', 3, '55335.00', '9960.30', '65295.30', '2020-03-10', 156, '1', '3'),
(247, 167, 1, 4, 3, 5, 2, 'Medidor de caudal FR-94307 GLOBAL WATER (USA)', 2, '15084.75', '2715.26', '17800.01', '2020-03-05', 157, '1', '3'),
(248, 172, 1, 142, 1, 6, 2, 'Servicio de reemplazo de cerámico en primera planta del campus (Pab B y C)', 1, '27060.00', '4870.80', '31930.80', '2020-03-02', 158, '1', '3'),
(249, 174, 1, 142, 1, 6, 2, 'Servicio de mantenimiento de estructura y cobertura en azotea de Pab H', 1, '73260.00', '13186.80', '86446.80', '2020-03-10', 159, '1', '3'),
(250, 175, 1, 192, 1, 3, 2, 'Control biométrico para ingreso a club de cátedra Pab B', 1, '9465.00', '1703.70', '11168.70', '2020-03-04', 160, '1', '3'),
(251, 176, 1, 186, 1, 3, 2, 'Servicio de instalación de 2 equipos de aire acondicionado', 1, '6445.00', '1160.10', '7605.10', '2020-02-19', 161, '1', '3'),
(252, 176, 2, 186, 1, 3, 2, 'Equipo de aire acondicionado YORK 36000 btu/h split techo', 1, '4065.00', '731.70', '4796.70', '2020-02-19', 161, '1', '3'),
(253, 176, 3, 186, 1, 3, 2, 'Equipo de aire acondicionado YORK 24000 btu/h split techo', 1, '2340.00', '421.20', '2761.20', '2020-02-19', 161, '1', '3'),
(254, 177, 1, 186, 1, 3, 2, 'Servicio de instalación de 2 equipos de aire acondicionado de 36000btu', 1, '7555.00', '1359.90', '8914.90', '2020-02-19', 162, '1', '3'),
(255, 177, 2, 186, 1, 3, 2, 'Equipo de aire acondicionado YORK 36000 btu/h 220v piso techo', 2, '8120.00', '1461.60', '9581.60', '2020-02-19', 162, '1', '3'),
(256, 178, 1, 151, 2, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-02-05', 163, '1', '5'),
(257, 179, 1, 150, 2, 1, 1, 'Servicio de desplazamiento de 02 gabinetes rackeables', 1, '1050.30', '189.05', '1239.35', '2020-02-06', 164, '1', '5'),
(258, 180, 1, 168, 2, 1, 1, 'Extintores de 6 kilos PQS', 34, '1296.61', '233.39', '1530.00', '2020-02-05', 165, '1', '5'),
(259, 180, 2, 168, 2, 1, 1, 'Extintores de 5 libras CO2', 7, '296.61', '53.39', '350.00', '2020-02-05', 165, '1', '5'),
(260, 180, 3, 168, 2, 1, 1, 'Extintores de 15 libras CO2', 14, '1127.12', '202.88', '1330.00', '2020-02-05', 165, '1', '5'),
(261, 180, 4, 168, 2, 1, 1, 'Extintores de 6 kg PQS', 2, '101.69', '18.30', '119.99', '2020-02-05', 165, '1', '5'),
(262, 180, 5, 168, 2, 1, 1, 'Extintores de 2.5 galones ACETATO', 2, '220.34', '39.66', '260.00', '2020-02-05', 165, '1', '5'),
(263, 182, 1, 354, 2, 1, 1, 'Elaboración de memorias descriptivas del SCI', 1, '1308.00', '235.44', '1543.44', '2020-02-05', 166, '1', '5'),
(264, 183, 1, 1, 2, 1, 1, 'MP equipos de cocina', 1, '1910.00', '343.80', '2253.80', '2020-02-06', 167, '1', '5'),
(265, 183, 2, 1, 2, 1, 1, 'MP de bombas de agua', 1, '900.00', '162.00', '1062.00', '2020-02-06', 167, '1', '5'),
(266, 184, 1, 354, 2, 2, 1, 'Suministro de Materiales para SSGG', 1, '7827.02', '1408.86', '9235.88', '2020-02-12', 168, '1', '5'),
(267, 185, 1, 354, 2, 1, 1, 'Suministro e instalación de extintores y señaléticas', 1, '6644.75', '1196.06', '7840.81', '2020-02-10', 169, '1', '5'),
(268, 186, 1, 354, 2, 1, 1, 'Desmontaje, limpieza e instalación de adoquinado en pasadizos', 1, '2062.80', '371.30', '2434.10', '2020-02-10', 170, '1', '5'),
(269, 187, 1, 1, 2, 1, 1, 'Servicio de mantenimiento de equipos agroindustriales', 1, '1148.00', '206.64', '1354.64', '2020-02-11', 171, '1', '5'),
(270, 188, 1, 1, 2, 1, 1, 'MP equipos especializados (espectofotómetro y horno de grafito) [OC 69250]', 1, '1850.00', '333.00', '2183.00', '2020-02-11', NULL, '1', '6'),
(271, 189, 1, 153, 2, 1, 1, 'Servicio de anclaje y aseguramiento de 7 estantes metálicos', 1, '300.00', '54.00', '354.00', '2020-02-12', 173, '1', '5'),
(272, 190, 1, 1, 2, 1, 1, 'Servicio de mantenimiento de 141 equipos de medición (lab. especializados)', 1, '28340.00', '5101.20', '33441.20', '2020-02-12', 174, '1', '3'),
(273, 191, 1, 240, 2, 1, 1, 'MP 185,000 km BUS T1S-727', 1, '646.25', '116.33', '762.58', '2020-02-17', 175, '1', '3'),
(274, 192, 1, 240, 2, 1, 1, 'MP 140,000km BUS T1V-794', 1, '709.39', '127.69', '837.08', '2020-02-17', 176, '1', '3'),
(275, 193, 1, 354, 2, 2, 1, 'MC de pozos a tierra', 1, '2827.44', '508.94', '3336.38', '2020-02-19', 177, '1', '5'),
(276, 194, 1, 354, 2, 1, 1, 'Prueba de hermeticidad y certificación de línea de gas', 1, '3240.00', '583.20', '3823.20', '2020-02-18', 178, '1', '5'),
(277, 195, 1, 354, 2, 1, 1, 'Reubicación de 2 estaciones manuales del SCI', 1, '2462.40', '443.23', '2905.63', '2020-02-18', 179, '1', '5'),
(278, 196, 1, 155, 2, 1, 1, 'Ampliación de climatización del Lab. Electrónica y Lab. Automatización', 1, '2245.00', '404.10', '2649.10', '2020-02-18', 180, '1', '5'),
(279, 197, 1, 354, 2, 1, 1, 'Certificación de estructuras metálicas', 1, '396.00', '71.28', '467.28', '2020-02-14', 181, '1', '5'),
(280, 198, 1, 1, 2, 1, 1, 'Mant. correctivo panel de carga cbr, marca: forney, s/n:1206, [OC 69753]', 1, '381.36', '68.64', '450.00', '2020-03-09', NULL, '1', '6'),
(281, 198, 2, 1, 2, 1, 1, 'Mc prensa para concreto [OC 69753]', 1, '381.36', '68.64', '450.00', '2020-03-09', NULL, '1', '6'),
(282, 198, 3, 1, 2, 1, 1, 'Mant. correctivo balanza electronica cap: 80 kg, marca: ohaus [OC 69753]', 1, '211.86', '38.13', '249.99', '2020-03-09', NULL, '1', '6'),
(283, 198, 4, 1, 2, 1, 1, 'Mant. correctivo mesa sismica, marca: cuanser, s/n:212051 [OC 69753]', 1, '423.73', '76.27', '500.00', '2020-03-09', NULL, '1', '6'),
(284, 198, 5, 1, 2, 1, 1, 'Mc equipo de abrasión de los angeles', 1, '338.98', '61.02', '400.00', '2020-03-09', NULL, '1', '6'),
(285, 198, 6, 1, 2, 1, 1, 'Mc compresor de aire [OC 69753]', 1, '254.24', '45.76', '300.00', '2020-03-09', NULL, '1', '6'),
(286, 198, 7, 1, 2, 1, 1, 'Mantenimiento correctivo trompo de 6 pies , marca: bauker [OC 69753]', 1, '423.73', '76.27', '500.00', '2020-03-09', NULL, '1', '6'),
(287, 198, 8, 1, 2, 1, 1, 'Mant. correctivo trompo de 3.3 pies , marca: forney [OC 69753]', 1, '381.36', '68.64', '450.00', '2020-03-09', NULL, '1', '6'),
(288, 198, 9, 1, 2, 1, 1, 'Mant. correctivo olla de washington, marca: forney [OC 69753]', 1, '338.98', '61.02', '400.00', '2020-03-09', NULL, '1', '6'),
(289, 198, 10, 1, 2, 1, 1, 'Mc balanza electronica [OC 69753]', 1, '211.86', '38.13', '249.99', '2020-03-09', NULL, '1', '6'),
(290, 199, 1, 354, 2, 2, 1, 'Suministro de interruptores diferenciales', 1, '6769.66', '1218.54', '7988.20', '2020-02-24', 183, '1', '5'),
(291, 200, 1, 209, 2, 1, 1, 'Lavado y secado de cortinas medianas 1.70 * 2.30', 207, '3508.65', '631.56', '4140.21', '2020-03-02', 184, '1', '3'),
(292, 201, 1, 254, 2, 7, 1, 'Adaptadores de red de usb a RJ45 adaptador USB 3.0 a ethernet gigabit', 2, '173.88', '31.30', '205.18', '2020-02-24', 185, '1', '5'),
(293, 201, 2, 254, 2, 7, 1, 'Adaptadores de mini-displayport a VGA', 2, '96.60', '17.39', '113.99', '2020-02-24', 185, '1', '5'),
(294, 201, 3, 254, 2, 7, 1, 'Bolsa de cable helicoidal', 5, '189.75', '34.16', '223.91', '2020-02-24', 185, '1', '5'),
(295, 201, 4, 254, 2, 7, 1, 'Cintillo 300x4.8 mm 100 unid.', 3, '72.45', '13.04', '85.49', '2020-02-24', 185, '1', '5'),
(296, 201, 5, 254, 2, 7, 1, 'Disco duro externo western digital my passport de 2tb', 1, '319.00', '57.42', '376.42', '2020-02-24', 185, '1', '5'),
(297, 201, 6, 254, 2, 7, 1, 'Dvd supermultil lg gp65nb60, externo, 8x, usb 2.0.', 1, '89.00', '16.02', '105.02', '2020-02-24', 185, '1', '5'),
(298, 201, 7, 254, 2, 7, 1, 'Hub USB 3.0 de 4 puertos trendnet tu3-h4e a 5 gbps', 1, '86.25', '15.53', '101.78', '2020-02-24', 185, '1', '5'),
(299, 201, 8, 254, 2, 7, 1, 'Jacks AMP categoria 6 color azul', 1, '12.42', '2.24', '14.66', '2020-02-24', 185, '1', '5'),
(300, 202, 1, 320, 2, 1, 1, 'SOAT BUS T1S-727', 1, '254.24', '45.76', '300.00', '2020-03-02', 186, '1', '3'),
(301, 203, 1, 254, 2, 7, 1, 'Powerlite w15+/w18+/x24+ lampara powerlite [OC 69877]', 1, '271.19', '48.81', '320.00', '2020-03-02', NULL, '1', '6'),
(302, 203, 2, 254, 2, 7, 1, 'Powerlite 536wi/eb-520/eb-525w lampara de proyector [OC 69877]', 4, '915.25', '164.75', '1080.00', '2020-03-02', NULL, '1', '6'),
(303, 203, 3, 254, 2, 7, 1, 'Lampara v13h010l96 - proyector 108 [OC 69877]', 3, '559.32', '100.68', '660.00', '2020-03-02', NULL, '1', '6'),
(304, 204, 1, 140, 1, 6, 3, 'EMERG proyecto en el levantamiento de observaciones INDECI', 1, '25000.00', '4500.00', '29500.00', '2020-03-16', 188, '2', '4'),
(305, 206, 1, 354, 2, 2, 1, 'Suministro de Materiales para SSGG', 1, '5349.98', '963.00', '6312.98', '2020-02-28', 189, '1', '5'),
(306, 207, 1, 354, 2, 2, 1, 'Suministro de materiales para trabajos de SSGG', 1, '5126.00', '922.68', '6048.68', '2020-02-28', 190, '1', '5'),
(307, 208, 1, 355, 2, 1, 1, 'Toalla de papel Elite longitud 200m (Paq. de 2 rollos) [OC 69403]', 50, '932.00', '167.76', '1099.76', '2020-02-28', NULL, '1', '6'),
(308, 209, 1, 161, 2, 1, 1, 'Jabón liquido Elite glicerina 2x5l (galón) [OC 69404]', 5, '198.30', '35.69', '233.99', '2020-02-28', NULL, '1', '6'),
(309, 210, 1, 151, 2, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', '2020-02-27', 193, '1', '5'),
(310, 211, 1, 159, 2, 1, 1, 'Eliminación de desmonte Marzo', 1, '423.73', '76.27', '500.00', '2020-03-02', 194, '1', '3'),
(311, 212, 1, 148, 2, 1, 1, 'Servicio de apertura de pared de drywall', 1, '1680.00', '302.40', '1982.40', '2020-03-02', 195, '1', '3'),
(312, 213, 1, 157, 2, 2, 1, 'Servicio de fumigación y desinsectación', 1, '3700.00', '666.00', '4366.00', '2020-03-12', 196, '1', '5'),
(313, 214, 1, 354, 2, 1, 1, 'Personal técnico de apoyo multifunción para trabajos Pre INDECI', 1, '1555.20', '279.94', '1835.14', '2020-03-09', 197, '1', '3'),
(314, 215, 1, 354, 2, 2, 1, 'Instalación de drywall para cubrir tuberías de AA', 1, '3346.00', '602.28', '3948.28', '2020-03-12', 198, '1', '5'),
(315, 216, 1, 55, 3, 5, 2, 'B-383pol microscopio trinocular de polarizacion 600x ios luz transmitida optika', 6, '60762.66', '10937.28', '71699.94', '2020-03-23', 199, '1', '3'),
(316, 218, 1, 354, 2, 2, 1, 'MC pintura en tuberías de ACI (oxidadas)', 1, '7209.19', '1297.65', '8506.84', '2020-03-12', 200, '1', '5'),
(317, 153, 1, 55, 3, 5, 2, 'Juego Completo de Tamices (suelo y concreto)', 1, '6572.03', '1182.97', '7755.00', NULL, NULL, '1', '1'),
(318, 154, 1, 55, 3, 5, 2, 'Estación Total Servoaccionada 55 DR Trimble', 1, '36641.79', '6595.52', '43237.31', NULL, NULL, '1', '1'),
(319, 155, 1, 55, 6, 5, 2, 'Balanza electrónica de mesa 50kg OHAUS', 1, '400.00', '72.00', '472.00', NULL, NULL, '1', '6'),
(320, 156, 1, 55, 5, 5, 2, 'Mezcladora de concreto trompo con motor 1.4HP', 2, '3559.32', '640.68', '4200.00', NULL, NULL, '1', '6'),
(321, 157, 1, 55, 6, 5, 2, 'Juegos de moldes para peso unitario', 1, '5508.47', '991.52', '6499.99', NULL, NULL, '1', '1'),
(322, 157, 2, 55, 5, 5, 2, 'Molde triple cubo de bronce forjado para cubos de 2&#34;', 6, '9816.00', '1766.88', '11582.88', NULL, NULL, '1', '1'),
(323, 159, 1, 55, 6, 5, 2, 'Horno para laboratorio FORNEY 500 litros UTEST UTD-1310', 1, '15254.24', '2745.76', '18000.00', '2020-03-24', NULL, '1', '2'),
(324, 160, 1, 55, 6, 5, 2, 'Prensa para concreto FORNEY F250B (USA)', 1, '59152.54', '10647.46', '69800.00', '2020-03-24', NULL, '1', '2'),
(325, 163, 1, 55, 6, 5, 2, 'Medidor de aire confinado en concreto', 2, '8440.68', '1519.32', '9960.00', NULL, NULL, '1', '1'),
(326, 168, 1, 55, 5, 5, 2, 'Banco hidráulico de acero inoxidable', 1, '53727.00', '9670.86', '63397.86', '2020-03-30', NULL, '1', '2'),
(327, 169, 1, 55, 1, 5, 2, 'Rock classification hammer CONTROLS', 1, '7033.90', '1266.10', '8300.00', NULL, NULL, '1', '6'),
(328, 170, 1, 55, 4, 5, 2, 'Celda perimétrica de protección para Robot industrial', 1, '7584.75', '1365.26', '8950.01', NULL, NULL, '1', '6'),
(329, 171, 1, 189, 1, 3, 2, 'Pizarras Blanca de Acero vitrificado (1.2m x 4m)', 4, '5556.00', '1000.08', '6556.08', NULL, NULL, '1', '6'),
(330, 173, 1, 142, 1, 6, 2, 'Servicio de fabricación y montaj de puente en Pab H', 2, '15200.00', '2736.00', '17936.00', NULL, NULL, '1', '1'),
(331, 223, 1, 354, 1, 2, 1, 'Suministro de combustible para GE Data Center por emergencia (Pab B)', 1, '297.84', '53.61', '351.45', '2020-04-28', 202, '1', '5'),
(332, 181, 1, 55, 6, 5, 2, 'Kit de ensayo para peso específico en agregado grueso', 1, '16101.69', '2898.30', '18999.99', NULL, NULL, '1', '1'),
(333, 181, 2, 55, 6, 5, 2, 'Máquina de abrasión Los Ángeles', 1, '22457.63', '4042.37', '26500.00', NULL, NULL, '1', '1'),
(334, 181, 3, 55, 6, 5, 2, 'Baño de temperatura constante', 1, '12711.86', '2288.13', '14999.99', NULL, NULL, '1', '1'),
(335, 181, 4, 55, 6, 5, 2, 'Baño maría con capacidad de 24 litros', 1, '7627.12', '1372.88', '9000.00', NULL, NULL, '1', '1'),
(336, 181, 5, 55, 6, 5, 2, 'Probadores de punto de ignición Cleveland', 1, '6779.66', '1220.34', '8000.00', NULL, NULL, '1', '1'),
(337, 224, 1, 354, 1, 2, 1, 'MC cambio de cajas de pozos a tierra', 1, '3834.00', '690.12', '4524.12', '2020-04-28', 203, '1', '5'),
(338, 225, 1, 354, 1, 2, 1, 'Suministro e instalación de luces de emergencia en azoteas con estructura', 1, '6490.80', '1168.34', '7659.14', '2020-04-28', 204, '1', '5'),
(339, 205, 1, 140, 1, 6, 3, 'Servicio de trabajos en instalaciones eléctricas (INDECI)', 1, '415254.24', '74745.76', '490000.00', '2020-04-06', 201, '2', '4'),
(340, 217, 1, 55, 3, 5, 2, 'Debastadora de rocas y minerales', 1, '5084.75', '915.26', '6000.01', NULL, NULL, '1', '1'),
(341, 217, 2, 55, 3, 5, 2, 'Máquina de seccionamiento delgado para rocas y minerales PetroThin', 1, '8474.58', '1525.42', '10000.00', NULL, NULL, '1', '1'),
(342, 219, 1, 182, 2, 1, 1, 'Agua oxigenada Alkofarma frasco x120ml', 14, '14.70', '2.65', '17.35', NULL, NULL, '1', '6'),
(343, 219, 2, 182, 2, 1, 1, 'Apósito estéril 10cmx10cm Medical', 105, '193.20', '34.78', '227.98', NULL, NULL, '1', '6'),
(344, 219, 3, 182, 2, 1, 1, 'Curitas cureband', 197, '9.85', '1.77', '11.62', NULL, NULL, '1', '6'),
(345, 219, 4, 182, 2, 1, 1, 'Diclofenaco sódico gel 1%/50g Portugal tubo x un', 21, '72.24', '13.00', '85.24', NULL, NULL, '1', '6'),
(346, 219, 5, 182, 2, 1, 1, 'Esparadrapo de papel (micropore) 2.5cm x 4.5m 2.5cm x 9mts', 12, '63.60', '11.45', '75.05', NULL, NULL, '1', '6'),
(347, 219, 6, 182, 2, 1, 1, 'Gasa parafinada (Jelonet) 10x10cm unidad', 175, '644.00', '115.92', '759.92', NULL, NULL, '1', '6'),
(348, 219, 7, 182, 2, 1, 1, 'Guantes no estériles caja x 50 medium Alkhofar caja x 100un', 1, '13.40', '2.41', '15.81', NULL, NULL, '1', '6'),
(349, 219, 8, 182, 2, 1, 1, 'Silverdiazina 1%25g tubo x 25gr', 21, '304.50', '54.81', '359.31', NULL, NULL, '1', '6'),
(350, 220, 1, 1, 2, 1, 1, 'MC Marmita volcable MV100-P', 1, '398.00', '71.64', '469.64', NULL, NULL, '1', '6'),
(351, 220, 2, 1, 2, 1, 1, 'MC horno deshidratador HD08007MP', 1, '545.00', '98.10', '643.10', NULL, NULL, '1', '6'),
(352, 220, 3, 1, 2, 1, 1, 'MC molino coloidad MC10MP', 1, '745.00', '134.10', '879.10', NULL, NULL, '1', '6'),
(353, 220, 4, 1, 2, 1, 1, 'MC exhauster TE1502MP', 1, '512.00', '92.16', '604.16', NULL, NULL, '1', '6'),
(354, 221, 1, 320, 2, 1, 1, 'SOAT BUS T1V-794', 1, '237.29', '42.71', '280.00', NULL, NULL, '1', '1'),
(355, 222, 1, 151, 2, 1, 1, 'Mantenimiento Preventivo de 2 Ascensores', 1, '1186.44', '213.56', '1400.00', NULL, NULL, '1', '1'),
(356, 226, 1, 189, 1, 3, 3, 'Pizarras blanca de acero vitrificado (1.2x4m)', 3, '1223.70', '220.27', '1443.97', '2020-01-01', 205, '1', '5'),
(357, 227, 1, 207, 1, 3, 3, 'Módulo de computo doble - MT38', 20, '8305.00', '1494.90', '9799.90', '2020-01-01', 206, '1', '3'),
(358, 227, 2, 207, 1, 3, 3, 'Tablero de dibujo y arquitectura - MT34', 30, '5339.10', '961.04', '6300.14', '2020-01-01', 206, '1', '3'),
(359, 227, 3, 207, 1, 3, 3, 'Módulo de escritorio corrido club de cátedra 5 personas - MT86', 4, '6271.20', '1128.82', '7400.02', '2020-01-01', 206, '1', '3'),
(360, 227, 4, 207, 1, 3, 3, 'Silla giratoria operativa - S01', 30, '5593.20', '1006.78', '6599.98', '2020-01-01', 207, '1', '3'),
(361, 227, 5, 207, 1, 3, 3, 'Mesa circular para cafetería - MT43', 25, '4025.50', '724.59', '4750.09', '2020-01-01', 208, '1', '3'),
(362, 228, 1, 181, 1, 3, 3, 'Suministro e instalación de campana extractora para cafetería (Pab H Exp)', 1, '12500.00', '2250.00', '14750.00', '2020-03-04', 209, '1', '3'),
(363, 229, 1, 192, 1, 3, 3, 'Proyecto CCTV en cmpliación de Pabellón H Exp.', 1, '59322.03', '10677.97', '70000.00', '2020-01-29', 210, '1', '3'),
(364, 230, 4, 207, 1, 3, 3, 'Lockers MT84', 3, '2400.00', '432.00', '2832.00', '2020-02-20', 211, '1', '3');
INSERT INTO `lineas_sol` (`Lin_nIdLineaSol`, `Lin_Sol_nIdSolicitud`, `Lin_nNroLinea`, `Lin_SubCat_nIdSubCategoria`, `Lin_UExp_nIdUnExp`, `Lin_Dpto_nIdDpto`, `Lin_Proy_nIdProyecto`, `Lin_vDescripcion`, `Lin_nCantidad`, `Lin_dSubtotal`, `Lin_dIGV`, `Lin_dTotal`, `Lin_dFechaAprob`, `Lin_OC_nIdOrdenCompra`, `Lin_cTipoRecepcion`, `Lin_cEstado`) VALUES
(365, 231, 2, 207, 1, 3, 3, 'Silla de visita - S06 CAPEX', 43, '3203.07', '576.55', '3779.62', '2020-02-13', 212, '1', '3'),
(366, 232, 1, 246, 1, 5, 3, 'Ecran DaLite 72&#34;x96 (1.83x2.44m)', 3, '534.96', '96.29', '631.25', '2020-03-04', 213, '1', '3'),
(367, 233, 1, 246, 1, 8, 3, 'Proyector PowerLite 108 - V11H860020', 3, '1686.75', '303.62', '1990.37', '2020-02-03', 214, '1', '5'),
(368, 234, 1, 192, 1, 3, 3, 'Control de acceso biométrico para club de cátedra (Pab H Exp.)', 1, '9370.35', '1686.66', '11057.01', '2020-01-21', 215, '1', '3'),
(369, 235, 1, 207, 1, 5, 3, 'Carpeta para estudiante - MT31 CAPEX', 40, '3996.00', '719.28', '4715.28', '2020-02-13', 216, '1', '3'),
(370, 235, 2, 207, 1, 3, 3, 'Silla para cafetería modelo IO - S05', 100, '7966.00', '1433.88', '9399.88', '2020-02-11', 217, '1', '3'),
(371, 236, 1, 354, 2, 2, 1, 'Ampliación de 1 sensor de humo (Pre INDECI)', 1, '1486.80', '267.62', '1754.42', '2020-05-11', 227, '1', '5'),
(372, 237, 1, 55, 1, 5, 2, 'Espectrofotómetro UV-VIS', 1, '38000.00', '6840.00', '44840.00', '2020-03-16', 218, '1', '3'),
(373, 238, 1, 55, 1, 5, 2, 'Kit de 5 unidades de Dilatometer', 10, '6750.00', '1215.00', '7965.00', '2020-03-05', 219, '1', '3'),
(374, 239, 1, 55, 1, 5, 2, 'Limpiador ultrasónico FAITHFULL', 1, '1864.41', '335.59', '2200.00', '2020-03-05', 220, '1', '3'),
(375, 239, 2, 55, 1, 5, 2, 'Sonómetro', 1, '12324.58', '2218.42', '14543.00', '2020-03-05', 220, '1', '3'),
(376, 240, 1, 207, 1, 3, 2, 'Estante tipo 03 - MT47', 3, '1983.06', '356.95', '2340.01', '2020-02-11', 221, '1', '3'),
(377, 240, 2, 207, 1, 3, 2, 'Escritorio para docente/coordinador de laboratorio - MT33', 35, '10322.20', '1858.00', '12180.20', '2020-02-11', 221, '1', '3'),
(378, 240, 3, 207, 1, 3, 2, 'Módulo de cómputo individual - MT37', 20, '4406.80', '793.22', '5200.02', '2020-02-11', 221, '1', '3'),
(379, 240, 4, 207, 1, 3, 2, 'Casilleros - MT51', 10, '4194.90', '755.08', '4949.98', '2020-02-11', 221, '1', '3'),
(380, 240, 5, 207, 1, 3, 2, 'Tablero de dibujo y arquitectura - MT34', 45, '8008.65', '1441.56', '9450.21', '2020-02-11', 221, '1', '3'),
(381, 241, 1, 246, 1, 8, 2, 'Proyector Epson Powerlite 108, Tecnología 3LCD, resolución X', 13, '7309.25', '1315.67', '8624.92', '2020-02-12', 222, '1', '5'),
(382, 242, 1, 189, 1, 3, 2, 'El Molino - Tótem Digital 65&#34; INDOOR, Estructura de Acero Inoxidable 8mm', 2, '33050.00', '5949.00', '38999.00', '2020-02-12', 223, '1', '3'),
(383, 242, 2, 189, 1, 3, 2, 'San Isidro - Tótem Digital 65&#34; INDOOR, Estructura de Acero Inoxidable 8mm', 1, '16525.00', '2974.50', '19499.50', '2020-02-12', 223, '1', '3'),
(384, 243, 1, 181, 1, 3, 2, '[EM-SI] Dispensador de agua purificada para exteriores EZS8-ST', 3, '10817.19', '1947.09', '12764.28', '2020-03-05', 224, '1', '3'),
(385, 244, 1, 55, 1, 5, 2, 'Batidora Alemana Heavy Duty Kitchenaid', 3, '6355.93', '1144.07', '7500.00', '2020-03-16', 225, '1', '3'),
(386, 245, 1, 55, 1, 5, 2, 'Kit Bench Top Power Supply 0-150VAC 3A Global Especialities (4 fuentes)', 3, '9005.08', '1620.91', '10625.99', '2020-03-20', 226, '1', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `Loc_nIdLocal` int(11) NOT NULL,
  `Loc_vNombreLocal` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Loc_UExp_nIdUnExp` int(11) NOT NULL,
  `Loc_cEstado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`Loc_nIdLocal`, `Loc_vNombreLocal`, `Loc_UExp_nIdUnExp`, `Loc_cEstado`) VALUES
(1, 'PRINCIPAL', 1, '1'),
(2, 'PABELLON H', 1, '1'),
(3, 'PABELLON I', 1, '1'),
(4, 'PRINCIPAL', 2, '1'),
(5, 'PRINCIPAL', 3, '1'),
(6, 'PRINCIPAL', 4, '1'),
(7, 'PABELLON D', 4, '1'),
(8, 'PRINCIPAL', 5, '1'),
(9, 'PRINCIPAL', 6, '1'),
(10, 'PRINCIPAL', 7, '1'),
(11, 'PRINCIPAL', 8, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `Descripcion` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Ruta` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Icono` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Orden` tinyint(4) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`IdMenu`, `Descripcion`, `Ruta`, `Icono`, `Orden`, `Estado`) VALUES
(1, 'Inicio', 'home', 'pe-7s-rocket', 1, 1),
(2, 'Solicitudes', 'solicitudes', 'pe-7s-note2', 2, 1),
(3, 'Presupuesto', 'presupuesto', 'pe-7s-display2', 3, 1),
(4, 'Tareas/Incidentes', 'incidentes', 'pe-7s-note2', 4, 1),
(5, 'Panel Atencion', 'patencion', 'pe-7s-note2', 1, 1),
(6, 'Tareas/Incidentes', 'incidentesadm', 'pe-7s-display2', 2, 1),
(7, 'Tareas/Incidentes', 'incidentesger', 'pe-7s-display2', 1, 1),
(9, 'Tareas/Incidentes', 'incidentescam', 'pe-7s-display2', 2, 1),
(10, 'PMP', 'pmpadm', 'pe-7s-date', 3, 1),
(11, 'PMP', 'pmpger', 'pe-7s-date', 3, 1),
(12, 'Servicios', 'serviciosadm', 'pe-7s-light', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `OC_nIdOrdenCompra` int(11) NOT NULL,
  `OC_nNroOC` int(6) NOT NULL,
  `OC_Prov_nIdProveedor` int(11) NOT NULL,
  `OC_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_compra`
--

INSERT INTO `orden_compra` (`OC_nIdOrdenCompra`, `OC_nNroOC`, `OC_Prov_nIdProveedor`, `OC_cEstado`) VALUES
(1, 70171, 72, '1'),
(2, 70170, 72, '1'),
(3, 69917, 72, '1'),
(4, 69918, 72, '1'),
(5, 69925, 72, '1'),
(6, 69930, 72, '1'),
(7, 69828, 72, '1'),
(8, 69801, 71, '1'),
(9, 69837, 72, '1'),
(10, 69836, 72, '1'),
(11, 69774, 36, '1'),
(12, 69638, 61, '1'),
(13, 69939, 14, '1'),
(14, 69919, 11, '1'),
(15, 69754, 15, '1'),
(16, 69755, 16, '1'),
(17, 69996, 60, '1'),
(18, 69504, 4, '1'),
(19, 69835, 72, '1'),
(20, 69515, 72, '1'),
(21, 69453, 72, '1'),
(22, 69514, 72, '1'),
(23, 69513, 72, '1'),
(24, 69512, 72, '1'),
(25, 69510, 72, '1'),
(26, 69863, 77, '1'),
(27, 69452, 27, '1'),
(28, 68934, 27, '1'),
(29, 77504, 27, '1'),
(30, 66826, 27, '1'),
(31, 69511, 72, '1'),
(32, 69460, 72, '1'),
(33, 69457, 72, '1'),
(34, 69386, 72, '1'),
(35, 69387, 72, '1'),
(36, 69389, 72, '1'),
(37, 69375, 72, '1'),
(38, 70040, 72, '1'),
(39, 69227, 72, '1'),
(40, 69226, 72, '1'),
(41, 69225, 72, '1'),
(42, 69123, 72, '1'),
(43, 69121, 72, '1'),
(44, 69620, 78, '1'),
(45, 69619, 55, '1'),
(46, 69115, 79, '1'),
(47, 69097, 16, '1'),
(48, 69086, 72, '1'),
(49, 69085, 72, '1'),
(50, 69084, 72, '1'),
(51, 69083, 72, '1'),
(52, 69082, 72, '1'),
(53, 68917, 53, '1'),
(54, 69037, 16, '1'),
(55, 68980, 80, '1'),
(56, 68640, 72, '1'),
(57, 69464, 72, '1'),
(58, 68331, 72, '1'),
(59, 68499, 11, '1'),
(60, 68589, 46, '1'),
(61, 69095, 79, '1'),
(62, 68935, 81, '1'),
(63, 68004, 72, '1'),
(64, 68013, 72, '1'),
(65, 68856, 82, '1'),
(66, 69157, 83, '1'),
(67, 68859, 83, '1'),
(68, 68758, 48, '1'),
(69, 68724, 14, '1'),
(70, 67766, 4, '1'),
(71, 66854, 4, '1'),
(72, 68783, 16, '1'),
(73, 67792, 72, '1'),
(74, 67791, 72, '1'),
(75, 67777, 72, '1'),
(76, 67773, 72, '1'),
(77, 68427, 11, '1'),
(78, 67772, 72, '1'),
(79, 67771, 72, '1'),
(80, 67770, 72, '1'),
(81, 68574, 16, '1'),
(82, 68163, 15, '1'),
(83, 68644, 32, '1'),
(84, 68924, 84, '1'),
(85, 69112, 85, '1'),
(86, 68238, 86, '1'),
(87, 68233, 78, '1'),
(88, 67936, 16, '1'),
(89, 67375, 72, '1'),
(90, 67238, 72, '1'),
(91, 67237, 72, '1'),
(92, 67236, 72, '1'),
(93, 67102, 72, '1'),
(94, 67082, 87, '1'),
(95, 67045, 72, '1'),
(96, 66982, 72, '1'),
(97, 66985, 72, '1'),
(98, 66984, 72, '1'),
(99, 66980, 72, '1'),
(100, 66979, 72, '1'),
(101, 66824, 4, '1'),
(102, 66977, 72, '1'),
(103, 67224, 5, '1'),
(104, 68578, 7, '1'),
(105, 67047, 31, '1'),
(106, 67232, 1, '1'),
(107, 67293, 2, '1'),
(108, 70189, 72, '1'),
(109, 66821, 4, '1'),
(110, 70228, 72, '1'),
(111, 66811, 4, '1'),
(112, 67205, 2, '1'),
(113, 66813, 27, '1'),
(114, 66844, 15, '1'),
(115, 67289, 2, '1'),
(116, 67182, 2, '1'),
(117, 67053, 1, '1'),
(118, 66990, 1, '1'),
(119, 67305, 5, '1'),
(120, 67049, 31, '1'),
(121, 68576, 7, '1'),
(122, 67166, 28, '1'),
(123, 67440, 88, '1'),
(124, 66983, 72, '1'),
(125, 67943, 89, '1'),
(126, 67038, 61, '1'),
(127, 67184, 61, '1'),
(128, 67095, 72, '1'),
(129, 67765, 28, '1'),
(130, 67096, 72, '1'),
(131, 67103, 72, '1'),
(132, 67455, 16, '1'),
(133, 67362, 16, '1'),
(134, 67361, 16, '1'),
(135, 67808, 16, '1'),
(136, 67768, 83, '1'),
(137, 67239, 72, '1'),
(138, 68416, 90, '1'),
(139, 68161, 16, '1'),
(140, 68352, 16, '1'),
(141, 68570, 16, '1'),
(142, 67764, 4, '1'),
(143, 68722, 16, '1'),
(144, 68668, 16, '1'),
(145, 68858, 16, '1'),
(146, 68048, 16, '1'),
(147, 68686, 16, '1'),
(148, 68349, 72, '1'),
(149, 68268, 60, '1'),
(150, 68660, 32, '1'),
(151, 68604, 92, '1'),
(152, 69583, 26, '1'),
(153, 69912, 26, '1'),
(154, 70090, 19, '1'),
(155, 69903, 19, '1'),
(156, 69840, 93, '1'),
(157, 69789, 18, '1'),
(158, 69831, 15, '1'),
(159, 70095, 15, '1'),
(160, 69500, 9, '1'),
(161, 69567, 41, '1'),
(162, 69673, 41, '1'),
(163, 68326, 27, '1'),
(164, 68588, 95, '1'),
(165, 68498, 11, '1'),
(166, 68332, 72, '1'),
(167, 68583, 15, '1'),
(168, 68769, 72, '1'),
(169, 68639, 72, '1'),
(170, 68642, 72, '1'),
(171, 69146, 96, '1'),
(172, 69250, 97, '1'),
(173, 68953, 88, '1'),
(174, 69308, 98, '1'),
(175, 69170, 10, '1'),
(176, 69171, 10, '1'),
(177, 69081, 72, '1'),
(178, 69020, 72, '1'),
(179, 69021, 72, '1'),
(180, 69448, 41, '1'),
(181, 68961, 72, '1'),
(182, 69753, 99, '1'),
(183, 69222, 72, '1'),
(184, 69446, 86, '1'),
(185, 69205, 100, '1'),
(186, 69832, 101, '1'),
(187, 69877, 78, '1'),
(188, 69957, 102, '1'),
(189, 69406, 72, '1'),
(190, 69405, 72, '1'),
(191, 69403, 4, '1'),
(192, 69404, 4, '1'),
(193, 69388, 27, '1'),
(194, 69677, 15, '1'),
(195, 69770, 16, '1'),
(196, 69838, 71, '1'),
(197, 69691, 72, '1'),
(198, 69827, 72, '1'),
(199, 70091, 103, '1'),
(200, 69826, 72, '1'),
(201, 70242, 104, '1'),
(202, 70257, 72, '1'),
(203, 70252, 72, '1'),
(204, 70251, 72, '1'),
(205, 66716, 77, '1'),
(206, 66702, 87, '1'),
(207, 66710, 32, '1'),
(208, 66711, 105, '1'),
(209, 69639, 15, '1'),
(210, 68568, 9, '1'),
(211, 69257, 87, '1'),
(212, 68834, 32, '1'),
(213, 69509, 77, '1'),
(214, 68482, 106, '1'),
(215, 67574, 9, '1'),
(216, 68809, 92, '1'),
(217, 68605, 92, '1'),
(218, 69884, 107, '1'),
(219, 69791, 108, '1'),
(220, 69790, 19, '1'),
(221, 68614, 87, '1'),
(222, 68790, 106, '1'),
(223, 69285, 109, '1'),
(224, 69900, 110, '1'),
(225, 69931, 111, '1'),
(226, 70094, 112, '1'),
(227, 70323, 72, '1'),
(228, 88888, 15, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `Per_nIdPeriodo` int(11) NOT NULL,
  `Per_vAnual` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `Per_cEstado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`Per_nIdPeriodo`, `Per_vAnual`, `Per_cEstado`) VALUES
(1, '2020', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `IdPermiso` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `FechaRegistro` date NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`IdPermiso`, `IdUsuario`, `IdMenu`, `FechaRegistro`, `Estado`) VALUES
(1, 1, 1, '2020-02-23', 1),
(2, 1, 2, '2020-02-23', 1),
(3, 1, 3, '2020-02-23', 1),
(4, 1, 4, '2020-06-08', 1),
(5, 2, 5, '2020-06-15', 1),
(6, 9, 5, '2020-06-15', 1),
(7, 6, 6, '2020-06-15', 1),
(8, 7, 6, '2020-06-16', 1),
(9, 8, 7, '2020-06-16', 1),
(10, 3, 5, '2020-06-22', 1),
(11, 4, 5, '2020-06-22', 1),
(12, 5, 5, '2020-06-22', 1),
(13, 10, 5, '2020-06-22', 1),
(14, 11, 5, '2020-06-22', 1),
(15, 10, 6, '2020-06-22', 1),
(16, 11, 6, '2020-06-22', 1),
(17, 18, 7, '2020-06-24', 1),
(18, 12, 9, '2020-06-24', 1),
(19, 13, 9, '2020-06-24', 1),
(20, 14, 9, '2020-06-24', 1),
(21, 15, 9, '2020-06-24', 1),
(22, 16, 9, '2020-06-24', 1),
(23, 17, 9, '2020-06-24', 1),
(24, 6, 10, '2020-07-03', 1),
(25, 7, 10, '2020-07-03', 1),
(26, 8, 11, '2020-07-07', 1),
(27, 1, 12, '2020-07-15', 1),
(28, 6, 12, '2020-07-15', 1),
(29, 7, 12, '2020-07-15', 1),
(30, 8, 12, '2020-07-15', 1),
(31, 10, 12, '2020-07-15', 1),
(32, 11, 12, '2020-07-15', 1),
(33, 12, 12, '2020-07-15', 1),
(34, 13, 12, '2020-07-15', 1),
(35, 14, 12, '2020-07-15', 1),
(36, 15, 12, '2020-07-15', 1),
(37, 16, 12, '2020-07-15', 1),
(38, 17, 12, '2020-07-15', 1),
(39, 18, 12, '2020-07-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pmp_detalle`
--

CREATE TABLE `pmp_detalle` (
  `DetPmp_IdDetPmp` int(11) NOT NULL,
  `DetPmp_Loc_nIdLocal` int(11) NOT NULL,
  `DetPmp_UMan_nIdUMan` int(11) NOT NULL,
  `DetPmp_Per_nIdPeriodo` int(11) NOT NULL,
  `DetPmp_nMes` tinyint(2) NOT NULL,
  `DetPmp_cEstado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pmp_detalle`
--

INSERT INTO `pmp_detalle` (`DetPmp_IdDetPmp`, `DetPmp_Loc_nIdLocal`, `DetPmp_UMan_nIdUMan`, `DetPmp_Per_nIdPeriodo`, `DetPmp_nMes`, `DetPmp_cEstado`) VALUES
(1, 1, 1, 1, 1, '2'),
(2, 1, 1, 1, 8, '2'),
(3, 1, 2, 1, 9, '2'),
(4, 1, 4, 1, 10, '2'),
(5, 1, 5, 1, 10, '2'),
(6, 1, 6, 1, 10, '2'),
(7, 1, 7, 1, 8, '2'),
(8, 1, 8, 1, 11, '2'),
(9, 1, 9, 1, 8, '2'),
(10, 1, 10, 1, 10, '2'),
(11, 1, 11, 1, 1, '1'),
(12, 1, 11, 1, 9, '2'),
(13, 1, 12, 1, 9, '2'),
(14, 1, 13, 1, 2, '1'),
(15, 1, 13, 1, 11, '2'),
(16, 1, 15, 1, 2, '1'),
(17, 1, 15, 1, 7, '2'),
(18, 1, 16, 1, 2, '1'),
(19, 1, 16, 1, 7, '2'),
(21, 2, 1, 1, 8, '2'),
(22, 2, 2, 1, 9, '2'),
(23, 2, 4, 1, 10, '2'),
(24, 2, 5, 1, 10, '2'),
(25, 2, 6, 1, 10, '2'),
(26, 2, 7, 1, 8, '2'),
(27, 2, 8, 1, 11, '2'),
(28, 2, 9, 1, 8, '2'),
(29, 2, 10, 1, 10, '2'),
(31, 2, 11, 1, 9, '2'),
(32, 2, 12, 1, 9, '2'),
(33, 2, 13, 1, 2, '1'),
(34, 2, 13, 1, 11, '2'),
(35, 2, 15, 1, 2, '1'),
(36, 2, 15, 1, 7, '2'),
(37, 2, 16, 1, 2, '1'),
(38, 2, 16, 1, 7, '2'),
(39, 3, 2, 1, 9, '2'),
(40, 3, 4, 1, 10, '2'),
(41, 3, 5, 1, 10, '2'),
(42, 3, 8, 1, 11, '2'),
(43, 3, 9, 1, 8, '2'),
(44, 3, 10, 1, 10, '2'),
(45, 3, 12, 1, 9, '2'),
(46, 3, 15, 1, 7, '2'),
(47, 4, 1, 1, 8, '2'),
(48, 4, 2, 1, 9, '2'),
(49, 4, 4, 1, 10, '2'),
(50, 4, 5, 1, 1, '1'),
(51, 4, 5, 1, 10, '2'),
(52, 4, 6, 1, 10, '2'),
(53, 4, 7, 1, 8, '2'),
(54, 4, 8, 1, 11, '2'),
(55, 4, 9, 1, 2, '1'),
(56, 4, 9, 1, 8, '2'),
(57, 4, 10, 1, 1, '1'),
(58, 4, 10, 1, 10, '2'),
(59, 4, 12, 1, 1, '1'),
(60, 4, 12, 1, 9, '2'),
(61, 4, 15, 1, 7, '2'),
(62, 4, 16, 1, 7, '2'),
(63, 4, 17, 1, 10, '2'),
(64, 5, 1, 1, 8, '2'),
(65, 5, 2, 1, 9, '2'),
(66, 5, 4, 1, 10, '2'),
(67, 5, 5, 1, 1, '1'),
(68, 5, 5, 1, 10, '2'),
(69, 5, 6, 1, 2, '1'),
(70, 5, 6, 1, 10, '2'),
(71, 5, 7, 1, 8, '2'),
(72, 5, 8, 1, 11, '2'),
(73, 5, 9, 1, 1, '1'),
(74, 5, 9, 1, 8, '2'),
(75, 5, 10, 1, 1, '1'),
(76, 5, 10, 1, 10, '2'),
(77, 5, 12, 1, 1, '1'),
(78, 5, 12, 1, 9, '2'),
(79, 5, 13, 1, 1, '1'),
(80, 5, 13, 1, 11, '2'),
(81, 5, 15, 1, 7, '2'),
(82, 5, 16, 1, 7, '2'),
(83, 6, 1, 1, 8, '2'),
(84, 6, 2, 1, 1, '1'),
(85, 6, 2, 1, 9, '2'),
(86, 6, 4, 1, 10, '2'),
(87, 6, 5, 1, 3, '1'),
(88, 6, 5, 1, 10, '2'),
(89, 6, 6, 1, 10, '2'),
(90, 6, 7, 1, 1, '1'),
(91, 6, 7, 1, 8, '2'),
(92, 6, 8, 1, 2, '1'),
(93, 6, 8, 1, 11, '2'),
(94, 6, 9, 1, 8, '2'),
(95, 6, 10, 1, 10, '2'),
(96, 6, 11, 1, 9, '2'),
(97, 6, 12, 1, 2, '1'),
(98, 6, 12, 1, 9, '2'),
(99, 6, 13, 1, 2, '1'),
(100, 6, 13, 1, 11, '2'),
(101, 6, 15, 1, 7, '2'),
(102, 6, 16, 1, 7, '2'),
(103, 6, 18, 1, 11, '2'),
(104, 7, 1, 1, 8, '2'),
(105, 7, 2, 1, 2, '1'),
(106, 7, 2, 1, 9, '2'),
(107, 7, 4, 1, 10, '2'),
(108, 7, 5, 1, 10, '2'),
(109, 7, 6, 1, 10, '2'),
(110, 7, 7, 1, 1, '1'),
(111, 7, 7, 1, 8, '2'),
(112, 7, 8, 1, 2, '1'),
(113, 7, 8, 1, 11, '2'),
(114, 7, 9, 1, 8, '2'),
(115, 7, 10, 1, 10, '2'),
(116, 7, 11, 1, 9, '2'),
(117, 7, 12, 1, 2, '1'),
(118, 7, 12, 1, 9, '2'),
(119, 7, 13, 1, 2, '1'),
(120, 7, 13, 1, 11, '2'),
(121, 7, 14, 1, 3, '1'),
(122, 7, 14, 1, 9, '2'),
(123, 7, 15, 1, 2, '1'),
(124, 7, 15, 1, 7, '2'),
(125, 7, 16, 1, 7, '2'),
(126, 7, 17, 1, 2, '1'),
(127, 7, 17, 1, 10, '2'),
(128, 7, 18, 1, 11, '2'),
(129, 8, 1, 1, 3, '1'),
(130, 8, 1, 1, 8, '2'),
(131, 8, 2, 1, 3, '1'),
(132, 8, 2, 1, 9, '2'),
(133, 8, 3, 1, 3, '1'),
(134, 8, 3, 1, 9, '2'),
(135, 8, 4, 1, 10, '2'),
(136, 8, 5, 1, 4, '1'),
(137, 8, 5, 1, 10, '2'),
(138, 8, 6, 1, 4, '1'),
(139, 8, 6, 1, 10, '2'),
(140, 8, 7, 1, 3, '1'),
(141, 8, 7, 1, 8, '2'),
(142, 8, 8, 1, 2, '1'),
(143, 8, 8, 1, 11, '2'),
(144, 8, 9, 1, 8, '2'),
(145, 8, 10, 1, 2, '1'),
(146, 8, 10, 1, 10, '2'),
(147, 8, 11, 1, 2, '1'),
(148, 8, 11, 1, 10, '2'),
(149, 8, 12, 1, 1, '1'),
(150, 8, 12, 1, 9, '2'),
(151, 8, 13, 1, 1, '1'),
(152, 8, 13, 1, 11, '2'),
(153, 8, 14, 1, 9, '2'),
(154, 8, 15, 1, 7, '2'),
(155, 8, 16, 1, 7, '2'),
(156, 8, 17, 1, 2, '1'),
(157, 8, 17, 1, 10, '2'),
(158, 8, 18, 1, 2, '1'),
(159, 8, 18, 1, 11, '2'),
(160, 9, 1, 1, 8, '2'),
(161, 9, 2, 1, 9, '2'),
(162, 9, 3, 1, 9, '2'),
(163, 9, 4, 1, 10, '1'),
(164, 9, 5, 1, 2, '1'),
(165, 9, 5, 1, 10, '2'),
(166, 9, 6, 1, 2, '1'),
(167, 9, 6, 1, 10, '2'),
(168, 9, 7, 1, 2, '1'),
(169, 9, 7, 1, 8, '2'),
(170, 9, 8, 1, 2, '1'),
(171, 9, 8, 1, 11, '2'),
(172, 9, 9, 1, 8, '2'),
(173, 9, 10, 1, 10, '2'),
(174, 9, 11, 1, 3, '1'),
(175, 9, 11, 1, 10, '2'),
(176, 9, 12, 1, 3, '1'),
(177, 9, 12, 1, 9, '2'),
(178, 9, 13, 1, 3, '1'),
(179, 9, 13, 1, 11, '2'),
(180, 9, 14, 1, 3, '1'),
(181, 9, 14, 1, 9, '2'),
(182, 9, 15, 1, 2, '1'),
(183, 9, 15, 1, 7, '2'),
(184, 9, 16, 1, 7, '2'),
(185, 9, 17, 1, 2, '1'),
(186, 9, 17, 1, 10, '2'),
(187, 9, 18, 1, 11, '2'),
(188, 10, 1, 1, 8, '2'),
(189, 10, 2, 1, 9, '2'),
(190, 10, 3, 1, 9, '2'),
(191, 10, 4, 1, 10, '2'),
(192, 10, 5, 1, 10, '2'),
(193, 10, 6, 1, 10, '2'),
(194, 10, 7, 1, 8, '2'),
(195, 10, 8, 1, 2, '1'),
(196, 10, 8, 1, 11, '2'),
(197, 10, 9, 1, 8, '2'),
(198, 10, 10, 1, 10, '2'),
(199, 10, 11, 1, 9, '2'),
(200, 10, 12, 1, 9, '2'),
(201, 10, 13, 1, 11, '2'),
(202, 10, 14, 1, 9, '2'),
(203, 10, 15, 1, 7, '2'),
(204, 10, 16, 1, 7, '2'),
(205, 10, 17, 1, 10, '2'),
(206, 10, 18, 1, 11, '2'),
(207, 11, 1, 1, 8, '2'),
(208, 11, 2, 1, 9, '2'),
(209, 11, 3, 1, 9, '2'),
(210, 11, 4, 1, 10, '2'),
(211, 11, 5, 1, 10, '2'),
(212, 11, 6, 1, 10, '2'),
(213, 11, 7, 1, 8, '2'),
(214, 11, 8, 1, 11, '2'),
(215, 11, 9, 1, 8, '2'),
(216, 11, 10, 1, 10, '2'),
(217, 11, 11, 1, 9, '2'),
(218, 11, 12, 1, 3, '1'),
(219, 11, 12, 1, 9, '2'),
(220, 11, 13, 1, 3, '1'),
(221, 11, 13, 1, 11, '2'),
(222, 11, 14, 1, 3, '1'),
(223, 11, 14, 1, 9, '2'),
(224, 11, 15, 1, 2, '1'),
(225, 11, 15, 1, 7, '2'),
(226, 11, 16, 1, 2, '1'),
(227, 11, 16, 1, 7, '2'),
(228, 11, 17, 1, 3, '1'),
(229, 11, 17, 1, 10, '2'),
(230, 11, 18, 1, 3, '1'),
(231, 11, 18, 1, 11, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pmp_especialidad`
--

CREATE TABLE `pmp_especialidad` (
  `Esp_nIdEspecialidad` int(11) NOT NULL,
  `Esp_vNombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Esp_vIcono` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Esp_cEstado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pmp_especialidad`
--

INSERT INTO `pmp_especialidad` (`Esp_nIdEspecialidad`, `Esp_vNombre`, `Esp_vIcono`, `Esp_cEstado`) VALUES
(1, 'Instalaciones Eléctricas', 'fa-plug', '1'),
(2, 'Sistema de Bombeo', 'fa-tint', '1'),
(3, 'Sistema de Respaldo', 'fa-retweet', '1'),
(4, 'Saneamiento', 'fa-leaf', '1'),
(5, 'Sistema de Climatización', 'fa-cloud', '1'),
(6, 'Sistema Contraincendios', 'fa-bullhorn', '1'),
(7, 'Mantenimiento General', 'fa-wrench', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pmp_umant`
--

CREATE TABLE `pmp_umant` (
  `UMan_nIdUMan` int(11) NOT NULL,
  `UMan_Esp_nIdEspecialidad` int(11) NOT NULL,
  `UMan_vDescripcion` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `UMan_nFrecuencia` tinyint(4) NOT NULL,
  `UMan_cEstado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pmp_umant`
--

INSERT INTO `pmp_umant` (`UMan_nIdUMan`, `UMan_Esp_nIdEspecialidad`, `UMan_vDescripcion`, `UMan_nFrecuencia`, `UMan_cEstado`) VALUES
(1, 1, 'Sub estación eléctrica', 12, '1'),
(2, 1, 'Sub tableros y tableros eléctricos de baja tensión', 12, '1'),
(3, 1, 'Sub tableros y tableros eléctricos de media tensión', 12, '1'),
(4, 1, 'Sistema de puesta a tierra', 8, '1'),
(5, 2, 'Electrobombas de agua', 6, '1'),
(6, 2, 'Electrobombas de desagüe', 12, '1'),
(7, 3, 'Grupos Electrógenos', 6, '1'),
(8, 3, 'Iluminación de emergencia', 12, '1'),
(9, 3, 'Estabilizadores/UPS', 12, '1'),
(10, 4, 'Lavado de cisterna', 6, '1'),
(11, 4, 'Lavado de pozo séptico', 6, '1'),
(12, 5, 'Equipos de aire acondicionado', 3, '1'),
(13, 5, 'Extractores de aire/inyectores', 3, '1'),
(14, 5, 'Extractores de monóxido de carbono', 6, '1'),
(15, 6, 'Sistemas de detección y alarma contra incendios', 12, '1'),
(16, 6, 'Sistema de agua contra incendios', 12, '1'),
(17, 6, 'Mantenimiento de campanas extractoras cocinas', 6, '1'),
(18, 6, 'Presurización de escaleras', 12, '1'),
(19, 7, 'Vidrios', 12, '1'),
(20, 7, 'Ascensores', 1, '1'),
(21, 7, 'Mobiliario', 6, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `Pres_nIdPresupuesto` int(11) NOT NULL,
  `Pres_UExp_nIdUnExp` int(11) NOT NULL,
  `Pres_DptoProy_nIdDptoProyecto` int(11) NOT NULL,
  `Pres_Cta_nIdCuenta` int(11) NOT NULL,
  `Pres_nMes` tinyint(4) NOT NULL,
  `Pres_nMonto` decimal(8,2) NOT NULL,
  `Pres_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`Pres_nIdPresupuesto`, `Pres_UExp_nIdUnExp`, `Pres_DptoProy_nIdDptoProyecto`, `Pres_Cta_nIdCuenta`, `Pres_nMes`, `Pres_nMonto`, `Pres_cEstado`) VALUES
(1, 1, 1, 86, 1, '0.00', '1'),
(2, 1, 1, 109, 1, '92.00', '1'),
(3, 1, 1, 75, 1, '0.00', '1'),
(4, 1, 1, 92, 1, '26000.00', '1'),
(5, 1, 1, 93, 1, '10500.00', '1'),
(6, 1, 1, 99, 1, '0.00', '1'),
(7, 1, 1, 35, 1, '4640.00', '1'),
(8, 1, 1, 78, 1, '8500.00', '1'),
(9, 1, 1, 108, 1, '4000.00', '1'),
(10, 1, 1, 65, 1, '1400.00', '1'),
(11, 1, 1, 58, 1, '7000.00', '1'),
(12, 1, 1, 101, 1, '400.00', '1'),
(13, 1, 1, 84, 1, '0.00', '1'),
(14, 1, 1, 23, 1, '0.00', '1'),
(15, 1, 1, 1, 1, '0.00', '1'),
(16, 1, 1, 117, 1, '30000.00', '1'),
(17, 1, 1, 69, 1, '2000.00', '1'),
(18, 1, 1, 61, 1, '0.00', '1'),
(19, 1, 1, 95, 1, '0.00', '1'),
(20, 1, 1, 134, 1, '0.00', '1'),
(21, 1, 1, 40, 1, '350.00', '1'),
(22, 1, 1, 63, 1, '533.00', '1'),
(23, 1, 1, 37, 1, '0.00', '1'),
(24, 1, 1, 86, 2, '0.00', '1'),
(25, 1, 1, 109, 2, '92.00', '1'),
(26, 1, 1, 75, 2, '0.00', '1'),
(27, 1, 1, 92, 2, '30000.00', '1'),
(28, 1, 1, 93, 2, '12000.00', '1'),
(29, 1, 1, 99, 2, '800.00', '1'),
(30, 1, 1, 35, 2, '78112.00', '1'),
(31, 1, 1, 78, 2, '0.00', '1'),
(32, 1, 1, 108, 2, '15000.00', '1'),
(33, 1, 1, 65, 2, '16400.00', '1'),
(34, 1, 1, 58, 2, '0.00', '1'),
(35, 1, 1, 101, 2, '0.00', '1'),
(36, 1, 1, 84, 2, '0.00', '1'),
(37, 1, 1, 23, 2, '0.00', '1'),
(38, 1, 1, 1, 2, '0.00', '1'),
(39, 1, 1, 117, 2, '325.00', '1'),
(40, 1, 1, 69, 2, '2000.00', '1'),
(41, 1, 1, 61, 2, '1750.00', '1'),
(42, 1, 1, 95, 2, '0.00', '1'),
(43, 1, 1, 134, 2, '0.00', '1'),
(44, 1, 1, 40, 2, '350.00', '1'),
(45, 1, 1, 63, 2, '0.00', '1'),
(46, 1, 1, 37, 2, '60.00', '1'),
(47, 1, 1, 86, 3, '42000.00', '1'),
(48, 1, 1, 109, 3, '92.00', '1'),
(49, 1, 1, 75, 3, '1300.00', '1'),
(50, 1, 1, 92, 3, '34000.00', '1'),
(51, 1, 1, 93, 3, '13500.00', '1'),
(52, 1, 1, 99, 3, '0.00', '1'),
(53, 1, 1, 35, 3, '8000.00', '1'),
(54, 1, 1, 78, 3, '0.00', '1'),
(55, 1, 1, 108, 3, '13000.00', '1'),
(56, 1, 1, 65, 3, '1400.00', '1'),
(57, 1, 1, 58, 3, '0.00', '1'),
(58, 1, 1, 101, 3, '0.00', '1'),
(59, 1, 1, 84, 3, '0.00', '1'),
(60, 1, 1, 23, 3, '1250.00', '1'),
(61, 1, 1, 1, 3, '25400.00', '1'),
(62, 1, 1, 117, 3, '0.00', '1'),
(63, 1, 1, 69, 3, '2000.00', '1'),
(64, 1, 1, 61, 3, '0.00', '1'),
(65, 1, 1, 95, 3, '1300.00', '1'),
(66, 1, 1, 134, 3, '0.00', '1'),
(67, 1, 1, 40, 3, '350.00', '1'),
(68, 1, 1, 63, 3, '535.00', '1'),
(69, 1, 1, 37, 3, '0.00', '1'),
(70, 1, 1, 86, 4, '0.00', '1'),
(71, 1, 1, 109, 4, '92.00', '1'),
(72, 1, 1, 75, 4, '1300.00', '1'),
(73, 1, 1, 92, 4, '40000.00', '1'),
(74, 1, 1, 93, 4, '20000.00', '1'),
(75, 1, 1, 99, 4, '0.00', '1'),
(76, 1, 1, 35, 4, '8000.00', '1'),
(77, 1, 1, 78, 4, '0.00', '1'),
(78, 1, 1, 108, 4, '4875.00', '1'),
(79, 1, 1, 65, 4, '2650.00', '1'),
(80, 1, 1, 58, 4, '0.00', '1'),
(81, 1, 1, 101, 4, '0.00', '1'),
(82, 1, 1, 84, 4, '25000.00', '1'),
(83, 1, 1, 23, 4, '0.00', '1'),
(84, 1, 1, 1, 4, '0.00', '1'),
(85, 1, 1, 117, 4, '0.00', '1'),
(86, 1, 1, 69, 4, '2000.00', '1'),
(87, 1, 1, 61, 4, '0.00', '1'),
(88, 1, 1, 95, 4, '0.00', '1'),
(89, 1, 1, 134, 4, '0.00', '1'),
(90, 1, 1, 40, 4, '350.00', '1'),
(91, 1, 1, 63, 4, '0.00', '1'),
(92, 1, 1, 37, 4, '50.00', '1'),
(93, 1, 1, 86, 5, '0.00', '1'),
(94, 1, 1, 109, 5, '92.00', '1'),
(95, 1, 1, 75, 5, '1300.00', '1'),
(96, 1, 1, 92, 5, '40000.00', '1'),
(97, 1, 1, 93, 5, '27749.89', '1'),
(98, 1, 1, 99, 5, '0.00', '1'),
(99, 1, 1, 35, 5, '9200.00', '1'),
(100, 1, 1, 78, 5, '0.00', '1'),
(101, 1, 1, 108, 5, '1360.00', '1'),
(102, 1, 1, 65, 5, '2650.00', '1'),
(103, 1, 1, 58, 5, '0.00', '1'),
(104, 1, 1, 101, 5, '0.00', '1'),
(105, 1, 1, 84, 5, '0.00', '1'),
(106, 1, 1, 23, 5, '0.00', '1'),
(107, 1, 1, 1, 5, '0.00', '1'),
(108, 1, 1, 117, 5, '0.00', '1'),
(109, 1, 1, 69, 5, '2000.00', '1'),
(110, 1, 1, 61, 5, '500.00', '1'),
(111, 1, 1, 95, 5, '0.00', '1'),
(112, 1, 1, 134, 5, '0.00', '1'),
(113, 1, 1, 40, 5, '350.00', '1'),
(114, 1, 1, 63, 5, '533.00', '1'),
(115, 1, 1, 37, 5, '0.00', '1'),
(116, 1, 1, 86, 6, '0.00', '1'),
(117, 1, 1, 109, 6, '92.00', '1'),
(118, 1, 1, 75, 6, '1800.00', '1'),
(119, 1, 1, 92, 6, '50000.00', '1'),
(120, 1, 1, 93, 6, '15000.00', '1'),
(121, 1, 1, 99, 6, '0.00', '1'),
(122, 1, 1, 35, 6, '11500.00', '1'),
(123, 1, 1, 78, 6, '0.00', '1'),
(124, 1, 1, 108, 6, '0.00', '1'),
(125, 1, 1, 65, 6, '2650.00', '1'),
(126, 1, 1, 58, 6, '0.00', '1'),
(127, 1, 1, 101, 6, '0.00', '1'),
(128, 1, 1, 84, 6, '0.00', '1'),
(129, 1, 1, 23, 6, '0.00', '1'),
(130, 1, 1, 1, 6, '0.00', '1'),
(131, 1, 1, 117, 6, '0.00', '1'),
(132, 1, 1, 69, 6, '1500.00', '1'),
(133, 1, 1, 61, 6, '0.00', '1'),
(134, 1, 1, 95, 6, '1300.00', '1'),
(135, 1, 1, 134, 6, '0.00', '1'),
(136, 1, 1, 40, 6, '350.00', '1'),
(137, 1, 1, 63, 6, '0.00', '1'),
(138, 1, 1, 37, 6, '0.00', '1'),
(139, 1, 1, 86, 7, '0.00', '1'),
(140, 1, 1, 109, 7, '92.00', '1'),
(141, 1, 1, 75, 7, '1300.00', '1'),
(142, 1, 1, 92, 7, '50000.00', '1'),
(143, 1, 1, 93, 7, '15000.00', '1'),
(144, 1, 1, 99, 7, '0.00', '1'),
(145, 1, 1, 35, 7, '16330.00', '1'),
(146, 1, 1, 78, 7, '0.00', '1'),
(147, 1, 1, 108, 7, '4000.00', '1'),
(148, 1, 1, 65, 7, '2650.00', '1'),
(149, 1, 1, 58, 7, '7000.00', '1'),
(150, 1, 1, 101, 7, '400.00', '1'),
(151, 1, 1, 84, 7, '0.00', '1'),
(152, 1, 1, 23, 7, '0.00', '1'),
(153, 1, 1, 1, 7, '0.00', '1'),
(154, 1, 1, 117, 7, '0.00', '1'),
(155, 1, 1, 69, 7, '1500.00', '1'),
(156, 1, 1, 61, 7, '0.00', '1'),
(157, 1, 1, 95, 7, '0.00', '1'),
(158, 1, 1, 134, 7, '0.00', '1'),
(159, 1, 1, 40, 7, '350.00', '1'),
(160, 1, 1, 63, 7, '533.00', '1'),
(161, 1, 1, 37, 7, '50.00', '1'),
(162, 1, 1, 86, 8, '0.00', '1'),
(163, 1, 1, 109, 8, '92.00', '1'),
(164, 1, 1, 75, 8, '1300.00', '1'),
(165, 1, 1, 92, 8, '22668.67', '1'),
(166, 1, 1, 93, 8, '15000.00', '1'),
(167, 1, 1, 99, 8, '0.00', '1'),
(168, 1, 1, 35, 8, '9400.00', '1'),
(169, 1, 1, 78, 8, '0.00', '1'),
(170, 1, 1, 108, 8, '0.00', '1'),
(171, 1, 1, 65, 8, '2650.00', '1'),
(172, 1, 1, 58, 8, '0.00', '1'),
(173, 1, 1, 101, 8, '0.00', '1'),
(174, 1, 1, 84, 8, '0.00', '1'),
(175, 1, 1, 23, 8, '0.00', '1'),
(176, 1, 1, 1, 8, '0.00', '1'),
(177, 1, 1, 117, 8, '0.00', '1'),
(178, 1, 1, 69, 8, '1500.00', '1'),
(179, 1, 1, 61, 8, '500.00', '1'),
(180, 1, 1, 95, 8, '0.00', '1'),
(181, 1, 1, 134, 8, '101.00', '1'),
(182, 1, 1, 40, 8, '350.00', '1'),
(183, 1, 1, 63, 8, '0.00', '1'),
(184, 1, 1, 37, 8, '0.00', '1'),
(185, 1, 1, 86, 9, '0.00', '1'),
(186, 1, 1, 109, 9, '92.00', '1'),
(187, 1, 1, 75, 9, '1300.00', '1'),
(188, 1, 1, 92, 9, '50000.00', '1'),
(189, 1, 1, 93, 9, '15000.00', '1'),
(190, 1, 1, 99, 9, '0.00', '1'),
(191, 1, 1, 35, 9, '9200.00', '1'),
(192, 1, 1, 78, 9, '0.00', '1'),
(193, 1, 1, 108, 9, '0.00', '1'),
(194, 1, 1, 65, 9, '2650.00', '1'),
(195, 1, 1, 58, 9, '0.00', '1'),
(196, 1, 1, 101, 9, '0.00', '1'),
(197, 1, 1, 84, 9, '0.00', '1'),
(198, 1, 1, 23, 9, '0.00', '1'),
(199, 1, 1, 1, 9, '0.00', '1'),
(200, 1, 1, 117, 9, '0.00', '1'),
(201, 1, 1, 69, 9, '1500.00', '1'),
(202, 1, 1, 61, 9, '0.00', '1'),
(203, 1, 1, 95, 9, '1300.00', '1'),
(204, 1, 1, 134, 9, '0.00', '1'),
(205, 1, 1, 40, 9, '350.00', '1'),
(206, 1, 1, 63, 9, '533.00', '1'),
(207, 1, 1, 37, 9, '0.00', '1'),
(208, 1, 1, 86, 10, '0.00', '1'),
(209, 1, 1, 109, 10, '92.00', '1'),
(210, 1, 1, 75, 10, '1000.00', '1'),
(211, 1, 1, 92, 10, '50000.00', '1'),
(212, 1, 1, 93, 10, '15000.00', '1'),
(213, 1, 1, 99, 10, '0.00', '1'),
(214, 1, 1, 35, 10, '8000.00', '1'),
(215, 1, 1, 78, 10, '0.00', '1'),
(216, 1, 1, 108, 10, '0.00', '1'),
(217, 1, 1, 65, 10, '2650.00', '1'),
(218, 1, 1, 58, 10, '0.00', '1'),
(219, 1, 1, 101, 10, '0.00', '1'),
(220, 1, 1, 84, 10, '0.00', '1'),
(221, 1, 1, 23, 10, '0.00', '1'),
(222, 1, 1, 1, 10, '0.00', '1'),
(223, 1, 1, 117, 10, '0.00', '1'),
(224, 1, 1, 69, 10, '1500.00', '1'),
(225, 1, 1, 61, 10, '0.00', '1'),
(226, 1, 1, 95, 10, '0.00', '1'),
(227, 1, 1, 134, 10, '0.00', '1'),
(228, 1, 1, 40, 10, '350.00', '1'),
(229, 1, 1, 63, 10, '0.00', '1'),
(230, 1, 1, 37, 10, '50.00', '1'),
(231, 1, 1, 86, 11, '0.00', '1'),
(232, 1, 1, 109, 11, '92.00', '1'),
(233, 1, 1, 75, 11, '1400.00', '1'),
(234, 1, 1, 92, 11, '50000.00', '1'),
(235, 1, 1, 93, 11, '16200.00', '1'),
(236, 1, 1, 99, 11, '0.00', '1'),
(237, 1, 1, 35, 11, '9000.00', '1'),
(238, 1, 1, 78, 11, '0.00', '1'),
(239, 1, 1, 108, 11, '0.00', '1'),
(240, 1, 1, 65, 11, '2650.00', '1'),
(241, 1, 1, 58, 11, '0.00', '1'),
(242, 1, 1, 101, 11, '0.00', '1'),
(243, 1, 1, 84, 11, '0.00', '1'),
(244, 1, 1, 23, 11, '0.00', '1'),
(245, 1, 1, 1, 11, '0.00', '1'),
(246, 1, 1, 117, 11, '0.00', '1'),
(247, 1, 1, 69, 11, '1500.00', '1'),
(248, 1, 1, 61, 11, '500.00', '1'),
(249, 1, 1, 95, 11, '1000.00', '1'),
(250, 1, 1, 134, 11, '0.00', '1'),
(251, 1, 1, 40, 11, '350.00', '1'),
(252, 1, 1, 63, 11, '533.00', '1'),
(253, 1, 1, 37, 11, '0.00', '1'),
(254, 1, 1, 86, 12, '0.00', '1'),
(255, 1, 1, 109, 12, '92.00', '1'),
(256, 1, 1, 75, 12, '0.00', '1'),
(257, 1, 1, 92, 12, '40000.00', '1'),
(258, 1, 1, 93, 12, '13500.00', '1'),
(259, 1, 1, 99, 12, '0.00', '1'),
(260, 1, 1, 35, 12, '5000.00', '1'),
(261, 1, 1, 78, 12, '0.00', '1'),
(262, 1, 1, 108, 12, '0.00', '1'),
(263, 1, 1, 65, 12, '2650.00', '1'),
(264, 1, 1, 58, 12, '0.00', '1'),
(265, 1, 1, 101, 12, '0.00', '1'),
(266, 1, 1, 84, 12, '0.00', '1'),
(267, 1, 1, 23, 12, '0.00', '1'),
(268, 1, 1, 1, 12, '0.00', '1'),
(269, 1, 1, 117, 12, '0.00', '1'),
(270, 1, 1, 69, 12, '0.00', '1'),
(271, 1, 1, 61, 12, '0.00', '1'),
(272, 1, 1, 95, 12, '0.00', '1'),
(273, 1, 1, 134, 12, '0.00', '1'),
(274, 1, 1, 40, 12, '150.00', '1'),
(275, 1, 1, 63, 12, '0.00', '1'),
(276, 1, 1, 37, 12, '0.00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Prov_nIdProveedor` int(11) NOT NULL,
  `Prov_CodigoProveedor` char(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Prov_vRUC` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Prov_vNombreProveedor` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Prov_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Prov_nIdProveedor`, `Prov_CodigoProveedor`, `Prov_vRUC`, `Prov_vNombreProveedor`, `Prov_cEstado`) VALUES
(1, '2916', '20131911310', 'SEDALIB S.A.', '1'),
(2, '2300', '20132023540', 'HIDRANDINA S.A.', '1'),
(4, '2801', '20266352337', 'PRODUCTOS TISSUE DEL PERU S.A.', '1'),
(5, '5019', '20231217356', 'REPRESENTACIONES Y SERV SAN JORGE SRL', '1'),
(7, '1614', '20467534026', 'AMERICA MOVIL PERU S.A.C.', '1'),
(9, '7294', '', 'ESCUELA DE SEGURIDAD INTEGRAL S.A.C', '1'),
(10, '2410', '', 'INTERAMERICANA TRUJILLO S.A', '1'),
(11, '2935', '20482282084', 'SERVICIOS EMPRESARIALES RECEL S E.I.R.L.', '1'),
(14, '8213', '20482689354', 'DECONOR TRUJILLO SRL', '1'),
(15, '3838', '20477600116', 'SERVICIOS GENERALES JESANJO S.A.C.', '1'),
(16, '1905', '20477566775', 'CONSORCIO 3G E.I.R.L.', '1'),
(18, '2725', '', 'P&JLB INGS S.A.C.', '1'),
(19, '3028', '', 'TECNICAS CP S.A.C.', '1'),
(26, '6517', '', 'GEO SYSTEMS S.A.C.', '1'),
(27, '5979', '20498791728', 'POWER TECHNOLOGY S.A.C.', '1'),
(28, '2234', '', 'GEOINSTRUMENTOS S.A.C.', '1'),
(31, '3818', '20397808522', 'SERV.DE ADMINISTRACION TRIBUTARIA TRUJILLO', '1'),
(32, '2953', '20503133106', 'SFG SAC', '1'),
(36, '8129', '20101416560', 'PROMOTORA GENERAL DE NEGOCIOS S A', '1'),
(41, '3491', '', 'O & C INGENIERIA Y SERVICIOS LOGISTICOS', '1'),
(46, '8708', '20601871409', 'SOLUTION GRAPHIC EIRL', '1'),
(48, '6716', '20336157871', 'ALASKA INTERNACIONAL S.A.', '1'),
(53, '7828', '20600733258', 'GRUPO BCH S.A.C.', '1'),
(55, '3135', '20112351150', 'VIDEO BROADCAST', '1'),
(60, '1989', '20481949581', 'DATA ENERGY PERU S.A.C.', '1'),
(61, '2024', '20537321190', 'DIMERC PERU S.A.C.', '1'),
(71, '3383', '20519260485', 'LIMTEK SERVICIOS INTEGRALES SA', '1'),
(72, '6193', '20501827623', 'GESTION DE SERVICIOS COMPARTIDOS S.A.C.', '1'),
(77, '2770', '20100947634', 'PLANNING EST S A', '1'),
(78, '2366', '20510913532', 'INFOTEK PERU S.A.C.', '1'),
(79, '2332', '20519302153', 'IMJOSA S.A.C.', '1'),
(80, '8987', '10745761998', 'REYNA CASTRO', '1'),
(81, '3011', '20516526654', 'T & A ELECTRONICS SRL', '1'),
(82, '8595', '20559805514', 'ZONA FOTOGRAFICA E.I.R.L.', '1'),
(83, '2356', '20440445528', 'INDUSTRIAS GENERALES E INVERSIONES DON LUCHO', '1'),
(84, '9698', '20521183102', 'MULTISERVICIOS FIMAN SAC', '1'),
(85, '9748', '10427690321', 'HERNANDEZ RIOS LUIS ALEJANDRO', '1'),
(86, '1162', '10178701911', 'ROBALINO DE ROSAS', '1'),
(87, '5962', '20543922499', 'INDUSTRIAS JETUR S.A.C.', '1'),
(88, '6099', NULL, 'FLORES SANCHEZ', '1'),
(89, '308', NULL, 'CHAVEZ MACHADO', '1'),
(90, '9558', NULL, 'LANS CONSULTORES Y CONTRUCTORES EIRL', '1'),
(91, '2108', NULL, 'ELECTRO COMERCIAL TECNICA EIRL', '1'),
(92, '2424', NULL, 'INVERSIONES CALIFA S.R.L.', '1'),
(93, '2025', NULL, 'DIN AUTOMATIZACION SAC', '1'),
(94, '2973', NULL, 'SOCIEDAD INDUCONTROL INGENIERIA S.A.C.', '1'),
(95, '9658', NULL, 'PSP DEL PERU EMPRESA INDIVIDUAL DE', '1'),
(96, '8449', NULL, 'MAQUIPROCESOS E.I.R.L.', '1'),
(97, '9307', NULL, 'EQUIPOS ANALITICOS Y TECNOLOGIA DE', '1'),
(98, '8760', NULL, 'DEVELOPMENT Y TECNOLOGICAL SOLUTIONS SAC', '1'),
(99, '8616', NULL, 'TECCHSYS CONSULTING SAC', '1'),
(100, '2651', NULL, 'MULTIMPORT S.R.L.', '1'),
(101, '2103', NULL, 'PACIFICO COMPANIA DE SEGUROS Y', '1'),
(102, '6903', NULL, 'GONZALES ANTICONA', '1'),
(103, '1832', NULL, 'CIMATEC SAC', '1'),
(104, '2407', '20536452169', 'INTEGRAL PROJECT SRL', '1'),
(105, '2224', '20512814892', 'G. SEMPERTEGUI PROYECTOS GENERALES EIRL', '1'),
(106, '8880', '20519252628', 'NEOX CORPORATION S.A.C', '1'),
(107, '2496', '20100488427', 'KOSSODO SAC', '1'),
(108, '5327', '20123294662', 'MEQUIM S.A.', '1'),
(109, '6518', '20553069239', 'IWALL PERU S.A.C.', '1'),
(110, '1752', '20193681655', 'BONAVISTA SAC', '1'),
(111, '8580', '10416296681', 'RODRIGUEZ ZAVALETA MAGALI ELIZABETH', '1'),
(112, '7971', '20601080762', 'BIOSUPPORT INTERNATIONAL S.A.C', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Proy_nIdProyecto` tinyint(4) NOT NULL,
  `Proy_vProyecto` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Proy_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`Proy_nIdProyecto`, `Proy_vProyecto`, `Proy_cEstado`) VALUES
(1, 'OPEX', '1'),
(2, 'ONGOING', '1'),
(3, 'CIP', '1'),
(5, 'CPX OPEX', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepciones`
--

CREATE TABLE `recepciones` (
  `Rec_nIdRecepcion` int(11) NOT NULL,
  `Rec_Lin_nIdLineaSol` int(11) NOT NULL,
  `Rec_nCantRecibida` decimal(9,2) NOT NULL,
  `Rec_dFechaContable` date NOT NULL,
  `Rec_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recepciones`
--

INSERT INTO `recepciones` (`Rec_nIdRecepcion`, `Rec_Lin_nIdLineaSol`, `Rec_nCantRecibida`, `Rec_dFechaContable`, `Rec_cEstado`) VALUES
(1, 1, '1.00', '2020-04-14', '1'),
(2, 3, '1.00', '2020-04-16', '1'),
(3, 5, '1.00', '2020-03-19', '1'),
(4, 6, '1.00', '2020-03-19', '1'),
(5, 7, '1.00', '2020-03-19', '1'),
(6, 8, '1.00', '2020-03-19', '1'),
(7, 9, '1.00', '2020-03-19', '1'),
(8, 10, '1.00', '2020-03-19', '1'),
(9, 11, '1.00', '2020-03-19', '1'),
(10, 12, '1.00', '2020-03-19', '1'),
(11, 26, '1.00', '2020-03-19', '1'),
(12, 27, '1.00', '2020-03-07', '1'),
(13, 28, '1.00', '2020-03-03', '1'),
(14, 29, '1.00', '2020-03-07', '1'),
(15, 30, '1.00', '2020-03-07', '1'),
(16, 31, '1.00', '2020-03-07', '1'),
(17, 32, '1.00', '2020-03-07', '1'),
(18, 34, '1.00', '2020-03-11', '1'),
(19, 35, '1.00', '2020-02-24', '1'),
(20, 36, '1.00', '2020-02-12', '1'),
(21, 37, '1.00', '2020-01-14', '1'),
(22, 38, '1.00', '2020-03-07', '1'),
(23, 39, '1.00', '2020-03-03', '1'),
(24, 40, '1.00', '2020-03-03', '1'),
(25, 41, '1.00', '2020-03-03', '1'),
(26, 42, '1.00', '2020-03-03', '1'),
(27, 43, '1.00', '2020-03-03', '1'),
(28, 44, '1.00', '2020-03-03', '1'),
(29, 45, '1.00', '2020-03-25', '1'),
(30, 46, '1.00', '2020-03-02', '1'),
(31, 47, '1.00', '2020-03-02', '1'),
(32, 48, '1.00', '2020-03-04', '1'),
(33, 49, '1.00', '2020-02-20', '1'),
(34, 50, '1.00', '2020-02-24', '1'),
(35, 63, '1.00', '2020-03-09', '1'),
(36, 65, '1.00', '2020-02-20', '1'),
(37, 66, '1.00', '2020-02-20', '1'),
(38, 67, '1.00', '2020-02-20', '1'),
(39, 68, '1.00', '2020-02-20', '1'),
(40, 70, '39.00', '2020-03-04', '1'),
(41, 70, '30.00', '2020-03-11', '1'),
(42, 70, '35.00', '2020-03-11', '1'),
(43, 71, '3.00', '2020-03-02', '1'),
(44, 73, '1.00', '2020-02-18', '1'),
(45, 75, '1.00', '2020-02-18', '1'),
(46, 76, '1.00', '2020-03-11', '1'),
(47, 79, '6.00', '2020-03-02', '1'),
(48, 80, '2.00', '2020-03-02', '1'),
(49, 81, '1.00', '2020-03-02', '1'),
(50, 82, '32.00', '2020-03-02', '1'),
(51, 83, '9.00', '2020-03-02', '1'),
(52, 84, '9.00', '2020-03-02', '1'),
(53, 85, '8.00', '2020-03-02', '1'),
(54, 86, '3.00', '2020-03-02', '1'),
(55, 87, '9.00', '2020-03-02', '1'),
(56, 88, '9.00', '2020-03-02', '1'),
(57, 89, '9.00', '2020-03-02', '1'),
(58, 90, '9.00', '2020-03-02', '1'),
(59, 91, '1.00', '2020-03-02', '1'),
(60, 92, '9.00', '2020-03-02', '1'),
(61, 93, '10.00', '2020-03-02', '1'),
(62, 94, '1.00', '2020-03-25', '1'),
(63, 95, '1.00', '2020-02-04', '1'),
(64, 96, '1.00', '2020-02-05', '1'),
(65, 97, '1.00', '2020-02-20', '1'),
(66, 98, '1.00', '2020-03-23', '1'),
(67, 99, '1.00', '2020-03-23', '1'),
(68, 100, '35.00', '2020-03-23', '1'),
(69, 101, '3.00', '2020-03-23', '1'),
(70, 102, '30.00', '2020-03-23', '1'),
(71, 103, '5.00', '2020-03-23', '1'),
(72, 104, '15.00', '2020-03-23', '1'),
(73, 105, '40.00', '2020-03-23', '1'),
(74, 107, '1.00', '2020-02-24', '1'),
(75, 108, '1.00', '2020-02-24', '1'),
(76, 110, '100.00', '2020-02-04', '1'),
(77, 109, '100.00', '2020-02-04', '1'),
(78, 111, '90.00', '2020-01-14', '1'),
(79, 112, '67.00', '2020-01-14', '1'),
(80, 112, '43.00', '2020-01-21', '1'),
(81, 113, '1.00', '2020-03-03', '1'),
(82, 114, '1.00', '2020-02-05', '1'),
(83, 115, '1.00', '2020-02-05', '1'),
(84, 116, '1.00', '2020-02-05', '1'),
(85, 117, '1.00', '2020-02-05', '1'),
(86, 118, '9.00', '2020-03-11', '1'),
(87, 119, '1.00', '2020-03-11', '1'),
(88, 120, '1.00', '2020-03-11', '1'),
(89, 121, '1.00', '2020-02-05', '1'),
(90, 122, '1.00', '2020-02-05', '1'),
(91, 123, '1.00', '2020-02-05', '1'),
(92, 124, '1.00', '2020-02-24', '1'),
(93, 125, '1.00', '2020-02-24', '1'),
(94, 126, '1.00', '2020-02-24', '1'),
(95, 127, '1.00', '2020-02-24', '1'),
(96, 128, '1.00', '2020-02-24', '1'),
(97, 129, '1.00', '2020-02-24', '1'),
(98, 130, '1.00', '2020-03-25', '1'),
(99, 131, '2.00', '2020-02-17', '1'),
(100, 132, '1.00', '2020-02-24', '1'),
(101, 133, '1.00', '2020-02-24', '1'),
(102, 134, '1.00', '2020-02-24', '1'),
(103, 135, '2.00', '2020-02-24', '1'),
(104, 136, '2.00', '2020-02-24', '1'),
(105, 137, '2.00', '2020-02-24', '1'),
(106, 138, '2.00', '2020-02-24', '1'),
(107, 139, '2.00', '2020-02-24', '1'),
(108, 140, '2.00', '2020-02-24', '1'),
(109, 141, '1.00', '2020-02-24', '1'),
(110, 142, '1.00', '2020-03-05', '1'),
(111, 143, '301.00', '2020-02-24', '1'),
(112, 144, '1.00', '2020-02-18', '1'),
(113, 146, '1.00', '2020-01-27', '1'),
(114, 147, '1.00', '2020-01-22', '1'),
(115, 148, '1.00', '2020-01-22', '1'),
(116, 149, '1.00', '2020-02-05', '1'),
(117, 150, '1.00', '2020-01-27', '1'),
(118, 152, '1.00', '2020-02-05', '1'),
(119, 153, '1.00', '2020-02-05', '1'),
(120, 154, '1.00', '2020-01-22', '1'),
(121, 155, '1.00', '2020-01-22', '1'),
(122, 156, '1.00', '2020-01-22', '1'),
(123, 157, '1.00', '2020-01-22', '1'),
(124, 158, '12.00', '2020-01-14', '1'),
(125, 159, '1.00', '2020-01-22', '1'),
(126, 160, '155.10', '2020-02-06', '1'),
(127, 160, '122.95', '2020-04-09', '1'),
(128, 161, '92.00', '2020-02-21', '1'),
(129, 161, '92.00', '2020-03-02', '1'),
(130, 161, '92.00', '2020-03-23', '1'),
(131, 161, '92.00', '2020-04-17', '1'),
(132, 162, '42000.00', '2020-04-09', '1'),
(133, 163, '12573.16', '2020-02-14', '1'),
(134, 163, '12363.10', '2020-03-11', '1'),
(135, 163, '14527.85', '2020-04-12', '1'),
(136, 164, '7887.73', '2020-01-21', '1'),
(137, 164, '1361.68', '2020-01-27', '1'),
(138, 164, '30802.34', '2020-02-07', '1'),
(139, 164, '33714.25', '2020-03-23', '1'),
(140, 164, '29362.38', '2020-04-09', '1'),
(141, 69, '1.00', '2020-02-20', '1'),
(142, 24, '100.00', '2020-03-10', '1'),
(143, 25, '100.00', '2020-03-10', '1'),
(144, 2, '1.00', '2020-04-21', '1'),
(145, 166, '160.00', '2020-01-14', '1'),
(146, 167, '30.00', '2020-01-14', '1'),
(147, 165, '1.00', '2020-04-24', '0'),
(148, 168, '5.00', '2020-01-14', '1'),
(149, 169, '14.01', '2020-01-27', '1'),
(150, 169, '549.86', '2020-02-07', '1'),
(151, 169, '558.15', '2020-03-23', '1'),
(152, 169, '425.53', '2020-04-09', '1'),
(153, 170, '1.00', '2020-01-16', '1'),
(154, 171, '1.00', '2020-01-22', '1'),
(155, 172, '18766.53', '2020-01-27', '1'),
(156, 172, '18844.65', '2020-02-07', '1'),
(157, 172, '18226.58', '2020-03-23', '1'),
(158, 172, '14171.92', '2020-04-09', '1'),
(159, 173, '292.47', '2020-01-27', '1'),
(160, 173, '318.25', '2020-02-07', '1'),
(161, 173, '310.92', '2020-03-23', '1'),
(162, 173, '213.68', '2020-04-09', '1'),
(163, 174, '4781.30', '2020-02-14', '1'),
(164, 174, '4306.10', '2020-03-11', '1'),
(165, 174, '5524.55', '2020-04-12', '1'),
(166, 176, '388.49', '2020-01-24', '1'),
(167, 176, '1660.08', '2020-02-06', '1'),
(168, 176, '612.00', '2020-03-02', '1'),
(169, 176, '434.08', '2020-04-09', '1'),
(170, 177, '25741.19', '2020-04-09', '1'),
(171, 178, '74.00', '2020-02-21', '1'),
(172, 178, '74.00', '2020-03-02', '1'),
(173, 178, '74.00', '2020-03-23', '1'),
(174, 178, '74.00', '2020-04-17', '1'),
(175, 179, '1.00', '2020-01-24', '1'),
(176, 180, '3.00', '2020-01-24', '1'),
(177, 181, '1.00', '2020-02-13', '1'),
(178, 182, '1.00', '2020-02-13', '1'),
(179, 183, '1.00', '2020-02-13', '1'),
(180, 184, '1.00', '2020-02-13', '1'),
(181, 185, '1.00', '2020-02-13', '1'),
(182, 186, '1.00', '2020-01-20', '1'),
(183, 188, '40.00', '2020-01-28', '1'),
(184, 189, '400.00', '2020-01-28', '1'),
(185, 190, '200.00', '2020-01-28', '1'),
(186, 191, '24.00', '2020-01-28', '1'),
(187, 192, '120.00', '2020-01-28', '1'),
(188, 193, '60.00', '2020-01-28', '1'),
(189, 194, '60.00', '2020-01-28', '1'),
(190, 195, '60.00', '2020-01-28', '1'),
(191, 196, '60.00', '2020-01-28', '1'),
(192, 197, '10.00', '2020-01-28', '1'),
(193, 198, '10.00', '2020-01-28', '1'),
(194, 199, '6.00', '2020-01-28', '1'),
(195, 200, '1.00', '2020-01-20', '1'),
(196, 201, '1.00', '2020-02-14', '1'),
(197, 202, '2.00', '2020-02-14', '1'),
(198, 203, '1.00', '2020-02-14', '1'),
(199, 204, '1.00', '2020-01-27', '1'),
(200, 205, '1.00', '2020-01-27', '1'),
(201, 206, '36.00', '2020-02-04', '1'),
(202, 207, '1.00', '2020-02-04', '1'),
(203, 208, '1.00', '2020-02-04', '1'),
(204, 209, '15.00', '2020-03-12', '1'),
(205, 210, '1.00', '2020-02-24', '1'),
(206, 211, '1.00', '2020-01-27', '1'),
(207, 212, '1.00', '2020-02-10', '1'),
(208, 213, '1.00', '2020-02-20', '1'),
(209, 214, '1.00', '2020-03-03', '1'),
(210, 215, '15.00', '2020-02-20', '1'),
(211, 216, '40.00', '2020-02-20', '1'),
(212, 217, '170.00', '2020-02-04', '1'),
(213, 218, '72.00', '2020-03-03', '1'),
(214, 219, '1.00', '2020-03-12', '1'),
(215, 220, '1.00', '2020-02-24', '1'),
(216, 221, '1.00', '2020-03-12', '1'),
(217, 222, '4.00', '2020-03-06', '1'),
(218, 223, '34.00', '2020-03-06', '1'),
(219, 224, '11.00', '2020-03-06', '1'),
(220, 225, '12.00', '2020-03-06', '1'),
(221, 226, '1.00', '2020-02-18', '1'),
(222, 227, '1.00', '2020-02-13', '1'),
(223, 237, '2.00', '2020-03-10', '1'),
(224, 256, '1.00', '2020-02-18', '1'),
(225, 257, '1.00', '2020-03-02', '1'),
(226, 258, '34.00', '2020-03-11', '1'),
(227, 259, '7.00', '2020-03-11', '1'),
(228, 260, '14.00', '2020-03-11', '1'),
(229, 261, '2.00', '2020-03-11', '1'),
(230, 262, '2.00', '2020-03-11', '1'),
(231, 263, '1.00', '2020-02-18', '1'),
(232, 264, '1.00', '2020-03-02', '1'),
(233, 265, '1.00', '2020-03-02', '1'),
(234, 266, '1.00', '2020-02-14', '1'),
(235, 267, '1.00', '2020-02-20', '1'),
(236, 268, '1.00', '2020-02-20', '1'),
(237, 269, '1.00', '2020-03-07', '1'),
(238, 271, '1.00', '2020-02-21', '1'),
(239, 275, '1.00', '2020-02-21', '1'),
(240, 276, '1.00', '2020-02-21', '1'),
(241, 277, '1.00', '2020-02-21', '1'),
(242, 279, '1.00', '2020-02-20', '1'),
(243, 290, '1.00', '2020-03-03', '1'),
(244, 292, '2.00', '2020-03-04', '1'),
(245, 293, '2.00', '2020-03-04', '1'),
(246, 294, '5.00', '2020-03-04', '1'),
(247, 295, '3.00', '2020-03-04', '1'),
(248, 296, '1.00', '2020-03-04', '1'),
(249, 297, '1.00', '2020-03-04', '1'),
(250, 298, '1.00', '2020-03-04', '1'),
(251, 299, '1.00', '2020-03-04', '1'),
(252, 304, '17500.00', '2020-04-14', '1'),
(253, 305, '1.00', '2020-03-03', '1'),
(254, 306, '1.00', '2020-03-03', '1'),
(255, 309, '1.00', '2020-03-10', '1'),
(256, 312, '1.00', '2020-03-23', '1'),
(257, 314, '1.00', '2020-03-23', '1'),
(258, 316, '1.00', '2020-03-23', '1'),
(259, 337, '1.00', '2020-05-02', '1'),
(260, 165, '1.00', '2020-05-02', '1'),
(261, 331, '1.00', '2020-05-02', '1'),
(262, 338, '1.00', '2020-05-02', '1'),
(263, 172, '8075.77', '2020-05-08', '1'),
(264, 173, '111.23', '2020-05-08', '1'),
(265, 169, '228.48', '2020-05-08', '1'),
(266, 164, '15889.76', '2020-05-08', '1'),
(267, 356, '3.00', '2020-03-12', '1'),
(268, 339, '332214.40', '2020-05-08', '1'),
(269, 367, '3.00', '2020-02-20', '1'),
(270, 381, '13.00', '2020-02-24', '1'),
(271, 174, '1393.95', '2020-05-15', '1'),
(272, 371, '1.00', '2020-05-18', '1'),
(273, 178, '74.00', '2020-05-21', '1'),
(274, 163, '1445.15', '2020-05-22', '1'),
(275, 278, '1.00', '2020-05-22', '1'),
(276, 161, '92.00', '2020-05-21', '1'),
(277, 160, '512.63', '2020-06-01', '1'),
(278, 163, '4.50', '2020-06-01', '1'),
(279, 164, '15136.86', '2020-06-11', '1'),
(280, 169, '226.35', '2020-06-11', '1'),
(281, 4, '1.00', '2020-06-16', '0'),
(282, 4, '1.00', '2020-06-16', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `Sol_nIdSolicitud` int(11) NOT NULL,
  `Sol_vNroSolicitud` varchar(5) CHARACTER SET latin1 NOT NULL,
  `Sol_vDescripcionSol` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Sol_dFechaCreacion` date NOT NULL,
  `Sol_cTipoMoneda` char(1) CHARACTER SET latin1 NOT NULL,
  `Sol_nTipoCambio` decimal(4,2) DEFAULT NULL,
  `Sol_cEstadoSol` char(1) CHARACTER SET latin1 NOT NULL,
  `Sol_dFechaAct` date NOT NULL,
  `Sol_created_at` datetime NOT NULL,
  `Sol_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Sol_nIdSolicitud`, `Sol_vNroSolicitud`, `Sol_vDescripcionSol`, `Sol_dFechaCreacion`, `Sol_cTipoMoneda`, `Sol_nTipoCambio`, `Sol_cEstadoSol`, `Sol_dFechaAct`, `Sol_created_at`, `Sol_cEstado`) VALUES
(1, '75883', 'Cambio de bomba (TECAP Y Acred.)', '2020-01-02', '1', NULL, '5', '2020-04-20', '2020-04-15 16:57:54', '1'),
(2, '75890', 'Servicio de Energía Eléctrica 2020', '2020-01-02', '1', NULL, '4', '2020-06-11', '2020-04-15 16:59:20', '1'),
(3, '75894', 'Servicio de agua y alcantarillado 2020', '2020-01-02', '1', NULL, '4', '2020-06-01', '2020-04-15 17:00:19', '1'),
(4, '75895', 'SATT 2020', '2020-01-02', '1', NULL, '5', '2020-04-20', '2020-04-15 17:01:11', '1'),
(5, '75897', 'Servicio de TV por cable 2020', '2020-01-02', '1', NULL, '4', '2020-05-22', '2020-04-15 17:01:34', '1'),
(6, '75898', 'Suministro de combustible 2020', '2020-01-02', '1', NULL, '4', '2020-06-01', '2020-04-15 17:02:08', '1'),
(7, '75925', 'MP ascensores Enero', '2020-01-06', '1', NULL, '5', '2020-04-19', '2020-04-15 17:02:49', '1'),
(8, '75926', 'Suministro PH/PT para SSHH Enero', '2020-01-06', '1', NULL, '5', '2020-04-20', '2020-04-15 17:03:49', '1'),
(9, '75927', 'Suministros jabón para SSHH Enero', '2020-01-06', '1', NULL, '5', '2020-04-20', '2020-04-15 17:05:06', '1'),
(10, '76010', 'Acondicionamiento Oficina Sistemas', '2020-01-09', '1', NULL, '5', '2020-04-20', '2020-04-15 17:05:40', '1'),
(11, '76011', 'Memorias Descriptiva del SCI', '2020-01-09', '1', NULL, '5', '2020-04-20', '2020-04-15 17:06:05', '1'),
(12, '76017', 'MC 7 Equipos de AA (Pab A al G)', '2020-01-09', '1', NULL, '5', '2020-04-20', '2020-04-15 17:06:50', '1'),
(13, '76018', 'MC 2 Equipos de AA (Pab H)', '2020-01-09', '1', NULL, '5', '2020-04-20', '2020-04-15 17:07:16', '1'),
(14, '76109', 'Instalacion 14 Detectores de Humo (Pab A y F)', '2020-01-13', '1', NULL, '5', '2020-04-20', '2020-04-15 17:10:49', '1'),
(15, '76260', 'Suministro e Instalacion Tablero Electrico (TECAP y ACRED)', '2020-01-14', '1', NULL, '5', '2020-04-20', '2020-04-15 17:13:29', '1'),
(16, '76350', 'Mobiliario MT86 para Club Catedra (Pab H Exp)', '2020-01-14', '1', NULL, '3', '2020-04-20', '2020-04-15 17:14:36', '1'),
(17, '76374', 'Reubicacion de 2 camaras CCTV (Sistemas y HD)', '2020-01-15', '1', NULL, '5', '2020-04-20', '2020-04-15 17:15:25', '1'),
(18, '76546', 'MC Tuberia SSHH Pab A Piso 3 (Fac. Negocios)', '2020-01-16', '1', NULL, '5', '2020-04-20', '2020-04-15 17:16:44', '1'),
(19, '76548', 'MC Pared y Espejo SSHH Pab H Piso 1 Hombres', '2020-01-16', '1', NULL, '5', '2020-04-20', '2020-04-15 17:17:31', '1'),
(20, '76549', 'Suministro de materiales para SSGG Enero (1)', '2020-01-16', '1', NULL, '5', '2020-04-20', '2020-04-15 17:18:59', '1'),
(21, '76823', 'Suministro de combustible GE (Emergencia)', '2020-01-21', '1', NULL, '5', '2020-04-20', '2020-04-15 17:19:47', '1'),
(22, '76865', 'Servicio de copias de llaves', '2020-01-21', '1', NULL, '3', '2020-04-20', '2020-04-15 17:21:22', '1'),
(23, '76890', 'Micrófono omnidireccional (Sala Directorio)', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-15 17:22:21', '1'),
(24, '76955', 'Servicio de lavado de 301 cortinas', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-15 17:23:24', '1'),
(25, '77406', 'MP Campana Extractora de Cafetín (Pab F)', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:24:32', '1'),
(26, '77407', 'Acondicionamiento Puerta Ingreso LC1', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:26:53', '1'),
(27, '77408', 'Instalacion 2 Sensores de Temperatura (Pab B y F)', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:28:39', '1'),
(28, '77450', 'Recarga y Suministro de Extintores', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:31:26', '1'),
(29, '77464', 'MP Cuarto Grupo Electrógeno', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:37:45', '1'),
(30, '77466', 'Instalacion Barandas y Pasamanos Escalera Pab A', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:38:21', '1'),
(31, '77472', 'Instalacion Protectores para Luces Emergencia en Exteriores', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:39:11', '1'),
(32, '77474', 'MC Puerta Vidrio Templado Telemarketing', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:40:25', '1'),
(33, '77477', 'Materiales para Cercar Área Verde (Frontis Av Ejercito)', '2020-01-27', '1', NULL, '5', '2020-04-20', '2020-04-15 17:42:23', '1'),
(34, '77504', 'MP Ascensores Febrero', '2020-01-28', '1', NULL, '5', '2020-04-19', '2020-04-15 17:42:49', '1'),
(35, '77505', 'Suministro PH/PT para SSHH Febrero', '2020-01-28', '1', NULL, '5', '2020-04-20', '2020-04-15 17:44:14', '1'),
(36, '77575', 'MC y Suministro de Persianas', '2020-01-28', '1', NULL, '5', '2020-04-20', '2020-04-15 17:44:49', '1'),
(37, '77644', 'Suministro Escaleras de Seguridad', '2020-01-29', '1', NULL, '3', '2020-04-20', '2020-04-15 17:49:23', '1'),
(38, '77662', 'MC Carpetas, Tableros de Dibujo, Sillas y Mesas', '2020-01-29', '1', NULL, '5', '2020-04-20', '2020-04-15 17:50:32', '1'),
(39, '77667', 'Suministro e Instalacion de Lona (Caja y SA)', '2020-01-29', '1', NULL, '5', '2020-04-20', '2020-04-15 17:51:35', '1'),
(40, '77694', 'MP 25 Cámaras y Lentes', '2020-01-29', '1', NULL, '5', '2020-04-27', '2020-04-15 17:53:07', '1'),
(41, '77740', 'INDECI Instalacion Señaléticas y Extintores Adicionales', '2020-01-30', '1', NULL, '5', '2020-04-20', '2020-04-15 17:55:46', '1'),
(42, '77741', 'MC Grupo Electrógeno DC (Cambio de Tarjeta en Visor)', '2020-01-30', '1', NULL, '5', '2020-04-20', '2020-04-15 17:57:13', '1'),
(43, '77831', 'MP Antenas Seguridad y Bookcheck (CI)', '2020-01-31', '2', '3.33', '5', '2020-04-27', '2020-04-15 17:58:08', '1'),
(44, '77837', 'MC Ascensor Pab D (cambio de contacto)', '2020-01-31', '1', NULL, '5', '2020-04-19', '2020-04-15 17:58:56', '1'),
(45, '77839', 'Insumos para Botiquines de Lab. Especializados', '2020-01-31', '1', NULL, '5', '2020-04-20', '2020-04-15 17:59:53', '1'),
(46, '77896', 'MP Letrero Av Ejercito y Volumetrico', '2020-02-03', '1', NULL, '3', '2020-04-20', '2020-04-15 18:00:52', '1'),
(47, '78195', 'Recarga de 15 Extintores (Pab H)', '2020-02-05', '1', NULL, '5', '2020-04-20', '2020-04-15 18:01:48', '1'),
(48, '78225', 'INDECI Instalación de 10 Extintores en Azoteas', '2020-02-05', '1', NULL, '5', '2020-04-20', '2020-04-15 18:03:45', '1'),
(49, '78320', 'Suministro 24 Papeleros para Basura', '2020-02-06', '1', NULL, '3', '2020-04-20', '2020-04-15 18:04:49', '1'),
(50, '78333', 'Suministro de materiales para SSGG Febrero (1)', '2020-02-06', '1', NULL, '5', '2020-04-20', '2020-04-15 18:05:23', '1'),
(51, '78479', 'MP Caja Fuerte (Caja)', '2020-02-11', '1', NULL, '3', '2020-04-20', '2020-04-15 18:06:46', '1'),
(52, '78487', 'Suministro 3 Display Acrílicos Transparentes A3', '2020-02-11', '1', NULL, '5', '2020-04-20', '2020-04-15 18:07:28', '1'),
(53, '78561', 'Suministro de Agua en Bidón (Feb-Mar)', '2020-02-13', '1', NULL, '4', '2020-04-19', '2020-04-15 18:08:57', '1'),
(54, '78613', 'Aterramiento Equipos de AA', '2020-02-14', '1', NULL, '5', '2020-04-27', '2020-04-15 18:12:00', '1'),
(55, '78632', 'Elaboracion de 2 Pozos a Tierra (Pab B)', '2020-02-14', '1', NULL, '5', '2020-04-19', '2020-04-15 18:12:48', '1'),
(56, '78633', 'Elaboracion de 2 Pozos a Tierra (Pab E)', '2020-02-14', '1', NULL, '5', '2020-04-19', '2020-04-15 18:13:13', '1'),
(57, '78634', 'MC de 3 Pozos a Tierra (Pab A)', '2020-02-14', '1', NULL, '5', '2020-04-19', '2020-04-15 18:13:43', '1'),
(58, '78635', 'MC de 3 Pozos a Tierra (Pab C)', '2020-02-14', '1', NULL, '5', '2020-04-19', '2020-04-15 18:14:01', '1'),
(59, '78636', 'MC Mueble Sonido CAL', '2020-02-14', '1', NULL, '3', '2020-04-16', '2020-04-15 18:14:36', '1'),
(60, '78724', 'Suministro Pulsioxímetro Portátil Digital (Tópico G)', '2020-02-18', '1', NULL, '5', '2020-04-19', '2020-04-15 18:15:16', '1'),
(61, '78759', 'Suministro de Repuestos para Lab. PROA', '2020-02-20', '2', '3.33', '3', '2020-04-20', '2020-04-15 18:16:29', '1'),
(62, '78760', 'Suministro de Repuestos para Lab. PROA (2)', '2020-02-20', '2', '3.33', '3', '2020-04-19', '2020-04-15 18:17:21', '1'),
(63, '78762', 'MC Bomba de Pozo Séptico (Pab F)', '2020-02-20', '1', NULL, '5', '2020-04-19', '2020-04-15 18:18:24', '1'),
(64, '78765', 'Acondicionamiento Estabilizador y Puerta LC1', '2020-02-20', '1', NULL, '5', '2020-04-19', '2020-04-15 18:19:06', '1'),
(65, '78836', 'Instalación de Vinil Arenado en 3 Oficinas', '2020-02-24', '1', NULL, '5', '2020-04-27', '2020-04-15 18:20:34', '1'),
(66, '78840', 'INDECI Suministro Materiales SSGG (Observaciones Varias)', '2020-02-24', '1', NULL, '5', '2020-04-19', '2020-04-15 18:21:37', '1'),
(67, '78842', 'INDECI MP Puerta de Sub Estación (Pab B)', '2020-02-24', '1', NULL, '5', '2020-04-19', '2020-04-15 18:22:36', '1'),
(68, '78843', 'Actualización y Numeración Planos Pozos a Tierra', '2020-02-24', '1', NULL, '5', '2020-04-27', '2020-04-15 18:23:27', '1'),
(69, '78905', 'INDECI Instalación de 22 Gabinetes y 41 Señaléticas', '2020-02-25', '1', NULL, '5', '2020-04-19', '2020-04-15 18:24:50', '1'),
(70, '78931', 'INDECI Instalación de Manómetro y Aterramiento BCI', '2020-02-26', '1', NULL, '5', '2020-04-19', '2020-04-15 18:26:09', '1'),
(71, '78988', 'INDECI Trabajos Varios', '2020-02-27', '1', NULL, '5', '2020-04-19', '2020-04-15 18:26:44', '1'),
(72, '78989', 'INDECI MC Pared Drywall Centro de Acopio (Pab C)', '2020-02-27', '1', NULL, '5', '2020-04-19', '2020-04-15 18:27:12', '1'),
(73, '79034', 'INDECI MC TG Montaje Barras de Cobre', '2020-02-29', '1', NULL, '5', '2020-04-19', '2020-04-15 18:27:32', '1'),
(74, '79040', 'INDECI Suministro Switch Traslado Oficinas Emergencia', '2020-03-02', '1', NULL, '5', '2020-04-19', '2020-04-15 18:30:23', '1'),
(75, '79041', 'INDECI Reubicación Transformador y MC Tablero Bomba (Pab C)', '2020-03-02', '1', NULL, '5', '2020-04-19', '2020-04-15 18:32:26', '1'),
(76, '79045', 'MP Ascensores Marzo', '2020-03-02', '1', NULL, '5', '2020-04-19', '2020-04-15 18:33:12', '1'),
(77, '79050', 'Suministro de 9 Racks para Aulas (Pab H Exp)', '2020-03-02', '2', '3.33', '3', '2020-04-19', '2020-04-15 18:34:17', '1'),
(78, '79052', 'INDECI Aterramiento 20 Estructuras AA (Pab E, F y G)', '2020-03-02', '1', NULL, '5', '2020-04-19', '2020-04-15 18:35:20', '1'),
(79, '79054', 'INDECI Aterramiento 18 Estructuras AA (Pab B)', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:35:49', '1'),
(80, '79055', 'INDECI Aterramiento 18 Estructuras AA (Pab A)', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:36:06', '1'),
(81, '79058', 'INDECI Aterramientos Varios (Luminarias, Motores, etc)', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:36:42', '1'),
(82, '79059', 'INDECI MC 1 Pozo Tierra GE', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:37:12', '1'),
(83, '79062', 'INDECI Instalación Alarmas 3 Puertas Evacuación (Pab F)', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:38:07', '1'),
(84, '79077', 'INDECI Acondicionamiento Blocks Vidrio (Pab F)', '2020-03-02', '1', NULL, '5', '2020-04-18', '2020-04-15 18:39:03', '1'),
(85, '79082', 'Suministro PH/PT para SSHH Marzo', '2020-03-03', '1', NULL, '5', '2020-04-22', '2020-04-15 18:39:33', '1'),
(86, '79099', 'Instalación 1 Punto Red Oficina Marketing (Pab H Piso 1)', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:40:59', '1'),
(87, '79104', 'Suministro 15 Acrílicos Transparentes y Letreros (Pab H Exp)', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:42:21', '1'),
(88, '79107', 'Instalación 10 Pizarras (Pab H Exp)', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:43:18', '1'),
(89, '79110', 'Suministro de 20 Extintores, 12 Pedestales y Señaléticas (Pa', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:45:48', '1'),
(90, '79112', 'Suministro de Persianas (Pab H Exp)', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:46:42', '1'),
(91, '79114', 'Suministro 24 Papeleros para Aulas (Pab H Exp)', '2020-03-03', '1', NULL, '3', '2020-04-18', '2020-04-15 18:47:19', '1'),
(92, '79116', 'Suministro 10 Papeleros para SSHH (Pab H Exp)', '2020-03-03', '1', NULL, '3', '2020-04-21', '2020-04-15 18:47:47', '1'),
(93, '79139', 'INDECI Instalacion 8 Detectores Humo (Pab A)', '2020-03-04', '1', NULL, '5', '2020-04-18', '2020-04-15 18:50:25', '1'),
(94, '79141', 'INDECI Instalacion 6 Detectores Humo (Pab B y F)', '2020-03-04', '1', NULL, '5', '2020-04-18', '2020-04-15 18:51:23', '1'),
(95, '79224', 'Servicio de Fumigación, Desratización y Desinfección', '2020-03-05', '1', NULL, '5', '2020-04-18', '2020-04-15 18:52:02', '1'),
(96, '79250', 'INDECI Suministro Materiales SSGG (Observaciones Varias 2)', '2020-03-07', '1', NULL, '5', '2020-04-18', '2020-04-15 18:53:11', '1'),
(97, '79410', 'INDECI Alquiler 1 GE 135KW (48 Horas)', '2020-03-14', '1', NULL, '5', '2020-04-18', '2020-04-15 18:53:55', '1'),
(98, '79411', 'INDECI Alquiler 1 GE 150KW (48 Horas)', '2020-03-14', '1', NULL, '5', '2020-04-18', '2020-04-15 18:56:38', '1'),
(99, '79412', 'INDECI Alquiler 1 GE 110KW (48 Horas)', '2020-03-14', '1', NULL, '5', '2020-04-18', '2020-04-15 18:56:59', '1'),
(100, '79413', 'INDECI Alquiler 1 GE 110KW (48 Horas) II', '2020-03-14', '1', NULL, '5', '2020-04-18', '2020-04-15 18:57:21', '1'),
(101, '79562', 'MP Ascensores Abril', '2020-04-03', '1', NULL, '5', '2020-06-16', '2020-04-15 18:57:51', '1'),
(102, '79596', 'Suministro de combustible GE (Emergencia)', '2020-04-14', '1', NULL, '5', '2020-04-17', '2020-04-15 18:58:54', '1'),
(103, '79597', 'Suministro Mampara Vidrio Laminado (LC3)', '2020-04-14', '1', NULL, '5', '2020-04-17', '2020-04-15 18:59:12', '1'),
(104, '79606', 'INDECI Instalacion 6 Detectores Humo (Pab A)', '2020-04-16', '1', NULL, '5', '2020-04-22', '2020-04-16 20:17:54', '1'),
(105, '76995', 'Mantenimiento bancas y mesas', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-19 22:49:44', '1'),
(106, '76990', 'Remodelación Lab Fotografía', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-19 22:50:26', '1'),
(107, '76983', 'Sillas para oficina', '2020-01-22', '1', NULL, '5', '2020-04-27', '2020-04-19 22:50:44', '1'),
(108, '76976', 'Suministro de EPP (Adm. Campus)', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-19 22:51:07', '1'),
(109, '76959', 'Mantenimiento de tachos de basura', '2020-01-22', '1', NULL, '5', '2020-04-20', '2020-04-19 22:51:26', '1'),
(110, '79629', 'INDECI Instalacion Barandas Pab G', '2020-04-21', '1', NULL, '5', '2020-05-02', '2020-04-21 23:24:42', '1'),
(111, '75896', 'Suministro PH/PT para SSHH Enero', '2020-01-02', '1', NULL, '5', '2020-04-23', '2020-04-23 20:56:43', '1'),
(112, '75899', 'Suministros jabón para SSHH Enero', '2020-01-02', '1', NULL, '5', '2020-04-27', '2020-04-27 13:35:46', '1'),
(113, '75891', 'Servicio de Energía Eléctrica 2020 (INAFECTO)', '2020-01-02', '1', NULL, '4', '2020-06-11', '2020-04-27 17:20:26', '1'),
(114, '75900', 'MP Ascensores Enero', '2020-01-02', '1', NULL, '5', '2020-04-27', '2020-01-02 00:00:00', '1'),
(115, '75901', 'Eliminacion de desmonte Enero', '2020-01-02', '1', NULL, '5', '2020-04-27', '2020-01-02 00:00:00', '1'),
(116, '75905', 'Servicio de Energía Eléctrica 2020', '2020-01-03', '1', NULL, '4', '2020-05-08', '2020-01-03 00:00:00', '1'),
(117, '75906', 'Servicio de Energía Eléctrica 2020 (INAFECTO)', '2020-01-03', '1', NULL, '4', '2020-05-08', '2020-01-03 00:00:00', '1'),
(118, '75907', 'Servicio de agua y alcantarillado 2020', '2020-01-03', '1', NULL, '4', '2020-05-15', '2020-01-03 00:00:00', '1'),
(119, '75908', 'Servicio de agua y alcantarillado 2020 (INAFECTO)', '2020-01-03', '1', NULL, '3', '2020-05-09', '2020-01-03 00:00:00', '1'),
(120, '75909', 'Suministro de combustible 2020', '2020-01-03', '1', NULL, '4', '2020-04-27', '2020-01-03 00:00:00', '1'),
(121, '75911', 'SATT 2020', '2020-01-03', '1', NULL, '4', '2020-04-27', '2020-01-03 00:00:00', '1'),
(122, '75912', 'Servicio de TV por cable 2020', '2020-01-03', '1', NULL, '4', '2020-05-21', '2020-01-03 00:00:00', '1'),
(123, '76083', 'MC Equipos Especializados', '2020-01-10', '2', '3.33', '5', '2020-04-27', '2020-01-10 00:00:00', '1'),
(124, '76114', 'Mant Mobiliario', '2020-01-13', '1', NULL, '5', '2020-04-27', '2020-01-13 00:00:00', '1'),
(125, '76179', 'Suministro de materiales para SSGG Enero(1)', '2020-01-13', '1', NULL, '5', '2020-04-28', '2020-01-13 00:00:00', '1'),
(126, '76213', 'Expediente INDECI', '2020-01-13', '1', NULL, '3', '2020-04-27', '2020-01-13 00:00:00', '1'),
(127, '76291', 'Insumos CAL SI Verano', '2020-01-14', '1', NULL, '5', '2020-04-27', '2020-01-14 00:00:00', '1'),
(128, '76297', 'Insumos Verano CALSI', '2020-01-14', '1', NULL, '5', '2020-04-27', '2020-01-14 00:00:00', '1'),
(129, '76325', 'Falla Sistema Bombeo', '2020-01-14', '1', NULL, '5', '2020-04-27', '2020-01-14 00:00:00', '1'),
(130, '76341', 'MC Equipos Esp Minas', '2020-01-15', '2', '3.33', '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(131, '76342', 'MC Tuberia Pared Ing Minas', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(132, '76390', 'MC Equipos AA', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(133, '76461', 'MC Cerraduras Aulas', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(134, '76462', 'MP Piso de auditorio', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(135, '76463', 'Mantenimiento tribuna', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(136, '76464', 'Mantenimiento pared de aulas', '2020-01-15', '1', NULL, '5', '2020-04-27', '2020-01-15 00:00:00', '1'),
(137, '76553', 'Estructura Panel Numerico', '2020-01-16', '1', NULL, '5', '2020-04-27', '2020-01-16 00:00:00', '1'),
(138, '76554', 'Enchapado Pozo Bombas Sumerg', '2020-01-16', '1', NULL, '5', '2020-04-28', '2020-01-16 00:00:00', '1'),
(139, '76568', 'Supervision Eléctrica INDECI (EM)', '2020-01-17', '1', NULL, '5', '2020-04-28', '2020-01-17 00:00:00', '1'),
(140, '76728', 'Pasamanos Plaza Hundida', '2020-01-20', '1', NULL, '5', '2020-04-28', '2020-01-20 00:00:00', '1'),
(141, '76816', 'Pintado Losa Deportiva', '2020-01-21', '1', NULL, '5', '2020-04-28', '2020-01-21 00:00:00', '1'),
(142, '77385', 'Laminas Seguridad', '2020-01-24', '1', NULL, '5', '2020-04-28', '2020-01-24 00:00:00', '1'),
(143, '77460', 'Suministro PH/PT para SSHH Febrero', '2020-01-27', '1', NULL, '5', '2020-04-28', '2020-01-27 00:00:00', '1'),
(144, '77580', 'Mantenimiento Ventanas', '2020-01-28', '1', NULL, '5', '2020-04-28', '2020-01-28 00:00:00', '1'),
(145, '77586', 'MP Puertas de Vidrio', '2020-01-28', '1', NULL, '5', '2020-04-28', '2020-01-28 00:00:00', '1'),
(146, '77587', 'Mant Asientos y Planchado Bus', '2020-01-28', '1', NULL, '5', '2020-04-28', '2020-01-28 00:00:00', '1'),
(147, '77590', 'MC Puertas', '2020-01-28', '1', NULL, '5', '2020-04-28', '2020-01-28 00:00:00', '1'),
(148, '77593', 'Mant Bancas Mesas Tachos', '2020-01-28', '1', NULL, '5', '2020-04-28', '2020-01-28 00:00:00', '1'),
(149, '77815', 'Tableros Electricos', '2020-01-31', '1', NULL, '5', '2020-04-28', '2020-01-31 00:00:00', '1'),
(150, '77835', 'Cableado Auditorio', '2020-01-31', '1', NULL, '5', '2020-04-28', '2020-01-31 00:00:00', '1'),
(151, '77908', 'OG Mobiliario I', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-02-03 00:00:00', '1'),
(152, '77912', 'OG Mobiliario II', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(153, '77947', 'OG Tamices', '2020-02-03', '1', NULL, '1', '2020-04-28', '2020-02-03 00:00:00', '1'),
(154, '77956', 'OG Estacion Total', '2020-02-03', '1', NULL, '1', '2020-04-28', '2020-02-03 00:00:00', '1'),
(155, '77965', 'OG Balanzas', '2020-02-03', '2', '3.33', '6', '2020-04-28', '2020-02-03 00:00:00', '1'),
(156, '77972', 'OG Mezcladora', '2020-02-03', '1', NULL, '6', '2020-04-28', '2020-02-03 00:00:00', '1'),
(157, '77980', 'OG Moldes', '2020-02-03', '1', NULL, '1', '2020-04-28', '2020-02-03 00:00:00', '1'),
(158, '77982', 'OG GPS', '2020-02-03', '2', '3.33', '5', '2020-04-28', '2020-02-03 00:00:00', '1'),
(159, '77986', 'OG Horno', '2020-02-03', '1', NULL, '2', '2020-04-28', '2020-02-03 00:00:00', '1'),
(160, '77995', 'OG Prensa para concreto FORNEY', '2020-02-03', '1', NULL, '2', '2020-04-28', '2020-02-03 00:00:00', '1'),
(161, '77998', 'OG Eq Lab Topografia', '2020-02-03', '2', '3.33', '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(162, '78003', 'OG Lab Suelos', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-02-03 00:00:00', '1'),
(163, '78010', 'OG Lab Concreto', '2020-02-03', '1', NULL, '1', '2020-04-28', '2020-02-03 00:00:00', '1'),
(164, '78014', 'OG Eq Lab Minerologia', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(165, '78016', 'OG Cortadora', '2020-02-03', '1', NULL, '6', '2020-04-27', '2020-02-03 00:00:00', '0'),
(166, '78018', 'OG Modulo Educativo', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-02-03 00:00:00', '1'),
(167, '78022', 'OG Correntometro', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(168, '78024', 'OG Perdida Carga', '2020-02-03', '1', NULL, '2', '2020-04-28', '2020-02-03 00:00:00', '1'),
(169, '78025', 'OG Clasificador Rocas', '2020-02-03', '1', NULL, '6', '2020-04-28', '2020-02-03 00:00:00', '1'),
(170, '78027', 'OG Celda Perimetrica', '2020-02-03', '1', NULL, '6', '2020-04-28', '2020-02-03 00:00:00', '1'),
(171, '78030', 'OG Pizarras', '2020-02-03', '1', NULL, '6', '2020-04-28', '2020-02-03 00:00:00', '1'),
(172, '78033', 'OG Reemplazo Piso', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(173, '78037', 'OG Puente Pab H', '2020-02-03', '1', NULL, '1', '2020-04-28', '2020-02-03 00:00:00', '1'),
(174, '78039', 'OG Estructura Techo Pab H', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(175, '78041', 'OG Control Acceso', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(176, '78043', 'OG HVAC Catedra Pab H', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(177, '78045', 'OG HVAC Catedra Pab B', '2020-02-03', '1', NULL, '3', '2020-04-28', '2020-02-03 00:00:00', '1'),
(178, '78056', 'MP Ascensores Febrero', '2020-02-04', '1', NULL, '5', '2020-04-28', '2020-02-04 00:00:00', '1'),
(179, '78071', 'Reubicacion de gabinetes de red (TI)', '2020-02-04', '1', NULL, '5', '2020-04-28', '2020-02-04 00:00:00', '1'),
(180, '78198', 'MP y recarga de extintores', '2020-02-05', '1', NULL, '5', '2020-04-28', '2020-02-05 00:00:00', '1'),
(181, '78203', 'OG Concr Suelos S.', '2020-02-05', '1', NULL, '1', '2020-04-28', '2020-02-05 00:00:00', '1'),
(182, '78227', 'Memorias Descripctivas SCI', '2020-02-05', '1', NULL, '5', '2020-04-28', '2020-02-05 00:00:00', '1'),
(183, '78242', 'MC Equipos Especializados', '2020-02-05', '1', NULL, '5', '2020-04-28', '2020-02-05 00:00:00', '1'),
(184, '78311', 'Suministro de materiales para SSGG Febrero (1)', '2020-02-06', '1', NULL, '5', '2020-04-28', '2020-02-06 00:00:00', '1'),
(185, '78331', 'Extintores Señaléticas PREINDECI', '2020-02-06', '1', NULL, '5', '2020-04-28', '2020-02-06 00:00:00', '1'),
(186, '78374', 'MP adoquines pasadizos', '2020-02-07', '1', NULL, '5', '2020-04-28', '2020-02-07 00:00:00', '1'),
(187, '78445', 'MP Equipos Especializado 2', '2020-02-11', '1', NULL, '5', '2020-04-28', '2020-02-11 00:00:00', '1'),
(188, '78446', 'MP equipos especializados (espect. y horno de grafito)', '2020-02-11', '2', '3.33', '6', '2020-06-10', '2020-02-11 00:00:00', '1'),
(189, '78460', 'Anclaje Estantes CI', '2020-02-11', '1', NULL, '5', '2020-04-28', '2020-02-11 00:00:00', '1'),
(190, '78462', 'MP 141 Equipos Espec Med', '2020-02-11', '1', NULL, '3', '2020-04-28', '2020-02-11 00:00:00', '1'),
(191, '78610', 'MP 190km BUS T1S-727', '2020-02-13', '1', NULL, '3', '2020-04-28', '2020-02-13 00:00:00', '1'),
(192, '78611', 'MP 140k BUS T1V-794', '2020-02-13', '1', NULL, '3', '2020-04-28', '2020-02-13 00:00:00', '1'),
(193, '78612', 'MC Pozos Tierra', '2020-02-13', '1', NULL, '5', '2020-04-28', '2020-02-13 00:00:00', '1'),
(194, '78614', 'Prueba Hermeticidad y Certificación Gas', '2020-02-14', '1', NULL, '5', '2020-04-28', '2020-02-14 00:00:00', '1'),
(195, '78615', 'Reubiaciones Estacion Manual', '2020-02-14', '1', NULL, '5', '2020-04-28', '2020-02-14 00:00:00', '1'),
(196, '78617', 'Mejora Climatizacion AA Lab', '2020-02-14', '1', NULL, '5', '2020-05-22', '2020-02-14 00:00:00', '1'),
(197, '78625', 'Certificacion Estructuras Metálicas', '2020-02-14', '1', NULL, '5', '2020-04-28', '2020-02-14 00:00:00', '1'),
(198, '78656', 'MC Equipos de Civil', '2020-02-17', '1', NULL, '6', '2020-06-10', '2020-02-17 00:00:00', '1'),
(199, '78803', 'Llaves Diferenciales', '2020-02-20', '1', NULL, '5', '2020-04-28', '2020-02-20 00:00:00', '1'),
(200, '78819', 'Lavado Cortinas', '2020-02-21', '1', NULL, '3', '2020-04-28', '2020-02-21 00:00:00', '1'),
(201, '78847', 'Herramientas Inform. CALSI', '2020-02-24', '1', NULL, '5', '2020-04-28', '2020-02-24 00:00:00', '1'),
(202, '78874', 'SOAT Bus T1S-727', '2020-02-25', '1', NULL, '3', '2020-05-08', '2020-02-25 00:00:00', '1'),
(203, '78877', 'Lamparas Proyectores CAL', '2020-02-25', '1', NULL, '6', '2020-06-10', '2020-02-25 00:00:00', '1'),
(204, '78879', 'EMERG Superv Observ INDECI', '2020-02-25', '1', NULL, '4', '2020-04-28', '2020-02-25 00:00:00', '1'),
(205, '78899', 'EMERG Inst Electricas INDECI', '2020-02-25', '1', NULL, '4', '2020-05-08', '2020-02-25 00:00:00', '1'),
(206, '78968', 'Suministro de materiales para SSGG Febrero (2)', '2020-02-27', '1', NULL, '5', '2020-04-28', '2020-02-27 00:00:00', '1'),
(207, '78969', 'Suministro de materiales para SSGG Febrero (3)', '2020-02-27', '1', NULL, '5', '2020-04-28', '2020-02-27 00:00:00', '1'),
(208, '78970', 'Suministro PH/PT para SSHH Marzo', '2020-02-27', '1', NULL, '6', '2020-06-10', '2020-02-27 00:00:00', '1'),
(209, '78972', 'Suministros jabón para SSHH Marzo', '2020-02-27', '1', NULL, '6', '2020-06-10', '2020-02-27 00:00:00', '1'),
(210, '78973', 'MP Ascensores Marzo', '2020-02-27', '1', NULL, '5', '2020-04-28', '2020-02-27 00:00:00', '1'),
(211, '78975', 'Eliminación de desmonte Marzo', '2020-02-27', '1', NULL, '3', '2020-04-28', '2020-02-27 00:00:00', '1'),
(212, '79035', 'Apertura vano puerta Banner', '2020-02-29', '1', NULL, '3', '2020-04-28', '2020-02-29 00:00:00', '1'),
(213, '79178', 'Fumigacion y Desratiz. SI', '2020-03-04', '1', NULL, '5', '2020-04-28', '2020-03-04 00:00:00', '1'),
(214, '79190', 'Personal apoyo multifunción trabajos varios (INDECI)', '2020-03-05', '1', NULL, '3', '2020-04-28', '2020-03-05 00:00:00', '1'),
(215, '79336', 'Drywall Tuberias AA', '2020-03-10', '1', NULL, '5', '2020-04-28', '2020-03-10 00:00:00', '1'),
(216, '79342', 'OG Eq Lab Minerología I', '2020-03-10', '1', NULL, '3', '2020-04-28', '2020-03-10 00:00:00', '1'),
(217, '79343', 'OG Eq Lab Minerología II', '2020-03-10', '1', NULL, '1', '2020-04-28', '2020-03-10 00:00:00', '1'),
(218, '79366', 'MP Tuberias ACI', '2020-03-11', '1', NULL, '5', '2020-04-28', '2020-03-11 00:00:00', '1'),
(219, '79367', 'Insumos Botiquines', '2020-03-11', '1', NULL, '6', '2020-04-28', '2020-03-11 00:00:00', '1'),
(220, '79541', 'MC Equipos Especializados', '2020-03-31', '1', NULL, '6', '2020-04-28', '2020-03-31 00:00:00', '1'),
(221, '79542', 'SOAT Bus T1V-794', '2020-03-31', '1', NULL, '1', '2020-04-28', '2020-03-31 00:00:00', '1'),
(222, '79564', 'MP Ascensores Abril', '2020-04-03', '1', NULL, '1', '2020-04-28', '2020-04-03 00:00:00', '1'),
(223, '79681', 'Suministro de Combustible GE Data Center (Emergencia)', '2020-04-28', '1', NULL, '5', '2020-05-02', '2020-04-28 08:37:25', '1'),
(224, '79686', 'Cambio de cajas de pozos a tierra', '2020-04-28', '1', NULL, '5', '2020-05-02', '2020-04-28 12:31:06', '1'),
(225, '79687', 'Suministro e instalación de luces de emergencia en azoteas', '2020-04-28', '1', NULL, '5', '2020-05-02', '2020-04-28 12:31:28', '1'),
(226, '75651', 'CPX Pizarras sedes', '2020-01-01', '2', '3.33', '5', '2020-05-08', '2020-05-08 18:26:09', '1'),
(227, '75671', 'CPX Mobiliario I', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 18:45:51', '1'),
(228, '75674', 'CPX Campana extractora', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 20:32:15', '1'),
(229, '75675', 'CPX Proyecto CCTV (Pab H Exp)', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 20:41:10', '1'),
(230, '76152', 'CPX Muebles estantería', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 20:46:07', '1'),
(231, '76154', 'CPX Sillas', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 20:50:44', '1'),
(232, '76221', 'CPX Ecrans', '2020-01-01', '2', '3.33', '3', '2020-05-08', '2020-05-08 20:56:07', '1'),
(233, '76467', 'CPX Proyectores', '2020-01-01', '2', '3.33', '5', '2020-05-08', '2020-05-08 21:04:08', '1'),
(234, '76508', 'CPX Biométrico club cátedra (Pab H Exp.)', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 21:13:56', '1'),
(235, '78313', 'CPX Sillas y carpetas', '2020-01-01', '1', NULL, '3', '2020-05-08', '2020-05-08 21:18:11', '1'),
(236, '79749', 'Extensión detectores de humo', '2020-05-05', '1', NULL, '5', '2020-05-18', '2020-05-08 22:33:03', '1'),
(237, '77923', 'OG Ciencias', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-05-09 10:32:33', '1'),
(238, '77945', 'OG Ciencias VI', '2020-02-03', '2', '3.33', '3', '2020-05-09', '2020-05-09 10:38:16', '1'),
(239, '77970', 'OG Ciencias XI', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-05-09 10:43:51', '1'),
(240, '77997', 'OG Mobiliario Tru', '2020-02-03', '1', NULL, '3', '2020-05-09', '2020-05-09 10:50:07', '1'),
(241, '78048', 'OG Proyectores', '2020-02-03', '2', '3.33', '5', '2020-05-09', '2020-05-09 14:36:39', '1'),
(242, '78214', 'OG Totems 55', '2020-02-05', '1', NULL, '3', '2020-05-09', '2020-05-09 14:49:11', '1'),
(243, '79051', 'OG Dispensadores', '2020-03-02', '1', NULL, '3', '2020-05-09', '2020-05-09 14:55:38', '1'),
(244, '79283', 'OG Gastronomia', '2020-03-09', '1', NULL, '3', '2020-05-09', '2020-05-09 14:59:54', '1'),
(245, '79291', 'OG Ciencias SI', '2020-03-09', '1', NULL, '3', '2020-05-09', '2020-05-09 15:03:11', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `SubCat_nIdSubCategoria` int(11) NOT NULL,
  `SubCat_vSubCategoria` varchar(7) CHARACTER SET latin1 NOT NULL,
  `SubCat_vDescripcion` varchar(60) CHARACTER SET latin1 NOT NULL,
  `SubCat_Cta_nIdCuenta` int(11) NOT NULL,
  `SubCat_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`SubCat_nIdSubCategoria`, `SubCat_vSubCategoria`, `SubCat_vDescripcion`, `SubCat_Cta_nIdCuenta`, `SubCat_cEstado`) VALUES
(1, 'S011301', 'Servicios de mantenimiento de equipos académicos', 1, '1'),
(2, 'S010101', 'Animales y suministros relacionados', 2, '1'),
(3, 'S010201', 'Equipo deportivo', 3, '1'),
(4, 'S010204', 'Equipo deportivo CAPEX', 4, '1'),
(5, 'S010202', 'Artículos Deportivos', 3, '1'),
(6, 'S010203', 'Ropa de deporte', 3, '1'),
(7, 'S010301', 'Equipo de encuadernación de libros', 5, '1'),
(8, 'S010401', 'Servicio de encuadernación de libros', 5, '1'),
(9, 'S010501', 'Libros de la biblioteca / Libros electrónicos', 5, '1'),
(10, 'S010502', 'Libros de la biblioteca / Libros electrónicos CAPEX', 4, '1'),
(11, 'S010601', 'Materiales Clínicos', 6, '1'),
(12, 'S010602', 'Materiales del curso', 2, '1'),
(13, 'S010701', 'Equipo dental', 6, '1'),
(14, 'S010702', 'Equipo dental CAPEX', 4, '1'),
(15, 'S010801', 'Suministros Dentales', 6, '1'),
(16, 'S010901', 'Salarios de los maestros a tiempo completo', 7, '1'),
(17, 'S010902', 'Salarios de los maestros a tiempo parcial', 8, '1'),
(18, 'S010903', 'Servicios de Asistente de Enseñanza', 9, '1'),
(19, 'S010904', 'Temporary Teacher Wages', 10, '1'),
(20, 'S010905', 'Profesor visitante', 11, '1'),
(21, 'S011001', 'Bebidas (alcohólicas)', 12, '1'),
(22, 'S011016', 'Bebidas (alcohólicas) VAT', 12, '1'),
(23, 'S011002', 'Bebidas (No-alcohólicas)', 12, '1'),
(24, 'S011017', 'Bebidas (No-alcohólicas) VAT', 12, '1'),
(25, 'S011003', 'Pan y productos de panadería', 12, '1'),
(26, 'S011018', 'Pan y productos de panadería VAT', 12, '1'),
(27, 'S011004', 'Productos de Cereales y Legumbres', 12, '1'),
(28, 'S011019', 'Productos de Cereales y Legumbres VAT', 12, '1'),
(29, 'S011005', 'Chocolate, Azúcares, Edulcorantes y Productos de Confitería', 12, '1'),
(30, 'S011020', 'Chocolate, Azúcares, Edulcorantes y Productos de Confitería ', 12, '1'),
(31, 'S011006', 'Productos lácteos y huevos', 12, '1'),
(32, 'S011021', 'Productos lácteos y huevos VAT', 12, '1'),
(33, 'S011007', 'Aceites y grasas comestibles', 12, '1'),
(34, 'S011022', 'Aceites y grasas comestibles VAT', 12, '1'),
(35, 'S011008', 'Food / Beverage Equipment', 12, '1'),
(36, 'S011023', 'Food / Beverage Equipment CAPEX', 4, '1'),
(37, 'S011009', 'Futas', 12, '1'),
(38, 'S011024', 'Frutas VAT', 12, '1'),
(39, 'S011010', 'Productos de Carne y Aves', 12, '1'),
(40, 'S011025', 'Productos de Carne y Aves VAT', 12, '1'),
(41, 'S011011', 'Nueces y semillas', 12, '1'),
(42, 'S011026', 'Nueces y semillas VAT', 12, '1'),
(43, 'S011012', 'Alimentos Preparados y Conservados', 12, '1'),
(44, 'S011027', 'Alimentos Preparados y Conservados VAT', 12, '1'),
(45, 'S011013', 'Mariscos', 12, '1'),
(46, 'S011028', 'Mariscos VAT', 12, '1'),
(47, 'S011014', 'Condimentos y Conservantes', 12, '1'),
(48, 'S011029', 'Condimentos y Conservantes VAT', 12, '1'),
(49, 'S011015', 'Vegetales', 12, '1'),
(50, 'S011030', 'Vegetales VAT', 12, '1'),
(51, 'S011101', 'Ropa  ', 13, '1'),
(52, 'S011102', 'Productos de no ropa', 74, '1'),
(53, 'S011103', 'Libros de no-biblioteca', 5, '1'),
(54, 'S011201', 'Equipo de laboratorio', 2, '1'),
(55, 'S011202', 'Equipo de laboratorio CAPEX', 4, '1'),
(56, 'S011401', 'Adhesivos y abrazaderas', 2, '1'),
(57, 'S011402', 'Soluciones Químicas y Reactivos', 2, '1'),
(58, 'S011403', 'Instrumentos de Filtración', 2, '1'),
(59, 'S011404', 'Suministros de Filtración', 2, '1'),
(60, 'S011405', 'Gafas', 2, '1'),
(61, 'S011406', 'Gases Industriales y Líquidos', 2, '1'),
(62, 'S011407', 'Instrumentos y Suministros Respiratorios', 2, '1'),
(63, 'S011408', 'Cromatografía líquida (HPLC)', 2, '1'),
(64, 'S011409', 'Rieles', 2, '1'),
(65, 'S011410', 'Plástica', 2, '1'),
(66, 'S011411', 'Sondas y Tubos', 2, '1'),
(67, 'S011412', 'Reguladores', 2, '1'),
(68, 'S011501', 'Ropa de cama', 2, '1'),
(69, 'S011601', 'Equipo médico', 2, '1'),
(70, 'S011602', 'Equipo médico CAPEX', 4, '1'),
(71, 'S011701', 'Suministros médicos', 2, '1'),
(72, 'S011801', 'Cuotas / cuotas de membresía', 14, '1'),
(73, 'S011901', 'Instrumentos Musicales, Accesorios, Suministros y Repuestos', 35, '1'),
(74, 'S011902', 'Instrumentos Musicales', 35, '1'),
(75, 'S011904', 'Instrumentos Musicales CAPEX', 4, '1'),
(76, 'S012001', 'Curso en Línea / Servicios de Desarrollo de Currículo', 15, '1'),
(77, 'S012002', 'Curso en Línea / Servicios de Desarrollo de Currículo CAPEX', 115, '1'),
(78, 'S012101', 'Productos de Cuidado Personal', 2, '1'),
(79, 'S012201', 'Suscripciones de libros', 16, '1'),
(80, 'S012202', 'Suscripciones a revistas', 16, '1'),
(81, 'S012301', 'Equipo Veterinario', 2, '1'),
(82, 'S012302', 'Equipo Veterinario CAPEX', 4, '1'),
(83, 'S012401', 'Suministros Veterinarios', 2, '1'),
(84, 'S012501', 'Entrenamiento vocacional', 17, '1'),
(85, 'S012601', 'Acuerdos de Intenrship', 18, '1'),
(86, 'S012701', 'Condimentos y Conservantes', 19, '1'),
(87, 'S012702', 'Bebidas (alcohólicas)', 19, '1'),
(88, 'S012703', 'Bebidas (No-alcohólicas)', 19, '1'),
(89, 'S012704', 'Pan y productos de panadería', 19, '1'),
(90, 'S012705', 'Productos de Cereales y Legumbres', 19, '1'),
(91, 'S012706', 'Chocolate, Azúcares, Edulcorantes y Productos de Confitería', 19, '1'),
(92, 'S012707', 'Productos lácteos y huevos', 19, '1'),
(93, 'S012708', 'Aceites y grasas comestibles', 19, '1'),
(94, 'S012709', 'Frutas ', 19, '1'),
(95, 'S012710', 'Productos de Carne y Aves', 19, '1'),
(96, 'S012711', 'Nueces y semillas', 19, '1'),
(97, 'S012712', 'Alimentos Preparados y Conservados', 19, '1'),
(98, 'S012713', 'Mariscos', 19, '1'),
(99, 'S012714', 'Vegetales', 19, '1'),
(100, 'S012801', 'Derechos de autor', 20, '1'),
(101, 'S012802', 'Tesis', 21, '1'),
(102, 'S012804', 'Tarifas para socios universitarios', 22, '1'),
(103, 'S012805', 'Derechos de licencia', 23, '1'),
(104, 'S012803', 'Honorarios de Patrocinio', 24, '1'),
(105, 'S012901', 'Gastos del examen', 25, '1'),
(106, 'S013001', 'Investigación y subvención Gastos del proyecto', 26, '1'),
(107, 'S013101', 'Alquiler de Vivienda para Estudiantes', 27, '1'),
(108, 'S013201', 'Intercambio Estudiante COGS Exp', 28, '1'),
(109, 'S013301', 'Entretenimiento Estudiantil', 29, '1'),
(110, 'S013401', 'Gastos Directos de Tecnología', 30, '1'),
(111, 'S013501', 'Contra el gasto de ingresos', 31, '1'),
(112, 'S020101', 'Servicios de mensajería', 32, '1'),
(113, 'S020201', 'Servicios de archivado y almacenamiento de documentos', 33, '1'),
(114, 'S020301', 'Reembolso de millas', 34, '1'),
(115, 'S020403', 'Productos de Cuidado Personal no relacionados con el curso', 35, '1'),
(116, 'S020401', 'Fotocopia y papel de impresión', 36, '1'),
(117, 'S020402', 'Materiales de escritura', 37, '1'),
(118, 'S020501', 'Franqueo', 38, '1'),
(119, 'S020601', 'Servicios de copiado', 33, '1'),
(120, 'S020602', 'Servicios de grabación de medios', 33, '1'),
(121, 'S020603', 'Servicios de impresión', 33, '1'),
(122, 'S020701', 'Servicios de vehículos blindados', 39, '1'),
(123, 'S020702', 'Servicios de transporte y carga', 40, '1'),
(124, 'S020703', 'Transporte del Estudiante', 41, '1'),
(125, 'S020801', 'Pasaje aéreo', 42, '1'),
(126, 'S020802', 'Tarifas relacionadas con la tarifa aérea', 42, '1'),
(127, 'S020803', 'Tarifas relacionadas con el hotel', 43, '1'),
(128, 'S020804', 'Hoteles / Alojamientos - Domésticos', 43, '1'),
(129, 'S020805', 'Hoteles / Alojamiento - Internacional', 43, '1'),
(130, 'S020806', 'Comidas / Entretenimiento', 44, '1'),
(131, 'S020810', 'Tarifas y peajes de estacionamiento', 45, '1'),
(132, 'S020807', 'Vehículos de alquiler', 46, '1'),
(133, 'S020808', 'Taxi / Limusina / Ferrocarril / Autobús', 47, '1'),
(134, 'S020809', 'Servicios de agencia de viajes', 48, '1'),
(135, 'S020901', 'Donaciones', 49, '1'),
(136, 'S021001', 'Reconocimiento de empleados', 50, '1'),
(137, 'S021101', 'Subsidio de comida', 51, '1'),
(138, 'S030101', 'Pinturas', 4, '1'),
(139, 'S030102', 'Esculturas', 4, '1'),
(140, 'S030301', 'Servicios de Mejoramiento de Capital (CIP)', 52, '1'),
(141, 'S030302', 'Mejoras en Arrendamiento', 53, '1'),
(142, 'S030201', 'Proyectos de Mejoras de Capital (CIP)', 52, '1'),
(143, 'S030401', 'Gastos de gastos de condominio', 54, '1'),
(144, 'S030501', 'Gastos de Arrendamiento de Edificios', 55, '1'),
(145, 'S030502', 'Condominio de Arrendamiento', 55, '1'),
(146, 'S030503', 'Casa (Director o Ejecutivo) Gastos de Arrendamiento', 55, '1'),
(147, 'S030504', 'Gastos de arrendamiento de propiedad de terceros', 55, '1'),
(148, 'S030701', 'Servicios de limpieza y mantenimiento general', 56, '1'),
(149, 'S030702', 'Servicios de Mantenimiento Eléctrico', 57, '1'),
(150, 'S030703', 'Servicios de Reparación Eléctrica', 57, '1'),
(151, 'S030704', 'Servicios de mantenimiento de ascensores', 65, '1'),
(152, 'S030705', 'Servicios de reparación de ascensores', 65, '1'),
(153, 'S030706', 'Servicios de Mantenimiento / Reparación de Muebles', 58, '1'),
(154, 'S030707', 'Jardines / Servicios de Jardinería', 59, '1'),
(155, 'S030708', 'Servicios de Mantenimiento y Reparación de HVAC', 57, '1'),
(156, 'S030709', 'Servicios de Cerrajería', 60, '1'),
(157, 'S030710', 'Servicios de Control de Plagas', 56, '1'),
(158, 'S030711', 'Servicios de mantenimiento / reparación de fontanería', 57, '1'),
(159, 'S030712', 'Servicios De Desecho / Reciclaje / Trituración', 61, '1'),
(160, 'S030713', 'Reparaciones - Daños Estudiantiles', 62, '1'),
(161, 'S030601', 'Suministros de Limpieza', 63, '1'),
(162, 'S030602', 'Suministros Eléctricos', 64, '1'),
(163, 'S030603', 'Mantenimiento de Ascensores / Suministros de Reparación', 65, '1'),
(164, 'S030604', 'Hardware / Fasteners', 35, '1'),
(165, 'S030605', 'Suministros HVAC / Refrigeración', 35, '1'),
(166, 'S030606', 'Suministros de Iluminación', 35, '1'),
(167, 'S030607', 'Suministros de Plomería (Tuberías, Válvulas, Conexiones)', 64, '1'),
(168, 'S030608', 'Suministros de Seguridad / Seguridad', 35, '1'),
(169, 'S030609', 'Herramientas y equipo', 35, '1'),
(170, 'S030610', 'Ventana / Cristal', 35, '1'),
(171, 'S030801', 'Servicios de Coffee Break', 66, '1'),
(172, 'S030802', 'Servicios de comidas y bebidas', 66, '1'),
(173, 'S030805', 'Empleado Servicios de comidas y bebidas', 67, '1'),
(174, 'S030803', 'Servicios de máquinas expendedoras', 68, '1'),
(175, 'S030804', 'Servicios de bidones de agua', 69, '1'),
(176, 'S030806', 'Servicios - Café', 70, '1'),
(177, 'S030807', 'Catering / Comidas - Estudiantes', 71, '1'),
(178, 'S030901', 'Suministros de papel (tejidos, toallas, servilletas, tazas, ', 63, '1'),
(179, 'S030902', 'Suministros de plástico (tazas, platos, utensilios)', 35, '1'),
(180, 'S031001', 'Accesorios', 35, '1'),
(181, 'S031010', 'Accesorios CAPEX', 4, '1'),
(182, 'S031003', 'Equipos y suministros de primeros auxilios', 35, '1'),
(183, 'S031004', 'Generador Equipo / Suministros', 64, '1'),
(184, 'S031011', 'Generador Equipo', 4, '1'),
(185, 'S031005', 'Equipos de HVAC', 35, '1'),
(186, 'S031012', 'Equipos de HVAC CAPEX', 4, '1'),
(187, 'S031006', 'Equipos de instalaciones arrendadas', 72, '1'),
(188, 'S031007', 'Maquinaria y equipamiento', 35, '1'),
(189, 'S031002', 'Maquinaria y equipamiento CAPEX', 4, '1'),
(190, 'S031009', 'Equipos de instalaciones alquiladas', 73, '1'),
(191, 'S031008', 'Equipo de Seguridad / Seguridad', 4, '1'),
(192, 'S031013', 'Equipo de Seguridad / Seguridad CAPEX', 4, '1'),
(193, 'S031101', 'Carbón y Leña', 74, '1'),
(194, 'S031102', 'Diesel', 75, '1'),
(195, 'S031103', 'Gasolina', 75, '1'),
(196, 'S031104', 'Aceite de calefacción', 76, '1'),
(197, 'S031105', 'Propano / Gas Natural', 77, '1'),
(198, 'S031201', 'Decoraciones y adornos', 35, '1'),
(199, 'S031206', 'Decoraciones y adornos CAPEX', 4, '1'),
(200, 'S031202', 'Luminarias', 35, '1'),
(201, 'S031209', 'Luminarias CAPEX', 4, '1'),
(202, 'S031203', 'Artículos para el hogar', 35, '1'),
(203, 'S031210', 'Artículos para el hogar CAPEX', 4, '1'),
(204, 'S031204', 'Muebles de laboratorio', 6, '1'),
(205, 'S031207', 'Muebles de laboratorio CAPEX', 4, '1'),
(206, 'S031205', 'Muebles no de laboratorio', 35, '1'),
(207, 'S031208', 'Muebles no de laboratorio CAPEX', 4, '1'),
(208, 'S031301', 'Compras de tierras', 4, '1'),
(209, 'S031401', 'Servicios de lavanderia', 78, '1'),
(210, 'S031501', 'Servicios de correo', 79, '1'),
(211, 'S031601', 'Subsidio de Vivienda', 80, '1'),
(212, 'S031602', 'Servicios de mudanza / reubicación', 81, '1'),
(213, 'S031603', 'Servicios de mudanzas', 82, '1'),
(214, 'S031701', 'Servicios de Mantenimiento de Lote / Carretera', 59, '1'),
(215, 'S031801', 'Servicios de gestión de aparcamientos', 59, '1'),
(216, 'S031802', 'Espacios de estacionamiento arrendados', 83, '1'),
(217, 'S031901', 'Servicios Inmobiliarios / Administración de Arrendamiento', 84, '1'),
(218, 'S032001', 'Bienes Raíces Compra (Edificios)', 4, '1'),
(219, 'S032101', 'Servicios de Recepción', 79, '1'),
(220, 'S032201', 'Servicios de capacitación en seguridad y protección', 60, '1'),
(221, 'S032202', 'Servicios De Seguridad', 85, '1'),
(222, 'S032301', 'Ciudad Académica / Permisos Locales', 86, '1'),
(223, 'S032303', 'Permisos ambientales', 86, '1'),
(224, 'S032304', 'Multas y sanciones', 87, '1'),
(225, 'S032305', 'Permisos Municipales', 86, '1'),
(226, 'S032302', 'Permisos No-Académicos de la Ciudad / Local', 86, '1'),
(227, 'S032306', 'VAT', 88, '1'),
(228, 'S032307', 'Impuestos de bienes inmuebles arrendados', 89, '1'),
(229, 'S032401', 'Uniformes administrativos', 90, '1'),
(230, 'S032402', 'Uniformes de seguridad', 90, '1'),
(231, 'S032403', 'Uniformes de Estudiantes', 91, '1'),
(232, 'S032404', 'Uniformes para Profesores', 91, '1'),
(233, 'S032405', 'Uniforme Accesorios y Suministros', 90, '1'),
(234, 'S032501', 'Electricidad', 92, '1'),
(235, 'S032502', 'Gas Natural / Propano', 77, '1'),
(236, 'S032503', 'Agua y alcantarillado', 93, '1'),
(237, 'S032603', 'Vehículos arrendados', 94, '1'),
(238, 'S032604', 'Vehículos comprados para uso de la compañía', 4, '1'),
(239, 'S032605', 'Vehículos comprados para uso individual', 4, '1'),
(240, 'S032601', 'Mantenimiento de Vehículos / Servicios de Reparación', 95, '1'),
(241, 'S032602', 'Equipos / Suministros de Mantenimiento de Vehículos', 95, '1'),
(242, 'S032701', 'Alquiler de locales académicos', 96, '1'),
(243, 'S032702', 'Alquiler de locales no académicos', 97, '1'),
(244, 'S032801', 'Seguro de espacio alquilado', 98, '1'),
(245, 'S040101', 'Equipo Audiovisual', 99, '1'),
(246, 'S040114', 'Equipo Audiovisual CAPEX', 4, '1'),
(247, 'S040123', 'Equipo Audiovisual CIP', 100, '1'),
(248, 'S040102', 'Ordenadores personales de escritorio', 101, '1'),
(249, 'S040115', 'Ordenadores personales de escritorio CAPEX', 4, '1'),
(250, 'S040124', 'Ordenadores personales de escritorio CIP', 100, '1'),
(251, 'S040103', 'Hardware de la empresa de TI', 101, '1'),
(252, 'S040104', 'Servicios de mantenimiento de hardware de TI', 102, '1'),
(253, 'S040105', 'Equipo arrendado por TI', 103, '1'),
(254, 'S040106', 'Suministros de TI / Accesorios', 101, '1'),
(255, 'S040107', 'Laptops', 101, '1'),
(256, 'S040118', 'Laptops CAPEX', 4, '1'),
(257, 'S040125', 'Laptops CIP', 100, '1'),
(258, 'S040108', 'Monitores', 101, '1'),
(259, 'S040119', 'Monitores CAPEX', 4, '1'),
(260, 'S040126', 'Monitores CIP', 100, '1'),
(261, 'S040109', 'Dispositivos multifunción', 101, '1'),
(262, 'S040116', 'Dispositivos multifunción CAPEX', 4, '1'),
(263, 'S040127', 'Dispositivos multifunción CIP', 100, '1'),
(264, 'S040110', 'Impresoras', 101, '1'),
(265, 'S040120', 'Impresoras CAPEX', 4, '1'),
(266, 'S040128', 'Impresoras CIP', 100, '1'),
(267, 'S040111', 'Escáneres', 101, '1'),
(268, 'S040121', 'Escáneres CAPEX', 4, '1'),
(269, 'S040129', 'Escáneres CIP', 100, '1'),
(270, 'S040112', 'Smartphones', 101, '1'),
(271, 'S040117', 'Smartphones CAPEX', 4, '1'),
(272, 'S040130', 'Smartphones CIP', 100, '1'),
(273, 'S040113', 'Tablets', 101, '1'),
(274, 'S040122', 'Tablets CAPEX', 4, '1'),
(275, 'S040131', 'Tablets CIP', 100, '1'),
(276, 'S040201', 'Contratistas de TI', 104, '1'),
(277, 'S040202', 'Servicios TI externalizados', 104, '1'),
(278, 'S040203', 'Servicios de Consultoría Tecnológica', 104, '1'),
(279, 'S040204', 'Desarrollo de TI', 4, '1'),
(280, 'S040301', 'Licencias Perpetuas de Software', 105, '1'),
(281, 'S040304', 'Licencias Perpetuas de Software CAPEX', 4, '1'),
(282, 'S040305', 'Licencias Perpetuas de Software CIP', 106, '1'),
(283, 'S040306', 'Software Prepago y Licencias', 107, '1'),
(284, 'S040302', 'Mantenimiento del software', 108, '1'),
(285, 'S040303', 'Licencias de software de suscripción', 105, '1'),
(286, 'S040401', 'Teléfonos', 101, '1'),
(287, 'S040402', 'Teléfonos CAPEX', 4, '1'),
(288, 'S040501', 'Servicio de televisión por cable o satélite', 109, '1'),
(289, 'S040502', 'Servicios de Hosting', 102, '1'),
(290, 'S040503', 'Servicios de Internet y Datos', 109, '1'),
(291, 'S040504', 'Servicios de voz fija', 110, '1'),
(292, 'S040505', 'Servicios Móviles / Celulares', 111, '1'),
(293, 'S040506', 'Servicios de videoconferencia / audio', 112, '1'),
(294, 'S050101', 'Servicios de contabilidad', 113, '1'),
(295, 'S050201', 'Servicios de Acreditación', 114, '1'),
(296, 'S050202', 'Servicios de Acreditación CAPEX', 115, '1'),
(297, 'S050301', 'Servicios de agencia de publicidad', 116, '1'),
(298, 'S050302', 'Publicidad / Billboard', 117, '1'),
(299, 'S050303', 'Publicidad en Cine', 118, '1'),
(300, 'S050304', 'Publicidad por correo directo', 119, '1'),
(301, 'S050305', 'Publicidad en Internet', 120, '1'),
(302, 'S050306', 'Publicidad impresa', 121, '1'),
(303, 'S050307', 'Servicios de Producción', 116, '1'),
(304, 'S050308', 'Publicidad en radio', 122, '1'),
(305, 'S050309', 'Publicidad televisiva', 123, '1'),
(306, 'S050311', 'Diario de prensa', 124, '1'),
(307, 'S050310', 'Revista de medios', 125, '1'),
(308, 'S050312', 'Telemarketing para Medios', 126, '1'),
(309, 'S050313', 'Diseño - Agencia', 127, '1'),
(310, 'S050401', 'Comisiones de Agentes', 128, '1'),
(311, 'S050501', 'Arquitecto / Servicios de Ingeniería', 84, '1'),
(312, 'S050601', 'Servicios de auditoría', 129, '1'),
(313, 'S050701', 'Servicios bancarios', 130, '1'),
(314, 'S050801', 'Servicios de Colecciones', 131, '1'),
(315, 'S050901', 'Honorarios de consultoría académica', 132, '1'),
(316, 'S050902', 'Honorarios de consultoría no académica', 84, '1'),
(317, 'S050903', 'Consultoría / Trabajo CIP', 106, '1'),
(318, 'S052201', 'Servicios de planificación de eventos', 133, '1'),
(319, 'S051101', 'Servicios de Recursos Humanos', 84, '1'),
(320, 'S051201', 'Seguro de accidentes', 134, '1'),
(321, 'S051202', 'Los seguros de invalidez', 135, '1'),
(322, 'S051203', 'Seguro contra incendios y terremotos', 134, '1'),
(323, 'S051204', 'Seguro de vida', 136, '1'),
(324, 'S051205', 'Seguro Médico / Dental', 137, '1'),
(325, 'S051206', 'Seguro de propiedad', 134, '1'),
(326, 'S051207', 'Seguro Estudiantil', 138, '1'),
(327, 'S051208', 'Seguro de viaje', 139, '1'),
(328, 'S051209', 'Seguros-Continuidad del Negocio', 140, '1'),
(329, 'S051301', 'Servicios legales generales', 141, '1'),
(330, 'S051302', 'ODVL. 231 Cumplimiento', 142, '1'),
(331, 'S051303', 'Adquisición de derechos de contabilidad', 143, '1'),
(332, 'S051304', 'Adquisición de derechos legales', 144, '1'),
(333, 'S051401', 'Acuerdos / Sentencias Legales', 145, '1'),
(334, 'S051501', 'Carteleras / Señalización', 117, '1'),
(335, 'S051502', 'Regalos de Navidad', 146, '1'),
(336, 'S051503', 'Folletos / folletos impresos', 121, '1'),
(337, 'S051504', 'Catálogos impresos / Libros', 121, '1'),
(338, 'S051505', 'Regalos promocionales', 147, '1'),
(339, 'S051601', 'Agente Comisión Exp. (COGS)', 148, '1'),
(340, 'S051001', 'Servicios de salud', 149, '1'),
(341, 'S051002', 'Comprobaciones físicas / médicas', 149, '1'),
(342, 'S051701', 'Servicios de Relaciones Públicas / Inversionistas', 150, '1'),
(343, 'S051801', 'Servicios de reclutamiento / cribado', 151, '1'),
(344, 'S051802', 'Verificaciones de antecedentes', 152, '1'),
(345, 'S051803', 'Pruebas de Asignación y Candidatos', 153, '1'),
(346, 'S051901', 'Servicios de Aduanas e Inmigración', 154, '1'),
(347, 'S051902', 'Investigación de mercado', 155, '1'),
(348, 'S052001', 'Servicios de impuestos', 113, '1'),
(349, 'S052101', 'Servicios de personal temporal (no de TI)', 79, '1'),
(350, 'S052301', 'Translation Services', 84, '1'),
(351, 'S052401', 'Fiesta relacionada con Marketing Exp.', 156, '1'),
(352, 'S052501', 'Seguro prepagado', 157, '1'),
(353, 'S052502', 'Marketing prepago', 158, '1'),
(354, 'S030714', 'Servicios de mantenimiento general', 108, '1'),
(355, 'S030901', 'Insumos de papel (pañuelos, toallas, servilletas, copas,', 35, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uexp`
--

CREATE TABLE `uexp` (
  `UExp_nIdUnExp` int(11) NOT NULL,
  `UExp_cUnidadExp` char(4) CHARACTER SET latin1 NOT NULL,
  `UExp_cSigla` char(3) CHARACTER SET latin1 NOT NULL,
  `UExp_vNombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `UExp_nIdGerente` int(11) NOT NULL,
  `UExp_vColorFondo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UExp_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `uexp`
--

INSERT INTO `uexp` (`UExp_nIdUnExp`, `UExp_cUnidadExp`, `UExp_cSigla`, `UExp_vNombre`, `UExp_nIdGerente`, `UExp_vColorFondo`, `UExp_cEstado`) VALUES
(1, '0380', 'TMO', 'El Molino', 13, 'warning', '1'),
(2, '0450', 'TSI', 'San Isidro', 13, 'success', '1'),
(3, '0390', 'CAJ', 'Cajamarca', 12, 'alternate', '1'),
(4, '0400', 'OLI', 'Los Olivos', 14, 'secondary', '1'),
(5, '0460', 'BRE', 'Breña', 17, 'info', '1'),
(6, '0510', 'SJL', 'San Juan', 16, 'light', '1'),
(7, '0530', 'COM', 'Comas', 15, 'dark', '1'),
(8, '0000', 'CHO', 'Chorrillos', 16, 'primary', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uexp_tecnicos`
--

CREATE TABLE `uexp_tecnicos` (
  `UExpTec_nId` int(11) NOT NULL,
  `UExpTec_UExp_nIdUnExp` int(11) NOT NULL,
  `UExpTec_User_id` int(11) NOT NULL,
  `UExpTec_cEstado` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `uexp_tecnicos`
--

INSERT INTO `uexp_tecnicos` (`UExpTec_nId`, `UExpTec_UExp_nIdUnExp`, `UExpTec_User_id`, `UExpTec_cEstado`) VALUES
(1, 1, 2, '1'),
(2, 4, 3, '1'),
(3, 7, 3, '1'),
(4, 5, 4, '1'),
(5, 6, 4, '1'),
(6, 8, 4, '1'),
(7, 2, 2, '1'),
(8, 3, 5, '1'),
(9, 1, 9, '1'),
(10, 2, 9, '1'),
(11, 3, 9, '1'),
(12, 4, 9, '1'),
(13, 5, 9, '1'),
(14, 6, 9, '1'),
(15, 7, 9, '1'),
(16, 8, 9, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` char(1) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `is_admin`, `user_type`, `created_at`) VALUES
(1, 'renzot', 'Renzo', 'Tello', 'renzo.tello@upn.edu.pe', 'f7175dfb30a99a6470f77eaf72f81a68b72ad429', 1, 1, '1', '2020-02-23 10:08:13'),
(2, 'luis.cruz', 'Clemente', 'Cruz', 'luis.cruz@upn.edu.pe', '55bc48680a138670b33657a27a770a5516794e2b', 1, 0, '2', '2020-06-08 00:00:00'),
(3, 'ivan.rosas', 'Ivan', 'Rosas', 'ivan.rosas@upn.edu.pe', '66d5a27f3b74dd8f78b29db39acc36f1bca96644', 1, 0, '2', '2020-06-08 00:00:00'),
(4, 'jose.espinoza', 'Jose', 'Espinoza', 'jose.espinoza@upn.edu.pe', '9c72dffde6c28e097766bdd780bba7411f3af9ec', 1, 0, '2', '2020-06-08 00:00:00'),
(5, 'ruben.villanueva', 'Ruben', 'Villanueva', 'ruben.villanueva@upn.edu.pe', 'c33a133fef742082afb9652c8f7112af98d6a1db', 1, 0, '2', '2020-06-08 00:00:00'),
(6, 'katya.baca', 'Katya', 'Baca', 'katya.baca@upn.edu.pe', 'b1e79cf8ca27ddba42fc909d816c7dd6c665ff10', 1, 0, '3', '2020-06-15 00:00:00'),
(7, 'diana.cardenas', 'Diana', 'Cardenas', 'diana.cardenas@upn.edu.pe', '6ce7f90ce269cc7d395d2be2647e87e2f9c88982', 1, 0, '3', '2020-06-16 00:00:00'),
(8, 'manuel.mendoza', 'Manuel', 'Mendoza', 'diana.cardenas@upn.edu.pe', 'd2cc7e7328edaad82fd0224da1133a36b989192c', 1, 0, '4', '2020-06-16 00:00:00'),
(9, 'proveedor', 'Proveedor', '', 'leslie.bardales@upn.edu.pe', 'f7175dfb30a99a6470f77eaf72f81a68b72ad429', 1, 0, '2', '2020-06-19 00:00:00'),
(10, 'leslie.bardales', 'Leslie', 'Bardales', 'leslie.bardales@upn.edu.pe', '12e0b280c2af254db28a979924b42c69ad1562c3', 1, 0, '5', '2020-06-22 00:00:00'),
(11, 'luis.papuico', 'Luis', 'Papuico', 'luis.papuico@upn.edu.pe', '89c02847e20f71842dcc4bcea5735381e3615481', 1, 0, '5', '2020-06-22 00:00:00'),
(12, 'miguel.gaitan', 'Miguel', 'Gaitan', 'miguel.gaitan@upn.edu.pe', '34a8735da80b40bf4d33c184484f6cbcd8ae3eba', 1, 0, '6', '2020-06-24 00:00:00'),
(13, 'ernesto.saldana', 'Ernesto', 'Saldaña', 'ernesto.saldana@upn.edu.pe', 'a24181d4d956daedf06d0aa9f035c0199a4eff05', 1, 0, '6', '2020-06-24 00:00:00'),
(14, 'cecilia.revollar', 'Cecilia', 'Revollar', 'cecilia.revollar@upn.edu.pe', 'bb92ffc3e7b570e84fe5f0e0c06967a5838a2cfb', 1, 0, '6', '2020-06-24 00:00:00'),
(15, 'eduardo.figueroa', 'Eduardo', 'Figueroa', 'eduardo.figueroa@upn.edu.pe', 'a5e742f7f52940a4fbb266a5fd4095a8bbc6584c', 1, 0, '6', '2020-06-24 00:00:00'),
(16, 'jorge.olivos', 'Jorge', 'Olivos', 'jorge.olivos@upn.edu.pe', 'f74473e575de7be1fec8dade52f49d6f2110c9c9', 1, 0, '6', '2020-06-24 00:00:00'),
(17, 'tairi.rullier', 'Tairi', 'Rullier', 'tairi.rullier@upn.edu.pe', '07c400f0cb6d618c4d74f166e1b8ef1a32ed36b5', 1, 0, '6', '2020-06-24 00:00:00'),
(18, 'blanca.zavaleta', 'Blanca', 'Zavaleta', 'blanca.zavaleta@upn.edu.pe', '1700ec0098089670f9ff44f892bd4da87c96668c', 1, 0, '4', '2020-06-24 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Cta_nIdCuenta`);

--
-- Indices de la tabla `dpto`
--
ALTER TABLE `dpto`
  ADD PRIMARY KEY (`Dpto_nIdDpto`);

--
-- Indices de la tabla `dpto_proyecto`
--
ALTER TABLE `dpto_proyecto`
  ADD PRIMARY KEY (`DptoProy_nIdDptoProyecto`);

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`Inc_nIdIncidente`);

--
-- Indices de la tabla `lineas_sol`
--
ALTER TABLE `lineas_sol`
  ADD PRIMARY KEY (`Lin_nIdLineaSol`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`Loc_nIdLocal`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`OC_nIdOrdenCompra`),
  ADD UNIQUE KEY `OC_nNroOC` (`OC_nNroOC`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Per_nIdPeriodo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`IdPermiso`),
  ADD UNIQUE KEY `IdUsuario` (`IdUsuario`,`IdMenu`);

--
-- Indices de la tabla `pmp_detalle`
--
ALTER TABLE `pmp_detalle`
  ADD PRIMARY KEY (`DetPmp_IdDetPmp`);

--
-- Indices de la tabla `pmp_especialidad`
--
ALTER TABLE `pmp_especialidad`
  ADD PRIMARY KEY (`Esp_nIdEspecialidad`);

--
-- Indices de la tabla `pmp_umant`
--
ALTER TABLE `pmp_umant`
  ADD PRIMARY KEY (`UMan_nIdUMan`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`Pres_nIdPresupuesto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Prov_nIdProveedor`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Proy_nIdProyecto`);

--
-- Indices de la tabla `recepciones`
--
ALTER TABLE `recepciones`
  ADD PRIMARY KEY (`Rec_nIdRecepcion`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Sol_nIdSolicitud`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`SubCat_nIdSubCategoria`);

--
-- Indices de la tabla `uexp`
--
ALTER TABLE `uexp`
  ADD PRIMARY KEY (`UExp_nIdUnExp`);

--
-- Indices de la tabla `uexp_tecnicos`
--
ALTER TABLE `uexp_tecnicos`
  ADD PRIMARY KEY (`UExpTec_nId`),
  ADD KEY `UExpTec_UExp_nIdUnExp` (`UExpTec_UExp_nIdUnExp`),
  ADD KEY `UExpTec_User_id` (`UExpTec_User_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `constraint_username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Cta_nIdCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `dpto`
--
ALTER TABLE `dpto`
  MODIFY `Dpto_nIdDpto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dpto_proyecto`
--
ALTER TABLE `dpto_proyecto`
  MODIFY `DptoProy_nIdDptoProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `Inc_nIdIncidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `lineas_sol`
--
ALTER TABLE `lineas_sol`
  MODIFY `Lin_nIdLineaSol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `Loc_nIdLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `OC_nIdOrdenCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Per_nIdPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `IdPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `pmp_detalle`
--
ALTER TABLE `pmp_detalle`
  MODIFY `DetPmp_IdDetPmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `pmp_especialidad`
--
ALTER TABLE `pmp_especialidad`
  MODIFY `Esp_nIdEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pmp_umant`
--
ALTER TABLE `pmp_umant`
  MODIFY `UMan_nIdUMan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `Pres_nIdPresupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Prov_nIdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `Proy_nIdProyecto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recepciones`
--
ALTER TABLE `recepciones`
  MODIFY `Rec_nIdRecepcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Sol_nIdSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `SubCat_nIdSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT de la tabla `uexp`
--
ALTER TABLE `uexp`
  MODIFY `UExp_nIdUnExp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `uexp_tecnicos`
--
ALTER TABLE `uexp_tecnicos`
  MODIFY `UExpTec_nId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `uexp_tecnicos`
--
ALTER TABLE `uexp_tecnicos`
  ADD CONSTRAINT `uexp_tecnicos_ibfk_1` FOREIGN KEY (`UExpTec_User_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `uexp_tecnicos_ibfk_2` FOREIGN KEY (`UExpTec_UExp_nIdUnExp`) REFERENCES `uexp` (`UExp_nIdUnExp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
