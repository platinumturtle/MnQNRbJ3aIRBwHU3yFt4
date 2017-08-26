<?php
function dbConnect() {
	$user = "drupal_luci";
	$pass = "vRsz68!0";
	$server = "5.135.189.62:8443";
	$db = "laluciernaga_drupal";
	$con = mysqli_connect($server,$user,$pass) or die('No se pudo conectar: ' . mysqli_error());
	mysqli_select_db($con, $db) or die('No se pudo seleccionar la base de datos');
	mysqli_set_charset($con, "utf8mb4");
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
	$result = mysqli_query($link, $query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysqli_fetch_array($result);
	echo $row['module'];
	mysqli_free_result($result);
	mysqli_close($link);




print_r("</body>");
print_r("</html>");
?>