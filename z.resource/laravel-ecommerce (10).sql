-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 02:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$JFy/iXWsvH2/pZNFboqfAOsKkE9jBFZnTMKQ1/SRvXYmUKqepCkcO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `description`, `image`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(24, 28, 'The Ultimate Guide to Choosing the Perfect Laptop', 'Dive into the world of laptops with our comprehensive guide. Discover the latest trends, specifications, and tips to help you find the perfect laptop that aligns with your needs and preferences.', '658195b472058.jpg', 1, 1, '2023-12-17 18:12:48', '2023-12-19 07:08:04'),
(25, 31, 'Elevate Your Workspace: Must-Have Computer Accessories for Productivity', 'Explore the essential computer accessories that can transform your workspace into a hub of efficiency. From ergonomic peripherals to cutting-edge gadgets, we\'ve curated a list to enhance your productivity.', '658195923dfb6.jpg', 1, 1, '2023-12-17 18:15:43', '2023-12-19 07:07:30'),
(26, 31, 'Tech Trends 2023: What\'s Hot in the World of Gadgets', 'Stay ahead of the curve with our insights into the latest tech trends. Uncover the gadgets and innovations that are set to redefine the digital landscape in 2023.', '6581958800daf.jpg', 1, 1, '2023-12-17 18:16:31', '2023-12-19 07:07:20'),
(27, 30, 'The Art of Multitasking: Top Phones for Productivity and Entertainment', 'Discover the smartphones that seamlessly balance productivity and entertainment. Explore features, camera capabilities, and performance to find the ideal device that suits your dynamic lifestyle.', '6581957c5e644.jpg', 1, 1, '2023-12-17 18:17:31', '2023-12-19 07:07:08'),
(28, 29, 'Gaming Galore: Unveiling the Best Laptops and Accessories for Gamers', 'Calling all gamers! Explore our roundup of the best gaming laptops and accessories that promise an immersive gaming experience. From powerful GPUs to ergonomic peripherals, level up your gaming setup.', '65819558bfaeb.jpg', 1, 1, '2023-12-17 18:18:58', '2023-12-19 07:06:32'),
(29, 32, 'Tech and Wellness: Balancing Screen Time for a Healthy Lifestyle', 'In a digital age, finding balance is crucial. Discover tips and tech recommendations that promote a healthy lifestyle, focusing on digital wellness and minimizing the impact of prolonged screen time.', '6581954ece184.jpg', 1, 1, '2023-12-17 18:19:59', '2023-12-19 07:06:22'),
(30, 28, 'Unlocking Creativity: How the Right Tech Can Inspire Innovation', 'Delve into the intersection of technology and creativity. Learn how the right gadgets, from powerful laptops to innovative accessories, can unleash your creative potential and elevate your projects.', '658195404f9f1.jpg', 1, 1, '2023-12-17 18:24:14', '2023-12-19 07:06:08'),
(31, 30, 'Behind the Screens: Exploring the Latest in Display Technology', 'Take a deep dive into the world of displays. From high refresh rates to cutting-edge resolutions, learn about the latest advancements in display technology and how they enhance your viewing experience.', '6581951d35128.jpg', 1, 1, '2023-12-17 18:26:19', '2023-12-19 07:05:33'),
(32, 29, 'Tech for Travel: Must-Have Gadgets for the Modern Nomad', 'Whether you\'re a digital nomad or an occasional traveler, explore our guide to essential tech gear that makes your journeys smoother. From portable chargers to compact laptops, we\'ve got you covered.', '658195126eec4.jpg', 1, 1, '2023-12-17 18:30:19', '2023-12-19 07:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(123, 1, 111, 4, '2024-02-01 02:38:12', '2024-02-01 07:12:13'),
(124, 1, 112, 3, '2024-02-01 02:38:14', '2024-02-01 07:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT 'default.jpg',
  `status` int(11) NOT NULL DEFAULT 1,
  `is_featured` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`, `is_featured`, `created_at`, `updated_at`) VALUES
(28, 'Laptop', '657e91d926065.webp', 1, 1, '2023-12-17 00:14:49', '2023-12-17 00:14:49'),
(29, 'Desktop', '657e91f539722.webp', 1, 1, '2023-12-17 00:15:17', '2023-12-17 00:15:17'),
(30, 'Phone', '657e92c227207.webp', 1, 1, '2023-12-17 00:18:42', '2023-12-17 00:18:42'),
(31, 'Gadget', '657e92d9db407.webp', 1, 1, '2023-12-17 00:19:05', '2023-12-17 00:19:05'),
(32, 'Monitor', '657e930d338d9.webp', 1, 1, '2023-12-17 00:19:57', '2023-12-17 00:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL COMMENT '1 = percentage, 2 = fixed',
  `discount_value` decimal(8,2) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_type`, `discount_value`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BlackFriday', 'percentage', '50.00', '2023-12-22 00:00:00', 1, '2023-12-09 00:21:45', '2023-12-09 00:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adderess` varchar(255) DEFAULT NULL,
  `main_email` varchar(255) DEFAULT NULL,
  `alternative_email` varchar(255) DEFAULT NULL,
  `main_phone` varchar(255) DEFAULT NULL,
  `alternative_phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `tweeter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `short_details` varchar(255) DEFAULT NULL,
  `about_details` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `adderess`, `main_email`, `alternative_email`, `main_phone`, `alternative_phone`, `facebook`, `tweeter`, `linkedIn`, `google_plus`, `short_details`, `about_details`, `google_map`, `created_at`, `updated_at`) VALUES
(1, 'House: 60, Road: 20, Sector: 11, Uttara, Dhaka-1230', 'support@stech.com', 'info@stech.com', '01711009988', '01811009988', 'https://www.facebook.com', 'https://www.tweeter.com', 'https://www.linkedin.com', 'https://www.googleplus.com', 'S-TECH is a leading e-commerce hub specializing in cutting-edge technology products. From sleek laptops to high-performance computers, vibrant monitors, latest smartphones, and a myriad of accessories.', 'In the heart of a bustling city, Nick\'s laptop, a faithful companion of many endeavors, was showing signs of wear. Seeking a technological upgrade, he discovered S-TECH, a gateway to innovation. Navigating through the curated selection of laptops, Nick found himself immersed in a world where possibilities unfolded at every click. From ultrathin designs to powerhouse performance, each option teased the prospect of a seamless user experience and enhanced productivity. As he ventured into the realm of computer accessories, a symphony of efficiency echoed through mechanical keyboards, ergonomic mice beckoned precision, and futuristic chargers promised to match his dynamic lifestyle. Each accessory became a testament to S-TECH\'s commitment to elevating the overall user experience. The phone section revealed a convergence of sleek design and groundbreaking features. From cameras that captured breathtaking moments to multitasking juggernauts, smartphones were not just devices but gateways to a connected world. With a swift and secure checkout, Nick sealed his tech odyssey. The confirmation email echoed the assurance that his chosen companions for the digital frontier were en route. Anticipation peaked as he unboxed his treasures, each device a catalyst for a new chapter. Empowered by S-TECH, Nick embraced a future where innovation met ambition. The journey had been more than a shopping spree; it was a narrative of empowerment, where technology seamlessly integrated into one\'s life and elevated not just tasks but entire experiences. Armed with his new tech companions, Nick ventured forth into a digital realm, ready to script a story of innovation and success. Each click, keystroke, and interaction became a step toward a brighter, more connected tomorrow, all made possible by S-TECH.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58402.24773593999!2d90.3453363!3d23.813603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c6feb6c1b7b1%3A0x76350c55ebc50c34!2sRadisson%20Blu%20Dhaka%20Water%20Garden!5e0!3m2!1sen!2sbd!4v1702979060781!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2023-12-18 11:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'How can I track my order?', 'Once your order is shipped, you will receive a confirmation email with a tracking number. Use this number to track your order in real-time on our website or through the designated courier service.', 0, '2023-12-03 04:59:53', '2023-12-17 10:10:55'),
(3, 'What payment methods do you accept?', 'We accept a variety of payment methods, including credit/debit cards, PayPal, and other secure payment gateways. Choose the option that suits you best at checkout.', 1, '2023-12-03 05:00:05', '2023-12-17 08:16:27'),
(4, 'How can I place an order?', 'Simply browse our website, add the desired items to your cart, and proceed to checkout. Follow the easy steps to complete your purchase securely.', 1, '2023-12-03 05:00:17', '2023-12-17 08:15:18'),
(5, 'Do you offer warranty on products?', 'Yes, many of our products come with a manufacturer\'s warranty. Details about warranty coverage can be found on the product pages. For any warranty-related inquiries, feel free to contact our customer service.', 0, '2023-12-17 08:18:55', '2023-12-17 10:11:08'),
(6, 'How do I contact customer support?', 'You can reach our dedicated customer support team through the \"Contact Us\" page on our website. We\'re here to assist you with any questions or concerns you may have.', 0, '2023-12-17 08:19:18', '2023-12-17 10:10:41'),
(7, 'Can I change or cancel my order after placing it?', 'We process orders quickly to ensure prompt delivery. If you need to make changes or cancel your order, please contact our customer support as soon as possible. Changes may not be possible once the order is shipped.', 1, '2023-12-17 08:19:52', '2023-12-17 08:19:52'),
(8, 'Are the products on your website genuine?', 'Yes, we guarantee the authenticity of all the products on our website. We source our inventory from reputable suppliers and authorized distributors to ensure the highest quality for our customers.', 1, '2023-12-17 08:20:18', '2023-12-17 08:20:18'),
(9, 'What is your return policy?', 'We have a hassle-free return policy. If you\'re not satisfied with your purchase, you can initiate a return within [X] days of receiving your order. Please refer to our Returns & Exchanges page for more details.', 0, '2023-12-17 08:20:50', '2023-12-17 10:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Amethyst Harrison', 'nypyrymu@mailinator.com', 'Autem qui quisquam s', 'Magna pariatur Et r', '2023-12-19 07:50:08', '2023-12-19 07:50:08'),
(5, 'Hannah Jackson', 'xafemalaly@mailinator.com', 'Odit fugiat ut et re', 'Voluptatum reprehend', '2023-12-19 07:50:14', '2023-12-19 07:50:14'),
(6, 'Rama Frost', 'tytufyrofa@mailinator.com', 'Quae aliqua Enim ne', 'Cumque voluptatum es', '2023-12-19 07:50:18', '2023-12-19 07:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_26_065523_create_admins_table', 1),
(6, '2023_11_01_055954_create_categories_table', 2),
(7, '2023_11_01_082412_create_sub_categories_table', 3),
(8, '2023_11_14_041443_create_products_table', 3),
(9, '2023_11_20_173322_create_product_images_table', 4),
(10, '2023_11_23_121722_create_sliders_table', 5),
(11, '2023_11_23_141853_add_status_to_sliders', 6),
(12, '2023_11_26_182500_create_blogs_table', 7),
(13, '2023_11_27_093302_create_blogs_table', 8),
(14, '2023_11_28_105950_create_comments_table', 9),
(15, '2023_11_30_183239_create_reviews_table', 10),
(16, '2023_12_02_145839_create_subscribers_table', 11),
(17, '2023_12_02_160037_create_messages_table', 11),
(18, '2023_12_03_084109_create_faqs_table', 12),
(19, '2023_12_03_104552_create_faqs_table', 13),
(20, '2023_12_03_122904_create_table_testimonials', 14),
(21, '2023_12_03_123417_create_testimonials_table', 15),
(22, '2023_12_03_123728_create_testimonials_table', 16),
(23, '2023_12_03_130842_create_testimonials_table', 17),
(24, '2023_12_04_093703_create_carts_table', 18),
(25, '2023_12_06_103335_create_wishlists_table', 19),
(26, '2023_12_08_081152_create_coupons_table', 20),
(27, '2023_12_12_161534_create_orders_table', 21),
(28, '2023_12_13_080632_create_orders_table', 22),
(29, '2023_12_13_090710_create_order_details_table', 23),
(30, '2023_12_17_171809_create_details_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `order_notes` varchar(255) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `country`, `address`, `zip_code`, `city`, `order_notes`, `subtotal`, `coupon_code`, `discount`, `total`, `payment_type`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(14, 1, 'Rhonda', 'Norris', 'ziqudumaq@mailinator.com', '163', 'Est suscipit possimu', 'Velit voluptas asper', '28041', 'Rerum non tempora fa', 'Accusamus dolor sit', 89000, NULL, NULL, 89000, 'cash_on_delivery', 14558, 0, '2023-12-19 00:24:12', '2023-12-19 00:24:12'),
(15, 1, 'Octavius', 'Wiley', 'nyrynoxoze@mailinator.com', '896', 'Voluptatibus dolor v', 'Autem eiusmod expedi', '63375', 'Exercitationem proid', 'Vel culpa corporis', 92250, NULL, NULL, 92250, NULL, 74441, 1, '2023-12-19 00:29:18', '2023-12-19 00:29:18'),
(16, 1, 'Saifullah', 'Shuvo', 'saifullahshuvo30@gmail.com', '897089657456', 'Bangladesh', 'Dhaka - Mymensingh Hwy', '1230', 'Dhaka', 'sdfasfsd', 141000, NULL, NULL, 141000, 'cash_on_delivery', 36698, 2, '2023-12-19 00:33:03', '2023-12-19 00:33:03'),
(17, 1, 'Helen', 'Stephens', 'leca@mailinator.com', '189', 'Sapiente magnam in o', 'Accusamus consequatu', '23907', 'Ullam vel quia fugia', 'Labore iste mollit c', 99000, NULL, NULL, 99000, NULL, 54340, 3, '2023-12-19 00:38:28', '2023-12-19 00:38:28'),
(18, 1, 'Uriel', 'Arnold', 'salejytyc@mailinator.com', '934', 'Id consequat Aliqu', 'Qui Nam repellendus', '97283', 'Culpa non cupiditat', 'Incidunt molestiae', 34500, NULL, NULL, 34500, 'cash_on_delivery', 40940, 4, '2023-12-19 00:40:07', '2023-12-19 00:40:07'),
(19, 1, 'Riley', 'Dawson', 'tipyzahiso@mailinator.com', '414', 'Laborum Distinctio', 'Amet ipsum proiden', '32940', 'Consequatur possimu', 'Dolor nihil est in a', 99000, NULL, NULL, 99000, 'cash_on_delivery', 33293, 1, '2023-12-19 01:03:45', '2023-12-23 02:34:37'),
(20, 4, 'Boris', 'Lindsey', 'tihi@mailinator.com', '778', 'Quidem culpa id quia', 'Delectus dolor quia', '29544', 'Dolore in do omnis n', 'Vel dolorem itaque p', 137300, NULL, NULL, 137300, NULL, 81787, 2, '2023-12-19 06:33:21', '2023-12-23 02:34:42'),
(21, 1, 'Nevada', 'Case', 'cycajyv@mailinator.com', '436', 'Autem molestiae esse', 'Vitae asperiores qui', '15653', 'Neque ducimus saepe', 'Voluptas natus sint', 200000, NULL, NULL, 200000, 'cash_on_delivery', 70981, 3, '2023-12-19 22:57:36', '2023-12-23 02:34:47'),
(22, 1, 'Vanna', 'Warren', 'dadyfapen@mailinator.com', '7298067865', 'Est veniam obcaeca', 'Dolores aliquip dolo', '67037', 'Fuga Sit est sit i', 'Odit qui perferendis', 200000, 'BlackFriday', 100000, 100000, 'cash_on_delivery', 15979, 3, '2023-12-20 02:52:21', '2023-12-20 02:52:21'),
(23, 1, 'Ali', 'Collins', 'tiwiqohu@mailinator.com', '560657646534', 'Est laboriosam culp', 'Qui neque tempor vol', '97190', 'Itaque earum labore', 'Proident sint venia', 336750, 'BlackFriday', 168375, 168375, NULL, 31170, 4, '2023-12-20 03:16:03', '2023-12-20 03:16:03'),
(24, 1, 'Myra', 'Holder', 'vyzalek@mailinator.com', '508', 'Optio nihil ipsa i', 'Nisi elit esse quam', '66426', 'Repudiandae minim qu', 'Consequuntur rem arc', 340000, 'BlackFriday', 170000, 170000, 'cash_on_delivery', 15197, 3, '2023-12-20 05:43:45', '2023-12-20 05:43:45'),
(25, 1, 'Saifullah', 'Shuvo', 'saifullahshuvo30@gmail.com', '021348085432', 'Bangladesh', 'Dhaka - Mymensingh Hwy', '1230', 'Dhaka', 'lajljdlsas', 230000, NULL, NULL, 230000, 'cash_on_delivery', 58079, 0, '2024-02-01 01:08:41', '2024-02-01 01:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `selling_price`, `total_price`, `created_at`, `updated_at`) VALUES
(25, 14, 112, 'LG 32SQ780S-W 32 Inch 4K UHD Smart Monitor', 1, 89000, 89000, '2023-12-19 00:24:12', '2023-12-19 00:24:12'),
(26, 15, 112, 'LG 32SQ780S-W 32 Inch 4K UHD Smart Monitor', 1, 89000, 89000, '2023-12-19 00:29:18', '2023-12-19 00:29:18'),
(27, 15, 110, 'Joyroom JR-T03s Pro Active Noise Cancellation TWS Bluetooth Earbuds', 1, 3250, 3250, '2023-12-19 00:29:18', '2023-12-19 00:29:18'),
(28, 16, 111, 'HP Pro Tower 280 G9 Core i3 12th Gen 4GB RAM Desktop PC', 1, 51000, 51000, '2023-12-19 00:33:03', '2023-12-19 00:33:03'),
(29, 16, 113, 'Google Pixel 7 Pro Android Smartphone (12/128GB)', 1, 90000, 90000, '2023-12-19 00:33:03', '2023-12-19 00:33:03'),
(30, 17, 109, 'OnePlus 11 5G Smartphone (16/256GB)', 1, 99000, 99000, '2023-12-19 00:38:28', '2023-12-19 00:38:28'),
(31, 18, 107, 'ASUS VT229H 21.5\" Full HD 5ms Low Blue Light Flicker Free Touch Monitor', 1, 34500, 34500, '2023-12-19 00:40:07', '2023-12-19 00:40:07'),
(32, 19, 109, 'OnePlus 11 5G Smartphone (16/256GB)', 1, 99000, 99000, '2023-12-19 01:03:45', '2023-12-19 01:03:45'),
(33, 20, 104, 'DJI Mini 3 Drone Fly More Combo with DJI RC Remote Controller', 1, 135000, 135000, '2023-12-19 06:33:21', '2023-12-19 06:33:21'),
(34, 20, 105, 'XTRA Active S8 Bluetooth Calling Smartwatch', 1, 2300, 2300, '2023-12-19 06:33:21', '2023-12-19 06:33:21'),
(35, 21, 102, 'iPhone 15 Pro Max 512GB Blue Titanium (Singapore Unofficial)', 1, 200000, 200000, '2023-12-19 22:57:36', '2023-12-19 22:57:36'),
(36, 22, 102, 'iPhone 15 Pro Max 512GB Blue Titanium (Singapore Unofficial)', 1, 200000, 200000, '2023-12-20 02:52:21', '2023-12-20 02:52:21'),
(37, 23, 107, 'ASUS VT229H 21.5\" Full HD 5ms Low Blue Light Flicker Free Touch Monitor', 1, 34500, 34500, '2023-12-20 03:16:03', '2023-12-20 03:16:03'),
(38, 23, 108, 'Apple Studio Display 27\" Standard Glass 5K Retina display Monitor (MK0U3ZP/A)', 1, 200000, 200000, '2023-12-20 03:16:03', '2023-12-20 03:16:03'),
(39, 23, 109, 'OnePlus 11 5G Smartphone (16/256GB)', 1, 99000, 99000, '2023-12-20 03:16:03', '2023-12-20 03:16:03'),
(40, 23, 110, 'Joyroom JR-T03s Pro Active Noise Cancellation TWS Bluetooth Earbuds', 1, 3250, 3250, '2023-12-20 03:16:03', '2023-12-20 03:16:03'),
(41, 24, 112, 'LG 32SQ780S-W 32 Inch 4K UHD Smart Monitor', 1, 89000, 89000, '2023-12-20 05:43:45', '2023-12-20 05:43:45'),
(42, 24, 111, 'HP Pro Tower 280 G9 Core i3 12th Gen 4GB RAM Desktop PC', 1, 51000, 51000, '2023-12-20 05:43:45', '2023-12-20 05:43:45'),
(43, 24, 102, 'iPhone 15 Pro Max 512GB Blue Titanium (Singapore Unofficial)', 1, 200000, 200000, '2023-12-20 05:43:45', '2023-12-20 05:43:45'),
(44, 25, 113, 'Google Pixel 7 Pro Android Smartphone (12/128GB)', 1, 90000, 90000, '2024-02-01 01:08:41', '2024-02-01 01:08:41'),
(45, 25, 112, 'LG 32SQ780S-W 32 Inch 4K UHD Smart Monitor', 1, 89000, 89000, '2024-02-01 01:08:41', '2024-02-01 01:08:41'),
(46, 25, 111, 'HP Pro Tower 280 G9 Core i3 12th Gen 4GB RAM Desktop PC', 1, 51000, 51000, '2024-02-01 01:08:41', '2024-02-01 01:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thambnail` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `purchase_price` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `stock_quantity` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `popular_product` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `thambnail`, `images`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `tags`, `unit`, `hot_deal`, `featured`, `popular_product`, `status`, `created_at`, `updated_at`) VALUES
(94, 28, 'Lenovo IdeaPad 3 15ALC6 AMD Ryzen 7 5700U 15.6\" FHD Laptop', 'L0001', 'Key Features\r\n\r\n    MPN: 82KU026VLK\r\n    Model: IdeaPad 3 15ALC6\r\n    Processor: AMD Ryzen 7 5700U (1.8GHz up to 4.3GHz)\r\n    RAM: 16GB LPDDR4x Storage: 512GB SSD\r\n    Display: 15.6\" FHD (1920x1080) IPS\r\n    Features: Backlit Keyboard, Type-C', '657e960f3c9e0.webp', NULL, '75000', '80000', '78000', '10', '#laptop', 'pc', 1, 1, 1, 1, '2023-12-17 00:32:47', '2023-12-17 00:32:47'),
(95, 28, 'Acer Aspire 7 A715-42G-R2NE Ryzen 5 5500U GTX 1650 4GB Graphics 15.6\" FHD Gaming Laptop', 'L0002', 'Key Features\r\n\r\n    MPN: NH.QAYSI.004\r\n    Model: Aspire 7 A715-42G-R2NE\r\n    Processor: AMD Ryzen 5 5500U (8M Cache, 2.1GHz up to 4.0GHz)\r\n    RAM: 8GB DDR4, Storage: 512GB SSD\r\n    Graphics: GeForce GTX 1650 4GB\r\n    Features: Backlit Keyboard, Type-C', '657e96c451afe.webp', NULL, '76000', '81000', '79000', '10', '#laptop', 'pc', 1, 1, 0, 1, '2023-12-17 00:35:48', '2023-12-17 00:35:48'),
(96, 28, 'Samsung Galaxy Book Core i5 11th Gen 15.6\" FHD Laptop', 'L0003', 'Key Features\r\n\r\n    MPN: NP750XDA-KD1US\r\n    Model: Galaxy Book\r\n    Processor: Intel Core i5-1135G7 (8M Cache, 2.40 GHz up to 4.20 GHz)\r\n    RAM: 8GB LPDDR4x, Storage: 256GB SSD\r\n    Display: 15.6\" FHD (1920 x 1080) LED\r\n    Features: Fingerprint, Type-C', '657e98fce7de4.webp', NULL, '81000', '86000', '84000', '10', '#laptop', 'pc', 1, 1, 0, 1, '2023-12-17 00:45:17', '2023-12-17 00:46:22'),
(97, 28, 'Asus VivoBook 14 X415EA Core i3 11th Gen 14\" FHD Laptop', 'L0004', 'Key Features\r\n    MPN: EK615W-X415EA\r\n    Model: VivoBook 14 X415EA\r\n    Processor: Intel Core i3-1115G4 (6MB Cache, 3.0 GHz up to 4.10 GHz)\r\n    RAM: 4GB DDR4, Storage: 256GB PCIEG3 SSD\r\n    Display: 14.0\" FHD (1920X1080)\r\n    Features: Chiclet Keyboard', '657e9affce1ca.webp', NULL, '51000', '56000', '54000', '10', '#laptop', 'pc', 1, 1, 0, 1, '2023-12-17 00:53:51', '2023-12-17 00:53:51'),
(98, 28, 'Apple MacBook Pro 13.3-Inch Retina Display M2 Chip 8GB RAM 256GB SSD Space Gray (MNEH3)', 'L0005', 'Key Features\r\n\r\n    MPN: MNEH3\r\n    Model: MacBook Pro 13.3-Inch\r\n    Processor: Apple M2 chip, 8-core CPU with 4 performance & 4 efficiency cores\r\n    RAM: 8GB, Storage: 256GB SSD\r\n    Display: 13.3-inch (diagonal) LED-backlit display with IPS technology\r\n    Features: Retina display, Magic Keyboard', '657ea0390fe96.jpg', NULL, '150000', '160000', '155000', '10', '#laptop', 'pc', 1, 1, 0, 1, '2023-12-17 01:16:09', '2023-12-17 01:16:09'),
(99, 29, 'Walton Kaiman Ex G WDPC710023 Intel Core i3-7100 Desktop PC', 'D0001', 'Key Features\r\nModel: Kaiman Ex G WDPC710023\r\nIntel Core i3-7100 Processor (3M Cache, 3.90 GHz, 2 Cores, 4 Threads)\r\n8GB DDR4-2400MHz RAM\r\n1TB 7200RPM HDD,\r\n256GB M.2 NVMe SSD', '657ebead13651.jpg', NULL, '40000', '43550', '42000', '10', '#desktop', 'pc', 1, 1, 0, 1, '2023-12-17 03:26:05', '2023-12-17 03:26:05'),
(100, 29, 'AMD Ryzen 9 7950X Gaming Desktop PC', 'D0002', 'Key Features\r\nModel: Ryzen 9 7950X Gaming Desktop PC\r\nAMD Ryzen 9 7950X Processor\r\nGIGABYTE B650M AORUS ELITE AX DDR5 AMD AM5 Micro-ATX Motherboard\r\nKingston FURY Beast 16GB 6000MHz RAM + Samsung PM9A1 2TB SSD\r\nColorful iGame GeForce RTX 4080 16GB Vulcan OC-V GDDR6X Graphics Card', '657ebfa808750.webp', NULL, '165000', '175000', '170000', '10', '#desktop', 'pc', 1, 1, 1, 1, '2023-12-17 03:30:16', '2024-02-01 05:15:25'),
(101, 29, 'Intel 13th Gen Core i5-13600K Gaming Desktop PC', 'D0003', 'Key Features\r\nModel: 13th Gen Gaming Desktop PC\r\nIntel 13th Gen Core i5-13600K Raptor Lake Processor\r\nGIGABYTE B760M AORUS ELITE AX DDR5 mATX Motherboard\r\nKingston FURY Beast 16GB 5600MHz DDR5 RAM + Acer FA100 512GB M.2 SSD\r\nColorful GeForce RTX 3060 NB DUO 8GB-V 8GB GDDR6 Graphics Card', '657ec0b1b9c11.webp', NULL, '115000', '125000', '123000', '10', '#desktop', 'pc', 1, 1, 0, 1, '2023-12-17 03:34:41', '2023-12-17 03:34:41'),
(102, 30, 'iPhone 15 Pro Max 512GB Blue Titanium (Singapore Unofficial)', 'P0001', 'Key Features\r\nModel: iPhone 15 Pro Max\r\nDisplay: 6.7\" Super Retina XDR Always-On display\r\nProcessor: A17 Pro chip, Storage: 512GB\r\nCamera: 48MP + 12MP + 12MP Rear, 12MP Front\r\nFeatures: Dynamic Island, Face ID, eSIM Support, USB Type-C 3.0, DisplayPort', '657ecab9dacd7.webp', NULL, '180000', '200000', '195000', '10', '#phone', 'pc', 1, 1, 0, 1, '2023-12-17 04:17:30', '2023-12-17 04:17:30'),
(103, 30, 'Samsung Galaxy Z Fold4 Smartphone (12/256GB)', 'P0002', 'Key Features\r\nModel: Galaxy Z Fold4\r\nDisplay: 7.6\" FHD+ AMOLED Main Screen, 6.2\" Dynamic AMOLED Cover Screen\r\nProcessor: Qualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)\r\nCamera: Triple 50+10+12 MP Rear, 4MP Under Display, 10MP Cover\r\nFeatures: Horizontal Foldable, IPX8, Side-mounted Fingerprint', '657ecc453ec73.webp', NULL, '230000', '245000', '240000', '10', '#phone', 'pc', 1, 1, 0, 1, '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(104, 31, 'DJI Mini 3 Drone Fly More Combo with DJI RC Remote Controller', 'G0001', 'Key Features\r\nModel: Mini 3 Fly More Combo\r\nUp 4K30 Video & 12MP Stills\r\nUp to 38 Minutes of Flight Time\r\nUp to 36 mph Flight Speed\r\nIncludes DJI RC Remote & Fly More Combo', '657ecd7d4a562.webp', NULL, '125000', '135000', '132000', '10', '#gadget', 'pc', 1, 1, 1, 1, '2023-12-17 04:29:17', '2023-12-17 04:29:17'),
(105, 31, 'XTRA Active S8 Bluetooth Calling Smartwatch', 'G0002', 'Key Features\r\nModel: Active S8\r\n2.01\" IPS Large Display, 240x282 Resolution\r\nLi-polymer 210mAh (Up to 6 Days)\r\nWaterproof: IP67\r\nBluetooth Calling, HD Original Sound, Multi Sports Mode', '657ece4a97f9e.webp', NULL, '1800', '2300', '2100', '10', '#gadget', 'pc', 1, 1, 0, 1, '2023-12-17 04:32:42', '2023-12-17 04:32:42'),
(106, 32, 'Dell S2722DGM 27 inch 165Hz QHD Curved Gaming Monitor', 'M0001', 'Key Features\r\nModel: S2722DGM\r\nResolution: QHD (2560x1440)\r\nDisplay: IPS, 165Hz, 1ms GTG MPRT\r\nPorts: 2x HDMI, 1x DP, Headphone Out\r\nFeatures: Free Sync, Flicker Free, low blue light', '657ed026451df.webp', NULL, '55000', '65000', '62000', '10', '#monitor', 'pc', 1, 1, 0, 1, '2023-12-17 04:40:38', '2023-12-17 04:40:38'),
(107, 32, 'ASUS VT229H 21.5\" Full HD 5ms Low Blue Light Flicker Free Touch Monitor', 'M0002', 'Key Features\r\nModel: ASUS VT229H\r\nResolution: FHD (1920 x 1080)\r\nDisplay: IPS, 60Hz, 5ms(GTG)\r\nPorts: HDMI, VGA, Earphone Jack\r\nFeatures: Flicker Free, Low Blue Light', '657ed0df5ceb2.jpg', NULL, '28000', '34500', '32000', '10', '#monitor', 'pc', 1, 1, 0, 1, '2023-12-17 04:43:43', '2023-12-17 04:43:43'),
(108, 32, 'Apple Studio Display 27\" Standard Glass 5K Retina display Monitor (MK0U3ZP/A)', 'M0003', 'Key Features\r\nMPN: MK0U3ZP/A\r\nModel: Apple Studio Display\r\nResolution: (5120 x 2880) 5K Retina display\r\nDisplay: IPS, 60Hz\r\nPorts: 1 x Thunderbolt, 3x Type-C\r\nFeatures: Standard Glass, Tilt-Adjustable Stand,12MP camera, Six-speaker', '657ed2078f920.jpg', NULL, '180000', '200000', '195000', '10', '#monitor', 'pc', 1, 1, 0, 1, '2023-12-17 04:48:39', '2023-12-17 06:56:42'),
(109, 30, 'OnePlus 11 5G Smartphone (16/256GB)', 'P0003', 'Key Features:\r\nModel: 11 5G\r\nDisplay: 6.7\" QHD+ 120Hz Super Fluid AMOLED Display\r\nProcessor: Qualcomm SM8550-AB Snapdragon 8 Gen 2 (4 nm)\r\nCamera: Triple 64+48+32 MP on Rear, 16MP Front\r\nFeatures: In-display Fingerprint, 100W SUPERVOOC', '657ee49b5340d.webp', NULL, '85000', '99000', '95000', '10', '#phone', 'pc', 1, 1, 0, 1, '2023-12-17 06:07:55', '2023-12-17 06:56:24'),
(110, 31, 'Joyroom JR-T03s Pro Active Noise Cancellation TWS Bluetooth Earbuds', 'G0003', 'Key Features:\r\nModel: JR-T03s Pro\r\nBeamforming noise reduction function and cVc 8.0 technology\r\nAdvanced Active Noise Cancelling\r\nHi-Fi Audio sound and Deep Bass\r\n13mm Moving Coil', '657ee57b30bfa.jpg', NULL, '2500', '3250', '3100', '10', '#gadget', 'pc', 1, 1, 0, 1, '2023-12-17 06:11:39', '2023-12-17 06:56:13'),
(111, 29, 'HP Pro Tower 280 G9 Core i3 12th Gen 4GB RAM Desktop PC', 'D0004', 'Key Features:\r\nMPN: 6Q2P8PA\r\nModel: 280 Pro G9\r\nProcessor: Intel Core i3-12100 (12M Cache, 3.30 GHz to 4.30 GHz)\r\nMemory: 4GB DDR4 RAM\r\nStorage: 1TB 7200 rpm SATA HDD\r\nHP USB Keyboard & Mouse', '657ee6920e0ea.webp', NULL, '41000', '51000', '48000', '10', '#desktop', 'pc', 1, 1, 0, 1, '2023-12-17 06:16:18', '2023-12-17 06:55:58'),
(112, 32, 'LG 32SQ780S-W 32 Inch 4K UHD Smart Monitor', 'M0004', 'Key Features:\r\nModel: 32SQ780S-W\r\nResolution: 4K UHD (3840 x 2160)\r\nDisplay: VA, 65Hz, 5ms (GtG at Faster)\r\nPorts: 1 x Type-C, 2 x HDMI, 3 x USB, LAN port\r\nFeatures: webOS, Ergo Stand, Bluetooth, Speaker', '657ee77b9fcb9.webp', NULL, '75000', '89000', '85000', '10', '#monitor', 'pc', 1, 1, 1, 1, '2023-12-17 06:20:11', '2023-12-17 06:20:11'),
(113, 30, 'Google Pixel 7 Pro Android Smartphone (12/128GB)', 'P0004', 'Key Features:\r\nModel: Pixel 7 Pro\r\nDisplay: 6.7-inch QHD+ OLED display, up to 120 Hz\r\nProcessor: Google Tensor G2 Octa-core (5 nm)\r\nCamera: Triple 50 + 48 + 12MP on rear, 10.8MP front\r\nFeatures: IP68, eSIM, Under Display Fingerprint', '657ee91e941df.webp', NULL, '75000', '90000', '85000', '10', '#phone', 'pc', 1, 1, 0, 1, '2023-12-17 06:27:10', '2023-12-17 06:55:44'),
(114, 31, 'Canon EOS 90D 32.5MP DSLR Camera with 18-55MM STM Lens', 'G0004', 'Key Features:\r\nModel: CANON EOS 90D\r\n45 cross type AF points with multi-controller\r\niTR focus tracking\r\nMaximum ISO 25,600\r\n32.5MP APS-C CMOS sensor', '657eea5c9c284.jpg', NULL, '120000', '128000', '125000', '10', '#gadget', 'pc', 1, 1, 0, 1, '2023-12-17 06:32:28', '2023-12-17 06:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(112, 94, '657e960f91865.webp', '2023-12-17 00:32:47', '2023-12-17 00:32:47'),
(113, 94, '657e960fa7cc1.webp', '2023-12-17 00:32:47', '2023-12-17 00:32:47'),
(114, 94, '657e960fbcae1.webp', '2023-12-17 00:32:47', '2023-12-17 00:32:47'),
(115, 95, '657e96c46a25d.webp', '2023-12-17 00:35:48', '2023-12-17 00:35:48'),
(116, 95, '657e96c4846fa.webp', '2023-12-17 00:35:48', '2023-12-17 00:35:48'),
(117, 95, '657e96c49ccf8.webp', '2023-12-17 00:35:48', '2023-12-17 00:35:48'),
(118, 96, '657e98fd0cd4f.webp', '2023-12-17 00:45:17', '2023-12-17 00:45:17'),
(119, 96, '657e98fd2412d.webp', '2023-12-17 00:45:17', '2023-12-17 00:45:17'),
(120, 96, '657e98fd3a5f6.webp', '2023-12-17 00:45:17', '2023-12-17 00:45:17'),
(121, 96, '657e98fd4fad1.webp', '2023-12-17 00:45:17', '2023-12-17 00:45:17'),
(122, 96, '657e98fd66146.webp', '2023-12-17 00:45:17', '2023-12-17 00:45:17'),
(123, 97, '657e9afff1dc8.jpg', '2023-12-17 00:53:52', '2023-12-17 00:53:52'),
(124, 97, '657e9b000e199.jpg', '2023-12-17 00:53:52', '2023-12-17 00:53:52'),
(125, 97, '657e9b001dbb8.webp', '2023-12-17 00:53:52', '2023-12-17 00:53:52'),
(126, 97, '657e9b003a5ad.webp', '2023-12-17 00:53:52', '2023-12-17 00:53:52'),
(127, 98, '657ea039210dc.jpg', '2023-12-17 01:16:09', '2023-12-17 01:16:09'),
(128, 102, '657ecaba26e28.webp', '2023-12-17 04:17:30', '2023-12-17 04:17:30'),
(129, 102, '657ecaba405e9.webp', '2023-12-17 04:17:30', '2023-12-17 04:17:30'),
(130, 102, '657ecaba5da99.webp', '2023-12-17 04:17:30', '2023-12-17 04:17:30'),
(131, 103, '657ecc4556ba2.png', '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(132, 103, '657ecc4570708.png', '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(133, 103, '657ecc45912ef.png', '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(134, 103, '657ecc45a9b6d.png', '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(135, 103, '657ecc45d323e.png', '2023-12-17 04:24:05', '2023-12-17 04:24:05'),
(136, 104, '657ecd7d6093b.webp', '2023-12-17 04:29:17', '2023-12-17 04:29:17'),
(137, 104, '657ecd7d772d3.webp', '2023-12-17 04:29:17', '2023-12-17 04:29:17'),
(138, 104, '657ecd7d8b4ad.webp', '2023-12-17 04:29:17', '2023-12-17 04:29:17'),
(139, 104, '657ecd7d9f6e8.webp', '2023-12-17 04:29:17', '2023-12-17 04:29:17'),
(140, 105, '657ece4aaf58f.webp', '2023-12-17 04:32:42', '2023-12-17 04:32:42'),
(141, 105, '657ece4ac51bd.webp', '2023-12-17 04:32:42', '2023-12-17 04:32:42'),
(142, 106, '657ed02669b46.webp', '2023-12-17 04:40:38', '2023-12-17 04:40:38'),
(143, 106, '657ed0268e844.webp', '2023-12-17 04:40:38', '2023-12-17 04:40:38'),
(144, 107, '657ed0df6cd14.jpg', '2023-12-17 04:43:43', '2023-12-17 04:43:43'),
(145, 108, '657ed2079fc98.jpg', '2023-12-17 04:48:39', '2023-12-17 04:48:39'),
(146, 108, '657ed207ae8fe.jpg', '2023-12-17 04:48:39', '2023-12-17 04:48:39'),
(147, 109, '657ee49b6e676.webp', '2023-12-17 06:07:55', '2023-12-17 06:07:55'),
(148, 110, '657ee57b413d9.jpg', '2023-12-17 06:11:39', '2023-12-17 06:11:39'),
(149, 111, '657ee69229ec9.webp', '2023-12-17 06:16:18', '2023-12-17 06:16:18'),
(150, 111, '657ee692419fa.webp', '2023-12-17 06:16:18', '2023-12-17 06:16:18'),
(151, 111, '657ee6925a334.webp', '2023-12-17 06:16:18', '2023-12-17 06:16:18'),
(152, 112, '657ee77bba446.webp', '2023-12-17 06:20:11', '2023-12-17 06:20:11'),
(153, 112, '657ee77bd05e6.webp', '2023-12-17 06:20:11', '2023-12-17 06:20:11'),
(154, 112, '657ee77be6d83.webp', '2023-12-17 06:20:12', '2023-12-17 06:20:12'),
(155, 113, '657ee91eb2fa8.webp', '2023-12-17 06:27:10', '2023-12-17 06:27:10'),
(156, 113, '657ee91ece73b.webp', '2023-12-17 06:27:10', '2023-12-17 06:27:10'),
(157, 114, '657eea5cad124.jpg', '2023-12-17 06:32:28', '2023-12-17 06:32:28'),
(158, 114, '657eea5cbbc87.jpg', '2023-12-17 06:32:28', '2023-12-17 06:32:28'),
(159, 114, '657eea5ccaf42.jpg', '2023-12-17 06:32:28', '2023-12-17 06:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `status`) VALUES
(5, 'Tech Essentials for Every Lifestyle', 'Explore our curated collection of cutting-edge computer accessories, sleek laptops, and powerful phones to enhance your digital experience. Elevate your tech game with top-quality gear designed for every aspect of your modern lifestyle.', '657ed76d5f8ba.jpg', '2023-11-24 02:04:58', '2023-12-17 05:11:41', 1),
(7, 'Unleash the Power of Possibilities', 'Discover a world of possibilities with our premium range of computer accessories, stylish laptops, and innovative phones. From productivity to entertainment, we\'ve got the tools to help you achieve more.', '65605951d9ff4.jpg', '2023-11-24 02:05:38', '2023-12-17 01:47:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `ip_address`, `created_at`, `updated_at`) VALUES
(3, 'tugybole@mailinator.com', '127.0.0.1', '2023-12-19 03:18:00', '2023-12-19 03:18:00'),
(4, 'saifullahshuvo30@gmail.com', '127.0.0.1', '2023-12-19 03:18:15', '2023-12-19 03:18:15'),
(5, 'alex@viserlab.com', '127.0.0.1', '2023-12-19 03:18:39', '2023-12-19 03:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profession`, `company`, `image`, `text`, `status`, `created_at`, `updated_at`) VALUES
(2, 'James Barden', 'Grocery Manager', 'Hess James Inc', '657ef15045411.jpg', '\"Shopping at S-TECH was a game-changer for me! As a tech enthusiast, I discovered the latest computer accessories, sleek laptops, and state-of-the-art phones. The quality and variety exceeded my expectations. Plus, the buying process was seamless, and my order arrived promptly. I\'m now a loyal customer and can\'t recommend them enough!\"', 1, '2023-12-17 07:02:08', '2023-12-17 07:02:08'),
(3, 'James Bond', 'General Manager', 'Norris and Mcpherson Associates', '657ef1dde98c6.jpg', '\"I\'m always on the lookout for the best tech deals, and S-TECH delivered big time! The range of computer accessories is impressive, and I found the perfect laptop for my needs. The website is user-friendly, the prices are competitive, and the customer service is top-notch. I\'m extremely satisfied with my purchase and will be coming back for more tech goodies!\"', 1, '2023-12-17 07:04:30', '2023-12-17 07:04:30'),
(4, 'Angelina Brooks', 'Technical Manager', 'Sexton and Caldwell LLC', '657ef238742bb.jpg', '\"As a professional constantly on the go, I rely on quality gadgets. S-TECH became my go-to destination for all things tech. The laptop I purchased is a game-changer, and the accessories complement it perfectly. The website\'s layout made it easy to find what I needed, and the delivery was quick and hassle-free. Highly recommend this e-commerce platform for anyone looking to upgrade their tech arsenal!\"', 1, '2023-12-17 07:06:00', '2023-12-17 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shuvo', 'shuvo@gmail.com', NULL, '$2y$10$JFy/iXWsvH2/pZNFboqfAOsKkE9jBFZnTMKQ1/SRvXYmUKqepCkcO', NULL, '2023-10-28 00:54:16', '2023-10-28 00:54:16'),
(3, 'ecom', 'ecom@gmail.cm', NULL, '$2y$10$JFy/iXWsvH2/pZNFboqfAOsKkE9jBFZnTMKQ1/SRvXYmUKqepCkcO', NULL, '2023-12-04 00:13:26', '2023-12-04 00:13:26'),
(4, 'prince', 'prince@gmail.com', NULL, '$2y$10$XKvuwtIWWnw/M4MMrlJUHOKH5FefrI1Burmq.gOFyDFEdtwVstNzG', NULL, '2023-12-06 00:10:50', '2023-12-06 00:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 1, 114, '2023-12-20 05:34:32', '2023-12-20 05:34:32'),
(22, 1, 113, '2023-12-20 05:34:34', '2023-12-20 05:34:34'),
(23, 1, 112, '2023-12-20 05:34:37', '2023-12-20 05:34:37'),
(24, 1, 111, '2023-12-20 05:34:39', '2023-12-20 05:34:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
