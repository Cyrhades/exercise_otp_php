DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` ( `username`, `email`, `password`) VALUES
('Admin', 'admin@devsocialnetwork.com', '$2b$10$SOm3kYv4SPbR0YWVUdy48rL6zG7u9FY5fdnDf8JWSfH/75IJjT95O');
COMMIT;
