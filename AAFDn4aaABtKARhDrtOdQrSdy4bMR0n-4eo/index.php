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
						"¿Yo?",
						"¿Eh?",
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
					"119769161", // TaliBOT - 121704708 Rayne, 152288222 oikarinen
					"" // MH (13707497)
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
					"", // DemoniaBot ShurNutriaFC DemoniaGothKestrell TaliBOT
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
					"", // -1001044604308 GNU/Vodka
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
					"", // -1001044604308 GNU/Vodka, -1001056538642 Rincón Demigrante
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

function randomSentence() {
	$complete = "";
	$storedStart = array(
						"Coyote",		"Cavernícola",
						"Tambor",		"Ciervo",
						"Alcachofa",	"Corzo",
						"Anacardo",		"Espantapájaros",
						"Gorrino",		"Cocotero",
						"Celacanto",	"Fuet",
						"Jamón",		"Salmorejo",
						"Ventana",		"Níspero",
						"Ukelele",		"Diadema",
						"Moneda",		"Colesterol",
						"Rinoceronte",	"Perineo",
						"Papelera",		"Triciclo",
						"Bombilla",		"Gominola",
						"Plástico",		"Dinosaurio",
						"Coliflor",		"Barrilete",
						"Meteorito",	"Machete",
						"Puercoespín",	"Cacahuete",
						"Picaporte",	"Pañal",
						"Papaya",
						"Incienso",
						"Garbanzo",
						"Relámpago",
						"Chincheta",
						"Mapache",
						"Pterodáctilo"
						);
	$n = sizeof($storedStart) - 1;
	$n = rand(0,$n);
	$complete = $complete.$storedStart[$n];
	$storedEnd = array(
						"en almíbar",				"superestrella",
						"a las finas hierbas",		"congresista",
						"espacial",					"de metal",
						"sideral",					"de pladur",
						"del Cáucaso",				"radiocontrol",
						"temporal",					"sensual",
						"con escayola",				"pelotari",
						"selección",				"volante",
						"presidente",				"ancestral",
						"reversible",				"atrapamoscas",
						"elegante",					"de alcanfor",
						"manual",					"de la Antártida",
						"terrícola",				"de Saturno",
						"velocista",				"escolar",
						"centinela",				"lendakari",
						"revolución",				"serbocroata",
						"estelar",					"oriental",
						"fantasma",					"con extra de frescura",
						"impermeable",				"de gran rocosidad",
						"a la sal",
						"en escabeche"
						);
	$n = sizeof($storedEnd) - 1;
	$n = rand(0,$n);
	$complete = $complete." ".$storedEnd[$n];
	return $complete;
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
					"AwADBAAEBwACl2BfAAEvvURrC5Sp_wI",
					"AwADBAADAQcAApdgXwABiM1bF3LWCskC",
					"AwADBAADCwcAApdgXwABvy-D2hFUZ0wC",
					"AwADBAADAgcAApdgXwABGCCV_cLnc1wC",
					"AwADBAADBAcAApdgXwAB6BroBPSCZ4kC",
					"AwADBAADAwcAApdgXwAB3ozZDE9QYCgC",
					"AwADBAADCgcAApdgXwABirTtILZTgP8C",
					"AwADBAADBgcAApdgXwABR1U0uRDwLM0C",
					"AwADBAADBwcAApdgXwABAdJ5RXXrGWsC",
					"AwADBAADOQcAApdgXwABfOW9MMQByMYC",
					"AwADBAADCQcAApdgXwABlRPN-KBQV6IC",
					"AwADBAADPQcAApdgXwAB-phHS9SUw-YC",
					"AwADBAADCAcAApdgXwABqf59O9FN5HAC",
					"AwADBAADBQcAApdgXwABXqi6kloEw1UC",
					"AwADBAADDAcAApdgXwACWOLjzT6L1AI",
					"AwADBAADDQcAApdgXwABDkHF5tSRptQC",
					"AwADBAADDgcAApdgXwABbsaXqtONpxsC",
					"AwADBAADDwcAApdgXwABUn9kO5QPW_wC",
					"AwADBAADEAcAApdgXwABmF8g0NjjTuMC",
					"AwADBAADEgcAApdgXwABvNKuNxNJ2g8C",
					"AwADBAADGwcAApdgXwAB_LLmFDE9AnQC",
					"AwADBAADEQcAApdgXwABUrjAtI-Cc5MC"
						);
	$n = sizeof($storedFart) - 1;
	$n = rand(0,$n);
	return $storedFart[$n];
}

function getSong() {
	$storedSong = array(
					"AwADBAAD6gYAApdgXwABBWWaUZt10xIC",
					"AwADBAAD6wYAApdgXwABgPtrtKG5_XIC",
					"AwADBAAD7QYAApdgXwAB8UG_B4vc-l0C",
					"AwADBAAD7AYAApdgXwABvhE2rHp5LmoC",
					"AwADBAAD8QYAApdgXwABEwN6QTnOMH4C",
					"AwADBAAD7gYAApdgXwAB3ZUY8QRv2YQC",
					"AwADBAAD7wYAApdgXwABn4D4vmWCKeAC",
					"AwADBAAD8wYAApdgXwABa5rCxO3nEpsC",
					"AwADBAAD9AYAApdgXwABs8auiy40020C",
					"AwADBAAD8gYAApdgXwABqL5bhNo7oS0C",
					"AwADBAAD8AYAApdgXwAB3ZveNPhomiEC",
					"AwADBAAD9QYAApdgXwABYmObYZ8doC0C",
					"AwADBAAD9gYAApdgXwABOvYuM1U-cBUC",
					"AwADBAAD9wYAApdgXwABzNHjVvo-Z7MC",
					"AwADBAAD-AYAApdgXwABlfJxJ_EXMbMC",
					"AwADBAAD-QYAApdgXwABksbT4k_xwWQC",
					"AwADBAAD-gYAApdgXwABcaHMHm8ZH5sC",
					"AwADBAAD_AYAApdgXwAB2XmLgB-YasIC",
					"AwADBAAD-wYAApdgXwABszTkdSIdyxgC",
					"AwADBAAD_QYAApdgXwABQKapIwEdRDwC",
					"AwADBAAD_gYAApdgXwABIoK2nGln0fcC",
					"AwADBAAD_wYAApdgXwAB5dwWmAFNGR4C"
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
				$text = $text.
						"<b>".$row['name']."</b>"
						.PHP_EOL.
						"<i>".$row['total']." puntos.</i>"
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
			$text = $text.
					"<b>\"".$row['name']."\" tiene un total de ".$row['total']." puntos.</b>"
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
					$text = $text."<b>:</b> ".$row['total'].PHP_EOL.PHP_EOL;
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
			default: return $time;
					break;
		}
	}
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

function getPoleBattle($myself, $group, $groupName = "grupo") {
	//HTML Parse Mode
	if($group == 0) {
		$text = "<b>La función !mastiles es exclusiva para grupos y supergrupos, ¡añádeme a alguno y utilízala allí!</b>";
	}
	else {
		$link = dbConnect();
		$text = "<b>🏁 Ránking de ".$groupName." de Banderas capturadas:</b>";
		$query = "SELECT user_name, totalpole FROM userbattle WHERE totalpole > 0 AND group_id = '".$group."' ORDER BY totalpole DESC , lastpole";
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
					$text = $text.
							"<b>".$row['user_name']."</b>"
							.PHP_EOL.
							"<i>".$row['totalpole']." m";
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
				$text = $text." desde ".$groupName.".</b>".PHP_EOL.PHP_EOL;
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
						"!mastil",
						"!mástil",
						"!modo",
						"!cambiarmodo",
						"!bloquearpole",
						"!permitirpole",
						"!bequer",
						"!moneda",
						"!becker",
						"!texto",
						"!bienvenida",
						"!sugerencia",
						"!becquer",
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
function showMode($group_id) {
	$query = "SELECT mode, name, flagblock, freemode, custom_text, welcome_text FROM groupbattle WHERE group_id = '".$group_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
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
	mysql_free_result($result);
	apiRequest("sendChatAction", array('chat_id' => $group_id, 'action' => "typing"));
	usleep(100000);
	$message = "<b>Configuración del bot para ".$name.":</b>".PHP_EOL;
	if($mode > -1) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Participación activa del bot en la conversación".PHP_EOL;
	if($mode > -2) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Respuestas con gifs o audios a palabras clave concretas".PHP_EOL;
	if($mode > -3) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Huevos de pascua y funciones extensas".PHP_EOL;
	if($mode > -4) {
		$message = $message."✅";
	} else {
		$message = $message."❌";
	}
	$message = $message." Notificaciones de actualizaciones importantes del bot".PHP_EOL;
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
	$message = $message." Mensaje de bienvenida personalizado".PHP_EOL;
	$message = $message."<i>Consulta la \"!ayuda\" para saber cómo cambiar la configuración.</i>";
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
						"BQADBAADQwcAApdgXwABY4iaIlE5MVEC"
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

function goodbye() {
	$storedGreeting = array(
						"¡Adiós!",
						"¡Qué vaya bien!",
						"¡Hasta luego!",
						"¡Hasta otra!",
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
function commandsList($send_id, $mode) {
	$mode = str_replace("/ayuda_", "", strtolower($mode));
	$mode = str_replace("@demisukebot", "", strtolower($mode));
	$mode = str_replace("@demitest_bot", "", strtolower($mode));
	if($mode == "main") {
		$text = 
				"Este es el menú de ayuda de @DemisukeBot, aquí encontrarás todo lo que el bot es capaz de hacer."
				.PHP_EOL.
				"Utilízalo siempre que quieras repasar cuáles son los comandos que se pueden utilizar con el bot escribiendo \"/demisuke\" o \"!ayuda\" sin las comillas."
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"⚠️ <b>¡Importante!</b>"
				.PHP_EOL.
				"<i>Para que el bot no resulte ni pesado ni aburrido, configura el panel \"!modo\" con los ajustes óptimos para el grupo.</i>"
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
				"–<b>Insultos</b>: <i>Insulta a alguien mediante \"!insulta a nombre\".</i>"
				.PHP_EOL.
				"–<b>Sticker</b>: <i>Envía un sticker al azar con \"!sticker\".</i>"
				.PHP_EOL.
				"–<b>Historia</b>: <i>Cuenta una larga historia al escribir \"!historia\".</i>"
				.PHP_EOL.
				"–<b>Nick</b>: <i>Genera un nombre de usuario aleatorio con \"!nick\".</i>"
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
				"–<b>Bécquer</b>: <i>Crea una imagen con texto de Bécquer usando \"!becquer mensaje\".</i>"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"👾 <b>Minijuegos:</b>"
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
				"–<b>Aprende a volar</b>: <i>¡Evita detonar la bomba con \"!boton\"!</i>"
				.PHP_EOL.
				"Más información: /ayuda_boton"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"🤖 <b>Otros bots:</b>"
				.PHP_EOL.
				"@KamisukeBot: <i>Envía sonidos cortos como con el antiguo \"Messenger Plus!\".</i>"
				.PHP_EOL.
				"@DemigranciasBot: <i>Los mejores textos y audios de ForoCoches se reúnen en este bot.</i>"
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"<i>¿Tienes alguna sugerencia para el bot?, ¿le encuentras algún fallo? Puedes utilizar la función \"!sugerencia\" para dejar un mensaje en el bot.</i>"
				.PHP_EOL.
				"Si quieres saber cuándo hay nuevas actualizaciones únete al @CanalKamisuke y conocerás todas las novedades al instante."
				.PHP_EOL.
				"@DemisukeBot v2.0 creado por @Kamisuke."
				.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.
				"¿Te gusta el bot? ¡Puntúalo ⭐️⭐️⭐️⭐️⭐️!"
				.PHP_EOL.
				"https://telegram.me/storebot?start=DemisukeBot"
				;
	} else if($mode == "modo") {
		$text = "🔧 <b>Configuración del bot</b> ⚙"
				.PHP_EOL.PHP_EOL.
				"<i>Con la función </i><b>!modo</b><i> podrás visualizar qué puede hacer el bot en el grupo.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Para cambiar la configuración basta con usar </i><b>!cambiarmodo</b><i> y los ajustes pasarán al siguiente estado.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>La función </i><b>!cambiarmodo</b><i> por defecto puede ser utilizada por cualquier miembro del grupo, sin embargo un administrador de grupo puede restringir este privilegio escribiendo</i> <b>!modoadmin</b><i> y volver a darlo con</i> <b>!modolibre</b><i>.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Los minijuegos 'Captura la bandera' y 'Reclama el mástil' también se pueden prohibir mediante la función</i> <b>!prohibirpole</b><i> o permitir escribiendo</i> <b>!permitirpole</b><i>.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>Además, también se visualizará el estado de la función personalizada y el mensaje de bienvenida personalizado del grupo. Consulta en la </i><b>!ayuda</b><i> cómo configurar estas funciones en sus apartados correspondientes.</i>"
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
				"<i>Si utilizas la función </i><b>!infomini</b><i> el bot se limitará a responder cuántos usuarios usan a</i> @DemisukeBot<i>, en cuántos grupos ha estado y en cuántos sigue activo.</i>"
				;
	} else if($mode == "cita") {
		$text = "🔎 <b>Imágenes con citas personalizadas</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>Escribiendo </i><b>!cita mensaje</b><i> podrás crear una imagen con el texto introducido a modo de cita y compartirla con tus amigos.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>El tamaño máximo no es fijo sino que depende del espacio libre que quede en la imagen. Aun así, si el texto es muy largo o está vacío la propia función te avisará de ello.</i>"
				.PHP_EOL.PHP_EOL.
				"<i>También puedes incluir una firma para la cita introducida si escribes </i><b>!cita (mensaje1) mensaje2</b><i>. El mensaje2 escrito al final será la cita en sí, mientras que el mensaje1 escrito entre paréntesis será la firma con la que terminará la cita.</i>"
				;
	} else if($mode == "mensajes") {
		$text = "🔎 <b>Los usuarios más activos de Telegram</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"<b>!mensajes</b>: <i>Muestra la clasificación global de Telegram de los usuarios más activos. Necesitas habilitar tu participación para aparecer aquí.</i>"
				.PHP_EOL.
				"<b>!mensajesgrupo</b>: <i>Ránking exclusivo del grupo de los usuarios que más aportan. ¡Conoce quién mantiene con vida tu grupo! Todos los miembros que hayan escrito al menos un mensaje podrán aparecer en la clasificación.</i>"
				.PHP_EOL.
				"<b>!activame</b>: <i>Habilita la participación en el ránking global. Para mantener la privacidad, todos los usuarios están desactivados por defecto hasta que usan esta función.</i>"
				.PHP_EOL.
				"<b>!desactivame</b>: <i>Oculta tu nombre en el ránking global de los más activos.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"–<i>Por cada mensaje que escribas en el grupo se te sumará un punto al marcador.</i>"
				.PHP_EOL.
				"–<i>Las diez personas que más puntos obtengan aparecerán en el ránking con su nombre y puntuación.</i>"
				.PHP_EOL.
				"–<i>La persona que consulte el ránking aparecerá como extra al final del TOP 10 y conocerá su puntuación actual.</i>"
				.PHP_EOL.
				"–<i>La utilización de funciones del bot no contará como mensaje escrito, por lo que no añadirá puntos al marcador.</i>"
				.PHP_EOL.
				"–<i>El 'floodeo' será ignorado y no puntuará, ningún usuario podrá obtener más de diez puntos en un minuto.</i>"
				.PHP_EOL.
				"–<i>Si el grupo se convierte en supergrupo, las estadísticas se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "grupos") {
		$text = "🔎 <b>Los mejores grupos de Telegram</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"<b>!grupos</b>: <i>Muestra la clasificación global de los grupos más activos de Telegram. Si no estás en el ránking de los mejores, la puntuación de tu grupo aparecerá al final.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"–<i>Por cada mensaje que escribas en el grupo se añadirá un punto al marcador.</i>"
				.PHP_EOL.
				"–<i>No se podrán conseguir más de sesenta puntos por minutos para evitar el 'floodeo'.</i>"
				.PHP_EOL.
				"–<i>Si el bot detecta una mala práctica de esta competición, los puntos del grupo se reiniciarán automáticamente y se enviará una notificación al grupo. ¡Aporta conversaciones interesantes a tus amigos!</i>"
				.PHP_EOL.
				"–<i>Solo los grupos con un número considerable de miembros podrá participar en la competición.</i>"
				.PHP_EOL.
				"–<i>Los grupos que permanecen inactivos durante más de quince días quedan descalificados de la competición hasta que alguno de sus miembros que no sea bot vuelva a participar en el grupo.</i>"
				.PHP_EOL.
				"–<i>Si el grupo se convierte en supergrupo, las estadísticas se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				.PHP_EOL.
				"–<i>Los grupos que eliminen al bot de sus miembros serán descalificados de la competición hasta que lo vuelvan a añadir. Si crees que el bot habla demasiado puedes utilizar !cambiarmodo para que participe menos. Si por el contrario lo encuentras aburrido puedes enviar aportes para mejorar el bot con la función !sugerencia.</i>"
				.PHP_EOL.
				"–<i>Solo los diez grupos con la puntuación más alta y el grupo donde se consulte el ránking aparecerán en la clasificación.</i>"
				;
	} else if($mode == "bandera") {
		$text = "🔎 <b>Captura la bandera</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"<b>!banderas</b>: <i>Muestra la clasificación global de todas las banderas capturadas, además de las que tiene el usuario que utiliza la función si tiene al menos una.</i>"
				.PHP_EOL.
				"<b>!banderasgrupo</b>: <i>Muestra la clasificación del grupo de los usuarios con más banderas capturadas, además de las que tiene el usuario que utiliza la función si tiene al menos una.</i>"
				.PHP_EOL.
				"<b>!pole</b>: <i>Permite capturar una nueva bandera si está disponible, ¡utiliza esta función antes que los demás! En caso de estar capturada la bandera mostrará a quién pertenece y desde dónde la consiguió.</i>"
				.PHP_EOL.
				"<b>!bloquearpole</b>: <i>Permite a los administradores de un grupo impedir que sus miembros puedan capturar banderas. Si eres miembro de un grupo con la captura de banderas bloqueada puedes abrir un chat privado con el bot e intentarlo desde ahí.</i>"
				.PHP_EOL.
				"<b>!permitirpole</b>: <i>Levanta la prohibición de capturar banderas en un grupo. Puedes comprobar la disponibilidad del juego en tu grupo con la función !modo.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"–<i>Cada hora se planta una nueva bandera en el bot.</i>"
				.PHP_EOL.
				"–<i>El primer usuario que la capture con la función !pole la tendrá en su posesión y su nombre aparecerá para todos en dicha función como su propietario, junto al nombre del grupo desde donde la consiguió capturar, hasta que se plante la siguiente bandera, además de sumar una bandera a su colección.</i>"
				.PHP_EOL.
				"–<i>El actual poseedor de la última bandera capturada no podrá capturar la siguiente.</i>"
				.PHP_EOL.
				"–<i>Cada participante tendrá un inventario inicial para veinte banderas, y un inventario adicional con un hueco extra por cada una de las banderas que haya capturado el usuario que aparece en la posición 10 del ránking global.</i>"
				.PHP_EOL.
				"–<i>El uso de la función !pole para capturar la bandera es compatible con grupos y chats privados, siempre que los grupos tengan un número considerable de participantes.</i>"
				.PHP_EOL.
				"–<i>La función !pole estará disponible cada veinte segundos. Su uso reiterado sancionará al usuario.</i>"
				.PHP_EOL.
				"–<i>Si un usuario sancionado continúa tratando de capturar una bandera con la penalización activa, su sanción aumentará.</i>"
				.PHP_EOL.
				"–<i>Un usuario sancionado no podrá conocer su tiempo restante de sanción, simplemente podrá volver a participar una vez la haya cumplido.</i>"
				.PHP_EOL.
				"–<i>Si el grupo se convierte en supergrupo, las estadísticas de !banderasgrupo se reiniciarán. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "mastil") {
		$text = "🔎 <b>Reclama el mástil</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"<b>!mastiles</b>: <i>Muestra la clasificación de todos los mástiles del grupo reclamados, además de los que tiene el usuario que utiliza la función si lo ha reclamado al menos una vez.</i>"
				.PHP_EOL.
				"<b>!pole</b>: <i>Permite reclamar un nuevo mástil si está disponible, ¡utiliza esta función antes que los demás! En caso de estar reclamado el mástil mostrará quién lo hizo.</i>"
				.PHP_EOL.
				"<b>!bloquearpole</b>: <i>Permite a los administradores de un grupo impedir que sus miembros puedan reclamar mástiles.</i>"
				.PHP_EOL.
				"<b>!permitirpole</b>: <i>Levanta la prohibición de reclamar mástiles en un grupo. Puedes comprobar la disponibilidad del juego en tu grupo con la función !modo.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"–<i>Cada hora se planta un nuevo mástil en el bot, media hora después de que aparezca una bandera nueva.</i>"
				.PHP_EOL.
				"–<i>El primer usuario que lo reclame con la función !mastil lo tendrá en su posesión y su nombre aparecerá justo debajo del propietario de la bandera.</i>"
				.PHP_EOL.
				"–<i>Más de una persona puede reclamar un mismo mástil si lo hacen al mismo tiempo. Los puntos se sumarán a todos los que lo consiguieron, sin embargo en la función !pole solo aparecerá reclamado por uno de ellos.</i>"
				.PHP_EOL.
				"–<i>'Reclama el mástil' es un juego exclusivo para grupos, no podrás participar desde chat privado.</i>"
				.PHP_EOL.
				"–<i>No hay ránking global de mástiles de Telegram, cada clasificación es exclusiva de su grupo. Si quieres competir contra otros grupos, intenta capturar la bandera en hora punta.</i>"
				.PHP_EOL.
				"–<i>El actual poseedor del último mástil reclamado no podrá reclamar el siguiente.</i>"
				.PHP_EOL.
				"–<i>Cada participante tendrá un inventario inicial para veinte mástiles, y un inventario adicional con un hueco extra por cada uno de los mástiles que haya capturado el usuario que aparece en la posición 10 de la clasificación del grupo.</i>"
				.PHP_EOL.
				"–<i>El uso de la función !pole es compatible con los grupos que tengan un número considerable de participantes.</i>"
				.PHP_EOL.
				"–<i>La función !pole estará disponible cada veinte segundos. Su uso reiterado sancionará al usuario.</i>"
				.PHP_EOL.
				"–<i>Si un usuario sancionado continúa tratando de reclamar un mástil con la penalización activa, su sanción aumentará.</i>"
				.PHP_EOL.
				"–<i>Un usuario sancionado no podrá conocer su tiempo restante de sanción, simplemente podrá volver a participar una vez la haya cumplido.</i>"
				.PHP_EOL.
				"–<i>Si el grupo se convierte en supergrupo, las clasificación se reiniciará. Esto solo podrá ocurrir una vez según las normas de Telegram.</i>"
				;
	} else if($mode == "boton") {
		$text = "🔎 <b>Aprende a volar</b> 📝"
				.PHP_EOL.PHP_EOL.
				"<i>¿Será hoy tu día de suerte? Comprúebalo pulsando el botón que lo decide. Si utilizas la función </i><b>!boton</b><i> tienes un 20% de posibilidades de detonar una bomba en el chat y 'salir por los aires', de lo contrario aparecerá un mensaje confirmando que te has salvado de la explosión.</i>"
				.PHP_EOL.
				"<i>Es un minijuego muy útil para decidir a la suerte a un jugador de entre todos los participantes, como si fuera una ruleta o una botella que gira.</i>"
				;
	}
	if(strlen($text) > 5){
		apiRequest("sendChatAction", array('chat_id' => $send_id, 'action' => "typing"));			
		usleep(100000);
		apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "HTML", "text" => $text));
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
				$result = "*Actualizando lista. Espera, por favor...*";
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
				$link = dbConnect();
				$query = "SELECT COUNT( * ) AS  'total_active' FROM ( SELECT DISTINCT gb_id FROM groupbattle WHERE lastpoint >0 )dt";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$oldTotalActive = $row['total_active'];
				mysql_free_result($result);
				$query = 'SELECT group_id, name, lastpoint FROM `groupbattle`';
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$total = 0;
				$totalActive = 0;
				$updateQuery = "UPDATE groupbattle SET lastpoint = 0 WHERE group_id IN (";
				$deadTime = time();
				$deadTime = $deadTime - 1296000;
				while($row = mysql_fetch_array($result)) {
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
				strpos($text, "/ayuda_mensajes") === 0 || strpos($text, "/ayuda_mensajes@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_grupos") === 0 || strpos($text, "/ayuda_grupos@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_bandera") === 0 || strpos($text, "/ayuda_bandera@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_mastil") === 0 || strpos($text, "/ayuda_mastil@DemisukeBot") === 0 || 
				strpos($text, "/ayuda_boton") === 0 || strpos($text, "/ayuda_boton@DemisukeBot") === 0) {
		error_log($logname." triggered: ".$text.".");
		commandsList($chat_id, $text);	
    } else if (strpos($text, "/sendNotification") === 0) {
		error_log($logname." triggered: New Notification.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647 && strlen($text) > 18) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$link = dbConnect();
			$query = "SELECT DISTINCT group_id, name FROM groupbattle WHERE lastpoint > 0 AND mode > -4";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$totalGroups = 0;
			$notificationMessage = substr($text,18);
			// un select de los grupos id de la abttle
			// total = 0
			// en un while exista la row
			while($row = mysql_fetch_array($result)) {
				error_log("Trying to reach ".$row['name']);
				apiRequest("sendMessage", array('chat_id' => $row['group_id'], 'parse_mode' => "Markdown", "text" => $notificationMessage));
				$totalGroups = $totalGroups + 1;
			}
				// enviar notificacion al grupo, que es el texto con un substr del principio (parsemodemarkdown)
				// total ++;
			// enviar mensaje a mi mismo del total de envios
			mysql_free_result($result);
			mysql_close($link);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado una notificación a ".$totalGroups." grupos.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
	} else if (strpos($text, "/sendSpecialNot") === 0) {
		error_log($logname." triggered: /sendSpecialNot.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$destiny_id = substr($message['text'], strpos($message['text'],"(") + 1, strpos($message['text'],")") - strpos($message['text'],"(") - 1);
			$textToSend = substr($message['text'], strpos($message['text'],")") + 2);
			apiRequest("sendMessage", array('chat_id' => $destiny_id, 'parse_mode' => "Markdown", "text" => $textToSend));
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado el mensaje al destinatario.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
/*	} else if (strpos($text, "/checkflags") === 0) {
		error_log($logname." triggered: /checkflags.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647) {
			$link = dbConnect();
			$query = "SELECT SUM(total) as 'total' FROM `flagcapture`";
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			$total = $row['total'];
			mysql_free_result($result);
			mysql_close($link);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se han capturado un total de ".$total." banderas.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
*/
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
    } else if (strpos($text, "/stop") === 0) {
      // stop now
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
	} else if (strpos(strtolower($text), "!siono") !== false && strlen($text) > 8) {
		error_log($logname." triggered: !siono.");
		$respuesta = yesNoQuestion();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$respuesta.".*"));
	} else if (strpos(strtolower($text), "!ping") !== false) {
		error_log($logname." triggered: !ping.");
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*¡Pong!*"));
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
		$msg = $msg.":".PHP_EOL.PHP_EOL;
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
		error_log($logname." triggered: !boton.");
		$bombTicket = rand(1,5);
		$username = str_replace("@", "", $logname);
		if($bombTicket == 4) {
			$text = "*☠ ¡".$username." ha pulsado el botón y ha salido volando! 💀*";
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
			usleep(100000);
			$gif = "BQADBAADQAcAApdgXwABCn7szqh0E84C";
			apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
		} else {
			$text = "*✅ ¡".$username." ha pulsado el botón y se ha salvado! 🍾*";
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(250000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
		}
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
		mysql_close($link);
		$text = "*".$totalUsers." personas están usando el bot.".PHP_EOL;
		$text = $text.$totalGroups." grupos han probado ya el bot.".PHP_EOL;
		$text = $text.$totalActive." grupos participan en los minijuegos.*";
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
	} else if (strpos(strtolower($text), "!info") !== false) {
		if($randomTicket > -3) {
			error_log($logname." triggered: !info.");
			$link = dbConnect();
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
			error_log($logname." tried to trigger and failed due to group restrictions: !info.");
		}
	} else if (strpos(strtolower($text), "!becquer") !== false || strpos(strtolower($text), "!bequer") !== false || strpos(strtolower($text), "!becker") !== false || strpos(strtolower($text), "!bécquer") !== false) {
		error_log($logname." triggered: !becquer.");
		$text = str_replace("!bequer", "!becquer", $text);
		$text = str_replace("!becker", "!becquer", $text);
		$start = strpos(strtolower($text), "!becquer") + 9;
		$text = substr($text, $start);
		$text = wordwrap($text, 26, "\n", false);
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
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*🔑 La configuración del bot será editable todos los usuarios del grupo.*"));
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
				$query = 'UPDATE groupbattle SET mode = '.$mode.' WHERE group_id = '.$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				showMode($chat_id);
			}
			mysql_free_result($result);
			mysql_close($link);
		} else {
			error_log($logname." tried to trigger in private: !modoadmin.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			usleep(100000);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La configuración del bot es exclusiva para grupos, ¡añádeme a uno!*"));
		}
	} else if (strpos(strtolower($text), "!mastil") !== false || strpos(strtolower($text), "!mástil")) {
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
			$randMultiplier = rand(3,6);
			$randomizer = $randomizer * $randMultiplier;
			usleep($randomizer);

			mysql_free_result($result);			
			$query = 'SELECT user_id, last_flag FROM flagcapture WHERE fc_id = 0001';
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if($row['last_flag'] != $currentTime) {
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
								if(($newSeekerTotal - $row['total']) < 20) {
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
					$text = $text." ".$timeEmoji." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
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
					$text = $text." ".$timeEmoji." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
					mysql_free_result($result);
			}
			// Changing Flag to Pole
			if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
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
								$query = "SELECT totalpole FROM userbattle WHERE group_id = '".$chat_id."' ORDER BY totalpole DESC , lastpole LIMIT 9, 1";
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
			$gif = "AwADBAADRAcAApdgXwABd8d_ymKOze0C";
			apiRequest("sendVoice", array('chat_id' => $chat_id, 'voice' => $gif));
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
		$nick = getNickname();
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El nombre de usuario generado automáticamente es ".$nick.".*"));
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
		$mode = $row['mode'];
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
					$msg = "<b>Hora de portarse bien, aquí llega el menda.</b> 😎";
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
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
			if($imNewcomer) {
				$msg = "*Me estoy instalando en este grupo con las opciones predeterminadas. En unos segundos muestro la ayuda del bot, ¡configúrame bien para no ser pesado ni aburrido!*";
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(1);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
				sleep(4);
				apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
				sleep(3);
				commandsList($chat_id, "main");
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