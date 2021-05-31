-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2021 lúc 02:17 PM
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
  `password` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `user_name`, `user_avatar`, `password`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin', 'bayquaconsuoi@gmail.com', 918273829, '2021-05-29 05:58:01', '2021-05-29 05:58:01'),
(6, 'taikhoantest1', 'unnamed.jpg', 'abc123123', 'bayquabienca@gmail.com', 918273829, '2021-05-29 05:38:21', '2021-05-29 05:38:21'),
(12, '4501104262', 'tải xuống (1).jfif', 'abc123123', 'bayquaconsuoi@gmail.com', 1238123123, '2021-05-29 11:06:15', '2021-05-29 11:06:15'),
(13, 'bayquaconsuoi', 'unnamed (1).jpg', 'bayqua123', 'bayquaconsuoi@gmail.com', 2147483647, '2021-05-30 06:21:46', '2021-05-30 06:21:46'),
(16, 'taikhoantest2', '119227496_1315363328795495_3486268309184032416_n.jpg', 'abc123123', 'admin6@gmail.com', 2147483647, '2021-05-31 08:26:09', '2021-05-31 08:26:09'),
(17, '8273912', '119227496_1315363328795495_3486268309184032416_n.jpg', 'abc123123', 'eternal@gmail.com', 1291212312, '2021-05-31 09:54:57', '2021-05-31 09:54:57');

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
(61, 12, 14),
(81, 6, 22),
(83, 6, 21),
(84, 6, 15),
(88, 6, 18),
(89, 6, 20),
(90, 6, 17),
(105, 6, 25),
(106, 6, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `islike`
--

CREATE TABLE `islike` (
  `id` int(11) NOT NULL,
  `user_id_store` int(11) NOT NULL,
  `video_id_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `islike`
--

INSERT INTO `islike` (`id`, `user_id_store`, `video_id_store`) VALUES
(98, 12, 15),
(117, 12, 23),
(155, 13, 25),
(160, 13, 29),
(175, 17, 14),
(176, 17, 22),
(177, 17, 30),
(179, 16, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `video_id` varchar(500) CHARACTER SET utf8 NOT NULL,
  `tenvideo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mota` varchar(500) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `user_avatar` varchar(200) NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `video_id`, `tenvideo`, `mota`, `user_id`, `user_name`, `user_avatar`, `like_count`, `dislike_count`, `view_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'Kb8ChL3ABZA', 'ẤU TRÙNG TINH NGHỊCH - ÁC MỘNG CỦA ĐỎ - PHIM HOẠT ', 'Bước kế tiếp là tạo các các cột thuộc tính cho Table, nếu bạn đã từng học qua ngôn ngữ SQL thì bước này sẽ rất đơn giản dễ hiểu với bạn.\r\n', 6, 'taikhoantest1', 'unnamed.jpg', 1, 1, 14, '2021-05-29 10:17:59', '2021-05-29 10:17:59', '0000-00-00 00:00:00'),
(15, 'gEIfjAoqKjE', '【グラブルフェス2020】Day1生中継', '本格スマホRPG『グランブルーファンタジー』の大型イベント「グラブルフェス2020」がついに開催！\r\n今年は初のオンライン開催！メインステージの模様を終日生中継でお届けします！', 6, 'taikhoantest1', 'unnamed.jpg', 1, 1, 13, '2021-05-29 11:13:00', '2021-05-29 11:13:00', '0000-00-00 00:00:00'),
(16, 'rGE7i7e2LpA', '(Ma Sói) Trưởng làng Độ Tày và pha lập luận truy t', '(Ma Sói) Trưởng làng Độ Tày và pha lập luận truy tìm đàn sói ác.\r\n\r\n►Lịch Live:\r\n* 22:15-23:59 hàng ngày trên Youtube.\r\n* 0:01-03:00 hàng ngày trên: https://www.nimo.tv/mixi\r\n(Chủ Nhật chỉ live bên nimo.tv/mixi vào 23:00 )\r\n\r\n-------------------------------------------------------------------------------------------------------------\r\n\r\n► DONATE:\r\n\r\n*  http://unghotoi.com/mixigaming\r\n*  https://streamlabs.com/mixigamingoffi...\r\n*  https://playerduo.com/mixigaming\r\n*  https://qr.wescan.vn/Mixi\r\n\r', 12, '4501104262', 'tải xuống (1).jfif', 0, 0, 21, '2021-05-29 16:54:00', '2021-05-29 11:53:53', '0000-00-00 00:00:00'),
(17, '3_kpLBlgW6Q', 'Nhạc chill 6h chiều ~ Mới Chỉ Nhìn Em Khóc Tôi Bỗn', '♪ Nhạc chill 6h chiều ~ Mới Chỉ Nhìn Em Khóc Tôi Bỗng Chợt Nhận Ra Đã Yêu Em Rồi | Gạt Tàn Lofi\r\n‣ Kênh Nhạc Chill Lofi Hay Nhất Hiện Nay\r\n✪ Follow Gạt Tàn: https://www.fb.com/gattan.fp\r\n? Artwork by ©Kleg\r\n• \r\n------------------------------------------------------------------------------------\r\n? Tracklist: \r\n00:00 Đường tôi chở em về\r\n04:55 Chỉ là muốn nói\r\n09:14 Dù cho mai về sau\r\n13:32 Đã từng như thế\r\n18:02 Vài giây nữa thôi\r\n22:46 Những gì anh nói\r\n28:23 Khi em lớn\r\n32:21 Họ yêu ai mất rồi', 12, '4501104262', 'tải xuống (1).jfif', 0, 1, 11, '2021-05-29 16:56:37', '2021-05-29 11:56:37', '0000-00-00 00:00:00'),
(18, 'AW4GHRxljG0', 'Em Đi Xa Nơi Phương Trời Chỉ Có Mỗi Anh Nơi Này - ', '♪ Em Đi Xa Nơi Phương Trời Chỉ Có Mỗi Anh Nơi Này\r\nNhạc Lofi Chill Hay Nhất ft. Phải Chăng Em Đã Yêu\r\n★ More about Em Ơi\r\n• Facebook: https://www.fb.com/Emoifp\r\n• Photo by Nguyễn Hữu Thưởng: https://www.fb.com/huuthuong1011​\r\n\r\n✪ Follow Freak D\r\n→ https://www.facebook.com/freakdprod\r\n→ https://soundcloud.com/freakdprod\r\n------------------------------------------------------------------------------------\r\n♫ Tracklist: \r\n00:00 Mình anh nơi này - Nit x Sing\r\n04:38 Ngàn yêu thương về đâu - Huy Vạc\r\n', 12, '4501104262', 'tải xuống (1).jfif', 0, 1, 24, '2021-05-29 17:01:22', '2021-05-29 17:01:22', '0000-00-00 00:00:00'),
(19, 'Jrg9KxGNeJY', 'Bury the Light - Vergil\'s battle theme from Devil ', 'Bury the Light is Vergil\'s battle theme from Devil May Cry 5 Special Edition\r\nWritten and performed by the amazing Casey Edwards http://www.youtube.com/user/CaseyEdwa... and the powerful Victor Borba https://www.youtube.com/c/VictorBorba...\r\n\r\nListen to more of the MOTIVATING Devil May Cry 5 OST https://www.youtube.com/watch?v=j-OmI...\r\n\r\nPlz subscribe for more music https://www.youtube.com/c/devilhunter...\r\n\r\nCredits (as found from the DMC Fandom Wiki - plz tell me if wrong!):\r\n\r\nWritten By: Ca', 6, 'taikhoantest1', 'unnamed.jpg', 0, 0, 20, '2021-05-29 22:22:38', '2021-05-29 22:22:38', '0000-00-00 00:00:00'),
(20, 'Ws-QlpSltr8', 'Đen - Trốn Tìm ft. MTV band (M/V)', 'Trốn Tìm (Hide and Seek)\r\nDownload/Stream: https://Denvau.lnk.to/TronTim\r\nPerformed by MTV band and Đen\r\nDirector: Ong DONG & Ba HUONG\r\nWritten by DENVAU\r\nMusic Produced by LỒNG ĐÈN\r\nArranger: TRAN HAU\r\nInstrumentals : TRAN HAU (Drumset, Percussion, Piano, Melodica), DANH TU (Guitar Acoustic, Guitar Bass)\r\nRecord/Mix/Master: TRAN HAU (24BeatsProduction)\r\nSupport: BIEN, CHENG, JACK TRAN\r\n\r\nMedia Manager: NHAT DUY \r\nEnglish Sub: HANA’S LEXIS\r\nPhotographer: NGUYEN TUAN KHANH\r\nBTS Camera: PHAM KY TH', 6, 'taikhoantest1', 'unnamed.jpg', 0, 1, 26, '2021-05-29 22:25:59', '2021-05-29 22:25:59', '0000-00-00 00:00:00'),
(21, 'FKnDvu_eODY', 'Upload com NodeJS+Express - Hands-on: Multer', 'Neste vídeo, mostro como podemos fazer upload no NodeJS com Express utilizando o Multer.\r\n\r\nCadastre-se para receber as novidades: https://www.devpleno.com/\r\nCurta o DevPleno no Facebook: https://www.facebook.com/devpleno/ ---\r\nConheça nossos cursos premium:\r\n\r\ndevRactJS - Crie aplicações web e mobile profissionais com ReactJS sem programar nada no servidor em apenas 45 dias: https://www.devpleno.com/devreactjs\r\n\r\nFullstack Master -\r\n Torne-se um desenvolvedor fullstack em apenas 3 meses (indepe', 6, 'taikhoantest1', 'unnamed.jpg', 0, 1, 8, '2021-05-29 22:27:30', '2021-05-29 22:27:30', '0000-00-00 00:00:00'),
(22, 'DWcJFNfaw9c', 'lofi hip hop radio - beats to sleep/chill to', 'Welcome to the sleepy lofi hip hop radio!\r\nThis playlist contains the smoothest lofi hip hop beats, perfect to help you chill or fall asleep ?\r\n\r\n? | Listen on Spotify, Apple music and more\r\n→   https://bit.ly/lofigirI-playlists​\r\n\r\n? | Join the Lofi Girl community \r\n→   https://bit.ly/lofigirl-discord\r\n→   https://bit.ly/lofigirl-reddit\r\n\r\n? | Lofi Girl on all social media\r\n→   https://bit.ly/lofigirl-sociaI​\r\n\r\n? | Lofi Girl merch\r\n→   https://bit.ly/lofigirl-merch​\r\n\r\n?  | Illustration by Bas', 6, 'taikhoantest1', 'unnamed.jpg', 1, 1, 50, '2021-05-29 22:30:28', '2021-05-29 22:30:28', '0000-00-00 00:00:00'),
(23, 'cAaTrZto3fE', '[VI/EN/中日字幕] Tuyết Ngữ 雪語リ(雪の言葉) - TOMO - 陰陽師蟬冰雪女主', '#onmyoji #yukionna #spyukionna\r\nNhạc chủ đề thức thần SP Thiền Băng Tuyết Nữ - Onmyoji RPG\r\nInstrumental version at: https://youtu.be/GHiEAvxHYM0\r\nTrình bày: TOMO\r\nVideo edit: NL\r\n\r\n作曲/composed: Afra Cheng \r\n作词/Lyrics: Afra Cheng\r\n\r\n配唱制作人 : 大河内 航太\r\n吉他 : 黄冠龙 Alex.D\r\n和声 : TOMO/李雅微\r\n和声编写 : 李雅微/黄冠龙 Alex.D\r\n黑管 : 高杰 Jim Geddes\r\n长笛 : 高杰 Jim Geddes\r\n弦乐 : 李琪弦乐团\r\n弦乐编写 : 黄冠龙 Alex.D\r\n录音室 : 新奇鹿Saturdaystudio\r\n配唱录音师 : 川岛 尚己\r\n配唱录音室 : Studio A-tone Valley\r\n录音师 : 谢丰泽 Fengtse Heist\r\n混音 : 林正忠\r\n混音室 : 录堡工作室 robot st', 13, 'bayquaconsuoi', 'unnamed (1).jpg', 1, 0, 89, '2021-05-30 12:10:39', '2021-05-30 12:10:39', '0000-00-00 00:00:00'),
(24, 'b59Pdt5LJG8', 'MongoDB in NodeJS - Nested Documents (2020) [Episo', 'In this video we go over how you can insert and read nested objects inside of a MongoDB document using Node JS.\r\n\r\n? ? Want more in depth tutorials? Check out our premium courses here:\r\nhttps://wornoffkeys.com/#courses\r\n\r\n? Need programming help? Join our Discord community:\r\nhttps://wornoffkeys.com/discord\r\n\r\n? Claim $100 in FREE VPS credit here:\r\nhttps://wornoffkeys.com/vps\r\n\r\n? Did this video help you? Consider becoming a Channel Member and get awesome perks:\r\nhttps://wornoffkeys.com/membershi', 6, 'taikhoantest1', 'unnamed.jpg', 0, 0, 89, '2021-05-30 21:49:07', '2021-05-30 21:49:07', '0000-00-00 00:00:00'),
(25, 'lkgO5jfKrzI', 'Những Bản Nhạc Anime Hay Nhất Của Ghibli Studio | ', 'Những Bản Nhạc Anime Hay Nhất Của Ghibli Studio. Đây là bộ sưu tập những bản nhạc không lời trong các bộ phim anime kinh điển của hãng phim hoạt hình Ghibli diễn tấu bằng piano, hy vọng những bản nhạc không lời này sẽ giúp bạn tập trung vào công việc học tập, hay thư giãn sau những giờ làm việc mệt mỏi.\r\n\r\n0:01 Always with me (Spirited Away) \r\n4:55 Town with an Ocean View (Kiki\'s Delivery Service)\r\n9:37 Princess Mononoke (Princess Mononoke)\r\n11:18 The Wind Forest (My Neighbour Totoro)\r\n16:45 Onc', 13, 'bayquaconsuoi', 'unnamed (1).jpg', 1, 1, 33, '2021-05-31 12:35:32', '2021-05-31 12:35:32', '0000-00-00 00:00:00'),
(29, '9uWd2HoJI1c', '[沒有廣告] 宮崎駿動畫歌曲 - 超級精選, 天空之城, 龍貓, 哈爾移動城堡, 千與千尋, 風之谷', '[沒有廣告] 宮崎駿動畫歌曲 - 超級精選, 天空之城, 龍貓, 哈爾移動城堡, 千與千尋, 風之谷, 貓之報恩\r\n\r\n? Download / Stream :\r\n⏬ Apple Music: https://apple.co/3h4cXI7​\r\n⏬ Facebook: https://bit.ly/3fdy6x4\r\n⏬ Spotify: https://spoti.fi/3upnQrZ​\r\n⏬ Amazon: https://amzn.to/3nQu0yX​\r\n⏬  Deezer: https://bit.ly/2R7LMl9\r\n⏬  KKbox: https://bit.ly/3o4tvl6\r\n \r\nHelp me reach 100k subscribers : https://bit.ly/3onS4JQ\r\n\r\nTag:睡前音乐 bgm作业用宫崎骏 宮崎駿音樂 bgm宮崎駿 BGM冥想 bgm作业用宫崎骏 bgm睡眠 bgm睡覺 宮崎駿千與千尋 睡前音乐 bgm睡覺 bgm放鬆音樂 bgm睡眠 宮崎駿天空之城 宮崎駿龍貓 宮崎駿魔法公主 宮崎駿音樂 宮崎駿鋼琴 宮崎駿音樂盒 ', 13, 'bayquaconsuoi', 'unnamed (1).jpg', 1, 1, 24, '2021-05-31 12:53:37', '2021-05-31 12:53:37', '0000-00-00 00:00:00'),
(30, 'UOMsnO_SIBA', 'Granblue Fantasy Ost. Lyria - 13. Lyria', 'GRANBLUE FANTASY ORIGINAL SOUNDTRACKS Lyria\r\n\r\nPublished by Cymusic / Cygames\r\nComposed by Tsutomu Narita, Nobuo Uematsu\r\nArranged by Tsutomu Narita\r\nPerformed by Yasuo Sasai, CHiCO, STEVIE, Haruka Shimotsuki, Nao Toyama, Takayuki Oshikane, Masahiro Itami, Tsutomu Narita, Koichiro Tashiro, Yuma Ito, Shiro Ito\r\nLyrics by Cygames, Manami Kiyota', 16, 'taikhoantest2', '119227496_1315363328795495_3486268309184032416_n.jpg', 2, 0, 56, '2021-05-31 13:11:21', '2021-05-31 13:11:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watch_later`
--

CREATE TABLE `watch_later` (
  `id` int(11) NOT NULL,
  `user_id_later` int(11) NOT NULL,
  `video_id_later` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `watch_later`
--

INSERT INTO `watch_later` (`id`, `user_id_later`, `video_id_later`) VALUES
(14, 17, 22),
(15, 17, 20),
(16, 17, 30),
(17, 17, 29),
(18, 17, 24),
(19, 17, 14),
(20, 17, 25),
(21, 16, 30),
(26, 6, 17);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `isdislike`
--
ALTER TABLE `isdislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `islike`
--
ALTER TABLE `islike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `watch_later`
--
ALTER TABLE `watch_later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
