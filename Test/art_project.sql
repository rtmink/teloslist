-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2012 at 08:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_project`
--

CREATE TABLE IF NOT EXISTS `art_project` (
  `art_id` int(2) NOT NULL AUTO_INCREMENT,
  `artist` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `art_project`
--

INSERT INTO `art_project` (`art_id`, `artist`, `title`, `year`) VALUES
(1, 'Henri Matisse', 'Blue Nude (Souvenir of Biskra)', '1907'),
(2, 'Pablo Picasso', 'Les Demoiselles d&#039;Avignon', '1907'),
(3, 'Henri Matisse', 'Music', '1910'),
(4, 'Pablo Picasso', 'Three Women', '1908'),
(5, 'Auguste Rodin', 'Monument to Balzac', '1897'),
(6, 'Auguste Rodin', 'Age of Bronze', '1877'),
(7, 'Auguste Rodin', 'The Gates of Hell', '1880-1917'),
(8, 'Auguste Rodin', 'Walking Man', '1905'),
(9, 'Edgar Degas', 'Little Dancer, Aged Fourteen', '1880-81'),
(10, 'Aristide Maillol', 'The Mediterranean', '1902-05'),
(11, 'Henri Matisse', 'The Serf', '1900-03'),
(12, 'Henri Matisse', 'The Serpentine', '1909'),
(13, 'Auguste Rodin', 'The Kiss', '1886'),
(14, 'Constantin Brancusi', 'The Kiss', '1908'),
(15, 'Constantin Brancusi', 'The Birth of the World', '1924'),
(16, 'Constantin Brancusi', 'The Newborn II', '1927'),
(17, 'Constantin Brancusi', 'Bird in Space', '1919'),
(18, 'Constantin Brancusi', 'Torso of a Young Man', '1922'),
(19, 'Constantin Brancusi', 'Princesse X', '1915-16'),
(20, 'Constantin Brancusi', 'The Endless Column', '1937'),
(21, 'Georges Braque', 'Viaduct at L&#039;Estaque', '1907'),
(22, 'Georges Braque', 'Large Nude', '1908'),
(23, 'Georges Braque', 'Houses at L&#039;Estaque', '1908'),
(24, 'Georges Braque', 'Violin and Pitcher', '1910'),
(25, 'Georges Braque', 'The Emigrant (The Portuguese)', '1911'),
(26, 'Pablo Picasso', 'Landscape at Horta de Ebro', '1909'),
(27, 'Pablo Picasso', 'Girl with the Mandolin (Fanny Tellier)', '1910'),
(28, 'Pablo Picasso', 'Ma Jolie', '1911'),
(29, 'Pablo Picasso', 'Still Life with Chair Caning', 'Spring 191'),
(30, 'Pablo Picasso', 'Guitar, Sheet Music, and Wineglass', '1912'),
(31, 'Pablo Picasso', 'Violin', '1912'),
(32, 'Pablo Picasso', 'Glass and Bottle of Suze', '1912'),
(33, 'Piet Mondrian', 'Composition No. 10 in Black and White (Pier and Ocean)', '1915'),
(34, 'Piet Mondrian', 'Composition in Line', '1917'),
(35, 'Piet Mondrian', 'Composition with Grid 9 (Checkerboard with Light Colors)', '1919'),
(36, 'Piet Mondrian', 'Composition with Yellow, Red, Black, Blue, and Gray', '1920'),
(37, 'Piet Mondrian', 'New York City', '1941-42'),
(38, 'Jackson Pollack', 'Cathedral', '1947'),
(39, 'Jackson Pollack', 'Lavender Mist: Number 1, 1950', '1950'),
(40, 'Jackson Pollack', 'Number 1A, 1948', '1948'),
(41, 'Marcel Duchamp', 'Bicycle Wheel', '1913'),
(42, 'Marcel Duchamp', 'Three Standard Stoppages', '1913-14'),
(43, 'Marcel Duchamp', 'Bottlerack', '1914'),
(44, 'Marcel Duchamp', 'Chocolate Grinder No. 2', '1914'),
(45, 'Marcel Duchamp', 'The Bride Stripped Bare by Her Bachelors, Even (The Large Glass)', '1915-23'),
(46, 'Marcel Duchamp', 'Tu m&#039;', '1918'),
(47, 'Marcel Duchamp', 'Fountain', '1917'),
(48, 'Francis Picabia', 'Here is Stieglitz, Faith and Love', '1915'),
(49, 'Hans Arp', 'Collage Arranged According to the Laws of Chance', '1916-17'),
(50, 'Hannah HÃ¶ch', 'Cut with the Kitchen Knife Dada Through the Last Weimar Beer-Belly Cultural Epoch in Germany', '1919'),
(51, 'John Heartfield', 'The Meaning of the Hitler Salute', '1932'),
(52, 'Kazimir Malevich', 'Warrior of the First Division', '1914'),
(53, 'Vladimir Tatlin', 'Selection of Materials: Iron, Stucco, Glass, Asphalt', '1914'),
(54, 'Kazimir Malevich', 'Black Square', '1915'),
(55, 'Kazimir Malevich', 'Suprematist Painting (White on White)', '1918'),
(56, 'Vladimir Tatlin', 'Model for the Monument to the Third International', '1919-20'),
(57, 'Aleksandr Rodchenko', 'Oval Hanging Construction No. 12', '1920'),
(58, 'Aleksandr Rodchenko', 'Worker&#039;s Club, 1925 for the Soviet Pavilion of the International Exhibition of Decorative Arts, Paris', '1925'),
(59, 'El Lissitzky', 'Proun 19D', 'c. 1922'),
(60, 'El Lissitzky', 'Abstract Cabinet', 'c. 1927'),
(61, 'Joan MirÃ³', 'The Kiss', '1924'),
(62, 'Joan MirÃ³', 'The Birth of the World', '1925'),
(63, 'AndrÃ© Masson', 'Figure', '1927'),
(64, 'Giorgio de Chirico', 'The Child&#039;s Brain', '1914'),
(65, 'Max Ernst', 'The Master&#039;s Bedroom', '1920'),
(66, 'Max Ernst', 'Two Children Menaced by a Nightengale', '1924'),
(67, 'Salvador DalÃ­', 'The Phenomenon of Ecstasy', '1933'),
(68, 'Man Ray', 'Untitled', '1924'),
(69, 'RenÃ© Magritte', 'The Treachery of Images', '1929'),
(70, 'Alberto Giacometti', 'Suspended Ball', '1930-31'),
(71, 'Pablo Picasso', 'Guernica', '1937');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
