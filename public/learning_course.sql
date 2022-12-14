-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2022 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `learning_course`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '0971850845'),
(2, 'leminh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Minh', '0971850845'),
(3, 'hotam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hồ Chí Tâm', '0123456789'),
(4, 'duy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Duy Lê', '0123456789'),
(5, 'anh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ngoc Anh', '0123456789'),
(6, 'congminh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Công Minh', '0987465321'),
(7, 'minhb1809606@student.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'abc', '0987465321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id_admin_roles` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id_admin_roles`, `admin_id`, `roles_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(5, 1, 1),
(6, 2, 2),
(13, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `teacher_id`, `blog_title`, `blog_img`, `blog_date`, `blog_desc`) VALUES
(1, 2, 'Few tips for get better results in examinationaaaaaaaa', 'blog73.jpg', '2022-10-19', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .aaaaaaaaaaaaa'),
(2, 3, 'Few tips for get better results in examination', 'blog10.jpg', '2022-10-23', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus'),
(3, 4, 'Few tips for get better results in examination', 'blog10.jpg', '2022-10-23', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus'),
(4, 5, 'Few tips for get better results in examination', 'blog10.jpg', '2022-10-23', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus'),
(5, 6, 'Few tips for get better results in examination', 'blog10.jpg', '2022-10-23', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `student_name`, `note`, `date`, `teacher_id`) VALUES
(4, 'Minh', 'Các bạn học thử khoá này nha', '2022-10-10', 2),
(5, 'Tâm', 'Khoá này rất hay', '2022-10-10', 2),
(6, 'Minh', 'Khoá học hay', '2022-10-24', 3),
(7, 'Sang', 'Khoá học rất bổ ít', '2022-11-20', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `contact_subject` text NOT NULL,
  `contact_phone` varchar(10) NOT NULL,
  `contact_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `student_name`, `student_email`, `contact_subject`, `contact_phone`, `contact_note`) VALUES
(4, 'Minh', 'minh@gmail.com', 'sdfg', '0971850845', 'sdgg'),
(5, 'Minhcong', 'minh@gmail.com', 'sdfg', '0971850845', 'sdgg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_slug` varchar(255) NOT NULL,
  `course_desc` text DEFAULT NULL,
  `course_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_slug`, `course_desc`, `course_status`) VALUES
(1, 'Toán học', 'toan-hoc', 'Luyện thi Toán THPT', 1),
(2, 'Anh văn', 'anh-van', 'Luyện thi Anh văn', 1),
(4, 'Hoá học', 'hoa-hoc', 'Hoá học thi thpt quốc gia', 1),
(5, 'Sinh học', 'sinh-hoc', 'Sinh học', 1),
(6, 'Vật lí', 'vat-li', 'Vật lí', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`) VALUES
(1, 'Lê Minh', 'leminh@gmail.com', '0971850845', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Le Cong Minh B1809606', 'minhb1809606@student.ctu.edu.vn', '', ''),
(3, 'Minh Lê', 'lecongminh202020@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_course`
--

CREATE TABLE `document_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `lecture_id` int(10) NOT NULL,
  `document_text` text DEFAULT NULL,
  `document_video` text DEFAULT NULL,
  `document_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `document_course`
--

INSERT INTO `document_course` (`id`, `lecture_id`, `document_text`, `document_video`, `document_image`) VALUES
(1, 1, 'Đồ thị của một hàm số là sự biểu diễn trực quan sinh động các giá trị của hàm số trong hệ tọa độ Descartes.\r\nHệ tọa độ Descartes bao gồm các trục (2 ):\r\nTrục (Ox ) nằm ngang, đại diện cho giá trị của biến (x )\r\nTrục (Oy ) thẳng đứng, đại diện cho giá trị của hàm (f (x) )\r\nCác dạng đồ thị của hàm số bậc nhất\r\nHàm bậc nhất là một hàm có dạng:\r\n(y = ax + b )\r\nĐồ thị của hàm số là một đường thẳng tạo một góc với trục hoành ( alpha ) thỏa mãn ( tan alpha = a )', 'OU9cFnE9BrU', 'do-thi-ham-so-0180.jpg'),
(2, 4, 'Bước 1. Tìm tập xác định (nếu đề chưa cho khoảng)\r\nBước 2. Tính y’ = f’(x); tìm các điểm mà đạo hàm bằng không hoặc không xác định.\r\nBước 3. Lập bảng biến thiên\r\nBước 4. Kết luận', 'cSGFquUElAU', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_exam`
--

CREATE TABLE `history_exam` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `correct_number` int(11) NOT NULL,
  `student_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history_exam`
--

INSERT INTO `history_exam` (`id`, `student_id`, `lecture_id`, `correct_number`, `student_answer`) VALUES
(1, 1, 3, 2, '3,2'),
(2, 1, 3, 1, '2,2'),
(3, 2, 1, 0, '4,1'),
(4, 2, 5, 2, '3,2,1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lecture_course`
--

CREATE TABLE `lecture_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `lecture_name` varchar(255) NOT NULL,
  `lecture_desc` text NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lecture_course`
--

INSERT INTO `lecture_course` (`id`, `lecture_name`, `lecture_desc`, `teacher_id`) VALUES
(1, 'Đồ thị của hàm số – Nâng cao', 'Đồ thị của hàm số – Nâng cao', 2),
(3, 'Tiếng anh cơ bản', 'Tiếng anh cơ bản', 3),
(4, 'Giá trị lớn nhất nhỏ nhất – Nâng cao', 'Giá trị lớn nhất nhỏ nhất – Nâng cao', 2),
(5, 'Tiếng anh nâng cao', 'Tiếng anh nâng cao', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `overview_course`
--

CREATE TABLE `overview_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `overview_img` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `requirement` text NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `overview_course`
--

INSERT INTO `overview_course` (`id`, `overview_img`, `summary`, `requirement`, `teacher_id`) VALUES
(2, 'toan-hoc3.png', 'khoá học thi thpt', 'Có kiến thức căn bảnfghk', 2),
(3, 'hoa-hoc53.jpg', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit.', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .', 3),
(5, 'hoa-hoc53.jpg', 'ádzzgsargh', 'dfahadtht', 4),
(6, 'hoa-hoc53.jpg', 'ádzzgsargh', 'dfahadtht', 5),
(7, 'hoa-hoc53.jpg', 'ádzzgsarghđsgs', 'dfahadtht', 6),
(8, 'toan-hoc3.png', 'khoá học thi thpt', 'Có kiến thức căn bảnfghk', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile_teacher`
--

CREATE TABLE `profile_teacher` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_img` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `achievements` text DEFAULT NULL,
  `objectives` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `profile_teacher`
--

INSERT INTO `profile_teacher` (`teacher_id`, `teacher_img`, `about`, `achievements`, `objectives`) VALUES
(2, '381.png', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .', 'Lorem ipsum gravida ndshshhibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .'),
(3, '156.png', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..'),
(4, '156.png', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..'),
(5, '156.png', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..'),
(6, '156.png', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..'),
(7, '156.png', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..', 'Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_course`
--

CREATE TABLE `question_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `lecture_id` int(10) NOT NULL,
  `question_name` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `answer` int(11) NOT NULL,
  `question_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `question_course`
--

INSERT INTO `question_course` (`id`, `lecture_id`, `question_name`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `question_desc`) VALUES
(1, 1, 'Khối đa diện có các mặt là những tam giác thì:', 'Số mặt và số đỉnh của nó bằng nhau', 'Số mặt và số cạnh của nó bằng nhau', 'Số mặt của nó là một số chẵn', 'Số mặt của nó là một số lẻ', 3, 'Cách 1: Ta có thể dùng các phản ví dụ để loại dần các mệnh để sai. Tứ diện (có 4 đỉnh, 4 mặt và 6 cạnh) ta thấy ngay mệnh đề B và D sai.\r\n\r\nTừ hình bát diện đều (có 6 đỉnh, 8 mặt) ta thấy mệnh đề A sai.\r\n\r\nVậy C là mệnh đề đúng.\r\n\r\nCách 2: Ta có thể vận dụng công thức (2) ở trên. Thay p = 3 ta có: 3m = 2c.\r\n\r\nVậy m phải là số chẵn.\r\n\r\nDo đó C là mệnh đề đúng.'),
(2, 3, 'He\'s very short: ________ sisters are taller.', 'both of them', 'his both', 'both his', 'the two both his', 3, 'none'),
(5, 4, 'Trong các mệnh đề sau, mệnh đề nào đúng?', 'Mỗi hình đa diện có ít nhất 8 mặt', 'Mỗi hình đa diện có ít nhất 6 mặt', 'Mỗi hình đa diện có ít nhất 4 mặt', 'Mỗi hình đa diện có ít nhất 5 mặt', 3, 'Khẳng định D đúng: mỗi hình đa diện có ít nhất 4 mặt'),
(6, 1, 'Cho hình đa diện (H) có các mặt là nhứng tam giác, mỗi đỉnh là đỉnh chung của đúng 3 mặt. Gọi số các đỉnh, cạnh, mặt của hình đa diện (H) lần lượt là d, c, m. Khi đó:', 'd > m', 'd < m', 'd = m', 'd + m = c', 2, 'd < m'),
(7, 3, 'When ________ dinner.', 'have you', 'do you have', 'you have', 'you are having', 2, 'none'),
(9, 5, 'Can we begin the test? - We can\'t unless the teacher ________ so.', 'will say', 'is saying', 'shall say', 'says', 4, 'none'),
(10, 5, 'I bought her a new pencil sharpener ________.', 'it is very expensive', 'which was very expensive', 'hose colour was black', 'it will be vey expensive', 2, 'none'),
(11, 5, 'We wondered who was going to pay for the ________ window.', 'broken', 'breaking', 'broke', 'break', 1, 'none');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `roles_name`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social`
--

CREATE TABLE `social` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `social`
--

INSERT INTO `social` (`user_id`, `provider_user_id`, `provider`, `user`) VALUES
(1, '109133343783935698881', 'GOOGLE', '2'),
(2, '107339502278964883623', 'GOOGLE', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_contact`
--

CREATE TABLE `teacher_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_subject` text NOT NULL,
  `teacher_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teacher_contact`
--

INSERT INTO `teacher_contact` (`id`, `teacher_name`, `teacher_email`, `teacher_subject`, `teacher_desc`) VALUES
(1, 'Minh', 'minh@gmail.com', 'Mở thêm title', 'Mở thêm title');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_course`
--

CREATE TABLE `teacher_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teacher_course`
--

INSERT INTO `teacher_course` (`id`, `teacher_id`, `course_id`) VALUES
(11, 2, 'Toán học'),
(12, 3, 'Anh văn'),
(13, 4, 'Hoá học'),
(14, 5, 'Vật lí'),
(15, 6, 'Sinh học'),
(17, 7, 'Toán học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id_admin_roles`),
  ADD KEY `admin_admin_id` (`admin_id`),
  ADD KEY `roles_id_roles` (`roles_id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `document_course`
--
ALTER TABLE `document_course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `history_exam`
--
ALTER TABLE `history_exam`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lecture_course`
--
ALTER TABLE `lecture_course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `overview_course`
--
ALTER TABLE `overview_course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `profile_teacher`
--
ALTER TABLE `profile_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Chỉ mục cho bảng `question_course`
--
ALTER TABLE `question_course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `teacher_contact`
--
ALTER TABLE `teacher_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id_admin_roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `document_course`
--
ALTER TABLE `document_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_exam`
--
ALTER TABLE `history_exam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lecture_course`
--
ALTER TABLE `lecture_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `overview_course`
--
ALTER TABLE `overview_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question_course`
--
ALTER TABLE `question_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `social`
--
ALTER TABLE `social`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `teacher_contact`
--
ALTER TABLE `teacher_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `teacher_course`
--
ALTER TABLE `teacher_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
