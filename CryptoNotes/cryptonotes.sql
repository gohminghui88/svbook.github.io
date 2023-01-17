-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 05:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptonotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `Email` varchar(64) NOT NULL,
  `Date` varchar(64) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`Email`, `Date`, `Title`, `Content`) VALUES
('gohminghui88@gmail.com', '2016/05/31', 'BankAccounts', 'A105DEM+WXPMnkduCIcqxQmGfYexNx0CtIulce5v7ifpnUB77Ej/7VK3cm28f/5iq//5mUawSWXBuBzi0hewsPBV5DR7PuWbdIrTqx1cz2CBoRopnU76K2A9wpxBNcNSPEaTMu5jNYQJD3EDsKjk2CLyTXbl36mYLxy1q/jsT6ajQmeUwk3BcntIilPakG5nf70WKXIRZo/7UKZRvs6NFCfR9i5/xOxX9y+no9dWqAlX3utZR5hIacWM+jp+E4LPXN4NGbKyAkMebFvJf+sX0eKiv2/KTAHGsdinTmmnHWfNMxfPn9pGPkvnbT5iBqzKDLIeyqBgcPjYrl6ngdj17WXnc9vzEE+62wt+EiTtle0WvWGFUzSUnhjXtuRTwwBJCYMTGMaIg3A/CQ7yYt5QObwAzfaL+aBO2vExgHwY2LW+QASdrJ5EVBnQuVKtLfB9a86379VqedZ3w6QGZTu6uue3s4yLRlJwL83btz5wscK8m5KSL6YR8CM6PZSAkhvx1GDlNU77goxZZaoWs6M1NabUp88FwRLtBHiB7LV1cKBZ/r7i8VuXozOcKq+5UmLMYkwCCM0pBFtYOZW2jaNFXBaJtokfOpQ3OcQO+SO2tbSac4bQupFYrjjB6OSEytEfq7uh/xg2ZLivvmVP3hV+RvKsHzTUKqnFGdRr6bVp2wOG8IVOlIojjE+XHGsTihg/6vlJPn3ebe0GkEJquaXKcqtTCMv3C+4hDsfTH1HQtxCxas5hFCq1a4Oc9pIVJYOSfL9rjNEoOHpgXMkX/M6KbYLLL6wajliU7+bYk367/vBI2c/wJscXioZX6hmd3mLhsxcvzOC4TlIWGTuivrna6rrk6652yNaI0iUfxdb0Dh9oHIIyEIE+EWgBo/EqnNI9WsZ77qUggsCoHiy/vCnizpPW8UNZq+lzh6+UsuPlnslNgh76gOamTpmsgkqUGpgMpePN6ZmU8DTKZk3J/D0zb0+6jHLUU0S9EP8jjJ3aGlGfYfpfBTeFCAw02/7VY5fN5wAntdtWaVusxYCHmWrEuxA+G7eg6LAZnWCnnGWR7ueHUi4h8WQ55GjLzqJxxfTTclb/CFRqxhN1RSQnxg/x2LgQN1A3CacjdvZ6c9EaqnsN4i8ZbuRf3Jjn//d+FppvIEzVnWlVxIT5qt389DJ7zsPKo4xi4zODUUDJow32gHur5Oi04dDTI24l0DmIVs0AM3jkLfXeczkuCuV7CHO/+eAgI6z1vWMzXKs3gHJN8xSQG7RE5aaUnLpE17Ijg5Ko5KzlgcbP9Su8qSxXV9+yzTGqnej3j+KidZgORRk8yt0ZWFE1Rvw+B9ryCejDU5H21GTiipR/wlEzryq62GH0RrDVWmAeA9prPyXoGB9oWAxu/xk8WAP9Tugwc5u2ji4XswptnY2PZyPIDSAWBltMJOnvpaq9HzDTZHEZQuxa1RRPOIj2+BSd9RqIeND8Yqa6DojUWUY+3UtgZwToF6E6FFjE+5JmzfrNWOzIxgaqAd2w==');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(64) NOT NULL,
  `Passwords` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Passwords`) VALUES
('gohminghui88@gmail.com', '972b3a20a088a8218394076b25a336f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
