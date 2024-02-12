CREATE DATABASE fk_test;
  CREATE TABLE `tb_carro` (
    `id_carro` int(11) NOT NULL AUTO_INCREMENT,
    `nome_carro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `fk_dono_carro` int(11) NOT NULL,
    PRIMARY KEY (`id_carro`),
    KEY `id_carro_FK` (`fk_dono_carro`),
    CONSTRAINT `id_carro_FK` FOREIGN KEY (`fk_dono_carro`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;
  CREATE TABLE `tb_user` (
    `id_user` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `email_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id_user`)
  ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;
