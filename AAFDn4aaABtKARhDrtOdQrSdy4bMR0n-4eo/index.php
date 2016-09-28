<?php
//TOKEN for @DemisukeBot
define('BOT_TOKEN', '233309633:AAFDn4aaABtKARhDrtOdQrSdy4bMR0n-4eo');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
include 'api.php';
//include 'debugmode.php';

function gotMention($nickname,$usercheck) {
	// Parse Mode = HTML
	if($usercheck == true) {
		$nickname = "</b>".$nickname."<b>";
	}
	$storedReply = array(
						"¿Me has llamado, ".$nickname."?",
						"¿Qué dices de mí ".$nickname."?",
						"¿Que yo qué?",
						"Si soy muy pesado hazme callar con !cambiarmodo...",
						"Si soy muy pesado hazme callar con !cambiarmodo...",
						"¿Yo?",
						"¿Eh?",
						"Si soy muy pesado hazme callar con !cambiarmodo...",
						"¿Debería acudir a la llamada?",
						"Espero que no me hayas insultado ".$nickname."...",
						"¿Has dicho algo, ".$nickname."?",
						"¿Te estas metiendo conmigo ".$nickname."?"
						);
	$n = sizeof($storedReply) - 1;
	$n = rand(0,$n);
	return $storedReply[$n];
}

function probability($percent) {
	$n = rand(0,100);
	if($n>$percent) {
		return false;
	}
	return true;
}

function dbConnect() {
	$user = "tlgrmusrADDfwuPn";
	$pass = "a5YrfX9pCXrvtW8j";
	$server = "localhost";
	$db = "demisuke";
	$con = mysql_connect($server,$user,$pass) or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db($db) or die('No se pudo seleccionar la base de datos');
	mysql_set_charset("utf8mb4");
	return $con;
}

function insult($name) {
	$storedInsult = array(
						"me como a tus ancestros",
						"me meo en tu pupila",
						"me cago en la farola que alumbra la tumba de tus putos muertos",
						"me voy a cagar en un árbol y a abonarlo de la misma manera durante años para crear vegetación con mi esencia y sea la propia naturaleza quien quiera acabar contigo, y ojalá el árbol en el que invierta mis heces sea tu árbol genealógico",
						"estoy harto de la gente como tú que va de guay por la vida porque tiene amigos y luego no me sabe varear la aceituna cuando me lo traigo al pueblo. Pocos enemigos tienes, ya te iré creando más, imbécil",
						"tu mera existencia es digna de improperio, haznos un favor y salta ya por un balcón",
						"la teoría del Big Bang es ideal para tener una referencia a la hora de explicar qué piensan los demás de ti",
						"deja de engañarte, no te quiere nadie por mucho que interaccionen online con las fotos de mierda que te haces para tus redes sociales",
						"ojalá fueras un pavo para hornearte y saber que después de una buena comida tú solo seas mi próxima diarrea",
						"te voy a dar un euro para poder decir que hay algo que te puedo robar, porque no tienes ni dignidad",
						"vete a la selva tropical a cazar tabiques de contrachapado inalámbrico, al menos tu vida tendrá sentido",
						"ojalá tuvieras escamas para poder respirar en el agua para que sólo pudieras vivir donde yo no esté",
						"te voy a encender las luces de tu casa hasta que me pagues por no ignorarte como ser humano tal y como hacen los demás",
						"eres la típica persona que roba el euro de los carritos y se cuela en el metro y mientras se baja música y películas piratas por internet se queja de que los políticos roban. Ahí te atropelle un sidecar con patines",
						"por mucho que vayas al gim esa cara que tienes no se arregla ni con cirugía, déjalo ya",
						"te voy a partir el cráneo con una bolsa de kikos",
						"me cuesco en las cuencas de tus ojos",
						"voy a cortarte la cara en rodajas para escanearlas y hacer fotocopias con las que prender una hoguera para quemar tu cuerpo",
						"que una nutria te arranque una pierna y la use de paragüero, así por lo menos sirves para algo",
						"voy a entrar a tu móvil por el puerto 288 y a ponerte la música de los gemeliers en bucle hasta que te reviente un tímpano",
						"eres tan popular que la gente desea verte insultado, te aconsejo que mañana no abras tu buzón aunque te llegue el aroma a tu sobaco desde su interior",
						"voy a darte una paliza con una batidora de los noventa y a emitirlo por streaming",
						"te voy a triturar el páncreas hasta que aprendas a hablar en lituano",
						"voy a amputarte los brazos con unas tijeras de podar para que te rieguen como a una planta",
						"te voy a cortar las uñas de los pies con una motosierra y te las voy a meter en el potaje de mañana",
						"te voy a unificar las costillas con un bate de béisbol",
						"ojalá fuera moco y no bot para no dejarte respirar ni durmiendo",
						"te aconsejo que no tengas hijos nunca, porque pienso plancharlos con la cortacésped una vez al mes",
						"veo el futuro de tu espalda de color escarlata. Tengo una radial y estoy detrás de ti, adivina qué viene ahora",
						"tragallantas",
						"te iba a insultar, pero naciste de un aborto fallido, ya tienes bastante con lo tuyo",
						"deja de liarla, no eres nadie y cuando te enfadas te quedas tuerto",
						"aquí nadie olvidará cuando te pusieron al lado de Raúl DG y la gente pensaba que el guapo era él",
						"ojalá tuvieras unos cuantos años más para mirarte cara a cara, a ver si pasas ya del metro y medio",
						"pienso ir a tu casa por ondas satélites y partirte la cara hasta dejarte el melón con forma de corazón"
						);
	$n = sizeof($storedInsult) - 1;
	$n = rand(0,$n);
	$error = "Escríbelo bien, así no hay quien te haga caso";
	
	if(strlen($name) > 2) {
		if (strpos(strtolower($name), "!insulta a la ") !== false) {
			$pos = strpos(strtolower($name), "!insulta a la ") + 14;
		} else if (strpos(strtolower($name), "!insulta al ") !== false) {
			$pos = strpos(strtolower($name), "!insulta al ") + 12;
		} else if (strpos(strtolower($name), "!insulta a ") !== false) {
			$pos = strpos(strtolower($name), "!insulta a ") + 11;
		} else {
			return $error;
		}
		$nickname = substr($name, $pos);
		while(strpos(strtolower($nickname), " ") === 0) {
			$nickname = substr($nickname, 1);
		}
		$nickname = str_replace("@", "", $nickname);
		if(strlen($nickname) > 0) {
			$nickname = ucfirst($nickname);
			return $nickname." ".$storedInsult[$n];
		} else {
			return $error;
		}
	}
	
	return $storedInsult[$n];
}

function checkUserID($id) {
	$bannedID = array(
					"119769161", // TaliBOT
					"228805033", //German
					"164798471",
					"", // 2599666 mareklmc el macros
					"" // @JoGel 120644940, @esteve_10 3746896
				);
	for($i=0;$i<sizeof($bannedID);$i++) {
		if($bannedID[$i] == $id) {
			error_log($id." is banned and can't access to Demisuke.");
			exit;
		}
	}
}

function checkUsername($username) {
	$bannedUsername = array(
					"Diegofa31",
					"Demisuke",
					""
				);
	for($i=0;$i<sizeof($bannedUsername);$i++) {
		if($bannedUsername[$i] == $username) {
			error_log("@".$username." is banned and can't access to Demisuke.");
			exit;
		}
	}
}

function checkGroup($group) {
	$bannedGroup = array(
					"",
					""
				);
	for($i=0;$i<sizeof($bannedGroup);$i++) {
		if($bannedGroup[$i] == $group) {
			error_log("Group ".$group." is banned and can't use Demisuke.");
			exit;
		}
	}
}

function rankedGroup($group) {
	$bannedGroup = array(
					"", // -1001056538642 Rincón Demigrante
					""
				);
	for($i=0;$i<sizeof($bannedGroup);$i++) {
		if($bannedGroup[$i] == $group) {
			//error_log("Group ".$group." is disqualified from Group Battle.");
			return 0;
		}
	}
	return 1;
}

function emojiSlot($slot) {
	if($slot == 0){
		$slot = 10;
	} else if($slot == 11) {
		$slot = 1;
	}
	switch($slot) {
		case 1: $emoji = "⚡️";
				break;
		case 2: $emoji = "💙";
				break;
		case 3: $emoji = "💖";
				break;
		case 4: $emoji = "🔔";
				break;
		case 5: $emoji = "🍋";
				break;
		case 6: $emoji = "🍉";
				break;
		case 7: $emoji = "🍓";
				break;
		case 8: $emoji = "🍒";
				break;
		case 9: $emoji = "💎";
				break;
		case 10: $emoji = "7⃣";
				break;
		default: $emoji = "⬜️";
				break;
	}
	return $emoji;
}
function cleanHTML ($message) {
	$message = str_replace("<b>", "", $message);
	$message = str_replace("<i>", "", $message);
	$message = str_replace("<code>", "", $message);
	$message = str_replace("<pre>", "", $message);
	$message = str_replace("</b>", "", $message);
	$message = str_replace("</i>", "", $message);
	$message = str_replace("</code>", "", $message);
	$message = str_replace("</pre>", "", $message);
	return $message;
}


function useBottleExp($level) {
	if($level == 100) {
		$exp = 0;
	} else if($level > 89) {
		switch($level) {
			case 99: $exp = rand(4300, 4360);
					break;
			case 98: $exp = rand(7710, 7720);
					break;
			case 97: $exp = rand(6710, 6720);
					break;
			case 96: $exp = rand(5710, 5720);
					break;
			case 95: $exp = rand(4710, 4720);
					break;
			case 94: $exp = rand(3710, 3720);
					break;
			case 93: $exp = rand(2710, 2720);
					break;
			case 92: $exp = rand(1710, 1720);
					break;
			case 91: $exp = rand(1010, 1020);
					break;
			case 90: $exp = rand(840, 850);
					break;
		}
	}else if($level > 79) {
		switch($level) {
			case 89: $exp = rand(2060, 2065);
					break;
			case 88: $exp = rand(2040, 2045);
					break;
			case 87: $exp = rand(2020, 2025);
					break;
			case 86: $exp = rand(2000, 2005);
					break;
			case 85: $exp = rand(1980, 1985);
					break;
			case 84: $exp = rand(1960, 1970);
					break;
			case 83: $exp = rand(1940, 1950);
					break;
			case 82: $exp = rand(1920, 1930);
					break;
			case 81: $exp = rand(1900, 1910);
					break;
			case 80: $exp = rand(1650, 1660);
					break;
		}
	}else if($level > 69) {
		switch($level) {
			case 79: $exp = rand(3270, 3280);
					break;
			case 78: $exp = rand(3235, 3245);
					break;
			case 77: $exp = rand(3200, 3210);
					break;
			case 76: $exp = rand(3160, 3170);
					break;
			case 75: $exp = rand(3125, 3135);
					break;
			case 74: $exp = rand(3090, 3100);
					break;
			case 73: $exp = rand(3050, 3060);
					break;
			case 72: $exp = rand(3020, 3030);
					break;
			case 71: $exp = rand(2980, 2990);
					break;
			case 70: $exp = rand(2560, 2570);
					break;
		}
	}else if($level > 59) {
		switch($level) {
			case 69: $exp = rand(2520, 2535);
					break;
			case 68: $exp = rand(2490, 2500);
					break;
			case 67: $exp = rand(2450, 2465);
					break;
			case 66: $exp = rand(2420, 2430);
					break;
			case 65: $exp = rand(2380, 2395);
					break;
			case 64: $exp = rand(2350, 2365);
					break;
			case 63: $exp = rand(2315, 2330);
					break;
			case 62: $exp = rand(2280, 2295);
					break;
			case 61: $exp = rand(2250, 2265);
					break;
			case 60: $exp = rand(1900, 1915);
					break;
		}
	}else if($level > 49) {
		switch($level) {
			case 59: $exp = rand(1870, 1880);
					break;
			case 58: $exp = rand(1840, 1850);
					break;
			case 57: $exp = rand(1810, 1820);
					break;
			case 56: $exp = rand(1770, 1790);
					break;
			case 55: $exp = rand(1740, 1760);
					break;
			case 54: $exp = rand(1710, 1730);
					break;
			case 53: $exp = rand(1680, 1695);
					break;
			case 52: $exp = rand(1650, 1665);
					break;
			case 51: $exp = rand(1620, 1635);
					break;
			case 50: $exp = rand(1320, 1330);
					break;
		}
	}else if($level > 39) {
		switch($level) {
			case 49: $exp = rand(2650, 2660);
					break;
			case 48: $exp = rand(2590, 2600);
					break;
			case 47: $exp = rand(2530, 2550);
					break;
			case 46: $exp = rand(2470, 2490);
					break;
			case 45: $exp = rand(2410, 2430);
					break;
			case 44: $exp = rand(2360, 2370);
					break;
			case 43: $exp = rand(2290, 2310);
					break;
			case 42: $exp = rand(2240, 2260);
					break;
			case 41: $exp = rand(2190, 2200);
					break;
			case 40: $exp = rand(2130, 2150);
					break;
		}
	}else if($level > 29) {
		switch($level) {
			case 39: $exp = rand(1680, 1690);
					break;
			case 38: $exp = rand(1630, 1640);
					break;
			case 37: $exp = rand(1570, 1590);
					break;
			case 36: $exp = rand(1520, 1530);
					break;
			case 35: $exp = rand(1460, 1480);
					break;
			case 34: $exp = rand(1410, 1430);
					break;
			case 33: $exp = rand(1360, 1380);
					break;
			case 32: $exp = rand(1310, 1325);
					break;
			case 31: $exp = rand(1260, 1280);
					break;
			case 30: $exp = rand(1210, 1230);
					break;
		}
	}else if($level > 19) {
		switch($level) {
			case 29: $exp = rand(880, 900);
					break;
			case 28: $exp = rand(820, 840);
					break;
			case 27: $exp = rand(780, 800);
					break;
			case 26: $exp = rand(730, 750);
					break;
			case 25: $exp = rand(690, 705);
					break;
			case 24: $exp = rand(650, 660);
					break;
			case 23: $exp = rand(600, 625);
					break;
			case 22: $exp = rand(570, 600);
					break;
			case 21: $exp = rand(420, 550);
					break;
			case 20: $exp = rand(490, 510);
					break;
		}
	} else if($level > 9) {
		switch($level) {
			case 19: $exp = rand(380, 420);
					break;
			case 18: $exp = rand(320, 350);
					break;
			case 17: $exp = rand(310, 340);
					break;
			case 16: $exp = rand(290, 310);
					break;
			case 15: $exp = rand(290, 310);
					break;
			case 14: $exp = rand(260, 280);
					break;
			case 13: $exp = rand(240, 260);
					break;
			case 12: $exp = rand(200, 250);
					break;
			case 11: $exp = rand(200, 220);
					break;
			case 10: $exp = rand(200, 270);
					break;
		}
	} else {
		switch($level) {
			case 9: $exp = rand(110, 125);
					break;
			case 8: $exp = rand(90, 110);
					break;
			case 7: $exp = rand(70, 85);
					break;
			case 6: $exp = rand(50, 65);
					break;
			case 5: $exp = rand(45, 60);
					break;
			case 4: $exp = rand(40, 50);
					break;
			case 3: $exp = rand(30, 40);
					break;
			case 2: $exp = rand(45, 65);
					break;
			case 1: $exp = 29;
					break;
		}
	}
	return $exp;
}

function getHeroPower($level, $power) {
	if($power < 200) {
		$result = 0;
	} else if($level < 14) {
		$division = $power - 200;
		$division = $division / 25;
		$division = $division / 4;
		$result = floor($division);
	} else if($level < 24) {
		$division = $power - 200;
		$division = $division / 25;
		$division = $division / 2;
		$result = floor($division);
	} else {
		$division = $power - 200;
		$division = $division / 25;
		$result = floor($division);
	}
	return $result;
}
function getPlayerExp($currLevel, $user_id) {
	$exp = 0;
	$text = "*Te has quedado dormido y has perdido la oportunidad, el personaje no reacciona.*";
	if($currLevel == 100) {
		$text = "*Estás sentado en tu trono de rey, viendo la vida pasar, y viendo como tú eres superior al resto de los mortales. Has llegado a la cima.*";
	} else if($currLevel > 89) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Tras haber pasado por lugares gélidos y calderas infernales, aprendes a adaptarte al medio y lograr mimetizarte con el ambiente. Ganas 94 puntos de experiencia.*";
					$exp = 94;
					break;
			case 2: $text = "*Te sientes realmente poderoso, pero continúas entrenando con objetos del entorno hasta caer agotado. Ganas 96 puntos de experiencia.*";
					$exp = 96;
					break;
			case 3: $text = "*Luchas contra pequeños seres que intentan atacarte y los usas de alimento. Has ganado 97 puntos de experiencia.*";
					$exp = 97;
					break;
			case 4: $text = "*Creas fuentes de luz y con ellas logras encontrar un manantial de agua potable. Has ganado 98 puntos de experiencia.*";
					$exp = 98;
					break;
			case 5: $text = "*Entrenas sin parar practicando con tus armas hasta lograr eliminar pequeños enemigos casi sin esfuerzo. Ganas 99 puntos de experiencia y te subes la moral.*";
					$exp = 99;
					break;
		}
	} else if($currLevel > 79) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Intentas utilizar objetos ignífugos que encuentras por el camino como armadura adicional para no quemarte. Has ganado 84 puntos de experiencia.*";
					$exp = 84;
					break;
			case 2: $text = "*Estudias los posibles caminos para seguir avanzando y descartas los más cálidos. Has ganado 86 puntos de experiencia.*";
					$exp = 86;
					break;
			case 3: $text = "*Encuentras una especia de lago aislado a rebosar de agua. Pretendes nadar hacia el fondo del lago para buscar nuevos caminos pero rápidamente te das cuenta de que el agua está hirviendo, sin embargo parece agua potable. Ganas 87 puntos de experiencia y una fuente de alimentación.*";
					$exp = 87;
					break;
			case 4: $text = "*Te entrenas eliminando pequeñas bestias que intentan atacarte y te olvidas de las altas temperaturas que sufres. Ganas 88 puntos de experiencia.*";
					$exp = 88;
					break;
			case 5: $text = "*Logras desviar ríos de lava y creas atajos para continuar con tu aventura, has ganado 89 puntos de experiencia.*";
					$exp = 89;
					break;
		}
	} else if($currLevel > 69) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Trazas mapas de la zona utilizando objetos que te encuentras por el camino y te estudias el portal. Has ganado 74 puntos de experiencia.*";
					$exp = 74;
					break;
			case 2: $text = "*Buscas formas de atravesar el portal sin ser detectado. No encuentras ninguna, pero estudias cuáles pueden ser las más sencillas. Has ganado 76 puntos de experiencia.*";
					$exp = 76;
					break;
			case 3: $text = "*Te escondes y estudias cómo los seres de la zona circulan por el portal para adivinar cómo atravesarlo. Ganas 77 puntos de experiencia.*";
					$exp = 77;
					break;
			case 4: $text = "*Te alejas un poco del portal y te entrenas con diversos seres que pretenden atacarte. Ganas 78 puntos de experiencia.*";
					$exp = 78;
					break;
			case 5: $text = "*Intentas poner cebos y trampas a los guardianes del portal para estudiar sus reacciones y encontrar puntos débiles. Ganas 79 puntos de experiencia.*";
					$exp = 79;
					break;
		}
	} else if($currLevel > 59) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Te adaptas al calor del pasaje recortando un poco tu ropa. Ganas 64 puntos de experiencia y un bronceado infernal.*";
					$exp = 64;
					break;
			case 2: $text = "*Encuentras la ruta a seguir mediante señales de luz que proceden del infierno. Has ganado 66 puntos de experiencia.*";
					$exp = 66;
					break;
			case 3: $text = "*Te adaptas a convivir con los vapores que provienen del Infierno y empiezas a diferenciar algunas ilusiones ópticas, has ganado 67 puntos de experiencia.*";
					$exp = 67;
					break;
			case 4: $text = "*Encuentras un río de lava y logras crear una especie de balsa con la que viajar por el río hacia tu destino final. Has ganado 68 puntos de experiencia y el medio de transporte más inestable de tu vida.*";
					$exp = 68;
					break;
			case 5: $text = "*Te logras mimetizar con el entorno esquivando a todo aquel que intenta atacarte y provocando que caigan a la lava o a otros puntos de calor extremo. Has ganado 69 puntos de experiencia.*";
					$exp = 69;
					break;
		}
	} else if($currLevel > 49) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Aprendes a iluminarte por la cueva utilizando lo aprendido en el portal desde donde entraste, ganas 54 puntos de experiencia y mejoras el sentido de la orientación.*";
					$exp = 54;
					break;
			case 2: $text = "*Te entrenas matando a una especie de murciélagos-dragón que te intentan atacar aprovechando la poca visibilidad de la cueva. Ganas 56 puntos de experiencia.*";
					$exp = 56;
					break;
			case 3: $text = "*Encuentras fuentes de agua potable. El agua está hirviendo, pero consigues hidratarte bien con ella. Has ganado 57 puntos de experiencia y te sientes revitalizado.*";
					$exp = 57;
					break;
			case 4: $text = "*Encuentras restos de seres muertos comestibles y consigues alimentarte sin problemas, has ganado 58 puntos de experiencia.*";
					$exp = 58;
					break;
			case 5: $text = "*Debido a tu aventura comienzas a perder algo de tu cordura y montas un ring improvisado para hacer combates con todo ser que te intente atacar en la cueva. Ganas 59 puntos de experiencia y un fuerte aplauso del público... si lo hubiera.*";
					$exp = 59;
					break;
		}
	} else if($currLevel > 39) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Te sientes en una zona muy turbia del planeta, como en un túnel de transición entre lo real y lo que te puede aniquilar con la mirada, pero aprendes a tranquilizarte concentrándote en tu misión y confiando en tu fuerza. Ganas 44 puntos de experiencia.*";
					$exp = 44;
					break;
			case 2: $text = "*Aprendes a guiarte por el camino correcto según hacia dónde viaja la fauna salvaje del lugar. Has ganado 46 puntos de experiencia.*";
					$exp = 46;
					break;
			case 3: $text = "*Agudizas el oído y comienzas a guiarte creando caminos hacia donde proceden sonidos que no parecen relacionados con el mundo humano. Ganas 47 puntos de experiencia.*";
					$exp = 47;
					break;
			case 4: $text = "*Aprendes a crear iluminación artificial con los materiales que encuentras por el camino y copiando lo que ves a tu alrededor, has ganado 48 puntos de experiencia y mejorado tu sentido de la vista.*";
					$exp = 48;
					break;
			case 5: $text = "*Añoras el mundo que conocemos en la superficie terrestre y simulas una zona de entrenamiento improvisada como la de tu procedencia para fortalecerte. Ganas 49 puntos de experiencia.*";
					$exp = 49;
					break;
		}
	} else if($currLevel > 29) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Investigas esta zona inexplorada por los humanos y encuentras el camino para seguir con tu aventura, además de ganar 33 puntos de experiencia.*";
					$exp = 33;
					break;
			case 2: $text = "*Aprendes a caminar sobre hielo sin resbalarte tanto como antes, ganas 35 puntos de experiencia.*";
					$exp = 35;
					break;
			case 3: $text = "*Encuentras una especie de dinosaurio con alas. Parece tan inofensivo que enseguida entablas amistad con él y te deja subir a su lomo y volar. Ganas 37 puntos de experiencia y transporte aéreo. ¡Qué lástima que el camino sea hacia abajo!*";
					$exp = 37;
					break;
			case 4: $text = "*Te ves tan solo como ser humano en el glaciar que te sientes colonizador emprendedor y comienzas a cavar túneles con lo primero que encuentras. Ganas 38 puntos de experiencia.*";
					$exp = 38;
					break;
			case 5: $text = "*Te encuentras una babosa azul intentando comerte una pierna y acabas con ella. ¡Qué lástima que esta no sea como aquella del área de entrenamiento, con esta tan solo ganas 39 puntos de experiencia.*";
					$exp = 39;
					break;
		}
	} else if($currLevel > 19) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Has aprendido técnicas de camuflaje con el entorno, ganas 22 puntos de experiencia.*";
					$exp = 22;
					break;
			case 2: $text = "*Has aprendido a huir de animales salvajes que pretenden devorarte, has ganado 23 puntos de experiencia.*";
					$exp = 23;
					break;
			case 3: $text = "*Has eliminado varias trampas del camino, ahora evitarás caer en ellas y te llevas 25 puntos de experiencia.*";
					$exp = 25;
					break;
			case 4: $text = "*Has domado una serpiente, ahora encuentras más fácil los caminos seguros y ganas 28 puntos de experiencia y una brújula reptil.*";
					$exp = 28;
					break;
			case 5: $text = "*Te has encontrado con un oso bebiendo agua en el río, le has dado algo de comer y ahora puedes montar en él para viajar más rápido. Ganas 29 puntos de experiencia y un vehículo animal de transporte.*";
					$exp = 29;
					break;
		}
	} else if($currLevel > 9) {
		$luckyExp = rand(1,5);
		switch($luckyExp) {
			case 1: $text = "*Te has ido a meditar un rato bajo el agua de una cascada, has ganado 14 puntos de experiencia.*";
					$exp = 14;
					break;
			case 2: $text = "*Te has adentrado en el bosque en busca de comida y has encontrado frutas silvestres. Te llevas 15 puntos de experiencia.*";
					$exp = 15;
					break;
			case 3: $text = "*Has investigado el bosque y has creado una ruta para viajar más fácilmente por su interior, has ganado 16 puntos de experiencia.*";
					$exp = 16;
					break;
			case 4: $text = "*Has cazado un jabalí y has preparado una cena con él, ganas 18 puntos de experiencia.*";
					$exp = 18;
					break;
			case 5: $text = "*Has domado un águila del bosque y ahora puedes mirar al cielo para saber dónde hay comida. Ganas 19 puntos de experiencia... y un amigo volador.*";
					$exp = 19;
					break;
		}
	} else {
		$luckyExp = rand(1,5);
		if($luckyExp < 4) {
			$luckyWait = rand(100, 400);
			usleep($luckyWait);
			$luckyExp = rand(1,5);
		}
		switch($luckyExp) {
			case 1: $text = "*Has salido a dar un paseo y ahora conoces más la zona, has ganado 2 puntos de experiencia.*";
					$exp = 2;
					break;
			case 2: $text = "*Has regado el jardín y las plantas ahora brotan con mayor brío, has ganado 4 puntos de experiencia.*";
					$exp = 4;
					break;
			case 3: $text = "*Has ayudado a unos ancianos a cruzar un paso de cebra en las afueras del área de entrenamiento. Ganas 7 puntos de experiencia.*";
					$exp = 7;
					break;
			case 4: $text = "*Te has encontrado una rama de árbol en el suelo y la has blandido durante un rato como si fuera una espada, has ganado 8 puntos de experiencia.*";
					$exp = 8;
					break;
			case 5: $text = "*Te has tomado en serio tu rocosidad y has estado un buen rato entrenando con varios ejercicios físicos, has ganado 9 puntos de experiencia.*";
					$exp = 9;
					break;
		}
	}
	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "Markdown", "text" => $text));
	return $exp;
}

function getLevelFromExp($exp) {
	$level = 1;
	if($exp > 7999999) {
		$level = 100;
	} else if($exp > 2739999) {
		if($exp > 7017999) {
			$level = 99;
		} else if($exp > 6145999) {
			$level = 98;
		}  else if($exp > 5373999) {
			$level = 97;
		}  else if($exp > 4701999) {
			$level = 96;
		}  else if($exp > 4129999) {
			$level = 95;
		}  else if($exp > 3657999) {
			$level = 94;
		}  else if($exp > 3285999) {
			$level = 93;
		}  else if($exp > 3013999) {
			$level = 92;
		}  else if($exp > 2841999) {
			$level = 91;
		}  else {
			$level = 90;
		} 
	} else if($exp > 1940974) {
		if($exp > 2655099) {
			$level = 89;
		} else if($exp > 2572594) {
			$level = 88;
		}  else if($exp > 2490929) {
			$level = 87;
		}  else if($exp > 2410049) {
			$level = 86;
		}  else if($exp > 2329949) {
			$level = 85;
		}  else if($exp > 2250624) {
			$level = 84;
		}  else if($exp > 2172069) {
			$level = 83;
		}  else if($exp > 2094279) {
			$level = 82;
		}  else if($exp > 2017249) {
			$level = 81;
		}  else {
			$level = 80;
		} 
	} else if($exp > 1311149) {
		if($exp > 1874699) {
			$level = 79;
		} else if($exp > 1809169) {
			$level = 78;
		}  else if($exp > 1744379) {
			$level = 77;
		}  else if($exp > 1680324) {
			$level = 76;
		}  else if($exp > 1616999) {
			$level = 75;
		}  else if($exp > 1554399) {
			$level = 74;
		}  else if($exp > 1492519) {
			$level = 73;
		}  else if($exp > 1431354) {
			$level = 72;
		}  else if($exp > 1370899) {
			$level = 71;
		}  else {
			$level = 70;
		} 
	} else if($exp > 829324) {
		if($exp > 1259899) {
			$level = 69;
		} else if($exp > 1209344) {
			$level = 68;
		}  else if($exp > 1159479) {
			$level = 67;
		}  else if($exp > 1110299) {
			$level = 66;
		}  else if($exp > 1061799) {
			$level = 65;
		}  else if($exp > 1013974) {
			$level = 64;
		}  else if($exp > 966819) {
			$level = 63;
		}  else if($exp > 920329) {
			$level = 62;
		}  else if($exp > 874499) {
			$level = 61;
		}  else {
			$level = 60;
		} 
	} else if($exp > 475999) {
		if($exp > 791149) {
			$level = 59;
		} else if($exp > 753619) {
			$level = 58;
		}  else if($exp > 716729) {
			$level = 57;
		}  else if($exp > 680474) {
			$level = 56;
		}  else if($exp > 644849) {
			$level = 55;
		}  else if($exp > 609849) {
			$level = 54;
		}  else if($exp > 575469) {
			$level = 53;
		}  else if($exp > 541704) {
			$level = 52;
		}  else if($exp > 508549) {
			$level = 51;
		}  else {
			$level = 50;
		} 
	} else if($exp > 236674) {
		if($exp > 449449) {
			$level = 49;
		} else if($exp > 423494) {
			$level = 48;
		}  else if($exp > 398129) {
			$level = 47;
		}  else if($exp > 373349) {
			$level = 46;
		}  else if($exp > 349149) {
			$level = 45;
		}  else if($exp > 325524) {
			$level = 44;
		}  else if($exp > 302469) {
			$level = 43;
		}  else if($exp > 279979) {
			$level = 42;
		}  else if($exp > 258049) {
			$level = 41;
		}  else {
			$level = 40;
		} 
	} else if($exp > 91849) {
		if($exp > 219799) {
			$level = 39;
		} else if($exp > 203469) {
			$level = 38;
		}  else if($exp > 187679) {
			$level = 37;
		}  else if($exp > 172424) {
			$level = 36;
		}  else if($exp > 157699) {
			$level = 35;
		}  else if($exp > 143499) {
			$level = 34;
		}  else if($exp > 129819) {
			$level = 33;
		}  else if($exp > 116654) {
			$level = 32;
		}  else if($exp > 103999) {
			$level = 31;
		}  else {
			$level = 30;
		} 
	} else if($exp > 23349) {
		if($exp > 82959) {
			$level = 29;
		} else if($exp > 74569) {
			$level = 28;
		}  else if($exp > 66674) {
			$level = 27;
		}  else if($exp > 59254) {
			$level = 26;
		}  else if($exp > 52279) {
			$level = 25;
		}  else if($exp > 45724) {
			$level = 24;
		}  else if($exp > 39569) {
			$level = 23;
		}  else if($exp > 33799) {
			$level = 22;
		}  else if($exp > 28399) {
			$level = 21;
		}  else {
			$level = 20;
		} 
	} else if($exp > 2434) {
		if($exp > 20139) {
			$level = 19;
		} else if($exp > 17264) {
			$level = 18;
		}  else if($exp > 14684) {
			$level = 17;
		}  else if($exp > 12364) {
			$level = 16;
		}  else if($exp > 10274) {
			$level = 15;
		}  else if($exp > 8389) {
			$level = 14;
		}  else if($exp > 6679) {
			$level = 13;
		}  else if($exp > 5129) {
			$level = 12;
		}  else if($exp > 3719) {
			$level = 11;
		}  else {
			$level = 10;
		} 
	} else {
		if($exp > 1854) {
			$level = 9;
		} else if($exp > 1374) {
			$level = 8;
		}  else if($exp > 979) {
			$level = 7;
		}  else if($exp > 659) {
			$level = 6;
		}  else if($exp > 409) {
			$level = 5;
		}  else if($exp > 224) {
			$level = 4;
		}  else if($exp > 99) {
			$level = 3;
		}  else if($exp > 29) {
			$level = 2;
		}  else {
			$level = 1;
		}
	}
	return $level;
}

function getItemPower($currLevel, $itemType) {
	$maxRand = 3;
	if($itemType == 1) {
		$maxRand = 2;
	}
	if($currLevel == 1) {
		$powerVariant = 0;
	} else if($currLevel < 100) {
		$powerVariant = rand(1, $maxRand);
	} else {
		$powerVariant = 42;
	}
	$levelPower = floor($currLevel / 5);
	if($itemType > 3) {
		$levelPower = $levelPower - 1;
	}
	$itemPower = ($maxRand * $levelPower) + $powerVariant;
	return $itemPower;
}

function getItemName($type, $power) {
	if($type == 1) {
		if($power < 10) {
			switch($power) {
				// nivel 1
				case 0: $name = "<i>Gorro para dormir (Crítico +0)</i>";
						break;
				// nivel 2
				case 1: $name = "Sombrero de papel (Crítico +1)";
						break;
				case 2: $name = "<b>Sombrero de papel de aluminio (Crítico +2)</b>";
						break;
				// nivel 7
				case 3: $name = "Casco de entrenamiento (Crítico +3)";
						break;
				case 4: $name = "<b>Casco de obrero (Crítico +4)</b>";
						break;
				// nivel 12
				case 5: $name = "Casco de metal (Crítico +5)";
						break;
				case 6: $name = "<b>Casco de metal reforzado (Crítico +6)</b>";
						break;
				// nivel 17
				case 7: $name = "Sombrero antimosquitos (Crítico +7)";
						break;
				case 8: $name = "<b>Casco de metal contra insectos (Crítico +8)</b>";
						break;
				// nivel 22
				case 9: $name = "Casco ligero de protección (Crítico +9)";
						break;
			}
		} else if ($power < 20) {
			switch($power) {
				case 10: $name = "<b>Casco ultraligero de protección (Crítico +10)</b>";
						break;
				// nivel 27
				case 11: $name = "Casco de camuflaje (Crítico +11)";
						break;
				case 12: $name = "<b>Casco militar (Crítico +12)</b>";
						break;
				// nivel 32
				case 13: $name = "Casco helado (Crítico +13)";
						break;
				case 14: $name = "<b>Casco helado reforzado (Crítico +14)</b>";
						break;
				// nivel 37
				case 15: $name = "Casco térmico (Crítico +15)";
						break;
				case 16: $name = "<b>Casco térmico de guerrero (Crítico +16)</b>";
						break;
				// nivel 42
				case 17: $name = "Casco puntiagudo (Crítico +17)";
						break;
				case 18: $name = "<b>Casco puntiagudo reforzado (Crítico +18)</b>";
						break;
				// nivel 47
				case 19: $name = "Casco místico (Crítico +19)";
						break;
			}
		} else if ($power < 30) {
			switch($power) {
				case 20: $name = "<b>Casco místico de guerra (Crítico +20)</b>";
						break;
				// nivel 52
				case 21: $name = "Casco prehistórico (Crítico +21)";
						break;
				case 22: $name = "<b>Casco ancestral (Crítico +22)</b>";
						break;
				// nivel 57
				case 23: $name = "Casco con linterna (Crítico +23)";
						break;
				case 24: $name = "<b>Casco de guerra retroiluminado (Crítico +24)</b>";
						break;
				// nivel 62
				case 25: $name = "Casco de la clemencia (Crítico +25)";
						break;
				case 26: $name = "<b>Casco militar marrón (Crítico +26)</b>";
						break;
				// nivel 67
				case 27: $name = "Casco con tridente (Crítico +27)";
						break;
				case 28: $name = "<b>Casco de ataque adicional (Crítico +28)</b>";
						break;
				// nivel 72
				case 29: $name = "Casco transparente (Crítico +29)";
						break;
			}
		} else {
			switch($power) {
				case 30: $name = "<b>Casco mágico (Crítico +30)</b>";
						break;
				// nivel 77
				case 31: $name = "Casco de héroe (Crítico +31)";
						break;
				case 32: $name = "<b>Casco de Elegido (Crítico +32)</b>";
						break;
				// nivel 82
				case 33: $name = "Casco infernal (Crítico +33)";
						break;
				case 34: $name = "<b>Casco de lava (Crítico +34)</b>";
						break;
				// nivel 87
				case 35: $name = "Casco ignífugo (Crítico +35)";
						break;
				case 36: $name = "<b>Casco polar ignífugo (Crítico +36)</b>";
						break;
				// nivel 92
				case 37: $name = "Casco de héroe del Inframundo (Crítico +37)";
						break;
				case 38: $name = "<b>Casco diamante (Crítico +38)</b>";
						break;
				// nivel 97
				case 39: $name = "Casco dorado (Crítico +39)";
						break;
				case 40: $name = "<b>Casco de Rocoso (Crítico +40)</b>";
						break;
			}
		}
	} else if($type == 2) {
		if($power < 10) {
			switch($power) {
				case 0: $name = "<i>Pijama (Vida +0)</i>";
						break;
				// area entrenamiento
				// nivel 3
				case 1: $name = "<i>Ropa deportiva económica (Vida +1)</i>";
						break;
				case 2: $name = "Equipación profesional deportiva (Vida +2)";
						break;
				case 3: $name = "<b>Traje militar básico (Vida +3)</b>";
						break;
				// nivel 8
				case 4: $name = "<i>Traje con protectores (Vida +4)</i>";
						break;
				case 5: $name = "Equipación con protecciones de rugby (Vida +5)";
						break;
				case 6: $name = "<b>Equipación de portero de hockey (Vida +6)</b>";
						break;
				// bosque
				// nivel 13
				case 7: $name = "<i>Ropa de camuflaje (Vida +7)</i>";
						break;
				case 8: $name = "Atuendo de montañero (Vida +8)";
						break;
				case 9: $name = "<b>Traje de alpinista con protecciones (Vida +9)</b>";
						break;
			}
		} else if ($power < 20) {
			switch($power) {
				// nivel 18
				case 10: $name = "<i>Ropa de camuflaje profesional (Vida +10)</i>";
						break;
				case 11: $name = "Traje de supervivencia (Vida +11)";
						break;
				case 12: $name = "<b>Armadura contra los insectos (Vida +12)</b>";
						break;
				// selva
				// nivel 23
				case 13: $name = "<i>Traje de cazador (Vida +13)</i>";
						break;
				case 14: $name = "Traje de cazador profesional (Vida +14)";
						break;
				case 15: $name = "<b>Traje de nativo de la jungla (Vida +15)</b>";
						break;
				// nivel 28
				case 16: $name = "<i>Armadura metálica (Vida +16)</i>";
						break;
				case 17: $name = "Armadura de metal liviano (Vida +17)";
						break;
				case 18: $name = "<b>Armadura de guerrero (Vida +18)</b>";
						break;
				// glaciar
				// nivel 33
				case 19: $name = "<i>Armadura de hielo (Vida +19)</i>";
						break;
			}
		} else if ($power < 30) {
			switch($power) {
				case 20: $name = "Armadura fresca (Vida +20)";
						break;
				case 21: $name = "<b>Armadura de hielo reforzada (Vida +21)</b>";
						break;
				// nivel 38
				case 22: $name = "<i>Armadura con calentadores (Vida +22)</i>";
						break;
				case 23: $name = "Armadura térmica (Vida +23)";
						break;
				case 24: $name = "<b>Armadura térmica reforzada (Vida +24)</b>";
						break;
				// portal salida mundo real
				// nivel 43
				case 25: $name = "<i>Armadura de samurái (Vida +25)</i>";
						break;
				case 26: $name = "Armadura de samurái jefe (Vida +26)";
						break;
				case 27: $name = "<b>Armadura de samurái de la élite (Vida +27)</b>";
						break;
				// nivel 48
				case 28: $name = "<i>Armadura mística (Vida +28)</i>";
						break;
				case 29: $name = "Armadura mística de guerra (Vida +29)";
						break;
			}
		} else if ($power < 40) {
			switch($power) {
				case 30: $name = "<b>Armadura caleidoscópica (Vida +30)</b>";
						break;
				// cueva
				// nivel 53
				case 31: $name = "<i>Armadura fosforescente (Vida +31)</i>";
						break;
				case 32: $name = "Armadura prehistórica (Vida +32)";
						break;
				case 33: $name = "<b>Armadura ancestral (Vida +33)</b>";
						break;
				// nivel 58
				case 34: $name = "<i>Armadura con intermitentes (Vida +34)</i>";
						break;
				case 35: $name = "Armadura con luces de Navidad (Vida +35)";
						break;
				case 36: $name = "<b>Armadura retroiluminada (Vida +36)</b>";
						break;
				// pasaje infierno
				// nivel 63
				case 37: $name = "<i>Armadura clementina (Vida +37)</i>";
						break;
				case 38: $name = "Armadura vikinga (Vida +38)";
						break;
				case 39: $name = "<b>Armadura bárbara (Vida +39)</b>";
						break;
			}
		} else if ($power < 50) {
			switch($power) {
				// nivel 68
				case 40: $name = "<i>Armadura tribal (Vida +40)</i>";
						break;
				case 41: $name = "Armadura de alto cargo militar (Vida +41)";
						break;
				case 42: $name = "<b>Armadura Real (Vida +42)</b>";
						break;
				// portal elegidos
				// nivel 73
				case 43: $name = "<i>Armadura mágica (Vida +43)</i>";
						break;
				case 44: $name = "Armadura medieval (Vida +44)";
						break;
				case 45: $name = "<b>Armadura electrificada (Vida +45)</b>";
						break;
				// nivel 78
				case 46: $name = "<i>Armadura impenetrable (Vida +46)</i>";
						break;
				case 47: $name = "Armadura de héroe (Vida +47)";
						break;
				case 48: $name = "<b>Armadura de Elegido (Vida +48)</b>";
						break;
				// infierno
				// nivel 83
				case 49: $name = "<i>Armadura infernal (Vida +49)</i>";
						break;
			}
		} else {
			switch($power) {
				case 50: $name = "Armadura de lava (Vida +50)";
						break;
				case 51: $name = "<b>Armadura de fuego (Vida +51)</b>";
						break;
				// nivel 88
				case 52: $name = "<i>Armadura antiquemaduras (Vida +52)</i>";
						break;
				case 53: $name = "Armadura ignífuga (Vida +53)";
						break;
				case 54: $name = "<b>Armadura polar (Vida +54)</b>";
						break;
				// inframundo
				// nivel 93
				case 55: $name = "<i>Armadura tenebrosa (Vida +55)</i>";
						break;
				case 56: $name = "Armadura de héroes del Inframundo (Vida +56)";
						break;
				case 57: $name = "<b>Armadura diamante (Vida +57)</b>";
						break;
				// nivel 98
				case 58: $name = "<i>Armadura platino (Vida +58)</i>";
						break;
				case 59: $name = "Armadura dorada (Vida +59)";
						break;
				case 60: $name = "<b>Armadura de Rocoso (Vida +60)</b>";
						break;
			}
		}
	} else if($type == 3) {
		if($power < 10) {
			switch($power) {
				case 0: $name = "<i>Calcetines (Velocidad +0)</i>";
						break;
				// area entrenamiento
				// nivel 4
				case 1: $name = "<i>Zapatos cómodos (Velocidad +1)</i>";
						break;
				case 2: $name = "Calzado deportivo (Velocidad +2)";
						break;
				case 3: $name = "<b>Deportivas de competición (Velocidad +3)</b>";
						break;
				// nivel 9
				case 4: $name = "<i>Botas de batalla (Velocidad +4)</i>";
						break;
				case 5: $name = "Botas profesionales de batalla (Velocidad +5)";
						break;
				case 6: $name = "<b>Botas de montañero (Velocidad +6)</b>";
						break;
				// bosque
				// nivel 14
				case 7: $name = "<i>Botas militares (Velocidad +7)</i>";
						break;
				case 8: $name = "Botas de montañero con punta de hierro (Velocidad +8)";
						break;
				case 9: $name = "<b>Botas de alpinista (Velocidad +9)</b>";
						break;
			}
		} else if ($power < 20) {
			switch($power) {
				// nivel 19
				case 10: $name = "<i>Botas livianas (Velocidad +10)</i>";
						break;
				case 11: $name = "Botas de agarre (Velocidad +11)";
						break;
				case 12: $name = "<b>Botas espaciales (Velocidad +12)</b>";
						break;
				// selva
				// nivel 24
				case 13: $name = "<i>Botas de cazador (Velocidad +13)</i>";
						break;
				case 14: $name = "Botas de cazador maestro (Velocidad +14)";
						break;
				case 15: $name = "<b>Protectores maya (Velocidad +15)</b>";
						break;
				// nivel 29
				case 16: $name = "<i>Botas de metal (Velocidad +16)</i>";
						break;
				case 17: $name = "Botas de metal livianas (Velocidad +17)";
						break;
				case 18: $name = "<b>Botas de armadura (Velocidad +18)</b>";
						break;
				// glaciar
				// nivel 34
				case 19: $name = "<i>Botas frescas (Velocidad +19)</i>";
						break;
			}
		} else if ($power < 30) {
			switch($power) {
				case 20: $name = "Botas de hielo (Velocidad +20)";
						break;
				case 21: $name = "<b>Botas antiresbalones (Velocidad +21)</b>";
						break;
				// nivel 39
				case 22: $name = "<i>Botas de esquí (Velocidad +22)</i>";
						break;
				case 23: $name = "Botas térmicas (Velocidad +23)";
						break;
				case 24: $name = "<b>Patines térmicos (Velocidad +24)</b>";
						break;
				// portal salida mundo real
				// nivel 44
				case 25: $name = "<i>Botas de guerra (Velocidad +25)</i>";
						break;
				case 26: $name = "Botas de guerra con ruedas (Velocidad +26)";
						break;
				case 27: $name = "<b>Armadura inferior de samurái (Velocidad +27)</b>";
						break;
				// nivel 49
				case 28: $name = "<i>Botas místicas (Velocidad +28)</i>";
						break;
				case 29: $name = "Botas místicas de guerra (Velocidad +29)";
						break;
			}
		} else if ($power < 40) {
			switch($power) {
				case 30: $name = "<b>Botas fosforescentes (Velocidad +30)</b>";
						break;
				// cueva
				// nivel 54
				case 31: $name = "<i>Botas con muelles (Velocidad +31)</i>";
						break;
				case 32: $name = "Botas de pirata (Velocidad +32)";
						break;
				case 33: $name = "<b>Botas de navegación (Velocidad +33)</b>";
						break;
				// nivel 59
				case 34: $name = "<i>Aletas de submarinista (Velocidad +34)</i>";
						break;
				case 35: $name = "Botas de explorador experimentado (Velocidad +35)";
						break;
				case 36: $name = "<b>Botas de arqueología (Velocidad +36)</b>";
						break;
				// pasaje infierno
				// nivel 64
				case 37: $name = "<i>Botas del perdón (Velocidad +37)</i>";
						break;
				case 38: $name = "Armadura inferior (Velocidad +38)";
						break;
				case 39: $name = "<b>Armadura de élite inferior (Velocidad +39)</b>";
						break;
			}
		} else if ($power < 50) {
			switch($power) {
				// nivel 69
				case 40: $name = "<i>Botas mágicas (Velocidad +40)</i>";
						break;
				case 41: $name = "Botas medievales (Velocidad +41)";
						break;
				case 42: $name = "<b>Botas extraterrestres (Velocidad +42)</b>";
						break;
				// portal elegidos
				// nivel 74
				case 43: $name = "<i>Botas de velocista aventurero profesional (Velocidad +43)</i>";
						break;
				case 44: $name = "Botas de piel de tiburón (Velocidad +44)";
						break;
				case 45: $name = "<b>Botas de piel de brontosaurio (Velocidad +45)</b>";
						break;
				// nivel 79
				case 46: $name = "<i>Botas irrompibles (Velocidad +46)</i>";
						break;
				case 47: $name = "Botas de héroe (Velocidad +47)";
						break;
				case 48: $name = "<b>Botas de Elegido (Velocidad +48)</b>";
						break;
				// infierno
				// nivel 84
				case 49: $name = "<i>Botas de bronce (Velocidad +49)</i>";
						break;
			}
		} else {
			switch($power) {
				case 50: $name = "Botas de lava (Velocidad +50)";
						break;
				case 51: $name = "<b>Botas de fuego (Velocidad +51)</b>";
						break;
				// nivel 89
				case 52: $name = "<i>Botas resistentes al calor (Velocidad +52)</i>";
						break;
				case 53: $name = "Botas ignífugas (Velocidad +53)";
						break;
				case 54: $name = "<b>Botas polares (Velocidad +54)</b>";
						break;
				// inframundo
				// nivel 94
				case 55: $name = "<i>Botas de las tinieblas (Velocidad +55)</i>";
						break;
				case 56: $name = "Botas de héroe del inframundo (Velocidad +56)";
						break;
				case 57: $name = "<b>Botas de plata (Velocidad +57)</b>";
						break;
				// nivel 99
				case 58: $name = "<i>Botas bañadas en oro (Velocidad +58)</i>";
						break;
				case 59: $name = "Botas doradas (Velocidad +59)";
						break;
				case 60: $name = "<b>Botas de Rocoso (Velocidad +60)</b>";
						break;
			}
		}
	} else if($type == 4) {
		if($power < 10) {
			switch($power) {
				case 0: $name = "<i>Osito de peluche (Ataque +0)</i>";
						break;
				// area entrenamiento
				// nivel 5
				case 1: $name = "<i>Periódico enrollado (Ataque +1)</i>";
						break;
				case 2: $name = "Espada de cartón (Ataque +2)";
						break;
				case 3: $name = "<b>Espada de madera (Ataque +3)</b>";
						break;
				// bosque
				// nivel 10
				case 4: $name = "<i>Florete de esgrima (Ataque +4)</i>";
						break;
				case 5: $name = "Katana (Ataque +5)";
						break;
				case 6: $name = "<b>Katana larga afilada (Ataque +6)</b>";
						break;
				// nivel 15
				case 7: $name = "<i>Navaja multiusos (Ataque +7)</i>";
						break;
				case 8: $name = "Bumerán con cuchillas afiladas (Ataque +8)";
						break;
				case 9: $name = "<b>Shuriken (Ataque +9)</b>";
						break;
			}
		} else if ($power < 20) {
			switch($power) {
				// selva
				// nivel 20
				case 10: $name = "<i>Lanza con punta de hierro (Ataque +10)</i>";
						break;
				case 11: $name = "Hacha oxidada (Ataque +11)";
						break;
				case 12: $name = "<b>Maza de hierro (Ataque +12)</b>";
						break;
				// nivel 25
				case 13: $name = "<i>Nunchaku (Ataque +13)</i>";
						break;
				case 14: $name = "Cuchillo de gran tamaño (Ataque +14)";
						break;
				case 15: $name = "<b>Sable (Ataque +15)</b>";
						break;
				// glaciar
				// nivel 30
				case 16: $name = "<i>Picahielos (Ataque +16)</i>";
						break;
				case 17: $name = "Espada helada (Ataque +17)";
						break;
				case 18: $name = "<b>Espada de doble hoja (Ataque +18)</b>";
						break;
				// nivel 35
				case 19: $name = "<i>Dagas imbuidas (Ataque +19)</i>";
						break;
			}
		} else if ($power < 30) {
			switch($power) {
				case 20: $name = "Dagas de fuego (Ataque +20)";
						break;
				case 21: $name = "<b>Espada de fuego (Ataque +21)</b>";
						break;
				// portal salida mundo real
				// nivel 40
				case 22: $name = "<i>Arco y flechas (Ataque +22)</i>";
						break;
				case 23: $name = "Bayesta (Ataque +23)";
						break;
				case 24: $name = "<b>Bayesta de élite (Ataque +24)</b>";
						break;
				// nivel 45
				case 25: $name = "<i>Pistola improvisada (Ataque +25)</i>";
						break;
				case 26: $name = "Rifle de dardos venenosos (Ataque +26)";
						break;
				case 27: $name = "<b>Rifle de francotirador (Ataque +27)</b>";
						break;
				// cueva
				// nivel 50
				case 28: $name = "<i>Marfil puro con hojas afiladas incrustadas (Ataque +28)</i>";
						break;
				case 29: $name = "Arco y flechas de fuego (Ataque +29)";
						break;
			}
		} else if ($power < 40) {
			switch($power) {
				case 30: $name = "<b>Aerosol nuclear (Ataque +30)</b>";
						break;
				// nivel 55
				case 31: $name = "<i>Espada electrificada (Ataque +31)</i>";
						break;
				case 32: $name = "Doble espada electrificada (Ataque +32)";
						break;
				case 33: $name = "<b>Espada de doble filo electrificada (Ataque +33)</b>";
						break;
				// pasaje infierno
				// nivel 60
				case 34: $name = "<i>Hacha afilada (Ataque +34)</i>";
						break;
				case 35: $name = "Hacha afilada gigante (Ataque +35)";
						break;
				case 36: $name = "<b>Hacha gigante con bola de pinchos (Ataque +36)</b>";
						break;
				// nivel 65
				case 37: $name = "<i>Shuriken de fuego (Ataque +37)</i>";
						break;
				case 38: $name = "Bayesta con mirilla de ultraprecisión (Ataque +38)";
						break;
				case 39: $name = "<b>Bazuca (Ataque +39)</b>";
						break;
			}
		} else if ($power < 50) {
			switch($power) {
				// portal elegidos
				// nivel 70
				case 40: $name = "<i>Espada mágica (Ataque +40)</i>";
						break;
				case 41: $name = "Motosierra (Ataque +41)";
						break;
				case 42: $name = "<b>Motosierra electrificada (Ataque +42)</b>";
						break;
				// nivel 75
				case 43: $name = "<i>Espada enorme (Ataque +43)</i>";
						break;
				case 44: $name = "Sable láser (Ataque +44)";
						break;
				case 45: $name = "<b>Espada de Elegido (Ataque +45)</b>";
						break;
				// infierno
				// nivel 80
				case 46: $name = "<i>Granadas (Ataque +46)</i>";
						break;
				case 47: $name = "Cócteles Molotov (Ataque +47)";
						break;
				case 48: $name = "<b>Lanzallamas (Ataque +48)</b>";
						break;
				// nivel 85
				case 49: $name = "<i>Lanzamisiles (Ataque +49)</i>";
						break;
			}
		} else {
			switch($power) {
				case 50: $name = "Lanzagranadas (Ataque +50)";
						break;
				case 51: $name = "<b>Leviatán (Ataque +51)</b>";
						break;
				// inframundo
				// nivel 90
				case 52: $name = "<i>Espada negra de halo rojo (Ataque +52)</i>";
						break;
				case 53: $name = "Espada de héroe del Inframundo (Ataque +53)";
						break;
				case 54: $name = "<b>Espada antimateria (Ataque +54)</b>";
						break;
				// nivel 95
				case 55: $name = "<i>Excalibur (Ataque +55)</i>";
						break;
				case 56: $name = "Espada de oro (Ataque +56)";
						break;
				case 57: $name = "<b>Espada de Rocoso (Ataque +57)</b>";
						break;
				// nivel 100
				case 99: $name = "<b>Corona y cetro de Rey Rocoso de las Tinieblas (Ataque +99)</b>";
						break;
			}
		}
	} else {
		if($power < 10) {
			switch($power) {
				case 0: $name = "<i>Manta (Defensa +0)</i>";
						break;
				// area entrenamiento
				// nivel 6
				case 1: $name = "<i>Chaqueta gruesa (Defensa +1)</i>";
						break;
				case 2: $name = "Bufanda imantada (Defensa +2)";
						break;
				case 3: $name = "<b>Tienda de campaña (Defensa +3)</b>";
						break;
				// bosque
				// nivel 11
				case 4: $name = "<i>Mosquitera (Defensa +4)</i>";
						break;
				case 5: $name = "Escudo de cartón (Defensa +5)";
						break;
				case 6: $name = "<b>Escudo de PVC (Defensa +6)</b>";
						break;
				// nivel 16
				case 7: $name = "<i>Escudo de hierro (Defensa +7)</i>";
						break;
				case 8: $name = "Escudo liviano (Defensa +8)";
						break;
				case 9: $name = "<b>Gran escudo liviano (Defensa +9)</b>";
						break;
			}
		} else if ($power < 20) {
			switch($power) {
				// selva
				// nivel 21
				case 10: $name = "<i>Escudo medieval (Defensa +10)</i>";
						break;
				case 11: $name = "Escudo reforzado (Defensa +11)";
						break;
				case 12: $name = "<b>Escudo de marfil (Defensa +12)</b>";
						break;
				// nivel 26
				case 13: $name = "<i>Escudo de piel de serpiente (Defensa +13)</i>";
						break;
				case 14: $name = "Escudo de piel de cocodrilo (Defensa +14)";
						break;
				case 15: $name = "<b>Escudo de metal y piel (Defensa +15)</b>";
						break;
				// glaciar
				// nivel 31
				case 16: $name = "<i>Escudo helado (Defensa +16)</i>";
						break;
				case 17: $name = "Escudo de hielo (Defensa +17)";
						break;
				case 18: $name = "<b>Escudo de hielo con pinchos (Defensa +18)</b>";
						break;
				// nivel 36
				case 19: $name = "<i>Caparazón iglú (Defensa +19)</i>";
						break;
			}
		} else if ($power < 30) {
			switch($power) {
				case 20: $name = "Escudo de cuerpo con visera (Defensa +20)";
						break;
				case 21: $name = "<b>Escudo zafiro (Defensa +21)</b>";
						break;
				// portal salida mundo real
				// nivel 41
				case 22: $name = "<i>Escudo viking (Defensa +22)</i>";
						break;
				case 23: $name = "Escudo de bronce (Defensa +23)";
						break;
				case 24: $name = "<b>Escudo reforzado de bronce (Defensa +24)</b>";
						break;
				// nivel 46
				case 25: $name = "<i>Escudo místico (Defensa +25)</i>";
						break;
				case 26: $name = "Escudo místico de guerra (Defensa +26)";
						break;
				case 27: $name = "<b>Escudo espejo (Defensa +27)</b>";
						break;
				// cueva
				// nivel 51
				case 28: $name = "<i>Escudo con linterna (Defensa +28)</i>";
						break;
				case 29: $name = "Escudo destello (Defensa +29)";
						break;
			}
		} else if ($power < 40) {
			switch($power) {
				case 30: $name = "<b>Escudo de luz (Defensa +30)</b>";
						break;
				// nivel 56
				case 31: $name = "<i>Escudo hipnótico (Defensa +31)</i>";
						break;
				case 32: $name = "Escudo láser (Defensa +32)";
						break;
				case 33: $name = "<b>Escudo electrificado (Defensa +33)</b>";
						break;
				// pasaje infierno
				// nivel 61
				case 34: $name = "<i>Escudo propulsor (Defensa +34)</i>";
						break;
				case 35: $name = "Escudo de plata (Defensa +35)";
						break;
				case 36: $name = "<b>Escudo de guerra de plata (Defensa +36)</b>";
						break;
				// nivel 66
				case 37: $name = "<i>Escudo calavera (Defensa +37)</i>";
						break;
				case 38: $name = "Escudo esqueleto (Defensa +38)";
						break;
				case 39: $name = "<b>Escudo Real (Defensa +39)</b>";
						break;
			}
		} else if ($power < 50) {
			switch($power) {
				// portal elegidos
				// nivel 71
				case 40: $name = "<i>Escudo mágico (Defensa +40)</i>";
						break;
				case 41: $name = "Escudo con visión nocturna (Defensa +41)";
						break;
				case 42: $name = "<b>Escudo guardaespaldas (Defensa +42)</b>";
						break;
				// nivel 76
				case 43: $name = "<i>Escudo imperforable (Defensa +43)</i>";
						break;
				case 44: $name = "Escudo de héroe (Defensa +44)";
						break;
				case 45: $name = "<b>Escudo de Elegido (Defensa +45)</b>";
						break;
				// infierno
				// nivel 81
				case 46: $name = "<i>Escudo rubí (Defensa +46)</i>";
						break;
				case 47: $name = "Escudo de lava (Defensa +47)";
						break;
				case 48: $name = "<b>Escudo de fuego (Defensa +48)</b>";
						break;
				// nivel 86
				case 49: $name = "<i>Escudo lanzallamas (Defensa +49)</i>";
						break;
			}
		} else {
			switch($power) {
				case 50: $name = "Escudo ignífugo (Defensa +50)";
						break;
				case 51: $name = "<b>Escudo antifuego (Defensa +51)</b>";
						break;
				// inframundo
				// nivel 91
				case 52: $name = "<i>Escudo final (Defensa +52)</i>";
						break;
				case 53: $name = "Escudo automático (Defensa +53)";
						break;
				case 54: $name = "<b>Escudo platino (Defensa +54)</b>";
						break;
				// nivel 96
				case 55: $name = "<i>Escudo diamante (Defensa +55)</i>";
						break;
				case 56: $name = "Escudo de oro (Defensa +56)";
						break;
				case 57: $name = "<b>Escudo de Rocoso (Defensa +57)</b>";
						break;
				case 99: $name = "<b>Coraza flotante de administrador de Demisuke (Defensa +99)</b>";
						break;
			}
		}
	}
	return $name;
}

function ratePower($power, $isCrit = 0) {
	$res = "☆☆☆☆☆";
	if($isCrit == 0) {
		if($power > 899) {
			$res = "★★★★★";
		} else if($power > 649) {
			$res = "★★★★☆";
		} else if($power > 399) {
			$res = "★★★☆☆";
		} else if($power > 159) {
			$res = "★★☆☆☆";
		} else if($power > 59) {
			$res = "★☆☆☆☆";
		}
	} else {
		if($power > 74) {
			$res = "★★★★★";
		} else if($power > 54) {
			$res = "★★★★☆";
		} else if($power > 39) {
			$res = "★★★☆☆";
		} else if($power > 24) {
			$res = "★★☆☆☆";
		} else if($power > 9) {
			$res = "★☆☆☆☆";
		}
	}
	return $res;
}

function getAreaName ($level) {
	if($level == 100) {
		$name = "👑 Palacio Real del Inframundo";
	} else if($level > 89) {
		$name = "💀 Inframundo";
	} else if($level > 87) {
		$name = "👿 Límites del Infierno";
	} else if($level > 79) {
		$name = "🔥 Infierno";
	} else if($level > 78) {
		$name = "🏯 Protección final de selección de Elegidos";
	} else if($level > 69) {
		$name = "🏵 Portal protegido de los Elegidos";
	} else if($level > 67) {
		$name = "🏰 Final del pasaje ancestral";
	} else if($level > 59) {
		$name = "🏮 Pasaje ancestral hacia el Infierno";
	} else if($level > 54) {
		$name = "🏺 Profundidades de la cueva mitológica";
	} else if($level > 49) {
		$name = "♨️ Cueva mitológica";
	} else if($level > 39) {
		$name = "⛩ Portal del mundo real hacia el Inframundo";
	} else if($level > 36) {
		$name = "☃ Fondo del glaciar";
	} else if($level > 29) {
		$name = "❄️ Glaciar oculto bajo tierra";
	} else if($level > 27) {
		$name = "🌱 Selva fría";
	} else if($level > 19) {
		$name = "🍄 Selva profunda";
	} else if($level > 16) {
		$name = "🌳 Profundidad del bosque tenebroso";
	} else if($level > 9) {
		$name = "🌲 Bosque tenebroso";
	} else if($level > 5) {
		$name = "🎓 Área de entrenamiento avanzado";
	} else {
		$name = "⛑ Área de entrenamiento";
	}
	return $name;
}

function getPlayerMood ($level, $power = 0) {
	if($power == 0) {
		$res = "✌😁 Normal";
		if($level == 100) {
			$res = "💪 Rocosidad máxima";
		} else if($level == 89 || $level == 90) {
			$res = "👻 Personaje maldito (???)";
		} else if($level == 22 || $level == 23) {
			$res = "😟 Sin rumbo (velocidad-)";
		} else if($level == 21) {
			$res = "😠 En alerta (defensa+)";
		} else if($level == 18) {
			$res = "😰 Con miedo";
		} else if($level == 13) {
			$res = "🗿 Defensa férrea (defensa+)";
		} else if($level == 12) {
			$res = "🤕 Débil (vida-)";
		} else if($level == 8) {

			$res = "🏃 Centella (velocidad+)";
		} else if($level == 7) {
			$res = "👷 Fuerte (ataque+)";
		} else {
			$res = $res;
		}
	} else {
		$res = 0;
		if($level == 100) {
			$res = "💪 Rocosidad máxima (defensa+)";
		} else if($level == 89 || $level == 90) {
			$res = 0;
		} else if($level == 22 || $level == 23) {
			$res = -4;
		} else if($level == 21) {
			$res = 3;
		} else if($level == 18) {
			$res = 0;
		} else if($level == 13) {
			$res = 3;
		} else if($level == 12) {
			$res = -1;
		} else if($level == 8) {
			$res = 4;
		} else if($level == 7) {
			$res = 2;
		} else {
			$res = $res;
		}
	}
	return $res;
}
function levelUp($newLevel, $newExp, $currCrit, $bottles, $extraPoints, $link, $user_id, $fromBoss = 0) {
	$currTime = time();
	$newHP = 0;
	$newAt = 0;
	$newDef = 0;
	$newCrit = 0;
	$newSp = 0;
	$newItemType = 1;
	$newItemPower = 0;
	$newExtraPoints = 0;
	// darle los nuevos puntos (el critico max 40), la exp max 8m
	// los de gastar punto
	if($newLevel == 100) {
		$newHP = 11;
		$newAt = 11;
		$newDef = 11;
		$newSp = 11;
		$newExtraPoints = 1228 - $extraPoints;
		if($newExtraPoints > 50) {
			$newExtraPoints = 50;
		} else if($newExtraPoints < 0) {
			$newExtraPoints = 0;
		}
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		$newCrit = 1;
		if($newExp > 7999999) {
			$newExp = 8000000;
		}
		$newAt = $newAt + $extraTicketA;
		$newSp = $newSp + $extraTicketB;
		$newItemType = 4;
	} else if ($newLevel > 89) {
		$newHP = 10;
		$newAt = 10;
		$newDef = 10;
		$newSp = 10;
		$newExtraPoints = 20;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 94 && $newLevel < 99) {
			$newExtraPoints = $newExtraPoints + 5;
		} else if($newLevel == 99) {
			$newExtraPoints = $newExtraPoints + 10;
		}
		if($newLevel == 90 || $newLevel == 95) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 90;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 79) {
		$newHP = 9;
		$newAt = 9;
		$newDef = 9;
		$newSp = 9;
		$newExtraPoints = 16;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 80 || $newLevel == 85) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 80;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 69) {
		$newHP = 8;
		$newAt = 8;
		$newDef = 8;
		$newSp = 8;
		$newExtraPoints = 15;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 70 || $newLevel == 75) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 70;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 59) {
		$newHP = 7;
		$newAt = 7;
		$newDef = 7;
		$newSp = 7;
		$newExtraPoints = 15;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 60 || $newLevel == 65) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 60;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 49) {
		$newHP = 6;
		$newAt = 6;
		$newDef = 6;
		$newSp = 6;
		$newExtraPoints = 15;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 50 || $newLevel == 55) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 50;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 39) {
		$newHP = 5;
		$newAt = 5;
		$newDef = 5;
		$newSp = 5;
		$newExtraPoints = 15;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 40 || $newLevel == 45) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 40;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 29) {
		$newHP = 4;
		$newAt = 4;
		$newDef = 4;
		$newSp = 4;
		$newExtraPoints = 10;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 34) {
			$newExtraPoints = $newExtraPoints + 2;
		}
		if($newLevel == 30 || $newLevel == 35) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 30;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 19) {
		$newHP = 3;
		$newAt = 3;
		$newDef = 3;
		$newSp = 3;
		$newExtraPoints = 4;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 24) {
			$newExtraPoints = $newExtraPoints + 1;
		}
		if($newLevel == 20 || $newLevel == 25) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 20;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 9) {
		$newHP = 2;
		$newAt = 2;
		$newDef = 2;
		$newSp = 2;
		$newExtraPoints = 2;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 14) {
			$newExtraPoints = $newExtraPoints + 1;
		}
		if($newLevel == 10 || $newLevel == 15) {
			$newCrit = 1;
		}
		if(($newLevel % 2) == 1) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel - 10;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else {
		$newHP = 1;
		$newAt = 1;
		$newDef = 1;
		$newSp = 1;
		$newExtraPoints = 1;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel == 2) {
			$newHP = $newHP + $extraTicketA;
		} else if($newLevel == 3) {
			$newAt = $newAt + $extraTicketA;
		} else if($newLevel == 3) {
			$newDef = $newDef + $extraTicketA;
		} else if($newLevel == 5) {
			$newCrit = 1;
			$newSp = $newSp + $extraTicketA;
		} else if($newLevel == 6 || $newLevel == 8) {
			$newHP = $newHP + $extraTicketA;
			$newDef = $newDef + $extraTicketB;
		} else if($newLevel == 7 || $newLevel == 9) {
			$newAt = $newAt + $extraTicketA;
			$newSp = $newSp + $extraTicketB;
		}
		$calcType = $newLevel;
		if($calcType == 0 || $calcType == 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType == 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType == 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType == 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	}
	if($currCrit > 39) {
		$newHP = $newHP + $newCrit;
		$newCrit = 0;
	}
	// buscar la nueva ropa 
	$newItemPower = getItemPower($newLevel, $newItemType);
	switch($newItemType) {
		case 1: $newItemTypeName = "helmet";
				break;
		case 2: $newItemTypeName = "body";
				break;
		case 3: $newItemTypeName = "boots";
				break;
		case 4: $newItemTypeName = "weapon";
				break;
		case 5: $newItemTypeName = "shield";
				break;
	}
	// y actualizar la base de datos
	$currTime = time();
	if($fromBoss == 1) {
		$respawnType = "last_boss";
	} else {
		$respawnType = "last_exp";
	}
	if($newLevel == 100) {
		$updateBottles = ", `bottles`= 0";
	} else if($newLevel > 19) {
		if($bottles < 10) {
			$updateBottles = ", `bottles` = `bottles` + 1";
		}
	} else {
		$updateBottles = "";
	}
	$query = "UPDATE `playerbattle` SET `exp_points` = '".$newExp."', `level` = '".$newLevel."', `extra_points` = `extra_points` + ".$newExtraPoints.", `hp` = `hp` + ".$newHP.", `attack` = `attack` + ".$newAt.", `defense` = `defense` + ".$newDef.", `critic` = `critic` + ".$newCrit.", `speed` = `speed` + ".$newSp.", `".$newItemTypeName."` = ".$newItemPower.", `".$respawnType."` = ".$currTime.$updateBottles." WHERE `user_id` = '".$user_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	mysql_free_result($result);		
	// mostrar los nuevos stats con una funcion, que tenga monospace (un !pj mini quizas)
	$itemName = getItemName($newItemType, $newItemPower);
	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
	$msg = "<b>¡Enhorabuena! Acabas de subir al nivel ".$newLevel.".</b>".PHP_EOL.PHP_EOL;
	$msg = $msg."Las estadísticas de tu personaje han mejorado:".PHP_EOL;
	$msg = $msg."<pre>VID +".$newHP."</pre>".PHP_EOL;
	$msg = $msg."<pre>ATA +".$newAt."</pre>".PHP_EOL;
	$msg = $msg."<pre>DEF +".$newDef."</pre>".PHP_EOL;
	$msg = $msg."<pre>CRÍ +".$newCrit."</pre>".PHP_EOL;
	$msg = $msg."<pre>VEL +".$newSp."</pre>".PHP_EOL.PHP_EOL;
	$msg = $msg."Puedes consultar las estadísticas completas de tu personaje con la función !pj.".PHP_EOL.PHP_EOL;
	$msg = $msg."<i>Has ganado ".$newExtraPoints." punto";
	if($newExtraPoints > 1) {
		$msg = $msg."s adicionales";
	} else {
		$msg = $msg." adicional";
	}
	$msg = $msg." para distribuir libremente en las estadísticas de tu personaje con !gastarpunto.</i>".PHP_EOL.PHP_EOL;
	$msg = $msg."Te has conseguido reforzar con el siguiente objeto:".PHP_EOL;
	switch($newItemType) {
		case 1: $msg = $msg."🎩";// "helmet";
				break;
		case 2: $msg = $msg."👔";// "body";
				break;
		case 3: $msg = $msg."👞";// "boots";
				break;
		case 4: $msg = $msg."🗡";// "weapon";
				break;
		case 5: $msg = $msg."🛡";// "shield";
				break;
	}
	$msg = $msg." ".$itemName;
	if($newLevel > 19) {
		if($newLevel < 100) {
			if($bottles < 10) {
				$msg = $msg.PHP_EOL."🍾 ¡Has obtenido una botella de experiencia!";
			} else {
				$msg = $msg.PHP_EOL."🍾 ¡Tu inventario de botellas de experiencia está lleno!";
			}
		} else {
			$msg = $msg.PHP_EOL."🍾 Has deshechado tus botellas de experiencia.";
		}
	}
	sleep(1);
	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	// (al 10 avisar de que se cambia la exp ganada )
	// si en este nuevo nivel desbloquea alguna funcion nueva o pasa al nuevo mundo, avisar con un mensaje
	if($newLevel < 25) {
		$msg = "⚠️ ";
		if($newLevel == 2) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Acabas de desbloquear la función !avatarpj, ¡ya puedes utilizar un avatar personalizado para tu personaje!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 3) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>A partir de ahora podrás conseguir botellas de experiencia para tu personaje con la función !slots (o !777). Consulta la tabla de premios bonus con</b> /ayuda_slots".PHP_EOL;
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		//}  else if($newLevel == 4) {
		//	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		//	$msg = $msg."<b>A partir de ahora podrás entrar en el coliseo y luchar junto a otros guerreros por la victoria. ¡Participa tantas veces como quieras escribiendo \"!coliseo entrar\"!</b> /ayuda_slots".PHP_EOL;
		//	sleep(1);
		//	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		// kkkkkkkkkkkkkkkkkkkkk
		} else if($newLevel == 5) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Acabas de obtener un arma nueva, y con ella has desbloqueado la función !atacar, ¡ya puedes enfrentarte a los jefes de las zonas en las que te encuentres!".PHP_EOL;
			$msg = $msg."Como sigues en el área de entrenamiento, cuando uses la función podrás practicar con una babosa sencilla de eliminar. Al ser de prácticas, el tiempo de reaparición del enemigo será mucho menor de lo habitual, ¡practica tantas veces como quieras!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 6) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Acabas de obtener un escudo nuevo, y con él se te permite llegar al área de entrenamiento avanzado. A partir de ahora te enfrentarás a los verdaderos jefes de entrenamiento con la función !atacar (también con tiempo de reaparición reducido), además de poder unirte a un clan con la función !unirme. ¡Buena suerte en tu aventura!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 7) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Te estás acostumbrando a luchar y ahora aprendes más rápido, te sientes con más fuerza.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 8) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Te sabes de memoria cómo afrontar una batalla, ahora eres más ágil en combate.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 9) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Tu estado ha vuelto a la normalidad.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 10) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>El área de entrenamiento ya no es lugar para ti, es hora de emprender tu verdadera aventura, y el primer paso pasa por atravesar el bosque tenebroso.</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 11) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Tu personaje se ha fortalecido bastante, has aprendido todo lo necesario para emprender tu aventura en solitario en cualquier rincón del mundo.</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora puedes luchar contra otros Rocosos de Demisuke utilizando !pvp seguido de su nombre de usuario. Consulta la </b>/ayuda_PVP_rocosos<b> para más información.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 12) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Te estás llenando de picaduras de insectos. Atravesar el bosque está siendo más duro de lo que parecía...</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 13) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Te has acostumbrado a las picaduras de los insectos y ahora tu defensa parece fortalecerse en momentos de debilidad.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 14) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Tu estado ha vuelto a la normalidad.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 15) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>A partir de ahora tus puntos de heroicidad otorgarán mayor poder a la hora de combatir. ¡No te olvides de usar !boton con frecuencia!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		//} else if($newLevel == 16) {
		//	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		//	$msg = $msg."<b>Llevas tanto tiempo lejos de casa que tus poderes te están cambiando la vida. ¡Has logrado tu primera invocación! Ahora podrás atacar más veces a otros jugadores y serás más fuerte.</b>";
		//	sleep(1);
		//	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 17) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Te acabas de adentrar en las profundidades del bosque tenebroso, ¡buena suerte!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 18) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>El bosque cada vez es más y más siniestro, en cuanto cae el sol la inseguridad se apodera de ti.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 19) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Has superado tus miedos con nota. Ya no parece que le temas a la oscuridad del bosque.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 20) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>El bosque se ha quedado atrás, ¡te doy la bienvenida a la selva!</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones. Además, obtendrás una botella de experiencia gratis al subir de nivel.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 21) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>La selva infunde respeto. Cada paso que das lo haces con mucha precaución, prestando atención a todo tu alrededor.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 22) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>La selva es aún más profunda de lo que parecía nada más avistarla. Has perdido tanto el sentido de la orientación que ni siquiera podrías volver a casa.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		//} else if($newLevel == 23) {
		//	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		//	$msg = $msg."<b>¡Has logrado una nueva invocación!</b>";
		//	sleep(1);
		//	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 24) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Has superado tus miedos con nota. Ya no parece que le temas a la oscuridad del bosque.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		}
	} else if($newLevel < 50) {
		$msg = "⚠️ ";
		if($newLevel == 25) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>A partir de ahora tus puntos de heroicidad otorgarán aun más poder a la hora de combatir. ¡No te olvides de usar !boton con frecuencia!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 28) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Estás llegando al fondo de la selva, las temperaturas empiezan a no ser humanas, el frío cada vez es más intenso... ¿qué habrá al final de la selva?</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 30) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Acabas de llegar a un glaciar oculto bajo tierra. No parece que el ser humano haya estado por aquí... O en todo caso, no parece que ningún ser humano que ha estado aquí haya vuelto con vida a la superficie.</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 37) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Estás en el fondo del glaciar. Atrás queda la superficie fría cercana a la selva, y parece que te estás adaptando a las bajas temperaturas. ¡Tu rocosidad es cada vez mayor!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 40) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = $msg."<b>Parece que al final del glaciar se encuentra el portal que permite abandonar el mundo real para adentrarte en la peligrosa ruta hacia el Inframundo. ¿Serás capaz de derrotar a los guardianes del portal?</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		}
	} else if($newLevel < 75) {
		else if($newLevel == 50) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Los guardianes del portal ya son historia para ti. De hecho, quizás el mundo real también lo sea... Lo sobrenatural comienza ahora, en lo que parece ser una oscura cueva mitológica. ¡Hora de explorar un mundo desconocido!</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 55) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>El tono de las paredes por esta zona parecen diferentes. Has caminado mucho, debes andar ya en las profundidades de estas cuevas...</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 60) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>La cueva comienza a quemar, a partir de aquí es mejor no tocar las paredes con las manos desnudas, el Infierno está cada vez más cerca, pero el camino a recorrer se hará eterno...</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 68) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Cada vez hay más luz al fondo del pasaje. No por un sol que ilumine un cielo, sino por fuego que parece inundar el camino. A partir de ahora tendrás que tomar más medidas de precaución contra el fuego...</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 70) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>¡Porras! El Infierno está a un paso, sin embargo toda la zona está repleta de guardianes que custodian la entrada, creando así un portal prácticamente infranqueable. Parece que solo los Elegidos podrán atravesar el portal... ¿conseguirás alcanzar la meta?</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		}
	} else {
		else if($newLevel == 79) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Tu rocosidad ha aumentado a niveles estratosféricos. Todavía no consigues avanzar demasiado, pero la protección del portal parece mucho más débil ahora que el primer día que llegaste. ¡Ánimo, que ya lo tienes!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 80) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Acabas de abrir las puertas del Infierno. Quién sabe si eso es bueno o es malo, todo aquí parece mortal. Es como si solo por respirar o mirar hacia adelante tu vida estuviera en grave peligro. El camino restante se prevé bastante cuesta arriba...</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 88) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Estás llegando a los límites del Infierno. ¡Parecía una tarea imposible, pero parece que lo estás logrando!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 90) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Acabas de adentrarte en el Inframundo. El ambiente es realmente turbio, solo el hecho de mirar hacia adelante convierte al Infierno en un paraíso. Continuar hacia adelante se va a hacer eterno, pero la gloria está a solo un paso...</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 98) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>Ha llegado la hora de la verdad, ya estás preparado para hacer frente al jefe final. ¡A por él!</b>".PHP_EOL;
			$msg = $msg."<b>A partir de ahora te podrás enfrentar al jefe final. Él y su guardián serán los únicos jefes a los que podrás derrotar, el resto han caído a tus pies. ¡Ahora o nunca!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		} else if($newLevel == 100) {
			apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
			$msg = "<b>¡Enhorabuena, has alcanzado la máxima experiencia, el Palacio Real del Inframundo ahora es tuyo!</b>".PHP_EOL;
			$msg = $msg."<b>Tu rocosidad es pura y contigo al mando del Inframundo el planeta estará a salvo. ¡Puedes aprovechar tu poder supremo para luchar contra los clanes más fuertes del mundo!</b>";
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
		}
	}
}
function getMaxExpFromLevel($level) {
	$exp = 0;
	if($level > 90) {
		switch($level) {
			case 91: $exp = 3014000;
					break;
			case 92: $exp = 3286000;
					break;
			case 93: $exp = 3658000;
					break;
			case 94: $exp = 4130000;
					break;
			case 95: $exp = 4702000;
					break;
			case 96: $exp = 5374000;
					break;
			case 97: $exp = 6146000;
					break;
			case 98: $exp = 7018000;
					break;
			case 99: $exp = 8000000;
					break;
			case 100: $exp = 8000000;
					break;
		}
	} else if($level > 80) {
		switch($level) {
			case 81: $exp = 2094280;
					break;
			case 82: $exp = 2172070;
					break;
			case 83: $exp = 2250625;
					break;
			case 84: $exp = 2329950;
					break;
			case 85: $exp = 2410050;
					break;
			case 86: $exp = 2490930;
					break;
			case 87: $exp = 2572595;
					break;
			case 88: $exp = 2655100;
					break;
			case 89: $exp = 2740000;
					break;
			case 90: $exp = 2842000;
					break;
		}
	} else if($level > 70) {
		switch($level) {
			case 71: $exp = 1431355;
					break;
			case 72: $exp = 1492520;
					break;
			case 73: $exp = 1554400;
					break;
			case 74: $exp = 1617000;
					break;
			case 75: $exp = 1680325;
					break;
			case 76: $exp = 1744380;
					break;
			case 77: $exp = 1809170;
					break;
			case 78: $exp = 1874700;
					break;
			case 79: $exp = 1940975;
					break;
			case 80: $exp = 2017070;
					break;
		}
	} else if($level > 60) {
		switch($level) {
			case 61: $exp = 920330;
					break;
			case 62: $exp = 966820;
					break;
			case 63: $exp = 1013975;
					break;
			case 64: $exp = 1061800;
					break;
			case 65: $exp = 1110300;
					break;
			case 66: $exp = 1159480;
					break;
			case 67: $exp = 1209345;
					break;
			case 68: $exp = 1259900;
					break;
			case 69: $exp = 1311150;
					break;
			case 70: $exp = 1370900;
					break;
		}
	} else if($level > 50) {
		switch($level) {
			case 51: $exp = 541705;
					break;
			case 52: $exp = 575470;
					break;
			case 53: $exp = 609850;
					break;
			case 54: $exp = 644850;
					break;
			case 55: $exp = 680475;
					break;
			case 56: $exp = 716730;
					break;
			case 57: $exp = 753620;
					break;
			case 58: $exp = 791150;
					break;
			case 59: $exp = 829325;
					break;
			case 60: $exp = 874500;
					break;
		}
	} else if($level > 40) {
		switch($level) {
			case 41: $exp = 279980;
					break;
			case 42: $exp = 302470;
					break;
			case 43: $exp = 325525;
					break;
			case 44: $exp = 349150;
					break;
			case 45: $exp = 373350;
					break;
			case 46: $exp = 398130;
					break;
			case 47: $exp = 423495;
					break;
			case 48: $exp = 449450;
					break;
			case 49: $exp = 476000;
					break;
			case 50: $exp = 508550;
					break;
		}
	} else if($level > 30) {
		switch($level) {
			case 31: $exp = 116655;
					break;
			case 32: $exp = 129820;
					break;
			case 33: $exp = 143500;
					break;
			case 34: $exp = 157700;
					break;
			case 35: $exp = 172425;
					break;
			case 36: $exp = 187680;
					break;
			case 37: $exp = 203470;
					break;
			case 38: $exp = 219800;
					break;
			case 39: $exp = 236675;
					break;
			case 40: $exp = 258050;
					break;
		}
	} else if($level > 20) {
		switch($level) {
			case 21: $exp = 33800;
					break;
			case 22: $exp = 39570;
					break;
			case 23: $exp = 45725;
					break;
			case 24: $exp = 52280;
					break;
			case 25: $exp = 59255;
					break;
			case 26: $exp = 66675;
					break;
			case 27: $exp = 74570;
					break;
			case 28: $exp = 82960;
					break;
			case 29: $exp = 91850;
					break;
			case 30: $exp = 104000;
					break;
		}
	} else if($level > 10) {
		switch($level) {
			case 11: $exp = 5130;
					break;
			case 12: $exp = 6680;
					break;
			case 13: $exp = 8390;
					break;
			case 14: $exp = 10275;
					break;
			case 15: $exp = 12365;
					break;
			case 16: $exp = 14685;
					break;
			case 17: $exp = 17265;
					break;
			case 18: $exp = 20140;
					break;
			case 19: $exp = 23350;
					break;
			case 20: $exp = 28400;
					break;
		}
	} else {
		switch($level) {
			case 1: $exp = 30;
					break;
			case 2: $exp = 100;
					break;
			case 3: $exp = 225;
					break;
			case 4: $exp = 410;
					break;
			case 5: $exp = 660;
					break;
			case 6: $exp = 980;
					break;
			case 7: $exp = 1375;
					break;
			case 8: $exp = 1855;
					break;
			case 9: $exp = 2435;
					break;
			case 10: $exp = 3720;
					break;
		}
	}
	return $exp;
}

function getLevelBar($exp, $level) {
	$maxLevelExp = getMaxExpFromLevel($level);
	if($level > 1) {
		$maxPrevLevelExp = getMaxExpFromLevel($level - 1);
	} else {
		$maxPrevLevelExp = 0;
	}
	$maxBar = $maxLevelExp - $maxPrevLevelExp;
	$expBar = $exp - $maxPrevLevelExp;
	(float)$fullExp = ($expBar / $maxBar) * 100;
	(float)$fullExp = floor($fullExp * 100) / 100;
	$shortExp = floor($fullExp);
	$textbar = "";
	for($i=1; $i<11; $i++) {
		if($shortExp >= ($i*10)) {
			$textBar = $textBar."◼️";
		} else {
			$textBar = $textBar."◻️";
		}
	}
	$textBar = $textBar." ".$fullExp."%";
	return $textBar;
}

function chooseBoss($level) {
	if($level == 5) {
		$id = -4;
	} else if ($level < 10) {
		if($level == 6) {
			$bossTicket = rand(1,2);
		} else if($level == 7) {
			$bossTicket = rand(1,3);
		} else {
			$bossTicket = rand(1,4);
		}
		switch($bossTicket) {
			case 1: $id = -6;
					break;
			case 2: $id = -7;
					break;
			case 3: $id = -8;
					break;
			case 4: $id = -9;
					break;
		}
	} else if ($level < 20) {
		if($level < 12) {
			$bossTicket = 1;
		} else if($level < 14) {
			$bossTicket = rand(1,2);
		} else if($level < 16) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -11;
					break;
			case 2: $id = -14;
					break;
			case 3: $id = -16;
					break;
			case 4: $id = -17;
					break;
			case 5: $id = -18;
					break;
		}
	} else if ($level < 30) {
		if($level < 23) {
			$bossTicket = rand(1,2);
		} else if($level < 25) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -21;
					break;
			case 2: $id = -23;
					break;
			case 3: $id = -25;
					break;
			case 4: $id = -26;
					break;
			case 5: $id = -27;
					break;
		}
	} else if ($level < 40) {
		if($level < 12) {
			$bossTicket = 1;
		} else if($level < 32) {
			$bossTicket = rand(1,2);
		} else if($level < 35) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -31;
					break;
			case 2: $id = -32;
					break;
			case 3: $id = -34;
					break;
			case 4: $id = -36;
					break;
			case 5: $id = -38;
					break;
		}
	} else if ($level < 50) {
		if($level < 42) {
			$bossTicket = 1;
		} else if($level < 43) {
			$bossTicket = rand(1,2);
		} else if($level < 45) {
			$bossTicket = rand(1,3);
		} else if($level < 47) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -41;
					break;
			case 2: $id = -43;
					break;
			case 3: $id = -45;
					break;
			case 4: $id = -46;
					break;
			case 5: $id = -48;
					break;
		}
	} else if ($level < 60) {
		if($level < 52) {
			$bossTicket = 1;
		} else if($level < 53) {
			$bossTicket = rand(1,2);
		} else if($level < 55) {
			$bossTicket = rand(1,3);
		} else if($level < 57) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -51;
					break;
			case 2: $id = -52;
					break;
			case 3: $id = -54;
					break;
			case 4: $id = -56;
					break;
			case 5: $id = -58;
					break;
		}
	} else if ($level < 70) {
		if($level < 62) {
			$bossTicket = 1;
		} else if($level < 63) {
			$bossTicket = rand(1,2);
		} else if($level < 65) {
			$bossTicket = rand(1,3);
		} else if($level < 67) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -61;
					break;
			case 2: $id = -63;
					break;
			case 3: $id = -65;
					break;
			case 4: $id = -66;
					break;
			case 5: $id = -68;
					break;
		}
	} else if ($level < 80) {
		if($level < 72) {
			$bossTicket = 1;
		} else if($level < 72) {
			$bossTicket = rand(1,2);
		} else if($level < 75) {
			$bossTicket = rand(1,3);
		} else if($level < 78) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -71;
					break;
			case 2: $id = -72;
					break;
			case 3: $id = -75;
					break;
			case 4: $id = -77;
					break;
			case 5: $id = -78;
					break;
		}
	} else if ($level < 90) {
		if($level < 83) {
			$bossTicket = rand(1,2);
		} else if($level < 85) {
			$bossTicket = rand(1,3);
		} else if($level < 87) {
			$bossTicket = rand(1,4);
		} else {
			$bossTicket = rand(1,5);
		}
		switch($bossTicket) {
			case 1: $id = -81;
					break;
			case 2: $id = -82;
					break;
			case 3: $id = -85;
					break;
			case 4: $id = -86;
					break;
			case 5: $id = -88;
					break;
		}
	} else if ($level < 98) {
		if($level < 94) {
			$bossTicket = rand(1,2);
		} else if($level < 97) {
			$bossTicket = rand(1,3);
		} else {
			$bossTicket = rand(1,4);
		}
		switch($bossTicket) {
			case 1: $id = -91;
					break;
			case 2: $id = -93;
					break;
			case 3: $id = -95;
					break;
			case 4: $id = -98;
					break;
		}
	} else {
		$bossTicket = rand(1,2);
		switch($bossTicket) {
			case 1: $id = -98;
					break;
			case 2: $id = -100;
					break;
		}
	}
	return $id;
}

function removeEmoji($text){
    $result = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
	$result = str_replace("*⃣‍", "", $result);
	$result = str_replace("🧀", "", $result);
	$result = str_replace("🦃", "", $result);
	$result = str_replace("🦀", "", $result);
	$result = str_replace("🦂", "", $result);
	$result = str_replace("🦄", "", $result);
	$result = str_replace("🦁", "", $result);
	$result = str_replace("🤘‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍", "", $result);
	$result = str_replace("🤘", "", $result);
	$result = str_replace("🤘", "", $result);
	$result = str_replace("🤘", "", $result);
	$result = str_replace("🤘", "", $result);
	$result = str_replace("🤘", "", $result);
	$result = str_replace("🤖", "", $result);
	$result = str_replace("🤕", "", $result);
	$result = str_replace("🤒", "", $result);
	$result = str_replace("🤐", "", $result);
	$result = str_replace("🤔", "", $result);
	$result = str_replace("🤗", "", $result);
	$result = str_replace("🤓", "", $result);
	$result = str_replace("🤑", "", $result);
	return $result;
}

function getPlayerBattleResult($winnerName, $loserName, $lucky) {
	$log = "";
	if($lucky == 0) {
			$storedStandardVictory = array(
									"¡Menudo sprint inicial de ".$winnerName."! Parecía que estaba practicando contra un muñeco y ha ejecutado sus golpes como un reloj, ".$loserName." no ha podido oponer gran resistencia. Lo ha intentado, al menos.",
									"Nada más comenzar ".$loserName." se ha aprovechado de su superior velocidad frente al rival y ha logrado esquivar muchos de los golpes de su enemigo. No obstante se ha agotado bastante rápido y ".$winnerName." ha podido contraatacar y derrotar a su rival. Una batalla muy dura e intensa que se ha decidido por el cansancio.",
									"Una batalla muy igualada, de principio a fin, ".$winnerName." ha ido a buscar directamente los puntos débiles del enemigo mientras que ".$loserName." ha apostado por atacar sin parar. ".$winnerName." llevaba una mejor táctica, y varios golpes críticos seguidos le han dado la victoria.",
									"La estrategia de ".$winnerName." ha sido refugiarse en su defensa, y ha aguantado las embestidas constantes del rival. ".$loserName." no ha podido con una defensa tan férrea, necesitará encontrar más puntos débiles para la próxima vez.",
									"¡Duelo mano a mano! Parecía un duelo entre dos vaqueros que se juegan el destino de su vida a una sola bala. ".$loserName." ha estado mas lento que su rival, por lo que ".$winnerName." ha podido atacar primero y llevarse la victoria.",
									"Batalla aburrida donde las haya, ".$loserName." parecía estar echándose una siesta incluso, y ".$winnerName." que parecía con algo menos de sueño se ha llevado la victoria.",
									"La ley del más fuerte. ".$loserName." ha visto a ".$winnerName." de frente y muy de cerca y ha decidido que lo mejor era retirarse antes de empezar, así que ha perdido la oportunidad de ganar este duelo.",
									"Guerra de miradas, ".$winnerName." y ".$loserName." se han quedado quietos y se han mirado fijamente un buen rato. ".$loserName." ha sido el primero en parpadear así que ".$winnerName." ha sido el primero en atacar. A partir de ahí coser y cantar, una victoria extraña pero que vale igual que cualquier otra.",
									"Batalla dominada de principio a fin por ".$winnerName." que no ha encontrado rival en ".$loserName.". En ningún momento parecía que iba a oponer resistencia seria, pero al finalizar la batalla se ha escuchado una promesa al aire: la de aumentar su rocosidad para el próximo combate.",
									"Parecía que ".$winnerName." era mucho más fuerte que ".$loserName." desde el primer minuto de la batalla, y el transcurso de la misma así lo ha demostrado. Se ha llevado una victoria que parecía escrita en un guion programado."
									);
			$n = sizeof($storedStandardVictory) - 1;
			$n = rand(0,$n);
			$log = $log.$storedStandardVictory[$n];
	} else {
			$storedUnexpectedVictory = array(
										"¡Qué mala pata! ".$loserName." es muy superior al rival, pero se ha confiado y ".$winnerName." se ha aprovechado de ello y ha ido directo a atacar puntos débiles. Se ha llevado la victoria por sorpresa.",
										"Inexplicable batalla en la ".$loserName." tenía todas las de ganar y sin embargo se ha hecho daño al intentar atacar a su rival y ha perdido cualquier oportunidad de ganar. ".$winnerName." se ha topado con una victoria que no se esperaba.",
										"Dominio de principio a fin de ".$loserName.", quien ha llevado la manija de la guerra durante toda la batalla, hasta que cuando el rival ya estaba debilitado, ".$winnerName." ha golpeado desde el mismo suelo a las piernas de su rival, le ha hecho caer y se lo ha cargado desde el suelo, una remontada totalmente inesperada.",
										"El clan ".$loserName." es superior al rival. Ha comenzado atacando con varios críticos y enseguida se han puesto por delante, pero en mitad de la batalla se ha puesto a llover y eso ha beneficiado a ".$winnerName.", que llegaban a la guerra mejor preparados para luchar bajo todo tipo de condiciones climáticas y se ha podido aprovechar de los resbalones del rival.",
										"Superioridad de ".$winnerName.", ".$loserName." no tiene nada que hacer contra un rival así. El problema es que sobre el papel el resultado parecía justo el contrario, ya que la diferencia entre los dos rivales era bastante clara.",
										"¿Por qué ".$loserName." se movía lentamente? Ha intentado hacerlo bonito y se ha adornado demasiado. ".$winnerName.", que venía a esta batalla a lo que surgiera, ha tenido el viento a favor y se ha llevado la victoria sin despeinarse.",
										"Una batalla muy encarrilada para ".$loserName.", hasta que se ha distraído con el paisaje y ".$winnerName." le ha hecho unos combos de críticos que ha dejado a su rival en el suelo.",
										"¡Menuda broma! ".$loserName." es superior a ".$winnerName.", pero no lo ha demostrado y ha perdido una batalla que tenía ganada antes de empezar. ¡".$loserName." debería subir de nivel y espabilar más!",
										"No hay duda de que ".$loserName." es muy superior al rival. Lo que sí que hay duda es en la manera que ha tenido de hacer el ridículo. ".$winnerName.", que se tropieza cada tres pasos que da, se ha olvidado de su débil condición física comparada con la de su rival y ha atacado como si no hubiera un mañana, llevándose así la victoria.",
										"La velocidad de ".$loserName." es increíble, pero ".$winnerName." ha aprovechado su fuerza para contrarrestar lo mucho que le superaba en todo su rival. De algún modo se las ha arreglado para llevarse una victoria que no le correspondía."
										);
			$n = sizeof($storedUnexpectedVictory) - 1;
			$n = rand(0,$n);
			$log = $log.$storedUnexpectedVictory[$n];
	}
	return $log;
}

function getGroupBattleResult($homeGroupName, $homeGroupMembers, $awayGroupName, $awayGroupMembers, $winnerName, $loserName, $lucky, $homeAvatar, $awayAvatar, $home_id, $away_id, $mvp) {
	$log = "";
	$homeGroupName = removeEmoji($homeGroupName);
	$awayGroupName = removeEmoji($awayGroupName);
	$winnerName = removeEmoji($winnerName);
	$loserName = removeEmoji($loserName);
	if($lucky == 0) {
			$storedStandardVictory = array(
									"¡Vaya comienzo del clan ".$winnerName."! Parecía que llevaban días preparados para la guerra y han ido todos a una coordinados estupendamente, incluso uno de los rocosos de ".$loserName." ha salido corriendo. El resto sin embargo ha luchado por su honor y ha logrado derribar la defensa rival, pero ".$mvp." ha estado impecable y no ha sido suficiente para llevarse la victoria...",
									"El clan ".$loserName." se ha aprovechado de su superior velocidad frente a los rivales y ha logrado cargarse a medio equipo en un santiamén. En cuanto se han visto muy superiores en la batalla, dos de sus miembros se han ido a descansar y han dejado que el resto hiciera el trabajo. ".$winnerName." se ha dado cuenta rápido de la situación y ha optado por jugárselo todo al ataque. No les ha ido mal, porque ".$mvp." ha encontrado el punto débil del rival, y sus compañeros han logrado remontar y llevarse la victoria, eso sí, sudando más de lo que podían imaginar.",
									"Una batalla muy igualada, parecía una partida de ajedrez, ".$winnerName." ha ido a buscar directamente los puntos débiles del enemigo mientras que ".$loserName." se ha organizado en subgrupos y han atacado por igual a todo el equipo rival. Pero un punto débil es un punto débil, el clan ".$winnerName." ha encontrado a tiempo lo que buscaba y ha logrado una serie de golpes críticos que le han dado la victoria. ".$mvp." ha estado sensacional en su ataque.",
									"El clan ".$winnerName." se ha refugiado en su defensa, ha utilizado al rocoso con más vida de sus filas como tanque y todos se han refugiado detrás de él para atacar excepto ".$mvp." que ha actuado de protagonista. Parece que les ha salido bien, cuando ".$loserName." ha logrado acabar con el tanque no ha tenido fuerzas para terminar con el resto de miembros rivales y ha perdido la batalla.",
									"¡Qué descontrol! Ambos clanes han ido a por su rival sin pensar de qué manera atacar o defender, y parecía una oda a la muerte aleatoria. Algunos miembros del clan ".$loserName." se han llegado a atacar entre sí, quizás por eso ".$winnerName." se ha llevado la victoria sin saber muy bien qué ha hecho para lograrlo. De hecho, uno de sus miembros está llegando ahora al lugar de la batalla. Un poco tarde, rocoso, te has perdido una lección magistral de ".$mvp." al frente.",
									"Al principio todo ha transcurrido como una guerra estándar, pero detrás de la masa de miembros de ".$loserName." se ha podido observar a dos de sus miembros echándose una siesta... ¡Vuestro clan os necesita! O al menos os necesitaba, porque ".$winnerName." ya se ha llevado la victoria. ".$mvp." todavía no se explica cómo ha podido derrotar a tanta gente con tanta facilidad.",
									"Extraña batalla. De hecho, ni la ha habido. ".$loserName." se ha presentado ante el líder de ".$winnerName." con una especie de pergamino donde le entregaba la victoria y unos terrenos con cabras y huerta a cambio de huir sin un solo rasguño. El acuerdo se ha sellado con un abrazo, y ".$loserName." ha ganado... ha ganado volver a casa sano y salvo dejando por el camino una victoria gratis para su rival. Las negociaciones del clan las debería llevar ".$mvp." a partir de ahora por haber logrado provocar una retirada del enemigo.",
									"Cuando todo estaba a punto para comenzar, los miembros del clan ".$winnerName." se han puesto a bailar de manera coordinada sin descanso al son de los pasos que marcaba ".$mvp.". ".$loserName." ha interpretado el ritual como una danza de guerra y ha intentado imitar sus movimientos, pero han acabado tan confusos que el rival ha lanzado su ataque al unísono cuando menos se lo esperaban. ¡El baile ha surtido efecto! ...Y la superioridad de fuerza también.",
									"Batalla dominada de principio a fin por ".$mvp." del clan ".$winnerName." que no ha encontrado rival en el clan ".$loserName.". En ningún momento parecía que iban a oponer resistencia seria, lo han intentado todo, pero necesitan ser más fuertes para ganar esta guerra.",
									"El clan ".$winnerName." se ha aprovechado de que el clan ".$loserName." no parecía tener los miembros suficientes en sus filas como para atacar de manera organizada y se han concentrado en atacar sin parar, llevándose la victoria sin demasiada complicación. ".$mvp." ha sido el rocoso que más ataques ha realizado hoy."
									);
			$n = sizeof($storedStandardVictory) - 1;
			$n = rand(0,$n);
			$log = $log.$storedStandardVictory[$n];
	} else {
			$storedUnexpectedVictory = array(
										"¡Qué mala pata! ".$loserName." es muy superior al rival, y muchos de sus rocosos se toman esta batalla como un juego, atacando solo con una mano, pero han empezado los desastres... Uno de sus miembros ha tropezado y se ha caído al suelo, a otro se le ha caído el arma al suelo y otro se ha hecho daño a sí mismo, y el clan ".$winnerName." se ha llevado la victoria por sorpresa. ".$mvp." aún no se lo cree, pero parece que ha logrado derrotar al rival con la mirada.",
										"Inexplicable batalla en la que el clan ".$loserName." tenía todas las de ganar y sin embargo algunos de sus miembros han descubierto lo que es el fuego amigo y se han convertido ¿involuntariamente? en aliados del clan ".$winnerName." que se ha topado con una victoria que no se esperaba y ".$mvp." ha desplegado un poder descomunal de principio a fin.",
										"Dominio de principio a fin de ".$loserName.", quien ha llevado la manija de la guerra durante toda la batalla, hasta que cuando el rival ya estaba debilitado y comenzaba el camino de vuelta a casa para los rocosos, han caído en varias trampas de ".$winnerName." y se han debilitado antes que su rival, por lo que ha habido una remontada inesperada en la prórroga. El rocoso artífice de la mayoría de trampas ha sido ".$mvp." en modo ninja.",
										"El clan ".$loserName." es superior al rival. Ha comenzado atacando con varios críticos y enseguida se han puesto por delante, pero en mitad de la batalla se ha puesto a llover y eso ha beneficiado a ".$winnerName.", que llegaban a la guerra mejor preparados para luchar bajo todo tipo de condiciones climáticas y se ha podido aprovechar de los resbalones del rival. ".$mvp." se imaginaba que hoy podía llover, por lo que esta victoria le pertenece más que a nadie.",
										"El clan ".$winnerName." es demasiado débil para luchar contra ".$loserName.". Lo sabe, y se ha aprovechado del terreno de batalla para esconderse en los lugares más inesperados. Esto ha desconcertado al rival, que no sabía donde atacar. ".$loserName." ha atacado a diestro y siniestro y su superior fuerza ha logrado terminar con medio equipo rival, pero en cuanto el rival ha salido de su escondite por orden de ".$mvp.", se ha aprovechado del agotamiento sufrido al inicio para llevarse una inesperada victoria.",
										"¿Por qué ".$loserName." no ha atacado? Parecían estatuas, se han visto muy superiores al rival, y han querido derrotar al clan ".$winnerName." con el menor esfuerzo posible. Se han confiado y no lo han conseguido. Aun así, ".$mvp." ha comandado a su clan hacia la victoría con total maestría.",
										"Una batalla muy encarrilada para ".$loserName.", hasta que se ha distraído por los coloridos atuendos de ".$winnerName.". Una distracción que les ha costado la victoria. Ahora, el clan ".$winnerName." está pensando en utilizar armadura de clan reglamentaria chillona y utilizarlo como su arma secreta. Lo más probable es que no tenga éxito, ".$mvp." prefiere liderar a su clan hacia la victoria con atuendos más camuflados.",
										"¡Aquí hay gato encerrado! ".$loserName." es infinitamente superior a ".$winnerName.", pero éstos últimos se han traído los animales de ".$mvp." al campo de batalla y han logrado decantar la balanza por el lado más imprevisto. ¡Ahora el clan ".$loserName." reclama justicia!",
										"No hay duda de que el clan ".$loserName." es muy superior al rival. Lo que sí que hay duda es en la manera que han tenido de perder ante el clan ".$winnerName.", que llegaban al campo de batalla asustados y sabiendo que eran el clan más débil y ".$mvp." ha logrado alentar a su clan hasta lograr llevarse una victoria inesperada.",
										"El clan ".$loserName.", muy superior al clan ".$winnerName.", ha dominado la batalla sin problemas hasta que se han quedado sin provisiones y no han tenido fuerzas para derrotar a su rival. Tal vez alguno de sus miembros necesite mejorar un poco más su barra de vida... O aprender de ".$mvp.", que parecía haberse llevado un bolsillo mágico lleno de munición al campo de batalla."
										);
			$n = sizeof($storedUnexpectedVictory) - 1;
			$n = rand(0,$n);
			$log = $log.$storedUnexpectedVictory[$n];
	}
	$imageURL = rand(0,29);
	$imageShortURL = "/img/battle_".$imageURL.".jpg";
	$imageURL = dirname(__FILE__).$imageShortURL;
	header('Content-type: image/jpeg');
	$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
	if(strlen($homeAvatar) > 5) {
		$homeAvatarType = substr(strtolower($homeAvatar), strlen($homeAvatar) - 3);
		if($homeAvatarType == "jpg") {
			$home_image = imagecreatefromjpeg($homeAvatar);
		} else if($homeAvatarType == "png") {
			$home_image = imagecreatefrompng($homeAvatar);
		} else {
			$home_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
			$homeAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		}
	} else {
		$home_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$homeAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
	}
	if(strlen($awayAvatar) > 5) {
		$awayAvatarType = substr(strtolower($awayAvatar), strlen($awayAvatar) - 3);
		if($awayAvatarType == "jpg") {
			$away_image = imagecreatefromjpeg($awayAvatar);
		} else if($awayAvatarType == "png") {
			$away_image = imagecreatefrompng($awayAvatar);
		} else {
			$away_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
			$awayAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		}
	} else {
		$away_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$awayAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
	}
	$textColor = imagecolorallocate($jpg_image, 90, 57, 22);
	$starsColor = imagecolorallocate($jpg_image, 255, 255, 100);
	$font_path = dirname(__FILE__)."/img/segoe.ttf";
	list($base_width, $base_height) = getimagesize('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
	list($home_width, $home_height) = getimagesize($homeAvatar);
	list($away_width, $away_height) = getimagesize($awayAvatar);
	/*
	if(is_numeric($home_width) && is_numeric($home_height) && $home_width > 0 && $home_height > 0) {
		error_log("Loading image ".$homeAvatar);
	} else {
		$home_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$homeAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		list($home_width, $home_height) = getimagesize($homeAvatar);
	}
	if(is_numeric($away_width) && is_numeric($away_height) && $away_width > 0 && $away_height > 0) {
		error_log("Loading image ".$awayAvatar);
	} else {
		$away_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$awayAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		list($away_width, $away_height) = getimagesize($awayAvatar);
	}
	*/
	$home_ratio = $home_width / $home_height;
	if($home_ratio > 1) {
		$home_scalewidth = 250;
		$home_scaleheight = floor(250 / $home_ratio);
	}
	else {
		$home_scalewidth = 250 * $home_ratio;
		$home_scaleheight = 250;
	}
	$home_position = $home_scalewidth - $home_scaleheight;
	if($home_position == 0) {
		$home_x = 180;
		$home_y = 100;
	} else if($home_position > 0) {
		$home_x = 180;
		$home_y = 100 + floor($home_position / 2);
	} else {
		$home_x = 180 + floor(($home_position * -1) / 2);
		$home_y = 100;
	}
	$away_ratio = $away_width / $away_height;
	if($away_ratio > 1) {
		$away_scalewidth = 250;
		$away_scaleheight = floor(250 / $away_ratio);
	}
	else {
		$away_scalewidth = 250 * $away_ratio;
		$away_scaleheight = 250;
	}
	$away_position = $away_scalewidth - $away_scaleheight;
	if($away_position == 0) {
		$away_x = 850;
		$away_y = 100;
	} else if($away_position > 0) {
		$away_x = 850;
		$away_y = 100 + floor($away_position / 2);
	} else {
		$away_x = 850 + floor(($away_position * -1) / 2);
		$away_y = 100;
	}
	$home_name = $homeGroupName;
	$away_name = $awayGroupName;
	$home_nameX = 155;
	$home_namealign = 33 - strlen($home_name);
	if($home_namealign > 0) {
		$home_nameX = $home_nameX + ($home_namealign * 5);
	}
	$away_nameX = 800;
	$away_namealign = 33 - strlen($away_name);
	if($away_namealign > 0) {
		$away_nameX = $away_nameX + ($away_namealign * 5);
	}
	$res_image = imagecreatetruecolor($base_width, $base_height);
	imagecopyresampled($res_image, $jpg_image, 0, 0, 0, 0, $base_width, $base_height, $base_width, $base_height);
	imagecopyresampled($res_image, $home_image, $home_x, $home_y, 0, 0, $home_scalewidth, $home_scaleheight, $home_width, $home_height);
	imagecopyresampled($res_image, $away_image, $away_x, $away_y, 0, 0, $away_scalewidth, $away_scaleheight, $away_width, $away_height);
	$home_name = wordwrap($home_name, 33, "\n", false);
	if(strlen($home_name) > 90) {
		$home_name = substr($home_name, 0, 87);
		$home_name = rtrim($home_name);
		$home_name = $home_name."...";
	}
	$away_name = wordwrap($away_name, 33, "\n", false);
	if(strlen($away_name) > 90) {
		$away_name = substr($away_name, 0, 87);
		$away_name = rtrim($away_name);
		$away_name = $away_name."...";
	}
	$home_stars = getClanLevelByMembers($homeGroupMembers);
	$home_stars = str_replace("【", "", $home_stars);
	$home_stars = str_replace("】", "", $home_stars);
	$away_stars = getClanLevelByMembers($awayGroupMembers);
	$away_stars = str_replace("【", "", $away_stars);
	$away_stars = str_replace("】", "", $away_stars);
	$result_text = $log;
	$result_text = wordwrap($result_text, 140, "\n", false);
	imagettftext($res_image, 26, 0, 230, 380, $starsColor, $font_path, $home_stars);
	imagettftext($res_image, 26, 0, 910, 380, $starsColor, $font_path, $away_stars);
	imagettftext($res_image, 16, 0, $home_nameX, 410, $textColor, $font_path, $home_name);
	imagettftext($res_image, 16, 0, $away_nameX, 410, $textColor, $font_path, $away_name);
	imagettftext($res_image, 12, 0, 140, 565, $textColor, $font_path, $result_text);
	imagejpeg($res_image, $imageURL, 100);
	$target_url = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
	$file_name_with_full_path = realpath($imageURL);
	apiRequest("sendChatAction", array('chat_id' => $away_id, 'action' => "upload_photo"));
	usleep(300000);
	$post = array('chat_id' => $away_id, 'photo' =>'@'.$file_name_with_full_path);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$target_url);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($ch);
	curl_close ($ch);
	$target_url = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
	$file_name_with_full_path = realpath($imageURL);
	apiRequest("sendChatAction", array('chat_id' => $home_id, 'action' => "upload_photo"));
	usleep(300000);
	$post = array('chat_id' => $home_id, 'photo' =>'@'.$file_name_with_full_path);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$target_url);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($ch);
	curl_close ($ch);
	imagedestroy($res_image);
}

function bossBattleResults($win, $lucky) {
	if($win == 1) {
		if($lucky == 1) {
			$storedUnexpectedVictory = array(
										"Tu rival era muy superior a ti, y lo ha visto tan fácil que se ha despistado y lo has aprovechado para pillarlo desprevenido y salir victorioso del combate.",
										"Buen inicio de combate, dominando el ataque y protegiéndote bien con tu defensa, pero tu rival logró romper tu defensa y dejarte prácticamente K.O., aunque no llegó a tiempo y la victoria fue tuya.",
										"Combate de tú a tú pese a ser inferior a tu rival. Has logrado intimidar a tu enemigo actuando de manera muy rápida, y te has llevado el combate por la mínima.",
										"¡Quién lo iba a decir! Has estado todo el combate sufriendo y atacando de manera pésima, pero cuando ibas a sentir el golpe final en tu cuerpo te has marcado un combo que ha terminado con el rival.",
										"Combate de críticos. Tu rival te ha golpeado con mucha dureza y tú has contraatacado con golpes críticos, de no ser por ellos ahora estarías mordiendo el polvo...",
										"¡Tienes demasiado poder de ataque! Tu rival era superior a ti, pero has logrado luchar con el 120% de tu fuerza ignorando toda tu defensa. Te la has jugado a una carta y te has llevado la victoria.",
										"Esto no era lo esperado, tu rival era bastante mas poderoso de lo habitual, has tenido que sudar sangre para ganar esta batalla, has estado todo el rato contra las cuerdas.",
										"¡Heróica batalla! Tu rival era mejor que tú, y lo ha demostrado a lo largo de todo el combate, pero cuando ya estabas moribundo en el suelo has conseguido derribar al rival y le has dado la vuelta a la tortilla.",
										"Combate muy igualado, las barras de vida de tu rival y tú disminuían a la misma velocidad. Eso beneficiaba al rival, algo superior a ti, pero aun así te has logrado llevar la victoria.",
										"¡Menuda locura! Tu rival ha sido superior a ti, pero una serie de combos finales con golpes críticos ha logrado contrarrestar esa falta de poder y ha provocado que la victoria sea tuya."
										);
			$n = sizeof($storedUnexpectedVictory) - 1;
			$n = rand(0,$n);
			$msg = $storedUnexpectedVictory[$n];
		} else {
			$storedStandardVictory = array(
									"La lucha ha comenzado bastante igualada, pero enseguida te has puesto por delante y no has dejado opción al rival. Ha sido una victoria cómoda sin contratiempos.",
									"No ha habido rival, has asestado el primer golpe del combate y casualmente ha sido un golpe crítico. A partir de ahí, coser y cantar, y victoria fácil.",
									"Pan comido, se te ha visto con ganas de luchar sentado para darle emoción. Te has llevado la victoria de calle, y parece que no te importaría repetir.",
									"Tu rival te ha asestado un par de golpes muy fuertes nada más comenzar la pelea que te han dejado grogui, pero tus ataques críticos le han dado la vuelta al combate y has salido victorioso.",
									"Te has mostrado muy sólido en defensa, parece como si en lugar de luchar hubieras querido poner a prueba tu resistencia física, y tu rival prácticamente no te ha quitado puntos de vida. Prueba superada.",
									"¡Cómo corres! Desde el principio del combate te has puesto a dar vueltas alrededor de tu rival y lo has desconcertado con tanto movimiento, lograste atacarle con un par de críticos por detrás y terminaste rápido el combate.",
									"¡Eres un tanque! Has luchado de tal manera que parecía que tus puntos de vida no se iban a agotar nunca, tu rival incluso parecía desesperado por momentos, nunca vio ganada esta batalla.",
									"Tus puntos de ataque han sido vitales esta vez, por cada tres golpes que tu rival lograba acertar sobre ti, tú respondías con uno igual de fuerte. Te has marcado un combo final que ha decantado el combate a tu favor.",
									"Combate extraño, primero parecía que te lo ibas a llevar de calle, pero luego tu rival cogió fuerza y te remontó hasta llevarte al límite, pero en cuanto se cansó del esfuerzo volviste a tomar el mando y la victoria cayó de tu bando.",
									"Es inexplicable, pero tu rival te ha atacado con todo y ha llevado el peso del combate, hasta que ha llegado un punto en que parecía que no podía más, y desde ese momento no ha supuesto un rival digno para ti. La victoria es tuya.",
									"¡No hay color! Te has paseado por el campo de batalla, te has llevado la victoria prácticamente sin sudar. Si vienen más así mejorarás rápido tus estadísticas."
									);
			$n = sizeof($storedStandardVictory) - 1;
			$n = rand(0,$n);
			$msg = $storedStandardVictory[$n];
		}
	} else {
		if($lucky == 1) {
			$storedUnexpectedDefeat = array(
										"Todo el combate a tu favor, te has defendido cuando debías, has atacado cuando tu rival menos se lo esperaba, eras muy superior, sin embargo un combo final del enemigo ha acabado contigo.",
										"Tu fuerza es muy superior a la del rival, pero por algún motivo no lo has demostrado y has dejado pasar una gran oportunidad de ganar una buena experiencia...",
										"Has dominado de cabo a rabo el combate, pero cuando ya tenías agotado rival has tropezado y has perdido cualquier opción de ganar. ¡Qué mala pata!",
										"Tenías la victoria en el bolsillo pero has caído en el juego de tu rival, te has despistado y no has sabido aprovechar tu fuerza. Tendrás que concentrarte más.",
										"Ardua batalla librada de tú a tú pese a que tu poder es mayor al de tu rival, sin embargo su estrategia de agotarte ha surtido efecto y no has podido con el enemigo.",
										"¡Mamma mia! Todo el combate controlado como si estuvieras jugando a un videojuego y vas y te haces daño a ti mismo. Inexplicablemente has perdido la batalla por tu mala puntería.",
										"Escueto resumen surge de esta batalla, bastante igualada, tú siendo superior al rival pero el rival aprovechando su defensa y contraataque, suficiente para ganarte.",
										"Eres muy superior al rival, pero a veces pasan cosas. Esta vez no pasó nada... literalmente. Tu rival te ha asestado un golpe muy duro, no has sabido reaccionar, te has quedado quieto y has perdido toda tu ventaja.",
										"El combate podría haberse decantado por cualquier lado. Tu fuerza es mayor que la del rival, sin embargo has luchado horrible y no has sabido cómo atacar a tu rival.",
										"Batalla muy igualada, con combos y críticos por doquier, que al final se ha acabado llevando tu rival de auténtico milagro. Podría haber sido para cualquiera.",
										"Tu rival se ha hecho el muerto, te has confiado y te ha atacado por la espalda. El enemigo sabía que tu fuerza era mayor, así que tampoco tenía más opciones para poder ganarte..."
										);
			$n = sizeof($storedUnexpectedDefeat) - 1;
			$n = rand(0,$n);
			$msg = $storedUnexpectedDefeat[$n];
		} else {
			$storedStandardDefeat = array(
										"Nada fuera de lo esperado, tu rival era muy superior a ti, y has sucumbido tal y como estaba escrito. Pero ahora sabes cómo se las gastan tus rivales por esta zona...",
										"Parecía que te lo ibas a llevar de calle, pero nada más lejos de la realidad. Tu rival tiene demasiada fuerza como para hacerle frente, no has podido con sus ataques finales.",
										"No eres rival para un enemigo de este nivel, te han dado una buena paliza. Vas a tener que mejorar un poco más tus habilidades si quieres ganar puntos de experiencia contra rivales así.",
										"¡Menudos críticos has realizado! Has conseguido dar en el blanco varias veces. Pero tu rival era claramente superior y no ha sido suficiente para llevarte la victoria, es lo que hay.",
										"Tu rival ha visto miedo en tus ojos y ha tenido un encuentro muy plácido, enseguida te ha visto tus puntos débiles y prácticamente no has opuesto resistencia.",
										"Derrota clara, de principio a fin. No hay más, prácticamente no has hecho un solo rasguño a tu rival. Deberías planear venganza contra tu enemigo cuando tu rocosidad sea mayor.",
										"Combate bastante igualado que se ha acabado decantando por la superioridad de tu rival. Tal vez entrenando un poco más logres oponer bastante más resistencia que la vivida en esta batalla...",
										"¿Qué has hecho? Parecía como si estuvieras durmiendo, el rival no ha sudado para derrotarte. Vas a tener que mejorar mucho si quieres plantar cara a rivales así.",
										"Has puesto a prueba tu resistencia tu defensa, despreocupándote de atacar, y así es muy difícil hacerle frente a un rival como el de ahora. Te ha ganado sin despeinarse.",
										"Batalla fácil, dominada de principio a fin. El problema es que ha sido el rival quien te ha dominado a ti. Vas a tener que entrenar bastante más a partir de ahora.",
										"Tus puntos de ataque no lo son todo... Te has centrado solo en atacar y tu rival ha tenido una autopista libre para enviarte golpes continuos. No has podido aguantar demasiados golpes."
										);
			$n = sizeof($storedStandardDefeat) - 1;
			$n = rand(0,$n);
			$msg = $storedStandardDefeat[$n];
		}
	}
	return $msg;
}

function bossBattle($chat_id, $link, $level, $totalPower, $playerName, $playerAvatar, $totalHP, $totalAt, $totalDef, $totalCrit, $totalSp) {
	if($level < 5 || $level > 99) {
		return 0;
	} else {
		$boss_id = chooseBoss($level);
	}
	$query = "SELECT exp_points, level, extra_points AS 'total_power', hp, attack, defense, critic, speed, avatar, extra_info FROM playerbattle WHERE user_id = ".$boss_id;
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	// mostrar la ficha del boss
	$msg = "☠ <b>FICHA DE JEFE</b> ☠".PHP_EOL.PHP_EOL;
	$bossName = substr($row['extra_info'], strpos($row['extra_info'], "(") + 1);
	$bossName = substr($bossName, 0, strpos($bossName, ")"));
	$bossInfo = substr($row['extra_info'], strpos($row['extra_info'], ")") + 2);
	$msg = $msg."<b>Nivel:</b> ".$row['level'].PHP_EOL;
	$msg = $msg."<b>Nombre:</b> <a href=\"".$row['avatar']."\">".$bossName."</a>".PHP_EOL.PHP_EOL;
	$msg = $msg."<b>Descripción:</b>".PHP_EOL;
	$msg = $msg."<i>".$bossInfo."</i>".PHP_EOL.PHP_EOL;
	$msg = $msg."<b>Estadísticas</b>".PHP_EOL;
	$msg = $msg."<pre>VID:";
	switch(strlen($row['hp'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$boss_hpstars = ratePower($row['hp']);
	$msg = $msg.$row['hp']." ".$boss_hpstars."</pre>".PHP_EOL;
	$msg = $msg."<pre>ATA:";
	switch(strlen($row['attack'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$boss_atstars = ratePower($row['attack']);
	$msg = $msg.$row['attack']." ".$boss_atstars."</pre>".PHP_EOL;
	$msg = $msg."<pre>DEF:";
	switch(strlen($row['defense'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$boss_defstars = ratePower($row['defense']);
	$msg = $msg.$row['defense']." ".$boss_defstars."</pre>".PHP_EOL;
	$msg = $msg."<pre>CRÍ:";
	switch(strlen($row['critic'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$boss_critstars = ratePower($row['critic'], 1);
	$msg = $msg.$row['critic']." ".$boss_critstars."</pre>".PHP_EOL;
	$msg = $msg."<pre>VEL:";
	switch(strlen($row['speed'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$boss_spstars = ratePower($row['speed']);
	$msg = $msg.$row['speed']." ".$boss_spstars."</pre>".PHP_EOL.PHP_EOL;
	$msg = $msg."<b>Puntos exp. por victoria:</b> ".$row['exp_points'];
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	sleep(1);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
	// calcular quien gana y si es con suerte o no
	if($level == 5) {
		$win = 1;
		$lucky = 0;
	} else if($level < ($row['level'] - 2)) {
		// si el pj es -3 niveles al del boss, 90% de palmar
		$victoryTicket = rand(1,10);
		if($victoryTicket == 10) {
			$win = 1;
			$lucky = 1;
		} else {
			$win = 0;
			$lucky = 0;
		}
	} else if($level > ($row['level'] + 2)) {
		// si es +3 al del boss, 95% de ganar
		$victoryTicket = rand(1,20);
		if($victoryTicket == 10) {
			$win = 0;
			$lucky = 1;
		} else {
			$win = 1;
			$lucky = 0;
		}	
	} else {
		// si esta ahí ahí, hora de usar el poder...
		if($totalPower >= $row['total_power']) {
			// si el poder del pj es >= que el del boss, 95% de ganar
			$victoryTicket = rand(1,20);
			if($victoryTicket == 10) {
				$win = 0;
				$lucky = 1;
			} else {
				$win = 1;
				$lucky = 0;
			}	
		} else {
			// si no, regla de tres, la exp del boss es el 100%, la exp del pj, el % -50% (y nunca < 0) que tiene de ganar
			$victoryPercent = floor((($totalPower * 100) / $row['total_power']) - 50);
			$victoryTicket = rand(1,100);
			// aqui siempre sera una lucky victoria
			if($victoryTicket > $victoryPercent) {
				$win = 0;
				$lucky = 0;
			} else {
				$win = 1;
				$lucky = 1;
			}
		}
	}
	// mostrar reporte de batalla
	error_log("Battle results (WINLUCKY): ".$win.$lucky);
	if($win == 1) {
		$newExp = $row['exp_points'];
	} else {
		$newExp = 0;
	}
	$logResult = bossBattleResults($win, $lucky);
	$imageURL = rand(0,29);
	$imageShortURL = "/img/battle_".$imageURL.".jpg";
	$imageURL = dirname(__FILE__).$imageShortURL;
	header('Content-type: image/jpeg');
	$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
	if(strlen($playerAvatar) > 5) {
		$playerAvatarType = substr(strtolower($playerAvatar), strlen($playerAvatar) - 3);
		if($playerAvatarType == "jpg") {
			$player_image = imagecreatefromjpeg($playerAvatar);
		} else if($playerAvatarType == "png") {
			$player_image = imagecreatefrompng($playerAvatar);
		} else {
			$player_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
			$playerAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		}
	} else {
		$player_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$playerAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
	}
	$bossAvatar = $row['avatar'];
	if(strlen($bossAvatar) > 5) {
		$bossAvatarType = substr(strtolower($bossAvatar), strlen($bossAvatar) - 3);
		if($bossAvatarType == "jpg") {
			$boss_image = imagecreatefromjpeg($bossAvatar);
		} else if($bossAvatarType == "png") {
			$boss_image = imagecreatefrompng($bossAvatar);
		} else {
			$boss_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
			$bossAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		}
	} else {
		$boss_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$bossAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
	}
	$textColor = imagecolorallocate($jpg_image, 90, 57, 22);
	$starsColor = imagecolorallocate($jpg_image, 255, 255, 100);
	$font_path = dirname(__FILE__)."/img/segoe.ttf";
	list($base_width, $base_height) = getimagesize('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
	list($player_width, $player_height) = getimagesize($playerAvatar);
	list($boss_width, $boss_height) = getimagesize($bossAvatar);
	/*
	if(is_numeric($player_width) && is_numeric($player_height) && $player_width > 0 && $player_height > 0) {
		error_log("Loading image ".$playerAvatar);
	} else {
		$player_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$playerAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		list($player_width, $player_height) = getimagesize($playerAvatar);
	}
	if(is_numeric($boss_width) && is_numeric($boss_height) && $boss_width > 0 && $boss_height > 0) {
		error_log("Loading image ".$bossAvatar);
	} else {
		$boss_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
		$bossAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
		list($boss_width, $boss_height) = getimagesize($bossAvatar);
	}
	*/
	$player_ratio = $player_width / $player_height;
	if($player_ratio > 1) {
		$player_scalewidth = 250;
		$player_scaleheight = floor(250 / $player_ratio);
	}
	else {
		$player_scalewidth = 250 * $player_ratio;
		$player_scaleheight = 250;
	}
	$player_position = $player_scalewidth - $player_scaleheight;
	if($player_position == 0) {
		$player_x = 180;
		$player_y = 100;
	} else if($player_position > 0) {
		$player_x = 180;
		$player_y = 100 + floor($player_position / 2);
	} else {
		$player_x = 180 + floor(($player_position * -1) / 2);
		$player_y = 100;
	}
	$boss_ratio = $boss_width / $boss_height;
	if($boss_ratio > 1) {
		$boss_scalewidth = 250;
		$boss_scaleheight = floor(250 / $boss_ratio);
	}
	else {
		$boss_scalewidth = 250 * $boss_ratio;
		$boss_scaleheight = 250;
	}
	$boss_position = $boss_scalewidth - $boss_scaleheight;
	if($boss_position == 0) {
		$boss_x = 850;
		$boss_y = 100;
	} else if($boss_position > 0) {
		$boss_x = 850;
		$boss_y = 100 + floor($boss_position / 2);
	} else {
		$boss_x = 850 + floor(($boss_position * -1) / 2);
		$boss_y = 100;
	}
	$player_name = removeEmoji($playerName);
	$player_name = $player_name." [Nv. ".$level."]";
	$boss_name = $bossName;
	$boss_name = $boss_name." [Nv. ".$row['level']."]";
	$player_nameX = 155;
	$player_namealign = 33 - strlen($player_name);
	if($player_namealign > 0) {
		$player_nameX = $player_nameX + ($player_namealign * 5);
	}
	$boss_nameX = 800;
	$boss_namealign = 33 - strlen($boss_name);
	if($boss_namealign > 0) {
		$boss_nameX = $boss_nameX + ($boss_namealign * 5);
	}
	$res_image = imagecreatetruecolor($base_width, $base_height);
	imagecopyresampled($res_image, $jpg_image, 0, 0, 0, 0, $base_width, $base_height, $base_width, $base_height);
	imagecopyresampled($res_image, $player_image, $player_x, $player_y, 0, 0, $player_scalewidth, $player_scaleheight, $player_width, $player_height);
	imagecopyresampled($res_image, $boss_image, $boss_x, $boss_y, 0, 0, $boss_scalewidth, $boss_scaleheight, $boss_width, $boss_height);
	if(strlen($player_name) > 50) {
		$player_name = substr($player_name, 0, 47);
		$player_name = rtrim($player_name);
		$player_name = $player_name."...";
	}
	if(strlen($boss_name) > 50) {
		$boss_name = substr($boss_name, 0, 47);
		$boss_name = rtrim($boss_name);
		$boss_name = $boss_name."...";
	}
	$player_hpstars = ratePower($totalHP);
	$player_atstars = ratePower($totalAt);
	$player_defstars = ratePower($totalDef);
	$player_critstars = ratePower($totalCrit, 1);
	$player_spstars = ratePower($totalSp);
	$result_text = $logResult;
	$result_text = wordwrap($result_text, 140, "\n", false);
	mysql_free_result($result);
	imagettftext($res_image, 16, 0, $player_nameX, 380, $textColor, $font_path, $player_name);
	imagettftext($res_image, 16, 0, $boss_nameX, 380, $textColor, $font_path, $boss_name);
	imagettftext($res_image, 16, 0, 228, 410, $textColor, $font_path, "Vida:");
	imagettftext($res_image, 16, 0, 908, 410, $textColor, $font_path, "Vida:");
	imagettftext($res_image, 26, 0, 280, 410, $starsColor, $font_path, $player_hpstars);
	imagettftext($res_image, 26, 0, 960, 410, $starsColor, $font_path, $boss_hpstars);
	imagettftext($res_image, 16, 0, 200, 435, $textColor, $font_path, "Ataque:");
	imagettftext($res_image, 16, 0, 880, 435, $textColor, $font_path, "Ataque:");
	imagettftext($res_image, 26, 0, 280, 435, $starsColor, $font_path, $player_atstars);
	imagettftext($res_image, 26, 0, 960, 435, $starsColor, $font_path, $boss_atstars);
	imagettftext($res_image, 16, 0, 191, 460, $textColor, $font_path, "Defensa:");
	imagettftext($res_image, 16, 0, 872, 460, $textColor, $font_path, "Defensa:");
	imagettftext($res_image, 26, 0, 280, 460, $starsColor, $font_path, $player_defstars);
	imagettftext($res_image, 26, 0, 960, 460, $starsColor, $font_path, $boss_defstars);
	imagettftext($res_image, 16, 0, 206, 485, $textColor, $font_path, "Crítico:");
	imagettftext($res_image, 16, 0, 887, 485, $textColor, $font_path, "Crítico:");
	imagettftext($res_image, 26, 0, 280, 485, $starsColor, $font_path, $player_critstars);
	imagettftext($res_image, 26, 0, 960, 485, $starsColor, $font_path, $boss_critstars);
	imagettftext($res_image, 16, 0, 177, 510, $textColor, $font_path, "Velocidad:");
	imagettftext($res_image, 16, 0, 858, 510, $textColor, $font_path, "Velocidad:");
	imagettftext($res_image, 26, 0, 280, 510, $starsColor, $font_path, $player_spstars);
	imagettftext($res_image, 26, 0, 960, 510, $starsColor, $font_path, $boss_spstars);	
	imagettftext($res_image, 12, 0, 140, 565, $textColor, $font_path, $result_text);
	imagejpeg($res_image, $imageURL, 100);
	$target_url = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
	$file_name_with_full_path = realpath($imageURL);
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
	usleep(300000);
	$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$target_url);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($ch);
	curl_close ($ch);
	imagedestroy($res_image);
	mysql_free_result($result);
	return $newExp;
}

function getClanLevel($id, $link) {
	$query = "SELECT COUNT( group_id ) AS  'total' FROM playerbattle WHERE group_id = '".$id."' GROUP BY group_id";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	$levelNumber = $row['total'];
	if($levelNumber > 49) {
		$level = "【★★★★★】";
	} else if($levelNumber > 29) {
		$level = "【★★★★☆】";
	} else if($levelNumber > 14) {
		$level = "【★★★☆☆】";
	} else if($levelNumber > 4) {
		$level = "【★★☆☆☆】";
	} else if($levelNumber > 0) {
		$level = "【★☆☆☆☆】";
	} else {
		$level = "【☆☆☆☆☆】";
	}
	mysql_free_result($result);
	return $level;
}

function getClanLevelByMembers($levelNumber) {
	if($levelNumber > 49) {
		$level = "【★★★★★】";
	} else if($levelNumber > 29) {
		$level = "【★★★★☆】";
	} else if($levelNumber > 14) {
		$level = "【★★★☆☆】";
	} else if($levelNumber > 4) {
		$level = "【★★☆☆☆】";
	} else if($levelNumber > 0) {
		$level = "【★☆☆☆☆】";
	} else {
		$level = "【☆☆☆☆☆】";
	}
	return $level;
}

function getPlayerInfo($fullInfo, $link, $chat_id, $user_id) {
	$query = "SELECT pb.group_id, pb.exp_points, pb.level, pb.extra_points, pb.hp, pb.attack, pb.defense, pb.critic, pb.speed, pb.helmet, pb.body, pb.boots, pb.weapon, pb.shield, pb.avatar, pb.bottles, pb.pvp_allowed, pb.pvp_wins, pb.pvp_group_wins, pb.last_boss, pb.war_mvp, COALESCE( hb.total, 0 ) AS  'hero_power', COALESCE( ub.tokens, 0 ) AS  'tokens' FROM playerbattle pb LEFT JOIN ( SELECT total, user_id FROM heroesbattle )hb ON pb.user_id = hb.user_id LEFT JOIN ( SELECT tokens, user_id, group_id FROM userbet )ub ON pb.user_id = ub.user_id AND ub.group_id =0 WHERE pb.user_id = '".$user_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if(isset($row['level'])){
		$msg = "";
		if($fullInfo == 0) {
			$msg = $msg."<b>Puntos totales de experiencia:</b> ".$row['exp_points'].PHP_EOL;
			$msg = $msg."<b>Experiencia de nivel ".$row['level'].":</b>".PHP_EOL;
			$expBar = getLevelBar($row['exp_points'], $row['level']);
			$msg = $msg.$expBar.PHP_EOL.PHP_EOL;
			if($row['last_boss'] == 0 && $row['level'] > 5) {
				$tipTicket = rand(1,2);
				if($tipTicket == 2) {
					$msg = $msg."<b>Consejo:</b> utiliza !atacar para luchar contra jefes de la zona, ¡podrás conseguir mucha más experiencia!".PHP_EOL;
				}
			}
			if(strlen($row['avatar']) < 5) {
				$tipTicket = rand(1,20);
				if($tipTicket == 8) {
					$msg = $msg."<b>Consejo:</b> puedes utilizar !avatarpj para personalizar tu ficha de personaje con una imagen personal.".PHP_EOL;
				}
			}
			if($row['extra_points'] > 0) {
				$tipTicket = rand(1,3);
				if($tipTicket == 1) {
					$msg = $msg."<b>Consejo:</b> puedes mejorar a tu personaje si utilizas la función !gastarpunto. ¡Todavía te quedan puntos extra de rocosidad por consumir!".PHP_EOL;
				}
			}
			if($row['group_id'] > 1 && $row['level'] > 6) {
				$tipTicket = rand(1,10);
				if($tipTicket == 4) {
					$msg = $msg."<b>Consejo:</b> puedes luchar junto a tus amigos contra otros enemigos si añades al bot a tu grupo de amigos y usas la función !unirme.".PHP_EOL;
				}
			}
			if($row['bottles'] > 0) {
				$tipTicket = rand(1,10);
				if($tipTicket == 2) {
					$msg = $msg."<b>Consejo:</b> utiliza !botella para usar las botellas de experiencia que tienes. ¡Si acumulas diez botellas en tu inventario no podrás recibir más!".PHP_EOL;
				}
			}
			$tipTicket = rand(1,10);
			if($tipTicket == 7) {
				if($row['level'] > 10) {
					$subTipTicket = rand(1, 8);
				} else {
					$subTipTicket = rand(1, 9);
				}
				if($subTipTicket == 1) {
					$msg = $msg."<b>Consejo:</b> De vez en cuando hay eventos para los Rocosos de Demisuke y actualizaciones del bot, en el @CanalKamisuke puedes saber si hay algún evento cercano antes de que se te pase o conocer las nuevas funciones del bot. ¡No te pierdas nada!".PHP_EOL;
				//} else if($subTipTicket == 2) {
				//	$msg = $msg."<b>Consejo:</b> utiliza !rol si no quieres esperar tanto tiempo a conseguir nueva experiencia, ¡podrías obtener buenas recompensas para tu personaje!".PHP_EOL;
				} else if($subTipTicket == 3) {
					$msg = $msg."<b>Consejo:</b> si consigues más de 200 puntos de heroicidad tu personaje será aún más fuerte a la hora de luchar contra jefes de zona y en duelos PvP. ¡Recuerda usar !boton ocasionalmente!".PHP_EOL;
				} else if($subTipTicket == 4) {
					$msg = $msg."<b>Consejo:</b> si utilizas la función !slots (o !777) podrás conseguir premios bonus como por ejemplo una botella de experiencia para tu personaje. Puedes ver la lista de premios bonus en /ayuda_slots".PHP_EOL;
				} else if($subTipTicket == 5) {
					$msg = $msg."<b>Consejo:</b> las batallas entre clanes, además de otorgar victorias de guerra y puntos de líder en rocosidad, ayuda a todos sus miembros a poder luchar contra jefes más rápido. ¡No te olvides de ir a la guerra!".PHP_EOL;
				} else if($subTipTicket == 6) {
					$msg = $msg."<b>Consejo:</b> Si encuentras algún problema con tu personaje o el juego, o quieres reportar o sugerir algo a la administración del juego puedes enviar un ticket con tu mensaje escribiendo <pre>!sugerencia mensaje a enviar</pre>.".PHP_EOL;
				//} else if($subTipTicket == 7) {
				//	$msg = $msg."<b>Consejo:</b> ¿No sabes cómo continuar jugando? ¿Necesitas ayuda para sacar el máximo provecho de tu personaje? ¡Consulta la /guia_rocosos para no perderte nada del juego!".PHP_EOL;
				} else if($subTipTicket == 8) {
					$msg = $msg."<b>Consejo:</b> el uso de aplicaciones externas o macros de escritura automática programada conllevará a la restricción temporal o permanente de acceso al RPG y tu personaje. ¡Juega limpio fuera del campo de batalla!".PHP_EOL;
				} else if($subTipTicket == 9) {
					$msg = $msg."<b>Consejo:</b> en los duelos PvP puedes lograr atraer a un jefe de tu zona para volver a luchar si consigues la victoria. Consulta !listapvp frecuentemente para retar a rivales asequibles para tu nivel.".PHP_EOL;
				}
			}
			$msg = $msg."<i>Consulta con !pj las estadísticas completas de tu personaje.</i>";
		} else {		
			// mostrar toooodos los stats posibles, con el monospace y eso
			// no mostrar ayudas ni nada, que parezca una ficha de jugador REAL
			$group_id = $row['group_id'];
			$exp_points = $row['exp_points'];
			$level = $row['level'];
			$extra_points = $row['extra_points'];
			$hp = $row['hp'];
			$attack = $row['attack'];
			$defense = $row['defense'];
			$critic = $row['critic'];
			$speed = $row['speed'];
			$helmet = $row['helmet'];
			$body = $row['body'];
			$boots = $row['boots'];
			$weapon = $row['weapon'];
			$shield = $row['shield'];
			$avatar = $row['avatar'];
			$bottles = $row['bottles'];
			$pvp_allowed = $row['pvp_allowed'];
			$pvp_wins = $row['pvp_wins'];
			$pvp_group_wins = $row['pvp_group_wins'];
			$heroPower = $row['hero_power'];
			$tokens = $row['tokens'];
			$war_mvp = $row['war_mvp'];
			mysql_free_result($result);
			$query = "SELECT first_name, user_name FROM userbattle WHERE user_id = '".$user_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$userFirstName = $row['first_name'];
			$userNickName = $row['user_name'];
			if($userNickName != "") {
				if(strtolower($userFirstName) == strtolower($userNickName)) {
					$finalName = $userNickName;
				} else {
					$finalName = $userFirstName." (".$userNickName.")";
				}
			} else {
				$finalName = $userFirstName;
			}
			$finalName = str_replace("<", "", $finalName);
			$finalName = str_replace(">", "", $finalName);
			$msg = "⚔ <b>FICHA DE ROCOSIDAD</b> ⚔".PHP_EOL;
			if(strlen($avatar) > 5) {
				$msg = $msg."<a href=\"".$avatar."\">".$finalName."</a>".PHP_EOL.PHP_EOL;
			} else {
				$msg = $msg.$finalName.PHP_EOL.PHP_EOL;
			}
			$msg = $msg."<b>Nivel:</b> ".$level.PHP_EOL;
			$currZone = getAreaName($level);
			$msg = $msg."<b>Zona:</b> <i>".$currZone."</i>".PHP_EOL;
			$currMood = getPlayerMood($level);
			$msg = $msg."<b>Estado:</b> <i>".$currMood."</i>".PHP_EOL.PHP_EOL;
			if(strlen($group_id) > 1) {
				mysql_free_result($result);
				$query = "SELECT name FROM groupbattle WHERE group_id = '".$group_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$clanName = $row['name'];
				mysql_free_result($result);
				$msg = $msg."<b>Clan:</b> <i>".getClanLevel($group_id, $link).$clanName."</i>".PHP_EOL;
			} else {
				$msg = $msg."<b>Clan:</b> <i>Ninguno</i>".PHP_EOL;
			}
			if($pvp_allowed == 1) {
				$msg = $msg."🏆 <b>Victorias PvP:</b> ".$pvp_wins.PHP_EOL;
			}
			$msg = $msg."🏆 <b>Guerras ganadas:</b> ".$pvp_group_wins.PHP_EOL;
			$msg = $msg."🏵 <b>Líder en rocosidad:</b> ";
			if($war_mvp == 0) {
				$msg = $msg."Ninguna vez".PHP_EOL;
			} else if($war_mvp == 1) {
				$msg = $msg."Una vez".PHP_EOL;
			} else {
				$msg = $msg.$war_mvp." veces".PHP_EOL;
			}
			$msg = $msg."<b>Al siguiente nivel:</b>".PHP_EOL;
			$expBar = getLevelBar($exp_points, $level);
			$msg = $msg.$expBar.PHP_EOL;
			$msg = $msg."<b>Experiencia total:</b> ".$exp_points.PHP_EOL;
			$msg = $msg."💎 <b>Puntos extra por utilizar:</b> ".$extra_points.PHP_EOL;
			$msg = $msg."🍾 <b>Botellas de experiencia:</b> ".$bottles.PHP_EOL;
			$msg = $msg."🎖 <b>Puntos de heroicidad:</b> ".$heroPower.PHP_EOL;
			$msg = $msg."🎰 <b>Fichas de casino:</b> ".$tokens.PHP_EOL.PHP_EOL;
			$msg = $msg."<b>Estadísticas base [y con equipo]:</b>".PHP_EOL;
			$msg = $msg."<pre>VID:";
			switch(strlen($hp)){
				case 1: $msg = $msg."   ";
						break;
				case 2: $msg = $msg."  ";
						break;
				case 3: $msg = $msg." ";
						break;
			}
			$msg = $msg.$hp." [";
			$fullHP = $hp + $body;
			if($fullHP > 999) {
				$fullHP = 999;
			}
			switch(strlen($fullHP)){
				case 1: $msg = $msg."  ";
						break;
				case 2: $msg = $msg." ";
						break;
				default: break;
			}
			$msg = $msg.$fullHP."] ".ratePower($fullHP)."</pre>".PHP_EOL;
			$msg = $msg."<pre>ATA:";
			switch(strlen($attack)){
				case 1: $msg = $msg."   ";
						break;
				case 2: $msg = $msg."  ";
						break;
				case 3: $msg = $msg." ";
						break;
			}
			$msg = $msg.$attack." [";
			$fullAttack = $attack + $weapon;
			if($fullAttack > 999) {
				$fullAttack = 999;
			}
			switch(strlen($fullAttack)){
				case 1: $msg = $msg."  ";
						break;
				case 2: $msg = $msg." ";
						break;
				default: break;
			}
			$msg = $msg.$fullAttack."] ".ratePower($fullAttack)."</pre>".PHP_EOL;
			$msg = $msg."<pre>DEF:";
			switch(strlen($defense)){
				case 1: $msg = $msg."   ";
						break;
				case 2: $msg = $msg."  ";
						break;
				case 3: $msg = $msg." ";
						break;
			}
			$msg = $msg.$defense." [";
			$fullDefense = $defense + $shield;
			if($fullDefense > 999) {
				$fullDefense = 999;
			}
			switch(strlen($fullDefense)){
				case 1: $msg = $msg."  ";
						break;
				case 2: $msg = $msg." ";
						break;
				default: break;
			}
			$msg = $msg.$fullDefense."] ".ratePower($fullDefense)."</pre>".PHP_EOL;
			$msg = $msg."<pre>CRÍ:";
			switch(strlen($critic)){
				case 1: $msg = $msg."   ";
						break;
				case 2: $msg = $msg."  ";
						break;
				case 3: $msg = $msg." ";
						break;
			}
			$msg = $msg.$critic." [";
			$fullCritic = $critic + $helmet;
			if($fullCritic > 80) {
				$fullCritic = 80;
			}
			switch(strlen($fullCritic)){
				case 1: $msg = $msg."  ";
						break;
				case 2: $msg = $msg." ";
						break;
				default: break;
			}
			$msg = $msg.$fullCritic."] ".ratePower($fullCritic, 1)."</pre>".PHP_EOL;
			$msg = $msg."<pre>VEL:";
			switch(strlen($speed)){
				case 1: $msg = $msg."   ";
						break;
				case 2: $msg = $msg."  ";
						break;
				case 3: $msg = $msg." ";
						break;
			}
			$msg = $msg.$speed." [";
			$fullSpeed = $speed + $boots;
			if($fullSpeed > 999) {
				$fullSpeed = 999;
			}
			switch(strlen($fullSpeed)){
				case 1: $msg = $msg."  ";
						break;
				case 2: $msg = $msg." ";
						break;
				default: break;
			}
			$msg = $msg.$fullSpeed."] ".ratePower($fullSpeed)."</pre>".PHP_EOL.PHP_EOL;
			$msg = $msg."<b>Equipo:</b>".PHP_EOL;
			$msg = $msg."🎩 ".getItemName(1, $helmet).PHP_EOL;
			$msg = $msg."👔 ".getItemName(2, $body).PHP_EOL;
			$msg = $msg."👞 ".getItemName(3, $boots).PHP_EOL;
			$msg = $msg."🗡 ".getItemName(4, $weapon).PHP_EOL;
			$msg = $msg."🛡 ".getItemName(5, $shield);
		}
	} else {
		$msg = "<b>Todavía no has creado tu propio personaje. Utiliza la función !exp o </b>/exp<b> desde chat privado con el bot para comenzar a jugar.</b>";
	}
	mysql_free_result($result);
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	if($fullInfo == 1){
		usleep(100000);
	} else {
		sleep(1);
	}
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
}
function failInsult() {
	$storedInsult = array(
						"No quiero, subnormal",
						"Paso",
						"Otro día",
						"Nah",
						"¿Por? No quiero",
						"¿Motivo? No sé yo",
						"No estoy inspirado, prueba más tarde",
						"Estoy apagado o fuera de cobertura",
						"Yo no tengo nada en contra de nadie ahora mismo, apáñatelas por tu cuenta",
						"Por ahora me trata bien, me cuesta pensar un insulto",
						"Me gustaría, pero no tengo ganas",
						"Estoy ocupado respirando, que siendo bot cuesta más",
						"Paga la cuota primero",
						"En otro momento",
						"Inténtalo otra vez, es gratis",
						"Vale, pero mañana. Recuérdamelo",
						"Deberías darle veinte euros en lugar de dedicarle improperios. Madura",
						"Mira, como te vuelvas a meter con alguien así te parto el pecho con el somier de tu cama y te lo hago tragar bocabajo",
						"¡¿Qué?! Antes te quemo a ti la casa, no me jodas",
						"No voy a ser yo quien insulte ahora, tu cara no merece vivir placeres así",
						"Deja en paz a los demás, gilipollas"
						);
	$n = sizeof($storedInsult) - 1;
	$n = rand(0,$n);
	return $storedInsult[$n];
}

function randomSentence($isInvoking = false) {
	$complete = "";
	if($isInvoking) {
		//$complete = "¡Invoco a ";		
		$storedSummoning = array(
							"invoco a",
							"por el poder que me ha sido otorgado, yo invoco a",
							"adelante,",
							"ve a por todas",
							"es el momento de invocar a",
							"ha llegado u hora, yo te invoco,",
							"hora de invocar a",
							"voy a invocar a",
							"yo te invoco,",
							"a esta conversación le falta una invocación,",
							"voy a invocar a"
							);
		$n = sizeof($storedSummoning) - 1;
		$n = rand(0,$n);
		$complete = "¡".ucfirst($storedSummoning[$n])." ";
	}
	$isMale = rand(0,1);
	if($isMale == 1) {
		$storedStart = array(
							"Coyote",		"Cavernícola",
							"Tambor",		"Ciervo",
							"Corzo",		"caballo",
							"Anacardo",		"Espantapájaros",
							"Gorrino",		"Cocotero",
							"Celacanto",	"Fuet",
							"Jamón",		"Salmorejo",
							"Níspero",		"ravioli",
							"Ukelele",		"volquete",
							"Colesterol",
							"Rinoceronte",	"Perineo",
							"Triciclo",
							"Plástico",		"Dinosaurio",
							"Barrilete",
							"Meteorito",	"Machete",
							"Puercoespín",	"Cacahuete",
							"Picaporte",	"Pañal",
							"Incienso",		"Lince",
							"Garbanzo",		"Clavicordio",
							"Relámpago",	"Berberecho",
							"Odín",
							"Mapache",		"Leviatán",
							"Pterodáctilo"
							);
	} else {
		$storedStart = array(
							"cebolla",		"mandarina",
							"Alcachofa",	"trompeta",
							"Ventana",		"escobilla",
							"Diadema",		"hamburguesa",
							"Moneda",		"liebre",
							"Papelera",		"nutria",
							"Bombilla",		"Gominola",
							"Coliflor",		"piruleta",
							"Papaya",		"Sepia",
							"Chincheta"
							);				
	}
	$n = sizeof($storedStart) - 1;
	$n = rand(0,$n);
	$complete = $complete.ucfirst($storedStart[$n]);
	$storedEnd = array(
						"en almíbar",				"superestrella",
						"a las finas hierbas",		"congresista",
						"espacial",					"de metal",
						"sideral",					"de pladur",
						"del Cáucaso",				"radiocontrol",
						"temporal",					"sensual",
						"con escayola",				"pelotari",
						"selección",				"volante",
						"ancestral",				"musical",
						"reversible",				"atrapamoscas",
						"elegante",					"de alcanfor",
						"manual",					"de la Antártida",
						"terrícola",				"de Saturno",
						"velocista",				"escolar",
						"centinela",				"lendakari",
						"revolución",				"serbocroata",
						"estelar",					"oriental",
						"fantasma",					"illuminati",
						"impermeable",				"del tiempo",
						"a la sal",					"a la pachamama",
						"en escabeche",				"progresista"
						);
	if($isMale == 1) {
		array_push($storedEnd, 
					"presidente",
					"fresco",
					"sano",
					"calvo",
					"rapado",
					"poleador",
					"unicejo",
					"rocoso",
					"mentolado",
					"antártico",
					"enyodado",
					"picador",
					"manchego",
					"asturiano",
					"loco"
					);
	} else {
		array_push($storedEnd, 
					"presidenta",
					"fresca",
					"sana",
					"calva",
					"rapada",
					"poleadora",
					"uniceja",
					"rocosa",
					"mentolada",
					"antártica",
					"enyodada",
					"picadora",
					"manchega",
					"asturiana",
					"loca"
					);
	}
	$n = sizeof($storedEnd) - 1;
	$n = rand(0,$n);
	$complete = $complete." ".$storedEnd[$n];
	return $complete;
}

function getEnjuto() {
	$storedSentence = array(
						"No funciona interneeeet",
						"¡Ay piticlí bonico! Ay, piticli",
						"Me' quedao' traspuesto",
						"Noooooooooooooo",
						"Pues... tiene tipazo",
						"Apaga y enciende el ordenador, reinicia el router, llama al servicio técnico",
						"Acho me via' quedar agurrumío' aquí afuera",
						"Vaya bullate",
						"Estoy echando teticas",
						"Me muero con el calorcico",
						"A ti te voy a llamar Pelusín",
						"¿Quién te envía? Contéstame por e-mail",
						"Mantente lejos de la ironía",
						"Estoy en baja forma, mejor descanso",
						"Tengo muchos followers en el Twitter",
						"Hace tiempo que no mojo el pizarrín",
						"Si sumas todas las piernas de los cuñados del mundo y el resultado lo divides entre dos, te sale el número total de Bonicos del to'",
						"Cuando me levanto al baño en mi cuarto hay un error 404",
						"Yo a mis vacaciones me llevo un manual de C++",
						"Acho que vienen a por mí",
						"Me hago viejoven cuando juego al Pokémon Go, con lo agustico que estoy en casa",
						"Los zombis veintiocho semanas después no son zombis, son infectados",
						"Lo estoy gozando cosa bárbara",
						"Como se fue, vino",
						"No tengo humor",
						"Me gusta estar acurrucaíco delante de la pantalla",
						"Vamos a ver vídeos de gaticos",
						"Acho pa' pasar la tarde yo ya te valgo",
						"He notado que estás a remiso",
						"Yo viajo mucho por el Google Earth",
						"¿Conoces la teoría de los seis grados de separación con Kevin Bacon? Pues tú no tienes ninguna conexión con él",
						"¿Te gusta como clico? Me gusta abrir nuevas ventanas",
						"¿Me hablas a mí? Qué sustico"
						);
	$n = sizeof($storedSentence) - 1;
	$n = rand(0,$n);
	$result = $storedSentence[$n];
	return $result;
}

function getRandomResultSentence() {
	$storedSentence = array(
						"Victoria contundente de",
						"Con sufrimiento, la victoria ha sido para",
						"Esta batalla la ha ganado",
						"Victoria fácil para",
						"Inesperada victoria de",
						"Ha ganado",
						"La victoria se la ha llevado",
						"No ha habido sorpresas, victoria de",
						"Batalla rápida, victoria de",
						"Sin sobresaltos, el ganador ha sido"
						);
	$n = sizeof($storedSentence) - 1;
	$n = rand(0,$n);
	$result = $storedSentence[$n]." ";
	return $result;
}
function yesNoQuestion() {
	$storedReply = array(
						"Claro, por supuesto",
						"Difícil, pero yo creo que sí",
						"Ni lo sueñes",
						"Es probable, no lo niego",
						"Nunca",
						"¿Para qué quieres saber eso? ¡Jaja!, saludos",
						"A mí no me preguntes, solo soy un bot jiji",
						"Sí, sin duda",
						"Con esa cara imposible",
						"Sinceramente sí",
						"Afirmativo",
						"Negativo",
						"No puedo pensar en otra cosa que no sea un sí",
						"Por los pelos, pero sí",
						"Está ahí ahí la cosa... Yo diría que no",
						"Me atrevo a decir que sí",
						"¿Por qué no? Yo lo veo",
						"No tiene pinta, la verdad..",
						"No",
						"¡No! Creo",
						"Sí",
						"¡Sí! Creo",
						"Claro",
						"¡Anda ya! No",
						"Para nada",
						"Venga ya, no es posible",
						"Sí, tirando a no... Pero sí",
						"Por supuesto",
						"Evidentemente",
						"Vete a tu pueblo, claro que no",
						"Es difícil dar una respuesta exacta, creo que debemos tomar la pregunta con cautela y analizar los pormenores que pueden parecernos intrascendentes pero que, a la hora de tomar una decisión coherente, pueden torcer la balanza.
						Si nos guiamos por los conceptos de interpretación que existían en la antiguedad, deberíamos hacer un examen de conciencia y ubicarnos como meros espectadores ante una pregunta sin destinatario. Pero si, en cambio, analizamos tu pregunta desde la posición del lineamiento ortodoxo del pensamiento moderno, la respuesta tiene que ver, ya no con la esencia de la interrogación, sino con el espíritu dialéctico de quien interroga.
						En síntesis, la respuesta a tu pregunta, solo puede entenderse desde lo pragmático, asociando los niveles del intelecto que por sí solos, desvelan los secretos de la incógnita. Por otra parte cabe mencionar que para el análisis empírico no es necesario evaluar los preceptos intrínsecos de la realidad, observados desde la lógica y la metafísica",
						"¿Estás de broma? No"
						);
	$n = sizeof($storedReply) - 1;
	$n = rand(0,$n);
	return $storedReply[$n];
}

function randomFart() {
	$storedFart = array(
					"AwADBAAD7wcAApdgXwABMze1Xr-pnaUC",
					"AwADBAAD8AcAApdgXwABcammHsofEqsC",
					"AwADBAAD8QcAApdgXwAB61TrcMuwokEC",
					"AwADBAAD8gcAApdgXwAB117nq7_wVPAC",
					"AwADBAAD8wcAApdgXwABxxkIESbPJmsC",
					"AwADBAAD9AcAApdgXwABVv9xkouFlNMC",
					"AwADBAAD9QcAApdgXwABIzC-95bRJxwC",
					"AwADBAAD9gcAApdgXwABRIiU1uqrHh0C",
					"AwADBAAD9wcAApdgXwABc0p8cNj3MUIC",
					"AwADBAAD-AcAApdgXwAB_8KGQ-ZsGCwC",
					"AwADBAAD-QcAApdgXwABtRkRhlezhEsC",
					"AwADBAAD-gcAApdgXwAB8aupsxpgyrAC",
					"AwADBAAD-wcAApdgXwABLV7SYRmRj_0C",
					"AwADBAAD_AcAApdgXwABz55wO6HHew0C",
					"AwADBAAD_QcAApdgXwABL41n3heL_l4C",
					"AwADBAAD_gcAApdgXwABB7oP4zO-MS8C",
					"AwADBAAD_wcAApdgXwABrwjIGAooMukC",
					"AwADBAAECAACl2BfAAGfhrwprKMfUgI",
					"AwADBAADAQgAApdgXwAB2sUZ9foSBjMC",
					"AwADBAADAggAApdgXwABVLf6mEKrlBkC",
					"AwADBAADAwgAApdgXwAByi-dyIF7TJkC",
					"AwADBAADBAgAApdgXwABkS6jZBHAPpEC",
					"AwADBAADBQgAApdgXwABC7jb25FF3dAC"
						);
	$n = sizeof($storedFart) - 1;
	$n = rand(0,$n);
	return $storedFart[$n];
}

function getSong() {
	$storedSong = array(
					"AwADBAADbwcAApdgXwABX68UgNLIQ90C",
					"AwADBAADcAcAApdgXwAB666WIUXdJpUC",
					"AwADBAADcQcAApdgXwABNzxxVoUpZkIC",
					"AwADBAADcgcAApdgXwABqY13kei68BMC",
					"AwADBAADcwcAApdgXwABXyldoFW6FtwC",
					"AwADBAADdAcAApdgXwAB9MC7IX7Lwk4C",
					"AwADBAADdQcAApdgXwABWhAL3LM4RxAC",
					"AwADBAADdgcAApdgXwABTpFjg1SZ7lMC",
					"AwADBAADdwcAApdgXwABX7onofRsrZ0C",
					"AwADBAADeAcAApdgXwABu2VFsCujV1gC",
					"AwADBAADeQcAApdgXwAB_W6S9zYM9oIC",
					"AwADBAADegcAApdgXwABsdq2K-jvfTMC",
					"AwADBAADewcAApdgXwABoWZzM_t4lwQC",
					"AwADBAADfAcAApdgXwABerUsh_lNWBIC",
					"AwADBAADfQcAApdgXwABHqBd29KkPsoC",
					"AwADBAADfgcAApdgXwABjkvX2_sqOmoC",
					"AwADBAADfwcAApdgXwABTX3d0SLyKPYC",
					"AwADBAADgAcAApdgXwABKIhlvUGIRywC",
					"AwADBAADgQcAApdgXwABY8eTaHL3UnkC",
					"AwADBAADggcAApdgXwABMsiIOhtH81kC",
					"AwADBAADgwcAApdgXwABsRfWHI8AAfbsAg",
					"AwADBAADhAcAApdgXwABWbLCN1k_byEC"
					);
	$n = sizeof($storedSong) - 1;
	$n = rand(0,$n);
	return $storedSong[$n];
}

function launchTdsPts($chat_id) {
	$chooseType = rand(1,10);
	if($chooseType > 3) {
		$gif = Array (
						"BQADBAADLwcAApdgXwAB5GRVtoyljo4C",
						"BQADBAAECQACjeVsAAEJ2lgEFaLGhAI",
						"BQADBAADWgEAAtWlKAABJtdmRuWDvY4C",
						"BQADBAADMQcAApdgXwABIgfkLN1r5mQC",
						"BQADBAADMgcAApdgXwABORftLTPVPDIC",
						"BQADBAADMwcAApdgXwABIdvCm609w3kC",
						"BQADBAADNAcAApdgXwAB82jVGgP1f8gC",
						"BQADBAADNQcAApdgXwABoNdTO3kqJWUC",
						"BQADBAADNgcAApdgXwABBIKOwi5PVg8C",
						"BQADBAADNwcAApdgXwABNrlDwxOyCE0C",
						"BQADBAADMAcAApdgXwAB7rO69eTFnREC"
						);
		$n = sizeof($gif) - 1;
		$n = rand(0,$n);
		usleep(500000);
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif[$n]));
	} else {
		$sound = "AwADBAADLgcAApdgXwABZHY0xtKgHCEC";
		
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "record_audio"));
		sleep(3);
		apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => $sound));
	}
}

function launchMonkey($chat_id) {
	$gif = Array (
					"BQADBAADkwcAApdgXwABna9BpzMpDrEC",
					"BQADBAADlAcAApdgXwABqO7vUmC_05IC",
					"BQADBAADlQcAApdgXwAB6nZtgNVykU8C",
					"BQADBAADlgcAApdgXwABpte_ZNyrqGwC",
					"BQADBAADIQMAAt4YZAd9u3_cpaeIkAI",
					"BQADBAADlwcAApdgXwABdOh-cisNlSQC",
					"BQADBAADmAcAApdgXwAB33EgEhTEAZQC",
					"BQADBAADmQcAApdgXwABbHD26oUeYA4C",
					"BQADBAADmgcAApdgXwABAnQEDU8tk7wC",
					"BQADBAADmwcAApdgXwAB15Zd8wEJZHcC",
					"BQADBAADnAcAApdgXwABt9IaSDpbRw0C",
					"BQADBAADnQcAApdgXwABcRguNf23hs0C",
					"BQADBAADngcAApdgXwABTsN3sCpD0XAC",
					"BQADBAADnwcAApdgXwABxejRFxbPZToC",
					"BQADBAADoAcAApdgXwAB2VB0OFaLC4AC"
					);
	$n = sizeof($gif) - 1;
	$n = rand(0,$n);
	usleep(500000);
	apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif[$n]));
}

function launchVaporwave($chat_id) {
	$gif = Array (
					"BQADBAADoQcAApdgXwAB9LyO43J_-WwC",
					"BQADBAADogcAApdgXwABLUkD2LFe1lIC",
					"BQADBAADowcAApdgXwABPZMnsW0G588C",
					"BQADBAADpAcAApdgXwABPd3P3XGBalEC",
					"BQADBAADpQcAApdgXwABsRfyzrpUcvQC",
					"BQADBAADpgcAApdgXwABCaGZhynrxukC",
					"BQADBAADpwcAApdgXwABPxDnwDiInxcC",
					"BQADBAADqAcAApdgXwABMFJQwWC9ajUC",
					"BQADBAADqQcAApdgXwABDRjvePDd8iEC",
					"BQADBAADqgcAApdgXwABGPxt4-59j8kC",
					"BQADBAADqwcAApdgXwABob1-UNjSJXkC",
					"BQADBAADrAcAApdgXwABPzgY49BuopcC",
					"BQADBAADrQcAApdgXwABZESUdV_sbK8C",
					"BQADBAADrgcAApdgXwABMCXlQ3RSBiQC",
					"BQADBAADsAcAApdgXwABS0BKZ2ooVlIC",
					"BQADBAADsQcAApdgXwAB-3TJTIzY-WAC",
					"BQADBAADsgcAApdgXwABwdpSMkkSVoYC",
					"BQADBAADswcAApdgXwABGXkdkEPFhisC",
					"BQADBAADtAcAApdgXwAB1d34iv7kKrIC",
					"BQADBAADtQcAApdgXwAB-PFlcGldwdQC",
					"BQADBAADtgcAApdgXwABo2s5X79ukUQC",
					"BQADBAADtwcAApdgXwABG7vYr8vdycEC",
					"BQADBAADuAcAApdgXwABcrQRuxDqygIC",
					"BQADBAADuQcAApdgXwABLDuJXvotQ8UC",
					"BQADBAADugcAApdgXwABCnkhvCswb2YC",
					"BQADBAADuwcAApdgXwABTxN3UgXRY14C",
					"BQADBAADvAcAApdgXwABw0A2hm0wEn4C",
					"BQADBAADvQcAApdgXwAB01YiKkCICToC",
					"BQADBAADvgcAApdgXwABEOo8z6ZePeYC",
					"BQADBAADvwcAApdgXwABuXTYJlt34BAC",
					"BQADBAADwAcAApdgXwAB3depLe25Gl0C",
					"BQADBAADwQcAApdgXwAB5o5HU6yXkLIC",
					"BQADBAADwgcAApdgXwABPFLJROYnKVcC",
					"BQADBAADwwcAApdgXwABMP8rXBiSuMoC",
					"BQADBAADxAcAApdgXwABsQt4OV6JCREC",
					"BQADBAADxQcAApdgXwABeCAhlajetrQC",
					"BQADBAADxgcAApdgXwABCGLNW2djK6AC",
					"BQADBAADxwcAApdgXwAB0eb50CKz7hYC",
					"BQADBAADyAcAApdgXwABN7I0JtDoQVEC",
					"BQADBAADyQcAApdgXwABRxxX0pNHiIcC",
					"BQADBAADygcAApdgXwABdpvfQFicm2AC",
					"BQADBAADywcAApdgXwABpd-zHIPrwZ8C",
					"BQADBAADzAcAApdgXwABTGMcrsnEk4gC",
					"BQADBAADzQcAApdgXwABiEpMCI1Dxk8C",
					"BQADBAADzgcAApdgXwAB76B7CWpQwGQC",
					"BQADBAADzwcAApdgXwAB88wLnGe8o1MC",
					"BQADBAAD0AcAApdgXwABufwEEJJo5L4C",
					"BQADBAAD0QcAApdgXwABcmjhYwzr3l4C",
					"BQADBAAD0gcAApdgXwABkw9vLZzuxvwC",
					"BQADBAAD0wcAApdgXwAB4ugEjzGPmSAC",
					"BQADBAAD1AcAApdgXwABCvcawDh7IpkC",
					"BQADBAAD1QcAApdgXwABTMF6MRE8Z1kC",
					"BQADBAAD1gcAApdgXwABYrzlVAABcbosAg",
					"BQADBAAD1wcAApdgXwABpfyxqIghj4gC",
					"BQADBAAD2AcAApdgXwAByTNtZ9O_wE4C",
					"BQADBAAD2QcAApdgXwAB0nmviK0PODkC",
					"BQADBAAD2gcAApdgXwABtGb63TgH64MC",
					"BQADBAAD2wcAApdgXwABLg8qRitsqfsC",
					"BQADBAAD3AcAApdgXwABzggxt3F3mZcC",
					"BQADBAAD3QcAApdgXwABH7dxbajLYikC",
					"BQADBAAD3gcAApdgXwABFH01aZ2lIFEC",
					"BQADBAAD3wcAApdgXwABbhn5r1K_TmYC"
					);
	$n = sizeof($gif) - 1;
	$n = rand(0,$n);
	usleep(500000);
	apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif[$n]));
}
function rollDice($id) {
	$storedStarting = array(
						"De acuerdo, allá voy.",
						"¡Venga! Vamos allá.",
						"Sí, un segundo...",
						"Vale.",
						"¡Suerte!",
						"Vamos a ver qué sale.",
						"Los limpio un poco y voy.",
						"A ver...",
						"Mm...",
						"Ok.",
						"Está bien.",
						"A tus órdenes.",
						"¡Dame tu fuerza, Pegaso!",
						"Sí, señor.",
						"Que la suerte te acompañe.",
						"Bueno, pero si no te gusta lo que sale no la pagues conmigo."
						);
	$n = sizeof($storedStarting) - 1;
	$n = rand(0,$n);
	apiRequest("sendChatAction", array('chat_id' => $id, 'action' => "typing"));			
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $id, 'parse_mode' => "Markdown", "text" => "*".$storedStarting[$n]."*"));
	$total = 0;
	for($i=0;$i<2;$i++) {
		apiRequest("sendChatAction", array('chat_id' => $id, 'action' => "typing"));
		sleep(1);
		$n = rand(1,6);
		if($n == 1) {
			$res = "◻️◻️◻️".PHP_EOL.
				   "◻️⚫️◻️".PHP_EOL.
				   "◻️◻️◻️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		} else if($n == 2) {
			$res = "◻️◻️⚫️".PHP_EOL.
				   "◻️◻️◻️".PHP_EOL.
				   "⚫️◻️◻️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		} else if($n == 3) {
			$res = "◻️◻️⚫️".PHP_EOL.
				   "◻️⚫️◻️".PHP_EOL.
				   "⚫️◻️◻️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		} else if($n == 4) {
			$res = "⚫️◻️⚫️".PHP_EOL.
				   "◻️◻️◻️".PHP_EOL.
				   "⚫️◻️⚫️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		} else if($n == 5) {
			$res = "⚫️◻️⚫️".PHP_EOL.
				   "◻️⚫️◻️".PHP_EOL.
				   "⚫️◻️⚫️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		} else {
			$res = "⚫️◻️⚫️".PHP_EOL.
				   "⚫️◻️⚫️".PHP_EOL.
				   "⚫️◻️⚫️";
			apiRequest("sendMessage", array('chat_id' => $id, "text" => $res));
		}
		$total = $total + $n;
	}
	apiRequest("sendChatAction", array('chat_id' => $id, 'action' => "typing"));
	sleep(1);
	$result = array(
						"¡".$total."!",
						"¡El ".$total."!",
						"¡Un ".$total."!",
						"Ha salido el ".$total.".",
						$total.".",
						"Número ".$total.".",
						"El resultado es ".$total.".",
						"El ".$total." señora."
						);
	$n = sizeof($result) - 1;
	$n = rand(0,$n);
	apiRequest("sendMessage", array('chat_id' => $id, 'parse_mode' => "Markdown", "text" => "*".$result[$n]."*"));
}

function inlineOptions($text, $username) {
	$boldText = "<b>".$text."</b>";
	$blueText = "<a href='http://telegram.me/DemisukeBot'>".$text."</a>";
	$spoilerText = "<b>¡".$username." tiene un secreto que revelarte!</b>";
	if(strlen($text) > 10 && strpos(strtolower($text), "spoiler:") !== false) {
		$final = strpos(strtolower($text), "spoiler:");
		$question = substr($text, 0, $final);
		$spoilerText = $spoilerText.PHP_EOL."<b>Además añade lo siguiente:</b>".PHP_EOL."<i>".$question."</i>";
		$start = $final + 8;
		$hiddenText = substr($text, $start);
	} else {
		$hiddenText = $text;
	}
	$hiddenText = rtrim(ltrim($hiddenText));
	$descriptionText = "Se enviará el texto oculto (";
	if(strlen($hiddenText) > 64) {
		$descriptionText = $descriptionText."se recortará el mensaje).";
	} else if(strlen($hiddenText) == 64) {
		$descriptionText = $descriptionText."tamaño al máximo).";
	} else if(strlen($hiddenText) == 63) {
		$descriptionText = $descriptionText."1 carácter restante).";
	} else {
		$left = 64 - strlen($hiddenText);
		$descriptionText = $descriptionText.$left." caracteres restantes).";
	}
	if($hiddenText == "") {
		$hiddenText = "Mi estupidez me ha hecho enviar el mensaje en blanco.";
	}
	$hiddenText = mb_strimwidth($hiddenText, 0, 64);
	$keyboardButton = (object) ["text" => "Desvelar spoiler", "callback_data" => $hiddenText];
	$buttons[] = [
		"type" => "article",
		"id" => "0",
		"title" => "Enviar spoiler",
		"description" => $descriptionText,
		"message_text" => $spoilerText,
		"parse_mode" => "HTML",
		"thumb_url" => "https://demisuke-kamigram.rhcloud.com/demisuke_spoiler.png",
		"thumb_width" => 100,
		"thumb_height" => 100,
		"reply_markup" => [
			"inline_keyboard" => [[
				$keyboardButton,
			]] 
		], 
	];
    $buttons[] = [
		"type" => "article",
		"id" => "1",
		"title" => "Enviar en negrita",
		"description" => "Se enviará el texto en negrita.",
		"message_text" => $boldText,
		"parse_mode" => "HTML",
		"thumb_url" => "https://demisuke-kamigram.rhcloud.com/demisuke_bold.png",
		"thumb_width" => 100,
		"thumb_height" => 100,
    ];
	$buttons[] = [
		"type" => "article",
		"id" => "2",
		"title" => "Enviar en azul",
		"description" => "El texto enviado parecerá un enlace.",
		"message_text" => $blueText,
		"parse_mode" => "HTML",
		"disable_web_page_preview" => TRUE,
		"thumb_url" => "https://demisuke-kamigram.rhcloud.com/demisuke_link.png",
		"thumb_width" => 100,
		"thumb_height" => 100,
    ];
	return $buttons;	
}

function checkPoint($hour, $chat_id, $link, $logname, $currentTime) {
	$waitTime = rand(0, 25000);
	$waitTime = $waitTime * 2;
	usleep($waitTime);
	$query = "SELECT epoch_time FROM flagwinnerlog ORDER BY epoch_time DESC LIMIT 1";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if($row['epoch_time'] == $currentTime) {
		error_log($logname." tried to capture a doubleflag.");
		$userTriggering = str_replace("@", "", $logname);
		$admin_id = 6250647;
		apiRequest("sendMessage", array('chat_id' => $admin_id, 'parse_mode' => "Markdown", "text" => "*".$userTriggering." ha intentado capturar una bandera fantasma y se le ha denegado el permiso.*"));

		mysql_free_result($result);
		poleFail($hour, $chat_id, $link, $logname, $currentTime);
	}
}

function poleFail($hour, $chat_id, $link, $logname, $currentTime) {
	error_log($logname." triggered: Polefail.");

	$query = "SELECT group_name, user_name FROM flagcapture WHERE last_flag = '".$currentTime."' ORDER BY fc_id";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	$row = mysql_fetch_array($result);
	$text = "🚩 <b>La bandera de la";
	if($hour != 1) {
		$text = $text."s";
	}
	$timeEmoji = timeEmoji($hour, 0);
	$text = $text." ".$timeEmoji." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
	$text = $text.PHP_EOL."📍 <b>Justo en esta décima de segundo el mástil no se puede consultar.</b>";
	$text = $text.PHP_EOL.PHP_EOL."🏆 <i>Consulta con !banderas el ránking global de banderas, con !banderasgrupo el ránking local y con !mastiles quién ha reclamado más veces un mástil en tu grupo.</i>";
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
	mysql_free_result($result);
	mysql_close($link);
	exit;
}

function getRockMan($chat_id) {
	$link = dbConnect();
	$query = 'SELECT ub.first_name, ub.user_name, IF( pb.group_id IS NOT NULL , gb.name,  "" ) AS  "name", pb.level, ( hp + body ) AS  "hp_points", ( attack + weapon ) AS  "attack_points", ( defense + shield ) AS  "defense_points", ( critic + helmet ) AS  "critic_points", ( speed + boots ) AS  "speed_points", pb.pvp_wins FROM playerbattle pb, groupbattle gb, userbattle ub WHERE ( pb.group_id = gb.group_id OR pb.group_id IS NULL ) AND pb.user_id = ub.user_id AND pb.pvp_allowed =1 AND pb.level > 10 GROUP BY pb.user_id ORDER BY pb.pvp_wins DESC , pb.exp_points DESC LIMIT 0 , 10';
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = "<b>🏁 TOP 10 de jugadores más rocosos en el PvP de Telegram:</b>".PHP_EOL.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['level'])) {
			switch($i) {
				case 0: $text = $text."<b>🏆 Líder </b>";
						break;
				case 1: $text = $text."<b>🎖2º </b>";
						break;
				case 2: $text = $text."<b>🏅3º </b>";
						break;
				case 3: $text = $text."4⃣ ";
						break;
				case 4: $text = $text."5⃣ ";
						break;
				case 5: $text = $text."6⃣ ";
						break;
				case 6: $text = $text."7⃣ ";
						break;
				case 7: $text = $text."8⃣ ";
						break;
				case 8: $text = $text."9⃣ ";
						break;
				case 9: $text = $text."🔟 ";
						break;
				default: break;
			}
			$text = $text."<b>".getFullName($row['first_name'], $row['user_name'])."</b>".PHP_EOL;
			if(strlen($row['name']) > 0) {
				$text = $text."<b>Del clan ".$row['name']."</b>".PHP_EOL;
			}
			$text = $text."<b>Nivel: </b>".$row['level'].PHP_EOL;
			$tempFormattedPoints = number_format($row['pvp_wins'], 0, ',', '.');
			$text = $text."<b>Victorias PvP:</b> ".$tempFormattedPoints.PHP_EOL;
			$text = $text."<b>Estadísticas:</b>".PHP_EOL;
			$text = $text."<pre>VID: ".ratePower($row['hp_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>ATA: ".ratePower($row['attack_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>DEF: ".ratePower($row['defense_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>CRÍ: ".ratePower($row['critic_points'], 1)."</pre>".PHP_EOL;
			$text = $text."<pre>VEL: ".ratePower($row['speed_points'])."</pre>".PHP_EOL.PHP_EOL;
		} else if($i==0) {
			$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
		}
		if($i == 4) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			$text = "";
		}
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text."<i>En esta lista tan solo aparecerán aquellos rocosos que tengan permitidos los duelos PvP ordenados por victorias.</i>";
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
}

function getRockManGroup($chat_id) {
	$link = dbConnect();
	$query = 'SELECT ub.first_name, ub.user_name, gb.name, pb.level, ( hp + body ) AS  "hp_points", ( attack + weapon ) AS  "attack_points", ( defense + shield ) AS  "defense_points", ( critic + helmet ) AS  "critic_points", ( speed + boots ) AS  "speed_points", pb.pvp_wins FROM playerbattle pb, groupbattle gb, userbattle ub WHERE pb.user_id = ub.user_id AND pb.group_id = gb.group_id AND pb.group_id = '.$chat_id.' GROUP BY pb.id_player ORDER BY pb.exp_points DESC LIMIT 0 , 10';
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = "";
	$hasMembers = 0;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['level'])) {
			switch($i) {
				case 0: $text = $text."<b>🏁 TOP 10 de jugadores más rocosos de ".$row['name'].":</b>".PHP_EOL.PHP_EOL."<b>🏆 Líder </b>";
						$hasMembers = 1;
						break;
				case 1: $text = $text."<b>🎖2º </b>";
						break;
				case 2: $text = $text."<b>🏅3º </b>";
						break;
				case 3: $text = $text."4⃣ ";
						break;
				case 4: $text = $text."5⃣ ";
						break;
				case 5: $text = $text."6⃣ ";
						break;
				case 6: $text = $text."7⃣ ";
						break;
				case 7: $text = $text."8⃣ ";
						break;
				case 8: $text = $text."9⃣ ";
						break;
				case 9: $text = $text."🔟 ";
						break;
				default: break;
			}
			$text = $text."<b>".getFullName($row['first_name'], $row['user_name'])."</b>".PHP_EOL;
			$text = $text."<b>Nivel: </b>".$row['level'].PHP_EOL;
			$tempFormattedPoints = number_format($row['pvp_wins'], 0, ',', '.');
			$text = $text."<b>Victorias PvP:</b> ".$tempFormattedPoints.PHP_EOL;
			$text = $text."<b>Estadísticas:</b>".PHP_EOL;
			$text = $text."<pre>VID: ".ratePower($row['hp_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>ATA: ".ratePower($row['attack_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>DEF: ".ratePower($row['defense_points'])."</pre>".PHP_EOL;
			$text = $text."<pre>CRÍ: ".ratePower($row['critic_points'], 1)."</pre>".PHP_EOL;
			$text = $text."<pre>VEL: ".ratePower($row['speed_points'])."</pre>".PHP_EOL.PHP_EOL;
		} else if($i==0) {
			$text = $text."<b>🏁 TOP 10 de jugadores más rocosos del grupo:</b>".PHP_EOL.PHP_EOL."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
		}
	}
	mysql_free_result($result);
	if($hasMembers == 1) {
		$query = 'SELECT COUNT( * ) AS  "members" FROM playerbattle WHERE group_id = '.$chat_id.' GROUP BY group_id ';
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$text = $text."<b>Miembros totales del clan: </b>".$row['members'].PHP_EOL.PHP_EOL;
		mysql_free_result($result);
	}
	mysql_close($link);
	$text = $text."<i>¡Recuerda que si el clan tiene al menos cinco rocosos entre sus filas puedes utilizar la función !declararguerra para luchar contra otros grupos! Utiliza la función !unirme si tienes creado un personaje y quieres unirte al clan.</i>";
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
}
function getGroupBattle($owngroup) {
	//HTML Parse Mode
	$link = dbConnect();
	$query = 'SELECT * FROM groupbattle WHERE lastpoint > 0 ORDER BY total DESC, lastpoint';
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = "<b>🏁 Clasificación global de grupos:</b>"
			.PHP_EOL.PHP_EOL.
			"<b>🏆 POLE ABSOLUTA 🏆</b>"
			.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['total'])) {
			if($row['total'] > 0) {
				switch($i) {
					case 1: $text = $text."<b>🎖2º </b>";
							break;
					case 2: $text = $text."<b>🏅3º </b>";
							break;
					case 3: $text = $text."4⃣ ";
							break;
					case 4: $text = $text."5⃣ ";
							break;
					case 5: $text = $text."6⃣ ";
							break;
					case 6: $text = $text."7⃣ ";
							break;
					case 7: $text = $text."8⃣ ";
							break;
					case 8: $text = $text."9⃣ ";
							break;
					case 9: $text = $text."🔟 ";
							break;
					default: break;
				}
				$tempFormattedPoints = number_format($row['total'], 0, ',', '.');
				$text = $text.
						"<b>".$row['name']."</b>"
						.PHP_EOL.
						"<i>".$tempFormattedPoints." puntos.</i>"
						.PHP_EOL.PHP_EOL;
			}
		}
	}
	if($owngroup != 0) {
		mysql_free_result($result);
		$query = 'SELECT * FROM groupbattle WHERE group_id = '.$owngroup;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$safeGroup = rankedGroup($owngroup);
		if($safeGroup == 1) {
			$tempFormattedPoints = number_format($row['total'], 0, ',', '.');
			$text = $text.
					"<b>\"".$row['name']."\" tiene un total de ".$tempFormattedPoints." puntos.</b>"
					.PHP_EOL.PHP_EOL;
		} else {
			$text = $text.
					"<b>\"".$row['name']."\" está descalificado de la competición.</b>"
					.PHP_EOL.PHP_EOL;
		}
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text.
			"<i>Los mensajes generados automáticamente por bots o el uso de stickers o imágenes no sumarán ningún punto a esta clasificación.</i>";
	return $text;
}

function getUserBattle($myself, $global, $group = 0, $groupName = "grupo") {
	//HTML Parse Mode
	if($global == 0 && $group == 0) {
		$text = "<b>La función !mensajesgrupo es exclusiva para grupos y supergrupos, ¡añádeme a alguno y utilízala allí!</b>";
	}
	else {
		$link = dbConnect();
		if($global == 1){
			$text = "<b>🏁 TOP 10 de usuarios más activos en Telegram:</b>";
			$query = "SELECT user_id, first_name, user_name, MAX(lastpoint) AS lastpoint, SUM(total) AS total FROM userbattle WHERE visible = TRUE GROUP BY user_id ORDER BY total DESC, lastpoint";
		} else {
			$text = "<b>🏁 TOP 10 de usuarios más activos de ".$groupName.":</b>";
			$query = "SELECT user_id, first_name, user_name, total FROM userbattle WHERE group_id = '".$group."' ORDER BY total DESC, lastpoint";
		}
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$text = $text.PHP_EOL.PHP_EOL;
		for($i=0;$i<10;$i++) {
			$row = mysql_fetch_array($result);
			if(isset($row['total'])) {
				if($row['total'] > 0) {
					switch($i) {
						case 0: $text = $text."<b>🏆 Líder </b>";
								break;
						case 1: $text = $text."<b>🎖2º </b>";
								break;
						case 2: $text = $text."<b>🏅3º </b>";
								break;
						case 3: $text = $text."4⃣ ";
								break;
						case 4: $text = $text."5⃣ ";
								break;
						case 5: $text = $text."6⃣ ";
								break;
						case 6: $text = $text."7⃣ ";
								break;
						case 7: $text = $text."8⃣ ";
								break;
						case 8: $text = $text."9⃣ ";
								break;
						case 9: $text = $text."🔟 ";
								break;
						default: break;
					}
					$text = $text.
							"<b>".$row['first_name']."</b>";
					if(strlen($row['user_name']) > 0) {
						$text = $text.
							"<b> (".$row['user_name'].")</b>";
					}
					$tempFormattedPoints = number_format($row['total'], 0, ',', '.');
					$text = $text."<b>:</b> ".$tempFormattedPoints.PHP_EOL.PHP_EOL;
				}
			} else if($i==0) {
				$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
			}
		}
		mysql_free_result($result);
		if($global == 1) {
			$query = "SELECT user_id, first_name, user_name, SUM(total) AS total FROM userbattle WHERE visible = TRUE AND user_id = '".$myself."' GROUP BY user_id";
		} else {
			$query = "SELECT user_id, first_name, user_name, total FROM userbattle WHERE user_id = '".$myself."' AND group_id = '".$group."'";
		}
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['user_id'])) {
			$text = $text.
			"<b>".$row['first_name'];
			if(strlen($row['user_name']) > 0) {
				$text = $text." (".$row['user_name'].")";
			}
			$text = $text." tiene un total de ".$row['total']." mensaje";
			if($row['total'] > 1) {
				$text = $text."s válidos";
			} else {
				$text = $text." válido";
			}
			if($global == 0) {
				$text = $text." escrito";
				if($row['total'] > 1) {
					$text = $text."s";
				}
				$text = $text." en ".$groupName;
			}
			$text = $text.".</b>".PHP_EOL.PHP_EOL;
		}
		mysql_free_result($result);
		mysql_close($link);
		if($global == 1){
			$text = $text."<i>Recuerda que para competir en este ránking debes apuntarte con la función !activame, siempre podrás ocultarte de nuevo con !desactivame.</i>".
					PHP_EOL."<i>Consulta con !mensajesgrupo el ránking usuarios activos de este grupo.</i>";
		} else {
			$text = $text."<i>Consulta con !mensajes el ránking general de usuarios activos en Telegram.</i>";
		}
	}
	return $text;
}


function getClanList($chat_id) {
	//HTML Parse Mode
	$link = dbConnect();
	$text = "<b>⚔ Lista de clanes listos para la batalla:</b>";
	$query = "SELECT gb.name, pb.group_id, COUNT( pb.user_id ) AS  'members' FROM playerbattle pb, groupbattle gb WHERE pb.group_id IS NOT NULL AND gb.group_id = pb.group_id AND gb.lastpoint >0 GROUP BY pb.group_id HAVING COUNT( pb.user_id ) >4 ORDER BY CASE WHEN pb.user_id =0 THEN -1 ELSE COUNT( pb.user_id ) END DESC , pb.group_id DESC";
 	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = $text.PHP_EOL.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['name'])) {
			$number = $i + 1;
			if(strlen($row['name']) > 60) {
				$clanName = substr($row['name'], 0, 57);
				$clanName = $clanName."...";
			} else {
				$clanName = $row['name'];
			}
			$text = $text."<pre>【".$number."】".getClanLevelByMembers($row['members']).$clanName."</pre>".PHP_EOL;
		} else if($i==0) {
			$text = $text."<i>Ninguno.</i>".PHP_EOL;
		}
		if(strlen($text) > 3000) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			$text = "";
		}
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text.PHP_EOL."<i>Utiliza el número que aparece entre corchetes al principio de cada línea para declararle la guerra a ese clan, por ejemplo con \"!declararguerra 1\".</i>";
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
}

function getClanRank($chat_id, $groupTitle = "Ninguno", $isGroup = 0) {
	//HTML Parse Mode
	$link = dbConnect();
	$query = 'SELECT gb.name, COALESCE (pb.cnt, 0) AS "members", COALESCE (gbr.cnt, 0) AS "pvp_victories" FROM groupbattle gb LEFT JOIN ( SELECT group_id, COUNT( * ) AS cnt FROM playerbattle GROUP BY group_id ) pb ON pb.group_id = gb.group_id LEFT JOIN ( SELECT winner_group, COUNT( * ) AS  cnt FROM groupbattleresults GROUP BY winner_group ) gbr ON gb.group_id = gbr.winner_group WHERE gb.lastpoint >0 HAVING pvp_victories > 0 ORDER BY pvp_victories DESC , members DESC , gb.group_id ASC LIMIT 0 , 10';
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = "<b>🏁 TOP 10 de clanes con victorias PvP de Telegram:</b>".PHP_EOL.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['name'])) {
			switch($i) {
				case 0: $text = $text."<b>🏆 Líder </b>";
						break;
				case 1: $text = $text."<b>🎖2º </b>";
						break;
				case 2: $text = $text."<b>🏅3º </b>";
						break;
				case 3: $text = $text."4⃣ ";
						break;
				case 4: $text = $text."5⃣ ";
						break;
				case 5: $text = $text."6⃣ ";
						break;
				case 6: $text = $text."7⃣ ";
						break;
				case 7: $text = $text."8⃣ ";
						break;
				case 8: $text = $text."9⃣ ";
						break;
				case 9: $text = $text."🔟 ";
						break;
				default: break;
			}
			$text = $text."<b>".getClanLevelByMembers($row['members']).$row['name']."</b>";
			$tempFormattedPoints = number_format($row['pvp_victories'], 0, ',', '.');
			$text = $text."<b>:</b> ".$tempFormattedPoints." victoria";
			if($row['pvp_victories'] != 1) {
				$text = $text."s";
			}
			$text = $text." PvP".PHP_EOL.PHP_EOL;
		} else if($i==0) {
			$text = $text."<i>Ninguno.</i>".PHP_EOL.PHP_EOL;
		}
	}
	if($isGroup == 1) {
		mysql_free_result($result);
		$query = 'SELECT COUNT( * ) AS  "wins" FROM  groupbattleresults WHERE winner_group = '.$chat_id;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$text = $text."<b>".$groupTitle." tiene ".$row['wins']." victoria";
		if($row['wins'] != 1) {
			$text = $text."s";
		}
		$text = $text." PvP</b>".PHP_EOL.PHP_EOL;
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text."<i>Utiliza \"!clanes lista\" para saber a qué grupos les puedes !declararguerra.</i>";
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	usleep(100000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
}
function timeEmoji($time, $aHalf) {
	if($aHalf == 0){
		switch($time) {
			case 1: return "1 🕐";
					break;
			case 2: return "2 🕑";
					break;
			case 3: return "3 🕒";
					break;
			case 4: return "4 🕓";
					break;
			case 5: return "5 🕔";
					break;
			case 6: return "6 🕕";
					break;
			case 7: return "7 🕖";
					break;
			case 8: return "8 🕗";
					break;
			case 9: return "9 🕘";
					break;
			case 10: return "10 🕙";
					break;
			case 11: return "11 🕚";
					break;
			case 12: return "12 🕛";
					break;
			default: return $time;
					break;
		}
	} else {
		switch($time) {
			case 1: return "1:30 🕜";
					break;
			case 2: return "2:30 🕝";
					break;
			case 3: return "3:30 🕞";
					break;
			case 4: return "4:30 🕟";
					break;
			case 5: return "5:30 🕠";
					break;
			case 6: return "6:30 🕡";
					break;
			case 7: return "7:30 🕢";
					break;
			case 8: return "8:30 🕣";
					break;
			case 9: return "9:30 🕤";
					break;
			case 10: return "10:30 🕥";
					break;
			case 11: return "11:30 🕦";
					break;
			case 12: return "12:30 🕧";
					break;
			case 0: return "12:30 🕧";
					break;
			default: return $time;
					break;
		}
	}
}

function getGroupTokens($myself, $group, $groupName) {
	//HTML Parse Mode
	$link = dbConnect();
	$text = "<b>🏁 Ránking de fichas de ".$groupName.":</b>";
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = ".$group." GROUP BY userbet.user_id ORDER BY tokens DESC";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = $text.PHP_EOL.PHP_EOL.
			"<b>🏆 POLE ABSOLUTA 🏆</b>"
			.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['tokens'])) {
			if($row['tokens'] > 0) {
				switch($i) {
					case 1: $text = $text."<b>🎖2º </b>";
							break;
					case 2: $text = $text."<b>🏅3º </b>";
							break;
					case 3: $text = $text."4⃣ ";
							break;
					case 4: $text = $text."5⃣ ";
							break;
					case 5: $text = $text."6⃣ ";
							break;
					case 6: $text = $text."7⃣ ";
							break;
					case 7: $text = $text."8⃣ ";
							break;
					case 8: $text = $text."9⃣ ";
							break;
					case 9: $text = $text."🔟 ";
							break;
					default: break;
				}
				$tempFormattedPoints = number_format($row['tokens'], 0, ',', '.');
				if($row['user_name'] == "") {
					$tempUser = $row['first_name'];
				} else {
					$tempUser = $row['user_name'];
				}
				$text = $text.
						"<b>".$tempUser."</b>"
						.PHP_EOL.
						"<i>".$tempFormattedPoints." ficha";
				if($row['tokens'] > 1) {
					$text = $text."s";
				}
				$text = $text.".</i>".PHP_EOL.PHP_EOL;
			}
		} else if($i==0) {
			$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
		}
	}
	mysql_free_result($result);
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = ".$group." AND userbet.user_id = ".$myself." GROUP BY userbet.user_id";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if(isset($row['user_id'])) {
		if($row['user_name'] == "") {
			$tempUser = $row['first_name'];
		} else {
			$tempUser = $row['user_name'];
		}
		$text = $text.
		"<b>".$tempUser." tiene ".$row['tokens']." ficha";
		if($row['tokens'] > 1) {
			$text = $text."s";
		}
		$text = $text.".</b>".PHP_EOL.PHP_EOL;
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text.
			"<i>Para aparecer aquí debes haber apostado al menos una vez en el grupo.".PHP_EOL.
			"Recuerda que también puedes conseguir fichas adicionales usando la función \"!fichas\" desde chat privado con el bot.</i>";
	return $text;
}

function getLudo($myself) {
	//HTML Parse Mode
	$link = dbConnect();
	$text = "<b>🏁 Ránking de los más ludópatas de Telegram:</b>";
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = 0 GROUP BY userbet.user_id ORDER BY tokens DESC LIMIT 0, 10";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$text = $text.PHP_EOL.PHP_EOL.
			"<b>🏆 POLE ABSOLUTA 🏆</b>"
			.PHP_EOL;
	for($i=0;$i<10;$i++) {
		$row = mysql_fetch_array($result);
		if(isset($row['tokens'])) {
			if($row['tokens'] > 0) {
				switch($i) {
					case 1: $text = $text."<b>🎖2º </b>";
							break;
					case 2: $text = $text."<b>🏅3º </b>";
							break;
					case 3: $text = $text."4⃣ ";
							break;
					case 4: $text = $text."5⃣ ";
							break;
					case 5: $text = $text."6⃣ ";
							break;
					case 6: $text = $text."7⃣ ";
							break;
					case 7: $text = $text."8⃣ ";
							break;
					case 8: $text = $text."9⃣ ";
							break;
					case 9: $text = $text."🔟 ";
							break;
					default: break;
				}
				$tempFormattedPoints = number_format($row['tokens'], 0, ',', '.');
				if($row['user_name'] == "") {
					$tempUser = $row['first_name'];
				} else {
					$tempUser = $row['user_name'];
				}
				$text = $text.
						"<b>".$tempUser."</b>"
						.PHP_EOL.
						"<i>".$tempFormattedPoints." ficha";
				if($row['tokens'] > 1) {
					$text = $text."s";
				}
				$text = $text.".</i>".PHP_EOL.PHP_EOL;
			}
		} else if($i==0) {
			$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
		}
	}
	mysql_free_result($result);
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = 0 AND userbet.user_id = ".$myself." GROUP BY userbet.user_id";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if(isset($row['user_id'])) {
		if($row['user_name'] == "") {
			$tempUser = $row['first_name'];
		} else {
			$tempUser = $row['user_name'];
		}
		$text = $text.
		"<b>".$tempUser." tiene ".$row['tokens']." ficha";
		if($row['tokens'] > 1) {
			$text = $text."s";
		}
		$text = $text.".</b>".PHP_EOL.PHP_EOL;
	}
	mysql_free_result($result);
	mysql_close($link);
	$text = $text.
			"<i>Para aparecer aquí debes haber jugado al menos una vez a las tragaperras.".PHP_EOL.
			"Recuerda que también puedes conseguir fichas adicionales usando la función \"!fichas\" desde chat privado con el bot.</i>";
	return $text;
}
function getFlagBattle($myself, $global, $group = 0, $groupName = "grupo") {
	//HTML Parse Mode
	if($global == 0 && $group == 0) {
		$text = "<b>La función !banderasgrupo es exclusiva para grupos y supergrupos, ¡añádeme a alguno y utilízala allí!</b>";
	}
	else {
		$link = dbConnect();
		if($global == 1){
			$text = "<b>🏁 Ránking global de Banderas capturadas:</b>";
			$query = "SELECT user_id, user_name, MAX(last_flag) AS last_flag, SUM(total) AS total FROM flagcapture WHERE total > 0 GROUP BY user_id ORDER BY total DESC , last_flag";
		} else {
			$text = "<b>🏁 Ránking de ".$groupName." de Banderas capturadas:</b>";
			$query = "SELECT user_id, user_name, total FROM flagcapture WHERE total > 0 AND group_id =  '".$group."' ORDER BY total DESC , last_flag";
		}
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$text = $text.PHP_EOL.PHP_EOL.
				"<b>🏆 POLE ABSOLUTA 🏆</b>"
				.PHP_EOL;
		for($i=0;$i<10;$i++) {
			$row = mysql_fetch_array($result);
			if(isset($row['total'])) {
				if($row['total'] > 0) {
					switch($i) {
						case 1: $text = $text."<b>🎖2º </b>";
								break;
						case 2: $text = $text."<b>🏅3º </b>";
								break;
						case 3: $text = $text."4⃣ ";
								break;
						case 4: $text = $text."5⃣ ";
								break;
						case 5: $text = $text."6⃣ ";
								break;
						case 6: $text = $text."7⃣ ";
								break;
						case 7: $text = $text."8⃣ ";
								break;
						case 8: $text = $text."9⃣ ";
								break;
						case 9: $text = $text."🔟 ";
								break;
						default: break;
					}
					$text = $text.
							"<b>".$row['user_name']."</b>"
							.PHP_EOL.
							"<i>".$row['total']." bandera";
					if($row['total'] > 1) {
						$text = $text."s";
					}
					$text = $text.".</i>".PHP_EOL.PHP_EOL;
				}
			} else if($i==0) {
				$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
			}
		}
		mysql_free_result($result);
		if($global == 1) {
			$query = "SELECT user_id, user_name, SUM(total) AS total FROM flagcapture WHERE user_id = '".$myself."' GROUP BY user_id";
		} else {
			$query = "SELECT user_id, user_name, total FROM flagcapture WHERE user_id = '".$myself."' AND group_id = '".$group."'";
		}
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['user_id'])) {
			$text = $text.
			"<b>".$row['user_name']." ha capturado ".$row['total']." bandera";
			if($row['total'] > 1) {
				$text = $text."s";
			}
			if($global == 0) {
				$text = $text." desde ".$groupName;
			}
			$text = $text.".</b>".PHP_EOL.PHP_EOL;
		}
		mysql_free_result($result);
		mysql_close($link);
		$text = $text.
				"<i>Cada hora se planta una nueva bandera en el bot.".PHP_EOL.
				"Recuerda que las puedes capturar con la función \"!pole\" y consultar el ránking global con \"!banderas\" y el de tu grupo con \"!banderasgrupo\".</i>";
	}
	return $text;
}


function getHeroesBattle($myself, $global, $group = 0, $groupName = "grupo") {
	//HTML Parse Mode
	if($global == 0 && $group == 0) {
		$text = "<b>La función !heroesgrupo es exclusiva para grupos y supergrupos, ¡añádeme a alguno y utilízala allí!</b>";
	}
	else {
		$link = dbConnect();
		if($global == 1){
			$text = "<b>🏁 Los diez héroes de Telegram:</b>";
			$query = "SELECT user_id, name, total FROM heroesbattle WHERE total > 119 ORDER BY total DESC , last_check";
		} else {
			$text = "<b>🏁 Los diez héroes de ".$groupName.":</b>";
			$query = "SELECT user_id, name, total FROM heroesbattle WHERE user_id IN ( SELECT user_id FROM userbattle WHERE group_id = ".$group." ) ORDER BY total DESC , last_check";
		}
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$text = $text.PHP_EOL.PHP_EOL.
				"<b>🏆 SUPERHÉROE 🏆</b>"
				.PHP_EOL;
		for($i=0;$i<10;$i++) {
			$row = mysql_fetch_array($result);
			if(isset($row['total'])) {
				if($row['total'] > 0) {
					switch($i) {
						case 1: $text = $text."<b>🎖2º </b>";
								break;
						case 2: $text = $text."<b>🏅3º </b>";
								break;
						case 3: $text = $text."4⃣ ";
								break;
						case 4: $text = $text."5⃣ ";
								break;
						case 5: $text = $text."6⃣ ";
								break;
						case 6: $text = $text."7⃣ ";
								break;
						case 7: $text = $text."8⃣ ";
								break;
						case 8: $text = $text."9⃣ ";
								break;
						case 9: $text = $text."🔟 ";
								break;
						default: break;
					}
					$text = $text.
							"<b>".$row['name']."</b>"
							.PHP_EOL.
							"<i>".$row['total']." punto";
					if($row['total'] > 1) {
						$text = $text."s";
					}
					$text = $text.".</i>".PHP_EOL.PHP_EOL;
				}
			} else if($i==0) {
				$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
			}
		}
		mysql_free_result($result);
		$query = "SELECT user_id, name, total FROM heroesbattle WHERE user_id = '".$myself."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['user_id'])) {
			$text = $text.
			"<b>".$row['name']." tiene ".$row['total']." punto";
			if($row['total'] > 1) {
				$text = $text."s";
			}
			$text = $text." de heroicidad.</b>".PHP_EOL.PHP_EOL;
		}
		mysql_free_result($result);
		mysql_close($link);
		$text = $text.
				"<i>Para ganar puntos juega utilizando la función !boton.".PHP_EOL.
				"Si 'Héroes de Telegram' no está disponible en tu grupo puedes jugar por mensaje privado al bot. Con !ayuda puedes consultar las reglas del juego.</i>";
	}
	return $text;
}
function getPoleBattle($myself, $group, $groupName = "grupo") {
	//HTML Parse Mode
	if($group == 0) {
		$text = "<b>La función !mastiles es exclusiva para grupos y supergrupos, ¡añádeme a alguno y utilízala allí!</b>";
	}
	else {
		$link = dbConnect();
		$text = "<b>🏁 Ránking de ".$groupName." de Mástiles reclamados:</b>";
		$query = "SELECT first_name, user_name, totalpole FROM userbattle WHERE totalpole > 0 AND group_id = '".$group."' ORDER BY totalpole DESC , lastpole";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$text = $text.PHP_EOL.PHP_EOL.
				"<b>🏆 POLE ABSOLUTA 🏆</b>"
				.PHP_EOL;
		for($i=0;$i<10;$i++) {
			$row = mysql_fetch_array($result);
			if(isset($row['totalpole'])) {
				if($row['totalpole'] > 0) {
					switch($i) {
						case 1: $text = $text."<b>🎖2º </b>";
								break;
						case 2: $text = $text."<b>🏅3º </b>";
								break;
						case 3: $text = $text."4⃣ ";
								break;
						case 4: $text = $text."5⃣ ";
								break;
						case 5: $text = $text."6⃣ ";
								break;
						case 6: $text = $text."7⃣ ";
								break;
						case 7: $text = $text."8⃣ ";
								break;
						case 8: $text = $text."9⃣ ";
								break;
						case 9: $text = $text."🔟 ";
								break;
						default: break;
					}
					if($row['user_name'] == "") {
						$text = $text.
								"<b>".$row['first_name']."</b>"
								.PHP_EOL.
								"<i>".$row['totalpole']." m";
					} else {
						$text = $text.
								"<b>".$row['user_name']."</b>"
								.PHP_EOL.
								"<i>".$row['totalpole']." m";
					}
					if($row['totalpole'] > 1) {
						$text = $text."ástiles";
					} else {
						$text = $text."ástil";
					}
					$text = $text.".</i>".PHP_EOL.PHP_EOL;
				}
			} else if($i==0) {
				$text = $text."<i>Nadie.</i>".PHP_EOL.PHP_EOL;
			}
		}
		mysql_free_result($result);
		$query = "SELECT user_id, first_name, user_name, totalpole FROM userbattle WHERE user_id = '".$myself."' AND group_id = '".$group."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['user_id'])) {
			if($row['totalpole'] > 0) {
				$text = $text."<b>";
				if($row['user_name'] == "") {
					$checkName = $row['first_name'];
				} else {
					$checkName = $row['user_name'];
				}				
				$text = $text.$checkName." ha reclamado ".$row['totalpole']." m";
				if($row['totalpole'] > 1) {
					$text = $text."ástiles";
				} else {
					$text = $text."ástil";
				}
				$text = $text.".</b>".PHP_EOL.PHP_EOL;
			}
		}
		mysql_free_result($result);
		mysql_close($link);
		$text = $text.
				"<i>Cada sesenta minutos aparece un nuevo mástil en cada uno de los grupos del bot.".PHP_EOL.
				"Recuerda que los puedes reclamar con la función \"!pole\".</i>";
	}
	return $text;
}

function containsCommand($text) {
	$commandsList = array(
						"/start",
						"/demisuke",
						"!ayuda",
						"!dados",
						"!insulta",
						"!siono",
						"!ping",
						"!temazo",
						"!cancion",
						"!canción",
						"!video",
						"!boton",
						"!botón",
						"!mensajes",
						"!desactivame",
						"!activame",
						"!banderas",
						"!pole",
						"!grupos",
						"!nick",
						"!info",
						"!quien",
						"!quién",
						"!mastil",
						"!mástil",
						"!modo",
						"!cambiarmodo",
						"!bloquearpole",
						"!permitirpole",
						"!squirtle",
						"!barcelona",
						"!madrid",
						"!bequer",
						"!moneda",
						"!becker",
						"!texto",
						"!bienvenida",
						"!sugerencia",
						"!becquer",
						"!invoca",
						"!acho",
						"!enjuto",
						"!héroes",
						"!heroes",
						"!chiste",
						"!apuesta",
						"!slot",
						"!777",
						"!ludopata",
						"!ludópata",
						"!ruleta",
						"!fichas",
						"!macaco",
						"!vapor",
						"!exp",
						"!gastarpunto",
						"/exp",
						"!pj",
						"/pj",
						"!botella",
						"!unirme",
						"!clanes",
						"!atacar",
						"!avatarpj",
						"!avatarclan",
						"!declararguerra",
						"!aceptarguerra",
						"!pvp",
						"!listapvp",
						"!rocosos",
						"!rechazarguerra",
						"!guerras",
						"!refrán",
						"!refran",
						"!historia"
					);
					
	$n = sizeof($commandsList);
	for($i=0;$i<$n;$i++) {
		if(strpos(strtolower($text), $commandsList[$i]) !== false) {
			return 1;
		}
	}
	return 0;
}

function translateDate($english) {
	$spanish = $english;
	$spanish = str_replace("Monday", "Lunes", $spanish);
	$spanish = str_replace("Tuesday", "Martes", $spanish);
	$spanish = str_replace("Wednesday", "Miércoles", $spanish);
	$spanish = str_replace("Thursday", "Jueves", $spanish);
	$spanish = str_replace("Friday", "Viernes", $spanish);
	$spanish = str_replace("Saturday", "Sábado", $spanish);
	$spanish = str_replace("Sunday", "Domingo", $spanish);
	$spanish = str_replace("January", "de enero del", $spanish);
	$spanish = str_replace("February", "de febrero del", $spanish);
	$spanish = str_replace("March", "de marzo del", $spanish);
	$spanish = str_replace("April", "de abril del", $spanish);
	$spanish = str_replace("May", "de mayo del", $spanish);
	$spanish = str_replace("June", "de junio del", $spanish);
	$spanish = str_replace("July", "de julio del", $spanish);
	$spanish = str_replace("August", "de agosto del", $spanish);
	$spanish = str_replace("September", "de septiembre del", $spanish);
	$spanish = str_replace("October", "de octubre del", $spanish);
	$spanish = str_replace("November", "de noviembre del", $spanish);
	$spanish = str_replace("December", "de diciembre del", $spanish);
	return $spanish;
}

function showMode($group_id, $newGroup = false) {
	$query = "SELECT mode, name, flagblock, freemode, custom_text, welcome_text FROM groupbattle WHERE group_id = '".$group_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if(isset($row['mode'])) {
		$mode = $row['mode'];
		$name = $row['name'];
		$flag = $row['flagblock'];
		$freemode = $row['freemode'];
		if($row['custom_text'] == "") {
			$hasCustomText = 0;
		} else {
			$hasCustomText = 1;
		}
		if($row['welcome_text'] == "") {
			$hasWelcomeText = 0;
		} else {
			$hasWelcomeText = 1;
		}
	} else {
		$mode = 0;
		$name = "este grupo";
		$flag = 0;
		$freemode = 1;
		$hasCustomText = 0;
		$hasWelcomeText = 0;
	}
	mysql_free_result($result);
	apiRequest("sendChatAction", array('chat_id' => $group_id, 'action' => "typing"));
	usleep(100000);
	if($newGroup) {
		$message = "⚠️ <b>¡Gracias por añadirme! Es importante que configures estas opciones del bot acorde al grupo para no resultar pesado ni aburrido.</b>".PHP_EOL.PHP_EOL;
	} else {
		$message = "";
	}
	$message = $message."<b>Configuración del bot para ".$name.":</b>".PHP_EOL.PHP_EOL;
	if($mode > -1) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message."1⃣ Participación <b>activa</b> del bot en la conversación".PHP_EOL;
	if($mode > -2) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message."2⃣ Respuestas con gifs o audios a palabras clave concretas".PHP_EOL;
	if($mode > -3) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message."3⃣ Huevos de pascua, funciones extensas y minijuego 'Héroes de Telegram'".PHP_EOL;
	if($mode > -4) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message."4⃣ Notificaciones de actualizaciones importantes del bot".PHP_EOL.PHP_EOL;
	if($freemode == 1) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Cualquier usuario puede cambiar la configuración anterior".PHP_EOL;
	if($flag == 0) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Minijuegos 'Captura la bandera' y 'Reclama el mástil'".PHP_EOL;
	if($hasCustomText == 1) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Función de texto personalizada".PHP_EOL;
	if($hasWelcomeText == 1) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Mensaje de bienvenida personalizado".PHP_EOL.PHP_EOL;
	$message = $message."<i>Consulta con</i> /ayuda_modo <i>cómo cambiar la configuración.</i>";
	apiRequest("sendMessage", array('chat_id' => $group_id, 'parse_mode' => "HTML", "text" => $message));			
}

function getSticker() {
	$stickerList = array(
						"BQADBAADWQADl2BfAAEq3kLUvoh-bAI",
						"BQADBAAD4gEAApdgXwABxxhGuE9qLnUC",
						"BQADBAAD5AEAApdgXwABVsDyOrPtUy0C",
						"BQADBAAD5gEAApdgXwABay8kr7TK_RYC",
						
						"BQADBAADOwEAApdgXwABX9NUqetHQLwC",
						"BQADBAADqwMAApdgXwAByanmyFXRsRIC",
						"BQADBAADvAADl2BfAAExOhaVoPVrBgI",
						"BQADBAADvgADl2BfAAFCI_CEhsdiIgI",
						"BQADBAADwAADl2BfAAHh8ap2XuJ7tgI",
						
						"BQADBAADxAADl2BfAAG47enw_0nguAI",
						"BQADBAADxgADl2BfAAE1c9v_3RyTOQI",
						"BQADBAADyAADl2BfAAHrQMRn8xaq2gI",
						"BQADBAADygADl2BfAAGkniSS9IphMwI",
						"BQADBAADzAADl2BfAAHEJWWmJE9skgI",
						
						"BQADBAAD1gADl2BfAAGhPuEd5c6SWgI",
						"BQADBAAD5gADl2BfAAF9QdgfWRZYnwI",
						"BQADBAAD9AADl2BfAAESHxryUOOqJgI",
						"BQADBAAD9gADl2BfAAGvMBCo-YmEBAI",
						"BQADBAAD-AADl2BfAAG5mByn51VtBwI",
						
						"BQADBAAD-gADl2BfAAGlXjsTgMPbKAI",
						"BQADBAAD_AADl2BfAAHj5y3U9vFToQI",
						"BQADBAADCwEAApdgXwAB_EXWFRgX00MC",
						"BQADBAADDQEAApdgXwAB6SqrpmLQ_ecC",
						"BQADBAADDwEAApdgXwAB2Ys698Z00YIC",
						
						"BQADBAADEgEAApdgXwABamwceDlKFqIC",
						"BQADBAADGgEAApdgXwABm9zkrPXm9EcC",
						"BQADBAADHAEAApdgXwABycr3cTW7F1kC",
						"BQADBAADIAEAApdgXwABSFvek9PwlrAC",
						"BQADBAADIgEAApdgXwABagoaGDosQOsC",
						
						"BQADBAADJQEAApdgXwABKQZfzs5zvHIC",
						"BQADBAADJwEAApdgXwABBXkUFoP4g0UC",
						"BQADBAADKQEAApdgXwABqBNiUawxce0C",
						"BQADBAADKwEAApdgXwAB99zRKBB6kkAC",
						"BQADBAADLQEAApdgXwABTQGqHo8ZTHoC",
						
						"BQADBAADLwEAApdgXwABy_LA4vCbdTEC",
						"BQADBAADMQEAApdgXwAB4fz1ztq1eTwC",
						"BQADBAADMwEAApdgXwABH1dwqkEpe5UC",
						"BQADBAADNQEAApdgXwABDSpVobP6-koC",
						"BQADBAADNwEAApdgXwABoJ6wBJEGOU4C",
						
						"BQADBAADOQEAApdgXwABrscr50bm2KYC",
						"BQADBAADPQEAApdgXwAB0smP9zRDXxMC",
						"BQADBAADPwEAApdgXwABcfdSiG6V2yYC",
						"BQADBAADQQEAApdgXwABloP1wl9KzqQC",
						"BQADBAADQwEAApdgXwABPRi9aMrjDxgC",
						
						"BQADBAADRQEAApdgXwABlPvoP9AsAm0C",
						"BQADBAADRwEAApdgXwABmv2HSL6vNvYC",
						"BQADBAADSQEAApdgXwABhNQ0Jwn3RxEC",
						"BQADBAADSwEAApdgXwABvKnVLTR4MM8C",
						"BQADBAADTQEAApdgXwABSiDdJFATMaEC",
						
						"BQADBAADTwEAApdgXwABF7AQaFp7uw0C",
						"BQADBAADUQEAApdgXwABcYwjOvXFOSQC",
						"BQADBAADUwEAApdgXwABRi2P9Ha4UC4C",
						"BQADBAADVQEAApdgXwABbni22FD1Tw4C",
						"BQADBAADVwEAApdgXwAB8Nzg82VfaBYC",
						
						"BQADBAADWQEAApdgXwABH5uJpPuXSnkC",
						"BQADBAADWwEAApdgXwABXDvtCGUyfrkC",
						"BQADBAADXQEAApdgXwABTz4OkOBiof8C",
						"BQADBAADXwEAApdgXwABxk7Z1rSRPvAC",
						"BQADBAADYQEAApdgXwABwRf_1gSWeF0C",
						
						"BQADBAADYwEAApdgXwABmrk488f-pwcC",
						"BQADBAADZQEAApdgXwABUe8zrun4_TIC",
						"BQADBAADZwEAApdgXwABBlNloS7catkC",
						"BQADBAADaQEAApdgXwABqqkFYEPnJKYC",
						"BQADBAADawEAApdgXwABXUgj_K3g4WAC",
						
						"BQADBAADbQEAApdgXwABIzKuHjamd-AC",
						"BQADBAADbwEAApdgXwABxeYM8pXDXggC",
						"BQADBAADcQEAApdgXwABWH1v--qGhlkC",
						"BQADBAADdAEAApdgXwABzSkeJy734L4C",
						"BQADBAADdgEAApdgXwABClKrcnSHRisC",
						
						"BQADBAADeAEAApdgXwABh1dVQszJNpkC",
						"BQADBAADegEAApdgXwABjxXYlh2_zekC",
						"BQADBAADfAEAApdgXwABhj6qbI9X1KIC",
						"BQADBAADfgEAApdgXwAB5HGc0x-qNyQC",
						"BQADBAADgAEAApdgXwABxM0SITvpbyAC",
						
						"BQADBAADggEAApdgXwABkpY5wSqZENUC",
						"BQADBAADhAEAApdgXwAB60Q6f3kCnzUC",
						"BQADBAADhgEAApdgXwAB0fMWpyJ2jSIC",
						"BQADBAADiAEAApdgXwABaYFLMQvEh8YC",
						"BQADBAADigEAApdgXwABNPKbufq_Rb4C",
						
						"BQADBAADjAEAApdgXwABL5r7dsvDoIwC",
						"BQADBAADjgEAApdgXwAB7a0Nc-kP0SMC",
						"BQADBAADkAEAApdgXwABsDqPoaG4wqIC",
						"BQADBAADkgEAApdgXwABqbjjqmF0h1kC",
						"BQADBAADlAEAApdgXwABoVXCq87zqWQC",
						
						"BQADBAADlgEAApdgXwABvBVyjnSEdzQC",
						"BQADBAADmAEAApdgXwABZyD1iQABNCySAg",
						"BQADBAADmgEAApdgXwABYZxLS4uBCWIC",
						"BQADBAADnAEAApdgXwABbFGb86TKxVoC",
						"BQADBAADngEAApdgXwABgnxT2nhBPG8C",
						
						"BQADBAADoAEAApdgXwABCcSe2J2mgwEC",
						"BQADBAADogEAApdgXwABqqnWu7EmXFwC",
						"BQADBAADpAEAApdgXwABLbgJ3xkrBbAC",
						"BQADBAADpgEAApdgXwABPoe_S04xKFgC",
						"BQADBAADqAEAApdgXwABdZqRHoX8k-0C",
						
						"BQADBAADqgEAApdgXwABwjDwxQ4NCdUC",
						"BQADBAADrAEAApdgXwAB8uFnqcziRXwC",
						"BQADBAADrgEAApdgXwABBdA9jCQq9FgC",
						"BQADBAADsAEAApdgXwABaDLkaXivoo0C",
						"BQADBAADsgEAApdgXwAB-tLN9YHKwqQC",
						
						"BQADBAADtAEAApdgXwABXTAjzF-7THQC",
						"BQADBAADtgEAApdgXwABMgGUqbuCn6AC",
						"BQADBAADuAEAApdgXwABIPmlR42w5jsC",
						"BQADBAADugEAApdgXwABz3gC6K9lxlEC",
						"BQADBAADvAEAApdgXwABys41uPCCH8IC",
						
						"BQADBAADvgEAApdgXwAB7sJuyxwbWcMC",
						"BQADBAADwAEAApdgXwABSzJP042AMoUC",
						"BQADBAADwgEAApdgXwABrZ-5ZGzupisC",
						"BQADBAADxAEAApdgXwABYlc6uFXoZ6QC",
						"BQADBAADxgEAApdgXwAB2cLlA-KbXGYC",
						
						"BQADBAADyAEAApdgXwAB0B7FJ9nxdogC",
						"BQADBAADygEAApdgXwABRUUL8LoyJ6oC",
						"BQADBAADzAEAApdgXwABcOJuVml7zqQC",
						"BQADBAADzgEAApdgXwABwn596Pmkz10C",
						"BQADBAAD0AEAApdgXwAB7sqZ212yDmgC",
						
						"BQADBAAD0gEAApdgXwABG3glj4pcbF4C",
						"BQADBAAD1AEAApdgXwABe4h-_eayejEC",
						"BQADBAAD1gEAApdgXwAB8diHIkEZkQIC",
						"BQADBAAD2AEAApdgXwABVBoERA-LobkC",
						"BQADBAAD2gEAApdgXwABMs1W6GM0ta0C",
						
						
						
						"BQADBAAD6AEAApdgXwABlRM_RB7FUwQC",
						"BQADBAAD6gEAApdgXwABgZo0nMF7u18C",
						"BQADBAAD7AEAApdgXwABOh2sm5xp9QgC",
						"BQADBAAD7gEAApdgXwAB9FJJ06vWmeEC",

						"BQADBAAD8AEAApdgXwABsg_JEUK16WgC",
						"BQADBAAD8gEAApdgXwABVGVWLcLKaWkC",
						"BQADBAAD9AEAApdgXwABXoTIOpTETpIC",
						"BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC",
						"BQADBAAD-AEAApdgXwABue09rKJ_z0cC",

						"BQADBAAD-gEAApdgXwABnEhABENcZPkC",
						"BQADBAAD_AEAApdgXwABeJOJByZXRP4C",
						"BQADBAAD_gEAApdgXwABuZfnZ04DQzoC",
						"BQADBAAEAgACl2BfAAE5xS1kYUQMewI",
						"BQADBAADAgIAApdgXwABS2l3QF6lc-MC",
						
						"BQADBAADBAIAApdgXwAByEfdniSP-ckC",
						"BQADBAADBgIAApdgXwABViZozegbcV8C",
						"BQADBAADCAIAApdgXwABKpJ8UA_5-KkC",
						"BQADBAADDgIAApdgXwAB82NOQHvTlkYC",
						"BQADBAADEAIAApdgXwABzg_ERZr9E2wC",

						"BQADBAADEwIAApdgXwAB4OnTfAHpnJsC",
						"BQADBAADFQIAApdgXwABbSK_60JsHQIC",
						"BQADBAADFwIAApdgXwABoWIawePS4X8C",
						"BQADBAADGQIAApdgXwAB45ynjbHhfHsC",
						"BQADBAADGwIAApdgXwAB2yTvLz6_T6IC",
						
						"BQADBAADHQIAApdgXwABHSkVj24erBgC",
						"BQADBAADHwIAApdgXwABwyVwIk0la-8C",
						"BQADBAADIQIAApdgXwABLH-WnUFSQWAC",
						"BQADBAADIwIAApdgXwABoeKmTN1CjHEC",
						"BQADBAADJQIAApdgXwABwpZVDGKtNUQC",

						"BQADBAADJwIAApdgXwABLZm4KUkowPkC",
						"BQADBAADKQIAApdgXwABYXj3GatQ4X4C",
						"BQADBAADKwIAApdgXwABrQePsSk6cIEC",
						"BQADBAADLQIAApdgXwABuX_bwQqVCzEC",
						"BQADBAADLwIAApdgXwABRWk9VNLml3sC",

						"BQADBAADMQIAApdgXwAB7LzTDPdsrKIC",
						"BQADBAADMwIAApdgXwABelsQRvZQGu4C",
						"BQADBAADNQIAApdgXwABPM6GYBHcGrgC",
						"BQADBAADNwIAApdgXwABaL1uUZTvfDEC",
						"BQADBAADOQIAApdgXwAB9eqAFRD6UFwC",

						"BQADBAADOwIAApdgXwABjrlu1PCth2UC",
						"BQADBAADPQIAApdgXwAB5KgpwF7XLIsC",
						"BQADBAADPwIAApdgXwABxBF7gvXQNkoC",
						"BQADBAADQQIAApdgXwABNgQZxS-Fs50C",
						"BQADBAADQwIAApdgXwABlYFnKzfvst8C",

						"BQADBAADRQIAApdgXwABcq-Rss4LhmgC",
						"BQADBAADRwIAApdgXwABQe77airD4noC",
						"BQADBAADSQIAApdgXwABxlzyqba3lK0C",
						"BQADBAADSwIAApdgXwAByDG5TqSTqSUC",
						"BQADBAADTQIAApdgXwABrSmhUUYBqV4C",

						"BQADBAADTwIAApdgXwABNOQGVxc9k_8C",
						"BQADBAADUQIAApdgXwABrJVG4g7ZwpYC",
						"BQADBAADUwIAApdgXwABKWppGMwG3XMC",
						"BQADBAADVQIAApdgXwAB-KxXtUxKDGwC",
						"BQADBAADVwIAApdgXwABFAXGpAl3og4C",

						"BQADBAADWQIAApdgXwAB3WKwVvndmGkC",
						"BQADBAADWwIAApdgXwABwpwuC8mZV10C",
						"BQADBAADXQIAApdgXwABfRqwywmDzbYC",
						"BQADBAADXwIAApdgXwABvttvmrEheKIC",
						"BQADBAADYQIAApdgXwAB9BnM8iLU19wC",

						"BQADBAADYwIAApdgXwABZxjuQjpm5fkC",
						"BQADBAADZQIAApdgXwABEokfDZsRfWsC",
						"BQADBAADZwIAApdgXwABRM6FIb5kLs4C",
						"BQADBAADaQIAApdgXwABDOScWSoKr14C",
						"BQADBAADawIAApdgXwABCzXk1N5vOh8C",

						"BQADBAADbgIAApdgXwABvm9xnGd49KIC",
						"BQADBAADcAIAApdgXwABYmrmrl7gaQkC",
						"BQADBAADcgIAApdgXwAB6Zu-UvLMGvkC",
						"BQADBAADdAIAApdgXwAB-2L7x4CABlEC",
						"BQADBAADdgIAApdgXwABiKU535H_3XQC",

						"BQADBAADeAIAApdgXwAB3x-ykV8c_o8C",
						"BQADBAADegIAApdgXwABZO6Mips1CEsC",
						"BQADBAADfAIAApdgXwABk0VIT98SdtYC",
						"BQADBAADfgIAApdgXwABuy0pl3aQY8MC",
						"BQADBAADgAIAApdgXwABFvkXLl9pQ9cC",

						"BQADBAADggIAApdgXwABotGyltbD29AC",
						"BQADBAADhAIAApdgXwABw53nim7QwbcC",
						"BQADBAADhgIAApdgXwAB621ljiBdPLsC",
						"BQADBAADiAIAApdgXwABrhX05Ccjl5gC",
						"BQADBAADigIAApdgXwABYN-Q68WlgYcC",

						"BQADBAADjgIAApdgXwAB8VFC-qhh-9oC",
						"BQADBAADkAIAApdgXwABM7R-I2pFViMC",
						"BQADBAADkgIAApdgXwABph0aH_ztcaQC",
						"BQADBAADlAIAApdgXwABlp_qNdKfHzkC",
						"BQADBAADlgIAApdgXwABUYDnBApF2JwC",

						"BQADBAADmAIAApdgXwABvAZOTwM-LmsC",
						"BQADBAADmgIAApdgXwABkZp1Cd9-X40C",
						"BQADBAADnAIAApdgXwAB1uL6Vt5D5ggC",
						"BQADBAADngIAApdgXwABWmy9bLwpP_UC",
						"BQADBAADoAIAApdgXwABiAiMbHJCkEoC",

						"BQADBAADogIAApdgXwABSVHWBnFiRV0C",
						"BQADBAADpAIAApdgXwAB8kzOcuPRctoC",
						"BQADBAADpgIAApdgXwABwnpBND3FcrUC",
						"BQADBAADqAIAApdgXwAB7oVkAsjmM_kC",
						"BQADBAADqgIAApdgXwAB-edGu0xw09UC",

						"BQADBAADrAIAApdgXwAB4tpzdtZNHkwC",
						"BQADBAADrgIAApdgXwABsHm7XWwtKdIC",
						"BQADBAADsAIAApdgXwABLajeves_Rk8C",
						"BQADBAADsgIAApdgXwAB19NAAifW5_gC",
						"BQADBAADtAIAApdgXwABSgvNotupuggC",
						
						"BQADBAADtgIAApdgXwAB9vaad-IGRpUC",
						"BQADBAADuAIAApdgXwABhnfYrlIfqDMC",
						"BQADBAADugIAApdgXwABm2taRiAxj2EC",
						"BQADBAADvAIAApdgXwABwSpNwN7BdBcC",
						"BQADBAADvgIAApdgXwABYj3ECtjs9qkC",

						"BQADBAADwAIAApdgXwAB2DETg_IEj-YC",
						"BQADBAADwgIAApdgXwABgrIq5xgIaIQC",
						"BQADBAADxAIAApdgXwABrdowHoNnlPMC",
						"BQADBAADxgIAApdgXwAB4SqQIu7WgAABAg",
						"BQADBAADyAIAApdgXwABv2Hfc0YK3MIC",

						"BQADBAADygIAApdgXwAB4dTzJl61abMC",
						"BQADBAADzAIAApdgXwABR1D96e6dVNsC",
						"BQADBAADzgIAApdgXwAB6ZskdaOnjOcC",
						"BQADBAAD0AIAApdgXwABiyk9hEipKNAC",
						"BQADBAAD0gIAApdgXwABuyqq7wvwf90C",

						"BQADBAAD1AIAApdgXwABTN2C-vwQUZEC",
						"BQADBAAD1gIAApdgXwABZggI6BA7kOcC",
						"BQADBAAD3AIAApdgXwABXrNHWkCCeN0C",
						"BQADBAADpwMAApdgXwABTJVIHdfTyE8C",
						"BQADBAADqQMAApdgXwABhiFzuGAuGLcC",


						"BQADBAAD2gIAApdgXwABUxc0NflaA-oC",
						"BQADBAAD4QIAApdgXwABVMyMZBGiEF0C",
						"BQADBAAD4wIAApdgXwAB0BMwECYiiAUC",
						"BQADBAAD5QIAApdgXwABcUPkzCZr9xQC",
						
						"BQADBAAD5wIAApdgXwABdveCLfhrWsoC",
						"BQADBAAD6QIAApdgXwABXWdf1qN3PrcC",
						"BQADBAAD6wIAApdgXwABEoxCLRu3m0gC",
						"BQADBAAD7QIAApdgXwABHwh-9d9kJ5EC",
						"BQADBAAD7wIAApdgXwABV4YHvRLBsScC",
						
						"BQADBAAD8QIAApdgXwABd9b80jVwjwUC",
						"BQADBAAD8wIAApdgXwABejfpv-GcJmIC",
						"BQADBAAD9QIAApdgXwABSxqCF1Gf-pIC",
						"BQADBAAD9wIAApdgXwABunuhMfdWrJ0C",
						"BQADBAAD-QIAApdgXwABOlpeaLlPCC0C",
						
						"BQADBAAD-wIAApdgXwABraTVI22kbpIC",
						"BQADBAAD_QIAApdgXwABerb5XYcx7GwC",
						"BQADBAAD_wIAApdgXwAB4tMFl0qLqqcC",
						"BQADBAADAQMAApdgXwABZdSBNrzdAksC",
						"BQADBAADAwMAApdgXwABL4QRthwe_FMC",
						
						"BQADBAADBQMAApdgXwABdf1AVzOkehgC",
						"BQADBAADBwMAApdgXwABEfjQrnrAbPgC",						
						"BQADBAADCQMAApdgXwABWpVYoejuqjcC",
						"BQADBAADCwMAApdgXwABp21p3Aet_tsC",
						"BQADBAADDQMAApdgXwABxpmN6R-2BWYC",
						
						"BQADBAADDwMAApdgXwABGWa1m9spLGkC",
						"BQADBAADEQMAApdgXwABE8BmbB-ZhZwC",
						"BQADBAADEwMAApdgXwAB0mkC6Cj5CSgC",
						"BQADBAADFQMAApdgXwAB4rmwYsLLH0sC",
						"BQADBAADFwMAApdgXwABmCPw-gTsShMC",
						
						"BQADBAADGQMAApdgXwAB92flttaJYngC",
						"BQADBAADHwMAApdgXwABzIEkYvhM4zYC",						
						"BQADBAADGwMAApdgXwABrwwAAc2it0uSAg",
						"BQADBAADHQMAApdgXwAB1gtE6FIQZVYC",
						"BQADBAADIQMAApdgXwABc8k6v18KoaAC",
						
						"BQADBAADIwMAApdgXwABf6rQ7bq_dWoC",
						"BQADBAADJQMAApdgXwABYCBouxgBm0UC",
						"BQADBAADJwMAApdgXwABtN6PD2betHcC",
						"BQADBAADKQMAApdgXwABuFW5o18hAU8C",
						"BQADBAADKwMAApdgXwABIby6ow2Bsm8C",
						
						"BQADBAADLQMAApdgXwABcKBcIDY9_m8C",
						"BQADBAADLwMAApdgXwABjU8O8vqUxGoC",
						"BQADBAADMQMAApdgXwABl9IjYdtgIWAC",
						"BQADBAADMwMAApdgXwAB9aHm5Pkqz9IC",
						"BQADBAADNQMAApdgXwABgpxTgiK2hYcC",
						
						"BQADBAADNwMAApdgXwABdGxoPAKS-QcC",
						"BQADBAADOQMAApdgXwABcV9Jn2BiRC8C",
						"BQADBAADOwMAApdgXwABz1MgVAo13d4C",
						"BQADBAADPQMAApdgXwABkEQB8w_G2NMC",
						"BQADBAADPwMAApdgXwABZnZ88iZ2YwkC",
						
						"BQADBAADQQMAApdgXwABoxeJvlk6sSkC",
						"BQADBAADQwMAApdgXwAB5EZv4exzVZAC",						
						"BQADBAADRQMAApdgXwABMebbjT-OkM8C",
						"BQADBAADRwMAApdgXwABPZolYB4g7_gC",
						"BQADBAADSQMAApdgXwAB5q2QHjnk1XsC",
						
						"BQADBAADSwMAApdgXwABdk0IyunKRjUC",
						"BQADBAADTQMAApdgXwABeWISQWwiFuoC",
						"BQADBAADTwMAApdgXwABf7Y94SMORzIC",
						"BQADBAADUQMAApdgXwABTZo7IIImmXYC",
						"BQADBAADUwMAApdgXwAB3je630LKGbMC",
						
						"BQADBAADVQMAApdgXwABw8c4opr6oRUC",
						"BQADBAADVwMAApdgXwABctbRMzZLLQsC",
						"BQADBAADWQMAApdgXwABXNT_eLtzbIwC",
						"BQADBAADWwMAApdgXwABmUlPSEPFKkgC",
						"BQADBAADXQMAApdgXwABXTWYBt0h0voC",
						
						"BQADBAADXwMAApdgXwABTC55LQG52S8C",
						"BQADBAADYQMAApdgXwABOhMRQU4AAb7pAg",
						"BQADBAADYwMAApdgXwABgLr--vmgHbwC",
						"BQADBAADZQMAApdgXwABA_REsjEJGdsC",
						"BQADBAADZwMAApdgXwABYrRH80Yt35wC",
						
						"BQADBAADaQMAApdgXwABSK58TEm6s8QC",
						"BQADBAADawMAApdgXwABRrSJLYy2CMkC",
						"BQADBAADbQMAApdgXwABhQXAWGd763oC",
						"BQADBAADbwMAApdgXwAB3rnuJnD4gWQC",
						"BQADBAADcQMAApdgXwABEJBg1Yk7PcUC",
						
						"BQADBAADcwMAApdgXwAB9LGbx8D8p_EC",
						"BQADBAADdQMAApdgXwAB6_sV0eztbK0C",
						"BQADBAADdwMAApdgXwABWSKV0kPgLxIC",
						"BQADBAADewMAApdgXwABVITv2xzz8KwC",
						"BQADBAADfQMAApdgXwABrKcZea14tEoC",
						
						"BQADBAADfwMAApdgXwABkMzX8W6CSgcC",
						"BQADBAADgQMAApdgXwABUH2l3fhh6asC",
						"BQADBAADgwMAApdgXwABHtg4yN4e_OsC",
						"BQADBAADhQMAApdgXwAB6mNIx9XE0KUC",
						"BQADBAADhwMAApdgXwABpjPrfVQHDkoC",
						
						"BQADBAADiQMAApdgXwABgrMfcoTJp7oC",
						"BQADBAADiwMAApdgXwAB33ia9xvH-SMC",
						"BQADBAADjQMAApdgXwABN9s50Vz9wMMC",
						"BQADBAADjwMAApdgXwABJARhuW5Wxg0C",
						"BQADBAADkQMAApdgXwABPLFIZ0MHvZwC",
						
						"BQADBAADkwMAApdgXwAB6wRCNEQ9ws4C",						
						"BQADBAADlQMAApdgXwABBwT2B4Sg9H8C",
						"BQADBAADlwMAApdgXwABpZSYSAphjQIC",
						"BQADBAADmQMAApdgXwABrNchj9Gl8X4C",
						"BQADBAADnAMAApdgXwABeK7TZM36M1kC",
						
						"BQADBAADngMAApdgXwABUFUbkmpwroMC",						
						"BQADBAADoAMAApdgXwABoMUSxnxIgpsC",
						"BQADBAADrQMAApdgXwABb2zCIoFAJKcC",
						"BQADBAADsQMAApdgXwABA1YgXLa99qIC",
						"BQADBAADtQMAApdgXwABhZtYdtWJjY8C",
						
						"BQADBAADtwMAApdgXwABclAqdDI8ZEcC",
						"BQADBAADvQMAApdgXwABzU8xPrygToAC",
						"BQADBAADvwMAApdgXwABTpI7WXeaUOgC",
						"BQADBAADIAQAApdgXwABc7RGM1_C2qUC",
						"BQADBAADLQQAApdgXwABDbLxyWG4mc4C",
						
						"BQADBAADPwQAApdgXwABaa5FrSNDBEQC",
						"BQADBAADYQQAApdgXwABOU25JBbuNxIC",
						"BQADBAADeAQAApdgXwABH9GMpJCKGpwC",
						"BQADBAADegQAApdgXwABBwuqBxBXY94C",
						"BQADBAADfAQAApdgXwABjQjBkbORu5IC",
						
						"BQADBAADfgQAApdgXwAByjX2_VEwhzkC",
						"BQADBAADgAQAApdgXwABslbJX3gzis4C",
						"BQADBAADggQAApdgXwABMDYlbccXSzQC",
						"BQADBAADhAQAApdgXwABpI_hFfGFNscC",
						"BQADBAADhgQAApdgXwAB0_NcILex3X8C",
						
						"BQADBAADiAQAApdgXwABTN9ZTsZofWsC",
						"BQADBAADigQAApdgXwAB93qDXz__WyoC",
						"BQADBAADjAQAApdgXwAB6KqoLvLUBRsC",
						"BQADBAADjgQAApdgXwABzTysDDTb5a4C",
						"BQADBAADkAQAApdgXwABUflkNrs1aSEC",

						
						"BQADBAADkgQAApdgXwAB8sZsvHCgaT8C",
						"BQADBAADlAQAApdgXwABu06CFU-xQW8C",
						"BQADBAADlgQAApdgXwABlWO38PRLd80C",
						"BQADBAADmAQAApdgXwABqfwu7QABDUVvAg",

						"BQADBAADmgQAApdgXwABYyiDyzcCH1MC",
						"BQADBAADnAQAApdgXwABmg7ZNFTfro0C",
						"BQADBAADpgQAApdgXwABdLWXK0VIJ5QC",
						"BQADBAAD1wQAApdgXwABu8wPlwMp5kgC",
						"BQADBAAD3QQAApdgXwAB13hXKPFwDa0C",

						"BQADBAAD7QQAApdgXwAB2XBNYkOr4NIC",
						"BQADBAAD8AQAApdgXwABKl0cRYwXxmsC",
						"BQADBAAD8gQAApdgXwABZZD4GlT6YG4C",
						"BQADBAAD9AQAApdgXwABHgjGPTx7STUC",
						"BQADBAAD9gQAApdgXwABWKKVXuAjAUkC",

						"BQADBAADEwUAApdgXwAB6Q3NXtW3_d8C",
						"BQADBAADKwUAApdgXwABsQgaSVh3AhoC",
						"BQADBAADNAUAApdgXwABKwYCFD20Y-UC",
						"BQADBAADNgUAApdgXwABTi6bS5rJausC",
						"BQADBAADUQUAApdgXwABiLR3quFNtJAC",

						"BQADBAADuwUAApdgXwABfdmmytVMYM8C",
						"BQADBAADvwYAApdgXwABpYy5KdsUFfMC",
						"BQADBAADQwcAApdgXwABY4iaIlE5MVEC",
						"BQADBAADVQcAApdgXwAB076Y0fw91cUC",
						"BQADBAADVwcAApdgXwABgsu8XChYVvMC",
						
						"BQADBAADWQcAApdgXwABmTV-cxb09LIC",
						"BQADBAADWwcAApdgXwABDrq_X1UYZEIC",
						"BQADBAADXQcAApdgXwABZwbEE4DKDZAC",
						"BQADBAADjAcAApdgXwABD9Q-3jNz63kC",
						"BQADBAADkgcAApdgXwABYawFDOdzoKUC"
						);
	$n = sizeof($stickerList) - 1;
	$n = rand(0,$n);
	return $stickerList[$n];
}

function randomSticker() {
	$stickerList = array(
						"BQADBAAD_AADl2BfAAHj5y3U9vFToQI",
						"BQADBAADJwEAApdgXwABBXkUFoP4g0UC",
						"BQADBAADUQEAApdgXwABcYwjOvXFOSQC",
						"BQADBAADkgcAApdgXwABYawFDOdzoKUC",
						"BQADBAADaQEAApdgXwABqqkFYEPnJKYC",
						"BQADBAADawEAApdgXwABXUgj_K3g4WAC",
						"BQADBAADgAEAApdgXwABxM0SITvpbyAC",
						"BQADBAADEAIAApdgXwABzg_ERZr9E2wC",
						"BQADBAADGwIAApdgXwAB2yTvLz6_T6IC",
						"BQADBAADkAIAApdgXwABM7R-I2pFViMC",
						"BQADBAADugIAApdgXwABm2taRiAxj2EC",
						"BQADBAADvwYAApdgXwABpYy5KdsUFfMC",
						"BQADBAAD8QIAApdgXwABd9b80jVwjwUC",
						"BQADBAADsQMAApdgXwABA1YgXLa99qIC",
						"BQADBAADgAQAApdgXwABslbJX3gzis4C",
						"BQADBAAD3QQAApdgXwAB13hXKPFwDa0C",
						"BQADBAADNgUAApdgXwABTi6bS5rJausC"
						);
	$n = sizeof($stickerList) - 1;
	$n = rand(0,$n);
	return $stickerList[$n];
}

function lucky() {
	$n = rand(0,200);
	return $n;
}

function greeting() {
	$storedGreeting = array(
						"¡Hola!",
						"Holaaaa, ¿qué tal? :D",
						"Cállate.",
						"Adiós.",
						"Menos saludar y más trabajar, inútil.",
						"Aquí no se saluda con un simple \"hola\", aporta algo o pírate.",
						"Buenas.",
						"¿Y para eso hablas?",
						"Vete a tu pueblo.",
						"No.",
						"¿Dónde estabas?",
						"¿Para qué vienes?",
						"Pide perdón por el retraso.",
						"¿Por qué saludas? Estaba durmiendo y me acabas de despertar.",
						"¿Qué quieres?",
						"En fin...",
						"Anda, tú saludando xD"
						);
	$n = sizeof($storedGreeting) - 1;
	$n = rand(0,$n);
	return $storedGreeting[$n];
}

function getFullName($firstName, $userName) {
	if($userName != "") {
		if(strtolower($firstName) == strtolower($userName)) {
			$finalName = $userName;
		} else {
			$finalName = $firstName." (".$userName.")";
		}
	} else {
		$finalName = $firstName;
	}
	$finalName = str_replace("<", "", $finalName);
	$finalName = str_replace(">", "", $finalName);
	return $finalName;
}
function goodbye() {
	$storedGreeting = array(
						"¡Adiós!",
						"¡Qué vaya bien!",
						"¡Hasta luego!",
						"¡Hasta otra!",
						"Cierra al salir.",
						"No vuelvas.",
						"Ya era hora.",
						"¡Venga!"
						);
	$n = sizeof($storedGreeting) - 1;
	$n = rand(0,$n);
	return $storedGreeting[$n];
}

function getPole() {
	$storedGif = array(
						"BQADBAADsgADEnk0AAG2JEbcde8xGwI",
						"BQADBAADjQAD_2-vAAH0blw-pAABgIQC",
						"BQADBAAD7gcAApdgXwABDIGKu1t4To4C",
						"BQADBAADDAgAApdgXwABtRHIDTFw_W0C",
						"BQADBAADXAEAAtWlKAABd7dY2s4yLOEC",
						"BQADBAADDAEAAkJ3TwABc_20T2z96xgC",
						"BQADBAADlAADOBnzAvIbNYnp3J16Ag",
						"BQADBAADhQcAApdgXwABmLF7Cmu2n5oC",
						"BQADBAADFQEAAtWlKAAB_7dx_We3QPgC",
						"BQADBAADWwEAAtWlKAABlsH5y7ZG0boC",
						"BQADBAADYAEAAimnRQZB4w653ruVQgI",
						"BQADBAADcggAAogZZAcXMC3dF8jYogI",
						"BQADBAADiQYAApdgXwABwPMa2J1LIrQC",
						"BQADBAADigYAApdgXwAB2ltw38kAAcg-Ag",
						"BQADBAADKgcAApdgXwABzVR1kSzpfvMC",
						"BQADBAADAQQAAhgcZAemS0csXDK_hwI",
						"BQADBAADKwcAApdgXwABw49_0ycKJZUC",
						"BQADBAADPwcAApdgXwABWL1qBV03V-wC",
						"BQADBAADSQcAApdgXwABsEVSs8WRKXwC",
						"BQADBAADSQcAApdgXwABsEVSs8WRKXwC",
						"BQADBAADiwYAApdgXwABNKZZDVMKdUQC",
						"BQADBAADBQQAAmhKZAABqSZ3EjIAARr6Ag",
						"BQADBAADSgcAApdgXwABAh6a7ZJ-qn4C",
						"BQADBAADjAYAApdgXwAB2lwy0l0FZSYC",
						"BQADBAADdgADxfqjAAEpCGcOf8KWnAI",
						"BQADBAADvQkAAhXGZAABYnGaxyPFOIwC",
						"BQADBAADvQYAApdgXwAB5u1TiTN7A5QC",
						"BQADBAADHAcAApdgXwAB2LihBJawvIoC",
						"BQADBAADwAYAApdgXwABgO-1Op_g00QC",
						"BQADBAAD4AMAAh8Z5QAB3ei10YJO2OQC",
						"BQADBAADUAEAAtWlKAABwCdq4W0b13AC",
						"BQADBAADEwcAApdgXwABqq-1eIgE_fwC",
						"BQADBAADjQYAApdgXwABVx5LLNWg_IoC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getVideo() {
	$storedVideo = array(
						"https://www.youtube.com/watch?v=10dnX3crQho",
						"https://www.youtube.com/watch?v=kHwUVG2LopQ",
						"https://www.youtube.com/watch?v=IAHzHZjFiMQ",
						"https://www.youtube.com/watch?v=kSKlj-BDzEE",
						"https://www.youtube.com/watch?v=VERNmSLe0fY",
						"https://www.youtube.com/watch?v=tJ_6Wvuzn_k",
						"https://www.youtube.com/watch?v=wz013VbV-rc",
						"https://www.youtube.com/watch?v=ZgHMrDzLD2c",
						"https://www.youtube.com/watch?v=vFBgWbc-K7M"
						);
	$n = sizeof($storedVideo) - 1;
	$n = rand(0,$n);
	return $storedVideo[$n];
}

function getHitIt() {
	$storedGif = array(
						"BQADBAADqgYAApdgXwAB0nUF6aRRt_4C",
						"BQADBAADqwYAApdgXwABamHeXyrUWckC",
						"BQADBAADrAYAApdgXwABU-Zcv4X2zwcC",
						"BQADBAADrQYAApdgXwABTS0fTfXO95QC",
						"BQADBAADrgYAApdgXwABQY9EL00jnUsC",
						"BQADBAADrwYAApdgXwABfJMBp4SVL-YC",
						"BQADBAADKQcAApdgXwABfp3dr-hnJf4C",
						"BQADBAAD7AIAAs7v4AAB733cQ9-fBwcC",
						"BQADBAADsAYAApdgXwAB-gLBzYBrKpkC",
						"BQADBAADsQYAApdgXwABQZmG9fxpfb4C",
						"BQADBAADsgYAApdgXwABWwh3Ow0-ce0C",
						"BQADBAADswYAApdgXwABfuL6ytEbDYAC",
						"BQADBAADmgADqW4iAAH8we7qash6xgI",
						"BQADBAADqQYAApdgXwABLZsztGDJz8cC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getMyTen() {
	$storedGif = array(
						"BQADBAADtQYAApdgXwABkmJgEDaRaNYC",
						"BQADBAAD2CEAAq8cZAdMInl3ChiE9wI",
						"BQADBAADtgYAApdgXwABPVd0LoJew2EC",
						"BQADBAADtwYAApdgXwABHKyPb9hZWzMC",
						"BQADBAADuAYAApdgXwABFX-msOLuIdsC",
						"BQADBAADuQYAApdgXwABv2p1xXsXL14C",
						"BQADBAADugYAApdgXwABvxyCc0ImXvYC",
						"BQADBAADuwYAApdgXwAB7wYTm_q9xyMC",
						"BQADBAADvAYAApdgXwAB3XBgzb_QLPUC",
						"BQADBAADtAYAApdgXwABA-VtFAYjnpQC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getReport() {
	$storedGif = array(
						"BQADBAADkQYAApdgXwABA1oS6JMrSG8C",
						"BQADBAADnwYAApdgXwABW2TrtUlSxk8C",
						"BQADBAADoAYAApdgXwABMUW85gF4ikkC",
						"BQADBAADoQYAApdgXwABwBIozn6az90C",
						"BQADBAADpwYAApdgXwABl9sevoccTP0C",
						"BQADBAAD4AcAApdgXwABlFM0UIOojTIC",
						"BQADBAADogYAApdgXwABLf6xoKIELRUC",
						"BQADBAAD7QQAAjIcZAcGUulut5ihyQI",
						"BQADBAADowYAApdgXwABwdfqlc0asqAC",
						"BQADBAADKAcAApdgXwABqNEAATF_JhG1Ag",
						"BQADBAADHwcAApdgXwABZ598XqMBqVAC",
						"BQADBAADpAYAApdgXwABiuxg7DgneAcC",
						"BQADBAADpQYAApdgXwABnDcBmiNhmDwC",
						"BQADBAADngYAApdgXwABWwePf7dOrHEC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getSpot() {
	$storedGif = array(
						"BQADBAADkgYAApdgXwABRFMP_ytCDScC",
						"BQADBAADlAYAApdgXwABw-5AEItyBkoC",
						"BQADBAADlQYAApdgXwAB3fHMObKRwkYC",
						"BQADBAADlgYAApdgXwABkq0nKUNZLzMC",
						"BQADBAADlwYAApdgXwABUuJajON3v-AC",
						"BQADBAADmAYAApdgXwAB3vn1dotTkLoC",
						"BQADBAADmQYAApdgXwABhIyoVC2c-tcC",
						"BQADBAADmgYAApdgXwABLA9xAAHHYBeeAg",
						"BQADBAADmwYAApdgXwAB4nq0k0E6tVMC",
						"BQADBAADnAYAApdgXwABT24VeC049jgC",
						"BQADBAADnQYAApdgXwAB2jS_x0b7jxEC",
						"BQADBAADkwYAApdgXwABJJOx0-QieE0C"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getNickname() {
	$name = "";
	$storedPartA = array(
						"Josele",
						"Bukke",
						"Chapista",
						"El",
						"La",
						"Xepi",
						"Kraken",
						"Diablo",
						"Satan",
						"Horchata",
						"Mister",
						"Gran",
						"Espagueti",
						"Dios",
						"Estrella",
						"Vane",
						"Shadow",
						"Electric",
						"Fox",
						"Fox",
						"Tony",
						"Soy",
						"Super",
						"Crazy",
						"Magic"
						);
	$n = sizeof($storedPartA) - 1;
	$n = rand(0,$n);
	$name = $name.$storedPartA[$n];
	
	$storedPartB = array(
						"Play",
						"Pro",
						"FIFA",
						"Mourinhista",
						"Pokemaster",
						"OMG",
						"Minecraft",
						"Player",
						"Gameplay",
						"Fans",
						"Martinez",
						"Anime",
						"Gonzalez",
						"Rubius",
						"COD",
						"Kamikaze",
						"Master_",
						""
						);
	$n = sizeof($storedPartB) - 1;
	$n = rand(0,$n);
	$name = $name.$storedPartB[$n];
	
	$storedPartC = array(
						"HD",
						"_HD",
						"Gamer",
						"WTF",
						"Belieber",
						"_Gamer",
						"Otaku",
						"YT",
						"_YT",
						"Girl",
						"ChicaGamer",
						"Auryn",
						"Crack",
						"ESP",
						""
						);
	$n = sizeof($storedPartC) - 1;
	$n = rand(0,$n);
	$name = $name.$storedPartC[$n];
		
	$storedPartD = array(
						"69",
						"98",
						"777",
						"13",
						"15",
						"17",
						"99",
						"2001",
						"04",
						"TV",
						"",
						"",
						"",
						""
						);
	$n = sizeof($storedPartD) - 1;
	$n = rand(0,$n);
	$name = $name.$storedPartD[$n];
	
	return $name;
}


function getSaying() {
	$text = "";
	$storedPartA = array(
						"Al mal tiempo",
						"A quien madruga",
						"Dime con quién andas",
						"A caballo regalado",
						"Culo veo",
						"Perro ladrador",
						"Más vale pájaro en mano",
						"Todo lo que sube",
						"Por probar",
						"Borrón",
						"Más vale tarde",
						"Dos cabezas",
						"Cada loco",
						"Los borrachos y los niños",
						"Mala hierba",
						"Del árbol caído",
						"Querer",
						"En abril",
						"Hasta el cuarenta de mayo",
						"Aunque la mona se vista de seda",
						"Ande yo caliente",
						"El tiempo",
						"Ojos que no ven",
						"Cada persona",
						"A Dios rogando",
						"Hay un roto",
						"Cría cuervos",
						"Sobre gustos",
						"En el mundo de los ciegos",
						"Nadie es profeta",
						"Por la boca",
						"En todos los lados",
						"En casa del herrero",
						"Sin prisa",
						"Mal de muchos",
						"Tanto va el cántaro a la fuente",
						"Después de la tempestad"
						);
	$n = sizeof($storedPartA) - 1;
	$n = rand(0,$n);
	$text = $text.$storedPartA[$n];
	
	$storedPartB = array(
						"buena cara",
						"Dios le ayuda",
						"y te diré quién eres",
						"no le mires el dentado",
						"culo quiero",
						"poco mordedor",
						"que ciento volando",
						"baja",
						"no pierdes nada",
						"y cuenta nueva",
						"que nunca",
						"piensan más que una",
						"con su tema",
						"siempre dicen la verdad",
						"nunca muere",
						"todos hacen leña",
						"es poder",
						"aguas mil",
						"no te quites el sayo",
						"mona se queda",
						"ríase la gente",
						"es oro",
						"corazón que no siente",
						"es un mundo",
						"y con el mazo dando",
						"para un descosido",
						"y te sacarán los ojos",
						"no hay nada escrito",
						"el tuerto es el rey",
						"en su tierra",
						"muere el pez",
						"cuecen habas",
						"cuchara de palo",
						"pero sin pausa",
						"consuelo de tontos",
						"que al final se ahoga",
						"llega la calma"
						);
	$n = sizeof($storedPartB) - 1;
	$n = rand(0,$n);
	$text = $text." ".$storedPartB[$n];
	
	return $text;
}

function getJoke() {
	$storedJoke = array(
						"Hace tiempo fui a un restaurante, comí y me fui sin pagar. Pensé: esto mola. Al día siguiente fui a un buffet, pagué y me fui corriendo sin comer. Hice el 'sinpa' de las anoréxicas.",
						"Me gusta la sopa de fideos, la sopa de letras y la sopa de puntos, que es como la de letras pero en Braille para los ciegos.",
						"Vendí mi sidecar para pagar las multas que me pusieron por aparcar en doble fila",
						"De una relación entre una mujer y un amigo imaginario puede surgir un embarazo psicológico",
						"Lo bueno de ser estéril es que no es hereditario",
						"Cuando a la pregunta \"¿Qué llevas puesto?\" te respondan: un camisón y nada debajo, ¡cuidado! es un fantasma",
						"Me matriculé en una universidad a distancia porque veía mal de cerca",
						"Estoy escribiendo un libro para aprender a andar en tres sencillos pasos. Si lo lees muy rápido aprendes a correr",
						"El mejor sitio para ir a la cárcel es el espacio, porque el jabón flota",
						"Lo mejor de Venecia es que puedes sacar al pez a la calle a hacer sus cositas, y participar en encierros con tiburones",
						"Los yonkis ponen ratones debajo de la almohada para que les traigan dientes",
						"Los vagabundos compran cartones en Zara Homeless",
						"Una vez me compré la revista Muy interesnte, cogí un boli rojo y lo subrayé todo",
						"Cuando quiero un zumo de naranja exprimo un tomate y un limón, porque el rojo y el amarillo hacen el naranja",
						"Ayer vi un mimo haciendo como que jugaba con una cuerda. A mí me gustó, así que hice como que le echaba una moneda",
						"En África hay mucho Sida, por eso hay tan pocos vampiros",
						"Alguien me acosa y me llama frecuentemente por teléfono. La policía dice que puede ser cualquiera, o Carlos Latre",
						"Un anacardo es un cacahuete en posición fetal",
						"Islandia se puso el nombre antes que las demás islas",
						"No es que tenga el síndrome de Diógenes, es que mi basura tiene el síndrome de Estocolmo, no reciclo porque no creo en la reencarnación",
						"Encontrar un reloj de oro en la basura es tirar tiempo y dinero",
						"Tengo una línea horizontal tatuada en el cuello para que cuando vaya a la playa sepa cuándo cubre",
						"Me quiero poner pendientes, pero me pondré solo uno, así llevo puesto un pendiente y tengo el otro pendiente",
						"Un pelirrojo es un albino tinto",
						"Me he comprado una cuerda para tender la ropa porque la que tenía la he lavado y la he puesto a tender",
						"Me he comprado crema depilatoria porque tengo moqueta y quiero parquet",
						"El otro día en las noticias contaban que una chica llamada Susana había desaparecido y sus vecinos hicieron una pancarta con el lema: todos somos Sunsana. Eso no ayuda. Esperad a que la encuentren antes de jugar al despiste",
						"Mi vecina es enana. Sus padres le hicieron repetir preescolar para disimular hasta que murió",
						"El enano es la Metadona del pedófilo",
						"Tres enanos en un ataúd son un cacahuete",
						"Yo soy una persona normal, un retrasado en Canarias",
						"Mi vecino es camello, pero porque tiene chepa",
						"'Saber vivir' es un un programa innecesario, porque cualquiera que esté viendo el programa entre semana a las doce de la mañana, sabe vivir",
						"No quiero morir solo, por eso siempre viajo con EasyJet",
						"Me encantan los escritores de nombre, escriben en perfecto Times New Roman",
						"Dicen que es peligroso hacer una Ouija con unas tijeras cerca. En realidad lo peligroso es dejar unas tijeras cerca de un grupo de estúpidos",
						"Las mujeres Transformer tardan dos horas en transformarse, y sus hijos bajan a jugar al párking",
						"Un amigo se depiló las cejas, ahora solo tiene entrecejo",
						"Un amigo intentó suicidarse y al día siguiente se denunció por amenazas",
						"Las camisas hawaiianas son camisas de camuflaje en Hawaii",
						"Las tiendas de disfraces son una tapadera de tiendas de maniquíes",
						"He encontrado unas pastillas con las que puedo estar horas sin fumar, se llaman Dormidina",
						"No entiendo a la gente que le toca pasillo en un avión, a mí siempre me toca asiento",
						"El transporte más seguro no es el avión, es la ambulancia",
						"No estoy en coma, estoy en modo avión",
						"Yo doy el pésame con el emoticono de la báscula",
						"Los zombis avanzan en punto muerto",
						"El fútbol es de niños y coser es de niñas. Eso es sexismo. Aprendamos de Pakistán, donde niños y niñas cosen balones",
						"Yo no odio, amo en negativo",
						"Cuando muera quiero que os incineren",
						"Me encanta dormid con alguien que ronca y soñar que tengo una Harley",
						"Quemar un ninot de tu mujer es Valencia de género",
						"Un atasco es una manifestación de Transformers",
						"Lo mejor de un tsunami es que alcanza bien donde no se llega con la bayeta",
						"Al funeral de una soltera van cuatro gatos",
						"Si mi coche pierde aceite no lo llevo al taller, lo que tengo que hacer es aceptarlo",
						"Cuando muera quiero que en mi lápida solo ponga mi fecha de nacimiento, para que quien pase piense que me han enterrado vivo",
						"El hombre invéntó la rueda en el Neolítico e inventó la silla en el Paralítico",
						"Me echaron del Rey León por tirarle cacahuetes al reparto",
						"Quiero profanar la tumba del fundador de Danone y ver si hay algo bajo la tapa",
						"Pitar un himno es silbarlo mal",
						"Yo me baño en bolas camuflado en una piscina de bolas",
						"Tenía la impresión de que me seguían, así que contraté un guardaespaldas y dejó de ser una impresión. Lo bueno es que son gratis, porque si no les pagas te siguen dos cobradores del Frac y el efecto es el mismo"
						);
	$n = sizeof($storedJoke) - 1;
	$n = rand(0,$n);

	return $storedJoke[$n];
}
function tellStory($part,$name) {
	$name = $name." ";
	$story = "example";
	if($part == 1) {	
		$storedPart = array(
					"El otro día ",
					"Todavía recuerdo cuando ",
					"Hace unos días ",
					"Un día soñé que ",
					"El año pasado ",
					"Qué grande fue el día en el que ",
					"Cuando nadie de este grupo había nacido aún, ",
					"Me hizo gracia cuando me contaron que ",
					"Poco se está hablando de cuando ",
					"Hace tiempo leí que "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $storedPart[$n];
		
		$storedPart = array(
					"una cabra ",
					"un camaleón calvo ",
					"aquel vecino de tu prima ",
					"un coyote cósmico ",
					$name,
					"una amiga ",
					"un corcel del pueblo ",
					"un reponedor de embutidos ",
					"un corzo ",
					"un panadero oriental ",
					"una albóndiga humana ",
					"una alcaldesa de su pueblo ",
					"un ñu escocés ",
					"alguien conocido como ".$name,
					"un potro submarinista ",
					"un vendedor de clavicordios orientales ",
					"una cigala "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		
		$storedPart = array(
					"que tenía gases ",
					"con pulgas en el sobaco ",
					"que vivía con una familia de mapaches ",
					"que asustaba a las gallinas cuando se ponía el sol, ",
					"con unas tierras en Calahorra ",
					"con una gran pasión por el curling sobre hierba ",
					"que coleccionaba fotos de patos para adornar la cocina ",
					"que alimentaba cigüeñas a base de cáñamo de fresa ",
					"con un diente en forma de abrelatas ",
					"cuya afición era coleccionar bombillas "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		
		$storedPart = array(
					"se coló en el supermercado ",
					"confundió un cable eléctrico de forma extraña con unas campurrianas y lo mordió ",
					"entró con un bate de béisbol a una frutería al grito de \"¡Mi gato tiene sueño, fruta gratis para su dueño!\" ",
					"compró un billete para visitar Saturno y como no le cobraron el IVA lo devolvió y se compró un Tamagotchi ",
					"levantó un camión frigorífico a pulso para coger una moneda de cinco céntimos que se le había caído ",
					"tenía una barca con alas que absorbía nitrógeno líquido y la tuneó con ketchup y plastidecores ",
					"comía feliz cardillo y kiwi cuando en lugar de verse en un palenque se despertó y se vio en una oficina trabajando, y se volvió a dormir ",
					"se fue a cazar mariposas con un aspersor de césped para interiores y acabó empaquetando chorizos ",
					"intentó estudiar clases de piano pero tardó una semana en comprar un lanzallamas para prenderle fuego ",
					"estaba comiendo sardinas y me alicató el cuarto de baño "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		
		$storedPart = array(
					"a sangre fría.",
					"justo antes de caer rodando por las escaleras.",
					"para después salir corriendo y parar un taxi para preguntarle la hora.",
					"sin pensar en los niños.",
					"con la misma elegancia que una cebra te tala un árbol con la zurda.",
					"viendo por el rabillo del ojo una rebanada de pan con salmorejo saliendo de un fax.",
					"liberando así a los protones de ser enviados al espacio tabulado por el equipo Actimel.",
					"obstruyendo una salida de metro que había a dos kilómetros y se tuvo que cerrar por exceso de confianza.",
					"mientras ".$name."fichaba por el Betis por sorpresa en una genialidad táctica del mago Schwarzenegger.",
					"mientras escuchaba El Fary."
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		
	} else if($part == 2) {	
	
		$storedPart = array(
					"Días más tarde, ",
					"Poco después, ",
					"Unos días después, ",
					"Luego ",
					"A continuación ",
					"No muy lejos en el tiempo, ",
					"Poco tiempo después, ",
					"Por si fuera no fuera bastante, ",
					"Después, ",
					"Más tarde, "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $storedPart[$n];
		$storedPart = array(
					"suplantó la identidad de un famoso plato típico hindú y logró ser la estrella de la radio al ser el plato principal de sus trabajadores, ",
					"entró en el cuerpo de policía en calidad de observador de incógnito marino para investigar el comportamiento nocturno de las estrellas marinas de agua dulce, ",
					"formó un grupo musical llamado \"Tú ve calentando la cena que yo tengo descendencia austríaca\" y consiguió vender más de cinco copias, ",
					"participó en las olimpiadas del barrio donde se crió, y consiguió un total de una medalla de bronce, récord histórico para la familia, ",
					"entró en prisión por robar un beso a un cocodrilo del zoo de Kiev que estaba echándose la siesta ",
					"se aficionó a fabricar helados de espaguetis y a fabricarlos en masa hasta que se extinguió la pasta en su casa ",
					"se convirtió en acróbata y trabajó en una pastelería que quebró tras invertir la mayor parte de su capital en elefantes antárticos ",
					"se entrenó para ser profesional del ping-pong sobre hielo bajo una cascada de lava fresca ",
					"le tocó la lotería e invirtió el premio en comprar lotería, perdiéndolo todo en menos de una semana ",
					"vendió un radiocasete que solo reproducía canciones de King África en alemán para comprarse un chándal del atleti "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
				$storedPart = array(
					"e incluso se llevó por delante una pareja de jabalies que cruzaban la autopista cuando pensó en hacer un viaje pacífico al centro de Europa, ",
					"y se aficionó a las nuevas tecnologías, hasta que descubrió que los teléfonos móviles ya no van a pilas, ",
					"y montó su propio club de fans el cual estaba formado por un miembro, y aun así recibía cartas de apoyo, ",
					"y encontró la pasión de su vida al mezclar el chocolate con la salsa roquefort, haciendo de ésto su plato diario favorito, ",
					"y alquiló una casa cerca del mar para hacer senderismo por la orilla mientras se alimentaba exclusivamente de zumos de uva y lechuga, ",
					"e invocó a Odín para combatir la plaga de mosquitos que atacaba las croquetas que cualquier habitante cocinaba en su domicilio, ",
					"y se aficionó a las casas de apuestas, logrando una racha de dos aciertos seguidos en más de diez mil intentos al 'Piedra, Papel o Tijera online', ",
					"y se casó con el bosque en un acto de amor eterno a la naturaleza, hasta que ".$name."le prendió fuego, ",
					"y se rompió una pierna intentando tapizar un calamar como si fuera un sofá de diseño ",
					"y montó un bar con una beca que le concedieron por ser campeón de europa en abrir latas de mejillones caducados con la rodilla izquierda, "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		$storedPart = array(
					"y acabó centrándose en la política, donde formó su propio partido el cual no quería votos ni escaños, sino likes en YouTube.",
					"y según filtraciones de los amigos más cercanos de su entorno se montó su propia casa a base de recolectar restos de sandía tropical.",
					"e incluso salió por televisión cuando decidió escalar el Everest a cuatro patas con un disfraz de koala.",
					"y se dedicó al cultivo de arroz sobre parquet, hasta que vendió la patente de su idea a una marca de cosméticos para hormigas.",
					"y recibió un Óscar al mejor choped al inventar el primer embutido en forma de estrella vendido en estado gaseoso.",
					"y aunque haya tenido una racha extraña de acontecimientos, consiguió la fama montando un cine de películas de terror donde aleatoriamente volaban patatas fritas por todas la salas.",
					"pero todo acabó cuando decidió retirarse de la sociedad para montar un invernadero para palomas turcas.",
					"hasta que probó la pizza con Sugus y dedicó el resto de su vida a hibernar como un águila imperial.",
					"pero se acabó aburriendo de todo y se fue a vivir al norte del planeta Tierra.",
					"sin pasar por alto que, al tener una gran afición por las canicas de conservación medioambiental, por las noches tiene una rampa preparada en su cama para entrar rodando antes de dormir."
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		
	} else if($part == 3) {	
	
		$storedPart = array(
					"Al final, ",
					"Después de todo esto, ",
					"Para acabar, ",
					"Por si fuera poco, ",
					"Cuando todo volvió a la normalidad, ",
					"Cuando pensaba que aquí terminaba todo, ",
					"Y luego, encima, ",
					"Para terminar, ",
					"Y por último, ",
					"Como último detalle, añadir que "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $storedPart[$n];
		$storedPart = array(
					"colecciona logotipos de empresas relacionadas con vacas para luego denunciarlas por opresión a los anfibios ",
					"restaura billetes de la época medieval en su zapatería y se gana unos ahorros extra que invierte en buscar petróleo en la superficie lunar ",
					"revienta granos de acné a los adolescentes que encuentra por los parques de su ciudad ",
					"varea la aceituna en el pueblo con la pata de una silla que ahora es un taburete donde guardar pipas saladas ",
					"se preocupa por los desfavorecidos y les regala dispositivos electrónicos sin pedir nada a cambio. Una vez se lo agradecen, prende fuego a dos casas al azar, ",
					"se interesa por encontrar alguna forma de revivir a los dinosaurios, pensando que una vez vuelvan a la vida volverán a salir en los Bollycao en forma de cromos, ",
					"escribe novelas sobre melones que pilotan helicópteros y sobrevuelan la ciudad en busca de colonias de hormigas extraviadas, ",
					"trabaja en una copistería, el sueño de su vida, y con lo que gana se cambia de coche una vez al mes, ",
					"viaja por todo el mundo buscando el lugar donde el cielo parece más pequeño, ",
					"le gusta rebozar salchichas en Ambipur para colgarlas del techo "
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
		$storedPart = array(
					"y piensa secuestrar a ".$name."para que le diga la clave del wifi.",
					"y planea inscribirse en una carrera de trineos para caballos.",
					"y tiene pensado invertir en la nueva consola Hacendado, que promete ofrecer más de treinta minutos de diversión al mes.",
					"y tiene todo preparado para convertirse en un futuro no muy lejano en emperador del chorizo de Tordesillas.",
					"y compra limpiacristales para mantener una dieta equilibrada.",
					"y celebrará el próximo verano el primer torneo de comerse las uñas con condimento.",
					"y montará una relojería cuando tenga tiempo.",
					"y aprenderá a jugar a todos los deportes posibles para no tener que practicar uno de ellos más de una vez en su vida.",
					"y concursará en programas de televisión a cambio de comida.",
					"y está esperando que sea navidad para trocear unos alicates rotos y preparar con ellos una buena sopa fresca."
					);
		$n = sizeof($storedPart) - 1;
		$n = rand(0,$n);	
		$story = $story.$storedPart[$n];
	}

	return $story;
}

function getQuote($text, $chat_id) {
	$start = strpos(strtolower($text), "!cita") + 5;
	$text = substr($text, $start);
	$text = ltrim(rtrim($text));
	$userQuote = "";
	if(strpos($text, "(") === 0) {
		$length = strpos($text, ")");
		$userQuote = substr($text, 1, $length - 1);
		$text = substr($text, $length + 1);
		$userQuote = ltrim(rtrim($userQuote));
	}
	$text = ltrim(rtrim($text));
	if(strlen($text) > 0) {
		$text = wordwrap($text, 45, "\n", false);
		$text = '“'.$text.'”';
		$totalEOL = substr_count($text, PHP_EOL);
		if($totalEOL < 7) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
			usleep(250000);
			$YPos = 220;
			if($totalEOL > 3){
				$YPos = $YPos - (40 * ($totalEOL - 3));
			}
			if(strlen($userQuote) > 0) {
				$text = $text.PHP_EOL."- ".$userQuote;
			}
			$imageURL = rand(0,9);
			$imageShortURL = "/img/cita_".$imageURL.".png";
			$imageURL = dirname(__FILE__).$imageShortURL;
			header('Content-type: image/png');
			$png_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/cita.png');
			$textColor = imagecolorallocate($png_image, 255, 255, 255);
			$font_path = dirname(__FILE__)."/img/journal.ttf";
			imagettftext($png_image, 32, 0, 100, $YPos, $textColor, $font_path, $text);
			imagepng($png_image, $imageURL);
			$target_url    = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
			$file_name_with_full_path = realpath($imageURL);
			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);
			imagedestroy($png_image);
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy largo, intenta ser más breve para que quepa al completo en la imagen.*"));
		}
	} else {
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy corto. Escribe !ayuda si necesitas recordar cómo utilizar la función !cita.*"));
	}
}

function guessWho($chat_id, $reply_id) {
	$link = dbConnect();
	$query = "SELECT first_name, user_name FROM userbattle WHERE group_id = '".$chat_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$users = array();
	while ($row_user = mysql_fetch_assoc($result)) {
		$users[] = $row_user;
	}
	mysql_free_result($result);
	mysql_close($link);
	$totalUsers = count($users);
	if($totalUsers > 3) {
		$totalUsers = $totalUsers - 1;
		$selectedUser = rand(0, $totalUsers);
		$userFirstName = $users[$selectedUser]['first_name'];
		$userNickName = $users[$selectedUser]['user_name'];
		if($userNickName != "") {
			if(strtolower($userFirstName) == strtolower($userNickName)) {
				$finalName = $userNickName;
			} else {
				$finalName = $userFirstName." (".$userNickName.")";
			}
		} else {
			$finalName = $userFirstName;
		}
		$finalName = str_replace("<", "", $finalName);
		$finalName = str_replace(">", "", $finalName);
		
		$storedReply = array(
							$finalName,
							"Está claro que ".$finalName,
							"Diría que ".$finalName.", aunque tengo dudas",
							"Nadie, la verdad",
							"Cualquiera me vale",
							"Yo ✌😁",
							$finalName." tiene todas las papeletas",
							"Fácil, ".$finalName,
							"Menuda pregunta... Pues ".$finalName.", obvio",
							"Si lo pienso mucho te digo que ".$finalName,
							"Así sin pensarlo ".$finalName." es quien me viene a la cabeza",
							"Pues ".$finalName.", ¿no? Eso pienso",
							"Yo a tope con ".$finalName,
							"Hoy te diría que ".$finalName.". Mañana puede que cambie de opinión",
							"Tú, por preguntar",
							"A ver, yo diría que ".$finalName.", pero es capaz de quejarse..",
							"Te voy a decir que ".$finalName,
							"Pregúntale a ".$finalName."..",
							$finalName." sabe la respuesta a eso mejor que yo",
							"Con total seguridad, ".$finalName,
							"La respuesta es... No, espera. Bueno sí, va, pensaba en ".$finalName." pero me habían entrado dudas",
							"Te leo dos veces y te digo que ".$finalName,
							$finalName.", sin más",
							"Evidentemente ".$finalName,
							$finalName." con diferencia",
							"Esta ahí ahí, pero me quedo con ".$finalName,
							"Así a voleo se me ocurre ".$finalName
							);
		$n = sizeof($storedReply) - 1;
		$n = rand(0,$n);
		$text = $storedReply[$n];
	} else {
		$text = "Todavía no conozco a mucha gente de este grupo, te puedo contestar a esa pregunta en cuanto habléis más personas..";
	}
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	usleep(500000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "reply_to_message_id" => $reply_id, "text" => "<b>".$text.".</b>"));
}

function getSquirtle($text, $chat_id) {
	$start = strpos(strtolower($text), "!squirtle") + 9;
	$text = substr($text, $start);
	$text = ltrim(rtrim($text));
	if(strlen($text) > 0) {
		$text = wordwrap($text, 24, "\n", false);
		$totalEOL = substr_count($text, PHP_EOL);
		if($totalEOL < 3) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
			usleep(250000);
			$YPos = 380;
			$imageURL = rand(0,9);
			$imageShortURL = "/img/squirtle_".$imageURL.".jpg";
			$imageURL = dirname(__FILE__).$imageShortURL;
			header('Content-type: image/jpeg');
			$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/squirtle.jpg');
			$textColor = imagecolorallocate($jpg_image, 0, 0, 0);
			$font_path = dirname(__FILE__)."/img/calibri.ttf";
			imagettftext($jpg_image, 72, 0, 100, $YPos, $textColor, $font_path, $text);
			imagejpeg($jpg_image, $imageURL);
			$target_url    = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
			$file_name_with_full_path = realpath($imageURL);
			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);
			imagedestroy($jpg_image);
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy largo, intenta ser más breve para que quepa al completo en la imagen.*"));
		}
	} else {
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy corto. Escribe !ayuda si necesitas recordar cómo utilizar la función !cita.*"));
	}
}

function getMadrid($text, $chat_id) {
	$start = strpos(strtolower($text), "!madrid") + 7;
	$text = substr($text, $start);
	$text = ltrim(rtrim($text));
	$number = "";
	if(strlen($text) > 0) {
		if(strpos($text, "(") === 0) {
			$length = strpos($text, ")");
			$number = substr($text, 1, $length - 1);
			$text = substr($text, $length + 1);
			$number = ltrim(rtrim($number));
			if(is_numeric($number) && strlen($number) < 3) {
				if($number < 0 || $number > 99) {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El dorsal debe estar comprendido entre el 0 y el 99.*"));
					exit;
				}
			} else {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El dorsal introducido no es un número válido.*"));
				exit;
			}
			$text = ltrim(rtrim($text));
		}		
		if(strlen($text) < 13) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
			usleep(250000);
			$XPos = 200 - (8 * strlen($text));
			$imageURL = rand(0,9);
			$imageShortURL = "/img/madrid_".$imageURL.".jpg";
			$imageURL = dirname(__FILE__).$imageShortURL;
			header('Content-type: image/jpeg');
			$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/madrid.jpg');
			$textColor = imagecolorallocate($jpg_image, 15, 29, 66);
			$font_path = dirname(__FILE__)."/img/madrid.ttf";
			imagettftext($jpg_image, 40, 0, $XPos, 120, $textColor, $font_path, $text);
			if($number == "") {
				$number = 7;
				$XPos = 165;
			} else {
				if((int)$number == 1) {
					$XPos = 190;
				} else if(strlen($number) == 1) {
					$XPos = 165;
				} else if($number == "11") {
					$XPos = 160;
				} else if((int)$number > 9 && (int)$number < 20) {
					$XPos = 145;
				} else {
					$XPos = 125;
				}
			}
			imagettftext($jpg_image, 140, 0, $XPos, 325, $textColor, $font_path, $number);
			imagejpeg($jpg_image, $imageURL);
			$target_url    = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
			$file_name_with_full_path = realpath($imageURL);
			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);
			imagedestroy($jpg_image);
			if(strtolower($text) == "ronaldo") {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "record_audio"));
				$audio = "AwADBAADUAcAApdgXwABQc8nD4fGur0C";
				usleep(250000);
				apiRequest("sendVoice", array('chat_id' => $chat_id, 'voice' => $audio));
			}
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy largo, intenta ser más breve para que quepa al completo en la imagen.*"));
		}
	} else {
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy corto. Escribe !ayuda si necesitas recordar cómo utilizar la función !cita.*"));
	}
}

function getBarcelona($text, $chat_id) {
	$start = strpos(strtolower($text), "!barcelona") + 10;
	$text = substr($text, $start);
	$text = ltrim(rtrim($text));
	$number = "";
	if(strlen($text) > 0) {
		if(strpos($text, "(") === 0) {
			$length = strpos($text, ")");
			$number = substr($text, 1, $length - 1);
			$text = substr($text, $length + 1);
			$number = ltrim(rtrim($number));
			if(is_numeric($number) && strlen($number) < 3) {
				if($number < 0 || $number > 99) {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El dorsal debe estar comprendido entre el 0 y el 99.*"));
					exit;
				}
			} else {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El dorsal introducido no es un número válido.*"));
				exit;
			}
			$text = ltrim(rtrim($text));
		}		
		if(strlen($text) < 13) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
			usleep(250000);
			$XPos = 215 - (8 * strlen($text));
			$imageURL = rand(0,9);
			$imageShortURL = "/img/barcelona_".$imageURL.".jpg";
			$imageURL = dirname(__FILE__).$imageShortURL;
			header('Content-type: image/jpeg');
			$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/barcelona.jpg');
			$textColor = imagecolorallocate($jpg_image, 219, 155, 56);
			$font_path = dirname(__FILE__)."/img/barcelona.ttf";
			imagettftext($jpg_image, 28, 0, $XPos, 135, $textColor, $font_path, $text);
			if($number == "") {
				$number = 10;
				$XPos = 145;
			} else {
				if((int)$number == 1) {
					$XPos = 185;
				} else if(strlen($number) == 1) {
					$XPos = 185;
				} else if($number == "11") {
					$XPos = 150;
				} else if((int)$number > 9 && (int)$number < 20) {
					$XPos = 145;
				} else {
					$XPos = 145;
				}
			}
			imagettftext($jpg_image, 96, 0, $XPos, 275, $textColor, $font_path, $number);
			imagejpeg($jpg_image, $imageURL);
			$target_url    = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
			$file_name_with_full_path = realpath($imageURL);
			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);
			imagedestroy($jpg_image);
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy largo, intenta ser más breve para que quepa al completo en la imagen.*"));
		}
	} else {
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy corto. Escribe !ayuda si necesitas recordar cómo utilizar la función !cita.*"));
	}
}

function commandsList($send_id, $mode) {
	$mainHelp = 0;
	$mode = str_replace("/ayuda_", "", strtolower($mode));
	$mode = str_replace("@demisukebot", "", strtolower($mode));
	$mode = str_replace("@demitest_bot", "", strtolower($mode));
	if($mode == "main") {
		$mainHelp = 1;
		apiRequest("sendChatAction", array('chat_id' => $send_id, 'action' => "typing"));			
		usleep(100000);
		$text = 
				"Este es el menú de ayuda de @DemisukeBot, aquí encontrarás todo lo que el bot es capaz de hacer."
				.PHP_EOL.
				"Utilízalo siempre que quieras repasar cuáles son los comandos que se pueden utilizar con el bot escribiendo \"/demisuke\" o \"!ayuda\" sin las comillas."
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"⚠️ <b>¡Importante!</b>"
				.PHP_EOL.
				"<i>Para que el bot no resulte ni pesado ni aburrido, configura el panel \"!modo\" con los ajustes óptimos para tu grupo.</i>"
				.PHP_EOL.
				"Más información: /ayuda_modo"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"🗣 <b>Interactividad:</b>"
				.PHP_EOL.
				"<i>Si está activado en la función \"!modo\", el bot intentará participar en la conversación activa en alguna que otra ocasión, y responderá a palabras clave con respues, gifs, sonidos, stickers... ¡y huevos de pascua!</i>"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"🌐 <b>Funciones Inline:</b>"
				.PHP_EOL.
				"–<b>Spoiler</b>: <i>Permite enviar un mensaje oculto en cualquier chat.</i>"
				.PHP_EOL.
				"–<b>Negrita</b>: <i>Permite enviar un mensaje en negrita a cualquier chat.</i>"
				.PHP_EOL.
				"–<b>Enlace</b>: <i>Permite enviar un mensaje de color azul a cualquier chat.</i>"
				.PHP_EOL.
				"Más información: /ayuda_inline"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"📎 <b>Utilidades:</b>"
				.PHP_EOL.
				"–<b>Sí o No</b>: <i>Responde a una pregunta con \"!siono pregunta\".</i>"
				.PHP_EOL.
				"–<b>¿Quién?</b>: <i>Responde con un miembro del grupo a una pregunta utilizando \"!quien pregunta\".</i>"
				.PHP_EOL.
				"–<b>Insultos</b>: <i>Insulta a alguien mediante \"!insulta a nombre\".</i>"
				.PHP_EOL.
				"–<b>Humor</b>: <i>Escribe \"!chiste\" para leer una frase célebre de Luis Álvaro.</i>"
				.PHP_EOL.
				"–<b>Sticker</b>: <i>Envía un sticker al azar con \"!sticker\".</i>"
				.PHP_EOL.
				"–<b>Historia</b>: <i>Cuenta una larga historia al escribir \"!historia\".</i>"
				.PHP_EOL.
				"–<b>Nick</b>: <i>Genera un nombre de usuario aleatorio con \"!nick\".</i>"
				.PHP_EOL.
				"–<b>Refrán</b>: <i>Crea un nuevo proverbio utilizando \"!refran\".</i>"
				.PHP_EOL.
				"–<b>Invocaciones</b>: <i>Invoca a un espíritu aleatorio con \"!invocar\".</i>"
				.PHP_EOL.
				"–<b>Enjuto Mojamuto</b>: <i>Lee las mejores frases manchego-murcianas de Enjuto usando \"!enjuto\" o \"!acho\".</i>"
				.PHP_EOL.
				"–<b>Monos</b>: <i>Envía gifs de macacos con la función \"!macaco\".</i>"
				.PHP_EOL.
				"–<b>Vaporwave</b>: <i>Envía gifs sobre Vaporwave usando \"!vaporwave\".</i>"
				.PHP_EOL.
				"–<b>Dados</b>: <i>Lanza dos dados y obtendrás un resultado entre dos y doce usando \"!dados\".</i>"
				.PHP_EOL.
				"–<b>Ping</b>: <i>Comprueba la conexión entre cliente y bot con \"!ping\".</i>"
				.PHP_EOL.
				"–<b>Moneda</b>: <i>Lanza una moneda al aire con \"!moneda\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_moneda"
				.PHP_EOL.
				"–<b>Bienvenida</b>: <i>Establece un mensaje personal de bienvenida con \"!bienvenida\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_bienvenida"
				.PHP_EOL.
				"–<b>Función personal</b>: <i>Guarda tu texto personalizado y lánzalo con \"!texto\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_texto"
				.PHP_EOL.
				"–<b>Información</b>: <i>Muestra información del bot con \"!info\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_info"
				.PHP_EOL.
				"–<b>Cita</b>: <i>Crea una cita como imagen con \"!cita mensaje\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_cita"
				.PHP_EOL.
				"–<b>Bécquer</b>: <i>Crea una imagen con texto en minúsculas de Gustavo Adolfo Bécquer usando \"!becquer mensaje\".</i>"
				.PHP_EOL.
				"–<b>Meme Squirtle (vamo a calmarno)</b>: <i>Crea un meme con Squirtle escribiendo \"!squirtle mensaje\".</i>"
				.PHP_EOL.
				"–<b>Equipaciones deportivas</b>: <i>Crea una camiseta con número y dorsal personalizados.</i>"
				.PHP_EOL.
				"Más información: /ayuda_camisetas";
				apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "HTML", 'disable_web_page_preview' => true, "text" => $text));

				$text = 
				"👾 <b>Minijuegos:</b>"
				.PHP_EOL.
				"–<b>Rocosos de Demisuke</b>: <i>RPG para Telegram. ¡Entrena a tu personaje usando \"!exp\" en privado!.</i>"
				.PHP_EOL.
				"Más información: /ayuda_rocosos"
				.PHP_EOL.
				"–<b>Batalla de mensajes</b>: <i>Compite por ser el más activo de Telegram con \"!mensajes\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_mensajes"
				.PHP_EOL.
				"–<b>Grupos</b>: <i>Lleva a tu grupo a lo más alto con \"!grupos\".</i>"
				.PHP_EOL.
				"Más información: /ayuda_grupos"
				.PHP_EOL.
				"–<b>Captura la bandera</b>: <i>¡Sé el más rápido de Telegram haciendo la \"!pole\"!</i>"
				.PHP_EOL.
				"Más información: /ayuda_bandera"
				.PHP_EOL.
				"–<b>Reclama el mástil</b>: <i>Usa \"!pole\" para enviar un mástil a tu grupo!</i>"
				.PHP_EOL.
				"Más información: /ayuda_mastil"
				.PHP_EOL.
				"–<b>Héroes de Telegram</b>: <i>¡Evita detonar la bomba con \"!boton\"!</i>"
				.PHP_EOL.
				"Más información: /ayuda_heroes"
				.PHP_EOL.
				"–<b>Apuestas</b>: <i>Gana fichas apostando en grupos con \"!apuesta\"</i>"
				.PHP_EOL.
				"Más información: /ayuda_apuestas"
				.PHP_EOL.
				"–<b>Máquina tragaperras</b>: <i>¡Llévate el premio gordo con \"!slot\" o \"!777\"!</i>"
				.PHP_EOL.
				"Más información: /ayuda_slots"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"💎 <b>Otros bots:</b>"
				.PHP_EOL.
				"@KamisukeBot: <i>Envía sonidos cortos como con el antiguo \"Messenger Plus!\".</i>"
				.PHP_EOL.
				"@DemigranciasBot: <i>Los mejores textos y audios de ForoCoches se reúnen en este bot.</i>"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"<i>¿Tienes alguna </i><b>sugerencia</b><i> para el bot?, ¿le encuentras algún fallo? Puedes utilizar la función \"!sugerencia\" para dejar un mensaje en el bot. Si utilizas esta función desde un chat privado con el bot podrías obtener una respuesta del desarrollador a tu mensaje si fuera conveniente.</i>"
				.PHP_EOL.
				"Si quieres saber cuándo hay nuevas actualizaciones únete al @CanalKamisuke y conocerás todas las novedades al instante."
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"¿Te gusta el bot?  <a href=\"https://telegram.me/storebot?start=DemisukeBot\">¡Pulsa aquí y puntúalo ⭐️⭐️⭐️⭐️⭐️!</a>"
				.PHP_EOL.
				"La utilización de este bot es totalmente gratuita, pero si deseas contribuir a mejorar los servicios de Demisuke puedes donar la cantidad que quieras de manera voluntaria <a href=\"https://www.paypal.me/Kamisuke/1\">pulsando aquí</a>. ¡Muchas gracias!"
				.PHP_EOL.PHP_EOL.
				"@DemisukeBot v3.0.9b creado por @Kamisuke."
				;
	} else if($mode == "modo") {
		$text = "🔧 <b>Configuración del bot en grupos</b> ⚙"
				.PHP_EOL.PHP_EOL.
				"ℹ️<i> Para obtener la mejor experiencia posible con el bot es importante configurar estos ajustes acorde con las exigencias del grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.PHP_EOL.
				"➖<b>!modo</b>: con esta función podrás visualizar la configuración actual del bot en el grupo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo</b>: el bot consta de cinco niveles de interacción con el grupo mostrados en !modo, siendo el nivel cero el predeterminado para los grupos que añaden el bot por primera vez. Con esta función puedes cambiar el nivel al siguiente de manera cíclica."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo 0</b>: activa el nivel cero en !modo, habilitando así todas las funciones del bot."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo 1</b>: deshabilita las funciones del bot a nivel 1 que aparecen en !modo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo 2</b>: deshabilita las funciones del bot a nivel 2 que aparecen en !modo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo 3</b>: deshabilita las funciones del bot a nivel 3 que aparecen en !modo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!cambiarmodo 4</b>: deshabilita las funciones del bot a nivel 4 que aparecen en !modo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!modoadmin</b>: La función !cambiarmodo por defecto puede ser utilizada por cualquier miembro del grupo, sin embargo un administrador de grupo puede restringir este privilegio si utiliza esta función."
				.PHP_EOL.PHP_EOL.
				"➖<b>!modolibre</b>: vuelve a dar los permisos que anula el uso de !modoadmin. El modo libre está activado por defecto para los nuevos grupos."
				.PHP_EOL.PHP_EOL.
				"➖<b>!bloquearpole</b>: prohíbe la participación del grupo en los minijuegos 'Captura la bandera' y 'Reclama el mástil' deshabilitando el uso de la función !pole dentro del grupo."
				.PHP_EOL.PHP_EOL.
				"➖<b>!permitirpole</b>: vuelve a dar los permisos que anula el uso de !bloquearpole. La participación en los minijuegos está permitida por defecto para los nuevos grupos."
				.PHP_EOL.PHP_EOL.
				"<i>Además, también se visualizará el estado de la función personalizada y el mensaje de bienvenida personalizado del grupo. Consulta en la !ayuda cómo configurar estas funciones en sus apartados correspondientes,</i> /ayuda_texto <i>y</i> /ayuda_bienvenida<i>.</i>"
				;
	} else if($mode == "inline") {
		$text = "🔎 <b>Funciones inline del bot</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Las funciones inline son aquellas que puedes utilizar en cualquier chat, sea privado o grupal, sin necesidad de que el bot sea uno de los miembros de la conversación.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Para poder utilizar estas opciones basta con escribir</i><b>@DemisukeBot mensaje</b><i> y aparecerá un menú desplegable con las siguientes opciones:</i>"
				.PHP_EOL.PHP_EOL.
				"–<b>Spoiler</b>: <i>El mensaje que escribas se enviará oculto y el receptor no verá su contenido hasta que pulse el botón \"Desvelar spoiler\".</i>"
				.PHP_EOL.
				"<i>Si el mensaje se envía como </i><b>@DemisukeBot mensaje1 spoiler: mensaje2</b> <i>el mensaje1 aparecerá públicamente justo encima del botón, a modo de alerta adicional, y el mensaje2 será el que permanezca oculto tras el botón.</i>"
				.PHP_EOL.PHP_EOL.
				"–<b>Negrita</b>: <i>El mensaje que escribas se enviará en negrita, sin configuración adicional</i>"
				.PHP_EOL.PHP_EOL.
				"–<b>Azul</b>: <i>El mensaje que escribas se enviará como si fuera un enlace, haciéndolo aparecer de color azul.</i>"
				;
	} else if($mode == "moneda") {
		$text = "🔎 <b>Función Moneda</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Utilizando </i><b>!moneda</b><i> aparecerá un botón para hacerla girar."
				.PHP_EOL.
				"¿Cara o cruz? ¡Elige antes de que salga una de las dos opciones!"
				.PHP_EOL.PHP_EOL.
				"La función de girar la moneda requiere un gran uso de la API de Telegram, por lo que solo hay una moneda general para todos los usuarios del bot, y se podrá girar una vez por minuto como máximo.</i>"
				;
	} else if($mode == "bienvenida") {
		$text = "🔎 <b>Mensaje de bienvenida personalizado</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Si escribes </i><b>!bienvenida mensaje</b><i> en un grupo donde seas administrador/a y esté presente el bot, podrás guardar un mensaje de bienvenida que se mostrará autoáticamente cada vez que un nuevo usuario se añada al grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Para mostrar el mensaje puedes escribir simplemente </i><b>!bienvenida</b><i> sin especificar ningún texto adicional, y aparecerá el texto guardado para el grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>El mensaje guardado se almacena formateado en HTML, por lo que puedes usar algunas etiquetas para, por ejemplo, escribir en negrita.</i>"
				.PHP_EOL.
				"<i>Si el mensaje no aparece es posible que sea porque ocupe más de 2500 carácteres, que te hayas dejado alguna etiqueta abierta o que hayas intentado encadenar más de una para una misma palabra, algo que actualmente Telegram no permite.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Para eliminar el mensaje guardado bastará con escribir </i><b>!bienvenida off</b>."
				;
	} else if($mode == "texto") {
		$text = "🔎 <b>Mensaje personalizado para grupos</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Si escribes </i><b>!texto mensaje</b><i> en un grupo donde seas administrador/a y esté presente el bot, podrás guardar un mensaje de texto que se mostrará cada vez que alguien escriba</i> <b>!texto</b>."
				.PHP_EOL.PHP_EOL.
				"<i>El mensaje guardado se almacena formateado en HTML, por lo que puedes usar algunas etiquetas para, por ejemplo, escribir en negrita.</i>"
				.PHP_EOL.
				"<i>Si el mensaje no aparece es posible que sea porque ocupe más de 2500 carácteres, que te hayas dejado alguna etiqueta abierta o que hayas intentado encadenar más de una para una misma palabra, algo que actualmente Telegram no permite.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Para eliminar el mensaje guardado bastará con escribir </i><b>!texto off</b>."
				;
	} else if($mode == "info") {
		$text = "🔎 <b>Información y estadísticas del bot</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Con la función </i><b>!info</b><i> el bot relatará su historia y podrás saber de dónde procede y más datos sobre su vida, tanto en Telegram como fuera.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Además contará de manera indirecta en cuántos grupos está instalado y te dará pistas sobre funciones ocultas como huevos de pascua o palabras clave.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Si utilizas la función </i><b>!infomini</b><i> el bot se limitará a responder cuántos usuarios usan a</i> @DemisukeBot<i>, en cuántos grupos ha estado y en cuántos sigue activo, además del número de jugadores de Los Rocosos de Demisuke.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>La información acerca del número de usuarios y grupos que utilizan el bot se actualiza a tiempo real, sin embargo el número de grupos que participan en los minijuegos se actualiza con frecuencia variable y los resultados exactos pueden variar ligeramente.</i>"
				;
	} else if($mode == "cita") {
		$text = "🔎 <b>Imágenes con citas personalizadas</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Escribiendo </i><b>!cita mensaje</b><i> podrás crear una imagen con el texto introducido a modo de cita y compartirla con tus amigos.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>El tamaño máximo no es fijo sino que depende del espacio libre que quede en la imagen. Aun así, si el texto es muy largo o está vacío la propia función te avisará de ello.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>También puedes incluir una firma para la cita introducida si escribes </i><b>!cita (mensaje1) mensaje2</b><i>. El mensaje2 escrito al final será la cita en sí, mientras que el mensaje1 escrito entre paréntesis será la firma con la que terminará la cita.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Nota: esta función incluye un huevo de pascua.</i>"
				;
	} else if($mode == "camisetas") {
		$text = "🔎 <b>Equipaciones deportivas 2016/2017</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!madrid</b>: <i>Diseña la camiseta del Real Madrid CF.</i>"
				.PHP_EOL.
				"➡️<b>!barcelona</b>: <i>Diseña la camiseta del FC Barcelona.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Uso:</b>"
				.PHP_EOL.
				"▶️<i>Escribe \"!madrid nombre\" o \"!barcelona nombre\" para crear una camiseta con dorsal predeterminado.</i>"
				.PHP_EOL.
				"▶️<i>También puedes escoger el dorsal si escribes \"!madrid (7) nombre\" o \"!barcelona (10) nombre\", por ejemplo.</i>"
				.PHP_EOL.
				"▶️<i>Los dorsales deben ser números comprendidos entre 0 y 99.</i>"
				.PHP_EOL.
				"▶️<i>Está permitido el uso del cero a la izquierda. El dorsal (09), por ejemplo, sería válido.</i>"
				.PHP_EOL.
				"▶️<i>El texto tendrá un máximo aproximado de doce caracteres, establecido por el tamaño oficial de las camisetas.</i>"
				.PHP_EOL.
				"▶️<i>Debido a las múltiples combinaciones posibles de los nombres, la precisión a la hora de centrar el nombre será aproximada dependiendo del tamaño y los carácteres utilizados, por lo que podría no aparecer exactamente centrada.</i>"
				.PHP_EOL.
				"▶️<i>Nota: esta función incluye un huevo de pascua.</i>"
				;
	} else if($mode == "mensajes") {
		$text = "🔎 <b>Los usuarios más activos de Telegram</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!mensajes</b>: <i>Muestra la clasificación global de Telegram de los usuarios más activos. Necesitas habilitar tu participación para aparecer aquí.</i>"
				.PHP_EOL.
				"➡️<b>!mensajesgrupo</b>: <i>Ránking exclusivo del grupo de los usuarios que más aportan. ¡Conoce quién mantiene con vida tu grupo! Todos los miembros que hayan escrito al menos un mensaje podrán aparecer en la clasificación.</i>"
				.PHP_EOL.
				"➡️<b>!activame</b>: <i>Habilita la participación en el ránking global. Para mantener la privacidad, todos los usuarios están desactivados por defecto hasta que usan esta función.</i>"
				.PHP_EOL.
				"➡️<b>!desactivame</b>: <i>Oculta tu nombre en el ránking global de los más activos.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Por cada mensaje que escribas en el grupo se te sumará un punto al marcador.</i>"
				.PHP_EOL.
				"▶️<i>Las diez personas que más puntos obtengan aparecerán en el ránking con su nombre y puntuación.</i>"
				.PHP_EOL.
				"▶️<i>La persona que consulte el ránking aparecerá como extra al final del TOP 10 y conocerá su puntuación actual.</i>"
				.PHP_EOL.
				"▶️<i>La utilización de funciones del bot no contará como mensaje escrito, por lo que no añadirá puntos al marcador.</i>"
				.PHP_EOL.
				"▶️<i>El 'floodeo' será ignorado y no puntuará, ningún usuario podrá obtener más de diez puntos en un minuto.</i>"
				.PHP_EOL.
				"▶️<i>Si el grupo se convierte en supergrupo, las estadísticas se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "grupos") {
		$text = "🔎 <b>Los mejores grupos de Telegram</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!grupos</b>: <i>Muestra la clasificación global de los grupos más activos de Telegram. Si no estás en el ránking de los mejores, la puntuación de tu grupo aparecerá al final.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Por cada mensaje que escribas en el grupo se añadirá un punto al marcador.</i>"
				.PHP_EOL.
				"▶️<i>No se podrán conseguir más de sesenta puntos por minutos para evitar el 'floodeo'.</i>"
				.PHP_EOL.
				"▶️<i>Si el bot detecta una mala práctica de esta competición, los puntos del grupo se reiniciarán automáticamente y se enviará una notificación al grupo. ¡Aporta conversaciones interesantes a tus amigos!</i>"
				.PHP_EOL.
				"▶️<i>Solo los grupos con un número considerable de miembros podrá participar en la competición.</i>"
				.PHP_EOL.
				"▶️<i>Los grupos que permanecen inactivos durante más de quince días quedan descalificados de la competición hasta que alguno de sus miembros que no sea bot vuelva a participar en el grupo.</i>"
				.PHP_EOL.
				"▶️<i>Si el grupo se convierte en supergrupo, las estadísticas se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				.PHP_EOL.
				"▶️<i>Los grupos que eliminen al bot de sus miembros serán descalificados de la competición hasta que lo vuelvan a añadir. Si crees que el bot habla demasiado puedes utilizar !cambiarmodo para que participe menos. Si por el contrario lo encuentras aburrido puedes enviar aportes para mejorar el bot con la función !sugerencia.</i>"
				.PHP_EOL.
				"▶️<i>Solo los diez grupos con la puntuación más alta y el grupo donde se consulte el ránking aparecerán en la clasificación.</i>"
				;
	} else if($mode == "bandera") {
		$text = "🔎 <b>Captura la bandera</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!banderas</b>: <i>Muestra la clasificación global de todas las banderas capturadas, además de las que tiene el usuario que utiliza la función si tiene al menos una.</i>"
				.PHP_EOL.
				"➡️<b>!banderasgrupo</b>: <i>Muestra la clasificación del grupo de los usuarios con más banderas capturadas, además de las que tiene el usuario que utiliza la función si tiene al menos una.</i>"
				.PHP_EOL.
				"➡️<b>!pole</b>: <i>Permite capturar una nueva bandera si está disponible, ¡utiliza esta función antes que los demás! En caso de estar capturada la bandera mostrará a quién pertenece y desde dónde la consiguió.</i>"
				.PHP_EOL.
				"➡️<b>!bloquearpole</b>: <i>Permite a los administradores de un grupo impedir que sus miembros puedan capturar banderas. Si eres miembro de un grupo con la captura de banderas bloqueada puedes abrir un chat privado con el bot e intentarlo desde ahí.</i>"
				.PHP_EOL.
				"➡️<b>!permitirpole</b>: <i>Levanta la prohibición de capturar banderas en un grupo. Puedes comprobar la disponibilidad del juego en tu grupo con la función !modo.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Cada hora se planta una nueva bandera en el bot.</i>"
				.PHP_EOL.
				"▶️<i>El primer usuario que la capture con la función !pole la tendrá en su posesión y su nombre aparecerá para todos en dicha función como su propietario, junto al nombre del grupo desde donde la consiguió capturar, hasta que se plante la siguiente bandera, además de sumar una bandera a su colección.</i>"
				.PHP_EOL.
				"▶️<i>El actual poseedor de la última bandera capturada no podrá capturar la siguiente.</i>"
				.PHP_EOL.
				"▶️<i>Cada participante tendrá un inventario inicial para veinte banderas, y un inventario adicional con un hueco extra por cada una de las banderas que haya capturado el usuario que aparece en la posición 10 del ránking global.</i>"
				.PHP_EOL.
				"▶️<i>El uso de la función !pole para capturar la bandera es compatible con grupos y chats privados, siempre que los grupos tengan un número considerable de participantes.</i>"
				.PHP_EOL.
				"▶️<i>La función !pole estará disponible cada veinte segundos. Su uso reiterado sancionará al usuario.</i>"
				.PHP_EOL.
				"▶️<i>Si un usuario sancionado continúa tratando de capturar una bandera con la penalización activa, su sanción aumentará.</i>"
				.PHP_EOL.
				"▶️<i>Un usuario sancionado no podrá conocer su tiempo restante de sanción, simplemente podrá volver a participar una vez la haya cumplido.</i>"
				.PHP_EOL.
				"▶️<i>Si el grupo se convierte en supergrupo, las estadísticas de !banderasgrupo se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "mastil") {
		$text = "🔎 <b>Reclama el mástil</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!mastiles</b>: <i>Muestra la clasificación de todos los mástiles del grupo reclamados, además de los que tiene el usuario que utiliza la función si lo ha reclamado al menos una vez.</i>"
				.PHP_EOL.
				"➡️<b>!pole</b>: <i>Permite reclamar un nuevo mástil si está disponible, ¡utiliza esta función antes que los demás! En caso de estar reclamado el mástil mostrará quién lo hizo.</i>"
				.PHP_EOL.
				"➡️<b>!bloquearpole</b>: <i>Permite a los administradores de un grupo impedir que sus miembros puedan reclamar mástiles.</i>"
				.PHP_EOL.
				"➡️<b>!permitirpole</b>: <i>Levanta la prohibición de reclamar mástiles en un grupo. Puedes comprobar la disponibilidad del juego en tu grupo con la función !modo.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Cada hora se planta un nuevo mástil en el bot, media hora después de que aparezca una bandera nueva.</i>"
				.PHP_EOL.
				"▶️<i>El primer usuario que lo reclame con la función !mastil lo tendrá en su posesión y su nombre aparecerá justo debajo del propietario de la bandera.</i>"
				.PHP_EOL.
				"▶️<i>Más de una persona puede reclamar un mismo mástil si lo hacen al mismo tiempo. Los puntos se sumarán a todos los que lo consiguieron, sin embargo en la función !pole solo aparecerá reclamado por uno de ellos.</i>"
				.PHP_EOL.
				"▶️<i>'Reclama el mástil' es un juego exclusivo para grupos, no podrás participar desde chat privado.</i>"
				.PHP_EOL.
				"▶️<i>No hay ránking global de mástiles de Telegram, cada clasificación es exclusiva de su grupo. Si quieres competir contra otros grupos, intenta capturar la bandera en hora punta.</i>"
				.PHP_EOL.
				"▶️<i>El actual poseedor del último mástil reclamado no podrá reclamar el siguiente.</i>"
				.PHP_EOL.
				"▶️<i>Cada participante tendrá un inventario inicial para veinte mástiles, y un inventario adicional con un hueco extra por cada uno de los mástiles que haya capturado el usuario que aparece en la posición 3 de la clasificación del grupo.</i>"
				.PHP_EOL.
				"▶️<i>El uso de la función !pole es compatible con los grupos que tengan un número considerable de participantes.</i>"
				.PHP_EOL.
				"▶️<i>La función !pole estará disponible cada veinte segundos. Su uso reiterado sancionará al usuario.</i>"
				.PHP_EOL.
				"▶️<i>Si un usuario sancionado continúa tratando de reclamar un mástil con la penalización activa, su sanción aumentará.</i>"
				.PHP_EOL.
				"▶️<i>Un usuario sancionado no podrá conocer su tiempo restante de sanción, simplemente podrá volver a participar una vez la haya cumplido.</i>"
				.PHP_EOL.
				"▶️<i>Si el grupo se convierte en supergrupo, las clasificación se reiniciará. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "heroes") {
		$text = "🔎 <b>Héroes de Telegram</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!heroes</b>: <i>Muestra la clasificación de los diez mejores héroes de Telegram.</i>"
				.PHP_EOL.
				"➡️<b>!heroesgrupo</b>: <i>Muestra el TOP10 de héroes del grupo desde donde se ejecuta la función.</i>"
				.PHP_EOL.
				"➡️<b>!boton</b>: <i>Pulsa el botón mágico que decidirá el futuro de tu heroicidad.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Si pulsas el !botón y te salvas, se añadirán puntos de heroicidad a tu marcador, pero si no te salvas perderás bastantes puntos.</i>"
				.PHP_EOL.
				"▶️<i>La probabilidad de no salvarte pulsando el !botón depende progresivamente de tus puntos actuales. Por ejemplo, un jugador con 0 puntos tendrá un 100% de posibilidades de salvarse, y un jugador con 150 puntos, un 90%.</i>"
				.PHP_EOL.
				"▶️<i>Para aparecer en las tablas de clasificación bastará con haber pulsado al menos una vez el !botón.</i>"
				.PHP_EOL.
				"▶️<i>La primera vez que pulses el !botón recibirás 100 puntos iniciales extra.</i>"
				.PHP_EOL.
				"▶️<i>Puedes pulsar el !botón una vez cada quince segundos, sin límite de pulsaciones máximas.</i>"
				.PHP_EOL.
				"▶️<i>Ningún jugador tendrá puntuaciones negativas aunque reciba penalizaciones. La mínima puntuación de un jugador es 0.</i>"
				.PHP_EOL.
				"▶️<i>La tabla de !héroes mostrará solamente aquellos héroes o heroínas que tengan un minimo de 120 puntos de heroicidad.</i>"
				.PHP_EOL.
				"▶️<i>Los puntos de heroicidad también aparecerán en tu ficha de personaje !pj y te otorgarán poder adicional a la hora de luchar contra jefes o rivales en duelos PvP.</i>"
				.PHP_EOL.
				"▶️<i>Por las noches se comprobará quién ha utilizado !boton durante el día. Los héroes que no lo hayan utilizado una sola vez y tengan más de 200 puntos perderán 30 puntos.</i>"
				.PHP_EOL.
				"▶️<i>La tabla de !héroesgrupo mostrará todos aquellos usuarios que hayan pulsado el !botón al menos una vez, sin importar su puntuación o la ventana de chat desde donde lo pulsaron.</i>"
				;
	} else if($mode == "apuestas") {
		$text = "🔎 <b>Apuestas entre amigos</b> 🎲"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!apuesta</b>: <i>Realiza una apuesta en la mesa del grupo. No funciona desde chat privado. Consulta más abajo en las reglas qué apuestas están disponibles.</i>"
				.PHP_EOL.
				" <i>Ejemplo de apuesta (25 fichas al 3 rojo):</i> !apuesta (3R) 25"
				.PHP_EOL.
				" <i>Ejemplo de apuesta (40 fichas al 1 negro):</i> !apuesta (1N) 40"
				.PHP_EOL.
				"➡️<b>!ruleta</b>: <i>Gira la ruleta de la mesa de grupo en caso de que haya al menos una apuesta activa y muestra los ganadores.</i>"
				.PHP_EOL.
				"➡️<b>!fichas</b>: <i>Si se usa en grupos mostrará el ránking de usuarios con más fichas del grupo. Si se usa desde chat privado con el bot, recibirás gratis 100 fichas en cada mesa donde hayas realizado una aouesta al menos una vez, además de otras 100 fichas para utilizar en las tragaperras.</i>"
				.PHP_EOL.
				"<i>Utilizar !fichas en privado también permitirá mostrar al usuario sus fichas disponibles para cada una de las mesas donde participa, además de las fichas disponibles para la máquina tragaperras.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Podrás recibir fichas gratis cada 12 horas.</i>"
				.PHP_EOL.
				"▶️<i>La primera apuesta que realices sobre un grupo nuevo debe ser entre 1 y 100, ya que al estrenarte en una mesa nueva recibes 100 fichas de regalo.</i>"
				.PHP_EOL.
				"▶️<i>Para aparecer en el ránking de fichas de un grupo debes haber apostado al menos una vez en ese grupo.</i>"
				.PHP_EOL.
				"▶️<i>Las apuestas disponibles van del 1 al 5 en cuanto al número de la casilla y entre rojo (R) y negro (N) en cuanto al color.</i>"
				.PHP_EOL.
				"▶️<i>No podrás realizar apuestas mayores a tus fichas disponibles, el saldo de fichas nunca será negativo. Si pierdes todas tus fichas tendrás que conseguir más con la función !fichas en chat privado con el bot.</i>"
				.PHP_EOL.
				"▶️<i>No podrás realizar una segunda apuesta si ya tienes una activa para esa mesa, tendrás que esperar a que se gire la ruleta para volver a apostar.</i>"
				.PHP_EOL.
				"▶️<i>En caso de haber más de un ganador, el premio se dividirá y se repartirá la parte entera. En caso de que la parte decimal sea de la mitad o más de una unidad, se añadirá una ficha adicional para cada uno de los ganadores.</i>"
				;
	} else if($mode == "slots") {
		$text = "🔎 <b>Máquina tragaperras</b> 🎰"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!slot</b>: <i>Inserta tres fichas en la máquina y acciona la palanca para realizar una tirada. Solo disponible en chat privado con el bot.</i>"
				.PHP_EOL.
				"➡️<b>!777</b>: <i>Es una alternativa a !slot, su función será exactamente la misma.</i>"
				.PHP_EOL.
				"➡️<b>!ludopatas</b>: <i>Muestra el ránking de los diez usuarios con más fichas de tragaperras del demigrante casino Demisuke de Telegram.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>Cada tirada tendrá un precio fijo de 3 fichas. En caso de no disponer de fichas suficientes puedes conseguir más gratis utilizando la función !fichas. Consulta</i> /ayuda_apuestas <i>para saber más acerca de la función !fichas.</i>"
				.PHP_EOL.
				"▶️<i>En la máquina aparecerán tres filas y tres columnas de casillas con un resultado. La apuesta tendrá en cuenta las tres casillas de la fila central, señaladas entre flechas.</i>"
				.PHP_EOL.
				"▶️<i>Existen diez posibles resultados por cada casilla, mostrados en la tabla de premios.</i>"
				.PHP_EOL.
				"▶️<i>En caso de hacer una pareja (dos casillas iguales) en la fila central, se te devolverán las 3 fichas que usaste al realizar la tirada.</i>"
				.PHP_EOL.
				"▶️<i>Si logras detener la máquina obteniendo los mismos símbolos en las tres casillas de la fila horizontal central recibirás el premio de la tabla de premios correspondiente a ese resultado.</i>"
				.PHP_EOL.
				"▶️<i>Para conseguir los premios bonus debes haber utilizado al menos una vez la función !exp.</i>"
				.PHP_EOL.
				"▶️<i>Hacer líneas diagonales con los mismos resultados no tendrá premio, el premio se recibirá si se realiza en la fila horizontal central.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Tabla de premios:</b>"
				.PHP_EOL.
				"7⃣7⃣7⃣ <i>10.000 fichas</i>"
				.PHP_EOL.
				"💎💎💎 <i>1.000 fichas</i>"
				.PHP_EOL.
				"🍒🍒🍒 <i>500 fichas</i>"
				.PHP_EOL.
				"🍓🍓🍓 <i>250 fichas</i>"
				.PHP_EOL.
				"🍉🍉🍉 <i>100 fichas</i>"
				.PHP_EOL.
				"🍋🍋🍋 <i>100 fichas</i>"
				.PHP_EOL.
				"🔔🔔🔔 <i>75 fichas</i>"
				.PHP_EOL.
				"💖💖💖 <i>50 fichas</i>"
				.PHP_EOL.
				"💙💙💙 <i>25 fichas</i>"
				.PHP_EOL.
				"⚡️⚡️⚡️ <i>10 fichas</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Tabla de premios bonus:</b>"
				.PHP_EOL.
				"7⃣7⃣7⃣ <i>1 botella de experiencia (si el inventario no está lleno)</i>"
				.PHP_EOL.
				"💎💎💎 <i>Reinicio del contador de la función !atacar</i>"
				.PHP_EOL.
				"🍒🍒🍒 <i>Reinicio del contador de la función !atacar</i>"
				.PHP_EOL.
				"🍓🍓🍓 <i>Reinicio del contador de la función !exp</i>"
				.PHP_EOL.
				"🍉🍉🍉 <i>Reinicio del contador de la función !exp</i>"
				.PHP_EOL.
				"🍋🍋🍋 <i>Reinicio del contador de la función !exp</i>"
				;
	} else if($mode == "rocosos") {
		$text = "🔎 <b>Juego RPG: Los Rocosos de Demisuke</b> 💪"
				.PHP_EOL.PHP_EOL.
				"La vida en la Tierra parece estar siendo menos segura de lo habitual. Pero el origen del caos que se puede originar en el planeta si nadie lo impide está localizado: justo en el centro del mundo. El camino hasta allí es muy largo, y tan duro que todavía no se conoce un solo ser humano que haya llegado hasta allí y haya sobrevivido para contarlo. Si el planeta necesita volver a ser mucho más seguro, alguien debe iniciar su aventura más allá del Infierno y derrotar a los enemigos más poderosos del mundo, ¿lograrás tú devolver la paz al universo?"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!exp (o </b>/exp<b>)</b>: <i>(Solo desde chat privado) Crea tu personaje y entrénalo frecuentemente utilizando esta función.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!gastarpunto</b>: <i>(Solo desde chat privado) Utiliza los puntos adicionales que recibes al subir de nivel escribiendo !gastarpunto seguido de la estadística a mejorar, por ejemplo \"!gastarpunto DEF\".</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!pj (o </b>/pj<b>)</b>: <i>Muestra tu ficha completa de jugador.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!botella</b>: <i>Utiliza el objeto \"botella de experiencia\".</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!unirme</b>: <i>Te permite convertirte en miembro del clan de un grupo al que pertenezcas.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!clanes</b>: <i>Muestra los diez clanes con más victorias PvP en guerras entre grupos.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!clanes lista (o !declararguerra)</b>: <i>Muestra la lista de clanes a los que declararle la guerra junto a su número de identificación correspondiente.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!atacar</b>: <i>Entablas una lucha con alguno de los jefes de tu zona.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!avatarpj</b>: <i>Asigna una foto de perfil en formato JPG, PNG o GIF a tu personaje con \"!avatarpj http://enlace_a_la_imagen\".</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!declararguerra 1 (u otro número)</b>: <i>Envias una petición de guerra al clan con el número identificativo escrito.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!pvp</b>: <i>Activa o desactiva la posibilidad de participar en duelos PvP entre jugadores.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!pvp @nombredeusuario</b>: <i>Envía una solicitud de duelo PvP al usuario.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!pvp aceptar</b>: <i>Acepta la solicitud de duelo PvP más antigua pendiente.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!pvp rechazar</b>: <i>Declina la solicitud de duelo PvP más antigua pendiente.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!listapvp</b>: <i>Muestra una lista con jugadores ideales para enfrentar a tu personaje. Máximo 20 rivales.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!rocosos</b>: <i>Muestra el ránking de los 10 Rocosos con más victorias en duelos PvP de Telegram.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!rocososgrupo</b>: <i>Muestra cuántos rocosos se han unido a tu clan y un resumen de estadísticas de los diez más fuertes.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!aceptarguerra</b>: <i>Acepta la solicitud de guerra entre grupos más antigua pendiente.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!rechazarguerra</b>: <i>Desestima la solicitud de guerra entre grupos más antigua pendiente.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!avatarclan</b>: <i>Muestra el logo del clan con \"!avatarclan\" o asigna una foto de perfil estática en formato JPG o PNG al clan con \"!avatarclan http://enlace_a_la_imagen\".</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!guerras (desde chat privado)</b>: <i>Muestra el número de solicitudes entrantes y salientes de duelos PvP pendientes, además de un resumen de las cinco últimas batallas entre guerras y duelos PvP.</i>"
				.PHP_EOL.PHP_EOL.
				"➡️<b>!guerras (desde grupos)</b>: <i>Muestra el número de solicitudes entrantes y salientes de guerras entre clanes pendientes del grupo, además de un resumen de las cinco últimas batallas entre guerras y duelos PvP.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para un jugador:</b> Consulta /ayuda_1P_rocosos para ver todas las reglas."
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para duelos PvP entre jugadores:</b> Consulta /ayuda_PVP_rocosos para ver todas las reglas."
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para guerras PvP entre clanes:</b> Consulta /ayuda_guerras_rocosos para ver todas las reglas."		
				;
	} else if($mode == "1p_rocosos") {
		$text = "🔎 <b>Juego RPG: Los Rocosos de Demisuke</b> 💪"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para un jugador:</b>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes ganar experiencia cada cinco minutos realizando tareas utilizando !exp en chat privado con el bot. En caso de no haber pasado el tiempo necesario y utilizado de nuevo !exp, aparecerá el nivel de energía actual del personaje. Cuando llegue a 100% habrán pasado los cinco minutos y podrá volver a realizar tareas nuevas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Las tareas realizadas con !exp varían según el nivel del personaje y la zona donde éste se encuentra. Cuanto más subas de nivel, mejores recompensas de experiencia obtendrás.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>A partir del nivel 2 puedes añadir una foto de perfil a tu personaje con !avatarpj. Se deberá escribir el enlace completo donde se aloja la imagen (comenzando desde http:// o https://). Los formatos compatibles son .jpg, .png y .gif.</i>"
				.PHP_EOL.
				"<i>Ejemplo:</i> <pre>!avatarpj http://www.mipaginadeimagenes.com/imagen.jpg</pre>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Escribiendo \"!avatarpj borrar\" puedes eliminar tu foto de perfil.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cada estadística se puede mejorar a tu gusto un número limitado de veces con !gastarpunto. Escribiendo simplemente \"!gastarpunto\" verás los puntos que se pueden usar, los puntos ya usados y los puntos totales disponibles por cada estadística.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Para utilizar uno de tus puntos disponibles escribe la función seguido del nombre de la estadística, por ejemplo \"!gastarpunto VEL\".</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El estado del personaje tendrá influencia en las batallas contra jefes si dicho estado favorece o desfavorece alguna de las estadísticas del personaje.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El máximo de puntos que se pueden asignar por cada !gastarpunto es de 1.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los puntos adicionales son acumulables y no caducan. Puedes asignarlos cuando quieras, pero su uso es de vital importancia para poder derrotar a tus enemigos.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>La función !atacar está disponible para jugadores de nivel 5 y superior. Una vez utilizada, el siguiente jefe tardará seis horas en aparecer, salvo en las zonas de entrenamiento donde el tiempo de espera será más reducido. Si durante ese tiempo de espera se utiliza la función !atacar, aparecerá el tiempo restante para que vuelva a estar disponible.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cada vez que cambies de zona los enemigos serán más poderosos y darán más puntos de experiencia al derrotarlos.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los avatares en .GIF no aparecerán en el resultado de las batallas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cuando subas de nivel con !exp o !atacar las estadísticas de tu personaje mejorarán, y también recibirás puntos adicionales para utilizar donde quieras y ganarás como premio una nueva arma o armadura. Es posible que también llegues a una nueva zona, más difícil que la anterior pero con mejores recompensas. El nombre de la zona actual lo puedes ver en todo momento con la función !pj.</i>";
				apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "HTML", "text" => $text));

				$text = 
				"▶️<i>Cada objeto nuevo que recibas siempre será mejor que el anterior que ya tenía tu personaje, y se utilizará automáticamente. Un objeto con el nombre en cursiva es un objeto normal, un objeto con el nombre </i>regular <i>es un objeto mejorado, y un objeto con el nombre en</i> <b>negrita</b> <i>es un objeto único, más raro de conseguir y con mejor estadística.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>La función !unirme está disponible a partir del nivel 6. Se debe utilizar en el grupo al cual te quieres unir.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Consultando tu personaje con !pj, junto al nombre del clan aparecerá la calidad de éste en formato de 0 a 5 estrellas, de la misma manera que aparecen las estadísticas del personaje más abajo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>A partir del nivel 11 podrás entablar duelos PvP. Si utilizas \"!pvp\" activarás o desactivarás esta opción.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Si tienes más de 200 puntos de heroicidad ganados en el minijuego \"Héroes de Telegram\", serás más fuerte a la hora de luchar contra jefes.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El poder de los puntos de heroicidad dependerá del nivel de tu personaje. A mayor nivel, más poder obtendrás a cambio.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cuantos más miembros se unan al clan, mayor rango de estrellas aparecerá junto a su nombre.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El número máximo de botellas disponibles en tu inventario es 10, ¡utilízalas desde chat privado cuanto antes para poder recibir más!</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Se pueden usar varias botellas de manera seguida, sin embargo tu personaje perderá energía bebiendo y deberá esperar unos minutos para volver a usar !exp.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los jugadores de nivel 3 o superior pueden conseguir botellas de experiencia como premio con la función !slots (o !777).</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los jugadores de nivel 5 o superior pueden reiniciar su contados de jefes como premio con la función !slots (o !777).</i>"
				.PHP_EOL.PHP_EOL.
				"<i>El uso de aplicaciones externas o macros de escritura automática programada conllevará a la restricción temporal o permanente de acceso al RPG y tu personaje.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Consulta los premios bonus de las tragaperras con la función</i> /ayuda_slots"
				;
	} else if($mode == "pvp_rocosos") {
		$text = "🔎 <b>Juego RPG: Los Rocosos de Demisuke</b> 💪"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para duelos PvP entre jugadores:</b>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Nada más alcanzar el nivel 11 con tu personaje habilitarás automáticamente los duelos PvP. Los puedes deshabilitar con !pvp.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Solo se pueden retara duelos PvP a personas que tengan nombre de usuario. Es aconsejable utilizar la función como, por ejemplo, \"!pvp @usuario\", pero el símbolo de arroba no es necesario escribirlo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>En caso de tener varios duelos pendientes, aceptarás o rechazarás el más antiguo. Consulta tu lista de duelos pendientes desde chat privado con el bot mediante la función !guerres.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes enviar una solicitud de batalla cada cinco horas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes enviar una solicitud de batalla hacia un mismo jugador cada 24 horas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>No puedes enviarte solicitudes de duelos PvP a ti mismo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Por cada duelo que ganes se te añadirá una victoria al marcador, el cual aparece en tu ficha de personaje (!pj o </i>/pj<i>).</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>En caso de tener los duelos PvP deshabilitados, no recibirás ni podrás enviar ninguna solicitud de batalla, y tampoco verás tus victorias en la ficha de personaje.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Las derrotas de duelos PvP no se guardarán ni mostrarán en tu personaje. ¡Reta a tus amigos sin miedo!</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes retar a duelos PvP a jugadores con nivel muchísimo más alto que el tuyo siempre y cuando ambos sean mínimo de nivel 11.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Como es lógico, cuanto más fuerte seas, más fácil tendrás la victoria.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los duelos PvP se reservan un 0,01% de suerte en los combates, por lo que un jugador de nivel muy alto tendrá la victoria asegurada en un 99,99% ante jugadores de nivel bajo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Antes de aceptar o rechazar una solicitud de duelo, el rival podrá visualizar un resumen aproximado de las estadísticas del otro jugador.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Si tienes más de 200 puntos de heroicidad ganados en el minijuego \"Aprende a volar\", serás más fuerte a la hora de luchar contra un rival.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El poder de los puntos de heroicidad dependerá del nivel de tu personaje. A mayor nivel, más poder obtendrás a cambio.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El estado del personaje tendrá influencia en las batallas entre jugadores si dicho estado favorece o desfavorece alguna de las estadísticas del personaje.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Una vez termine la batalla ambos jugadores recibirán el resultado del duelo, y un resumen más escueto aparecerá en !guerras para todos los usuarios del bot.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>La zona horaria de las fechas mostradas en la función !guerras pertenecen a la hora peninsular española actual (CET o CEST).</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Si te alzas con la victoria en un duelo PvP atraes a los jefes de tu zona y estarán disponibles para luchar contra ellos aunque la última batalla sea reciente.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Si tienes habilitado los duelos PvP tu personaje podría aparecer en el ránking de !rocosos.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Un jugador podría no responder con \"!pvp aceptar\" ni \"!pvp rechazar\" a una solicitud pendiente, sin embargo éstas no caducan y siempre se podrán responder en el futuro por fecha más antigua.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Las cinco horas de espera entre duelos se cuentan desde el último duelo aceptado. Un duelo rechazado no alargará el tiempo de espera.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los duelos pendientes se pueden consultar en !guerras junto con el historial general si la función se utiliza desde chat privado con el bot.</i>"
				;
	} else if($mode == "guerras_rocosos") {
		$text = "🔎 <b>Juego RPG: Los Rocosos de Demisuke</b> 💪"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas para guerras PvP entre clanes:</b>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Para participar en ellas debes utilizar la función !unirme en tu grupo favorito una vez alcances el nivel 6.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Una vez te unas a un clan puedes cambiarte a otro clan utilizando !unirme en otro grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes cambiar de clan todas las veces que quieras, sin embargo una vez te has unido a tu primer clan, tu personaje no podrá volver a estar sin clan asignado.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Un miembro del clan puede añadir una foto de perfil al grupo con !avatarclan. Se deberá escribir el enlace completo donde se aloja la imagen (comenzando desde http:// o https://). Los formatos compatibles son .jpg y .png siempre que la imagen no sea animada.</i>"
				.PHP_EOL.
				"<i>Ejemplo:</i> <pre>!avatarclan http://www.mipaginadeimagenes.com/imagen.jpg</pre>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Escribiendo \"!avatarclan borrar\" puedes eliminar la foto almacenada del clan. En las guerras aparecerá la imagen por defecto.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>En caso de necesidad muy alta de volver a tener tu personaje desligado a ningún clan puedes contactar con la administración del bot con la función !sugerencia y explicar tu caso para reestablecer este apartado.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Solo los clanes con al menos cinco miembros entre sus filas podrán entablar guerras PvP contra otros clanes.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>La única restricción para pertenecer a un clan es alcanzar el nivel 6.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Dependiendo del número de miembros el clan tendrá un rango u otro, el cual se mostrará frecuentemente a la izquierda del nombre a modo de rango entre 0 y 5 estrellas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cuando un clan le declare la guerra a otro, el clan rival podrá ver el rango de quien envia la solicitud de guerra antes de aceptarla o rechazarla.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>No podrás entablar guerras PvP contra tu propio clan ni podrás utilizar sus funciones si no te has unido antes.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El estado de los personajes que participen en una guerra no tendrán influencia en las batallas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Cualquier miembro del clan podrá enviar una solicitud de guerra a otro clan desde el mismo chat de grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Puedes enviar solicitudes de guerra una vez cada cinco horas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>No puedes enviar dos solicitudes de guerra seguidas al mismo clan, sin embargo puedes enviar una solicitud a un clan y que éste te envíe otra al tuyo, ambas solicitudes se podrán aceptar seguidas sin problemas.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Con la función !rocososgrupo podrás ver el número de miembros que luchan por tu clan y un resumen de estadísticas de los mejores Rocosos.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Utilizando !clanes verás el ránking de los clanes con más victorias de Telegram.</i>";
				apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "HTML", "text" => $text));

				$text = 
				"▶️<i>Para declarar la guerra a un grupo utiliza primero !declararguerra (o \"!clanes lista\") y revisa qué número identificativo tiene asignado a su izquierda el clan al que quieras derrotar. Si por ejemplo aparece con el número 3, la función se utilizará como \"!declararguerra 3\".</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Todos los miembros del clan ganador sumarán una victoria en guerras a su ficha de personaje. Si el jugador se une posteriormente a otro clan, todas las victorias anteriores se mantienen.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>El número de derrotas en guerra de un clan no aparecerá en ninguna lista de clanes ni se verá reflejada en los datos de ninguno de sus participantes. ¡Lucha sin temor!</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Una vez termine la batalla ambos clanes recibirán el resultado de la guerra, y un resumen más escueto aparecerá en !guerras para todos los usuarios del bot.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los clanes que eliminen al bot del grupo no aparecerán en la lista de clanes con más victorias en guerras.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>La zona horaria de las fechas mostradas en la función !guerras pertenecen a la hora peninsular española actual (CET o CEST).</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Además de poder obtener la victoria en batalla, el jugador más rocoso del combate recibirá un punto de líder en rocosidad, visible en la ficha de personaje..</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Los jugadores que participen en una guerra y la ganen podrán volver a utilizar las funciones !exp y !atacar nada más lograr la victoria.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Un clan podría no responder con \"!aceptarguerra\" ni \"!rechazarguerra\" a una solicitud pendiente, sin embargo éstas no caducan y siempre se podrán responder en el futuro por fecha más antigua.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Las cinco horas de espera entre guerras se cuentan desde la última batalla librada. Una guerra rechazada no alargará el tiempo de espera.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Las guerras pendientes se pueden consultar en !guerras junto con el historial general si la función se utiliza en un grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"▶️<i>Si un grupo es convertido a supergrupo, todos sus miembros deberán utilizar la función !unirme para volver a formar parte del clan. Tanto las solicitudes pendientes de guerra como las victorias de guerras del clan serán reiniciadas. Los usuarios, en cambio, no perderán ninguna victoria en guerras en sus fichas de personaje.</i>"
				;
	}
	if(strlen($text) > 5){
		if($mainHelp == 0) {
			apiRequest("sendChatAction", array('chat_id' => $send_id, 'action' => "typing"));			
			usleep(100000);
		}
		apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "HTML", 'disable_web_page_preview' => true, "text" => $text));
	}
}
function processMessage($message) {
  // process incoming message
  //debugMode($message);
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  $randomTicket = lucky();
  if(isset($message['from']['username'])) {
	$logname = "@".$message['from']['username'];
  } else if (isset($message['from']['first_name'])) {
	$logname = $message['from']['first_name'];
  } else {
	$logname = "ID".$message['from']['id'];
  }
  if (isset($message['text'])) {
    $text = $message['text'];
	if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
		$usersGroupCount = apiRequest("getChatMembersCount", array('chat_id' => $chat_id));
		// Group Battle
		$time = time();
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['mode']) && $row['mode'] < 0) {
			$randomTicket = $row['mode'];
		}
		mysql_free_result($result);
		$safeGroup = rankedGroup($chat_id);
		if($safeGroup == 1) {
			$query = 'SELECT total, lastpoint FROM groupbattle WHERE group_id = '.$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['total'])) {
				if($row['total'] > 0 && $time != $row['lastpoint'] && $usersGroupCount > 3) {
					$total = $row['total'] + 1;
					mysql_free_result($result);
					$query = 'UPDATE groupbattle SET total = '.$total.', lastpoint = '.$time.' WHERE group_id = '.$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				}
			} else {
				mysql_free_result($result);
				$grouptitle = $message['chat']['title'];
				$grouptitle = str_replace("'","''",$grouptitle);
				$grouptitle = str_replace("<","",$grouptitle);
				$grouptitle = str_replace(">","",$grouptitle);
				$query = "SET NAMES utf8mb4;";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$query = "INSERT INTO `groupbattle` (`group_id`, `name`, `total`, `lastpoint`) VALUES ('".$chat_id."', '".$grouptitle."', '1', '".$time."');";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			}
			mysql_free_result($result);
		}
		// User Battle
		$user_id = $message['from']['id'];
		$query = 'SELECT ub_id, lastpoint, total FROM userbattle WHERE group_id = '.$chat_id.' AND user_id = '.$user_id;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['ub_id'])) {
			$isCommand = containsCommand($message['text']);
			if(($time - 5 ) > $row['lastpoint'] && $isCommand == 0 && $usersGroupCount > 3) {
				$ub_id = $row['ub_id'];
				$total = $row['total'] + 1;
				mysql_free_result($result);
				$query = 'SELECT MAX(lastpoint) AS lastpoint FROM userbattle WHERE user_id = '.$user_id.' GROUP BY user_id';
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if(($time - 5 ) > $row['lastpoint']) {
					mysql_free_result($result);
					$grouptitle = str_replace("'","''",$message['chat']['title']);
					$username = "";
					$firstname = "";
					if(isset($message['from']['username'])) {
						$username = str_replace("'","''",$message['from']['username']);
					} 
					if (isset($message['from']['first_name'])) {
						$firstname = str_replace("'","''",$message['from']['first_name']);
					}
					if(strlen($username) == 0 && strlen($firstname) == 0) {
						$firstname = "Desconocido";
					}
					$query = "SET NAMES utf8mb4;";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$query = "UPDATE userbattle SET group_name = '".$grouptitle."', first_name = '".$firstname."', user_name = '".$username."', total = ".$total.", lastpoint = ".$time." WHERE group_id = ".$chat_id." AND user_id = ".$user_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				}
			}
		} else {
			mysql_free_result($result);
			$grouptitle = str_replace("'","''",$message['chat']['title']);
			$username = "";
			$firstname = "";
			if(isset($message['from']['username'])) {
				$username = str_replace("'","''",$message['from']['username']);
			} 
			if (isset($message['from']['first_name'])) {
				$firstname = str_replace("'","''",$message['from']['first_name']);
			}
			if(strlen($username) == 0 && strlen($firstname) == 0) {
				$firstname = "Desconocido";
			}
			$query = 'SELECT visible FROM userbattle WHERE user_id = '.$user_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['visible'])) {
				$visibleValue = $row['visible'];
			} else {
				$visibleValue = 0;
			}
			mysql_free_result($result);
			$query = "SET NAMES utf8mb4;";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$query = "INSERT INTO `userbattle` (`user_id`, `group_id`, `group_name`, `first_name`, `user_name`, `total`, `lastpoint`, `visible`) VALUES ('".$user_id."', '".$chat_id."', '".$grouptitle."', '".$firstname."', '".$username."', '1', '".$time."', ".$visibleValue.");";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		}
		mysql_free_result($result);
		mysql_close($link);
	} else {
		error_log($logname."'s private incoming message (".$chat_id."): ".$message['text']);
		$time = time();
		$link = dbConnect();
		$user_id = $message['from']['id'];
		$query = 'SELECT ub_id FROM userbattle WHERE user_id = '.$user_id;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(!isset($row['ub_id'])) {
			$username = "";
			$firstname = "";
			if(isset($message['from']['username'])) {
				$username = str_replace("'","''",$message['from']['username']);
			} 
			if (isset($message['from']['first_name'])) {
				$firstname = str_replace("'","''",$message['from']['first_name']);
			}
			if(strlen($username) == 0 && strlen($firstname) == 0) {
				$firstname = "Desconocido";
			}
			error_log($logname." is a new user.");
			mysql_free_result($result);
			$query = "SET NAMES utf8mb4;";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$query = "INSERT INTO `userbattle` (`user_id`, `group_id`, `group_name`, `first_name`, `user_name`, `total`, `lastpoint`, `visible`) VALUES ('".$user_id."', '0', 'Privado', '".$firstname."', '".$username."', '0', '".$time."', FALSE);";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		}
		mysql_free_result($result);
		mysql_close($link);
		if($message['from']['id'] == '6250647') {
			if(strpos($text, "/updateinfo") === 0) {
				error_log($logname." triggered: /updateinfo.");
				$link = dbConnect();
				$query = 'SELECT time FROM commonsetup WHERE cs_id = 001';
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$lastTimeCheck = $row['time'];
				mysql_free_result($result);
				$deadTime = time();
				$lastTimeCheck = $lastTimeCheck + 3600;
				if($lastTimeCheck < $deadTime) {
					$mess = "*Actualizando lista. Espera, por favor...*";
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $mess));
					mysql_free_result($result);
					$query = "UPDATE `commonsetup` SET `time` = '".$deadTime."' WHERE `cs_id` = 001";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					mysql_free_result($result);
					$query = "SELECT COUNT( * ) AS  'total_active' FROM ( SELECT DISTINCT gb_id FROM groupbattle WHERE lastpoint >0 )dt";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					$oldTotalActive = $row['total_active'];
					mysql_free_result($result);
					//$query = 'SELECT group_id, name, lastpoint FROM `groupbattle`';
					$query = 'SELECT group_id, name, lastpoint FROM `groupbattle` WHERE lastpoint >0';
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$total = 0;
					$totalActive = 0;
					$updateQuery = "UPDATE groupbattle SET lastpoint = 0 WHERE group_id IN (";
					$deadTime = time();
					$deadTime = $deadTime - 1296000;
					while($row = mysql_fetch_array($result)) {
						sleep(1);
						$counter = apiRequest("getChatMembersCount", array('chat_id' => $row['group_id']));
						$total = $total + 1;
						if($counter > 0 || $row['group_id'] == -1001056538642 || $row['group_id'] == -123031629) {
							if($deadTime > $row['lastpoint']) {
								error_log($row['name']." has ".$counter." member/s but it's inactive.");
								$updateQuery = $updateQuery." ".$row['group_id'].",";
							} else {
								$totalActive = $totalActive + 1;
								error_log($row['name']." has ".$counter." member/s.");
							}
						} else {
							error_log($row['name']." is dead.");
							$updateQuery = $updateQuery." ".$row['group_id'].",";
						}
					}
					$updateQuery = rtrim($updateQuery, ",");
					$updateQuery = $updateQuery.")";
					mysql_free_result($result);
					$result = mysql_query($updateQuery) or die(error_log('SQL ERROR: ' . mysql_error()));
					mysql_free_result($result);
					$query = "SELECT COUNT( * ) AS  'total_active' FROM ( SELECT DISTINCT gb_id FROM groupbattle WHERE lastpoint >0 )dt";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					$totalActive = $row['total_active'];
					mysql_free_result($result);
					mysql_close($link);
					$result = "*Se ha actualizado la lista. Los grupos activos pasan a ser ".$totalActive." de los ".$oldTotalActive." que habían antes.*";
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
					exit;
				} else {
					error_log("Too many update info requests.");
					mysql_close($link);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Los datos continuan siendo actualizados o se ha iniciado la última actualización hace menos de una hora.*"));
					exit;
				}
			} else if(strpos($text, "/checkflags") === 0) {
				error_log($logname." triggered: /checkflags.");
				$link = dbConnect();
				$query = "SELECT group_name, user_name, date, newtotal FROM flagwinnerlog ORDER BY epoch_time DESC LIMIT 0, 5";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				while($row = mysql_fetch_array($result)) {
					$translatedDate = translateDate($row['date']);
					$translatedDate = str_replace(":00)", ")", $translatedDate);
					$text = "<b>Autor:</b> ".$row['user_name'].PHP_EOL.PHP_EOL.
							"<b>Lugar:</b> ".$row['group_name'].PHP_EOL.PHP_EOL.
							"<b>Fecha:</b> ".$translatedDate.PHP_EOL.PHP_EOL.
							"<b>Nuevo total:</b> ".$row['newtotal'];
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
					sleep(1);
				}
				mysql_free_result($result);
				mysql_close($link);
				exit;
			}
		}
	}
    if (strpos($text, "/start") === 0) {
	  error_log($logname." triggered: /start.");
	  apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => "Buenas, te doy la bienvenida a @DemisukeBot.".PHP_EOL."Usa el comando /demisuke para saber qué hace este bot."));
    } else if (strpos($text, "/demisuke") === 0 || strpos($text, "/demisuke@DemisukeBot") === 0 || strpos(strtolower($text), "!ayuda") !== false) {
		error_log($logname." triggered: !ayuda.");
		commandsList($chat_id, "main");
    } else if (strpos($text, "/ayuda_modo") === 0 || strpos($text, "/ayuda_modo@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_inline") === 0 || strpos($text, "/ayuda_inline@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_moneda") === 0 || strpos($text, "/ayuda_moneda@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_bienvenida") === 0 || strpos($text, "/ayuda_bienvenida@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_texto") === 0 || strpos($text, "/ayuda_texto@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_info") === 0 || strpos($text, "/ayuda_info@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_cita") === 0 || strpos($text, "/ayuda_cita@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_camisetas") === 0 || strpos($text, "/ayuda_camisetas@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_mensajes") === 0 || strpos($text, "/ayuda_mensajes@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_grupos") === 0 || strpos($text, "/ayuda_grupos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_bandera") === 0 || strpos($text, "/ayuda_bandera@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_mastil") === 0 || strpos($text, "/ayuda_mastil@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_heroes") === 0 || strpos($text, "/ayuda_heroes@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_slots") === 0 || strpos($text, "/ayuda_slots@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_rocosos") === 0 || strpos($text, "/ayuda_rocosos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_1P_rocosos") === 0 || strpos($text, "/ayuda_1P_rocosos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_PVP_rocosos") === 0 || strpos($text, "/ayuda_PVP_rocosos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_guerras_rocosos") === 0 || strpos($text, "/ayuda_guerras_rocosos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_apuestas") === 0 || strpos($text, "/ayuda_apuestas@DemisukeBot") === 0) {
		error_log($logname." triggered: ".$text.".");
		commandsList($chat_id, $text);
    } else if (strpos($text, "/sendNotification") === 0) {
		error_log($logname." triggered: New Notification.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647 && strlen($text) > 18) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$link = dbConnect();
			$query = 'SELECT time FROM commonsetup WHERE cs_id = 003';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$lastTimeCheck = $row['time'];
			mysql_free_result($result);
			$deadTime = time();
			$lastTimeCheck = $lastTimeCheck + 3600;
			if($lastTimeCheck < $deadTime) {
				$query = "UPDATE `commonsetup` SET `time` = '".$deadTime."' WHERE `cs_id` = 003";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				$query = "SELECT DISTINCT group_id, name FROM groupbattle WHERE lastpoint > 0 AND mode > -4";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$totalGroups = 0;
				$notificationMessage = substr($text,18);
				while($row = mysql_fetch_array($result)) {
					error_log("Trying to reach ".$row['name']);
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $row['group_id'], 'parse_mode' => "Markdown", "text" => $notificationMessage));
					$totalGroups = $totalGroups + 1;
				}
				mysql_free_result($result);
				mysql_close($link);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado una notificación a ".$totalGroups." grupos.*"));
			} else {
				error_log("Too many notification requests.");
				mysql_close($link);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Las notificaciones continuan siendo enviadas o se ha lanzado la última hace menos de una hora.*"));
				exit;
			}
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
	} else if (strpos($text, "/sendGamerNot") === 0) {
		error_log($logname." triggered: New Gamer Notification.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647 && strlen($text) > 18) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$link = dbConnect();
			$query = 'SELECT time FROM commonsetup WHERE cs_id = 004';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$lastTimeCheck = $row['time'];
			mysql_free_result($result);
			$deadTime = time();
			$lastTimeCheck = $lastTimeCheck + 3600;
			if($lastTimeCheck < $deadTime) {
				$query = "UPDATE `commonsetup` SET `time` = '".$deadTime."' WHERE `cs_id` = 004";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				$query = "SELECT pb.user_id, ub.first_name FROM playerbattle pb, userbattle ub WHERE ub.user_id = pb.user_id AND pb.user_id > 10 GROUP BY pb.user_id";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$totalPlayers = 0;
				$notificationMessage = substr($text,18);
				while($row = mysql_fetch_array($result)) {
					error_log("Trying to reach ".$row['first_name']);
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $row['user_id'], 'parse_mode' => "Markdown", "text" => $notificationMessage));
					$totalPlayers = $totalPlayers + 1;
				}
				mysql_free_result($result);
				mysql_close($link);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado una notificación a ".$totalPlayers." jugadores.*"));
			} else {
				error_log("Too many gamer notification requests.");
				mysql_close($link);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Las notificaciones continúan siendo enviadas o se ha lanzado la última hace menos de una hora.*"));
				exit;
			}
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
	} else if (strpos($text, "/sendSpecialNot") === 0) {
		error_log($logname." triggered: /sendSpecialNot.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$destiny_id = substr($message['text'], strpos($message['text'],"(") + 1, strpos($message['text'],")") - strpos($message['text'],"(") - 1);
			$textToSend = substr($message['text'], strpos($message['text'],")") + 2);
			if($destiny_id == "") {
				$destiny_id = 6250647;
			} else if($destiny_id == "canal") {
				$destiny_id = "@CanalKamisuke";
			}
			apiRequest("sendMessage", array('chat_id' => $destiny_id, 'parse_mode' => "Markdown", "text" => $textToSend));
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado el mensaje al destinatario.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
	} else if (strtolower($text) === "hola" || strtolower($text) === "buenas" || strtolower($text) === "ey" || strtolower($text) === "ola") {
		if($randomTicket > -1) {
			error_log($logname." triggered: Hola.");
			$greeting = greeting();
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(2);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$greeting."*"));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Hola.");
		}
    } else if (strtolower($text) === "adios" || strtolower($text) === "adiós" || strtolower($text) === "chao" || strtolower($text) === "adeu" || strtolower($text) === "buenas noches" || strtolower($text) === "bona nit" || strtolower($text) === "hasta luego" || strtolower($text) === "me piro") {
		if($randomTicket > -1) {
			error_log($logname." triggered: Adios.");
			$message = goodbye();
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$message."*"));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Adios.");
		}
    } else if (strpos(strtolower($text), "!dados") !== false) {
		error_log($logname." triggered: !dados.");
		rollDice($chat_id);
    } else if (isset($message['forward_from']['username'])){
		if($message['forward_from']['username'] == 'DemisukeBot' || $message['forward_from']['username'] == 'Demitest_bot') {
			if($randomTicket > -1) {
				if (isset($message['from']['first_name'])) {
					$name = $message['from']['first_name'];
				} else if (isset($message['from']['username'])) {
					$name = $message['from']['username'];
				} else {
					$name = "compi";
				}
				error_log($logname." triggered: Forwarding (RT) bot.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Buena esa, ".$name.".* 😎"));	
			} else {
				error_log($logname." tried to trigger and failed due to group restrictions: Forwarding (RT) bot.");
			}
		}
	} else if (isset($message['reply_to_message']['from']['username'])){
		if($message['reply_to_message']['from']['username'] == 'DemisukeBot' || $message['reply_to_message']['from']['username'] == 'Demitest_bot') {
			if($randomTicket > -1) {
				error_log($logname." triggered: Reply to bot.");
				$dummy = " ";
				$insult = insult($dummy);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*No sé qué has dicho, pero ".$insult.".*"));			
			} else {
				error_log($logname." tried to trigger and failed due to group restrictions: Reply to bot.");
			}
		}
	} else if (strpos(strtolower($text), "!insulta a") !== false) {
		error_log($logname." triggered: !insulta.");
		if(probability(80) && strpos(strtolower($text), "kamisuke") === false && strpos(strtolower($text), "demigranciasbot") === false && strpos(strtolower($text), "demisuke") === false && strpos(strtolower($text), "osvaldopaniccia") === false && strpos(strtolower($text), "ekd") === false) {
			$insult = insult($text);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(500000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>".$insult.".</b>"));
		} else {
			$willBeTest = rand(1,10);
			if($willBeTest < 9) {
				$insult = failInsult();
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(500000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "reply_to_message_id" => $message_id, "text" => "<b>".$insult.".</b>"));
			}
			else {
				$gif = "BQADBAADow4AAksYZAcZ8kFXOQJ3uAI";
				apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
			}
		}
	} else if (strpos(strtolower($text), "!invoca") !== false) {
		error_log($logname." triggered: !invocar.");
		$sentence = randomSentence(true);
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$sentence."!*"));
    } else if (strpos(strtolower($text), "!acho") !== false || strpos(strtolower($text), "!enjuto") !== false) {
		error_log($logname." triggered: !enjuto.");
		$sentence = getEnjuto();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$sentence.".*"));
    } else if (strpos(strtolower($text), "!siono") !== false && strlen($text) > 8) {
		error_log($logname." triggered: !siono.");
		$respuesta = yesNoQuestion();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$respuesta.".*"));
	} else if (strpos(strtolower($text), "!quien") !== false || strpos(strtolower($text), "!quién") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			if(strlen($text) > 8) {
				error_log($logname." triggered: !quien.");
				guessWho($chat_id, $message_id);
			} else {
				error_log($logname." tried to trigger and failed: !quien.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido la pregunta, cuéntame más.*"));
			}
		} else {
			error_log($logname." tried to trigger and failed: !quien.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Esta función solo está disponible para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!ping") !== false) {
		error_log($logname." triggered: !ping.");
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*¡Pong!*"));
	} else if (strpos(strtolower($text), "!apuesta") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			if(strlen($text) > 14) {
				error_log($logname." triggered: !apuesta.");
				$user_id = $message['from']['id'];
				$errorFound = 0;
				$betResult = substr($text, strpos($text,"(") + 1, 2);
				$betNumber =(int)$betResult[0];
				$betColor = strtoupper($betResult[1]);
				$betTokens = substr($text, strpos($text,")") + 1);
				$betTokens = rtrim(ltrim($betTokens));
				if(!is_numeric($betNumber)) {
					$errorFound = 1;
				} else if($betNumber < 1) {
					$errorFound = 1;
				} else if($betNumber > 5) {
					$errorFound = 1;
				} else if($betColor != "R" && $betColor != "N" ) {
					$errorFound = 1;
				} else if(!is_numeric($betTokens)) {
					$errorFound = 1;
				} else if($betTokens < 1) {
					$errorFound = 1;
				}
				if($errorFound > 0) {
					error_log($logname." wrote wrong bet.");
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>No he entendido la apuesta, consulta</b> /ayuda_apuestas <b>para saber cómo apostar correctamente.</b>"));
					exit;
				}
				$link = dbConnect();
				$query = "SELECT tokens FROM userbet WHERE user_id = '".$user_id."' AND group_id = '".$chat_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if(isset($row['tokens'])) {
					$tokens = $row['tokens'];
					mysql_free_result($result);
					$query = "SELECT bet_tokens, bet_result FROM drawerbet WHERE user_id = '".$user_id."' AND group_id = '".$chat_id."'";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					if(isset($row['bet_tokens'])) {
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						$text = "*Ya tienes una apuesta sobre la mesa de ";
						$text = $text.$row['bet_tokens'];
						if($row['bet_tokens'] > 1) {
							$text = $text." fichas al ";
						} else {
							$text = $text." ficha al ";
						}
						$text = $text.$row['bet_result'][0]." ";
						if($row['bet_result'][1] == 'R') {
							$text = $text."rojo.*";
						} else {
							$text = $text."negro.*";
						}
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
					} else {
						mysql_free_result($result);
						if($betTokens > $tokens) {
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$text = "*Tienes ";
							if($tokens > 1) {
								$text = $text.$tokens." fichas ";
							} else {
								$text = $text.$tokens." ficha ";
							}
							$text = $text."en esta mesa, no puedes hacer esa apuesta. Haz una apuesta más pequeña o utiliza !fichas en chat privado con el bot para obtener más fichas.*";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
						} else {
							// si tiene pasta, realizar la apuesta y avisar de lo que tenia en total y lo que ha apostado
							mysql_free_result($result);
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$finalBet = $betNumber.$betColor;
							$query = "INSERT INTO `drawerbet` (`user_id`, `group_id`, `bet_tokens`, `bet_result`) VALUES ('".$user_id."', '".$chat_id."', '".$betTokens."', '".$finalBet."');";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							$query = 'UPDATE userbet SET tokens = tokens - '.$betTokens.' WHERE user_id = '.$user_id.' AND group_id = '.$chat_id;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$text = "*Fichas disponibles antes de apostar:* ".$tokens.PHP_EOL;
							$text = $text."*Apuesta realizada:* ".$betNumber;
							if($betColor == "R") {
								$text = $text." rojo".PHP_EOL;
							} else {
								$text = $text." negro".PHP_EOL;
							}
							$text = $text."*Fichas apostadas:* ".$betTokens.PHP_EOL.PHP_EOL;
							$text = $text."_Cuando se hayan realizado todas las apuestas deseadas utiliza !ruleta para hacer girar la ruleta._";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
						}							
					}
				} else {
					if($betTokens < 101) {
						mysql_free_result($result);
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$finalBet = $betNumber.$betColor;
						$query = "INSERT INTO `drawerbet` (`user_id`, `group_id`, `bet_tokens`, `bet_result`) VALUES ('".$user_id."', '".$chat_id."', '".$betTokens."', '".$finalBet."');";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						$leftTokens = 100 - $betTokens;
						$query = "INSERT INTO `userbet` (`user_id`, `group_id`, `tokens`) VALUES ('".$user_id."', '".$chat_id."', '".$leftTokens."');";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$text = "*Fichas disponibles antes de apostar:* 100".PHP_EOL;
						$text = $text."*Apuesta realizada:* ".$betNumber;
						if($betColor == "R") {
							$text = $text." rojo".PHP_EOL;
						} else {
							$text = $text." negro".PHP_EOL;
						}
						$text = $text."*Fichas apostadas:* ".$betTokens.PHP_EOL.PHP_EOL;
						$text = $text."_Cuando se hayan realizado todas las apuestas deseadas utiliza !ruleta para hacer girar la ruleta._";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
					} else {
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$text = "*En esta mesa solo dispones de 100 fichas, realiza una apuesta menor.*";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
					}
				}
				mysql_free_result($result);
				mysql_close($link);
			} else {
				error_log($logname." tried to trigger and failed: !apuesta.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>No he entendido la apuesta, consulta</b> /ayuda_apuestas <b>para saber cómo apostar correctamente.</b>"));
			}
		} else {
			error_log($logname." tried to trigger and failed: !apuesta.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Esta función solo está disponible para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!ruleta") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered: !ruleta.");
			// comprobar si existe alguna apuesta en la tabla de jugadas
			$link = dbConnect();
			$query = "SELECT bet_tokens FROM drawerbet WHERE group_id = '".$chat_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['bet_tokens'])) {
				// si hay una apuesta, girar la ruleta y avisar con un mensaje
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				$logname = str_replace("@", "", $logname);
				$text = "<b>¡".$logname." ha girado la ruleta!</b>".PHP_EOL."El resultado aparecerá en cuanto la ruleta se detenga, suerte a todos los participantes.";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
				$rouletteResult = rand(1,10);
				switch($rouletteResult){
					case 1: $rouletteResult = "1N";
							break;
					case 2: $rouletteResult = "2N";
							break;
					case 3: $rouletteResult = "3N";
							break;
					case 4: $rouletteResult = "4N";
							break;
					case 5: $rouletteResult = "5N";
							break;
					case 6: $rouletteResult = "1R";
							break;
					case 7: $rouletteResult = "2R";
							break;
					case 8: $rouletteResult = "3R";
							break;
					case 9: $rouletteResult = "4R";
							break;
					case 10: $rouletteResult = "5R";
							break;
					default: $rouletteResult = "1N";
							break;
				}
				mysql_free_result($result);
				$query = "SELECT COUNT( * ) AS  'winners' FROM ( SELECT bet_tokens FROM drawerbet WHERE group_id = ".$chat_id." AND bet_result = '".$rouletteResult."' )dt";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if($rouletteResult[1] == "R") {
					$colorResult = "rojo";
				} else {
					$colorResult = "negro";
				}
				$text = "<b>¡El resultado es el ".$rouletteResult[0]." ".$colorResult."!</b>".PHP_EOL.PHP_EOL;
				sleep(1);
				if(isset($row['winners']) || $row['winners'] > 0) {
					// si hay ganadores, mostrar la lista de ganadores, lo que van a ganar y repartir el premio
					$winners = $row['winners'];
					mysql_free_result($result);
					$query = "SELECT SUM( bet_tokens ) AS  'total' FROM  drawerbet WHERE group_id = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					$totalTokens = $row['total'];
					if($winners > 1){
						// si hay mas de uno, division para recalcular el total apostado ganador
						$totalTokens = $totalTokens / $winners;
						(int)$totalTokens = round($totalTokens);
					}
					// query de suma a los ganadores
					mysql_free_result($result);
					$query = "UPDATE `userbet` SET `tokens` = `tokens` + ".$totalTokens." WHERE `group_id` = ".$chat_id." AND `user_id` IN ( SELECT user_id FROM drawerbet WHERE group_id = ".$chat_id." AND bet_result = '".$rouletteResult."')";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$text = $text."<b>Apuestas ganadoras:</b> ".$winners.PHP_EOL;
					if($winners > 0) {
						$text = $text."<b>Fichas a repartir por ganador:</b> ".$totalTokens;
					} else {
						$text = $text."La banca gana y se queda con las fichas apostadas.";
					}
				} else {
					// si no hay ganadores, motrar mensaje del resultado y que gana la banca
					$text = $text."Gana la banca, ¡mejor suerte la próxima vez!";
				}
				mysql_free_result($result);
					// borrar todas las jugadas de la mesa de grupo	
				$query = "DELETE FROM drawerbet WHERE group_id = ".$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			} else {
				// si no hay apuesta mostrar mensaje de que no hay apuestas, que alguien use !apuesta primero
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>No hay ninguna apuesta activa sobre la mesa, la ruleta se podrá girar cuando un usuario realice una !apuesta válida.</b>"));
			}
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." tried to trigger and failed: !ruleta.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Esta función solo está disponible para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!fichas") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !fichas.");
			// mostrar el top10 de fichas del grupo como en cualquier otro minijuego, funcion estandar y listo. (que tenga el separador de miles)
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			$result = getGroupTokens($message['from']['id'], $chat_id, $message['chat']['title']);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			error_log($logname." triggered in private: !fichas.");
			$link = dbConnect();
			// comprobar si el usuario existe en al menos una mesa de grupo
			$query = "SELECT last_recharge FROM userbet WHERE user_id = ".$chat_id." ORDER BY last_recharge DESC LIMIT 1";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['last_recharge'])){
				$checkTime = time();
				$checkTime = $checkTime - (3600 * 12);
				// si existe, comprobar con el tiempo mas nuevo si han pasado 12h
				if($checkTime > $row['last_recharge']) {
					// si han pasado 12h, añadirle +100 a cada celda y mostrar el nuevo bolsillo de esa mesa
					mysql_free_result($result);
					$currTime = time();
					$query = 'UPDATE userbet SET tokens = tokens + 100, last_recharge = '.$currTime.' WHERE user_id = '.$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$text = "<b>Se han añadido 100 fichas a tus mesas de apuestas y para gastar en la máquina tragaperras.</b>".PHP_EOL;
				} else {
					// si no han pasado 12h, mostrar cuanto dinero tiene en cada mesa y avisar de que podra añadir fondos cuando pasen 12h de su ultimo ingreso
					$text = "<b>Debes esperar al menos doce horas para recargar tus fichas.</b>".PHP_EOL;
				}
				// hacer la lista de fichas por grupo y slots
				mysql_free_result($result);
				$query = "SELECT tokens FROM userbet WHERE user_id = ".$chat_id." AND group_id = 0";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if(isset($row['tokens'])){
					$text = $text."Fichas para usar en las tragaperras: ".$row['tokens'].PHP_EOL;
				}
				mysql_free_result($result);
				$query = "SELECT groupbattle.name, userbet.tokens FROM userbet, groupbattle WHERE groupbattle.group_id = userbet.group_id AND user_id = ".$chat_id." GROUP BY userbet.group_id";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				while($row = mysql_fetch_array($result)) {
					$text = $text.PHP_EOL."Fichas para la mesa \"".$row['name']."\": ".$row['tokens'];
				}
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			} else {
				// si no existe, avisar de que empiece apostando algo en alguna mesa
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				$result = "<b>Para recargar tus fichas debes jugar al menos una vez a las tragaperras con !slot (o !777) o realizar una !apuesta válida en un grupo.</b>";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
			}
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!slot") !== false || strpos(strtolower($text), "!777") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !slot.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			$result = "<b>La máquina tragaperras solo está disponible desde chat privado con</b> @DemisukeBot<b>.</b>";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			error_log($logname." triggered in private: !slot.");
			// revisar si ya ha jugado, que estara en la userbet con groupi 0
			$link = dbConnect();
			$query = "SELECT tokens, last_slot FROM userbet WHERE user_id = ".$chat_id." AND group_id = 0";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['tokens'])){
				$checkTime = time();
				$checkTime = $checkTime - 4;
				// si existe, revisar el tiempo para saber si hace mas de 4seg que ha jugado
				if($checkTime > $row['last_slot']){
					// si si, comprobar si le queda pasta
					if($row['tokens'] > 2) {
						// si tiene, lanzar los slots, calcular si hay premio, restarle uno a su tokenbolsillo y sumarle el premio, actualizar el last_slot y decirle cuanto tiene
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						$text = "<b>Has insertado una moneda en la máquina y has usado la palanca. El resultado es...</b>";
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(500000);
						$userTokens = $row['tokens'] - 3;
						$currTime = time();
						mysql_free_result($result);
						// calcular resultado
						$slotA = rand(1,10);
						usleep(rand(10,50));
						$slotB = rand(1,10);
						usleep(rand(10,50));
						$slotC = rand(1,10);
						$bonus = 0;
						if($slotA == $slotB && $slotB == $slotC) {
							$bonus = 0;
						} else {
							if($slotA == $slotB) {
								$bonus = 1;
							} else if($slotA == $slotB) {
								$bonus = 1;
							} else if($slotB == $slotC) {
								$bonus = 1;
							} else {
								$bonus = 0;
							}
						}
						if($bonus == 1) {
							$bonusTicket = rand(1, 20);
							if($bonusTicket == 20) {
								$slotA = 4;
								$slotB = 4;
								$slotC = 4;
							} else if($bonusTicket > 17) {
								$slotA = 3;
								$slotB = 3;
								$slotC = 3;
							} else if($bonusTicket > 14) {
								$slotA = 2;
								$slotB = 2;
								$slotC = 2;
							} else if($bonusTicket > 10) {
								$slotA = 1;
								$slotB = 1;
								$slotC = 1;
							}
						}
						if($slotA == $slotB && $slotB == $slotC && $row['tokens'] > 99999) {
							$slotA = 7;
							$slotB = 7;
							$slotC = 7;
						}
						$text = "⬛️⬛️⬛️⬛️⬛️".PHP_EOL;
						$text = $text."⬛️".emojiSlot($slotA - 1).emojiSlot($slotB - 1).emojiSlot($slotC - 1)."⬛️".PHP_EOL;
						$text = $text."▶️".emojiSlot($slotA).emojiSlot($slotB).emojiSlot($slotC)."◀️".PHP_EOL;
						$text = $text."⬛️".emojiSlot($slotA + 1).emojiSlot($slotB + 1).emojiSlot($slotC + 1)."⬛️".PHP_EOL;
						$text = $text."⬛️⬛️⬛️⬛️🔲📍".PHP_EOL.PHP_EOL;
						// calcular el premio
						if($slotA == $slotB && $slotB == $slotC) {
							error_log($logname." got a prize! Prize number ".$slotA);
							$text = $text."❗️🎉 ¡Enhorabuena! Has ganado ";
							switch($slotA){
								case 1: $prize = 10;
										break;
								case 2: $prize = 25;
										break;
								case 3: $prize = 50;
										break;
								case 4: $prize = 75;
										break;
								case 5: $prize = 100;
										break;
								case 6: $prize = 100;
										break;
								case 7: $prize = 250;
										break;
								case 8: $prize = 500;
										break;
								case 9: $prize = 1000;
										break;
								case 10: $prize = 10000;
										break;
								default: $prize = 0;
										break;
							}
							$text = $text.$prize." fichas.".PHP_EOL;
							if($slotA > 4) {
								$query = 'SELECT level, bottles, last_exp, last_boss FROM playerbattle WHERE user_id = '.$chat_id;
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								$row = mysql_fetch_array($result);
								if(isset($row['level'])) {
									$level = $row['level'];
									$bottles = $row['bottles'];
									$lastExp = $row['last_exp'];
									$lastBoss = $row['last_boss'];
									mysql_free_result($result);
									if($level < 100) {
										if($slotA < 8) {
											$lastExp = $lastExp - 3600;
											if($lastExp < 0) {
												$lastExp = 0;
											}
											$query = "UPDATE `playerbattle` SET `last_exp` = '".$lastExp."' WHERE `user_id` = '".$chat_id."'";
											$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
											$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función /exp.".PHP_EOL;
										} else if($slotA < 10) {
											if($level > 4) {
												$lastBoss = $lastBoss - (3600 * 24);
												if($lastBoss < 0) {
													$lastBoss = 0;
												}
												$query = "UPDATE `playerbattle` SET `last_boss` = '".$lastBoss."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función !atacar.".PHP_EOL;

											} else {
												$lastExp = $lastExp - 3600;
												if($lastExp < 0) {
													$lastExp = 0;
												}
												$query = "UPDATE `playerbattle` SET `last_exp` = '".$lastExp."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función /exp.".PHP_EOL;
											}
										} else {
											//botella o boss o exp
											if($level > 2 && $bottles == 10) {
												$text = $text."🎰 ¡Tienes el inventario de botellas lleno!".PHP_EOL;
												$lastBoss = $lastBoss - (3600 * 24);
												if($lastBoss < 0) {
													$lastBoss = 0;
												}
												$query = "UPDATE `playerbattle` SET `last_boss` = '".$lastBoss."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función !atacar.".PHP_EOL;
											} else if($level > 2 && $bottles < 10) {
												$bottles = $bottles + 1;
												$query = "UPDATE `playerbattle` SET `bottles` = '".$bottles."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: ¡Has ganado una botella de experiencia! Puedes utilizarla con la función !botella.".PHP_EOL;
											} else if($level > 4) {
												$lastBoss = $lastBoss - (3600 * 24);
												if($lastBoss < 0) {
													$lastBoss = 0;
												}
												$query = "UPDATE `playerbattle` SET `last_boss` = '".$lastBoss."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función !atacar.".PHP_EOL;
											} else {
												$lastExp = $lastExp - 3600;
												if($lastExp < 0) {
													$lastExp = 0;
												}
												$query = "UPDATE `playerbattle` SET `last_exp` = '".$lastExp."' WHERE `user_id` = '".$chat_id."'";
												$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
												$text = $text."🎰 Bonus adicional: se ha reiniciado el tiempo de espera de la función /exp.".PHP_EOL;
											}
										}
										mysql_free_result($result);
									}
								}								
							}
						} else if($slotA == $slotB || $slotB == $slotC || $slotA == $slotC) {
							$prize = 3;
							$text = $text."💪 ¡Pareja! Se te devuelven las fichas usadas.".PHP_EOL;
						} else {
							$prize = 0;
						}
						$userTokens = $userTokens + $prize;
						$text = $text."<b>Fichas que te quedan:</b> ".$userTokens;
						$query = "UPDATE `userbet` SET `tokens` = '".$userTokens."', `last_slot` = '".$currTime."' WHERE `user_id` = ".$chat_id." AND group_id = 0";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
					} else {
						// si no avisar de que no tiene pasta, que use el !fichas para recargarse de dinero
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						$text = "*No tienes fichas suficientes para jugar, utiliza la función !fichas para obtener fichas gratis.*";
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
					}
				} else {
					// si no, avisar de ludopatia
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(100000);
					$text = "*Solo puedes tirar de la palanca una vez cada cinco segundos.*";
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
				}
			} else {
				// si no existe, avisar con una bienvenida de que ahora tiene 100 fichas y que se va a usar la primera de ellas para jugar
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				$text = "<b>¡Bienvenido/a al demigrante casino Demisuke de Telegram!.</b>".PHP_EOL.PHP_EOL;
				$text = $text."Como es la primera vez que juegas, te regalo 100 fichas para que puedas hacer tus primeras tiradas.".PHP_EOL;
				$text = $text."Recuerda que puedes conseguir más fichas usando la función !fichas y consultar los premios y las reglas con /ayuda_slots.".PHP_EOL;
				$text = $text.PHP_EOL."<b>Realizando tu primera tirada... ¡Suerte!</b>";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				mysql_free_result($result);
				usleep(500000);
				// hacer la tirada y hacer el insert completito, grupi 0, que no se olvide...
				$userTokens = 97;
				$currTime = time();
				$slotA = rand(1,10);
				usleep(rand(10,50));
				$slotB = rand(1,10);
				usleep(rand(10,50));
				$slotC = rand(1,10);
				$text = "⬛️⬛️⬛️⬛️⬛️".PHP_EOL."⬛️";
				$emojiA = emojiSlot($slotA);
				$emojiB = emojiSlot($slotB);
				$emojiC = emojiSlot($slotC);
				$text = $text.$emojiA.$emojiB.$emojiC;
				$text = $text."⬛️".PHP_EOL."⬛️⬛️⬛️⬛️🔲📍".PHP_EOL.PHP_EOL;
				// calcular el premio
				if($slotA == $slotB && $slotB == $slotC) {
					error_log($logname." got a prize! Prize number ".$slotA);
					$text = $text."❗️🎉 ¡Enhorabuena! Has ganado ";
					switch($slotA){
						case 1: $prize = 10;
								break;
						case 2: $prize = 25;
								break;
						case 3: $prize = 50;
								break;
						case 4: $prize = 75;
								break;
						case 5: $prize = 100;
								break;
						case 6: $prize = 100;
								break;
						case 7: $prize = 250;
								break;
						case 8: $prize = 500;
								break;
						case 9: $prize = 1000;
								break;
						case 10: $prize = 10000;
								break;
						default: $prize = 0;
								break;
					}
					$text = $text.$prize." fichas.".PHP_EOL;
				} else if($slotA == $slotB || $slotB == $slotC || $slotA == $slotC) {
					$prize = 3;
					$text = $text."💪 ¡Pareja! Se te devuelven las fichas usadas.".PHP_EOL;
				} else {
					$prize = 0;
				}
				$userTokens = $userTokens + $prize;
				$text = $text."<b>Fichas que te quedan:</b> ".$userTokens;
				$query = "INSERT INTO `userbet` (`user_id`, `group_id`, `tokens`, `last_slot`) VALUES ('".$chat_id."', '0', '".$userTokens."', '".$currTime."');";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!exp") !== false || strpos($text, "/exp") === 0 || strpos($text, "/exp@DemisukeBot") === 0) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !exp.");
			// iniciar db y mirar si tiene pj
			$link = dbConnect();
			$randomizer = rand(0, 100000);
			$randMultiplier = rand(1, 3);
			$randomizer = $randomizer * $randMultiplier;
			usleep($randomizer);
			$query = "SELECT last_exp_check FROM playerbattle WHERE user_id = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['last_exp_check'])){
				$currTime = time();
				$checkDouble = $currTime - 4;
				//error_log("CURRTIME".$currTime." - TIME ".$checkDouble." - LAST EXP ".$row['last_exp']);
				if($checkDouble > $row['last_exp_check']) {
					//$lastExpCheck = $row['last_exp'];
					mysql_free_result($result);
					$query = "UPDATE `playerbattle` SET `last_exp_check` = '".$currTime."' WHERE `user_id` = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					mysql_free_result($result);
					$query = "SELECT last_exp, level, exp_points, critic, bottles, ( extra_hp + extra_attack + extra_defense + extra_critic + extra_speed ) AS 'total_extra' FROM playerbattle WHERE user_id = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// si tiene pj mirar si han pasado 5min
					if(($currTime - 299) > $row['last_exp']) {
						// si si han pasado, mirar el nivel 
							// segun el nivel, dar una experiencia u otra, con una funcion que muestre un texto al chat id enviado y devuelva la exp random final
							$expAcquired = getPlayerExp($row['level'], $chat_id);
							$newExp = $row['exp_points'] + $expAcquired;
							$newLevel = getLevelFromExp($newExp);
							$critic = $row['critic'];
							$bottles = $row['bottles'];
							$totalExtraPoints = $row['total_extra'];
							mysql_free_result($result);	
							//error_log("COMPROBAR ".$expAcquired." ".$newExp." ".$newLevel." ".$row['exp_points']." ".$row['level']);
							// comprobar si con la nueva exp sube de nivel
							if($newLevel != $row['level']){
								error_log($logname." is now level ".$newLevel.".");
								levelUp($newLevel, $newExp, $critic, $bottles, $totalExtraPoints, $link, $chat_id);
								//si sube de nivel, avisar con un mensaje, buscar la nueva ropa, darle los nuevos puntos (el critico max 40), la exp max 8m, los de gastar punto y actualizar la base de datos (al 10 avisar de que se cambia la exp ganada)
									// si en este nuevo nivel desbloquea alguna funcion nueva, enviar mensaje
									// mostrar los nuevos stats con una funcion, que tenga monospace (un !pj mini quizas)
							} else {
								// sumar exp y last exp
								$query = "UPDATE `playerbattle` SET `exp_points` = '".$newExp."', `last_exp` = '".$currTime."' WHERE `user_id` = '".$chat_id."'";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							}
							// mostrar mensaje del nivel, la exp total, una barra y la exp necesaria para subir de nivel
							mysql_free_result($result);
							$user_id = $message['from']['id'];
							getPlayerInfo(0, $link, $chat_id, $user_id);
					} else {
						// si no han pasado, avisar de que no corra, que se espere 5min
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$currTime = $currTime - $row['last_exp'];
						if($currTime > 239) {
							$energy = 80;
						} else if ($currTime > 179) {
							$energy = 60;
						} else if ($currTime > 119) {
							$energy = 40;
						} else if ($currTime > 59) {
							$energy = 20;
						} else {
							$energy = 5;
						}
						$text = "*Tu rocoso personaje se encuentra descansando de su última tarea, espera a que recupere toda su energía, que todavía está al ".$energy."%.*";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
					}
				} else {
					error_log($logname." triggered !exp in double check and failed.");
				}
			} else {
				error_log($logname." is a new player!");
				// si no tiene, dar mensaje de bienvenida, explicar un poco las normas y eso y que se divierta
				// crear un nuevo pj con 0 de experiencia y todo de base
				mysql_free_result($result);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$query = "INSERT INTO `playerbattle` (`user_id`) VALUES ('".$chat_id."');";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$text = "<b>¡Bienvenido/a a 'Los Rocosos de Demisuke'!</b>".PHP_EOL.PHP_EOL;
				$text = $text."<i>Como es la primera vez que juegas, se te ha creado tu nuevo personaje con el que defenderás al mundo del mal aumentando tu rocosidad a lo largo de tu aventura.</i>".PHP_EOL;
				$text = $text."<i>Todavía no tienes experiencia en el juego, así que te he enviado al campo de entrenamiento de rocosos, el área donde es más fácil subir de nivel, y desde aquí deberás viajar al centro de la Tierra para librarla de sus seres malignos. ¡Seguro que por el camino te toparás con ellos!</i>".PHP_EOL;
				$text = $text.PHP_EOL."<i>A partir de ahora ya puedes volver a utilizar /exp (o !exp)  para utilizar tu personaje en distintas tareas en las que ganar experiencia. Cuanto más utilices la función !exp, más experiencia conseguirás, ¡e incluso podrás subir de nivel! Puedes ver las estadísticas de tu personaje con la función !pj.</i>".PHP_EOL;
				$text = $text."<i>Al subir de nivel desbloquearás nuevas opciones para tu personaje y podrás mejorar sus estadisticas, ¡y cuando seas fuerte podrás luchar contra temidos jefes y formar clanes con tus amigos para luchar contra otros rocosos!</i>".PHP_EOL;
				$text = $text.PHP_EOL."Siempre que necesites ayuda puedes consultar /ayuda_rocosos o el menú de !ayuda. ¡Suerte en tu aventura, que te diviertas!".PHP_EOL;
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}
			// cerrar la db
			mysql_free_result($result);
			mysql_close($link);
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*Esta función solo está disponible desde chat privado con el bot.*"));
		}
	} else if (strpos(strtolower($text), "!gastarpunto") !== false) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !gastarpunto.");
			// abrir db y mirar si tiene pj
			$link = dbConnect();
			$query = "SELECT extra_points, extra_hp, extra_attack, extra_defense, extra_critic, extra_speed FROM playerbattle WHERE user_id = '".$chat_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['extra_points'])) {
				// si tiene pj, revisar si lo que hay despues de gastar punto es un stat valido
				$start = strpos(strtolower($text), "!gastarpunto") + 12;
				$checkStat = substr($text, $start);
				$checkStat = ltrim(rtrim($checkStat));
				if(strtolower($checkStat) == "vid" || strtolower($checkStat) == "ata" || strtolower($checkStat) == "def" || strtolower($checkStat) == "cri" || strtolower($checkStat) == "crí" || strtolower($checkStat) == "crÍ" || strtolower($checkStat) == "vel") {
					// si es valido,  mirar si tiene puntos por gastar
					if($row['extra_points'] > 0) {
						// si tiene puntos, revisar si le queda hueco donde indica
						$available = 0;
						$improveType = "extra_hp";
						if(strtolower($checkStat) == "vid") {
							if($row['extra_hp'] < 330) {
								$available = 1;								
							}
						} else if(strtolower($checkStat) == "ata") {
							if($row['extra_attack'] < 300) {
								$available = 1;	
								$improveType = "extra_attack";							
							}
						}  else if(strtolower($checkStat) == "def") {
							if($row['extra_defense'] < 300) {
								$available = 1;		
								$improveType = "extra_defense";						
							}
						}  else if(strtolower($checkStat) == "cri" || strtolower($checkStat) == "crí" || strtolower($checkStat) == "crÍ") {
							if($row['extra_critic'] < 20) {
								$available = 1;		
								$improveType = "extra_critic";						
							}
						}  else if(strtolower($checkStat) == "vel") {
							if($row['extra_speed'] < 300) {
								$available = 1;	
								$improveType = "extra_speed";							
							}
						} 
						if($available == 1) {							
							// si le queda, añadirlo donde dice (update db), mostrar los huecos que le quedan y decirle que usar la funcion !pj si quiere
							$newPoints = $row['extra_points'] - 1;
							$newHP = $row['extra_hp'];
							$newAt = $row['extra_attack'];
							$newDef = $row['extra_defense'];
							$newCrit = $row['extra_critic'];
							$newSp = $row['extra_speed'];
							$newStat = str_replace("extra_", "", $improveType);
							switch($improveType) {
								case "extra_hp": $newHP = $newHP + 1;
										break;
								case "extra_attack": $newAt = $newAt + 1;
										break;
								case "extra_defense": $newDef = $newDef + 1;
										break;
								case "extra_critic": $newCrit = $newCrit + 1;
										break;
								case "extra_speed": $newSp = $newSp + 1;
										break;
							}
							mysql_free_result($result);
							$query = 'UPDATE playerbattle SET extra_points = extra_points - 1, '.$improveType.' = '.$improveType.' + 1, '.$newStat.' = '.$newStat.' + 1 WHERE user_id = '.$chat_id;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));							
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$msg = "<b>¡Has aumentado la rocosidad de tu personaje! Las estadísticas se han actualizado.</b> ".PHP_EOL.PHP_EOL;
							$msg = $msg."<b>Puntos disponibles para utilizar:</b> ".$newPoints.PHP_EOL;
							$msg = $msg."<b>Lista de puntos utilizados y totales:</b>".PHP_EOL;
							$msg = $msg."<pre>VID: ";
							if($newHP < 100) {
								$msg = $msg." ";
							}
							if($newHP < 10) {
								$msg = $msg." ";
							}
							$msg = $msg.$newHP." / 330</pre>".PHP_EOL;
							$msg = $msg."<pre>ATA: ";
							if($newAt < 100) {
								$msg = $msg." ";
							}
							if($newAt < 10) {
								$msg = $msg." ";
							}
							$msg = $msg.$newAt." / 300</pre>".PHP_EOL;
							$msg = $msg."<pre>DEF: ";
							if($newDef < 100) {
								$msg = $msg." ";
							}
							if($newDef < 10) {
								$msg = $msg." ";
							}
							$msg = $msg.$newDef." / 300</pre>".PHP_EOL;
							$msg = $msg."<pre>CRÍ: ";
							if($newCrit < 100) {
								$msg = $msg." ";
							}
							if($newCrit < 10) {
								$msg = $msg." ";
							}
							$msg = $msg.$newCrit." / 20</pre>".PHP_EOL;
							$msg = $msg."<pre>VEL: ";
							if($newSp < 100) {
								$msg = $msg." ";
							}
							if($newSp < 10) {
								$msg = $msg." ";
							}
							$msg = $msg.$newSp." / 300</pre>";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
						} else {
							 // si no le queda, avisarle de que ahi no le quedan mas huecos, que escoja otro stat, y enseñarle los huecos
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$msg = "*No puedes mejorar esta estadística porque ya está al máximo, elige otra para mejorar a tu personaje. Consulta tus puntos disponibles y utilizados escribiendo simplemente !gastarpunto.*";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
						}
					} else {
						// si no le quedan puntos, mostrar aviso
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$msg = "*No puedes mejorar esta estadística porque no te quedan puntos por utilizar. Puedes conseguir más puntos utilizando !exp o !atacar y subiendo de nivel. Consulta tus puntos disponibles y utilizados escribiendo simplemente !gastarpunto.*";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
					}
				} else {
					// si no, avisar de que use bien eso, que mire la ayuda_rocosos si no se entera	y enseñarle los puntos	
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$msg = "<b>Puntos disponibles para utilizar:</b> ".$row['extra_points'].PHP_EOL;
					$msg = $msg."<b>Lista de puntos utilizados y totales:</b>".PHP_EOL;
					$msg = $msg."<pre>VID: ";
					if($row['extra_hp'] < 100) {
						$msg = $msg." ";
					}
					if($row['extra_hp'] < 10) {
						$msg = $msg." ";
					}
					$msg = $msg.$row['extra_hp']." / 330</pre>".PHP_EOL;
					$msg = $msg."<pre>ATA: ";
					if($row['extra_attack'] < 100) {
						$msg = $msg." ";
					}
					if($row['extra_attack'] < 10) {
						$msg = $msg." ";
					}
					$msg = $msg.$row['extra_attack']." / 300</pre>".PHP_EOL;
					$msg = $msg."<pre>DEF: ";
					if($row['extra_defense'] < 100) {
						$msg = $msg." ";
					}
					if($row['extra_defense'] < 10) {
						$msg = $msg." ";
					}
					$msg = $msg.$row['extra_defense']." / 300</pre>".PHP_EOL;
					$msg = $msg."<pre>CRÍ: ";
					if($row['extra_critic'] < 100) {
						$msg = $msg." ";
					}
					if($row['extra_critic'] < 10) {
						$msg = $msg." ";
					}
					$msg = $msg.$row['extra_critic']." / 20</pre>".PHP_EOL;
					$msg = $msg."<pre>VEL: ";
					if($row['extra_speed'] < 100) {
						$msg = $msg." ";
					}
					if($row['extra_speed'] < 10) {
						$msg = $msg." ";
					}
					$msg = $msg.$row['extra_speed']." / 300</pre>".PHP_EOL.PHP_EOL;
					$msg = $msg."<i>Utiliza !gastarpunto seguido del nombre de la estadística que quieras mejorar para utilizar uno de tus puntos, por ejemplo \"!gastarpunto VID\" o \"!gastarpunto CRI\". También puedes consultar</i> /ayuda_rocosos <i>para obtener ayuda acerca del juego.</i>".PHP_EOL.PHP_EOL;
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
				}
			} else {					
				// si no tiene pj decirle que primero use !exp y suba un nivel al menos...
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "*Todavía no has creado a tu propio personaje. Utiliza frecuente la función !exp para crear un personaje y entrenarlo, subirás de nivel y conseguirás puntos que utilizar con la función !gastarpunto.*";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			}
			// cerrar la db
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!pj") !== false || strpos($text, "/pj") === 0 || strpos($text, "/pj@DemisukeBot") === 0) {
		error_log($logname." triggered: !pj.");
		// usar la funcion !pj maxi, en el !exp se usaba la mini
		$link = dbConnect();
		$user_id = $message['from']['id'];
		getPlayerInfo(1, $link, $chat_id, $user_id);
	} else if (strpos(strtolower($text), "!guerras") !== false) {		
		$link = dbConnect();
		$msg = "";
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !guerras.");
			// calcular batallas pendientes del clan
			$checkGroup = $chat_id;
			$query = 'SELECT COUNT( * ) as "result" FROM groupbattlelog WHERE status = "REQUESTED" AND away_group = '.$chat_id.' GROUP BY away_group';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['result'])) {
				$res = $row['result'];
			} else {
				$res = "Ninguna";
			}
			$msg = $msg."<b>Peticiones de guerra pendientes de responder:</b> ".$res.PHP_EOL;
			mysql_free_result($result);
			$query = 'SELECT COUNT( * ) as "result" FROM groupbattlelog WHERE status = "REQUESTED" AND home_group = '.$chat_id.' GROUP BY home_group';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['result'])) {
				$res = $row['result'];
			} else {
				$res = "Ninguna";
			}
			$msg = $msg."<b>Guerras declaradas pendientes de respuesta del rival:</b> ".$res.PHP_EOL.PHP_EOL;
		} else {
			error_log($logname." triggered in private: !guerras.");
			// calcular batallas pendientes del jugador
			$checkGroup = 0;
			$query = 'SELECT COUNT( * ) as "result" FROM playerbattlelog WHERE status = "REQUESTED" AND rival = '.$chat_id.' GROUP BY rival';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['result'])) {
				$res = $row['result'];
			} else {
				$res = "Ninguna";
			}
			$msg = $msg."<b>Peticiones de duelo PvP pendientes de responder:</b> ".$res.PHP_EOL;
			mysql_free_result($result);
			$query = 'SELECT COUNT( * ) as "result" FROM playerbattlelog WHERE status = "REQUESTED" AND player = '.$chat_id.' GROUP BY player';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['result'])) {
				$res = $row['result'];
			} else {
				$res = "Ninguno";
			}
			$msg = $msg."<b>Duelos PvP pendientes de respuesta del rival:</b> ".$res.PHP_EOL.PHP_EOL;
		}
		$user_id = $message['from']['id'];
		mysql_free_result($result);
		$query = "SELECT lastwarcheck FROM userbattle WHERE user_id = ".$user_id." ORDER BY lastwarcheck DESC LIMIT 0, 1";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$currTime = time();
		$checkTime = $currTime - 60;
		$showLog = 0;
		if($checkTime > $row['lastwarcheck']) {
			$showLog = 1;
		} 
		if($showLog == 1) {
			usleep(100000);
			$tempMsg = "<b>Cargando las últimas batallas libradas en Telegram. Espera, por favor...</b>";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $tempMsg));
			mysql_free_result($result);
			$query = "UPDATE userbattle SET lastwarcheck = '".$currTime."' WHERE group_id = ".$checkGroup." AND user_id = ".$user_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			mysql_free_result($result);
			$msg = $msg."⚔ <b>Registro de las cinco últimas batallas entre clanes libradas en Telegram:</b>".PHP_EOL.PHP_EOL;
			$query = 'SELECT a.gbr_id, GROUP_CONCAT( b.name ) home_group, GROUP_CONCAT( c.name ) away_group, GROUP_CONCAT( d.name ) winner_group, a.date, a.mvp FROM groupbattleresults a LEFT JOIN groupbattle b ON FIND_IN_SET( b.group_id, a.home_group ) LEFT JOIN groupbattle c ON FIND_IN_SET( c.group_id, a.away_group ) LEFT JOIN groupbattle d ON FIND_IN_SET( d.group_id, a.winner_group ) GROUP BY a.gbr_id ORDER BY a.gbr_id DESC LIMIT 0, 5';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			for($i=0;$i<5;$i++) {
				$row = mysql_fetch_array($result);
				if(isset($row['gbr_id'])) {
					switch($i) {
						case 0: $msg = $msg."1⃣ ";
								break;
						case 1: $msg = $msg."2⃣ ";
								break;
						case 2: $msg = $msg."3⃣ ";
								break;
						case 3: $msg = $msg."4⃣ ";
								break;
						case 4: $msg = $msg."5⃣ ";
								break;
						default: break;
					}
					$msg = $msg.$row['home_group']." 🆚 ".$row['away_group'].PHP_EOL;
					$msg = $msg."<b>Fecha:</b> ".$row['date'].PHP_EOL;
					$msg = $msg."<b>Resultado:</b>".PHP_EOL."<i>".getRandomResultSentence().$row['winner_group'].".</i>".PHP_EOL;
					$msg = $msg."<b>Líder en rocosidad:</b>".PHP_EOL."<i>".$row['mvp'].".</i>".PHP_EOL.PHP_EOL;
				} else if($i==0) {
					$msg = $msg."<i>Ninguna.</i>".PHP_EOL.PHP_EOL;
				}
			}
			mysql_free_result($result);
			$msg = $msg."⚔ <b>Registro de los cinco últimos duelos PvP entre Rocosos de Demisuke:</b>".PHP_EOL.PHP_EOL;
			$query = 'SELECT a.pbr_id, GROUP_CONCAT( DISTINCT b.first_name ) player_name, GROUP_CONCAT( DISTINCT b.user_name ) player_user, GROUP_CONCAT( DISTINCT c.first_name ) rival_name, GROUP_CONCAT( DISTINCT c.user_name ) rival_user, GROUP_CONCAT( DISTINCT d.first_name ) winner_name, GROUP_CONCAT( DISTINCT d.user_name ) winner_user, a.date FROM playerbattleresults a LEFT JOIN userbattle b ON FIND_IN_SET( b.user_id, a.player ) LEFT JOIN userbattle c ON FIND_IN_SET( c.user_id, a.rival ) LEFT JOIN userbattle d ON FIND_IN_SET( d.user_id, a.winner ) GROUP BY a.pbr_id ORDER BY a.pbr_id DESC LIMIT 0 , 5';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			for($i=0;$i<5;$i++) {
				$row = mysql_fetch_array($result);
				if(isset($row['pbr_id'])) {
					switch($i) {
						case 0: $msg = $msg."1⃣ ";
								break;
						case 1: $msg = $msg."2⃣ ";
								break;
						case 2: $msg = $msg."3⃣ ";
								break;
						case 3: $msg = $msg."4⃣ ";
								break;
						case 4: $msg = $msg."5⃣ ";
								break;
						default: break;
					}
					$playerName = getFullName($row['player_name'], $row['player_user']);
					$rivalName = getFullName($row['rival_name'], $row['rival_user']);
					$winnerName = getFullName($row['winner_name'], $row['winner_user']);
					$msg = $msg.$playerName." 🆚 ".$rivalName.PHP_EOL;
					$msg = $msg."<b>Fecha:</b> ".$row['date'].PHP_EOL;
					$msg = $msg."<b>Resultado:</b>".PHP_EOL."<i>".getRandomResultSentence().$winnerName.".</i>".PHP_EOL.PHP_EOL;
				} else if($i==0) {
					$msg = $msg."<i>Ninguno.</i>".PHP_EOL.PHP_EOL;
				}
			}
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
		} else {
			$msg = $msg."<i>El registro de batallas está disponible una vez por minuto, podrás consultarlo de nuevo en unos segundos.</i>".PHP_EOL;
		}
		mysql_free_result($result);
		mysql_close($link);
		if($showLog == 1) {
			$msg = $msg."<i>La zona horaria utilizada en las fechas mostradas es la hora peninsular española actual.</i>".PHP_EOL;
		}
		$msg = $msg."<i>¡Participa tú en la próxima batalla con !pvp o !declararguerra!</i>";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if (strpos(strtolower($text), "!unirme") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !unirme.");
			// abrir db
			$link = dbConnect();
			$user_id = $message['from']['id'];
			$query = "SELECT level FROM playerbattle WHERE user_id = '".$user_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// mirar si quien lo usa tiene pj y de nivel correcto
			if(isset($row['level']) && $row['level'] > 5) {
				// si tiene pj, mirar si el clan existe en la base de datos de groupbattle
				mysql_free_result($result);
				$query = "SELECT gb_id FROM groupbattle WHERE group_id = '".$chat_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if(isset($row['gb_id'])) {
					// si existe, unirte (sin siquiera mirar si ya se esta en otro, sobreescritura a saco)
					mysql_free_result($result);
					$query = 'UPDATE playerbattle SET group_id = '.$chat_id.' WHERE user_id = '.$user_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$msg = "*¡Te acabas de unir al clan del grupo! A partir de ahora participarás en las batallas PvP que libre este grupo, ¡suerte!*";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
				} else {
					// si no, decir que el grupo es nuevo y tal, que el bot no lo conoce, que cuando se hable mas por el grupo se podra
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$msg = "*Este grupo no está disponible para la batalla. Inténtalo de nuevo tras haber escrito otros mensajes en este grupo.*";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
				}
			} else {
				// si no tiene pj dejarlo en ridiculo en el grupo xD, no tiene un pj con minimo de nivel
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "*Para poder luchar en nombre de este grupo primero debes tener tu propio personaje a nivel 6 o superior. Utiliza las funciones !exp y !atacar en chat privado con el bot para aumentar la rocosidad de tu personaje.*";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			}
			// cerrar db
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." triggered in private and failed: !unirme.");
			// mensaje de que esto es para grupos, retarded
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			$msg = "*La función !unirme es exclusiva para grupos. Recuerda utilizar en este mismo chat las funciones !exp y !atacar para entrenar a tu personaje. Si has alcanzado el nivel 6 utiliza !unirme en un grupo y te unirás al clan del grupo.*";
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
		}
	} else if (strpos(strtolower($text), "!clanes") !== false) {
		$start = strpos(strtolower($text), "!clanes") + 7;
		$checkList = substr($text, $start);
		$checkList = ltrim(rtrim($checkList));
		$checkList = strtolower($checkList);
		if($checkList == "lista") {
			error_log($logname." triggered: !clanes lista.");
			getClanList($chat_id);
		} else {
			if($message['chat']['type'] == "private") {
				error_log($logname." triggered in private: !clanes.");
				getClanRank($chat_id);
			} else {
				error_log($logname." triggered: !clanes.");
				$grouptitle = $message['chat']['title'];
				$grouptitle = str_replace("<","",$grouptitle);
				$grouptitle = str_replace(">","",$grouptitle);
				getClanRank($chat_id, $grouptitle, 1);
			}
		}
	} else if (strpos($text, "/getMyPower") === 0) {
		if($message['from']['id'] == '6250647') {
			error_log($logname." triggered: /getMyPower.");
			$link = dbConnect();
			$query = "SELECT level, extra_points, (hp + attack + defense + (critic * 3) + speed + (helmet * 3) + body + boots + weapon + shield) AS total_power FROM playerbattle WHERE user_id = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$level = $row['level'];
			$totalPower = $row['total_power'];
			$extraPower = $row['extra_points'];
			mysql_free_result($result);
			$query = "UPDATE `playerbattle` SET `last_exp` = '288', `last_boss` = '288' WHERE `user_id` = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			mysql_free_result($result);
			mysql_close($link);
			$msg = "*Nivel:* ".$level.PHP_EOL;
			$msg = $msg."*Poder total:* ".$totalPower.PHP_EOL;
			$msg = $msg."*Puntos sin utilizar:* ".$extraPower.PHP_EOL;
			$msg = $msg.PHP_EOL."_Se han reiniciado los tiempos de espera de !exp y !atacar._";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
		}
	} else if (strpos(strtolower($text), "!atacar") !== false) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !atacar.");
			// abrir db
			$link = dbConnect();
			$randomizer = rand(0, 100000);
			$randMultiplier = rand(1, 3);
			$randomizer = $randomizer * $randMultiplier;
			usleep($randomizer);
			$query = "SELECT last_boss_check FROM playerbattle WHERE user_id = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// mirar si tiene pj
			if(isset($row['last_boss_check'])) {
				$currTime = time();
				$checkDouble = $currTime - 4;
				// mirar si no es spam
				if($checkDouble > $row['last_boss_check']) {
					//$lastBossCheck = $row['last_boss'];
					mysql_free_result($result);
					$query = "UPDATE `playerbattle` SET `last_boss_check` = '".$currTime."' WHERE `user_id` = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					mysql_free_result($result);
					$query = "SELECT pb.exp_points, pb.critic, pb.level, pb.last_boss, ( pb.hp + pb.attack + pb.defense + ( pb.critic *3 ) + pb.speed + ( pb.helmet *3 ) + pb.body + pb.boots + pb.weapon + pb.shield ) AS total_power, pb.bottles, ( extra_hp + extra_attack + extra_defense + extra_critic + extra_speed ) AS total_extra, COALESCE( hb.total, 0 ) AS  'hero_power', pb.avatar, ( pb.hp + pb.body ) AS  'total_hp', ( pb.attack + pb.weapon ) AS  'total_attack', ( pb.defense + pb.shield ) AS  'total_defense', ( pb.critic + pb.helmet ) AS  'total_critic', ( pb.speed + pb.boots ) AS  'total_speed' FROM playerbattle pb LEFT JOIN ( SELECT total, user_id FROM heroesbattle )hb ON pb.user_id = hb.user_id WHERE pb.user_id = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// si tiene pj, mirar si cumple el nivel
					if($row['level'] > 4) {
						if($row['level'] < 100) {
							$spawnTime = time();
							if($row['level'] == 5) {
								$spawnTime = $spawnTime - (3600 * 1);
							} else if($row['level'] < 11) {
								$spawnTime = $spawnTime - (3600 * 2);
							} else {
								$spawnTime = $spawnTime - (3600 * 6);
							}
							if($spawnTime >= $row['last_boss']) {
							// si cumple el nivel, mirar si hace mucho que ya se cargo al ultimo
								// si hace mucho, atacar al boss que le toque, mirar por nivel cual le toca sacar de la db
									// librar batalla y mostrar los datos del boss y que ocurre en ella
										// si gana la batalla, avisar de que ha ganado, y darle la exp
											// hacer aqui todo el rollaco de !exp...
										// si no gana, avisar de mala suerte
								$level = $row['level'];
								$totalPower = $row['total_power'];
								$expPoints = $row['exp_points'];
								$critic = $row['critic'];
								$bottles = $row['bottles'];
								$heroPower = $row['hero_power'];
								$heroPower = getHeroPower($level, $heroPower);
								$totalPower = $totalPower + $heroPower;
								$playerAvatar = $row['avatar'];
								$totalHP = $row['total_hp'];
								$totalAt = $row['total_attack'];
								$totalDef = $row['total_defense'];
								$totalCrit = $row['total_critic'];
								$totalSp = $row['total_speed'];
								$totalExtraPoints = $row['total_extra'];
								mysql_free_result($result);							
								$playerName = getFullName($message['from']['first_name'], $message['from']['username']);
								$bossExp = bossBattle($chat_id, $link, $level, $totalPower, $playerName, $playerAvatar, $totalHP, $totalAt, $totalDef, $totalCrit, $totalSp);
								$currTime = time();
								if($bossExp > 0) {
									$expPoints = $expPoints + $bossExp;
									$newLevel = getLevelFromExp($expPoints);								
									if($newLevel != $level){
										error_log($logname." is now level ".$newLevel.".");
										levelUp($newLevel, $expPoints, $critic, $bottles, $totalExtraPoints, $link, $chat_id, 1);
										//si sube de nivel, avisar con un mensaje, buscar la nueva ropa, darle los nuevos puntos (el critico max 40), la exp max 8m, los de gastar punto y actualizar la base de datos (al 10 avisar de que se cambia la exp ganada)
											// si en este nuevo nivel desbloquea alguna funcion nueva, enviar mensaje
											// mostrar los nuevos stats con una funcion, que tenga monospace (un !pj mini quizas)
									} else {
										// sumar exp y last exp
										$query = "UPDATE `playerbattle` SET `exp_points` = '".$expPoints."', `last_boss` = '".$currTime."' WHERE `user_id` = '".$chat_id."'";
										$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
									}
								} else {
									$query = 'UPDATE playerbattle SET last_boss = '.$currTime.' WHERE user_id = '.$chat_id;
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								}
								mysql_free_result($result);	
								$user_id = $message['from']['id'];
								getPlayerInfo(0, $link, $chat_id, $user_id);
							} else {
								// si hace poco, avisar de que se espere un rato
								apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
								$text = "<b>No hay ningún jefe a la vista, tendrás que esperar un poco más para librar una nueva batalla.</b>".PHP_EOL;
								$hours = date(g, ($row['last_boss'] - $spawnTime));
								$hours = (int)$hours - 1;
								(string)$minutes = date(i, ($row['last_boss'] - $spawnTime));
								if($minutes[0] == "0") {
									$minutes = $minutes[1];
								}
								(string)$seconds = date(s, ($row['last_boss'] - $spawnTime));
								if($seconds[0] == "0") {
									$seconds = $seconds[1];
								}
								$text = $text."<b>Tiempo restante:</b> ";
								if((int)$hours > 0) {
									$text = $text.$hours." hora";
									if((int)$hours > 1) {
										$text = $text."s";
									}
									$text = $text.", ";
								}
								if((int)$minutes > 0) {
									$text = $text.$minutes." minuto";
									if((int)$minutes > 1) {
										$text = $text."s";
									}
									$text = $text.", ";
								}
								$text = $text.$seconds." segundo";
								if((int)$seconds > 1) {
									$text = $text."s.";
								} else {
									$text = $text.".";
								}
								usleep(100000);
								apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
							}
						} else {
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$text = "<b>Como líder de rocosidad te has encargado de aniquilar el mal de la Tierra, ahora no quedan enemigos que vencer y descansas en paz.</b>";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
						}
					} else {
						// si no cumple el nivel, avisar de que suba un poco mas
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$text = "<b>Esta función todavía no está desbloqueada para tu personaje debido a su escaso poder, ¡entrena un poco más para estar a la altura!</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
					}
				} else {
					error_log($logname." triggered !atacar in double check and failed.");
				}
			} else {
				// si no tiene pj, decir que use !exp
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$text = "<b>No se encuentra ningún personaje con el que atacar, utiliza la función !exp para entrenar a tu propio personaje.</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}
			// cerrar db
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!avatarpj") !== false) {
		error_log($logname." triggered: !avatarpj.");
		// revisar si es una url correcta (250 caracateres, http:// o https:/ y .jpg, .png o .gif)
		$start = strpos(strtolower($text), "!avatarpj") + 9;
		$avatarURL = substr($text, $start);
		$avatarURL = ltrim(rtrim($avatarURL));
		if(strlen($avatarURL) < 251) {
			$headerCheck = substr($avatarURL, 0, 7);
			$headerCheck = strtolower($headerCheck);
			$footerCheck = substr($avatarURL, strlen($avatarURL) - 4);
			$footerCheck = strtolower($footerCheck);
			$doubleCheck = 0;
			$eraseMode = 0;
			if($headerCheck == "http://" || $headerCheck == "https:/") {
				$doubleCheck = $doubleCheck + 1;
			}
			if($footerCheck == ".jpg" || $footerCheck == ".png" || $footerCheck == ".gif") {
				$doubleCheck = $doubleCheck + 1;
			}
			if(strtolower($avatarURL) == "borrar") {
				$doubleCheck = 2;
				$eraseMode = 1;
			}
			// si es correcta, abrir db y añadirla al avatar en caso de que sea lv2 (sobreescribiendo a saco)
			if($doubleCheck == 2) {
				$user_id = $message['from']['id'];
				$link = dbConnect();
				$query = "SELECT level FROM playerbattle WHERE user_id = '".$user_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				// si no es lv2 avisar tambien...
				if(isset($row['level']) && $row['level'] > 1) {
					// mostrar mensaje de que se ha guardado, que aparecera cada vez que use !pj
					mysql_free_result($result);
					if($eraseMode == 0) {
						$query = "UPDATE playerbattle SET avatar = '".$avatarURL."' WHERE user_id = ".$user_id;
					} else {
						$query = "UPDATE playerbattle SET avatar = NULL WHERE user_id = ".$user_id;
					}
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$text = "<b>Se ha actualizado el avatar de tu personaje. Utiliza la función !pj para comprobar su estado.</b>";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
				} else {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$text = "<b>Para utilizar esta función necesitas tener un personaje de nivel 2 o superior. Utiliza la función !exp en chat privado con el bot para entrenar a tu personaje y poder utilizar !avatarpj.</b>";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
				}
				// cerrar db
				mysql_free_result($result);
				mysql_close($link);			  
			} else {
				// si no es correcta, ayudarle con el formato	
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$text = "<b>La dirección introducida no es compatible con Telegram. Asegúrate de que el enlace sea HTTP o HTTPS y que la imagen esté en formato .jpg, .png o .gif.</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			$text = "<b>La dirección introducida es muy larga, utiliza otro alojamiento de imágenes que te proporcione un enlace más corto.</b>";
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
		}			
	} else if (strpos(strtolower($text), "!avatarclan") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !avatarclan.");
			// revisar si es una url correcta (250 caracateres, http:// o https:/ y .jpg, .png o .gif)
			$start = strpos(strtolower($text), "!avatarclan") + 11;
			$avatarURL = substr($text, $start);
			$avatarURL = ltrim(rtrim($avatarURL));
			if($avatarURL == "") {
				$link = dbConnect();
				$query = "SELECT clan_avatar FROM groupbattle WHERE group_id = ".$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				// mirar en la base de datos si hay avatar
				if(isset($row['clan_avatar']) && strlen($row['clan_avatar']) > 5) {
					// si hay, mostrrarlo
					$msg = "<b>El avatar del clan guardado es el siguiente:</b>".PHP_EOL.$row['clan_avatar'].PHP_EOL.PHP_EOL;
				} else {
					// si no hay, decirle como se añade
					$msg = "<b>No hay ningún avatar almacenado en el clan. Puedes asignar uno no animado en formato .JPG o .PNG escribiendo, por ejemplo,</b> <pre>!avatarclan http://www.mipaginadeimagenes.com/imagendelclan.png</pre>".PHP_EOL;					
				}
				$msg = $msg."<i>La imagen del clan se puede consultar escribiendo \"!avatarclan\" y se puede eliminar escribiendo \"!avatarclan borrar\", y aparecerá como imagen del grupo en cada una de las guerras que el clan libre.</i>";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
				mysql_free_result($result);
				mysql_close($link);
			} else if(strlen($avatarURL) < 251) {
				$headerCheck = substr($avatarURL, 0, 7);
				$headerCheck = strtolower($headerCheck);
				$footerCheck = substr($avatarURL, strlen($avatarURL) - 4);
				$footerCheck = strtolower($footerCheck);
				$doubleCheck = 0;
				$eraseMode = 0;
				if($headerCheck == "http://" || $headerCheck == "https:/") {
					$doubleCheck = $doubleCheck + 1;
				}
				if($footerCheck == ".jpg" || $footerCheck == ".png") {
					$doubleCheck = $doubleCheck + 1;
				}
				if(strtolower($avatarURL) == "borrar") {
					$doubleCheck = 2;
					$eraseMode = 1;
				}
				if($doubleCheck == 2) {
					$user_id = $message['from']['id'];
					$link = dbConnect();
					$query = 'SELECT group_id FROM playerbattle WHERE user_id = '.$user_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// si pertenece al clan este user...
					if(isset($row['group_id']) && $chat_id == $row['group_id']) {
						// mostrar mensaje de que se ha guardado, que aparecera cada vez que use !pj
						mysql_free_result($result);
						if($eraseMode == 0) {
							$query = "UPDATE groupbattle SET clan_avatar = '".$avatarURL."' WHERE group_id = ".$chat_id;
						} else {
							$query = "UPDATE groupbattle SET clan_avatar = NULL WHERE group_id = ".$chat_id;
						}
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$text = "<b>Se ha actualizado el avatar del clan. Utiliza la función !avatarclan para comprobar su estado.</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
					} else {
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$text = "<b>Solo los miembros del clan puedes asignarle un avatar de clan al grupo, utiliza !unirme para formar parte del clan.</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
					}
					// cerrar db
					mysql_free_result($result);
					mysql_close($link);			  
				} else {
					// si no es correcta, ayudarle con el formato	
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$text = "<b>La dirección introducida no es correcta. Puedes asignar un avatar no animado en formato .JPG o .PNG escribiendo, por ejemplo,</b> <pre>!avatarclan http://www.mipaginadeimagenes.com/imagendelclan.png</pre>";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
				}
			} else {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$text = "<b>La dirección introducida es muy larga, utiliza otro alojamiento de imágenes que te proporcione un enlace más corto.</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}			
		} else {
			error_log($logname." triggered in private: !avatarclan.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El avatar de clan solo se puede cambiar desde grupos y supergrupos, ¡añádeme a tu grupo favorito y derrota a todos!*"));
		}
	} else if (strpos(strtolower($text), "!pvp") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group and failed: !pvp.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			$text = "<b>La función !pvp solo está disponible desde chat privado con el bot.</b>";
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
		} else {
			error_log($logname." triggered in private: !pvp.");
			// abrir db
			// sacar datos completos del chat id
			$link = dbConnect();
			$query = "SELECT pb.level, pb.hp, pb.attack, pb.defense, pb.critic, pb.speed, pb.helmet, pb.body, pb.boots, pb.weapon, pb.shield, pb.pvp_allowed, pb.pvp_wins, COALESCE( hb.total, 0 ) AS  'hero_power' FROM playerbattle pb LEFT JOIN ( SELECT total, user_id FROM heroesbattle )hb ON pb.user_id = hb.user_id WHERE pb.user_id = '".$chat_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['hp']) && $row['level'] > 10) {
				// mirar que quiere hacer	
				$userFirstName = $message['from']['first_name'];
				$userNickName = $message['from']['username'];
				if($userNickName != "") {
					if(strtolower($userFirstName) == strtolower($userNickName)) {
						$playerName = $userNickName;
					} else {
						$playerName = $userFirstName." (".$userNickName.")";
					}
				} else {
					$playerName = $userFirstName;
				}
				$playerName = str_replace("<", "", $playerName);
				$playerName = str_replace(">", "", $playerName);
				$playerLevel = $row['level'];
				$playerHP = $row['hp'] + $row['body'];
				$playerAt = $row['attack'] + $row['weapon'];
				$playerDef = $row['defense'] + $row['shield'];
				$playerCrit = ($row['critic'] * 3) + ($row['helmet'] * 3);
				$playerCritInfo = $row['critic'] + $row['helmet'];
				$playerSp = $row['speed'] + $row['boots'];
				$playerPvpAllowed = $row['pvp_allowed'];
				$playerPvpWins = $row['pvp_wins'];
				$playerHeroPower = $row['hero_power'];
				$playerHeroPower = getHeroPower($playerLevel, $playerHeroPower);
				mysql_free_result($result);
				$start = strpos(strtolower($text), "!pvp") + 4;
				$pvpAction = substr($text, $start);
				$pvpAction = ltrim(rtrim($pvpAction));
				$pvpAction = strtolower($pvpAction);
				if($pvpAction == "") {
					// switch allow 10
					if($playerPvpAllowed == 1) {
						$pvpSwitch = 0;
					} else {
						$pvpSwitch = 1;
					}
					$query = 'UPDATE playerbattle SET pvp_allowed = '.$pvpSwitch.' WHERE user_id = '.$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					if($pvpSwitch == 1) {
						$msg = "✅ <b>Acabas de activar el modo PvP de Los Rocosos de Demisuke.</b>".PHP_EOL.PHP_EOL."A partir de ahora podrás luchas contra tus amigos utilizando la función !pvp seguido del nombre de usuario de tu rival, además de poder aceptar duelos pendientes, aparecer en el ránking de !rocosos y mostrar tus victorias PvP en tu ficha de personaje (!pj).";
					} else {
						$msg = "❌ <b>Acabas de desactivar el modo PvP de Los Rocosos de Demisuke.</b>".PHP_EOL.PHP_EOL."Deshabilitando este modo no podrás aceptar duelos pendientes ni retar a otras personas, además de que no aparecerás en la lista de !rocosos y tus victorias PvP no serán visibles en tu ficha de personaje (!pj). Si anteriormente enviaste petición de batalla a otros usuarios, tus rivales todavía podrán rechazar cualquier solicitud pendiente tuya.";
					}
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
				} else if($pvpAction == "aceptar") {
					// aceptar guerra, tomar ideas... (que los dos sigan en allowed)
					$query = 'SELECT playerbattlelog.pbl_id, playerbattlelog.player, userbattle.first_name, userbattle.user_name FROM playerbattlelog, userbattle WHERE playerbattlelog.player = userbattle.user_id AND playerbattlelog.status =  "REQUESTED" AND playerbattlelog.rival = '.$chat_id.' ORDER BY playerbattlelog.epoch_time ASC LIMIT 0 , 1';
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// revisar si tiene alguna pvp pendiente
					if(isset($row['pbl_id'])) {
						$logToUpdate = "";
						(string)$logToUpdate = $logToUpdate.$row['pbl_id'];
						$rivalFirstName = $row['first_name'];
						$rivalUserName = $row['user_name'];
						if($rivalUserName != "") {
							if(strtolower($rivalFirstName) == strtolower($rivalUserName)) {
								$rivalName = $rivalUserName;
							} else {
								$rivalName = $rivalFirstName." (".$rivalUserName.")";
							}
						} else {
							$rivalName = $rivalFirstName;
						}
						$rivalName = str_replace("<", "", $rivalName);
						$rivalName = str_replace(">", "", $rivalName);
						$rival_id = $row['player'];
						$playerFirstName = $message['from']['first_name'];
						$playerUserName = $message['from']['username'];
						if($playerUserName != "") {
							if(strtolower($playerFirstName) == strtolower($playerUserName)) {
								$playerName = $playerUserName;
							} else {
								$playerName = $playerFirstName." (".$playerUserName.")";
							}
						} else {
							$playerName = $playerFirstName;
						}
						$playerName = str_replace("<", "", $playerName);
						$playerName = str_replace(">", "", $playerName);						
						mysql_free_result($result);
						$query = 'SELECT pb.exp_points, ( pb.hp + pb.attack + pb.defense + pb.critic + pb.critic + pb.critic + pb.speed + pb.helmet + pb.helmet + pb.helmet + pb.body + pb.boots + pb.weapon + pb.shield ) AS  "power", pb.pvp_allowed, COALESCE( hb.total, 0 ) AS  "hero_power", pb.avatar, ( pb.hp + pb.body ) AS  "total_hp", ( pb.attack + pb.weapon ) AS  "total_attack", ( pb.defense + pb.shield ) AS  "total_defense", ( pb.critic + pb.helmet ) AS  "total_critic", ( pb.speed + pb.boots ) AS  "total_speed", pb.level, pb.bottles, pb.critic AS  "crit_points" FROM playerbattle pb LEFT JOIN ( SELECT total, user_id FROM heroesbattle )hb ON pb.user_id = hb.user_id WHERE pb.user_id IN ( '.$chat_id.', '.$rival_id.' ) ORDER BY FIELD( pb.user_id, '.$chat_id.', '.$rival_id.' )';
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$row = mysql_fetch_array($result);
						$playerExp = $row['exp_points'];
						$playerPower = $row['power'];
						$playerHeroPower = $row['hero_power'];
						$playerLevel = $row['level'];
						$playerHeroPower = getHeroPower($playerLevel, $playerHeroPower);
						$playerPermission = $row['pvp_allowed'];
						$playerAvatar = $row['avatar'];
						$playerBottles = $row['bottles'];
						$playerCritPoints = $row['crit_points'];
						$row = mysql_fetch_array($result);
						$rivalExp = $row['exp_points'];
						$rivalPower = $row['power'];
						$rivalPermission = $row['pvp_allowed'];
						$rivalHeroPower = $row['hero_power'];
						$rivalLevel = $row['level'];
						$rivalHeroPower = getHeroPower($rivalLevel, $rivalHeroPower);
						$rivalAvatar = $row['avatar'];
						$rivalHP = $row['total_hp'];
						$rivalAt = $row['total_attack'];
						$rivalDef = $row['total_defense'];
						$rivalCrit = $row['total_critic'];
						$rivalSp = $row['total_speed'];
						$rivalBottles = $row['bottles'];
						$rivalCritPoints = $row['crit_points'];
						// revisar si estan allowed
						if($playerPermission == 1 && $rivalPermission == 1) {
							// si si, aceptar la guerra, avisar en ambos jugadores
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(50000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>¡Se ha aceptado el duelo PvP contra ".$rivalName."! El resumen de la batalla aparecerá a continuación en los rocosos participantes en cuanto esté disponible.</b>"));
							apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "typing"));
							usleep(50000);
							apiRequest("sendMessage", array('chat_id' => $rival_id, 'parse_mode' => "HTML", "text" => "<b>¡".$playerName." ha aceptado tu solicitud de duelo PvP pendiente! El resumen de la batalla aparecerá a continuación en los rocosos participantes en cuanto esté disponible.</b>"));
							// y editar db, la de guerra pendiente como aceptada
							mysql_free_result($result);							
							$query = "UPDATE playerbattlelog SET status = 'ACCEPTED' WHERE pbl_id = ".$logToUpdate;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							sleep(1);
							$playerPower = $playerPower + $playerHeroPower;
							$rivalPower = $rivalPower + $rivalHeroPower;
							// librar batalla
							if($playerPower >= $rivalPower) {
								$playerIsStronger = 1;
								$powerDiff = $playerPower - $rivalPower;
								$expDiff = $playerExp - $rivalExp;
							} else {
								$playerIsStronger = 0;
								$powerDiff = $rivalPower - $playerPower;
								$expDiff = $rivalExp - $playerExp;
							}
							if($playerIsStronger == 1) {
								$percentHigher = floor((($playerPower * 100) / $rivalPower) - 100);
							} else {
								$percentHigher = floor((($rivalPower * 100) / $playerPower) - 100);
							}
							if($playerLevel > $rivalLevel) {
								$levelDiff = $playerLevel - $rivalLevel;
							} else {
								$levelDiff = $rivalLevel - $playerLevel;
							}
							error_log("Percent diff. +".$percentHigher);
							if($percentHigher < 15) {
								// tener en cuenta la exp
								if($expDiff >= 0) {
									// 85
									$battleTicket = rand(1,20);
									if($battleTicket < 18) {
										$win = 1;
										$lucky = 0;
									} else {
										$win = 0;
										$lucky = 1;
									}
								} else {
									// 60
									$battleTicket = rand(1,10);
									if($battleTicket < 7) {
										$win = 1;
										$lucky = 0;
									} else {
										$win = 0;
										$lucky = 1;
									}
								}
							} else if($levelDiff > 5) {
								// 99,99
								$battleTicket = rand(1,10000);
								if($battleTicket < 10000) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else if($percentHigher > 300) {
								// 99
								$battleTicket = rand(1,100);
								if($battleTicket < 100) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else if($percentHigher > 200) {
								// 95
								$battleTicket = rand(1,20);
								if($battleTicket < 20) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else if($percentHigher > 100) {
								// 90
								$battleTicket = rand(1,10);
								if($battleTicket < 10) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else if($percentHigher > 50) {
								// 85
								$battleTicket = rand(1,20);
								if($battleTicket < 18) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else {
								// 80
								$battleTicket = rand(1,10);
								if($battleTicket < 9) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							}
							error_log("GROUPWINLUCKY ".$win.$lucky);
							if($playerIsStronger == 1) {
								if($win == 1) {
									$winner_id = $chat_id;
									$winnerName = $playerName;
									$loser_id = $rival_id;
									$loserName = $rivalName;
									$winnerCurrExp = $playerExp;
									$winnerCurrLevel = $playerLevel;
									$winnerBottles = $playerBottles;
									$winnerCritic = $playerCritPoints;
								} else {
									$winner_id = $rival_id;
									$winnerName = $rivalName;
									$loser_id = $chat_id;
									$loserName = $playerName;
									$winnerCurrExp = $rivalExp;
									$winnerCurrLevel = $rivalLevel;
									$winnerBottles = $rivalBottles;
									$winnerCritic = $rivalCritPoints;
								}
							} else {
								if($win == 0) {
									$winner_id = $chat_id;
									$winnerName = $playerName;
									$loser_id = $rival_id;
									$loserName = $rivalName;
									$winnerCurrExp = $rivalExp;
									$winnerCurrLevel = $rivalLevel;
									$winnerBottles = $rivalBottles;
									$winnerCritic = $rivalCritPoints;
								} else {
									$winner_id = $rival_id;
									$winnerName = $rivalName;
									$loser_id = $chat_id;
									$loserName = $playerName;
									$winnerCurrExp = $playerExp;
									$winnerCurrLevel = $playerLevel;
									$winnerBottles = $playerBottles;
									$winnerCritic = $playerCritPoints;
								}
							}
							sleep(1);
							$currentTime = time();
							$fullDate = date("l, j F Y. (H:i:s)", $currentTime);
							$fullDate = translateDate($fullDate);
							// insert en groupbattleresults, guardar registro de guerra (una db con winner id y loser id ayudaria luego a saber los pvp points)
							$query = "INSERT INTO `playerbattleresults` (`player`, `rival`, `winner`, `date`) VALUES ('".$chat_id."', '".$rival_id."', '".$winner_id."', '".$fullDate."');";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							// sumarle +1 a las victorias de los playerbattle grupales
							$query = "UPDATE playerbattle SET pvp_wins = pvp_wins + 1 WHERE user_id = ".$winner_id;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							sleep(1);
							// mostrar el resumen de batalla
							$winnerName = removeEmoji($winnerName);
							$loserName = removeEmoji($loserName);
							$msg = getPlayerBattleResult($winnerName, $loserName, $lucky);
							$playerName = removeEmoji($playerName);
							$rivalName = removeEmoji($rivalName);
							$imageURL = rand(0,29);
							$imageShortURL = "/img/battle_".$imageURL.".jpg";
							$imageURL = dirname(__FILE__).$imageShortURL;
							header('Content-type: image/jpeg');
							$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
							if(strlen($playerAvatar) > 5) {
								$playerAvatarType = substr(strtolower($playerAvatar), strlen($playerAvatar) - 3);
								if($playerAvatarType == "jpg") {
									$player_image = imagecreatefromjpeg($playerAvatar);
								} else if($playerAvatarType == "png") {
									$player_image = imagecreatefrompng($playerAvatar);
								} else {
									$player_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
									$playerAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
								}
							} else {
								$player_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
								$playerAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
							}
							if(strlen($rivalAvatar) > 5) {
								$rivalAvatarType = substr(strtolower($rivalAvatar), strlen($rivalAvatar) - 3);
								if($rivalAvatarType == "jpg") {
									$rival_image = imagecreatefromjpeg($rivalAvatar);
								} else if($rivalAvatarType == "png") {
									$rival_image = imagecreatefrompng($rivalAvatar);
								} else {
									$rival_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
									$rivalAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
								}
							} else {
								$rival_image = imagecreatefrompng('https://demisuke-kamigram.rhcloud.com/img/avatar.png');
								$rivalAvatar = "https://demisuke-kamigram.rhcloud.com/img/avatar.png";
							}
							$textColor = imagecolorallocate($jpg_image, 90, 57, 22);
							$starsColor = imagecolorallocate($jpg_image, 255, 255, 100);
							$font_path = dirname(__FILE__)."/img/segoe.ttf";
							list($base_width, $base_height) = getimagesize('https://demisuke-kamigram.rhcloud.com/img/battle.jpg');
							list($player_width, $player_height) = getimagesize($playerAvatar);
							list($rival_width, $rival_height) = getimagesize($rivalAvatar);
							$player_ratio = $player_width / $player_height;
							if($player_ratio > 1) {
								$player_scalewidth = 250;
								$player_scaleheight = floor(250 / $player_ratio);
							}
							else {
								$player_scalewidth = 250 * $player_ratio;
								$player_scaleheight = 250;
							}
							$player_position = $player_scalewidth - $player_scaleheight;
							if($player_position == 0) {
								$player_x = 180;
								$player_y = 100;
							} else if($player_position > 0) {
								$player_x = 180;
								$player_y = 100 + floor($player_position / 2);
							} else {
								$player_x = 180 + floor(($player_position * -1) / 2);
								$player_y = 100;
							}
							$rival_ratio = $rival_width / $rival_height;
							if($rival_ratio > 1) {
								$rival_scalewidth = 250;
								$rival_scaleheight = floor(250 / $rival_ratio);
							}
							else {
								$rival_scalewidth = 250 * $rival_ratio;
								$rival_scaleheight = 250;
							}
							$rival_position = $rival_scalewidth - $rival_scaleheight;
							if($rival_position == 0) {
								$rival_x = 850;
								$rival_y = 100;
							} else if($rival_position > 0) {
								$rival_x = 850;
								$rival_y = 100 + floor($rival_position / 2);
							} else {
								$rival_x = 850 + floor(($rival_position * -1) / 2);
								$rival_y = 100;
							}
							$player_name = $playerName." [Nv. ".$playerLevel."]";
							$rival_name = $rivalName." [Nv. ".$rivalLevel."]";
							$player_nameX = 155;
							$player_namealign = 33 - strlen($player_name);
							if($player_namealign > 0) {
								$player_nameX = $player_nameX + ($player_namealign * 5);
							}
							$rival_nameX = 800;
							$rival_namealign = 33 - strlen($rival_name);
							if($rival_namealign > 0) {
								$rival_nameX = $rival_nameX + ($rival_namealign * 5);
							}
							$res_image = imagecreatetruecolor($base_width, $base_height);
							imagecopyresampled($res_image, $jpg_image, 0, 0, 0, 0, $base_width, $base_height, $base_width, $base_height);
							imagecopyresampled($res_image, $player_image, $player_x, $player_y, 0, 0, $player_scalewidth, $player_scaleheight, $player_width, $player_height);
							imagecopyresampled($res_image, $rival_image, $rival_x, $rival_y, 0, 0, $rival_scalewidth, $rival_scaleheight, $rival_width, $rival_height);
							if(strlen($player_name) > 50) {
								$player_name = substr($player_name, 0, 47);
								$player_name = rtrim($player_name);
								$player_name = $player_name."...";
							}
							if(strlen($rival_name) > 50) {
								$rival_name = substr($rival_name, 0, 47);
								$rival_name = rtrim($rival_name);
								$rival_name = $rival_name."...";
							}
							$player_hpstars = ratePower($playerHP);
							$player_atstars = ratePower($playerAt);
							$player_defstars = ratePower($playerDef);
							$player_critstars = ratePower($playerCritInfo, 1);
							$player_spstars = ratePower($playerSp);
							$rival_hpstars = ratePower($rivalHP);
							$rival_atstars = ratePower($rivalAt);
							$rival_defstars = ratePower($rivalDef);
							$rival_critstars = ratePower($rivalCrit, 1);
							$rival_spstars = ratePower($rivalSp);
							$result_text = $msg;
							$result_text = wordwrap($result_text, 140, "\n", false);
							mysql_free_result($result);
							imagettftext($res_image, 16, 0, $player_nameX, 380, $textColor, $font_path, $player_name);
							imagettftext($res_image, 16, 0, $rival_nameX, 380, $textColor, $font_path, $rival_name);
							imagettftext($res_image, 16, 0, 228, 410, $textColor, $font_path, "Vida:");
							imagettftext($res_image, 16, 0, 908, 410, $textColor, $font_path, "Vida:");
							imagettftext($res_image, 26, 0, 280, 410, $starsColor, $font_path, $player_hpstars);
							imagettftext($res_image, 26, 0, 960, 410, $starsColor, $font_path, $rival_hpstars);
							imagettftext($res_image, 16, 0, 200, 435, $textColor, $font_path, "Ataque:");
							imagettftext($res_image, 16, 0, 880, 435, $textColor, $font_path, "Ataque:");
							imagettftext($res_image, 26, 0, 280, 435, $starsColor, $font_path, $player_atstars);
							imagettftext($res_image, 26, 0, 960, 435, $starsColor, $font_path, $rival_atstars);
							imagettftext($res_image, 16, 0, 191, 460, $textColor, $font_path, "Defensa:");
							imagettftext($res_image, 16, 0, 872, 460, $textColor, $font_path, "Defensa:");
							imagettftext($res_image, 26, 0, 280, 460, $starsColor, $font_path, $player_defstars);
							imagettftext($res_image, 26, 0, 960, 460, $starsColor, $font_path, $rival_defstars);
							imagettftext($res_image, 16, 0, 206, 485, $textColor, $font_path, "Crítico:");
							imagettftext($res_image, 16, 0, 887, 485, $textColor, $font_path, "Crítico:");
							imagettftext($res_image, 26, 0, 280, 485, $starsColor, $font_path, $player_critstars);
							imagettftext($res_image, 26, 0, 960, 485, $starsColor, $font_path, $rival_critstars);
							imagettftext($res_image, 16, 0, 177, 510, $textColor, $font_path, "Velocidad:");
							imagettftext($res_image, 16, 0, 858, 510, $textColor, $font_path, "Velocidad:");
							imagettftext($res_image, 26, 0, 280, 510, $starsColor, $font_path, $player_spstars);
							imagettftext($res_image, 26, 0, 960, 510, $starsColor, $font_path, $rival_spstars);
							imagettftext($res_image, 12, 0, 140, 565, $textColor, $font_path, $result_text);
							imagejpeg($res_image, $imageURL, 100);
							$target_url = "https://api.telegram.org/bot".BOT_TOKEN."/sendPhoto";
							$file_name_with_full_path = realpath($imageURL);							
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
							usleep(300000);
							$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL,$target_url);
							curl_setopt($ch, CURLOPT_POST,1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
							$result_curl=curl_exec ($ch);
							curl_close ($ch);
							apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "upload_photo"));
							usleep(300000);
							$post = array('chat_id' => $rival_id, 'photo' =>'@'.$file_name_with_full_path);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL,$target_url);
							curl_setopt($ch, CURLOPT_POST,1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
							$result_curl=curl_exec ($ch);
							curl_close ($ch);
							imagedestroy($res_image);
							$bossTime = time() - (3600*6) + 60;
							$query = "UPDATE `playerbattle` SET `last_boss` = '".$bossTime."' WHERE `user_id` = '".$winner_id."'";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							apiRequest("sendChatAction", array('chat_id' => $winner_id, 'action' => "typing"));
							$msg = "💪 <b>¡Has acabado sin energía, pero has atraído a los jefes de tu zona con tu heróica batalla y podrás enfrentarte a uno de ellos en unos segundos!</b>";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $winner_id, 'parse_mode' => "HTML", "text" => $msg));
						} else {
							// si no, decir que no tienes allowed para aceptarla 
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>Uno de los dos jugadores no permite los duelos PvP, la batalla no se puede aceptar.</b>"));
						}
					} else {
						// si no, avisar de que no tienes solicitudes de duelo pendientes
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No tienes ninguna solicitud de duelo PvP pendiente.*"));
					}
				} else if($pvpAction == "rechazar") {
					// rechazar guerra como en el grupo
					mysql_free_result($result);
					$query = 'SELECT playerbattlelog.pbl_id, playerbattlelog.player, userbattle.first_name, userbattle.user_name FROM playerbattlelog, userbattle WHERE playerbattlelog.player = userbattle.user_id AND playerbattlelog.status =  "REQUESTED" AND playerbattlelog.rival = '.$chat_id.' ORDER BY playerbattlelog.epoch_time ASC LIMIT 0 , 1';
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// revisar si tiene alguna guerra pendiente (la pending mas old)
					if(isset($row['pbl_id'])) {
						// si la tiene rechazar duelo
						$rowToUpdate = "";
						(string)$rowToUpdate = $rowToUpdate.$row['pbl_id'];
						$rivalFirstName = $row['first_name'];
						$rivalUserName = $row['user_name'];
						if($rivalUserName != "") {
							if(strtolower($rivalFirstName) == strtolower($rivalUserName)) {
								$rivalName = $rivalUserName;
							} else {
								$rivalName = $rivalFirstName." (".$rivalUserName.")";
							}
						} else {
							$rivalName = $rivalFirstName;
						}
						$rivalName = str_replace("<", "", $rivalName);
						$rivalName = str_replace(">", "", $rivalName);
						$rival_id = $row['player'];
						$playerFirstName = $message['from']['first_name'];
						$playerUserName = $message['from']['username'];
						if($playerUserName != "") {
							if(strtolower($playerFirstName) == strtolower($playerUserName)) {
								$playerName = $playerUserName;
							} else {
								$playerName = $playerFirstName." (".$playerUserName.")";
							}
						} else {
							$playerName = $playerFirstName;
						}
						$playerName = str_replace("<", "", $playerName);
						$playerName = str_replace(">", "", $playerName);						
						mysql_free_result($result);
						// avisar en ambos players, y editar db, la de duelo pendiente como rechazada
						$resetTime = 3600 * 5;						
						$query = "UPDATE playerbattlelog SET status = 'REJECTED', epoch_time = ".$resetTime." WHERE pbl_id = ".$rowToUpdate;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						// mostrar todos los datos necesarios con sleep(1) y revisar que todo quede bien aqui
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$msg = "❌ <b>La petición pendiente de duelo PvP de ".$rivalName." ha sido rechazada.</b>";
						usleep(250000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
						apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "typing"));
						$msg = "❌ <b>".$playerName." ha rechazado la petición de duelo PvP pendiente que le enviaste anteriormente.</b>";
						usleep(250000);
						apiRequest("sendMessage", array('chat_id' => $rival_id, 'parse_mode' => "HTML", "text" => $msg));
					} else {
						// si no, avisar de que no tienes solicitudes de guerra pendientes
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No tienes ninguna petición de duelo PvP pendiente.*"));
					}
				} else {
					if($playerPvpAllowed == 1) {
						$pvpAction = str_replace("@", "", $pvpAction);
						// buscar si existe el usuario en una LOWER SQL
						$query = 'SELECT userbattle.user_id, userbattle.first_name, userbattle.user_name, playerbattle.level, playerbattle.pvp_allowed FROM playerbattle, userbattle WHERE playerbattle.user_id = userbattle.user_id AND LOWER( user_name ) =  "'.$pvpAction.'" LIMIT 0 , 1';
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$row = mysql_fetch_array($result);
						if(isset($row['level'])) {
							// si existe, mirar que no seas tu mismo...
							$isRival = 1;
							if($row['user_id'] == $chat_id) {
								$isRival = 0;
							}
							// mirar que este en allowed
							if($row['pvp_allowed'] == 1 && $isRival == 1) {
								// si esta, mirar si es lv11+
								if($row['level'] > 10) {
									$currTime = time();
									$rival_id = $row['user_id'];
									$rivalFirstName = $row['first_name'];
									$rivalUserName = $row['user_name'];
									$rivalLevel = $row['level'];
									mysql_free_result($result);
									$query = "SELECT epoch_time FROM playerbattlelog WHERE player = ".$chat_id." ORDER BY epoch_time DESC LIMIT 0, 1";
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
									$row = mysql_fetch_array($result);
									if(isset($row['epoch_time'])) {
										$lastPvp = $row['epoch_time'];
									} else {
										$lastPvp = 0;
									}
									// si esta, mirar la ultima peticion de pvp
									if(($currTime - 18000) > $lastPvp) {
										mysql_free_result($result);
										$query = "SELECT epoch_time FROM playerbattlelog WHERE player = ".$chat_id." AND rival = ".$rival_id." ORDER BY epoch_time DESC LIMIT 0, 1";
										$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
										$row = mysql_fetch_array($result);
										if(isset($row['epoch_time'])) {
											$lastPvp = $row['epoch_time'];
										} else {
											$lastPvp = 0;
										}
										// si es de mas de 5h, mirar la ultima peticion de pvp contra ese usuario
										if(($currTime - 86400) > $lastPvp) {
											// si es de mas de 24h, declarar pvp guerra al usuario nuevo 
											mysql_free_result($result);
											$query = "INSERT INTO `playerbattlelog` (`player`, `rival`, `epoch_time`) VALUES ('".$chat_id."', '".$rival_id."', '".$currTime."')";
											$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
											// avisar a ambos con sus mensajes, y que compruebe en !guerras
											if($rivalUserName != "") {
												if(strtolower($rivalFirstName) == strtolower($rivalUserName)) {
													$rivalName = $rivalUserName;
												} else {
													$rivalName = $rivalFirstName." (".$rivalUserName.")";
												}
											} else {
												$rivalName = $rivalFirstName;
											}
											$rivalName = str_replace("<", "", $rivalName);
											$rivalName = str_replace(">", "", $rivalName);
											apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
											$msg = "⚔ <b>¡Has retado a un duelo a ".$rivalName."!".PHP_EOL.PHP_EOL.
											"Si acepta el desafío la batalla comenzará automáticamente y el resultado aparecerá en este mismo chat.".PHP_EOL.
											"En caso de que el rival rechace la invitación de duelo recibirás una notificación.</b>".PHP_EOL.PHP_EOL.
											"<i>Consulta con !guerras el número de duelos pendientes y las últimas guerras libradas en Telegram.</i>";
											usleep(250000);
											apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
											apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "typing"));
											$msg = "⚔ <b>¡".$playerName." te ha retado a un duelo PvP!</b>".PHP_EOL.PHP_EOL.
											"<i>Utiliza \"!pvp aceptar\" para iniciar automáticamente la batalla o \"!pvp rechazar\" para desestimar la petición.".PHP_EOL.
											"Consulta con !guerras el número de duelos pendientes y las últimas guerras libradas en Telegram.</i>".PHP_EOL.PHP_EOL.
											"Resumen de estadísticas del rival:".PHP_EOL.
											"<pre>VID: ".ratePower($playerHP).PHP_EOL.
											"ATA: ".ratePower($playerAt).PHP_EOL.
											"DEF: ".ratePower($playerDef).PHP_EOL.
											"CRÍ: ".ratePower($playerCritInfo, 1).PHP_EOL.
											"VEL: ".ratePower($playerSp)."</pre>";
											usleep(250000);
											apiRequest("sendMessage", array('chat_id' => $rival_id, 'parse_mode' => "HTML", "text" => $msg));
										} else {
											// si no, avisar de que una vez al dia ese user
											apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
											$msg = "<b>Solo puedes retar una vez al día a un mismo rival. Inténtalo de nuevo cuando hayan pasado 24 horas desde la última vez que lo hiciste.</b>";
											usleep(100000);
											apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
										}
									} else {
										// si no, avisar de que cada 5h puedes...
										apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
										$msg = "<b>Solo puedes retar en duelo a un rival una vez cada cinco horas, inténtalo más tarde.</b>";
										usleep(100000);
										apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
									}
								} else {
									// si no, decir que es un crio el rival
									apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
									$msg = "<b>El rival todavía no tiene el nivel suficiente para batirse en duelos PvP, inténtalo más tarde.</b>";
									usleep(100000);
									apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
								}
							} else {
								// si no esta, decir que no lo permite
								apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
								if($isRival == 0) {
									$msg = "<b>¡No puedes retarte en duelo a ti mismo!</b>";
								} else {
									$msg = "<b>El rival tiene bloqueadas las peticiones de duelo, elige a otro jugador.</b>";
								}
								usleep(100000);
								apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
							}
						} else {
							// si no existe explicarle que ese user no se encuentra, las normas son tal y tal...
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							$msg = "<b>No se ha encontrado ningún jugador con ese nombre de usuario, comprueba que lo hayas escrito correctamente.</b>".PHP_EOL;
							$msg = $msg."<b>Puedes ver una lista de rivales asequibles para tu nivel utilizando la función !listapvp.</b>";
							usleep(100000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
						}
					} else {
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$msg = "<b>Actualmente tienes bloqueado el modo PvP de Los Rocosos de Demisuke. Escribe \"!pvp\" primero para habilitar esta función.</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					}
				}
			} else {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "<b>La función !pvp solo está disponible para jugadores de nivel 11 o superior. ¡Entrena a tu personaje con la función !exp (o </b>/exp<b>) y desafía a tus amigos!</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			}
			// cerrar db
			mysql_free_result($result);
			mysql_close($link);	
		}
	} else if (strpos(strtolower($text), "!rocosos") !== false) {
		if (strpos(strtolower($text), "!rocososgrupo") !== false) {
			if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
				error_log($logname." triggered in a group: !rocososgrupo.");
				getRockManGroup($chat_id);
			} else {
				error_log($logname." triggered in private and failed: !rocososgrupo.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "<b>La función !rocososgrupo solo está disponible para grupos, ¡añádeme al bot a tu grupo favorito!</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			}
		} else {
			error_log($logname." triggered: !rocosos.");
			getRockMan($chat_id);
		}
	} else if (strpos(strtolower($text), "!listapvp") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group and failed: !listapvp.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			$msg = "<b>La función !listapvp solo está disponible en chat privado con el bot.</b>";
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
		} else {
			error_log($logname." triggered in private: !listapvp.");
			$link = dbConnect();
			$query = 'SELECT level, pvp_allowed FROM playerbattle WHERE user_id = '.$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// mirar si tiene pj
			if(isset($row['level'])) {
				// si tiene pj, mirar si es lv 10+
				if($row['level'] > 10) {
					// si es 10+, mirar si tiene el pvp allowed
					if($row['pvp_allowed'] == 1) {
						// si lo tiene, pues eso es todo... a mostrar los datos
						if($row['level'] < 20) {
							$level = $row['level'] + 1;
						} else {
							$level = $row['level'] + 2;
						}
						mysql_free_result($result);
						$query = 'SELECT dt.user_name AS "user", dt.level FROM ( SELECT pb.level, ub.user_name, pb.exp_points FROM playerbattle pb, userbattle ub WHERE ub.user_id = pb.user_id AND pb.level >10 AND pb.pvp_allowed =1 AND ub.user_name !=  "" AND pb.user_id != '.$chat_id.' AND pb.level < '.$level.' GROUP BY pb.user_id ORDER BY pb.exp_points DESC LIMIT 0 , 20 )dt ORDER BY dt.exp_points ASC';
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$msg = "<b>⚔ Lista de rivales asequibles para tu nivel:</b>".PHP_EOL.PHP_EOL;
						for($i=0;$i<20;$i++) {
							$row = mysql_fetch_array($result);
							if(isset($row['user'])) {
								$msg = $msg."<pre>▶️ ".$row['user']." (Nv. ".$row['level'].")</pre>".PHP_EOL;
							} else if($i==0) {
								$msg = $msg."<i>Nadie.</i>".PHP_EOL;
							}
						}
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						$msg = $msg.PHP_EOL."<i>Escribe \"!pvp\" seguido del nombre del rival al que quieres retar para enviarle una petición de duelo PvP.</i>".PHP_EOL."Ejemplo:".PHP_EOL."<pre>!pvp Kamisuke</pre>";
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					} else {
						// si no, avisar de que use !pvp y lo vuelva a intentar
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						$msg = "<b>Tu personaje tiene los duelos PvP bloqueados. Escribe \"!pvp\" para volver a activarlos e inténtalo de nuevo.</b>";
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					}
				} else {
					// si no, decirle que su personaje aun no puede librar duelos pvp
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$msg = "<b>Los duelos PvP son para personajes de nivel 11 y superior, ¡entrena un poco más para estar a la altura!</b>";
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
				}
			} else {
				// si no, decirle que use !exp y entrene un rato
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "<b>Utiliza la función !exp para entrenar a tu propio personaje y poder librar duelos PvP.</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			}
			//cerrar db
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!botella") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group and failed: !botella.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			$msg = "<b>La función !botella solo está disponible desde chat privado con el bot.</b>";
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
		} else {
			error_log($logname." triggered: !botella.");
			// abrir db
			$link = dbConnect();
			$query = "SELECT level, critic, exp_points, bottles, last_bottle, ( extra_hp + extra_attack + extra_defense + extra_critic + extra_speed ) AS 'total_extra' FROM playerbattle WHERE user_id = '".$chat_id."'";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// mirar si tiene pj
			if(isset($row['bottles'])) {
				$randomizer = rand(0, 100000);
				$randMultiplier = rand(1, 3);
				$randomizer = $randomizer * $randMultiplier;
				usleep($randomizer);
				$currTime = time();
				$checkDouble = $currTime - 2;
				if($checkDouble > $row['last_bottle']) {
					$currExp = $row['exp_points'];
					$currLevel = $row['level'];
					$newBottles = $row['bottles'];
					$critic = $row['critic'];
					$totalExtraPoints = $row['total_extra'];
					mysql_free_result($result);
					$query = "UPDATE `playerbattle` SET `last_bottle` = '".$currTime."' WHERE `user_id` = ".$chat_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					mysql_free_result($result);
					// si tiene, mirar si tiene botellas
					if($newBottles > 0) {
						// si tiene, usar una botella, restarle 1 al total y avisar
						$newBottles = $newBottles - 1;
						mysql_free_result($result);
						$expAcquired = useBottleExp($currLevel);
						$newExp = $currExp + $expAcquired;
						$newLevel = getLevelFromExp($newExp);
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$msg = "🍾 <b>Te has bebido una botella de experiencia hasta cansarte y has ganado ".$expAcquired." puntos de experiencia.</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
						if($newLevel != $row['level']){
							error_log($logname." is now level ".$newLevel.".");
							levelUp($newLevel, $newExp, $critic, $newBottles, $totalExtraPoints, $link, $chat_id);
							mysql_free_result($result);
							$query = "UPDATE `playerbattle` SET `bottles` = '".$newBottles."' WHERE `user_id` = '".$chat_id."'";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						} else {
							$query = "UPDATE `playerbattle` SET `exp_points` = '".$newExp."', `bottles` = '".$newBottles."', `last_exp` = '".$currTime."' WHERE `user_id` = '".$chat_id."'";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						}
						mysql_free_result($result);
						$user_id = $message['from']['id'];
						getPlayerInfo(0, $link, $chat_id, $user_id);
					} else {
						// si no tiene, decirle que no le quedan botellas
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						$msg = "<b>No te queda ninguna botella por utilizar en tu inventario.</b>";
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					}
				} else {
					error_log($logname." triggered !botella in double check and failed.");
				}
			} else {
				// si no tiene, que use /exp
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$msg = "<b>Para utilizar una botella debes jugar a los Rocosos de Demisuke, utiliza</b> /exp <b>para entrenar a tu personaje.</b>";
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			}
			mysql_free_result($result);
			// cerrar db
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!declararguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			// revisar que este bien escrito el comando
			$start = strpos(strtolower($text), "!declararguerra") + 15;
			$number = substr($text, $start);
			$number = ltrim(rtrim($number));
			if(is_numeric($number) && $number > 0) {
				// si esta bien escrito, chicha insaid
				error_log($logname." triggered in a group: !declararguerra.");
				// abrir db
				$link = dbConnect();
				$query = 'SELECT COUNT( * ) AS  "members" FROM playerbattle WHERE group_id = '.$chat_id.' GROUP BY group_id';
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				// revisar si el grupo tiene al menos 5 miembros
				if(isset($row['members']) && $row['members'] > 4) {
					$homeMembers = $row['members'];
					mysql_free_result($result);
					$user_id = $message['from']['id'];
					$query = 'SELECT group_id FROM playerbattle WHERE user_id = '.$user_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					// si existe, revisar que quien usa esta función pertenezca al clan
					if($chat_id == $row['group_id']) {
						// si tiene, mirar si el rival existe
						mysql_free_result($result);
						$number = $number - 1;
						$query = "SELECT gb.name, pb.group_id, COUNT( pb.user_id ) AS  'members' FROM playerbattle pb, groupbattle gb WHERE pb.group_id IS NOT NULL AND gb.group_id = pb.group_id AND gb.lastpoint >0 GROUP BY pb.group_id HAVING COUNT( pb.user_id ) >4 ORDER BY CASE WHEN pb.user_id =0 THEN -1 ELSE COUNT( pb.user_id ) END DESC , pb.group_id DESC LIMIT ".$number." , 1";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$row = mysql_fetch_array($result);
						$ownGroup = 0;
						if($row['group_id'] == $chat_id) {
							$ownGroup = 1;
						}
						// si existe, mirar si tiene al menos 5 miembros y no eres tu mismo
						if(isset($row['group_id']) && $row['members'] > 4 && $ownGroup == 0) {
							$rival_id = $row['group_id'];
							$rivalMembers = $row['members'];
							$rivalName = $row['name'];
							mysql_free_result($result);
							// si tiene, revisar la ultima batalla librada para ver si es vieja
							$query = "SELECT epoch_time, away_group FROM groupbattlelog WHERE home_group = ".$chat_id." ORDER BY epoch_time DESC LIMIT 0, 1";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							if(isset($row['epoch_time'])) {
								$lastWar = $row['epoch_time'];
							} else {
								$lastWar = 0;
							}
							$currTime = time();
							if(($currTime - 18000) > $lastWar) {
								// si es vieja, revisar que el grupo que quiere petar es diferente al ultimo de la anterior vez
								if($row['away_group'] != $rival_id) {
									// si lo es, lanzar en la db la guerra pendiente y avisar a ambos grupos de que acepten o rechacen o ignoren
									// crear un pending en la groupbattlelog
									mysql_free_result($result);
									$query = "INSERT INTO `groupbattlelog` (`home_group`, `away_group`, `epoch_time`) VALUES ('".$chat_id."', '".$rival_id."', '".$currTime."')";
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
									// avisar al equipo home
									apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
									$msg = "⚔ <b>¡Le acabas de declarar la guerra al clan ".getClanLevelByMembers($rivalMembers).$rivalName."!".PHP_EOL.PHP_EOL.
									"Si aceptan el desafío la batalla comenzará automáticamente y el resultado aparecerá en los grupos participantes.".PHP_EOL.
									"En caso de que el clan rival rechace la invitación de guerra se enviará una notificación a este grupo.</b>".PHP_EOL.PHP_EOL.
									"<i>Consulta con !guerras el número de batallas pendientes del clan y las últimas guerras libradas en Telegram.</i>";
									usleep(250000);
									apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
									// avisar al equipo away
									$requestName = $message['chat']['title'];
									$requestName = str_replace("<", "", $requestName);
									$requestName = str_replace(">", "", $requestName);
									apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "typing"));
									$msg = "⚔ <b>¡El clan ".getClanLevelByMembers($homeMembers).$requestName." os ha declarado la guerra!</b>".PHP_EOL.PHP_EOL.
									"<i>Utiliza !aceptarguerra para iniciar automáticamente la batalla o !rechazarguerra para desestimar la petición.".PHP_EOL.
									"Consulta con !guerras el número de batallas pendientes del clan y las últimas guerras libradas en Telegram.</i>";
									usleep(250000);
									apiRequest("sendMessage", array('chat_id' => $rival_id, 'parse_mode' => "HTML", "text" => $msg));
								} else {
									// si no avisar de que luchen contra otro
									apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
									$msg = "<b>No puedes declarar la guerra al mismo clan dos veces seguidas, elige otro de la lista.</b>";
									usleep(250000);
									apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
								}
							} else {
								// si no, decir que te esperes un rato
								apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
								$msg = "<b>Solo puedes declarar la guerra a otro clan una vez cada cinco horas, inténtalo más tarde.</b>";
								usleep(250000);
								apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
							}
						} else {
							// si no existe decir que no se encuentra rival o es menos de 5
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							if($ownGroup == 0) {
								$msg = "<b>El grupo escogido no existe o no tiene los miembros suficientes para luchar.</b>";
							} else {
								$msg = "<b>¡No puedes declararte la guerra a ti mismo!</b>";
							}
							usleep(250000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
						}
					} else {
						// si no, decir que no perteneces a este clan
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(250000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Para poder utilizar esta función debes pertenecer al clan. Utiliza !unirme y vuelve a intentarlo.*"));
					}
				} else {
					// si no, decir que tu grupo es peque, que se una mas gente primero
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Para poder declarar la guerra a un clan tu grupo debe tener inscritos al menos a cinco rocosos. Consulta con !rocososgrupo la lista completa de jugadores del grupo.*"));
				}
				// cerrar db
				mysql_free_result($result);
				mysql_close($link);
			} else {
				// si no esta bien, decir que esta mal
				error_log($logname." triggered in a group and failed: !declararguerra.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No se ha encontrado el clan especificado, debes usar la función seguida del número correspondiente al clan al que atacar, por ejemplo \"!declararguerra 5\". A continuación aparecerá la lista de clanes disponibles:*"));
				sleep(2);
				getClanList($chat_id);
			}
		} else {
			error_log($logname." triggered in private: !declararguerra.");
			// mensaje de que esto es para grupos, retarded
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Las guerras entre clanes no se pueden declarar desde chat privado, utiliza la función en el grupo participante.*"));
		}
	} else if (strpos(strtolower($text), "!aceptarguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !aceptarguerra.");
			// abrir db
			$link = dbConnect();
			$query = 'SELECT groupbattlelog.gbl_id, groupbattlelog.home_group, groupbattle.name FROM groupbattlelog, groupbattle WHERE groupbattlelog.home_group = groupbattle.group_id AND status = "REQUESTED" AND away_group = '.$chat_id.' ORDER BY epoch_time ASC LIMIT 0, 1';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// revisar si tiene alguna guerra pendiente
			if(isset($row['gbl_id'])) {
				$logToUpdate = "";
				(string)$logToUpdate = $logToUpdate.$row['gbl_id'];
				$homegroup_id = $row['home_group'];
				$awaygroup_id = $chat_id;
				$homeGroupName = $row['name'];
				$awayGroupName = $message['chat']['title'];
				$awayGroupName = str_replace("<", "", $awayGroupName);
				$awayGroupName = str_replace(">", "", $awayGroupName);
				mysql_free_result($result);
				$user_id = $message['from']['id'];
				$query = 'SELECT group_id FROM playerbattle WHERE user_id = '.$user_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				// si existe, revisar que quien usa esta función pertenezca al clan
				if($chat_id == $row['group_id']) {
					mysql_free_result($result);
					$query = 'SELECT COUNT( pb.user_id ) AS  "members", pb.group_id, SUM( pb.hp + pb.attack + pb.defense + pb.critic + pb.critic + pb.critic + pb.speed + pb.helmet + pb.helmet + pb.helmet + pb.body + pb.boots + pb.weapon + pb.shield ) AS  "totalpower", gb.clan_avatar FROM playerbattle pb, groupbattle gb WHERE pb.group_id IN ( '.$homegroup_id.',  '.$awaygroup_id.' ) AND pb.group_id = gb.group_id GROUP BY pb.group_id ORDER BY FIELD( pb.group_id, '.$homegroup_id.',  '.$awaygroup_id.' )';
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					if(isset($row['group_id'])) {
						$homeGroupMembers = $row['members'];
						$homeGroupPower = $row['totalpower'];
						$homeGroupAvatar = $row['clan_avatar'];
					} else {
						$homeGroupMembers = 0;
						$homeGroupPower = 0;
					}
					$row = mysql_fetch_array($result);
					if(isset($row['group_id'])) {
						$awayGroupMembers = $row['members'];
						$awayGroupPower = $row['totalpower'];
						$awayGroupAvatar = $row['clan_avatar'];
					} else {
						$awayGroupMembers = 0;
						$awayGroupPower = 0;
					}
					// si la tiene revisar si tu grupo sigue siendo **, pillar los miembros y poder de ambos clanes, y tambien los nombres
					if($homeGroupMembers > 4 && $awayGroupMembers > 4) {
						// si sigue, aceptar la guerra, avisar en ambos clanes
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(50000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>¡Se ha aceptado la guerra contra el clan ".$homeGroupName."! El resumen de la batalla aparecerá a continuación en los clanes participantes en cuanto esté disponible. Todos los rocosos del clan ganador recibirán energías para volver a utilizar las funciones !exp y !atacar inmediatamente. Además, el jugador que mejor luche en esta batalla recibirá también un punto de líder en rocosidad.</b>")); //  Todos los rocosos del clan ganador recibirán energías para volver a utilizar las funciones !exp y !atacar inmediatamente.
						apiRequest("sendChatAction", array('chat_id' => $homegroup_id, 'action' => "typing"));
						usleep(50000);
						apiRequest("sendMessage", array('chat_id' => $homegroup_id, 'parse_mode' => "HTML", "text" => "<b>¡El clan ".$awayGroupName." ha aceptado vuestra solicitud de guerra pendiente! El resumen de la batalla aparecerá a continuación en los clanes participantes en cuanto esté disponible. Todos los rocosos del clan ganador recibirán energías para volver a utilizar las funciones !exp y !atacar inmediatamente. Además, el jugador que mejor luche en esta batalla recibirá también un punto de líder en rocosidad.</b>"));
						// y editar db, la de guerra pendiente como aceptada
						mysql_free_result($result);
						$query = "UPDATE groupbattlelog SET status = 'ACCEPTED' WHERE gbl_id = ".$logToUpdate;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						sleep(1);
						// librar batalla
						if($homeGroupPower >= $awayGroupPower) {
							$homeIsStronger = 1;
							$powerDiff = $homeGroupPower - $awayGroupPower;
							$membersDiff = $homeGroupMembers - $awayGroupMembers;
						} else {
							$homeIsStronger = 0;
							$powerDiff = $awayGroupPower - $homeGroupPower;
							$membersDiff = $awayGroupMembers - $homeGroupMembers;
						}
						if($homeIsStronger == 1) {
							$percentHigher = (($homeGroupPower * 100) / $awayGroupPower) - 100;
						} else {
							$percentHigher = (($awayGroupPower * 100) / $homeGroupPower) - 100;
						}
						error_log("Percent diff. +".$percentHigher);
						if($percentHigher < 10) {
							// tener en cuenta los miembros
							if($membersDiff >= 0) {
								// 90
								$battleTicket = rand(1,10);
								if($battleTicket < 10) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							} else {
								// 30
								$battleTicket = rand(1,10);
								if($battleTicket < 4) {
									$win = 1;
									$lucky = 0;
								} else {
									$win = 0;
									$lucky = 1;
								}
							}
						} else if($percentHigher > 300) {
							// 99,99
							$battleTicket = rand(1,10000);
							if($battleTicket < 10000) {
								$win = 1;
								$lucky = 0;
							} else {
								$win = 0;
								$lucky = 1;
							}
						} else if($percentHigher > 200) {
							// 95
							$battleTicket = rand(1,20);
							if($battleTicket < 20) {
								$win = 1;
								$lucky = 0;
							} else {
								$win = 0;
								$lucky = 1;
							}
						} else if($percentHigher > 100) {
							// 90
							$battleTicket = rand(1,10);
							if($battleTicket < 10) {
								$win = 1;
								$lucky = 0;
							} else {
								$win = 0;
								$lucky = 1;
							}
						} else if($percentHigher > 50) {
							// 85
							$battleTicket = rand(1,20);
							if($battleTicket < 18) {
								$win = 1;
								$lucky = 0;
							} else {
								$win = 0;
								$lucky = 1;
							}
						} else {
							// 75
							$battleTicket = rand(1,20);
							if($battleTicket < 16) {
								$win = 1;
								$lucky = 0;
							} else {
								$win = 0;
								$lucky = 1;
							}
						}
						error_log("GROUPWINLUCKY ".$win.$lucky);
						if($homeIsStronger == 1) {
							if($win == 1) {
								$winner_id = $homegroup_id;
								$winnerName = $homeGroupName;
								$loser_id = $awaygroup_id;
								$loserName = $awayGroupName;
							} else {
								$winner_id = $awaygroup_id;
								$winnerName = $awayGroupName;
								$loser_id = $homegroup_id;
								$loserName = $homeGroupName;
							}
						} else {
							if($win == 0) {
								$winner_id = $homegroup_id;
								$winnerName = $homeGroupName;
								$loser_id = $awaygroup_id;
								$loserName = $awayGroupName;
							} else {
								$winner_id = $awaygroup_id;
								$winnerName = $awayGroupName;
								$loser_id = $homegroup_id;
								$loserName = $homeGroupName;
							}
						}
						sleep(1);
						$query = "SELECT pb.user_id, ub.first_name, ub.user_name FROM playerbattle pb, userbattle ub WHERE pb.user_id = ub.user_id AND pb.group_id = ".$winner_id." GROUP BY pb.user_id ORDER BY pb.exp_points DESC";
 						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$users = array();
						while ($row_user = mysql_fetch_assoc($result)) {
							$users[] = $row_user;
						}
						mysql_free_result($result);
						$totalUsers = count($users);
						$totalUsers = $totalUsers - 1;
						$selectedUserA = rand(0, $totalUsers);
						$selectedUserB = rand(0, $totalUsers);
						$selectedUserC = rand(0, $totalUsers);
						if($selectedUserA < $selectedUserB) {
							if($selectedUserA < $selectedUserC) {
								$selectedUser = $selectedUserA;
							} else {
								$selectedUser = $selectedUserC;
							}
						} else {
							if($selectedUserB < $selectedUserC) {
								$selectedUser = $selectedUserB;
							} else {
								$selectedUser = $selectedUserC;
							}
						}
						$mvpName = getFullName($users[$selectedUser]['first_name'], $users[$selectedUser]['user_name']);
						$mvpName = removeEmoji($mvpName);
						$mvp_id = $users[$selectedUser]['user_id'];
						$currentTime = time();
						$fullDate = date("l, j F Y. (H:i:s)", $currentTime);
						$fullDate = translateDate($fullDate);
						// insert en groupbattleresults, guardar registro de guerra (una db con winner id y loser id ayudaria luego a saber los pvp points)
						$query = "INSERT INTO `groupbattleresults` (`home_group`, `away_group`, `winner_group`, `mvp`, `date`) VALUES ('".$homegroup_id."', '".$awaygroup_id."', '".$winner_id."', '".$mvpName."', '".$fullDate."');";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						// sumarle +1 a las victorias de los playerbattle grupales
						$query = "UPDATE playerbattle SET pvp_group_wins = pvp_group_wins + 1 WHERE group_id = ".$winner_id;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						$query = "UPDATE playerbattle SET last_exp = last_exp - 600, last_boss = last_boss - 36000 WHERE level < 100 AND last_boss > 1000 AND group_id = ".$winner_id;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						$query = "UPDATE `playerbattle` SET `war_mvp` = `war_mvp` + 1 WHERE `user_id` = '".$mvp_id."'";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						sleep(1);
						// mostrar el resumen de batalla
						getGroupBattleResult($homeGroupName, $homeGroupMembers, $awayGroupName, $awayGroupMembers, $winnerName, $loserName, $lucky, $homeGroupAvatar, $awayGroupAvatar, $homegroup_id, $chat_id, $mvpName);
					} else {
						// si no, decir que no tienes miembros para aceptarla y sugerir lo de !rechazarguerra
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(100000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>Uno de los dos clanes ha perdido varios miembros y no está disponible para la guerra, inténtalo más tarde o utiliza !rechazarguerra para eliminar la solicitud pendiente de guerra con el clan ".$homeGroupName.".</b>"));
					}
				} else {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Para poder utilizar esta función debes pertenecer al clan. Utiliza !unirme y vuelve a intentarlo.*"));
				}
			} else {
				// si no, avisar de que no tienes solicitudes de guerra pendientes
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Este grupo no tiene ninguna guerra pendiente.*"));
			}
			// cerrar db
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." triggered in private: !aceptarguerra.");
			// mensaje de que esto es para grupos, retarded
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Las guerras entre clanes no se pueden aceptar desde chat privado, utiliza la función en el grupo participante.*"));
		}
	} else if (strpos(strtolower($text), "!rechazarguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !rechazarguerra.");
			// abrir db
			$link = dbConnect();
			$query = 'SELECT groupbattlelog.gbl_id, groupbattlelog.home_group, groupbattle.name FROM groupbattlelog, groupbattle WHERE groupbattlelog.home_group = groupbattle.group_id AND status = "REQUESTED" AND away_group = '.$chat_id.' ORDER BY epoch_time ASC LIMIT 0, 1';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			// revisar si tiene alguna guerra pendiente (la pending mas old)
			if(isset($row['gbl_id'])) {
				// si la tiene rechazar guerra
				$rowToUpdate = "";
				(string)$rowToUpdate = $rowToUpdate.$row['gbl_id'];
				$homeName = $row['name'];
				$awayName = $message['chat']['title'];
				$awayName = str_replace("<", "", $awayName);
				$awayName = str_replace(">", "", $awayName);
				$rival_id = $row['home_group'];
				mysql_free_result($result);
				$user_id = $message['from']['id'];
				$query = 'SELECT group_id FROM playerbattle WHERE user_id = '.$user_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				// si existe, revisar que quien usa esta función pertenezca al clan
				if($chat_id == $row['group_id']) {	
					mysql_free_result($result);
					// avisar en ambos clanes, y editar muchas db, la de guerra pendiente como rechazada
					$resetTime = 3600 * 5;	
					$query = "UPDATE groupbattlelog SET status = 'REJECTED', epoch_time = ".$resetTime." WHERE gbl_id = ".$rowToUpdate;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					// mostrar todos los datos necesarios con sleep(1) y revisar que todo quede bien aqui
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$msg = "❌ <b>La declaración de guerra recibida del clan ".$homeName." ha sido rechazada.</b>";
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					apiRequest("sendChatAction", array('chat_id' => $rival_id, 'action' => "typing"));
					$msg = "❌ <b>El clan ".$awayName." ha rechazado la declaración de guerra pendiente emitida con anterioridad desde este grupo.</b>";
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $rival_id, 'parse_mode' => "HTML", "text" => $msg));
				} else {
					// si no, decir que no perteneces a este clan
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Para poder utilizar esta función debes pertenecer al clan. Utiliza !unirme y vuelve a intentarlo.*"));
				}
			} else {
				// si no, avisar de que no tienes solicitudes de guerra pendientes
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Este grupo no tiene ninguna guerra pendiente.*"));
			}
			// cerrar db
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." triggered in private: !rechazarguerra.");
			// mensaje de que esto es para grupos, retarded
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Las guerras entre clanes no se pueden rechazar desde chat privado, utiliza la función en el grupo participante.*"));
		}
	} else if (strpos(strtolower($text), "!ludopata") !== false || strpos(strtolower($text), "!ludópata") !== false) {
		error_log($logname." triggered: !ludopata.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		$result = getLudo($message['from']['id']);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
	} else if (strpos(strtolower($text), "!moneda") !== false) {
		if($randomTicket > -3) {
			error_log($logname." triggered: !moneda.");
			$link = dbConnect();
			$query = "SELECT last_flip FROM `flipcoin` WHERE fc_id = 01";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$flip = $row['last_flip'];
			mysql_free_result($result);		
			$time = time() - 60;
			if($time >= $flip) {
				$time = $time + 60;
				$query = "UPDATE `flipcoin` SET `user_id` = '".$message['from']['id']."', `group_id` = '".$chat_id."', `last_flip` = '".$time."', `times_flipped` = `times_flipped` + 1 WHERE `fc_id` = '01'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);		
				mysql_close($link);
				$keyboardButton = (object) ["text" => "Girar la moneda", "callback_data" => "FLIPCOINqGq3Z6yf1guhfgFdwkzt"];
				apiRequestJson("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*¿Cara o cruz? ¡Piensa en un resultado y pulsa el botón para girar la moneda!*", "reply_markup" => ["inline_keyboard" => [[$keyboardButton,]] ]));
			} else {
				mysql_close($link);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Alguien está usando mi moneda y no me quedan más. Espera un minuto y usa !moneda de nuevo.*"));
			}
		} else {
				error_log($logname." tried to trigger and failed due to group restrictions: !moneda.");
		}
	} else if (strpos(strtolower($text), "!sugerencia") === 0 && strlen($text) > 15) {
		error_log($logname." triggered: !sugerencia.");
		$msg = "Sugerencia entrante de ";
		if(isset($message['from']['first_name'])) {
			$msg = $msg.$message['from']['first_name'];
		}
		if(isset($message['from']['username'])) {
			$msg = $msg." (@".$message['from']['username'].")";
		}
		$msg = $msg." [".$message['from']['id']."]:".PHP_EOL.PHP_EOL;
		$msg = $msg.substr($text, 12);
		apiRequest("sendMessage", array('chat_id' => 6250647, "text" => $msg));
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		$msg = "*El mensaje ha sido enviado correctamente y será revisado por el administrador del bot lo antes posible.*".PHP_EOL;
		$msg = $msg."_Recuerda utilizar correctamente esta función ya que su uso indebido añadirá tu cuenta a la lista de ignorados por la función \"!sugerencia\"._";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
	} else if (strpos(strtolower($text), "!texto") === 0) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			if(strlen($text) > 6) {
				$user_id = $message['from']['id'];
				$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
				$isAdmin = 0;
				for($i=0;$i<sizeof($adminList);$i++) {
					if($adminList[$i]['user']['id'] == $user_id) {
						$isAdmin = 1;
					}
				}
				if($user_id == 6250647) {
					$isAdmin = 1;
				}
				if($isAdmin == 1) {
					if($text == "!texto off") {
						error_log($logname." deleted custom group text.");
						$link = dbConnect();
						$query = "UPDATE `groupbattle` SET `custom_text` = NULL WHERE `group_id` = ".$chat_id;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						mysql_close($link);
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(250000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El mensaje personalizado ha sido eliminado.*"));
					} else {
						error_log($logname." set a new text message.");
						$text = ltrim(rtrim(substr($text, 6, 2500)));
						if($text == "") {
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(250000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Has introducido un mensaje de texto vacío. El resultado no se ha guardado.*"));
						} else {
							$link = dbConnect();
							$text = str_replace("'", "''", $text);
							$query = "SET NAMES utf8mb4;";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$query = "UPDATE `groupbattle` SET `custom_text` = '".$text."' WHERE `group_id` = ".$chat_id;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							mysql_close($link);
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(250000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha guardado el mensaje personalizado.*"));
						}
					}
				} else {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					error_log($logname." tried to edit or delete a group text not being admin.");
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Solo los administradores del grupo pueden editar o eliminar el mensaje personalizado.*"));
				}
			} else {
				error_log($logname." triggered: !texto.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				$link = dbConnect();
				$query = "SELECT custom_text FROM groupbattle WHERE group_id = '".$chat_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if($row['custom_text'] == "") {
					$result = "<b>No se ha establecido ningún texto personalizado para este grupo.</b>".PHP_EOL.
								"Puedes crear uno si eres administrador del grupo escribiendo \"!texto mensaje_a_enviar\".".PHP_EOL.
								"El mensaje será formateado como texto HTML, por lo que puedes escribir en negrita, cursiva, o crear enlaces.".PHP_EOL.
								"<i>Nota: En caso de utilizar etiquetas HTML recuerda cerrarlas todas correctamente, de lo contrario, el mensaje no se mostrará.</i>";
				} else {
					$result = $row['custom_text'];
				}
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
				mysql_free_result($result);
				mysql_close($link);
			}
		} else {
			error_log($logname." tried to trigger and failed: !texto.");
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Esta función solo está disponible para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!bienvenida") === 0) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			if(strlen($text) > 12) {
				$user_id = $message['from']['id'];
				$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
				$isAdmin = 0;
				for($i=0;$i<sizeof($adminList);$i++) {
					if($adminList[$i]['user']['id'] == $user_id) {
						$isAdmin = 1;
					}
				}
				if($user_id == 6250647) {
					$isAdmin = 1;
				}
				if($isAdmin == 1) {
					if($text == "!bienvenida off") {
						error_log($logname." deleted welcome group text.");
						$link = dbConnect();
						$query = "UPDATE `groupbattle` SET `welcome_text` = NULL WHERE `group_id` = ".$chat_id;
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						mysql_free_result($result);
						mysql_close($link);
						apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
						usleep(250000);
						apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El mensaje de bienvenida se ha desactivado.*"));
					} else {
						error_log($logname." set a new welcome message.");
						$text = ltrim(rtrim(substr($text, 12, 2500)));
						if($text == "") {
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(250000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Has introducido un mensaje de texto vacío. El resultado no se ha guardado.*"));
						} else {
							$link = dbConnect();
							$text = str_replace("'", "''", $text);
							$query = "SET NAMES utf8mb4;";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$query = "UPDATE `groupbattle` SET `welcome_text` = '".$text."' WHERE `group_id` = ".$chat_id;
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							mysql_close($link);
							apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
							usleep(250000);
							apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha guardado el mensaje de bienvenida personalizado.*"));
						}
					}
				} else {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(250000);
					error_log($logname." tried to edit or delete a welcome text not being admin.");
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Solo los administradores del grupo pueden editar o eliminar el mensaje de bienvenida.*"));
				}
			} else {
				error_log($logname." triggered: !bienvenida.");
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				usleep(250000);
				$link = dbConnect();
				$query = "SELECT welcome_text FROM groupbattle WHERE group_id = '".$chat_id."'";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if($row['welcome_text'] == "") {
					$result = "<b>No se ha establecido ningún texto de bienvenida para este grupo.</b>".PHP_EOL.
								"Puedes crear uno si eres administrador del grupo escribiendo \"!bienvenida mensaje_a_enviar\".".PHP_EOL.
								"El mensaje será formateado como texto HTML, por lo que puedes escribir en negrita, cursiva, o crear enlaces.".PHP_EOL.
								"<i>Nota: En caso de utilizar etiquetas HTML recuerda cerrarlas todas correctamente, de lo contrario, el mensaje no se mostrará.</i>";
				} else {
					$result = $row['welcome_text'];
				}
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
				mysql_free_result($result);
				mysql_close($link);
			}
		} else {
			error_log($logname." tried to trigger and failed: !bienvenida.");
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Esta función solo está disponible para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!boton") !== false || strpos(strtolower($text), "!botón") !== false) {
		if($randomTicket > -3) {
			$currTime = time();
			error_log($logname." triggered: !boton.");
			$bombTicket = 0;
			$username = str_replace("@", "", $logname);
			$userTotal = 100;
			$link = dbConnect();
			$query = 'SELECT total, last_check FROM heroesbattle WHERE user_id = '.$user_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['total'])) {
				if( ($row['last_check'] + 15) > $currTime) {
					error_log($logname." triggered too fast: !boton.");
					mysql_free_result($result);
					mysql_close($link);
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					$text = "*Solo puedes pulsar el botón una vez cada quince segundos.*";
					usleep(250000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => $text));
					exit;
				} else {
					$userTotal = $row['total'];
				}
			} else {
				error_log($logname." is a new player!");
				mysql_free_result($result);
				$query = "INSERT INTO `heroesbattle` (`user_id`, `name`, `last_check`) VALUES ('".$user_id."', '".$username."', '".$currTime."');";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));	
			}
			mysql_free_result($result);
			$lastTotal = $userTotal;
			if($userTotal < 110) {
				$bombTicket = 1;
			} else if($userTotal < 250) {
				$bombTicket = rand(1,10);
			} else if($userTotal < 400) {
				$bombTicket = rand(2,10);
			} else if($userTotal < 500) {
				$bombTicket = rand(3,10);
			} else if($userTotal < 700) {
				$bombTicket = rand(4,10);
			} else if($userTotal < 900) {
				$bombTicket = rand(6,10);
			} else if($userTotal < 950) {
				$bombTicket = rand(9,10);
			} else {
				$bombTicket = 10;
			}
			if($bombTicket == 10) {
				if($lastTotal > 500) { 
					$penalty = rand(40,50);
				} else if($lastTotal > 300) { 
					$penalty = rand(30,40);
				} else if($lastTotal > 100) { 
					$penalty = rand(15,30);
				} else {
					$penalty = rand(5,15);
				}
				error_log($logname." loses these points: ".$penalty);
				$userTotal = $userTotal - $penalty;
				if($userTotal < 0) {
					$userTotal = 0;
				}
				$query = "UPDATE `heroesbattle` SET `name` = '".$username."', `last_check` = '".$currTime."', `total` = '".$userTotal."' WHERE `user_id` = ".$user_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$text = "*☠ ¡".$username." ha pulsado el botón y ha salido volando! 💀*";
				$text = $text.PHP_EOL."_Se restarán ".$penalty." puntos de heroicidad y el total pasará de ".$lastTotal." a ".$userTotal." punto";
				if($userTotal == 1) {
					$text = $text."._";
				} else {
					$text = $text."s._";
				}
				usleep(250000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
				usleep(100000);
				$gif = "BQADBAADQAcAApdgXwABCn7szqh0E84C";
				apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
			} else {
				if($lastTotal > 500) { 
					$victory = rand(1,5);
				} else if($lastTotal > 300) { 
					$victory = rand(2,8);
				} else if($lastTotal > 100) { 
					$victory = rand(3,9);
				} else {
					$victory = rand(10,20);
				}
				error_log($logname." wins these points: ".$victory);
				$userTotal = $userTotal + $victory;
				$query = "UPDATE `heroesbattle` SET `name` = '".$username."', `last_check` = '".$currTime."', `total` = '".$userTotal."' WHERE `user_id` = ".$user_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$text = "*✅ ¡".$username." ha pulsado el botón y se ha salvado! 🍾*";
				$text = $text.PHP_EOL."_Se sumarán ".$victory." puntos de heroicidad y el total pasará de ".$lastTotal." a ".$userTotal." punto";
				if($userTotal == 1) {
					$text = $text."._";
				} else {
					$text = $text."s._";
				}
				usleep(250000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
			}
			exit;
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !boton.");
		}	
	} else if (strpos(strtolower($text), "demisuke") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Bot mention.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			if($message['from']['username'] !== "Kamisuke"/* && $message['from']['username'] !== "OsvaldoPaniccia"*/) {
				usleep(500000);
				if(isset($message['from']['username'])) {
					$name = "@".$message['from']['username'];
					$text = gotMention($name,true);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>".$text."</b>"));
				} else if (isset($message['from']['first_name'])) {
					$text = gotMention($message['from']['first_name'],false);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>".$text."</b>"));
				} else {
					$text = gotMention("compi de grupo",false);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>".$text."</b>"));
				}
			} else {
				usleep(500000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => "<b>Hola, jefe</b> @".$message['from']['username']." 😊"));
			}
		} else {
				error_log($logname." tried to trigger and failed due to group restrictions: Bot mention.");
		}
	} else if (strpos(strtolower($text), "/botfamily_verification_code") === 0) {
		error_log($logname." triggered: /botfamily_verification_code.");
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "FC42AC7F14A98AE8C0ADD4DE443CB8AD"));
	} else if (strpos(strtolower($text), "!temazo") !== false || strpos(strtolower($text), "!cancion") !== false || strpos(strtolower($text), "!canción") !== false) {
		error_log($logname." triggered: !cancion.");
		$song = getSong();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_audio"));
		usleep(250000);
		apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => $song));
	} else if (strpos(strtolower($text), "!infomini") !== false) {
		error_log($logname." triggered: !infomini.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		$link = dbConnect();
		$query = "SELECT COUNT( * ) AS  'total_groups' FROM ( SELECT DISTINCT gb_id FROM groupbattle )dt";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$totalGroups = $row['total_groups'];
		mysql_free_result($result);
		$query = "SELECT COUNT( * ) AS  'total_active' FROM ( SELECT DISTINCT gb_id FROM groupbattle WHERE lastpoint >0 )dt";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$totalActive = $row['total_active'];
		mysql_free_result($result);
		$query = "SELECT COUNT( * ) AS  'total_users' FROM ( SELECT DISTINCT user_name FROM userbattle )dt";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$totalUsers = $row['total_users'];
		mysql_free_result($result);
		$query = "SELECT COUNT( user_id ) AS 'total_users' FROM playerbattle WHERE user_id >0";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		$totalRockMan = $row['total_users'];
		mysql_free_result($result);
		mysql_close($link);
		$text = "*".$totalUsers." personas han utilizado ya el bot.".PHP_EOL;
		$text = $text.$totalRockMan." personas luchan por ser Rocosos de Demisuke.".PHP_EOL;
		$text = $text.$totalGroups." grupos han probado ya el bot.".PHP_EOL;
		$text = $text.$totalActive." grupos participan en los minijuegos.*";
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
	} else if (strpos(strtolower($text), "!info") !== false) {
		if($randomTicket > -3) {
			$link = dbConnect();
			$query = 'SELECT time FROM commonsetup WHERE cs_id = 002';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$lastTimeCheck = $row['time'];
			mysql_free_result($result);
			$deadTime = time();
			$lastTimeCheck = $lastTimeCheck + 3600;
			if($lastTimeCheck < $deadTime) {			
				error_log($logname." triggered: !info.");
				mysql_free_result($result);
				$query = "UPDATE `commonsetup` SET `time` = '".$deadTime."' WHERE `cs_id` = 002";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				$query = "SELECT COUNT( * ) AS  'total' FROM ( SELECT DISTINCT gb_id FROM groupbattle )dt";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$total = $row['total'];
				mysql_free_result($result);
				$query = "SELECT COUNT( * ) AS  'total_active' FROM ( SELECT DISTINCT gb_id FROM groupbattle WHERE lastpoint >0 )dt";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$totalActive = $row['total_active'];
				mysql_free_result($result);
				mysql_close($link);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*Me llamo Demisuke. Soy hijo del Dios Yodo, famoso por ser el único ente del universo capaz de bautizar a alguien eternamente para ser reconocidos como hijos de Yodo por nuestras manchas marrones en la cabeza.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*Como hijo de Yodo, me puedes ver bautizado en mi foto de perfil.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*Esas manchas marrones en la cabeza son inconfundibles, me quedan de lujo.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Mi archienemigo, al igual que el de todos los que hemos sido bautizados por Yodo, es Caballo Loco, el único inmune al bautismo por su ya predeterminado tono marrón.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Cuenta la leyenda que hay varios seres superiores a Yodo, y que fueron ellos quienes bautizaron al mismísimo Yodo.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(3);
				$result = "*Pero también cuenta que estos seres supremos, pese a poder transformarse en Caballo Loco, adoran a Yodo, y como prueba de ello le realizaron el Sagrado Ritual.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Actualmente cultivo lonchas de york en escabeche, y trato de expandir la harmonía del imperio de Yodo más allá de sus tierras.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Para ello, me paseo alrededor del planeta Telegram en busca de nuevas civilizaciones, expandiendo la palabra de Yodo allá por donde voy.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*¡Ya he logrado visitar ".$total." territorios distintos!*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(3);
				$result = "*Una de las tareas que realizo allá por donde voy es la de ayudar a los demás para esparcir la buena voluntad de Yodo, y para ello pongo al alcance de los habitantes con quien me cruzo una serie de funciones que les pueden interesar.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Además llevo en mi mochila bien guardados una serie de vídeos sobre la historia de Yodo contada por sus ancestros vivientes.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*¡Pese a llevarlos guardados algún que otro habitante me los ha visto ya!*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(2);
				$result = "*Aunque cuando los encuentran comentan algo sobre huevos de pascua o algo así, no sé qué querrán decir...*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(3);
				$result = "*Actualmente tengo viajes planeados a ".$totalActive." territorios distintos para seguir ayudando a quien lo necesita, aunque cada día reviso si necesitan mi ayuda, así si no hay nadie los tacho de mi lista y tengo más tiempo para los demás.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				$result = "*¡Tengo ganas de visitar más sitios!*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
			} else {
				error_log($logname." tried to trigger and failed due to abuse: !info.");
				mysql_free_result($result);
				mysql_close($link);
				$result = "*Me han hecho contar esta historia hace nada y es muy larga, déjame descansar un rato. Dame una hora y pregúntame de nuevo.*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				exit;
			}
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !info.");
		}
	} else if (strpos(strtolower($text), "!becquer") !== false || strpos(strtolower($text), "!bequer") !== false || strpos(strtolower($text), "!becker") !== false || strpos(strtolower($text), "!bécquer") !== false) {
		error_log($logname." triggered: !becquer.");
		$text = strtolower($text);
		$text = str_replace("!bequer", "!becquer", $text);
		$text = str_replace("!becker", "!becquer", $text);
		$start = strpos(strtolower($text), "!becquer") + 9;
		$text = substr($text, $start);
		$text = "\"".ucfirst($text)."\"";
		$text = wordwrap($text, 23, "\n", false);
		$totalEOL = substr_count($text, PHP_EOL);
		if($totalEOL < 7) {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "upload_photo"));
			usleep(250000);
			$text = $text.PHP_EOL.PHP_EOL."-Gustavo Adolfo Bécquer";
			$imageURL = rand(0,9);
			$imageShortURL = "/img/becquer_".$imageURL.".jpg";
			$imageURL = dirname(__FILE__).$imageShortURL;
			header('Content-type: image/jpeg');
			$jpg_image = imagecreatefromjpeg('https://demisuke-kamigram.rhcloud.com/img/becquer.jpg');

			$textColor = imagecolorallocate($jpg_image, 63,63, 63);

			$font_path = dirname(__FILE__)."/img/handwritting.ttf";

			imagettftext($jpg_image, 28, 0, 475, 125, $textColor, $font_path, $text);

			imagejpeg($jpg_image, $imageURL);

			$target_url    = "https://api.telegram.org/bot233309633:AAFDn4aaABtKARhDrtOdQrSdy4bMR0n-4eo/sendPhoto";
		
			$file_name_with_full_path = realpath($imageURL);

			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);

			imagedestroy($jpg_image);
		} else {
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El texto introducido es muy largo, intenta ser más breve para que quepa al completo en la imagen.*"));
		}
  
		
	} else if (strpos(strtolower($text), "!cita") !== false) {
		error_log($logname." triggered: !cita.");
		getQuote($text, $chat_id);
	} else if (strpos(strtolower($text), "!squirtle") !== false) {
		error_log($logname." triggered: !squirtle.");
		getSquirtle($text, $chat_id);
	} else if (strpos(strtolower($text), "!barcelona") !== false) {
		error_log($logname." triggered: !barcelona.");
		getBarcelona($text, $chat_id);
	} else if (strpos(strtolower($text), "!madrid") !== false) {
		error_log($logname." triggered: !madrid.");
		getMadrid($text, $chat_id);
	} else if (strpos(strtolower($text), "roto2") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Roto2.");
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADdQMAApdgXwAB6_sV0eztbK0C'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: roto2.");
		}
	} else if (strpos(strtolower($text), "!video") !== false || strpos(strtolower($text), "!vídeo") !== false) {
		if($randomTicket > -3) {
			error_log($logname." found !video Easter Egg!");
			$result = getVideo();
			$result ="[👇](".$result.")";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !video Easter Egg.");
		}
	} else if (strpos(strtolower($text), "!mensajesgrupo") !== false) {
		error_log($logname." triggered: !mensajesgrupo.");
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$result = getUserBattle($message['from']['id'], 0, $chat_id, $message['chat']['title']);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			$result = "*Para usar esta función necesitas ejecutarla desde algún grupo, ¡añademe a tu grupo favorito y compite con tus amigos!*";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
		}
	} else if (strpos(strtolower($text), "!mensajes") !== false) {
		error_log($logname." triggered: !mensajes.");
		$result = getUserBattle($message['from']['id'], 1);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
	} else if (strpos(strtolower($text), "!desactivame") !== false) {
		error_log($logname." triggered: !desactivame.");
		$link = dbConnect();
		$query = 'UPDATE userbattle SET visible = FALSE WHERE user_id = '.$message['from']['id'];
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		if(isset($message['from']['username'])) {
			$text = "<b>❌ ".$message['from']['username'];
		} else if(isset($message['from']['first_name'])) {
			$text = "<b>❌ ".$message['from']['first_name'];
		} else {
			$text = "<b>❌ Tu nombre";
		}
		$text = $text." no aparecerá en las listas de usuarios más activos.</b>";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
		mysql_free_result($result);
		mysql_close($link);
	} else if (strpos(strtolower($text), "!activame") !== false) {
		error_log($logname." triggered: !activame.");
		$link = dbConnect();
		$query = 'UPDATE userbattle SET visible = TRUE WHERE user_id = '.$message['from']['id'];
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		if(isset($message['from']['username'])) {
			$text = "<b>✅ ".$message['from']['username'];
		} else if(isset($message['from']['first_name'])) {
			$text = "<b>✅ ".$message['from']['first_name'];
		} else {
			$text = "<b>✅ Tu nombre";
		}
		$text = $text." aparecerá en las listas de usuarios más activos.</b>";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
		mysql_free_result($result);
		mysql_close($link);
	} else if (strpos(strtolower($text), "!modoadmin") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$user_id = $message['from']['id'];
			$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
			$isAdmin = 0;
			for($i=0;$i<sizeof($adminList);$i++) {
				if($adminList[$i]['user']['id'] == $user_id) {
					$isAdmin = 1;
				}
			}
			if($user_id == 6250647) {
				$isAdmin = 1;
			}
			if($isAdmin == 1) {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$link = dbConnect();
				error_log($logname." triggered: !modoadmin.");
				$query = 'UPDATE groupbattle SET freemode = 0 WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*🔑 La configuración del bot será editable solo por administradores del grupo.*"));
			}
		} else {
			error_log($logname." tried to trigger in private: !modoadmin.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!modolibre") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$user_id = $message['from']['id'];
			$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
			$isAdmin = 0;
			for($i=0;$i<sizeof($adminList);$i++) {
				if($adminList[$i]['user']['id'] == $user_id) {
					$isAdmin = 1;
				}
			}
			if($user_id == 6250647) {
				$isAdmin = 1;
			}
			if($isAdmin == 1) {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$link = dbConnect();
				error_log($logname." triggered: !modolibre.");
				$query = 'UPDATE groupbattle SET freemode = 1 WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*🔑 La configuración del bot será editable por todos los usuarios del grupo.*"));
			}
		} else {
			error_log($logname." tried to trigger in private: !modoadmin.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!modo") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			error_log($logname." triggered: !modo.");
			$link = dbConnect();
			showMode($chat_id);
			mysql_close($link);
		} else {
			error_log($logname." tried to trigger in private: !modo.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!bloquearpole") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$user_id = $message['from']['id'];
			$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
			$isAdmin = 0;
			for($i=0;$i<sizeof($adminList);$i++) {
				if($adminList[$i]['user']['id'] == $user_id) {
					$isAdmin = 1;
				}
			}
			if($user_id == 6250647) {
				$isAdmin = 1;
			}
			if($isAdmin == 1) {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$link = dbConnect();
				error_log($logname." triggered: !bloquearpole.");
				$query = 'UPDATE groupbattle SET flagblock = 1 WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*🔑 Los minijuegos 'Captura la bandera' y 'Reclama el mástil' no estarán disponibles en este grupo.*"));
			}
		} else {
			error_log($logname." tried to trigger in private: !modoadmin.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!permitirpole") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$user_id = $message['from']['id'];
			$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
			$isAdmin = 0;
			for($i=0;$i<sizeof($adminList);$i++) {
				if($adminList[$i]['user']['id'] == $user_id) {
					$isAdmin = 1;
				}
			}
			if($user_id == 6250647) {
				$isAdmin = 1;
			}
			if($isAdmin == 1) {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				$link = dbConnect();
				error_log($logname." triggered: !permitirpole.");
				$query = 'UPDATE groupbattle SET flagblock = 0 WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				mysql_free_result($result);
				mysql_close($link);
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*🔑 Los minijuegos 'Captura la bandera' y 'Reclama el mástil' han sido habilitados para este grupo. ¡Buena suerte!*"));
			}
		} else {
			error_log($logname." tried to trigger in private: !modoadmin.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!cambiarmodo") !== false) {
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$isAdmin = 0;
			$link = dbConnect();
			$query = 'SELECT mode, freemode FROM groupbattle WHERE group_id = '.$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$currMode = $row['mode'];
			$freeMode = $row['freemode'];
			mysql_free_result($result);			
			$user_id = $message['from']['id'];
			$adminList = apiRequest("getChatAdministrators", array('chat_id' => $chat_id,));
			for($i=0;$i<sizeof($adminList);$i++) {
				if($adminList[$i]['user']['id'] == $user_id) {
					$isAdmin = 1;
				}
			}
			if($user_id == 6250647) {
				$isAdmin = 1;
			}
			if($isAdmin == 1 || $freeMode == 1) {
				$link = dbConnect();
				error_log($logname." triggered: !cambiarmodo.");
				switch($currMode) {
					case 0: $mode = -1;
							break;
					case -1: $mode = -2;
							break;
					case -2: $mode = -3;
							break;
					case -3: $mode = -4;
							break;
					case -4: $mode = 0;
							break;
					default: $mode = 0;
							break;
				}
				$text = strtolower($text);
				$text = substr($text, (strpos($text, "!cambiarmodo") + 13 ));
				$text = ltrim(rtrim($text));
				if(is_numeric($text)) {
					switch($text) {
						case 0: $mode = 0;
								break;
						case 1: $mode = -1;
								break;
						case 2: $mode = -2;
								break;
						case 3: $mode = -3;
								break;
						case 4: $mode = -4;
								break;
						default: break;
					}
				}
				$query = 'UPDATE groupbattle SET mode = '.$mode.' WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				showMode($chat_id);
			}
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." tried to trigger in private and failed: !cambiarmodo.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!mastil") !== false || strpos(strtolower($text), "!mástil") !== false) {
		error_log($logname." triggered: !mastil.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$result = getPoleBattle($message['from']['id'], $chat_id, $message['chat']['title']);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			$result = "*Para usar esta función necesitas ejecutarla desde algún grupo, ¡añademe a tu grupo favorito y compite con tus amigos!*";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
		}
	} else if (strpos(strtolower($text), "!heroesgrupo") !== false || strpos(strtolower($text), "!héroesgrupo") !== false) {
		error_log($logname." triggered: !heroesgrupo.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$result = getHeroesBattle($message['from']['id'], 0, $chat_id, $message['chat']['title']);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			$result = "*Para usar esta función necesitas ejecutarla desde algún grupo, ¡añademe a tu grupo favorito y compite con tus amigos!*";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
		}
	} else if (strpos(strtolower($text), "!heroes") !== false || strpos(strtolower($text), "!héroes") !== false) {
		error_log($logname." triggered: !heroes.");
		$result = getHeroesBattle($message['from']['id'], 1);
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
	} else if (strpos(strtolower($text), "!banderasgrupo") !== false) {
		error_log($logname." triggered: !banderasgrupo.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$result = getFlagBattle($message['from']['id'], 0, $chat_id, $message['chat']['title']);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
		} else {
			$result = "*Para usar esta función necesitas ejecutarla desde algún grupo, ¡añademe a tu grupo favorito y compite con tus amigos!*";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
		}
	} else if (strpos(strtolower($text), "!banderas") !== false) {
		error_log($logname." triggered: !banderas.");
		$result = getFlagBattle($message['from']['id'], 1);
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
	} else if (strpos(strtolower($text), "!pole") !== false) {
		$link = dbConnect();
		$from_id = $message['from']['id'];
		$currentTime = time();
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$query = 'SELECT flagblock FROM groupbattle WHERE group_id = '.$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$flagIsBlocked = $row['flagblock'];
			mysql_free_result($result);	
		} else {
			$flagIsBlocked = 0;
		}
		if($flagIsBlocked == 0) {
			error_log($logname." triggered: !pole.");
			$query = 'SELECT last_check, penalty FROM lastpolecheck WHERE user_id = '.$from_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['last_check'])) {
				$lastCheck = $row['last_check'];
				$penalty = 20 * $row['penalty'];
				$lastCheck = $lastCheck + $penalty;
				if($currentTime > $lastCheck) {
					mysql_free_result($result);	
					$query = 'UPDATE lastpolecheck SET last_check = '.$currentTime.', penalty = 1 WHERE user_id = '.$from_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));	
				} else {
					error_log($logname." got a penalty!");
					$penalty = $row['penalty'];
					mysql_free_result($result);
					switch($penalty){
						case 1: $newPenalty = 3;
								break;
						case 3: $newPenalty = 6;
								break;
						case 6: $newPenalty = 15;
								break;
						case 15: $newPenalty = 45;
								break;
						case 45: $newPenalty = 90;
								break;
						case 90: $newPenalty = 180;
								break;
						case 180: $newPenalty = 540;
								break;
						case 540: $newPenalty = 2160;
								break;
						case 2160: $newPenalty = 4320;
								break;
						case 4320: $newPenalty = 4320;
								break;
						default: $newPenalty = 4320;
								break;
					}
					$query = 'UPDATE lastpolecheck SET last_check = '.$currentTime.', penalty = '.$newPenalty.' WHERE user_id = '.$from_id;
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));	
					$logname = str_replace("@","",$logname);
					$penaltyMsg = "💀 *".$logname." ha sido sancionado con ";
					switch($newPenalty){
						case 1: $penaltyMsg = $penaltyMsg."veinte segundos";
								break;
						case 3: $penaltyMsg = $penaltyMsg."un minuto";
								break;
						case 6: $penaltyMsg = $penaltyMsg."dos minutos";
								break;
						case 15: $penaltyMsg = $penaltyMsg."cinco minutos";
								break;
						case 45: $penaltyMsg = $penaltyMsg."quince minutos";
								break;
						case 90: $penaltyMsg = $penaltyMsg."treinta minutos";
								break;
						case 180: $penaltyMsg = $penaltyMsg."una hora";
								break;
						case 540: $penaltyMsg = $penaltyMsg."tres horas";
								break;
						case 2160: $penaltyMsg = $penaltyMsg."doce horas";
								break;
						case 4320: $penaltyMsg = $penaltyMsg."un día";
								break;
						default: $penaltyMsg = $penaltyMsg."un día";
								break;
					}
					$penaltyMsg = $penaltyMsg." de penalización por uso reiterado de la función \"!pole\".*";
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $penaltyMsg));
					mysql_free_result($result);
					mysql_close($link);
					exit;
				}
			} else {
				mysql_free_result($result);	
				$query = "INSERT INTO `lastpolecheck` (`user_id`, `last_check`, `penalty`) VALUES ('".$from_id."', '".$currentTime."', '1');";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));	
			}
			mysql_free_result($result);				
			$minutes = date('i');
			$seconds = date('s');
			$hour = date('g');
			$currentTime = $currentTime - ($minutes * 60) - $seconds;
			$randomizer = rand(5000, 20000);
			$strLastDigit = "Last from ".$currentTime;
			$lastDigit = $strLastDigit[strlen($strLastDigit) - 1];
			$randMultiplier = rand(3,6);
			$randomizer = $randomizer * $randMultiplier;
			usleep($randomizer);
			mysql_free_result($result);
			$avoidPoleCapture = 0;
			$query = 'SELECT user_id, last_flag FROM flagcapture WHERE fc_id = 0001';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if($row['last_flag'] != $currentTime && (int)$lastDigit == 0) {
				mysql_free_result($result);
				$randomizer = rand(5000, 20000);
				$randMultiplier = rand(3,6);
				$randomizer = $randomizer * $randMultiplier;
				usleep($randomizer);
				$query = 'SELECT user_id, last_flag FROM flagcapture WHERE fc_id = 0001';
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				if($row['last_flag'] != $currentTime) {
					if (isset($message['from']['username'])) {
						$name = $message['from']['username'];
					} else if (isset($message['from']['first_name'])) {
						$name = $message['from']['first_name'];
					} else {
						$name = "Desconocido";
					}
					$checkMax = 0;
					if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
						$usersGroupCount = apiRequest("getChatMembersCount", array('chat_id' => $chat_id));
					} else {
						$usersGroupCount = 17025;
					}
					if($from_id != $row['user_id'] && $usersGroupCount > 4) {
						$total = 1;
						$cleanName = str_replace("'","''",$name);
						mysql_free_result($result);
						$query = "SELECT fc_id, total FROM flagcapture WHERE group_id = '".$chat_id."' AND user_id = '".$from_id."'";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$row = mysql_fetch_array($result);
						if(isset($row['fc_id'])) {
							if($row['fc_id'] > 1) {
								$subTotal = $row['total'];
								mysql_free_result($result);
								$query = "SELECT user_id, user_name, SUM(total) AS total FROM flagcapture WHERE user_id = '".$from_id."' GROUP BY user_id";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								$row = mysql_fetch_array($result);
								$newSeekerTotal = $row['total'];
								mysql_free_result($result);
								$query = "SELECT SUM(total) AS total FROM flagcapture WHERE total > 0 GROUP BY user_id ORDER BY total DESC , last_flag LIMIT 9, 1";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								$row = mysql_fetch_array($result);
								$extraInventory = $row['total'];
								$totalPlusInventory = $newSeekerTotal - $extraInventory;
								if($totalPlusInventory < 20) {
									error_log($logname." got a new flag!");
									mysql_free_result($result);
									checkPoint($hour, $chat_id, $link, $logname, $currentTime);
									$total = 1 + $subTotal; 
									mysql_free_result($result);
									if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
										$chatTitle = str_replace("'","''",$message['chat']['title']);
									} else {
										$chatTitle = "su homocueva";
									}
									$query = "SET NAMES utf8mb4;";
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
									$query = "UPDATE `flagcapture` SET `group_name` = '".$chatTitle."', `user_name` = '".$cleanName."', `last_flag` = '".$currentTime."', `total` = '".$total."' WHERE `group_id` = ".$chat_id." AND `user_id` = ".$message['from']['id'];
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								} else {
									error_log($logname." has full inventory.");
									$checkMax = 1;
									$text = "<b>🏴❌ ¡".$name." ha encontrado otra bandera, ¡pero ya tiene el inventario lleno!</b> 🚫";
								}
							}
						} else {
							mysql_free_result($result);
							$query = "SELECT user_id, user_name, SUM(total) AS total FROM flagcapture WHERE user_id = '".$from_id."' GROUP BY user_id";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							if(isset($row['total'])) {
								$newSeekerTotal = $row['total'];
							} else {
								$newSeekerTotal = 0;
							}
							mysql_free_result($result);
							$query = "SELECT SUM(total) AS total FROM flagcapture WHERE total > 0 GROUP BY user_id ORDER BY total DESC , last_flag LIMIT 9, 1";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							$extraInventory = $row['total'];
							$totalPlusInventory = $newSeekerTotal - $extraInventory;
							if($totalPlusInventory < 20) {
								mysql_free_result($result);
								checkPoint($hour, $chat_id, $link, $logname, $currentTime);
								mysql_free_result($result);
								error_log($logname." got a flag for the first time!");
								$user_id = $message['from']['id'];
								if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
									$chatTitle = str_replace("'","''",$message['chat']['title']);
								} else {
									$chatTitle = "su homocueva";
								}
								$query = "SET NAMES utf8mb4;";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								$query = "INSERT INTO `flagcapture` (`group_id`, `user_id`, `group_name`, `user_name`, `last_flag`, `total`) VALUES ('".$chat_id."', '".$user_id."', '".$chatTitle."', '".$cleanName."', '".$currentTime."', '1')";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							} else {
								error_log($logname." has full inventory.");
								$checkMax = 1;
								$text = "<b>🏴❌ ¡".$name." ha encontrado otra bandera, ¡pero ya tiene el inventario lleno!</b> 🚫";
							}
						}
						if($checkMax == 0) {
							mysql_free_result($result);
							$query = "UPDATE `flagcapture` SET `user_id` = '".$from_id."', `user_name` = '".$cleanName."', `last_flag` = '".$currentTime."' WHERE `fc_id` = '0001'";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$text = "<b>🚩🏃 ¡".$name." acaba de capturar la bandera de la";
							if($hour != 1) {
								$text = $text."s";
							}
							$timeEmoji = timeEmoji($hour, 0);
							$text = $text." ".$timeEmoji."! 🎉</b>";	
							$fullDate = date("l, j F Y. (H:i:s)", $currentTime);
							$fullDate = translateDate($fullDate);
							mysql_free_result($result);
							$query = "INSERT INTO `flagwinnerlog` (`group_id`, `user_id`, `group_name`, `user_name`, `date`, `epoch_time`, `newtotal`) VALUES ('".$chat_id."', '".$user_id."', '".$chatTitle."', '".$cleanName."', '".$fullDate."', '".$currentTime."', '".$total."')";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							mysql_free_result($result);
							$query = "SELECT COUNT( * ) AS  'total' FROM ( SELECT DISTINCT epoch_time FROM flagwinnerlog )dt";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							$disctintTotal = $row['total'];
							mysql_free_result($result);
							$query = "SELECT COUNT( * ) AS  'total' FROM ( SELECT epoch_time FROM flagwinnerlog )dt";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							$fullTotal = $row['total'];
							mysql_free_result($result);
							if($fullTotal != $disctintTotal) {
								$admin_id = 6250647;
								apiRequest("sendMessage", array('chat_id' => $admin_id, 'parse_mode' => "Markdown", "text" => "*Se han producido duplicados probablemente de ".$cleanName." en la captura de la bandera que no se han podido corregir.*"));
							}
						}
					} else if($usersGroupCount > 4) {
						$text = "<b>🏴❌ ".$name." ha encontrado otra bandera, ¡pero no puede capturar dos seguidas!</b> 🚫";
					} else {
						$text = "<b>🏴❌ ".$name." ha encontrado una bandera, ¡pero el grupo es tan pequeño que no entra!</b> 🚫";
					}
				} else {
					mysql_free_result($result);
					error_log($logname." triggered: Polefail (flag).");
					$query = "SELECT group_name, user_name FROM flagcapture WHERE last_flag = '".$currentTime."' ORDER BY fc_id";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					$row = mysql_fetch_array($result);
					$text = "🚩 <b>La bandera de la";
					if($hour != 1) {
						$text = $text."s";
					}
					$timeEmoji = timeEmoji($hour, 0);
					if($row['user_name'] == "" && $row['group_name'] == "") {
						$text = $text." ".$timeEmoji." se ha capturado justo ahora y sus datos aún están siendo registrados. ¡Suerte para la próxima!</b>";
						$avoidPoleCapture = 1;
					} else {
						$text = $text." ".$timeEmoji." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
					}
					mysql_free_result($result);
				}
			} else {
					mysql_free_result($result);
					error_log($logname." triggered: Polefail (flag).");
					$query = "SELECT group_name, user_name FROM flagcapture WHERE last_flag = '".$currentTime."' ORDER BY fc_id";
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					$row = mysql_fetch_array($result);
					$text = "🚩 <b>La bandera de la";
					if($hour != 1) {
						$text = $text."s";
					}
					$timeEmoji = timeEmoji($hour, 0);
					if($row['user_name'] == "" && $row['group_name'] == "") {
						$text = $text." ".$timeEmoji." se ha capturado justo ahora y sus datos aún están siendo registrados. ¡Suerte para la próxima!</b>";
						$avoidPoleCapture = 1;
					} else {
						$text = $text." ".$timeEmoji." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
					}
					mysql_free_result($result);
			}
			// Changing Flag to Pole
			if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
				if($avoidPoleCapture == 0) {
					if($minutes < 30) {
						$halfTime = $currentTime - 1800;
						$halfHour = $hour - 1;
					} else {
						$halfTime = $currentTime + 1800;
						$halfHour = $hour;
					}
					$query = 'SELECT user_id, lastpole FROM userbattle WHERE group_id = '.$chat_id.' AND lastpole > 0 ORDER BY lastpole DESC LIMIT 1';
					$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
					$row = mysql_fetch_array($result);
					if($row['lastpole'] != $halfTime) {
						if (isset($message['from']['username'])) {
							$name = $message['from']['username'];
						} else if (isset($message['from']['first_name'])) {
							$name = $message['from']['first_name'];
						} else {
							$name = "Desconocido";
						}
						$usersGroupCount = apiRequest("getChatMembersCount", array('chat_id' => $chat_id));
						if($from_id != $row['user_id'] && $usersGroupCount > 4) {
							$total = 1;
							$cleanName = str_replace("'","''",$name);
							mysql_free_result($result);
							$query = "SELECT totalpole FROM userbattle WHERE group_id = '".$chat_id."' AND user_id = '".$from_id."'";
							$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							$row = mysql_fetch_array($result);
							if(isset($row['totalpole'])) {
									$subTotal = $row['totalpole'];
									mysql_free_result($result);
									mysql_free_result($result);
									$query = "SELECT totalpole FROM userbattle WHERE group_id = '".$chat_id."' ORDER BY totalpole DESC , lastpole LIMIT 2, 1";
									$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
									$row = mysql_fetch_array($result);
									if(!isset($row['totalpole'])) {
										$poleInventory = 0;
									} else {
										$poleInventory = $row['totalpole'];
									}
									if(($subTotal - $poleInventory) < 20) {
										error_log($logname." got a new pole!");
										mysql_free_result($result);
										$total = 1 + $subTotal;
										$query = "UPDATE `userbattle` SET `lastpole` = '".$halfTime."', `totalpole` = '".$total."' WHERE `group_id` = ".$chat_id." AND `user_id` = ".$from_id;
										$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
										mysql_free_result($result);
										$text = $text.PHP_EOL."<b>📍🙋🏻 ¡".$name." ha reclamado el mástil de la";
										if($halfHour != 1) {
											$text = $text."s";
										}
										$timeEmoji = timeEmoji($halfHour, 1);
										$text = $text." ".$timeEmoji."! 🎉</b>";
									} else {
										error_log($logname." has full pole inventory.");
										$text = $text.PHP_EOL."<b>📍❌ ¡".$name." ha encontrado otro mástil, ¡pero ya tiene el inventario lleno!</b> 🚫";
									}
							} else {
								$text = $text.PHP_EOL."<b>📍❌ ¡".$name." necesita participar más en el grupo para poder reclamar su primer mástil!</b> 🚫";
							}
						} else if($usersGroupCount > 4) {
							$text = $text.PHP_EOL."<b>📍❌ ".$name." se ha topado con otro mástil, ¡pero no puede reclamar dos seguidos!</b> 🚫";
						} else {
							$text = $text.PHP_EOL."<b>📍❌ ".$name." se encuentra ante un mástil, ¡pero el grupo es tan pequeño que no entra!</b> 🚫";
						}
					} else {
						mysql_free_result($result);
						error_log($logname." triggered: Polefail.");
						$query = "SELECT first_name, user_name FROM userbattle WHERE group_id = ".$chat_id." AND lastpole > 0 ORDER BY lastpole DESC LIMIT 1";
						$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
						$row = mysql_fetch_array($result);
						$text = $text.PHP_EOL."📍 <b>El mástil de la";
						if($halfHour != 1) {
							$text = $text."s";
						}
						$timeEmoji = timeEmoji($halfHour, 1);
						if($row['user_name'] == "") {
							$shownName = $row['first_name'];
						} else {
							$shownName = $row['user_name'];
						}
						$text = $text." ".$timeEmoji." fue reclamado por ".$shownName.".</b>";
						mysql_free_result($result);
					}
				} else {
					$text = $text.PHP_EOL."📍 <b>Justo en esta décima de segundo el mástil no se puede consultar.</b>";
				}
			} else {
				$text = $text.PHP_EOL."<b>📍❌ El minijuego 'Reclama el mástil' está disponible solo para grupos.</b> 🚫";
			}
			// Result
			$text = $text.PHP_EOL.PHP_EOL."🏆 <i>Consulta con !banderas el ránking global de banderas, con !banderasgrupo el ránking local y con !mastiles quién ha reclamado más veces un mástil en tu grupo.</i>";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			mysql_free_result($result);
		} else {
			error_log($logname." tried to use !pole in a non-flags group and failed.");
		}
		mysql_close($link);
	} else if (strpos(strtolower($text), "!macaco") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: !macaco.");
			launchMonkey($chat_id);
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !macaco.");
		}
	} else if (strpos(strtolower($text), "!vapor") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: !vaporwave.");
			launchVaporwave($chat_id);
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !vaporwave.");
		}
	} else if (strpos($text, "/topPlayers") === 0) {
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647) {
			error_log($logname." triggered: /topPlayers.");
			$link = dbConnect();
			$query = 'SELECT pb.user_id, IF( pb.group_id IS NOT NULL , gb.name,  "Ninguno" ) AS  "clan", ub.first_name, ub.user_name, pb.level, pb.exp_points, pb.last_exp, pb.last_boss, pb.extra_points FROM playerbattle pb, userbattle ub, groupbattle gb WHERE ub.user_id = pb.user_id AND ( pb.group_id IS NULL OR gb.group_id = pb.group_id ) AND pb.user_id >0 GROUP BY pb.id_player ORDER BY pb.exp_points DESC LIMIT 0 , 30';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$msg = "<b>TOP 30 Rocosos</b>".PHP_EOL.PHP_EOL;
			$number = 1;
			while($row = mysql_fetch_array($result)) {
				$expDate = date("l, j F Y. (H:i:s)", $row['last_exp']);
				$expDate = translateDate($expDate);
				$bossDate = date("l, j F Y. (H:i:s)", $row['last_boss']);
				$bossDate = translateDate($bossDate);
				$msg = $msg."<b>".$number." - ".getFullName($row['first_name'], $row['user_name'])." Nv. ".$row['level']." (".number_format($row['exp_points'], 0, ',', '.').")</b>".PHP_EOL.
						"<b>Clan:</b> ".$row['clan'].PHP_EOL.
						"<b>Last Exp:</b> ".$expDate.PHP_EOL.
						"<b>Last Boss:</b> ".$bossDate.PHP_EOL.
						"<b>Extra Points Left:</b> ".$row['extra_points'].PHP_EOL.PHP_EOL;
				$number = $number + 1;
				if($number == 10 || $number == 20) {
					apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
					usleep(100000);
					apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
					$msg = "";
				}
			}
			mysql_free_result($result);
			mysql_close($link);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
		}
	} else if (strpos(strtolower($text), "reportad") !== false || strpos(strtolower($text), "reportadit") !== false ||strpos(strtolower($text), "reportait") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Reportado.");
			$miniTicket = rand(1,10);
			if($miniTicket > 2) {
			$gif = getReport();
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
			} else {
				$miniTicket = rand(1,2);
				if($miniTicket == 1) {
					apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADbQMAApdgXwABhQXAWGd763oC'));
				} else {
					apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADAgIAApdgXwABS2l3QF6lc-MC'));
				}
			}
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Reportado.");
		}
	} else if (strpos(strtolower($text), "ilitri") !== false || strpos(strtolower($text), "electrik") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Ilitri.");
			usleep(400000);
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADQwcAApdgXwABY4iaIlE5MVEC'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: ilitri.");
		}
	} else if (strpos(strtolower($text), "zpalomita") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Zpalomita.");
			usleep(400000);
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADgAQAApdgXwABslbJX3gzis4C'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Zpalomita.");
		}
	} else if (strpos(strtolower($text), "masmola") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Masmola.");
			usleep(400000);
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADegQAApdgXwABBwuqBxBXY94C'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Masmola.");
		}
	} else if (strpos(strtolower($text), "qmeparto") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Qmeparto.");
			usleep(400000);
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADfgQAApdgXwAByjX2_VEwhzkC'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Qmeparto.");
		}
	} else if (strpos(strtolower($text), "nusenuse") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Nusenuse.");
			usleep(400000);
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADfAQAApdgXwABjQjBkbORu5IC'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Nusenuse.");
		}
	} else if (strpos(strtolower($text), "viva veget") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Viva Vegetta.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "record_audio"));
			usleep(400000);
			$audio = "AwADBAADRAcAApdgXwABd8d_ymKOze0C";
			apiRequest("sendVoice", array('chat_id' => $chat_id, 'voice' => $audio));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Viva Vegetta.");
		}
	} else if (strpos(strtolower($text), "soy programador") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Soy programador.");
			$gif = "BQADBAADTAcAApdgXwABjiyeQQvABfQC";
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Viva Vegetta.");
		}
	} else if (strlen($text) > 1000) {
		if($randomTicket > -3) {
			error_log($logname." wrote more than 1000 characters in a same text message.");
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADhwMAApdgXwABpjPrfVQHDkoC'));
		} else {
			error_log($logname." wrote more than 1000 characters but trigger didn't pulled.");
		}
	} else if (strpos(strtolower($text), "pole") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Pole.");
			usleep(500000);
			$gif = getPole();
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Pole.");
		}
    } else if (strpos(strtolower($text), "pillo sitio") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Pillo sitio.");
			usleep(500000);
			$gif = getSpot();
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Pillo sitio.");
		}
	} else if (strpos(strtolower($text), "todas putas") !== false || strpos(strtolower($text), "tds pts") !== false || strpos(strtolower($text), "tdspts") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Tds Pts.");
			launchTdsPts($chat_id);
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Tds Pts.");
		}
	} else if (strpos(strtolower($text), "melafo") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Melafo.");
			usleep(500000);
			$gif = getHitIt();
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Melafo.");
		}
	} else if (strpos(strtolower($text), "!grupos") !== false) {
		error_log($logname." triggered: !grupos.");
		if($message['chat']['type'] == "private") {
			$myPoints = 0;
		} else {
			$myPoints = $chat_id;
		}
		$result = getGroupBattle($myPoints);
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(100000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $result));
	} else if (strpos(strtolower($text), "mis dies") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Mis dies.");
			usleep(500000);
			$gif = getMyTen();
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Mis dies.");
		}
	} else if (strpos(strtolower($text), "!sticker") !== false) {
		error_log($logname." triggered: !sticker.");
		$sticker = getSticker();
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => $sticker));
    } else if (strtolower($text) === "sticker" && $randomTicket > -2) {
		error_log($logname." triggered: sticker.");
		$sticker = getSticker();
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => $sticker));
    } else if (strpos(strtolower($text), "!nick") !== false) {
		error_log($logname." triggered: !nick.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		$nick = getNickname();
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El nombre de usuario generado automáticamente es ".$nick.".*"));
    } else if (strpos(strtolower($text), "!refran") !== false || strpos(strtolower($text), "!refrán") !== false) {
		error_log($logname." triggered: !refran.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		$text = getSaying();
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$text.".*"));
    } else if (strpos(strtolower($text), "!chiste") !== false) {
		error_log($logname." triggered: !chiste.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		$text = getJoke();
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$text.".*"));
    } else if (strpos(strtolower($text), "!historia") !== false) {
		if($randomTicket > -3) {
			error_log($logname." triggered: !historia.");
			if (isset($message['from']['first_name'])) {
				$name = $message['from']['first_name'];
			} else if (isset($message['from']['username'])) {
				$name = $message['from']['username'];
			} else {
				$name = "un inútil";
			}
			$text = tellStory(1,$name);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$text."*"));
			$text = tellStory(2,$name);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(2);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$text."*"));
			$text = tellStory(3,$name);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(2);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$text."*"));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: !historia.");
		}
	} else if ($message['chat']['type'] == "private" && $message['from']['username'] !== "Kamisuke") {
		error_log($logname." triggered: Private chat.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
    } else if ($randomTicket == 17) {
		error_log($logname." triggered: xD (random ticket).");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*xD*"));
    } else if ($randomTicket == 25) {
		error_log($logname." triggered: Ok (random ticket).");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "👍"));
    } else if ($randomTicket == 34) {
		error_log($logname." triggered: Sticker (random ticket).");
		$sticker = randomSticker();
		sleep(1);
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => $sticker));
    } else if ($randomTicket == 52) {
		error_log($logname." triggered: Fart (random ticket).");
		$fart = randomFart();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "record_audio"));
		sleep(3);
		apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => $fart));
    } else if ($randomTicket == 73 || $randomTicket == 74) {
		error_log($logname." triggered: Sentence (random ticket).");
		$sentence = randomSentence();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		sleep(2);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*".$sentence.".*"));
    } else {
		error_log("Standard Message from ".$logname." in ".$chat_id);
	}
  } else {
	 if (isset($message['new_chat_title'])) {
		if(isset($message['from']['username'])) {
			$logname = "@".$message['from']['username'];
		} else if (isset($message['from']['first_name'])) {
			$logname = $message['from']['first_name'];
		} else {
			$logname = "ID".$message['from']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		mysql_free_result($result);
		$query = 'SELECT total FROM groupbattle WHERE group_id = '.$chat_id;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['total'])) {
			if($row['total'] > 0) {
				mysql_free_result($result);
				$newtitle = $message['new_chat_title'];
				$newtitle = str_replace("'","''",$newtitle);
				$newtitle = str_replace("<","",$newtitle);
				$newtitle = str_replace(">","",$newtitle);
				$query = "SET NAMES utf8mb4;";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$query = "UPDATE `groupbattle` SET `name` = '".$newtitle."' WHERE `group_id` = ".$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			}
		}
		if($row['mode'] > -1) {
			error_log($logname." triggered: New group title.");
			$msg = "*¿".$message['new_chat_title']."?*";
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(500000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: New group title.");
		}
		mysql_free_result($result);
		mysql_close($link);
	} else if (isset($message['new_chat_photo'])) {
		if(isset($message['from']['username'])) {
			$logname = "@".$message['from']['username'];
		} else if (isset($message['from']['first_name'])) {
			$logname = $message['from']['first_name'];
		} else {
			$logname = "ID".$message['from']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if($row['mode'] > -1) {
			error_log($logname." triggered: Group photo.");
			apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: New group photo.");
		}
		mysql_free_result($result);
		mysql_close($link);
	}else if (isset($message['new_chat_member'])) {
		if(isset($message['new_chat_member']['username'])) {
			$logname = "@".$message['new_chat_member']['username'];
		} else if (isset($message['new_chat_member']['first_name'])) {
			$logname = $message['new_chat_member']['first_name'];
		} else {
			$logname = "ID".$message['new_chat_member']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode, welcome_text FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['mode'])) {
			$mode = $row['mode'];
		} else {
			$mode = 0;
		}
		$welcomeText = $row['welcome_text'];
		if($welcomeText != "") {
			$mode = 0;
		}
		if($mode > -1) {
			error_log($logname." triggered: Newcomer to group.");
			$imNewcomer = false;
			if(isset($message['new_chat_member']['username'])) {
				if($message['new_chat_member']['username'] == "DemisukeBot" || $message['new_chat_member']['username'] == "Demitest_bot") {
					$imNewcomer = true;
				} else {
					if($welcomeText != "") {
						$msg = $welcomeText;
					} else {
						$msg = "<b>¿Más gente nueva?,";
						if(isset($message['new_chat_member']['first_name'])){
							$msg = "<b>".$message['new_chat_member']['first_name'];
						} else if(isset($message['new_chat_member']['username'])) {
							$msg = "@".$message['new_chat_member']['username']."<b>";
						}
						$msg = $msg." aporta algo al grupo o te echamos en 24 horas.</b>";
					}
				}
			} else {
				if($welcomeText != "") {
					$msg = $welcomeText;
				} else {
					$msg = "<b>¿Más gente nueva?,";
					if(isset($message['new_chat_member']['first_name'])){
						$msg = "<b>".$message['new_chat_member']['first_name'];
					}
					$msg = $msg." aporta algo al grupo o te echamos en 24 horas.</b>";
				}
			}
			if($imNewcomer == false) {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			} else {
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				commandsList($chat_id, "main");
				sleep(2);
				showMode($chat_id, true);
			}
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Newcomer to group.");
		}
		mysql_free_result($result);
		mysql_close($link);	
	} else if (isset($message['left_chat_member'])) {
		if(isset($message['left_chat_member']['username'])) {
			$logname = "@".$message['left_chat_member']['username'];
		} else if (isset($message['left_chat_member']['first_name'])) {
			$logname = $message['left_chat_member']['first_name'];
		} else {
			$logname = "ID".$message['left_chat_member']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if($row['mode'] > -1) {
			error_log($logname." triggered: Left group.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(500000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*DEP. Nunca te recordaremos.*"));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Left group.");
		}
		mysql_free_result($result);
		mysql_close($link);	
	} else if (isset($message['pinned_message'])) {
		if(isset($message['from']['username'])) {
			$logname = "@".$message['from']['username'];
		} else if (isset($message['from']['first_name'])) {
			$logname = $message['from']['first_name'];
		} else {
			$logname = "ID".$message['from']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if($row['mode'] > -1) {
			error_log($logname." triggered: Pinned message.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(500000);
			if(isset($message['pinned_message']['from']['username']) && $message['pinned_message']['from']['username'] === "DemisukeBot") {
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Ahí, ahí.* 😎"));
			} else {
				$msg = "*Para poner ";
				if(isset($message['pinned_message']['text'])) {
					$msg = $msg."\"".$message['pinned_message']['text']."\"";
				} else {
					$msg = $msg."la chorrada que acabas de anclar";
				}
				$msg = $msg." podías haber puesto algún mensaje mío...*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			}
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Pinned message.");
		}
		mysql_free_result($result);
		mysql_close($link);	
	} else if (isset($message['forward_from']['username'])){
		if(isset($message['from']['username'])) {
			$logname = "@".$message['from']['username'];
		} else if (isset($message['from']['first_name'])) {
			$logname = $message['from']['first_name'];
		} else {
			$logname = "ID".$message['from']['id'];
		}
		$link = dbConnect();
		$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if($row['mode'] > -1) {
			error_log($logname." triggered: Forward (RT) message.");
			if($message['forward_from']['username'] == 'DemisukeBot' || $message['forward_from']['username'] == 'Demitest_bot') {
				if (isset($message['from']['first_name'])) {
					$name = $message['from']['first_name'];
				} else if (isset($message['from']['username'])) {
					$name = $message['from']['username'];
				} else {
					$name = "compi";
				}
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Qué grande ".$name.".* 😎"));			
			}
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Forward (RT) message.");
		}
		mysql_free_result($result);
		mysql_close($link);	
	} else if (isset($message['document']) && $message['chat']['type'] == "private") {
		if($message['from']['username'] == 'Kamisuke'){
			apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $message['document']['file_id']));	
		}
	} else if (isset($message['voice']) && $message['chat']['type'] == "private") {
		if($message['from']['username'] == 'Kamisuke'){
			apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $message['voice']['file_id']));	
		}
	} 
  }
  if (strpos(strtolower($text), "kamisuke") !== false) {
	error_log($logname."'s chat about Kamisuke: ".$message['text']);
  }
}


define('WEBHOOK_URL', 'https://demisuke-kamigram.rhcloud.com/AAFDn4aaABtKARhDrtOdQrSdy4bMR0n-4eo/');

if (php_sapi_name() == 'cli') {
  // if run from console, set or delete webhook
  apiRequest('setWebhook', array('url' => isset($argv[1]) && $argv[1] == 'delete' ? '' : WEBHOOK_URL));
  exit;
}

date_default_timezone_set('Europe/Madrid');
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
  // receive wrong update, must not happen
  exit;
}


if (isset($update["message"])) {
	if($update["message"]["chat"]["type"] == "channel") {
		error_log("Ignored message from a channel.");
		exit;
	}
	checkUserID($update["message"]['from']['id']);
	if(isset($update["message"]['from']['username'])) {
		checkUsername($update["message"]['from']['username']);
	}
	checkGroup($update["message"]['chat']['id']);
	processMessage($update["message"]);
} else if (isset($update["edited_message"])) {
	checkUserID($update["edited_message"]['from']['id']);
	if(isset($update["edited_message"]['from']['username'])) {
		checkUsername($update["edited_message"]['from']['username']);
	}
	checkGroup($update["edited_message"]['chat']['id']);
	if(isset($update["edited_message"]['from']['username'])) {
		$logname = "@".$update["edited_message"]['from']['username'];
	} else if (isset($update["edited_message"]['from']['first_name'])) {
		$logname = $update["edited_message"]['from']['first_name'];
	} else {
		$logname = "ID".$update["edited_message"]['from']['id'];
	}
	$link = dbConnect();
	$chat_id = $update["edited_message"]['chat']['id'];
	$query = "SELECT mode FROM groupbattle WHERE group_id = '".$chat_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	if($row['mode'] > -1) {
		error_log($update["edited_message"]['from']['first_name']." triggered: Edited message.");
		usleep(500000);
		$reply = $update["edited_message"]['message_id'];
		$message = "*Los mensajes editados hacen llorar al niño Demisuke.*";
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));			
		usleep(1000000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $reply, "text" => $message));
	} else {
		error_log($logname." tried to trigger and failed due to group restrictions: Edited message.");
	}
	mysql_free_result($result);
	mysql_close($link);
} else if (isset($update["inline_query"])) {
	checkUserID($update["inline_query"]['from']['id']);
	if(isset($update["inline_query"]['from']['username'])) {
		checkUsername($update["inline_query"]['from']['username']);
	}
	if(isset($update["inline_query"]['from']['username'])) {
		$logname = $update["inline_query"]['from']['username'];
	} else if (isset($update["inline_query"]['from']['first_name'])) {
		$logname = $update["inline_query"]['from']['first_name'];
	} else {
		$logname = "ID".$update["inline_query"]['from']['id'];
	}
	error_log($logname." starts inline query: ".$update["inline_query"]["query"]);
	$queryId = $update["inline_query"]["id"];
	if (isset($update["inline_query"]["query"]) && $update["inline_query"]["query"] !== "") {
		$text = $update["inline_query"]["query"];
		$text = str_replace("<", "", $text);
		$text = str_replace(">", "", $text);
		apiRequestJson("answerInlineQuery", ["inline_query_id" => $queryId, "results" => inlineOptions($text,$logname), "cache_time" => 60,]);
	}
}else if(isset($update["callback_query"])) {
	if(isset($update["callback_query"]['from']['username'])) {
		$logname = $update["callback_query"]['from']['username'];
	} else if (isset($update["callback_query"]['from']['first_name'])) {
		$logname = $update["callback_query"]['from']['first_name'];
	} else {
		$logname = "ID".$update["callback_query"]['from']['id'];
	}
	$callback = $update["callback_query"];
	if($callback['data'] == "FLIPCOINqGq3Z6yf1guhfgFdwkzt") {
		error_log($logname." flipped a coin.");
		$face = rand(1,2);
		apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌕 La moneda se lanza.*", 'parse_mode' => "Markdown",]);
		usleep(800000);
		apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌖 La moneda sube.*", 'parse_mode' => "Markdown",]);
		usleep(800000);
		apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌗 La moneda sube.*", 'parse_mode' => "Markdown",]);
		usleep(800000);
		apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌘 La moneda baja.*", 'parse_mode' => "Markdown",]);
		usleep(800000);
		if($face == 1) {
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌑 La moneda baja.*", 'parse_mode' => "Markdown",]);
			usleep(800000);
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌒 La moneda rebota.*", 'parse_mode' => "Markdown",]);
			usleep(800000);
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌓 La moneda sube.*", 'parse_mode' => "Markdown",]);
			usleep(800000);
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌔 La moneda baja.*", 'parse_mode' => "Markdown",]);
			usleep(800000);
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌝 ¡Ha salido cara!*", 'parse_mode' => "Markdown",]);
		}else {
			apiRequestJson("editMessageText", ["chat_id" => $callback['message']['chat']['id'], "message_id" => $callback['message']['message_id'], "text" => "*🌚 ¡Ha salido cruz!*", 'parse_mode' => "Markdown",]);
		}
	} else {
		error_log($logname." clicked on a spoiler button.");
		$query_id = $update["callback_query"]["id"];
		$chat_id = $callback['from']['id'];
		$message = "Mensaje oculto para ".$logname.":".PHP_EOL.PHP_EOL;
		$message = $message.$callback['data'].PHP_EOL;
		apiRequest("answerCallbackQuery", array('callback_query_id' => $query_id, "text" => $message, "show_alert" => TRUE));	
	}
}
?>