-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbangao`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `role`, `address`) VALUES
(14, 'Trần Lưu Đông Triều', 'b@gmail.com', '123456', 'admin', ''),
(15, 'Trần Lưu Đông Triều', 'tranluudongtrieu@gmail.com', 'ben10123', 'admin', ''),
(16, 'Trung', 'Trung@gmail.com', 'abc@123', 'admin', ''),
(18, 'Trung21', 'Trung21@gmail.com', 'abc@123', 'user', 'HCMabc'),
(19, 'Trung3', 'Trung3@gmail.com', '123', 'user', 'Địa chỉ123'),
(20, 'Trung', 'user@gmail.com', 'abc@123', 'user', ''),
(21, 'Trần Lưu Đông Triều', 'admin@gmail.com', 'abc123', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `detailorders`
--

CREATE TABLE `detailorders` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailorders`
--

INSERT INTO `detailorders` (`orderID`, `productID`, `quantity`) VALUES
(25, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `orderdate`, `total`) VALUES
(25, 21, '2024-04-18', 560000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(21, 'Gạo thơm Vua Gạo Làng Ta túi 5kg', 'Gạo hạt dài, đều màu. Khi nấu toả hương thơm nhẹ, hạt cơm chín mềm, dẻo, thơm nhẹ và vẫn ngon ngay cả khi để nguội. Gạo thơm Vua Gạo Làng Ta túi 5kg được canh tác trên các cánh đồng riêng biệt, màu mỡ và an toàn. Gạo Vua Gạo có quy trình kiểm soát chất lượng từ khâu nhập lúa tươi đến khi cho ra thàn', 125000, 'uploads/sellingpoint.jpg'),
(22, 'Gạo Nhật Vua Gạo túi 5kg', 'Hạt gạo dẻo nhiều, cơm mềm. Gạo Nhật shinichi Vua Gạo túi 5kg thích hợp làm cơm cuộn, sushi, ăn ngon miệng. Gạo Vua Gạo có nguồn gốc từ gạo giống Nhật Japonica, mang đến cho bạn cảm giác lạ miệng nhưng ngon cơm. Gạo được trồng quy trình an toàn, khép kín', 140000, 'uploads/sellingpoint (1).jpg'),
(23, 'Gạo thơm Vua Gạo túi 5kg', 'Gạo thơm Vua Gạo ST25 Lúa Tôm túi 5kg là loại gạo thơm ngon, có độ dẻo và mềm đặc biệt, hạt gạo thon dài, không bị khô sau khi nấu. Sản phẩm gạo Vua Gạo được đánh giá cao về chất lượng sản phẩm, hương vị thơm ngon, hấp dẫn, túi 5kg thích hợp cho gia đình sử dụng.', 159000, 'uploads/sellingpoint (2).jpg'),
(24, 'Gạo thơm Vua Gạo ST25 túi 2kg', 'Gạo thơm Vua Gạo chất lượng với giống lúa ST25 ngon nhất thế giới đảm bảo mang đến loại gạo chất lượng, giúp bạn ăn ngon miệng. Gạo thơm Vua Gạo ST25 túi 2kg dẻo và mềm nhiều, nở ít, ăn cơm ngon, thơm rất thích hợp sử dụng cho cả gia đình, túi 2 kg vừa phải sử dụng cá nhân hay gia đình đều được', 79000, 'uploads/gao-thom-vua-gao-st25-tui-2kg-202307281557232542.png'),
(25, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 5kg', 'Gạo từ thương hiệu gạo Vua Gạo đậm đà sử dụng giống gạo từ Campuchia, cho hạt gạo dài, đều, đẹp mắt. Gạo hạt dài, dẻo vừa, thơm lừng, trắng đều. Gạo thơm Vua Gạo Đậm Đà túi 5kg được canh tác trên vùng đất phù sa màu mỡ, mỗi năm chỉ có thu hoạch 1 vụ lúa nên đảm bảo chất lượng gạo sạch.', 165000, 'uploads/sellingpoint (3).jpg'),
(26, 'Gạo thơm Vua Gạo Làng Ta túi 2kg', 'Với hạt gạo cho ra cơm mềm dẻo, thơm ngon. Gạo thơm Vua Gạo Làng Ta túi 2kg là một trong những sản phẩm được nhiều người tin dùng đến từ thương hiệu Vua Gạo quen thuộc. Sử dụng giống lúa thuần do Việt Nam lai tạo ra, có khả năng tăng trưởng và kháng sâu bệnh tốt.', 48000, 'uploads/sellingpoint (4).jpg'),
(27, 'Gạo thơm Vua Gạo Phù Sa túi 2kg', 'Gạo thơm Vua Gạo Phù Sa sử dụng giống lúa bắt nguồn từ tỉnh Sóc Trăng. Hạt gạo thon dài, khi nấu tỏa hương thơm tự nhiên, cho cơm săn, dẻo và ngọt nhẹ rất ngon. Gạo thơm Vua Gạo Phù Sa túi 2kg được canh tác trên các cánh đồng riêng biệt, màu mỡ và an toàn.', 59000, 'uploads/sellingpoint (5).jpg'),
(28, 'Gạo trắng Thiên Nhật túi 5kg', 'Gạo Thiên Nhật chất lượng, không chứa chất bảo quản, tạo mùi hay tẩy trắng. Gạo trắng Thiên Nhật túi 5kg cho ra cơm dẻo vừa, nở ít, giúp ăm ngon miệng hơn. Gạo túi 5kg tiện lợi và tiết kiệm cho cả gia đình cùng sử dụng.', 90000, 'uploads/gao-trang-thien-nhat-tui-5kg-202404080937034489.jpg'),
(29, 'Gạo thơm Thiên Nhật túi 5kg', 'Gạo Thiên Nhật chất lượng, không chứa chất bảo quản, tạo mùi hay tẩy trắng. Gạo thơm Thiên Nhật túi 5kg cho ra cơm mềm, thơm và dẻo, giúp ăm ngon miệng hơn. Gạo túi 5kg tiện lợi và tiết kiệm cho cả gia đình cùng sử dụng.', 95000, 'uploads/gao-thom-thien-nhat-tui-5kg-202404080942541674.jpg'),
(30, 'Gạo thơm A An ST21 túi 5kg', 'Gạo thơm A An ST21 túi 5kg được thu hoạch từ giống lúa ST21 tự nhiên. Gạo A An được sản xuất trên dây chuyền hiện đại, cam kết không đấu trộn, không chất tạo mùi, mang lại sản phẩm gạo chất lượng, an toàn cho sức khoẻ người dùng', 110000, 'uploads/gao-thom-a-an-st21-tui-5kg-202202111330151511.jpg'),
(31, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 'Gạo Đỗ Quyên là một trong những dòng sản phẩm gạo đóng túi an toàn thương hiệu Gạo Vinh Hiển. Gạo Vinh Hiển Đỗ Quyên túi 5kg được trồng tại các cánh đồng tập trung và chăm bón cẩn thận, cho hạt dài, màu trắng trong. Gạo cho cơm dẻo vừa, mềm ngon và hương thơm nhẹ tự nhiên. ', 93000, 'uploads/sellingpoint (6).jpg'),
(32, 'Gạo lứt Vinh Hiển túi 2kg', 'Giống gạo được tuyển chọn từ vùng trồng gạo nổi tiếng kết hợp với công nghệ sản xuất đạt chuẩn HACCP. Gạo lứt Vinh Hiển túi 2kg thích hợp cho những người muốn ăn kiêng, giảm cân. Gạo đến từ thương hiệu gạo Vinh Hiển chất lượng, an toàn, sạch và không chứa chất kích thích tăng trưởng.', 51000, 'uploads/sellingpoint (7).jpg'),
(33, 'Gạo ngon Bách hoá XANH túi 5kg', 'Là loại gạo dẻo nhiều, cơm mềm và thơm. Đây là gạo của bách hóa XANH. Gạo trắng ngon Bách hoá XANH 5kg là giống lúa ngon, có mùi thơm đặc trưng, thơm nhẹ ngay khi cơm nguội. Được trồng theo quy trình khoa học, không sử dụng chất kích thích tăng trưởng', 111000, 'uploads/gao-ngon-bach-hoa-xanh-tui-5kg-201910011404293936.jpg'),
(34, 'Gạo lứt tím Vinh Hiển túi 1kg', 'Gạo lứt tím loại gạo được rất nhiều người chọn mua vì chúng có chất dinh dưỡng cao khi nấu. Gạo lứt tím Vinh Hiển túi 1kg dẻo hơn so với những loại gạo lứt khác, thơm ngon, giúp ăn ngon miệng, . Gạo Vinh Hiển luôn được người dùng tin tưởng sử dụng và giúp ăn ngon miệng cho gia đình bạn', 48000, 'uploads/sellingpoint (8).jpg'),
(35, 'Gạo tấm thơm Vinh Hiển túi 2kg', 'Gạo tấm là loại gạo được rất nhiều người chọn mua vì chúng có chất dinh dưỡng cao khi nấu. Gạo tấm thơm thanh yến Vinh Hiển túi 2kg đóng gói nhỏ gọn, tiện lợi nấu cho gia đình và sử dụng thử. Gạo Vinh Hiển luôn được người dùng tin tưởng sử dụng và giúp ăn ngon miệng cho gia đình bạn', 47000, 'uploads/sellingpoint (9).jpg'),
(36, 'Gạo thơm Ngon ST24 túi 5kg', 'Gạo khi nấu cho cơm mềm ngọt, dẻo dai, rất ngon tạo cảm giác dễ chịu cho người ăn. Gạo thơm Ngon ST24 túi 5kg thuộc thương hiệu gạo Ngon được nuôi trồng canh tác theo quy trình tiên tiến, nghiêm ngặt đảm bảo không chất bảo quản, không thuốc trừ sâu, kích thích tăng trưởng.', 165000, 'uploads/sellingpoint (10).jpg'),
(37, 'Gạo lứt đỏ Vinh Hiển túi 1kg', 'Giống gạo được sản xuất với công nghệ sản xuất đạt chuẩn HACCP. Gạo lứt đỏ Vinh Hiển túi 1kg dẻo hơn so với những loại gạo lứt khác, thích hợp cho những người muốn ăn kiêng, giảm cân. Gạo Vinh Hiển chất lượng, an toàn, sạch và không chứa chất kích thích tăng trưởng.', 41000, 'uploads/sellingpoint (11).jpg'),
(38, 'Gạo thơm đặc sản Neptune ST25 túi 5kg', 'Gạo là lương thực thực phẩm thiết yếu có trong mọi căn bếp. Gạo thơm đặc sản Neptune ST25 túi 5kg với giống gạo ST25 ngon nhất thế giới vào năm 2019, hạt cơm ngọt, dẻo nhiều và ít nở, giúp bạn ăn ngon miệng. Gạo Neptune chất lượng, thơm ngon, giúp bạn ăn được nhiều cơm.', 159000, 'uploads/sellingpoint (12).jpg'),
(39, 'Gạo Vinh Hiển Đặc sản ST24 túi 2kg', 'Đặc tính gạo là cơm rất dẻo, mềm và thơm, nở ít. Gạo được trồng từ giống lúa ST24. Gạo Vinh Hiển Đặc sản ST24 túi 2kg được canh tác theo quy trình chăm sóc khoa học, không chất kích thích tăng trưởng. Gạo của thương hiệu gạo Vinh Hiển chất lượng, an toàn, sạch và chất kích thích tăng trưởng.', 50000, 'uploads/gao-vinh-hien-dac-san-st24-tui-2kg-202202111335163238.jpg'),
(40, 'Gạo lức canxi Việt Đài bịch 600g', 'Bột ngũ cốc Việt Đài là sản phẩm bổ sung dinh dưỡng cho cả người già và trẻ nhỏ hơn 3 tuổi. Bột Việt Đài với bảng thành phần phong phú, đảm bảo cung cấp nguồn dinh dưỡng tối đa. Gạo lức canxi Việt Đài bịch 600g giúp hỗ trợ hấp thụ và chuyển hóa canxi, tốt cho xương khớp', 76000, 'uploads/bot-ngu-coc-gao-luc-canxi-viet-dai-bich-600g-2-org.jpg'),
(41, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 'Là loại gạo còn cám, giàu chất dinh dưỡng, tốt cho sức khoẻ. Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg được sản xuất từ giống lúa Tiến Vua chọn lọc, cho hạt gạo dài, màu trắng sữa đục. Khi nấu, gạo cho cơm dẻo nhiều, thơm mềm và ngọt. Đặc biệt, cơm vẫn mềm ngon ngay cả khi để nguội.', 115000, 'uploads/gao-con-cam-vinh-hien-khong-tuoc-nguyen-tui-5kg-202308100816034617.jpg'),
(42, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 'Là loại gạo còn cám, giàu chất dinh dưỡng, tốt cho sức khoẻ. Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg được sản xuất từ giống lúa Tiến Vua chọn lọc, cho hạt gạo dài, màu trắng sữa đục. Khi nấu, gạo cho cơm dẻo nhiều, thơm mềm và ngọt. Đặc biệt, cơm vẫn mềm ngon ngay cả khi để nguội.', 115000, 'uploads/gao-con-cam-vinh-hien-khong-tuoc-nguyen-tui-5kg-202308100816034617.jpg'),
(43, 'Gạo thơm A An ST24 túi 5kg', 'Là loại gạo mềm thơm, giống gạo ST24 của thương hiệu gạo A An được trồng theo công nghệ hiện đại, tiên tiến không sử dụng chất kích thích tăng trưởng, mang đến cho bạn bữa cơm ngon miệng. Gạo thơm A An ST24 túi 5kg dẻo nhiều, cơm nhiều nhưng nở ít tạo cảm giác ngon miệng khi ăn.', 129000, 'uploads/sellingpoint (13).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailorders`
--
ALTER TABLE `detailorders`
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorders`
--
ALTER TABLE `detailorders`
  ADD CONSTRAINT `detailorders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detailorders_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
