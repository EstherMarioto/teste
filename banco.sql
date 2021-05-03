/*
SQLyog Community v12.11 (64 bit)
MySQL - 10.1.10-MariaDB : Database - teste_back
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teste_back` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `teste_back`;

/*Table structure for table `tbl_cliente` */

DROP TABLE IF EXISTS `tbl_cliente`;

CREATE TABLE `tbl_cliente` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(255) DEFAULT NULL,
  `cli_cpf` varchar(255) DEFAULT NULL,
  `cli_email` varchar(255) DEFAULT NULL,
  `cli_telefone` varchar(255) DEFAULT NULL,
  `cli_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`cli_codigo`),
  KEY `lo_codigo -> cli_login` (`cli_login`),
  CONSTRAINT `lo_codigo -> cli_login` FOREIGN KEY (`cli_login`) REFERENCES `tbl_cliente` (`cli_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cliente` */

/*Table structure for table `tbl_endereco` */

DROP TABLE IF EXISTS `tbl_endereco`;

CREATE TABLE `tbl_endereco` (
  `end_codigo` int(255) NOT NULL AUTO_INCREMENT,
  `end_cep` varchar(10) DEFAULT NULL,
  `end_rua` varchar(255) DEFAULT NULL,
  `end_numero` varchar(10) DEFAULT NULL,
  `end_bairro` varchar(255) DEFAULT NULL,
  `end_cidade` varchar(255) DEFAULT NULL,
  `end_uf` varchar(255) DEFAULT NULL,
  `end_cliente` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`end_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_endereco` */

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `ite_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ite_cod_produto` int(11) DEFAULT NULL,
  `ite_cod_pedido` int(11) DEFAULT NULL,
  `ite_quantidade` int(11) DEFAULT NULL,
  `ite_total` varchar(255) DEFAULT NULL,
  `ite_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`ite_codigo`),
  KEY `pro_codigo -> ite_cod_produto` (`ite_cod_produto`),
  KEY `ped_codigo -> ite_cod_pedido` (`ite_cod_pedido`),
  KEY `lo_codigo -> ite_cliente` (`ite_cliente`),
  CONSTRAINT `lo_codigo -> ite_cliente` FOREIGN KEY (`ite_cliente`) REFERENCES `tbl_login` (`lo_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ped_codigo -> ite_cod_pedido` FOREIGN KEY (`ite_cod_pedido`) REFERENCES `tbl_pedido` (`ped_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pro_codigo -> ite_cod_produto` FOREIGN KEY (`ite_cod_produto`) REFERENCES `tbl_produto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_item` */

/*Table structure for table `tbl_lista` */

DROP TABLE IF EXISTS `tbl_lista`;

CREATE TABLE `tbl_lista` (
  `lis_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `lis_pro_codigo` int(11) DEFAULT NULL,
  `lis_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`lis_codigo`),
  KEY `lo_codigo -> lis_cliente` (`lis_cliente`),
  CONSTRAINT `lo_codigo -> lis_cliente` FOREIGN KEY (`lis_cliente`) REFERENCES `tbl_login` (`lo_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lista` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `lo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `lo_email` varchar(255) DEFAULT NULL,
  `lo_senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lo_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

/*Table structure for table `tbl_pagamento` */

DROP TABLE IF EXISTS `tbl_pagamento`;

CREATE TABLE `tbl_pagamento` (
  `pag_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pag_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pag_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pagamento` */

insert  into `tbl_pagamento`(`pag_codigo`,`pag_nome`) values (1,'À vista'),(2,'À prazo');

/*Table structure for table `tbl_pedido` */

DROP TABLE IF EXISTS `tbl_pedido`;

CREATE TABLE `tbl_pedido` (
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_cliente` int(11) DEFAULT NULL,
  `ped_status` int(11) DEFAULT NULL,
  `ped_subtotal` int(11) DEFAULT NULL,
  `ped_valor_frete` varchar(255) DEFAULT NULL,
  `ped_total` varchar(255) DEFAULT NULL,
  `ped_pagamento` int(11) DEFAULT NULL,
  `ped_entrega` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ped_codigo`),
  KEY `sta_ped_codigo -> ped_status` (`ped_status`),
  KEY `cli_codigo -> ped_cliente` (`ped_cliente`),
  KEY `ite_codigo -> ped_subtotal` (`ped_subtotal`),
  KEY `pag_codigo -> ped_pagamento` (`ped_pagamento`),
  CONSTRAINT `cli_codigo -> ped_cliente` FOREIGN KEY (`ped_cliente`) REFERENCES `tbl_cliente` (`cli_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ite_codigo -> ped_subtotal` FOREIGN KEY (`ped_subtotal`) REFERENCES `tbl_item` (`ite_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pag_codigo -> ped_pagamento` FOREIGN KEY (`ped_pagamento`) REFERENCES `tbl_pagamento` (`pag_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sta_ped_codigo -> ped_status` FOREIGN KEY (`ped_status`) REFERENCES `tbl_status_pedido` (`sta_ped_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pedido` */

/*Table structure for table `tbl_produto` */

DROP TABLE IF EXISTS `tbl_produto`;

CREATE TABLE `tbl_produto` (
  `pro_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(255) DEFAULT NULL,
  `pro_preco` varchar(11) DEFAULT NULL,
  `pro_peso` varchar(255) DEFAULT NULL,
  `pro_imagem` varchar(255) DEFAULT NULL,
  `pro_descricao` varchar(255) DEFAULT NULL,
  `pro_estoque` int(11) DEFAULT NULL,
  `pro_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_codigo`),
  KEY `sta_pro_codigo -> pro_status` (`pro_status`),
  CONSTRAINT `sta_pro_codigo -> pro_status` FOREIGN KEY (`pro_status`) REFERENCES `tbl_status_produto` (`sta_pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produto` */

/*Table structure for table `tbl_status_pedido` */

DROP TABLE IF EXISTS `tbl_status_pedido`;

CREATE TABLE `tbl_status_pedido` (
  `sta_ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sta_ped_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sta_ped_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_status_pedido` */

insert  into `tbl_status_pedido`(`sta_ped_codigo`,`sta_ped_nome`) values (1,'pendente'),(2,'enviado'),(3,'a pagar');

/*Table structure for table `tbl_status_produto` */

DROP TABLE IF EXISTS `tbl_status_produto`;

CREATE TABLE `tbl_status_produto` (
  `sta_pro_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sta_pro_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sta_pro_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_status_produto` */

insert  into `tbl_status_produto`(`sta_pro_codigo`,`sta_pro_nome`) values (1,'ativo'),(2,'inativo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
