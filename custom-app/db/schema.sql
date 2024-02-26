CREATE TABLE `items` (
  `itm_id` int NOT NULL,
  `itm_name` varchar(45) DEFAULT NULL,
  `itm_price` varchar(45) DEFAULT NULL,
  `protein_count` varchar(45) DEFAULT NULL,
  `taste` varchar(45) DEFAULT NULL,
  `calories` varchar(45) DEFAULT NULL,
  `sodium` varchar(45) DEFAULT NULL,
  `sugar` varchar(45) DEFAULT NULL,
  `fat` varchar(45) DEFAULT NULL,
  `health` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`itm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
