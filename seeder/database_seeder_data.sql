SET NAMES utf8mb4;

INSERT INTO `activities` (`id`, `type`, `name`, `description`) VALUES
(1,	'AEROBIC',	'Running',	'Running is for the cowards'),
(2,	'AEROBIC',	'Walking',	'Walking is a type of exercise where you walk'),
(3,	'AEROBIC',	'Cycling',	'Cycling is mainly an aerobic activity, which means that your heart, blood vessels and lungs all get a workout'),
(4,	'FLEXIBILITY',	'Yoga',	'Yoga is a good exercise to stretch'),
(5,	'STRENGTH',	'Push-up',	'The push-up is a common calisthenics exercise beginning from the prone position'),
(6,	'FLEXIBILITY',	'Cross-Over',	'Stand with legs crossed, keeping the feet close together and the legs straight. Try to touch the toes.'),
(7,	'STRENGTH',	'Squats',	'To do a squat, stand with your feet slightly greater than shoulder-width apart and your toes pointing ahead'),
(8,	'BALANCE',	'One-leg stand',	'Start by standing facing the wall, with your arms outstretched and your fingertips touching the wall.');

INSERT INTO `users` (`id`, `height`, `weight`, `age`, `distance_goal_value`, `distance_goal_unit`) VALUES
(1,	180,	90,	30,	2,	'KM');

INSERT INTO `sessions` (`id`, `activity_id`, `user_id`, `tracking_init_date`, `tracking_finish_date`, `tracking_elapsed_time_value`, `tracking_elapsed_time_unit`, `tracking_distance_value`, `tracking_distance_unit`) VALUES
(1,	1,	1,	'2024-05-02 17:35:53',	'2024-05-02 17:55:53',	1200,	'SECOND',	3,	'KM'),
(2,	2,	1,	'2024-05-03 17:35:53',	'2024-05-03 18:35:53',	3600,	'SECOND',	5,	'KM'),
(3,	1,	1,	'2024-05-04 17:35:53',	'2024-05-04 19:05:53',	5400,	'SECOND',	10,	'KM'),
(4,	1,	1,	'2024-05-05 17:35:53',	'2024-05-05 18:05:53',	1800,	'SECOND',	4,	'KM'),
(5,	2,	1,	'2024-05-06 17:35:53',	'2024-05-06 18:35:53',	3600,	'SECOND',	8,	'KM');