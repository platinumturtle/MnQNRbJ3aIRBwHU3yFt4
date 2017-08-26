<?php
function dbConnect() {
	$user = "drupal_luci";
	$pass = "vRsz68!0";
	$server = "https://ns3028663.ip-5-135-189.eu:3306";
	$db = "laluciernaga_drupal";
	$con = mysql_connect($server,$user,$pass) or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db($db) or die('No se pudo seleccionar la base de datos');
	mysql_set_charset("utf8mb4");
	return $con;
}




print_r("<html>");
print_r("<head>");
print_r("<title>?</title>");
print_r("<link rel='icon' href='/favicon.png' type='image/png' />");
print_r("</head>");
print_r("<body style='background: lime;'>");
print_r("<center>");
print_r("<img src='/logo.png' />");
print_r("</center>");


	$link = dbConnect();
	$query = "SELECT module FROM block WHERE bid = 19";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	echo $row['module'];
	mysql_free_result($result);
	mysql_close($link);




print_r("</body>");
print_r("</html>");
?>