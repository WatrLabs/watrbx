-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2025 at 08:59 AM
-- Server version: 8.0.24
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watrbx2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `3dthumnails`
--

CREATE TABLE `3dthumnails` (
  `id` int NOT NULL,
  `userid` int DEFAULT NULL,
  `assetid` int DEFAULT NULL,
  `json` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `abuse-reports`
--

CREATE TABLE `abuse-reports` (
  `id` int NOT NULL,
  `reportinguser` int NOT NULL,
  `placeid` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `messages` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `activeplayers`
--

CREATE TABLE `activeplayers` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `placeid` int NOT NULL,
  `jobid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int NOT NULL,
  `action` enum('moderate_user','send_message','reward_currency','reward_item') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user` int NOT NULL,
  `time` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `userid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `apikeys`
--

CREATE TABLE `apikeys` (
  `id` int NOT NULL,
  `apikey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jobid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `expiration` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `apireq`
--

CREATE TABLE `apireq` (
  `id` int NOT NULL,
  `apiname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` bigint NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int NOT NULL,
  `prodtype` enum('User Product','Group Product') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'User Product',
  `prodcategory` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `asseticon` int DEFAULT NULL,
  `created` int NOT NULL,
  `updated` int NOT NULL,
  `robux` int DEFAULT '0',
  `tix` int DEFAULT '0',
  `sales` int NOT NULL DEFAULT '0',
  `moderation_status` enum('Pending','Approved','Deleted') COLLATE utf8mb4_bin NOT NULL DEFAULT 'Pending',
  `publicdomain` int NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `limited` tinyint(1) DEFAULT '0',
  `limitedu` tinyint(1) NOT NULL DEFAULT '0',
  `remaining` int DEFAULT NULL,
  `memlevel` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `owner` int NOT NULL,
  `fileid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `asset_history`
--

CREATE TABLE `asset_history` (
  `id` int NOT NULL,
  `assetid` int NOT NULL,
  `fileid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `awardedbadges`
--

CREATE TABLE `awardedbadges` (
  `id` int NOT NULL,
  `badgeid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `universeid` int NOT NULL,
  `owner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `bodycolors`
--

CREATE TABLE `bodycolors` (
  `id` int NOT NULL,
  `part` varchar(255) NOT NULL,
  `color` bigint NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `captchaverified`
--

CREATE TABLE `captchaverified` (
  `id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` bigint NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `chatlogs`
--

CREATE TABLE `chatlogs` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `filtered` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` bigint NOT NULL,
  `userid` int NOT NULL,
  `assetid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `convo_messages`
--

CREATE TABLE `convo_messages` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `userid` int NOT NULL,
  `convoid` int NOT NULL,
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `convo_participants`
--

CREATE TABLE `convo_participants` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `convoid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cooldown`
--

CREATE TABLE `cooldown` (
  `id` int NOT NULL,
  `cooldownid` varchar(255) NOT NULL,
  `date` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `coversations`
--

CREATE TABLE `coversations` (
  `id` int NOT NULL,
  `isGC` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `csrftokens`
--

CREATE TABLE `csrftokens` (
  `id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `userid` int NOT NULL,
  `form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `datastores`
--

CREATE TABLE `datastores` (
  `id` int NOT NULL,
  `pid` int NOT NULL,
  `dkey` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `email_codes`
--

CREATE TABLE `email_codes` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `userid` int NOT NULL,
  `time` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `event-apikeys`
--

CREATE TABLE `event-apikeys` (
  `id` int NOT NULL,
  `apikey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `featuredgames`
--

CREATE TABLE `featuredgames` (
  `id` int NOT NULL,
  `universeid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `owner` int NOT NULL,
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `parent` int NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `forum-header`
--

CREATE TABLE `forum-header` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `forum-header`
--

INSERT INTO `forum-header` (`id`, `name`, `priority`) VALUES
(1, 'ROBLOX', 1),
(2, 'Club Houses', 2),
(3, 'Game Creation and Development', 3),
(4, 'Entertainment', 4);

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `priority` int NOT NULL,
  `parent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `title`, `description`, `priority`, `parent`) VALUES
(1, 'All Things ROBLOX', 'The area for discussions purely about ROBLOX – the features, the games, and company news. 	        ', 1, 1),
(2, 'Help (Technical Support and Account Issues)', 'Seeking account or technical help? Post your questions here.', 2, 1),
(3, 'Suggestions & Ideas\r\n	', 'Do you have a suggestion and ideas for ROBLOX? Share your feedback here.', 3, 1),
(4, 'BLOXFaires & ROBLOX events', 'Check here to see the crazy things ROBLOX is doing. Contest information can be found here. ROBLOX is going to be at various Maker Faires and conferences around the globe. Discuss those events here!', 4, 1),
(5, 'ROBLOX Talk', 'A popular hangout where ROBLOXians talk about various topics.', 1, 2),
(6, 'Off Topic', 'When no other forum makes sense for your post, Off Topic will help it make even less sense.', 2, 2),
(7, 'Clans & Guilds', 'Talk about what’s going on in your Clans, Groups, Companies, and Guilds, and about the Groups feature in general.', 3, 2),
(8, 'Game Marketing', 'This is where you show off your awesome creations, talk about how to advertise your game or share your marketing and sale tactics.', 1, 3),
(9, 'Game Design', 'This is the forum to get help, talk about future ROBLOX game ideas, or gather an awesome building team.', 2, 3),
(10, 'Scripters', 'This is the place for discussion about scripting. Anything about scripting that is not a help request or topic belongs here.', 3, 3),
(11, 'Video Game Central', 'Talk about your favorite video and computer games outside of ROBLOX, with other fanatical video gamers!\r\n', 1, 4),
(12, 'Video Creations with ROBLOX\r\n', 'This forum is for your sweet game play footage or that awesome viral video you saw on YouTube. Also to talk about your favorite Twitch streamers.\r\n', 2, 4),
(13, 'Ro-Sports', 'For the many leagues of ROBLOX sports, real life sports fans.\r\n', 3, 4),
(14, 'Pop-Culture (Music/Books/Movies/TV)\r\n', 'Come here to find what ROBLOXians think is a must read, see or hear.\r\n', 4, 4),
(15, 'Role-Playing\r\n', 'The forum for story telling and imagination. Start a role-playing thread here involving your fictional characters, or role-play out a scenario with other players.\r\n', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `userid` int NOT NULL,
  `CanReply` tinyint(1) NOT NULL DEFAULT '1',
  `isStickied` tinyint(1) NOT NULL DEFAULT '0',
  `StickiedDate` bigint DEFAULT NULL,
  `views` bigint NOT NULL,
  `parent` int NOT NULL,
  `date` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE `forum_replies` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `userid` int NOT NULL,
  `parent` int NOT NULL,
  `categoryid` int NOT NULL,
  `date` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `friendid` int NOT NULL,
  `status` enum('pending','accepted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'pending',
  `date` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `game_instances`
--

CREATE TABLE `game_instances` (
  `id` int NOT NULL,
  `serverguid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `placeid` int NOT NULL,
  `laggy` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `game_recommendations`
--

CREATE TABLE `game_recommendations` (
  `id` int NOT NULL,
  `universeid` int NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  `last_updated` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `iconid` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `shout` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `robux` int NOT NULL,
  `tix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

CREATE TABLE `group_roles` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `priority` int NOT NULL,
  `groupid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `group_walls`
--

CREATE TABLE `group_walls` (
  `id` int NOT NULL,
  `groupid` int NOT NULL,
  `userid` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `hasrole`
--

CREATE TABLE `hasrole` (
  `id` int NOT NULL,
  `roleid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ipbans`
--

CREATE TABLE `ipbans` (
  `id` int NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `jobid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` enum('0','1','2','3') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `type` int NOT NULL,
  `assetid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `jobtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `port` int DEFAULT NULL,
  `dimensions` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `apikey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `join_codes`
--

CREATE TABLE `join_codes` (
  `id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `placeid` int NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `port` int NOT NULL,
  `jobid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `assetid` int NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `page` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` int NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `maintcodes`
--

CREATE TABLE `maintcodes` (
  `id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `discord_user` bigint NOT NULL,
  `expires` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `userfrom` int NOT NULL,
  `userto` int NOT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` bigint NOT NULL,
  `hasread` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderation`
--

CREATE TABLE `moderation` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `type` enum('reminder','warning','days','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'reminder',
  `reviewed` int NOT NULL,
  `banneduntil` bigint DEFAULT NULL,
  `moderator` int NOT NULL,
  `moderatornote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `offensiveitem` int DEFAULT NULL,
  `days` int DEFAULT NULL,
  `internalnote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `canignore` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ownedassets`
--

CREATE TABLE `ownedassets` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `assetid` int NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `playerpoints`
--

CREATE TABLE `playerpoints` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `balance` bigint NOT NULL,
  `placeid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `rolename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `weight` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int NOT NULL,
  `server_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ipv6` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `wireguard_ip` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `access_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int NOT NULL,
  `session` varchar(255) NOT NULL,
  `author` int DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `expiration` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `id` int NOT NULL,
  `thekey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`id`, `thekey`, `value`) VALUES
(1, 'CAN_LOGIN', 'true'),
(2, 'CAN_REGISTER', 'true'),
(3, 'CAN_PURCHASE', 'true'),
(4, 'SITE_BANNER', ''),
(5, 'CRON_RUNNING', 'true'),
(6, 'GAMES_ENABLED', 'true'),
(7, 'CAN_SIGNUP_WITH_VPN', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `theme_name` text NOT NULL,
  `theme_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` int NOT NULL,
  `dimensions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `assetid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `universes`
--

CREATE TABLE `universes` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `studioapi` tinyint(1) NOT NULL DEFAULT '0',
  `externalstuffidk` tinyint(1) NOT NULL DEFAULT '0',
  `maxplayers` int NOT NULL DEFAULT '10',
  `privateserverenabled` tinyint(1) NOT NULL DEFAULT '1',
  `privateserverprice` int DEFAULT '100',
  `owner` int NOT NULL,
  `assetid` int NOT NULL,
  `public` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usernamechanges`
--

CREATE TABLE `usernamechanges` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `oldusername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` int DEFAULT NULL,
  `currenttheme` int DEFAULT NULL,
  `regtime` bigint NOT NULL,
  `robux` int NOT NULL DEFAULT '100',
  `tix` int NOT NULL DEFAULT '50',
  `membership` enum('None','BuildersClub','TurboBuildersClub','OutrageousBuildersClub') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'None',
  `active_where` enum('None','Website','Game','Studio') COLLATE utf8mb4_bin NOT NULL DEFAULT 'None',
  `last_visit` bigint DEFAULT NULL,
  `last_stipend` bigint DEFAULT NULL,
  `blurb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `register_ip` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `primarygroup` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `universeid` int NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wearingitems`
--

CREATE TABLE `wearingitems` (
  `id` int NOT NULL,
  `itemid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3dthumnails`
--
ALTER TABLE `3dthumnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abuse-reports`
--
ALTER TABLE `abuse-reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activeplayers`
--
ALTER TABLE `activeplayers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apireq`
--
ALTER TABLE `apireq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `asset_history`
--
ALTER TABLE `asset_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assetid` (`assetid`);

--
-- Indexes for table `awardedbadges`
--
ALTER TABLE `awardedbadges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bodycolors`
--
ALTER TABLE `bodycolors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bodycolors` (`userid`);

--
-- Indexes for table `captchaverified`
--
ALTER TABLE `captchaverified`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatlogs`
--
ALTER TABLE `chatlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convo_messages`
--
ALTER TABLE `convo_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convo_participants`
--
ALTER TABLE `convo_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coversations`
--
ALTER TABLE `coversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csrftokens`
--
ALTER TABLE `csrftokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datastores`
--
ALTER TABLE `datastores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_codes`
--
ALTER TABLE `email_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event-apikeys`
--
ALTER TABLE `event-apikeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featuredgames`
--
ALTER TABLE `featuredgames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feed` (`owner`);

--
-- Indexes for table `forum-header`
--
ALTER TABLE `forum-header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_replies`
--
ALTER TABLE `forum_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `friendid` (`friendid`);

--
-- Indexes for table `game_instances`
--
ALTER TABLE `game_instances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_recommendations`
--
ALTER TABLE `game_recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universeid` (`universeid`),
  ADD KEY `score` (`score`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_roles`
--
ALTER TABLE `group_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_walls`
--
ALTER TABLE `group_walls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasrole`
--
ALTER TABLE `hasrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipbans`
--
ALTER TABLE `ipbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_codes`
--
ALTER TABLE `join_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes` (`assetid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `maintcodes`
--
ALTER TABLE `maintcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderation`
--
ALTER TABLE `moderation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownedassets`
--
ALTER TABLE `ownedassets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playerpoints`
--
ALTER TABLE `playerpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thumbnails` (`assetid`,`userid`);

--
-- Indexes for table `universes`
--
ALTER TABLE `universes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usernamechanges`
--
ALTER TABLE `usernamechanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `users` (`username`),
  ADD KEY `userid` (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_userid_universeid_id` (`userid`,`universeid`,`id`),
  ADD KEY `visits` (`universeid`);

--
-- Indexes for table `wearingitems`
--
ALTER TABLE `wearingitems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3dthumnails`
--
ALTER TABLE `3dthumnails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `abuse-reports`
--
ALTER TABLE `abuse-reports`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activeplayers`
--
ALTER TABLE `activeplayers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apireq`
--
ALTER TABLE `apireq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_history`
--
ALTER TABLE `asset_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awardedbadges`
--
ALTER TABLE `awardedbadges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bodycolors`
--
ALTER TABLE `bodycolors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `captchaverified`
--
ALTER TABLE `captchaverified`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatlogs`
--
ALTER TABLE `chatlogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `convo_messages`
--
ALTER TABLE `convo_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `convo_participants`
--
ALTER TABLE `convo_participants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coversations`
--
ALTER TABLE `coversations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `csrftokens`
--
ALTER TABLE `csrftokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datastores`
--
ALTER TABLE `datastores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_codes`
--
ALTER TABLE `email_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event-apikeys`
--
ALTER TABLE `event-apikeys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featuredgames`
--
ALTER TABLE `featuredgames`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum-header`
--
ALTER TABLE `forum-header`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_replies`
--
ALTER TABLE `forum_replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_instances`
--
ALTER TABLE `game_instances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_recommendations`
--
ALTER TABLE `game_recommendations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_roles`
--
ALTER TABLE `group_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_walls`
--
ALTER TABLE `group_walls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasrole`
--
ALTER TABLE `hasrole`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipbans`
--
ALTER TABLE `ipbans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_codes`
--
ALTER TABLE `join_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintcodes`
--
ALTER TABLE `maintcodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moderation`
--
ALTER TABLE `moderation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ownedassets`
--
ALTER TABLE `ownedassets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playerpoints`
--
ALTER TABLE `playerpoints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universes`
--
ALTER TABLE `universes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usernamechanges`
--
ALTER TABLE `usernamechanges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wearingitems`
--
ALTER TABLE `wearingitems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_history`
--
ALTER TABLE `asset_history`
  ADD CONSTRAINT `asset_history_ibfk_1` FOREIGN KEY (`assetid`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
