-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2015 at 05:27 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `91`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Brand'),
(4, 'FrontendUser'),
(3, 'Shop');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `title`, `link`, `order`, `timestamp`) VALUES
(1, 'logo_(2)6.png', 'demo', 'google.com', 1, '2014-10-25 08:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pricerange` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebookpage` varchar(255) NOT NULL,
  `twitterpage` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `pininterest` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `blog` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `pricerange`, `video`, `description`, `website`, `facebookpage`, `twitterpage`, `logo`, `pininterest`, `googleplus`, `instagram`, `blog`) VALUES
(1, 'Nike', 1, 'https://www.youtube.com/watch?v=9hRNFgSLLAQ', 'ddd', 'website', 'facebook', 'twpage', 'download_(2).png', '', '', '', ''),
(2, 'Woodland', 2, 'https://www.youtube.com/watch?v=9hRNFgSLLAQ', '', '', '', '', 'Woodland-Logo1.jpeg', '', '', '', ''),
(3, 'Adidas', 3, 'https://www.youtube.com/watch?v=9hRNFgSLLAQ', 'a', 'web', 'fb', 'tw', 'download1.png', '', '', '', ''),
(38, 'Pepe Jeans', 0, '', '', '', '', '', 'download_(1).png', '', '', '', ''),
(42, 'Cygnus', 0, '', '', '', '', '', 'images1.jpg', '', '', '', ''),
(43, 'Cinepolis', 0, '', '', '', '', '', 'download.jpg', '', '', '', ''),
(44, 'Michael Kors', 0, '', '', '', '', '', 'download_(1).jpg', '', '', '', ''),
(45, 'Holii', 0, '', '', '', '', '', 'download_(2).jpg', '', '', '', ''),
(46, 'Sunglass Hut', 0, '', '', '', '', '', 'images_(1).jpg', '', '', '', ''),
(47, 'Van Heusen', 0, '', '', '', '', '', 'download_(3).jpg', '', '', '', ''),
(48, 'Zuni', 0, '', '', '', '', '', 'download_(4).jpg', '', '', '', ''),
(49, 'Smaaash', 0, '', '', '', '', '', 'download_(5).jpg', '', '', '', ''),
(50, 'Ruff', 0, '', '', '', '', '', 'images_(2).jpg', '', '', '', ''),
(51, 'Mothercare', 0, '', '', '', '', '', 'images2.jpg', '', '', '', ''),
(52, 'Mom and Me', 0, '', '', '', '', '', 'download1.jpg', '', '', '', ''),
(53, 'Vero Moda', 0, '', '', '', '', '', 'download_(1)1.jpg', '', '', '', ''),
(54, 'Reebok', 0, '', '', '', '', '', 'download_(2)1.jpg', '', '', '', ''),
(55, 'Hidesign', 0, '', '', '', '', '', 'download_(3)1.jpg', '', '', '', ''),
(56, '109 F', 0, '', '', 'www.109f.com', '', '', '', '', '', '', ''),
(57, 'Aarya 24kt', 0, '', '', 'http://aarya-24kt.com/', '', '', '', '', '', '', ''),
(58, 'Accessorize', 0, '', '', 'uk.accessorize.com', '', '', '', '', '', '', ''),
(59, 'Adamis', 0, '', '', 'www.adamis.in', '', '', '', '', '', '', ''),
(60, 'Add Ons', 0, '', '', 'http://addonsonline.com/', '', '', '', '', '', '', ''),
(61, 'Adidas', 0, '', '', 'www.adidas.co.in', '', '', '', '', '', '', ''),
(62, 'Adidas Original', 0, '', '', 'www.adidas.co.in', '', '', '', '', '', '', ''),
(63, 'Afton', 0, '', '', 'www.healthclubindia.com', '', '', '', '', '', '', ''),
(64, 'Aldo', 0, '', '', 'www.aldoshoes.com', '', '', '', '', '', '', ''),
(65, 'All - The Plus size store', 0, '', '', 'www.pantaloonretail.in', '', '', '', '', '', '', ''),
(66, 'Allen Solly', 0, '', '', 'www.allensolly.com', '', '', '', '', '', '', ''),
(67, 'Amber and Shirrin', 0, '', '', 'www.aandsthestore.com', '', '', '', '', '', '', ''),
(68, 'AND', 0, '', '', 'www.andindia.com/', '', '', '', '', '', '', ''),
(69, 'Anita Dongre', 0, '', '', 'www.anitadongre.com', '', '', '', '', '', '', ''),
(70, 'Anita Dongre Bridal Timeless', 0, '', '', 'www.anitadongre.com', '', '', '', '', '', '', ''),
(71, 'Archies', 0, '', '', 'www.archiesonline.com', '', '', '', '', '', '', ''),
(72, 'Armani Jeans', 0, '', '', 'www.armani.com/in/armanijeans', '', '', '', '', '', '', ''),
(73, 'Aroma Thai', 0, '', '', 'www.aromathai.net', '', '', '', '', '', '', ''),
(74, 'Aroma Thai', 0, '', '', 'http://aromathai.net/', '', '', '', '', '', '', ''),
(75, 'Arrow', 0, '', '', 'www.arrowlife.com', '', '', '', '', '', '', ''),
(76, 'Ashika, Ashika', 0, '', '', 'www.ashika.com', '', '', '', '', '', '', ''),
(77, 'Aspen', 0, '', '', 'www.lifestylestores.com', '', '', '', '', '', '', ''),
(78, 'Avirate', 0, '', '', 'http://aviratefashion.co.in', '', '', '', '', '', '', ''),
(79, 'Ayesha', 0, '', '', 'www.ayeshaaccessories.com', '', '', '', '', '', '', ''),
(80, 'Baggit', 0, '', '', 'www.baggit.com', '', '', '', '', '', '', ''),
(81, 'Bagzone', 0, '', '', 'www.bagzone.com', '', '', '', '', '', '', ''),
(82, 'Bally', 0, '', '', 'www.bally.com', '', '', '', '', '', '', ''),
(83, 'Balzo', 0, '', '', 'www.balzo.in', '', '', '', '', '', '', ''),
(84, 'Barbie', 0, '', '', 'www.barbiestore.in', '', '', '', '', '', '', ''),
(85, 'Basecamp Traveller', 0, '', '', 'www.basecamp.in', '', '', '', '', '', '', ''),
(86, 'Basics & Genesis', 0, '', '', 'http://www.basicslife.com/', '', '', '', '', '', '', ''),
(87, 'Basics Life', 0, '', '', 'www.basicslife.com', '', '', '', '', '', '', ''),
(88, 'Bata', 0, '', '', 'www.bata.com', '', '', '', '', '', '', ''),
(89, 'Beauty Corner', 0, '', '', '', '', '', '', '', '', '', ''),
(90, 'Bebe', 0, '', '', 'www.bebe.com', '', '', '', '', '', '', ''),
(91, 'Being Human', 0, '', '', 'www.beinghumanfoundation.in', '', '', '', '', '', '', ''),
(92, 'Beverly Hills Polo Club', 0, '', '', '', '', '', '', '', '', '', ''),
(93, 'Bhandare Eye Care', 0, '', '', 'www.bhandareopticians.com', '', '', '', '', '', '', ''),
(94, 'Bharat & Dorris', 0, '', '', 'www.bharatdorris.com', '', '', '', '', '', '', ''),
(95, 'Biba', 0, '', '', 'www.bibaindia.com', '', '', '', '', '', '', ''),
(96, 'Big Bazaar', 0, '', '', 'www.bigbazzar.com', '', '', '', '', '', '', ''),
(97, 'Black Soul', 0, '', '', 'www.blacksoul.in', '', '', '', '', '', '', ''),
(98, 'Blackberry''s', 0, '', '', 'www.blackberrys.in', '', '', '', '', '', '', ''),
(99, 'Blue Tonic', 0, '', '', 'www.bluetonic.in', '', '', '', '', '', '', ''),
(100, 'Blur', 0, '', '', 'www.blur-fashion.com/', '', '', '', '', '', '', ''),
(101, 'Boardriders', 0, '', '', 'http://www.quiksilver.in/qs/', '', '', '', '', '', '', ''),
(102, 'Bodhi Thai Spa', 0, '', '', 'www.bodhigroup.in', '', '', '', '', '', '', ''),
(103, 'Boggi Milano', 0, '', '', 'shop.boggi.com', '', '', '', '', '', '', ''),
(104, 'Bombay High', 0, '', '', 'www.bombayhighfashions.com', '', '', '', '', '', '', ''),
(105, 'Bonjour', 0, '', '', 'www.bonjourproducts.com', '', '', '', '', '', '', ''),
(106, 'Bottega Veneta', 0, '', '', 'www.bottegaveneta.com', '', '', '', '', '', '', ''),
(107, 'Boulevard', 0, '', '', 'www.boulevards.com', '', '', '', '', '', '', ''),
(108, 'Bracialeto', 0, '', '', 'www.bracialeto.com', '', '', '', '', '', '', ''),
(109, 'Bulchee', 0, '', '', 'www.bulchee.com', '', '', '', '', '', '', ''),
(110, 'Burberry', 0, '', '', 'www.burberry.com', '', '', '', '', '', '', ''),
(111, 'BYSI', 0, '', '', 'www.bysi.com', '', '', '', '', '', '', ''),
(112, 'Calonge', 0, '', '', 'www.calonge-group.com', '', '', '', '', '', '', ''),
(113, 'Calvin Klein', 0, '', '', 'www.calvinklein.com/?', '', '', '', '', '', '', ''),
(114, 'Calvin Klein Jeans', 0, '', '', 'www.calvinklein.com', '', '', '', '', '', '', ''),
(115, 'Canali', 0, '', '', 'www.canali.com', '', '', '', '', '', '', ''),
(116, 'CARBON', 0, '', '', 'www.foreverjewel.com/carbon.htm', '', '', '', '', '', '', ''),
(117, 'Catwalk', 0, '', '', 'catwalk.co.in', '', '', '', '', '', '', ''),
(118, 'Celio', 0, '', '', 'http://brand.celio.com/en/', '', '', '', '', '', '', ''),
(119, 'Central', 0, '', '', 'www.futuregroup.in', '', '', '', '', '', '', ''),
(120, 'Chanel', 0, '', '', 'www.chanel.com', '', '', '', '', '', '', ''),
(121, 'Charles & Keith', 0, '', '', 'www.charleskeith.com', '', '', '', '', '', '', ''),
(122, 'Cheemo', 0, '', '', 'www.cheemo.com', '', '', '', '', '', '', ''),
(123, 'Chemistry', 0, '', '', 'www.chemistryindia.com', '', '', '', '', '', '', ''),
(124, 'Chicco', 0, '', '', 'www.chicco.in', '', '', '', '', '', '', ''),
(125, 'Chimp', 0, '', '', 'http://chimpwear.com', '', '', '', '', '', '', ''),
(126, 'Chinar', 0, '', '', 'www.chinarinternational.org', '', '', '', '', '', '', ''),
(127, 'Chumbak', 0, '', '', 'www.chumbak.com', '', '', '', '', '', '', ''),
(128, 'Claire''s', 0, '', '', 'www.claires.com', '', '', '', '', '', '', ''),
(129, 'Clarks', 0, '', '', 'www.clarks.in', '', '', '', '', '', '', ''),
(130, 'Clinique', 0, '', '', 'www.clinique.in', '', '', '', '', '', '', ''),
(131, 'Colette', 0, '', '', 'www.colettehayman.com.au/', '', '', '', '', '', '', ''),
(132, 'Color Bar', 0, '', '', 'www.colorbarcosmetics.com', '', '', '', '', '', '', ''),
(133, 'Color Plus', 0, '', '', 'www.colorplusonline.com', '', '', '', '', '', '', ''),
(134, 'Converse', 0, '', '', 'www.converse.com', '', '', '', '', '', '', ''),
(135, 'Cool Wrist Watches', 0, '', '', '', '', '', '', '', '', '', ''),
(136, 'Cotton Cottage', 0, '', '', 'www.cottoncottageindia.com', '', '', '', '', '', '', ''),
(137, 'Cotton Culture', 0, '', '', 'www.cottonculture.co.in', '', '', '', '', '', '', ''),
(138, 'Cottonworld', 0, '', '', 'www.cottonworld.net', '', '', '', '', '', '', ''),
(139, 'Crabtree & Evelyn', 0, '', '', 'www.crabtree-evelyn.com', '', '', '', '', '', '', ''),
(140, 'Crocs', 0, '', '', 'www.crocsindia.com', '', '', '', '', '', '', ''),
(141, 'Cygnus', 0, '', '', 'www.cygnusjewellery.com/', '', '', '', '', '', '', ''),
(142, 'Cygnus', 0, '', '', 'www.cygnusjewellery.com', '', '', '', '', '', '', ''),
(143, 'Da Milano', 0, '', '', 'www.damilano.com', '', '', '', '', '', '', ''),
(144, 'Daniel Hechter', 0, '', '', 'www.daniel-hechter.com', '', '', '', '', '', '', ''),
(145, 'D''damas', 0, '', '', 'www.ddamas.co.in', '', '', '', '', '', '', ''),
(146, 'Deal Jeans', 0, '', '', 'www.dealjeans.com', '', '', '', '', '', '', ''),
(147, 'Debenhams', 0, '', '', 'www.debenhams.com', '', '', '', '', '', '', ''),
(148, 'Diesel', 0, '', '', 'www.diesel.com', '', '', '', '', '', '', ''),
(149, 'DKNY', 0, '', '', 'www.dkny.com', '', '', '', '', '', '', ''),
(150, 'DKNY Accessories', 0, '', '', 'www.dkny.com/accessories', '', '', '', '', '', '', ''),
(151, 'Drama', 0, '', '', 'http://www.dramasalon.co.in/', '', '', '', '', '', '', ''),
(152, 'ELC', 0, '', '', 'www.elc.com', '', '', '', '', '', '', ''),
(153, 'ELLE', 0, '', '', 'http://www.ellefashionwear.in/', '', '', '', '', '', '', ''),
(154, 'Emporio Armani', 0, '', '', 'www.emporioarmani.com', '', '', '', '', '', '', ''),
(155, 'Enamor', 0, '', '', 'www.enamor.co.in', '', '', '', '', '', '', ''),
(156, 'Enrich', 0, '', '', 'www.enrichsalon.com', '', '', '', '', '', '', ''),
(157, 'Envi Salon', 0, '', '', 'www.envisalon.in', '', '', '', '', '', '', ''),
(158, 'Ermenegildo Zegna', 0, '', '', 'www.zegna.com', '', '', '', '', '', '', ''),
(159, 'Esbeda', 0, '', '', 'www.esbeda.com', '', '', '', '', '', '', ''),
(160, 'Eske', 0, '', '', 'http://www.eske.in/', '', '', '', '', '', '', ''),
(161, 'Espelho', 0, '', '', 'http://www.espelhofashions.com/', '', '', '', '', '', '', ''),
(162, 'Estee Lauder', 0, '', '', 'www.esteelauder.in', '', '', '', '', '', '', ''),
(163, 'Ethnicity', 0, '', '', 'www.facebook.com/Ethnicitystore', '', '', '', '', '', '', ''),
(164, 'Ethos', 0, '', '', 'www.ethoswatches.com', '', '', '', '', '', '', ''),
(165, 'Eyecatchers Salon & The Thai Spa', 0, '', '', 'www.eyecatchers-thethaispa.com', '', '', '', '', '', '', ''),
(166, 'Fab India', 0, '', '', 'www.fabindia.com/?', '', '', '', '', '', '', ''),
(167, 'Fab India', 0, '', '', 'www.fabindia.com', '', '', '', '', '', '', ''),
(168, 'Faces', 0, '', '', 'www.faces-canada.com', '', '', '', '', '', '', ''),
(169, 'FBB', 0, '', '', 'http://www.futuregroup.in/', '', '', '', '', '', '', ''),
(170, 'FCUK', 0, '', '', 'frenchconnection.in', '', '', '', '', '', '', ''),
(171, 'Femme', 0, '', '', 'www.femmeindia.com', '', '', '', '', '', '', ''),
(172, 'Fiddaa', 0, '', '', '', '', '', '', '', '', '', ''),
(173, 'Fila', 0, '', '', 'www.filaindia.in', '', '', '', '', '', '', ''),
(174, 'Florista', 0, '', '', 'www.florista.in', '', '', '', '', '', '', ''),
(175, 'Flying Machine', 0, '', '', 'www.flyingmachine.co.in', '', '', '', '', '', '', ''),
(176, 'Foresight Opticals', 0, '', '', 'www.foresightoptical.com', '', '', '', '', '', '', ''),
(177, 'Foresight Opticals', 0, '', '', 'www.foresightopticals.in', '', '', '', '', '', '', ''),
(178, 'Forest Essentials', 0, '', '', 'www.forestessentialsindia.com', '', '', '', '', '', '', ''),
(179, 'Forever 21', 0, '', '', 'www.forever21.com/in', '', '', '', '', '', '', ''),
(180, 'Forever New', 0, '', '', 'www.forevernew.co.in', '', '', '', '', '', '', ''),
(181, 'French Connection', 0, '', '', 'www.frenchconnection.in', '', '', '', '', '', '', ''),
(182, 'Furla', 0, '', '', 'www.furla.com', '', '', '', '', '', '', ''),
(183, 'Gangar Eye Nation', 0, '', '', 'www.gangareyenation.com', '', '', '', '', '', '', ''),
(184, 'Gant', 0, '', '', 'www.gant.com', '', '', '', '', '', '', ''),
(185, 'Gas', 0, '', '', 'www.gasjeans.com', '', '', '', '', '', '', ''),
(186, 'Gili', 0, '', '', 'www.gili.com', '', '', '', '', '', '', ''),
(187, 'Gini & Jony', 0, '', '', 'www.giniandjony.com', '', '', '', '', '', '', ''),
(188, 'Giordano', 0, '', '', 'http://www.giordano.in/', '', '', '', '', '', '', ''),
(189, 'Gitanjali Jewels', 0, '', '', 'www.gitanjalijewels.com', '', '', '', '', '', '', ''),
(190, 'Global Desi', 0, '', '', 'www.globaldesi.in', '', '', '', '', '', '', ''),
(191, 'Globus', 0, '', '', 'www.globusstores.com', '', '', '', '', '', '', ''),
(192, 'Go Colours', 0, '', '', 'www.gocolors.co.in', '', '', '', '', '', '', ''),
(193, 'Gossip', 0, '', '', 'www.gossipyouth.com', '', '', '', '', '', '', ''),
(194, 'Gucci', 0, '', '', 'www.gucci.com', '', '', '', '', '', '', ''),
(195, 'Guess', 0, '', '', 'www.guess.com', '', '', '', '', '', '', ''),
(196, 'Guess Accessories', 0, '', '', 'www.guess.com', '', '', '', '', '', '', ''),
(197, 'Guess Collection', 0, '', '', 'www.guess.com', '', '', '', '', '', '', ''),
(198, 'H Ajoomal', 0, '', '', 'www.hajoomal.com', '', '', '', '', '', '', ''),
(199, 'H.M.Mega Brands', 0, '', '', 'www.hmmegabrands.com', '', '', '', '', '', '', ''),
(200, 'Hamley''s', 0, '', '', 'www.hamleys.com', '', '', '', '', '', '', ''),
(201, 'Hastkala', 0, '', '', '', '', '', '', '', '', '', ''),
(202, 'Head Quarters', 0, '', '', '', '', '', '', '', '', '', ''),
(203, 'Health & Glow', 0, '', '', 'www.healthandglow.in', '', '', '', '', '', '', ''),
(204, 'Heel & Buckle', 0, '', '', 'www.heelandbuckle.com', '', '', '', '', '', '', ''),
(205, 'Helios', 0, '', '', 'www.helioswatchstore.com', '', '', '', '', '', '', ''),
(206, 'Hidesign', 0, '', '', 'www.hidesign.com', '', '', '', '', '', '', ''),
(207, 'Himalaya Health Care', 0, '', '', 'www.himalayahealthcare.com', '', '', '', '', '', '', ''),
(208, 'Holidae', 0, '', '', 'http://www.holidae.in/', '', '', '', '', '', '', ''),
(209, 'Holii', 0, '', '', 'www.holii.in', '', '', '', '', '', '', ''),
(210, 'Hugo Boss', 0, '', '', 'www.hugoboss.com', '', '', '', '', '', '', ''),
(211, 'Hush Puppies', 0, '', '', 'www.hushpuppies.com', '', '', '', '', '', '', ''),
(212, 'I Am In', 0, '', '', 'http://www.hypercityindia.com', '', '', '', '', '', '', ''),
(213, 'I-Leather Graph', 0, '', '', 'www.ileathergraph.com/?', '', '', '', '', '', '', ''),
(214, 'Inc 5', 0, '', '', 'http://www.inc5.co.in', '', '', '', '', '', '', ''),
(215, 'Inc 5', 0, '', '', 'www.inc5.co.in', '', '', '', '', '', '', ''),
(216, 'Indian Terrain', 0, '', '', 'www.indianterrain.com', '', '', '', '', '', '', ''),
(217, 'Indostyle', 0, '', '', 'www.indostyle.co.in', '', '', '', '', '', '', ''),
(218, 'Inglot', 0, '', '', 'inglotcosmetics.com', '', '', '', '', '', '', ''),
(219, 'Izod', 0, '', '', 'izod.com', '', '', '', '', '', '', ''),
(220, 'Jack & Jones', 0, '', '', 'www.jackjonesindia.in/', '', '', '', '', '', '', ''),
(221, 'Jashn', 0, '', '', 'www.jashnonline.com', '', '', '', '', '', '', ''),
(222, 'Jealous 21', 0, '', '', 'www.jealous21.com', '', '', '', '', '', '', ''),
(223, 'Jean Claude Biguine', 0, '', '', 'www.biguineindia.com', '', '', '', '', '', '', ''),
(224, 'Jelmoli', 0, '', '', 'www.jelmoli.ch', '', '', '', '', '', '', ''),
(225, 'Jimmy Choo', 0, '', '', 'http://www.jimmychoo.com/', '', '', '', '', '', '', ''),
(226, 'Jockey', 0, '', '', 'www.jockey.com', '', '', '', '', '', '', ''),
(227, 'Jockey', 0, '', '', 'http://www.jockeyindia.com/', '', '', '', '', '', '', ''),
(228, 'John Player', 0, '', '', 'http://johnplayers.iacampaigns.com/', '', '', '', '', '', '', ''),
(229, 'John Player', 0, '', '', 'johnplayers.iacampaigns.com', '', '', '', '', '', '', ''),
(230, 'John Players', 0, '', '', 'johnplayers.iacampaigns.com', '', '', '', '', '', '', ''),
(231, 'Juice', 0, '', '', 'www.juicesalon.in', '', '', '', '', '', '', ''),
(232, 'Just In Vogue', 0, '', '', 'www.justinvogue.com', '', '', '', '', '', '', ''),
(233, 'Just Watches', 0, '', '', 'http://www.justwatchesindia.com/', '', '', '', '', '', '', ''),
(234, 'Kapil''s', 0, '', '', 'http://www.kapilssalon.com/', '', '', '', '', '', '', ''),
(235, 'Karigari', 0, '', '', 'www.karigari.in', '', '', '', '', '', '', ''),
(236, 'Karmik', 0, '', '', 'www.karmik.in', '', '', '', '', '', '', ''),
(237, 'Kaya Skin Clinic', 0, '', '', 'http://www.kayaclinic.com/', '', '', '', '', '', '', ''),
(238, 'Kazo', 0, '', '', 'https://www.kazo.com/', '', '', '', '', '', '', ''),
(239, 'Kazo', 0, '', '', 'http://www.kazo.com/', '', '', '', '', '', '', ''),
(240, 'Kenneth Cole', 0, '', '', 'https://www.kennethcole.com/', '', '', '', '', '', '', ''),
(241, 'Kiah', 0, '', '', 'www.kiahjewels.com', '', '', '', '', '', '', ''),
(242, 'Kiehl''s', 0, '', '', 'http://www.kiehlsindia.com', '', '', '', '', '', '', ''),
(243, 'Kraus Jeans', 0, '', '', 'http://krausjeans.com/', '', '', '', '', '', '', ''),
(244, 'L?Oreal', 0, '', '', 'www.loreal.co.in', '', '', '', '', '', '', ''),
(245, 'La Senza', 0, '', '', 'www.lasenza.com', '', '', '', '', '', '', ''),
(246, 'Lacoste', 0, '', '', 'www.lacoste.com', '', '', '', '', '', '', ''),
(247, 'Lamy', 0, '', '', 'http://www.lamyindia.com/', '', '', '', '', '', '', ''),
(248, 'Lancome', 0, '', '', 'http://www.lancome.in/', '', '', '', '', '', '', ''),
(249, 'Landmark', 0, '', '', 'http://www.landmarkonthenet.com/', '', '', '', '', '', '', ''),
(250, 'Latin Quarters', 0, '', '', 'www.latin-quarters.com', '', '', '', '', '', '', ''),
(251, 'Laven', 0, '', '', 'http://www.lavenfashions.com/', '', '', '', '', '', '', ''),
(252, 'Lavie', 0, '', '', 'www.lavieaccessories.com', '', '', '', '', '', '', ''),
(253, 'Lee', 0, '', '', 'www.lee.in', '', '', '', '', '', '', ''),
(254, 'L''effet!', 0, '', '', 'www.leffet.in', '', '', '', '', '', '', ''),
(255, 'Levi''s', 0, '', '', 'http://levi.in', '', '', '', '', '', '', ''),
(256, 'Lifestyle', 0, '', '', 'http://lifestylestores.com/', '', '', '', '', '', '', ''),
(257, 'Lifestyle', 0, '', '', 'http://lifestylestores.com', '', '', '', '', '', '', ''),
(258, 'Lifestyle', 0, '', '', 'www.lifestylestores.com', '', '', '', '', '', '', ''),
(259, 'Lifestyle', 0, '', '', 'http://www.lifestylestores.com/', '', '', '', '', '', '', ''),
(260, 'Lilliput', 0, '', '', 'www.lilliputkids.com', '', '', '', '', '', '', ''),
(261, 'L''Occitane', 0, '', '', 'in.loccitane.com', '', '', '', '', '', '', ''),
(262, 'Lord''s', 0, '', '', 'https://www.facebook.com/LordsshoesIndia', '', '', '', '', '', '', ''),
(263, 'Louis Philippe', 0, '', '', 'www.louisphilippe.com', '', '', '', '', '', '', ''),
(264, 'Louis Philippe', 0, '', '', 'http://www.louisphilippe.com/', '', '', '', '', '', '', ''),
(265, 'Love from India', 0, '', '', 'www.lovefromindia.com', '', '', '', '', '', '', ''),
(266, 'Luxury Boulevard', 0, '', '', '', '', '', '', '', '', '', ''),
(267, 'MAC', 0, '', '', 'www.maccosmetics.in', '', '', '', '', '', '', ''),
(268, 'Madame', 0, '', '', 'www.madameonline.com', '', '', '', '', '', '', ''),
(269, 'Mads', 0, '', '', 'http://www.madsfashion.com/', '', '', '', '', '', '', ''),
(270, 'Mahala', 0, '', '', '', '', '', '', '', '', '', ''),
(271, 'Mahi', 0, '', '', 'http://www.mahijewelry.com/', '', '', '', '', '', '', ''),
(272, 'Malabar Gold', 0, '', '', 'https://www.malabargoldanddiamonds.com', '', '', '', '', '', '', ''),
(273, 'Malaga', 0, '', '', 'http://demo.worldofmalaga.com/default.aspx', '', '', '', '', '', '', ''),
(274, 'Manchester United', 0, '', '', 'http://www.manutd.com/en/indiamegastore', '', '', '', '', '', '', ''),
(275, 'Mango', 0, '', '', 'www.mango.com', '', '', '', '', '', '', ''),
(276, 'Manyavar', 0, '', '', 'www.manyavar.com/?', '', '', '', '', '', '', ''),
(277, 'Manyavar', 0, '', '', 'https://www.manyavar.com/?', '', '', '', '', '', '', ''),
(278, 'Manyavar', 0, '', '', 'https://www.manyavar.com', '', '', '', '', '', '', ''),
(279, 'Marks & Spencer', 0, '', '', 'www.marksandspencer.com', '', '', '', '', '', '', ''),
(280, 'Marks & Spencer', 0, '', '', 'marksandspencerindia.com', '', '', '', '', '', '', ''),
(281, 'Marks & Spencer', 0, '', '', 'http://marksandspencerindia.com/', '', '', '', '', '', '', ''),
(282, 'MAX', 0, '', '', 'www.maxfashionindia.com', '', '', '', '', '', '', ''),
(283, 'MAX', 0, '', '', 'http://www.maxfashionindia.com/', '', '', '', '', '', '', ''),
(284, 'Me n Moms', 0, '', '', 'www.meemee.in', '', '', '', '', '', '', ''),
(285, 'Meena Bazaar', 0, '', '', 'meenabazaar.org', '', '', '', '', '', '', ''),
(286, 'Men''s Boulevard', 0, '', '', '', '', '', '', '', '', '', ''),
(287, 'Menz Trendz', 0, '', '', 'menstrendz.com', '', '', '', '', '', '', ''),
(288, 'Metro', 0, '', '', 'www.metroshoes.net', '', '', '', '', '', '', ''),
(289, 'Metro', 0, '', '', 'http://www.metroshoes.net/', '', '', '', '', '', '', ''),
(290, 'Mia', 0, '', '', 'www.mia.tanishq.co.in', '', '', '', '', '', '', ''),
(291, 'Millionaire', 0, '', '', 'www.millionairebombay.com/?', '', '', '', '', '', '', ''),
(292, 'Millionaire', 0, '', '', 'www.millionairebombay.com', '', '', '', '', '', '', ''),
(293, 'Mineral', 0, '', '', 'www.theminerallife.com', '', '', '', '', '', '', ''),
(294, 'Mineral', 0, '', '', 'http://www.theminerallife.com/', '', '', '', '', '', '', ''),
(295, 'Mira Designs', 0, '', '', 'miradesigns.in', '', '', '', '', '', '', ''),
(296, 'Mochi', 0, '', '', 'www.mochi.co.in', '', '', '', '', '', '', ''),
(297, 'Mogra', 0, '', '', '', '', '', '', '', '', '', ''),
(298, 'Mom & Me', 0, '', '', 'www.momandme.in', '', '', '', '', '', '', ''),
(299, 'Mothercare', 0, '', '', 'www.mothercare.com', '', '', '', '', '', '', ''),
(300, 'Mufti', 0, '', '', 'www.mufti.in', '', '', '', '', '', '', ''),
(301, 'Mustard', 0, '', '', 'www.mustardfashion.com', '', '', '', '', '', '', ''),
(302, 'Myo Thai Spa', 0, '', '', 'www.myothaispa.com', '', '', '', '', '', '', ''),
(303, 'Nail Spa', 0, '', '', '', '', '', '', '', '', '', ''),
(304, 'Nalli Next', 0, '', '', 'www.nallisilks.com', '', '', '', '', '', '', ''),
(305, 'Naracamicie', 0, '', '', 'www.naracamicie.com', '', '', '', '', '', '', ''),
(306, 'Nautica', 0, '', '', 'www.nautica.com', '', '', '', '', '', '', ''),
(307, 'Neck Ties & More', 0, '', '', 'www.necktiesandmoreonline.com', '', '', '', '', '', '', ''),
(308, 'Neulife Store', 0, '', '', 'www.neulife.in', '', '', '', '', '', '', ''),
(309, 'Neutrogena', 0, '', '', 'www.neutrogena.com', '', '', '', '', '', '', ''),
(310, 'Nike', 0, '', '', 'www.nike.com', '', '', '', '', '', '', ''),
(311, 'Nike', 0, '', '', 'http://www.nike.com/', '', '', '', '', '', '', ''),
(312, 'Nine West', 0, '', '', 'www.ninewest.com', '', '', '', '', '', '', ''),
(313, 'Noi', 0, '', '', 'http://www.noi.in/', '', '', '', '', '', '', ''),
(314, 'Nyassa', 0, '', '', 'www.nyassa.in', '', '', '', '', '', '', ''),
(315, 'Om Art Gallery', 0, '', '', 'www.omart.org', '', '', '', '', '', '', ''),
(316, 'Omega', 0, '', '', 'www.omegawatches.com', '', '', '', '', '', '', ''),
(317, 'Only', 0, '', '', 'http://only-india.com/', '', '', '', '', '', '', ''),
(318, 'Only', 0, '', '', 'only.com', '', '', '', '', '', '', ''),
(319, 'Orra', 0, '', '', 'www.orra.co.in', '', '', '', '', '', '', ''),
(320, 'Osim', 0, '', '', 'www.osim.com', '', '', '', '', '', '', ''),
(321, 'Pantaloons', 0, '', '', 'pantaloons.com', '', '', '', '', '', '', ''),
(322, 'Pantaloons', 0, '', '', 'www.pantaloons.com', '', '', '', '', '', '', ''),
(323, 'Parcos', 0, '', '', 'https://www.facebook.com/ParcosIndia', '', '', '', '', '', '', ''),
(324, 'Park Avenue', 0, '', '', 'www.parkavenue.co.in', '', '', '', '', '', '', ''),
(325, 'Park Avenue', 0, '', '', 'parkavenue.co.in', '', '', '', '', '', '', ''),
(326, 'Park Avenue Women', 0, '', '', 'http://www.parkavenue.co.in/', '', '', '', '', '', '', ''),
(327, 'Parx', 0, '', '', 'http://www.parx.co.in/', '', '', '', '', '', '', ''),
(328, 'Patchouli', 0, '', '', 'www.patchoulis.com', '', '', '', '', '', '', ''),
(329, 'Paul & Shark', 0, '', '', 'www.paulshark.it', '', '', '', '', '', '', ''),
(330, 'Paul Smith', 0, '', '', 'http://www.paulsmith.co.uk/uk-en/shop/', '', '', '', '', '', '', ''),
(331, 'Pavers England', 0, '', '', 'www.paversengland.com', '', '', '', '', '', '', ''),
(332, 'Peora', 0, '', '', 'www.peora.in', '', '', '', '', '', '', ''),
(333, 'Peora', 0, '', '', 'http://peora.in/', '', '', '', '', '', '', ''),
(334, 'Pepe Jeans', 0, '', '', 'www.pepejeans.com', '', '', '', '', '', '', ''),
(335, 'Peter England', 0, '', '', 'www.peterengland.com', '', '', '', '', '', '', ''),
(336, 'Planet Sports', 0, '', '', 'www.planetsportsonline.com', '', '', '', '', '', '', ''),
(337, 'Prapti', 0, '', '', 'www.praptifashions.com', '', '', '', '', '', '', ''),
(338, 'Prima Gold', 0, '', '', 'www.primagold.net', '', '', '', '', '', '', ''),
(339, 'Proline', 0, '', '', 'www.prolineindia.com', '', '', '', '', '', '', ''),
(340, 'Promod', 0, '', '', 'www.promod.eu', '', '', '', '', '', '', ''),
(341, 'Provogue', 0, '', '', 'www.provogue.com', '', '', '', '', '', '', ''),
(342, 'Provogue', 0, '', '', 'http://provogue.com', '', '', '', '', '', '', ''),
(343, 'Puma', 0, '', '', 'www.puma.com', '', '', '', '', '', '', ''),
(344, 'Puma', 0, '', '', 'http://www.puma.com/', '', '', '', '', '', '', ''),
(345, 'Pure Gold', 0, '', '', 'www.pugold.com', '', '', '', '', '', '', ''),
(346, 'Pure Gold', 0, '', '', 'www.pugold.com/in', '', '', '', '', '', '', ''),
(347, 'Pure Gold', 0, '', '', 'http://www.pugold.com/', '', '', '', '', '', '', ''),
(348, 'Queue Up', 0, '', '', '', '', '', '', '', '', '', ''),
(349, 'Quik Silver', 0, '', '', 'www.quiksilver.com', '', '', '', '', '', '', ''),
(350, 'Raiara', 0, '', '', 'http://www.raiara.com/', '', '', '', '', '', '', ''),
(351, 'RayBan', 0, '', '', 'www.vivacitymalls.com', '', '', '', '', '', '', ''),
(352, 'Raymond Made-to-Measure', 0, '', '', 'www.raymond.in', '', '', '', '', '', '', ''),
(353, 'Raymond Weil', 0, '', '', 'www.raymond-weil.com', '', '', '', '', '', '', ''),
(354, 'Red Tape', 0, '', '', 'www.redtape.com', '', '', '', '', '', '', ''),
(355, 'Reebok', 0, '', '', 'www.reebok.com', '', '', '', '', '', '', ''),
(356, 'Regal', 0, '', '', 'http://www.theregalshoes.com/index.php/about-us', '', '', '', '', '', '', ''),
(357, 'Reid & Taylor', 0, '', '', 'www.sknl.co.in', '', '', '', '', '', '', ''),
(358, 'Reliance Footprint', 0, '', '', 'www.reliancefootprint.com', '', '', '', '', '', '', ''),
(359, 'Reliance Jewels', 0, '', '', 'www.reliancejewels.net', '', '', '', '', '', '', ''),
(360, 'Reliance Trends', 0, '', '', 'www.reliancetrendsblog.com', '', '', '', '', '', '', ''),
(361, 'Rhysetta', 0, '', '', 'www.rhysetta.com', '', '', '', '', '', '', ''),
(362, 'Riddhies Photo funda', 0, '', '', '', '', '', '', '', '', '', ''),
(363, 'Riot', 0, '', '', 'http://www.riot.co.in/', '', '', '', '', '', '', ''),
(364, 'Ritu Kumar', 0, '', '', 'www.ritukumar.com', '', '', '', '', '', '', ''),
(365, 'Rocia', 0, '', '', 'https://www.facebook.com/rociashoes', '', '', '', '', '', '', ''),
(366, 'Rohit Bal', 0, '', '', 'www.rohitbal.com', '', '', '', '', '', '', ''),
(367, 'Rosso Brunello', 0, '', '', 'https://www.facebook.com/RossoBrunello', '', '', '', '', '', '', ''),
(368, 'Ruff', 0, '', '', 'http://www.ruff.in/', '', '', '', '', '', '', ''),
(369, 'Rui', 0, '', '', 'www.riu.com', '', '', '', '', '', '', ''),
(370, 'Ruosh', 0, '', '', 'ruosh.com', '', '', '', '', '', '', ''),
(371, 'Sabai Foot Spa', 0, '', '', 'www.sabaifootspa.com', '', '', '', '', '', '', ''),
(372, 'Samsonite', 0, '', '', 'www.samsonite.com', '', '', '', '', '', '', ''),
(373, 'Samsonite', 0, '', '', 'www.samsoniteindia.com', '', '', '', '', '', '', ''),
(374, 'Samsonite Black Label', 0, '', '', 'www.samsoniteindia.com', '', '', '', '', '', '', ''),
(375, 'Satya Paul', 0, '', '', 'www.satyapaul.com', '', '', '', '', '', '', ''),
(376, 'Satya Paul Accessories', 0, '', '', 'www.satyapaul.com', '', '', '', '', '', '', ''),
(377, 'Satya Paul Signature', 0, '', '', 'http://www.satyapaul.com/', '', '', '', '', '', '', ''),
(378, 'Sepia', 0, '', '', 'www.sepia.co.in', '', '', '', '', '', '', ''),
(379, 'Seven East', 0, '', '', 'https://www.facebook.com/pages/Seven-East/192171224139715', '', '', '', '', '', '', ''),
(380, 'Shaze', 0, '', '', 'http://shaze.in', '', '', '', '', '', '', ''),
(381, 'Sheetal', 0, '', '', 'www.sheetalindia.com', '', '', '', '', '', '', ''),
(382, 'Shoe Xpress', 0, '', '', '', '', '', '', '', '', '', ''),
(383, 'Shoppers Stop', 0, '', '', 'www.shoppersstop.com', '', '', '', '', '', '', ''),
(384, 'Sia', 0, '', '', 'www.siajewellery.com', '', '', '', '', '', '', ''),
(385, 'Simply Potatoes', 0, '', '', 'www.simplypotatoes.in', '', '', '', '', '', '', ''),
(386, 'Sisley', 0, '', '', 'www.sisley.com', '', '', '', '', '', '', ''),
(387, 'Skechers', 0, '', '', 'www.skechers.com', '', '', '', '', '', '', ''),
(388, 'Soch', 0, '', '', 'www.sochstudio.com', '', '', '', '', '', '', ''),
(389, 'Spencers', 0, '', '', 'www.spencersretail.com', '', '', '', '', '', '', ''),
(390, 'Splash Fashion 365', 0, '', '', 'www.splashfashions.com', '', '', '', '', '', '', ''),
(391, 'Splash Fashion 365', 0, '', '', 'http://www.splashfashions.com/', '', '', '', '', '', '', ''),
(392, 'Sport XS', 0, '', '', 'http://www.sportxsindia.com/', '', '', '', '', '', '', ''),
(393, 'Spykar', 0, '', '', 'www.spykar.com', '', '', '', '', '', '', ''),
(394, 'Stanza', 0, '', '', 'www.stanzaworld.com', '', '', '', '', '', '', ''),
(395, 'Steve Madden', 0, '', '', 'www.stevemadden.in', '', '', '', '', '', '', ''),
(396, 'StreetSoul', 0, '', '', 'deepstreetsoul.com', '', '', '', '', '', '', ''),
(397, 'Stuart Weitzman', 0, '', '', 'www.stuartweitzman.com', '', '', '', '', '', '', ''),
(398, 'Sukho Thai', 0, '', '', 'http://www.sukhothai.in/', '', '', '', '', '', '', ''),
(399, 'Sukho Thai', 0, '', '', 'www.sukhothai.com', '', '', '', '', '', '', ''),
(400, 'Sunglass Hut', 0, '', '', 'www.sunglasshut.com', '', '', '', '', '', '', ''),
(401, 'Sunglass Hut', 0, '', '', 'www.sunglass.com', '', '', '', '', '', '', ''),
(402, 'Sunglass Hut', 0, '', '', 'http://www.sunglasshut.com/', '', '', '', '', '', '', ''),
(403, 'Superdry', 0, '', '', 'www.superdry.com', '', '', '', '', '', '', ''),
(404, 'Swarovski', 0, '', '', 'http://www.swarovski.com/', '', '', '', '', '', '', ''),
(405, 'Swatch', 0, '', '', 'www.swatch.com', '', '', '', '', '', '', ''),
(406, 'Tanishq', 0, '', '', 'tanishq.co.in', '', '', '', '', '', '', ''),
(407, 'Tanishq', 0, '', '', 'www.tanishq.co.in', '', '', '', '', '', '', ''),
(408, 'Tara Jewellers', 0, '', '', 'tarajewellers.in', '', '', '', '', '', '', ''),
(409, 'The Body Shop', 0, '', '', 'www.thebodyshop.in', '', '', '', '', '', '', ''),
(410, 'The Collective', 0, '', '', 'www.thecollective.in', '', '', '', '', '', '', ''),
(411, 'The Nature''s Co.', 0, '', '', 'http://www.thenaturesco.com/', '', '', '', '', '', '', ''),
(412, 'The Nature''s Co.', 0, '', '', 'www.thenaturesco.com', '', '', '', '', '', '', ''),
(413, 'The Prime', 0, '', '', 'http://theprime.in/index.html', '', '', '', '', '', '', ''),
(414, 'The Raymond Shop', 0, '', '', 'www.raymondindia.com', '', '', '', '', '', '', ''),
(415, 'The Time Factory', 0, '', '', 'http://www.timexindia.com/', '', '', '', '', '', '', ''),
(416, 'Thomas Pink', 0, '', '', 'www.thomaspink.com', '', '', '', '', '', '', ''),
(417, 'Tie Rack', 0, '', '', 'http://www.genesiscolors.com/TieRack', '', '', '', '', '', '', ''),
(418, 'Timberland', 0, '', '', 'www.timberland.com', '', '', '', '', '', '', ''),
(419, 'Tip & Toe', 0, '', '', 'http://www.tipsandtoes.net.in/', '', '', '', '', '', '', ''),
(420, 'Tissot', 0, '', '', 'www.tissot.ch', '', '', '', '', '', '', ''),
(421, 'Titan Eye', 0, '', '', 'www.titaneyeplus.com', '', '', '', '', '', '', ''),
(422, 'Titan Studio', 0, '', '', 'www.titanworld.com', '', '', '', '', '', '', ''),
(423, 'Tomato', 0, '', '', '', '', '', '', '', '', '', ''),
(424, 'Tomato Spinach', 0, '', '', '', '', '', '', '', '', '', ''),
(425, 'Tommy Hilfiger', 0, '', '', 'www.tommy.com', '', '', '', '', '', '', ''),
(426, 'Tommy Hilfiger', 0, '', '', 'www.tommyhilfiger.com', '', '', '', '', '', '', ''),
(427, 'Tommy Hilfiger Childrens wear', 0, '', '', 'www.tommy.com', '', '', '', '', '', '', ''),
(428, 'Touristor', 0, '', '', 'http://touristor.in/', '', '', '', '', '', '', ''),
(429, 'Transforce', 0, '', '', 'www.transforce.com', '', '', '', '', '', '', ''),
(430, 'Tresmode', 0, '', '', 'www.tresmode.com', '', '', '', '', '', '', ''),
(431, 'Triumph', 0, '', '', 'www.triumph.com', '', '', '', '', '', '', ''),
(432, 'Tumi', 0, '', '', 'www.tumi.com', '', '', '', '', '', '', ''),
(433, 'Turtle', 0, '', '', 'theturtles.com', '', '', '', '', '', '', ''),
(434, 'Tvacha', 0, '', '', 'http://www.tvacha.com/', '', '', '', '', '', '', ''),
(435, 'U.S. Polo Assn', 0, '', '', 'www.uspoloassn.com', '', '', '', '', '', '', ''),
(436, 'U.S. Polo Kids', 0, '', '', 'http://www.uspoloassn.com/', '', '', '', '', '', '', ''),
(437, 'United Colors of Benetton', 0, '', '', 'www.benetton.com', '', '', '', '', '', '', ''),
(438, 'United Colors of Benetton Kids', 0, '', '', 'http://www.benetton.com/', '', '', '', '', '', '', ''),
(439, 'United Colors of Benetton Kids', 0, '', '', 'www.benetton.com/kids/', '', '', '', '', '', '', ''),
(440, 'Urban Yoga', 0, '', '', 'www.urbanyoga.in', '', '', '', '', '', '', ''),
(441, 'Urbana', 0, '', '', 'www.urbana.in', '', '', '', '', '', '', ''),
(442, 'Van Heusen', 0, '', '', 'www.vanheusenindia.com', '', '', '', '', '', '', ''),
(443, 'Vanilla Moon', 0, '', '', 'www.vanillamoon.co.in', '', '', '', '', '', '', ''),
(444, 'Vans', 0, '', '', 'www.vans.com', '', '', '', '', '', '', ''),
(445, 'Vero Moda', 0, '', '', 'www.veromoda.com', '', '', '', '', '', '', ''),
(446, 'Vero Moda', 0, '', '', 'http://www.veromoda.com/', '', '', '', '', '', '', ''),
(447, 'Viari', 0, '', '', '', '', '', '', '', '', '', ''),
(448, 'Vision World', 0, '', '', 'www.vwoptics.in', '', '', '', '', '', '', ''),
(449, 'VLCC', 0, '', '', 'www.vlccwellness.com', '', '', '', '', '', '', ''),
(450, 'W', 0, '', '', 'http://www.wforwoman.com/', '', '', '', '', '', '', ''),
(451, 'W', 0, '', '', 'www.wforwoman.com', '', '', '', '', '', '', ''),
(452, 'Watches and More', 0, '', '', 'www.watchesandmore.in', '', '', '', '', '', '', ''),
(453, 'Westside', 0, '', '', 'http://www.mywestside.com/', '', '', '', '', '', '', ''),
(454, 'Westside', 0, '', '', 'www.mywestside.com', '', '', '', '', '', '', ''),
(455, 'Wildcraft', 0, '', '', 'www.wildcraft.in', '', '', '', '', '', '', ''),
(456, 'William Penn', 0, '', '', 'http://williampenn.net', '', '', '', '', '', '', ''),
(457, 'William Penn', 0, '', '', 'https://www.williampenn.net', '', '', '', '', '', '', ''),
(458, 'Wills Lifestyle', 0, '', '', 'http://www.willslifestyle.com/', '', '', '', '', '', '', ''),
(459, 'Wills Lifestyle', 0, '', '', 'www.willslifestyle.com', '', '', '', '', '', '', ''),
(460, 'Woodland', 0, '', '', 'www.woodlandworldwide.com', '', '', '', '', '', '', ''),
(461, 'Woodland', 0, '', '', 'http://woodlandworldwide.com/', '', '', '', '', '', '', ''),
(462, 'Woodland', 0, '', '', 'woodlandworldwide.com', '', '', '', '', '', '', ''),
(463, 'World Of Titan', 0, '', '', 'www.titanworld.com', '', '', '', '', '', '', ''),
(464, 'World Of Titan', 0, '', '', 'http://titanworld.com/in/', '', '', '', '', '', '', ''),
(465, 'Wrangler', 0, '', '', 'www.wrangler.in', '', '', '', '', '', '', ''),
(466, 'Wrangler', 0, '', '', 'http://wrangler.in', '', '', '', '', '', '', ''),
(467, 'Wrangler', 0, '', '', 'www.wrangler.com', '', '', '', '', '', '', ''),
(468, 'You Shine', 0, '', '', 'http://www.youshine.in/', '', '', '', '', '', '', ''),
(469, 'Zara', 0, '', '', 'www.zara.com', '', '', '', '', '', '', ''),
(470, 'Zingrin', 0, '', '', 'https://www.facebook.com/pages/ZINGRIN/228673193874347', '', '', '', '', '', '', ''),
(471, 'Zodiac', 0, '', '', 'www.zodiaconline.com', '', '', '', '', '', '', ''),
(472, 'Zodiac', 0, '', '', 'www.zodiac.com', '', '', '', '', '', '', ''),
(473, 'Zuni', 0, '', '', 'www.zuni.in', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brandcategory`
--

CREATE TABLE IF NOT EXISTS `brandcategory` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=548 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brandcategory`
--

INSERT INTO `brandcategory` (`id`, `brandid`, `categoryid`) VALUES
(8, 16, 4),
(9, 16, 9),
(10, 16, 11),
(11, 16, 5),
(12, 16, 6),
(13, 16, 12),
(14, 16, 13),
(20, 18, 4),
(21, 18, 9),
(22, 18, 4),
(23, 18, 9),
(24, 18, 11),
(25, 18, 5),
(26, 18, 6),
(38, 30, 4),
(39, 30, 9),
(40, 30, 10),
(41, 30, 11),
(42, 30, 5),
(43, 30, 6),
(44, 31, 4),
(45, 31, 5),
(46, 31, 6),
(47, 31, 12),
(48, 32, 4),
(49, 32, 9),
(50, 32, 11),
(51, 32, 5),
(52, 32, 12),
(53, 32, 13),
(54, 32, 14),
(55, 32, 10),
(56, 32, 19),
(57, 32, 6),
(58, 32, 15),
(59, 33, 4),
(60, 33, 10),
(61, 33, 12),
(62, 33, 14),
(63, 34, 4),
(64, 34, 10),
(65, 34, 11),
(66, 34, 5),
(67, 34, 19),
(68, 34, 6),
(69, 34, 12),
(70, 34, 14),
(71, 34, 15),
(143, 35, 35),
(144, 35, 4),
(145, 35, 10),
(146, 35, 11),
(147, 35, 17),
(148, 35, 5),
(149, 35, 19),
(150, 35, 6),
(151, 35, 12),
(152, 35, 13),
(153, 35, 14),
(169, 36, 36),
(170, 36, 4),
(171, 36, 10),
(172, 36, 17),
(173, 36, 5),
(174, 36, 19),
(175, 36, 12),
(176, 36, 15),
(206, 39, 39),
(207, 39, 4),
(208, 39, 10),
(209, 39, 11),
(210, 39, 18),
(211, 39, 5),
(212, 39, 19),
(213, 39, 6),
(214, 39, 12),
(215, 39, 14),
(216, 39, 15),
(217, 39, 0),
(236, 40, 40),
(237, 40, 4),
(238, 40, 9),
(239, 40, 0),
(299, 3, 3),
(300, 3, 24),
(301, 3, 35),
(302, 3, 38),
(303, 3, 39),
(304, 3, 26),
(305, 3, 40),
(306, 3, 41),
(307, 3, 52),
(308, 3, 53),
(309, 3, 0),
(316, 1, 1),
(317, 1, 24),
(318, 1, 33),
(319, 1, 35),
(320, 1, 38),
(321, 1, 39),
(322, 1, 26),
(323, 1, 40),
(324, 1, 41),
(325, 1, 52),
(326, 1, 53),
(327, 1, 54),
(328, 1, 0),
(329, 2, 2),
(330, 2, 24),
(331, 2, 33),
(332, 2, 38),
(333, 2, 39),
(334, 2, 49),
(335, 2, 25),
(336, 2, 42),
(337, 2, 43),
(338, 2, 59),
(339, 2, 61),
(340, 2, 26),
(341, 2, 40),
(342, 2, 41),
(343, 2, 50),
(344, 2, 54),
(345, 2, 0),
(346, 38, 38),
(347, 38, 24),
(348, 38, 33),
(349, 38, 39),
(350, 38, 49),
(351, 38, 25),
(352, 38, 42),
(353, 38, 43),
(354, 38, 57),
(355, 38, 58),
(356, 38, 59),
(357, 38, 0),
(358, 42, 31),
(359, 42, 74),
(360, 42, 75),
(361, 42, 0),
(362, 43, 30),
(363, 43, 80),
(364, 43, 0),
(365, 44, 25),
(366, 44, 43),
(367, 44, 59),
(368, 44, 60),
(369, 44, 61),
(370, 44, 0),
(377, 46, 25),
(378, 46, 42),
(379, 46, 43),
(380, 46, 58),
(381, 46, 0),
(382, 47, 24),
(383, 47, 34),
(384, 47, 38),
(385, 47, 39),
(386, 47, 0),
(387, 48, 31),
(388, 48, 73),
(389, 48, 78),
(390, 48, 0),
(391, 49, 30),
(392, 49, 79),
(393, 49, 0),
(394, 50, 29),
(395, 50, 83),
(396, 50, 0),
(416, 51, 51),
(417, 51, 28),
(418, 51, 71),
(419, 51, 29),
(420, 51, 82),
(421, 51, 86),
(422, 51, 0),
(423, 52, 28),
(424, 52, 71),
(425, 52, 29),
(426, 52, 82),
(427, 52, 83),
(428, 52, 86),
(429, 52, 0),
(430, 53, 24),
(431, 53, 33),
(432, 53, 39),
(433, 53, 46),
(434, 53, 25),
(435, 53, 43),
(436, 53, 61),
(437, 53, 26),
(438, 53, 41),
(439, 53, 55),
(440, 53, 0),
(441, 54, 24),
(442, 54, 35),
(443, 54, 38),
(444, 54, 39),
(445, 54, 26),
(446, 54, 40),
(447, 54, 41),
(448, 54, 52),
(449, 54, 53),
(450, 54, 54),
(451, 54, 27),
(452, 54, 62),
(453, 54, 63),
(454, 54, 64),
(455, 54, 65),
(456, 54, 0),
(457, 55, 25),
(458, 55, 42),
(459, 55, 43),
(460, 55, 59),
(461, 55, 60),
(462, 55, 61),
(463, 55, 0),
(540, 45, 45),
(541, 45, 25),
(542, 45, 43),
(543, 45, 59),
(544, 45, 60),
(545, 45, 61),
(546, 45, 28),
(547, 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brandlike`
--

CREATE TABLE IF NOT EXISTS `brandlike` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brandlike`
--

INSERT INTO `brandlike` (`id`, `user`, `brand`, `like`) VALUES
(1, 1, 1, 1),
(39, 28, 3, 0),
(48, 0, 1, 0),
(97, 28, 1, 0),
(135, 28, 2, 1),
(165, 49, 1, 1),
(184, 50, 2, 1),
(185, 50, 1, 1),
(186, 49, 2, 0),
(187, 51, 2, 1),
(191, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`, `image`) VALUES
(24, 'Clothing', 0, 1, 'logo_(2)9.png'),
(25, 'Fashion Accessories', 0, 1, ''),
(26, 'Footwear', 0, 1, ''),
(27, 'Sports and Fitness', 0, 1, ''),
(28, 'Health and Beauty Care', 0, 1, ''),
(29, 'Kids', 0, 1, ''),
(30, 'Entertainment', 0, 1, ''),
(31, 'Jewellery', 0, 1, ''),
(32, 'Electronics and Accessories', 0, 1, ''),
(33, 'Casual Wear', 24, 1, ''),
(34, 'Formal Wear', 24, 1, ''),
(35, 'Sports Wear', 24, 1, ''),
(36, 'Traditional Wear', 24, 1, ''),
(37, 'Ethnic Wear', 24, 1, ''),
(38, 'Men', 24, 1, ''),
(39, 'Women', 24, 1, ''),
(40, 'Men', 26, 1, ''),
(41, 'Women', 26, 1, ''),
(42, 'Men', 25, 1, ''),
(43, 'Women', 25, 1, ''),
(44, 'Men', 28, 1, ''),
(45, 'Women', 28, 1, ''),
(46, 'Party Wear', 24, 1, ''),
(47, 'Sleep Wear', 24, 1, ''),
(48, 'Beach Wear', 24, 1, ''),
(49, 'Winter Wear', 24, 1, ''),
(50, 'Casual Wear', 26, 1, ''),
(51, 'Formal Wear', 26, 1, ''),
(52, 'Sports Wear', 26, 1, ''),
(53, 'Flip Flops', 26, 1, ''),
(54, 'Sandals', 26, 1, ''),
(55, 'Heels', 26, 1, ''),
(56, 'Ballerinas', 26, 1, ''),
(57, 'Watches', 25, 1, ''),
(58, 'Sunglasses', 25, 1, ''),
(59, 'Wallets', 25, 1, ''),
(60, 'Clutches', 25, 1, ''),
(61, 'Handbags', 25, 1, ''),
(62, 'Sports Wear', 27, 1, ''),
(63, 'Sports Gear', 27, 1, ''),
(64, 'Gym Gear', 27, 1, ''),
(65, 'Track Pants', 27, 1, ''),
(66, 'Skin Care', 28, 1, ''),
(67, 'Hair Care', 28, 1, ''),
(68, 'Body Care', 28, 1, ''),
(69, 'Bath and Spa', 28, 1, ''),
(70, 'Oral Care', 28, 1, ''),
(71, 'Maternity Care', 28, 1, ''),
(72, 'Women Hygiene', 28, 1, ''),
(73, 'Imitation Jewellery', 31, 1, ''),
(74, 'Diamonds', 31, 1, ''),
(75, 'Gold', 31, 1, ''),
(76, 'Platinum', 31, 1, ''),
(77, 'Silver', 31, 1, ''),
(78, 'Accessories', 31, 1, ''),
(79, 'Gaming Zone', 30, 1, ''),
(80, 'Movies', 30, 1, ''),
(81, 'Stand-Up Comedy', 30, 1, ''),
(82, 'Baby Care', 29, 1, ''),
(83, 'Clothing', 29, 1, ''),
(85, 'Footwear', 29, 1, ''),
(86, 'Infant Care', 29, 1, ''),
(87, 'Sports', 29, 1, ''),
(88, 'Games', 29, 1, ''),
(91, 'Mobiles', 32, 1, ''),
(92, 'Laptops', 32, 1, ''),
(93, 'Mobile Accessories', 32, 1, ''),
(94, 'Computer Accessories', 32, 1, ''),
(95, 'Televisions', 32, 1, ''),
(96, 'Home Appliances', 32, 1, ''),
(97, 'Kitchen Appliances', 32, 1, ''),
(98, 'Cameras', 32, 1, ''),
(99, 'Camera Accessories', 32, 1, ''),
(100, 'Audio and Video', 32, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `categorysubcategory`
--

CREATE TABLE IF NOT EXISTS `categorysubcategory` (
  `brandcategoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorysubcategory`
--

INSERT INTO `categorysubcategory` (`brandcategoryid`, `subcategoryid`) VALUES
(4, 1),
(4, 2),
(1, 2),
(3, 1),
(3, 3),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(7, 'Delhi NCR'),
(8, 'Hyderabad'),
(9, 'Kolkata'),
(10, 'Pune'),
(11, 'Ahmedabad'),
(12, 'Chennai'),
(13, 'Bangalore'),
(14, 'Mumbai '),
(15, 'Mumbai'),
(16, 'dadar'),
(17, '');

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE IF NOT EXISTS `eventlog` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `user`, `description`, `timestamp`) VALUES
(1, 1, 1, 'Event Created', '2014-05-12 10:46:24'),
(2, 1, 1, 'Event Edited', '2014-05-12 10:47:43'),
(3, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:19'),
(4, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:51'),
(5, 3, 3, 'Event Edited', '2014-08-08 08:45:13'),
(6, 3, 3, 'Mall Edited', '2014-08-08 08:47:08'),
(7, 3, 3, 'Mall Edited', '2014-08-08 08:47:32'),
(8, 3, 3, 'Mall Edited', '2014-08-08 08:52:55'),
(9, 3, 3, 'City Edited', '2014-08-08 10:00:26'),
(10, 3, 3, 'City Edited', '2014-08-08 10:01:10'),
(11, 4, 4, 'City Edited', '2014-08-08 10:03:23'),
(12, 8, 8, 'City Edited', '2014-08-09 05:28:14'),
(13, 8, 8, 'Location Edited', '2014-08-09 05:30:25'),
(14, 4, 4, 'Location Edited', '2014-08-09 05:30:40'),
(15, 11, 11, 'Location Edited', '2014-08-09 05:49:23'),
(16, 8, 8, 'Location Edited', '2014-08-09 05:50:01'),
(17, 3, 3, 'Brand Edited', '2014-08-09 06:32:06'),
(18, 3, 3, 'Brand Edited', '2014-08-09 06:32:26'),
(19, 3, 3, 'Brand Edited', '2014-08-09 09:57:03'),
(20, 8, 8, 'Location Edited', '2014-08-11 05:14:59'),
(21, 1, 1, 'Mall Edited', '2014-08-11 09:52:00'),
(22, 32, 32, 'Brand Edited', '2014-08-19 05:28:20'),
(23, 32, 32, 'Brand Edited', '2014-08-19 05:28:55'),
(24, 1, 1, 'City Edited', '2014-08-21 08:34:32'),
(25, 12, 12, 'Location Edited', '2014-08-21 08:36:11'),
(26, 2, 2, 'Mall Edited', '2014-08-21 10:40:28'),
(27, 2, 2, 'Mall Edited', '2014-08-21 10:40:59'),
(28, 4, 4, 'Mall Edited', '2014-08-21 11:45:56'),
(29, 4, 4, 'Mall Edited', '2014-08-21 11:46:36'),
(30, 4, 4, 'Mall Edited', '2014-08-21 11:47:39'),
(31, 4, 4, 'Mall Edited', '2014-08-21 11:47:55'),
(32, 4, 4, 'Mall Edited', '2014-08-21 11:48:19'),
(33, 13, 13, 'Location Edited', '2014-08-21 12:12:46'),
(34, 13, 13, 'Location Edited', '2014-08-21 12:13:09'),
(35, 8, 8, 'Location Edited', '2014-08-22 05:52:40'),
(36, 7, 7, 'City Edited', '2014-10-14 14:33:27'),
(37, 0, 0, 'Mall Edited', '2014-10-17 11:44:25'),
(38, 121, 121, 'Mall Edited', '2014-10-17 11:47:26'),
(39, 121, 121, 'Mall Edited', '2014-10-17 12:00:17'),
(40, 0, 0, 'Mall Edited', '2014-11-19 13:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `id` int(11) NOT NULL,
  `floorno` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `floorno`) VALUES
(1, 'Lower Ground Floor'),
(2, 'Upper Ground Floor'),
(3, 'Ground Floor'),
(4, 'First Floor'),
(5, 'Second Floor'),
(6, 'Third Floor'),
(7, 'Fourth Floor'),
(8, 'Fifth Floor'),
(9, 'Sixth Floor'),
(10, 'Seventh Floor'),
(11, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `imagegallery`
--

CREATE TABLE IF NOT EXISTS `imagegallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brandid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagegallery`
--

INSERT INTO `imagegallery` (`id`, `image`, `description`, `brandid`, `storeid`, `like`) VALUES
(5, 'logo1.png', 'cdcsdc', 1, 0, 0),
(7, 'left96.png', 'scasdca', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pincode` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `cityid`, `name`, `pincode`) VALUES
(1, 4, 'east', 0),
(2, 2, 'west', 0),
(4, 4, 'avi1', 0),
(7, 4, 'demo', 0),
(8, 4, 'abcdef', 0),
(9, 2, 'abcdefg', 0),
(10, 4, 'bandra', 0),
(11, 1, 'Dadar1', 0),
(12, 1, 'Ghatkopar (west)', 0),
(13, 4, 'test123', 410200),
(14, 4, 'demo', 123),
(15, 4, 'abcdmmm', 1234567),
(16, 5, 'wwweeesssttt', 0),
(17, 14, 'Kurla (west)', 0),
(18, 14, 'Thane (west)', 0),
(19, 14, 'Vashi', 0),
(20, 14, 'Malad (west),  Goregaon (west)', 0),
(21, 14, 'Malad (west)', 0),
(22, 14, 'Goregaon (east)', 0),
(23, 14, 'Lower Parel (west)', 0),
(24, 14, 'Bhandup (west)', 0),
(25, 14, 'Kandivali (east)', 0),
(26, 14, 'Andheri (west)', 0),
(27, 14, 'Nariman Point', 0),
(28, 14, 'Worli', 0),
(29, 11, 'Vastrapur', 0),
(30, 11, 'SG Road', 0),
(31, 11, 'Motera', 0),
(32, 11, 'Satellite', 0),
(33, 13, 'Koramangala', 0),
(34, 13, 'Magrath Road', 0),
(35, 13, 'Whitefield', 0),
(36, 13, 'Malleswaram', 0),
(37, 13, 'Brigade Gateway', 0),
(38, 13, 'Vittal Mallya Road', 0),
(39, 7, 'Gurgaon', 0),
(40, 7, 'Vasant Kunj', 0),
(41, 7, 'Andrews Ganj', 0),
(42, 7, 'Palam Vihar', 0),
(43, 7, 'Rajouri Garden', 0),
(44, 7, 'Saket', 0),
(45, 7, 'Kirti Nagar', 0),
(46, 7, 'Subhash Nagar', 0),
(47, 7, 'Sector 38, Noida', 0),
(48, 8, 'Somajiguda', 0),
(49, 8, 'Banjara Hills', 0),
(50, 8, 'Punjagutta Road', 0),
(51, 8, 'Madhapur', 0),
(52, 9, 'Howrah', 0),
(53, 9, 'Newtown', 0),
(54, 9, 'Salt Lake City', 0),
(55, 9, 'Bhowanipore', 0),
(56, 9, 'Kankurgachi', 0),
(57, 9, 'Hiland Park', 0),
(58, 9, 'Park Circus', 0),
(59, 9, 'Prince Anwar Shah Road', 0),
(60, 10, 'Viman Nagar', 0),
(61, 12, 'Anna Salai', 0),
(62, 12, 'Royapettah', 0),
(63, 12, 'Velachery', 0),
(64, 12, 'Vadapalani', 0),
(65, 12, 'Mylapore', 0),
(66, 10, 'Wadgaon Sheri', 0),
(67, 17, '', 0),
(68, 14, 'Thane ', 0),
(69, 14, 'Lower Parel ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mall`
--

CREATE TABLE IF NOT EXISTS `mall` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `location` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `contactno` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parkingfacility` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cinema` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cinemaoffer` varchar(255) CHARACTER SET latin1 NOT NULL,
  `restaurant` varchar(255) CHARACTER SET latin1 NOT NULL,
  `entertainment` varchar(255) CHARACTER SET latin1 NOT NULL,
  `website` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `specialoffers` text CHARACTER SET latin1 NOT NULL,
  `events` text CHARACTER SET latin1 NOT NULL,
  `facebookpage` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pininterest` varchar(255) CHARACTER SET latin1 NOT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 NOT NULL,
  `twitterpage` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall`
--

INSERT INTO `mall` (`id`, `name`, `address`, `location`, `latitude`, `longitude`, `contactno`, `parkingfacility`, `cinema`, `cinemaoffer`, `restaurant`, `entertainment`, `website`, `email`, `logo`, `description`, `specialoffers`, `events`, `facebookpage`, `pininterest`, `instagram`, `twitterpage`, `city`) VALUES
(119, 'R City Mall', 'R City Mall, Lal Bahadur Shastri Road, Ghatkopar (West), Mumbai - 400086', 12, 19.0991064, 72.9172897, '022-67755833?', 'Yes', 'Big Cinema', '', 'Food Court,Shvatra, Quattro, Punjab Grill, Rolling Pin, Mainland China, Cream Centre, Balaji, Indigo Deli, Dwarkadheesh, Five Fat Monks, Starbucks Coffee, Pico Express, Banana Leaf, Maroosh, Mamagoto, McDonalds, Sbarro, TGIF, The United-Sports Bar and Gri', '6D Theatre, Jammin - Family Entertainment Centre, Bowling Alley, Horror House, Kidzania', 'www.rcity.co.in', 'info@rcity.runwal.com', '', 'The newest and most diverse shopping destination in Mumbai, this 12 lakh square feet mammoth shopping centre is one-of-its-kind with a multi-level retail galleria that balances a steady mix of the finest local brands and top-notch international brands. The sprawling multilevel parking, five-level atrium and first-of-its-kind nine-screen multiplex will provide the most vibrant experience to shopping enthusiasts from all walks of life.', '', '', '', '', '', '', 14),
(120, 'Phoenix Marketcity', 'Phoenix Marketcity, L.B.S. Marg, Kurla (West), Mumbai ? 400070', 17, 19.0851093, 72.887154, '022-61801011', 'Yes', 'PVR Cinemas', '', 'Food Court, Rajdhani, Patchi, Mad Over Donuts, CCD, Golden Tips, Pizza Hut, Costa Coffee, Choko La, Caf? Royal, Cream Centre, Di Bella Coffee, Rain Forest, Chocolate Temptations, Grillopolis, Cookie Man, Hokey Pokey, Mai Tai, Zaika, Ice Cream Works, Moti ', 'Amoeba, Funzone 2, Scary House, Snow World, Storm 5D, Time Zone', 'www.phoenixmarketcitymumbai.com', 'Marketing.mumbai@phoenixmarketcity.in', '', 'Phoenix Marketcity, a highly admired shopping mall in Mumbai, brings to you a merry-go-round of fun, food and some grand shopping. Categories of shops at Phoenix Marketcity include Bags, Footwear, Books, Cards, Music & Stationery, Electronics, Gifts & Crafts, Chocolates, Confectionary & Ice Cream, Cosmetics & Perfumes, Domestic and International Fashion for Men, Women and Children, Health, Beauty, Sports, Fitness, Department Store, Eye Wear, Home & Lifestyle, Speciality Store, Travel & Luggage, Watches, Jewellery and more. They also have over 44 restaurants, caf?s and fast food centres for the food lovers with a range of Indian, Chinese, Continental, Italian and more cuisines. In Entertainment, check out PVR Cinemas, Timezone, Snow World, Funzone, Storm India 5D and Scary House among others! So here is your chance to spend the entire day with family or friends and having a memorable time!', '', '', '', '', '', '', 14),
(121, 'Viviana Mall', 'Viviana Mall, Opp. Eastern Express Highway, Next to Jupiter Hospital, Eastern Express Highway, Laxmi Nagar, Thane West, Thane-400606', 18, 19.208338, 72.971202, '', 'Yes', 'Cinepolis', '0', 'Food Court, Copper Chimney, The Yellow Chilli, Alfredo''s, JugHeads, Cream Centre, Mainland China, Stir Crazy, Pizza Express, Rajdhani, Grilla!, Banana Leaf, Yoko Sizzlers, British Brewing Company, The Beer Caf?, The United - Sports Bar and Grill', 'Funcity, Game 4 U, 7D Adventures', 'www.vivacitymalls.com', 'info@vivianamalls.com', '', 'a', '', '', '', '', '', '', 14),
(122, 'Inorbit Mall', 'Inorbit Mall Sector 30A, Vashi, Navi Mumbai - 400 705', 19, 19.066108, 73.000969, '022-67777614', 'Yes', '', '', 'Food Court, CCD, Starbucks, Moshe''s, Garden Court, Pizza Hut', 'Timezone', 'www.inorbit.in', 'info.vashi@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(123, 'Inorbit Mall', 'Inobit Mall , Malad Link Road, Malad (w) Mumbai - 400 064', 20, 19.173237, 72.835365, '022-66777999', 'Yes', 'Inox', '', 'Food Court, Costa Coffee, CCD, Indigo Deli, Maharaja Bhog, Pizza Hut, Spaghetti Kitchen, The Pint Room', 'Timezone', 'www.inorbit.in', 'info.malad@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(124, 'Infiniti Mall', 'Infinity Mall 2,Link Rd, , Mindspace, Malad (west), Mumbai - 400064', 21, 19.185112, 72.83406, '022-61955555', 'Yes', 'Cinemax', '', 'Food Court, California Pizza Kitchen, Mainland China, Zaffra, Bombay Blue, Panchvati Gaurav, KFC, 30ml Liquid Lounge, Manchester United Caf? Bar', 'Planet Infiniti', 'www.infinitimall.com', '', '', '', '', '', '', '', '', '', 14),
(125, 'Oberoi Mall', 'Oberoi Mall, Dindoshi, Goregaon (East), Mumbai - 400063', 22, 19.173824, 72.860555, '022-40990824', 'Yes', 'PVR Cinemas', '', 'Food Court, CCD, Starbucks, Gloria Jeans Coffee, British Brewing Company, Maharaja Bhog, Pizza Hut, Cream Centre, Copper Chimney, Caf? Moshe''s, Mainland China', 'Funcity, West plaza, Kids Creche', 'www.oberoimall.com/', 'info@oberoimall.com', '', '', '', '', '', '', '', '', 14),
(126, 'High Street Phoenix', 'High Street Phoenix, The Phoenix Mills Limited, 462, Senapati Bapat Marg, Lower Parel (West), Mumbai - 400 013?', 23, 18.99469, 72.824596, '022-43339994', 'Yes', 'PVR Cinemas', '', 'Asia 7, Bombay Blue, Caf? Moshe''s, California Pizza Kitchen, Coffee Bean & Tea Leaf, Copper Chimney, Costa Coffee, Cream Centre, Domino''s, Gajalee, Gelato Italiano, Haagen-Dazs, Indigo Deli, Mad Over Donuts, MaiTai, Manchester United Caf? Bar, Maroosh, Mc', 'Orama Carnival Street', 'www.highstreetphoenix.com', '', '', '', '', '', '', '', '', '', 14),
(127, 'Neptune Magnet Mall', 'Neptune Magnet Mall, Lower Powai, L.B.S. Marg,?Bhandup (West), Mumbai - 400 078', 24, 19.141651, 72.931148, '022-67421878', 'Yes', 'Cinepolis', '', 'Golden Star Thali, Khiva, McDonald''s, Asian Wok, Mughal Darbar, Banana Leaf, Cream Centre, Moti Mahal, Pizza Hut, Food Court', 'Mancini, Get Lost, Game4u, 4D', 'www.magnetmall.in', '', '', 'Developed by Neptune Group, a company known to have almost an intuition for accurately knowing what their customers desire and providing it. The Mall personifies their philosophy to bring value to the lives of their customers and brings many entertaining wonders for the first time in India; like a 6 screen multiplex, 2 level food court, a family entertainment zone, to mention a few.', '', '', '', '', '', '', 14),
(128, 'Korum Mall Thane', 'Korum Mall, Mangal Pandey Road, Near Cadbury Compound, Eastern Express Highway, Thane (West) - 400 606', 18, 19.203132, 72.965143, '022-41444444', 'Yes', 'Inox', '', 'Caf? Coffee Day, Starbucks, Food Court, Costa Caf?, Timbuctoo, Pop Tates, Urban Tadka, Zaffran, Indiana Waters', 'Timezone, Bowling', 'www.korum.in', 'korum@korum.in', '', 'With best retail mix of 130+ National & international brands, Korum offers a 360 degree mall experience in Shopping, entertainment, lifestyle & dining. More than 30 thoughtful and sensible services, and 270+ days of marketing events, further enhance the shopping experience.', '', '', '', '', '', '', 14),
(129, 'Growels 101 Mall', 'Akurli Rd, Off.Western Express Highway, Kandivali East, Mumbai, Maharashtra 400101', 25, 19.203321, 72.859505, '022-66993402', 'Yes', 'Cinemax', '', 'Food Court, Zaffran, Balaji, McDonald''s', '', 'www.growels101.com/', 'marketing@growel.com', '', 'Growel?s 101 strategically located in the western suburbs ( Kandivli ) has an ideal mix of fashion, retail, hypermarket, consumer durables, department stores, white goods, books, health & beauty, family entertainment centres, fine dining restaurants, food court, and a 4 screen multiplex. The mall is anchored by prominent retailers such as Mc Donald?s, Pantaloons, Big Bazaar, Cinemax and E Zone amongst other international and national retailers.', '', '', '', '', '', '', 14),
(130, 'Infiniti Mall', 'Infiniti Mall, New Link Road, Oshiwara, Andheri West, Mumbai- 400053', 26, 19.141295, 72.830681, '022-61319191', 'Yes', 'Cinemax', '', 'Panchavati Gaurav, TGIF, Food Court', 'Gamezone', 'www.infinitimall.com', 'gm.andheri@infinitimall.com', '', '', '', '', '', '', '', '', 14),
(131, 'Crossroad 2', 'A/240, Barrister Rajni Patel Road, Nariman Point, Mumbai - 400021', 27, 18.926537, 72.822597, '022-66548907', 'Yes', 'Inox', '', 'Ristorante Prego, Subway, The Coffee Bean & Tea Leaf, Spaghetti Kitchen, Paninaro, Spoon, Swati, Not Just Dosa, Bombay Blue Express, Simply Sizzlers, Hot''wich, Moti Mahal Delux, Kabab Company, Pastelitos, China Town, Brownie Cottage, Gelato Italiano, Bubb', '', '', '', '', '', '', '', '', '', '', '', 14),
(133, 'Alpha One Mall', 'AlphaOne Ahmedabad,Plot No-216,T.P Scheme-1, Near VastrapurLake, Vastrapur, Ahmedabad 380006', 29, 23.040102, 72.531496, '079-40193662', 'Yes', 'Cinepolis', '', '', '', 'http://www.alphaoneahmedabad.com/', '', '', '', '', '', '', '', '', '', 11),
(134, 'Iscon Mega Mall', 'Iscon Mega Mall, Near Iskcon Temple, SG Highway,Bodakdev, Ahmedabad, Gujarat 380054', 30, 23.030495, 72.507905, '079-40040282', 'Yes', '', '', '', '', 'http://isconmegamall.com/', 'ahmedabadmall@iscongroup.com', '', '', '', '', '', '', '', '', 11),
(135, '4D Square Mall', '4D Square Mall, Near Sangat Mall, Visat Gandhinagar Highway, Kalol Rd, Chandkheda, Motera, Ahmedabad, Gujarat 382424', 31, 23.103037, 72.595641, '', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 11),
(136, 'Gulmohar Park Mall', 'Gulmohar Park Mall, Satellite Road, Satellite, Ahmedabad, Gujarat - 380015', 32, 23.026551, 72.509847, '079-30425800?', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 11),
(137, 'The Forum Mall', 'Forum Mall, 21, Hosur Rd, Koramangala, Bengaluru, Karnataka 560095', 33, 12.934459, 77.611341, '080-22067752', 'Yes', 'PVR Cinemas', '', '', '', 'http://www.theforumexperience.com/', 'ccare@theforumexperience.com', '', '', '', '', '', '', '', '', 13),
(138, 'Garuda Mall', 'Garuda Mall, 15, Magrath Rd, Ashok Nagar, Bengaluru, Karnataka 560025', 34, 12.97006, 77.609783, '080-40698857', 'Yes', 'Inox', '', '', '', 'http://garudamall.in/', 'customerservice@garudamall.net', '', '', '', '', '', '', '', '', 13),
(139, 'Inorbit Mall', 'Inorbit Mall,  No 75, 8th Road, EPIP Zone, Whitefield, Bengaluru, Karnataka 560066', 35, 12.979497, 77.728692, '080-67280000', 'Yes', '', '', '', '', 'http://inorbit.in/whitefield/', 'info.whitefield@inorbit.in', '', '', '', '', '', '', '', '', 13),
(140, 'Mantri Square Mall', 'Mantri Square, No 1, Malleshwaram, Sampige Road, Jai Bheema Nagar, Sampangiram Nagar, Bangalore, Karnataka 560003', 36, 12.991923, 77.570897, '080-30160001', 'Yes', '', '', '', '', 'http://www.mantrisquare.com/', 'infodesk@mantrisquare.com', '', '', '', '', '', '', '', '', 13),
(141, 'Orion Mall', 'Orion Mall, Brigade Gateway, 26/1 Dr. Rajkumar Road, Malleshwaram West, Bangalore - 560055', 37, 13.010986, 77.555018, '080-67282222', 'Yes', '', '', '', '', 'http://orionmalls.com/', 'feedback@orionmalls.com', '', '', '', '', '', '', '', '', 13),
(142, 'Park Square Mall', 'Park Square Mall, ITPL Main Rd, Pattandur Agrahara, Whitefield, Bengaluru, Karnataka 560066', 35, 12.986858, 77.736409, '080-41880888', 'Yes', '', '', '', '', '', 'parksquare@ascendas.com', '', '', '', '', '', '', '', '', 13),
(143, 'Phoenix Marketcity', 'Phoenix Marketcity, 1st Floor, 106/107, Whitefield Road, Devasandra Industrial Estate, K.R Puram, Bangalore, Karnataka 560048', 35, 12.996959, 77.696228, '080?67266111', 'Yes', '', '', '', '', 'http://phoenixmarketcitybangalore.com/', '', '', '', '', '', '', '', '', '', 13),
(144, 'The Collection UB City', 'UB City, 24, Vittal Mallya Road, KG Halli, Shanthala Nagar, Ashok Nagar, Bengaluru, Karnataka 560001', 38, 12.971502, 77.595985, '080-22711488', '', '', '', '', '', 'http://www.ubcitybangalore.in/', '', '', '', '', '', '', '', '', '', 13),
(145, 'The Forum Value Mall', 'The Forum Value Mall, 62, Whitefield Main Rd, Whitefield, Bangalore, Karnataka 560066', 35, 12.959629, 77.747971, '080-25043700', '', '', '', '', '', 'http://www.forumvaluemall.com/', 'infodesk.fvm@crpmm.com', '', '', '', '', '', '', '', '', 13),
(146, 'Total Shopping Mall', 'Total Shopping Mall, Hosur Rd, Koramangala 2B Block, Koramangala, Bengaluru, Karnataka 560034', 33, 12.921909, 77.620296, '080-41559299', '', '', '', '', '', 'http://www.totalsuperstore.com/', '', '', '', '', '', '', '', '', '', 13),
(147, 'Ambience Mall', 'Ambience Mall, National Highway 8, Ambience Island, Gurgaon, Haryana 122001', 39, 28.503883, 77.097273, '7859824869', '', '', '', '', '', 'http://www.ambiencemalls.com/', '', '', '', '', '', '', '', '', '', 7),
(148, 'Ambience Mall Vasant Kunj', 'Ambience Mall Vasant Kunj, 2, Nelson Mandela Marg, Vasant Kunj, New Delhi, DL 110070', 40, 28.541221, 77.154967, '011-40870064', '', '', '', '', '', 'http://www.ambiencemalls.com/', '', '', '', '', '', '', '', '', '', 7),
(149, 'Ansal Plaza', 'Ansal Plaza, August Kranti Marg, Hudco Place, Andrews Ganj, New Delhi, DL 110049', 41, 28.562743, 77.224429, '011-26250957', '', '', '', '', '', 'http://www.ansalplaza.in/delhi/index.aspx?mid=7', '', '', '', '', '', '', '', '', '', 7),
(150, 'Ansal Plaza Gurgaon', 'Ansal Plaza, Sector 23, Palam Vihar, Gurgaon, Haryana 122017', 42, 28.516024, 77.04459, '0124-2360762', '', '', '', '', '', 'http://ansalplaza.in/Palam_Vihar/index.aspx?mid=11', '', '', '', '', '', '', '', '', '', 7),
(151, 'City Square Mall', 'City Square Mall, Najafgarh Rd, Rajouri Garden, New Delhi, DL', 43, 28.650267, 77.12327, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7),
(152, 'DLF Emporio', 'DLF Emporio, 4, Nelson Mandela Road, Vasant Kunj II,, Vasant Kunj, New Delhi, Delhi 110070', 40, 28.543467, 77.156693, '011-46116666', '', '', '', '', '', 'http://www.dlfemporio.com/', 'dlfemporio@dlf.in', '', '', '', '', '', '', '', '', 7),
(153, 'DLF Place', 'DLF Place, A4, Saket District Centre, Press Enclave Road, Saket, New Delhi, Delhi 110017', 44, 28.528156, 77.216676, '011-46064444', '', '', '', '', '', 'http://dlfplace.in/', '', '', '', '', '', '', '', '', '', 7),
(154, 'DLF Promenade', 'DLF Promenade, # 3, Nelson Mandela Road, Vasant Kunj Malls, Vasant Kunj II, New Delhi, Delhi 110070', 40, 28.542599, 77.155741, '011-46104466 ', '', '', '', '', '', 'http://dlfpromenade.com/', 'dlfpromenade@dlf.in', '', '', '', '', '', '', '', '', 7),
(155, 'MGF Metropolitan Mall', 'MGF Metropolitan Mall, A-2,Press Enclave Marg, District Centre, Saket, New Delhi, DL 110017', 44, 28.529572, 77.220171, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7),
(156, 'MGF Metropolitan Mall', 'MGF Metropolitan Mall, Mehrauli-Gurgaon Rd, Heritage City, Sector 25, Gurgaon, Haryana 122001', 39, 28.480102, 77.080372, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7),
(157, 'Moments Mall', 'Moments Mall, Patel Road, Next to Kirti Nagar Metro Station, New Delhi ? 110015', 45, 28.657056, 77.146458, '011-41531111', '', '', '', '', '', 'http://www.momentsmall.com/', 'info@momentsmall.com', '', '', '', '', '', '', '', '', 7),
(158, 'Pacific Mall', 'Pacific Mall, Najafgarh Road, Tagore Garden, New Delh, DL 110018', 46, 28.642551, 77.106141, '011-40903000', '', '', '', '', '', 'http://www.shoppacific.in/area.htm', '', '', '', '', '', '', '', '', '', 7),
(159, 'Select Citywalk Mall', 'Select Citywalk Mall, A-3m District Centre Saket, Sector 6, Pushp Vihar, New Delhi, DL 110017', 44, 28.528282, 77.218303, '011-42114211', '', '', '', '', '', 'http://www.selectcitywalk.com/', 'contact@selectcitywalk.com', '', '', '', '', '', '', '', '', 7),
(160, 'TDI Mall', 'TDI Mall, Plot No.11, Shivaji Place Complex, Vishal Cinema Rd, Block A, Rajouri Garden, Tagore Garden, New Delhi, DL', 43, 28.650824, 77.120725, '011-49133333', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7),
(161, 'The Great India Place', 'The Great India Place, Plot No. A-2, Sector-38-A, Noida, Uttar Pradesh 201301', 47, 28.567512, 77.325943, '0120-4650000', '', '', '', '', '', 'http://www.thegreatindiaplace.in/', 'info@thegreatindiaplace.in', '', '', '', '', '', '', '', '', 7),
(162, 'Amrutha Mall', 'Amrutha Mall, Somajiguda Circle, Somajiguda, Hyderabad, Telangana 500082', 48, 17.428896, 78.455946, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 8),
(163, 'City Centre Mall', 'City Centre Mall, Road Number 1, Zehra Nagar, Banjara Hills, Hyderabad, Telangana 500034', 49, 17.415174, 78.449023, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 8),
(164, 'Hyderabad Central Mall', 'Hyderabad Central, Municpal Number 6-3-673,674,674/1, Punjagutta Cross Road, Punjagutta, Hyderabad, Telangana 500082', 50, 17.42669, 78.453112, '040-66430000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 8),
(165, 'Inorbit Mall', 'Inorbit Mall, APIIC Software Layout, Mindspace, Madhapur, Hyderabad, Telangana 500081', 51, 17.43433, 78.386911, '040-44880000', '', '', '', '', '', 'http://inorbit.in/', 'info.cyberabad@inorbit.in', '', '', '', '', '', '', '', '', 8),
(166, 'Avani Riverside Mall', 'Avani Riverside Mall, 32, Jagat Banerjee Ghat Rd, Howrah, West Bengal 711102', 52, 22.563346, 88.323779, '033-33129000', '', '', '', '', '', 'http://www.avaniriversidemall.com/', '', '', '', '', '', '', '', '', '', 9),
(167, 'Axis Mall', 'Axis Mall, Plot No. CF9, Major Arterial Rd, Action Area 1C, Rajarhat Newtown, Kolkata, West Bengal 700156', 53, 22.57943, 88.459777, '033-32006827', '', '', '', '', '', 'http://www.bengalpeerless.com/axis/', 'axiskolkata@bengalpeerless.com', '', '', '', '', '', '', '', '', 9),
(168, 'City Centre Mall', 'City Centre, Sector-1, Block DC, Salt Lake City, Kolkata, West Bengal 700064', 54, 22.588141, 88.408343, '033-23581011', '', '', '', '', '', 'http://saltlake.citycentremalls.in/', '', '', '', '', '', '', '', '', '', 9),
(169, 'City Centre mall', 'City Centre New Town, IID/5, JL No.-11, Action Area, Mouza Nowapara, Rajarhat, Kolkata, West Bengal 700157', 53, 22.622769, 88.450278, '033-25266000', '', '', '', '', '', 'http://newtown.citycentremalls.in/', '', '', '', '', '', '', '', '', '', 9),
(170, 'Forum Mall', 'Forum Mall, 10/3, Lala Lajpat Rai Sarani, Sreepally, Bhowanipore, Kolkata, West Bengal', 55, 22.538207, 88.351251, '033-22836022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 9),
(171, 'Mani Square Mall', 'Mani Square Mall, Eastern Metropolitan Bypass, Kankurgachi, Kolkata, West Bengal 700054', 56, 22.577706, 88.400863, '033-23201878', '', '', '', '', '', 'http://www.manisquaremall.com/', '?mallcustomercare@mani-group.com', '', '', '', '', '', '', '', '', 9),
(172, 'Metropolis Mall ', 'Metropolis Mall, Eastern Metropolitan Bypass, Hiland Park, Chakgaria, Kolkata, West Bengal 700075', 57, 22.483221, 88.390673, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 9),
(173, 'Quest Mall', 'Quest Mall, Syed Amir Ali Ave, Park Circus, Beck Bagan, Ballygunge, Kolkata, West Bengal 700017', 58, 22.539305, 88.365729, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 9),
(174, 'South City Mall', 'South City Mall, Prince Anwar Shah Rd, South City, South City Complex, Jadavpur, Kolkata, West Bengal 700068', 59, 22.50144, 88.361746, '', '', '', '', '', '', 'http://southcitymall.in/', '', '', '', '', '', '', '', '', '', 9),
(175, 'Phoenix Marketcity', 'Phoenix Market City Pune, S No. 207, Viman Nagar Road, Pune Nagar Road Highway, Pune, Maharashtra 411014', 60, 18.562288, 73.916869, '020-33444444', '', '', '', '', '', 'http://www.phoenixmarketcitypune.com/', 'infopune@marketcity.in', '', '', '', '', '', '', '', '', 10),
(176, 'Ramee Mall', 'Ramee Mall, 365, Annai Salai, Poes Road, Subbarayan Nagar, Teynampet, Chennai, Tamil Nadu 600018', 61, 13.042912, 80.248398, '044-32453987', '', '', '', '', '', 'http://www.rameemall.com', 'admin@rameemall .com', '', '', '', '', '', '', '', '', 12),
(177, 'Express Avenue', 'Express Avenue, Plot No.213, Whites Road, Royapettah, Chennai, Tamil Nadu 600014', 62, 13.058702, 80.264064, '044-28464656', '', '', '', '', '', 'http://expressavenue.in/', '', '', '', '', '', '', '', '', '', 12),
(178, 'Phoenix Marketcity', 'Phoenix Marketcity, 142, Velachery Main Road, Near Gurunanak College, Velachery, Chennai, Tamil Nadu 600042', 63, 12.991242, 80.216447, '044-30083008', '', '', '', '', '', 'http://www.phoenixmarketcitychennai.com/', 'infochennai@phoenixmarketcity.in', '', '', '', '', '', '', '', '', 12),
(179, 'The Forum Vijaya Mall', 'The Forum Vijaya Mall, #183, NSK Salai, Arcot Road, Vadapalani, Chennai - 600 026.', 64, 13.050583, 80.209571, '044-49049000', '', '', '', '', '', 'http://www.theforumvijayamallchennai.com/index.php', 'feedback@theforumvijayamallchennai.com', '', '', '', '', '', '', '', '', 12),
(180, 'Chennai City Centre', 'Chennai City Centre, Mylapore, Chennai, Tamil Nadu', 65, 13.043319, 80.27382, '9882737392', '', '', '', '', '', 'http://chennaiciticenter.com/', '', '', '', '', '', '', '', '', '', 12),
(181, 'Inorbit Mall', 'Inorbit Mall Pune, Opp CTR Factory, wadgaon Sheri, Pune Nagar Road, Pune ? 411014', 66, 18.560361, 73.920568, '020-66878600', '', '', '', '', '', 'http://inorbit.in/pune/', 'info.pune@inorbit.in', '', '', '', '', '', '', '', '', 10),
(182, 'csv3', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(183, 'R City Mall', 'R City Mall, Lal Bahadur Shastri Road, Ghatkopar (West), Mumbai - 400086', 12, 19.0991064, 72.9172897, '022-67755833?', 'Yes', 'Big Cinema', '', 'Food Court,Shvatra, Quattro, Punjab Grill, Rolling Pin, Mainland China, Cream Centre, Balaji, Indigo Deli, Dwarkadheesh, Five Fat Monks, Starbucks Coffee, Pico Express, Banana Leaf, Maroosh, Mamagoto, McDonalds, Sbarro, TGIF, The United-Sports Bar and Gri', '6D Theatre, Jammin - Family Entertainment Centre, Bowling Alley, Horror House, Kidzania', 'www.rcity.co.in', 'info@rcity.runwal.com', '', 'The newest and most diverse shopping destination in Mumbai, this 12 lakh square feet mammoth shopping centre is one-of-its-kind with a multi-level retail galleria that balances a steady mix of the finest local brands and top-notch international brands. The sprawling multilevel parking, five-level atrium and first-of-its-kind nine-screen multiplex will provide the most vibrant experience to shopping enthusiasts from all walks of life.', '', '', '', '', '', '', 14),
(184, 'Phoenix Market City ', 'Phoenix Marketcity, L.B.S. Marg, Kurla (West), Mumbai ? 400070', 17, 19.0851093, 72.887154, '022-61801011', 'Yes', 'PVR Cinemas', '', 'Food Court, Rajdhani, Patchi, Mad Over Donuts, CCD, Golden Tips, Pizza Hut, Costa Coffee, Choko La, Caf? Royal, Cream Centre, Di Bella Coffee, Rain Forest, Chocolate Temptations, Grillopolis, Cookie Man, Hokey Pokey, Mai Tai, Zaika, Ice Cream Works, Moti ', 'Amoeba, Funzone 2, Scary House, Snow World, Storm 5D, Time Zone', 'www.phoenixmarketcitymumbai.com', 'Marketing.mumbai@phoenixmarketcity.in', '', 'Phoenix Marketcity, a highly admired shopping mall in Mumbai, brings to you a merry-go-round of fun, food and some grand shopping. Categories of shops at Phoenix Marketcity include Bags, Footwear, Books, Cards, Music & Stationery, Electronics, Gifts & Crafts, Chocolates, Confectionary & Ice Cream, Cosmetics & Perfumes, Domestic and International Fashion for Men, Women and Children, Health, Beauty, Sports, Fitness, Department Store, Eye Wear, Home & Lifestyle, Speciality Store, Travel & Luggage, Watches, Jewellery and more. They also have over 44 restaurants, caf?s and fast food centres for the food lovers with a range of Indian, Chinese, Continental, Italian and more cuisines. In Entertainment, check out PVR Cinemas, Timezone, Snow World, Funzone, Storm India 5D and Scary House among others! So here is your chance to spend the entire day with family or friends and having a memorable time!', '', '', '', '', '', '', 14),
(185, 'Viviana Mall', 'Viviana Mall, Opp. Eastern Express Highway, Next to Jupiter Hospital, Eastern Express Highway, Laxmi Nagar, Thane West, Thane-400606', 68, 19.208338, 72.971202, '022-21725725', 'Yes', 'Cinepolis', '', 'Food Court, Copper Chimney, The Yellow Chilli, Alfredo''s, JugHeads, Cream Centre, Mainland China, Stir Crazy, Pizza Express, Rajdhani, Grilla!, Banana Leaf, Yoko Sizzlers, British Brewing Company, The Beer Caf?, The United - Sports Bar and Grill', 'Funcity, Game 4 U, 7D Adventures ', 'www.vivacitymalls.com', 'info@vivianamalls.com', '', '', '', '', '', '', '', '', 14),
(186, 'Inorbit Vashi', 'Inorbit Mall Sector 30A, Vashi, Navi Mumbai - 400 705', 19, 19.066108, 73.000969, '022-67777614', 'Yes', '', '', 'Food Court, CCD, Starbucks, Moshe''s, Garden Court, Pizza Hut', 'Timezone', 'www.inorbit.in', 'info.vashi@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(187, 'Inorbit Malad', 'Inobit Mall , Malad Link Road, Malad (w) Mumbai - 400 064', 21, 19.173237, 72.835365, '022-66777999', 'Yes', 'Inox', '', 'Food Court, Costa Coffee, CCD, Indigo Deli, Maharaja Bhog, Pizza Hut, Spaghetti Kitchen, The Pint Room', 'Timezone', 'www.inorbit.in', 'info.malad@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(188, 'Infiniti Malad', 'Infinity Mall 2,Link Rd, , Mindspace, Malad (west), Mumbai - 400064', 21, 19.185112, 72.83406, '022-61955555', 'Yes', 'Cinemax', '', 'Food Court, California Pizza Kitchen, Mainland China, Zaffra, Bombay Blue, Panchvati Gaurav, KFC, 30ml Liquid Lounge, Manchester United Caf? Bar', 'Planet Infiniti', 'www.infinitimall.com', '', '', '', '', '', '', '', '', '', 14),
(189, 'Oberoi Mall', 'Oberoi Mall, Dindoshi, Goregaon (East), Mumbai - 400063', 22, 19.173824, 72.860555, '022-40990824', 'Yes', 'PVR Cinemas', '', 'Food Court, CCD, Starbucks, Gloria Jeans Coffee, British Brewing Company, Maharaja Bhog, Pizza Hut, Cream Centre, Copper Chimney, Caf? Moshe''s, Mainland China', 'Funcity, West plaza, Kids Creche', 'www.oberoimall.com/', 'info@oberoimall.com', '', '', '', '', '', '', '', '', 14),
(190, 'High Street Phoenix', 'High Street Phoenix, The Phoenix Mills Limited, 462, Senapati Bapat Marg, Lower Parel (West), Mumbai - 400 013?', 69, 18.99469, 72.824596, '022-43339994', 'Yes', 'PVR Cinemas', '', 'Asia 7, Bombay Blue, Caf? Moshe''s, California Pizza Kitchen, Coffee Bean & Tea Leaf, Copper Chimney, Costa Coffee, Cream Centre, Domino''s, Gajalee, Gelato Italiano, Haagen-Dazs, Indigo Deli, Mad Over Donuts, MaiTai, Manchester United Caf? Bar, Maroosh, Mc', 'Orama Carnival Street', 'www.highstreetphoenix.com', '', '', '', '', '', '', '', '', '', 14),
(191, 'Neptune Magnet Mall', 'Neptune Magnet Mall, Lower Powai, L.B.S. Marg,?Bhandup (West), Mumbai - 400 078', 24, 19.141651, 72.931148, '022-67421878', 'Yes', 'Cinepolis', '', 'Golden Star Thali, Khiva, McDonald''s, Asian Wok, Mughal Darbar, Banana Leaf, Cream Centre, Moti Mahal, Pizza Hut, Food Court', 'Mancini, Get Lost, Game4u, 4D', 'www.magnetmall.in', '', '', 'Developed by Neptune Group, a company known to have almost an intuition for accurately knowing what their customers desire and providing it. The Mall personifies their philosophy to bring value to the lives of their customers and brings many entertaining wonders for the first time in India; like a 6 screen multiplex, 2 level food court, a family entertainment zone, to mention a few.', '', '', '', '', '', '', 14),
(192, 'Korum Mall', 'Korum Mall, Mangal Pandey Road, Near Cadbury Compound, Eastern Express Highway, Thane (West) - 400 606', 18, 19.203132, 72.965143, '022-41444444', 'Yes', 'Inox', '', 'Caf? Coffee Day, Starbucks, Food Court, Costa Caf?, Timbuctoo, Pop Tates, Urban Tadka, Zaffran, Indiana Waters', 'Timezone, Bowling', 'www.korum.in', 'korum@korum.in', '', 'With best retail mix of 130+ National & international brands, Korum offers a 360 degree mall experience in Shopping, entertainment, lifestyle & dining. More than 30 thoughtful and sensible services, and 270+ days of marketing events, further enhance the shopping experience.', '', '', '', '', '', '', 14),
(193, 'Growels 101 Mall', 'Akurli Rd, Off.Western Express Highway, Kandivali East, Mumbai, Maharashtra 400101', 25, 19.203321, 72.859505, '022-66993402', 'Yes', 'Cinemax', '', 'Food Court, Zaffran, Balaji, McDonald''s', '', 'www.growels101.com/', 'marketing@growel.com', '', 'Growel?s 101 strategically located in the western suburbs ( Kandivli ) has an ideal mix of fashion, retail, hypermarket, consumer durables, department stores, white goods, books, health & beauty, family entertainment centres, fine dining restaurants, food court, and a 4 screen multiplex. The mall is anchored by prominent retailers such as Mc Donald?s, Pantaloons, Big Bazaar, Cinemax and E Zone amongst other international and national retailers.', '', '', '', '', '', '', 14),
(194, 'Infiniti Andheri', 'Infiniti Mall, New Link Road, Oshiwara, Andheri West, Mumbai- 400053', 26, 19.141295, 72.830681, '022-61319191', 'Yes', 'Cinemax', '', 'Panchavati Gaurav, TGIF, Food Court', 'Gamezone', 'www.infinitimall.com', 'gm.andheri@infinitimall.com', '', '', '', '', '', '', '', '', 14),
(195, 'CR2 Mall', 'A/240, Barrister Rajni Patel Road, Nariman Point, Mumbai - 400021', 27, 18.926537, 72.822597, '022-66548907', 'Yes', 'Inox', '', 'Ristorante Prego, Subway, The Coffee Bean & Tea Leaf, Spaghetti Kitchen, Paninaro, Spoon, Swati, Not Just Dosa, Bombay Blue Express, Simply Sizzlers, Hot''wich, Moti Mahal Delux, Kabab Company, Pastelitos, China Town, Brownie Cottage, Gelato Italiano, Bubb', '', '', '', '', '', '', '', '', '', '', '', 14),
(196, 'Atria Mall', 'Dr. Annie Beasent Road, Worli, Mumbai - 400018', 28, 18.991826, 72.814482, '022-24813333', 'Yes', '', '', 'Caf? Coffee Day, Food Court, Gelato', 'Gaming Zone, Ice Skating, Orama 3D/4D Theatre', 'www.atriamumbai.in', 'atria@atriamumbai.in', '', '', '', '', '', '', '', '', 14),
(197, 'R City Mall', 'R City Mall, Lal Bahadur Shastri Road, Ghatkopar (West), Mumbai - 400086', 12, 19.0991064, 72.9172897, '022-67755833?', 'Yes', 'Big Cinema', '', 'Food Court,Shvatra, Quattro, Punjab Grill, Rolling Pin, Mainland China, Cream Centre, Balaji, Indigo Deli, Dwarkadheesh, Five Fat Monks, Starbucks Coffee, Pico Express, Banana Leaf, Maroosh, Mamagoto, McDonalds, Sbarro, TGIF, The United-Sports Bar and Gri', '6D Theatre, Jammin - Family Entertainment Centre, Bowling Alley, Horror House, Kidzania', 'www.rcity.co.in', 'info@rcity.runwal.com', '', 'The newest and most diverse shopping destination in Mumbai, this 12 lakh square feet mammoth shopping centre is one-of-its-kind with a multi-level retail galleria that balances a steady mix of the finest local brands and top-notch international brands. The sprawling multilevel parking, five-level atrium and first-of-its-kind nine-screen multiplex will provide the most vibrant experience to shopping enthusiasts from all walks of life.', '', '', '', '', '', '', 14),
(198, 'Phoenix Market City ', 'Phoenix Marketcity, L.B.S. Marg, Kurla (West), Mumbai ? 400070', 17, 19.0851093, 72.887154, '022-61801011', 'Yes', 'PVR Cinemas', '', 'Food Court, Rajdhani, Patchi, Mad Over Donuts, CCD, Golden Tips, Pizza Hut, Costa Coffee, Choko La, Caf? Royal, Cream Centre, Di Bella Coffee, Rain Forest, Chocolate Temptations, Grillopolis, Cookie Man, Hokey Pokey, Mai Tai, Zaika, Ice Cream Works, Moti ', 'Amoeba, Funzone 2, Scary House, Snow World, Storm 5D, Time Zone', 'www.phoenixmarketcitymumbai.com', 'Marketing.mumbai@phoenixmarketcity.in', '', 'Phoenix Marketcity, a highly admired shopping mall in Mumbai, brings to you a merry-go-round of fun, food and some grand shopping. Categories of shops at Phoenix Marketcity include Bags, Footwear, Books, Cards, Music & Stationery, Electronics, Gifts & Crafts, Chocolates, Confectionary & Ice Cream, Cosmetics & Perfumes, Domestic and International Fashion for Men, Women and Children, Health, Beauty, Sports, Fitness, Department Store, Eye Wear, Home & Lifestyle, Speciality Store, Travel & Luggage, Watches, Jewellery and more. They also have over 44 restaurants, caf?s and fast food centres for the food lovers with a range of Indian, Chinese, Continental, Italian and more cuisines. In Entertainment, check out PVR Cinemas, Timezone, Snow World, Funzone, Storm India 5D and Scary House among others! So here is your chance to spend the entire day with family or friends and having a memorable time!', '', '', '', '', '', '', 14),
(199, 'Viviana Mall', 'Viviana Mall, Opp. Eastern Express Highway, Next to Jupiter Hospital, Eastern Express Highway, Laxmi Nagar, Thane West, Thane-400606', 68, 19.208338, 72.971202, '022-21725725', 'Yes', 'Cinepolis', '', 'Food Court, Copper Chimney, The Yellow Chilli, Alfredo''s, JugHeads, Cream Centre, Mainland China, Stir Crazy, Pizza Express, Rajdhani, Grilla!, Banana Leaf, Yoko Sizzlers, British Brewing Company, The Beer Caf?, The United - Sports Bar and Grill', 'Funcity, Game 4 U, 7D Adventures ', 'www.vivacitymalls.com', 'info@vivianamalls.com', '', '', '', '', '', '', '', '', 14),
(200, 'Inorbit Vashi', 'Inorbit Mall Sector 30A, Vashi, Navi Mumbai - 400 705', 19, 19.066108, 73.000969, '022-67777614', 'Yes', '', '', 'Food Court, CCD, Starbucks, Moshe''s, Garden Court, Pizza Hut', 'Timezone', 'www.inorbit.in', 'info.vashi@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(201, 'Inorbit Malad', 'Inobit Mall , Malad Link Road, Malad (w) Mumbai - 400 064', 21, 19.173237, 72.835365, '022-66777999', 'Yes', 'Inox', '', 'Food Court, Costa Coffee, CCD, Indigo Deli, Maharaja Bhog, Pizza Hut, Spaghetti Kitchen, The Pint Room', 'Timezone', 'www.inorbit.in', 'info.malad@Inorbit.in', '', 'Inorbit malls have universal class and appeal, and they seek to provide a one-stop destination for fashion, lifestyle, food and entertainment leading to an international experience for families.', '', '', '', '', '', '', 14),
(202, 'Infiniti Malad', 'Infinity Mall 2,Link Rd, , Mindspace, Malad (west), Mumbai - 400064', 21, 19.185112, 72.83406, '022-61955555', 'Yes', 'Cinemax', '', 'Food Court, California Pizza Kitchen, Mainland China, Zaffra, Bombay Blue, Panchvati Gaurav, KFC, 30ml Liquid Lounge, Manchester United Caf? Bar', 'Planet Infiniti', 'www.infinitimall.com', '', '', '', '', '', '', '', '', '', 14),
(203, 'Oberoi Mall', 'Oberoi Mall, Dindoshi, Goregaon (East), Mumbai - 400063', 22, 19.173824, 72.860555, '022-40990824', 'Yes', 'PVR Cinemas', '', 'Food Court, CCD, Starbucks, Gloria Jeans Coffee, British Brewing Company, Maharaja Bhog, Pizza Hut, Cream Centre, Copper Chimney, Caf? Moshe''s, Mainland China', 'Funcity, West plaza, Kids Creche', 'www.oberoimall.com/', 'info@oberoimall.com', '', '', '', '', '', '', '', '', 14),
(204, 'High Street Phoenix', 'High Street Phoenix, The Phoenix Mills Limited, 462, Senapati Bapat Marg, Lower Parel (West), Mumbai - 400 013?', 69, 18.99469, 72.824596, '022-43339994', 'Yes', 'PVR Cinemas', '', 'Asia 7, Bombay Blue, Caf? Moshe''s, California Pizza Kitchen, Coffee Bean & Tea Leaf, Copper Chimney, Costa Coffee, Cream Centre, Domino''s, Gajalee, Gelato Italiano, Haagen-Dazs, Indigo Deli, Mad Over Donuts, MaiTai, Manchester United Caf? Bar, Maroosh, Mc', 'Orama Carnival Street', 'www.highstreetphoenix.com', '', '', '', '', '', '', '', '', '', 14),
(205, 'Neptune Magnet Mall', 'Neptune Magnet Mall, Lower Powai, L.B.S. Marg,?Bhandup (West), Mumbai - 400 078', 24, 19.141651, 72.931148, '022-67421878', 'Yes', 'Cinepolis', '', 'Golden Star Thali, Khiva, McDonald''s, Asian Wok, Mughal Darbar, Banana Leaf, Cream Centre, Moti Mahal, Pizza Hut, Food Court', 'Mancini, Get Lost, Game4u, 4D', 'www.magnetmall.in', '', '', 'Developed by Neptune Group, a company known to have almost an intuition for accurately knowing what their customers desire and providing it. The Mall personifies their philosophy to bring value to the lives of their customers and brings many entertaining wonders for the first time in India; like a 6 screen multiplex, 2 level food court, a family entertainment zone, to mention a few.', '', '', '', '', '', '', 14),
(206, 'Korum Mall', 'Korum Mall, Mangal Pandey Road, Near Cadbury Compound, Eastern Express Highway, Thane (West) - 400 606', 18, 19.203132, 72.965143, '022-41444444', 'Yes', 'Inox', '', 'Caf? Coffee Day, Starbucks, Food Court, Costa Caf?, Timbuctoo, Pop Tates, Urban Tadka, Zaffran, Indiana Waters', 'Timezone, Bowling', 'www.korum.in', 'korum@korum.in', '', 'With best retail mix of 130+ National & international brands, Korum offers a 360 degree mall experience in Shopping, entertainment, lifestyle & dining. More than 30 thoughtful and sensible services, and 270+ days of marketing events, further enhance the shopping experience.', '', '', '', '', '', '', 14),
(207, 'Growels 101 Mall', 'Akurli Rd, Off.Western Express Highway, Kandivali East, Mumbai, Maharashtra 400101', 25, 19.203321, 72.859505, '022-66993402', 'Yes', 'Cinemax', '', 'Food Court, Zaffran, Balaji, McDonald''s', '', 'www.growels101.com/', 'marketing@growel.com', '', 'Growel?s 101 strategically located in the western suburbs ( Kandivli ) has an ideal mix of fashion, retail, hypermarket, consumer durables, department stores, white goods, books, health & beauty, family entertainment centres, fine dining restaurants, food court, and a 4 screen multiplex. The mall is anchored by prominent retailers such as Mc Donald?s, Pantaloons, Big Bazaar, Cinemax and E Zone amongst other international and national retailers.', '', '', '', '', '', '', 14),
(208, 'Infiniti Andheri', 'Infiniti Mall, New Link Road, Oshiwara, Andheri West, Mumbai- 400053', 26, 19.141295, 72.830681, '022-61319191', 'Yes', 'Cinemax', '', 'Panchavati Gaurav, TGIF, Food Court', 'Gamezone', 'www.infinitimall.com', 'gm.andheri@infinitimall.com', '', '', '', '', '', '', '', '', 14),
(209, 'CR2 Mall', 'A/240, Barrister Rajni Patel Road, Nariman Point, Mumbai - 400021', 27, 18.926537, 72.822597, '022-66548907', 'Yes', 'Inox', '', 'Ristorante Prego, Subway, The Coffee Bean & Tea Leaf, Spaghetti Kitchen, Paninaro, Spoon, Swati, Not Just Dosa, Bombay Blue Express, Simply Sizzlers, Hot''wich, Moti Mahal Delux, Kabab Company, Pastelitos, China Town, Brownie Cottage, Gelato Italiano, Bubb', '', '', '', '', '', '', '', '', '', '', '', 14),
(210, 'Atria Mall', 'Dr. Annie Beasent Road, Worli, Mumbai - 400018', 28, 18.991826, 72.814482, '022-24813333', 'Yes', '', '', 'Caf? Coffee Day, Food Court, Gelato', 'Gaming Zone, Ice Skating, Orama 3D/4D Theatre', 'www.atriamumbai.in', 'atria@atriamumbai.in', '', '', '', '', '', '', '', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Malls', '', '', 'site/viewmall', 1, 0, 1, 2, ' icon-calendar'),
(3, 'City', '', '', 'site/viewcity', 1, 0, 1, 3, ' icon-user-md'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Brand', '', '', 'site/viewbrand', 1, 0, 1, 4, ' icon-ticket'),
(6, 'Store', '', '', '', 1, 0, 1, 5, 'icon-money'),
(7, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 6, 'icon-book'),
(8, 'Store in Mall', '', '', 'site/viewstoreinmall', 1, 6, 1, 7, ' icon-file-text-alt'),
(9, 'Individual Store', '', '', 'site/viewindividualstore', 1, 6, 1, 8, ' icon-list-alt'),
(10, 'Offers', '', '', 'site/viewoffer', 1, 0, 1, 9, 'icon-user'),
(11, 'Image Gallery', '', '', 'site/viewgallery', 1, 0, 1, 10, 'icon-user'),
(12, 'New In', '', '', 'site/viewnewin', 1, 0, 1, 11, 'icon-user'),
(13, 'Category Edit', '', '', 'site/editcategory', 1, 6, 1, 11, 'icon-user'),
(14, 'Brand', '', '', '', 1, 0, 1, 11, 'icon-user'),
(15, 'Edit Brand', '', '', 'site/editbrandforbrand', 1, 14, 1, 12, 'icon-user'),
(16, 'Store', '', '', '', 1, 0, 1, 13, 'icon-user'),
(17, 'Individual Store', '', '', 'site/viewindividualstoreforbrand', 1, 16, 1, 14, 'icon-user'),
(18, 'Store In Mall', '', '', 'site/viewstoreinmallforbrand', 1, 16, 1, 14, 'icon-user'),
(19, 'Offers', '', '', 'site/viewofferforbrand', 1, 0, 1, 15, 'icon-user'),
(20, 'New In', '', '', 'site/viewnewinforbrand', 1, 0, 1, 16, 'icon-user'),
(21, 'Store', '', '', '', 1, 0, 1, 17, 'icon-user'),
(22, 'Edit Store', '', '', 'site/editstoreforstore', 1, 21, 1, 18, 'icon-user'),
(23, 'Edit Category', '', '', 'site/editstorecategoryforstore', 1, 21, 1, 19, 'icon-user'),
(24, 'View Category', '', '', 'site/viewstorecategoryforstore', 1, 21, 1, 20, 'icon-user'),
(25, 'Offers', '', '', 'site/viewofferforstore', 1, 0, 1, 21, 'icon-user'),
(26, 'New In', '', '', 'site/viewnewinforstore', 1, 0, 1, 22, 'icon-user'),
(27, 'Banner', '', '', 'site/viewbanner', 1, 0, 1, 12, 'icon-book'),
(28, 'Floor', '', '', 'site/viewfloor', 1, 0, 1, 23, 'icon-user');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(0, 0),
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 0),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(13, 3),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 1),
(28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newin`
--

CREATE TABLE IF NOT EXISTS `newin` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brandid` int(11) NOT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newin`
--

INSERT INTO `newin` (`id`, `image`, `description`, `brandid`, `like`) VALUES
(9, 'Logo_(1)1.png', 'wwwwww', 2, 0),
(15, 'logo_(2)3.png', 'dsc', 45, 0),
(16, 'logo_(2)10.png', 'demo', 2, 0),
(17, 'image_(1)3.png', 'demo', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `brandid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `like` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `header`, `description`, `from`, `to`, `brandid`, `storeid`, `like`) VALUES
(17, 'wscmsld', 'dsc', '2014-10-09', '2014-09-19', 1, 0, 0),
(23, 'Flat 50% off', 'Enjoy extra 10% if you produce 91streets app at the billing counter', '2014-12-31', '2014-10-30', 38, 0, 0),
(24, 'Buy 1 get 1 free', 'Special offers on food and beverages', '2014-12-31', '2014-10-30', 43, 0, 0),
(25, 'Upto 20% off', 'Zero Making charges till Diwali', '2014-12-31', '2014-10-26', 42, 0, 0),
(26, '20% flat off on all product', 'Upto 50% off on infant care products', '2014-12-10', '2014-10-17', 51, 0, 0),
(27, 'Flat 20% off on all handbags', 'Upto 45% off for members', '2014-12-31', '2014-10-30', 44, 0, 0),
(28, 'Flat 30% off on sports wear', 'Upto 25% off on New Arrivals', '1969-12-31', '2014-10-30', 54, 0, 0),
(29, 'Upto 60% off on all products', 'Buy upto 2000/- and get a special gift free!', '1969-12-31', '2014-10-30', 50, 0, 0),
(31, 'Flat 30% off', 'Shop for INR 4000 and get an extra 10% off', '1969-12-31', '2014-10-30', 47, 0, 0),
(32, 'demotest', 'dsc', '2014-10-18', '2014-10-18', 45, 0, 0),
(35, 'mega sale offer', 'dsc', '2014-10-12', '2014-10-26', 45, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pricerange`
--

CREATE TABLE IF NOT EXISTS `pricerange` (
  `id` int(11) NOT NULL,
  `range` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricerange`
--

INSERT INTO `pricerange` (`id`, `range`) VALUES
(1, 'Very Low'),
(2, 'Low'),
(3, 'Moderate'),
(4, 'Expensive'),
(5, 'Very expensive');

-- --------------------------------------------------------

--
-- Table structure for table `shopclosed`
--

CREATE TABLE IF NOT EXISTS `shopclosed` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopclosed`
--

INSERT INTO `shopclosed` (`id`, `day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday'),
(8, 'Saturday'),
(9, '');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbag`
--

CREATE TABLE IF NOT EXISTS `shoppingbag` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoppingbag`
--

INSERT INTO `shoppingbag` (`id`, `user`, `category`, `timestamp`) VALUES
(1, 51, 33, '2014-10-18 06:41:45'),
(2, 51, 34, '2014-10-18 06:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `mall` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` int(11) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `offer` int(11) NOT NULL,
  `workinghoursfrom` varchar(255) NOT NULL,
  `workinghoursto` varchar(255) NOT NULL,
  `shopclosedon` int(11) NOT NULL,
  `description` text NOT NULL,
  `producttype` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `city`, `brand`, `format`, `mall`, `floor`, `address`, `location`, `latitude`, `longitude`, `contactno`, `email`, `offer`, `workinghoursfrom`, `workinghoursto`, `shopclosedon`, `description`, `producttype`) VALUES
(1, 'sporties', 4, 1, 1, 1, 2, 'demostoreaddress', 3, 12.11, 13, '2147483647', 'avinash@gmail.com', 1, '', '', 1, '', ''),
(4, 'demo5', 1, 1, 2, 0, 0, 'wadala road mumbai', 2, 12, 13, '9898989898', 'demo5@demo.com', 3, '', '', 1, '', ''),
(5, 'demo', 4, 2, 1, 1, 5, '', 0, 0, 0, '9090909090', 'demo@email.com', 3, '', '', 3, '', ''),
(6, 'Abcd', 12, 2, 1, 123, 0, '', 0, 0, 0, '1234', 'demo@email.com', 0, '12:00 AM', '12:00 AM', 6, '', ''),
(7, 'individual', 2, 31, 2, 0, 0, 'ahhcbjhc', 9, 12, 13, '9090909090', 'pratik@wohlig.com', 4, '', '', 6, '', ''),
(8, 'test', 2, 2, 2, 0, 0, 'test', 2, 15, 16, '9898989898', 'a@email.com', 4, '10 AM - 6 PM', '', 1, '', ''),
(9, 'dcsd', 1, 3, 2, 0, 0, 'sdcs', 12, 12, 23, '2323', 'a@email.com', 4, '10 AM - 6 PM', '', 8, '', ''),
(10, 'test9', 2, 1, 2, 0, 0, 'asxasx', 11, 89, 98, '2330', 'aamir@a2zheadsets.in', 4, '10 AM - 6 PM', '', 6, '', ''),
(11, 'rwfw', 2, 1, 1, 3, 6, '', 0, 0, 0, '2342', 'demo@email.com', 0, '12:00 AM', '12:00 AM', 6, '0', ''),
(12, 'asxas', 9, 1, 2, 0, 0, 'asa', 4, 12, 12, '12312', '1988.kalpesh@gmail.com', 0, '12:00 AM', '', 8, '0', 'demo,deom'),
(13, 'dcsd', 2, 2, 2, 0, 0, 'sdsd', 10, 21, 22, '232323', '1988.kalpesh@gmail.com', 4, 'wd', '', 8, 'sdfsd', ''),
(14, 'testing123', 1, 1, 1, 3, 1, '', 0, 0, 0, '1421434', 'a@email.com', 0, '12:00 AM', '12:00 AM', 6, 'efsdcsdc', ''),
(15, 'Pepe Jeans', 14, 38, 1, 119, 1, '', 0, 0, 0, '', 'pepercity@pepejeans.com', 0, '12:00 AM', '12:00 AM', 0, '', ''),
(16, 'Pepe Jeans', 15, 38, 1, 119, 1, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(17, 'Pepe Jeans', 7, 38, 1, 149, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(18, 'Pepe Jeans', 11, 38, 1, 133, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(19, 'Pepe Jeans', 9, 38, 1, 170, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(20, 'Pepe Jeans', 8, 38, 1, 122, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(21, 'Pepe Jeans', 10, 38, 1, 122, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(22, 'Pepe Jeans', 12, 38, 1, 176, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(23, 'Pepe Jeans', 13, 38, 1, 122, 7, '', 0, 0, 0, '', 'pepe@pepejeans.com', 0, '', '', 9, '', ''),
(24, 'Sunglass Hut', 15, 46, 1, 119, 1, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(25, 'Sunglass Hut', 7, 46, 1, 149, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(26, 'Sunglass Hut', 11, 46, 1, 133, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(27, 'Sunglass Hut', 9, 46, 1, 170, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(28, 'Sunglass Hut', 8, 46, 1, 122, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(29, 'Sunglass Hut', 10, 46, 1, 122, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(30, 'Sunglass Hut', 12, 46, 1, 176, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(31, 'Sunglass Hut', 13, 46, 1, 122, 7, '', 0, 0, 0, '', 'sh@sh.com', 0, '', '', 9, '', ''),
(32, 'Cygnus', 15, 42, 1, 119, 1, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(33, 'Cygnus', 7, 42, 1, 149, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(34, 'Cygnus', 11, 42, 1, 133, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(35, 'Cygnus', 9, 42, 1, 170, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(36, 'Cygnus', 8, 42, 1, 122, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(37, 'Cygnus', 10, 42, 1, 122, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(38, 'Cygnus', 12, 42, 1, 176, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(39, 'Cygnus', 13, 42, 1, 122, 7, '', 0, 0, 0, '', 'cygnus@cygnus.com', 0, '', '', 9, '', ''),
(40, 'Michael Kors', 15, 44, 1, 119, 1, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(41, 'Michael Kors', 7, 44, 1, 149, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(42, 'Michael Kors', 11, 44, 1, 133, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(43, 'Michael Kors', 9, 44, 1, 170, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(44, 'Michael Kors', 8, 44, 1, 122, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(45, 'Michael Kors', 10, 44, 1, 122, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(46, 'Michael Kors', 12, 44, 1, 176, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(47, 'Michael Kors', 13, 44, 1, 122, 7, '', 0, 0, 0, '', 'mk@mk.com', 0, '', '', 9, '', ''),
(48, 'Holii', 15, 45, 1, 119, 7, '', 0, 0, 0, '98765', 'h@holii.com', 0, '12:00 AM', '12:00 AM', 2, 'demo', ''),
(49, 'Holii', 7, 45, 1, 149, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(50, 'Holii', 11, 45, 1, 133, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(51, 'Holii', 9, 45, 1, 170, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(52, 'Holii', 8, 45, 1, 122, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(53, 'Holii', 10, 45, 1, 122, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(54, 'Holii', 12, 45, 1, 176, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(55, 'Holii', 13, 45, 1, 122, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(56, 'Mothercare', 15, 51, 1, 119, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(57, 'Mothercare', 7, 51, 1, 149, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(58, 'Mothercare', 11, 51, 1, 133, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(59, 'Mothercare', 9, 51, 1, 170, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(60, 'Mothercare', 8, 51, 1, 122, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(61, 'Mothercare', 10, 51, 1, 122, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(62, 'Mothercare', 12, 51, 1, 176, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(63, 'Mothercare', 13, 51, 1, 122, 7, '', 0, 0, 0, '', 'Mothercare@mothercare.com', 0, '', '', 9, '', ''),
(64, 'Cinepolis', 15, 43, 1, 119, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(65, 'Cinepolis', 7, 43, 1, 149, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(66, 'Cinepolis', 11, 43, 1, 133, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(67, 'Cinepolis', 9, 43, 1, 170, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(68, 'Cinepolis', 8, 43, 1, 122, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(69, 'Cinepolis', 10, 43, 1, 122, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(70, 'Cinepolis', 12, 43, 1, 176, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(71, 'Cinepolis', 13, 43, 1, 122, 7, '', 0, 0, 0, '', 'c@cinepolis.com', 0, '', '', 9, '', ''),
(72, 'Reebok ', 15, 54, 1, 119, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(73, 'Reebok ', 7, 54, 1, 149, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(74, 'Reebok ', 11, 54, 1, 133, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(75, 'Reebok ', 9, 54, 1, 170, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(76, 'Reebok ', 8, 54, 1, 122, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(77, 'Reebok ', 10, 54, 1, 122, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(78, 'Reebok ', 12, 54, 1, 176, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(79, 'Reebok ', 13, 54, 1, 122, 7, '', 0, 0, 0, '', 'Reebok@reebok.com', 0, '', '', 9, '', ''),
(80, 'Ruff', 15, 50, 1, 119, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(81, 'Ruff', 7, 50, 1, 149, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(82, 'Ruff', 11, 50, 1, 133, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(83, 'Ruff', 9, 50, 1, 170, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(84, 'Ruff', 8, 50, 1, 122, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(85, 'Ruff', 10, 50, 1, 122, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(86, 'Ruff', 12, 50, 1, 176, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(87, 'Ruff', 13, 50, 1, 122, 7, '', 0, 0, 0, '', 'ruff@ruff.in', 0, '', '', 9, '', ''),
(88, 'Van Heusen', 15, 47, 1, 119, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(89, 'Van Heusen', 7, 47, 1, 149, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(90, 'Van Heusen', 11, 47, 1, 133, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(91, 'Van Heusen', 9, 47, 1, 170, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(92, 'Van Heusen', 8, 47, 1, 122, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(93, 'Van Heusen', 10, 47, 1, 122, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(94, 'Van Heusen', 12, 47, 1, 176, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(95, 'Van Heusen', 13, 47, 1, 122, 7, '', 0, 0, 0, '', 'vh@vh.com', 0, '', '', 9, '', ''),
(97, 'csv store', 16, 1, 1, 182, 11, '', 0, 0, 0, '900099', 'email@email.com', 0, '12:00 AM', '06:00 PM', 1, 'desc', ''),
(98, 'Holii', 13, 45, 2, 122, 7, '', 0, 0, 0, '', 'h@holii.com', 0, '', '', 9, '', ''),
(99, 'demo388', 14, 45, 2, 0, 0, 'demo', 2, 89, 12, '232323', 'pratik@wohlig.com', 0, '12:00 AM', '', 2, '0', ''),
(100, 'nnnnnn', 8, 1, 1, 162, 2, '', 0, 0, 0, '98765', 'pankaj@gmail.com', 0, '07:00 AM', '09:30 PM', 2, 'demo', 'kkkkkkkkkkkkk,dssssssssss,dddddddddddd,dddddddddddddd,dddddddddddddd,ddddddddddddddd,dddddddddddddddddddddddddd'),
(101, 'rrrrrr', 7, 1, 1, 147, 8, '', 0, 0, 0, '98765', 'pankaj@gmail.com', 0, '12:00 AM', '12:00 AM', 2, 'demo', 'jhgvja,asxaijnxias,aisxnaijx,wwww');

-- --------------------------------------------------------

--
-- Table structure for table `storecategory`
--

CREATE TABLE IF NOT EXISTS `storecategory` (
  `id` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storecategory`
--

INSERT INTO `storecategory` (`id`, `storeid`, `categoryid`) VALUES
(59, 11, 11),
(60, 11, 4),
(94, 96, 96),
(95, 96, 1),
(96, 96, 0),
(97, 96, 7),
(98, 96, 147),
(99, 96, 3),
(100, 96, 123456),
(101, 96, 12),
(102, 96, 8),
(103, 96, 143),
(104, 96, 5),
(216, 98, 24),
(217, 98, 34),
(218, 98, 25),
(219, 98, 43),
(220, 98, 59),
(221, 98, 60),
(222, 98, 61),
(223, 98, 28),
(224, 98, 45),
(345, 48, 25),
(346, 48, 43),
(347, 48, 59),
(348, 48, 60),
(349, 48, 61),
(350, 48, 28),
(351, 48, 45),
(354, 99, 24),
(355, 99, 33),
(356, 99, 34),
(357, 99, 25),
(358, 99, 43),
(359, 99, 59),
(360, 99, 60),
(361, 99, 61),
(362, 99, 28),
(363, 99, 45),
(364, 101, 1),
(365, 101, 101),
(366, 101, 0),
(367, 101, 7),
(368, 101, 147),
(369, 101, 8),
(370, 101, 98765),
(371, 101, 12),
(372, 101, 2),
(373, 12, 24),
(374, 12, 33),
(375, 12, 35),
(376, 12, 38),
(377, 12, 39),
(378, 12, 26),
(379, 12, 40),
(380, 12, 41),
(381, 12, 52),
(382, 12, 53),
(383, 12, 54),
(406, 6, 26),
(407, 6, 40),
(408, 6, 41),
(409, 6, 50),
(410, 6, 54);

-- --------------------------------------------------------

--
-- Table structure for table `storeimagegallery`
--

CREATE TABLE IF NOT EXISTS `storeimagegallery` (
  `id` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `imagegalleryid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeimagegallery`
--

INSERT INTO `storeimagegallery` (`id`, `storeid`, `imagegalleryid`) VALUES
(13, 4, 7),
(18, 5, 6),
(19, 6, 6),
(20, 8, 6),
(21, 13, 6),
(31, 1, 5),
(32, 4, 5),
(33, 10, 5),
(34, 11, 5),
(35, 12, 5),
(36, 14, 5),
(37, 97, 5),
(38, 100, 5),
(39, 101, 5),
(40, 5, 16),
(41, 6, 16),
(42, 8, 16),
(43, 13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `storenewin`
--

CREATE TABLE IF NOT EXISTS `storenewin` (
  `id` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `newinid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storenewin`
--

INSERT INTO `storenewin` (`id`, `storeid`, `newinid`) VALUES
(1, 5, 5),
(2, 6, 5),
(3, 8, 5),
(4, 13, 5),
(5, 1, 6),
(6, 4, 6),
(7, 10, 6),
(8, 11, 6),
(9, 5, 8),
(10, 6, 8),
(11, 8, 8),
(12, 48, 10),
(13, 49, 10),
(14, 48, 7),
(15, 49, 7),
(16, 50, 7),
(17, 51, 7),
(18, 52, 7),
(19, 53, 7),
(20, 54, 7),
(21, 55, 7),
(22, 98, 7),
(23, 48, 11),
(24, 49, 11),
(25, 48, 12),
(27, 99, 13),
(28, 99, 14),
(29, 99, 15),
(35, 5, 17),
(36, 6, 17),
(37, 8, 17),
(38, 5, 9),
(39, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `storeoffers`
--

CREATE TABLE IF NOT EXISTS `storeoffers` (
  `id` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `offerid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeoffers`
--

INSERT INTO `storeoffers` (`id`, `storeid`, `offerid`) VALUES
(1, 5, 14),
(2, 6, 14),
(3, 8, 14),
(4, 6, 15),
(5, 8, 15),
(6, 13, 15),
(7, 5, 16),
(8, 6, 16),
(9, 8, 16),
(36, 1, 17),
(37, 4, 17),
(38, 12, 17),
(39, 14, 17),
(42, 0, 22),
(43, 0, 22),
(69, 64, 24),
(70, 65, 24),
(71, 66, 24),
(72, 67, 24),
(73, 68, 24),
(74, 69, 24),
(75, 70, 24),
(76, 71, 24),
(77, 15, 23),
(78, 16, 23),
(79, 17, 23),
(80, 18, 23),
(81, 19, 23),
(82, 20, 23),
(83, 21, 23),
(84, 22, 23),
(85, 23, 23),
(86, 32, 25),
(87, 33, 25),
(88, 34, 25),
(89, 35, 25),
(90, 36, 25),
(91, 37, 25),
(92, 38, 25),
(93, 39, 25),
(134, 40, 27),
(135, 41, 27),
(136, 42, 27),
(137, 43, 27),
(138, 44, 27),
(139, 45, 27),
(140, 46, 27),
(141, 47, 27),
(142, 72, 28),
(143, 73, 28),
(144, 74, 28),
(145, 75, 28),
(146, 76, 28),
(147, 77, 28),
(148, 78, 28),
(149, 79, 28),
(150, 80, 29),
(151, 81, 29),
(152, 82, 29),
(153, 83, 29),
(154, 84, 29),
(155, 85, 29),
(156, 86, 29),
(157, 87, 29),
(158, 88, 30),
(159, 89, 30),
(160, 90, 30),
(161, 91, 30),
(162, 92, 30),
(163, 93, 30),
(164, 94, 30),
(165, 95, 30),
(166, 48, 31),
(167, 49, 31),
(168, 50, 31),
(169, 51, 31),
(170, 52, 31),
(171, 53, 31),
(172, 54, 31),
(173, 55, 31),
(174, 98, 31),
(175, 99, 31),
(195, 48, 18),
(196, 49, 18),
(197, 50, 18),
(198, 51, 18),
(199, 52, 18),
(200, 53, 18),
(201, 54, 18),
(202, 55, 18),
(203, 98, 18),
(204, 48, 32),
(205, 49, 32),
(208, 99, 35),
(265, 56, 26),
(266, 57, 26),
(267, 58, 26),
(268, 59, 26),
(269, 60, 26),
(270, 61, 26),
(271, 62, 26),
(272, 63, 26);

-- --------------------------------------------------------

--
-- Table structure for table `storerating`
--

CREATE TABLE IF NOT EXISTS `storerating` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `storerating`
--

INSERT INTO `storerating` (`id`, `user`, `store`, `rating`) VALUES
(2, 1, 6, 3),
(3, 2, 6, 4),
(4, 6, 6, 5),
(7, 8, 28, 0),
(9, 12, 28, 0),
(30, 50, 6, 5),
(32, 49, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text,
  `eventinfo` int(11) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `facebookuserid` varchar(255) DEFAULT NULL,
  `newsletterstatus` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `showwebsite` varchar(255) DEFAULT NULL,
  `eventsheld` varchar(255) DEFAULT NULL,
  `topeventlocation` varchar(255) DEFAULT NULL,
  `brandid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`, `logo`, `showwebsite`, `eventsheld`, `topeventlocation`, `brandid`, `storeid`) VALUES
(1, 'wohlig', '', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', '', '', 0, '233232', 'dadar', '1', 322323, '1991-01-08', 1, '0000-00-00 00:00:00', '0', 0, 1, NULL, NULL, NULL, NULL, 0, 0),
(6, 'wohlig1', 'tech', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 'wohlig.com', '0', 1234, '8989898989', 'abcdefg', '1', NULL, '1991-01-08', 1, '2014-05-12 06:52:44', '2', 2, 1, NULL, NULL, NULL, NULL, 0, 0),
(53, 'wohlig', 'client', 'a63526467438df9566c508027d9cb06b', 'wohligshop@wohlig.com', 'a.com', 'dsc', NULL, '2232', 'demo', '1', 4544554, '2014-10-02', 3, '2014-10-25 11:41:51', '1', NULL, 1, NULL, NULL, NULL, NULL, 45, 48),
(54, 'wohlig', 'brand', 'a63526467438df9566c508027d9cb06b', 'wohligbrand@wohlig.com', 'a.com', 'demo', NULL, '2232', 'abcdefg', '1', 4544554, '2014-10-15', 2, '2014-10-25 11:43:05', '0', NULL, 1, NULL, NULL, NULL, NULL, 45, 48),
(55, 'jagruti', 'patil', '3677b23baa08f74c28aba07f0cb6554e', 'jagruti@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-10-31 14:50:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(60, 'jagruti', 'patil', '3677b23baa08f74c28aba07f0cb6554e', 'jagruti@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2014-11-07', NULL, '2014-11-13 06:17:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(64, 'dharmil', 'sheth', '4f265ca43eb5cf2c4386ee7c9c04633d', 'dharmilsheth@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2014-12-01 18:47:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(595, 'sagar shavdia', NULL, 'c9e73e857908fe56234057cd807d4791', 'sagarshavdia@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(596, 'Pratik Rambhia ', NULL, '8c46e74cc98431e046d927599eefbe28', 'pratikrambhia9@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(597, 'Piyush Chhabra', NULL, '898ebf94c9d44e5341f557fab7acd98f', 'piyushchhabra1989@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(598, 'Arun', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'arunkumaryadav87@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(599, 'Naman Gupta', NULL, '85064efb60a9601805dcea56ec5402f7', 'namangupta1989@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(600, 'Radhika Lalan', NULL, 'fe0e3192847b2b9dd0ae3b9ae747f987', 'radhikalalan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(601, 'Sukumar Mendon', NULL, '7fe7b8a9718b68d3ff15c37ef9a8212a', 'suku511@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(602, 'yogita jani', NULL, 'f65273aee0717d1d630784e8d609c84b', 'yogijani13@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(603, 'akarsh', NULL, 'b2fe440cb7a0b127f1a90ffea296313b', 'akarshmails@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(604, 'Saumil Parekh ', NULL, '03f4816e1c33d2128132a559af2a2374', 'saumil4769@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(605, 'bhavin sheth', NULL, '28f20a02bf8a021fab4fcec48afb584e', 'bhavinnsheth@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(606, 'Suraj', NULL, 'b5a4b6342e07b092021934448a9044da', 'suraj.jobanputra@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(607, 'Husain Motiwala', NULL, '168ce4a9a0b35b922362ab99603afa3d', 'husain.im13@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(608, 'Pankaj Khemka', NULL, '8c0802243c0fd596c5fdbc2904739721', 'pankajkhemka24@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(609, 'monali sheth', NULL, 'cafa27b8694bf9dea99b99770a1cfa31', 'gracymon2000@91streets.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(610, 'Mihir', NULL, '24dfd2229bdedb27d4446ecab500d2a9', 'haria.mihir10@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(611, 'test', NULL, '098f6bcd4621d373cade4e832627b4f6', 'a@b.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(612, 'test', NULL, '098f6bcd4621d373cade4e832627b4f6', 'somebody@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(613, 'Eshwarya Pathak', NULL, '2a4044fbd252bace71481e5015f31f57', 'eshwaryapathak@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(614, 'Ruchir Shah', NULL, '038acd75d07ef8c5c4cdc0ee9b7ce633', 'rockinruchir@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(615, 'Dhruv Chopra', NULL, '0832c1202da8d382318e329a7c133ea0', 'dchop@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(616, 'Karishma Rohra', NULL, '4f0b634e8731e5b8c38e9c2f8225c779', 'krish_rohra@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:33', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(617, 'Saumya batra', NULL, '91a7f55b17569c8e10658cde822a7bda', 'saumyabatra.89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(618, 'Ankeet Padia', NULL, '7e871f9a92cdf1cde2a2a937ef3faa18', 'padia.ankeet@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(619, 'veera anish ayyagari', NULL, '1b309091775079f9c3d9bac8e1baa86b', 'anishav1989@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(620, 'Ankit Bariar', NULL, '4f1794f3b5e339972eff49abf67c56d8', 'ankitbariar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(621, 'dharmil sheth', NULL, '4f265ca43eb5cf2c4386ee7c9c04633d', 'dharmilsheth88@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(622, 'shaheen', NULL, '2d85f6d29d18a877dc99c9a3e32f8494', 'Shaheen@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(623, 'kapil jain', NULL, 'c40a138eb07af067ba217428db3ae6d0', 'kapiljain.daiict@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(624, 'Harshul Vats', NULL, '7ffdeca8416d6cba178ebc2732104127', 'harshulvats@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(625, 'Ajinkya Padave', NULL, '616f88464c481ee55760e47c1e335a44', 'a2padave@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(626, 'shrey mittal', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'shreymittal29@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(627, 'vini', NULL, '2eb8637dd821b4f345e998693c700954', 'vinay.pu@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(628, 'pranav sheth', NULL, '7eaa0cb7edc49eace6904fa4a58e1b1d', 'pranavssheth11@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(629, 'komal', NULL, '690b4bac6ca9fb81814128a294470f92', 'komal_0993@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(630, 'Mihir Parekh', NULL, '8792346f435e8763b4b3c4da623aa60b', 'samekparquet@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(631, 'jenil sanghvi', NULL, 'd47eac8c4650f75f1a1a8a6f60e58590', 'jenilsanghvi@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(632, 'sneha raichandani', NULL, 'a8bec4e1ca8625fadb2d1f82253fca60', 'sneharaichandani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(633, 'Sanket Mavlankar', NULL, '58aa6d802dc9e9b75e03ee1353e3cad0', 'mavlankar.sanket123@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(634, 'Snigdhita Giridhar', NULL, '831838681e2ea190bbafd906b8275004', 'snigdhita@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:34', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(635, 'astha', NULL, '5d6abdd22ac2c5cc495e85412d951a10', 'astha.gupta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(636, 'taher', NULL, 'a8e52217c48d055fb98e2732c587d056', 'taher2690@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(637, 'Tanvi Mehta', NULL, '2ff62b3c11a14bf5ec0790b82c11de8d', 'tanvim.fcb@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(638, 'Nirav Soni', NULL, '6ea0ae1810c44585ef4b87195cca206f', 'niravsoni87@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(639, 'naman shah', NULL, '56be9ae8c9badc03ecda523271665b0f', 'naman403@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(640, 'saniya', NULL, '24d459b05decd08d550f2e30deeb51bb', 'saniyakinger@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(641, 'sambhav jain', NULL, '2039af27d991a3a9e84098e0539fa8a2', 'jain.sambhav1990@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(642, ' vivek sheth', NULL, '78dec27507b0f88d5fadac7be095e30c', 'viveksheth88@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(643, 'kiran', NULL, '9fc14a831611666bbafafa714ab27a24', 'dr.kiranghule@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(644, 'Rishita Jasani', NULL, 'aa8103b5c7ab52ccf88072c431e42b77', 'drrishitajasani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(645, 'Bharat Mehta', NULL, '97fef52f34ae5e6a0d83befc70e043e5', 'bharatkm9@ Yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(646, 'Vismeet', NULL, '6cf08633aa2b8a8c3f965a6075cb6d1b', 'vismeetmehta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(647, 'nirali mehta', NULL, '07fff1a8e619f5d760ade258e8b32e66', 'drniralimehta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(648, 'Kunjan', NULL, 'd9de940380b06df84bff36060226311f', 'kunjankaria@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(649, 'Harshit Mehta', NULL, '5fd51c2ab26b87b13a92ba85226f8d42', 'harshit1224@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(650, 'Ankita Joshi', NULL, '0312431935bb4959b793449690d00c36', 'mishra.ankita0@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(651, 'bharat Mehta', NULL, '6115b3a9a1803d3fcc01e4c5db74900a', 'bharatkm9@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:35', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(652, 'dhiraj jain', NULL, 'b3d97746dbb45e92dc083db205e1fd14', 'dhiraj27489@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(653, 'Pratik R Shah', NULL, 'e18d8e4cd8a2ad60d164e6f680049366', 'shahpratik07@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(654, 'megha shah', NULL, '7f489f642a0ddb10272b5c31057f0663', 'megha_sapani@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(655, 'Siddharth Venkataraman', NULL, 'f72e9a1ac26eb390ef16669c43bac7f3', 'siddharth17leo@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(656, 'sonia', NULL, '3a411f3e29e507dd368446e4176f06a3', 'sdp1497@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(657, 'Niket Karia', NULL, 'f48cdab216568ce2dfcfb820400e2b7b', 'niket.karia2911@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(658, 'jillshah', NULL, 'a317a74339a635862ba0feaa2471e219', 'jillshah9@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(659, 'vaibhavk', NULL, 'e99a18c428cb38d5f260853678922e03', 'vaibhavattalk@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(660, 'mounil bhavishi', NULL, 'fa5fb7e8dce24271fe7f2c95b70182cc', 'mounil.elex@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(661, 'Aparna Vyas Garg', NULL, 'e4e16026266ef457bbddef28b4dd90e9', 'vyasaparna21@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(662, 'Harsh Mody', NULL, '1e27c58a1df216e86fbab107455e4b95', 'harshmody13@yahoo.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(663, 'Niladri Saha', NULL, '263e8248af7379f1f753fb3ee1b4f534', 'Niladri.Saha@ymail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(664, 'manojmenda', NULL, '0ba64fdead3c814448c6ecd18d85f5ff', 'manoj40menda@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(665, 'pratitee shah', NULL, '3bdb75afa6c26dd122e3a60b7542402b', 'pratiteeshah88@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(666, 'Veda Nerurkar', NULL, '269eb1ecd3d805c618abcd622045763a', 'vedanerurkar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(667, 'Neville', NULL, '8afb01f5c70889aeb8e3394d3511151d', 'nevillegosalia@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(668, 'Tarun Norat Bohra', NULL, '98e9f49e4ed51d8ada9ffea7e8cd9b9b', 'tbohra87@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(669, 'Kapil', NULL, '9585cc06dd2acb41c458e035762e3d2a', 'khubidesignstudio@msn.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(670, 'chintan shridharani', NULL, '4bdd0f22a62acb4b587b06edab13394c', 'shridharanichintan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(671, 'shivangi', NULL, 'bb5abd01cf4ae21e862ce06a3d5a47b0', 'shivangi.tandon1215@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(672, 'prateek chauhan', NULL, '1928880d67f9e34f522d1ad10db21983', 'prateekbecks23@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(673, 'Punit Panchal ', NULL, '44b4167dc3162edfec98b570ab13527e', 'punitpanchal86@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(674, 'soham', NULL, '25d55ad283aa400af464c76d713c07ad', 'shahsoham@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(675, 'Aakash Parekh', NULL, '9d7d8f69be2c2ab84721384d5bda877f', 'aakasharies.03@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(676, 'Tarun shah', NULL, '38aacb3616916823c3a660b373527c64', 'tarunshah8687@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(677, 'Rohan Joshi ', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'rohan.mobiligent@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(678, 'vaibhavi shah', NULL, '7ae0190c448442eaad9293bcc0d86b19', 'vaibhavishah1011@yahoo.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(679, 'Rajvi Doshi', NULL, '109ee6868a58ba3b503f4fb7a88244eb', 'rajvidoshi89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(680, 'Riten M Sejpal', NULL, '3dabf8e236b4c01323cdfbff5ce1eaa8', 'rsejpal@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(681, 'surita mandhyan', NULL, '909b24d8b98600144e602581dc5b94ad', 'suritam@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(682, 'jill chitalia', NULL, 'f1c1930d7193c583126f69ce8dd31b82', 'jillchitalia@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:37', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(683, 'Neha ', NULL, '347f665374164eeded8807bcd785e2af', 'nhsawant777@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(684, 'yash', NULL, 'c44a471bd78cc6c2fea32b9fe028d30a', 'yash.smart.93@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(685, 'Omkar ', NULL, '754c6a8afb10061e1057a65829e8d9b0', 'omdesh.0407@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(686, 'Dinesh.M.Boria', NULL, '9ca4528771cdd96db611ab8f1844f6f9', 'boriadinessh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(687, 'kunal', NULL, 'c8c74e17fff292657f5b95cd14957dfe', 'kunalparekh@live.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(688, 'Karan Gadhoke', NULL, 'e7980470202b798ee5b1cd60f5f332f0', 'karangadhoke@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(689, 'abhinav boria', NULL, 'bd7a2caa3b7c8cfd546347c84225734b', 'adbabhi@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(690, 'Tushar Gulabani', NULL, '5ee812638e3a30d4ce48198e47ab56d4', 'tusharchelsea@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(691, 'Visaj Karia', NULL, 'd9d1136a329ebbb167e66f4352f3e265', 'visajkaria@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(692, 'Abhay Patil', NULL, 'ed2fd093dde0dd7f79122d4dad5f3a9c', 'rajpatil6060@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(693, 'dimpy mody', NULL, '560984b805cb653856f6183b1ee6b791', 'Dimpy319@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(694, 'v', NULL, '8eabc522334605946cd24f7747081fd2', 'jhentum@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(695, 'Raunak Narang', NULL, 'c4ec7a05ebc675a2a3415df6972c9a8c', 'raunakdnarang@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(696, 'Saeeda', NULL, '1b3a728489a30c43f7a223434ca53a52', 'saeeda_v@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(697, 'Ashish Batra', NULL, '830f75b6ec55f5829c36650bc049f595', 'Batra.Ashish@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(698, 'Dhvani Gala', NULL, '6b974eb2b0ed7c4885347c5dd365a97c', 'stingyscorp20@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(699, 'Mohit S', NULL, '0e54ef348591ef5059041e8b3f73aae7', 'Msadani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(700, 'Drashti Doshi', NULL, '8a63dab097c7b9ecb89486115a52361d', 'drashtid97@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(701, 'Nikhil Kothari', NULL, '8e63dcd86ef9574181a9b6184ed3dde5', 'kotharinikhil@rocketmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(702, 'Manish Bhatia', NULL, '3b7c3dd51878163917dcfe531dcfdf53', 'mani_2816@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(703, 'asmita raghuvanshy', NULL, '814ec1247335a43a1fc27c92db2198ab', 'asmita.raghuvansh@ gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(704, 'Apurva Shindolkar ', NULL, '6408326db1aa83c86a1301f11b0d7c12', 'apurva484@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(705, 'Sudeep Shetty', NULL, 'f59046ad3f1c4966c398bd1fc9ed8b33', 'sudeep10785 @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(706, 'shashank jain', NULL, 'ce5dbaa2911e2e8d51af63794517bfe8', 'shashankjain19@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(707, 'Ajit Bhusare', NULL, '03b5f052a84f9d113284ffa120e16764', 'bhusareajt@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(708, 'Vidushi', NULL, 'a9b5787a921dcbd0edf27e5e10154779', 'vidushidauneria@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(709, 'Rushabh', NULL, '1f73c22a6fdfc57868218eafb85a26f4', 'rushabh.tharani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(710, 'pranay', NULL, '92d88cdc87dfa4726419c94335c9a922', 'pranayhsoni@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(711, 'Shitanshu Singhal', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'ssinghal5411@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(712, 'abhijit shantaram kothawade', NULL, '2dc9399cc8f25df5a205fa3e8bb730d7', 'abhijit.kothavade@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(713, 'Shreyash', NULL, '7de823988ad328e36a2917a8532cc438', 'shreyash18chavan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(714, 'Foram Shah', NULL, '1fcd1666cf8860c4178f6da82570b0d8', 'foramranbir104@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(715, 'Himit ', NULL, '2d3b4a1af60ed28855440f8a8489ce16', 'Himitz@yahoo.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(716, 'puneet gulati', NULL, '2e48e8d60dbdaad3c349acfedc163db7', 'puneetgulati1986@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(717, 'rahul pralhad devkar', NULL, 'c19ae4f3b1d1f4555d9be3d7b09dc2ff', 'rahul.devkar1@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(718, 'shruti', NULL, '3bb84a868357cfc783b3cedad9279125', 'rasal.shruti@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(719, 'Riddhi', NULL, 'b5b00d3e7a2756c936a0118124032818', 'riddhisen@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(720, 'Tanzila Sayed', NULL, 'c66311de103c71801e44e598287f894d', 'tstazz@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(721, 'Rishi kapoor', NULL, 'bbd6a3cfe054981f89f80fb128821940', 'rkdgr8@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(722, 'nikunj agarwal', NULL, 'ef109a45b2fc113d2652679d913fb527', 'nikunjagarwal.imt@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(723, 'edul patel', NULL, 'b9992bfcbc658de8e8dc0a3bb4a57fc3', 'edulpatel1989@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(724, 'ayush madan', NULL, 'bfac690e94a13d2882815029d8e140d4', 'ayushmada@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(725, 'chandrabhan', NULL, '24428c8e75b6f5b7e74bab1e61b6ec86', 'csinghnathawat@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(726, 'hitesh', NULL, 'ce30e0cb8c6b994822e07b7aced5b10e', 'hiteshpkothari@Gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(727, 'Dhruvi Shah', NULL, 'dc4d407e4e32f26bf05c4a6678a2a6fe', 'dhruvihs1@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(728, 'shyam sharma', NULL, '305b79e59fa0818e0d936567c74aab07', 'shyam.sharma29@rediffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(729, 'Tejas Shah', NULL, '0626b2ca4d6daf98f37a935b08d40119', 'tejasshah806@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(730, 'Devang Doshi', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'Dbd21_in@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(731, 'Nitin Chugh', NULL, 'bd3856affd9e5e39bd23bfa6b7096970', 'nitin87chugh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(732, 'Sagar Gudka', NULL, '631a3be3639dd97f6c5f8a3c05e6054f', 'sagargudka@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(733, 'diwakar', NULL, 'a2af43f4aa71ece1f20276f477a43eab', 'diwakar.ase@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(734, 'Arpit Shah', NULL, '25d55ad283aa400af464c76d713c07ad', 'arpit_shah@ymail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(735, 'Suhas Bhave', NULL, 'eac14c9c24c99fbec208ac4f10f908dd', 'suhasbhave@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(736, 'Mayank Bahukhandi ', NULL, '578cd6ab39f5951218457b08a5e23c2b', 'm.Bahukhandi@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(737, 'Basu Deo Khandelwal', NULL, '6a32c65e56bbae30dc28f1738a497b1d', 'bdkhandelwal@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(738, 'Shah Vidhi Vimal', NULL, 'de0df501c9afd9a8d53ec2212c779981', 'shahvidhi897@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(739, 'Harsh Gada', NULL, '0705569abca081f8c11ed783172b2169', 'rrock07@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(740, 'Riddhi Shah', NULL, '7094ec6f572bb5140276618bffb35101', 'riddhirocks97@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(741, 'Jane Emily', NULL, '1c9a3896da9e9e59fe9f0dfe43ca2790', 'emilyjane83@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(742, 'megha shah', NULL, '68968ac857d32ffc85a128e0edef4270', 'meghashah1997@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(743, 'Saket', NULL, 'ad8e8cc33d2bcc706d910b84889075a9', 'saketsxc@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(744, 'Nitesh Goyal', NULL, '79464212afb7fd6c38699d0617eaedeb', 'niteshg1989@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(745, 'jainil ', NULL, 'fd4522936eb4190557a9000472161f9e', 'jainil_satra@hotmail.con', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(746, 'Dhruti Sayta', NULL, 'd00f5d5217896fb7fd601412cb890830', 'djsayta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(747, 'Neeta Shah', NULL, '27660b1f3d9b85d1176dd6d56dc00384', 'neeta13shah@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(748, 'Pranav Gaitonde', NULL, 'cad89ffe7838c6264de3b0a07a13c4c7', 'gaitonde.pranav@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(749, 'Hetvi Dhruva', NULL, 'c8669a4192eff81851190d6391ae922b', 'hetvidhruva@rediffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(750, 'Tarang', NULL, '6ee17f219468a10858fb3e356503d2e8', 'tarangshah1@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(751, 'Hitesh ', NULL, '05d67a0fb8a4cebe8e0f1bcbc89016f4', 'hitesh.h.thakkar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(752, 'Gaurang Patel', NULL, 'bdc2836ca63d7b4a94e61ddf7e0693c2', 'gaurangpatel6688@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(753, 'Haren Sheth', NULL, 'de05930dd46a984ca32aad9feac718e8', 'shethhm@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(754, 'nups', NULL, '25d55ad283aa400af464c76d713c07ad', 'jobanputranupur@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(755, 'Saurabh Bakshi', NULL, 'f1e904ac93744cc1ce244dfc191fc2a1', 'saurabhbakshi89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(756, 'Dhaval Shah ', NULL, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doc.drshah@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(757, 'Ankit Shah', NULL, '3ae6012dd078c83db0ca480aa23924f0', 'ankitsshah1987@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(758, 'Naseem Shaikh', NULL, '8cf76671d5ca3df53c6090de302b97b0', 'mzshaikh5@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(759, 'Dharmesh Gandhi ', NULL, 'd60f95497173395953508fa388ab8cc2', 'g. dharmesh@gmajl.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(760, 'sonam Deepak kamble', NULL, 'c0d7fff101d5191638e8238bfae6f855', 'sonamkamble15@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(761, 'shruti sinha', NULL, 'cb9342596a50b413dfc472ec7dc38eda', 'shruti1691@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(762, 'Mitesh', NULL, 'a5adfa38dd8636196ad78087f91234ab', 'miteshstar21@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(763, 'rushabh', NULL, '72e1b57765f03000418b17ca7679a768', 'rushabh_1@hotmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(764, 'test', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'test@abc.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(765, 'Bhavana Dave', NULL, 'a21cb87baecc0371163f9a225d886183', 'bhavna.dave78@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(766, 'veena', NULL, '35d659f1b0962290749a736cbafe47a0', 'bommeri121@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(767, 'hariya subbu', NULL, 'f28efcd9824a2e8917cbf7e887c767b3', 'damnthealiens@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(768, 'Trupal', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'trpl02@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(769, 'Ayesha Chatterjee', NULL, '62393f36602d4b18f411b73ab8289355', 'chatterjee_ayesha@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(770, 'keenjal d', NULL, '49d628ff1940e419c2cc4c29819fb1ab', 'keenjaldalal@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(771, 'dolly sheth', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'dolly.sheth88@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(772, 'chetan pandurkar', NULL, '24f693c0b4086501acc22875bd1a64c7', 'chetan28282@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(773, 'Debopriyo Bhattacharyya', NULL, '03b989f7c7349a6a3b1bfcddb5d6d5a9', 'debopriyobhattacharyya@ymail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(774, 'Amit', NULL, 'c6875d5bd60093499f3813791b845ab4', 'Amitatinfosys@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(775, 'Prathamesh walavalkar', NULL, '6eea9b7ef19179a06954edd0f6c05ceb', 'prathameshwalavalkar10@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(776, 'Deven Bambarkar', NULL, 'cc7da441fef520ccbdf224cf89cc597f', 'devendrabambarkar01@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(777, 'g lakshmanan', NULL, '98dfe20f9e9e040cefbd004324178328', 'glaks1986@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(778, 'Nivedita', NULL, '549f4b3f2089a64ef650a5a060c8e2cd', 'nivsaily@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(779, 'amey badkar', NULL, '648ceaa6447a6a2004ec51b797c78247', 'ameybadkar@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(780, 'supriya ghag', NULL, '4d04cedd6d05b1f16a4404ff5a1fa4af', 'supriyasghag@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:41', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(781, 'Kartik Yadav', NULL, 'ce7bcda695c30aa2f9e5f390c820d985', 'kartik.yadav11@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(782, 'Rina Shah', NULL, '6a791031d72dab98030c5da1bd987a22', 'rinaalpesh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(783, 'manish ', NULL, '47071d6baa0dc13f7433b6d95e1a35c7', 'kambli.manish@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(784, 'chetna. damania', NULL, '680f09c2474ee27729d19d99f2e2c88c', 'ckdamania@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(785, 'radhika', NULL, '41cad0c899622cdd063b571bee6ea066', 'radhika.bansal1@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(786, 'piyush doshi', NULL, 'c625ad8790a9f28b9404c4615558898e', 'doshipiyush29@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(787, 'vinit chitalia', NULL, '40065f86cf6f001b4c0e8310af9306e5', 'vinitchitalia@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(788, 'Piyush Vadgama', NULL, '12680ccb521d1f53c5d5384b0b175c5b', 'piyush2rule@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(789, 'adi', NULL, '96edf235a81081a25b727f53d074e990', 'adithya.papakollu@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(790, 'deepshah', NULL, 'c4d31283506067f3e5c9097c1fd5f0ef', 'deepshah46@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(791, 'deep', NULL, '7744d069b7185d408bce2584c05991a8', 'deepshah46@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(792, 'Ayush Keshan', NULL, '128d3586ba603347a3a898c8d46078be', 'ayushkeshan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(793, 'niky mehta', NULL, '33aac539ab1ae5fc883e33532ae4359c', 'niky_mehta@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(794, 'Samip Bhayani', NULL, 'a082822e414d370d6d65b9f43344651b', 'samipbhayani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(795, 'Meghna', NULL, '8a9cc6a9a116377b0b0f86bcea2f658a', 'meghu80@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(796, 'Ankush Agarwal', NULL, 'ad0ebc03de5d85c7fbaa61af8cd38ca8', 'ankush.agarwal.2689@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(797, 'Sanket Bhende', NULL, '3a035bbdd94a609d697ee0b7f62ddfb1', 'bhende.sanket@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(798, 'mittal shah', NULL, 'f59cd8184f216f9ebecc3697b68de4c3', 'prymitt@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(799, 'sanket wagh', NULL, '2ac14a44491a6d2a68fab69ab5bc2848', 'wagh.sanket007@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(800, 'vijaylakshmi', NULL, 'dd8af5fefa2e3d540d5d6a451bbffce8', 'vijaylakshmi0611@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(801, 'nikarora', NULL, 'd476731b120bebaa05641514eef469be', 'nik.arora011@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(802, 'sumit', NULL, 'bbb46d0ec2322545a322fa5012dfa1a2', 'sumitbansal04@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(803, 'ishita', NULL, '04e6632d214d326fc33cbdcc68429a84', 'isharocks.aggarwal @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(804, 'Hritik Shah', NULL, 'e99ff7a6c4484f342d82233317fcb74a', 'hritikrockz@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(805, 'asdfg qwerty', NULL, '76419c58730d9f35de7ac538c2fd6737', 'manishjain01234@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(806, 'kruti sheth ', NULL, '342000dae054d06390f83c617c1c80d0', 'kruti018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(807, 'Aarti Deepak Shah', NULL, 'e5ec59c6410eca103de911c7901177bf', 'Aarti dosh @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(808, 'Ankur Ghosh', NULL, '624976c9d720e069aba792427e17cc13', 'ghoshankur.89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(809, 'rituparna sen', NULL, 'df278b2e9d85526aed070ba45b8912ef', 'rituparnasen19@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(810, 'rituparna sen', NULL, '441b473dc0484bc52be92d7a2d285bf5', 'rituparnasen19@yahoo.con', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(811, 'mshah', NULL, '1511592f2614be098bf43f3667bc80d7', 'maanc04@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:43', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(812, 'Dharmin Sheth', NULL, 'd34cba6efc1b7a951c3fbee28236d441', 'shethdharmin@gmail.con', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(813, 'Harshit Shah', NULL, 'c27ba887fb1ea9413d06de83236f4eaa', 'harshit.d.shah@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(814, 'Anshul jain ', NULL, '2e56b2537cdc63a13841d4ca828a90fe', 'anshuljain.nmims@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(815, 'Deepali', NULL, '19793dd31f8bf3ebe2121bd33c1c4dc5', 'deepalisinghal13@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(816, 'shruti', NULL, 'd2b8483c6b2cbfed6d5ba6760b31148e', 'doshishruti@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(817, 'preeti jayesh bhansali', NULL, '18eebfbdc8cac206b6dfd0ae406096b6', 'bhansalipreeti14@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(818, 'Darshita Vakharia', NULL, '3e181972e60d29ad7c0b6838875b7994', 'darshitav15@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(819, 'om', NULL, '9f9ffd6e9567fc1c60795d74f8135c5d', 'opmaurya5@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(820, 'lakshminarayanan', NULL, 'e4ea11be770ecdca31ebb5b095c8fd0c', 'Chakravarthysogathur@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(821, 'shahabuddin', NULL, '4bc38313af4342e20f2fb6e61014a008', 'sk.khan829282@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(822, 'Gauri', NULL, 'aa37c325878741b1e593794e24f76d0c', 'gaurisarda89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(823, 'Pankul Kohli', NULL, '76c48695c48e0639a07d4e081c7657c4', 'pankul.90@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(824, 'Mihir Joshi ', NULL, 'ceba5843e70d470a18b55e502b83a96c', 'M@dijma.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(825, 'pranav maru', NULL, 'cad89ffe7838c6264de3b0a07a13c4c7', 'pranavmaru_17@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(826, 'Pratik Malkar', NULL, '9a6658b84063801b7a91b50e23e0b5b3', 'pratikmalkar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(827, 'Vishal thakkar', NULL, '57e31b448219e43425f1b7aa57d85991', 'vishal_jt@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0);
INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`, `logo`, `showwebsite`, `eventsheld`, `topeventlocation`, `brandid`, `storeid`) VALUES
(828, 'mansi savla', NULL, '594b7526e27c6043f1ec81492992fd82', 'mansi8805@gmail.com"', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(829, 'Dhaval Patel ', NULL, '5f9fc4fe1f5a0fba4e8de30a8c158e09', 'dhavalpatel234@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(830, 'monisha', NULL, 'a7a1649f2191790fb7c80e8ff15f018a', 'monisha.parekh4@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(831, 'hd', NULL, '388afb322747c48d0095f280f8dd8367', 'harshildesai26@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(832, 'Vinyl', NULL, '837b5d6c093fad8b64eb8cb92067bee4', 'vinil.virus@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(833, 'Mansi', NULL, '1a063a10c7894ac47bd38170b6f2d670', 'mansi_sp@yahoo.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(834, 'Raj Gandhi', NULL, 'b77f728701c4aeb26d6a7d613059630b', 'raj.b.g94@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(835, 'heena boria', NULL, 'd05fd8e44cd8f9ea051d2d85eb14ad32', 'heenaboria@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(836, 'divya', NULL, '6d13c822311b83b8bac9ff6a80850b74', 'haryani.divya09@gnail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:44', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(837, 'Apurva', NULL, '3175e902dd494300a50edb7acc218ca1', 'apurva.nadkarni@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(838, 'Esha Vora', NULL, 'fa20b536e7ebf1da9c797f1f10bf7454', 'esha_koolfriends@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(839, 'Kashyap ', NULL, '4c7ccadf51b9bf699e50d8b5fdba5845', 'gada.kashyap@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(840, 'Alka Naresh Shridharani', NULL, '03a35248544bc15e71e95ede369eff82', 'poojanhandartsalka@live.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(841, 'dolly shah', NULL, 'c1b35e92a7728ba73f3e98b77df6cc8c', 'dollyshah27 @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(842, 'dolly shah', NULL, 'c1b35e92a7728ba73f3e98b77df6cc8c', 'dollyshah27@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(843, 'jenil doshi', NULL, 'a2c14ff5d9b1db5325b3a4d686e059c7', 'doshijenil@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(844, 'Sumeetsingh Punjabi', NULL, 'c44f098e4dcecbc9a2d7448519a917a6', 'sumeet1503@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(845, 'namit jain', NULL, 'dc7cd2ca29935f3e5ebbc73362b92728', 'jainnamit211@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(846, 'neha gandhi', NULL, '93da579a65ce84cd1d4c85c2cbb84fc5', 'neha.gandhi67@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(847, 'Yash Bavishi', NULL, '873982febe661e2f0ee4c05764103e61', 'yashbavishi@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(848, 'radha shah', NULL, '4f4e483c70c3cc017c607e8e1080a095', '12radhashah@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(849, 'Jigna', NULL, '43e71ae1236b5559b1624830b86270f5', 'jigna2110@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(850, 'lalita', NULL, '88cf8c37f3f661561e1395bb0dc1ab5d', 'lalita.parthsarthi@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(851, 'Suraj Dusra', NULL, 'ec3ca644332c802551e69070b07df9f8', 'surajdusra@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(852, 'kruti karia', NULL, 'd901c8dc88cd3531e197ffb41b2217c6', 'kruti410@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(853, 'kiruthika', NULL, 'b2fe440cb7a0b127f1a90ffea296313b', 'thulasiramkiruthika @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(854, 'Ravi Agrawal', NULL, '3ae3af2b02e7c5ceb4a47b7d0699ca3c', 'ravikeshavite@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(855, 'kanishk singh', NULL, 'dbc37b244583c8e80601aa03002ccf67', 'luv_kanishk17@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(856, 'Akshay Peshwe', NULL, '5a726f9c9e223b7da257da3f8a46b370', 'akshay.peshwe@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(857, 'shalini tigga', NULL, '33df3dfa770d3883050869c8d1d4b19f', 'shalinitigga17@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(858, 'Purav mehta', NULL, '8d426b992c57ab08cef1ebb8a8381080', 'mehtapuravr@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(859, 'aniket', NULL, '892eca9d49b4643e70f1aadb930ceaf0', 'aniketkvct@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(860, 'Deep Kalaria', NULL, '7f106e2eb124c9b7ff58c3e320b00ed2', 'deepnk007@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(861, 'Kevin Bheda', NULL, '912ec803b2ce49e4a541068d495ab570', 'kevinbheda@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(862, 'Mihir', NULL, 'ceba5843e70d470a18b55e502b83a96c', 'Mihir777@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(863, 'Dhara sheth', NULL, '42de2e4e9029da0350a8a553d2c12228', 'dhara.sheth91@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(864, 'Sneha', NULL, '3f6a260a31a4382adfbec08e927f389d', 'snehabmehta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(865, 'Divya', NULL, '153cd376003f87e4d12798aa6524965c', 'ddsamsungdd@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(866, 'Rithesh Kumar KV', NULL, 'caec331c5d7110ecba55f981a2166b8f', 'ritheshkumar88 @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(867, 'sushma', NULL, '7c30bf4af880623650d8a5e8f2fada5f', 'sush90@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(868, 'Hina sheth', NULL, 'e807f1fcf82d132f9bb018ca6738a19f', 'shethhina614@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(869, 'shweta', NULL, '1382d71ddf23d765d9fcee3bd851c4c6', 'shwe2.kamath@Gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(870, 'Pranav Sheth', NULL, '9e1135ff4157f14358c7c94c79aad47d', 'spranav11@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(871, 'Disha Shah', NULL, 'c0bbdd586b16a3ff62cd35c7f20665df', 'disha.2992@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(872, 'Raghav Saxena', NULL, 'eea00f6d8737d105cfdcc1eef4663f63', 'raghavsaxena2610@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(873, 'alpesh sheth', NULL, 'b877ef72add4184ca02cf2dd8ddf80dd', 'alpeshmsheth1964@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(874, 'Oswald Parmar', NULL, '43e71ae1236b5559b1624830b86270f5', 'Oswaldparmar@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(875, 'Pratik Ahuja', NULL, '73007fe6a84098427f8d51caa2629b44', 'Pratikahuja7@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(876, 'Deepesh  Kishnani', NULL, '5f1b609d13a0818d1fa1e00b74db412f', 'kishnanideepesh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(877, 'Arpit Chhabra', NULL, '6efec8b0cb2ca37e772943a76c7531e4', 'Arpitchhabra10215 @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(878, 'Himanshu Shah', NULL, '20cbf3885bcc646f14410e6b4b6fd2f3', 'himanshusshah@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(879, 'Surya Chauhan', NULL, '3c06e566d240fdddaaa7d08676a11003', 'sssuryappp@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(880, 'Aiswarya Ramakrishnan', NULL, '12f5dec597bf0db843bc1db961dbb2e9', 'Aiswarya.iyer@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(881, 'sagar hedau', NULL, 'ee7b19dbee6452e6d17d9322ddd5eeee', 'sagar.oceanland@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(882, 'Kesha Doshi', NULL, 'c079b759e899a55a95f60092ab1dbcc7', 'doshi.kesha@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(883, 'faeriephyo', NULL, '3f14dca7d38a2a6797e661e8477c44f0', 'genfaerie4596@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(884, 'Pulkit neema', NULL, '1dfbdb3f2c898431df7bfc6c7c71ebd1', 'Pulkit neema@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(885, 'Ricky', NULL, '55c00988c55a6a11de50732a5fd66f05', 'Ricky.rohra3011@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(886, 'ashish', NULL, 'd3437015d920ee576bd89225084a8f1f', 'ashish.jethwa1@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(887, 'chinmay agrawal', NULL, '72264e113943a77136e9a82eecd01274', 'chinmay@abhinavdyes.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:46', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(888, 'ashwani ', NULL, 'fcc27c2b2ecc50c6d44e1560eb89a961', 'ashwaniraturi@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(889, 'Leslie Lobo', NULL, 'cab3394b58a9cdf7b7046ce0140c8c55', 'Mr.leslielobo@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(890, 'Samvida Nanda', NULL, '16515b19f7fb4f7d765dbf5bf6489009', 'samvida@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(891, 'chirag', NULL, '5e1728ae3b53d8ead2cc33d18bbc5d35', 'chirag.a.gupta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(892, 'wohlig', NULL, 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(893, 'Jitendra Chittoda ', NULL, '73a0d07b829c4a9d844e66ec50ad2e72', 'Jcchittoda@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(894, 'Yash', NULL, '26846910be725c00735fbe28e5a600e5', 'yg2050@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(895, 'sanjukta', NULL, 'ace5edc4800d1e305d45767a2be6b098', 'sanjukta05@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(896, 'leolunlun', NULL, 'a759695ce0e331bd35db93137673cd87', 'leolunlun@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(897, 'nishchay sharma', NULL, 'd2feb9b6718bb374dfdd689380676954', 'nishchay.sharma@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(898, 'anju dubey', NULL, '07579b20a23ec1eb7415e01b94724338', 'anjudubey1961@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(899, 'Abi ', NULL, '8ac5d063774d6e11d6302f288e28f6ba', 'abityros@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(900, 'Rahul Mukhija ', NULL, 'b3e0fbfcfedd48e9538401d7cf3fbedc', 'Mukhija.rahul10@Gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(901, 'priyal', NULL, '32015fa6a528c4f561301ed99c4dd242', 'priyalagrawal@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(902, 'Disha', NULL, '025d9c495d10f4b8da3da44e116be697', 'devnani.Disha@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(903, 'Aditi Bhende', NULL, 'b95e74d7f392f4ef777dcadd06a947a4', 'aditi.bhende2289@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(904, 'Sanket Bhaud ', NULL, '81c6fa745434534c4a9633ad8c08506a', 'Sanketbhaudmostwanted@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(905, 'kumar rishi', NULL, '7870ed5ade97fa249c308ef951575621', 'kumarrishi2007@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(906, 'Pravesh Anand', NULL, 'b2fe440cb7a0b127f1a90ffea296313b', 'anand.pravesh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(907, 'Vedanta', NULL, 'f697f8165a28d132650a37c708ea1366', 'vedantakumar@gmail. com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(908, 'vishal', NULL, '8b64d2451b7a8f3fd17390f88ea35917', 'vishal.jajodia@rediffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(909, 'Devang Shah', NULL, 'e19d5cd5af0378da05f63f891c7467af', 'Dshah3@Gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(910, 'devanshi vora', NULL, '08c923c409b0ef1158b4c16e9044b4fd', 'devanshi.vora8@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(911, 'shafali', NULL, 'bbb8c25b4a7cefb00dd247ecf5ca67cb', 'shafiinsan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(912, 'Kushal shah', NULL, 'ba0a882312d543d8d1794603d40205cb', 'kushshah_cooldude@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(913, 'Tanushree Narayan Bhilare', NULL, '6b1003092685fdaaf34f290dab2fed9a', 'tanu.bhilare@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(914, 'saloni', NULL, '4771e2f53f8e1a73f2d5c140afe121aa', 'sanghvi_saloni@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(915, 'xyz', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'abcde@xyz.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(916, 'abc', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'abc@xxx.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(917, 'Andrey ', NULL, 'ee3a63b7ebebda3c480e453b63bf3d15', 'bitgriff@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(918, 'Sunil Mittal', NULL, 'a346b662f5d0800c559978c4cabcabf1', 'sunilmittal2056@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(919, 'Arpan shah', NULL, 'ccb7f7e1af167d20382d0dd3fe661e8f', 'shah.arpan@ymail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(920, 'Darshan Patnekar', NULL, '1e6c3332520bf1271a620deac7a8420d', 'darshanpatnekar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(921, 'j', NULL, 'e80b5017098950fc58aad83c8c14978e', 'shahjaykiran@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(922, 'Madhu', NULL, '48f42ebdd9f2070f23873f3020846966', 'madhusheth56@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(923, 'armaan', NULL, 'd0da899102f032e8672a6628c892fd73', 'armaan.mann89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(924, 'Ankur Chheda', NULL, 'd01b8030b02c352390bd7b19ddfee6f6', 'chheda_ankur@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(925, 'Dr. Saurabh Gogri', NULL, 'c10d592e70fe0f64d5ec33de9e0adf94', 'dr.saurabhgogri@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(926, 'Shahil bheda', NULL, 'ab0eb768de486ccf91bbbf3258b22071', 'coolfolks88@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(927, 'charul', NULL, '7711c9fba59f0724672d5f9f54889994', 'charulvora14@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(928, 'kruti', NULL, '3db001a275e7a46c7b5db1a1be1ca03e', 'kruti_13s@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(929, 'akshay.sahane', NULL, '48f42ebdd9f2070f23873f3020846966', 'akshaysahane@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(930, 'Devashree Gokhale', NULL, 'd333df89d0bdeec846d6419db84e35c2', 'devu806@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(931, 'Paresh Sukhija', NULL, 'a906449d5769fa7361d7ecc6aa3f6d28', 'pmsukhija@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(932, 'Heer doshi', NULL, 'c852e221e9251cfe22d8cea5aabf960f', 'doshi.heer@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(933, 'Dhaval Ved', NULL, '461b79a74ad074243c22b07995b9653a', 'ddved87@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(934, 'priyal', NULL, 'd0bb80aabb8619b6e35113f02e72752b', 'doshi.priyal66@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(935, 'naren', NULL, 'bc3cc5db6bc6041e77d37a99c86254b9', 'dizzynaren@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(936, 'Mitul Desai', NULL, '91440f5ca1aaa7e2fe2774432bb72829', 'mitul56@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(937, 'VARTICA KHANDELWAL ', NULL, '9f59112f0c5d2541afe61256dea69b40', 'varticak2000@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(938, 'harishree dave', NULL, 'f7d6f9c2d8b849247b80a12defb23509', 'hrj_84@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(939, 'Sherri Williams', NULL, 'a80a9d8e7af986eae21a775acc15d017', '50caseyshamrock@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:48', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(940, 'Dhaval Shah', NULL, 'ca95163fe3542c43cac997a42c223d28', 'dhs_cam@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(941, 'hiren patel', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'hirenpatel2991@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(942, 'manabab', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'nanab@;$-$-$.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(943, 'urvi', NULL, '238ffe729942b76f365cce2dd1c1c09c', 'urvithakkar17@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(944, 'Gautam', NULL, '414ee2dc99bfcce4683e456eae2d9eaf', '108gautam@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(945, 'Sonia Dubey', NULL, '57274a9820798c947893db5b5e770520', 'dubeysonia@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(946, 'Nihar Ranjan', NULL, 'cde7a33accb8ab2e4365223c44bfff5a', 'NIhar.ranjan@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(947, 'Purav mehta', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'purav_12@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(948, 'Pankaj Teckchandani', NULL, '647a80446759f733a8d022000d15146b', 'pankaj.teckchandani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(949, 'Krishna', NULL, 'd85d5b3a97841fac029f7e4188cd1b47', 'krishnabhatia89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(950, 'abc', NULL, 'a134be952416f0445c770643369129ac', 'abc@me.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(951, 'Sheetal Anil Palav', NULL, '721827f0adba8b2b9f74afd761990540', 'sheetal.pallav@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(952, 'dhaval kenia', NULL, '40c22848deb786b45fc38b3d63af6043', 'keniadhaval@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(953, 'Drashti', NULL, '6bb0231ca4674f90fd3eb00cbafe582d', 'hetvidoshi05@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(954, 'grish', NULL, 'e36f85c06abe6bd5f26321ea43e1b22f', 'grishme@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(955, 'Rebekah Thomas', NULL, 'dd18d6f0536559b22d13967c5a655da0', 'rebekahtom@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(956, 'Arka Chatterjee', NULL, '462eeba7726d781c1a2e487c02de57f8', 'arka.chatterjee.kol@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(957, 'test@yahoo.com', NULL, '4f1d047c27dbb0db0c8e90d202cf9548', 'test@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(958, 'Abhinav Akash', NULL, 'cc9656ef010ab099e314db248b413e12', 'abhinavakash.4@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(959, 'ashish ', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'ashish.kaushal87@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(960, 'Joanne carr', NULL, 'dc0e46b34f66f6f422e5ecd110100191', 'j_ec@live.co.uk', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(961, 'vaibhav', NULL, 'fdb713dae7eb0c79483023d7d8c13a8e', 'vaibhav.02@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(962, 'Chinmay Ghag', NULL, '72264e113943a77136e9a82eecd01274', 'chinmayghag08@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(963, 'jayde', NULL, '994da91d2d385f2e0fced1962e4dda13', 'jaydeelizabeth@live.com.au', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(964, 'melina Sickelko', NULL, '7622784557beeec5def0a1cd5b1d6cfb', 'lini.berlin@hotmail. de', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(965, 'Deep', NULL, '7744d069b7185d408bce2584c05991a8', 'deepshah99@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:49', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(966, 'kapil thakkar', NULL, '2c5ba883eea33abe6d0dbbb82149be27', 'kapilpthakkar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(967, 'kapil', NULL, '0340ca278ff74b88d84914ec9305bc8b', 'kapilpthakkar@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(968, 'vi sri', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'vishruts@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(969, 'sangeetha holla', NULL, 'e2ef2639c79efa66f5f9129058ba6fa8', 'hollasangeetha2@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(970, 'nagaraj', NULL, 'a2156c703623b44245c40ee41bf38255', 'nagaraghvav007@Gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(971, 'nagaraj', NULL, '964c52932aaa0716bde3aaa3df0869b3', 'nagaraghav05@email.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(972, 'Sagar Bhambhani ', NULL, 'a723a542631b472525fae3a884792e1d', 'bhambhani.sagar@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(973, 'bhavyan', NULL, '3a705d770f4256e3f222714324bbbf50', 'bhavyandalal@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(974, 'Sanidhya Singh', NULL, '554797720677b89d22141f1819427eff', 'sanidhyasingh2010@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(975, 'ritu sharma', NULL, 'b8ca92ed88f9970881d401f3e013bd69', 'ritunovember21@yahoo.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(976, 'Adrita Guha ', NULL, '9f4fb5a82a4a5769290eb72ab1a0d175', 'adi.2606@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(977, 'nivedita', NULL, 'df85d9fd4a9b27826a1591ffc8c2125e', 'niveditasharma56@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(978, 'Rushikesh Khadsare', NULL, '0f0dcc8a14693bbbc0c76db1fd2e9e2e', 'rkhadsare@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(979, 'nasta', NULL, 'dee61b20764ef5ede7e2b055a2a793ed', 'nastatk@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(980, 'Bhavin Gala', NULL, '9ea7b63dcc08c3ec6b3f94027133435b', 'bhavinkgala@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(981, 'Puja Parab', NULL, '26425a242d57365c89eaabac872bfc72', 'shennick123@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(982, 'aiza fatima', NULL, 'b6ffa0afd442f08409490a224086e1eb', 'aiza@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(983, 'harpreet kaur', NULL, '70d9000da399f94ef76467e251677f09', 'bahlharpreet@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(984, 'paroksha g', NULL, 'aead62af470c8fb9fb70fade75bdb8cb', 'luckyp9@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(985, 'paroksha g', NULL, 'aead62af470c8fb9fb70fade75bdb8cb', 'parokshag2913@email.iimcal.ac.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(986, 'test', NULL, '098f6bcd4621d373cade4e832627b4f6', 'abs@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(987, 'shreenika ', NULL, 'af116e3611532dcef89f849437ac3b4e', 'shreenika90@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(988, 'bijuli prasad lamichhane', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'mr.prasad.lc@gmail', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(989, 'bhangal', NULL, '63889cfb9d3cbe05d1bd2be5cc9953fd', 'bhangal123"', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(990, 'bijuli prasad lamichhane', NULL, '402bf16d5a18c732ee77279244da6e2c', 'mr.prasad.lc@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:50', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(991, 'Donna', NULL, 'b7ec4fbb6ab162808abb855e98fea404', 'donnaxday@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(992, 'Dr manini', NULL, '4940e575b8a13f27940ae70f9d7777c5', 'maninikhanolkar30@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(993, 'kirtikumar khandor', NULL, 'd612ca3e4ed03ff6f66841bcaa6c1d86', 'khandorkirti @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(994, 'bhupendra', NULL, '6bf90dda699ffbb65889c10e1534504b', 'b.c.jain76@gail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(995, 'Test app', NULL, '0d1db77ee324390a18cda6b3112df9c6', 'a4337627@trbvm.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(996, 'mehul', NULL, '465418db0817fc26ce2b7e1c4813ace1', 'MPalishwala@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(997, 'hardik shah', NULL, 'e5e7105d5c05d9c0cc5944ff1341b533', 'starenterprise05@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(998, 'hiren harilal tolia', NULL, '488f803da58b3261dd62e75d84f0ee24', 'ritahiren1983@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(999, 'Shaheen Chowdhury ', NULL, '8089aa30208fe314cc4b0892912bba1a', 'faithfth@live.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1000, 'hiren', NULL, '488f803da58b3261dd62e75d84f0ee24', 'moheri1983@Gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1001, 'Hardik', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'hardikrulz@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1002, 'mary ramsey', NULL, 'c41c2f467b9feb14c81fe8e76dc1a68f', 'mramsey387@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1003, 'salwa hartout', NULL, '28e5829f3dc1c70e7caae7e374c86305', 'hartout26@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1004, 'Abdulla', NULL, '8b6321eb55733b80c50ae8c78f663eaf', 'noveltysales54@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1005, 'ushappagoud', NULL, '2565c1294210fbdcacb813d7f88a860a', 'ushappagoud@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1006, 'Anahita Shaikh ', NULL, '31150d05542be8e85086acd235910c6b', 'shaikhanahita@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1007, 'indu kalpa deka', NULL, 'cb291e4cbc1ebc86a396891728136b71', 'ikdeka121@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1008, 'vamshi', NULL, 'ab4544f17885bebbc7d7ba7d0812843f', 'saivandith@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1009, 'jayashree', NULL, '2fa723575022b86fbe71f496ad3c2508', 'jayashreehansini@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1010, 'purvi', NULL, 'da3c061a4108173d4ccc24c0fe67f129', 'asharapv@refiffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1011, 'purvi', NULL, 'da3c061a4108173d4ccc24c0fe67f129', 'purviva@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1012, 'Mithlesh', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'mithleshsahani@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:51', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1013, 'Navin Kumar', NULL, '77e91ee1975714d9ad1c60799c6b58bd', 'navinkumar1690@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1014, 'Pratham', NULL, '4d04acbc2da1015f79ab2a4174b1ba6d', 'prakvt@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1015, 'shounak', NULL, '4a1971cebb3f3ed47c84617e582c1ee1', 'shounak_278@rediffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1016, 'deepak v mehta', NULL, 'dbcf3c23150eb931f859095240b288a6', 'Deepakmehta108@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1017, 'Ataullah Nasiri', NULL, '85118955a90b6c26af64b7e2dfada4bf', 'ataullah131@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1018, 'purvi', NULL, '7e41b623d7e1bfcf4c866e481da6f32a', 'punimehta_9@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1019, 'Rajavalli  ', NULL, 'd238e0d5942c7754b03c7e6e18684bdf', 'vallikrishna92@gmail.com  ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1020, 'Amit Singh', NULL, '1a98f2dc01e06e2da415661035608a35', 'abs.jbb87@gmaol.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1021, 'Amit singh', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'abs.jbb87@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1022, 's rakesh', NULL, '4c3194142ed596178e5bb21637a009dc', 's.rakesn839@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1023, 'Nikith', NULL, 'f258a2b0043b7fd545d76a7744e486ae', 'nikki.katta@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1024, 'ankita', NULL, 'd50e825eee69d53c2577aed74da78eee', 'anksjain25@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1025, 'Puneet Chawla', NULL, '07cea6aca3478e89c3103f2503a289c8', 'puneetkkumar1@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1026, 'Shashank singh', NULL, 'ce5dbaa2911e2e8d51af63794517bfe8', 'shashankautomation1311@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1027, 'Kingsley', NULL, '07ec3080804e4df6c50cc7180ed52c15', 'kingsley.manuel@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1028, 'NITISHA SABBAVARAPU', NULL, '3f8519808a84c77203adcc402a89bfcd', 'nitisha_s@live.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1029, 'Nitishasabbavarapu', NULL, 'c4819d06b0ca810d38506453cfaae9d8', 'nitishasabbavarapu@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1030, 'garima gupta', NULL, 'f29ed5973a43aac80bd4d1768b903e5a', 'guptagrm11@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1031, 'bharadwajcv', NULL, '2ef5327e29c35eabb410c9de01dee73e', 'bharadwajcv89@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1032, 'Prerna Somani', NULL, '5c2fdd296f23f0c522ee859a6b57c76a', 'prer20somani@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1033, 'udita', NULL, '25d55ad283aa400af464c76d713c07ad', 'udita19@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1034, 'Ramakrishna Reddy', NULL, '9493ae974e752b6910acee2ddb1dc3fe', 'ramakrishna688@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1035, 'rohit anand', NULL, 'cff7900417e43c59dd40d79a3ba9a420', 'rohitanand999@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:52', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1036, 'Hitesh', NULL, '7a868345b66dc40b1ae779ae2e00ddd8', 'satellihitesh88 @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1037, 'Goutham Raj T D', NULL, 'f1cefac1a8a2f7ee10b1ca659707d405', 'tdgoutham@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1038, 'kumat', NULL, '2128bbd1262b7e1be5122b1744b8f558', 'yavapraveen.yuva@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1039, 'sandeep dhruva', NULL, 'a8839f2f5d40885cfb4b03351706efde', 'sandeepdhruva@rediffmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1040, 'Siva', NULL, 'f0d39c791fe98b93463997f18e420b9e', 'mallisiva@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1041, 'sh', NULL, '8787c01f9ecbdfa4963433672fde2122', 'Shalini. hr @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1042, 'Arathi', NULL, '5d6af29b988c8678520b49555035287e', 'Arathi.anu@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1043, 'anuradha', NULL, '3d71b2a03e522721cd034dd5279d2008', 'banuradha538@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1044, 'Sophia Topiwala', NULL, 'b31bcf947cf58eb895064faeab502d93', 'sophiatopiwala@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1045, 'shanub', NULL, '53f1be25dc97e9c5d2e5d5d7f857797f', 'sidiq.shanub@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1046, 'chirag  Bhansali  ', NULL, '8ae6a31409fd924007fbeb53f88d795c', 'chirag_2793@yahoo.co.in  ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1047, 'Anjani', NULL, '2237978bce4736cf685bf7a9e1221174', 'chigurupatianjanin@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1048, 'Iftekhar Anam ', NULL, '1674e3f689cdd7421333e3cdfc3b5f6b', 'ifte.anam@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1049, 'sameer', NULL, '705db102503cda59e58e36f116b2fd29', 'sameerpadhee27@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1050, 'Mitesh', NULL, 'd0e5a93a5a229f55b8904dee7dcc969b', 'mhk_fishy@hotmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1051, 'patty', NULL, 'ffc150a160d37e92012c196b6af4160d', 'paty.silva.hudson@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1052, 'Saurabh Gurgule ', NULL, '8eb7599fe8fde70520e4de8fcd153e0f', 'saurabhgurgule@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1053, 'mayur patil ', NULL, '464359b8ca0ca863a7b596aaeb83e55f', 'mayurcool71@Gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1054, 'manvi', NULL, '417184b6d3e7fb9d4e55a969cf68dd94', 'girlontop223@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1055, 'shalu', NULL, '3fcef4efa5b78fd72342d579ab528bae', 'shaluyadav43@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1056, 'Sheekha Panwala', NULL, '01d4dd14ba16ab4de282b95cb2d4d6ce', 'Sheekha.panwala@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1057, 'amy longbine', NULL, '88c45b3f0a2de365dc255b4d04251324', 'longbinea77@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1058, 'brands factory fz', NULL, '5d8ab71b5531782ddf064c2c839e705c', 'ferozcls12@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1059, 'sravanthi', NULL, '84399c452d6d40fb2005aa7126ac6cf1', 'rokkamsravanthi.rs@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:53', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1060, 'lokesh', NULL, '6d05f3cc0a77a0791f184fe1772f8d4e', 'lokeshsn33@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1061, 'anurag', NULL, 'a4fa882822d231984c2fd0c786a742bb', '4anuragjat@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1062, 'ajay deoras', NULL, '29e457082db729fa1059d4294ede3909', 'ajaydeoras@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1063, 'lokesh chaudhary', NULL, '620b0d35e416784bdf9438728096501f', 'chaudhary. lokesh @gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1064, 'lokesh chaudhary', NULL, '620b0d35e416784bdf9438728096501f', 'chaudhary.lokesh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1065, 'Nikita Shah', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'nikitashah1@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1066, 'Megan Healy', NULL, 'fbf118e04d743621c96006e8486a7f50', 'uglyestgirl1996@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:54', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1067, 'harsh', NULL, '71eb74aec16f233fc0b5e0785e32a39f', 'hvr995@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1068, 'khale moha', NULL, '9f1019eeb4f3b35a43241388c227be57', 'eqtsa3@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0);
INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`, `logo`, `showwebsite`, `eventsheld`, `topeventlocation`, `brandid`, `storeid`) VALUES
(1069, 'Gajendrasing indrasing girase', NULL, 'e1f6eef14e6f3c8ffc1a9d90010b0494', 'girase.gajendra@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1070, 'Aditi S', NULL, 'a2f2387c3a33cd28a3f6c23998392870', 'aditishanky@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1071, 'Toby Cohen', NULL, '03be6216d141edeb33e2782f43f9c2fb', 'tobycohen.tc@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1072, 'Dhiren Patel', NULL, 'ab48b4309fcbc07dbada7f70f6104586', 'dhiren.patel228@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1073, 'sampaddey', NULL, '810d146cebd5340c2233d5b19972781f', 'sampaddey74@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1074, 'ritu khatri', NULL, '1cdd540eb295a88ff12e3c86eb590f51', 'ritu_k05@yahoo.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1075, 'prem singh', NULL, 'c648f27e34a038e3e8929de70b008b57', 'premsinghrawat1976@gmail.com ashaprem', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1076, 'prem singh', NULL, 'c648f27e34a038e3e8929de70b008b57', 'premsinghrawat1976@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1077, 'Garima ', NULL, '671ca624d595d71c0ed79e2c80e69ba5', 'garimataneja94@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1078, 'jakkoju veerachary', NULL, '264f2fb9dbe90e9f9cc24d511043c7c0', 'prasunaveerachary@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1079, 'zhdhb', NULL, '90eebffcaaaee9243c2d2f6e52742e51', 'p2.iimc@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1080, 'Rajkumar Solanki', NULL, '55f9c405bd87ba23896f34011ffce8da', 'rajkumar.solanki@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1081, 'sarath kr', NULL, '7d7efa84f762f1dcd28a03fa94c25200', 'sarath.gang007@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1082, 'sheik', NULL, 'ca8dbea7bb6e48d87d75624aad5fc1ba', 'alatheef2013@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1083, 'mustafa', NULL, '7f4f3a1f1417fe0a25a6905cec8fad14', 'mostafa.mssd@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1084, 'Nikhil Garg', NULL, '1a11998e08452d20f2ed5dd94f1dc82a', 'gargnikhil.pec@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1085, 'Sarfaraz', NULL, '40a5d40902211f23da55c8a2492813bb', 'sarfaraziut@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1086, 'rupinder', NULL, '87dbeded819842a9eece8a95eb2a835d', 'rupinder4308@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1087, 'Narsimha rao', NULL, 'dc0995593f4a38cd9cb189a76cab865d', 'vahini_oils@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1088, 'sarita', NULL, '193cdaf367423f4f18bd78b30bef8224', 'sa27052005@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:55', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1089, 'elizabeth maldonado ', NULL, 'c0d69c1daaab062b5c8bda89d6a07b86', 'maldo.eliza@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1090, 'zalapushpabenhirabhai', NULL, 'fbb74df4a0f06fe50e640ddb60311f5a', 'pushpazala16@gmai.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1091, 'ram', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'ramsivatime@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1092, 'Yogesh Aggarwal', NULL, 'c341c34b5dfaeb2e53b5eb8a2ab3248e', 'yogeshaggarwal5973@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1093, 'Abhishek chorghe', NULL, 'f98dab3a76155b55850bca04f3e24d32', 'chorgheabhishek13@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1094, 'raval priya', NULL, 'fedc731f52cb15fea3cff24df16f244d', 'milanbhanderi49@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1095, 'Parth shah', NULL, 'ffb17a897dac9069c254135fd341d898', 'parthshah_999@yahoo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1096, 'Tora Bouye', NULL, 'ba2d50abbc5d07b8b372f0ef02c3b45a', 'bouye1976@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1097, 'firu', NULL, '7878cb5d8114ae56da36f5fcd11aa50e', 'mifiroskhan@hotmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1098, 'JIGNA Purohit', NULL, '34434aa532091a5298a24aaef3ba65af', 'jignapurohit30@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1099, 'Kunal T', NULL, '5a08912c83857eebd13aeef3904031fb', 'kunalt110@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1100, 'vikas', NULL, 'b81dafcd437e21322a1be19ba6109814', 'vikas.chester@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1101, 'Elkan mascarenhas ', NULL, 'b815d7c6f732b725fde5b75a1bbc7bd0', 'elkan.mascarenhas@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1102, 'Dilip', NULL, '7302a87f61142d860057018715735e98', 'dilipdnb@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1103, 'Vinamra jain', NULL, '4cfebfc77f6a656d9c0577d82c92291d', 'vinamra_jain1990@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1104, 'Viraj Sheth', NULL, '780698846286378bb3bdda9d29beff5a', 'virajsheth36@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1105, 'satya', NULL, '76334b7af2fb526c4982587879e95dcf', 'satyasmash@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1106, 'nipun mehta', NULL, 'fa1d87bc7f85769ea9dee2e4957321ae', '88.nipun@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1107, 'ymmuniraju', NULL, 'b0268e9831883a7a90f660845c87f00b', 'ymmuniraju1988@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1108, 'azetha', NULL, 'a4a724d8d7c41520a38fbd79c029ccb9', 'azetha.n@gmail.com ', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1109, 'Jim Stilwell', NULL, 'edad33a06f583630c523ee142a766aed', 'jstilwell@eplus.net', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1110, 't', NULL, 'e358efa489f58062f10dd7316b65649e', 't@g.c', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:56', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1111, 'lisha jith', NULL, 'fe4cbc2a2f9cadd430aa24a370c7c997', 'lishanjith@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1112, 'demo', NULL, 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1113, 'dhruv', NULL, '56bf377cae026633fe10d7401f40dbb4', 'dhruv@wohlig.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1114, 'sunil Choudhary', NULL, 'c3156642aa94dd7bee7d4e10fbc8b4c3', '773.sunil@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1115, 'Roopesh Kothari', NULL, '6c44e5cd17f0019c64b042e4a745412a', 'kothari.roopesh@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1116, 'arun kumar h d', NULL, 'f03aa658f6051190acdd7dfb396e6d35', 'arundrma@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1117, 'bhagyashree', NULL, 'dcb8f43e48b8d5cd3f578b0338dd4c04', 'bhagyashree.pawar12@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1118, 'Shradha Pradhan', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'shradhapradhan05@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1119, 'likhitha myana', NULL, '03662d1b24ddafdc9195d8605e2e2179', 'likhithamyana@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1120, 'amrita', NULL, 'eb715c31686ae68c21ae0647a1eec47a', 'ammritabakshi1221@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(1121, 'amrita', NULL, 'eb715c31686ae68c21ae0647a1eec47a', 'amritabakshi1221@gmail.com', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 4, '2014-12-09 12:04:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `fromuser` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `fromuser`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 6, 6, 'User Details Edited', '2014-09-23 06:13:40'),
(7, 14, 1, 'User Details Edited', '2014-10-07 08:53:16'),
(8, 14, 4, 'User Details Edited', '2014-10-07 09:26:45'),
(9, 52, 6, 'User Created', '2014-10-18 09:29:47'),
(10, 53, 6, 'User Created', '2014-10-20 10:47:36'),
(11, 5, 6, 'User Details Edited', '2014-12-09 11:15:09'),
(12, 5, 6, 'User Details Edited', '2014-12-09 11:15:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandcategory`
--
ALTER TABLE `brandcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandlike`
--
ALTER TABLE `brandlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventlog`
--
ALTER TABLE `eventlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagegallery`
--
ALTER TABLE `imagegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall`
--
ALTER TABLE `mall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuaccess`
--
ALTER TABLE `menuaccess`
  ADD PRIMARY KEY (`menu`,`access`);

--
-- Indexes for table `newin`
--
ALTER TABLE `newin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricerange`
--
ALTER TABLE `pricerange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopclosed`
--
ALTER TABLE `shopclosed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingbag`
--
ALTER TABLE `shoppingbag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storecategory`
--
ALTER TABLE `storecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storeimagegallery`
--
ALTER TABLE `storeimagegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storenewin`
--
ALTER TABLE `storenewin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storeoffers`
--
ALTER TABLE `storeoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storerating`
--
ALTER TABLE `storerating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=474;
--
-- AUTO_INCREMENT for table `brandcategory`
--
ALTER TABLE `brandcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=548;
--
-- AUTO_INCREMENT for table `brandlike`
--
ALTER TABLE `brandlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `eventlog`
--
ALTER TABLE `eventlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `imagegallery`
--
ALTER TABLE `imagegallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `mall`
--
ALTER TABLE `mall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `newin`
--
ALTER TABLE `newin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pricerange`
--
ALTER TABLE `pricerange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shopclosed`
--
ALTER TABLE `shopclosed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shoppingbag`
--
ALTER TABLE `shoppingbag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `storecategory`
--
ALTER TABLE `storecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `storeimagegallery`
--
ALTER TABLE `storeimagegallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `storenewin`
--
ALTER TABLE `storenewin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `storeoffers`
--
ALTER TABLE `storeoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `storerating`
--
ALTER TABLE `storerating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1122;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
