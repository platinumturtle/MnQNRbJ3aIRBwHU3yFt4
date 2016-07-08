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
						"Ventana",
						"Ukelele",
						"Moneda",
						"Rinoceronte",
						"Papelera",
						"Bombilla",
						"Plástico",
						"Coliflor",
						"Meteorito",
						"Puercoespín",
						"Picaporte",
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
						"elegante",
						"manual",
						"terrícola",
						"velocista",
						"centinela",
						"revolución",
						"estelar",
						"fantasma",
						"impermeable",
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
		//$text = $text.
		//		"<i>(Sobrante) Cada hora se planta una nueva bandera en el bot.".PHP_EOL.
		//		"Recuerda que las puedes capturar con la función \"!pole\" y consultar el ránking global con \"!banderas\" y el de tu grupo con \"!banderasgrupo\".</i>";
	}
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
						"!mensajes",
						"!desactivame",
						"!activame",
						"!banderas",
						"!pole",
						"!grupos",
						"!nick",
						"!info",
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
					"que coleccionaba fots de patos para adornar la cocina ",
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

function commandsList($send_id) {
	$commands = 
				"Este es el menú de ayuda de @DemisukeBot, aquí encontrarás todo lo que el bot es capaz de hacer."
				.PHP_EOL.
				"Utilízalo siempre que quieras repasar cuáles son los comandos que se pueden utilizar con el bot escribiendo \"/demisuke\" o \"!ayuda\" sin las comillas."
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
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
				"_Escribe \"!insulta a\" seguido de un nombre o un usuario para que el bot le insulte. ¡Ojo! No siempre tendrá ganas de insultar a la persona en cuestión..._"
				.PHP_EOL.
				"Ejemplo:"
				.PHP_EOL.
				"`!insulta a @Kamisuke`"
				.PHP_EOL.PHP_EOL.
				"*Stickers*:"
				.PHP_EOL.
				"_Escribe \"!sticker\" para que el bot responda enviando un sticker escogido al azar._"
				.PHP_EOL.PHP_EOL.
				"*Historia*:"
				.PHP_EOL.
				"_Escribe \"!historia\" para que el bot se invente una historia basada en momentos aleatorios de la vida, con un mínimo de sentido._"
				.PHP_EOL.PHP_EOL.
				"*Música*:"
				.PHP_EOL.
				"_Escribe \"!cancion\" o \"!temazo\" para que el bot envíe una canción de éxito y anime el ambiente hasta en los grupos más decaídos._"
				.PHP_EOL.PHP_EOL.
				"*Generador de nombres de usuario*:"
				.PHP_EOL.
				"_Escribe \"!nick\" para que el bot genere automáticamente un nombre de usuario que poder utilizar en internet. Si el resultado no es del agrado de quien lo pide siempre puede volver a intentarlo._"
				.PHP_EOL.PHP_EOL.
				"*Dados de la suerte*:"
				.PHP_EOL.
				"_Escribe \"!dados\" para que el bot lance dos dados y muestre el resultado, una solución muy útil para resolver dudas o debates en grupo al azar, o para inventarse cualquier minijuego entretenido._"
				.PHP_EOL.PHP_EOL.
				"*Test de conexión*:"
				.PHP_EOL.
				"_Escribe \"!ping\" para que el bot te responda. Función útil para comprobar que tu dispositivo tiene conexión a internet y el bot está activo._"
				.PHP_EOL.PHP_EOL.
				"*Palabras y acciones clave*:"
				.PHP_EOL.
				"_El bot reaccionará ante diversas palabras clave y momentos puntuales en una conversación para dar su opinión, siempre que éstas se produzcan dentro de un grupo o supergrupo (¡contiene incluso Easter Eggs!)."
				.PHP_EOL.
				"En caso de ser usuario de ForoCoches darás con la mayoría de estas palabras fácilmente. ¡Encuéntralas todas!_"
				;
	apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "Markdown", "text" => $commands));
	
	$commands = "*Historia del bot*:"
				.PHP_EOL.
				"_Con la función \"!info\" el bot relatará su historia y podrás saber de dónde procede y más datos sobre su vida, tanto en Telegram como fuera._"
				.PHP_EOL.PHP_EOL.
				"_Además contará en cuántos grupos está instalado y te dará pistas sobre funciones ocultas como huevos de pascua o palabras clave._"
				.PHP_EOL.PHP_EOL.
				"*Ránking de usuarios*:"
				.PHP_EOL.
				"_¡Con este ránking sabrás quiénes son los usuarios más activos de Telegram!_"
				.PHP_EOL.
				"_Utiliza \"!mensajesgrupo\" para ver la lista de usuarios más activos de tu grupo, o utiliza \"!mensajes\" para ver la lista global entre todos los grupos._"
				.PHP_EOL.PHP_EOL.
				"_Para mantener la privacidad, por defecto no aparecerás en la lista global de usuarios. Si quieres participar en ella usa la función \"!activame\" y tus puntos serán visibles en el ránking. Siempre podrás volver a ocultarte con \"!desactivame\"._"
				.PHP_EOL.PHP_EOL.
				"_Hay un máximo de diez puntos por minuto posibles. Usar masivamente funciones del bot, realizar 'flood' o enviar varios mensajes seguidos no añadirán más puntos a tu marcador._"
				.PHP_EOL.PHP_EOL.
				"*Ránking de grupos*:"
				.PHP_EOL.
				"_¡Compite contra otros grupos con la ayuda de tus amigos a ser el grupo más activo!_"
				.PHP_EOL.
				"_Por cada mensaje de texto escrito en un grupo se conseguirá un punto para el mismo, siempre que el mensaje enviado no sea ningún archivo, gif o sticker y no se obra de un bot._"
				.PHP_EOL.PHP_EOL.
				"_Escribe \"!grupos\" para ver la clasificación global de los mejores grupos._"
				.PHP_EOL.PHP_EOL.
				"*Captura la bandera*:"
				.PHP_EOL.
				"_Cada hora se planta una nueva bandera en el bot._"
				.PHP_EOL.
				"_El primer usuario que la capture con la función !pole la tendrá en su posesión y su nombre aparecerá para todos en dicha función como su propietario, junto al nombre del grupo desde donde la consiguió capturar, hasta que se plante la siguiente bandera, además de sumar una bandera a su colección._"
				.PHP_EOL.PHP_EOL.
				"_El usuario que tenga la bandera actual en su poder no podrá capturar la siguiente, y tampoco podrá hacerlo todo aquel usuario que tenga el inventario lleno o trate de capturarla desde un grupo muy pequeño._"
				.PHP_EOL.
				"_El tamaño total del inventario es de veinte ranuras para banderas además de una ranura extra por cada bandera que haya capturado el usuario que aparece en la décima posición del ránking._"
				.PHP_EOL.
				"_Puedes consultar el ránking global de banderas con la función \"!banderas\" o el ránking de tu grupo en concreto con \"!banderas\"._"
				.PHP_EOL.
				"¡Captúralas todas desde un grupo o un supergrupo para aparecer en los puestos más altos!"
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.PHP_EOL.
				"Además de las funciones disponibles, @DemisukeBot tratará de aportar vida con frecuencia a los grupos activos que lo tengan en su lista de miembros."
				.PHP_EOL.PHP_EOL.
				"¿Alguna sugerencia que aportar para mejorar al bot? en @KamisukeBot existe el comando /sugerencias con una opción habilitada para registrar las sugerencias para @DemisukeBot donde puedes enviar tus ideas de la manera más rápida y cómoda."
				.PHP_EOL.PHP_EOL.
				"Este bot anunciará automáticamente las actualizaciones más importantes que se realizan, sin embargo hay otras actualizaciones menores que se realizan con frecuencia."
				.PHP_EOL.
				"Si quieres saber cuándo hay nuevo material guardado en este bot únete al @CanalKamisuke y podrás leer todas las novedades de @DemisukeBot al instante."
				.PHP_EOL.PHP_EOL.
				"@DemisukeBot v1.5.2 creado por @Kamisuke."
				.PHP_EOL.PHP_EOL.
				"〰〰〰〰〰〰〰〰〰"
				.PHP_EOL.PHP_EOL.
				"¿Te gusta el bot? ¡Puntúalo ⭐️⭐️⭐️⭐️⭐️!"
				.PHP_EOL.
				"https://telegram.me/storebot?start=DemisukeBot"
				;
	apiRequest("sendMessage", array('chat_id' => $send_id, 'parse_mode' => "Markdown", "text" => $commands));
	//return $commands;
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
		$safeGroup = rankedGroup($message['chat']['id']);
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
		//$help = commandsList();
		//apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $help));
		commandsList($chat_id);
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
			apiRequest("sendMessage", array('chat_id' => $destiny_id, 'parse_mode' => "Markdown", "text" => $textToSend));
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado el mensaje al destinatario.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}
	/*}  else if (strpos($text, "/sendSpecialNot") === 0) {
		error_log($logname." triggered: /sendSpecialNot.");
		if($message['chat']['type'] == "private" && $message['from']['id'] == 6250647) {
			error_log($logname." triggered: Notification from Admin Kamisuke.");
			$group_id = -1001044604308;
			$notificationMessage = "*Se ha reiniciado el contador del grupo debido al floodeo masivo de DemoniaGothKestrell.*";
			apiRequest("sendMessage", array('chat_id' => $group_id, 'parse_mode' => "Markdown", "text" => $notificationMessage));
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Se ha enviado el mensaje.*"));
		} else if ($message['chat']['type'] == "private") {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*No he entendido lo que has dicho...".PHP_EOL."Utiliza* /demisuke * o escribe \"!ayuda\" para saber qué comandos son los que entiendo o añádeme a algún grupo y charlamos mejor.*"));
		}*/
	} else if (strpos($text, "/checkflags") === 0) {
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
	} else if (strtolower($text) === "hola" || strtolower($text) === "buenas" || strtolower($text) === "ey" || strtolower($text) === "ola") {
		error_log($logname." triggered: Hola.");
		$greeting = greeting();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		sleep(2);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$greeting."*"));
    } else if (strpos(strtolower($text), "!dados") !== false) {
		error_log($logname." triggered: !dados.");
		rollDice($chat_id);
    } else if (strpos($text, "/stop") === 0) {
      // stop now
    } else if (isset($message['forward_from']['username'])){
		if($message['forward_from']['username'] == 'DemisukeBot' || $message['forward_from']['username'] == 'Demitest_bot') {
			if (isset($message['from']['first_name'])) {
				$name = $message['from']['first_name'];
			} else if (isset($message['from']['username'])) {
				$name = $message['from']['username'];
			} else {
				$name = "compi";
			}
			error_log($logname." triggered: Forwarding bot.");
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*Buena esa, ".$name.".* 😎"));			
		}
	} else if (isset($message['reply_to_message']['from']['username'])){
		if($message['reply_to_message']['from']['username'] == 'DemisukeBot' || $message['reply_to_message']['from']['username'] == 'Demitest_bot') {
			error_log($logname." triggered: Reply to bot.");
			$dummy = " ";
			$insult = insult($dummy);
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(1);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*No sé qué has dicho, pero ".$insult.".*"));			
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
				//apiRequest("sendDocument", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "reply_to_message_id" => $message_id, "text" => "BQADBAADow4AAksYZAcZ8kFXOQJ3uAI"));
				//apiRequest("sendDocument", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "reply_to_message_id" => $message_id, "text" => "BQADBAADow4AAksYZAfIQMmy5CaN7gI"));
				apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
			}
		}
	} else if (strpos(strtolower($text), "demisuke") !== false) {
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
	} else if (strpos(strtolower($text), "!siono") === 0 && strlen($text) > 8) {
		error_log($logname." triggered: !siono.");
		$respuesta = yesNoQuestion();
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*".$respuesta.".*"));
	} else if (strpos(strtolower($text), "!ping") !== false) {
		error_log($logname." triggered: !ping.");
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*¡Pong!*"));
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
		$text = $text.$totalActive." grupos siguen utilizando el bot.*";
		usleep(250000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $text));
	} else if (strpos(strtolower($text), "!info") !== false) {
		error_log($logname." triggered: !info.");
		//$extra = apiRequest("getChatMembersCount", array('chat_id' => '-116857426'));
	} else if (strpos(strtolower($text), "!becquer") !== false || strpos(strtolower($text), "!bequer") !== false || strpos(strtolower($text), "!becker") !== false || strpos(strtolower($text), "!bécquer") !== false) {
		error_log($logname." triggered: !becquer.");
		$text = str_replace("!bequer", "!becquer", $text);
		$text = str_replace("!becker", "!becquer", $text);
		$start = strpos(strtolower($text), "!becquer") + 9;
		$text = substr($text, $start);
		$text = $text.PHP_EOL.PHP_EOL."–Gustavo Adolfo Bécquer";
		
		$image = new Image('https://demisuke-kamigram.rhcloud.com/img/becquer.jpg');
		$text1 = new Text($text, 3, 25);
		$text1->align = 'left';
		$text1->color = 'FFFFFF';
		$text1->font = 'https://demisuke-kamigram.rhcloud.com/img/handwritting.ttf';
		$text1->lineHeight = 36;
		$text1->size = 24;
		$text1->startX = 40;
		$text1->startY = 40;
		$image->addText($text1);
		$imageURL = rand(0,9);
		$imageURL = "https://demisuke-kamigram.rhcloud.com/img/becquer_".$imageURL.".jpg";
		$image->render($imageURL);
		
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
		error_log($logname." triggered: Roto2.");
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADdQMAApdgXwAB6_sV0eztbK0C'));
	} else if (strpos(strtolower($text), "!video") !== false || strpos(strtolower($text), "!vídeo") !== false) {
		error_log($logname." found !video Easter Egg!");
		$result = getVideo();
		$result ="[👇](".$result.")";
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $result));
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
		error_log($logname." triggered: !pole.");
		$currentTime = time();
		if($message['chat']['type'] == "supergroup" || $message['chat']['type'] == "group") {
			$from_id = $message['from']['id'];
			$minutes = date('i');
			$seconds = date('s');
			$hour = date('g');
			$currentTime = $currentTime - ($minutes * 60) - $seconds;
			$link = dbConnect();
			/* 
			START
			
			
			
			
			*/
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
				$usersGroupCount = apiRequest("getChatMembersCount", array('chat_id' => $chat_id));
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
								$total = 1 + $subTotal; 
								mysql_free_result($result);
								$chatTitle = str_replace("'","''",$message['chat']['title']);
								$query = "SET NAMES utf8mb4;";
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
								$query = "UPDATE `flagcapture` SET `group_name` = '".$chatTitle."', `user_name` = '".$cleanName."', `last_flag` = '".$currentTime."', `total` = '".$total."' WHERE `group_id` = ".$chat_id." AND `user_id` = ".$message['from']['id'];
								$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
							} else {
								error_log("Full inventory.");
								$checkMax = 1;
								$text = "<b>🏴❌ ¡".$name." ha encontrado otra bandera, ¡pero ya tiene el inventario lleno!</b> 🚫";
							}
						}
					} else {
						mysql_free_result($result);
						$user_id = $message['from']['id'];
						$chatTitle = str_replace("'","''",$message['chat']['title']);
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
						$text = $text." ".$hour."! 🎉</b>";	
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
							apiRequest("sendMessage", array('chat_id' => $admin_id, 'parse_mode' => "Markdown", "text" => "*Se han producido duplicados probablemente de ".$cleanName." en la captura de la bandera.*"));
						}
					}
				} else if($usersGroupCount > 4) {
					$text = "<b>🏴❌ ".$name." ha encontrado otra bandera, ¡pero no puede capturar dos seguidas!</b> 🚫";
				} else {
					$text = "<b>🏴❌ ".$name." ha encontrado una bandera, ¡pero el grupo es tan pequeño que no entra!</b> 🚫";
				}
			} else {
				error_log("Trigger: Polefail.");
				mysql_free_result($result);
				$query = "SELECT group_name, user_name FROM flagcapture WHERE last_flag = '".$currentTime."' ORDER BY fc_id";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$row = mysql_fetch_array($result);
				$row = mysql_fetch_array($result);
				$text = "🚩 <b>La bandera de la";
				if($hour != 1) {
					$text = $text."s";
				}
				$text = $text." ".$hour." pertenece a ".$row['user_name'].", se hizo con ella desde ".$row['group_name'].".</b>";
			}
			$text = $text.PHP_EOL.PHP_EOL."🏆 <i>Consulta con la función !banderas el ránking global de usuarios con más banderas y con !banderasgrupo el ránking local del grupo.</i>";
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "HTML", "text" => $text));
			mysql_free_result($result);
			mysql_close($link);
		} else {
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*La pole solo está disponible para grupos y supergrupos, ¡añádeme a alguno!*"));
		}
	} else if (strpos($text, "%%CONNTRY%%") !== false) {
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "VOY"));
		/*$con = dbConnect();
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $con));
		$final = mysql_query("SELECT DEMI_TEST FROM DEMITEST WHERE DEMI_NAME = 'KAMI'");
		apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $final));
		mysqli_close($con);*/
	} else if (strpos($text, "/dbdebugging") === 0) {
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
		mysql_close($link);*/
		$currentTime = time();
		$minutes = date('i');
		$seconds = date('s');
		$flagTime = $currentTime - ($minutes * 60) - $seconds;
		error_log($currentTime." tiempo actual ".date('H:i:s  d-m-Y'));
		error_log($flagTime." tiempo en punto ".date('H:i:s  d-m-Y', $flagTime));		
	} else if (strpos(strtolower($text), "reportado") !== false) {
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
	} else if (strlen($text) > 1000) {
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAADhwMAApdgXwABpjPrfVQHDkoC'));
	} else if (strpos(strtolower($text), "pole") !== false) {
		error_log($logname." triggered: Pole.");
		usleep(500000);
		$gif = getPole();
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
    } else if (strpos(strtolower($text), "pillo sitio") !== false) {
		error_log($logname." triggered: Pillo sitio.");
		usleep(500000);
		$gif = getSpot();
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
	} else if (strpos(strtolower($text), "todas putas") !== false || strpos(strtolower($text), "tds pts") !== false || strpos(strtolower($text), "tdspts") !== false) {
		error_log($logname." triggered: Tds Pts.");
		launchTdsPts($chat_id);
	} else if (strpos(strtolower($text), "melafo") !== false) {
		error_log($logname." triggered: Melafo.");
		usleep(500000);
		$gif = getHitIt();
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
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
		error_log($logname." triggered: Mis dies.");
		usleep(500000);
		$gif = getMyTen();
		apiRequest("sendDocument", array('chat_id' => $chat_id, 'document' => $gif));
	} else if (strtolower($text) === "sticker" || strpos(strtolower($text), "!sticker") !== false) {
		error_log($logname." triggered: !sticker.");
		$sticker = getSticker();
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => $sticker));
    } else if (strpos(strtolower($text), "!nick") !== false) {
		error_log($logname." triggered: !nick.");
		$nick = getNickname();
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => "*El nombre de usuario generado automáticamente es ".$nick.".*"));
    } else if (strpos(strtolower($text), "!historia") !== false) {
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
		error_log("Trigger: Group title.");
		$link = dbConnect();
		$query = 'SELECT total FROM groupbattle WHERE group_id = '.$chat_id;
		$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
		$row = mysql_fetch_array($result);
		if(isset($row['total'])) {
			if($row['total'] > 0) {
				mysql_free_result($result);
				$newtitle = $message['new_chat_title'];
				$newtitle = str_replace("'","''",$newtitle);
				$query = "SET NAMES utf8mb4;";
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
				$query = "UPDATE `groupbattle` SET `name` = '".$newtitle."' WHERE `group_id` = ".$chat_id;
				$result = mysql_query($query) or die(error_log('SQL ERROR: ' . mysql_error()));
			}
		}
		mysql_free_result($result);
		mysql_close($link);
		$msg = "*¿".$message['new_chat_title']."?*";
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));		
	} else if (isset($message['new_chat_photo'])) {
		error_log("Trigger: Group photo.");
		apiRequestWebhook("sendSticker", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, 'sticker' => 'BQADBAAD9gEAApdgXwABtD7Xp1ZdrYsC'));		
	}else if (isset($message['new_chat_member'])) {
		error_log("Trigger: Newcomer to group.");
		$imNewcomer = false;
		if(isset($message['new_chat_member']['username'])) {
			if($message['new_chat_member']['username'] == "DemisukeBot" || $message['new_chat_member']['username'] == "Demitest_bot") {
				$imNewcomer = true;
				$msg = "*Hora de portarse bien, aquí llega el menda.* 😎";
			} else {
			$msg = "*¿Más gente nueva?,";
			if(isset($message['new_chat_member']['first_name'])){
				$msg = "*".$message['new_chat_member']['first_name'];
			} else if(isset($message['new_chat_member']['username'])) {
				$msg = $message['new_chat_member']['username']."*";
			}
			$msg = $msg." aporta algo al grupo o te echamos en 24 horas.*";
			}
		} else {
			$msg = "*¿Más gente nueva?,";
			if(isset($message['new_chat_member']['first_name'])){
				$msg = "*".$message['new_chat_member']['first_name'];
			}
			$msg = $msg." aporta algo al grupo o te echamos en 24 horas.*";
		}
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		sleep(1);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
		if($imNewcomer) {
			$msg = "*Dadme unos segundillos que me instalo en vuestro habitáculo...*";
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(2);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			$msg = "*Venga, todo listo, os dejo el menú y me piro a dormir.*";
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(3);
			apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
			sleep(2);
			//$msg = commandsList();
			//apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "text" => $msg));
			commandsList($chat_id);
		}
	} else if (isset($message['left_chat_member'])) {
		error_log("Trigger: Left group.");
		apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));
		usleep(500000);
		apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $message_id, "text" => "*DEP. Nunca te recordaremos.*"));
	} else if (isset($message['pinned_message'])) {
		error_log("Trigger: Pinned message.");
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
	} else if (isset($message['forward_from']['username'])){
		error_log("Trigger: Forward message.");
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
	error_log($update["edited_message"]['from']['first_name']." triggered: Edited message.");
	usleep(500000);
	$chat_id = $update["edited_message"]['chat']['id'];
	$reply = $update["edited_message"]['message_id'];
	$message = "*Los mensajes editados hacen llorar al niño Demisuke.*";
	apiRequest("sendChatAction", array('chat_id' => $chat_id, 'action' => "typing"));			
	usleep(1000000);
	apiRequest("sendMessage", array('chat_id' => $chat_id, 'parse_mode' => "Markdown", "reply_to_message_id" => $reply, "text" => $message));			
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
		/* EL MIO BUENO
		apiRequestJson("answerInlineQuery", ["inline_query_id" => $queryId, "results" => [
		["type" => "article", "id" => "0", "title" => "Pulsa para crear Spoiler", "message_text" => "este no se como lo hare...", "reply_markup" => ["inline_keyboard" => [[ [[ (object)$object ]], ]] ], ],
		["type" => "article", "id" => "1", "title" => "Pulsa para enviar en negrita", "message_text" => $boldText, 'parse_mode' => "HTML",],
		["type" => "article", "id" => "2", "title" => "Pulsa para enviar en azul", "message_text" => $claveles, 'parse_mode' => "HTML", 'disable_web_page_preview' => TRUE],
		]]);*/
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
	error_log($logname." clicked on a spoiler button.");
	$callback = $update["callback_query"];
	$query_id = $update["callback_query"]["id"];
	$chat_id = $callback['from']['id'];
	//if(isset($callback['from']['username']) && strlen($callback['from']['username']) > 0) {
	//	$senderName = $callback['from']['username'];
	//} else if(isset($callback['from']['first_name']) && strlen($callback['from']['first_name']) > 0) {
	//	$senderName = $callback['from']['first_name'];
	//} else {
	//	$senderName = "";
	//}
	//$start = strpos($senderName, "¡");
	//$length = strpos(strtolower($senderName), " tiene un secreto") - $start;
	//$str = var_export($callback, true);
	//error_log($str);
	//$str2 = json_encode($callback);
	//error_log($str2);
	//$senderName = substr($senderName, $start, $length);
	//$message = "Mensaje";
	//if(strlen($senderName) > 0) {
	//	$message = $message." de ".$senderName;
	//}
	$message = "Mensaje oculto para ".$logname.":".PHP_EOL.PHP_EOL;
	$message = $message.$callback['data'];
	//$prueba = var_dump($message);
	//error_log($prueba);
	//$result = "Spoiler start: ".$callback['message']['text'].PHP_EOL."From question: ".$callback['inline_message_id'];
	//error_log("ID ".$callback['id']." FROM ".$callback['from']['id']." MESSAGE ".var_dump($callback['message'])." INLINE MES ".$callback['inline_message_id']." DATA ".$callback['data']);
	//apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => $result));	
	//$alert = "Desvelando spoiler...";
	//if(strpos(strtolower($message), "spoiler:") !== false) {
		//$start = strpos(strtolower($callback['data']), "spoiler:");
		//$start = strpos(strtolower($callback['message']), "spoiler:");
		//$start = $start + 8;
		//$result = substr($callback['data'], $start);
		//$result = substr($callback['message'], $start);
		//$result = ltrim($result);
	//if($message == "") {
	//	$message = $logname." no ha escrito ninguna respuesta, no puedo desvelarte ningún secreto más allá de su estupidez...";
	//}
	//} else {
	//	$result = $callback['data'];
	//}
	apiRequest("answerCallbackQuery", array('callback_query_id' => $query_id, "text" => $message, "show_alert" => TRUE));	
	//usleep(500000);	
	//apiRequest("answerCallbackQuery", array('callback_query_id' => $query_id, "text" => $alert, "show_alert" => FALSE));
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
	$keboardButton = (object) ["text" => "Desvelar spoiler", "callback_data" => $hiddenText];
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
				$keboardButton,
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
/*
function encryptSpoiler($text) {
	$cc = $text;
	$key = 'fJcSdDIcScjShcYcsW';
	$iv = '17251956';
	$cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$encryptedText = mcrypt_generic($cipher,$cc);
	mcrypt_generic_deinit($cipher);
	mcrypt_module_close($cipher);
	return $encryptedText;
}

function decryptSpoiler($text) {
	$cc = $text;
	$key = 'fJcSdDIcScjShcYcsW';
	$iv = '17251956';
	$cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$decryptedText = mdecrypt_generic($cipher,$encrypted);
	mcrypt_generic_deinit($cipher);
	mcrypt_module_close($cipher);
	return $decryptedText;
}

class spoiler {
 
    private static $Key = "17251956fJcSdDIcScjShcYcsW";
 
    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(spoiler::$Key), $input, MCRYPT_MODE_CBC, md5(md5(spoiler::$Key))));
        return $output;
    }
 
    public static function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(spoiler::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(spoiler::$Key))), "\0");
        return $output;
    }
 
}
*/










class Text
{
    public $text = 'Demisuke soy yo reencarnado.';
    public $width = 80;
    public $startX = 0;
    public $startY = 0;
    public $align = 'left';
    public $color = '3f3f3f';
    public $font = 'handwritting.ttf';
    public $lineHeight = 24;
    public $size = 16;
    protected $lines;

    public function __construct($text, $numLines = 1, $width = 80)
    {
        $this->text = $text;
        $this->width = $width;
        $this->addLines($numLines);
    }

    public function addLines($numLines = 1)
    {
        for ($i = 0; $i < $numLines; $i++) {
            $this->lines[] = array(
                'chars' => 0,
                'words' => array(),
                'full' => false
            );
        }
    }

    public function Image ($image)
    {
        // Allocate words to lines
        $this->distributeText();
        // Calculate maximum potential line width (close enough) in pixels
        $maxWidthString = implode('', array_fill(0, $this->width, 'x'));
        $maxWidthBoundingBox = imagettfbbox($this->size, 0, $this->font, $maxWidthString);
        $maxLineWidth = abs($maxWidthBoundingBox[0] - $maxWidthBoundingBox[2]); // (lower left corner, X position) - (lower right corner, X position)
        // Calculate each line width in pixels for alignment purposes
        for ($j = 0; $j < count($this->lines); $j++) {
            // Fetch line
            $line =& $this->lines[$j];
            // Remove unused lines
            if (empty($line['words'])) {
                unset($this->lines[$j]);
                continue;
            }
            // Calculate width
            $lineText = implode(' ', $line['words']);
            $lineBoundingBox = imagettfbbox($this->size, 0, $this->font, $lineText);
            $line['width'] = abs($lineBoundingBox[0] - $lineBoundingBox[2]); // (lower left corner, X position) - (lower right corner, X position)
            $line['text'] = $lineText;
        }
        // Calculate line offsets
        for ($i = 0; $i < count($this->lines); $i++) {
            // Fetch line
            if (array_key_exists($i, $this->lines)) {
                $line =& $this->lines[$i];
                // Calculate line width in pixels
                $lineBoundingBox = imagettfbbox($this->size, 0, $this->font, $line['text']);
                $lineWidth = abs($lineBoundingBox[0] - $lineBoundingBox[2]); // (lower left corner, X position) - (lower right corner, X position)
                // Calculate line X,Y offsets in pixels
                switch ($this->align) {
                    case 'left':
                        $offsetX = $this->startX;
                        $offsetY = $this->startY + $this->lineHeight + ($this->lineHeight * $i);
                        break;
                    case 'center':
                        $imageWidth = $image->getWidth();
                        $offsetX = (($maxLineWidth - $lineWidth) / 2) + $this->startX;
                        $offsetY = $this->startY + $this->lineHeight + ($this->lineHeight * $i);
                        break;
                    case 'right':
                        $imageWidth = $image->getWidth();
                        $offsetX = $imageWidth - $line['width'] - $this->startX;
                        $offsetY = $this->startY + $this->lineHeight + ($this->lineHeight * $i);
                        break;
                }
                // Render text onto image
                $image->getImage()->text($line['text'], $offsetX, $offsetY, $this->size, $this->color, 0, $this->font);
            }
        }
    }

    protected function distributeText()
    {
        // Explode input text on word boundaries
        $words = explode(' ', $this->text);
        // Fill lines with words, toss exception if exceed available lines
        while ($words) {
            $word = array_shift($words);
            for ($i = 0; $i < count($this->lines); $i++) {
                $line =& $this->lines[$i];
                if ($line['full'] === false) {
                    $charsPotential = strlen($word) + $line['chars'];
                    if ($charsPotential <= $this->width) {
                        array_push($line['words'], $word);
                        $line['chars'] = $charsPotential;
                        break;
                    } else {
                        $line['full'] = true;
                    }
                }
            }
        }
    }
}





class Image
{
    public $image;
    public $textObjects = array();
    public function __construct($sourceImage)
    {
        $this->image = Image::make($sourceImage);
    }
    public function addText(Text $text)
    {
        $this->textObjects[] = $text;
    }
    public function drawText()
    {
        foreach ($this->textObjects as $text) {
            $text->renderToImage($this);
        }
    }
    public function render($outputImagePath)
    {
        $this->drawText();
        $this->image->save($outputImagePath);
    }
    public function getWidth()
    {
        return imagesx($this->image->resource);
    }
    public function getImage()
    {
        return $this->image;
    }
}














?>