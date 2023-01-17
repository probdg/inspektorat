-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: inspektorat
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `c_f1a`
--

DROP TABLE IF EXISTS `c_f1a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `c_f1a` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_master` int NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_f1a`
--

LOCK TABLES `c_f1a` WRITE;
/*!40000 ALTER TABLE `c_f1a` DISABLE KEYS */;
INSERT INTO `c_f1a` VALUES (1,1,'Pegawai mendapatkan pesan integritas & nilai etika secara rutin dari pimpinan instansi (Misalnya keteladanan, pesan moral dll)'),(2,1,'Pemda telah memiliki aturan perilaku (misalnya kode etik, pakta integritas, dan aturan perilaku pegawai) yang telah dikomunikasikan kepada seluruh pegawai'),(3,1,'Telah terdapat fungsi khusus di dalam instansi yang melayani pengaduan masyarakat atas pelanggaran aturan perilaku/kode etik'),(4,1,'Pelanggaran aturan perilaku/kode etik telah ditindaklanjuti\nsesuai ketentuan yang berlaku'),(5,2,'Standar kompetensi setiap pegawai/posisi jabatan telah ditentukan'),(6,2,'Pegawai yang kompeten telah secara tepat mengisi posisi/jabatan'),(7,2,'Pemda telah memiliki dan menerapkan strategi peningkatan kompetensi pegawai'),(8,2,'Terdapat pelatihan terkait pengelolaan risiko, baik pelatihan khusus maupun pelatihan terintegrasi secara berkala.'),(9,3,'Pimpinan telah menetapkan kebijakan pengelolaan risiko yang memberikan kejelasan arah pengelolaan risiko'),(10,3,'Pimpinan menerapkan pengelolaan risiko dan pengendalian dalam pelaksanaan tugas dan pengambilan keputusan'),(11,3,'Pimpinan membangun komunikasi yang baik dengan anggota organisasi untuk berani mengungkapkan risiko dan secara terbuka menerima/menggali pelaporan risiko/masalah'),(12,3,'Gaya pimpinan dapat mendorong pegawai untuk meningkatkan kinerja'),(13,3,'Pimpinan menetapkan Sasaran strategis yang selaras dengan visi dan misi Pemda'),(14,3,'Rencana/sasaran strategis pemda telah dijabarkan ke dalam sasaran OPD dan tingkat operasioanl OPD (cascading)'),(15,3,'Rencana strategis dan rencana kerja pemda telah menyajikan informasi mengenai risiko '),(16,3,'Pimpinan berperan serta dan mengikutsertakan pejabat dan\npegawai terkait dalam proses pengelolaan risiko'),(17,4,'Setiap Urusan telah dilaksanakan oleh OPD dan unit kerja yang tepat'),(18,4,'Masing-masing pihak dalam organisasi telah memperoleh kejelasan dan memahami peran dan tanggung jawab masing-masing dalam pengelolaan risiko '),(19,4,'Pegawai yang bertugas di OPD merupakan pegawai tetap dan bukan pegawai yang bersifat adhoc (sementara) '),(20,4,'Adanya transparansi dan ketepatan waktu pelaporan pelaksanaan peran dan tanggung jawab masing-masing dalam pengelolaan risiko'),(21,5,'Kriteria pendelegasian wewenang telah ditentukan dengan tepat'),(22,5,'Pendelegasian wewenang dan tanggung jawab dilaksanakan secara tepat'),(23,5,'Kewenangan direviu secara periodik'),(24,6,'Pemda telah memiliki Kebijakan dan prosedur pengelolaan SDM yang lengkap (sejak rekrutmen sampai\ndengan pemberhentian pegawai)'),(25,6,'Rekruitmen, retensi, mutasi, maupun promosi pemilihan SDM telah dilakukan dengan baik'),(26,6,'Insentif pegawai telah sesuai dengan tanggung jawab dan kinerja'),(27,6,'Pemda telah menginternalisasi budaya sadar risiko'),(28,6,'Adanya pemberian reward dan/atau punishment atas pengelolaan risiko (Misalnya mempertimbangkan pertanggungjawaban pengelolaan risiko dalam penilaian kinerja)'),(29,6,'Terdapat evaluasi kinerja pegawai, dan telah dipertimbangkan dalam perhitungan penghasilan'),(30,6,'Instansi telah mengalokasikan anggaran yang\nmemadai untuk pengembangan SDM'),(31,7,'Inspektorat Daerah melakukan reviu atas efisiensi/ efektivitas pelaksanaan setiap urusan/program Secara periodik'),(32,7,'Inspektorat Daerah melakukan reviu atas kepatuhan hukum dan aturan lainnya'),(33,7,'Inspektorat Daerah memberikan layanan fasilitasi penerapan pengelolaan risiko dan penyelenggaraan SPIP'),(34,7,'APIP telah melaksanakan pengawasan berbasis\nrisiko.'),(35,7,'Temuan dan saran/rekomendasi pengawasan APIP telah ditindaklanjuti'),(36,8,'Hubungan kerja yang baik dengan instansi/organisasi lain yang memiliki keterkaitan operasional telah terbangun'),(37,8,'Hubungan kerja yang baik dengan instansi yang terkait atas fungsi pengawasan/peemriksaan (inspektorat, BPKP, dan BPK) telah terbangun');
/*!40000 ALTER TABLE `c_f1a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_f1a_spip`
--

DROP TABLE IF EXISTS `c_f1a_spip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `c_f1a_spip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_master` int NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_f1a_spip`
--

LOCK TABLES `c_f1a_spip` WRITE;
/*!40000 ALTER TABLE `c_f1a_spip` DISABLE KEYS */;
INSERT INTO `c_f1a_spip` VALUES (1,1,'Pegawai mendapatkan pesan integritas & nilai etika secara rutin dari pimpinan instansi (Misalnya keteladanan, pesan moral dll)'),(2,1,'Pemda telah memiliki aturan perilaku (misalnya kode etik, pakta integritas, dan aturan perilaku pegawai) yang telah dikomunikasikan kepada seluruh pegawai'),(3,1,'Telah terdapat fungsi khusus di dalam instansi yang melayani pengaduan masyarakat atas pelanggaran aturan perilaku/kode etik'),(4,1,'Pelanggaran aturan perilaku/kode etik telah ditindaklanjuti\nsesuai ketentuan yang berlaku'),(5,2,'Standar kompetensi setiap pegawai/posisi jabatan telah ditentukan'),(6,2,'Pegawai yang kompeten telah secara tepat mengisi posisi/jabatan'),(7,2,'Pemda telah memiliki dan menerapkan strategi peningkatan kompetensi pegawai'),(8,2,'Terdapat pelatihan terkait pengelolaan risiko, baik pelatihan khusus maupun pelatihan terintegrasi secara berkala.'),(9,3,'Pimpinan telah menetapkan kebijakan pengelolaan risiko yang memberikan kejelasan arah pengelolaan risiko'),(10,3,'Pimpinan menerapkan pengelolaan risiko dan pengendalian dalam pelaksanaan tugas dan pengambilan keputusan'),(11,3,'Pimpinan membangun komunikasi yang baik dengan anggota organisasi untuk berani mengungkapkan risiko dan secara terbuka menerima/menggali pelaporan risiko/masalah'),(12,3,'Gaya pimpinan dapat mendorong pegawai untuk meningkatkan kinerja'),(13,3,'Pimpinan menetapkan Sasaran strategis yang selaras dengan visi dan misi Pemda'),(14,3,'Rencana/sasaran strategis pemda telah dijabarkan ke dalam sasaran OPD dan tingkat operasioanl OPD (cascading)'),(15,3,'Rencana strategis dan rencana kerja pemda telah menyajikan informasi mengenai risiko '),(16,3,'Pimpinan berperan serta dan mengikutsertakan pejabat dan\npegawai terkait dalam proses pengelolaan risiko'),(17,4,'Setiap Urusan telah dilaksanakan oleh OPD dan unit kerja yang tepat'),(18,4,'Masing-masing pihak dalam organisasi telah memperoleh kejelasan dan memahami peran dan tanggung jawab masing-masing dalam pengelolaan risiko '),(19,4,'Pegawai yang bertugas di OPD merupakan pegawai tetap dan bukan pegawai yang bersifat adhoc (sementara) '),(20,4,'Adanya transparansi dan ketepatan waktu pelaporan pelaksanaan peran dan tanggung jawab masing-masing dalam pengelolaan risiko'),(21,5,'Kriteria pendelegasian wewenang telah ditentukan dengan tepat'),(22,5,'Pendelegasian wewenang dan tanggung jawab dilaksanakan secara tepat'),(23,5,'Kewenangan direviu secara periodik'),(24,6,'Pemda telah memiliki Kebijakan dan prosedur pengelolaan SDM yang lengkap (sejak rekrutmen sampai\ndengan pemberhentian pegawai)'),(25,6,'Rekruitmen, retensi, mutasi, maupun promosi pemilihan SDM telah dilakukan dengan baik'),(26,6,'Insentif pegawai telah sesuai dengan tanggung jawab dan kinerja'),(27,6,'Pemda telah menginternalisasi budaya sadar risiko'),(28,6,'Adanya pemberian reward dan/atau punishment atas pengelolaan risiko (Misalnya mempertimbangkan pertanggungjawaban pengelolaan risiko dalam penilaian kinerja)'),(29,6,'Terdapat evaluasi kinerja pegawai, dan telah dipertimbangkan dalam perhitungan penghasilan'),(30,6,'Instansi telah mengalokasikan anggaran yang\nmemadai untuk pengembangan SDM'),(31,7,'Inspektorat Daerah melakukan reviu atas efisiensi/ efektivitas pelaksanaan setiap urusan/program Secara periodik'),(32,7,'Inspektorat Daerah melakukan reviu atas kepatuhan hukum dan aturan lainnya'),(33,7,'Inspektorat Daerah memberikan layanan fasilitasi penerapan pengelolaan risiko dan penyelenggaraan SPIP'),(34,7,'APIP telah melaksanakan pengawasan berbasis\nrisiko.'),(35,7,'Temuan dan saran/rekomendasi pengawasan APIP telah ditindaklanjuti'),(36,8,'Hubungan kerja yang baik dengan instansi/organisasi lain yang memiliki keterkaitan operasional telah terbangun'),(37,8,'Hubungan kerja yang baik dengan instansi yang terkait atas fungsi pengawasan/peemriksaan (inspektorat, BPKP, dan BPK) telah terbangun');
/*!40000 ALTER TABLE `c_f1a_spip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_level`
--

DROP TABLE IF EXISTS `dat_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dat_level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_level`
--

LOCK TABLES `dat_level` WRITE;
/*!40000 ALTER TABLE `dat_level` DISABLE KEYS */;
INSERT INTO `dat_level` VALUES (1,'Superadmin'),(2,'ADMIN'),(3,'OPD');
/*!40000 ALTER TABLE `dat_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_login`
--

DROP TABLE IF EXISTS `dat_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dat_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` int DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `opd` int DEFAULT NULL,
  `nama_operator` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_login`
--

LOCK TABLES `dat_login` WRITE;
/*!40000 ALTER TABLE `dat_login` DISABLE KEYS */;
INSERT INTO `dat_login` VALUES (1,1,'superadmin',0,'Superadmin','17c4520f6cfd1ab53d8745e84681eb49'),(2,3,'sekda',1,'Sekretaris Daerah','143853039dad575c9fe430499b8bf2a4'),(3,3,'pemda',56,'Pemerintah Daerah Sumedang','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `dat_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_sasaran_strategis_pemda`
--

DROP TABLE IF EXISTS `dat_sasaran_strategis_pemda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dat_sasaran_strategis_pemda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pemda` int DEFAULT NULL,
  `id_sasaran` int DEFAULT NULL,
  `id_rpjmd` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_sasaran_strategis_pemda`
--

LOCK TABLES `dat_sasaran_strategis_pemda` WRITE;
/*!40000 ALTER TABLE `dat_sasaran_strategis_pemda` DISABLE KEYS */;
INSERT INTO `dat_sasaran_strategis_pemda` VALUES (1,1,5,1),(2,2,14,1),(3,3,15,1),(4,4,2,1),(5,4,15,1),(6,5,1,1),(7,6,3,1),(8,6,9,1),(9,6,10,1),(10,7,9,1),(11,8,5,1),(12,8,10,1),(13,9,3,1),(14,9,10,1),(15,10,17,1),(16,11,12,1),(17,11,15,1),(18,12,15,1),(19,13,17,1),(20,14,4,1),(21,15,9,1),(22,16,15,1),(23,16,16,1),(24,17,6,1),(25,17,11,1),(26,17,17,1),(27,18,13,1),(28,18,15,1),(29,19,17,1),(30,20,15,1),(31,21,7,1),(32,21,11,1),(33,22,7,1),(34,23,14,1),(35,24,15,1),(36,25,14,1),(37,26,14,1),(38,26,15,1),(39,27,1,1),(40,28,5,1),(41,29,10,1),(42,30,16,1),(43,31,16,1),(44,32,16,1),(45,33,16,1),(46,34,16,1),(47,35,16,1),(48,36,16,1),(49,37,16,1),(50,38,16,1),(51,39,16,1),(52,40,16,1),(53,41,16,1),(54,42,16,1),(55,43,16,1),(56,44,16,1),(57,45,16,1),(58,46,16,1),(59,47,16,1),(60,48,16,1),(61,49,16,1),(62,50,16,1),(63,51,16,1),(64,52,16,1),(65,53,16,1),(66,54,16,1),(67,55,16,1);
/*!40000 ALTER TABLE `dat_sasaran_strategis_pemda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `f1b`
--

DROP TABLE IF EXISTS `f1b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `f1b` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_opd` int DEFAULT NULL,
  `nama_sumber` longtext,
  `uraian` longtext,
  `klasifikasi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `f1b`
--

LOCK TABLES `f1b` WRITE;
/*!40000 ALTER TABLE `f1b` DISABLE KEYS */;
/*!40000 ALTER TABLE `f1b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_f1a`
--

DROP TABLE IF EXISTS `m_f1a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_f1a` (
  `id` int NOT NULL AUTO_INCREMENT,
  `urutan` varchar(5) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_f1a`
--

LOCK TABLES `m_f1a` WRITE;
/*!40000 ALTER TABLE `m_f1a` DISABLE KEYS */;
INSERT INTO `m_f1a` VALUES (1,'A','PENEGAKAN INTEGRITAS DAN NILAI ETIKA'),(2,'B','KOMITMEN TERHADAP KOMPETENSI'),(3,'C','KEPEMIMPINAN YANG KONDUSIF'),(4,'D','PEMBENTUKAN STRUKTUR ORGANISASI YANG SESUAI DENGAN KEBUTUHAN'),(5,'E','PENDELEGASIAN WEWENANG DAN TANGGUNG JAWAB YANG TEPAT'),(6,'F','PENYUSUNAN DAN PENERAPAN KEBIJAKAN YANG SEHAT TENTANG PEMBINAAN SUMBER DAYA MANUSIA'),(7,'G','PERWUJUDAN PERAN APARAT PENGAWASAN INTERN PEMERINTAH YANG EFEKTIF'),(8,'H','HUBUNGAN KERJA YANG BAIK DENGAN INSTANSI PEMERINTAH TERKAIT');
/*!40000 ALTER TABLE `m_f1a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_gangguan_pelayanan`
--

DROP TABLE IF EXISTS `ref_gangguan_pelayanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_gangguan_pelayanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_dampak` text,
  `gangguan_pelayanan` text,
  `keterangan` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_gangguan_pelayanan`
--

LOCK TABLES `ref_gangguan_pelayanan` WRITE;
/*!40000 ALTER TABLE `ref_gangguan_pelayanan` DISABLE KEYS */;
INSERT INTO `ref_gangguan_pelayanan` VALUES (1,'Tidak Signifikan','Pelayanan tertunda < 1 hari','','1'),(2,'Minor','Pelayanan tertunda di atas 1 hari s.d. 5 hari','','2'),(3,'Moderat','Pelayanan tertunda di atas 5 hari s.d. 15 hari','','3'),(4,'Signifikan','Pelayanan tertunda di atas 15 hari s.d. 30 hari','','4'),(5,'Sangat Signifikan','Pelayanan tertunda lebih dari 30 hari','','5');
/*!40000 ALTER TABLE `ref_gangguan_pelayanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kategori_risiko`
--

DROP TABLE IF EXISTS `ref_kategori_risiko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kategori_risiko` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reg` text,
  `kategori` text,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kategori_risiko`
--

LOCK TABLES `ref_kategori_risiko` WRITE;
/*!40000 ALTER TABLE `ref_kategori_risiko` DISABLE KEYS */;
INSERT INTO `ref_kategori_risiko` VALUES (1,'A','Risiko Penerimaan','Risiko yang disebabkan oleh tidak tercapainya penerimaan daerah'),(2,'B','Risiko belanja','Risiko yang disebabkan oleh kegagalan dalam penyerapan anggaran belanja yang tidak sesuai sasaran dan rencana'),(3,'C','Risiko Pembiayaan','Risiko yang disebabkan oleh kegagalan pemenuhan pembiayaan, baik normal dan jangka waktu'),(4,'D','Risiko Startegis','Risiko yang disebabkan oleh ketidaktepatan organisasi dalam mengambil keputusan startegis'),(5,'E','Risiko Fraud','Risiko yang timbul karena kecurangan yang disengaja yang menimbulkankerugian negara'),(6,'F','Risiko Kepatuhan','Risiko yang disebabkan oleh oragnisasi tidak mematuhi ketentuan yang berlaku'),(7,'G','Risiko Operasional','Risiko yang disebabkan oleh tidak berfungsinya proses internal'),(8,'H','Risiko Reputasi','Risiko yang disebabkan oleh menurunnya tingkat kepercayaan stakeholder esternal'),(9,'I','Risiko SPBE','Risiko yang timbul oleh faktor SPBE (Sistem Pemerintahan Berbasis Elektronik)'),(10,'J','Risiko Lainnya','Risiko yang disebabkan oleh faktor lainnya');
/*!40000 ALTER TABLE `ref_kategori_risiko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kerugian_negara`
--

DROP TABLE IF EXISTS `ref_kerugian_negara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kerugian_negara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_dampak` text,
  `kerugian_negara` text,
  `keterangan` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kerugian_negara`
--

LOCK TABLES `ref_kerugian_negara` WRITE;
/*!40000 ALTER TABLE `ref_kerugian_negara` DISABLE KEYS */;
INSERT INTO `ref_kerugian_negara` VALUES (1,'Sangat Kecil','< Rp 10 juta','','1'),(2,'Kecil','Lebih dari Rp 10 juta s.d. Rp 50 juta','','2'),(3,'Sedang','Lebih dari Rp 50 juta s.d. Rp 100 juta','','3'),(4,'Besar','Lebih dari Rp 100 juta s.d. Rp 500 juta','','4'),(5,'Sangat Besar','Lebih dari Rp 500 juta','','5');
/*!40000 ALTER TABLE `ref_kerugian_negara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_kriteria_kemungkinan`
--

DROP TABLE IF EXISTS `ref_kriteria_kemungkinan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kriteria_kemungkinan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` text,
  `probabilitas` text,
  `frekuensi` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_kriteria_kemungkinan`
--

LOCK TABLES `ref_kriteria_kemungkinan` WRITE;
/*!40000 ALTER TABLE `ref_kriteria_kemungkinan` DISABLE KEYS */;
INSERT INTO `ref_kriteria_kemungkinan` VALUES (1,'Sangat Jarang','Terjadi kurang dari 5% dari kejadian transaksi','Terjadinya sangat jarang, kurang dari 2 kali','1'),(2,'Jarang ','Terjadi antara 5% s.d. 10% dari kejadian transaksi','Terjadinya jarang, 2 s.d. 10 kali','2'),(3,'Cukup Sering','Terjadi antara 10% s.d. 20% dari kejadian transaksi','Terjadinya cukup sering, diatas 10 s.d. 18 kali','3'),(4,'Sering ','Terjadi antara 20% s.d. 50% dari kejadian transaksi','Terjadinya sering, diatas 18 s.d. 26 kali','4'),(5,'Sangat Sering ','Terjadi lebih dari 50% dari kejadian transaksi','Terjadi sangat sering, lebih dari 26 kali','5');
/*!40000 ALTER TABLE `ref_kriteria_kemungkinan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_misi_strategis`
--

DROP TABLE IF EXISTS `ref_misi_strategis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_misi_strategis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `misi` longtext,
  `id_rpjmd` int DEFAULT NULL,
  `no_urut` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_misi_strategis`
--

LOCK TABLES `ref_misi_strategis` WRITE;
/*!40000 ALTER TABLE `ref_misi_strategis` DISABLE KEYS */;
INSERT INTO `ref_misi_strategis` VALUES (1,'Memenuhi Kebutuhan Dasar Masyarakat Secara Mudah Dan Terjangkau',1,'1'),(2,'Menguatkan Norma Agama Dalam Tatanan Kehidupan Sosial Masyarakat Dan Pemerintahan',1,'2'),(3,'Mengembangkan Wilayah Ekonomi Didukung Dengan Peningkatan Infrastruktur Dan Daya Dukung Lingkungan Serta Penguatan Budaya Dan Kearifan Lokal',1,'3'),(4,'Menata Birokrasi Pemerintah Yang Responsif Dan Bertanggung Jawab Secara Profesional Dalam Pelayanan Masyarakat',1,'4'),(5,'Mengembangkan Sarana Prasarana Dan Sistem Perekonomian Yang Mendukung Kreativitas Dan Inovasi Masyarakat Kabupaten Sumedang',1,'5');
/*!40000 ALTER TABLE `ref_misi_strategis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_opd`
--

DROP TABLE IF EXISTS `ref_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_opd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_opd` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_opd`
--

LOCK TABLES `ref_opd` WRITE;
/*!40000 ALTER TABLE `ref_opd` DISABLE KEYS */;
INSERT INTO `ref_opd` VALUES (1,'SEKRETARIS DAERAH'),(2,'INSPEKTORAT DAERAH'),(3,'SEKRETARIAT DPRD'),(4,'DINAS PENDIDIKAN'),(5,'DINAS KESEHATAN'),(6,'DINAS PEKERJAAN UMUM DAN TATA RUANG'),(7,'DINAS PERUMAHAN, KAWASAN PERMUKIMAN DAN PERTANAHAN'),(8,'SATUAN POLISI PAMONG PRAJA'),(9,'DINAS SOSIAL'),(10,'DINAS TENAGA KERJA DAN TRANSMIGRASI'),(11,'DINAS LINGKUNGAN HIDUP DAN KEHUTANAN'),(12,'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL'),(13,'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA'),(14,'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),(15,'DINAS PERHUBUNGAN'),(16,'DINAS KOMUNIKASI, INFORMATIKA, PERSANDIAN DAN STATISTIK'),(17,'DINAS KOPERASI, USAHA KECIL, MENENGAH, PERDAGANGAN DAN PERINDUSTRIAN'),(18,'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU'),(19,'DINAS PARIWISATA, KEBUDAYAAN, KEPEMUDAAN DAN OLAH RAGA'),(20,'DINAS ARSIP DAN PERPUSTAKAAN'),(21,'DINAS PERTANIAN DAN KETAHANAN PANGAN'),(22,'DINAS PERIKANAN DAN PETERNAKAN'),(23,'BADAN PERENCANAAN PEMBANGUNAN, PENELITIAN DAN PENGEMBANGAN DAERAH'),(24,'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA'),(25,'BADAN KEUANGAN DAN ASET DAERAH'),(26,'BADAN PENDAPATAN DAERAH'),(27,'RUMAH SAKIT UMUM DAERAH'),(28,'BADAN KESATUAN BANGSA DAN POLITIK'),(29,'BADAN PENANGGULANGAN BENCANA DAERAH'),(30,'Kecamatan Wado'),(31,'Kecamatan Jatinunggal'),(32,'Kecamatan Darmaraja'),(33,'Kecamatan Cibugel'),(34,'Kecamatan Cisitu'),(35,'Kecamatan Situraja'),(36,'Kecamatan Conggeang'),(37,'Kecamatan Paseh'),(38,'Kecamatan Surian'),(39,'Kecamatan Buahdua'),(40,'Kecamatan Tanjungsari'),(41,'Kecamatan Sukasari'),(42,'Kecamatan Pamulihan'),(43,'Kecamatan Cimanggung'),(44,'Kecamatan Jatinangor'),(45,'Kecamatan Rancakalong'),(46,'Kecamatan Sumedang Selatan'),(47,'Kecamatan Sumedang Utara'),(48,'Kecamatan Ganeas'),(49,'Kecamatan Tanjungkerta'),(50,'Kecamatan Tanjungmedar'),(51,'Kecamatan Cimalaka'),(52,'Kecamatan Cisarua'),(53,'Kecamatan Tomo'),(54,'Kecamatan Ujungjaya'),(55,'Kecamatan Jatigede'),(56,'Pemerintah Kabupaten Sumedang');
/*!40000 ALTER TABLE `ref_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_pemda`
--

DROP TABLE IF EXISTS `ref_pemda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_pemda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pemda` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_pemda`
--

LOCK TABLES `ref_pemda` WRITE;
/*!40000 ALTER TABLE `ref_pemda` DISABLE KEYS */;
INSERT INTO `ref_pemda` VALUES (1,'PEMERINTAH DAERAH KABUPATEN SUMEDANG');
/*!40000 ALTER TABLE `ref_pemda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_penurunan_kinerja`
--

DROP TABLE IF EXISTS `ref_penurunan_kinerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_penurunan_kinerja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_dampak` text,
  `penurunan_kinerja` text,
  `keterangan` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_penurunan_kinerja`
--

LOCK TABLES `ref_penurunan_kinerja` WRITE;
/*!40000 ALTER TABLE `ref_penurunan_kinerja` DISABLE KEYS */;
INSERT INTO `ref_penurunan_kinerja` VALUES (1,'Tidak Signifikan','Pencapaian target kinerja > 100%','','1'),(2,'Minor','Pencapaian target kinerja di atas 80% sd 100%','','2'),(3,'Moderat','Pencapaian target kinerja di atas 50% sd 80%','','3'),(4,'Signifikan','Pencapaian target kinerja di atas 25% sd 50%','','4'),(5,'Sangat Signifikan','Pencapaian target kinerja < 25%','','5');
/*!40000 ALTER TABLE `ref_penurunan_kinerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_penurunan_reputasi`
--

DROP TABLE IF EXISTS `ref_penurunan_reputasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_penurunan_reputasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_dampak` text,
  `penurunan_reputasi` text,
  `keterangan` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_penurunan_reputasi`
--

LOCK TABLES `ref_penurunan_reputasi` WRITE;
/*!40000 ALTER TABLE `ref_penurunan_reputasi` DISABLE KEYS */;
INSERT INTO `ref_penurunan_reputasi` VALUES (1,'Tidak Signifikan','Keluhan stakeholder secara lisan/tulisan ke organisasi,','< 3 kali dalam satu periode','1'),(2,'Minor','Keluhan stakeholder secara lisan/tulisan ke organisasi,','> 3 kali dalam satu periode','2'),(3,'Moderat','Pemberitaan negatif di media massa lokal','','3'),(4,'Signifikan','Pemberitaan negatif di media massa nasional','','4'),(5,'Sangat Besar','Lebih dari Rp 500 juta','','5');
/*!40000 ALTER TABLE `ref_penurunan_reputasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_rpjmd`
--

DROP TABLE IF EXISTS `ref_rpjmd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_rpjmd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_periode` text,
  `periode_awal` int DEFAULT NULL,
  `periode_akhir` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_rpjmd`
--

LOCK TABLES `ref_rpjmd` WRITE;
/*!40000 ALTER TABLE `ref_rpjmd` DISABLE KEYS */;
INSERT INTO `ref_rpjmd` VALUES (1,'Periode RPJMD Tahun 2019 - 2023',2019,2023),(2,'Periode RPJMD Tahun 2024- 2028',2024,2028);
/*!40000 ALTER TABLE `ref_rpjmd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_sasaran_strategis`
--

DROP TABLE IF EXISTS `ref_sasaran_strategis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_sasaran_strategis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sasaran` longtext,
  `id_rpjmd` int DEFAULT NULL,
  `no_urut` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_sasaran_strategis`
--

LOCK TABLES `ref_sasaran_strategis` WRITE;
/*!40000 ALTER TABLE `ref_sasaran_strategis` DISABLE KEYS */;
INSERT INTO `ref_sasaran_strategis` VALUES (1,'Meningkatnya Derajat Kesehatan Masyarakat',1,1),(2,'Meningkatnya Kualitas Penyelenggaraan Pendidikan',1,2),(3,'Meningkatnya Penanggulangan Pemerlu Pelayanan Kesejahteraan Sosial (PPKS)',1,3),(4,'Meningkatnya Pengarusutamaan Gender Dan Perlindungan Anak',1,4),(5,'Menguatnya Kondisi Kehidupan Kerukunan Umat Beragama',1,5),(6,'Meningkatnya Pertumbuhan Ekonomi Melalui Pengembangan Kawasan Industri',1,6),(7,'Meningkatnya Pertumbuhan Ekonomi Melalui Pengembangan Agribisnis',1,7),(8,'Meningkatnya Pemajuan Kebudayaan Dan Pengembangan Destinasi Wisata Sebagai Daya Tarik Pariwisata',1,8),(9,'Meningkatnya Kualitas Infrastruktur Sebagai Penunjang Perekonomian',1,9),(10,'Meningkatnya Ketahanan Daerah',1,10),(11,'Meningkatnya Ketahanan Pangan Daerah',1,11),(12,'Meningkatnya Kualitas Lingkungan Hidup',1,12),(13,'Meningkatnya Penanaman Modal Di Kabupaten Sumedang',1,13),(14,'Meningkatnya Akuntabilitas Kinerja Dan Keuangan',1,14),(15,'Meningkatnya Kualitas Pelayanan Publik',1,15),(16,'Meningkatnya Efektivitas Dan Efisiensi Kinerja Daerah',1,16),(17,'Meningkatnya Kompetensi Dan Produktivitas Masyarakat',1,17);
/*!40000 ALTER TABLE `ref_sasaran_strategis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_sumber_risiko`
--

DROP TABLE IF EXISTS `ref_sumber_risiko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_sumber_risiko` (
  `id` int DEFAULT NULL,
  `reg` text,
  `kategori` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_sumber_risiko`
--

LOCK TABLES `ref_sumber_risiko` WRITE;
/*!40000 ALTER TABLE `ref_sumber_risiko` DISABLE KEYS */;
INSERT INTO `ref_sumber_risiko` VALUES (1,'I','Risiko External','Risiko yang timbul dari luar organisasi'),(2,'II','Risiko Internal','Risiko yang timbul dari dalam organisasi');
/*!40000 ALTER TABLE `ref_sumber_risiko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_tujuan_strategis`
--

DROP TABLE IF EXISTS `ref_tujuan_strategis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_tujuan_strategis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tujuan` longtext,
  `id_rpjmd` int DEFAULT NULL,
  `no_urut` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_tujuan_strategis`
--

LOCK TABLES `ref_tujuan_strategis` WRITE;
/*!40000 ALTER TABLE `ref_tujuan_strategis` DISABLE KEYS */;
INSERT INTO `ref_tujuan_strategis` VALUES (1,'Terwujudnya Kesejahteraan Masyarakat',1,'1'),(2,'Terwujudnya Kehidupan Yang Agamis Di Kabupaten Sumedang',1,'2'),(3,'Terwujudnya Percepatan Pengembangan Wilayah Ekonomi Agribisnis, Industri, Dan Pariwisata Yang Berkelanjutan',1,'3'),(4,'Terwujudnya Akuntabilitas Kinerja Dan Reformasi Birokrasi',1,'4'),(5,'Terwujudnya Perekonomian Sumedang Yang Kreatif Dan Berdaya Saing',1,'5');
/*!40000 ALTER TABLE `ref_tujuan_strategis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_tuntutan_hukum`
--

DROP TABLE IF EXISTS `ref_tuntutan_hukum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_tuntutan_hukum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_dampak` text,
  `tuntutan_hukum` text,
  `keterangan` text,
  `reg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_tuntutan_hukum`
--

LOCK TABLES `ref_tuntutan_hukum` WRITE;
/*!40000 ALTER TABLE `ref_tuntutan_hukum` DISABLE KEYS */;
INSERT INTO `ref_tuntutan_hukum` VALUES (1,'Tidak Signifikan','< 5 kali dalam satu periode','','1'),(2,'Minor','diatas 5 sd 15 kali dalam satu periode','','2'),(3,'Moderat','diatas 15 sd 30 kali dalam satu periode','','3'),(4,'Signifikan','diatas 30 sd 50 kali dalam satu periode','','4'),(5,'Sangat Signifikan','diatas 50 kali dalam satu periode','','5');
/*!40000 ALTER TABLE `ref_tuntutan_hukum` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-17 10:24:32
