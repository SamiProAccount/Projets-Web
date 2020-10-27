<?php
function uploadfile($fieldName,$overwrite=false)
   {
	   
	    $uid=uniqid();
		$target_dir = "../uploads/";
		// basename($_FILES[$fieldName]["name"]);
		$file_name = $uid."-".basename($_FILES[$fieldName]["name"]);
		
		$target_file = $target_dir . $file_name;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES[$fieldName]["tmp_name"]);
		if($check !== false) 
		{
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		 } 
		  else 
		 {
			echo "File is not an image.";
			return null;
			$uploadOk = 0;
		}


// Check if file already exists
		if (file_exists($target_file) && !$overwrite) 
		{
		  echo "Sorry, file already exists.";
		  return null;
		  $uploadOk = 0;
		}

// Check file size
		if ($_FILES[$fieldName]["size"] > 500000) 
		{
		  echo "Sorry, your file is too large.";
		  return null;
		  $uploadOk = 0;
		}

// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  return null;
		  $uploadOk = 0;
		}

// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			return null;
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} 
		else 
		{
			if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) 
			{
				//return $target_file;
	  
			//  echo "The file ". htmlspecialchars( basename( $_FILES[$fieldName]["name"])). " has been uploaded.";
			} 
			else 
			{
				return null;
				echo "Sorry, there was an error uploading your file.";
			}
		}
	
		return $file_name;

		
	}	
	function securisation($donnees){
		$donnees=htmlspecialchars($donnees); //code html injecter n'est pas interpreter s'achiche tel quel 
		$donnees=trim($donnees);// efface les espacement rendu visible dans le code source et s'affiche normalement
		$donnees=stripslashes($donnees);//evite le slach 
		$donnees=strip_tags($donnees);//code html injecter n'est pas interpreter et supprimer du rendu final
		return $donnees;                                           //en  s'affichant normalement
			
   }

