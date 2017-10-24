-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Octobre 2017 à 19:48
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_billet`
--

CREATE TABLE `t_billet` (
  `BIL_ID` int(11) NOT NULL,
  `BIL_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BIL_TITRE` varchar(255) NOT NULL,
  `BIL_CONTENU` text NOT NULL,
  `BIL_NBCOM` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_billet`
--

INSERT INTO `t_billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`, `BIL_NBCOM`) VALUES
(1, '2017-08-20 14:21:19', 'Préface', 'Bonjour monde ! Ceci est le premier billet sur mon blog.', 0),
(2, '2017-08-20 14:21:19', 'Chapitre 1', 'Il faut enrichir ce blog dès maintenant.', 0),
(3, '2017-08-29 14:25:49', 'Chapitre 2', 'Ceci est le début : exemple ', 0),
(4, '2017-10-18 17:28:24', 'Chapitre 3', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.', 0),
(5, '2017-10-18 17:29:52', 'Chapitre 4', 'Proinde die funestis interrogationibus praestituto imaginarius iudex equitum resedit magister adhibitis aliis iam quae essent agenda praedoctis, et adsistebant hinc inde notarii, quid quaesitum esset, quidve responsum, cursim ad Caesarem perferentes, cuius imperio truci, stimulis reginae exsertantis aurem subinde per aulaeum, nec diluere obiecta permissi nec defensi periere conplures.\r\n\r\nOb haec et huius modi multa, quae cernebantur in paucis, omnibus timeri sunt coepta. et ne tot malis dissimulatis paulatimque serpentibus acervi crescerent aerumnarum, nobilitatis decreto legati mittuntur: Praetextatus ex urbi praefecto et ex vicario Venustus et ex consulari Minervius oraturi, ne delictis supplicia sint grandiora, neve senator quisquam inusitato et inlicito more tormentis exponeretur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL,
  `CHAP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `BIL_ID`, `CHAP_ID`) VALUES
(1, '2017-08-20 14:21:19', 'A. Nonyme', 'Bravo pour ce début', 1, 0),
(2, '2017-08-20 14:21:19', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `UTIL_ID` int(11) NOT NULL,
  `UTIL_LOGIN` varchar(100) NOT NULL,
  `UTIL_MDP` varchar(100) NOT NULL,
  `UTIL_NOM` varchar(100) DEFAULT NULL,
  `UTIL_PRENOM` varchar(100) DEFAULT NULL,
  `UTIL_DNAISSANCE` date DEFAULT NULL,
  `UTIL_EMAIL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_NOM`, `UTIL_PRENOM`, `UTIL_DNAISSANCE`, `UTIL_EMAIL`) VALUES
(1, 'admin', 'secret', NULL, NULL, NULL, NULL),
(2, 'milan', 'secret2', NULL, NULL, NULL, NULL),
(3, 'milan3', 'secret3', NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_billet`
--
ALTER TABLE `t_billet`
  ADD PRIMARY KEY (`BIL_ID`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`UTIL_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_billet`
--
ALTER TABLE `t_billet`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `t_billet` (`BIL_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
