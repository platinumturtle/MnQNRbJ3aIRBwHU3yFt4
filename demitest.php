<?php

  $botToken = "233309633:AAFDn4aaABtKARhDrtOdQrSdy4bMR0n-4eo";
  $website = "https://api.telegram.org/bot".$botToken;
  
  //$update = file_get_contents("php://input");
  $update = file_get_contents($website."/getUpdates");
  $updateArray = json_decode($update, TRUE);
  
  $chatId = $updateArray["result"][0]["message"]["chat"]["id"];
  //$text = $updateArray["result"][0]["message"]["text"];
  
  file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=¡Hola buenos días!");
  
  //file_get_contents($website."/sendmessage?chat_id=6250647&text=¡Hola buenos días!");
  
  //print_r($update);
  //print_r($updateArray);
  print_r("8");
?>