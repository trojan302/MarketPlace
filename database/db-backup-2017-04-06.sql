
/*---------------------------------------------------------------
  SQL DB BACKUP 06.04.2017 21:00 
  HOST: localhost
  DATABASE: project_blk
  TABLES: peserta
  ---------------------------------------------------------------*/

/*---------------------------------------------------------------
  TABLE: `peserta`
  ---------------------------------------------------------------*/
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `peserta`;
DROP TABLE IF EXISTS `peserta`;
SET FOREIGN_KEY_CHECKS=1;
CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `ttl` text NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `id_agama` int(11) NOT NULL,
  `skawin` enum('Menikah','Belum') NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `p_kursus` text,
  `p_kerja` text,
  `nama_ortu` varchar(50) NOT NULL,
  `pk_ortu` varchar(30) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `ijazah` varchar(450) NOT NULL,
  `ktp` varchar(450) NOT NULL,
  `tanggalDaftar` date NOT NULL,
  `status_peserta` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `id_kejuruan` (`id_kejuruan`),
  KEY `id_agama` (`id_agama`),
  KEY `id_pendidikan` (`id_pendidikan`),
  CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peserta_ibfk_3` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peserta_ibfk_4` FOREIGN KEY (`id_kejuruan`) REFERENCES `kejuruan` (`id_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
INSERT INTO `peserta` VALUES   ('7','Ukhti Ali Maryam','1','122222111135133636','Tegal, 11 Januari 1997','wanita','1','Belum','12','Kota Tegal','6756746546545','','','Untung','Buruh','Kota Tegal','http://localhost/project_blk/libs/ijazah/ijazah-user-12-03-2017-01-ukhti-ali-maryam.jpg','http://localhost/project_blk/libs/ktp/ktp-user-12-03-2017-01-ukhti-ali-maryam.JPG','2017-03-12','1');
INSERT INTO `peserta` VALUES ('11','Bejo Sarjono Prakasa','1','122222111135133636','Yogyakarta, 2017-02-25','pria','1','Belum','13','Yogyakarta','6756746546545','','','Bejo','swasta','Yogyakarta','http://localhost/project_blk/libs/ijazah/ijazah-user-12-03-2017-06-bejo-sarjono-prakasa.jpg','http://localhost/project_blk/libs/ktp/ktp-user-12-03-2017-06-bejo-sarjono-prakasa.jpg','2017-03-12','1');