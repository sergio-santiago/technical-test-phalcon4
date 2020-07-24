CREATE TABLE `company` (
  `code_company` int(10) UNSIGNED NOT NULL,
  `name_company` varchar(30) NOT NULL,
  `country` varchar(15) NOT NULL,
  `date_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (code_company)
);

CREATE TABLE `security` (
  `code_security` int(10) UNSIGNED NOT NULL,
  `instrument` varchar(30) NOT NULL,
  `bid` int(10) NOT NULL,
  `ask` int(10) NOT NULL,
  `yield` int(10) NOT NULL,
  `high` int(10) NOT NULL,
  `low` int(10) NOT NULL,
  `currency` varchar(15) NOT NULL,
  `date_price` DATE NOT NULL,
  `time_price` DATETIME NOT NULL,
  PRIMARY KEY (code_security)
);

CREATE TABLE `company_security` (
  `code_company_security` int(10) UNSIGNED NOT NULL,
  `code_company` int(10) UNSIGNED NOT NULL,
  `code_security` int(10) UNSIGNED NOT NULL,
  `date_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (code_company_security),
  FOREIGN KEY (code_company) REFERENCES company(code_company),
  FOREIGN KEY (code_security) REFERENCES security(code_security)
);
