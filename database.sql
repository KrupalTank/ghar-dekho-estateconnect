
CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `fees` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `carpetarea` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'hostel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rent_commerecial` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `rent` int(11) NOT NULL,
  `carpetarea` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'rent_commerecial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rent_home` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `bhk` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `carpetarea` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'rent_home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sale_commerecial` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `marketprice` int(11) NOT NULL,
  `carpetarea` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'sale_commerecial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sale_home` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `bhk` int(11) NOT NULL,
  `marketprice` int(11) NOT NULL,
  `carpetarea` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'sale_home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user_table` (
  `username` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `mobilenumber` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `rent_commerecial`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `rent_home`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sale_commerecial`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sale_home`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_table`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `rent_commerecial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `rent_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `sale_commerecial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `sale_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;