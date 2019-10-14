-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 07:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_cat`
--

CREATE TABLE `tbl_api_cat` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_cat_id` int(11) NOT NULL,
  `a_image` varchar(255) NOT NULL,
  `a_top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_api_cat`
--

INSERT INTO `tbl_api_cat` (`a_id`, `a_name`, `a_cat_id`, `a_image`, `a_top`) VALUES
(1, 'Women', 15724, 'women.jpg', 1),
(2, 'Men', 1059, 'men.jpg', 1),
(3, 'jewellery & Watches', 281, 'jewellery.jpg', 0),
(4, 'Mobile phone & Accessories', 15032, 'mobile.jpeg', 1),
(5, 'Computer, Laptop Accessories', 58058, 'computer.jpg', 1),
(6, 'Sound & Vision', 293, 'sound.jpg', 0),
(7, 'Video Games & Counsole', 1249, 'games.jpg', 0),
(8, 'Camera & Photography', 625, 'camera.jpg', 0),
(9, 'Sports Goods', 888, 'sports.jpg', 1),
(10, 'Musical Instruments', 619, 'musical.jpg', 0),
(11, 'Arts & Craft Supplies', 14339, 'arts.jpg', 0),
(12, 'Holidays & Travel', 3252, 'holidays.jpg', 0),
(13, 'Events Tickets', 1305, 'event.jpg', 0),
(14, 'Household Accessories', 20710, 'households.jpg', 1),
(15, 'Furniture', 3197, 'furniture.jpg', 0),
(16, 'Garden & Patio', 159912, 'garden.jpg', 0),
(17, 'Makeup Products', 31786, 'makeup.jpg', 0),
(18, 'Hair Care & Styling Products', 11854, 'hair.jpeg', 0),
(19, 'Fragrances & Aftershaves', 180345, 'fragrance.jpg', 0),
(20, 'Books, Comics & Magazines', 267, 'books.jpg', 0),
(21, 'Music', 11233, 'music.jpg', 0),
(22, 'Information Products', 102480, 'information.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_content` text NOT NULL,
  `b_user` int(11) NOT NULL,
  `b_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ad1` text DEFAULT NULL,
  `ad2` text DEFAULT NULL,
  `b_mtitle` varchar(255) DEFAULT NULL,
  `b_keyword` varchar(255) DEFAULT NULL,
  `b_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`b_id`, `b_title`, `b_image`, `b_content`, `b_user`, `b_created_on`, `ad1`, `ad2`, `b_mtitle`, `b_keyword`, `b_description`) VALUES
(2, 'Software Application Developer', 'e5ecc22b5a40f7bb7a69166e3edd7285.png', '<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 3, '2019-08-02 06:45:18', NULL, NULL, NULL, NULL, NULL),
(3, 'THE FINEST VIEWS IN PORTUGAL', 'b3b675548a99bc0162d9badc7ee288a9.jpg', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 3, '2019-08-02 06:58:38', '', '', 'Blog | Blog', 'Store,Dummy,content', 'Meta Description');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_heading` varchar(255) NOT NULL,
  `ct_icons` varchar(255) NOT NULL,
  `ct_iconSel` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_sp_content` text NOT NULL,
  `cat_m_title` varchar(255) NOT NULL,
  `cat_m_desc` varchar(255) NOT NULL,
  `cat_m_keyword` varchar(255) NOT NULL,
  `cat_url` varchar(255) NOT NULL,
  `ct_slide` int(11) NOT NULL,
  `adsense1` text NOT NULL,
  `adsense2` text NOT NULL,
  `cstyle` varchar(255) NOT NULL,
  `cat_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`ct_id`, `ct_name`, `ct_heading`, `ct_icons`, `ct_iconSel`, `cat_description`, `cat_sp_content`, `cat_m_title`, `cat_m_desc`, `cat_m_keyword`, `cat_url`, `ct_slide`, `adsense1`, `adsense2`, `cstyle`, `cat_user`) VALUES
(38, 'Apparel & Accessories', 'HEADING CHECK', '46188bef555d29302124566f9a15bbdd.png', 'fas fa-dolly-flatbed', 'N/a', '', '', '', '', 'http://www.upto99percent.com/category', 0, '', '', 'Grid', 3),
(39, 'clothing', 'clothing', 'e3a6dda9249019881b59fa5fde5b91b4.jpg', 'far fa-address-book', 'dffdfd', '', '', '', '', 'http://khi.nu.edu.pk/about-2/', 0, '', '', 'Grid', 3),
(40, 'Cat Name', 'Cat Heading', 'Cat Image', 'Cat Icon', 'Cat Discription', 'Cat Special Content', 'Cat Meta Title', 'Cat Meta Discription', 'Cat Meta Keywords', 'Cat Url', 0, 'adsense 360px 1', 'adsense 360px 2', 'Coupon Style', 3),
(41, 'Apparel & Accessories', 'HEADING CHECK', '46188bef555d29302124566f9a15bbdd.png', 'fas fa-dolly-flatbed', 'N/a', '<p> Special Content </p>', 'Electronics | Category', 'Meta discription here', 'test,words,Keyword', 'http://www.upto99percent.com/category', 1, '', '', 'Card', 3),
(42, 'clothing', 'clothing', 'e3a6dda9249019881b59fa5fde5b91b4.jpg', 'far fa-address-book', 'dffdfd', '<h1>Some Heading </h1>', '', '', '', 'http://www.upto99percent.com/category', 0, '', '', 'Grid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupens`
--

CREATE TABLE `tbl_coupens` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(255) NOT NULL,
  `c_featured` int(11) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `c_description` varchar(255) NOT NULL,
  `c_type` varchar(255) NOT NULL,
  `c_tags` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_expirydate` varchar(255) NOT NULL,
  `c_code` varchar(255) NOT NULL,
  `c_rank` varchar(255) NOT NULL,
  `c_catrank` int(11) DEFAULT NULL,
  `c_subrank` int(11) DEFAULT NULL,
  `c_status` varchar(255) NOT NULL,
  `c_specialcontent` varchar(255) NOT NULL,
  `c_metatitle` varchar(255) NOT NULL,
  `c_metakeyword` varchar(255) NOT NULL,
  `c_metadescription` varchar(255) NOT NULL,
  `c_urllink` varchar(255) NOT NULL,
  `c_s_id` varchar(255) NOT NULL,
  `c_cat_id` varchar(255) NOT NULL,
  `c_sub_cat_id` varchar(255) NOT NULL,
  `c_like` int(11) NOT NULL DEFAULT 0,
  `c_dis` int(11) NOT NULL DEFAULT 0,
  `schedule_date` varchar(255) NOT NULL,
  `schedule_status` varchar(255) NOT NULL,
  `c_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupens`
--

INSERT INTO `tbl_coupens` (`c_id`, `c_title`, `c_featured`, `c_url`, `c_description`, `c_type`, `c_tags`, `c_image`, `c_expirydate`, `c_code`, `c_rank`, `c_catrank`, `c_subrank`, `c_status`, `c_specialcontent`, `c_metatitle`, `c_metakeyword`, `c_metadescription`, `c_urllink`, `c_s_id`, `c_cat_id`, `c_sub_cat_id`, `c_like`, `c_dis`, `schedule_date`, `schedule_status`, `c_user`) VALUES
(34, 'Electronics', 1, 'http://estate.wowtoday.ca/property-details?property=7595ccce1e539e93', 'Description', 'Coupon', '13', 'f4443998ce18d772d3ec06271580ce35.png', '2019-10-19', '0drD45T98', '8', 5, 2, 'Enable', '<p>Description</p>', 'D-24 Street 4 Dalmian Mujahid Colony Stadium Road Karachi', 'Store,Dummy,content', 'Description', 'https://digitrixsolutions.com/', '16', '38,39', '16,17', 0, 0, '2019-10-17', 'Disable', 3),
(35, 'Coupon Title', 0, 'URL', 'Description', 'Coupon Type', '', 'Coupon Featured Image', 'Expiry Date', 'Coupon Code', 'Store Rank', 0, 0, 'Disable', 'Special Content', 'Meta Title', 'Meta Key Words', 'Meta Description', 'Coupon URL Link', 'Store Id', 'Category Id', 'Subcategory Id', 0, 0, 'Schedule Date', 'Schedule Status', 3),
(36, 'Electronics', 1, 'https://example.com', 'Description Field', 'Coupon', '', '993df4c332a4893f1dd446d04101b73d.png', '10/19/2019', '04G2FR00', '5', 3, 2, 'Disable', '<p>Description</p>', 'Electronics | Coupon', 'Store,Dummy,content', 'Description', 'https://affilatelink.com', '16', '38,39', '16,17', 0, 0, '10/17/2019', 'Disable', 3),
(37, 'Coupon Title', 0, 'URL', 'Description', 'Coupon Type', '', 'Coupon Featured Image', 'Expiry Date', 'Coupon Code', 'Store Rank', 0, 0, 'Disable', 'Special Content', 'Meta Title', 'Meta Key Words', 'Meta Description', 'Coupon URL Link', 'Store Id', 'Category Id', 'Subcategory Id', 0, 0, 'Schedule Date', 'Schedule Status', 3),
(39, 'Coupon Title', 0, 'URL', 'Description', 'Coupon Type', '', 'Coupon Featured Image', 'Expiry Date', 'Coupon Code', 'Store Rank', 0, 0, 'Disable', 'Special Content', 'Meta Title', 'Meta Key Words', 'Meta Description', 'Coupon URL Link', 'Store Id', 'Category Id', 'Subcategory Id', 0, 0, 'Schedule Date', 'Schedule Status', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `l_id` int(11) NOT NULL,
  `l_like` int(11) NOT NULL,
  `l_dis` int(11) NOT NULL,
  `l_coupon_id` int(11) NOT NULL,
  `l_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`l_id`, `l_like`, `l_dis`, `l_coupon_id`, `l_user`) VALUES
(1, 1, 0, 16, 5),
(3, 1, 0, 17, 5),
(5, 1, 0, 16, 6),
(6, 1, 0, 17, 6),
(7, 1, 0, 22, 5),
(8, 1, 0, 22, 9),
(9, 1, 0, 25, 9),
(10, 1, 0, 24, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `ad1` text NOT NULL,
  `ad2` text NOT NULL,
  `mtitle` varchar(255) NOT NULL,
  `mkeyword` varchar(255) NOT NULL,
  `mdescription` text NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `ad1`, `ad2`, `mtitle`, `mkeyword`, `mdescription`, `page`) VALUES
(1, '', '', '', '', '', 'Home'),
(2, 'slide1', 'd342eb9a4d60f99a607b101ae9c48911.jpg', 'YOUR LIVING', 'STYLE MATTERS', 'UPTO 99% OFF', 'Home-Slider'),
(3, 'slide2', '8c72c2aaf97cf91edd8fb6f40fd35772.jpg', 'YOUR LIVING', 'STYLE MATTERS', 'UPTO 99% OFF', 'Home-Slider'),
(4, 'slide3', '21d87f06aed37ef29766758e592f29e2.jpg', 'YOUR LIVING', 'STYLE MATTERS', 'UPTO 99% OFF', 'Home-Slider'),
(5, '', '', '', '', '', 'Store'),
(6, '', '', '', '', '', 'Category'),
(7, '', '', '', '', '', 'Deals');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `img_id` int(11) NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `img_status` varchar(255) NOT NULL,
  `img_s_id` int(255) NOT NULL,
  `img_c_id` int(255) NOT NULL,
  `img_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`img_id`, `img_link`, `img_status`, `img_s_id`, `img_c_id`, `img_user`) VALUES
(46, '685723dbafc5b024c2428f72101bc9d0.jpg', '', 0, 20, 0),
(47, '96524f2485c71c9fe02968d8a7e60730.jpg', '', 0, 20, 0),
(48, 'fdc30f1d315e6d3b00fc79f17f17a2fe.jpg', '', 0, 20, 0),
(49, '1dfee5ffddb44dde227749dc1f4017fc.jpg', '', 0, 21, 0),
(50, 'f2c5430f6182222f6bdf498f0d01fd16.jpg', '', 0, 21, 0),
(51, '5addfa182efe5bd3738e5f03fcf1b30c.jpg', '', 0, 21, 0),
(64, '762ea67ca316752b436e567ade4315c3.jpg', '', 0, 0, 16),
(65, '4938871c4d3b87a8a40d288d480d58d0.jpg', '', 0, 0, 16),
(66, '01e47ce02a9931575fa63348ca4f0f1d.jpg', '', 0, 0, 16),
(67, '3fe6d67c6b8a12c550dbf7b544c1cef5.jpg', '', 0, 0, 17),
(68, 'e9b4fd72a91ac7c8abfaf2f0dbf7360d.jpg', '', 0, 0, 17),
(69, '5df89f10dbf3e2c30ab0a3895fb8e41a.jpg', '', 0, 0, 17),
(70, '73ce97c80b15ac575c2687887426d126.jpg', '', 0, 0, 18),
(71, '3b2a27e1073f925d15ff79109facaec5.jpg', '', 0, 0, 18),
(72, 'f90cd3a72257b74ef3e6b341ae7e33bc.jpg', '', 0, 0, 18),
(73, '96e65cdef94079e9d8af3ab4ba77b4fe.jpg', '', 0, 0, 19),
(74, '35b558db0c5947a70d8183bf1e666de5.jpg', '', 0, 0, 19),
(75, 'b833d3a91bd8e691f9e4605e1ed79c04.jpg', '', 0, 0, 19),
(76, '5055b3e48805ee0a5d6b6ec36a2249cb.jpg', '', 0, 0, 20),
(77, '6acc0a6264741c86554ac683aa85bb3a.jpg', '', 0, 0, 20),
(78, '1f7a9fff3ad590fc19020e97698aa5a3.jpg', '', 0, 0, 20),
(79, 'e0ec6f9f5ca1e327027745f47e84af0a.jpg', '', 0, 0, 21),
(80, 'bc32aa8edcb911d6b4a03b782bdf4015.jpg', '', 0, 0, 21),
(81, '519521f3c1a47b9873b0ec78a54c8add.jpg', '', 0, 0, 21),
(82, '3a791ff304cf5be7761f9704db20b162.jpg', '', 0, 0, 22),
(83, '4317d5a8f51dee0ac4b6ed3a9d5f2ccf.jpg', '', 0, 0, 22),
(84, 'ca29478ab3688bc7391383ea3fd68d79.jpg', '', 0, 0, 22),
(85, 'cef4e87fd2877a9a509fcdc7350a8053.jpg', '', 0, 0, 23),
(86, 'f0d1057a872c35d7c843b3d5a4900880.jpg', '', 0, 0, 23),
(87, '37083b4d3773982a972eeaeb4e971d23.jpg', '', 0, 0, 23),
(88, '66e3f12e5092715f6bda64a7f4a6a84d.jpg', '', 0, 0, 24),
(89, 'a80008d02bcf180d5a4be48a140ce3fd.jpg', '', 0, 0, 24),
(90, '15a5971873af46862b8beb21c924096a.jpg', '', 0, 0, 24),
(91, 'b883fdf18ec9e47a33c20f03becd6eda.jpg', '', 0, 0, 25),
(92, '7bd52b80309dd7e7c7d0db269b908005.jpg', '', 0, 0, 25),
(93, '112f105a87a948721b5be537f29a0dca.jpg', '', 0, 0, 25),
(94, 'fa41c7a7b40dbe527a26e787d965579b.jpg', '', 0, 0, 26),
(95, 'ee132bd1eb2343c653f5068c2367bbfe.jpg', '', 0, 0, 26),
(96, '523d3e9db0105730ef1a57a0cef01626.jpg', '', 0, 0, 26),
(97, 'ca3e984200b357f2708d9052c7f788ee.jpg', '', 0, 0, 27),
(98, 'b01c5462930fbbf161e49afe753b5a22.jpg', '', 0, 0, 27),
(99, 'e29cea5fa091dba1924e23e4b14a3ce1.jpg', '', 0, 0, 27),
(100, 'c416d4332cd2ed5648525819f1b5ccc5.jpg', '', 0, 0, 28),
(101, 'c1efe2caa56f85517ba52a06327dd8bb.jpg', '', 0, 0, 28),
(102, 'f1c1a2bd229f53a235b8148fa0bca11a.jpg', '', 0, 0, 28),
(106, '0b780509791b85c7d2bde47782d4ad96.jpg', '', 14, 0, 0),
(107, 'cfff5fe1a453eac2b40e6344b52c9971.jpg', '', 14, 0, 0),
(108, '20ebb3f7f8861d252c4520f0b7554363.jpg', '', 14, 0, 0),
(109, '747b1d87b995004bd96c41db434fa72d.jpg', '', 15, 0, 0),
(110, 'ac1b4a63ec3d3fc4041638d0f135b7f7.jpg', '', 15, 0, 0),
(111, 'b50a0fa5ee27ea6c2e57a134e0934a83.jpg', '', 15, 0, 0),
(112, '54a3b745bf4ca3577727aa0a3a59b6fd.jpg', '', 16, 0, 0),
(113, '4d0983bb137797db410060b3656ee418.jpg', '', 16, 0, 0),
(114, '135937931348bfb08c8ac91b0b46daa7.jpg', '', 16, 0, 0),
(115, '2e1a39e51f2c79475dae719f04f9a12a.jpg', '', 17, 0, 0),
(116, 'fd7c59a8122ca438d4a25a583c75a7c3.jpg', '', 17, 0, 0),
(117, '8cdc0c9aa960500c7855675a1ff25306.jpg', '', 17, 0, 0),
(118, 'e81e5df101d0c604faa8512a4e92ec85.jpg', '', 18, 0, 0),
(119, 'bd88fd20fb72680c33b38bd76ea07aef.jpg', '', 18, 0, 0),
(120, 'f2502a307ea742dcc45a8c6f081df9d6.jpg', '', 18, 0, 0),
(121, '1b98f9f8262214c48cb99b0563e858f5.jpg', '', 19, 0, 0),
(122, '7d488532efc2d8b7a47b38e592b9c74d.jpg', '', 19, 0, 0),
(123, '57f3fef73aa414d3626adb545ab45839.jpg', '', 19, 0, 0),
(125, '5800e7f7e4c72dfdbd474ce242c52124.jpg', '', 20, 0, 0),
(126, '81e8e6462e73d33f1d8bdc476035cd86.jpg', '', 20, 0, 0),
(127, 'b9234d1456e08cea35fe65a7003f631b.jpg', '', 21, 0, 0),
(128, '617d0d8f8aa8739b38671155d22d0e93.jpg', '', 21, 0, 0),
(129, '2b4598aedad52ca3204f81c304394f02.jpg', '', 21, 0, 0),
(130, 'b01a0c8e7509ed4f29a4533cba4b104a.jpg', '', 22, 0, 0),
(131, '01ef66dd5e88b41dda2fade159ebaeea.jpg', '', 22, 0, 0),
(132, 'baf5b5499e3fb478ef0f53c1331cdd27.jpg', '', 22, 0, 0),
(169, '50cd3c31d5fa46777456f15363bf840b.jpg', '', 0, 34, 0),
(170, '9b746b8cbc8ed269e00ed0cdd622f444.jpg', '', 0, 34, 0),
(171, '88b80f10fad3638e9f3d7303272c1626.jpg', '', 0, 34, 0),
(172, '25121146acde875ea75aa84770aafa44.jpg', '', 0, 35, 0),
(173, 'f2b679e80b7208ac533d32ebab3e01f8.jpg', '', 0, 35, 0),
(174, '4029634ab610d3a1d30713eeae483e87.jpg', '', 0, 35, 0),
(175, '26b85359cf064977323012cc94b35a63.jpg', '', 0, 36, 0),
(176, '75c679218a83d1503dbe040383b70d17.jpg', '', 0, 36, 0),
(177, 'db9bb9e322cdb027f7e273502ac18628.jpg', '', 0, 36, 0),
(178, 'e8be7e36daf6e1e2a633d50b88cbe5d7.jpg', '', 0, 37, 0),
(179, '63a3466be5ad98399ead822f5379beb1.jpg', '', 0, 37, 0),
(180, '96b56be24f8fee037e6660d441d7271c.jpg', '', 0, 37, 0),
(181, '8eb354502a369d2f38d94a37610aa75d.jpg', '', 23, 0, 0),
(182, 'f98a0474ed3c28727bf19f7ce23abd68.jpg', '', 23, 0, 0),
(183, 'd55d3e4ca6137f46c4ea4cda3ea61404.jpg', '', 23, 0, 0),
(184, 'aa676a0724fe3e590357d602b613e627.jpg', '', 24, 0, 0),
(185, '7dc3b10e7b6892ddb4faa4604a0e294f.jpg', '', 24, 0, 0),
(186, 'ca262d9ab078c3bbe998feba78f9ed9a.jpg', '', 24, 0, 0),
(187, 'ca1a7bcd1efd51b262e34f07e81420b8.jpg', '', 25, 0, 0),
(188, 'ac55d2429a3ea40cb935ac559fcb21ae.jpg', '', 25, 0, 0),
(189, 'f8e04915da592925fe0701af985df1a7.jpg', '', 25, 0, 0),
(190, '734d0de1ae840b0987dc2bba590b5566.jpg', '', 26, 0, 0),
(191, 'de7bdc88051dfb8447de4399a287728b.jpg', '', 26, 0, 0),
(192, '8e40742281b119e63fbf5621d911c48e.jpg', '', 26, 0, 0),
(193, '95321176760c5bcc79006af51f599f38.jpg', '', 27, 0, 0),
(194, '6dbb3d7166e6a657e19aa633dd163b41.jpg', '', 27, 0, 0),
(195, '174118e48297112bbac65daf64f45849.jpg', '', 27, 0, 0),
(196, '44481f7d8602a1360794e35e623e5439.jpg', '', 28, 0, 0),
(197, '82d566c4908853439e10fb42166c28cb.jpg', '', 28, 0, 0),
(198, '8932c6bc4be7023e6d89f33c18a56e03.jpg', '', 28, 0, 0),
(199, 'ad740e8c45c73d0b1ddd32b292166929.jpg', '', 20, 0, 0),
(201, 'fca22fc33252dee1ea38f2904b2feabe.jpg', '', 0, 39, 0),
(202, 'df94b73c6d5a44df65e82e01a7a98621.', '', 0, 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `so_id` int(11) NOT NULL,
  `so_facebook` varchar(255) DEFAULT NULL,
  `so_instagram` varchar(255) DEFAULT NULL,
  `so_twitter` varchar(255) DEFAULT NULL,
  `so_linkdin` varchar(255) DEFAULT NULL,
  `so_pintrest` varchar(255) DEFAULT NULL,
  `so_google` varchar(255) DEFAULT NULL,
  `so_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`so_id`, `so_facebook`, `so_instagram`, `so_twitter`, `so_linkdin`, `so_pintrest`, `so_google`, `so_store`) VALUES
(1, 'https://www.facebook.com', 'https://www.facebook.com', '', 'https://www.facebook.com', '', '', 27),
(2, 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.facebook.com', '', 'https://www.facebook.com', 'https://www.facebook.com', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_popular` int(11) NOT NULL,
  `s_disablelink` varchar(255) NOT NULL,
  `s_link` varchar(255) NOT NULL,
  `s_country` varchar(255) NOT NULL,
  `s_cat` varchar(255) NOT NULL,
  `s_sub_cat` varchar(255) NOT NULL,
  `s_tags` varchar(255) NOT NULL,
  `s_image` varchar(255) DEFAULT NULL,
  `s_image_alt` varchar(255) NOT NULL,
  `s_heading` varchar(255) NOT NULL,
  `s_description` varchar(255) NOT NULL,
  `s_specialcontent` varchar(255) NOT NULL,
  `s_m_title` varchar(255) NOT NULL,
  `s_m_desc` text NOT NULL,
  `s_m_keyword` varchar(255) NOT NULL,
  `s_status` varchar(255) NOT NULL,
  `s_slider` int(11) NOT NULL,
  `s_cstyle` varchar(255) NOT NULL,
  `ad1` text DEFAULT NULL,
  `ad2` text DEFAULT NULL,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `s_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`s_id`, `s_name`, `s_popular`, `s_disablelink`, `s_link`, `s_country`, `s_cat`, `s_sub_cat`, `s_tags`, `s_image`, `s_image_alt`, `s_heading`, `s_description`, `s_specialcontent`, `s_m_title`, `s_m_desc`, `s_m_keyword`, `s_status`, `s_slider`, `s_cstyle`, `ad1`, `ad2`, `c1`, `c2`, `s_user`) VALUES
(13, 'Academy Sports', 1, 'https://www.academy.com/', 'https://www.academy.com/', 'Pakistan', '38', '21', '13', '873c51a2b4f8de6829fec043e7990b0e.jpg', '', 'Academy Sports', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen ', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Academy Sports | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(14, 'Best Buy', 1, 'http://digitrixsolutions.com', 'https://www.bestbuy.com/', 'Pakistan', '21', '19', '13', '34af9d4f2e72f2c764cb728c01e4dc3b.jpg', '', 'Best Buy', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Co', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Best Buy | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(15, 'Dell Outlet ', 1, 'https://www.dell.com/outlet', 'https://www.dell.com/outlet', 'Pakistan', '23', '23,24', '13', '32f94eb44a15cd9039efa07ac4202f1d.png', '', 'Dell Outlet ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Dell Outlet  | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(16, 'eBay', 1, 'https://www.ebay.com/', 'https://www.ebay.com/', 'Pakistan', '23', '23,24', '13', '586318ac530153a0db8228c6392d88b0.jpg', '', 'eBay', 'How to use Best Buy coupons:\\r\\nFirst you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. N', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'eBay  | Store', 'How to use Best Buy coupons:\\r\\nFirst you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.\\r\\n\\r\\n ', 'Store,Dummy,content', '1', 0, 'Grid', '', '', '', '', 3),
(17, 'Home Depot ', 1, 'http://digitrixsolutions.com', 'https://www.homedepot.com/', 'Pakistan', '24', '25', '13', '4d30631aaa5ad571d0051f4483e7a9da.png', '', 'Home Depot ', 'After adding everything you wish to purchase to your cart go to the checkout page. This page will show a list of all the items in your cart. Under the list is a box labeled \\\"Apply Promotion Code\\\" where you can type in any coupon code you have.\\r\\n', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Home Depot   | Store', 'After adding everything you wish to purchase to your cart go to the checkout page. This page will show a list of all the items in your cart. Under the list is a box labeled \\\"Apply Promotion Code\\\" where you can type in any coupon code you have.\\r\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(18, 'Olive Garden ', 1, 'https://www.olivegarden.com/', 'https://www.olivegarden.com/', 'Pakistan', '24,25', '27', '13', '67e5fb2479e0dc0dc6ce8d78e89d6e7e.png', '', 'Olive Garden ', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Co', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Olive Garden    | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(19, 'Uber', 0, 'https://www.uber.com/', 'https://www.uber.com/', 'Pakistan', '24', '25', '13', 'f63cfe36de0d2a89012bfb36a84dcf2a.png', '', 'Uber', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Co', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Uber  | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.', 'Store,Dummy,content', '1', 0, 'Grid', '', '', '', '', 3),
(20, 'Wigsbuy', 0, 'https://shop.wigsbuy.com/', 'https://shop.wigsbuy.com/', 'Pakistan', '20,24', '16', '13', 'a44a3d6719fa97709291ea2d4076479e.jpg', '', 'Wigsbuy ', 'First you must login or create an account to start your checkout process. During the \\\\\\\\\\\\\\\"How do you want to pay\\\\\\\\\\\\\\\" step, enter your Best Buy promo code in the \\\\\\\\\\\\\\\"Promotional Code\\\\\\\\\\\\\\\" box, under the \\\\\\\\\\\\\\\"More ways to pay\\\\\\\\\\\\\\\" sectio', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Wigsbuy  | Store', 'First you must login or create an account to start your checkout process. During the \\\\\\\\\\\\\\\"How do you want to pay\\\\\\\\\\\\\\\" step, enter your Best Buy promo code in the \\\\\\\\\\\\\\\"Promotional Code\\\\\\\\\\\\\\\" box, under the \\\\\\\\\\\\\\\"More ways to pay\\\\\\\\\\\\\\\" section. Next click \\\\\\\\\\\\\\\"Apply Promotional Code\\\\\\\\\\\\\\\" and the discount should be displayed.\\\\\\\\r\\\\\\\\n\\\\\\\\r\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(21, 'English Laundry Cloth', 0, 'https://www.englishlaundry.com/', 'https://www.englishlaundry.com/', 'Pakistan', '20', '17', '13', 'dd1b48a9b095d9da96a1635cbd9a4e61.png', '', 'English Laundry', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Co', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'English Laundry  | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(22, 'Soufeel', 0, 'https://www.soufeel.com/', 'https://www.soufeel.com/', 'Pakistan', '20', '18', '13', '87533280e59e2d0605c35e103c18b6bf.png', '', 'Soufeel', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Co', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Soufeel  | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\" step, enter your Best Buy promo code in the \\\"Promotional Code\\\" box, under the \\\"More ways to pay\\\" section. Next click \\\"Apply Promotional Code\\\" and the discount should be displayed.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(23, 'WWE Shop', 0, 'http://digitrixsolutions.com', 'https://shop.wwe.com/', 'Pakistan', '22', '21', '13', '501e7380458dce6ae447d3eba37b3f38.png', '', 'WWE Shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opp', 'WWE Shop | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(24, 'Walmart', 0, 'https://www.walmart.com/', 'https://www.walmart.com/', 'Pakistan', '25', '27,28', '13', '63aec206156504b09c6973df57b07d6e.png', '', 'Walmart', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opp', 'Walmart | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(25, 'Samsung', 1, 'http://digitrixsolutions.com', 'https://digitrixsolutions.com', 'Pakistan', '21,25', '19,20,27,28', '13', 'b2ba36a9f6ce963a50cee8ed843086a6.jpg', '', 'Samsung', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Samsung | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\r\\\\n\\\\r\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(26, 'Travel', 0, 'https://www.ebay.com/', 'https://www.ebay.com/', 'Pakistan', '24,25', '25,26,27,28', '13', '81c66ec5c5884dd8070a8800366663ae.png', '', 'Travel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Travel & Tickets | Category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(27, 'test2', 1, 'http://digitrixsolutions.com', 'https://www.ebay.com/', 'Pakistan', '21', '19,20', '14,15', 'd181b753f46d42ba02035012c00403cc.jpg', '', 'Shopping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley o', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 3),
(28, 'Arif khantest', 1, 'http://digitrixsolutions.com', 'https://digitrixsolutions.com', 'Pakistan', '20', '16,17', '13,14', '07b6a9dbaced317a1371914d3cf2ab91.jpg', '', 'Shopping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen ', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 3),
(29, 'Store Name', 0, 'Store Disable Link', 'Store Link', 'Store Contry', 'Store Category', 'Store Subcategory', '', 'Store Image', 'Store Image Alt', 'Store Heading', 'Store Discription', 'Store Special Content', 'Store Meta Title', 'Store Meta Discription', 'Store Meta Keywords', 'Store Status', 0, 'Store Coupon Style', 'Adsense 760px 1', 'adsense 360px 2', 'Content 1', 'Content 2', 3),
(30, 'Academy Sports', 1, 'https://www.academy.com/', 'https://www.academy.com/', 'Pakistan', '22', '21', '', '873c51a2b4f8de6829fec043e7990b0e.jpg', '', 'Academy Sports', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', '<div> <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Academy Sports | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(31, 'Best Buy', 1, 'http://digitrixsolutions.com', 'https://www.bestbuy.com/', 'Pakistan', '21', '19', '', '34af9d4f2e72f2c764cb728c01e4dc3b.jpg', '', 'Best Buy', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Co\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Best Buy | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\"', 'Store,Dummy,content', '1', '1', 'Grid', 3),
(32, 'Dell Outlet', 1, 'https://www.dell.com/outlet', 'https://www.dell.com/outlet', 'Pakistan', '23', '23,24', '', '32f94eb44a15cd9039efa07ac4202f1d.png', '', 'Dell Outlet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Dell Outlet | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(33, 'eBay', 1, 'https://www.ebay.com/', 'https://www.ebay.com/', 'Pakistan', '23', '23,24', '', '586318ac530153a0db8228c6392d88b0.jpg', '', 'eBay', 'How to use Best Buy coupons:\\r\\nFirst you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. N\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'eBay | Store', 'How to use Best Buy coupons:\\r\\nFirst you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\\r\\n\\r\\n\"', 'Store,Dummy,content', '1', '0', 'Grid', 3),
(34, 'Home Depot', 1, 'http://digitrixsolutions.com', 'https://www.homedepot.com/', 'Pakistan', '24', '25', '', '4d30631aaa5ad571d0051f4483e7a9da.png', '', 'Home Depot', 'After adding everything you wish to purchase to your cart go to the checkout page. This page will show a list of all the items in your cart. Under the list is a box labeled \\\"Apply Promotion Code\\\"\" where you can type in any coupon code you have.\\r\\n\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Home Depot | Store', 'After adding everything you wish to purchase to your cart go to the checkout page. This page will show a list of all the items in your cart. Under the list is a box labeled \\\"Apply Promotion Code\\\"\" where you can type in any coupon code you have.\\r\\n\"', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(35, 'Olive Garden', 1, 'https://www.olivegarden.com/', 'https://www.olivegarden.com/', 'Pakistan', '24,25', '27', '', '67e5fb2479e0dc0dc6ce8d78e89d6e7e.png', '', 'Olive Garden', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Co\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Olive Garden | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\\r\\n\\r\\n\"', 'Store,Dummy,content', '1', '1', 'Grid', 3),
(36, 'Uber', 0, 'https://www.uber.com/', 'https://www.uber.com/', 'Pakistan', '24', '25', '', 'f63cfe36de0d2a89012bfb36a84dcf2a.png', '', 'Uber', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Co\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Uber | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\"', 'Store,Dummy,content', '1', '0', 'Grid', 3),
(37, 'Wigsbuy', 0, 'https://shop.wigsbuy.com/', 'https://shop.wigsbuy.com/', 'Pakistan', '20,24', '16', '', 'a44a3d6719fa97709291ea2d4076479e.jpg', '', 'Wigsbuy', 'First you must login or create an account to start your checkout process. During the \\\\\\\\\\\\\\\"How do you want to pay\\\\\\\\\\\\\\\"\" step', ' enter your Best Buy promo code in the \\\\\\\\\\\\\\\"\"Promotional Code\\\\\\\\\\\\\\\"\" box', ' under the \\\\\\\\\\\\\\\"\"More ways to pay\\\\\\\\\\\\\\\"\" sectio\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Wigsbuy | Store', 'First you must login or create an account to start your checkout process. During the \\\\\\\\\\\\\\\"How do you want to pay\\\\\\\\\\\\\\\"\" step', 0, ' under the \\\\\\\\\\\\\\\"\"More ways to pay\\\\\\\\\\\\\\\"\" section. Next click \\\\\\\\\\\\\\\"\"Apply Promotional Code\\\\\\\\\\\\\\\"\" and the discount should be displayed.\\\\\\\\r\\\\\\\\n\\\\\\\\r\\\\\\\\n\"', 'Store,Dummy,content', '1', '1', 'Card', 3),
(38, 'English Laundry Cloth', 0, 'https://www.englishlaundry.com/', 'https://www.englishlaundry.com/', 'Pakistan', '20', '17', '', 'dd1b48a9b095d9da96a1635cbd9a4e61.png', '', 'English Laundry', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Co\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'English Laundry | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\"', 'Store,Dummy,content', '1', '1', 'Card', 3),
(39, 'Soufeel', 0, 'https://www.soufeel.com/', 'https://www.soufeel.com/', 'Pakistan', '20', '18', '', '87533280e59e2d0605c35e103c18b6bf.png', '', 'Soufeel', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', ' enter your Best Buy promo code in the \\\"\"Promotional Code\\\"\" box', ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Co\"', '<p><strong>How to use Best Buy coupons:</strong><br />First you must login or create an account to start your checkout process. During the \"How do you want to pay\" step, enter your Best Buy promo code in the \"Promotional Code\" box, under the \"More ways to', 'Soufeel | Store', 'First you must login or create an account to start your checkout process. During the \\\"How do you want to pay\\\"\" step', 0, ' under the \\\"\"More ways to pay\\\"\" section. Next click \\\"\"Apply Promotional Code\\\"\" and the discount should be displayed.\\r\\n\\r\\n\"', 'Store,Dummy,content', '1', '1', 'Card', 3),
(40, 'WWE Shop', 0, 'http://digitrixsolutions.com', 'https://shop.wwe.com/', 'Pakistan', '22', '21', '', '501e7380458dce6ae447d3eba37b3f38.png', '', 'WWE Shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<h2>Why do we use it?</h2> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opp', 'WWE Shop | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(41, 'Walmart', 0, 'https://www.walmart.com/', 'https://www.walmart.com/', 'Pakistan', '25', '27,28', '', '63aec206156504b09c6973df57b07d6e.png', '', 'Walmart', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<h2>Why do we use it?</h2> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opp', 'Walmart | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(42, 'Samsung', 1, 'http://digitrixsolutions.com', 'https://digitrixsolutions.com', 'Pakistan', '21,25', '19,20,27,28', '', 'b2ba36a9f6ce963a50cee8ed843086a6.jpg', '', 'Samsung', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '<div> <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Samsung | Store', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\r\\\\n\\\\r\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', '', '', 3),
(43, 'Travel', 0, 'https://www.ebay.com/', 'https://www.ebay.com/', 'Pakistan', '24,25', '25,26,27,28', '', '81c66ec5c5884dd8070a8800366663ae.png', '', 'Travel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '<div> <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Travel & Tickets | Category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\r\\n\\r\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', '', '', 3),
(44, 'test2', 1, 'http://digitrixsolutions.com', 'https://www.ebay.com/', 'Pakistan', '21', '19,20', '', 'd181b753f46d42ba02035012c00403cc.jpg', '', 'Shopping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley o', '<div> <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Card', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3),
(45, 'Arif khantest', 1, 'http://digitrixsolutions.com', 'https://digitrixsolutions.com', 'Pakistan', '20', '16,17', '', '07b6a9dbaced317a1371914d3cf2ab91.jpg', '', 'Shopping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', '<div> <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n', 'Store,Dummy,content', '1', 1, 'Grid', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(255) NOT NULL,
  `sc_ct_id` varchar(255) NOT NULL,
  `sc_description` text NOT NULL,
  `sc_special` text NOT NULL,
  `sc_adsense1` text NOT NULL,
  `sc_adsense2` text NOT NULL,
  `sc_mtitle` varchar(255) NOT NULL,
  `sc_mkeyword` varchar(255) NOT NULL,
  `sc_mdes` text NOT NULL,
  `sc_slide` int(11) NOT NULL,
  `sc_style` varchar(255) DEFAULT NULL,
  `sc_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`sc_id`, `sc_name`, `sc_ct_id`, `sc_description`, `sc_special`, `sc_adsense1`, `sc_adsense2`, `sc_mtitle`, `sc_mkeyword`, `sc_mdes`, `sc_slide`, `sc_style`, `sc_user`) VALUES
(16, 'Womens', '38', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Womens | Category', 'Store,Dummy,content', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 'Card', 3),
(17, 'Men\'s', '39', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Men\'s | Category', 'Store,Dummy,content', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, 'Card', 3),
(18, 'Jewelry & Watches', '20', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Jewelry & Watches | Sub Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Card', 3),
(19, 'TVs & Video', '21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'TVs & Video | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Card', 3),
(20, 'Cameras & Accessories', '21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Cameras & Accessories | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 0, 'Grid', 3),
(21, 'Video Games', '22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Video Games | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Grid', 3),
(22, 'Movies & Music', '22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Movies & Music | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 0, 'Card', 3),
(23, 'Tablets', '23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Tablets | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Card', 3),
(24, 'Laptops', '23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Laptops | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 0, 'Grid', 3),
(25, 'Travel & Tickets', '24', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Travel & Tickets | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Grid', 3),
(26, 'Sports & Outdoors', '24', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '', '', 'Sports & Outdoors | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Card', 3),
(27, 'Kitchen & Appliances', '25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', '', '', 'Kitchen & Appliances | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Card', 3),
(28, 'Tools & Home', '25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', '', '', 'Tools & Home | Category', 'Store,Dummy,content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 'Grid', 3),
(29, 'Sub Category Name', 'Parent Category Id', 'Discription', 'Special Content', 'adsense 360px', 'adsense 360px', 'Meta Title', 'Meta Keyword', 'Meta Discription', 0, 'Coupon Style', 3),
(30, 'Womens', '8', 'some discription', '<p>Special Content </p>', 'adsense Code', 'adsense', 'Title ', 'keyword,test', 'some discription', 1, 'Card', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `su_id` int(11) NOT NULL,
  `su_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`su_id`, `su_email`) VALUES
(1, 'marif739@gmail.com'),
(2, 'arraytechno@gmail.com'),
(3, 'ali@mail.com'),
(4, 'shay@hmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_is_default` int(11) DEFAULT NULL,
  `t_user` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`t_id`, `t_name`, `t_is_default`, `t_user`) VALUES
(13, 'Deals', 1, 3),
(14, 'Coupons', 0, 3),
(15, 'Test', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(300) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_img` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_name`, `u_password`, `u_phone`, `u_email`, `u_img`, `u_role`) VALUES
(3, 'Admin', '$2y$12$ySQbNyIOqQI8P4W5iyltyuIxdvgbk6diQHNukvvEUENHy12eEWAmi', '5435345345', 'admin@mail.com', '032a6379278c82401a2473ab10aaf1f1.jpg', 'Admin'),
(5, 'Arif khan', '$2y$12$zY/kYYE/kEfKjw03j2ZiI.rWXsIktoAhozYtHzetJYzPX9is.BfrC', '03482010869', 'marif739@gmail.com', '', 'user'),
(6, 'Asim', '$2y$12$ZWnUTaFvmm14vlOTur.MCuTcgXunaiBBWJ5weUBZRIxx/g7gleX.G', '03482010869', 'asim@mail.com', '', 'user'),
(7, 'Arif khan', '$2y$12$dG5Nhww2TV7IEfcKmS4yruqM0wfXhBq4lNZTurT6q5b77Tl/9DjF.', '03482010869', 'adil@gmail.com', '', 'user'),
(8, 'Arif khan', '$2y$12$fMHWIXOTClaJXwuRkBR.d.L2JVQFwUpN8rJ420BkbGL4RDnAB30FO', '03482010869', 'arif739.tgi@gmail.com', '', 'user'),
(9, 'Arif khan', '$2y$12$AwIHy2en8oeGDbTX6pV4Auif0s0TbKWUZAiHq3ug8YjlRDx8JtaGi', '03482010869', 'ali@mail.com', '', 'user'),
(10, 'Hady', '$2y$12$vFgErbSGAUthYKSZE9eET.3RzUj3.NgaFgswdOleV0RhU2NPAhnhC', '45654654564', 'shay@hmail.com', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_api_cat`
--
ALTER TABLE `tbl_api_cat`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `tbl_coupens`
--
ALTER TABLE `tbl_coupens`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_api_cat`
--
ALTER TABLE `tbl_api_cat`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_coupens`
--
ALTER TABLE `tbl_coupens`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
