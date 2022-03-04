-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 04 mars 2022 à 22:42
-- Version du serveur :  10.3.27-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_mmi_07`
--

-- --------------------------------------------------------

--
-- Structure de la table `angle`
--

CREATE TABLE `angle` (
  `numAngl` varchar(8) NOT NULL,
  `libAngl` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `angle`
--

INSERT INTO `angle` (`numAngl`, `libAngl`, `numLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `numArt` int(8) NOT NULL,
  `dtCreArt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `libTitrArt` varchar(100) DEFAULT NULL,
  `libChapoArt` text DEFAULT NULL,
  `libAccrochArt` varchar(100) DEFAULT NULL,
  `parag1Art` text DEFAULT NULL,
  `libSsTitr1Art` varchar(100) DEFAULT NULL,
  `parag2Art` text DEFAULT NULL,
  `libSsTitr2Art` varchar(100) DEFAULT NULL,
  `parag3Art` text DEFAULT NULL,
  `libConclArt` text DEFAULT NULL,
  `urlPhotArt` varchar(70) DEFAULT NULL,
  `numAngl` varchar(8) NOT NULL,
  `numThem` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numArt`, `dtCreArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numAngl`, `numThem`) VALUES
(1, '2022-03-04 12:27:23', 'Nicolas Caraty : m&eacute;diateur culturel plein de bon sens !', 'Le lundi 21 f&eacute;vrier, nous avons eu la chance de rencontrer Nicolas Caraty, un m&eacute;diateur culturel non-voyant du mus&eacute;e d\'Aquitaine. Cette entrevue a vu le jour suite &agrave; des questionnements sur l&rsquo;art et les sculptures, ainsi que leur accessibilit&eacute;. Nous en avons appris plus sur son parcours professionnel, et comment il s&rsquo;est retrouv&eacute; au mus&eacute;e d&rsquo;Aquitaine. Et nous avons &eacute;galement &eacute;chang&eacute; longuement au sujet de l&rsquo;acc&egrave;s &agrave; la culture pour tout le monde, ce qui nous a men&eacute; &agrave; discuter de son projet sensationnel : le parcours sensoriel !', 'Nicolas Caraty, lui et son parcours :', 'Toucher des &oelig;uvres du mus&eacute;e d&rsquo;Aquitaine, c&rsquo;est possible ! Et ce en grande partie gr&acirc;ce &agrave; lui ! Nicolas Caraty a d&eacute;but&eacute; sa carri&egrave;re professionnelle en tant qu&rsquo;accordeur de piano sur Paris. Assez vite, il s&rsquo;est vite questionn&eacute; sur l&rsquo;acc&egrave;s &agrave; la culture pour les personnes en situation de handicap. Il va par la suite travailler 3 ans  chez &ldquo;Toucher pour conna&icirc;tre&amp;quot;, association concevant des expositions adapt&eacute;es et retranscrit les journaux &eacute;crits en cassettes audio. &Agrave; la suite de cette exp&eacute;rience, il change totalement de secteur et s&rsquo;oriente vers la vente par correspondance et le suivi client chez Les 3 Suisses. Il occupe ce poste pendant pr&egrave;s de 8 ans avant de le quitter et de se diriger vers le mus&eacute;e d&rsquo;Aquitaine de Bordeaux. Recrut&eacute; en 2007 en tant que stagiaire charg&eacute; de la m&eacute;diation culturelle, il est un an plus tard titularis&eacute; par la mairie de Bordeaux et occupe encore ce poste aujourd&rsquo;hui. Nicolas est un amoureux de l&rsquo;art, sa d&eacute;clinaison pr&eacute;f&eacute;r&eacute;e est celle de la musique. Amateur de piano et de guitare depuis son jeune &acirc;ge, il se tourne de plus en plus vers le synth&eacute;tiseur. Et c&rsquo;est sans compter son attrait pour le cin&eacute;ma, la peinture, le th&eacute;&acirc;tre, l&rsquo;&eacute;criture, et bien &eacute;videmment la sculpture.', 'L&rsquo;art &amp;amp; l&rsquo;handicap :', '&ldquo;L&rsquo;art permet d&rsquo;exprimer les choses, mais parfois la difficult&eacute; c&rsquo;est d&rsquo;y avoir acc&egrave;s&rdquo;. Cette phrase entendue durant l&rsquo;interview nous a particuli&egrave;rement marqu&eacute;. Il est vrai que nous avons tous les jours l&rsquo;occasion de pr&ecirc;ter attention &agrave; la culture, n&eacute;anmoins certaines personnes en situation de handicap (notamment visuel ou auditif) peuvent parfois trouver difficile l&rsquo;acc&egrave;s &agrave; cette derni&egrave;re. Bien s&ucirc;r, comme nous l&rsquo;explique Nicolas, le handicap ne signifie pas forc&eacute;ment que la culture devient totalement inaccessible. Lui-m&ecirc;me est un musicien av&eacute;r&eacute; comme &eacute;voqu&eacute; plus t&ocirc;t. Il nous a d&rsquo;ailleurs expliqu&eacute; un fait int&eacute;ressant sur la d&eacute;couverte des sculptures : &ldquo;Quand vous &ecirc;tes non-voyant, vous faites une exploration partielle de l\'&oelig;uvre avec vos mains qui sont capables d&rsquo;explorer ces d&eacute;tails. Au fur et &agrave; mesure vous &ecirc;tes aptes &agrave; reconstituer l\'&oelig;uvre dans l&rsquo;espace, en allant donc du d&eacute;tail vers la globalit&eacute;&rdquo;. Ce qui, lorsqu&rsquo;on y r&eacute;fl&eacute;chit bien, est une d&eacute;couverte totalement oppos&eacute;e &agrave; celle d&rsquo;une personne voyante qui, elle, voit la sculpture d&rsquo;abord dans sa globalit&eacute;, puis vient ensuite chercher les d&eacute;tails en la touchant. Donc tout est en r&eacute;alit&eacute; une question de perspectives et de m&eacute;thodes.', 'Le parcours sensoriel :', 'C&rsquo;est l&agrave; qu&rsquo;entre en jeu le fameux parcours sensoriel ! Il s&rsquo;agit d&rsquo;un chemin p&eacute;dagogique install&eacute; dans le mus&eacute;e d\'Aquitaine. Comme son nom l\'indique, il permet de faire d&eacute;couvrir diverses &oelig;uvres en faisant appel au plus de sens possible pour les rendre accessibles. Plusieurs initiatives sont prises en compte pour se faire, telles que la production d&rsquo;audio-descriptions associ&eacute;es &agrave; plusieurs tableaux (contant le contexte, l&rsquo;histoire de ces derniers, illustr&eacute;s par des effets sonores). Et il faut &eacute;voquer les nombreuses sculptures reproduites &agrave; l&rsquo;identique avec des mati&egrave;res tr&egrave;s similaires &agrave; celles d\'origine. Il est question de reproduction de masques africains en bois, de sculptures en pierre&hellip; Nicolas nous a montr&eacute; une reproduction d&rsquo;une statue de bronze repr&eacute;sentant le Roi Louis XV, r&eacute;alis&eacute;e gr&acirc;ce &agrave; une mod&eacute;lisation 3D. Il a &eacute;galement pris le temps de nous faire toucher d&rsquo;autres ouvrages, notamment une reproduction de la V&eacute;nus &agrave; la corne, ainsi que des pierres taill&eacute;es de la pr&eacute;histoire. Ce parcours sensoriel permet donc &agrave; la fois de conserver en bon &eacute;tat les vestiges du pass&eacute;, tout en proposant une offre permanente de visite culturelle aux personnes en situation de handicap.', 'Le patrimoine culturel de Bordeaux devient plus accessible puisque de nombreux efforts sont faits pour soutenir cette cause. Mais selon Nicolas, il faut continuer sur ce chemin. &Agrave; pr&eacute;sent, l&rsquo;objectif majeur est de diffuser l&rsquo;information. &Agrave; notre &eacute;chelle nous pouvons partager nos connaissances culturelles avec autrui. Il faut aussi r&eacute;fl&eacute;chir &agrave; un moyen d&rsquo;adapter ces services pour les rendre accessibles au maximum. D&rsquo;apr&egrave;s Nicolas : &ldquo;Si on fait vivre cette d&eacute;couverte non pas par des connaissances encyclop&eacute;diques mais plut&ocirc;t par la notion de plaisir, les gens seront plus &agrave; l&rsquo;aise. Il ne faut pas les mettre en situation d&rsquo;&eacute;chec, mais plut&ocirc;t les guider, les amener &agrave; d&eacute;couvrir les &oelig;uvres par eux-m&ecirc;mes, et alors l&agrave; il sera plus ais&eacute; de les mener vers des connaissances plus th&eacute;oriques&rdquo;.', 'imgArt6bb98b6cd0020c64284c86eb924d8b32.png', 'ANGL0101', 'THEM0101'),
(3, '2022-03-04 12:28:00', 'La sculpture Sanna va-t-elle nous quitter ?', 'Depuis presque dix ans, la sculpture Sanna tr&ocirc;ne sur la place de la com&eacute;die. Visage embl&eacute;matique et intriguant que l&rsquo;on appr&eacute;cie contempler. Aujourd&rsquo;hui, il est possible qu&rsquo;elle ne devienne plus qu&rsquo;un souvenir&hellip;\r\n\r\nLa ville de Bordeaux a toujours &eacute;t&eacute; investie dans la culture et l\'acc&egrave;s &agrave; l&rsquo;art, c&rsquo;est pourquoi le sujet de la sculpture Sanna fait pol&eacute;mique au sein de la ville.', 'Quelle histoire se cache derri&egrave;re ce visage ?', 'La demoiselle de fonte a &eacute;t&eacute; &eacute;rig&eacute;e en 2013 par Jaume Plensa dans le cadre d&rsquo;une exposition bordelaise, Sanna &eacute;tait accompagn&eacute;e de sa &ldquo;s&oelig;ur&rdquo; Paula, qui elle, &eacute;tait plac&eacute;e devant la cath&eacute;drale de Bordeaux. Jaume Plensa est un artiste Catalan qui a r&eacute;alis&eacute; onze autres &oelig;uvres, expos&eacute;es &agrave; travers la ville. Mais celles-ci ont &eacute;t&eacute; retir&eacute;es. Actuellement, c&rsquo;est un particulier anonyme qui poss&egrave;de la sculpture Sanna, il laisse &agrave; la municipalit&eacute; de Bordeaux un d&eacute;lai de 5 ans pour la conserver sur la place de la Com&eacute;die. Elle partirait &agrave; priori en 2027. Ce serait donc le d&eacute;part d&rsquo;une &oelig;uvre extravagante et surtout embl&eacute;matique de la ville de Bordeaux.', 'Une demoiselle de fonte, d&rsquo;&acirc;me, et d&rsquo;or', 'Sanna est une sculpture figurative monumentale faite enti&egrave;rement de fonte, il s&rsquo;agit du visage d&rsquo;une jeune fille qui para&icirc;t particuli&egrave;rement apais&eacute;e, comme si elle &eacute;tait endormie. Cette impression de pl&eacute;nitude est due aux yeux ferm&eacute;s de la jeune fille et &agrave; son expression imperturbable, comme si elle n&rsquo;allait jamais les rouvrir. Sous certaines perspectives, Sanna peut adopter diff&eacute;rents styles : de face son visage est parfaitement droit et bien proportionn&eacute; mais de c&ocirc;t&eacute; son visage semble diforme. Aussi, nous pouvons voir &eacute;voluer les couleurs de la demoiselle de fonte au fur et &agrave; mesure des ann&eacute;es, en effet, la sculpture rouille et sa teinte varie en fonction du temps.\r\nSanna se situe devant le grand th&eacute;&acirc;tre sur la place de la Com&eacute;die, son style particulier qui marie la grossi&egrave;ret&eacute; du fer et la finesse des traits, se combine parfaitement avec l&rsquo;op&eacute;ra par ses formes imposantes et travaill&eacute;es. Pour l&rsquo;artiste, Jaume Plensa, le visage est &amp;lt;&amp;lt;le miroir de l&rsquo;&acirc;me&amp;gt;&amp;gt;, par cons&eacute;quent l\'&oelig;uvre permet aux bordelais d&rsquo;acqu&eacute;rir un instant de paix de l&rsquo;esprit en plein c&oelig;ur de la ville.', 'L\'achat de la statue', 'En plus de son aspect artistique, la sculpture de Sanna g&eacute;n&egrave;re &eacute;videmment aussi un certain engouement affectant son aspect &eacute;conomique. En effet, en 2014 apr&egrave;s l&rsquo;exposition de Jaume Plensa, Bordeaux fait une lev&eacute;e de fond pour racheter la sculpture. La ville a besoin de r&eacute;colter 150 000&euro; aupr&egrave;s des habitants et pr&eacute;voit ensuite de compl&eacute;ter cette r&eacute;colte en sortant &eacute;galement un minimum de 150 000&euro; de sa poche. Effectivement, la valeur financi&egrave;re de l\'&oelig;uvre varie entre 300 000 &euro; et 500 000&euro;. Malheureusement, les dons &eacute;tant trop faibles, la r&eacute;colte n\'aboutit pas &agrave; un r&eacute;sultat concluant. Seulement 44 000&euro; ont &eacute;t&eacute; r&eacute;colt&eacute;s ce qui n&rsquo;a absolument pas &eacute;t&eacute; suffisant pour que la municipalit&eacute; prenne en charge le reste de l&rsquo;achat. Fort heureusement en 2015, un particulier anonyme ach&egrave;te la statue et signe un contrat avec la municipalit&eacute; de Bordeaux pour la laisser 6 ans de plus sur la place de la Com&eacute;die. Plus r&eacute;cemment encore, le 8 f&eacute;vrier 2022, la ville de Bordeaux a annonc&eacute; officiellement qu&rsquo;un autre accord avait &eacute;t&eacute; approuv&eacute;, permettant &agrave; la sculpture de rester sur la place et surtout dans nos c&oelig;urs jusqu&rsquo;en 2027.', 'Finalement, cette sculpture reste encore parmi nous pendant un bon moment. Cette demoiselle de fonte au v&eacute;cu po&eacute;tique ayant rythm&eacute; la vie de beaucoup de bordelais continuera donc de le faire ces cinq prochaines ann&eacute;es. Et cette affaire d&rsquo;argent plut&ocirc;t compliqu&eacute;e pour la mairie de Bordeaux lui a tout de m&ecirc;me permis de conserver ce bien gr&acirc;ce &agrave; l&rsquo;aide de ce fameux acheteur anonyme. Nous vous sugg&eacute;rons donc d&rsquo;aller une fois encore appr&eacute;cier sa pr&eacute;sence avant son d&eacute;part imminent ! Avec l&rsquo;&eacute;quipe de r&eacute;daction on se demandait si vous aussi vous aviez des anecdotes croustillantes &agrave; raconter sur ce visage fait de m&eacute;taux. Qu&rsquo;est-ce qu&rsquo;elle vous fait ressentir ? &Ecirc;tes-vous heureux d&rsquo;apprendre qu&rsquo;elle reste &agrave; nos c&ocirc;t&eacute;s encore longtemps vous aussi ?\r\nNous avons h&acirc;te de lire vos r&eacute;ponses en commentaire !', 'imgArt295b6457b5e684180c979f9054090b00.png', 'ANGL0101', 'THEM0101');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `dtCreCom` timestamp NULL DEFAULT current_timestamp(),
  `libCom` text NOT NULL,
  `attModOK` tinyint(1) DEFAULT 0,
  `dtModCom` timestamp NULL DEFAULT NULL,
  `notifComKOAff` text DEFAULT NULL,
  `delLogiq` tinyint(1) DEFAULT 0,
  `numMemb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentplus`
--

CREATE TABLE `commentplus` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `numSeqComR` int(10) NOT NULL,
  `numArtR` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `numLang` varchar(8) NOT NULL,
  `lib1Lang` varchar(30) DEFAULT NULL,
  `lib2Lang` varchar(60) DEFAULT NULL,
  `numPays` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`numLang`, `lib1Lang`, `lib2Lang`, `numPays`) VALUES
('FRAN01', 'FRAN', 'Fran&ccedil;ais', 'FRAN');

-- --------------------------------------------------------

--
-- Structure de la table `likeart`
--

CREATE TABLE `likeart` (
  `numMemb` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeA` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `likecom`
--

CREATE TABLE `likecom` (
  `numMemb` int(10) NOT NULL,
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeC` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `numMemb` int(10) NOT NULL,
  `prenomMemb` varchar(70) NOT NULL,
  `nomMemb` varchar(70) NOT NULL,
  `pseudoMemb` varchar(70) NOT NULL,
  `passMemb` varchar(70) NOT NULL,
  `eMailMemb` varchar(100) NOT NULL,
  `dtCreaMemb` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `accordMemb` tinyint(1) DEFAULT 1,
  `confirmation_token` varchar(70) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(70) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `idStat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `accordMemb`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `idStat`) VALUES
(12, 'Membre', 'Membre', 'Membre', 'membre', 'membre@mail.com', '2022-03-04 22:31:52', 1, NULL, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

CREATE TABLE `motcle` (
  `numMotCle` int(8) NOT NULL,
  `libMotCle` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

CREATE TABLE `motclearticle` (
  `numArt` int(8) NOT NULL,
  `numMotCle` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `numPays` char(4) NOT NULL,
  `cdPays` char(2) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`numPays`, `cdPays`, `frPays`, `enPays`) VALUES
('AFGH', 'AF', 'Afghanistan', 'Afghanistan'),
('AFRI', 'ZA', 'Afrique du Sud', 'South Africa'),
('ALBA', 'AL', 'Albanie', 'Albania'),
('ALGE', 'DZ', 'Algérie', 'Algeria'),
('ALLE', 'DE', 'Allemagne', 'Germany'),
('ANDO', 'AD', 'Andorre', 'Andorra'),
('ANGL', 'GB', 'Royaume-Uni', 'United Kingdom'),
('ANGO', 'AO', 'Angola', 'Angola'),
('ANGU', 'AI', 'Anguilla', 'Anguilla'),
('ANTG', 'AG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
('ANTI', 'AN', 'Antilles néerlandaises', 'Netherlands Antilles'),
('ARAB', 'SA', 'Arabie saoudite', 'Saudi Arabia'),
('ARGE', 'AR', 'Argentine', 'Argentina'),
('ARME', 'AM', 'Arménie', 'Armenia'),
('ARTA', 'AQ', 'Antarctique', 'Antarctica'),
('ARUB', 'AW', 'Aruba', 'Aruba'),
('AUST', 'AU', 'Australie', 'Australia'),
('AUTR', 'AT', 'Autriche', 'Austria'),
('AZER', 'AZ', 'Azerbaïdjan', 'Azerbaijan'),
('BAHA', 'BS', 'Bahamas', 'Bahamas, The'),
('BAHR', 'BH', 'Bahreïn', 'Bahrain'),
('BANG', 'BD', 'Bangladesh', 'Bangladesh'),
('BARB', 'BB', 'Barbade', 'Barbados'),
('BELA', 'PW', 'Belau', 'Palau'),
('BELG', 'BE', 'Belgique', 'Belgium'),
('BELI', 'BZ', 'Belize', 'Belize'),
('BENI', 'BJ', 'Bénin', 'Benin'),
('BERM', 'BM', 'Bermudes', 'Bermuda'),
('BHOU', 'BT', 'Bhoutan', 'Bhutan'),
('BIEL', 'BY', 'Biélorussie', 'Belarus'),
('BIRM', 'MM', 'Birmanie', 'Myanmar (ex-Burma)'),
('BOIN', 'IO', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
('BOLV', 'BO', 'Bolivie', 'Bolivia'),
('BOSN', 'BA', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
('BOTS', 'BW', 'Botswana', 'Botswana'),
('BOUV', 'BV', 'Ile Bouvet', 'Bouvet Island'),
('BRES', 'BR', 'Brésil', 'Brazil'),
('BRUN', 'BN', 'Brunei', 'Brunei Darussalam'),
('BULG', 'BG', 'Bulgarie', 'Bulgaria'),
('BURK', 'BF', 'Burkina Faso', 'Burkina Faso'),
('BURU', 'BI', 'Burundi', 'Burundi'),
('CAFR', 'CF', 'République centrafricaine', 'Central African Republic'),
('CAMB', 'KH', 'Cambodge', 'Cambodia'),
('CAME', 'CM', 'Cameroun', 'Cameroon'),
('CANA', 'CA', 'Canada', 'Canada'),
('CAYM', 'KY', 'Iles Cayman', 'Cayman Islands'),
('CHIL', 'CL', 'Chili', 'Chile'),
('CHIN', 'CN', 'Chine', 'China'),
('CHRI', 'CX', 'Ile Christmas', 'Christmas Island'),
('CHYP', 'CY', 'Chypre', 'Cyprus'),
('CNOR', 'KP', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
('COCO', 'CC', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
('COLO', 'CO', 'Colombie', 'Colombia'),
('COMO', 'KM', 'Comores', 'Comoros'),
('CON1', 'CD', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
('CON2', 'CG', 'Congo', 'Congo'),
('COOK', 'CK', 'Iles Cook', 'Cook Islands'),
('CROA', 'HR', 'Croatie', 'Croatia'),
('CSUD', 'KR', 'Corée du Sud', 'Korea, (South) Republic of'),
('CUBA', 'CU', 'Cuba', 'Cuba'),
('CVER', 'CV', 'Cap-Vert', 'Cape Verde'),
('DANE', 'DK', 'Danemark', 'Denmark'),
('DJIB', 'DJ', 'Djibouti', 'Djibouti'),
('DOM1', 'DM', 'Dominique', 'Dominica'),
('DOM2', 'DO', 'République dominicaine', 'Dominican Republic'),
('EGYP', 'EG', 'Égypte', 'Egypt'),
('EMIR', 'AE', 'Émirats arabes unis', 'United Arab Emirates'),
('EQUA', 'EC', 'Équateur', 'Ecuador'),
('ERYT', 'ER', 'Érythrée', 'Eritrea'),
('ESPA', 'ES', 'Espagne', 'Spain'),
('ESTO', 'EE', 'Estonie', 'Estonia'),
('ETHO', 'ET', 'Éthiopie', 'Ethiopia'),
('FALK', 'FK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
('FERO', 'FO', 'Iles Féroé', 'Faroe Islands'),
('FIDJ', 'FJ', 'Iles Fidji', 'Fiji'),
('FINL', 'FI', 'Finlande', 'Finland'),
('FRAN', 'FR', 'France', 'France'),
('GABO', 'GA', 'Gabon', 'Gabon'),
('GAMB', 'GM', 'Gambie', 'Gambia, the'),
('GANA', 'GH', 'Ghana', 'Ghana'),
('GEO1', 'GE', 'Géorgie', 'Georgia'),
('GEO2', 'GS', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
('GIBR', 'GI', 'Gibraltar', 'Gibraltar'),
('GREC', 'GR', 'Grèce', 'Greece'),
('GREN', 'GD', 'Grenade', 'Grenada'),
('GROE', 'GL', 'Groenland', 'Greenland'),
('GUAD', 'GP', 'Guadeloupe', 'Guinea, Equatorial'),
('GUAM', 'GU', 'Guam', 'Guam'),
('GUAT', 'GT', 'Guatemala', 'Guatemala'),
('GUIB', 'GW', 'Guinée-Bissao', 'Guinea-Bissau'),
('GUIE', 'GQ', 'Guinée équatoriale', 'Equatorial Guinea'),
('GUIN', 'GN', 'Guinée', 'Guinea'),
('GUYA', 'GY', 'Guyana', 'Guyana'),
('GUYF', 'GF', 'Guyane française', 'Guiana, French'),
('HAIT', 'HT', 'Haïti', 'Haiti'),
('HEAR', 'HM', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
('HOND', 'HN', 'Honduras', 'Honduras'),
('HONG', 'HU', 'Hongrie', 'Hungary'),
('INDE', 'IN', 'Inde', 'India'),
('INDO', 'ID', 'Indonésie', 'Indonesia'),
('IRAN', 'IR', 'Iran', 'Iran, Islamic Republic of'),
('IRAQ', 'IQ', 'Iraq', 'Iraq'),
('IRLA', 'IE', 'Irlande', 'Ireland'),
('ISLA', 'IS', 'Islande', 'Iceland'),
('ISRA', 'IL', 'Israël', 'Israel'),
('ITAL', 'IT', 'Italie', 'Italy'),
('IVOI', 'CI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
('JAMA', 'JM', 'Jamaïque', 'Jamaica'),
('JAPO', 'JP', 'Japon', 'Japan'),
('JORD', 'JO', 'Jordanie', 'Jordan'),
('KAZA', 'KZ', 'Kazakhstan', 'Kazakhstan'),
('KIRG', 'KG', 'Kirghizistan', 'Kyrgyzstan'),
('KIRI', 'KI', 'Kiribati', 'Kiribati'),
('KNYA', 'KE', 'Kenya', 'Kenya'),
('KONG', 'HK', 'Hong Kong', 'Hong Kong, (China)'),
('KWEI', 'KW', 'Koweït', 'Kuwait'),
('LAOS', 'LA', 'Laos', 'Lao People s Democratic Republic'),
('LEON', 'SL', 'Sierra Leone', 'Sierra Leone'),
('LESO', 'LS', 'Lesotho', 'Lesotho'),
('LETT', 'LV', 'Lettonie', 'Latvia'),
('LIBA', 'LB', 'Liban', 'Lebanon'),
('LIBE', 'LR', 'Liberia', 'Liberia'),
('LIBY', 'LY', 'Libye', 'Libyan Arab Jamahiriya'),
('LIEC', 'LI', 'Liechtenstein', 'Liechtenstein'),
('LITU', 'LT', 'Lituanie', 'Lithuania'),
('LUXE', 'LU', 'Luxembourg', 'Luxembourg'),
('MACA', 'MO', 'Macao', 'Macao, (China)'),
('MACE', 'MK', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR'),
('MADA', 'MG', 'Madagascar', 'Madagascar'),
('MALA', 'MY', 'Malaisie', 'Malaysia'),
('MALD', 'MV', 'Maldives', 'Maldives'),
('MALI', 'ML', 'Mali', 'Mali'),
('MALT', 'MT', 'Malte', 'Malta'),
('MALW', 'MW', 'Malawi', 'Malawi'),
('MARI', 'MP', 'Mariannes du Nord', 'Northern Mariana Islands'),
('MARO', 'MA', 'Maroc', 'Morocco'),
('MARS', 'MH', 'Iles Marshall', 'Marshall Islands'),
('MART', 'MQ', 'Martinique', 'Martinique'),
('MAUC', 'MU', 'Maurice', 'Mauritius'),
('MAUR', 'MR', 'Mauritanie', 'Mauritania'),
('MAYO', 'YT', 'Mayotte', 'Mayotte'),
('MEXI', 'MX', 'Mexique', 'Mexico'),
('MICR', 'FM', 'Micronésie', 'Micronesia, Federated States of'),
('MINE', 'UM', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
('MOLD', 'MD', 'Moldavie', 'Moldova, Republic of'),
('MONA', 'MC', 'Monaco', 'Monaco'),
('MONG', 'MN', 'Mongolie', 'Mongolia'),
('MONS', 'MS', 'Montserrat', 'Montserrat'),
('MOZA', 'MZ', 'Mozambique', 'Mozambique'),
('NAMI', 'NA', 'Namibie', 'Namibia'),
('NAUR', 'NR', 'Nauru', 'Nauru'),
('NEPA', 'NP', 'Népal', 'Nepal'),
('NICA', 'NI', 'Nicaragua', 'Nicaragua'),
('NIEV', 'KN', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
('NIGA', 'NG', 'Nigeria', 'Nigeria'),
('NIGE', 'NE', 'Niger', 'Niger'),
('NIOU', 'NU', 'Nioué', 'Niue'),
('NORF', 'NF', 'Ile Norfolk', 'Norfolk Island'),
('NORV', 'NO', 'Norvège', 'Norway'),
('NOUC', 'NC', 'Nouvelle-Calédonie', 'New Caledonia'),
('NOUZ', 'NZ', 'Nouvelle-Zélande', 'New Zealand'),
('OMAN', 'OM', 'Oman', 'Oman'),
('OUGA', 'UG', 'Ouganda', 'Uganda'),
('OUZE', 'UZ', 'Ouzbékistan', 'Uzbekistan'),
('PAKI', 'PK', 'Pakistan', 'Pakistan'),
('PANA', 'PA', 'Panama', 'Panama'),
('PAPU', 'PG', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
('PARA', 'PY', 'Paraguay', 'Paraguay'),
('PBAS', 'NL', 'pays-Bas', 'Netherlands'),
('PERO', 'PE', 'Pérou', 'Peru'),
('PHIL', 'PH', 'Philippines', 'Philippines'),
('PITC', 'PN', 'Iles Pitcairn', 'Pitcairn Island'),
('POLO', 'PL', 'Pologne', 'Poland'),
('POLY', 'PF', 'Polynésie française', 'French Polynesia'),
('PORT', 'PT', 'Portugal', 'Portugal'),
('QATA', 'QA', 'Qatar', 'Qatar'),
('REUN', 'RE', 'Réunion', 'Reunion'),
('RICA', 'CR', 'Costa Rica', 'Costa Rica'),
('RICO', 'PR', 'Porto Rico', 'Puerto Rico'),
('ROUM', 'RO', 'Roumanie', 'Romania'),
('RUSS', 'RU', 'Russie', 'Russia (Russian Federation)'),
('RWAN', 'RW', 'Rwanda', 'Rwanda'),
('SAHA', 'EH', 'Sahara occidental', 'Western Sahara'),
('SALO', 'SB', 'Iles Salomon', 'Solomon Islands'),
('SALV', 'SV', 'Salvador', 'El Salvador'),
('SAMA', 'AS', 'Samoa américaines', 'American Samoa'),
('SAMO', 'WS', 'Samoa', 'Samoa'),
('SENE', 'SN', 'Sénégal', 'Senegal'),
('SEYC', 'SC', 'Seychelles', 'Seychelles'),
('SING', 'SG', 'Singapour', 'Singapore'),
('SLN_', 'SH', 'Sainte-Hélène', 'Saint Helena'),
('SLOQ', 'SK', 'Slovaquie', 'Slovakia'),
('SLOV', 'SI', 'Slovénie', 'Slovenia'),
('SLUC', 'LC', 'Sainte-Lucie', 'Saint Lucia'),
('SMAR', 'SM', 'Saint-Marin', 'San Marino'),
('SOMA', 'SO', 'Somalie', 'Somalia'),
('SOUD', 'SD', 'Soudan', 'Sudan'),
('SPIE', 'PM', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
('SRIL', 'LK', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
('SSIE', 'VA', 'Saint-Siège ', 'Vatican City State (Holy See)'),
('SUED', 'SE', 'Suède', 'Sweden'),
('SUIS', 'CH', 'Suisse', 'Switzerland'),
('SURI', 'SR', 'Suriname', 'Suriname'),
('SVAL', 'SJ', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
('SVIN', 'VC', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
('SWAZ', 'SZ', 'Swaziland', 'Swaziland'),
('SYRY', 'SY', 'Syrie', 'Syrian Arab Republic'),
('TADJ', 'TJ', 'Tadjikistan', 'Tajikistan'),
('TAIW', 'TW', 'Taïwan', 'Taiwan'),
('TANZ', 'TZ', 'Tanzanie', 'Tanzania, United Republic of'),
('TCHA', 'TD', 'Tchad', 'Chad'),
('TCHE', 'CZ', 'République tchèque', 'Czech Republic'),
('TERR', 'TF', 'Terres australes françaises', 'French Southern Territories - TF'),
('THAI', 'TH', 'Thaïlande', 'Thailand'),
('TIMO', 'TL', 'Timor Oriental', 'Timor-Leste (East Timor)'),
('TOBA', 'TT', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
('TOGO', 'TG', 'Togo', 'Togo'),
('TOKE', 'TK', 'Tokélaou', 'Tokelau'),
('TOME', 'ST', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
('TONG', 'TO', 'Tonga', 'Tonga'),
('TUNI', 'TN', 'Tunisie', 'Tunisia'),
('TUR1', 'TC', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
('TUR2', 'TM', 'Turkménistan', 'Turkmenistan'),
('TURQ', 'TR', 'Turquie', 'Turkey'),
('TUVA', 'TV', 'Tuvalu', 'Tuvalu'),
('UKRA', 'UA', 'Ukraine', 'Ukraine'),
('URUG', 'UY', 'Uruguay', 'Uruguay'),
('USA_', 'US', 'États-Unis', 'United States'),
('VANU', 'VU', 'Vanuatu', 'Vanuatu'),
('VIEA', 'VI', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
('VIEB', 'VG', 'Iles Vierges britanniques', 'Virgin Islands, British');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idStat` int(5) NOT NULL,
  `libStat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStat`, `libStat`) VALUES
(1, 'Super Admin'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

CREATE TABLE `thematique` (
  `numThem` varchar(8) NOT NULL,
  `libThem` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`numThem`, `libThem`, `numLang`) VALUES
('THEM0101', 'Interview', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `pseudoUser` varchar(60) NOT NULL,
  `passUser` varchar(60) NOT NULL,
  `nomUser` varchar(60) DEFAULT NULL,
  `prenomUser` varchar(60) DEFAULT NULL,
  `eMailUser` varchar(70) NOT NULL,
  `confirmation_token` varchar(70) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(70) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `idStat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`pseudoUser`, `passUser`, `nomUser`, `prenomUser`, `eMailUser`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `idStat`) VALUES
('user', 'user', 'user', 'user', 'user@email.com', NULL, NULL, NULL, NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `angle`
--
ALTER TABLE `angle`
  ADD PRIMARY KEY (`numAngl`),
  ADD KEY `ANGLE_FK` (`numAngl`),
  ADD KEY `FK_ASSOCIATION_3` (`numLang`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`numArt`),
  ADD KEY `ARTICLE_FK` (`numArt`),
  ADD KEY `FK_ASSOCIATION_1` (`numAngl`),
  ADD KEY `FK_ASSOCIATION_2` (`numThem`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`numSeqCom`,`numArt`),
  ADD KEY `COMMENT_FK` (`numSeqCom`,`numArt`),
  ADD KEY `FK_ASSOCIATION_8` (`numArt`),
  ADD KEY `FK_ASSOCIATION_9` (`numMemb`);

--
-- Index pour la table `commentplus`
--
ALTER TABLE `commentplus`
  ADD PRIMARY KEY (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  ADD KEY `COMMENTPLUS_FK` (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  ADD KEY `FK_COMMENTPLUS` (`numSeqComR`,`numArtR`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`numLang`),
  ADD KEY `LANGUE_FK` (`numLang`),
  ADD KEY `FK_ASSOCIATION_7` (`numPays`);

--
-- Index pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD PRIMARY KEY (`numMemb`,`numArt`),
  ADD KEY `LIKEART_FK` (`numMemb`,`numArt`),
  ADD KEY `FK_LIKEART` (`numArt`);

--
-- Index pour la table `likecom`
--
ALTER TABLE `likecom`
  ADD PRIMARY KEY (`numMemb`,`numSeqCom`,`numArt`),
  ADD KEY `LIKECOM_FK` (`numMemb`,`numSeqCom`,`numArt`),
  ADD KEY `FK_LIKECOM` (`numSeqCom`,`numArt`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`numMemb`),
  ADD KEY `MEMBRE_FK` (`numMemb`),
  ADD KEY `FK_ASSOCIATION_10` (`idStat`);

--
-- Index pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD PRIMARY KEY (`numMotCle`),
  ADD KEY `MOTCLE_FK` (`numMotCle`),
  ADD KEY `FK_ASSOCIATION_5` (`numLang`);

--
-- Index pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD PRIMARY KEY (`numArt`,`numMotCle`),
  ADD KEY `MOTCLEARTICLE_FK` (`numArt`),
  ADD KEY `MOTCLEARTICLE2_FK` (`numMotCle`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`numPays`),
  ADD KEY `PAYS_FK` (`numPays`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idStat`),
  ADD KEY `STATUT_FK` (`idStat`);

--
-- Index pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD PRIMARY KEY (`numThem`),
  ADD KEY `THEMATIQUE_FK` (`numThem`),
  ADD KEY `FK_ASSOCIATION_4` (`numLang`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pseudoUser`,`passUser`),
  ADD KEY `USER_FK` (`pseudoUser`,`passUser`),
  ADD KEY `FK_ASSOCIATION_6` (`idStat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `numArt` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `numMemb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `motcle`
--
ALTER TABLE `motcle`
  MODIFY `numMotCle` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `idStat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numAngl`) REFERENCES `angle` (`numAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numThem`) REFERENCES `thematique` (`numThem`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_8` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_ASSOCIATION_9` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `commentplus`
--
ALTER TABLE `commentplus`
  ADD CONSTRAINT `FK_COMMENTPLUS` FOREIGN KEY (`numSeqComR`,`numArtR`) REFERENCES `comment` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_COMMENTPLUS2` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `comment` (`numSeqCom`, `numArt`);

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`numPays`) REFERENCES `pays` (`numPays`);

--
-- Contraintes pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD CONSTRAINT `FK_LIKEART` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `likecom`
--
ALTER TABLE `likecom`
  ADD CONSTRAINT `FK_LIKECOM` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `comment` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_LIKECOM2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_ASSOCIATION_10` FOREIGN KEY (`idStat`) REFERENCES `statut` (`idStat`);

--
-- Contraintes pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `motcle` (`numMotCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`);

--
-- Contraintes pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`idStat`) REFERENCES `statut` (`idStat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
