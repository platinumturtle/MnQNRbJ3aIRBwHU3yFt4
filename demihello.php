<?php

define('BOT_TOKEN', '175756236:AAGmeuMt5ZFUAY8bNtDwyyQPq3nL2ScMIbI');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
include 'api.php';



function debugMode($message) {
	$debugFile = fopen("debug.log", "a");
	$debugText = "Message Type: Message";
	$debugText = $debugText."\n";
	
	if (isset($message['message_id'])) {
		$debugText = $debugText."MessageID: ";	  
		$debugText = $debugText.$message['message_id'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['from'])) {
		if (isset($message['from']['id'])) {
			$debugText = $debugText."SenderID: ";	  
			$debugText = $debugText.$message['from']['id'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['from']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['from']['first_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['from']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['from']['last_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['from']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['from']['username'];	 
			$debugText = $debugText."\n"; 
		}	
	}
	if (isset($message['date'])) {
		$debugText = $debugText."Date: ";	  
		$debugText = $debugText.gmdate("H:i:s d-m-Y",$message['date'] + 3600*(2+date("I")));	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['chat'])) {
		if (isset($message['chat']['id'])) {
			$debugText = $debugText."ChatID: ";	  
			$debugText = $debugText.$message['chat']['id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['chat']['type'])) {
			$debugText = $debugText."Type: ";	  
			$debugText = $debugText.$message['chat']['type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['chat']['title'])) {
			$debugText = $debugText."Title: ";	  
			$debugText = $debugText.$message['chat']['title'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['chat']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['chat']['username'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['chat']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['chat']['first_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['chat']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['chat']['last_name'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['forward_from'])) {
		if (isset($message['forward_from']['id'])) {
			$debugText = $debugText."ForwardedFromSenderID: ";	  
			$debugText = $debugText.$message['from']['id'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['forward_from']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['from']['first_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['forward_from']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['from']['last_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['forward_from']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['from']['username'];	 
			$debugText = $debugText."\n"; 
		}	
	}
	if (isset($message['forward_from_chat'])) {
		if (isset($message['forward_from_chat']['id'])) {
			$debugText = $debugText."ForwardedFromChatID: ";	  
			$debugText = $debugText.$message['forward_from_chat']['id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['forward_from_chat']['type'])) {
			$debugText = $debugText."Type: ";	  
			$debugText = $debugText.$message['forward_from_chat']['type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['forward_from_chat']['title'])) {
			$debugText = $debugText."Title: ";	  
			$debugText = $debugText.$message['forward_from_chat']['title'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['forward_from_chat']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['forward_from_chat']['username'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['forward_from_chat']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['forward_from_chat']['first_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['forward_from_chat']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['forward_from_chat']['last_name'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['forward_date'])) {
		$debugText = $debugText."Forward Date: ";	  
		$debugText = $debugText.gmdate("H:i:s d-m-Y",$message['forward_date'] + 3600*(2+date("I")));	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['reply_to_message'])) {
		if (isset($message['reply_to_message']['message_id'])) {
			$debugText = $debugText."ReplytoMessageID: ";	  
			$debugText = $debugText.$message['reply_to_message']['message_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['reply_to_message']['from'])) {
			if (isset($message['reply_to_message']['from']['id'])) {
				$debugText = $debugText."ReplytoMessageFromID: ";	  
				$debugText = $debugText.$message['reply_to_message']['from']['id'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['reply_to_message']['from']['first_name'])) {
				$debugText = $debugText."First Name: ";	  
				$debugText = $debugText.$message['reply_to_message']['from']['first_name'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['reply_to_message']['from']['last_name'])) {
				$debugText = $debugText."Last Name: ";	  
				$debugText = $debugText.$message['reply_to_message']['from']['last_name'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['reply_to_message']['from']['username'])) {
				$debugText = $debugText."Username: ";	  
				$debugText = $debugText.$message['reply_to_message']['from']['username'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['date'])) {
			$debugText = $debugText."Reply to Message Date: ";	  
			$debugText = $debugText.gmdate("H:i:s d-m-Y",$message['reply_to_message']['date'] + 3600*(2+date("I")));	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['reply_to_message']['chat'])) {
			if (isset($message['reply_to_message']['chat']['id'])) {
				$debugText = $debugText."ReplyToMessageChatID: ";	  
				$debugText = $debugText.$message['reply_to_message']['chat']['id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['text'])) {
			$debugText = $debugText."Reply to Message Text: ";	  
			$debugText = $debugText.$message['reply_to_message']['text'];	  
			$debugText = $debugText."\n"; 
		}
		if (isset($message['reply_to_message']['audio'])) {
			if (isset($message['reply_to_message']['audio']['file_id'])) {
				$debugText = $debugText."ReplyToMessageAudioFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['audio']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['document'])) {
			if (isset($message['reply_to_message']['document']['file_id'])) {
				$debugText = $debugText."ReplyToMessageDocumentFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['document']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['photo'])) {
			if (isset($message['reply_to_message']['photo']['file_id'])) {
				$debugText = $debugText."ReplyToMessagePhotoFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['photo']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['sticker'])) {
			if (isset($message['reply_to_message']['sticker']['file_id'])) {
				$debugText = $debugText."ReplyToMessageStickerFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['sticker']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['video'])) {
			if (isset($message['reply_to_message']['video']['file_id'])) {
				$debugText = $debugText."ReplyToMessageVideoFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['video']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['voice'])) {
			if (isset($message['reply_to_message']['voice']['file_id'])) {
				$debugText = $debugText."ReplyToMessageVoiceFileID: ";	  
				$debugText = $debugText.$message['reply_to_message']['voice']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['reply_to_message']['contact'])) {
			if (isset($message['reply_to_message']['contact']['phone_number'])) {
				$debugText = $debugText."ReplyToMessage Contact Phone Number: ";	  
				$debugText = $debugText.$message['reply_to_message']['contact']['phone_number'];	 
				$debugText = $debugText."\n"; 
			}
		}
	}
	if (isset($message['edit_date'])) {
		$debugText = $debugText."Edit Date: ";	  
		$debugText = $debugText.$message['edit_date'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['text'])) {
		$debugText = $debugText."Text: ";	  
		$debugText = $debugText.$message['text'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['entities'])) {
		if (isset($message['entities']['type'])) {
			$debugText = $debugText."Entities Type: ";	  
			$debugText = $debugText.$message['entities']['type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['entities']['offset'])) {
			$debugText = $debugText."Entities Offset: ";	  
			$debugText = $debugText.$message['entities']['offset'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['entities']['length'])) {
			$debugText = $debugText."Entities Length: ";	  
			$debugText = $debugText.$message['entities']['length'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['entities']['url'])) {
			$debugText = $debugText."Entities URL: ";	  
			$debugText = $debugText.$message['entities']['url'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['audio'])) {
		if (isset($message['audio']['file_id'])) {
			$debugText = $debugText."AudioFileID: ";	  
			$debugText = $debugText.$message['audio']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['audio']['duration'])) {
			$debugText = $debugText."Duration: ";	  
			$debugText = $debugText.$message['audio']['duration'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['audio']['performer'])) {
			$debugText = $debugText."Performer: ";	  
			$debugText = $debugText.$message['audio']['performer'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['audio']['title'])) {
			$debugText = $debugText."Title: ";	  
			$debugText = $debugText.$message['audio']['title'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['audio']['mime_type'])) {
			$debugText = $debugText."MIME Type: ";	  
			$debugText = $debugText.$message['audio']['mime_type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['audio']['file_size'])) {
			$debugText = $debugText."File Size: ";	  
			$debugText = $debugText.$message['audio']['file_size'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['document'])) {
		if (isset($message['document']['file_id'])) {
			$debugText = $debugText."DocumentFileID: ";	  
			$debugText = $debugText.$message['document']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['document']['thumb'])) {
			if (isset($message['document']['thumb']['file_id'])) {
				$debugText = $debugText."DocumentThumbFileID: ";	  
				$debugText = $debugText.$message['document']['thumb']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['document']['thumb']['width'])) {
				$debugText = $debugText."Width: ";	  
				$debugText = $debugText.$message['document']['thumb']['width'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['document']['thumb']['height'])) {
				$debugText = $debugText."Height: ";	  
				$debugText = $debugText.$message['document']['thumb']['height'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['document']['thumb']['file_size'])) {
				$debugText = $debugText."File Size: ";	  
				$debugText = $debugText.$message['document']['thumb']['file_size'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['document']['file_name'])) {
			$debugText = $debugText."File Name: ";	  
			$debugText = $debugText.$message['document']['file_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['document']['mime_type'])) {
			$debugText = $debugText."MIME Type: ";	  
			$debugText = $debugText.$message['document']['mime_type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['document']['file_size'])) {
			$debugText = $debugText."File Size: ";	  
			$debugText = $debugText.$message['document']['file_size'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['photo'])) {
		if (isset($message['photo']['file_id'])) {
			$debugText = $debugText."PhotoFileID: ";	  
			$debugText = $debugText.$message['photo']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['photo']['width'])) {
			$debugText = $debugText."Width: ";	  
			$debugText = $debugText.$message['photo']['width'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['photo']['height'])) {
			$debugText = $debugText."Height: ";	  
			$debugText = $debugText.$message['photo']['height'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['photo']['file_size'])) {
			$debugText = $debugText."File Size: ";	  
			$debugText = $debugText.$message['photo']['file_size'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['sticker'])) {
		if (isset($message['sticker']['file_id'])) {
			$debugText = $debugText."StickerFileID: ";	 
			$debugText = $debugText.$message['sticker']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['sticker']['width'])) {
			$debugText = $debugText."Width: ";	  
			$debugText = $debugText.$message['sticker']['width'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['sticker']['height'])) {
			$debugText = $debugText."Height: ";	  
			$debugText = $debugText.$message['sticker']['height'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['sticker']['thumb'])) {
			if (isset($message['sticker']['thumb']['file_id'])) {
				$debugText = $debugText."StickerThumbFileID: ";	  
				$debugText = $debugText.$message['sticker']['thumb']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['sticker']['thumb']['width'])) {
				$debugText = $debugText."Width: ";	  
				$debugText = $debugText.$message['sticker']['thumb']['width'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['sticker']['thumb']['height'])) {
				$debugText = $debugText."Height: ";	  
				$debugText = $debugText.$message['sticker']['thumb']['height'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['sticker']['thumb']['file_size'])) {
				$debugText = $debugText."File Size: ";	  
				$debugText = $debugText.$message['sticker']['thumb']['file_size'];	 
				$debugText = $debugText."\n"; 
			}
		}
	}
	if (isset($message['video'])) {
		if (isset($message['video']['file_id'])) {
			$debugText = $debugText."VideoFileID: ";	  
			$debugText = $debugText.$message['video']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['video']['width'])) {
			$debugText = $debugText."Width: ";	  
			$debugText = $debugText.$message['video']['width'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['video']['height'])) {
			$debugText = $debugText."Height: ";	  
			$debugText = $debugText.$message['video']['height'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['video']['duration'])) {
			$debugText = $debugText."Duration: ";	  
			$debugText = $debugText.$message['video']['duration'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['video']['thumb'])) {
			if (isset($message['video']['thumb']['file_id'])) {
				$debugText = $debugText."VideoThumbFileID: ";	  
				$debugText = $debugText.$message['video']['thumb']['file_id'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['video']['thumb']['width'])) {
				$debugText = $debugText."Width: ";	  
				$debugText = $debugText.$message['video']['thumb']['width'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['video']['thumb']['height'])) {
				$debugText = $debugText."Height: ";	  
				$debugText = $debugText.$message['video']['thumb']['height'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['video']['thumb']['file_size'])) {
				$debugText = $debugText."File Size: ";	  
				$debugText = $debugText.$message['video']['thumb']['file_size'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['video']['mime_type'])) {
			$debugText = $debugText."Video MIME Type: ";	  
			$debugText = $debugText.$message['video']['mime_type'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['video']['file_size'])) {
			$debugText = $debugText."File Size: ";	  
			$debugText = $debugText.$message['video']['file_size'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['voice'])) {
		$debugText = $debugText."VoiceFileID: ";	  
		$debugText = $debugText.$message['voice']['file_id'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['caption'])) {
		$debugText = $debugText."Caption: ";	  
		$debugText = $debugText.$message['caption'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['contact'])) {
		if (isset($message['contact']['phone_number'])) {
			$debugText = $debugText."Contact Phone Number: ";	  
			$debugText = $debugText.$message['contact']['phone_number'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['contact']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['contact']['first_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['contact']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['contact']['last_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['contact']['user_id'])) {
			$debugText = $debugText."ContactUserID: ";	  
			$debugText = $debugText.$message['contact']['user_id'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['location'])) {
		if (isset($message['location']['longitude'])) {
			$debugText = $debugText."Longitude: ";	  
			$debugText = $debugText.$message['location']['longitude'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['location']['latitude'])) {
			$debugText = $debugText."Latitude: ";
			$debugText = $debugText.$message['location']['latitude'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['venue'])) {
		if (isset($message['venue']['location'])) {
			if (isset($message['venue']['location']['longitude'])) {
				$debugText = $debugText."Longitude: ";	  
				$debugText = $debugText.$message['venue']['location']['longitude'];	 
				$debugText = $debugText."\n"; 
			}
			if (isset($message['venue']['location']['latitude'])) {
				$debugText = $debugText."Latitude: ";
				$debugText = $debugText.$message['venue']['location']['latitude'];	 
				$debugText = $debugText."\n"; 
			}
		}
		if (isset($message['venue']['title'])) {
			$debugText = $debugText."Venue Title: ";
			$debugText = $debugText.$message['venue']['title'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['venue']['address'])) {
			$debugText = $debugText."Address: ";
			$debugText = $debugText.$message['venue']['address'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['venue']['foursquare_id'])) {
			$debugText = $debugText."FoursquareID: ";
			$debugText = $debugText.$message['venue']['foursquare_id'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['new_chat_member'])) {
		if (isset($message['new_chat_member']['id'])) {
			$debugText = $debugText."NewChatMemberID: ";	  
			$debugText = $debugText.$message['new_chat_member']['id'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['new_chat_member']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['new_chat_member']['first_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['new_chat_member']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['new_chat_member']['last_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['new_chat_member']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['new_chat_member']['username'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['left_chat_member'])) {
		if (isset($message['left_chat_member']['id'])) {
			$debugText = $debugText."LeftChatMemberID: ";	  
			$debugText = $debugText.$message['left_chat_member']['id'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['left_chat_member']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['left_chat_member']['first_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['left_chat_member']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['left_chat_member']['last_name'];	 
			$debugText = $debugText."\n"; 
		}	
		if (isset($message['left_chat_member']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['left_chat_member']['username'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['new_chat_title'])) {
		$debugText = $debugText."New Chat Title: ";	  
		$debugText = $debugText.$message['new_chat_title'];	 
		$debugText = $debugText."\n"; 
	}
	if (isset($message['new_chat_photo'])) {
		if (isset($message['new_chat_photo']['file_id'])) {
			$debugText = $debugText."NewChatPhotoFileID: ";	  
			$debugText = $debugText.$message['new_chat_photo']['file_id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['new_chat_photo']['width'])) {
			$debugText = $debugText."Width: ";	  
			$debugText = $debugText.$message['new_chat_photo']['width'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['new_chat_photo']['height'])) {
			$debugText = $debugText."Height: ";	  
			$debugText = $debugText.$message['new_chat_photo']['height'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['new_chat_photo']['file_size'])) {
			$debugText = $debugText."File Size: ";	  
			$debugText = $debugText.$message['new_chat_photo']['file_size'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['pinned_message'])) {
		if (isset($message['pinned_message']['from']['id'])) {
			$debugText = $debugText."PinnedMessageMessageFromID: ";	  
			$debugText = $debugText.$message['pinned_message']['from']['id'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['pinned_message']['from']['first_name'])) {
			$debugText = $debugText."First Name: ";	  
			$debugText = $debugText.$message['pinned_message']['from']['first_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['pinned_message']['from']['last_name'])) {
			$debugText = $debugText."Last Name: ";	  
			$debugText = $debugText.$message['pinned_message']['from']['last_name'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['pinned_message']['from']['username'])) {
			$debugText = $debugText."Username: ";	  
			$debugText = $debugText.$message['pinned_message']['from']['username'];	 
			$debugText = $debugText."\n"; 
		}
		if (isset($message['pinned_message']['text'])) {
			$debugText = $debugText."Pinned Text: ";	  
			$debugText = $debugText.$message['pinned_message']['text'];	 
			$debugText = $debugText."\n"; 
		}
	}
	if (isset($message['callback_query'])) {
		$dump = var_dump($message['callback_query']);
		$debugText = $debugText.$dump;	
	}
	$debugText = $debugText."\n"; 
	fwrite($debugFile, $debugText);
	fclose($debugFile);
}

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

function explodeArray($dump) {
	$str = var_export($dump, true);
	error_log($str);
	$str = json_encode($dump);
	error_log($str);
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

function reverseString ($message) {
	$message = cleanHTML($message);
	/*
	$processMessage = "";
	for($i=strlen($message)-1;$i>=0;$i--) {
		$processMessage = $processMessage.$message[$i];
	}*/

//	$message = str_replace("á", "a", $message);
//	$message = str_replace("à", "a", $message);
//	$message = str_replace("é", "e", $message);
//	$message = str_replace("è", "e", $message);
//	$message = str_replace("í", "i", $message);
//	$message = str_replace("ó", "o", $message);
//	$message = str_replace("ò", "o", $message);
//	$message = str_replace("ú", "u", $message);
//	$message = str_replace("ü", "u", $message);
//	$message = str_replace("ï", "i", $message);

//	$message = str_replace("Á", "∀", $message);
//	$message = str_replace("À", "∀", $message);
//	$message = str_replace("É", "E", $message);
//	$message = str_replace("È", "E", $message);
//	$message = str_replace("Í", "I", $message);
//	$message = str_replace("Ó", "O", $message);
//	$message = str_replace("Ò", "O", $message);
//	$message = str_replace("Ú", "U", $message);
//	$message = str_replace("Ü", "U", $message);
//	$message = str_replace("Ï", "I", $message);

	$message = str_replace("A", "∀", $message);
	//$message = str_replace("B", "B", $message);
	$message = str_replace("C", "Ɔ", $message);
	$message = str_replace("D", "D", $message);
	$message = str_replace("E", "Ǝ", $message);
	$message = str_replace("F", "Ⅎ", $message);
	$message = str_replace("G", "פ", $message);
	//$message = str_replace("H", "H", $message);
	//$message = str_replace("I", "I", $message);
	$message = str_replace("J", "ſ", $message);
	//$message = str_replace("K", "K", $message);
	$message = str_replace("L", "˥", $message);
	$message = str_replace("M", "W", $message);
	//$message = str_replace("N", "N", $message);
	//$message = str_replace("O", "O", $message);
	$message = str_replace("P", "Ԁ", $message);
	//$message = str_replace("Q", "Q", $message);
	//$message = str_replace("R", "R", $message);
	//$message = str_replace("S", "S", $message);
	$message = str_replace("T", "┴", $message);
	$message = str_replace("U", "∩", $message);
	$message = str_replace("V", "Λ", $message);
	$message = str_replace("W", "M", $message);
	//$message = str_replace("X", "X", $message);
	$message = str_replace("Y", "⅄", $message);
	//$message = str_replace("Z", "Z", $message);

	$message = str_replace("a", "ɐ", $message);
	$message = str_replace("b", "ʠ", $message);
	$message = str_replace("c", "ɔ", $message);
	$message = str_replace("d", "p", $message);
	$message = str_replace("e", "ǝ", $message);
	$message = str_replace("f", "ɟ", $message);
	$message = str_replace("g", "פ", $message);
	$message = str_replace("h", "ɥ", $message);
	$message = str_replace("i", "ı", $message);
	$message = str_replace("j", "ɾ", $message);
	$message = str_replace("k", "ʞ", $message);
	//$message = str_replace("l", "l", $message);
	$message = str_replace("m", "ɯ", $message);
	$message = str_replace("n", "u", $message);
	//$message = str_replace("o", "o", $message);
	$message = str_replace("p", "d", $message);
	$message = str_replace("q", "b", $message);
	$message = str_replace("r", "ɹ", $message);
	//$message = str_replace("s", "s", $message);
	$message = str_replace("t", "ʇ", $message);
	$message = str_replace("u", "n", $message);
	$message = str_replace("v", "ʌ", $message);
	$message = str_replace("w", "ʍ", $message);
	//$message = str_replace("x", "x", $message);
	$message = str_replace("y", "ʎ", $message);
	//$message = str_replace("z", "z", $message);
	//añadir eñes y cedillas, interrogaciones y exclamaciones, punto, coma, comillas simples y dobles, parentesis cocrhcetes y llaves, barra y contrabarra
//	$message = str_replace("ų", "ñ", $message);
//	$message = str_replace("Ņ", "Ñ", $message);
//	$message = str_replace("ɔ́", "ç", $message);
//	$message = str_replace("Ɔ́", "Ç", $message);
	
	//$message = (string)$message;
	//$message = strrev($message);
	//$message = (string)$message;
	
	
	/*$length = strlen($message)-1;
	$i = 0;
	while ($i < $length+1) {
		$message[$i] = $message[$length-$i];
		$i++;
	}*/
	//$reversedMessage = strrev($message);
	//$reversedMessage = (string)$reversedMessage;
	
	
	//$reversedMessage = "";
	/*for($i=strlen($message)-1, $j=0; $j<$i; $i--, $j++) {
		list($message[$j], $message[$i]) = array($message[$i], $message[$j]);
	}
	
	
	error_log("INVERTIDO: ".$message);*/
	//$message = strrev($message);
	//$reconvertMessage = implode("_", strrev($message));
	//$reconvertMessage = (string)$reconvertMessage;
	//$caca = str_split($message, strlen($message));
	//$revert = "‫‬‭‮҉";
	error_log("ASDASDSADASD ".$message);
	
	//$message = $revert.$message.$revert;
	//$failedShit = (string)strrev($message);
	//$caqui = strval($failedShit);
	//error_log(var_dump($failedShit));
	
	return $message;
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
			case 2: $text = "*Te has adentrado en el bosque en busca de comida y ahs encontrado frutas silvestres. Te llevas 15 puntos de experiencia.*";
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
		}  else if($exp > 1159899) {
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
		}  else if($exp > 7116729) {
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
				case 14: $name = "Traje de cazador prfoesional (Vida +14)";
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
				case 5: $name = "Escudo de carton (Defensa +5)";
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
			}
		}
	}
	return $name;
}

function getAreaName ($level) {
	if($level == 100) {
		$name = "Palacio Real del Inframundo";
	} else if($level > 89) {
		$name = "Inframundo";
	} else if($level > 87) {
		$name = "Límites del Infierno";
	} else if($level > 79) {
		$name = "Infierno";
	} else if($level > 78) {
		$name = "Protección final de selección de Elegidos";
	} else if($level > 69) {
		$name = "Portal protegido de los Elegidos";
	} else if($level > 67) {
		$name = "Final del pasaje ancestral";
	} else if($level > 59) {
		$name = "Pasaje ancestral hacia el Infierno";
	} else if($level > 54) {
		$name = "Profundidades de la cueva mitológica";
	} else if($level > 49) {
		$name = "Cueva mitológica";
	} else if($level > 39) {
		$name = "Portal del mundo real hacia el Inframundo";
	} else if($level > 36) {
		$name = "Fondo del glaciar";
	} else if($level > 29) {
		$name = "Glaciar oculto bajo tierra";
	} else if($level > 27) {
		$name = "Selva fría";
	} else if($level > 19) {
		$name = "Selva profunda";
	} else if($level > 16) {
		$name = "Profundidad del bosque tenebroso";
	} else if($level > 9) {
		$name = "Bosque tenebroso";
	} else if($level > 5) {
		$name = "Área de entrenamiento avanzado";
	} else {
		$name = "Área de entrenamiento";
	}
	return $name;
}

function levelUp($newLevel, $newExp, $currCrit, $link, $user_id, $fromBoss = 0) {
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
		$newExtraPoints = 100;
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
		$newExtraPoints = 70;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 90 && $newLevel < 99) {
			$newExtraPoints = $newExtraPoints + ($newLevel - 90);
		} else if($newLevel == 99) {
			$newExtraPoints = $newExtraPoints + 20;
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 79) {
		$newHP = 9;
		$newAt = 9;
		$newDef = 9;
		$newSp = 9;
		$newExtraPoints = 50;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 84) {
			$newExtraPoints = $newExtraPoints + 3;
		}
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 69) {
		$newHP = 8;
		$newAt = 8;
		$newDef = 8;
		$newSp = 8;
		$newExtraPoints = 30;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 74) {
			$newExtraPoints = $newExtraPoints + 2;
		}
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 59) {
		$newHP = 7;
		$newAt = 7;
		$newDef = 7;
		$newSp = 7;
		$newExtraPoints = 25;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 64) {
			$newExtraPoints = $newExtraPoints + 2;
		}
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
			$newItemType = 2;
		} else {
			$newItemType = 3;
		}
	} else if ($newLevel > 49) {
		$newHP = 6;
		$newAt = 6;
		$newDef = 6;
		$newSp = 6;
		$newExtraPoints = 20;
		$extraTicketA = rand(0,1);
		$extraTicketB = rand(0,1);
		if($newLevel > 54) {
			$newExtraPoints = $newExtraPoints + 2;
		}
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
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
		if($newLevel > 44) {
			$newExtraPoints = $newExtraPoints + 2;
		}
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
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
		if($calcType == 0 || $calcType = 5) {
			$newItemType = 4;
		} else if($calcType == 1 || $calcType = 6) {
			$newItemType = 5;
		} else if($calcType == 2 || $calcType = 7) {
			$newItemType = 1;
		} else if($calcType == 3 || $calcType = 8) {
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
	$query = "UPDATE `playerbattle` SET `exp_points` = '".$newExp."', `level` = '".$newLevel."', `extra_points` = `extra_points` + ".$newExtraPoints.", `hp` = `hp` + ".$newHP.", `attack` = `attack` + ".$newAt.", `defense` = `defense` + ".$newDef.", `critic` = `critic` + ".$newCrit.", `speed` = `speed` + ".$newSp.", `".$newItemTypeName."` = ".$newItemPower.", `".$respawnType."` = ".$currTime." WHERE `user_id` = '".$user_id."'";
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
	sleep(1);
	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	// (al 10 avisar de que se cambia la exp ganada )
	// si en este nuevo nivel desbloquea alguna funcion nueva o pasa al nuevo mundo, avisar con un mensaje
	if($newLevel == 2) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Acabas de desbloquear la función !avatarpj, ¡ya puedes utilizar un avatar personalizado para tu personaje!</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 5) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Acabas de obtener un arma nueva, y con ella has desbloqueado la función !atacar, ¡ya puedes enfrentarte a los jefes de las zonas en las que te encuentres!".PHP_EOL;
		$msg = $msg."Como sigues en el área de entrenamiento, cuando uses la función podrás practicar con una babosa sencilla de eliminar. ¡Practica tantas veces como quieras!</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 6) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Acabas de obtener un escudo nuevo, y con él se te permite llegar al área de entrenamiento avanzado. A partir de ahora te enfrentarás a los verdaderos jefes de entrenamiento con la función !atacar, además de poder unirte a un clan con la función !unirme. ¡Buena suerte en tu aventura!</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 10) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>El área de entrenamiento ya no es lugar para ti, es hora de emprender tu verdadera aventura, y el primer paso pasa por atravesar el bosque tenebroso.</b>".PHP_EOL;
		$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 17) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Te acabas de adentrar en las profundidades del bosque tenebroso, ¡buena suerte!</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 20) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>El bosque se ha quedado atrás, ¡te doy la bienvenida a la selva!.</b>".PHP_EOL;
		$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 28) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Estás llegando al fondo de la selva, las temperaturas empiezan a no ser humanas, el frío cada vez es más intenso... ¿qué habrá al final de la selva?</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 30) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Acabas de llegar a un glaciar oculto bajo tierra. No parece que el ser humano haya estado por aquí... O en todo caso, no parece que ningún ser humano que ha estado aquí haya vuelto con vida a la superficie.</b>".PHP_EOL;
		$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 37) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Estás en el fondo del glaciar. Atrás queda la superficie fría cercana a la selva, y parece que te estás adaptando a las bajas temperaturas. ¡Tu rocosidad es cada vez mayor!</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 40) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>Parece que al final del glaciar se encuentra el portal que permite abandonar el mundo real para adentrarte en la peligrosa ruta hacia el Inframundo. ¿Serás capaz de derrotar a los guardianes del portal?</b>".PHP_EOL;
		$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	}  else if($newLevel == 50) {
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
		$msg = "<b>Cada vez hay mas luz al fondo del pasaje. No por un sol que ilumine un cielo, si no por fuego que parece inundar el camino. A partir de ahora tendrás que tomar más medidas de precaución contra el fuego...</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 70) {
		apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
		$msg = "<b>¡Porras! El Infierno está a un paso, sin embargo toda la zona está repleta de guardianes que custodian la entrada, creando así un portal prácticamente infranqueable. Parece que solo los Elegidos podrán atravesar el portal... ¿conseguirás alcanzar la meta?</b>".PHP_EOL;
		$msg = $msg."<b>A partir de ahora podrás realizar nuevas tareas con !exp y enfrentarte a nuevos jefes con !atacar, y recibirás más puntos de experiencia por cada una de estas acciones.</b>";
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
	} else if($newLevel == 79) {
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
		$bossTicket = rand(1,4);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,5);
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
		$bossTicket = rand(1,4);
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

function bossBattleResults($chat_id, $win, $lucky, $playerName, $bossName) {
	if($win == 1 && $lucky == 0) {
		$storedStandardVictory = array(
								"La lucha ha comenzado bastante igualada, pero enseguida te has puesto por delante y no has dejado opción al rival. Ha sido una victoria cómoda sin contratiempos.",
								"No ha habido rival, has asestado el primer golpe del combate y casualmente ha sido un golpe crítico. A partir de ahí, coser y cantar, y victoria fácil.",
								"Pan comido, se te ha visto con ganas de luchar sentado para darle emoción. Te has llevado la victoria de calle, y parece que no te importaría repetir.",
								"Tu rival te ha asestado un par de golpes muy fuertes nada más comenzar la pelea que te han dejado grogui, pero tus ataque críticos le han dado la vuelta al combate y has salido victorioso.",
								"Te has mostrado muy sólido en defensa, parece como si en lugar de luchar hubieras querido poner a prueba tu resistencia física, y tu rival prácticamente no te ha quitado puntos de vida. Prueba superada.",
								"¡Cómo corres! Desde el principio del combate te has puesto a dar vueltas alrededor de tu rival y lo has desconcertado con tanto movimiento, lograste atacarle con un par de críticos por detrás y terminaste rápido el combate.",
								"¡Eres un tanque! Has luchado de tal manera que parecía que tus puntos de vida no se iban a agotar nunca, tu rival incluso parecía desesperado por momentos, nunca vio ganada esta batalla.",
								"Tus puntos de ataque han sido vitales esta vez, por cada tres golpes que tu rival lograba acertar sobre ti, tú respondías con uno igual de fuerte. Te has marcado un combo final que ha decantado el combate a tu favor.",
								"Combate extraño, primero parecía que te lo ibas a llevar de calle, pero luego tu rival cogió fuerza y te remontó hasta llevarte al límite, pero en cuanto se cansó del esfuerzo volviste a tomar el mando y la victoria cayó de tu bando.",
								"Es inexplicable, pero tu rival te ha atacado con todo y ha llevado el peso del combate, hasta que ha llegado un punto en que parecía que no podía más, y desde ese momento no ha supuesto un rival digno paar ti. La victoria es tuya.",
								"¡No hay color! Te has paseado por el campo de batalla, te has llevado la victoria prácticamente sin sudar. Si vienen más así mejorarás rápido tus estadísticas."
								);
		$n = sizeof($storedStandardVictory) - 1;
		$n = rand(0,$n);
		$msg = $storedStandardVictory[$n];
	} else if($win == 1 && lucky == 1) {
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
	} else if ($win == 0 && $lucky == 0) {
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
	} else if ($win == 0 && $lucky == 1) {
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
		$msg = "Una batalla realmente extraña, el rival ha expulsado una especie de gas que ha hecho de bola de humo y no se ha podido ver qué ha ocurrido.";
	}
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	sleep(2);
	$msg = "<b>⚔ REPORTE DE BATALLA</b>".PHP_EOL.PHP_EOL."<b>".$playerName." 🆚 ".$bossName."</b>".PHP_EOL.PHP_EOL."<i>".$msg."</i>";
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
}

function bossBattle($chat_id, $link, $level, $totalPower, $playerName) {
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
	$msg = $msg.$row['hp']."</pre>".PHP_EOL;
	$msg = $msg."<pre>ATA:";
	switch(strlen($row['attack'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$msg = $msg.$row['attack']."</pre>".PHP_EOL;
	$msg = $msg."<pre>DEF:";
	switch(strlen($row['defense'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$msg = $msg.$row['defense']."</pre>".PHP_EOL;
	$msg = $msg."<pre>CRÍ:";
	switch(strlen($row['critic'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$msg = $msg.$row['critic']."</pre>".PHP_EOL;
	$msg = $msg."<pre>VEL:";
	switch(strlen($row['speed'])){
		case 1: $msg = $msg."   ";
				break;
		case 2: $msg = $msg."  ";
				break;
		case 3: $msg = $msg." ";
				break;
	}
	$msg = $msg.$row['speed']."</pre>".PHP_EOL.PHP_EOL;
	$msg = $msg."<b>Puntos exp. por victoria:</b> ".$row['exp_points'];
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
	sleep(1);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $msg));
	// calcular quien gana y si es con suerte o no
	if($level < ($row['level'] - 2)) {
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
		// si es +3 al del boss, 90% de ganar
		$victoryTicket = rand(1,10);
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
			// si el poder del pj es >= que el del boss, 90% de ganar
			$victoryTicket = rand(1,10);
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
	bossBattleResults($chat_id, $win, $lucky, $playerName, $bossName);
	error_log("Battle results (WINLUCKY): ".$win.$lucky);
	if($win == 1) {
		$newExp = $row['exp_points'];
	} else {
		$newExp = 0;
	}
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
	} else if($levelNumber > 6) {
		$level = "【★★☆☆☆】";
	} else if($levelNumber > 1) {
		$level = "【★☆☆☆☆】";
	} else {
		$level = "【☆☆☆☆☆】";
	}
	mysql_free_result($result);
	return $level;
}
function getPlayerInfo($fullInfo, $link, $user_id) {
	$query = "SELECT group_id, exp_points, level, extra_points, hp, attack, defense, critic, speed, helmet, body, boots, weapon, shield, avatar, pvp_wins FROM playerbattle WHERE user_id = '".$user_id."'";
	$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
	$row = mysql_fetch_array($result);
	$msg = "";
	if($fullInfo == 0) {
		$msg = $msg."<b>Puntos totales de experiencia:</b> ".$row['exp_points'].PHP_EOL;
		$msg = $msg."<b>Experiencia de nivel ".$row['level'].":</b>".PHP_EOL;
		$expBar = getLevelBar($row['exp_points'], $row['level']);
		$msg = $msg.$expBar.PHP_EOL.PHP_EOL;
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
		$pvp_wins = $row['pvp_wins'];
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
		$msg = $msg."<b>Victorias PvP:</b> ".$pvp_wins.PHP_EOL;
		$msg = $msg."<b>Al siguiente nivel:</b>".PHP_EOL;
		$expBar = getLevelBar($exp_points, $level);
		$msg = $msg.$expBar.PHP_EOL;
		$msg = $msg."<b>Experiencia total:</b> ".$exp_points.PHP_EOL;
		$msg = $msg."<b>Puntos por utilizar:</b> ".$extra_points.PHP_EOL.PHP_EOL;
		$msg = $msg."<b>Estadísticas</b>".PHP_EOL;
		$msg = $msg."<pre>VID:";
		switch(strlen($hp)){
			case 1: $msg = $msg."   ";
					break;
			case 2: $msg = $msg."  ";
					break;
			case 3: $msg = $msg." ";
					break;
		}
		$msg = $msg.$hp."</pre>".PHP_EOL;
		$msg = $msg."<pre>ATA:";
		switch(strlen($attack)){
			case 1: $msg = $msg."   ";
					break;
			case 2: $msg = $msg."  ";
					break;
			case 3: $msg = $msg." ";
					break;
		}
		$msg = $msg.$attack."</pre>".PHP_EOL;
		$msg = $msg."<pre>DEF:";
		switch(strlen($defense)){
			case 1: $msg = $msg."   ";
					break;
			case 2: $msg = $msg."  ";
					break;
			case 3: $msg = $msg." ";
					break;
		}
		$msg = $msg.$defense."</pre>".PHP_EOL;
		$msg = $msg."<pre>CRÍ:";
		switch(strlen($critic)){
			case 1: $msg = $msg."   ";
					break;
			case 2: $msg = $msg."  ";
					break;
			case 3: $msg = $msg." ";
					break;
		}
		$msg = $msg.$critic."</pre>".PHP_EOL;
		$msg = $msg."<pre>VEL:";
		switch(strlen($speed)){
			case 1: $msg = $msg."   ";
					break;
			case 2: $msg = $msg."  ";
					break;
			case 3: $msg = $msg." ";
					break;
		}
		$msg = $msg.$speed."</pre>".PHP_EOL.PHP_EOL;
		$msg = $msg."<b>Equipo:</b>".PHP_EOL;
		$msg = $msg."🎩 ".getItemName(1, $helmet).PHP_EOL;
		$msg = $msg."👔 ".getItemName(2, $body).PHP_EOL;
		$msg = $msg."👞 ".getItemName(3, $boots).PHP_EOL;
		$msg = $msg."🗡 ".getItemName(4, $weapon).PHP_EOL;
		$msg = $msg."🛡 ".getItemName(5, $shield);
	}
	mysql_free_result($result);
	apiRequest("sendChatAction", array('chat_id' => $user_id, 'action' => "typing"));
	if($fullInfo == 1){
		usleep(100000);
	} else {
		sleep(1);
	}
	apiRequest("sendMessage", array('chat_id' => $user_id, 'parse_mode' => "HTML", "text" => $msg));
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
							"Ukelele",
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
						"AwADBAADKAYAApdgXwABGDcVYBepSG4C",
						"AwADBAADKgYAApdgXwABP7pOIo0Cg7IC",
						"AwADBAADKwYAApdgXwABaUhBKTveI0IC",
						"AwADBAADLAYAApdgXwABX2BO0c1mPkkC",
						"AwADBAADLQYAApdgXwABWEndLgABm_BnAg",
						"AwADBAADLgYAApdgXwABw-JMw8wNU6YC",
						"AwADBAADLwYAApdgXwAB3OzOVceXghAC",
						"AwADBAADMAYAApdgXwAB26zS0COYBOsC",
						"AwADBAADMQYAApdgXwABEcSGIet7hi4C",
						"AwADBAADMgYAApdgXwABL8mSUrSsf08C",
						"AwADBAADNAYAApdgXwABDtwDTo0SdO8C",
						"AwADBAADMwYAApdgXwABTRXhGMOVhwoC",
						"AwADBAADNQYAApdgXwABxcF-fuzefs0C",
						"AwADBAADNgYAApdgXwABoYtKdMFDZxgC",
						"AwADBAADNwYAApdgXwAB1-W9ZjyXJScC",
						"AwADBAADOAYAApdgXwABZkqzJjH1uQQC",
						"AwADBAADOQYAApdgXwABqNmnrKQ0-nUC",
						"AwADBAADOgYAApdgXwABsVBk2Oqy0ZcC",
						"AwADBAADKQYAApdgXwABluOCW7zZPIoC"
						);
	$n = sizeof($storedFart) - 1;
	$n = rand(0,$n);
	return $storedFart[$n];
}

function getSong() {
	$storedSong = array(
					"AwADBAADRQYAApdgXwAB14Yf6l3UxsMC",
					"AwADBAADRgYAApdgXwAB8jdj9WF98gYC",
					"AwADBAADSAYAApdgXwAB7-si6A-KcIgC",
					"AwADBAADSQYAApdgXwABoDpJ6Dzwe-wC",
					"AwADBAADSgYAApdgXwABWzwKf9RsahwC",
					"AwADBAADSwYAApdgXwABWmhMjSWk6EgC",
					"AwADBAADTAYAApdgXwAB21Z-w_RH5OIC",
					"AwADBAADTQYAApdgXwABXgGlV-TyyYUC",
					"AwADBAADWAYAApdgXwABX-fvsOnFWcUC",
					"AwADBAADWQYAApdgXwACcq4ScL9H5QI",
					"AwADBAADWgYAApdgXwABM6Hj0O4mN-EC",
					"AwADBAADTgYAApdgXwAB7H5QiCns-9cC",
					"AwADBAADWwYAApdgXwABmmwOVh3vwBcC",
					"AwADBAADTwYAApdgXwABu336EEhtRf4C",
					"AwADBAADXAYAApdgXwABJLVSUS2umukC",
					"AwADBAADXQYAApdgXwABB9w0Wjm9oMMC",
					"AwADBAADUAYAApdgXwABwpy-yG9BvdsC",
					"AwADBAADUQYAApdgXwAB5CCOVF6yFFMC",
					"AwADBAADUgYAApdgXwAB5kuTZJZGnKAC",
					"AwADBAADVQYAApdgXwABTm1lmXWyhJ0C",
					"AwADBAAD7wUAApdgXwABePAjniM8d8sC",
					"AwADBAADVgYAApdgXwAB9v7cYGSeoaUC"
						);
	$n = sizeof($storedSong) - 1;
	$n = rand(0,$n);
	return $storedSong[$n];
}

function launchTdsPts($chat_id) {
	$chooseType = rand(1,10);
	if($chooseType > 3) {
		$gif = Array (
						"BQADBAADLAcAApdgXwABvo9JwunlPxIC",
						"BQADBAADLQcAApdgXwAB3woT9FwhQUoC"
						);
		$n = sizeof($gif) - 1;
		$n = rand(0,$n);
		usleep(500000);
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif[$n]));
	} else {
		$sound = "AwADBAADJQcAApdgXwABtUqPAAHCU01fAg";
		
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "record_audio"));
		sleep(3);
		apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => $sound));
	}
}

function launchMonkey($chat_id) {
	$gif = Array (
					"BQADBAADjwcAApdgXwAB93fZUPqN6eYC",
					"BQADBAADkAcAApdgXwABKT3_WOy7nzQC"
					);
	$n = sizeof($gif) - 1;
	$n = rand(0,$n);
	usleep(500000);
	apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif[$n]));
}

function launchVaporwave($chat_id) {
	$gif = Array (
					"BQADBAADjQcAApdgXwABz561xqd7hQMC",
					"BQADBAADjgcAApdgXwAB8Lnf0AtioK4C"
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
		//$start = strpos(strtolower($callback['message']), "spoiler:");
		$start = $final + 8;
		$hiddenText = substr($text, $start);
	} else {
		$hiddenText = $text;
	}
	$hiddenText = rtrim(ltrim($hiddenText));
	//$spoilerText = $spoilerText.PHP_EOL.PHP_EOL."<i>Pulsa el botón 'Desvelar spoiler' para descubrir qué oculta.</i>";
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
		//$text = $text.
		//		"<i>(Sobrante) Cada hora se planta una nueva bandera en el bot.".PHP_EOL.
		//		"Recuerda que las puedes capturar con la función \"!pole\" y consultar el ránking global con \"!banderas\" y el de tu grupo con \"!banderasgrupo\".</i>";
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
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = ".$group." GROUP BY userbet.user_id";
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
	$query = "SELECT userbet.user_id, userbet.tokens, userbattle.user_name, userbattle.first_name FROM `userbet`, `userbattle` WHERE userbet.user_id = userbattle.user_id AND userbet.group_id = 0 GROUP BY userbet.user_id LIMIT 10";
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
						"!pj",
						"!unirme",
						"!clanes",
						"!atacar",
						"!avatarpj",
						"!declararguerra",
						"!aceptarguerra",
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
						"BQADBAADiAYAApdgXwABqN5wO_1mgpIC",
						"BQADBAADNAQAAvM2gAABZlaORCqLaVYC",
						"BQADBAADQAMAAo23aAABI5mbo35M_8QC",
						"BQADBAADcggAAogZZAcVb5Vbu48TLAI",
						"BQADBAADswoAApdc2gABSw7ly3lVMq4C",
						"BQADBAADYAEAAimnRQb3xqCf3391bQI",
						"BQADBAADmwADlFr9CYLgzzge13fpAg"
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
						"BQADBAADpgYAApdgXwABdXGpHvKQ1WcC",
						"BQADBAADpgYAApdgXwABdXGpHvKQ1WcC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getMyTen() {
	$storedGif = array(
						"BQADBAADqAYAApdgXwAB4cOAdNGn36UC",
						"BQADBAADqAYAApdgXwAB4cOAdNGn36UC"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getReport() {
	$storedGif = array(
						"BQADBAADjgYAApdgXwABbR8jUa2vWM8C",
						"BQADBAADjgYAApdgXwABbR8jUa2vWM8C"
						);
	$n = sizeof($storedGif) - 1;
	$n = rand(0,$n);
	return $storedGif[$n];
}

function getSpot() {
	$storedGif = array(
						"BQADBAADjwYAApdgXwABIDHySSDR3-kC",
						"BQADBAADkAYAApdgXwABYRfTP3c-K44C"
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
						"Tanto va el cántaro a la fuente"
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
						"que al final se ahoga"
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
						"De una relación entre una mujer y un amigo imaginario puede durgir un embarazo psicológico",
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
				$audio = "AwADBAADTwcAApdgXwAByY25pPptx2QC"; // En DemisukeBot será AwADBAADUAcAApdgXwABQc8nD4fGur0C
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
				"@DemisukeBot v2.5 creado por @Kamisuke."
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
				"<i>Si utilizas la función </i><b>!infomini</b><i> el bot se limitará a responder cuántos usuarios usan a</i> @DemisukeBot<i>, en cuántos grupos ha estado y en cuántos sigue activo.</i>"
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
				"▶️<i>Cada participante tendrá un inventario inicial para veinte mástiles, y un inventario adicional con un hueco extra por cada uno de los mástiles que haya capturado el usuario que aparece en la posición 10 de la clasificación del grupo.</i>"
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
				;
	} else if($mode == "rocosos") {
		$text = "🔎 <b>Juego RPG: Los Rocosos de Demisuke</b> 💪"
				.PHP_EOL.PHP_EOL.
				"<b>Funciones disponibles:</b>"
				.PHP_EOL.
				"➡️<b>!exp</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!gastarpunto</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!pj</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!unirme</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!clanes</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!atacar</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!avatarpj</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!declararguerra</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!aceptarguerra</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!rechazarguerra</b>: <i>En construcción.</i>"
				.PHP_EOL.
				"➡️<b>!guerras</b>: <i>En construcción.</i>"
				.PHP_EOL.PHP_EOL.
				"<b>Reglas:</b>"
				.PHP_EOL.
				"▶️<i>En construcción.</i>"
				.PHP_EOL.
				"▶️<i>En construcción.</i>"
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
  // debug message if needed
  debugMode($message);
  
  // process incoming message
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
    // incoming text message
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
	}

    if (strpos($text, "/start") === 0) {
      //apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => 'Hello', 'reply_markup' => array(
      //  'keyboard' => array(array('Hello', 'Hi')),
      //  'one_time_keyboard' => true,
      //  'resize_keyboard' => true)));
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
				strpos($text, "/ayuda_apuestas") === 0 || strpos($text, "/ayuda_apuestas@DemisukeBot") === 0) {
		error_log($logname." triggered: ".$text.".");
		commandsList($chat_id, $text);
    } else if (strpos($text, "/sendNotification") === 0) {
		error_log($logname." triggered: New Notification.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647 && strlen($text) > 18) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$link = dbConnect();
			$query = "SELECT DISTINCT group_id, name FROM DEMITEST WHERE lastpoint > 0";
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
				$gif = "BQADBAADow4AAksYZAfIQMmy5CaN7gI";
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
	} else if (strpos(strtolower($text), "!exp") !== false) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !exp.");
			// iniciar db y mirar si tiene pj
			$link = dbConnect();
			$query = "SELECT last_exp, level, exp_points, critic FROM playerbattle WHERE user_id = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['last_exp'])){
				$currTime = time();
				// si tiene pj mirar si han pasado 5min
				if(($currTime - 299) > $row['last_exp']) {
					// si si han pasado, mirar el nivel 
						// segun el nivel, dar una experiencia u otra, con una funcion que muestre un texto al chat id enviado y devuelva la exp random final
						$expAcquired = getPlayerExp($row['level'], $chat_id);
						$newExp = $row['exp_points'] + $expAcquired;
						$newLevel = getLevelFromExp($newExp);
						mysql_free_result($result);	
						// comprobar si con la nueva exp sube de nivel
						if($newLevel != $row['level']){
							error_log($logname." is now level ".$newLevel.".");
							levelUp($newLevel, $newExp, $row['critic'], $link, $chat_id);
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
						getPlayerInfo(0, $link, $chat_id);
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
				$text = $text.PHP_EOL."<i>A partir de ahora ya puedes volver a utilizar !exp para utilizar tu personaje en distintas tareas en las que ganar experiencia. Cuanto más utilices la función !exp, más experiencia conseguirás, ¡e incluso podrás subir de nivel! Puedes ver las estadísticas de tu personaje con la función !pj.</i>".PHP_EOL;
				$text = $text."<i>Al subir de nivel desbloquearás nuevas opciones para tu personaje y podrás mejorar sus estadisticas, ¡y cuando seas fuerte podrás luchar contra temidos jefes y formar clanes con tus amigos para luchar contra otros rocosos!</i>".PHP_EOL;
				$text = $text.PHP_EOL."Siempre que necesites ayuda puedes consultar /ayuda_rocosos o el menú de !ayuda. ¡Suerte en tu aventura, que te diviertas!".PHP_EOL;
				usleep(100000);
				apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			}
			// cerrar la db
			mysql_free_result($result);
			mysql_close($link);
		}
	} else if (strpos(strtolower($text), "!gastarpunto") !== false) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !gastarpunto.");
			// revisar si lo que hay despues de gastar punto es un stat valido
				// si es valido, comenzar la chicha
					// iniciar db y mirar si tiene pj
						// si tiene pj, mirar si tiene puntos por gastar
							// si tiene puntos, añadirlo donde dice y usar la funcion de ver los nuevos stats (un !pj mini quizas)
							// si no le quedan puntos, mostrar aviso
						// si no tiene pj, avisar de que use !exp en privado
					// cerrar la db
				// si no, avisar de que use bien eso, que mire la ayuda_rocosos si no se entera				
		}
	} else if (strpos(strtolower($text), "!pj") !== false) {
		error_log($logname." triggered: !pj.");
		// usar la funcion !pj maxi, en el !exp se usaba la mini
		$link = dbConnect();
		getPlayerInfo(1, $link, $chat_id);
	} else if (strpos(strtolower($text), "!guerras") !== false) {
		error_log($logname." triggered: !guerras.");
		// mostrar las cinco ultimas guerras entre clanes, con la fecha, los nombres de ambos, el resultado, y si eso una linea pequeña adicional, no se aun, quizas guardo en la base de datos si fue ajustada, paliza, demigrante, random... xD
		// que sea esquematica, que si no aburre y sale un tochaco
		// si aun no se ha librado ninguna guerra, avisar
	} else if (strpos(strtolower($text), "!unirme") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !unirme.");
			// abrir db
			// mirar si quien lo usa tiene pj y de nivel correcto
				// si tiene pj, mirar si el clan existe en la base de datos de groupbattle
					// si existe, unirte (sin siquiera mirar si ya se esta en otro, sobreescritura a saco)
					// si no, decir que el grupo es nuevo y tal, que el bot no lo conoce, que cuando se hable mas por el grupo se podra
				// si no tiene pj dejarlo en ridiculo en el grupo xD, no tiene un pj con minimo de nivel
			// cerrar db
		} else {
			error_log($logname." triggered in private and failed: !unirme.");
			// mensaje de que esto es para grupos, retarded
		}
	} else if (strpos(strtolower($text), "!clanes") !== false) {
		error_log($logname." triggered: !clanes.");
		// abrir db
		// revisar si hay clanes con miembros (haciendo la suma de stats totales agrupando por el group id y quitando bosses y mierdas que haya metido se ve)
			// si hay clanes, mostrar la tabla, aqui con los totales ya se calcularan las estrellas
				// depende de como haga las batallas pvp habra que ir a buscar ese dato a otro lado
			// si no hay, decir que no hay clanes
		// cerrar db
	} else if (strpos(strtolower($text), "!atacar") !== false) {
		if($message['chat']['type'] == "private") {
			error_log($logname." triggered: !atacar.");
			// abrir db
			$link = dbConnect();
			// mirar si tiene pj
			$query = "SELECT exp_points, critic, level, last_boss, (hp + attack + defense + (critic * 3) + speed + (helmet * 3) + body + boots + weapon + shield) AS total_power FROM playerbattle WHERE user_id = ".$chat_id;
			$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			$row = mysql_fetch_array($result);
			if(isset($row['level'])) {
				// si tiene pj, mirar si cumple el nivel
				if($row['level'] > 4) {
					if($row['level'] < 100) {
						$spawnTime = time();
						$spawnTime = $spawnTime - (3600 * 6);
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
							mysql_free_result($result);							
							$playerName = getFullName($message['from']['first_name'], $message['from']['username']);
							$bossExp = bossBattle($chat_id, $link, $level, $totalPower, $playerName);
							$currTime = time();
							if($bossExp > 0) {
								$expPoints = $expPoints + $bossExp;
								$newLevel = getLevelFromExp($expPoints);								
								if($newLevel != $level){
									error_log($logname." is now level ".$newLevel.".");
									levelUp($newLevel, $expPoints, $critic, $link, $chat_id, 1);
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
							getPlayerInfo(0, $link, $chat_id);
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
		// revisar si es una url correcta (250 caracateres, http: y .jpg, .png o .gif)
			// si es correcta, abrir db y añadirla al avatar en caso de que sea lv2 (sobreescribiendo a saco)
				// mostrar mensaje de que se ha guardado, que aparecera cada vez que use !pj
				// cerrar db
			  // si no es lv2 avisar tambien...
			// si no es correcta, ayudarle con el formato				
	} else if (strpos(strtolower($text), "!declararguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !declararguerra.");
			// revisar que este bien escrito el comando
				// si esta bien escrito, chicha insaid
					// abrir db
					// revisar si el grupo tiene al menos 3 estrellas
						// si tiene, revisar la ultima batalla librada para ver si es vieja
							// si es vieja, revisar que el grupo que quiere petar es tambien ***
								// si lo es, lanzar en la db la guerra pendiente y avisar a ambos grupos de que tienen 24h pra aceptar y eso
								// si no es ***, decir que ese grupo es peque
							// si no, decir que te esperes un rato
						// si no, decir que tu grupo es peque, que se una mas gente primero
					// cerrar db
				// si no esta bien, decir que esta mal
		} else {
			error_log($logname." triggered in private: !declararguerra.");
			// mensaje de que esto es para grupos, retarded
		}
	} else if (strpos(strtolower($text), "!aceptarguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !aceptarguerra.");
			// abrir db
			// revisar si tiene alguna guerra pendiente
				// si la tiene revisar si tu grupo sigue siendo ***
					// si sigue, aceptar la guerra, avisar en ambos clanes, y editar muchas db, la de guerra pendiente como aceptada, guardar registro de guerra (una db con winner id y loser id ayudaria luego a saber los pvp points)
						// mostrar todos los datos necesarios con sleep(1) y revisar que todo quede bien aqui
					// si no, decir que no tienes miembros para aceptarla, se autorechaza
						// avisar de que se ha rechazado la guerra, y hacer lo de !rechazarguerra
				// si no, avisar de que no tienes solicitudes de guerra pendientes
			// cerrar db
		} else {
			error_log($logname." triggered in private: !aceptarguerra.");
			// mensaje de que esto es para grupos, retarded
		}
	} else if (strpos(strtolower($text), "!rechazarguerra") !== false) {
		if($message['chat']['type'] == "group" || $message['chat']['type'] == "supergroup") {
			error_log($logname." triggered in a group: !rechazarguerra.");
			// abrir db
			// revisar si tiene alguna guerra pendiente
				// si la tiene rechazar guerra
					// avisar en ambos clanes, y editar muchas db, la de guerra pendiente como rechazada
					// mostrar todos los datos necesarios con sleep(1) y revisar que todo quede bien aqui
				// si no, avisar de que no tienes solicitudes de guerra pendientes
			// cerrar db
		} else {
			error_log($logname." triggered in private: !rechazarguerra.");
			// mensaje de que esto es para grupos, retarded
		}
	} else if (strpos(strtolower($text), "!ludopata") !== false || strpos(strtolower($text), "!ludópata")) {
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
				$gif = "BQADBAADQQcAApdgXwABZVaKL-av07AC";
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
			//$extra = apiRequest("getChatMembersCount", array('chat_id' => '-116857426'));
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

		// Set Path to Font File
			$font_path = dirname(__FILE__)."/img/handwritting.ttf";
		// Print Text On Image
			imagettftext($jpg_image, 28, 0, 475, 125, $textColor, $font_path, $text);

		// Send Image to Browser
			imagejpeg($jpg_image, $imageURL);
		
			$target_url    = "https://api.telegram.org/bot175756236:AAGmeuMt5ZFUAY8bNtDwyyQPq3nL2ScMIbI/sendPhoto";
		
        //This needs to be the full path to the file you want to send.
			$file_name_with_full_path = realpath($imageURL);

			$post = array('chat_id' => $chat_id, 'photo' =>'@'.$file_name_with_full_path);
 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec ($ch);
			curl_close ($ch);


		// Clear Memory
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
	} else if (strpos($text, "%GETSONG%") !== false) {
		$text = substr($text,9);
		//apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
		switch($text) {
			case "1": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADRQYAApdgXwAB14Yf6l3UxsMC"));
						break;
			case "2": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADRgYAApdgXwAB8jdj9WF98gYC"));
						break;
			case "3": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADSAYAApdgXwAB7-si6A-KcIgC"));
						break;
			case "4": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADSQYAApdgXwABoDpJ6Dzwe-wC"));
						break;
			case "5": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADSgYAApdgXwABWzwKf9RsahwC"));
						break;
			case "6": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADSwYAApdgXwABWmhMjSWk6EgC"));
						break;
			case "7": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADTAYAApdgXwAB21Z-w_RH5OIC"));
						break;
			case "8": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADTQYAApdgXwABXgGlV-TyyYUC"));
						break;
			case "9": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADWAYAApdgXwABX-fvsOnFWcUC"));
						break;
			case "10": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADWQYAApdgXwACcq4ScL9H5QI"));
						break;
			case "11": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADWgYAApdgXwABM6Hj0O4mN-EC"));
						break;
			case "12": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADTgYAApdgXwAB7H5QiCns-9cC"));
						break;
			case "13": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADWwYAApdgXwABmmwOVh3vwBcC"));
						break;
			case "14": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADTwYAApdgXwABu336EEhtRf4C"));
						break;
			case "15": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADXAYAApdgXwABJLVSUS2umukC"));
						break;
			case "16": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADXQYAApdgXwABB9w0Wjm9oMMC"));
						break;
			case "17": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADUAYAApdgXwABwpy-yG9BvdsC"));
						break;
			case "18": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADUQYAApdgXwAB5CCOVF6yFFMC"));
						break;
			case "19": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADUgYAApdgXwAB5kuTZJZGnKAC"));
						break;
			case "20": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADVQYAApdgXwABTm1lmXWyhJ0C"));
						break;
			case "21": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAAD7wUAApdgXwABePAjniM8d8sC"));
						break;
			case "22": 	apiRequestWebhook("sendVoice", array('chat_id' => $chat_id, 'voice' => "AwADBAADVgYAApdgXwAB9v7cYGSeoaUC"));
						break;
			default:	break;
		}
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
			error_log($logname." tried to trigger in private: !modoadmin.");
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
	} else if (strpos($text, "%%CONNTRY%%") !== false) {
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "VOY"));
		/*$con = dbConnect();
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $con));
		$final = mysql_query("SELECT DEMI_TEST FROM DEMITEST WHERE DEMI_NAME = 'KAMI'");
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $final));
		mysqli_close($con);*/
	} else if (strpos($text, "/test") === 0) {
		/*$link = mysql_connect('localhost', 'admink88juIN', 'xBBarZSuzgxt') or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db('demitesterbot') or die('No se pudo seleccionar la base de datos');
		mysql_set_charset("UTF8");
		$link = dbConnect();
		$query = 'SELECT * FROM groupbattle';
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			foreach ($line as $col_value) {
				apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => $col_value));
			}
		}
		mysql_free_result($result);
		mysql_close($link);
		$currentTime = time();
		$minutes = date('i');
		$seconds = date('s');
		$flagTime = $currentTime - ($minutes * 60) - $seconds;
		error_log($currentTime." tiempo actual ".date('H:i:s  d-m-Y'));
		error_log($flagTime." tiempo en punto ".date('H:i:s  d-m-Y', $flagTime));*/	
			$currentTime = time();
			$minutes = date('i');
			$seconds = date('s');
			$hour = date('g');
			$currentTime = $currentTime - ($minutes * 60) - $seconds;
			$strLastDigit = "Last from ".$currentTime;
			$lastDigit = $strLastDigit[strlen($strLastDigit) - 1];
			error_log("last digit ".$lastDigit);
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
			$audio = "AwADBAADRQcAApdgXwABqfQ693x1aVQC";
			apiRequest("sendVoice", array('chat_id' => $chat_id, 'voice' => $audio));
		} else {
			error_log($logname." tried to trigger and failed due to group restrictions: Viva Vegetta.");
		}
	} else if (strpos(strtolower($text), "soy programador") !== false) {
		if($randomTicket > -2) {
			error_log($logname." triggered: Soy programador.");
			// Cambiar en DemisukeBot: BQADBAADTAcAApdgXwABjiyeQQvABfQC
			$gif = "BQADBAADSwcAApdgXwABrTePNOqWdrQC";
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
		//$users = apiRequest("getChatMembersCount", array('chat_id' => $chat_id));
		//error_log($users." users here.");
      //apiRequestWebhook("sendMessage", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, "text" => 'Cool'));
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
			if(isset($message['pinned_message']['from']['username']) && $message['pinned_message']['from']['username'] === "Demitest_bot") {
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


define('WEBHOOK_URL', 'https://demisuke-kamigram.rhcloud.com/demihello.php');

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
	debugMode($update);
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