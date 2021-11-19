-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Nov-2021 às 23:27
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypets`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save` (`pidcategory` INT, `pcategory` VARCHAR(64))  BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET category = pcategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (category) VALUES(pcategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ongs_save` (`pidong` INT(11), `pidperson` INT(11), `pong` VARCHAR(64), `pcnpj` VARCHAR(18), `plogradouro` VARCHAR(64), `pcity` VARCHAR(64), `pnumber` DECIMAL(10), `purl` VARCHAR(128))  BEGIN
    
    IF pidong > 0 THEN
        
        UPDATE tb_ongs
        SET 
	idperson = pidperson,
        ong = pong,
            cnpj = pcnpj,
            logradouro = plogradouro,
            city = pcity,
            number = pnumber,
            url = purl
        WHERE idong = pidong;
    
    ELSE
        
        INSERT INTO tb_ongs (idperson, ong, cnpj, logradouro, city, number, url) 
        VALUES(pidperson, pong, plogradouro, pcnpj, pcity, pnumber, purl);
        
        SET pidong = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_ongs WHERE idong = pidong;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pets_save` (`pidpet` INT(11), `pidperson` INT(11), `ppet` VARCHAR(64), `prc` VARCHAR(64), `pvlheight` DECIMAL(10,2), `pvllength` DECIMAL(10,2), `pvlweight` DECIMAL(10,2), `purl` VARCHAR(128), `pdescr` TEXT)  BEGIN
	
	IF pidpet > 0 THEN
		
		UPDATE tb_pets
        SET 
	    idperson = pidperson,
	    pet = ppet,
            rc = prc,
            vlheight = pvlheight,
            vllength = pvllength,
            vlweight = pvlweight,
            url = purl,
	    	descr = pdescr
        WHERE idpet = pidpet;
	
    ELSE
		
		INSERT INTO tb_pets (idperson, pet, rc, vlheight, vllength, vlweight, url, descr) 
        VALUES(pidperson, ppet, prc, pvlheight, pvllength, pvlweight, purl, pdescr);
        
        SET pidpet = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_pets WHERE idpet = pidpet;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create` (`piduser` INT, `pip` VARCHAR(45))  BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, ip)
    VALUES(piduser, pip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save` (`piduser` INT, `pperson` VARCHAR(64), `plogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pmail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)  BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
    person = pperson,
        mail = pmail,
        nrphone = pnrphone
  WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
    login = plogin,
        despassword = pdespassword,
        inadmin = pinadmin
  WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (`piduser` INT)  BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    DELETE FROM tb_users WHERE iduser = piduser;
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save` (`pperson` VARCHAR(64), `plogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pmail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)  BEGIN
  
    DECLARE vidperson INT;
    
  INSERT INTO tb_persons (person, mail, nrphone)
    VALUES(pperson, pmail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, login, despassword, inadmin)
    VALUES(vidperson, plogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categories`
--

CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categories`
--

INSERT INTO `tb_categories` (`idcategory`, `category`, `dtregister`) VALUES
(1, 'Animais de Pequeno Porte', '2021-11-19 21:59:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoriespets`
--

CREATE TABLE `tb_categoriespets` (
  `idcategory` int(11) NOT NULL,
  `idpet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ongs`
--

CREATE TABLE `tb_ongs` (
  `idong` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `ong` varchar(64) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `logradouro` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `number` decimal(10,0) NOT NULL,
  `url` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ongs`
--

INSERT INTO `tb_ongs` (`idong`, `idperson`, `ong`, `cnpj`, `logradouro`, `city`, `number`, `url`, `dtregister`) VALUES
(1, 1, 'MyPets', '111111111111111111', 'Rua da Paz', 'SÃ£o Paulo', '2341', 'MyPets', '2021-11-19 22:04:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL,
  `person` varchar(64) NOT NULL,
  `mail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_persons`
--

INSERT INTO `tb_persons` (`idperson`, `person`, `mail`, `nrphone`, `dtregister`) VALUES
(1, 'Carlos Rhedney', 'twisterpsa@hotmail.com', 11970585566, '2021-08-13 06:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pets`
--

CREATE TABLE `tb_pets` (
  `idpet` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `pet` varchar(64) NOT NULL,
  `rc` varchar(64) NOT NULL,
  `vlheight` decimal(10,2) NOT NULL,
  `vllength` decimal(10,2) NOT NULL,
  `vlweight` decimal(10,2) NOT NULL,
  `url` varchar(128) NOT NULL,
  `descr` text NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pets`
--

INSERT INTO `tb_pets` (`idpet`, `idperson`, `pet`, `rc`, `vlheight`, `vllength`, `vlweight`, `url`, `descr`, `dtregister`) VALUES
(1, 1, 'Costelinha', 'Shitzu - Marrom', '0.70', '0.90', '7.00', 'Costelinha', 'Ganhei e bla bla bla bla bla bla', '2021-11-19 22:06:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_photos`
--

CREATE TABLE `tb_photos` (
  `idphoto` int(11) NOT NULL,
  `idpet` int(11) NOT NULL,
  `photo` varchar(64) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_photos`
--

INSERT INTO `tb_photos` (`idphoto`, `idpet`, `photo`, `dtregister`) VALUES
(1, 1, 'res/site/img/pets/Costelinha1.jpg', '2021-11-19 22:06:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT '0',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `idperson`, `login`, `despassword`, `inadmin`, `dtregister`) VALUES
(1, 1, 'IronMan', '$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga', 1, '2021-08-13 06:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_userspasswordsrecoveries`
--

CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `tb_categoriespets`
--
ALTER TABLE `tb_categoriespets`
  ADD PRIMARY KEY (`idcategory`,`idpet`);

--
-- Indexes for table `tb_ongs`
--
ALTER TABLE `tb_ongs`
  ADD PRIMARY KEY (`idong`);

--
-- Indexes for table `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idperson`);

--
-- Indexes for table `tb_pets`
--
ALTER TABLE `tb_pets`
  ADD PRIMARY KEY (`idpet`);

--
-- Indexes for table `tb_photos`
--
ALTER TABLE `tb_photos`
  ADD PRIMARY KEY (`idphoto`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `FK_users_persons_idx` (`idperson`);

--
-- Indexes for table `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  ADD PRIMARY KEY (`idrecovery`),
  ADD KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_ongs`
--
ALTER TABLE `tb_ongs`
  MODIFY `idong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pets`
--
ALTER TABLE `tb_pets`
  MODIFY `idpet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_photos`
--
ALTER TABLE `tb_photos`
  MODIFY `idphoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  MODIFY `idrecovery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  ADD CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
