-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 06:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20382767_autoclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `cal_id` int(11) NOT NULL,
  `cal_date` date NOT NULL,
  `cal_emp` int(11) NOT NULL,
  `cal_tmsch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_maker` varchar(25) NOT NULL COMMENT 'Merk mobil dibuat',
  `car_model` varchar(25) NOT NULL COMMENT 'Model mobil',
  `car_year` int(11) NOT NULL COMMENT 'Tahun mobil dirilis',
  `car_status` varchar(10) NOT NULL COMMENT 'Opsinya Brand New, Second, Rental, Sold',
  `car_status_shop` varchar(25) NOT NULL DEFAULT '''AVAILABLE''' COMMENT 'Status ketika pelanggan melakukan pemesanan baik sewa dan/atau beli. \r\nOpsi AVAILABLE, RENTED, SOLD, WAITING',
  `car_transmission` varchar(20) NOT NULL COMMENT 'Opsinya Automatic, Manual, dan CVT',
  `car_drivetrain` varchar(5) NOT NULL COMMENT 'Opsinya FWD, RWD, 4WD dan AWD',
  `car_passangers` int(10) NOT NULL COMMENT 'Jumlah penumpang',
  `car_kilomatres` int(25) DEFAULT NULL,
  `car_bodytype` varchar(30) NOT NULL COMMENT 'Opsinya Pickup, SUV, Coupe, Convertible, Sedan, Minicar',
  `car_engine` varchar(20) NOT NULL COMMENT 'Formatnya xxx HP xxL Vx',
  `car_exteriorcolor` varchar(25) NOT NULL COMMENT 'Warna kalau bisa pakai kata umum ex, black, red,orange',
  `car_interiorcolor` varchar(25) NOT NULL COMMENT 'Warna kalau bisa pakai kata umum ex, black, red,orange',
  `car_fuel` varchar(25) NOT NULL COMMENT 'Jenis bensin',
  `car_description` text NOT NULL COMMENT 'Boleh dikosongkan',
  `car_minus` text DEFAULT NULL,
  `car_testdrive` int(11) DEFAULT NULL,
  `car_price` int(10) NOT NULL COMMENT 'Harga sebanyak 3 digit ',
  `car_thumbnail` text DEFAULT NULL COMMENT 'Gambar yang ditampilkan utama',
  `car_pricetext` varchar(10) NOT NULL COMMENT 'Opsinya Million dan Billion',
  `car_date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Tanggal data mobil dimasukan ke database'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_maker`, `car_model`, `car_year`, `car_status`, `car_status_shop`, `car_transmission`, `car_drivetrain`, `car_passangers`, `car_kilomatres`, `car_bodytype`, `car_engine`, `car_exteriorcolor`, `car_interiorcolor`, `car_fuel`, `car_description`, `car_minus`, `car_testdrive`, `car_price`, `car_thumbnail`, `car_pricetext`, `car_date`) VALUES
(1, 'Nissan', 'Maxima', 2017, 'Brand New', 'WAITING', 'Auto', 'FWD', 5, 0, 'Sedans', '300 hp 3.5L  V-6 ', ' Dark Grey', ' Jet Black', 'Gasoline ', '', NULL, NULL, 115, 'images\\photos\\2017_nissan_maxima-pic-803819593088110024-1024x768.jpeg', 'Million', '2023-04-03'),
(2, 'BMW', '320i', 2018, 'Second', 'AVAILABLE', 'Auto', 'FWD', 5, 45564, 'Sedans', '180 hp  2.0L  V-4', 'White', 'Black', 'Gasoline ', '18 Temuan: Kap Mesin Stonechip Fender kanan depan Stonechip Fender kiri depan Stonechip Pintu Depan Kanan Baret Pintu Depan Kiri Baret Bumper Belakang Baret Fender belakang kanan Stone chip Pintu belakang kanan Stonechip Pintu belakang kiri Stonechip Gril Depan Baret Kaca depan Stonechip Kaca kanan depan Kaca film gores Kaca Belakang Gores Spion Kanan Baret Kondisi Velg Depan Kiri Baret & Cat terkelupas Kondisi Velg Depan Kanan Cat terkelupas Kondisi Velg Belakang Kiri Baret & Cat terkelupas Kondisi Velg Belakang Kanan Cat terkelupas', NULL, NULL, 506, 'images\\photos\\88402_1.jpg', 'Million', '2023-03-02'),
(3, 'Toyota', 'Fortuner', 2014, 'Second', 'AVAILABLE', 'Auto', 'AWD', 7, 45564, 'SUVs', '158 hp 2.7L V-4', 'White', 'Black', 'Petrol', '', NULL, NULL, 239, 'images\\photos\\Toyota-Fortuner-Facelift-Indonesia-Front.jpg', 'Million', '2023-03-01'),
(4, 'Toyota', 'Land Cruiser EXR', 2023, 'Rental', 'AVAILABLE', 'Auto', 'AWD', 7, 0, 'SUVs', '271 hp 4.0L V-6', 'White', 'Black', 'Petrol', 'With a starting price of AED 233,900, the Toyota Land Cruiser competes with very well-known competitors . This Japanese Premium large suv car is available in 8 versions .\r\nAvailable in 3 engine options, the Land Cruiser offers new car buyers a 3.3-liter , 4.0-liter and 3.5-liter engine to choose from. Known for its reliability, the Toyota Land Cruiser comes with features such as: Acoustic Front Windshield, Center Arm Rest, 12V Socket - Front Only, Moving object detection system, among others.', NULL, NULL, 3, 'images\\photos\\01.jpg', 'Million', '2023-04-01'),
(5, 'Toyota', 'Land Cruiser EXR', 2023, 'Brand New', 'AVAILABLE', 'Auto', 'AWD', 7, 0, 'SUVs', '271 hp 4.0L V-6', 'White', 'Black', 'Petrol', 'With a starting price of AED 233,900, the Toyota Land Cruiser competes with very well-known competitors . This Japanese Premium large suv car is available in 8 versions .\r\nAvailable in 3 engine options, the Land Cruiser offers new car buyers a 3.3-liter , 4.0-liter and 3.5-liter engine to choose from. Known for its reliability, the Toyota Land Cruiser comes with features such as: Acoustic Front Windshield, Center Arm Rest, 12V Socket - Front Only, Moving object detection system, among others.', NULL, NULL, 2, 'images\\photos\\01.jpg', 'Billion', '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `custumer`
--

CREATE TABLE `custumer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(125) NOT NULL,
  `cus_password` varchar(10) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_phone` varchar(25) DEFAULT NULL,
  `cus_address` text DEFAULT NULL,
  `cus_post_code` varchar(5) DEFAULT NULL COMMENT 'Kode pos pelanggan',
  `cus_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status verifikasi akun',
  `cus_subscribe` tinyint(1) NOT NULL DEFAULT 1,
  `cus_lastlog` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custumer`
--

INSERT INTO `custumer` (`cus_id`, `cus_name`, `cus_password`, `cus_email`, `cus_phone`, `cus_address`, `cus_post_code`, `cus_verified`, `cus_subscribe`, `cus_lastlog`) VALUES
(1, 'Dewei Ratu', 'ratu', 'dewiratu@mail.com', '11111111', '', '', 1, 0, '2023-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `mail_id` int(11) NOT NULL,
  `mail_topic` int(2) NOT NULL,
  `mail_name` varchar(125) NOT NULL,
  `mail_email` varchar(225) NOT NULL,
  `mail_ttl` text DEFAULT NULL,
  `mail_msg` text NOT NULL,
  `mail_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status sudah dibalas atau belum',
  `mail_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`mail_id`, `mail_topic`, `mail_name`, `mail_email`, `mail_ttl`, `mail_msg`, `mail_status`, `mail_date`) VALUES
(1, 1, 'Todd D. Mund', 'ToddDMund@armyspy.com', NULL, 'Pellentesque a justo ut lorem.', 0, '2023-04-20'),
(2, 2, 'Michelle Ali', 'MichelleAli@jourrapide.com', 'Suggestion for adding a dark mode to the website', 'Dear Website Administrator,\r\n\r\nI have been using your website for a while now and I must say that I find it informative and easy to navigate. However, as a frequent user, I noticed that the website lacks a much-needed feature – a dark mode.\r\n\r\nThe majority of the modern websites and apps now offer a dark mode that dims the screen and uses dark colors instead of white to reduce eye strain, especially when using them in low-light environments. I believe that adding a similar feature to your website will greatly enhance the user experience.\r\n\r\nAs someone who spends several hours using the website every day, a dark mode would make such a difference, particularly when I\'m working late at night or early in the morning. Besides, there is considerable research that suggests that a dark mode also saves battery life on mobile devices and laptops.\r\n\r\nI understand that implementing a new feature isn\'t always easy, but I hope that you will consider adding a dark mode option on your website. I\'m confident that it will attract more users and will also make the website more user-friendly for those who prefer a darker screen.\r\n\r\nThank you for taking the time to consider my suggestion. I look forward to hearing back from you soon.\r\n\r\nBest regards,\r\n', 0, '2023-04-20'),
(3, 3, 'AmirPerkins', 'Amir@mail.com', 'Complaint for a scratch in my car', 'Dear [Recipient],\r\n\r\nI am writing to express my disappointment with the service I received at your car park recently. I parked my car in your car park on [Date], and when I returned to pick it up, I noticed that there was a visible scratch on the front bumper.\r\n\r\nI think it is unacceptable that my car has been damaged while in your car park, especially given how careful I am with my vehicle. It is clear that someone has been careless or negligent with my car, and as a result, I now have to pay for repairs that could have otherwise been avoided.\r\n\r\nI strongly urge you to investigate this matter and provide me with an explanation as to how this happened. I would appreciate a clear and concise report of the incident, along with details of the person responsible for the damage. I also insist that you take responsibility for the repair costs, as it is only fair given that the damage occurred within your premises.\r\n\r\nI look forward to hearing from you soon on this matter and I hope for a positive resolution.\r\n\r\nYours sincerely,\r\n', 0, '2023-05-24'),
(4, 1, 'AmirPerkins', 'Amir@mail.com', ' Inquiry on Car in Catalog\r\n', 'Dear [Catalog Manager],\r\n\r\nI hope this email finds you well. I am writing to inquire about one of the cars in your catalog. Specifically, I am interested in the [Car Make and Model] that is currently listed on page [Page Number] of your catalog.\r\n\r\nI was wondering if you could provide me with some additional information on this vehicle. Can you tell me more about its features, including its engine type, fuel efficiency, and safety ratings? Are there any unique or standout features that make this car a particularly good choice for potential buyers? Additionally, could you provide me with a breakdown of its pricing, including any available financing options?\r\n\r\nI apologize for bombarding you with so many questions at once, but I am seriously considering purchasing this car and would like to be as informed as possible before making a decision. Any information you could provide me with would be greatly appreciated.\r\n\r\nThank you very much for your time and consideration. I look forward to hearing back from you soon.\r\n\r\nBest regards,', 0, '2023-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_eid` int(11) NOT NULL COMMENT 'Kode unik pekerja',
  `emp_username` varchar(125) NOT NULL,
  `emp_pass` varchar(10) NOT NULL,
  `emp_position` varchar(12) NOT NULL DEFAULT 'Part-time' COMMENT 'Jabatan kerja, opsinya Manager, Reguler, Trainee, Part-time',
  `emp_schedule` date DEFAULT NULL,
  `emp_name` varchar(125) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phone` varchar(25) NOT NULL,
  `emp_address` text DEFAULT NULL,
  `emp_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Opsi Available atau Resting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_eid`, `emp_username`, `emp_pass`, `emp_position`, `emp_schedule`, `emp_name`, `emp_email`, `emp_phone`, `emp_address`, `emp_status`) VALUES
(1, 2435, 'Jayadi1', 'Jayadi1', 'Manager', '2023-05-10', 'Jayadi Sihombing', 'kmaryadi@salahudin.id', '068482426494', 'Psr. Gremet No. 112, Sabang 61815, KepR', 1),
(2, 2534, 'Dabukke1', 'Dabukke1', 'Reguler', '2023-05-10', 'Gamblang Dabukke', 'devi76@yahoo.com', '088268962366', 'Gg. Suryo Pranoto No. 178, Binjai 65970, Jambi', 1),
(3, 4530, 'Martani1', 'Martani1', 'Reguler', '2023-05-10', 'Martani Wibisono', 'paiman.adriansyah@gmail.co.id', '0858185809', 'Psr. Jakarta No. 94, Medan 85171, DKI', 0),
(4, 4532, 'Asman1', 'Asman1', 'Reguler', '2023-05-10', 'Asman Marpaung', 'suci03@suryatmi.co.id', '08392659979', '', 0),
(5, 4560, 'Mulya1', 'Mulya1', 'Reguler', '2023-05-10', 'Mulya Nugroho', 'hasna.mangunsong@wijaya.in', '03837430835', '', 1),
(6, 4535, 'Jumari1', 'Jumari1', 'Reguler', '2023-05-10', 'Jumari Suryono', 'chelsea81@yahoo.co.id', '08938400123', 'Jr. Suprapto No. 305, Kupang 28350, JaTim', 0),
(7, 3486, 'Asman2', 'Asman2', 'Reguler', '2023-05-10', 'Asman Prakasa', 'kardi63@nashiruddin.desa.id', '032583222806', '', 1),
(8, 4554, 'Opan1', 'Opan1', 'Reguler', '2023-05-10', 'Opan Salahudin', 'mutia.haryanto@gmail.com', '02379676339', 'Dk. Cut Nyak Dien No. 446, Balikpapan 47552, KalBar', 1),
(9, 756, 'Sidiq1', 'Sidiq1', 'Reguler', '2023-05-10', 'Sidiq Tampubolon', 'jagaraga.hardiansyah@gmail.co.id', '03277384723', '', 0),
(10, 640, 'Wakiman1', 'Wakiman1', 'Part-time', '2023-05-10', 'Wakiman Wacana', 'gsimbolon@gmail.co.id', '057963403894', 'Gg. Mahakam No. 644, Pangkal Pinang 82628, SulUt', 0),
(11, 4054, 'Bakidin1', 'Bakidin1', 'Trainee', '2023-05-10', 'Bakidin Irawan', 'opradipta@wibowo.asia', '032023848058', 'Kpg. Lumban Tobing No. 539, Tegal 44633, Banten', 1),
(12, 542, 'Gamani1', 'Gamani1', 'Trainee', '2023-05-10', 'Gamani Samosir', 'puji93@budiman.org', '09215286751', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newslatter`
--

CREATE TABLE `newslatter` (
  `nw_id` int(11) NOT NULL,
  `nw_cus` int(11) DEFAULT NULL,
  `nw_name` varchar(125) NOT NULL,
  `nw_email` int(225) NOT NULL,
  `nw_status` tinyint(1) NOT NULL DEFAULT 1,
  `nw_start` date NOT NULL DEFAULT current_timestamp(),
  `nw_stop` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pic_id` int(11) NOT NULL,
  `pic_car` int(11) NOT NULL COMMENT '	Merujuk pada index tabel cars',
  `pic_path` text NOT NULL COMMENT 'Berisikan lokasi penyimpanan foto Contoh iamges/photos/xxxx.jpg',
  `pic_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pic_id`, `pic_car`, `pic_path`, `pic_date`) VALUES
(1, 1, 'images\\photos\\2017_nissan_maxima-pic-620492937931546633-1024x768.jpeg', '2023-04-03'),
(2, 1, 'images\\photos\\2017_nissan_maxima-pic-803819593088110024-1024x768.jpeg', '2023-04-03'),
(3, 1, 'images\\photos\\2017_nissan_maxima-pic-1845729666399152904-1024x768.jpeg', '2023-04-03'),
(4, 1, 'images\\photos\\2017_nissan_maxima-pic-2014820638541239144-1024x768.jpeg', '2023-04-03'),
(5, 1, 'images\\photos\\2017_nissan_maxima-pic-3017402972173507506-1024x768.jpeg', '2023-04-03'),
(6, 3, 'images\\photos\\2017_nissan_maxima-pic-6751552886793168718-1024x768.jpeg', '2023-03-01'),
(7, 3, 'images\\photos\\2017_nissan_maxima-pic-6976057528539861543-1024x768.jpeg', '2023-03-01'),
(8, 2, 'images\\photos\\2017_nissan_maxima-pic-7343079518108597209-1024x768.jpeg', '2023-03-02'),
(9, 2, 'images\\photos\\2017_nissan_maxima-pic-8922343800962476844-1024x768.jpeg', '2023-03-02'),
(10, 4, 'images\\photos\\01.jpg', '2023-04-01'),
(11, 4, 'images\\photos\\02.png', '2023-04-01'),
(12, 5, 'images\\photos\\01.jpg', '2023-04-02'),
(13, 5, 'images\\photos\\02.png', '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_cus` int(11) DEFAULT NULL COMMENT '	Merujuk pada index tabel custumer',
  `sch_cus_nw` int(11) DEFAULT NULL COMMENT 'Id custumer terdaftar pada newslatter',
  `sch_emp` int(10) NOT NULL,
  `sch_car` int(11) NOT NULL COMMENT '	Merujuk pada index tabel cars',
  `sch_time` int(11) NOT NULL COMMENT '	Merujuk pada index tabel timeSchedule',
  `sch_status` varchar(10) NOT NULL DEFAULT 'On-Time' COMMENT 'Opsi On_Time,On-Call,On-Rode, Delay, Cancel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `sch_cus`, `sch_cus_nw`, `sch_emp`, `sch_car`, `sch_time`, `sch_status`) VALUES
(1, 1, NULL, 0, 1, 2, 'On-Time');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE `shopping` (
  `shop_id` int(11) NOT NULL,
  `shop_car` int(11) NOT NULL COMMENT 'Merujuk pada index tabel cars',
  `shop_cus` int(11) NOT NULL COMMENT 'Merujuk pada index tabel custumer',
  `shop_payment` varchar(40) NOT NULL COMMENT 'Total pembayaran',
  `shop_status` varchar(10) NOT NULL COMMENT 'Status pembayaran',
  `shop_date_payment` date DEFAULT NULL COMMENT 'Tanggal jatuh tempo pembayaran',
  `shop_date_created` date NOT NULL DEFAULT current_timestamp() COMMENT 'Tanggal dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`shop_id`, `shop_car`, `shop_cus`, `shop_payment`, `shop_status`, `shop_date_payment`, `shop_date_created`) VALUES
(12, 1, 1, '115 Million', 'Waiting', NULL, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `timeschedule`
--

CREATE TABLE `timeschedule` (
  `tmsch_id` int(11) NOT NULL,
  `tmsch_time` time NOT NULL,
  `tmsch_status` varchar(10) DEFAULT NULL COMMENT 'Opsi Available, Cancel, Fully Booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeschedule`
--

INSERT INTO `timeschedule` (`tmsch_id`, `tmsch_time`, `tmsch_status`) VALUES
(1, '09:00:00', 'Available'),
(2, '09:30:00', 'Available'),
(3, '10:00:00', 'Available'),
(4, '10:30:00', 'Available'),
(5, '11:00:00', 'Available'),
(6, '11:30:00', 'Available'),
(7, '12:00:00', 'Available'),
(8, '13:00:00', 'Available'),
(9, '13:30:00', 'Available'),
(10, '14:00:00', 'Available'),
(11, '14:30:00', 'Available'),
(12, '15:00:00', 'Available'),
(13, '15:30:00', 'Available'),
(14, '16:00:00', 'Available'),
(15, '16:30:00', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid_id` int(11) NOT NULL,
  `vid_car` int(11) NOT NULL COMMENT '	Merujuk pada index tabel cars',
  `vid_path` text NOT NULL COMMENT 'Berisikan link video seperti youtube'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`cal_id`),
  ADD KEY `cal_tmsch` (`cal_tmsch`),
  ADD KEY `cal_emp` (`cal_emp`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `custumer`
--
ALTER TABLE `custumer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_EID` (`emp_eid`),
  ADD UNIQUE KEY `emp_username` (`emp_username`);

--
-- Indexes for table `newslatter`
--
ALTER TABLE `newslatter`
  ADD PRIMARY KEY (`nw_id`),
  ADD UNIQUE KEY `nw_cus` (`nw_cus`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `pic_car` (`pic_car`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `sch_car` (`sch_car`),
  ADD KEY `sch_cus` (`sch_cus`),
  ADD KEY `sch_time` (`sch_time`) USING BTREE,
  ADD KEY `sch_emp` (`sch_emp`),
  ADD KEY `sch_cus_op` (`sch_cus_nw`),
  ADD KEY `sch_cus_nw` (`sch_cus_nw`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `shop_car` (`shop_car`,`shop_cus`),
  ADD KEY `shop_cus` (`shop_cus`);

--
-- Indexes for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD PRIMARY KEY (`tmsch_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid_id`),
  ADD KEY `vid_car` (`vid_car`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custumer`
--
ALTER TABLE `custumer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newslatter`
--
ALTER TABLE `newslatter`
  MODIFY `nw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timeschedule`
--
ALTER TABLE `timeschedule`
  MODIFY `tmsch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`cal_tmsch`) REFERENCES `timeschedule` (`tmsch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendar_ibfk_3` FOREIGN KEY (`cal_emp`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newslatter`
--
ALTER TABLE `newslatter`
  ADD CONSTRAINT `newslatter_ibfk_1` FOREIGN KEY (`nw_cus`) REFERENCES `custumer` (`cus_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`pic_car`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`sch_car`) REFERENCES `cars` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`sch_cus`) REFERENCES `custumer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`sch_time`) REFERENCES `timeschedule` (`tmsch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`sch_emp`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `shopping_ibfk_1` FOREIGN KEY (`shop_cus`) REFERENCES `custumer` (`cus_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `shopping_ibfk_2` FOREIGN KEY (`shop_car`) REFERENCES `cars` (`car_id`) ON DELETE NO ACTION;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`vid_car`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
