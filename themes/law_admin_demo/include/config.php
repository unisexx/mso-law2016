<? 
function db_connect()
{
$link = mysql_connect("localhost","inbsys","arromdee");
mysql_select_db("name_db",$link);
$charset = "SET NAMES 'utf8'";
mysql_query($charset);

}
?>

<? 
function db_close()
{
mysql_close();
}
?>

