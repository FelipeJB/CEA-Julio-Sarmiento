-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2018 a las 20:58:53
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cea-julio`
--

--
-- Volcado de datos para la tabla `descripcions`
--

INSERT INTO `descripcions` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL);

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_03_11_180453_create_descripcions_table', 1),
(12, '2018_03_11_194315_create_publicacions_table', 1),
(13, '2018_03_11_194808_create_seccions_table', 1);

--
-- Volcado de datos para la tabla `publicacions`
--

INSERT INTO `publicacions` (`id`, `nombre`, `descripcion`, `vinculo`, `seccion`, `created_at`, `updated_at`) VALUES
(1, 'Evaluación Financiera de Proyectos', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/EvalProy.pdf', 1, NULL, NULL),
(2, 'Matemática Financiera', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/Matfin.pdf', 1, NULL, NULL),
(3, 'Criterios de Decisión', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/CritDec.pdf', 1, NULL, NULL),
(4, 'Construcción de Flujos de caja', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/EvalProy.pdf', 1, NULL, NULL),
(5, 'Valoración de Empresas', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/valoracion.pdf', 1, NULL, NULL),
(6, 'Finanzas personales', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/finper.pdf', 1, NULL, NULL),
(7, 'Métodos especiales', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tirpfto.xls', 1, NULL, NULL),
(8, 'Sistemas de control de gestión', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/SisConGest.pdf', 1, NULL, NULL),
(9, 'Consideraciones sobre valoración a precios de mercado', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/mm.pdf', 1, NULL, NULL),
(10, 'Manejo de  EXCEL', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/excel.pdf', 1, NULL, NULL),
(11, 'Simulación', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/simulacion.pdf', 1, NULL, NULL),
(12, 'Programación en VBA para EXCEL', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/VBA.pdf', 1, NULL, NULL),
(13, 'Cuadro de mando integral: Por Carlos Valencia', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/bbsc.pdf', 1, NULL, NULL),
(14, 'Evaluación de proyectos', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/Proy.pdf', 1, NULL, NULL),
(15, 'Mercado de valores en Colombia', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/MerVal.pdf', 1, NULL, NULL),
(16, 'Evaluación de riesgo de proyectos', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/Riesgo.pdf', 1, NULL, NULL),
(17, 'Consideraciones sobre los métodos de decisión', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/ConsMet.pdf', 1, NULL, NULL),
(18, 'Medición de riesgo país', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/riesgopais.pdf', 1, NULL, NULL),
(19, 'Costo del Dinero', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/presentaciones/CosDin.pdf', 1, NULL, NULL),
(20, 'El laberinto', 'Registro de Derechos de autor Libro 13. tomo 10. Partida 282.', 'http://www.javeriana.edu.co/decisiones/Julio/Laberinto.xls', 2, NULL, NULL),
(21, 'VPN', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/vpn.xls', 2, NULL, NULL),
(22, 'La Casita', 'Registro de Derechos de autor Libro 13. tomo 10. Partida 283.', 'http://www.javeriana.edu.co/decisiones/Julio/La_casita.xls', 2, NULL, NULL),
(23, 'Taller de Tasas', 'Elaborado por Juan Camilo Rivera', 'http://www.javeriana.edu.co/decisiones/Julio/ttasas.xls', 2, NULL, NULL),
(24, 'TIR Ponderada', NULL, 'http://www.javeriana.edu.co/decisiones/Ejercicio_TIRPonderada_(4CAP_4).xls', 3, NULL, NULL),
(26, 'Calculadora de Tasas', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/calculadora.xls', 4, NULL, NULL),
(27, 'Tablas de Amortización', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tablas.xls', 4, NULL, NULL),
(28, 'Taller de métodos de decisión', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/soltaller.xls', 6, NULL, NULL),
(29, 'Costo de Capital 2004', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/WACC2004.pdf', 7, NULL, NULL),
(30, 'Costo de Capital 2005', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/WACC2005.pdf', 7, NULL, NULL),
(31, 'Costo de Capital 2006', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/WACC2006.pdf', 7, NULL, NULL),
(32, 'Simulación', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/simulacion.xls', 8, NULL, NULL),
(33, 'Cash Flow at Risk', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/VaR1.xls', 8, NULL, NULL),
(34, 'CForm Display', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/FormDisp.xla', 8, NULL, NULL),
(35, 'Factores de conversion', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/factores.xls', 5, NULL, NULL),
(36, 'Valoración bonos', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/bonos.xls', 5, NULL, NULL),
(37, ' Taller de conversión de tasas', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tallertasas.xls', 5, NULL, NULL),
(38, 'Taller de introducción al VPN', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tallerEVA.xls', 5, NULL, NULL),
(39, 'Taller avanzado métodos', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tallermodelosa.xls', 5, NULL, NULL),
(40, 'Corporación Materna Colombiana', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/cmmc.xls', 5, NULL, NULL),
(41, 'Explicación MM', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/expMM.xls', 5, NULL, NULL),
(42, 'Optimizacion de inversiones', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tallersolver.xls', 5, NULL, NULL),
(43, 'Optimización de inversiones - básico', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/solverb.xls', 5, NULL, NULL),
(44, 'Optimización de inversiones - TES', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/explicacion_tes.xls', 5, NULL, NULL),
(45, 'Escenarios', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/escenarios.xls', 5, NULL, NULL),
(46, 'Caso Concesionario', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/concesionarios.xls', 5, NULL, NULL),
(47, 'Métodos especiales', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tirpfto.xls', 5, NULL, NULL),
(48, 'La salchicha', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/salchicha.xls', 5, NULL, NULL),
(49, 'Maiz-ito - Caso', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/maiz-itoEVA.xls', 5, NULL, NULL),
(50, 'Maiz-ito versión avanzada', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/maizitotalleravanz.xls', 5, NULL, NULL),
(51, 'Coopalma - Caso', '', 'http://www.javeriana.edu.co/decisiones/Julio/COOPALMA.pdf', 5, NULL, NULL),
(52, 'Coopalma versión avanzada', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/coopalmaRiesgo2.xls', 5, NULL, NULL),
(53, 'El avionz-ito', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/avionzito.xls', 5, NULL, NULL),
(54, 'Business Balanced Scorecard', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/bbsc.xls', 5, NULL, NULL),
(55, 'Taller introducción a Excel 1', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/taller1.xls', 5, NULL, NULL),
(56, 'Taller introducción a Excel 2', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/taller2.xls', 5, NULL, NULL),
(57, 'Modelos Financieros: Introducción', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/Clase1-2007.xls', 5, NULL, NULL),
(58, 'Simulación', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/Riesgo.xls', 5, NULL, NULL),
(59, 'Simulación Avanzada', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/Concesion.xls', 5, NULL, NULL),
(60, 'PER', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/PER.xls', 5, NULL, NULL),
(61, 'TIR Ponderada', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/tirp-gf.xls', 5, NULL, NULL),
(62, 'Tablas dinámicas', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/nomina.xls', 5, NULL, NULL),
(63, 'Tablas dinámicas 2', NULL, 'http://www.javeriana.edu.co/decisiones/Julio/EF.xls', 5, NULL, NULL);

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'PRESENTACIONES EN POWERPOINT', NULL, NULL),
(2, 'JUEGOS DE AUTOCORRECCIÓN', NULL, NULL),
(3, 'EJERCICIOS DE DEMOSTRACIÓN', NULL, NULL),
(4, 'MODELOS INTERACTIVOS', NULL, NULL),
(5, 'FORMATOS DE TALLERES', NULL, NULL),
(6, 'SOLUCIÓN DE TALLERES', NULL, NULL),
(7, 'INFORMACIÓN ÚTIL', NULL, NULL),
(8, 'PROGRAMAS ÚTILES', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
