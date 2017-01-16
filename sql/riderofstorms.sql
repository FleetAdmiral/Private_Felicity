--
-- Table structure for table `riderofstorms_registrations`
--

CREATE TABLE `riderofstorms_registrations` (
  `nick` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `contact_number` varchar(16) NOT NULL,
  `leader` varchar(32) NOT NULL,
  `link` varchar(512) DEFAULT NULL,
  `members` varchar(512) NOT NULL,
  `tell` varchar(512) DEFAULT NULL,
  `payment_status` enum('pending','failed','success') NOT NULL DEFAULT 'pending',
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riderofstorms_registrations`
--
ALTER TABLE `riderofstorms_registrations`
  ADD PRIMARY KEY (`nick`);

  -- --------------------------------------------------------

  --
  -- Table structure for table `riderofstorms_payment_dump`
  --

  CREATE TABLE `riderofstorms_payment_dump` (
    `id` int(11) NOT NULL,
    `nick` varchar(64) NOT NULL,
    `type` enum('callback','webhook') NOT NULL,
    `response` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `riderofstorms_payment_dump`
  --
  ALTER TABLE `riderofstorms_payment_dump`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `riderofstorms_payment_dump`
  --
  ALTER TABLE `riderofstorms_payment_dump`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  --
  -- AUTO_INCREMENT for table `riderofstorms_payment`
