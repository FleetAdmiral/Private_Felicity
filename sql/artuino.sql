--
-- Table structure for table `artuino_teams`
--

CREATE TABLE `artuino_teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(64) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `payment_status` enum('pending','failed','success') NOT NULL DEFAULT 'pending',
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `artuino_teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artuino_payment_dump`
--
ALTER TABLE `artuino_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Table structure for table `artuino_participants`
--

CREATE TABLE `artuino_participants` (
  `team_id` int(11) NOT NULL,
  `nick` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `artuino_payment_dump` (
  `id` int(11) NOT NULL,
  `team_id` varchar(64) NOT NULL,
  `type` enum('callback','webhook') NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `artuino_payment_dump`
--
ALTER TABLE `artuino_payment_dump`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artuino_payment_dump`
--
ALTER TABLE `artuino_payment_dump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
