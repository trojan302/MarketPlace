-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 05:45 
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `id_session` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `initial` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `initial`, `name`) VALUES
(1, 'CK', 'Cungkok Kotak'),
(2, 'FU', 'Full Ukiran'),
(3, 'UK', 'Ukiran Kayu'),
(4, 'TSP', 'Transparan'),
(5, 'KS', 'Klasik');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_member` int(11) NOT NULL,
  `initial` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `initial`, `name`) VALUES
(1, 'USR', 'User'),
(2, 'DL', 'Daelers'),
(3, 'ADM', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `from_user` varchar(225) NOT NULL,
  `to_user` varchar(225) NOT NULL,
  `body` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `from_user`, `to_user`, `body`, `view`, `date`) VALUES
(1, 'USR-0406-17-1', 'USR-0414-17-4', 'Terimakasih telah melakukan transaksi di situs kami. Barang yang anda pesan akan segera kami proses. Untuk pertannyaan lebih lanjut silahkan hubungi kami via messager yang telah kami sediakan.', 0, '2017-05-22 23:31:39'),
(2, 'USR-0414-17-4', 'USR-0406-17-1', 'Ahahaha', 0, '2017-05-22 23:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id_order` varchar(30) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `out_of_date` date NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_product`, `id_user`, `qty`, `size`, `account_name`, `amount`, `tax`, `total_price`, `out_of_date`, `order_date`, `status`, `deleted`) VALUES
('ORD-0523-17-1', 'DLR-0504-17-2', 'USR-0406-17-2', '1', 'Medium', 'ratnasetyaningrum', 456000, 13680, 478800, '2017-05-26', '2017-05-23', 1, 0),
('ORD-0523-17-2', 'PRD-0523-17-6', 'USR-0406-17-2', '1', 'm', 'ratnasetyaningrum', 1350000, 40500, 1417500, '2017-05-26', '2017-05-23', 1, 0),
('ORD-0523-17-2', 'PRD-0523-17-5', 'USR-0406-17-2', '1', 'L', 'ratnasetyaningrum', 1350000, 40500, 1417500, '2017-05-26', '2017-05-23', 1, 0),
('ORD-0523-17-3', 'PRD-0523-17-6', 'USR-0406-17-2', '1', 'm', 'ratnasetyaningrum', 600000, 18000, 630000, '2017-05-26', '2017-05-23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `images` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `equity` double NOT NULL,
  `price` double NOT NULL,
  `created` date NOT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_user`, `name`, `images`, `stock`, `id_cat`, `size`, `equity`, `price`, `created`, `updated`) VALUES
('DLR-0504-17-1', 'USR-0406-17-2', 'Kandang Pleci I', 'http://localhost/market/assets/images/product-img/DLR-0504-17-1-Kandang-Pleci-I.jpg', 4, 1, 'Medium', 350000, 450000, '2017-05-04', NULL),
('DLR-0504-17-2', 'USR-0414-17-6', 'Kandang Pleci II', 'http://localhost/market/assets/images/product-img/DLR-0504-17-2-Kandang-Pleci-II.jpg', 9, 1, 'Medium, Large', 350000, 456000, '2017-05-04', NULL),
('DLR-0504-17-3', 'USR-0406-17-2', 'Kandang Pleci Keren', 'http://localhost/market/assets/images/product-img/DLR-0504-17-3-Kandang-Pleci-Keren.jpg', 2, 1, 'Medium', 450000, 540000, '2017-05-04', NULL),
('DLR-0505-17-4', 'USR-0406-17-2', 'Best Of Kandang', 'http://localhost/market/assets/images/product-img/DLR-0505-17-4-Best-Of-Kandang.jpg', 2, 1, 'Medium', 430000, 475000, '2017-05-05', NULL),
('PRD-0523-17-5', 'USR-0406-17-1', 'Kandang Pleci Klasik', 'http://localhost/market/assets/images/product-img/PRD-0523-17-5-Kandang-Pleci-Klasik.png', 9, 5, 'M, L', 500000, 750000, '2017-05-23', NULL),
('PRD-0523-17-6', 'USR-0406-17-1', 'Kandang Pleci Kece Badai', 'http://localhost/market/assets/images/product-img/PRD-0523-17-6-Kandang-Pleci-Kece-Badai.png', 4, 5, 'm', 450000, 600000, '2017-05-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `struk_payment`
--

CREATE TABLE `struk_payment` (
  `id_struk` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_order` varchar(100) NOT NULL,
  `struk_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struk_payment`
--

INSERT INTO `struk_payment` (`id_struk`, `id_user`, `id_order`, `struk_image`, `status`) VALUES
(2, 'USR-0406-17-2', 'ORD-0523-17-1', 'http://localhost/market/assets/images/struk_payment/23052017123448-USR-0406-17-2-struk-payment.png', 1),
(3, 'USR-0406-17-2', 'ORD-0523-17-2', 'http://localhost/market/assets/images/struk_payment/23052017125335-USR-0406-17-2-struk-payment.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `id_order` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `gross_income` int(11) NOT NULL,
  `net_income` int(11) NOT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `id_order`, `id_product`, `id_user`, `gross_income`, `net_income`, `date_transaction`) VALUES
(1, 'ORD-0518-17-1', 'DLR-0504-17-1', 'USR-0414-17-4', 472500, 450000, '2017-05-19 04:43:04'),
(3, 'ORD-0520-17-2', 'DLR-0504-17-3', 'USR-0414-17-4', 567000, 540000, '2017-05-19 20:20:23'),
(4, 'ORD-0523-17-1', 'DLR-0504-17-2', 'USR-0406-17-2', 478800, 456000, '2017-05-23 05:35:18'),
(5, 'ORD-0523-17-2', 'PRD-0523-17-6', 'USR-0406-17-2', 1417500, 1350000, '2017-05-22 18:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(30) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `firstname`, `lastname`, `address`, `zip_code`, `phone`, `email`, `id_member`, `created`, `updated`, `status`) VALUES
('USR-0406-17-1', '', '21232f297a57a5a743894a0e4a801fc3', 'ayu', 'aja', 'Jl. Ketepeng II N0. 9', 54126, '085878434313', 'ayuk@gmail.com', 3, '2017-04-06', '2017-05-21', 1),
('USR-0406-17-2', 'trojan302', '799fc1bc692718127091b554c336d108', 'Ratna', 'Setyaningrum', 'Tempuran, Magelang Kabupaten', 52461, '085743248560', 'ratnasetya209@gmail.com', 2, '2017-04-06', NULL, 1),
('USR-0406-17-3', 'kiting', 'ee11cbb19052e40b07aac0ca060c23ee', 'Faried', 'Aziez', 'Magelang', 52417, '081245678987', 'atlitgundu01@gmail.com', 1, '2017-04-06', NULL, 1),
('USR-0414-17-4', 'aisyahanjani', 'ee11cbb19052e40b07aac0ca060c23ee', 'Aisyah', 'Anjani', 'Borobudur, Kabupaten Magelang', 52456, '081245679909', 'aisyahanjani@gmail.com', 1, '2017-04-14', NULL, 1),
('USR-0414-17-5', 'nurrahmani', 'b007b7d6520a7b3dcccd2a1ec2891009', 'nur', 'rahma', 'pucang, secang', 56123, '086543276523', 'nurrahmani@gmail.com', 1, '2017-04-14', NULL, 1),
('USR-0414-17-6', 'roni_ronron', 'aa08769cdcb26674c6706093503ff0a3', 'Roni', 'Muhamad', 'Muntilan, Kabupaten Magelang', 52341, '081245670987', 'ronimuhamad@gmail.com', 2, '2017-04-14', NULL, 1),
('USR-0414-17-7', 'eunike', 'c3a20dd5b473c27e136a413ae4d8b8f0', 'eunike', 'novia', 'bogeman, magelang tengah', 56732, '08572543218', 'eunikenovia@gmail.com', 2, '2017-04-14', NULL, 1),
('USR-0423-17-10', 'yulianti.irwan', 'ee11cbb19052e40b07aac0ca060c23ee', 'Vera', 'Suryatmi', 'Jln. Antapani Lama No. 117, Makassar 49681, K', 41962, '(+62) 510 2493 9940', 'mulyono_usada@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-100', 'cengkir35', 'ee11cbb19052e40b07aac0ca060c23ee', 'Budi', 'Permata', 'Jln. Ki Hajar Dewantara No. 762, Bitung 93747', 25494, '0817 997 706', 'yuni_wibowo@gmail.com', 2, '2017-02-15', NULL, 1),
('USR-0423-17-101', 'cengkir302', 'ee11cbb19052e40b07aac0ca060c23ee', 'Budi', 'Permata', 'Jln. Ki Hajar Dewantara No. 762, Bitung 93747', 25494, '0817 997 706', 'budi_permata@gmail.com', 2, '2017-02-15', NULL, 1),
('USR-0423-17-102', 'ysaputra', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sabrina', 'Yolanda', 'Ds. Kali No. 836, Administrasi Jakarta Pusat ', 14418, '(+62) 997 4586 4955', 'virman_januar@gmail.com', 1, '2017-02-23', NULL, 1),
('USR-0423-17-103', 'cengkir37', 'ee11cbb19052e40b07aac0ca060c23ee', 'Amalia', 'Sitompul', 'Gg. Antapani Lama No. 611, Cilegon 71848, Sul', 32827, '(+62) 492 9287 236', 'farhunnisa_mustofa@gmail.com', 2, '2017-01-09', NULL, 0),
('USR-0423-17-104', 'ika09', 'ee11cbb19052e40b07aac0ca060c23ee', 'Elvina', 'Simbolon', 'Dk. Hasanuddin No. 932, Bitung 77696, Goronta', 47413, '(+62) 954 0402 401', 'elon_budiman@gmail.com', 2, '2017-04-01', NULL, 0),
('USR-0423-17-105', 'jsamosir', 'ee11cbb19052e40b07aac0ca060c23ee', 'Lalita', 'Aryani', 'Dk. Batako No. 125, Pekalongan 89158, SulTra', 87301, '(+62) 821 3338 737', 'prayoga_mustofa@gmail.com', 1, '2017-02-28', NULL, 1),
('USR-0423-17-106', 'kurnia.nurdiyanti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yessi', 'Agustina', 'Psr. Yos Sudarso No. 30, Padangpanjang 96047,', 89029, '(+62) 387 8891 4180', 'kayla_rahimah@gmail.com', 1, '2017-03-01', NULL, 1),
('USR-0423-17-107', 'chelsea.najmudin', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ciaobella', 'Hariyah', 'Psr. Gegerkalong Hilir No. 143, Mojokerto 568', 34049, '(+62) 767 9300 129', 'capa_dongoran@gmail.com', 1, '2017-02-07', NULL, 1),
('USR-0423-17-108', 'iwibisono', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hesti', 'Firgantoro', 'Gg. Jaksa No. 192, Padang 54414, NTT', 86244, '(+62) 410 0901 5054', 'zizi_ardianto@gmail.com', 1, '2017-01-26', NULL, 1),
('USR-0423-17-109', 'rama73', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sadina', 'Simbolon', 'Ds. Lumban Tobing No. 454, Jayapura 69584, Ma', 29621, '0610 5618 0122', 'kartika_puspasari@gmail.com', 2, '2017-04-07', NULL, 1),
('USR-0423-17-11', 'tkusmawati', 'ee11cbb19052e40b07aac0ca060c23ee', 'Salman', 'Hutasoit', 'Ki. Sukabumi No. 381, Tegal 35818, SulBar', 92876, '(+62) 29 4977 1621', 'jelita_astuti@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-110', 'zulfa06', 'ee11cbb19052e40b07aac0ca060c23ee', 'Paulin', 'Nababan', 'Dk. Imam No. 227, Blitar 82889, DKI', 83421, '0338 1461 096', 'ratih_saragih@gmail.com', 2, '2017-01-10', NULL, 0),
('USR-0423-17-111', 'aisyah59', 'ee11cbb19052e40b07aac0ca060c23ee', 'Farah', 'Hidayanto', 'Ki. Rajawali Timur No. 584, Tangerang 72926, ', 27668, '0411 1486 366', 'nasab_rajata@gmail.com', 2, '2017-04-01', NULL, 0),
('USR-0423-17-112', 'ulva90', 'ee11cbb19052e40b07aac0ca060c23ee', 'Lanjar', 'Laksita', 'Kpg. Reksoninten No. 309, Blitar 12147, KepR', 17883, '(+62) 388 1817 2140', 'paulin_tampubolon@gmail.com', 2, '2017-03-15', NULL, 1),
('USR-0423-17-113', 'futama', 'ee11cbb19052e40b07aac0ca060c23ee', 'Amelia', 'Iswahyudi', 'Kpg. Basoka Raya No. 896, Medan 54119, DKI', 80610, '(+62) 433 4321 894', 'ayu_mardhiyah@gmail.com', 1, '2017-04-12', NULL, 1),
('USR-0423-17-114', 'tarihoran.raihan', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ellis', 'Hastuti', 'Jr. K.H. Maskur No. 692, Palu 24861, Banten', 61135, '027 4569 8282', 'adiarja_nasyiah@gmail.com', 1, '2017-04-12', NULL, 1),
('USR-0423-17-115', 'saragih.padmi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ella', 'Siregar', 'Ki. HOS. Cjokroaminoto (Pasirkaliki) No. 130,', 73723, '(+62) 322 6150 298', 'adiarja_wijayanti@gmail.com', 2, '2017-04-14', NULL, 1),
('USR-0423-17-116', 'upradipta', 'ee11cbb19052e40b07aac0ca060c23ee', 'Candrakanta', 'Yulianti', 'Gg. Abdul. Muis No. 69, Administrasi Jakarta ', 56767, '(+62) 975 9231 400', 'alambana_firmansyah@gmail.com', 2, '2017-04-17', NULL, 1),
('USR-0423-17-12', 'eusada', 'ee11cbb19052e40b07aac0ca060c23ee', 'Carla', 'Hartati', 'Jln. Baranangsiang No. 627, Sorong 88774, BaB', 49090, '(+62) 533 6090 992', 'dina_usada@gmail.com', 1, '2017-04-23', NULL, 1),
('USR-0423-17-13', 'lestari.siti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Qori', 'Wijayanti', 'Gg. Basket No. 742, Pontianak 86362, JaTeng', 25037, '0410 3934 812', 'galar_ardianto@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-14', 'xlazuardi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ajeng', 'Utami', 'Dk. Fajar No. 120, Parepare 45765, SulBar', 38197, '0284 2709 2224', 'kani_purnawati@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-15', 'padmasari.anita', 'ee11cbb19052e40b07aac0ca060c23ee', 'Maryadi', 'Dabukke', 'Jr. Honggowongso No. 162, Palu 75366, Bali', 80153, '(+62) 366 5366 910', 'yuni_wahyuni@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-16', 'utami.olivia', 'ee11cbb19052e40b07aac0ca060c23ee', 'Putri', 'Sinaga', 'Kpg. Baranangsiang No. 576, Banda Aceh 56846,', 90057, '(+62) 999 6050 2446', 'muhammad_firgantoro@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-17', 'wulan19', 'ee11cbb19052e40b07aac0ca060c23ee', 'Uchita', 'Aryani', 'Psr. Ekonomi No. 328, Balikpapan 53061, NTB', 22627, '(+62) 505 7370 3681', 'cengkir_prasetya@gmail.com', 1, '2017-04-23', NULL, 1),
('USR-0423-17-18', 'artanto52', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hasan', 'Narpati', 'Jln. Jend. Sudirman No. 711, Gunungsitoli 380', 92080, '(+62) 28 9685 2616', 'azalea_winarno@gmail.com', 2, '2017-03-07', NULL, 1),
('USR-0423-17-19', 'suci23', 'ee11cbb19052e40b07aac0ca060c23ee', 'Zaenab', 'Melani', 'Jln. B.Agam 1 No. 433, Mojokerto 37684, PapBa', 61754, '0829 7687 7284', 'salsabila_purnawati@gmail.com', 1, '2017-01-07', NULL, 1),
('USR-0423-17-20', 'gilda.kusmawati', 'ee11cbb19052e40b07aac0ca060c23ee', 'Mustofa', 'Situmorang', 'Ki. Gedebage Selatan No. 275, Serang 72045, K', 39349, '0547 2452 1434', 'empluk_halimah@gmail.com', 2, '2017-01-09', NULL, 0),
('USR-0423-17-21', 'laksita.patricia', 'ee11cbb19052e40b07aac0ca060c23ee', 'Wasis', 'Aryani', 'Jln. Flores No. 897, Denpasar 50595, KalUt', 81092, '023 5218 542', 'wulan_latupono@gmail.com', 1, '2017-04-05', NULL, 1),
('USR-0423-17-22', 'paramita90', 'ee11cbb19052e40b07aac0ca060c23ee', 'Siska', 'Rajasa', 'Ki. Tentara Pelajar No. 126, Banjarmasin 3030', 88587, '(+62) 27 4270 279', 'galur_lailasari@gmail.com', 2, '2017-03-28', NULL, 0),
('USR-0423-17-23', 'wani.mangunsong', 'ee11cbb19052e40b07aac0ca060c23ee', 'Mila', 'Pudjiastuti', 'Jr. Rumah Sakit No. 445, Surabaya 75052, SulB', 14849, '(+62) 426 5436 4368', 'sabrina_ramadan@gmail.com', 2, '2017-04-10', NULL, 0),
('USR-0423-17-24', 'puspita.puji', 'ee11cbb19052e40b07aac0ca060c23ee', 'Irwan', 'Agustina', 'Dk. Sampangan No. 221, Prabumulih 78307, Aceh', 79619, '(+62) 318 4175 487', 'nyana_siregar@gmail.com', 2, '2017-01-06', NULL, 1),
('USR-0423-17-25', 'gnajmudin', 'ee11cbb19052e40b07aac0ca060c23ee', 'Harsana', 'Dongoran', 'Ds. Panjaitan No. 813, Subulussalam 59902, Ac', 59003, '0633 2797 924', 'zizi_ramadan@gmail.com', 2, '2017-04-05', NULL, 1),
('USR-0423-17-26', 'fujiati.vanesa', 'ee11cbb19052e40b07aac0ca060c23ee', 'Wirda', 'Rahmawati', 'Gg. Madrasah No. 154, Surakarta 42108, Lampun', 62590, '(+62) 486 5199 842', 'rika_zulkarnain@gmail.com', 1, '2017-04-12', NULL, 1),
('USR-0423-17-27', 'ajiono.nasyidah', 'ee11cbb19052e40b07aac0ca060c23ee', 'Prayitna', 'Pradana', 'Psr. Taman No. 749, Semarang 82352, DIY', 41850, '0243 6313 088', 'jindra_prasetyo@gmail.com', 2, '2017-04-04', NULL, 1),
('USR-0423-17-28', 'martani.narpati', 'ee11cbb19052e40b07aac0ca060c23ee', 'Nurul', 'Widodo', 'Kpg. HOS. Cjokroaminoto (Pasirkaliki) No. 752', 52716, '(+62) 819 4643 405', 'aditya_usada@gmail.com', 2, '2017-03-15', NULL, 0),
('USR-0423-17-29', 'susanti.bakti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yessi', 'Utami', 'Psr. B.Agam Dlm No. 503, Kendari 19893, KalTe', 45496, '0495 9142 6722', 'prayoga_farida@gmail.com', 2, '2017-04-17', NULL, 0),
('USR-0423-17-30', 'wmarpaung', 'ee11cbb19052e40b07aac0ca060c23ee', 'Aurora', 'Nasyidah', 'Gg. Sadang Serang No. 653, Depok 35154, Riau', 45630, '(+62) 876 7718 0982', 'rahayu_halimah@gmail.com', 2, '2017-03-21', NULL, 0),
('USR-0423-17-31', 'sirait.endah', 'ee11cbb19052e40b07aac0ca060c23ee', 'Danuja', 'Winarno', 'Dk. Jend. A. Yani No. 59, Kediri 56443, DKI', 59452, '(+62) 820 5069 636', 'mahdi_suryatmi@gmail.com', 1, '2017-03-14', NULL, 1),
('USR-0423-17-32', 'prasasta.caturangga', 'ee11cbb19052e40b07aac0ca060c23ee', 'Bahuraksa', 'Purnawati', 'Jr. Muwardi No. 724, Bogor 93176, Gorontalo', 26916, '(+62) 387 6756 618', 'karman_saptono@gmail.com', 2, '2017-02-03', NULL, 1),
('USR-0423-17-33', 'hidayanto.citra', 'ee11cbb19052e40b07aac0ca060c23ee', 'Raharja', 'Megantara', 'Jr. Salam No. 312, Cimahi 91110, Jambi', 62369, '0590 1802 910', 'mulyanto_lestari@gmail.com', 1, '2017-01-07', NULL, 1),
('USR-0423-17-34', 'kasim.mayasari', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kasim', 'Astuti', 'Ds. Raden No. 568, Probolinggo 65311, Aceh', 33414, '(+62) 975 6092 034', 'ibrahim_hakim@gmail.com', 2, '2017-02-17', NULL, 0),
('USR-0423-17-35', 'winarno.gina', 'ee11cbb19052e40b07aac0ca060c23ee', 'Paris', 'Pangestu', 'Jr. Gegerkalong Hilir No. 77, Administrasi Ja', 45923, '0572 7944 304', 'vicky_namaga@gmail.com', 2, '2017-03-08', NULL, 1),
('USR-0423-17-36', 'uchita25', 'ee11cbb19052e40b07aac0ca060c23ee', 'Gandi', 'Mahendra', 'Ki. Merdeka No. 769, Kendari 75697, Banten', 30342, '023 6496 990', 'restu_purwanti@gmail.com', 2, '2017-02-06', NULL, 0),
('USR-0423-17-37', 'fitria39', 'ee11cbb19052e40b07aac0ca060c23ee', 'Adikara', 'Dabukke', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 727,', 27050, '(+62) 228 5454 730', 'yuni_marpaung@gmail.com', 1, '2017-02-09', NULL, 1),
('USR-0423-17-38', 'januar.cahyono', 'ee11cbb19052e40b07aac0ca060c23ee', 'Suci', 'Sitorus', 'Ds. Tentara Pelajar No. 707, Palopo 84251, Ja', 15119, '0224 6789 284', 'kamaria_ramadan@gmail.com', 1, '2017-02-10', NULL, 1),
('USR-0423-17-39', 'ywaskita', 'ee11cbb19052e40b07aac0ca060c23ee', 'Oskar', 'Agustina', 'Jr. Cikutra Timur No. 995, Tarakan 93793, Sul', 63996, '(+62) 749 5319 9562', 'ella_prakasa@gmail.com', 2, '2017-04-11', NULL, 1),
('USR-0423-17-40', 'galang77', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hendri', 'Palastri', 'Ki. Mulyadi No. 247, Surabaya 67664, JaBar', 10817, '(+62) 990 9960 4863', 'lanjar_safitri@gmail.com', 2, '2017-02-26', NULL, 0),
('USR-0423-17-41', 'wirda63', 'ee11cbb19052e40b07aac0ca060c23ee', 'Vanesa', 'Siregar', 'Gg. Industri No. 163, Pariaman 77571, Papua', 10162, '(+62) 200 7723 538', 'gasti_samosir@gmail.com', 1, '2017-01-14', NULL, 1),
('USR-0423-17-42', 'najmudin.koko', 'ee11cbb19052e40b07aac0ca060c23ee', 'Darman', 'Najmudin', 'Gg. Camar No. 695, Padangsidempuan 24661, Sum', 89105, '0377 0815 111', 'farhunnisa_salahudin@gmail.com', 2, '2017-04-17', NULL, 1),
('USR-0423-17-43', 'zramadan', 'ee11cbb19052e40b07aac0ca060c23ee', 'Usyi', 'Hartati', 'Gg. Suryo No. 645, Sorong 25267, Banten', 21828, '0384 3955 753', 'yani_hutasoit@gmail.com', 2, '2017-03-05', NULL, 1),
('USR-0423-17-44', 'agnes69', 'ee11cbb19052e40b07aac0ca060c23ee', 'Umar', 'Palastri', 'Kpg. Villa No. 869, Surakarta 15262, JaBar', 22337, '(+62) 389 9947 738', 'galar_sihombing@gmail.com', 2, '2017-01-13', NULL, 1),
('USR-0423-17-45', 'padmasari.edward', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hamima', 'Januar', 'Jln. Babadan No. 472, Dumai 31168, KalSel', 79636, '(+62) 742 2670 449', 'titin_wahyudin@gmail.com', 1, '2017-02-22', NULL, 1),
('USR-0423-17-46', 'maida.mangunsong', 'ee11cbb19052e40b07aac0ca060c23ee', 'Dian', 'Mangunsong', 'Gg. Achmad Yani No. 660, Dumai 64019, KalBar', 99096, '0835 7474 598', 'calista_usamah@gmail.com', 1, '2017-04-04', NULL, 1),
('USR-0423-17-47', 'karma.samosir', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ajeng', 'Wibowo', 'Ds. Baung No. 920, Parepare 29333, NTT', 28420, '(+62) 26 2786 375', 'nadine_wahyuni@gmail.com', 2, '2017-03-03', NULL, 1),
('USR-0423-17-48', 'nova85', 'ee11cbb19052e40b07aac0ca060c23ee', 'Rini', 'Safitri', 'Jr. Sadang Serang No. 161, Solok 71250, Bengk', 12157, '(+62) 806 0416 199', 'mala_pratiwi@gmail.com', 2, '2017-01-07', NULL, 1),
('USR-0423-17-49', 'melinda.haryanti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Putri', 'Suwarno', 'Ds. Veteran No. 260, Metro 38056, BaBel', 43216, '0352 3677 014', 'dinda_uyainah@gmail.com', 1, '2017-01-21', NULL, 1),
('USR-0423-17-50', 'cmandala', 'ee11cbb19052e40b07aac0ca060c23ee', 'Galak', 'Sinaga', 'Ki. Laksamana No. 825, Tomohon 53725, SumBar', 41647, '0658 7316 8214', 'garang_pradipta@gmail.com', 2, '2017-01-10', NULL, 0),
('USR-0423-17-51', 'ypradipta', 'ee11cbb19052e40b07aac0ca060c23ee', 'Maya', 'Santoso', 'Ki. Sunaryo No. 691, Ambon 49435, KalSel', 65956, '(+62) 695 8914 858', 'imam_padmasari@gmail.com', 2, '2017-01-10', NULL, 1),
('USR-0423-17-52', 'kasiyah.situmorang', 'ee11cbb19052e40b07aac0ca060c23ee', 'Puspa', 'Mulyani', 'Jr. Mulyadi No. 614, Prabumulih 93914, Lampun', 38384, '0731 0964 680', 'zizi_anggraini@gmail.com', 1, '2017-01-23', NULL, 1),
('USR-0423-17-53', 'septi75', 'ee11cbb19052e40b07aac0ca060c23ee', 'Galih', 'Rahayu', 'Ds. Baiduri No. 692, Cirebon 13865, KalTeng', 25261, '0351 0379 0208', 'kiandra_puspasari@gmail.com', 2, '2017-04-01', NULL, 0),
('USR-0423-17-54', 'dadap12', 'ee11cbb19052e40b07aac0ca060c23ee', 'Aswani', 'Maryati', 'Ki. Sampangan No. 94, Palangka Raya 71423, Ka', 92494, '(+62) 991 5239 1604', 'sabri_saputra@gmail.com', 2, '2017-01-25', NULL, 1),
('USR-0423-17-55', 'npertiwi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Reza', 'Mardhiyah', 'Dk. Sutarjo No. 170, Ambon 66375, SulSel', 40146, '(+62) 396 1959 329', 'teddy_melani@gmail.com', 2, '2017-02-28', NULL, 0),
('USR-0423-17-56', 'bpranowo', 'ee11cbb19052e40b07aac0ca060c23ee', 'Unggul', 'Permata', 'Jr. Ciwastra No. 797, Bengkulu 92128, Papua', 68163, '(+62) 21 2727 4096', 'laksana_rahimah@gmail.com', 2, '2017-04-08', NULL, 0),
('USR-0423-17-57', 'mutia20', 'ee11cbb19052e40b07aac0ca060c23ee', 'Irfan', 'Ramadan', 'Kpg. Kyai Gede No. 207, Sungai Penuh 32767, L', 36266, '0829 7371 461', 'qori_sihombing@gmail.com', 2, '2017-04-01', NULL, 0),
('USR-0423-17-58', 'hasim41', 'ee11cbb19052e40b07aac0ca060c23ee', 'Maya', 'Anggraini', 'Dk. Baung No. 68, Pagar Alam 45611, KalSel', 63480, '(+62) 552 7817 050', 'prayogo_hasanah@gmail.com', 1, '2017-03-15', NULL, 1),
('USR-0423-17-59', 'raisa.jailani', 'ee11cbb19052e40b07aac0ca060c23ee', 'Cahyadi', 'Laksita', 'Gg. Cikutra Timur No. 950, Administrasi Jakar', 29662, '0845 4572 0472', 'wakiman_nashiruddin@gmail.com', 2, '2017-01-19', NULL, 0),
('USR-0423-17-60', 'palastri.jail', 'ee11cbb19052e40b07aac0ca060c23ee', 'Umi', 'Uwais', 'Gg. PHH. Mustofa No. 82, Gunungsitoli 55063, ', 87165, '(+62) 643 7673 797', 'kajen_tarihoran@gmail.com', 2, '2017-04-08', NULL, 0),
('USR-0423-17-61', 'karimah.simanjuntak', 'ee11cbb19052e40b07aac0ca060c23ee', 'Raden', 'Halimah', 'Ds. Imam No. 898, Surabaya 48860, SumUt', 38923, '0802 781 319', 'kenari_yulianti@gmail.com', 1, '2017-02-09', NULL, 1),
('USR-0423-17-62', 'paris.sinaga', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ellis', 'Novitasari', 'Gg. Sunaryo No. 127, Batu 69274, PapBar', 65365, '(+62) 722 7986 135', 'chandra_tampubolon@gmail.com', 1, '2017-04-09', NULL, 1),
('USR-0423-17-63', 'qnugroho', 'ee11cbb19052e40b07aac0ca060c23ee', 'Dodo', 'Novitasari', 'Jln. Banceng Pondok No. 57, Mataram 37929, Ka', 85515, '(+62) 20 1055 322', 'danu_firmansyah@gmail.com', 1, '2017-02-25', NULL, 1),
('USR-0423-17-64', 'paramita48', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hardana', 'Hakim', 'Jr. Aceh No. 388, Gorontalo 27669, Aceh', 34198, '(+62) 736 2061 0131', 'yance_dongoran@gmail.com', 1, '2017-02-24', NULL, 1),
('USR-0423-17-65', 'sarah80', 'ee11cbb19052e40b07aac0ca060c23ee', 'Restu', 'Kusumo', 'Jln. Bakti No. 235, Pontianak 80789, NTT', 84098, '0966 2510 0866', 'paiman_prastuti@gmail.com', 1, '2017-02-02', NULL, 1),
('USR-0423-17-66', 'sirait.damu', 'ee11cbb19052e40b07aac0ca060c23ee', 'Marsito', 'Nurdiyanti', 'Gg. Peta No. 826, Tanjungbalai 86939, SulUt', 59302, '(+62) 20 2131 764', 'ade_widodo@gmail.com', 2, '2017-02-04', NULL, 1),
('USR-0423-17-67', 'uda.kuswoyo', 'ee11cbb19052e40b07aac0ca060c23ee', 'Farhunnisa', 'Hassanah', 'Ki. Cokroaminoto No. 727, Mataram 71265, Lamp', 27293, '0708 7931 5128', 'febi_anggraini@gmail.com', 1, '2017-03-14', NULL, 1),
('USR-0423-17-68', 'unjani.samosir', 'ee11cbb19052e40b07aac0ca060c23ee', 'Cengkal', 'Halim', 'Psr. Flora No. 977, Kotamobagu 70558, Banten', 88016, '0729 9152 9900', 'eja_putra@gmail.com', 2, '2017-02-10', NULL, 0),
('USR-0423-17-69', 'hfirmansyah', 'ee11cbb19052e40b07aac0ca060c23ee', 'Tirtayasa', 'Zulaika', 'Psr. Basuki No. 33, Mojokerto 33031, SumBar', 36038, '0561 0798 636', 'ajimin_permata@gmail.com', 1, '2017-01-21', NULL, 1),
('USR-0423-17-70', 'jaswadi88', 'ee11cbb19052e40b07aac0ca060c23ee', 'Silvia', 'Nasyiah', 'Jln. Yohanes No. 540, Madiun 20471, Banten', 24277, '0907 8347 7843', 'restu_dongoran@gmail.com', 2, '2017-02-24', NULL, 1),
('USR-0423-17-71', 'wulandari.daruna', 'ee11cbb19052e40b07aac0ca060c23ee', 'Elisa', 'Haryanti', 'Ki. Achmad Yani No. 671, Bau-Bau 57868, Maluk', 60545, '(+62) 875 3399 0694', 'jono_farida@gmail.com', 1, '2017-04-20', NULL, 1),
('USR-0423-17-72', 'rahmawati.hani', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kiandra', 'Pratiwi', 'Gg. Salak No. 434, Cirebon 59545, KalTeng', 44854, '(+62) 676 5742 4819', 'salsabila_usamah@gmail.com', 1, '2017-01-12', NULL, 1),
('USR-0423-17-73', 'janet.haryanti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Daru', 'Zulaika', 'Kpg. Sumpah Pemuda No. 579, Administrasi Jaka', 50945, '0265 7611 6989', 'dadap_puspita@gmail.com', 1, '2017-02-14', NULL, 1),
('USR-0423-17-74', 'riyanti.cahyono', 'ee11cbb19052e40b07aac0ca060c23ee', 'Lala', 'Hidayanto', 'Jr. BKR No. 882, Pontianak 58390, JaBar', 90790, '(+62) 791 5874 405', 'maya_farida@gmail.com', 2, '2017-01-10', NULL, 1),
('USR-0423-17-75', 'faizah77', 'ee11cbb19052e40b07aac0ca060c23ee', 'Argono', 'Widodo', 'Jln. Arifin No. 47, Bandar Lampung 76436, Kal', 23739, '(+62) 864 0884 844', 'laras_maryadi@gmail.com', 1, '2017-03-24', NULL, 1),
('USR-0423-17-76', 'sihotang.amelia', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yahya', 'Uyainah', 'Kpg. Samanhudi No. 131, Pasuruan 33698, PapBa', 35674, '0357 6018 302', 'agnes_latupono@gmail.com', 2, '2017-03-05', NULL, 1),
('USR-0423-17-77', 'vicky.halimah', 'ee11cbb19052e40b07aac0ca060c23ee', 'Hardi', 'Kuswandari', 'Gg. Rajawali Barat No. 166, Pangkal Pinang 38', 18049, '(+62) 541 9549 4266', 'jamil_hidayat@gmail.com', 1, '2017-03-26', NULL, 1),
('USR-0423-17-78', 'klaksita', 'ee11cbb19052e40b07aac0ca060c23ee', 'Samiah', 'Mansur', 'Kpg. Ciwastra No. 19, Bandung 54304, Bali', 37820, '(+62) 806 5716 3745', 'putri_melani@gmail.com', 2, '2017-02-07', NULL, 1),
('USR-0423-17-79', 'johan74', 'ee11cbb19052e40b07aac0ca060c23ee', 'Dariati', 'Hartati', 'Jr. Badak No. 292, Sorong 44324, SulUt', 58520, '(+62) 362 8777 305', 'farhunnisa_nasyiah@gmail.com', 1, '2017-02-09', NULL, 1),
('USR-0423-17-8', 'wahyuni.irma', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ophelia', 'Halimah', 'Jr. Kalimalang No. 867, Bengkulu 43557, NTB', 31988, '020 0958 626', 'wira_prakasa@gmail.com', 2, '2017-04-23', NULL, 1),
('USR-0423-17-80', 'kayla71', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yunita', 'Sihotang', 'Psr. Bara No. 556, Pasuruan 21452, SulSel', 29059, '0247 7423 998', 'empluk_agustina@gmail.com', 2, '2017-01-05', NULL, 1),
('USR-0423-17-81', 'latika.sudiati', 'ee11cbb19052e40b07aac0ca060c23ee', 'Zalindra', 'Hasanah', 'Psr. Suniaraja No. 715, Pariaman 26999, JaTen', 27631, '(+62) 422 7239 3491', 'nasab_megantara@gmail.com', 2, '2017-03-21', NULL, 1),
('USR-0423-17-82', 'jwulandari', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ghani', 'Firmansyah', 'Kpg. Yos Sudarso No. 976, Bengkulu 29698, Ace', 18054, '(+62) 454 3010 798', 'zahra_suryatmi@gmail.com', 2, '2017-03-21', NULL, 1),
('USR-0423-17-83', 'suryatmi.nugraha', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yulia', 'Nainggolan', 'Jln. Gardujati No. 344, Cilegon 88050, KalSel', 48718, '(+62) 890 2970 090', 'gawati_prastuti@gmail.com', 1, '2017-02-26', NULL, 1),
('USR-0423-17-84', 'kiswahyudi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jamil', 'Sudiati', 'Psr. Lumban Tobing No. 890, Cimahi 98773, Sul', 91138, '0304 1057 484', 'bakianto_damanik@gmail.com', 2, '2017-01-27', NULL, 0),
('USR-0423-17-85', 'dian00', 'ee11cbb19052e40b07aac0ca060c23ee', 'Iriana', 'Melani', 'Dk. Uluwatu No. 974, Batu 75058, SumSel', 63384, '0402 8525 8268', 'septi_fujiati@gmail.com', 1, '2017-03-19', NULL, 1),
('USR-0423-17-86', 'laksana02', 'ee11cbb19052e40b07aac0ca060c23ee', 'Abyasa', 'Sihombing', 'Jln. Kali No. 295, Palangka Raya 78872, Lampu', 48284, '(+62) 205 7248 114', 'kania_uyainah@gmail.com', 1, '2017-01-20', NULL, 1),
('USR-0423-17-87', 'emil31', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kambali', 'Wacana', 'Kpg. Cokroaminoto No. 877, Bengkulu 15762, Ka', 46865, '0724 9129 062', 'lanang_marpaung@gmail.com', 1, '2017-02-28', NULL, 1),
('USR-0423-17-88', 'ppudjiastuti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Okta', 'Adriansyah', 'Jr. Halim No. 869, Pekalongan 89297, KalSel', 52551, '(+62) 984 7367 6215', 'puput_nuraini@gmail.com', 2, '2017-02-01', NULL, 0),
('USR-0423-17-89', 'gawati.pranowo', 'ee11cbb19052e40b07aac0ca060c23ee', 'Uchita', 'Mandasari', 'Psr. Pacuan Kuda No. 963, Bitung 20731, SumBa', 20079, '(+62) 946 8668 110', 'fitriani_nainggolan@gmail.com', 2, '2017-02-08', NULL, 1),
('USR-0423-17-9', 'hani.habibi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Melinda', 'Tarihoran', 'Gg. Sudiarto No. 646, Cirebon 68657, BaBel', 22408, '(+62) 310 1392 6254', 'daliono_maheswara@gmail.com', 1, '2017-04-23', NULL, 1),
('USR-0423-17-90', 'rahayu.harjasa', 'ee11cbb19052e40b07aac0ca060c23ee', 'Joko', 'Wijaya', 'Kpg. Setia Budi No. 846, Metro 95867, Maluku', 13133, '0868 1844 3986', 'kiandra_yuniar@gmail.com', 2, '2017-03-31', NULL, 1),
('USR-0423-17-91', 'halim.jane', 'ee11cbb19052e40b07aac0ca060c23ee', 'Widya', 'Maryati', 'Kpg. Bakau Griya Utama No. 335, Binjai 61031,', 27533, '(+62) 394 4171 556', 'maras_nababan@gmail.com', 1, '2017-01-18', NULL, 1),
('USR-0423-17-92', 'hesti24', 'ee11cbb19052e40b07aac0ca060c23ee', 'Lukita', 'Purwanti', 'Jln. Sadang Serang No. 117, Bima 43975, KalSe', 66728, '(+62) 976 9974 4024', 'amelia_wahyuni@gmail.com', 2, '2017-01-13', NULL, 1),
('USR-0423-17-93', 'jatmiko23', 'ee11cbb19052e40b07aac0ca060c23ee', 'Pandu', 'Yolanda', 'Gg. Kyai Gede No. 79, Singkawang 69088, SumUt', 77826, '(+62) 309 1382 161', 'jamal_puspasari@gmail.com', 2, '2017-01-24', NULL, 0),
('USR-0423-17-94', 'septi.maulana', 'ee11cbb19052e40b07aac0ca060c23ee', 'Martani', 'Purwanti', 'Gg. K.H. Wahid Hasyim (Kopo) No. 676, Tangera', 28486, '0922 4282 7683', 'jaga_prasetyo@gmail.com', 1, '2017-04-11', NULL, 1),
('USR-0423-17-95', 'cpuspita', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yance', 'Hastuti', 'Jln. Merdeka No. 412, Mojokerto 25596, SulTen', 57430, '(+62) 23 7446 3888', 'hartaka_purwanti@gmail.com', 2, '2017-03-03', NULL, 0),
('USR-0423-17-96', 'karsana63', 'ee11cbb19052e40b07aac0ca060c23ee', 'Gandi', 'Utami', 'Dk. K.H. Wahid Hasyim (Kopo) No. 304, Prabumu', 64228, '(+62) 219 5461 619', 'darmana_mangunsong@gmail.com', 2, '2017-03-26', NULL, 0),
('USR-0423-17-97', 'emil39', 'ee11cbb19052e40b07aac0ca060c23ee', 'Radit', 'Hutasoit', 'Gg. Halim No. 345, Cirebon 84067, Bali', 29940, '0827 189 515', 'prakosa_aryani@gmail.com', 1, '2017-02-06', NULL, 1),
('USR-0423-17-98', 'zpermadi', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kuncara', 'Kusumo', 'Jr. K.H. Maskur No. 331, Pekanbaru 19568, Ria', 81775, '(+62) 248 0788 4984', 'banara_sitorus@gmail.com', 2, '2017-02-13', NULL, 1),
('USR-0423-17-99', 'irfan.purwanti', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ghaliyati', 'Rahayu', 'Jln. Katamso No. 889, Sungai Penuh 12347, Sul', 66158, '0840 684 080', 'gading_prayoga@gmail.com', 1, '2017-03-02', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `struk_payment`
--
ALTER TABLE `struk_payment`
  ADD PRIMARY KEY (`id_struk`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `struk_payment`
--
ALTER TABLE `struk_payment`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
