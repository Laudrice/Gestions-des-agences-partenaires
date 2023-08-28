-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 août 2023 à 13:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_fid`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `num_contrat` varchar(10) NOT NULL,
  `date_contrat` date DEFAULT NULL,
  `code_agc` varchar(255) DEFAULT NULL,
  `nom_agc` varchar(255) DEFAULT NULL,
  `adresse_agc` varchar(255) DEFAULT NULL,
  `tel_agc` varchar(255) DEFAULT NULL,
  `mail_agc` varchar(255) DEFAULT NULL,
  `nombre_terroir` int(11) DEFAULT NULL,
  `nombre_intervention_par_terroir` int(11) DEFAULT NULL,
  `total_prevision` decimal(10,2) DEFAULT NULL,
  `total_facture` decimal(10,2) DEFAULT NULL,
  `salaire_prevu` decimal(10,2) DEFAULT NULL,
  `salaire_recu` decimal(10,2) DEFAULT NULL,
  `fichier_contrat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num_contrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`num_contrat`, `date_contrat`, `code_agc`, `nom_agc`, `adresse_agc`, `tel_agc`, `mail_agc`, `nombre_terroir`, `nombre_intervention_par_terroir`, `total_prevision`, `total_facture`, `salaire_prevu`, `salaire_recu`, `fichier_contrat`) VALUES
('CTAE001', '2023-08-15', NULL, 'SOAMEVA', 'Atarandolo ', '034', 'soameva@mail.com', 3, 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `code_itv` varchar(10) NOT NULL,
  `code_terroir` varchar(10) DEFAULT NULL,
  `num_itv` varchar(20) DEFAULT NULL,
  `etat_itv` varchar(255) DEFAULT 'Non_débuté',
  `date_os` date DEFAULT NULL,
  `date_prevu_pec` date DEFAULT NULL,
  `date_pec` date DEFAULT NULL,
  `jour_ferrier` date DEFAULT NULL,
  `debut_travaux` date DEFAULT NULL,
  `date_rapport_intermediaire` date DEFAULT NULL,
  `date_rapport_execution` date DEFAULT NULL,
  `salaire_prevu` decimal(10,2) DEFAULT NULL,
  `salaire_paye` decimal(10,2) DEFAULT NULL,
  `salaire_paye_pourcent` decimal(5,2) DEFAULT NULL,
  `penalite_retard` decimal(10,2) DEFAULT NULL,
  `prevision_itv` decimal(10,2) DEFAULT NULL,
  `facture_itv` decimal(10,2) DEFAULT NULL,
  `fichier_pec` varchar(255) DEFAULT NULL,
  `fichier_rapport_intermediaire` varchar(255) DEFAULT NULL,
  `fichier_rapport_execution` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code_itv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`code_itv`, `code_terroir`, `num_itv`, `etat_itv`, `date_os`, `date_prevu_pec`, `date_pec`, `jour_ferrier`, `debut_travaux`, `date_rapport_intermediaire`, `date_rapport_execution`, `salaire_prevu`, `salaire_paye`, `salaire_paye_pourcent`, `penalite_retard`, `prevision_itv`, `facture_itv`, `fichier_pec`, `fichier_rapport_intermediaire`, `fichier_rapport_execution`) VALUES
('ITV004', 'TER002', 'Intervention_2', 'Non_débuté', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ITV003', 'TER002', 'Intervention_1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ITV002', 'TER001', 'Intervention_2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ITV001', 'TER001', 'Intervention_1', 'Non_débuté', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ITV005', 'TER003', 'Intervention_1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ITV006', 'TER003', 'Intervention_2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prevision`
--

DROP TABLE IF EXISTS `prevision`;
CREATE TABLE IF NOT EXISTS `prevision` (
  `id` int(11) NOT NULL,
  `code_itv` varchar(10) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `prix_unitaire` decimal(10,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `terroir`
--

DROP TABLE IF EXISTS `terroir`;
CREATE TABLE IF NOT EXISTS `terroir` (
  `code_terroir` varchar(10) NOT NULL,
  `num_contrat` varchar(10) DEFAULT NULL,
  `nom_terroir` varchar(255) DEFAULT NULL,
  `nombre_intervention_du_terroir` int(11) DEFAULT NULL,
  `nombre_intervention_terminer` int(11) DEFAULT 0,
  `date_os_collecte_donnee` date DEFAULT NULL,
  `date_prevu_rapport_collecte_donnee` date DEFAULT NULL,
  `date_rapport_collecte_donnee` date DEFAULT NULL,
  `salaire_prevu_terroir` decimal(10,2) DEFAULT NULL,
  `salaire_paye` decimal(10,2) DEFAULT NULL,
  `salaire_paye_pourcent` decimal(5,2) DEFAULT NULL,
  `prevision` decimal(10,2) DEFAULT NULL,
  `facture` decimal(10,2) DEFAULT NULL,
  `date_rapport_demarrage` date DEFAULT NULL,
  `date_rapport_final` date DEFAULT NULL,
  `fichier_rapport_demarrage` varchar(255) DEFAULT NULL,
  `fichier_rapport_collecte` varchar(255) DEFAULT NULL,
  `fichier_rapport_final` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code_terroir`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `terroir`
--

INSERT INTO `terroir` (`code_terroir`, `num_contrat`, `nom_terroir`, `nombre_intervention_du_terroir`, `nombre_intervention_terminer`, `date_os_collecte_donnee`, `date_prevu_rapport_collecte_donnee`, `date_rapport_collecte_donnee`, `salaire_prevu_terroir`, `salaire_paye`, `salaire_paye_pourcent`, `prevision`, `facture`, `date_rapport_demarrage`, `date_rapport_final`, `fichier_rapport_demarrage`, `fichier_rapport_collecte`, `fichier_rapport_final`) VALUES
('TER003', 'CTAE001', 'Atarandolo', NULL, NULL, NULL, NULL, NULL, '30000000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TER002', 'CTAE001', 'Andrainjato', NULL, NULL, NULL, NULL, NULL, '30000000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TER001', 'CTAE001', 'Ranomafana', 2, NULL, NULL, NULL, NULL, '30000000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
