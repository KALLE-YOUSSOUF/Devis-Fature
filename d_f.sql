-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 juin 2020 à 18:02
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `d_f`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(7, 'Oriba', 1, 1),
(8, 'Lacstar', 1, 1),
(9, 'mangue', 1, 1),
(10, 'Laviebelle', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_prenom` varchar(50) NOT NULL,
  `client_adresse` varchar(50) NOT NULL,
  `client_tel` int(11) NOT NULL,
  `client_pays` varchar(60) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_active` int(11) NOT NULL DEFAULT '0',
  `client_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_prenom`, `client_adresse`, `client_tel`, `client_pays`, `client_email`, `client_active`, `client_status`) VALUES
(22, 'ABDOURAHAMANE', 'Issoufou', 'Niamey', 99961363, 'Niger', 'Kalle@gmail.com', 1, 1),
(26, 'Fatchima', 'Laouali', 'Tahoua', 9990000, 'Niger', 'fatchima@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `entreprise_id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_name` varchar(255) NOT NULL,
  `entreprise_site` varchar(50) NOT NULL,
  `entreprise_adresse` varchar(50) NOT NULL,
  `entreprise_tel` int(11) NOT NULL,
  `entreprise_pays` varchar(60) NOT NULL,
  `entreprise_email` varchar(50) NOT NULL,
  PRIMARY KEY (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`entreprise_id`, `entreprise_name`, `entreprise_site`, `entreprise_adresse`, `entreprise_tel`, `entreprise_pays`, `entreprise_email`) VALUES
(25, 'Novatech', 'Novatech.ne', 'Niamey', 9000000, 'Niger', 'contact@novatech.ne'),
(27, 'Fermeainoma', 'fermeainoma.com', 'Niamey', 90000000, 'Niger', 'fermeainoma@gmail.com'),
(28, 'e-himma', 'e-himma.net', 'Nimaey', 96000000, 'Niger', 'e-himma@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `facture_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`facture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`facture_id`, `order_date`, `client_id`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(22, '2020-06-05', 22, '27400', '5206', '32606', '606', '32000', '32000', '0', 2, 1, 1),
(23, '2020-06-05', 26, '1000', '190', '1190', '90', '1100', '1100', '0', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture_item`
--

DROP TABLE IF EXISTS `facture_item`;
CREATE TABLE IF NOT EXISTS `facture_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `facture_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture_item`
--

INSERT INTO `facture_item` (`order_item_id`, `facture_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(38, 22, 20, '3', '9000', '27000', 1),
(39, 22, 21, '2', '200', '400', 1),
(40, 23, 21, '5', '200', '1000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_id`, `sub_total`, `vat`, `total_amount`) VALUES
(27, '2020-06-05', 26, '9200', '1748', '10948'),
(28, '2020-06-05', 22, '27000', '5130', '32130'),
(29, '2020-06-05', 22, '1250', '237.5', '1487.5');

-- --------------------------------------------------------

--
-- Structure de la table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`) VALUES
(63, 27, 20, '1', '9000', '9000'),
(64, 27, 21, '1', '200', '200'),
(65, 28, 20, '3', '9000', '27000'),
(66, 29, 23, '1', '1250', '1250');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(20, 'Riz', '../assests/images/stock/1363426605eda71302bfdb.jpg', 7, '8', '9000', 1, 1),
(21, 'Jus', '../assests/images/stock/16373552865eda7168aa1dd.jpg', 7, '92', '200', 1, 1),
(23, 'Lait', '../assests/images/stock/16121431825eda71df54382.PNG', 8, '9', '1250', 1, 1),
(24, 'Savon', '../assests/images/stock/17932173675eda771deb394.png', 10, '5', '175', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'novatech', 'c849d51dacc5256fa107473fd409550f', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
