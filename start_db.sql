-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 13 apr 2013 om 19:29
-- Serverversie: 5.5.30-30.1
-- PHP-versie: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `deb33946_cw`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `delete` int(2) NOT NULL DEFAULT '0',
  `youtube` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `catalog_car`
--

CREATE TABLE IF NOT EXISTS `catalog_car` (
  `id` int(11) NOT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `milage` varchar(250) DEFAULT NULL,
  `engine` varchar(250) DEFAULT NULL,
  `transmition` varchar(250) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `transportCostPerKm` varchar(50) DEFAULT NULL,
  `catalog` int(11) NOT NULL DEFAULT '0',
  `location` varchar(250) DEFAULT NULL,
  `mainimage` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `document` varchar(250) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `newsletterplus`
--

CREATE TABLE IF NOT EXISTS `newsletterplus` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `html` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `text` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `catalog` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `metatitle` varchar(250) DEFAULT NULL,
  `metadescription` text,
  `keywords` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `version` int(11) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `emailaddress` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `birthday` varchar(40) DEFAULT NULL,
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `loggedin` varchar(40) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `profile`
--

INSERT INTO `profile` (`id`, `name`, `lastname`, `emailaddress`, `password`, `birthday`, `created`, `updated`, `loggedin`, `active`) VALUES
(1, 'Stef', 'van den Berg', 'stefvdberg', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spam`
--

CREATE TABLE IF NOT EXISTS `spam` (
  `id` int(11) NOT NULL,
  `ipaddress` varchar(250) NOT NULL,
  `text` text,
  `created` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text,
  `picture` varchar(250) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` varchar(40) DEFAULT NULL,
  `updated` varchar(40) DEFAULT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
