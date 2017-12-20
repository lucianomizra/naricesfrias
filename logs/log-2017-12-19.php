<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-19_09:22:13 --> Severity: Notice --> Undefined variable: pets C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:22:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:24:12 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\wamp64\www\naricesfrias\v2\app\views\base.php 42
ERROR - 2017-12-19_09:24:31 --> Severity: Notice --> Undefined variable: pets C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:24:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:25:07 --> Severity: Notice --> Undefined variable: pets C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:25:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:25:09 --> Severity: Notice --> Undefined variable: pets C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_09:25:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\components\widgets\slide_pets.php 3
ERROR - 2017-12-19_11:07:14 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: SELECT *
FROM `user`
WHERE `email` = 'lucianomizrahi@gmail.com'
 LIMIT 1
ERROR - 2017-12-19_11:07:14 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692434
WHERE `email` = 'lucianomizrahi@gmail.com'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1' LIMIT 1
ERROR - 2017-12-19_11:07:19 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: SELECT *
FROM `user`
WHERE `email` = 'lucianomizrahi@gmail.com'
 LIMIT 1
ERROR - 2017-12-19_11:07:19 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692439
WHERE `email` = 'lucianomizrahi@gmail.com'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1' LIMIT 1
ERROR - 2017-12-19_11:07:49 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: SELECT *
FROM `user`
WHERE `email` = 'lucianomizrahi@gmail.com'
 LIMIT 1
ERROR - 2017-12-19_11:07:49 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692469
WHERE `email` = 'lucianomizrahi@gmail.com'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1' LIMIT 1
ERROR - 2017-12-19_11:08:01 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: SELECT *
FROM `user`
WHERE `email` = 'lucianomizrahi@gmail.com'
 LIMIT 1
ERROR - 2017-12-19_11:08:01 --> Query error: Unknown column 'email' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692481
WHERE `email` = 'lucianomizrahi@gmail.com'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1' LIMIT 1
ERROR - 2017-12-19_11:09:15 --> Query error: Table 'naricesfrias.ci_sessions' doesn't exist - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1'
ERROR - 2017-12-19_11:09:15 --> Query error: Table 'naricesfrias.ci_sessions' doesn't exist - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('eacfac89db0af0065729c7d3a44734d6feb61f2c', '::1', 1513692555, '')
ERROR - 2017-12-19_11:10:03 --> Query error: Table 'naricesfrias.division' doesn't exist - Invalid query: SELECT `u`.*, `nz`.`file` as `file`, `d`.`division` as `division`, `c`.`country` as `country`, `u`.`id_time` as `id_time`, `l`.`league` as `league`
FROM `user` as `u`
LEFT JOIN `nz_file` `nz` ON `nz`.`id_file` = `u`.`id_file`
LEFT JOIN `division` `d` ON `d`.`id_division` = `u`.`id_current_division`
LEFT JOIN `country` `c` ON `c`.`id_country` = `u`.`id_country`
LEFT JOIN `league` `l` ON `l`.`id_league` = `u`.`id_current_league`
WHERE `u`.`id_user` = '1'
ERROR - 2017-12-19_11:12:57 --> Query error: Unknown column 'u.id_user' in 'where clause' - Invalid query: SELECT `u`.*
FROM `user` as `u`
WHERE `u`.`id_user` = '2'
ERROR - 2017-12-19_11:12:57 --> Query error: Unknown column 'u.id_user' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692777
WHERE `u`.`id_user` = '2'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1'
ERROR - 2017-12-19_11:14:27 --> Query error: Unknown column 'u.id_user' in 'where clause' - Invalid query: SELECT `u`.*
FROM `user` as `u`
WHERE `u`.`id_user` = '3'
ERROR - 2017-12-19_11:14:27 --> Query error: Unknown column 'u.id_user' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513692867
WHERE `u`.`id_user` = '3'
AND `id` = 'eacfac89db0af0065729c7d3a44734d6feb61f2c'
AND `ip_address` = '::1'
ERROR - 2017-12-19_11:15:46 --> Severity: Notice --> Undefined property: stdClass::$payment_expiration C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 62
ERROR - 2017-12-19_11:15:46 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 64
ERROR - 2017-12-19_11:16:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 59
ERROR - 2017-12-19_11:16:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 62
ERROR - 2017-12-19_11:16:00 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 64
ERROR - 2017-12-19_11:16:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 46
ERROR - 2017-12-19_11:16:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 49
ERROR - 2017-12-19_11:16:50 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 51
ERROR - 2017-12-19_11:17:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 47
ERROR - 2017-12-19_11:17:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 50
ERROR - 2017-12-19_11:17:09 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 52
ERROR - 2017-12-19_11:17:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 46
ERROR - 2017-12-19_11:17:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 49
ERROR - 2017-12-19_11:17:40 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 51
ERROR - 2017-12-19_11:17:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 46
ERROR - 2017-12-19_11:17:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 49
ERROR - 2017-12-19_11:17:50 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 51
ERROR - 2017-12-19_11:18:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 46
ERROR - 2017-12-19_11:18:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 49
ERROR - 2017-12-19_11:18:14 --> Severity: error --> Exception: Call to a member function getTimestamp() on boolean C:\wamp64\www\naricesfrias\v2\app\core\APP_Controller.php 51
ERROR - 2017-12-19_11:27:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 = ''
WHERE `id_user` =0' at line 1 - Invalid query: UPDATE `user` SET 0 = ''
WHERE `id_user` =0
ERROR - 2017-12-19_11:28:49 --> Query error: Table 'naricesfrias.plan' doesn't exist - Invalid query: SELECT `t`.*
FROM `plan` as `t`
WHERE `active` = 1
AND `id_plan` != 1
ERROR - 2017-12-19_11:28:49 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513693729
WHERE `active` = 1
AND `id_plan` != 1
AND `id` = '852498f95738a5844c53585ee986f70407f061d9'
AND `ip_address` = '::1'
ERROR - 2017-12-19_11:29:14 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `location` (`lat`, `lng`) VALUES ('-34.6036844', '-34.6036844')
ERROR - 2017-12-19_11:31:17 --> Severity: Notice --> Undefined variable: user_name C:\wamp64\www\naricesfrias\v2\app\views\components\common\header.php 14
ERROR - 2017-12-19_11:31:30 --> Severity: Notice --> Undefined variable: user_name C:\wamp64\www\naricesfrias\v2\app\views\components\common\header.php 14
ERROR - 2017-12-19_11:33:58 --> Query error: Table 'naricesfrias.country' doesn't exist - Invalid query: SELECT `t`.`id_country`, `t`.`country`
FROM `country` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_11:33:58 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513694038
WHERE `active` = 1
AND `id` = 'ff2b068be7a568a02a49dfb32f87ecd6bfb55bab'
AND `ip_address` = '::1'
ORDER BY `num`
ERROR - 2017-12-19_11:34:30 --> Query error: Table 'naricesfrias.country' doesn't exist - Invalid query: SELECT `t`.`id_country`, `t`.`country`
FROM `country` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_11:34:30 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513694070
WHERE `active` = 1
AND `id` = 'ff2b068be7a568a02a49dfb32f87ecd6bfb55bab'
AND `ip_address` = '::1'
ORDER BY `num`
ERROR - 2017-12-19_11:43:20 --> Query error: Table 'naricesfrias.plan' doesn't exist - Invalid query: SELECT `t`.*
FROM `plan` as `t`
WHERE `active` = 1
AND `id_plan` != 1
ERROR - 2017-12-19_11:43:20 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513694600
WHERE `active` = 1
AND `id_plan` != 1
AND `id` = 'ff2b068be7a568a02a49dfb32f87ecd6bfb55bab'
AND `ip_address` = '::1'
ERROR - 2017-12-19_11:43:39 --> Query error: Table 'naricesfrias.country' doesn't exist - Invalid query: SELECT `t`.`id_country`, `t`.`country`
FROM `country` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_11:43:39 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513694619
WHERE `active` = 1
AND `id` = '826e1eab96f3abbb2ca8ccb3f04960de48652c7d'
AND `ip_address` = '::1'
ORDER BY `num`
ERROR - 2017-12-19_12:06:35 --> Severity: error --> Exception: Unable to locate the model you have specified: SocialModel C:\wamp64\www\_ci3\core\Loader.php 314
ERROR - 2017-12-19_12:11:02 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting variable (T_VARIABLE) C:\wamp64\www\naricesfrias\v2\app\models\SocialModel.php 18
ERROR - 2017-12-19_12:11:06 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting variable (T_VARIABLE) C:\wamp64\www\naricesfrias\v2\app\models\SocialModel.php 18
ERROR - 2017-12-19_12:11:37 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting variable (T_VARIABLE) C:\wamp64\www\naricesfrias\v2\app\models\SocialModel.php 18
ERROR - 2017-12-19_12:12:03 --> Query error: Unknown column 'data_fb' in 'field list' - Invalid query: INSERT INTO `user` (`created_at`, `first_name`, `last_name`, `mail`, `data_fb`) VALUES ('2017-12-19 12:12:03', 'Luciano', 'Mizra', 'lumiz743@hotmail.com', '{\"email\":\"lumiz743@hotmail.com\",\"picture\":{\"data\":{\"height\":50,\"is_silhouette\":false,\"url\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-1\\/p50x50\\/18193801_1382309901815707_7013156417516952386_n.jpg?oh=18a6480940aae7ef7e3159307504e354&oe=5AB1DF79\",\"width\":50}},\"name\":\"Luciano Mizra\",\"last_name\":\"Mizra\",\"first_name\":\"Luciano\",\"id\":\"1604830386230323\"}')
ERROR - 2017-12-19_12:14:57 --> Severity: Notice --> Undefined variable: r C:\wamp64\www\naricesfrias\v2\app\controllers\user\Auth.php 298
ERROR - 2017-12-19_12:14:57 --> Query error: Unknown column 'id_user' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513696497, `data` = '__ci_last_regenerate|i:1513696395;fb_193079904604336_user_id|s:16:\"1604830386230323\";'
WHERE `id_user` = '10'
AND `id` = 'e49b4309ee423e1e526a65eb85de61781f2308d1'
AND `ip_address` = '127.0.0.1'
ERROR - 2017-12-19_12:15:17 --> Severity: Notice --> Array to string conversion C:\wamp64\www\_ci3\database\DB_driver.php 1513
ERROR - 2017-12-19_12:15:17 --> Query error: Unknown column 'email' in 'field list' - Invalid query: UPDATE `user` SET `email` = 'lumiz743@hotmail.com', `picture` = Array, `name` = 'Luciano Mizra', `last_name` = 'Mizra', `first_name` = 'Luciano', `id` = '1604830386230323'
WHERE `id_user` = '10'
ERROR - 2017-12-19_13:29:50 --> Severity: Warning --> mysqli::real_connect():  C:\wamp64\www\_ci3\database\drivers\mysqli\mysqli_driver.php 161
ERROR - 2017-12-19_13:29:50 --> Severity: Warning --> mysqli::real_connect():  C:\wamp64\www\_ci3\database\drivers\mysqli\mysqli_driver.php 161
ERROR - 2017-12-19_13:29:50 --> Unable to connect to the database
ERROR - 2017-12-19_13:29:50 --> Unable to connect to the database
ERROR - 2017-12-19_15:00:34 --> Query error: Table 'naricesfrias.country' doesn't exist - Invalid query: SELECT `t`.`id_country`, `t`.`country`
FROM `country` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_15:00:34 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513706434
WHERE `active` = 1
AND `id` = '9f859c59ac1b1f31fc857c25d2ab7ec5d26649be'
AND `ip_address` = '127.0.0.1'
ORDER BY `num`
ERROR - 2017-12-19_15:00:37 --> Query error: Table 'naricesfrias.country' doesn't exist - Invalid query: SELECT `t`.`id_country`, `t`.`country`
FROM `country` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_15:00:37 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513706437
WHERE `active` = 1
AND `id` = '9f859c59ac1b1f31fc857c25d2ab7ec5d26649be'
AND `ip_address` = '127.0.0.1'
ORDER BY `num`
ERROR - 2017-12-19_15:02:26 --> Severity: Notice --> Undefined variable: r C:\wamp64\www\naricesfrias\v2\app\models\DataModel.php 37
ERROR - 2017-12-19_15:02:26 --> Query error: Table 'naricesfrias.time' doesn't exist - Invalid query: SELECT `t`.`id_time`, `t`.`time`
FROM `time` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_15:02:26 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513706546
WHERE `active` = 1
AND `id` = '9f859c59ac1b1f31fc857c25d2ab7ec5d26649be'
AND `ip_address` = '127.0.0.1'
ORDER BY `num`
ERROR - 2017-12-19_15:02:34 --> Severity: error --> Exception: Call to undefined method DataModel::GetCountries() C:\wamp64\www\naricesfrias\v2\app\controllers\user\Account.php 30
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$file C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 9
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:12 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:12 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$file C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 9
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:20 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:20 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$file C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 9
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:33 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:05:33 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:05:58 --> Query error: Table 'naricesfrias.time' doesn't exist - Invalid query: SELECT `t`.`id_time`, `t`.`time`
FROM `time` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_15:05:58 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513706758
WHERE `active` = 1
AND `id` = 'a49fca246ccebbb2f3174e0922f88ae0562e15c9'
AND `ip_address` = '::1'
ORDER BY `num`
ERROR - 2017-12-19_15:12:31 --> Query error: Table 'naricesfrias.time' doesn't exist - Invalid query: SELECT `t`.`id_time`, `t`.`time`
FROM `time` as `t`
WHERE `active` = 1
ORDER BY `num`
ERROR - 2017-12-19_15:12:31 --> Query error: Unknown column 'active' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1513707151
WHERE `active` = 1
AND `id` = '528b0e8ba968298049998ba5326d2aeeb865bcc9'
AND `ip_address` = '::1'
ORDER BY `num`
ERROR - 2017-12-19_15:12:44 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\auth\register.php 94
ERROR - 2017-12-19_15:12:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\auth\register.php 94
ERROR - 2017-12-19_15:13:21 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\auth\register.php 94
ERROR - 2017-12-19_15:13:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\auth\register.php 94
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$file C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 9
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:24 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:24 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$file C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 9
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:25:48 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:25:48 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$name_public C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 18
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 25
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 32
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 77
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 87
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 94
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 101
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 115
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:25 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 19
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$lastname C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 26
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:48:41 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:48:41 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:00 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:09 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:09 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:49:26 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:49:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:50:50 --> Severity: Notice --> Undefined property: stdClass::$public_data C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 213
ERROR - 2017-12-19_15:50:50 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Notice --> Undefined variable: countries C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 71
ERROR - 2017-12-19_15:53:25 --> Severity: Notice --> Undefined property: stdClass::$province C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 81
ERROR - 2017-12-19_15:53:25 --> Severity: Notice --> Undefined property: stdClass::$team C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 88
ERROR - 2017-12-19_15:53:25 --> Severity: Notice --> Undefined variable: times C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 95
ERROR - 2017-12-19_15:53:25 --> Severity: Notice --> Undefined property: stdClass::$about C:\wamp64\www\naricesfrias\v2\app\views\section\user\account\publicdata.php 109
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:25 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:53:28 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:54:05 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 214
ERROR - 2017-12-19_15:55:56 --> Severity: error --> Exception: Call to undefined function ,() C:\wamp64\www\naricesfrias\v2\app\models\UserModel.php 76
ERROR - 2017-12-19_16:39:24 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE), expecting function (T_FUNCTION) C:\wamp64\www\naricesfrias\v2\app\controllers\user\Account.php 186
ERROR - 2017-12-19_17:06:03 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting elseif (T_ELSEIF) or else (T_ELSE) or endif (T_ENDIF) C:\wamp64\www\naricesfrias\v2\app\views\base.php 36
ERROR - 2017-12-19_17:13:56 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 1
ERROR - 2017-12-19_17:13:56 --> Severity: Notice --> Undefined variable: title C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 2
ERROR - 2017-12-19_17:13:56 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 7
ERROR - 2017-12-19_17:13:56 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:13:56 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:14:47 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 1
ERROR - 2017-12-19_17:14:47 --> Severity: Notice --> Undefined variable: title C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 2
ERROR - 2017-12-19_17:14:47 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 7
ERROR - 2017-12-19_17:14:47 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:14:47 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:16:56 --> Severity: Notice --> Undefined variable: title C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 2
ERROR - 2017-12-19_17:16:56 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 7
ERROR - 2017-12-19_17:16:56 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:16:56 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:17:06 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 7
ERROR - 2017-12-19_17:17:06 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:17:06 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 41
ERROR - 2017-12-19_17:19:41 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 18
ERROR - 2017-12-19_17:19:41 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 52
ERROR - 2017-12-19_17:19:41 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 52
ERROR - 2017-12-19_17:20:54 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:20:54 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:20:54 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:21:10 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:21:10 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:21:10 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:21:25 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:21:25 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:21:25 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:22:54 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:22:54 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:22:54 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:22:58 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:22:58 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:22:58 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:23:05 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:23:05 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:23:05 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:23:18 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:23:18 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:23:18 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:35:53 --> Severity: error --> Exception: Unable to locate the model you have specified: PetModel C:\wamp64\www\_ci3\core\Loader.php 314
ERROR - 2017-12-19_17:36:21 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 22
ERROR - 2017-12-19_17:36:21 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:36:21 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\publish.php 56
ERROR - 2017-12-19_17:37:06 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 19
ERROR - 2017-12-19_17:37:06 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 53
ERROR - 2017-12-19_17:37:06 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 53
ERROR - 2017-12-19_17:37:32 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 21
ERROR - 2017-12-19_17:37:32 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 55
ERROR - 2017-12-19_17:37:32 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 55
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 20
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:38:23 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined property: stdClass::$id_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 12
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 20
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:38:35 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:38:59 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 20
ERROR - 2017-12-19_17:38:59 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:38:59 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:39:39 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 20
ERROR - 2017-12-19_17:39:39 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:39:39 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 54
ERROR - 2017-12-19_17:40:36 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 22
ERROR - 2017-12-19_17:40:36 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:40:36 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:41:07 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 22
ERROR - 2017-12-19_17:41:07 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:41:07 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:41:13 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 22
ERROR - 2017-12-19_17:41:13 --> Severity: Notice --> Array to string conversion C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:41:13 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 56
ERROR - 2017-12-19_17:54:47 --> Severity: Notice --> Undefined variable: pet_type C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 26
ERROR - 2017-12-19_17:54:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 26
ERROR - 2017-12-19_17:54:47 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:54:47 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:54:47 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:54:55 --> Severity: Notice --> Undefined variable: pet_type C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 26
ERROR - 2017-12-19_17:54:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 26
ERROR - 2017-12-19_17:54:55 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:54:55 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:54:55 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:11 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:27 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:41 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:43 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 27
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:55:55 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:02 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:56:02 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:02 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:26 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:56:26 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:26 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:47 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:56:47 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:56:47 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:11 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:57:11 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:11 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:13 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:57:13 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:13 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:43 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:57:43 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:43 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:49 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:57:49 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:57:49 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:05 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:59:05 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:05 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:25 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:59:25 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:25 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:38 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_17:59:38 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_17:59:38 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:00 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_18:00:00 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:00 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:23 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_18:00:23 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:23 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:26 --> Severity: Notice --> Undefined variable: status_id C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 33
ERROR - 2017-12-19_18:00:26 --> Severity: Notice --> Undefined variable: pet_status C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:26 --> Severity: Notice --> Undefined variable: btn C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 67
ERROR - 2017-12-19_18:00:34 --> Severity: Compile Warning --> Unterminated comment starting line 32 C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 32
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:24 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$id_race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_18:10:49 --> Severity: Notice --> Undefined property: stdClass::$race C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 39
ERROR - 2017-12-19_20:05:35 --> Severity: Notice --> Undefined property: App::$MApp C:\wamp64\www\_ci3\core\Model.php 77
ERROR - 2017-12-19_20:05:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\models\FileManagerModel.php 108
ERROR - 2017-12-19_20:05:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\naricesfrias\v2\app\models\FileManagerModel.php 108
ERROR - 2017-12-19_20:05:35 --> Query error: Column 'id_folder' cannot be null - Invalid query: INSERT INTO `nz_file` (`name`, `id_type`, `id_folder`, `id_user`, `file`) VALUES ('el-canciller-nuevo-modulo-de-opinion (1).jpg', '1', NULL, NULL, '2017/12/el-canciller-nuevo-modulo-de-opinion-1.jpg')
ERROR - 2017-12-19_20:06:48 --> Severity: Notice --> Undefined variable: folder C:\wamp64\www\naricesfrias\v2\app\models\FileManagerModel.php 107
ERROR - 2017-12-19_20:06:48 --> Query error: Column 'id_folder' cannot be null - Invalid query: INSERT INTO `nz_file` (`name`, `id_type`, `id_folder`, `id_user`, `file`) VALUES ('el-canciller-nuevo-modulo-de-opinion (1).jpg', '1', NULL, 0, '2017/12/el-canciller-nuevo-modulo-de-opinion-1-1.jpg')
ERROR - 2017-12-19_20:07:53 --> Severity: Notice --> Undefined variable: folder C:\wamp64\www\naricesfrias\v2\app\models\FileManagerModel.php 107
ERROR - 2017-12-19_20:07:53 --> Query error: Column 'id_folder' cannot be null - Invalid query: INSERT INTO `nz_file` (`name`, `id_type`, `id_folder`, `id_user`, `file`) VALUES ('el-canciller-bloque-de-opinion-nuevo.jpg', '1', NULL, 0, '2017/12/el-canciller-bloque-de-opinion-nuevo.jpg')
ERROR - 2017-12-19_20:08:16 --> Severity: error --> Exception: Call to undefined function thumb_url() C:\wamp64\www\naricesfrias\v2\app\models\FileManagerModel.php 113
ERROR - 2017-12-19_20:48:40 --> Severity: Notice --> Undefined variable: company C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 106
ERROR - 2017-12-19_20:48:40 --> Severity: Notice --> Undefined variable: company C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 107
ERROR - 2017-12-19_20:49:13 --> Severity: Notice --> Undefined variable: pet C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 106
ERROR - 2017-12-19_20:49:13 --> Severity: Notice --> Undefined variable: pet C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 107
ERROR - 2017-12-19_20:55:59 --> Severity: Notice --> Undefined property: stdClass::$lat C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 106
ERROR - 2017-12-19_20:55:59 --> Severity: Notice --> Undefined property: stdClass::$lng C:\wamp64\www\naricesfrias\v2\app\views\section\pet\form.php 107
