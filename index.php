<?php
function dbConnect() {
	$user = "drupal_luci";
	$pass = "vRsz68!0";
	$server = "5.135.189.62";
	$db = "laluciernaga_drupal";
	/*$con = mysqli_connect($server,$user,$pass) or die('No se pudo conectar: ' . mysql_error());
	mysqli_select_db($con, $db) or die('No se pudo seleccionar la base de datos');
*/
	$con = mysqli_connect($server,$user,$pass, $db);
	if (!$con) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	mysqli_set_charset($con, "utf8mb4");
	return $con;
}




print_r("<html>");
print_r("<head>");
print_r("<title>?</title>");
print_r("<link rel='icon' href='/favicon.png' type='image/png' />");
print_r("</head>");
print_r("<body style='background: black;'>");
print_r("<center>");
print_r("<img src='/logo.png' />");
print_r("</center>");


	$link = dbConnect();
	$query = "SELECT module FROM block WHERE bid = 19";
	$result = mysqli_query($link, $query);
	if(!$result){
		print_r(mysqli_error($link));
	}
	$row = mysqli_fetch_array($result);
	print_r($row['module']);
	mysqli_free_result($result);
	mysqli_close($link);




print_r("</body>");
print_r("</html>");
?>