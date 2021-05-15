-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 04:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_multiplelogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_title` text NOT NULL,
  `b_detail` text NOT NULL,
  `b_date` datetime NOT NULL,
  `b_view` int(10) NOT NULL,
  `b_reply` int(10) NOT NULL,
  `b_cate` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`b_id`, `u_id`, `b_title`, `b_detail`, `b_date`, `b_view`, `b_reply`, `b_cate`) VALUES
(1, 1, 'เทคนิคการซ่อมคอมพิวเตอร์ด้วยตนเอง', '   บ่อยครั้งที่คอมพิวเตอร์มีปัญหา เช่น อาการจอมืด , ซีดีรอมไม่ทำงาน หรือฮาร์ดิสก์เสีย ถึงแม้ว่าตอน ซื้อมาจะมีการรับประกัน 2 ถีง 3 ปี แต่โดยส่วนใหญ่แล้วผู้ใช้จะไม่ได้ซื้อ คอมพ์ทุก 2-3 ปีตามระยะการ ประกัน ดั้งนั้นการซ่อมจึงเป็นเรื่องหลีกเลี่ยงไม่ได้ ที่นี้เรามาดูแนวทางการซ่อมคอมพ์พิวเตอร์ด้วยตนเอง \r\n\r\n1. บันทึกทุกอย่างเก็บไว้ แม้ว่าการใช้คอมพิวเตอร์ จะทำให้สามารถที่จะทิ้งเอกสารกองโต ออกไปจากโต๊ะทำงาน ได้ก็ตาม แต่ก่อนที่ทิ้งทุกอย่างไป ควรจะทำการหาวิธีในการเก็บข้อมูลเหล่านั้นไว้ เผื่อในกรณีที่อาจเกิดปัญหา ในอนาคต ยอมเสียเวลาสักเล็กน้อยกรอกแบบฟอร์มต่าง ๆ ให้เรียบร้อย ซึ่งผู้ผลิตคอมพิวเตอร์บางราย ก็ให้มีการลงทะเบียนกันแบบออนไลด์ แต่อย่าลืมพิมพ์สำเนาออกมาเก็บรวมไว้กับใบเสร็จรับเงิน เก็บใบเสร็จ รับเงินและใบรับประกันทุกอย่างไว้ให้ดี โดยเฉพาะอุปกรณ์ที่มีการรับประกันแยกต่างหากออกไปไม่รวมกับ ตัวเครื่อง เช่น โมเด็ม , ซีพียู , เมนบอร์ด , จอ และอื่น ๆ \r\n\r\n2.ทำการบ้านก่อนเลือกซื้อ ตอนที่ซื้อคอมพิวเตอร์ ควรจะต้องนึกถึงการซ่อมแซมที่จะเกิดขึ้นในอนาคต ในการเลือกซื้อก็ต้องคิดอยู่เสมอว่า บางร้านรับซ่อมจะมีการคิดค่าตรวจสอบเครื่องด้วย ไม่ว่าเครื่องจะอยู่ใน ประกันหรือไม่ก็ตาม ก่อนซื้อคงจะต้องทำการบ้านกันให้ดีในเรื่องของประกันที่บริษัทมีให้ ไม่ว่าจะในเรื่องประกัน การขยายระยะประกัน หรือว่าค่าธรรมเนียมต่าง ๆ สิ่งเหล่านี้จะทำให้คุณประหยัดทั้งเงินและเวลาได้ในอนาคต \r\n\r\n3.จดบันทึกอาการเสีย เมื่อคอมพ์พิวเตอร์มีอาการผิดปกติขึ้น ให้จดบันทึกอาการต่างไว้ โดยเฉพาะอย่างยิ่ง Error Messages ต่างๆ ซึ่งจะมีประโยชน์และจะมีส่วนช่วยช่าง หรือผู้เชี่ยวชาญในการวิเคราะห์สาเหตุเสียได้มาก ให้จดบันทึกอาการที่เกิดขึ้นให้ละเอียดที่สุดเท่าที่จะทำได้ เพื่อที่ช่างจะได้ซ่อมได้เร็วและตรงจุด โดยทั่วไปแล้ว คำถามที่ช่างหรือคนที่จะช่วยเหลือคุณมักจะถามเช่น จอภาพแสดงอาการอย่างไร หรือ Error massage ที่เกิดขึ้นคืออะไร เป็นต้น ถ้าคุณสามารถที่จะตอบคำถามเหล่านี้จะเป็นประโยชน์อย่างมากต่อช่าง และคุณเอง โดยเฉพาะอย่างยิ่งถ้าคุณปรึกษากับช่างผ่านทางโทรศัพท์ แลัก่อนที่จะตัดสินใจเลือกร้านซ่อมก็ให้ตรวจระยะเวลา ประกันของคอมพิวเตอร์และบรรดาอุปกรณ์ต่อพ่วงต่าง ๆ ให้ดี \r\n\r\n4.สำรวจให้ทั่ว ๆ การนำเครื่อคอมพิวเตอร์ไปซ่อมกับบริษัทที่คุณซื้อมาก็ไม่ใช้ว่าจะเป็นวิธีที่ดีเสมอไ ป เพราะบางครั้งถ้าศึกษาให้ดี ๆ อาจพบว่า ซ่อมกับบริษัทอาจทำให้คุณต้องเสียทั้งเงินและเวลา มากกว่าที่ตวรเป็นก็ได้ วิธีที่น่าจะดีกว่า ก็คือลองสำรวจร้านอื่น ๆ ดูไม่ว่าจะเป็นร้านเล็กหรือใหญ่ ตรวจสอบข้อมูลเรื่องเวลาและราคาในการซ่อมเช่น ค่าตรวจเครื่อง ค่าแรง หรือค่าซ่อมนอกสถานที่ (ในกรณีที่ต้องการให้ช่างมาซ่อมที่บ้าน) เป็นต้น ร้านเล็ก ๆ บางครั้งให้ความสำคัญเป็นกันเองกับลูกค้ามากกว่า ร้านใหญ่ ๆ เนื่องจากมีความต้องการอยู่รอดในการแข่งขันกับร้านใหญ่ ๆ ในขณะเดินสำรวจร้านต่าง ๆ อยู่ให้ลองสังเกคร้านที่ติดโลโก้ยี่ห้อดังเช่น ไอบีเอ็ม , คอมแพค , เป็นต้น ซึ่งมันอาจเป็นไปได้ว่า ร้านนั้น ๆ รับซ่อมเครื่องที่อยู่ในประกันของยี่ห้อนั้น ๆ แต่อย่างไรก็ตามร้านที่รับซ่อมคอมพิวเตอร์ส่วนใหญ่จะรับซ่อม เครื่องทุกยี่ห้ออยู่แล้ว \r\n\r\n5.ค้นหาบริการทางโทรศัพท์ บางกรณีอาจเป็นการไม่สะดวกที่จะเดินทางไปซ่อมที่ร้านโดยตรง การไปโทรศัพท์ไปปรึกษาจึงเป็นอีกทางเลือกหนึ่ง เมื่อคุณเริ่มโทรศัพท์หาร้านซ่อม ให้ลองสังเกตพฤติกรรมต่าง ๆ ที่คุณได้รับทางโทรศัพท์ เช่นต้องรอสายนานเท่าไร เต็มใจช่วยเหลือหรือไม่ แค่นี้ก็เป็นการช่วยตัดสินใจได้ว่า ควรซ่อมกับร้านนั้นหรือไม่ แล้วอย่าลืมจดชื่อรุ่นหรือ Serial Number ของคอมพิวเตอร์ไว้เพื่อความสะดวก หรือจะโทรไปรายการ 94 FM ทุกวันจันทร์-ศุกร์ เวลา 14:00-15:00 ที่นี้รับตอบปัญหาทุกเรื่องดีมากเลย \r\n\r\n6.ค่าธรรมเนียม เมื่อยกเครื่องคอมพิวเตอร์ไปซ่อมเป็นธรรมดาที่ช่างจะสำรวจดูว่ามีอะไรบ้างที่ต้องซ่อ ม ตั้งแต่สายไฟยันฮาร์ดดิส ซึ่งร้านจำเป็นจะต้องคิดค่าธรรมเนียมในการตรวจสอบนี้ แต่ก็มีบางร้านเหมือนกัน ที่ไม่คิด แต่ถ้าคุณพอมีความรู้เรื่องเครื่องคอมพิวเตอร์อยู่บ้าง ก็อาจทดลองใช้โปรแกรม Norton Utility ตรวจสอบเครื่องของคุณก่อน บางที่อาจทำให้คุณไม่ต้องเสียเงินก็ได้ หรือบางที่คุณอาจโทรมาเรียกช่างมาซ่อม ที่บ้านก็ได้ แต่คุณจะต้องเสียเงินเพิ่มขึ้น \r\n\r\n7.คิดในแง่ร้ายไว้ก่อน หลังจากที่เครื่องของคุณได้รับการตรวจสอบอาการจากหลาย ๆ ร้านซ่อมแล้ว ก็มาถึงขั้นตอนในการตัดสินใจว่า จะซ่อมหรือไม่ซ่อมในร้านใดจึงจะดี ซึ่งบางครั้งร้านซ่อมอาจจะบอกว่าเครื่อง ไม่อยู่ในประกันแล้วหรืออะไหล่ชิ้นที่ต้องการไม่มีอีกต่อไปแล้ว ข่าวร้ายเหล่านี้เป็นแคเพียงขั้นเริ่มต้นใน การซ่อมคอมพิวเตอร์ของคุณ บางที่คุณอาจลองสอบถามร้านดูว่าสามารถจะเอาอะไหล่เก่าไปแลกอะไหล่ใหม่ ได้หรือไม่ ในกรณีอะไหล่ชิ้นเก่าเลิกผลิตไปแล้ว โดยอาจต้องเพิ่มเงินเล็กน้อย \r\n\r\n8.เตรียมเครื่องให้พร้อมก่อนนำไปซ่อม ก่อนที่จะทิ้งเครื่องเอาไว้ที่ร้านเพื่อทำการซ่อมลองตรวจสอบว่าคุณได้ แบ็กอัพข้อมูลที่สำคัญเอาไว้ , จด Serial number ของฮาร์ดิสก์ , ซีดีรอม , โมเด็ม และอื่น ๆ ไว้เพื่อตรวจสอบกับอุปกรณ์ที่นำมาเปลี่ยน ลบข้อมูลส่วนตัวออกให้หมดเช่น อินเตอร์เน็ทพาสเวิร์ด เพื่อป้องกันถูกลักลอบนำไปใช้ \r\n\r\n9.ขอเอกสารการซ่อมจากร้าน ก่อนที่จะทิ้งเครื่องเอาไว้ที่ร้านอย่าลืมขอเอกสารที่บอกถึงชิ้นส่วนที่จะเปลี่ยน และระยะเวลาในการซ่อม ตรวจสอบเอกสารให้ละเอียดเพื่อป้องกันค่าใช้จ่านแอแฝง แล้วอย่าลืมถามถึงการ รับประกันหลังการซ่อม \r\n\r\n10.ติดตามความคืบหน้า สิ่งสุดท้ายที่ต้องทำคือคอยโทรไปถามว่าการซ่อมไปถึงไหน เปลี่ยนอะไรบ้าง เสร็จทันกำหนดหรือไม่ และเมื่อไปรับเครื่อง ให้ทดสอบดูก่อนว่าเครื่องทำงานปกติหรือไม่ ก่อนนำเครื่องกลับ ข้อมูลจาก เซียนคอม http://xchange.teenee.com/index.php?showtopic=13410&mode=linearplus\r\n\r\nhttps://www.kroobannok.com/1353', '2021-05-11 00:21:21', 6, 0, '1'),
(2, 1, 'คุณสมบัติสำคัญของการเป็นช่างซ่อมคอมพิวเตอร์  ', '1. ใจต้องรัก เป็นพื้นฐานของทุกอาชีพโดยเฉพาะช่างซ่อมคอมพิวเตอร์ที่มักจะเจอปัญหาไม่เหมือนกันในการซ่อมแต่ละเคส หรือบางคนเจอลูกค้าจุกจิก ลูกค้าที่ไม่ค่อยเข้าใจในลักษณะงานซ่อม หากใจไม่รักอาชีพนี้อยู่ยาก \r\n\r\n2. ขยันหาความรู้ใหม่อยู่เสมอ คอมพิวเตอร์มีพัฒนาการเปลี่ยนแปลงตลอดเวลาทั้งตัวโปรแกรม ระบบปฏิบัติการ คนที่คิดจะเป็นช่างต้องหาความรู้มาพัฒนาตัวเองให้ก้าวตามสิ่งที่เปลี่ยนแปลงได้ \r\n\r\n3. อุปกรณ์ซ่อมต้องมีความพร้อม การเป็นช่างซ่อมคอมพิวเตอร์มีเครื่องมือจำนวนมาก การจะเดินสายช่างคอมพิวเตอร์จึงต้องรู้ว่าเครื่องมือเบื้องต้นที่สำคัญและจำเป็นนั้นมีอะไรบ้าง เพื่อให้สามารถรองรับลูกค้าได้ทุกกรณี \r\n\r\n4. รู้จักการทำตลาด จุดอ่อนของอาชีพช่างซ่อมคอมพิวเตอร์คือลูกค้าส่วนใหญ่จะเป็นคนในพื้นที่ เพราะคงไม่มีใครเดินทางไกลๆ เพื่อเอาคอมตัวเดียวไปร้านซ่อม การจะทำให้ร้านซ่อมคอมพิวเตอร์เรามีรายได้มากขึ้นจึงต้องสรรหากลยุทธ์การตลาด เช่นการรับซ่อมคอมพิวเตอร์นอกสถานที่เป็นต้น \r\n\r\n5. บริการหลังซ่อมเพื่อสร้างความประทับใจ อาชีพช่างซ่อมก็คือหนึ่งในงานบริการ เมื่อเราซ่อมเสร็จก็ควรสร้างความประทับใจให้ลูกค้าด้วยการติดตามผลของการซ่อมว่าลูกค้ามีปัญหาอะไรเพิ่มเติมหรือเปล่าจะช่วยให้มีลูกค้าประจำเพิ่มมากขึ้นได้\r\n\r\n\r\nขอบคุณข้อมูล https://bit.ly/2EcLkvo , https://bit.ly/2DXEIRT , https://bit.ly/3iTRmQC , https://bit.ly/2QiEM17 , https://bit.ly/3j62ha3 อ้างอิงจาก https://bit.ly/3lgC4XX See more at: http://www.thaismescenter.com/เทคนิคการเป็นช่างซ่อมคอมพิวเตอร์เบื้องต้น/\r\n\r\nSee more at: http://www.thaismescenter.com/เทคนิคการเป็นช่างซ่อมคอมพิวเตอร์เบื้องต้น/', '2021-05-11 00:23:24', 8, 0, '2'),
(3, 1, 'อุปกรณ์เบื้องต้นที่ช่างซ่อมคอมพิวเตอร์ควรมี  ', '1.ไขควง 4 แฉก ไว้เปิดฝาเคส+ไขน๊อต ควรเลือกซื้อให้ยาวประมาณ 20 ซม. และควรเป็นหัวแม่เหล็กสำหรับดูดน๊อตได้ \r\n\r\n2.ยางลบ ไว้ทำความสะอาดหน้า contact(ลายทองแดง) \r\n\r\n3.CD-Rom ไว้ใส่แผ่น CD แผ่นวินโดว ที่มีวินโดว XP Vista 98 และ Ghost ในตัว \r\n\r\n4.Floppy disk drive ไว้ใส่แผ่นตอนบูทสำหรับบางเมนบอร์ดที่ต้องใช้ raid เวลา setup วินโดว์\r\n\r\n5.Flash Drive สำหรับ ลงวินโดว์ตัวใหม่ ๆ \r\n\r\n6.Handy Drive หรือ box ไว้ใส่โปรแกรมติดเครื่อง เอาไว้ลงให้ลูกค้า \r\n\r\n7.เครื่องเป่าฝุ่น\r\n\r\n', '2021-05-11 00:25:50', 19, 1, '3'),
(4, 1, 'อุปกรณ์เกี่ยวกับ NetWork ', '1.คีมตัด \r\n2.คีมย้ำหัว Lan \r\n3.มีดคัตเตอร์ คัตเตอร์ เลือกซื้อตามถนัด แต่ควรเป็นด้ามพลาสติกเพื่อป้องกันไฟฟ้า\r\n4.สาย Lan \r\n5.หัว Lan \r\n6.ที่เช็คหัว RJ คือ หัวต่อที่ใช้กับสายสัญญาณเชื่อมเครือข่าย มี 2 ชนิดคือหัวต่อตัวผู้ (RJ-45 Connecter) และหัวต่อตัวเมีย (RJ-45 Jack Face)\r\n', '2021-05-11 00:39:29', 42, 3, '3'),
(6, 5, 'ทดสอบ', 'ทดสอบ', '2021-05-15 20:13:28', 1, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`ID`, `name`, `value`) VALUES
(1, 'board', 5),
(2, 'reply', 4),
(3, 'member', 4);

-- --------------------------------------------------------

--
-- Table structure for table `masterlogin`
--

CREATE TABLE `masterlogin` (
  `ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role` varchar(5) NOT NULL,
  `text` varchar(200) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `sex` varchar(4) NOT NULL,
  `Github` varchar(50) NOT NULL,
  `Twitter` varchar(50) NOT NULL,
  `Instagram` varchar(50) NOT NULL,
  `Facebook` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterlogin`
--

INSERT INTO `masterlogin` (`ID`, `username`, `email`, `password`, `firstname`, `lastname`, `address`, `phone`, `role`, `text`, `nickname`, `sex`, `Github`, `Twitter`, `Instagram`, `Facebook`, `image`) VALUES
(1, 'admin', '', 'admin', 'admin', 'admin', '', '', 'admin', '', '', '', '', '', '', '', ''),
(2, 'user', 'maikel2013@windowslive.com', 'user', 'Pongsathorn', 'Bangluang', '', '0962218203', 'user', '', 'Mike', 'male', 'asd', 'asd', 'asd', 'asd', 'avatar7.png'),
(3, 'user2', 'user@user.com', 'user2', '', '', '', '', 'user', '', '', '', '', '', '', '', 'main.png'),
(4, 'user3', 'user3@user3.com', 'user3', '', '', '', '', 'user', '', '', '', '', '', '', '', '140290076402-Compressnow_Aircraft_Rescue_Firefighting_training-compressor.jpg'),
(5, 'mike', 'maikel2013@windowslive.com', '1234', 'Pongsathorn', 'Bangluang', 'asdfasdf', '0962218203', 'user', '', 'Mike', 'male', '', '', '', '', '36838628_1753707438054369_5499019282459131904_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `br_id` int(11) NOT NULL,
  `bm_id` int(11) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `br_detail` text NOT NULL,
  `br_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`br_id`, `bm_id`, `u_id`, `br_detail`, `br_date`) VALUES
(2, 4, 1, 'test', '2021-05-14 17:39:52'),
(3, 4, 1, 'test', '2021-05-14 18:56:36'),
(4, 4, 1, '<p><strong>Test&nbsp;</strong>test <em>test&nbsp;</em></p><ol><li>asd</li><li>sss</li></ol><p>&nbsp;</p>', '2021-05-14 20:02:01'),
(5, 3, 5, 'test', '2021-05-15 20:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `masterlogin`
--
ALTER TABLE `masterlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`br_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterlogin`
--
ALTER TABLE `masterlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;