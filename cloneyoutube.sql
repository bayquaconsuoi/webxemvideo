-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2021 lúc 10:02 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cloneyoutube`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_avatar` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `user_name`, `user_avatar`, `password`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin.jpg', '05d58ef1269251a11ec4d18f64d3acba', 'bayquaconsuoi@gmail.com', '0399845984', '2021-05-29 05:58:01', '2021-06-06 11:16:13'),
(6, 'VergilStorm', 'vergil.jpg', '062e058bab4712217e0afdc987457430', 'theStormApproaching@gmail.com', '0284738212', '2021-05-29 05:38:21', '2021-06-06 11:00:54'),
(10, '666666', 'unnamed (1).jpg', '981831b5fc3a3cc19859cc3e2e1ccab5', 'bayquabienrong12@gmail.com', '0392718212', '2021-06-04 10:56:17', '2021-06-04 11:59:34'),
(11, 'nerosx', 'aba.jpg', '062e058bab4712217e0afdc987457430', 'oqwia@gmail.com', '0128371921', '2021-06-04 10:22:18', '2021-06-04 16:33:22'),
(12, 'aprilneias', 'audrey bunny.jpg', '062e058bab4712217e0afdc987457430', 'Dante@gmail.com', '0928371912', '2021-05-29 11:06:15', '2021-06-04 16:18:07'),
(13, ' 陰陽師Onmyoji', 'onmyoji.jpg', '062e058bab4712217e0afdc987457430', 'Onmyoji@gmail.com', '0399845984', '2021-05-30 06:21:46', '2021-06-05 15:11:42'),
(15, 'aaaaaaaaaaaa', 'default_avatar.jpg', '062e058bab4712217e0afdc987457430', 'bayquaconsuoi2@gmail.com', '1293181821', '2021-06-04 16:20:43', '2021-06-04 16:20:43'),
(16, 'KyKiske7', 'unnamed.jpg', '062e058bab4712217e0afdc987457430', '8ahmed.alsidi@gmailwe.com', '0918394812', '2021-05-31 08:26:09', '2021-06-04 17:01:00'),
(17, 'Zanar Aesthetics', 'unfunny.jpg', '062e058bab4712217e0afdc987457430', 'mjovem.sk8_lifeq@orangdalem.org', '043181291', '2021-05-31 09:54:57', '2021-05-31 09:54:57'),
(18, 'LofiGirl', 'lofi.jpg', '062e058bab4712217e0afdc987457430', 'hdiane.chenetc@netfacc.com', '094821912', '2021-06-01 07:57:57', '2021-06-01 07:57:57'),
(19, 'TheSoulofWind', 'thesoul.jpg', '062e058bab4712217e0afdc987457430', 'TheSoulofWind@gmail.com', '0293837181', '2021-06-01 11:17:42', '2021-06-03 14:43:21'),
(20, 'taikhoantest', '293891.jpg', '062e058bab4712217e0afdc987457430', 'nhayquaconsong@gmail.com', '0398171822', '2021-06-01 11:36:44', '2021-06-01 11:36:44'),
(21, '4301751124', 'tải xuống (1).jfif', '062e058bab4712217e0afdc987457430', '6redaflo.zhoo@hamssent.com', '09212738331', '2021-06-04 16:50:44', '2021-06-04 16:50:44'),
(22, 'seofon', '480px-Npc_zoom_3040036000_01.png', '062e058bab4712217e0afdc987457430', 'leaderEternal@gmail.com', '0912812713', '2021-06-05 15:51:07', '2021-06-05 15:51:07'),
(23, 'bayquabienca', 'default_avatar.jpg', '062e058bab4712217e0afdc987457430', 'bayquabienca@gmail.com', '09182181279', '2021-06-05 21:44:55', '2021-06-05 21:44:55'),
(24, 'taikhoantest22', 'default_avatar.jpg', '062e058bab4712217e0afdc987457430', '9a8.nguyentientrung@gmail.com', '01912129129', '2021-06-06 11:21:09', '2021-06-06 11:21:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Giải trí', '2021-06-04 21:41:29', '2021-06-04 21:41:29'),
(2, 'Tin tức', '2021-06-04 21:45:31', '2021-06-04 21:45:31'),
(3, 'Âm nhạc', '2021-06-04 21:50:45', '2021-06-04 21:50:45'),
(4, 'Trò chơi', '2021-06-04 21:55:45', '2021-06-04 21:55:45'),
(5, 'Thể thao', '2021-06-04 21:07:46', '2021-06-04 21:07:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id_his` int(11) NOT NULL,
  `video_id_his` int(11) NOT NULL,
  `created_at_his` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `user_id_his`, `video_id_his`, `created_at_his`) VALUES
(134, 11, 42, '2021-06-05 16:21:58'),
(135, 11, 43, '2021-06-05 16:22:16'),
(152, 12, 24, '2021-06-05 16:33:09'),
(153, 12, 17, '2021-06-05 16:38:07'),
(154, 12, 42, '2021-06-05 16:41:40'),
(155, 12, 11, '2021-06-05 16:41:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `isdislike`
--

CREATE TABLE `isdislike` (
  `id` int(11) NOT NULL,
  `user_id_store` int(11) NOT NULL,
  `video_id_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `isdislike`
--

INSERT INTO `isdislike` (`id`, `user_id_store`, `video_id_store`) VALUES
(1, 12, 14),
(4, 20, 17),
(5, 13, 21),
(6, 13, 16),
(8, 19, 22),
(9, 6, 13),
(12, 6, 22),
(13, 21, 7),
(14, 21, 8),
(15, 21, 21),
(17, 6, 18),
(18, 6, 10),
(24, 16, 1),
(25, 16, 15),
(26, 16, 21),
(27, 16, 28),
(28, 6, 34),
(30, 19, 37),
(31, 19, 28),
(32, 19, 11),
(33, 19, 13),
(34, 19, 18),
(35, 19, 5),
(36, 17, 39),
(37, 17, 35),
(42, 17, 11),
(44, 17, 36),
(45, 17, 31),
(46, 17, 28),
(47, 6, 38),
(48, 6, 7),
(49, 6, 39),
(51, 6, 37),
(52, 12, 38),
(53, 12, 24),
(54, 12, 30),
(55, 12, 23),
(56, 12, 3),
(59, 12, 25),
(60, 12, 42),
(61, 12, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `islike`
--

CREATE TABLE `islike` (
  `id` int(11) NOT NULL,
  `user_id_store` int(11) NOT NULL,
  `video_id_store` int(11) NOT NULL,
  `created_at_like` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `islike`
--

INSERT INTO `islike` (`id`, `user_id_store`, `video_id_store`, `created_at_like`) VALUES
(1, 18, 2, '2021-06-01 09:13:23'),
(2, 18, 8, '2021-06-01 09:13:25'),
(3, 6, 1, '2021-06-01 10:15:19'),
(5, 17, 3, '2021-06-01 10:57:08'),
(7, 17, 19, '2021-06-01 10:57:11'),
(8, 17, 25, '2021-06-01 10:57:17'),
(9, 20, 21, '2021-06-01 16:50:00'),
(10, 20, 22, '2021-06-01 16:50:12'),
(11, 20, 4, '2021-06-01 16:50:28'),
(12, 13, 8, '2021-06-02 11:17:22'),
(13, 13, 2, '2021-06-02 11:31:38'),
(14, 13, 1, '2021-06-02 12:40:07'),
(15, 19, 9, '2021-06-02 12:52:35'),
(16, 19, 17, '2021-06-02 12:52:36'),
(17, 19, 16, '2021-06-02 12:52:37'),
(18, 13, 22, '2021-06-02 12:55:58'),
(20, 13, 12, '2021-06-02 15:52:42'),
(21, 13, 12, '2021-06-02 19:58:37'),
(22, 6, 6, '2021-06-03 14:39:02'),
(23, 21, 24, '2021-06-04 16:45:47'),
(24, 21, 9, '2021-06-04 16:45:48'),
(25, 21, 12, '2021-06-04 16:45:54'),
(26, 21, 13, '2021-06-04 16:45:56'),
(36, 6, 20, '2021-06-04 16:54:58'),
(37, 6, 12, '2021-06-04 16:56:15'),
(38, 6, 24, '2021-06-04 16:56:17'),
(39, 16, 9, '2021-06-04 17:02:01'),
(40, 16, 20, '2021-06-04 17:02:04'),
(42, 16, 24, '2021-06-04 17:02:12'),
(43, 16, 17, '2021-06-04 17:02:15'),
(44, 16, 27, '2021-06-04 17:03:30'),
(45, 19, 42, '2021-06-05 15:36:13'),
(46, 19, 40, '2021-06-05 15:36:16'),
(47, 19, 30, '2021-06-05 15:36:27'),
(49, 19, 15, '2021-06-05 15:36:46'),
(50, 19, 38, '2021-06-05 15:36:58'),
(51, 19, 8, '2021-06-05 15:37:01'),
(54, 17, 18, '2021-06-05 15:38:19'),
(55, 17, 23, '2021-06-05 15:38:22'),
(56, 17, 1, '2021-06-05 15:38:24'),
(57, 17, 42, '2021-06-05 15:38:27'),
(58, 17, 40, '2021-06-05 15:38:33'),
(59, 17, 41, '2021-06-05 15:38:36'),
(60, 17, 21, '2021-06-05 15:38:38'),
(61, 17, 14, '2021-06-05 15:38:48'),
(62, 6, 43, '2021-06-05 16:20:03'),
(63, 6, 30, '2021-06-05 16:20:06'),
(64, 6, 40, '2021-06-05 16:20:10'),
(66, 6, 25, '2021-06-05 16:20:27'),
(67, 12, 2, '2021-06-05 16:26:32'),
(68, 12, 17, '2021-06-05 16:26:34'),
(69, 12, 40, '2021-06-05 16:26:35'),
(70, 12, 8, '2021-06-05 16:26:37'),
(72, 12, 20, '2021-06-05 16:26:44'),
(74, 12, 19, '2021-06-05 16:26:53'),
(77, 6, 42, '2021-06-08 13:36:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `video_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `tenvideo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `mota` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `user_avatar` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `video_id`, `tenvideo`, `mota`, `user_id`, `user_name`, `user_avatar`, `category`, `like_count`, `dislike_count`, `view_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'La_dJYH0Hm0', '[GBF] Lyria\'s Journal Scrapbook video - Dawning Sky (2nd arc ending)\r\n', 'The ending video and song for the 2nd arc of the story in the game.  Really love how the art is presented here.  Also a wonderful song!  Please enjoy.\r\n', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 3, 1, 10003, '2021-03-29 11:13:00', '2021-06-06 11:00:54', '0000-00-00 00:00:00'),
(2, '3_kpLBlgW6Q', '♪ Nhạc chill 6h chiều ~ Mới Chỉ Nhìn Em Khóc Tôi Bỗng Chợt Nhận Ra Đã Yêu Em Rồi | Gạt Tàn Lofi', '♪ Nhạc chill 6h chiều ~ Mới Chỉ Nhìn Em Khóc Tôi Bỗng Chợt Nhận Ra Đã Yêu Em Rồi | Gạt Tàn Lofi\r\n‣ Kênh Nhạc Chill Lofi Hay Nhất Hiện Nay\r\n✪ Follow Gạt Tàn: https://www.fb.com/gattan.fp\r\n📷 Artwork by ©Kleg\r\n• \r\n------------------------------------------------------------------------------------\r\n📝 Tracklist: \r\n00:00 Đường tôi chở em về\r\n04:55 Chỉ là muốn nói\r\n09:14 Dù cho mai về sau\r\n13:32 Đã từng như thế\r\n18:02 Vài giây nữa thôi\r\n22:46 Những gì anh nói\r\n28:23 Khi em lớn\r\n32:21 Họ yêu ai mất rồi\r\n37:03 Thở\r\n41:30 Chỉ vì quá thương em\r\n------------------------------------------------------------------------------------ \r\n✪ Follow Orinn Music\r\n• Fanpage: https://www.fb.com/OrinnMusic\r\n• Website: http://orinn.net\r\n© Bản quyền Video thuộc về Gạt Tàn/Orinn Music\r\n© Copyright by Orinn Music ☞ Do not Reup\r\n#Nhactre #Lofi #Chill', 12, 'dante', 'audrey bunny.jpg', 'Âm nhạc', 3, 1, 50, '2021-05-29 16:56:37', '2021-06-05 09:11:24', '0000-00-00 00:00:00'),
(3, 'AW4GHRxljG0', 'Em Đi Xa Nơi Phương Trời Chỉ Có Mỗi Anh Nơi Này - Nhạc Lofi Chill Hay Nhất ft. Phải Chăng Em Đã Yêu\r', '♪ Em Đi Xa Nơi Phương Trời Chỉ Có Mỗi Anh Nơi Này\r\nNhạc Lofi Chill Hay Nhất ft. Phải Chăng Em Đã Yêu\r\n★ More about Em Ơi\r\n• Facebook: https://www.fb.com/Emoifp\r\n• Photo by Nguyễn Hữu Thưởng: https://www.fb.com/huuthuong1011​\r\n\r\n✪ Follow Freak D\r\n→ https://www.facebook.com/freakdprod\r\n→ https://soundcloud.com/freakdprod\r\n------------------------------------------------------------------------------------\r\n♫ Tracklist: \r\n00:00 Mình anh nơi này - Nit x Sing\r\n04:38 Ngàn yêu thương về đâu - Huy Vạc\r\n07:59 Thế thái - Hương Ly\r\n11:29 Chỉ muốn bên em lúc này - Huy Vạc x Jiki X\r\n15:54 Bỏ lỡ nhau rồi - Hải Nam\r\n21:02 Chàng trai sơ mi hồng - Hoàng Duyên\r\n25:33 Có duyên không nợ - NB3 Hoài Bảo\r\n29:36 Mỹ nhân - Đinh Đại Vũ\r\n34:26 Xin đừng hỏi tại sao - Đinh Ứng Phi Trường\r\n38:44 Anh từng cố gắng - Nhật Phong\r\n42:51 Linh cảm tim em - Ngọc Kara\r\n47:19 Người đến sau sẽ cho người tất cả - Hoài Lâm\r\n51:01 Kiểu gì chẳng mất - Lil Z\r\n55:07 Liệu giờ - 2T\r\n------------------------------------------------------------------------------------ \r\n✪ Follow Orinn Music\r\n• Fanpage: https://www.fb.com/OrinnMusic\r\n• Website: http://orinn.net\r\n© Bản quyền ca khúc thuộc về Em Ơi/Orinn Music\r\n© Copyright by Orinn Music ☞ Do not Reup\r\n#Nhac #Chill #Hay', 12, 'dante', 'audrey bunny.jpg', 'Âm nhạc', 1, 2, 41, '2021-05-29 17:01:22', '2021-06-05 09:11:21', '0000-00-00 00:00:00'),
(4, 'Jrg9KxGNeJY', 'Bury the Light is Vergil\'s battle theme from Devil May Cry 5 Special Edition', 'Bury the Light is Vergil\'s battle theme from Devil May Cry 5 Special Edition\r\nWritten and performed by the amazing Casey Edwards http://www.youtube.com/user/CaseyEdwa... and the powerful Victor Borba https://www.youtube.com/c/VictorBorba...\r\n\r\nListen to more of the MOTIVATING Devil May Cry 5 OST https://www.youtube.com/watch?v=j-OmI...\r\n\r\nPlz subscribe for more music https://www.youtube.com/c/devilhunter...\r\n\r\nCredits (as found from the DMC Fandom Wiki - plz tell me if wrong!):\r\n\r\nWritten By: Casey Edwards\r\nDrums: Anup Sastry\r\nMixing: Adam “Nolly” Getgood\r\nVocals: Victor Borba\r\n\r\n(C) & (P) 2020 Capcom Co., Ltd', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 1, 0, 47, '2021-05-29 22:22:38', '2021-06-06 11:00:54', '0000-00-00 00:00:00'),
(6, 'FKnDvu_eODY', 'Skylar Grey - I m coming home(Lyrics) \r\n    where id = 60', 'Neste vídeo, mostro como podemos fazer upload no NodeJS com Express utilizando o Multer.\r\n\r\nCadastre-se para receber as novidades: https://www.devpleno.com/\r\nCurta o DevPleno no Facebook: https://www.facebook.com/devpleno/ ---\r\nConheça nossos cursos premium:\r\n\r\ndevRactJS - Crie aplicações web e mobile profissionais com ReactJS sem programar nada no servidor em apenas 45 dias: https://www.devpleno.com/devreactjs\r\n\r\nFullstack Master -\r\n Torne-se um desenvolvedor fullstack em apenas 3 meses (indepe', 6, 'VergilStorm', 'vergil.jpg', 'Tin tức', 2, 0, 42, '2021-05-29 22:27:30', '2021-06-06 11:00:54', NULL),
(7, 'DWcJFNfaw9c', 'lofi hip hop radio - beats to relax/study to\r\n', '🤗 Thank you for listening, I hope you will have a good time here\r\n\r\n🎼 | Listen on Spotify, Apple music and more\r\n→   https://bit.ly/lofigirI-playlists\r\n\r\n💬 | Join the Lofi Girl community \r\n→   https://bit.ly/lofigirl-discord\r\n→   https://bit.ly/lofigirl-reddit\r\n\r\n🌎 | Lofi Girl on all social media\r\n→   https://bit.ly/lofigirl-sociaI\r\n\r\n👕 | Lofi Girl merch\r\n→   https://bit.ly/lofigirl-merch\r\n\r\n🎨 | Art by Juan Pablo Machado\r\n→   https://bit.ly/Machadofb\r\n', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 3, 3, 106, '2021-05-29 22:30:28', '2021-06-06 11:00:54', '0000-00-00 00:00:00'),
(8, 'cAaTrZto3fE', '[VI/EN/中日字幕] Tuyết Ngữ 雪語リ(雪の言葉) - TOMO - 陰陽師蟬冰雪女主題曲 - Nhạc chủ đề thức thần SP Tuyết Nữ Yuki Onna', '#onmyoji #yukionna #spyukionna\r\nNhạc chủ đề thức thần SP Thiền Băng Tuyết Nữ - Onmyoji RPG\r\nInstrumental version at: https://youtu.be/GHiEAvxHYM0\r\nTrình bày: TOMO\r\nVideo edit: NL\r\n\r\n作曲/composed: Afra Cheng \r\n作词/Lyrics: Afra Cheng\r\n\r\n配唱制作人 : 大河内 航太\r\n吉他 : 黄冠龙 Alex.D\r\n和声 : TOMO/李雅微\r\n和声编写 : 李雅微/黄冠龙 Alex.D\r\n黑管 : 高杰 Jim Geddes\r\n长笛 : 高杰 Jim Geddes\r\n弦乐 : 李琪弦乐团\r\n弦乐编写 : 黄冠龙 Alex.D\r\n录音室 : 新奇鹿Saturdaystudio\r\n配唱录音师 : 川岛 尚己\r\n配唱录音室 : Studio A-tone Valley\r\n录音师 : 谢丰泽 Fengtse Heist\r\n混音 : 林正忠\r\n混音室 : 录堡工作室 robot studio\r\n制作监制 : 何官锭AL . 许智铭\r\n制作统筹 : RmoneyChen 陈柏翰\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\n雪語 (陰陽師蟬冰雪女式神主題曲)\r\nNghệ sĩ\r\nTomo\r\nĐĩa nhạc\r\n雪語 (陰陽師蟬冰雪女式神主題曲)\r\nBên cấp phép cho YouTube\r\nGolden Dynamic (thay mặt cho Music Bravo Co., Ltd.)', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 4, 2, 148, '2021-05-30 12:10:39', '2021-06-05 09:11:52', '0000-00-00 00:00:00'),
(9, 'UOMsnO_SIBA', 'GRANBLUE FANTASY ORIGINAL SOUNDTRACKS Lyria\r\n', 'GRANBLUE FANTASY ORIGINAL SOUNDTRACKS Lyria\r\n\r\nPublished by Cymusic / Cygames\r\nComposed by Tsutomu Narita, Nobuo Uematsu\r\nArranged by Tsutomu Narita\r\nPerformed by Yasuo Sasai, CHiCO, STEVIE, Haruka Shimotsuki, Nao Toyama, Takayuki Oshikane, Masahiro Itami, Tsutomu Narita, Koichiro Tashiro, Yuma Ito, Shiro Ito\r\nLyrics by Cygames, Manami Kiyota', 16, 'KyKiske7', 'unnamed.jpg', 'Âm nhạc', 7, 0, 136, '2021-05-31 13:11:21', '2021-06-05 09:11:36', '0000-00-00 00:00:00'),
(11, 'HSOtku1j600', '2 Hour Beautiful Piano Music for Studying and Sleeping 【BGM】\r\n', '2 Hour Beautiful Piano Music for Studying and Sleeping 【BGM】\r\n\r\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\r\n❂ Credits: \r\n\r\n❋ OCTOBER\r\n- https://www.youtube.com/channel/UC6C5...\r\n- https://www.facebook.com/profile.php?...\r\n- https://www.instagram.com/o_ctober5/\r\n\r\n❋ Foxtail Grass\r\n- http://f-g-s.net/\r\n\r\n───────────────────\r\n\r\n► Support us on Patreon ✿◕ ‿ ◕ ✿:https://www.patreon.com/TheSoulofWind\r\n\r\n❂Check out my onee-chan channel:❂\r\nhttps://www.youtube.com/channel/UCUNZ...\r\n\r\n❂The Soul of Wind❂\r\n★❋ Subscribe (◠‿◠', 19, 'TheSoulofWind', 'thesoul.jpg', 'Âm nhạc', 2, 3, 131, '2021-06-01 22:03:17', '2021-06-05 09:11:04', '0000-00-00 00:00:00'),
(12, '6Nb-prB-4P0', 'Aaron Smith - Dancin - Krono Remix (Official Video) ft. Luvli\r\n', 'Reserva la canción en iTunes: http://smarturl.it/AaronDancin\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\nDancin - Krono Remix\r\nNghệ sĩ\r\nAaron Smith feat. Luvli\r\nĐĩa nhạc\r\nDancin\r\nBên cấp phép cho YouTube\r\nGrupa BB Media Music, [Merlin] Ultra Music, SME (thay mặt cho Ultra Records); UMPG Publishing, IMPEL, SOLAR Music Rights Management, LatinAutor - SonyATV, UNIAO BRASILEIRA DE EDITORAS DE MUSICA - UBEM, LatinAutorPerf, Sony ATV Publishing, Abramus Digital, LatinAutor - Warner Chappell, CMRRA và 16 Hiệp hội bảo vệ quyền âm nhạc', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 2, 0, 101, '2021-06-02 11:57:47', '2021-06-06 11:00:54', '0000-00-00 00:00:00'),
(13, 'cs0LVJpgUKI', 'Pride by Aya Hirano平野綾 (English subbed)\r\n', '青白く弾けた閃光を\r\n迷いのない瞳の中映して\r\n颯爽と切っ先に灯した\r\n目的を忘れることはないさ\r\n \r\n胸に刻まれたbitterなday by day\r\n失くしたもの　またきっと　取り戻すために\r\n \r\n駆け上がるEndless sky\r\n眩しい光にとらわれても\r\n加速する熱を　未来(あす)へ変えて行こう\r\nどんな逆境でも\r\n私が道を切り拓くから\r\nあのグランブルーより早く\r\n \r\n何度汚されて失くしても\r\nこの心まで　奪えない\r\n抱き締めた　たった一つだけのプライド\r\n \r\n頼りない両手をすり抜けた\r\n悔しさがこの身を突き動かして\r\n強がりなココロが邪魔した\r\n見失い　それでも歩いてく\r\n \r\n錆びた秒針で紡いだstep by step\r\n大事なもの　もう二度と失くさないために\r\n \r\n遥かなるGrand blue sky\r\n優しい強さに気づけたから\r\n繋いだこの手を　信じ前を向こう\r\nどんな暗闇でも\r\n立ち止まらない　そう決めたから\r\nまだ見ぬ道の蒼穹(そら)へ\r\n \r\n独りよがりじゃ守れない\r\n今ここにある輝きを守りたい\r\nやっと掴めたんだ\r\n \r\n駆け上がるEndless s', 19, 'TheSoulofWind', 'thesoul.jpg', 'Âm nhạc', 2, 1, 135, '2021-06-02 12:53:51', '2021-06-05 09:10:18', '0000-00-00 00:00:00'),
(14, 'X5X-S3djBuU', '[Vietsub/中日字幕] Tận cùng của Huyễn Thế 幻世的盡頭 (幻世の涯て) - Ayahi Takagaki - 陰陽師千姬主題曲 - Nhạc SSR Thiên Cơ\r', '#onmyoji #senhime #amduongsu\r\nBài hát chủ đề của thức thần SSR Thiên Cơ - Âm Dương Sư RPG\r\n\r\nTrình bày: Ayahi Takagaki\r\nVideo được cắt ghép từ CG của nhân vật\r\nEditor: Nickson Lau\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\n幻世的盡頭 (幻世の涯て) [伴奏版]\r\nNghệ sĩ\r\n高垣彩陽\r\nĐĩa nhạc\r\n陰陽師《永生之海》ASMR音樂概念專輯\r\nBên cấp phép cho YouTube\r\nGolden Dynamic (thay mặt cho Music Bravo Co., Ltd.) và 1 Hiệp hội bảo vệ quyền âm nhạc\r\n', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 3, 0, 474, '2021-06-02 12:55:46', '2021-06-05 09:10:28', '0000-00-00 00:00:00'),
(15, 'g3jCAyPai2Y', 'Yakuza OST - Baka Mitai (ばかみたい) Kiryu full version\r\n', 'Yakuza (Ryu ga Gotoku) 0, 5 and Kiwami karaoke, sang by Kiryu.\r\n\r\nAll rights reserved to Sega and Ryu ga Gotoku Studio', 17, 'Zanar Aesthetics', 'unfunny.jpg', 'Âm nhạc', 1, 1, 98, '2021-06-02 20:29:07', '2021-06-05 09:10:34', '0000-00-00 00:00:00'),
(17, 'hxADTEJalRw', 'Skylar Grey - I\'m coming home (Lyrics)', '-------------------------------------------------------------------------------------------\r\n★ Hãy Subcribes ? Like ? và ấn chuông ? thông báo để không bỏ lỡ video mới nha! \r\n-------------------------------------------------------------------------------------------\r\n★ Follow Gomping EDM\r\n→ http://www.youtube.com/c/GOMPING​\r\n★ Follow Domino Music\r\n→ http://www.youtube.com/c/DominoMusic​\r\n★ Follow Fanpage\r\n→ https://www.facebook.com/gomping69​\r\n-------------------------------------------------------------------------------------------\r\n? Tag: #TikTokChina​ #NhacTikTok​ #GOMPINGEDM​\r\n-------------------------------------------------------------------------------------------\r\nTrack list : \r\n00:00 Thời Không Sai Lệch - Ngải Thần - 错位时空 - 艾辰\r\n03:43 Yến Vô Hiết - Tương Tuyết Nhi -- 燕无歇 -蒋雪儿\r\n07:05 Ngu Hề Thán - Văn Nhân Thính Thư - 虞兮叹 - 闻人听書\r\n10:35 Tự Chính Khang Viên - Luân Tang, Trương Hiểu Hàm - 字正腔圆 - 伦桑- 张晓涵\r\n14:22 Tô Mạc Già - Trương Hiểu Đường - 蘇幕遮 - 張曉棠\r\n17:42 Mang Chủng - Âm Khuyết Thi Thính - 芒種 - 音闕詩聽\r\n21:37 Lãng Tử Nhàn Thoại – Hoa Đồng -《浪子闲话》花僮 - (抖音)\r\n25:08 Say Đắm Cả Thanh Xuân - Anh Họ Khúc Giáp Của Em - 沉醉的青丝\r\n29:03 Hắn Chỉ Là Lướt Qua - Thái Duật Blazo - 他只是经过 - 蔡燏\r\n33:03 Bạch Nguyệt Quang Và Nốt Chu Sa - Đại Tử - 白月光与朱砂痣 - 大籽\r\n36:30 Bốn Mùa Trao Anh - Trình Hưởng - 四季予你 - 程响\r\n40:43 Giấc Mơ Không Thể Đánh Thức - Thập Nhị! - 醒不来的梦 - 拾贰！\r\n-------------------------------------------------------------------------------------------\r\n? CONTACT US: \r\n• Facebook: https://www.facebook.com/gomping69​\r\n• Email: gomping68@gmail.com\r\n-----------------------------------------------------------------------------------------\r\n© If there are any issues regarding copyright and music in the video, please contact  mail (✉  gomping68@gmail.com) I will process and delete that video immediately. Thank you! ^_^\r\n-----------------------------------------------------------------------------------------\r\n◢Please Share this Mix on Social sites (Facebook, Google +, Twitter etc.) to more person could listen it!\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\n错位时空\r\nNghệ sĩ\r\n艾辰\r\nĐĩa nhạc\r\n错位时空\r\nBên cấp phép cho YouTube\r\n[Merlin] EWway Music (thay mặt cho NetEase Cloud Music); JWC Entertainment (Music Publishing) và 2 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\nGreen Leaf\r\nNghệ sĩ\r\nThuong Luxo\r\nĐĩa nhạc\r\nGreen Leaf\r\nBên cấp phép cho YouTube\r\nSonoSuite (thay mặt cho Thuong Luxo)\r\nBài hát\r\n字正腔圆 (伴奏)\r\nNghệ sĩ\r\n伦桑, 一颗小葱张晓涵\r\nĐĩa nhạc\r\n字正腔圆\r\nBên cấp phép cho YouTube\r\n[Merlin] EWway Music (thay mặt cho 鲸鱼向海) và 1 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\n苏幕遮 (伴奏版)\r\nNghệ sĩ\r\n张晓棠\r\nĐĩa nhạc\r\n苏幕遮\r\nBên cấp phép cho YouTube\r\n[Merlin] EWway Music (thay mặt cho 鲸鱼向海); UMPG Publishing, JWC Entertainment (Music Publishing) và 6 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\n沉醉的青絲\r\nNghệ sĩ\r\n你的大表哥曲甲\r\nĐĩa nhạc\r\n沉醉的青絲\r\nBên cấp phép cho YouTube\r\nThe Orchard Music (thay mặt cho 科大訊飛) và 1 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\n白月光与朱砂痣\r\nNghệ sĩ\r\n大籽\r\nĐĩa nhạc\r\n白月光与朱砂痣\r\nBên cấp phép cho YouTube\r\n[Merlin] EWway Music (thay mặt cho 鲸鱼向海); ASCAP, JWC Entertainment (Music Publishing) và 1 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\n四季予你\r\nNghệ sĩ\r\n程響\r\nĐĩa nhạc\r\n四季予你\r\nBên cấp phép cho YouTube\r\nThe Orchard Music (thay mặt cho 北京眾水之音文化傳播有限公司) và 3 Hiệp hội bảo vệ quyền âm nhạc\r\nBài hát\r\n醒不来的梦\r\nNghệ sĩ\r\n拾贰\r\nĐĩa nhạc\r\n醒不来的梦\r\nBên cấp phép cho YouTube\r\n[Merlin] EWway Music (thay mặt cho 一寸光年) và 1 Hiệp hội bảo vệ quyền âm nhạc', 20, 'taikhoantest', '293891.jpg', 'Âm nhạc', 2, 0, 31, '2021-06-03 13:52:39', '2021-06-05 09:10:47', '0000-00-00 00:00:00'),
(18, 'xZu5vwcEQeo', 'Top 10 EDM Remix Nhạc Hoa Lời Việt Nghe Nhiều 💘 Tự Em Đa Tình Remix , Nhành Hoa Rụng Rơi Hot TikTok', 'Top 10 EDM Remix Nhạc Hoa Lời Việt Nghe Nhiều 💘 Tự Em Đa Tình Remix , Nhành Hoa Rụng Rơi Hot Tik Tok\r\n\r\n#edmtiktoktrungquoc #nhactreremix #nhanhhoarungroi #tuemdatinh\r\n\r\n♫ Đăng ký kênh: https://www.youtube.com/channel/UCUPS...\r\n\r\n✉ Hợp tác, quảng cáo, khiếu nại các vấn đề về bản quyền liên hệ chúng tôi qua mail: contact@rinmedia.net\r\n\r\n© Bản quyền video thuộc về 29 EDM Plus\r\n© Copyright by 29 EDM Plus - RIN Media - Mee Music  ☞ Do not Reup\r\n\r\nTag: tik tok, remix, edm, remix 2021, nhac tre, nonstop 2021, nhạc remix, nhac, thich thi den, nhạc trẻ, nhạc, thích thì đến, edm remix, nhạc trẻ remix, edm tik tok, nhạc edm, orinn remix, nhac remix, htrol, lk nhac tre remix, nhac tre remix, htrol remix, nhạc trẻ remix 2020, lk nhac tre, nhạc trẻ 2021, nonstop remix, nhac tre 2021, nhac tre hay, orinn, nhac tre hay nhat, nhạc mới, nhạc trẻ mới nhất, nhạc trẻ hay, nhạc trẻ remix 2021 hay nhất hiện nay, edm gây nghiện, jenny remix, nhạc trẻ hay nhất, nhạc edm remix, acv music edm, lk nhạc trẻ remix, remix vinahouse, việt mix 2021, việt mix, liên khúc nhạc trẻ remix, nhac tre remix 2021, remix edm, 2ao remix, tik tok acv remix, edm tiktok vn, nhạc gây nghiện, edm tik tok gay nghien, edm tik tok gây nghiện, nhac tre edm tik tok gay nghien hay nhat, nhac tre edm, nhac tre edm tik tok, nhac tre edm tik tok gay nghien, nhạc trẻ remix hay nhất, nhạc trẻ căng cực, nhạc trẻ nonstop, nhạc trẻ hay nhất hiện nay, nhac tre viet mix, lk nhạc trẻ, nhạc trẻ vinahouse, bd remix, nhạc trẻ edm tik tok, nhạc trẻ edm tik tok gây nghiện hay nhất, nhạc trẻ edm tik tok gây nghiện, jennyremix, bd media remix, nhạc trẻ remix tuyển chọn, nhạc trẻ remix 2021, nhac tre remix hay nhất, nhạc edm 2021, remix 2021 hay nhất, nhạc trẻ edm,tự em đa tình,tự em đa tình remix,tu em đa tinh remix,tự em đa tình quinn,remix tu em da tinh,tự em đa tình hot tik tok,quinn,nhành hoa rụng rơi,nhành hoa rụng rơi tiktok,nhành hoa rụng rơi remix,tự em đa tình lời việt,tự em đa tình tiktok,nhanh hoa rung roi,nhanh hoa rung roi remix,tu em da tinh,nhạc hoa lời việt,nhạc hoa lời việt remix,Top 10 Bản Remix Nhạc Hoa Lời Việt Nghe Nhiều,edm tik tok trung quốc,nhạc remix nghe nhiều,edm remix,29 edm plus,Top 10 EDM Remix Nhạc Hoa Lời Việt Nghe Nhiều 💘 Tự Em Đa Tình Remix , Nhành Hoa Rụng Rơi Hot Tik Tok', 20, 'taikhoantest', '293891.jpg', 'Âm nhạc', 1, 1, 192, '2021-06-03 14:13:52', '2021-06-05 09:10:53', '0000-00-00 00:00:00'),
(19, 'CQmo_KOcqtw', '【陰陽師 Onmyoji】緊那羅主題曲《鹿》（附歌詞）【TOMO】\r\n', '緊那羅主題三部曲最後一首了...！\r\n大致就這樣，頻道暫時不發影片\r\n先休息一段時間啦\r\n\r\n音樂歌詞－網易雲 \r\n圖源－官方壁紙\r\n\r\n\r\n補充：\r\n製作人：何官錠AL\r\n和聲編寫：大河內 航太\r\n錄音室：Studio A-tone 西麻布\r\n錄音師：川島 尚己\r\n弦樂編寫：賴暐哲EGGO Music Production\r\n弦樂：李琪弦樂團\r\n樂器收錄：北京九紫天成樂器\r\n錄音師：劉璆\r\n混音師：週天澈@Studio21A\r\n母帶後期：週天澈@Studio21A', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 1, 1, 152, '2021-06-03 14:25:10', '2021-06-05 09:10:06', '0000-00-00 00:00:00'),
(20, 'Y3mcydB-D_0', '【陰陽師Onmyoji】不知火主題曲「離島之歌」\r\n', '【陰陽師Onmyoji】\r\n', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 3, 0, 233, '2021-06-03 14:26:13', '2021-06-05 09:09:57', '0000-00-00 00:00:00'),
(21, 'ux6XKVwgRvI', 'Subhuman (Dante\'s Battle Theme from Devil May Cry 5) 【FULL HD MUSIC】\r\n', 'Subhuman - Dante\'s Battle Theme\r\nDevil May Cry 5 \r\nMusic: Cody Matthew Johnson\r\nPerformance: Michael Barr\r\n\r\n© CAPCOM CO., LTD. ALL RIGHTS RESERVED.\r\n\r\nNo Copyright infringement intended. All the videos, songs and images used in the video belong to their respective owners and this channel does not claim any right over them.\r\n\r\n#Subhuman #DevilMayCry5 #Capcom\r\n#Dante #BattleTheme #TheLegendaryDevilHunter\r\n\r\n➡️ Here\'s my Devil May Cry 5 Music Playlist: https://www.youtube.com/playlist?list...\r\n\r\nRemember to \'Like\' and Subscribe if you enjoyed listening!\r\nShow support by purchasing their game and soundtrack!\r\n(Links will be provided below.)\r\nEvery little thing is appreciated. 💖\r\n\r\n☕ Ko-fi: https://ko-fi.com/audreybunny\r\n🖤 My Website: https://bit.ly/audreybunnyWIX\r\n💚 PayPal: http://bit.ly/audreybunnyPayPal\r\n❤️ YouTube: https://bit.ly/audreybunnyYT\r\n💜 Twitch: http://bit.ly/audreybunnyTwitch\r\n💙 Facebook: http://bit.ly/audreybunnyFB\r\n💛 Instagram: http://bit.ly/audreybunnyIG\r\n\r\n▶️ Game available on Steam: https://goo.gl/P1sSYa\r\n▶️ Music available on Amazon: https://www.amazon.com/Subhuman/dp/B0...\r\n\r\n▶️ Devil May Cry 5 Website: http://www.devilmaycry5.com/\r\n▶️ Capcom Website: http://www.capcom.com/', 12, 'dante', 'audrey bunny.jpg', 'Âm nhạc', 1, 2, 88, '2021-06-03 14:31:07', '2021-06-05 09:09:52', '0000-00-00 00:00:00'),
(22, 'hj83cwfOF3Y', 'Peaceful Piano & Soft Rain - Relaxing Sleep Music, A Bitter Rain\r\n', 'Peaceful Piano & Soft Rain\r\nRelaxing Sleep Music, A Bitter Rain\r\n\r\n------------------------------------------------------------------------------\r\nCredits: \r\n\r\n❋ BigRicePiano\r\n- https://bigrice.bandcamp.com/\r\n- https://www.youtube.com/user/BigRiceR...\r\n- https://www.facebook.com/RiceIsBig\r\n- https://www.instagram.com/bigricepiano/\r\n\r\n------------------------------------------------------------------------------\r\n\r\n~ The Soul of Wind ~\r\n- Subscribe: http://goo.gl/mCaSb4\r\n- Fanpage: https://goo.gl/hJJHc9\r\n- Twitter: https://goo.gl/iQf1cK\r\n\r\n#Piano\r\n#Sleep\r\n#Healing', 19, 'TheSoulofWind', 'thesoul.jpg', 'Âm nhạc', 0, 0, 266, '2021-06-03 14:36:40', '2021-06-05 09:10:11', '0000-00-00 00:00:00'),
(23, '1tk1pqwrOys', '廻廻奇譚 - Eve MV', '廻廻奇譚(kaikaikitan) - Eve Music Video Streaming/DL：https://tf.lnk.to/kaikaikitan ◆MV Staff Director：佐伯雄一郎 Motion Graphic Designer：平井秀次（dep Management） Lyric Design：ZUMA Producer：沼田瑞希 (THINKR) Original Animation：MAPPA Special Thanks to 呪術廻戦製作委員会 ©芥見下々／集英社・呪術廻戦製作委員会 ーーー TVアニメ『呪術廻戦』 毎週金曜日深夜1時25分から、 MBS/TBS系全国28局ネット、“スーパーアニメイズム”枠にて放送中‼️ jujutsukaisen.jp ©芥見下々／集英社・呪術廻戦製作委員会 ーーーー ◆New EP『廻廻奇譚 / 蒼のワルツ』 2020.12.23 release!! 【呪術盤】【ジョゼ盤】【通常盤】の3形態による全7曲を収録。 01.廻廻奇譚 02.蒼のワルツ 03.心海 04.宵の明星 05.遊遊冥冥 06.約束 07.杪夏 ☑️DVD(呪術盤)：胡乱な食卓 EXCLUSIVE LIVE 映像 ☑️GOODS(ジョゼ盤)：蒼の蓄光キーホルダー ☑️早期予約(全形態)：「いのちの食べ方」 MV DVD＋ステッカー付(11/20迄) ▶️ Tie up 廻廻奇譚 / TVアニメ『呪術廻戦』オープニング主題歌 蒼のワルツ / アニメ映画『ジョゼと虎と魚たち』主題歌 心海 / アニメ映画『ジョゼと虎と魚たち』挿入歌 ▼CD予約 https://tf.lnk.to/kaikaiwaltz_CD ▼特設サイト https://eveofficial-kaikaiwarutsu.com New EP  is now available on online store and Animate overseas shop. ▼Streaming https://tf.lnk.to/kaikaikitan ▼CD Japan（Overseas) https://www.cdjapan.co.jp/product/TFC... ▼TOWER RECORDS ONLINE（Overseas) http://tower.jp/item/5121265 http://faq.tower.jp/category/show/25 ▼Animate overseas shop KOREA main store Honde,Taipei,Taichung,Bangkok ▼ANIMATE INTERNATIONAL（Overseas only・Access from Japan is not available） https://www.animate.shop/ Lyrics/Music/Vocal：Eve Arrangement：Numa Drums : Masaki Hori Drum Technician : Masuo Arimatsu Beat Programming : Masaki Hori / TAKU INOUE Recorded & Mixed by Masashi Uramoto (Soi Co.,Ltd) Recorded at Aobadai Studio Inc. Assisted by Miyuki Nakamura (Aobadai Studio Inc.) Mixed at Soi Studio Eve HP：http://eveofficial.com/ twitter：https://twitter.com/oO0Eve0Oo youtube channel：https://goo.gl/jiNQkz ◆inst https://www.dropbox.com/s/c15hieqrwps... (-3key) https://www.dropbox.com/s/2tnskm0uh4r... ◆Lyrics 廻廻奇譚 有象無象 人の成り 虚勢 心象 人外 物の怪みたいだ 虚心坦懐 命宿し あとはぱっぱらぱな中身なき人間 寄せる期待 不平等な人生 才能もない 大乗 非日常が 怨親平等に没個性 辿る記憶 僕に 居場所などないから 夢の狭間で泣いてないで どんな顔すればいいか わかってる だけどまだ応えてくれよ 闇を祓って 闇を祓って 夜の帳が下りたら合図だ 相対して 廻る環状戦 戯言などは 吐き捨ていけと まだ止めないで まだ止めないで 誰よりも聡く在る 街に生まれしこの正体を 今はただ呪い呪われた僕の未来を創造して 走って 転んで 消えない痛み抱いては 世界が待ってる この一瞬を 抒情的 感情が 揺らいでいくバグ 従順に従った欠陥の罰 死守選択しかない愛に無常気　 声も出せないまま 傀儡な誓いのなき百鬼夜行 数珠繋ぎなこの果てまでも 極楽往生 現実蹴って 凪いで 命を投げ出さないで 内の脆さに浸って どんな顔すればいいか わかんないよ 今はただ応えてくれよ 五常を解いて 五常を解いて 不確かな声を紡ぐイデア 相殺して 廻る感情線 その先に今 立ち上がる手を ただ追いかけて ただ追いかけて 誰よりも強く在りたいと願う 君の運命すら 今はただ 仄暗い夜の底に 深く深く落ちこんで 不格好に見えたかい これが今の僕なんだ 何者にも成れないだけの屍だ 嗤えよ 目の前の全てから 逃げることさえやめた イメージを繰り返し 想像の先をいけと 闇を祓って 闇を祓って 夜の帳が下りたら合図だ 相対して 廻る環状戦 戯言などは 吐き捨ていけと まだ止めないで まだ止めないで 誰よりも聡く在る 街に生まれしこの正体を 今はただ呪い呪われた僕の未来を創造して 走って 転んで 消えない痛み抱いては 世界が待ってる この一瞬を', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 1, 1, 105, '2021-06-03 14:38:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'd2MHUJTciRg', '【グランブルーファンタジー】『Parade\'s Lust』歌詞付き視聴動画\r\n', '2019年5月1日発売「オリジナルサウンドトラック第7弾\"Chaos\"」に収録される『Parade\'s Lust』の歌詞付き視聴動画です。\r\n\r\n■予約受付中\r\nGRANBLUE FANTASY ORIGINAL SOUNDTRACKS \"Promise\"\r\nhttps://cystore.com/products/45734787...\r\n\r\nGRANBLUE FANTASY ORIGINAL SOUNDTRACKS \"Chaos\"\r\nhttps://cystore.com/products/45734787...\r\n\r\n----------------------------------------------------------------------------------------------\r\n\r\nMusic: Tsutomu Narita\r\nLyrics: Tetsuya Fukuhara (Cygames)\r\nEnglish Translation: Kane Bryant (Cygames)\r\nArrangement & Synthesizer Programming: Tsutomu Narita\r\n\r\nVocals: Taro Kobayashi\r\n\r\nE. Guitar & E. Bass: Tsutomu Narita\r\nRecording and Mixing Engineer: Hiroyuki Akita\r\nAssistant Engineer: Yosuke Maeda (Studio Greenbird)\r\nRecording Studio: Studio Greenbird\r\n\r\nArtist Management (Taro Kobayashi): Maiko Murayama (MOTHERSMILK RECORD)\r\nMusic Production Director: Hiroki Ogawa (Dog Ear Records)', 19, 'TheSoulofWind', 'thesoul.jpg', 'Âm nhạc', 3, 1, 682, '2021-06-03 14:40:16', '2021-06-05 09:09:39', '0000-00-00 00:00:00'),
(25, 'hPaWmxa1Ois', 'Top 10 bài hát hay nhất TheFatRat\r\n', '-------  Welcome to My Channel-------\r\n▶Top 10 bài hát hay nhất TheFatRat\r\n💛 Nếu bạn thấy hay thì Subcribes và ấn chuông 🔔 thông báo để không bỏ lỡ video mới\r\n💛 Chúc các bạn nghe nhạc vui vẻ\r\n\r\n_ _ _ _ _\r\nTrack list:\r\n00:00  TheFatRat - No No No\r\nhttps://www.youtube.com/watch?v=d0uFv...\r\n02:57  TheFatRat - The Calling (feat. Laura Brehm)\r\nhttps://www.youtube.com/watch?v=KR-eV...\r\n06:48  TheFatRat, Slaydit & Anjulie - Stronger [Monstercat Release]\r\n https://monster.cat/stronger\r\n10:11  TheFatRat - Rise Up\r\nhttps://www.youtube.com/watch?v=j-2DG...\r\n12:59  TheFatRat - Fly Away feat. Anjulie\r\nhttps://www.youtube.com/watch?v=cMg8K...\r\n16:10  TheFatRat & Maisy Kay - The Storm (Official Music Video)\r\nhttps://www.youtube.com/watch?v=L4bZR...\r\n18:33  TheFatRat & AleXa (알렉사) - Rule The World\r\nhttps://www.youtube.com/watch?v=OJdG8...\r\n21:32  TheFatRat & Anjulie - Close To The Sun\r\nhttps://www.youtube.com/watch?v=oJuGl...\r\n24:42  TheFatRat (feat. Laura Brehm) - Khúc Tiễn Biệt (Monody)\r\nhttps://www.youtube.com/watch?v=B7xai... \r\n29:30  TheFatRat & Laura Brehm - We\'ll Meet Again\r\nhttps://www.youtube.com/watch?v=hJqYc...\r\n\r\n\r\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\r\n🔰 All rights belong to their respective owners. If any owner of track/background used in this mix is unhappy,please do not report us,take your time to contact us via mail \r\n✉ firesmoke2611@gmail.com\r\nWe will provide you proper credits or remove the video if you demand.\r\n▶️Thumbnail: https://wallhaven.cc/w/rdqz9m\r\n▶Video edited by Greese EDM\r\n💛TheFatRat\r\n https://facebook.com/thisisthefatrat​​\r\n https://twitter.com/ThisIsTheFatRat​​\r\n https://instagram.com/thefatratoffici...\r\n https://soundcloud.com/thefatrat​​\r\n https://www.youtube.com/thefatrat\r\n\r\n🌸 If you feel good! Please Share this Mix on Social sites (Facebook, Google +, Twitter etc.) to more person could listen it!\r\n✔️ Thanks for listening - Have a good songs\r\nTag:\r\n#TheFatRat,#Greese EDM,', 1, 'admin', 'admin.jpg', 'Âm nhạc', 1, 1, 184, '2021-06-04 16:11:32', '2021-06-05 09:09:30', '0000-00-00 00:00:00'),
(27, 'dv13gl0a-FA', 'Initial D - Deja Vu\r\n', 'Anime - Initial D\r\n\r\nSong - Deja Vu\r\n\r\nArtist - Super Eurobeat - Dave Rodgers\r\n\r\nAll rights and credits go to their respective owners.\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\nDEJA VU(EXTENDED MIX)\r\nNghệ sĩ\r\nV.A.\r\nĐĩa nhạc\r\nSUPER EUROBEAT presents EUROMACH 2\r\nBên cấp phép cho YouTube\r\nAvex Inc. (thay mặt cho cutting edge); Warner Chappell, PEDL, LatinAutorPerf, BMG Rights Management (US), LLC, LatinAutor - PeerMusic, ARESA, Sony ATV Publishing, Abramus Digital và 13 Hiệp hội bảo vệ quyền âm nhạc', 16, 'KyKiske7', 'unnamed.jpg', 'Âm nhạc', 1, 0, 142, '2021-06-04 17:03:28', '2021-06-05 09:09:21', '0000-00-00 00:00:00'),
(28, 'dQw4w9WgXcQ', 'Rick Astley - Never Gonna Give You Up (Video)\r\n', 'Rick Astley\'s official music video for “Never Gonna Give You Up” \r\nListen to Rick Astley: https://RickAstley.lnk.to/_listenYD\r\n\r\nSubscribe to the official Rick Astley YouTube channel: https://RickAstley.lnk.to/subscribeYD\r\n\r\nFollow Rick Astley:\r\nFacebook: https://RickAstley.lnk.to/followFI\r\nTwitter: https://RickAstley.lnk.to/followTI\r\nInstagram: https://RickAstley.lnk.to/followII\r\nWebsite: https://RickAstley.lnk.to/followWI\r\nSpotify: https://RickAstley.lnk.to/followSI\r\n\r\nLyrics:\r\nNever gonna give you up\r\nNever gonna let you down\r\nNever gonna run around and desert you\r\nNever gonna make you cry\r\nNever gonna say goodbye\r\nNever gonna tell a lie and hurt you\r\n\r\n#RickAstley #NeverGonnaGiveYouUp #DancePop\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\nNever Gonna Give You Up (7\" Mix)\r\nNghệ sĩ\r\nRick Astley\r\nTác giả\r\nPete Waterman, Mike Stock, Matt Aitken\r\nBên cấp phép cho YouTube\r\n (thay mặt cho Sony BMG Music UK); AMRA, UMPG Publishing, LatinAutorPerf, UMPI, LatinAutor - UMPG, CMRRA, UNIAO BRASILEIRA DE EDITORAS DE MUSICA - UBEM, LatinAutor, BMI - Broadcast Music Inc., Kobalt Music Publishing, LatinAutor - Warner Chappell và 14 Hiệp hội bảo vệ quyền âm nhạc\r\n', 16, 'KyKiske7', 'unnamed.jpg', 'Âm nhạc', 0, 3, 66, '2021-06-04 17:04:02', '2021-06-05 09:09:17', '0000-00-00 00:00:00'),
(30, 'j9V78UbdzWI', 'Coffin Dance (Official Music Video HD)', 'Follow my Instagram : https://www.instagram.com/matthewordr...\r\nWatch my newest video : https://youtu.be/v-DSRXNa4Yk\r\nStay at home please, Our funeral service is only available if everyone behaves to the rules of the pandemic.\r\n\r\n#Staysafe #StayatHome \r\n\r\nI do not own the music and videos, neither ads or monetization.\r\nall the things up there goes respectively to the owners\r\n\r\nMusic used :\r\nhttps://www.youtube.com/watch?v=iLBBR...\r\n\r\n\r\nVicetone & Tony Igy - Astronomia\r\n\r\n#Memes #CoffinDance #Astronomia #CoffinMeme #Coffin #CoffinMeme #DanceMeme #CoffinDanceMeme\r\nMyAssetCMS đề xuất\r\nTony Igy – Astronomia (Never Go Home) Official Video\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\nAstronomia\r\nNghệ sĩ\r\nVicetone, Tony Igy\r\nĐĩa nhạc\r\nAstronomia\r\nBên cấp phép cho YouTube\r\nMyAssetCMS (thay mặt cho B1 Recordings GmbH); LatinAutor - UMPG, BMI - Broadcast Music Inc., LatinAutorPerf, CMRRA, UNIAO BRASILEIRA DE EDITORAS DE MUSICA - UBEM, UMPG Publishing, UMPI và 11 Hiệp hội bảo vệ quyền âm nhạc', 1, 'admin', 'admin.jpg', 'Âm nhạc', 2, 1, 244, '2021-06-04 17:13:55', '2021-06-05 09:09:12', '0000-00-00 00:00:00'),
(31, 'rLLdw2pKZuQ', 'Sau 6 tháng, Hoài Linh giải ngân tiền từ thiện giữa dịch Covid-19 | VTC Now\r\n', 'VTC Now | Giữa ồn ào liên quan đến việc “ngâm” tiền từ thiện, mới đây, đại diện nghệ sĩ Hoài Linh đã trao hơn tám tỷ đồng cho Mặt trận Tổ quốc Việt Nam ở Quảng Trị, Quảng Ngãi, Thừa Thiên Huế... giúp người dân vùng lũ.\r\n\r\n(*) Theo dõi thêm tại www.vtcnow.net', 1, 'admin', 'admin.jpg', 'Tin tức', 0, 2, 1, '2021-06-04 21:55:02', '2021-06-04 21:55:02', '0000-00-00 00:00:00'),
(32, 'pIrOAyXIjak', 'Harry Potter - The Ultimate Indian Theme\r\n', 'If Hogwarts opens in India, this is going to be the school song! Enjoy this Indian version of \'Hedwig\'s Theme\' composed by John Williams as part of the Harry Potter Soundtrack. The video features some fantastic VFX and Cinematography by my good friends Tharun Joseph and Amitha Arun.\r\n\r\nTo learn to play music on the iPad, visit https://bit.ly/mahesh_gsc\r\nFor Bookings and Enquiries: Email niranjan@greenroomnow.com or call +919698022266\r\n\r\nPale Blue Dot Creative (VFX and Cinematography)\r\nhttp://www.palebluedotcreative.com\r\nInstagram - https://instagram.com/palebluedotcrea...\r\n\r\nMahesh Raghvan (iPad (Geoshred) and Music Production): \r\nFacebook - https://facebook.com/followingmahesh\r\nInstagram - https://instagram.com/followingmahesh\r\nTwitter - https://twitter.com/followingmahesh\r\nMusic - http://www.carnaticmusicfusion.com\r\n\r\nApp Used: GeoShred - http://www.wizdommusic.com/products/g...\r\nThe violin sound is GeoShred controlling Audio Modelling\'s SWAM Violin - http://audiomodeling.com/', 6, 'VergilStorm', 'vergil.jpg', 'Âm nhạc', 0, 0, 123, '2021-06-05 09:27:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'ZUJJdeByJa0', 'Ainsley\'s Jerk Chicken - Ainsley\'s Barbecue Bible - BBC Food\r\n', 'Ainsley blends together the ingredients for this famous marinade and is overjoyed at the lip smacking prospect of his favourite jerk chicken.\r\n\r\nFor more BBC Good Food videos visit our channel: http://www.youtube.com/bbcgoodfood \r\n\r\nFor recipes on the go, download our mobile app for iOS, Android, and Windows 10: http://bbcgoodfood.app.link/yjd0xiERXH\r\n\r\nGlasgow, London and Birmingham the BBC Good Food Show Live\r\nhttp://www.bbcgoodfoodshow.com/', 6, 'VergilStorm', 'vergil.jpg', 'Giải trí', 0, 1, 233, '2021-06-05 09:42:22', '2021-06-06 11:00:54', '2021-06-15 16:17:27'),
(35, '115amzVdV44', 'How To Fix a Water Damaged Laptop\r\n', 'Today I show you how to fix a water damaged laptop. Accidentally spilled some liquid onto your laptop? Has it stopped working? Don\'t worry - I\'ll show you how to fix it with ease. To prove just how good this method is at fixing liquid damaged laptops I put my own laptop at risk - I fully submerged it in water and I was still able to fix it and return it to perfect working condition.\r\n\r\nClick Here To Eggscribe! --►\r\nhttp://bit.ly/Eggscribe\r\n\r\nHave a video Suggestion? Post it in the Comments Section, Contact me through my Facebook page or Tweet me!\r\n\r\nConnect with me!\r\nFacebook ► http://www.facebook.com/HowToBasic\r\nTwitter ► http://www.twitter.com/HowToBasic\r\nInstagram ► http://instagram.com/HowToBasic\r\n2ND Channel ► http://www.youtube.com/HowToBasic2\r\nTikTok ► https://vm.tiktok.com/bpdFFN/\r\n\r\n\"I\'m HowToBasic\" shirts and Egg plushies ►\r\nhttps://shirtz.cool/collections/howto...\r\n\r\nKnow someone that has damaged their laptop? Show them how easy it is to fix!', 1, 'admin', 'admin.jpg', 'Giải trí', 0, 1, 524, '2021-06-05 15:05:57', '2021-06-05 15:05:57', '0000-00-00 00:00:00'),
(36, 'xOUbLUCZzYo', 'Review Khịa: MU Đại Thiên Sứ H5 - Trầm Cảm Vì Quảng Cáo Game Lừa VL | meGAME', 'MU đại thiên sứ H5 là 1 tựa game mà anh em nào bật YouTube lên cũng 1 lần bị dính quảng cáo. Và hôm nay meGAME sẽ trải nghiệm và review khịa tựa game này cho anh em để xem gameplay của tựa game có giống như quảng cáo? Và ý kiến của meGAME về tựa game này nhé.\r\n#meGAME #reviewgame #review #gamemobile #game\r\n\r\nLưu ý: Đây là nơi tôi sẽ đánh giá và nhận xét game theo cảm quan của riêng tôi, sẽ có khen, có chê và có cả cà khịa nữa. Và vẫn câu nói cũ, xem cho vui, không vui thì đợi khi nào vui thì xem nhé anh em\r\n\r\nTrước khi vào video, nếu anh em meFAN muốn nhanh chóng unlock mặt của team meGAME thì hãy subscribe meGAME để meGAME nhanh chóng đạt 1 triệu subs nhé. Nên là hãy subscribe đi, vì nó miễn phí còn được unlock mặt của công chúa meGAME nữa. Bây giờ thì  vào video thôi\r\n---------------------------------\r\nmeGAME là nơi chúng mình kể cho các bạn nghe mọi thứ về game. Từ phân tích cốt truyện, phân tích game, giả thuyết game cho đến các bảng xếp hạng các top game vcl hay ho. Hãy cùng khám phá những bí ẩn và có những hành trình thú vị cùng meGAME nhé\r\n\r\nỞ meGAME, game gì cũng có trò gì cũng chơi. Cho nên là nếu các bạn là một người yêu game và mê game, hãy SUBSCRIBE cho chúng mình cũng như đừng quên ấn vào chiếc chuông nho nhỏ bên cạnh nút SUBSCRIBE để không bỏ sót một video nào từ chúng mình nhé.\r\n---------------------------------\r\n\r\n► Đăng kí: https://metub.net/megame \r\n► Fanpage: https://www.facebook.com/metubgaming/\r\n► Group: https://www.facebook.com/groups/59541...\r\n► Website:  http://mgn.vn\r\n► Twitter: https://twitter.com/meGAMEOfficial', 1, 'admin', 'admin.jpg', 'Giải trí', 0, 1, 130, '2021-06-05 15:06:35', '2021-06-05 15:06:35', '0000-00-00 00:00:00'),
(37, '-OkvTs2zqaw', 'Cà Khịa Game: AMONG US - Tại Sao Lại Dead | meGAME', 'Hello xin chào các bạn, MGN meGAME đã quay trở lại rồi đây. Và meGAME lại mở ra một series mới dành cho những mefan rồi đây. Series này sẽ là nơi tôi cà khịa, phân tích, đá đều những vấn đề xung quanh làng game chứ đi phân tích giả thuyết cốt truyện mãi cũng hơi chán. \r\n#meGAME #amongus #cakhiagame ##imposteramongus \r\nVà mở đầu cho series mới này chính là Among Us.\r\n\r\nChắc có ông lại bảo:\" Dời, giờ này mà còn làm Among Us thì ai mà coi. Game này giờ còn ai chơi nữa đâu mà làm\". Thì đấy, đấy mới là nguyên do tôi làm nên video này chứ. Tại sao một tựa game từng rất nổi tiếng như Among Us bây giờ lại chẳng thấy tung tích trên bất kì một mặt trận nào nữa. Hôm nay hãy cũng meGAME tôi ngồi lại đây và bàn luận về vấn đề:\"Tại sao Among Us lại trở thành Dead Game\" nhé\r\n\r\nTrước khi vào video thì đừng quên ủng hộ meGAME bằng cách nhấn like và share video này, chưa subscribe thì subscribe lẹ làng cho tôi. Bây giờ thì bắt đầu thôi.\r\n-------------------------\r\nmeGAME là nơi chúng mình kể cho các bạn nghe mọi thứ về game. Từ phân tích cốt truyện, phân tích game, giả thuyết game cho đến các bảng xếp hạng các top game vcl hay ho. Hãy cùng khám phá những bí ẩn và có những hành trình thú vị cùng meGAME nhé\r\n\r\nỞ meGAME, game gì cũng có trò gì cũng chơi. Cho nên là nếu các bạn là một người yêu game và mê game, hãy SUBSCRIBE cho chúng mình cũng như đừng quên ấn vào chiếc chuông nho nhỏ bên cạnh nút SUBSCRIBE để không bỏ sót một video nào từ chúng mình nhé.\r\n-------------------------\r\n► Đăng kí: https://metub.net/megame \r\n► Fanpage: https://www.facebook.com/metubgaming/\r\n► Group: https://www.facebook.com/groups/59541...\r\n► Website:  http://mgn.vn\r\n► Twitter: https://twitter.com/meGAMEOfficial\r\n', 1, 'admin', 'admin.jpg', 'Giải trí', 0, 2, 274, '2021-06-05 15:06:58', '2021-06-05 15:06:58', '0000-00-00 00:00:00'),
(38, 'EyjrzPyCby0', 'when siete obtains his 5* upgrade - Infinite Klearre Works (グラブル)\r\n', 'i am the bolt of my windmeme (i ain\'t no windmemer, oira!)\r\n\r\n\r\nyou guys wanted unlimited meme works, and here he is *smugface\r\n\r\norig:https://www.youtube.com/watch?v=_x787...\r\n        https://www.youtube.com/watch?v=3XF0w...\r\n\r\n--------------------------------------------------------------------------------------------------------------------------\r\n\r\n\r\nplay Granblue Fantasy!: http://game.granbluefantasy.jp\r\n\r\nsubscribe for more memes: https://www.youtube.com/c/SLACKerMage\r\n\r\n🛌twitter: https://twitter.com/SLACKer_mage\r\n\r\n\r\n#granblue #gbf #グラブル #グランブルーファンタジー', 22, 'seofon', '480px-Npc_zoom_3040036000_01.png', 'Giải trí', 1, 2, 20, '2021-06-05 15:09:36', '2021-06-05 15:09:36', '0000-00-00 00:00:00'),
(39, '4oOO-prJ328', 'Event \"vui nhất\" Granblue Fantasy - Đừng bỏ lỡ!\r\n', 'Trong video này mình chia sẽ 1 số thông tin cần thiết để các bạn chuẩn bị tinh thần đón Event Guild Wars cực vui. \r\nThumbnail: artist https://twitter.com/scalizo_art?lang=vi', 22, 'seofon', '480px-Npc_zoom_3040036000_01.png', 'Giải trí', 0, 2, 43, '2021-06-05 15:10:26', '2021-06-05 15:10:26', '0000-00-00 00:00:00'),
(40, 'n8Gh_rrD020', '[Onmyoji] Bakkotsu Kiyohime theme song | Bone Bouned Qing Ji\r\n', 'I don\'t know if it actually her theme song name... Please let me know it if wrong. \r\n\r\nI don\'t know where part 1 & 2 are, all I see is part 3. Sorry I would like to find them but they all wrote in Japanese or Chinese. \r\nSP Kiyohime story: \r\nPart 3: https://www.youtube.com/watch?v=qwL1o...\r\n\r\n\r\nPlay Onmyoji for free!:\r\nApp Store - https://apps.apple.com/ca/app/onmyoji...\r\nSteam - https://store.steampowered.com/app/55...\r\nGoogle play - https://play.google.com/store/apps/de...\r\n\r\nPlay Onmyoji Arena:\r\nGoogle play - https://play.google.com/store/apps/de...\r\nApp store - https://apps.apple.com/us/app/onmyoji...', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 4, 0, 87, '2021-06-05 15:12:23', '2021-06-05 15:12:23', '0000-00-00 00:00:00'),
(41, 'ARLfBsIeh6U', '[Vietsub_Kara] Tâm Sinh Thất Diện, Thiện Ác Nan Biện - Tam Vô Marblue|心生七面善恶难辨 - 三无Marblue\r\n', 'Ca khúc đồng nhân \"Âm Dương Sư Thức Thần - Diện Linh Khí\"\r\n---------------------------------------\r\nSong: Tâm Sinh Thất Diện, Thiện Ác Nan Biện (心生七面善恶难辨 - Tâm Sinh Bảy Mặt, Thiện Ác Khó Phân)\r\nSinger: Tam Vô Marblue (三无Marblue)\r\nTranslator/Timer/Encoder: Lãnh Tiểu Nguyệt (Yue)', 13, ' 陰陽師Onmyoji', 'onmyoji.jpg', 'Âm nhạc', 1, 0, 174, '2021-06-05 15:13:03', '2021-06-05 15:13:03', '0000-00-00 00:00:00'),
(42, 'CQ8fQ2lL9TU', 'Vyrn sings the bahamut song (Lyrics + Download link)\r\n', 'Granblue Fantasy April Fool\'s Event (2017)\r\n\r\nSong ripped by /u/rierii on reddit: https://www.dropbox.com/s/blqixw897dn...\r\n\r\nLyrics:\r\nあぶねぇぞ毎日\r\nEvery day is dangerous\r\n姐さんからオイラはガリゴリ\r\nAne-san always rubs on me\r\nいってぇ~!勘弁してくれぇ~!\r\nOuch! Gimme a break!\r\nオイラのメンタルはボロボロ・・・\r\nMy mental health is in shambles...\r\n \r\n泣きながらドア潜る\r\nSlipping under the door while crying あれに見えるはぐらぶるっ\r\nThat\'s what Granblues looks like\r\n鍛えた筋肉見せて Wake Up Vee (オイラ?)\r\nShow me the muscles you\'ve trained. Wake up, Vee (Me?)\r\n \r\nRebirth Apples and Destruction You are Macho Vee\r\nRebirth Apples and Destruction Macho Vee and Vee\r\nRebirth Apples and Destruction You are Macho Vee\r\nRebirth Apples and Destruction Macho Vee and Vee\r\n \r\nおっしゃぁ!\r\nYeah!\r\n \r\nおっしゃぁ!\r\nディスってんじゃねぇぞ! オイラはドラゴン!\r\nYeah! Don\'t be hatin\'! I\'m a dragon!\r\nチャージ吸ってんじゃねぇぞ オイラはドラゴン(トカゲじゃねぇ!)\r\nDon\'t be stealing my charge! I\'m a dragon! (I\'m not a lizard!)\r\nやぃ!支配してやるぜ!\r\nHey! Imma rule you!\r\n常闇深い闇を抱えて オイラ エヴォリューションするぞ!\r\nEmbracing the endless darkness, I\'m gonna evolve!\r\n \r\nおっしゃぁ!\r\nYeah!\r\n \r\nおっしゃぁ!ディスってんじゃねぇぞ! オイラはドラゴン!\r\nYeah! Don\'t be hatin\'! I\'m a dragon!\r\nやぃ!支配してやるぜ!\r\nHey! Imma rule you!\r\n常闇深い闇を抱えて オイラ エヴォリューションするぞ!\r\nEmbracing the endless darkness, I\'m gonna evolve!', 19, 'TheSoulofWind', 'thesoul.jpg', 'Âm nhạc', 3, 1, 82, '2021-06-05 15:15:44', '2021-06-08 13:28:59', '0000-00-00 00:00:00'),
(43, 'FtutLA63Cp8', '【東方】Bad Apple!! ＰＶ【影絵】\r\n', 'sm8628149\r\nNhạc trong video này\r\nTìm hiểu thêm\r\nBài hát\r\nBad Apple!! feat.nomico(2014 REFIX)(from FLASHLIGHT)\r\nNghệ sĩ\r\nnomico\r\nĐĩa nhạc\r\n10th ANNIVERSARY Bad Apple!! feat.nomico\r\nBên cấp phép cho YouTube\r\nRightsscale (thay mặt cho 東方同人音楽流通) và 1 Hiệp hội bảo vệ quyền âm nhạc', 1, 'admin', 'admin.jpg', 'Âm nhạc', 1, 0, 462, '2021-06-05 15:16:27', '2021-06-05 15:16:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watch_later`
--

CREATE TABLE `watch_later` (
  `id` int(11) NOT NULL,
  `user_id_later` int(11) NOT NULL,
  `video_id_later` int(11) NOT NULL,
  `created_at_later` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `watch_later`
--

INSERT INTO `watch_later` (`id`, `user_id_later`, `video_id_later`, `created_at_later`) VALUES
(1, 18, 22, '2021-06-01 08:06:02'),
(2, 18, 16, '2021-06-01 08:06:06'),
(3, 18, 23, '2021-06-01 09:04:13'),
(4, 17, 24, '2021-06-01 10:57:00'),
(5, 17, 23, '2021-06-01 11:10:00'),
(8, 20, 23, '2021-06-01 16:50:09'),
(9, 20, 21, '2021-06-01 16:50:15'),
(11, 12, 6, '2021-06-02 11:43:44'),
(14, 19, 3, '2021-06-02 12:52:38'),
(15, 19, 2, '2021-06-02 12:52:40'),
(16, 19, 4, '2021-06-02 12:53:56'),
(18, 13, 22, '2021-06-02 15:58:14'),
(19, 13, 12, '2021-06-02 19:36:39'),
(20, 13, 13, '2021-06-02 19:45:46'),
(21, 13, 23, '2021-06-02 20:17:40'),
(23, 21, 9, '2021-06-04 16:45:58'),
(24, 21, 10, '2021-06-04 16:45:59'),
(25, 21, 15, '2021-06-04 16:46:00'),
(26, 21, 5, '2021-06-04 16:46:04'),
(32, 16, 9, '2021-06-04 17:02:00'),
(33, 16, 14, '2021-06-04 17:02:03'),
(34, 16, 21, '2021-06-04 17:02:09'),
(35, 16, 24, '2021-06-04 17:02:13'),
(36, 16, 27, '2021-06-04 17:03:31'),
(37, 19, 40, '2021-06-05 15:36:16'),
(38, 19, 24, '2021-06-05 15:36:32'),
(40, 19, 15, '2021-06-05 15:36:47'),
(41, 19, 43, '2021-06-05 15:36:53'),
(42, 19, 38, '2021-06-05 15:36:58'),
(43, 19, 8, '2021-06-05 15:37:02'),
(45, 17, 40, '2021-06-05 15:38:34'),
(46, 17, 41, '2021-06-05 15:38:36'),
(48, 17, 14, '2021-06-05 15:38:48'),
(51, 12, 24, '2021-06-05 16:26:30'),
(52, 12, 2, '2021-06-05 16:26:32'),
(53, 12, 8, '2021-06-05 16:26:38'),
(54, 12, 23, '2021-06-05 16:26:39'),
(55, 12, 20, '2021-06-05 16:26:44'),
(57, 12, 19, '2021-06-05 16:26:53'),
(90, 6, 42, '2021-06-15 16:00:01'),
(91, 6, 7, '2021-06-15 16:00:03'),
(94, 6, 32, '2021-06-19 15:01:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `isdislike`
--
ALTER TABLE `isdislike`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `islike`
--
ALTER TABLE `islike`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `watch_later`
--
ALTER TABLE `watch_later`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `isdislike`
--
ALTER TABLE `isdislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `islike`
--
ALTER TABLE `islike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `watch_later`
--
ALTER TABLE `watch_later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
