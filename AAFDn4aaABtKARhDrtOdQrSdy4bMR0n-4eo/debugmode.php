<?php

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

?>