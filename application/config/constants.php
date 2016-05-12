<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('TEMP_LAW','temp_law');
define('LAW_DATALAW','law_datalaws');
define('LAW_GROUP','law_groups');
define('LAW_MAINTYPE','law_maintypes');
define('LAW_SUBMAINTYPE','law_submaintypes');
define('LAW_CATEGORY','law_category');
define('LAW_TYPE','law_types');
define('LAW_OPTION','law_option');
define('LAW_OVSK','law_overlap_or_skip');
define('LAW_OPTIONFILE','law_optionfile');
define('LAW_OPTIONINLAW','law_optioninlaw');
define('LAW_VERSION','law_version');
define('LAW_DOWNLOAD','law_download');
define('LAW_LOG','law_log');
define('LAW_SEARCHLOG','law_searchlog');
define('LAW_POLL','law_poll');
define('USER_LOG','user_log');
define('LAW_ALERT','law_alert');
define('LAW_QUIZ','law_quiz');
define('LAW_ANSWER','law_answer');
define('LAW_OPINION','law_opinion');
define('LAW_OPINIONTITLE','law_opiniontitle');
define('LAW_RESOLUTION','law_resolution');
define('LAW_COMMITTEE','law_committee');
define('LAW_COMMITTEE_TYPE','law_committee_type');
define('LAW_PRIVILEGE','law_privilege');
define('LAW_LINK_PRIVILEGE','law_link_privilege');
define('LAW_PLAN','law_plan');
/* End of file constants.php */
/* Location: ./application/config/constants.php */
