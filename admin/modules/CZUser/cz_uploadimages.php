<?php

	function check_image_type($type) 
	{
		switch($type) 
		{
			case 'image/jpeg':
			case 'image/pjpeg':
			case 'image/jpg':
				return '.jpg';
				break;
			case 'image/gif':
				return '.gif';
				break;
			case 'image/png':
				return '.png';
				break;
			default:
				return false;
				break;
		}
		return false;
	}

	$uploaddir = 'images/CZUser/admin/';
				
	if (check_image_type($_FILES['userfile']['type']) == false)
	{ 
		echo 'ERROR! Unknown image format'; 
	}
	
	list($width, $height) = @getimagesize($_FILES['userfile']['tmp_name']);
		
	if ($height > 15)
	{ 
		echo 'ERROR! Max Height for images is set to 15 pixels'; 
	}
	
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) 
	{				
		$upload_pic = $_FILES['userfile']['name'];					
		$db->sql_query("INSERT INTO `". $prefix ."_czuser_ranks` (img_id, img_pic) VALUES (NULL, '". $upload_pic ."')");
   		redirect($admin_file.'.php?op=czuser');
	} 
	else 
	{
		echo 'ERROR uploading image. Please try again';
	}

?>