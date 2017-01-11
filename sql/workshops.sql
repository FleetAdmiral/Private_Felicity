--
-- Table structure for table `webdev_registrations`
--

CREATE TABLE `webdev_registrations` (
  `nick` varchar(64) NOT NULL,
  `contact_number` varchar(16) NOT NULL,
  `stream` varchar(32) NOT NULL,
  `year` varchar(16) NOT NULL,
  `experience` varchar(512) NOT NULL,
  `why_join` varchar(512) NOT NULL,
  `payment_status` enum('pending','failed','success') NOT NULL DEFAULT 'pending',
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webdev_registrations`
--
ALTER TABLE `webdev_registrations`
  ADD PRIMARY KEY (`nick`);

  -- --------------------------------------------------------

  --
  -- Table structure for table `webdev_payment_dump`
  --

  CREATE TABLE `webdev_payment_dump` (
    `id` int(11) NOT NULL,
    `nick` varchar(64) NOT NULL,
    `type` enum('callback','webhook') NOT NULL,
    `response` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `webdev_payment_dump`
  --
  ALTER TABLE `webdev_payment_dump`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `webdev_payment_dump`
  --
  ALTER TABLE `webdev_payment_dump`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  --
  -- AUTO_INCREMENT for table `webdev_payment`
