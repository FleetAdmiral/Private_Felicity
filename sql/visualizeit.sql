--
-- Table structure for table `visualizeit`
--

CREATE TABLE `visualizeit` (
  `nick` varchar(64) NOT NULL,
  `paper_link` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visualizeit`
--
ALTER TABLE `visualizeit`
  ADD PRIMARY KEY (`nick`);
