<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'local';
$active_record = TRUE;


$db['local']['hostname'] = 'localhost';
$db['local']['username'] = 'root';
$db['local']['password'] = '';
$db['local']['database'] = '[mso] law-2016';
$db['local']['dbdriver'] = 'mysql';
$db['local']['dbprefix'] = '';
$db['local']['pconnect'] = TRUE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = '';
$db['local']['char_set'] = 'utf8';
$db['local']['dbcollat'] = 'utf8_general_ci';
$db['local']['swap_pre'] = '';
$db['local']['autoinit'] = TRUE;
$db['local']['stricton'] = FALSE;

$db['fd']['hostname'] = '27.254.33.49';
$db['fd']['username'] = 'c1law2016';
$db['fd']['password'] = 'L@w20!6';
$db['fd']['database'] = 'c1law2016';
$db['fd']['dbdriver'] = 'mysql';
$db['fd']['dbprefix'] = '';
$db['fd']['pconnect'] = TRUE;
$db['fd']['db_debug'] = TRUE;
$db['fd']['cache_on'] = FALSE;
$db['fd']['cachedir'] = '';
$db['fd']['char_set'] = 'utf8';
$db['fd']['dbcollat'] = 'utf8_general_ci';
$db['fd']['swap_pre'] = '';
$db['fd']['autoinit'] = TRUE;
$db['fd']['stricton'] = FALSE;

$db['mso']['hostname'] = 'localhost';
$db['mso']['username'] = 'lawdb';
$db['mso']['password'] = 'lawpwd';
$db['mso']['database'] = 'law2016';
$db['mso']['dbdriver'] = 'mysql';
$db['mso']['dbprefix'] = '';
$db['mso']['pconnect'] = TRUE;
$db['mso']['db_debug'] = TRUE;
$db['mso']['cache_on'] = FALSE;
$db['mso']['cachedir'] = '';
$db['mso']['char_set'] = 'utf8';
$db['mso']['dbcollat'] = 'utf8_general_ci';
$db['mso']['swap_pre'] = '';
$db['mso']['autoinit'] = TRUE;
$db['mso']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
