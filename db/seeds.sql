-- Date: 2015-04-02 14:36

USE `srs`;
SET NAMES utf8;

-- Schools
-- ------------------------------------------------------
INSERT INTO `schools` (`id`, `name`, `school_type`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel`) VALUES (1, 'The City of Liverpool College', 'college', 'Roscoe Street', NULL, 'Liverpool', 'L1 9DW', '01512523000');

-- Buildings
-- ------------------------------------------------------
INSERT INTO `buildings` (`id`,`name`,`map_no`,`latitude`,`longitude`) VALUES (1,'George Holt building',231,53.406914,-2.966528);
INSERT INTO `buildings` (`id`,`name`,`map_no`,`latitude`,`longitude`) VALUES (2,'Ashton Building',422,53.406447,-2.966372);
INSERT INTO `buildings` (`id`,`name`,`map_no`,`latitude`,`longitude`) VALUES (3,'Brodie Tower',233,53.406751,-2.968411);
INSERT INTO `buildings` (`id`,`name`,`map_no`,`latitude`,`longitude`) VALUES (4,'Central Teaching Hub',221,53.405097,-2.963181);

-- Rooms
-- ------------------------------------------------------
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (1,'Teaching Laboratory 2','GHOLT-H102',1,30);
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (2,'Seminar Room H2.23','GHOLT-H223',1,15);
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (3,'Lecture Room 108','BROD-108',3,35);
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (4,'Room 702','BROD-702',3,15);
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (5,'Lecture Room 106/107','ASHT-LR',2,40);
INSERT INTO `rooms` (`id`,`name`,`code`,`building_id`,`size`) VALUES (6,'Lecture Theatre B','CTH-LTB',4,100);

-- Departments
-- ------------------------------------------------------
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (1,'Department of Electrical Engineering, Electronics',2,'Ashton Street','Liverpool','Liverpool','L69 3BX','+44 (0)151 795 4275');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (2,'Department of Computer Science',1,'The Quadrangle','Brownlow Hill','Liverpool','L69 3GH','+44 (0)151 794 4701');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (3,'School of Engineering',1,'The Quadrangle','Brownlow Hill','Liverpool','L69 3GH','+44 (0)151 794 4701');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (4,'School of Medicine',1,'Cedar House','Ashton Street','Liverpool','L69 3GE','+44 (0)151 795 4362');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (5,'School of Life Sciences',1,'Crown Street','d','Liverpool','L69 7ZB','+44 (0)151 794 5545');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (6,'Department of Chemistry',1,'Crown Street','d','Liverpool','L69 3GH','+44 (0)151 794 6970');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (7,'Department of Physics',1,'Oliver Lodge','Oxford Street','Liverpool','L69 7ZE','+44 (0)151 794 4701');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (8,'Department of Mathematical Sciences',1,'Mathematical Sciences Building','Peach Street','Liverpool','L69 7ZL','+44 (0)151 794 4046');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (9,'Department of Earth, Ocean and Ecological Sciences',1,'Jane Herdman Building','4 Brownlow Street','Liverpool','L69 3GP','+44 (0)151 795 4642');
INSERT INTO `departments` (`id`,`name`,`building_id`,`address_line1`,`address_line2`,`address_line3`,`postcode`,`tel`) VALUES (10,'Department of Geography and Planning',1,'74 Bedford St S',NULL,'Liverpool','L69 7ZT','+44 (0)151 794 3085');



-- Events
-- ------------------------------------------------------
INSERT INTO `events` (`id`,`title`,`description`,`tags`,`room_id`,`start_time`,`end_time`,`proposed_at`,`proposed_by`,`approved_at`,`approved_by`,`status`,`applicants`,`facebook_link`,`twitter_link`) VALUES (1,'Anthropology, digital music and the contemporary','How can anthropology help us to understand the epochal social and cultural changes catalysed by the take up of digital media and the internet? This lecture readdresses classic anthropological concerns, among them the nature of time and, as befits the Radcliffe-Brown Lecture, of social relations, drawing on a global programme of ethnographic studies of art and popular digital music cultures in Argentina, Canada, Cuba, India, Kenya and the United Kingdom. The lecture indicates how doing anthropology through music can revitalize these fundamental concerns, opening up new conceptual directions, while reshaping what has been called an anthropology of the contemporary.',NULL,1,'2015-05-19 18:00:00','2015-05-19 19:15:00','2015-04-02 14:32:04',NULL,NULL,NULL,'approved',5,NULL,NULL);
INSERT INTO `events` (`id`,`title`,`description`,`tags`,`room_id`,`start_time`,`end_time`,`proposed_at`,`proposed_by`,`approved_at`,`approved_by`,`status`,`applicants`,`facebook_link`,`twitter_link`) VALUES (2,'Splendid Innovations: The development, reception and preservation of screen translation','This conference brings together translation scholars, film historians and archivists to piece together the untold history of screen translation from the silent period to the early talkies. There’s much that we don’t know about this period, starting with what materials survive, in what languages, from what films.\nThis conference will identify the challenges which exist in writing the history of dubbing, subtitling and other forms of screen translation. It will ask what a ‘translated’ film was anyway, in the silent and early sound period, and what part translation played in wider textual transformations of film before and after 1927.',NULL,2,'2015-05-22 09:30:00','2015-05-22 17:00:00','2015-04-02 14:33:04',NULL,NULL,NULL,'approved',10,NULL,NULL);

-- Users
-- ------------------------------------------------------

-- Student
INSERT INTO `users` (`id`,`email`,`hashed_password`,`firstname`,`lastname`,`role`,`gender`,`dob`,`avatar`,`registered_at`) VALUES (1,'test@example.com','123456','Alex','Fleming',3,NULL,NULL,NULL,'2015-04-03 16:05:01');
INSERT INTO `students` (`user_id`, `school_id`, `teacher_id`, `address_line1`, `address_line2`, `address_line3`, `postcode`) VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL);
-- Teacher
INSERT INTO `users` (`id`,`email`,`hashed_password`,`firstname`,`lastname`,`role`,`gender`,`dob`,`avatar`,`registered_at`) VALUES (2,'teacher@example.com','123456','Alex','Teacher',2,NULL,NULL,NULL,'2015-04-03 16:05:01');
INSERT INTO `teachers` (`user_id`, `school_id`, `phone`) VALUES (2, 1, '0123456789');
-- Staff
INSERT INTO `users` (`id`,`email`,`hashed_password`,`firstname`,`lastname`,`role`,`gender`,`dob`,`avatar`,`registered_at`) VALUES (3,'staff@example.com','123456','Alex','Fleming',1,NULL,NULL,NULL,'2015-04-03 16:05:01');
INSERT INTO `staff` (`user_id`, `department_id`, `phone`) VALUES (3, 1, '0123456789');
-- Admin
INSERT INTO `users` (`id`,`email`,`hashed_password`,`firstname`,`lastname`,`role`,`gender`,`dob`,`avatar`,`registered_at`) VALUES (4,'admin@example.com','123456','Alex','Admin',0,NULL,NULL,NULL,'2015-04-03 16:05:01');
INSERT INTO `admins` (`user_id`, `phone`) VALUES (4, '0123456789');


-- Applications 
-- ------------------------------------------------------
INSERT INTO `applications` (`id`, `student_id`, `event_id`, `status`, `created_at`) VALUES (1, 1, 1, 'reserved', '2015-05-01 09:00:00');
