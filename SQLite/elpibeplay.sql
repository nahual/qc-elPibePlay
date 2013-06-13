-- phpMyAdmin SQL Dump
-- version 3.0.0-rc2
-- http://www.phpmyadmin.net
--
-- Servidor: 192.168.0.195
-- Tiempo de generación: 12-06-2013 a las 19:44:30
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.2.16

SET FOREIGN_KEY_CHECKS=0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: 'elpibeplay'
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'game'
--

CREATE TABLE game (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  game_type varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  rating int(10) unsigned NOT NULL,
  `year` int(11) NOT NULL,
  company varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcar la base de datos para la tabla 'game'
--

INSERT INTO game VALUES(0, 'Super Mario ', 'Nintendo', 10, 1980, 'ooo');
INSERT INTO game VALUES(6, 'Quake', 'PC', 8, 1995, 'idSoftware');
INSERT INTO game VALUES(7, 'Duke Nukem 4', 'Nintendo', 10, 1999, '3d Realms');
INSERT INTO game VALUES(8, 'Contra', 'Nintendo', 7, 1987, 'Konami');
INSERT INTO game VALUES(9, 'PES 2012', 'PlayStation3', 9, 2011, 'Konami');
INSERT INTO game VALUES(10, 'Athens 2004', 'PlayStation2', 10, 2004, 'Eidos');
INSERT INTO game VALUES(12, 'GTI Club', 'Wii', 6, 2011, 'Konami');
INSERT INTO game VALUES(13, 'Medal of Honor', 'Xbox', 10, 2008, 'EA');
INSERT INTO game VALUES(15, 'Tomb Raider - Chronicles', 'PlayStation2', 7, 2000, 'Core Design &  Eidos Interactive');
INSERT INTO game VALUES(16, 'Tomb Raider - The Last Revelation', 'PlayStation', 7, 1999, 'Core Design & Eidos Interactive');
INSERT INTO game VALUES(17, 'Tomb Raider - Underworld', 'PC', 7, 2008, 'Core Design & Eidos Interactive');
INSERT INTO game VALUES(18, 'Tomb Raider - Legend', 'PC', 7, 2006, 'Crystal Dynamics & Eidos Interactive');
INSERT INTO game VALUES(20, 'The Legend of Zelda', 'Nintendo', 8, 1986, 'Nintendo');
INSERT INTO game VALUES(21, 'Shadowrun', 'Sega', 9, 1994, 'BlueSky Software');
INSERT INTO game VALUES(22, 'WarCraft', 'PC', 7, 1994, 'Blizzard Entertainment ');
INSERT INTO game VALUES(23, 'Grim Fandango', 'PC', 9, 1998, 'Lucas Arts');
INSERT INTO game VALUES(24, 'Dead Space', 'PC', 7, 2008, ' EA Redwood Shores');
INSERT INTO game VALUES(25, 'The Curse of Monkey Island', 'PC', 8, 1997, 'Lucas Arts');
INSERT INTO game VALUES(26, 'Rock N'' Roll Racing', 'Sega', 7, 1993, 'Silicon & Synapse');
INSERT INTO game VALUES(27, 'Starcraft', 'PC', 8, 1998, 'Blizzard');
INSERT INTO game VALUES(28, 'Prince of Persia', 'PC', 8, 1989, 'Ubisoft');
INSERT INTO game VALUES(29, 'Rambo II', 'Nintendo', 6, 1993, 'Ocean Software');
INSERT INTO game VALUES(30, 'Rock N'' Roll Racing', 'Sega', 9, 1993, 'Blizzard');
INSERT INTO game VALUES(31, 'Sonic & Knuckles', 'Sega', 10, 1994, 'Sonic Team');
INSERT INTO game VALUES(32, 'Buster''s Hidden Treasure', 'Sega', 7, 1993, 'Konami');
INSERT INTO game VALUES(33, 'Acme All-Stars', 'Sega', 9, 1994, 'Konami');
INSERT INTO game VALUES(34, 'Sonic the Hedgehog', 'Sega', 7, 1991, 'Sega Sonic Team');
INSERT INTO game VALUES(35, 'Sonic & Knuckles', 'Sega', 8, 1994, 'Sega Sonic Team');
INSERT INTO game VALUES(36, 'Sonic 3D', 'Sega', 9, 1996, 'Sega Sonic Team');
INSERT INTO game VALUES(37, 'Stunts', 'PC', 9, 1990, 'Distinctive Software');
INSERT INTO game VALUES(38, 'StarCraft II', 'PC', 10, 2010, 'Blizzard');
INSERT INTO game VALUES(39, 'Double Dragon', 'PC', 10, 1987, ' Taito Corporation');
INSERT INTO game VALUES(40, 'Age of Empires', 'PC', 8, 2003, 'Microsoft Games');
INSERT INTO game VALUES(42, 'Boogerman: A Pick and Flick Adventure', 'Sega', 7, 1994, 'Interplay Entertainment');
INSERT INTO game VALUES(43, 'GTA', 'PC', 8, 2008, 'Rockstar');
INSERT INTO game VALUES(44, 'Heroes of Mith & Magic', 'Nintendo', 9, 2003, '3DO');
INSERT INTO game VALUES(45, 'Assassin Creed', 'Xbox', 10, 2007, 'Ubisoft');
INSERT INTO game VALUES(46, 'Final Fantasy', 'Xbox', 10, 1997, 'Square Enix ');
INSERT INTO game VALUES(47, 'Assassin Creed 2', 'Xbox', 7, 2007, 'Ubisoft');
INSERT INTO game VALUES(48, 'Dynasy Warriors', 'PlayStation', 7, 1997, 'Omega Force');
INSERT INTO game VALUES(49, 'Earthworm Jim', 'Sega', 10, 1994, 'Shiny Entertainment');
INSERT INTO game VALUES(50, 'Comix Zone', 'Sega', 10, 1995, 'Sega');
INSERT INTO game VALUES(51, 'E.T. the Extra-Terrestrial', 'Nintendo', 1, 1982, 'Atari');
INSERT INTO game VALUES(52, 'Defenders of Dynatron City', 'Nintendo', 6, 1992, 'Lucasfilm Games');
INSERT INTO game VALUES(53, 'GTA IV', 'PC', 8, 2011, 'Rockstar');
INSERT INTO game VALUES(54, 'Full Throttle', 'PC', 10, 1995, 'LucasArts');
INSERT INTO game VALUES(55, 'The Elder Scrolls V: Skyrim', 'PC', 9, 2011, 'Bethesda Game Studios');
INSERT INTO game VALUES(56, 'Half Life', 'PC', 9, 1998, 'Valve');
INSERT INTO game VALUES(57, 'Portal', 'PC', 10, 2010, 'Valve');
INSERT INTO game VALUES(58, 'Uncharted: Drake''s Fortune', 'PlayStation3', 8, 2009, 'Naughty Dog ');
INSERT INTO game VALUES(59, 'Uncharted 2: Among Thieves', 'PlayStation3', 9, 2007, 'Naughty Dog');
INSERT INTO game VALUES(60, 'Uncharted 3: Drake''s Deception', 'PlayStation3', 9, 2012, 'Naughty Dog');
INSERT INTO game VALUES(61, 'Mortal Kombat', 'PC', 10, 1992, 'Midway');
INSERT INTO game VALUES(62, 'Mortal Kombat 2', 'Sega', 8, 1993, 'Midway');
INSERT INTO game VALUES(63, 'Mike Tyson''s Punch - Out !!', 'Nintendo', 9, 1987, 'Nintendo IRD');
INSERT INTO game VALUES(64, 'Gran Turismo 5', 'PlayStation3', 9, 2010, 'Polyphony Digital');
INSERT INTO game VALUES(65, 'Portal 2', 'PlayStation3', 9, 2011, 'Valve');
INSERT INTO game VALUES(66, 'Castlevania: Bloodlines', 'Sega', 10, 1994, 'Konami');
INSERT INTO game VALUES(70, 'Diablo II', 'PC', 7, 2000, 'Blizzard North');
INSERT INTO game VALUES(71, 'Ultima VIII: Pagan', 'PC', 10, 1994, 'Origin Systems');
INSERT INTO game VALUES(72, 'Deus Ex', 'PC', 10, 2000, 'Ion Storm');
INSERT INTO game VALUES(73, 'Commandos: Behind Enemy Lines', 'PC', 10, 1998, 'Pyro Studios');
INSERT INTO game VALUES(74, 'Norte y Sur', 'PC', 7, 1989, 'Infogrames');
INSERT INTO game VALUES(75, 'Donde esta Carmen Sandiego?', 'PC', 10, 1985, 'Broderbund Software');
INSERT INTO game VALUES(76, 'The Legend Of Zelda: Ocarina of Time', 'Nintendo', 10, 1998, 'Nintendo');
INSERT INTO game VALUES(77, 'Crysis 2', 'PC', 10, 2011, 'Electronic Arts');
INSERT INTO game VALUES(78, 'Napoleon: Total War', 'PC', 8, 2010, 'Sega');
INSERT INTO game VALUES(79, 'Day of Tentacle', 'PC', 9, 1993, 'LucasArts');
INSERT INTO game VALUES(81, 'Metroid', 'Nintendo', 9, 1986, 'Nintendo');
INSERT INTO game VALUES(82, 'Megaman', 'Nintendo', 8, 1987, 'Capcom');
INSERT INTO game VALUES(83, 'Circus', 'Sega', 7, 1980, 'Exidy ');
INSERT INTO game VALUES(84, 'F1 HERO', 'Sega', 7, 1991, 'Human Entertainment');
INSERT INTO game VALUES(86, 'XCOM Ufo Defen', 'Nintendo', 8, 1994, 'Microprose');
INSERT INTO game VALUES(90, 'Diablo III', 'PC', 8, 2012, 'Blizzard');
INSERT INTO game VALUES(91, 'Guild Wars 2', 'PC', 10, 2012, 'Arena Net');
INSERT INTO game VALUES(92, 'Tera', 'PC', 10, 2012, 'EnMasse');
INSERT INTO game VALUES(93, 'Guild Wars', 'PC', 10, 2005, 'Arena Net');
INSERT INTO game VALUES(112, 'Prueba', 'Nintendo', 10, 1995, '');
INSERT INTO game VALUES(113, 'PES 2013', 'PlayStation3', 9, 2012, 'Konami');
INSERT INTO game VALUES(114, 'mari', 'Nintendo', 10, 1999, 'Juancho');
INSERT INTO game VALUES(117, '', 'Nintendo', 1, 1980, '');
INSERT INTO game VALUES(118, 'Rhapsody: A music tale', 'Nintendo', 10, 2001, 'Nippon Ichi Soft');
INSERT INTO game VALUES(121, '0123456789012345678901234567890123456789012345678911111', 'Nintendo', 7, 1980, '');
INSERT INTO game VALUES(123, 'Pandemonium', 'Nintendo', 7, 2002, 'konami');
INSERT INTO game VALUES(124, '', 'Nintendo', 10, 1980, 'o');
INSERT INTO game VALUES(125, 'super mario', 'Nintendo', 10, 1980, '000');
INSERT INTO game VALUES(126, '', 'Nintendo', 9, 1998, 'movistar ');
INSERT INTO game VALUES(128, 'pes 20', 'PlayStation3', 9, 2011, 'konami');
INSERT INTO game VALUES(129, 'pes 201', 'PlayStation3', 9, 2011, 'konami');

SET FOREIGN_KEY_CHECKS=1;
