<?php

define('BOT_TOKEN', '222940531:AAEy10E3p1wj1mFUJqnJY63PLMAbAMD6wUM');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
include 'api.php';
/*
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
	$debugText = $debugText."\n"; 
	fwrite($debugFile, $debugText);
	fclose($debugFile);
}

function probability($percent) {
	$n = rand(0,100);
	if($n>$percent) {
		return false;
	}
	return true;
}

function insult() {
	$storedInsult = array(
						"me como a tus ancestros",
						"me meo en tu pupila",
						"me cago en la farola que alumbra la tumba de tus putos muertos",
						"tragallantas",
						"te iba a insultar, pero naciste de un aborto fallido, ya tienes bastante con lo tuyo",
						"deja de liarla, no eres nadie y cuando te enfadas te quedas tuerto",
						"aquí nadie olvidará cuando te pusieron al lado de Raúl DG y la gente pensaba que el guapo era él",
						"ojalá tuvieras unos cuantos años más para mirarte cara a cara, a ver si pasas ya del metro y medio",
						"vete a hacerle una paja a un muerto hijo de mil putas sidosas"
						);
	$n = sizeof($storedInsult) - 1;
	$n = rand(0,$n);
	return $storedInsult[$n];
}

function failInsult($victim) {
	$storedInsult = array(
						"No quiero, subnormal",
						"Paso",
						"Otro día",
						"Nah",
						"Mira, como te vuelvas a meter con* ".$victim." *te parto el pecho con el somier de tu cama y te lo hago tragar bocabajo",
						"¡¿A* ".$victim."*?! Antes te quemo a ti la casa, no me jodas",
						"No voy a ser yo quien insulte a *".$victim."*, tu cara no merece vivir placeres así",
						"Deja en paz a* ".$victim."*, gilipollas"
						);
	$n = sizeof($storedInsult) - 1;
	$n = rand(0,$n);
	return $storedInsult[$n];
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
						"Es difícil dar una respuesta exacta, creo que debemos tomar la pregunta con cautela y analizar los pormenores que pueden parecernos intrascendentes pero que, a la hora de tomar una decisión coherente, pueden torcer la balanza.
						Si nos guiamos por los conceptos de interpretación que existían en la antiguedad, deberíamos hacer un examen de conciencia y ubicarnos como meros espectadores ante una pregunta sin destinatario. Pero si, en cambio, analizamos tu pregunta desde la posición del lineamiento ortodoxo del pensamiento moderno, la respuesta tiene que ver, ya no con la esencia de la interrogación, sino con el espíritu dialéctico de quien interroga.
						En síntesis, la respuesta a tu pregunta, solo puede entenderse desde lo pragmático, asociando los niveles del intelecto que por sí solos, desvelan los secretos de la incógnita. Por otra parte cabe mencionar que para el análisis empírico no es necesario evaluar los preceptos intrínsecos de la realidad, observados desde la lógica y la metafísica",
						"¿Estás de broma? No"
						);
	$n = sizeof($storedReply) - 1;
	$n = rand(0,$n);
	return $storedReply[$n];
}

function lucky() {
	$n = rand(0,200);
	//if($n < 200) {
	//	return false;
	//}
	//return true;
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

function commandsList() {
	$commands = 
				"Este es el menú de ayuda de @DemisukeBot, aquí encontrarás todo lo que el bot es capaz de hacer."
				.PHP_EOL.
				"Utilízalo siempre que quieras repasar cuáles son los comandos que se pueden utilizar con el bot escribiendo \"/demisuke\" sin las comillas."
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.PHP_EOL.
				"*Saludo*:"
				.PHP_EOL.
				"_Escribe \"hola\" para que el bot te devuelva el saludo._"
				.PHP_EOL.PHP_EOL.
				"*Preguntas Sí/No*:"
				.PHP_EOL.
				"_Escribe \"!siono\" seguido de una pregunta para que el bot te resuelva la duda._"
				.PHP_EOL.
				"Ejemplo:"
				.PHP_EOL.
				"`!siono ¿Te gusta este bot?`"
				.PHP_EOL.PHP_EOL.
				"*Insulto*:"
				.PHP_EOL.
				"_Escribe \"!insulta a\" seguido de un nombre de usuario para que el bot le insulte. ¡Ojo! No siempre tendrá ganas de insultar a la persona en cuestión..._"
				.PHP_EOL.
				"Ejemplo:"
				.PHP_EOL.
				"`!insulta a @Kamisuke`"
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.PHP_EOL.
				"Este bot se actualiza con frecuencia, si quieres saber cuándo hay nuevo material guardado en este bot únete al @CanalKamisuke y podrás leer todas las novedades de @DemisukeBot al instante."
				.PHP_EOL.PHP_EOL.
				"@DemisukeBot v0.7 creado por @Kamisuke."
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.PHP_EOL.
				"¿Te gusta el bot? ¡Puntúalo ⭐️⭐️⭐️⭐️⭐️!"
				.PHP_EOL.
				"https://telegram.me/storebot?start=DemisukeBot"
				;
	
	return $commands;
}
*/
function processMessage($message) {
  // debug message if needed
  //debugMode($message);
  
  // process incoming message
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  //$randomTicket = lucky();
  if (isset($message['text'])) {
    // incoming text message
    $text = $message['text'];

    if (strpos($text, "/start") === 0) {
      //apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => 'Hello', 'reply_markup' => array(
      //  'keyboard' => array(array('Hello', 'Hi')),
      //  'one_time_keyboard' => true,
      //  'resize_keyboard' => true)));
	  apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => "Buenas, te doy la bienvenida."));
    } /*else if (strpos($text, "/demisuke") === 0 || strpos($text, "/demisuke@DemisukeBot") === 0) {
		$help = commandsList();
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $help));
    } else if (strtolower($text) === "hola" || strtolower($text) === "buenas" || strtolower($text) === "ey" || strtolower($text) === "ola") {
		//$greeting = greeting();
		//apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$greeting."*"));
    } else if (strpos($text, "/stop") === 0) {
      // stop now
    } else if (strpos(strtolower($text), "!insulta a @") === 0 && strlen($text) > 12) {
		if(probability(80) && strtolower($text) != "!insulta a @kamisuke" && strtolower($text) != "!insulta a @kamisukebot" && strtolower($text) != "!insulta a @demigranciasbot" ) {
			$insult = insult();
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => substr($text, 11)." *".$insult.".*"));
		} else {
			$defend = substr($text, 11);
			$insult = failInsult($defend);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$insult.".*"));
		}
	} else if (strpos(strtolower($text), "!siono") === 0 && strlen($text) > 8) {
		$respuesta = yesNoQuestion();
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$respuesta.".*"));
	} else if (strpos(strtolower($text), ":roto2:") === 0 && strlen($text) == 7) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADdQMAApdgXwAB6_sV0eztbK0C'));
	} else if (strpos(strtolower($text), "roto2") === 0 && strlen($text) == 5) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADdQMAApdgXwAB6_sV0eztbK0C'));
	} else if (strpos(strtolower($text), "reportado") === 0 && strlen($text) == 9) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADbQMAApdgXwABhQXAWGd763oC'));
	} else if (strlen($text) > 1000) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADhwMAApdgXwABpjPrfVQHDkoC'));
	} else if (strtolower($text) === "pole") {
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Subpole.*"));
    } else if (strtolower($text) === "pillo sitio") {
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*+1*"));
    } else if ($randomTicket == 17) {
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*xD*"));
    } else if ($randomTicket == 25) {
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "👍"));
    } else {
      //apiRequestWebhook("sendMessage", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, "text" => 'Cool'));
    } */
  } else {
	 /*if (isset($message['new_chat_title'])) {
		$msg = "*¿".$message['new_chat_title']."?*";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));		
	} else if (isset($message['new_chat_photo'])) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));		
	}else if (isset($message['new_chat_member'])) {
		$msg = "*¿Más gente nueva?,";
		if(isset($message['new_chat_member']['first_name'])){
			$msg = "*".$message['new_chat_member']['first_name'];
		} else if(isset($message['new_chat_member']['username'])) {
			$msg = $message['new_chat_member']['username']."*";
		}
		$msg = $msg." aporta algo al grupo o te echamos en 24 horas.*";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
	} else if (isset($message['left_chat_member'])) {
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*DEP. Nunca te recordaremos.*"));
	} else if (isset($message['pinned_message'])) {
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
	}*/
  }
}


define('WEBHOOK_URL', 'https://kamigram.herokuapp.com/AAEy10E3p1wj1mFUJqnJY63PLMAbAMD6wUM');

if (php_sapi_name() == 'cli') {
  // if run from console, set or delete webhook
  apiRequest('setWebhook', array('url' => isset($argv[1]) && $argv[1] == 'delete' ? '' : WEBHOOK_URL));
  exit;
}


//$content = file_get_contents("php://input");
//$update = json_decode($content, true);
/*
if (!$update) {
  // receive wrong update, must not happen
  exit;
}

if (isset($update["message"])) {
  processMessage($update["message"]);
}*/
?>

<form action="<?php echo API_URL.'sendVoice' ?>" method="post" enctype="mutilpart/form-data">
	<input type="text" name="chat_id" value="6250647" />
	<input type="file" name="voice" />
	<input type="submit" value="Convertir"/>
</form>