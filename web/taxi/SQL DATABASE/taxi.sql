-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2015 at 11:39 AM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yateley_taxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE IF NOT EXISTS `analytics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_analytics_code` varchar(1000) NOT NULL,
  `gapi_id` varchar(100) NOT NULL,
  `gapi_email` varchar(200) NOT NULL,
  `gapi_password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `google_analytics_code`, `gapi_id`, `gapi_email`, `gapi_password`) VALUES
(1, '<script>\r\n  (function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,''script'',''//www.google-analytics.com/analytics.js'',''ga'');\r\n\r\n  ga(''create'', ''UA-54663419-1'', ''auto'');\r\n  ga(''send'', ''pageview'');\r\n\r\n</script>', '90985034', 'z.simkus@yahoo.com', 'Penrhyn00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `booking_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `booking_type` varchar(30) NOT NULL,
  `pickup` varchar(225) NOT NULL,
  `actual_pickup` varchar(225) NOT NULL,
  `destination` varchar(225) NOT NULL,
  `actual_destination` varchar(225) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `payment_received` int(1) NOT NULL,
  `saloon` int(2) NOT NULL,
  `estate` int(2) NOT NULL,
  `executive` int(2) NOT NULL,
  `mpv` int(2) NOT NULL,
  `minibus` int(2) NOT NULL,
  `minicoach` int(2) NOT NULL,
  `note` varchar(2000) NOT NULL,
  `booking_id` int(20) NOT NULL,
  `received` datetime NOT NULL,
  `responded` datetime NOT NULL,
  `airport_name` varchar(225) NOT NULL,
  `flight_number` varchar(225) NOT NULL,
  `terminal` varchar(225) NOT NULL,
  `meet_and_greet_service` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_date`, `return_date`, `booking_type`, `pickup`, `actual_pickup`, `destination`, `actual_destination`, `payment`, `status`, `fullname`, `email`, `telephone`, `payment_received`, `saloon`, `estate`, `executive`, `mpv`, `minibus`, `minicoach`, `note`, `booking_id`, `received`, `responded`, `airport_name`, `flight_number`, `terminal`, `meet_and_greet_service`) VALUES
(170, '2014-10-10 01:00:00', '2014-10-23 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '257.64255', 'completed', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 1, 0, 0, 0, 0, '', 5, '2014-10-03 20:13:45', '2014-10-04 20:36:08', '', '', '', 1),
(171, '2014-10-16 01:00:00', '2014-10-15 00:00:00', 'Credit Card Booking', 'Barking, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '80.0676', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 1, 0, 0, 0, 0, 'test', 10, '2014-10-03 20:37:53', '2014-10-04 20:29:33', '', '', '', 1),
(172, '2014-10-15 01:00:00', '2014-10-09 00:00:00', 'Cash Booking', 'Barking, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '38.68', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 0, 0, 0, 0, 0, '', 15, '2014-10-04 15:31:45', '2014-10-04 20:31:10', '', '', '', 1),
(173, '2014-10-10 01:00:00', '2014-10-16 00:00:00', 'Credit Card Booking', 'Barking, United Kingdom', ' 45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '40.0338', 'declined', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 0, 0, 0, 0, 0, 'test', 20, '2014-10-04 15:34:14', '2014-10-04 20:36:13', '', '', '', 1),
(174, '2014-10-17 01:00:00', '0000-00-00 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '66 rutland', 'Dagenham, United Kingdom', 'dagenham', '126.477', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 1, 0, 0, 0, 0, '', 25, '2014-10-04 16:33:21', '2014-10-04 20:28:56', '', '', '', 1),
(175, '2014-10-22 01:00:00', '2014-10-15 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '1 pelham avenue', 'Dalston, United Kingdom', '1 pelham avenue', '49.37985', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 0, 1, 0, 0, 0, 0, 'xxx', 30, '2014-10-04 16:49:21', '2014-10-04 20:27:22', '', '', '', 1),
(176, '2014-10-29 01:00:00', '2014-10-09 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '128.821275', 'new', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 0, 1, 0, 0, 0, 0, 0, 'sss', 35, '2014-10-04 16:52:08', '0000-00-00 00:00:00', '', '', '', 1),
(177, '2014-10-29 01:00:00', '2014-10-09 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '128.821275', 'new', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 0, 1, 0, 0, 0, 0, 0, 'sss', 40, '2014-10-04 16:52:31', '0000-00-00 00:00:00', '', '', '', 1),
(178, '2014-10-29 01:00:00', '0000-00-00 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '63.2385', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 0, 0, 0, 0, 0, 'jkkjjkd', 45, '2014-10-04 16:53:04', '2014-10-04 20:21:28', '', '', '', 1),
(179, '2014-10-10 01:00:00', '0000-00-00 00:00:00', 'Credit Card Booking', 'Barking, United Kingdom', '45 rutland gardens', 'Dagenham, United Kingdom', '1 pelham avenue', '21.942', 'declined', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 0, 0, 0, 0, 0, 'note', 50, '2014-10-04 17:10:36', '2014-10-04 20:38:10', '', '', '', 1),
(180, '2014-10-09 01:00:00', '2014-10-08 00:00:00', 'Credit Card Booking', 'Baker Street, London, United Kingdom', 'barking', 'Dagenham, United Kingdom', 'dagenham', '257.64255', 'declined', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 1, 0, 0, 0, 0, '', 55, '2014-10-04 17:20:10', '2014-10-04 20:37:06', '', '', '', 1),
(181, '2014-10-24 01:00:00', '2014-10-21 00:00:00', 'Cash Booking', 'Zara, Oxford Street, London, United Kingdom', '1 pelham avenue', 'Baker Street, London, United Kingdom', '45 rutland gardens, dagenham', '15.89', 'cancelled', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '447450297290', 1, 1, 0, 0, 0, 0, 0, 'labas', 60, '2014-10-04 19:17:44', '2014-10-04 20:19:01', '', '', '', 1),
(182, '2014-10-23 01:00:00', '0000-00-00 00:00:00', 'Cash Booking', 'Baker Street, London, United Kingdom', 'rutland gardens', 'Dagenham, United Kingdom', 'pelham avenue', '61.1', 'declined', 'Zygimantas Simkus', 'z.simkus@yahoo.com', '+447450297290', 1, 1, 0, 0, 0, 0, 0, 'test', 65, '2014-10-17 15:43:18', '2014-10-17 16:45:05', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_calendar`
--

CREATE TABLE IF NOT EXISTS `bookings_calendar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `booking_date` date NOT NULL,
  `new` int(10) NOT NULL,
  `cancelled` int(10) NOT NULL,
  `completed` int(10) NOT NULL,
  `today` int(10) NOT NULL,
  `accepted` int(10) NOT NULL,
  `declined` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `bookings_calendar`
--

INSERT INTO `bookings_calendar` (`id`, `booking_date`, `new`, `cancelled`, `completed`, `today`, `accepted`, `declined`) VALUES
(99, '2014-10-16', 3, 1, 0, 0, 0, 0),
(100, '2014-10-09', 0, 0, 0, 0, 0, 1),
(101, '2014-10-22', 0, 1, 0, 0, 0, 0),
(102, '2014-10-17', 0, 1, 0, 0, 0, 0),
(103, '2014-10-25', 2, 0, 0, 0, 0, 0),
(104, '2014-10-29', 0, 1, 0, 0, 0, 0),
(105, '2014-10-22', 0, 1, 0, 0, 0, 0),
(106, '2014-10-23', 1, 0, 0, 0, 0, 1),
(107, '2014-10-10', -2, 0, 0, 0, 1, 2),
(108, '2014-10-10', -2, 0, 0, 0, 1, 2),
(109, '2014-10-17', 0, 1, 0, 0, 0, 0),
(110, '2014-10-10', -2, 0, 0, 0, 1, 2),
(111, '2014-10-16', 0, 1, 0, 0, 0, 0),
(112, '2014-10-15', 0, 1, 0, 0, 0, 0),
(113, '2014-10-10', -2, 0, 0, 0, 1, 2),
(114, '2014-10-17', 0, 1, 0, 0, 0, 0),
(115, '2014-10-22', 0, 1, 0, 0, 0, 0),
(116, '2014-10-29', 0, 1, 0, 0, 0, 0),
(117, '2014-10-10', -2, 0, 0, 0, 1, 2),
(118, '2014-10-09', 0, 0, 0, 0, 0, 1),
(119, '2014-10-24', 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventcalender`
--

CREATE TABLE IF NOT EXISTS `eventcalender` (
  `evt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `evt_title` varchar(255) NOT NULL,
  `evt_date` date NOT NULL,
  `evt_stime` date NOT NULL,
  `evt_etime` varchar(255) NOT NULL,
  `evt_ticket` double NOT NULL,
  `evt_person` varchar(255) NOT NULL,
  `evt_phone` varchar(255) NOT NULL,
  `evt_place` varchar(255) NOT NULL,
  `evt_contact` varchar(255) NOT NULL,
  `evt_desc` text NOT NULL,
  PRIMARY KEY (`evt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `faqq1` varchar(999) NOT NULL,
  `faqq2` varchar(999) NOT NULL,
  `faqq3` varchar(999) NOT NULL,
  `faqq4` varchar(999) NOT NULL,
  `faqq5` varchar(999) NOT NULL,
  `faqq6` varchar(999) NOT NULL,
  `faqq7` varchar(999) NOT NULL,
  `faqq8` varchar(999) NOT NULL,
  `faqq9` varchar(999) NOT NULL,
  `faqq10` varchar(999) NOT NULL,
  `faqa1` varchar(999) NOT NULL,
  `faqa2` varchar(999) NOT NULL,
  `faqa3` varchar(999) NOT NULL,
  `faqa4` varchar(999) NOT NULL,
  `faqa5` varchar(999) NOT NULL,
  `faqa6` varchar(999) NOT NULL,
  `faqa7` varchar(999) NOT NULL,
  `faqa8` varchar(999) NOT NULL,
  `faqa9` varchar(999) NOT NULL,
  `faqa10` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faqq1`, `faqq2`, `faqq3`, `faqq4`, `faqq5`, `faqq6`, `faqq7`, `faqq8`, `faqq9`, `faqq10`, `faqa1`, `faqa2`, `faqa3`, `faqa4`, `faqa5`, `faqa6`, `faqa7`, `faqa8`, `faqa9`, `faqa10`) VALUES
(1, 'Why book online?', 'How do I pay?', 'How much notice do you need for a booking?', 'How much time should I allow for my journey?', 'Will I be charged extra if my flight is delayed?', 'Where will my driver meet me at the airport?', 'Are your prices per person or per vehicle?', 'Are your prices fixed, are there any surcharges?', 'Do I need to pay for car parking?', 'What is your cancellation/ refund policy?', 'Its easy, secure and takes just 2 minutes! Book online any time at your convenience and receive confirmation of your booking and a printable receipt, via email. You can also pay for your journey with a debit or credit card, when you book online, using our secure payment gateway.', 'You can pay by debit or credit card using our secure payment gateway when you book online. We accept Visa, Mastercard and American Express. If you wish to pay cash on the day, please call us on the above number with your booking.', 'For online bookings, we require at least 24 hours notice to prepare for your journey. If you need a cab sooner, please call us on the above number for availability. Our best advice is to book online to avoid disappointment, with the added convenience of paying for your journey with a debit or credit card.', 'It''s important to allow ample time for your journey to ensure you arrive in good time at your destination. Please allow for the possibility of traffic especially if your journey is during peak hours. Ideally, you should allow min. of 15 minutes on top of the journey time for local journeys and 30+ minutes for longer distance journeys including international transfers by air, sea or rail.', 'No. We monitor your flight for any possible delays and dispatch the driver accordingly. Your driver will arrive at the airport terminal in 30 minutes of the flight landing time unless agreed otherwise. Please do provide your mobile no. at the time of booking and make a note of our telephone no. above,  in case you need to contact us upon arrival.  Don''t forget to switch your mobile on after you have landed in case we need to get in touch with you.', 'If you have opted for our Meet & Greet service, your driver will be waiting for you in the arrivals hall holding a placard with your name on it. The driver will assist you to the vehicle. We can also arrange to pick you up outside the terminal. The driver or a member of staff will contact you on your mobile and give you details of the vehicle and exact pick up point. The driver will usually arrive  in 30 minutes of the flight landing time unless agreed otherwise.', 'All our prices per vehicle.', 'The final price shown at check out is the price of your journey. However, for some journeys, extra charges may apply which can be paid to the driver. These may include congestion charge; toll charge; additional car parking costs incurred; and waiting time applied at the prevailing rate if the driver is kept waiting beyond the pick up time.', 'If you have opted for our Meet & Greet service, 30 minutes car parking is included. After this time, additional car parking costs incurred can be paid to the driver. If you have not opted for the Meet & Greet service, you will need to pay the driver the full cost of car parking.', 'You can cancel your booking at any time. You get a 100% refund, no questions asked, if your booking is cancelled 24 hours or more prior to your pick up time; 50% refund if booking is cancelled under 24 hours but up to 12 hours prior to the pick up time. Refunds are made minus any card transaction fees incurred.');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_prices`
--

CREATE TABLE IF NOT EXISTS `fixed_prices` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `fixed_price_intro` varchar(500) NOT NULL,
  `fixed_price_1` int(4) NOT NULL,
  `fixed_price_2` int(4) NOT NULL,
  `fixed_price_3` int(4) NOT NULL,
  `fixed_price_4` int(4) NOT NULL,
  `fixed_price_5` int(4) NOT NULL,
  `fixed_price_6` int(4) NOT NULL,
  `fixed_price_7` int(4) NOT NULL,
  `fixed_price_8` int(4) NOT NULL,
  `fixed_price_9` int(4) NOT NULL,
  `fixed_price_10` int(4) NOT NULL,
  `fixed_location_1` varchar(225) NOT NULL,
  `fixed_location_2` varchar(225) NOT NULL,
  `fixed_location_3` varchar(225) NOT NULL,
  `fixed_location_4` varchar(225) NOT NULL,
  `fixed_location_5` varchar(225) NOT NULL,
  `fixed_location_6` varchar(225) NOT NULL,
  `fixed_location_7` varchar(225) NOT NULL,
  `fixed_location_8` varchar(225) NOT NULL,
  `fixed_location_9` varchar(225) NOT NULL,
  `fixed_location_10` varchar(225) NOT NULL,
  `fixed_lat_1` varchar(225) NOT NULL,
  `fixed_lon_1` varchar(225) NOT NULL,
  `fixed_lat_2` varchar(225) NOT NULL,
  `fixed_lon_2` varchar(225) NOT NULL,
  `fixed_lat_3` varchar(225) NOT NULL,
  `fixed_lon_3` varchar(225) NOT NULL,
  `fixed_lat_4` varchar(225) NOT NULL,
  `fixed_lon_4` varchar(225) NOT NULL,
  `fixed_lat_5` varchar(225) NOT NULL,
  `fixed_lon_5` varchar(225) NOT NULL,
  `fixed_lat_6` varchar(225) NOT NULL,
  `fixed_lon_6` varchar(225) NOT NULL,
  `fixed_lat_7` varchar(225) NOT NULL,
  `fixed_lon_7` varchar(225) NOT NULL,
  `fixed_lat_8` varchar(225) NOT NULL,
  `fixed_lon_8` varchar(225) NOT NULL,
  `fixed_lat_9` varchar(225) NOT NULL,
  `fixed_lon_9` varchar(225) NOT NULL,
  `fixed_lat_10` varchar(225) NOT NULL,
  `fixed_lon_10` varchar(225) NOT NULL,
  `fixed_1_status` varchar(10) NOT NULL,
  `fixed_2_status` varchar(10) NOT NULL,
  `fixed_3_status` varchar(10) NOT NULL,
  `fixed_4_status` varchar(10) NOT NULL,
  `fixed_5_status` varchar(10) NOT NULL,
  `fixed_6_status` varchar(10) NOT NULL,
  `fixed_7_status` varchar(10) NOT NULL,
  `fixed_8_status` varchar(10) NOT NULL,
  `fixed_9_status` varchar(10) NOT NULL,
  `fixed_10_status` varchar(10) NOT NULL,
  `fixed_price_11` int(4) NOT NULL,
  `fixed_location_11` varchar(225) NOT NULL,
  `fixed_lat_11` varchar(225) NOT NULL,
  `fixed_lon_11` varchar(225) NOT NULL,
  `fixed_11_status` varchar(10) NOT NULL,
  `fixed_price_12` int(4) NOT NULL,
  `fixed_location_12` varchar(225) NOT NULL,
  `fixed_lat_12` varchar(225) NOT NULL,
  `fixed_lon_12` varchar(225) NOT NULL,
  `fixed_12_status` varchar(10) NOT NULL,
  `fixed_price_1_img` varchar(225) NOT NULL,
  `fixed_price_2_img` varchar(225) NOT NULL,
  `fixed_price_3_img` varchar(225) NOT NULL,
  `fixed_price_4_img` varchar(2252) NOT NULL,
  `fixed_price_5_img` varchar(225) NOT NULL,
  `fixed_price_6_img` varchar(225) NOT NULL,
  `fixed_price_7_img` varchar(225) NOT NULL,
  `fixed_price_8_img` varchar(225) NOT NULL,
  `fixed_price_9_img` varchar(225) NOT NULL,
  `fixed_price_10_img` varchar(225) NOT NULL,
  `fixed_price_11_img` varchar(225) NOT NULL,
  `fixed_price_12_img` varchar(225) NOT NULL,
  `free_text_1` varchar(225) NOT NULL,
  `free_text_2` varchar(225) NOT NULL,
  `free_text_3` varchar(225) NOT NULL,
  `free_text_4` varchar(225) NOT NULL,
  `free_text_5` varchar(225) NOT NULL,
  `free_text_6` varchar(225) NOT NULL,
  `free_text_7` varchar(225) NOT NULL,
  `free_text_8` varchar(225) NOT NULL,
  `free_text_9` varchar(225) NOT NULL,
  `free_text_10` varchar(225) NOT NULL,
  `free_text_11` varchar(225) NOT NULL,
  `free_text_12` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fixed_prices`
--

INSERT INTO `fixed_prices` (`id`, `fixed_price_intro`, `fixed_price_1`, `fixed_price_2`, `fixed_price_3`, `fixed_price_4`, `fixed_price_5`, `fixed_price_6`, `fixed_price_7`, `fixed_price_8`, `fixed_price_9`, `fixed_price_10`, `fixed_location_1`, `fixed_location_2`, `fixed_location_3`, `fixed_location_4`, `fixed_location_5`, `fixed_location_6`, `fixed_location_7`, `fixed_location_8`, `fixed_location_9`, `fixed_location_10`, `fixed_lat_1`, `fixed_lon_1`, `fixed_lat_2`, `fixed_lon_2`, `fixed_lat_3`, `fixed_lon_3`, `fixed_lat_4`, `fixed_lon_4`, `fixed_lat_5`, `fixed_lon_5`, `fixed_lat_6`, `fixed_lon_6`, `fixed_lat_7`, `fixed_lon_7`, `fixed_lat_8`, `fixed_lon_8`, `fixed_lat_9`, `fixed_lon_9`, `fixed_lat_10`, `fixed_lon_10`, `fixed_1_status`, `fixed_2_status`, `fixed_3_status`, `fixed_4_status`, `fixed_5_status`, `fixed_6_status`, `fixed_7_status`, `fixed_8_status`, `fixed_9_status`, `fixed_10_status`, `fixed_price_11`, `fixed_location_11`, `fixed_lat_11`, `fixed_lon_11`, `fixed_11_status`, `fixed_price_12`, `fixed_location_12`, `fixed_lat_12`, `fixed_lon_12`, `fixed_12_status`, `fixed_price_1_img`, `fixed_price_2_img`, `fixed_price_3_img`, `fixed_price_4_img`, `fixed_price_5_img`, `fixed_price_6_img`, `fixed_price_7_img`, `fixed_price_8_img`, `fixed_price_9_img`, `fixed_price_10_img`, `fixed_price_11_img`, `fixed_price_12_img`, `free_text_1`, `free_text_2`, `free_text_3`, `free_text_4`, `free_text_5`, `free_text_6`, `free_text_7`, `free_text_8`, `free_text_9`, `free_text_10`, `free_text_11`, `free_text_12`) VALUES
(1, 'Select a Popular Journey Below and Save up to 30%', 40, 45, 65, 75, 120, 55, 75, 35, 30, 45, 'Heathrow T5', 'Heathrow T1-4', 'Gatwick Airport', 'Luton Airport', 'Stansted Airport', 'Southampton Airport', 'Southampton Docks', 'Reading Station', 'Basingstoke Station', 'Guildford Station', '51.4700517', '-0.4905695', '51.4801406', '-0.4243135', '51.1536621', '-0.1820629', '51.8762646', '-0.3717471', '51.8860181', '0.2388661', '51.4592221', '-0.4628506', '51.5073509', '-0.1277583', '51.455368', '-0.936285', '51.263607', '-1.042378', '51.2406442', '-0.5650477', 'Active', 'Active', 'Active', 'Active', 'Active', 'Active', 'Active', 'Active', 'Active', 'Active', 0, '', '', '', 'Inactive', 0, '', '', '', 'Inactive', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Fixed Airport Transfers.jpg', 'assets/img/fixed/Cruise Liner.jpg', 'assets/img/fixed/Fixed Station Transfers 2.jpg', 'assets/img/fixed/Fixed Station Transfers 2.jpg', 'assets/img/fixed/Fixed Station Transfers 2.jpg', 'assets/img/fixed/Fixed Taxi Side View.jpg', 'assets/img/fixed/Fixed Taxi Side View.jpg', 'From Yateley', 'From Yateley', 'From Yateley', 'From Yateley', ' From Yateley', ' From Yateley', 'From Yateley', 'From Yateley', 'From Yateley', 'From Yateley', 'To / From ', 'To / From ');

-- --------------------------------------------------------

--
-- Table structure for table `jqcalendar`
--

CREATE TABLE IF NOT EXISTS `jqcalendar` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Location` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `IsAllDayEvent` smallint(6) NOT NULL,
  `Color` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `RecurringRule` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `other_pages`
--

CREATE TABLE IF NOT EXISTS `other_pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `footer_about_us_text` varchar(9999) NOT NULL,
  `footer_stay_in_touch_text` varchar(700) NOT NULL,
  `footer_fully_licenced_service_image` varchar(500) NOT NULL,
  `contact_get_in_touch_text` varchar(9999) NOT NULL,
  `disclaimer_text` mediumtext NOT NULL,
  `about_us_text` mediumtext NOT NULL,
  `about_us_image` varchar(500) NOT NULL,
  `terms_text` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `other_pages`
--

INSERT INTO `other_pages` (`id`, `footer_about_us_text`, `footer_stay_in_touch_text`, `footer_fully_licenced_service_image`, `contact_get_in_touch_text`, `disclaimer_text`, `about_us_text`, `about_us_image`, `terms_text`) VALUES
(1, 'Transport services provided by A & J Taxis, Yateley''s leading private hire service for all occasions to any destination in the UK at low prices.', '', 'assets/img/footer/private-hire.png', 'If you have any questions, queries or require information, please contact us using the form below and we will get back to you as soon as possible.', 'Sample disclaimer text here.\r\n\r\nStill a sample here.', 'A & J Taxis Yateley are Yateleys leading taxi and private hire company. Our experience in providing transport services to residential and business clients spans over many years. We provide a friendly and personal service to our customers. \r\n\r\nOur taxi and private hire operation is fully licenced by the local authority. All our drivers undergo CRB checks, medical examinations and are licenced. All vehicles operate under licence by the local authority and undergo regular safety checks. We have a diverse fleet of vehicles to meet your travel needs including standard Saloons, Estate cars; Executive cars through to MPVs and Minibuses for larger groups.\r\n\r\nBook you next journey with A & J Taxis Yateley. Simply book online in just a few minutes or call us on 01252 213003. Thank you for visiting our website.', 'assets/img/about/customer services.png', 'By using this website and/ or making use of the services provided, you confirm that you have read and agree to theses Terms & Conditions.\r\n\r\nPrivate hire transport services are provided by A & J Taxis Yateley.\r\n\r\nFor online bookings, we require at least 24 hours notice to prepare for your journey. If you need a taxi cab sooner, please call us on the above number for availability. Online bookings and enquiries made on this website do not constitute a booking until confirmed by us by email.\r\n\r\nThere are no hidden fees, taxes or extra charges for a journey booked online or over the telephone provided there is no variation to the journey on your part or unless additional charges are incurred which may include congestion charge; toll charge; additional car parking costs incurred; and waiting time at the prevailing rate if the driver is kept waiting beyond the agreed pick up time. Any additional costs incurred can be paid to the driver.\r\n\r\nYou can cancel your booking at any time. You get a 100% refund if your booking is cancelled up to 24 hours or more prior to your journey pick up time; 50% refund if booking is cancelled under 24 hours but up to 12 hours prior to the pick up time. Refunds are made minus any card transaction fees incurred. If you do not show up on the day of travel at the agreed pickup address and time, any and all monies paid shall be non-refundable. \r\n\r\nFor cash bookings that require pick up from an airport, you must call as soon as your flight has landed to confirm your journey. We will not dispatch a driver until we receive your call / confirmation. Where bookings have been paid for in advance, we will dispatch a driver to arrive at the airport at the agreed time. You must in all cases provide a mobile no. so that we contact you in case of any difficulties.\r\n\r\nWe reserve the right to decline any booking or refuse a passenger(s) from boarding the vehicle or request a passenger(s) to leave the vehicle. This may include instances of excess luggage/ passengers permitted for the vehicle booked or where a passenger(s) are considered a danger to the safety of other passengers or the driver. \r\n\r\nSmoking and consumption of alcohol is strictly not permitted inside the vehicle. In any event, such as alcohol sickness, where valeting of the vehicle is required, Â£100 will be charged to compensate the driver for cost of cleaning the vehicle and loss of earnings.\r\n\r\nWe cannot be held responsible for any delays to your journey due to road traffic accidents, road closures, diversions, breakdowns or bad weather. We do not accept any liabilities whatsoever, for late arrival at pick up or your destination or missed connections for onward  travel at air, sea or rail terminals. Please allow extra travelling time to avoid such an event.\r\n\r\nWithout prior notice, we reserve the right to make changes to these Terms & Conditions; alter our prices or substitute an alternative vehicle/ driver for your journey.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE IF NOT EXISTS `payment_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_booking_fee` varchar(5) NOT NULL,
  `percentage_credit_card_fee` varchar(6) NOT NULL,
  `pay_on_day` varchar(20) NOT NULL,
  `test_secret_key` varchar(225) NOT NULL,
  `test_publishable_key` varchar(225) NOT NULL,
  `live_secret_key` varchar(225) NOT NULL,
  `live_publishable_key` varchar(225) NOT NULL,
  `paypal_account` varchar(225) NOT NULL,
  `paypal_status` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`id`, `fixed_booking_fee`, `percentage_credit_card_fee`, `pay_on_day`, `test_secret_key`, `test_publishable_key`, `live_secret_key`, `live_publishable_key`, `paypal_account`, `paypal_status`) VALUES
(1, '0.0', '3.5', 'Cash_and_card', 'sk_live_LfeJXmS3DIViJzgRJrgK8Zlv', 'pk_live_gg2xMcI515ffs2T1B6TXNJOw Roll Key', 'sk_live_2Okha9ePcToCnMPJB2MKowJk', 'pk_live_nBfTynYqWdMp1j9s2sBOwITe', 'ajcars648@gmail.com', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `standard_day_rate` varchar(10) NOT NULL,
  `day_rate_hour_start` time NOT NULL,
  `day_rate_hour_end` time NOT NULL,
  `night_rate_uplift` varchar(10) NOT NULL,
  `sunday_rate_uplift` varchar(10) NOT NULL,
  `bank_holiday_uplift` varchar(10) NOT NULL,
  `minimum_booking_notice` varchar(5) NOT NULL,
  `apply_bank_holiday_rate_uplift` int(1) NOT NULL,
  `apply_night_rate_uplift` int(1) NOT NULL,
  `apply_sunday_rate_uplift` int(1) NOT NULL,
  `minimum_fare_amount` varchar(30) NOT NULL,
  `minimum_fare_miles` varchar(30) NOT NULL,
  `long_distance_fare_amount` varchar(30) NOT NULL,
  `long_distance_fare_miles` varchar(30) NOT NULL,
  `meet_and_greet` int(7) NOT NULL,
  `night_rate_uplift_units` varchar(100) NOT NULL,
  `sunday_rate_uplift_units` varchar(100) NOT NULL,
  `bank_holiday_uplift_units` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `standard_day_rate`, `day_rate_hour_start`, `day_rate_hour_end`, `night_rate_uplift`, `sunday_rate_uplift`, `bank_holiday_uplift`, `minimum_booking_notice`, `apply_bank_holiday_rate_uplift`, `apply_night_rate_uplift`, `apply_sunday_rate_uplift`, `minimum_fare_amount`, `minimum_fare_miles`, `long_distance_fare_amount`, `long_distance_fare_miles`, `meet_and_greet`, `night_rate_uplift_units`, `sunday_rate_uplift_units`, `bank_holiday_uplift_units`) VALUES
(1, '2.60', '07:00:00', '22:59:00', '50', '50', '50', '12', 1, 1, 1, '4.20', '1', '2.60', '100', 6, 'Percentages', 'Percentages', 'Percentages');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` varchar(9999) NOT NULL,
  `meta_keywords` varchar(9999) NOT NULL,
  `meta_title_booking` varchar(500) NOT NULL,
  `meta_description_booking` varchar(1400) NOT NULL,
  `meta_keywords_booking` varchar(999) NOT NULL,
  `meta_title_other` varchar(500) NOT NULL,
  `meta_description_other` varchar(9999) NOT NULL,
  `meta_keywords_other` varchar(500) NOT NULL,
  `meta_title_about_us` varchar(999) NOT NULL,
  `meta_description_about_us` varchar(999) NOT NULL,
  `meta_keywords_about_us` varchar(999) NOT NULL,
  `meta_title_contact_us` varchar(999) NOT NULL,
  `meta_description_contact_us` varchar(999) NOT NULL,
  `meta_keywords_contact_us` varchar(999) NOT NULL,
  `meta_title_faq` varchar(999) NOT NULL,
  `meta_description_faq` varchar(999) NOT NULL,
  `meta_keywords_faq` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `meta_title_booking`, `meta_description_booking`, `meta_keywords_booking`, `meta_title_other`, `meta_description_other`, `meta_keywords_other`, `meta_title_about_us`, `meta_description_about_us`, `meta_keywords_about_us`, `meta_title_contact_us`, `meta_description_contact_us`, `meta_keywords_contact_us`, `meta_title_faq`, `meta_description_faq`, `meta_keywords_faq`) VALUES
(1, 'Yateley Taxi Cabs | Call 01252 213003 or Book Online | CabSearch Yateley', 'Call 02125 213003 or Book Online for Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', '', 'Yateley Taxi Cabs | Call 01252 213003 or Book Online |CabSearch Yateley Bookings Page', 'Call 02125 213003 or Book Online for Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', '', '', '', '', 'Yateley Taxi Cabs | Call 01252 213003 or Book Online | CabSearch Yateley About Us Page', 'Call 02125 213003 or Book Online for Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', '', 'Yateley Taxi Cabs | Call 01252 213003 or Book Online | CabSearch Yateley Contact Page', 'Call 02125 213003 or Book Online for Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', '', 'Yateley Taxi Cabs | Call 01252 213003 or Book Online | CabSearch Yateley FAQ Page', 'Call 02125 213003 or Book Online for Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(225) NOT NULL,
  `email_address` varchar(225) NOT NULL,
  `website_phone` varchar(225) NOT NULL,
  `company_name` varchar(225) NOT NULL,
  `operator_licence` varchar(225) NOT NULL,
  `timezone` varchar(225) NOT NULL,
  `company_address` varchar(225) NOT NULL,
  `map_location` varchar(300) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `website_email_address` varchar(225) NOT NULL,
  `backend_email_address` varchar(225) NOT NULL,
  `main_area` varchar(225) NOT NULL,
  `area2` varchar(225) NOT NULL,
  `area3` varchar(225) NOT NULL,
  `area4` varchar(225) NOT NULL,
  `area5` varchar(225) NOT NULL,
  `area6` varchar(225) NOT NULL,
  `area7` varchar(225) NOT NULL,
  `area8` varchar(225) NOT NULL,
  `meta_keywords_main_area` varchar(999) NOT NULL,
  `meta_keywords_area2` varchar(999) NOT NULL,
  `meta_keywords_area3` varchar(999) NOT NULL,
  `meta_keywords_area4` varchar(999) NOT NULL,
  `meta_keywords_area5` varchar(999) NOT NULL,
  `meta_keywords_area6` varchar(999) NOT NULL,
  `meta_keywords_area7` varchar(999) NOT NULL,
  `meta_keywords_area8` varchar(999) NOT NULL,
  `admin_username` varchar(225) NOT NULL,
  `admin_pass` varchar(225) NOT NULL,
  `backdoor` varchar(225) NOT NULL,
  `licencing_authority` varchar(225) NOT NULL,
  `free_text` varchar(225) NOT NULL,
  `site_url` varchar(225) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `bookings_phone` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `contact_name`, `email_address`, `website_phone`, `company_name`, `operator_licence`, `timezone`, `company_address`, `map_location`, `latitude`, `longitude`, `website_email_address`, `backend_email_address`, `main_area`, `area2`, `area3`, `area4`, `area5`, `area6`, `area7`, `area8`, `meta_keywords_main_area`, `meta_keywords_area2`, `meta_keywords_area3`, `meta_keywords_area4`, `meta_keywords_area5`, `meta_keywords_area6`, `meta_keywords_area7`, `meta_keywords_area8`, `admin_username`, `admin_pass`, `backdoor`, `licencing_authority`, `free_text`, `site_url`, `contact_phone`, `bookings_phone`, `expiry_date`) VALUES
(1, 'Andy Treadgold', 'fleettaxicabs@gmail.com', '01252 213003', 'A & J  Yateley Taxi Service', '', '', 'Yateley', 'Yateley', '51.3411577', '-0.825203', 'fleettaxicabs@gmail.com', 'info@yateley-taxicabs.co.uk', 'Yateley', 'Heathrow Airport', 'Gatwick Airport', 'Luton Airport', 'Stansted Airport', 'Southampton', '', '', 'Yateley taxi, taxi Yateley, Yateley taxis, Yateley cab, Yateley cabs, cab Yateley, cabs Yateley, taxi to Yateley, cab to Yateley', 'Heathrow Airport taxi, taxi Heathrow Airport, Heathrow Airport taxis, Heathrow Airport cab, Heathrow Airport cabs, cab Heathrow Airport, cabs Heathrow Airport, taxi to Heathrow Airport, cab to Heathrow Airport', 'Gatwick Airport taxi, taxi Gatwick Airport, Gatwick Airport taxis, Gatwick Airport cab, Gatwick Airport cabs, cab Gatwick Airport, cabs Gatwick Airport, taxi to Gatwick Airport, cab to Gatwick Airport', 'Luton Airport taxi, taxi Luton Airport, Luton Airport taxis, Luton Airport cab, Luton Airport cabs, cab Luton Airport, cabs Luton Airport, taxi to Luton Airport, cab to Luton Airport', 'Stansted Airport taxi, taxi Stansted Airport, Stansted Airport taxis, Stansted Airport cab, Stansted Airport cabs, cab Stansted Airport, cabs Stansted Airport, taxi to Stansted Airport, cab to Stansted Airport', 'Southampton taxi, taxi Southampton, Southampton taxis, Southampton cab, Southampton cabs, cab Southampton, cabs Southampton, taxi to Southampton, cab to Southampton', '', '', 'yateley', 'yateley927', 'tglcabsearch110', 'Hart council', 'From Overseas: +44 1252 213003', 'https://www.yateley-taxicabs.co.uk', '07932 470686', '01252 763300', '2016-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `settings_homepage`
--

CREATE TABLE IF NOT EXISTS `settings_homepage` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `homepage_title` varchar(225) NOT NULL,
  `homepage_subtitle` varchar(999) NOT NULL,
  `homepage_text` varchar(9999) NOT NULL,
  `homepage_testimonial` varchar(9999) NOT NULL,
  `homepage_testimonial_author` varchar(999) NOT NULL,
  `homepage_testimonial_2` varchar(1200) NOT NULL,
  `homepage_testimonial_author_2` varchar(225) NOT NULL,
  `banner_1` varchar(225) NOT NULL,
  `banner_2` varchar(225) NOT NULL,
  `banner_3` varchar(225) NOT NULL,
  `banner_4` varchar(225) NOT NULL,
  `banner_5` varchar(225) NOT NULL,
  `banner_1_status` varchar(10) NOT NULL,
  `banner_2_status` varchar(10) NOT NULL,
  `banner_3_status` varchar(10) NOT NULL,
  `banner_4_status` varchar(10) NOT NULL,
  `banner_5_status` varchar(10) NOT NULL,
  `signature` varchar(3) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `logo_width` int(4) NOT NULL,
  `logo_height` int(4) NOT NULL,
  `header_title` varchar(1000) NOT NULL,
  `header_subtitle` varchar(1000) NOT NULL,
  `header_status` varchar(225) NOT NULL,
  `image_1` varchar(225) NOT NULL,
  `image_2` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings_homepage`
--

INSERT INTO `settings_homepage` (`id`, `homepage_title`, `homepage_subtitle`, `homepage_text`, `homepage_testimonial`, `homepage_testimonial_author`, `homepage_testimonial_2`, `homepage_testimonial_author_2`, `banner_1`, `banner_2`, `banner_3`, `banner_4`, `banner_5`, `banner_1_status`, `banner_2_status`, `banner_3_status`, `banner_4_status`, `banner_5_status`, `signature`, `logo`, `logo_width`, `logo_height`, `header_title`, `header_subtitle`, `header_status`, `image_1`, `image_2`) VALUES
(1, 'Yateley Taxi Cab Service', 'Local Yateley Taxi and Minicab Service covering Yateley and neighbouring Areas for Local Journeys, Airport, Seaport and Station Transfers or that Special Occasion.', 'Welcome to A & J Taxis Yateley, your premier Yateley taxi company for minicabs and taxis in Yateley and neighbouring areas. Whether you need a taxi cab for a local journey or a taxi cab to the airport or for that special occasion, A & J Taxis Fleet offer a prompt, reliable service at low fares 24 hours a day all year round.\r\n\r\nGet instant quotes online using the quote checker above or give us a call on 01252 213003. Or choose one of our fixed price journeys and save up to 30% off popular journeys including airport taxi transfers to London Heathrow, Gatwick, Luton, Stansted, Southampton airport and docks.\r\n\r\nBooking your taxi cab online takes just a couple of minutes. With our flexible payment terms, you can pay online using our secure payment gateway or pay cash on the day. You will receive confirmation of your taxi cab booking via email. \r\n\r\nWe pride ourselves on providing a prompt, reliable and friendly service to our customers. A & J Taxis Fleet look forward to being of service whether you require a taxi cab for a local journey, airport transfer or one of our popular journeys. Thank you visiting our website.', '', '', '', '', 'assets/img/banners/Taxi Transfers.jpg', 'assets/img/banners/Airport Transfers.jpg', 'assets/img/banners/Seaport Transfers.jpg', 'assets/img/banners/Train Station Transfers.jpg', 'assets/img/banners/image.jpg', 'Active', 'Active', 'Active', 'Active', 'Active', 'Yes', 'assets/img/logos/image.jpg', 200, 100, 'Yateley Taxi Cab Service', 'Local, Airport, Station & Seaport Transfers', 'Text', 'assets/img/sidebar/Travel Services.png', 'assets/img/sidebar/customer services.png');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE IF NOT EXISTS `social_media` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `url`, `status`, `image`) VALUES
(1, 'Facebook', 'http://www.facebook.com', 'Active', 'assets/img/facebook.png'),
(2, 'Twitter', 'http://www.twitter.com', 'Active', 'assets/img/twitter.png'),
(3, 'LinkedIn', 'http://www.linkedin.com', 'Active', 'assets/img/linkedin.png'),
(4, 'Google+', 'http://plus.google.com', 'Active', 'assets/img/googleplus.png'),
(5, 'Youtube', 'http://www.youtube.com', 'Inactive', 'assets/img/youtube.png');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `token` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`) VALUES
(1, '1af20b64ff2c281afaa3d22aa817a1b3'),
(2, '151d921c492383c7deca20973e8eb910'),
(3, '37c45891e49f6da38c6e820f2e51dfe1'),
(4, 'a3e55291dab9138194e2bbac79e7beab'),
(5, '6f6ab743b6eae2d2d2d04f5f68c837c1'),
(6, '9b3e4a98010b4174eb06928c0b7fc52b'),
(7, 'd30309aab0ae984bfdbd136b0ebefa99'),
(8, '3f93988efc054b2193ef745b75946a81'),
(9, '22e223e80d77f5f23f507fc758daa4fb'),
(10, '03a650c8b4e823b2ed83287652e8b52d'),
(11, '14ea0e00d803a987ff97328a4a07b3da'),
(12, '986dd8e957c7a4a57fa53a62a70f136b'),
(13, 'f1712f0cdf76eba43efa39d36afec2ab'),
(14, '14fb1fd37e0e5532c98eaa17c7adacdf'),
(15, '926b8e861a897352b5125a911c0cc58e'),
(16, '13654539a4ddbeb6b3'),
(17, '8412'),
(18, '28719'),
(19, '44881'),
(20, '362'),
(21, '5527');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `seats` int(3) NOT NULL,
  `large_bags` int(3) NOT NULL,
  `small_bags` int(3) NOT NULL,
  `uplift` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `uplift_units` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `seats`, `large_bags`, `small_bags`, `uplift`, `status`, `uplift_units`) VALUES
(1, 'Saloon', 4, 4, 2, 0, 'active', ''),
(2, 'Estate', 4, 4, 3, 0, 'active', 'Percentages'),
(3, 'Executive', 4, 2, 2, 25, 'inactive', ''),
(4, 'MPV', 6, 2, 3, 25, 'inactive', ''),
(5, 'Minibus', 8, 4, 4, 50, 'inactive', ''),
(6, 'Minicoach', 16, 4, 4, 100, 'inactive', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_design`
--

CREATE TABLE IF NOT EXISTS `web_design` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `background_image` varchar(900) NOT NULL,
  `title_image` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_design`
--

INSERT INTO `web_design` (`id`, `background_image`, `title_image`) VALUES
(1, 'images/site_bg.jpg', 'assets/img/Street Map.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
