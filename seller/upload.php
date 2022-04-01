<?php
session_start();   
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn, 'virttour');
$user=$_SESSION['email'];

if (isset($_POST['upload'])){
    ##### house details
    $living_space=$_POST['living_space'];
	$bathrooms=$_POST['bathrooms'];
	$bedrooms=$_POST['bedrooms'];
	$building_class=$_POST['building_class'];
	$land=$_POST['land'];
	$age=$_POST['age'];
    
	$image = $_FILES['image'];

	# get the image info and store them in var
	$image_name = $_FILES['image']['name'];
	$tmp_name   = $_FILES['image']['tmp_name'];
	$error      = $_FILES['image']['error'];
	$size		= $_FILES['image']['size'];

	$image_extension= explode('.', $image_name);
	$image_extension=strtolower(end($image_extension));

	$allowed_extensions	= array('jpg','jpeg','gif','png');
	
	if(in_array($image_extension,$allowed_extensions)){
		if($error===0){
			// size in kbs
			if($size<1000000){
				$new_img_name= uniqid('',true).'.'.$image_extension;
				$file_destination='uploads/'.$new_img_name;
				move_uploaded_file($tmp_name,$file_destination);
				$sql="INSERT INTO listings () VALUES ()";
				mysqli_query($conn,$sql);
				header("Location: sell.php?uploaded");
			}else{
				echo "image too large";
			}
		}else{
			echo "Error. Please try again";
		}
	}else{
		echo 'wrong file type';
	}
}

// 	# Number of images
//     $num_of_imgs = count($images['name']);

//     for ($i=0; $i < $num_of_imgs; $i++) { 
    	
//     	# get the image info and store them in var
//     	$image_name = $images['name'][$i];
//     	$tmp_name   = $images['tmp_name'][$i];
//     	$error      = $images['error'][$i];

//     	# if there is not error occurred while uploading
//     	if ($error === 0) {
    		
//     		# get image extension store it in var
//     		$img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

// 			//convert the image extension into lower case 
// 			//and store it in var 
// 			$img_ex_lc = strtolower($img_ex);
            
// 			// crating array that stores allowed
// 			// to upload image extensions.
// 			$allowed_exs = array('jpg', 'jpeg', 'png');


// 			//check if the the image extension 
// 			//is present in $allowed_exs array

// 			if (in_array($img_ex_lc, $allowed_exs)) {
// 				# renaming the image name with 
// 				 #with random string

// 				$new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                
//                 # crating upload path on root directory
//                 $img_upload_path = 'uploads/'.$new_img_name;

//                 # inserting imge name into database
                
//                 $sql  = "INSERT INTO images (img_name)
//                          VALUES (?)";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->execute([$new_img_name]);

//                 # move uploaded image to 'uploads' folder
//                 move_uploaded_file($tmp_name, $img_upload_path);

// 		    	# redirect to 'index.php'
// 	            header("Location: sell.php");


// 			}else {
// 				# error message
//     	     	$em = "You can't upload files of this type";

// 	    		/*
// 		    	redirect to 'index.php' and 
// 		    	passing the error message
// 		        */

// 	            header("Location: sell.php?error=$em");
// 			}

   
//     	}else {
//     		# error message
//     		$em = "Unknown Error Occurred while uploading";

//     		/*
// 	    	redirect to 'index.php' and 
// 	    	passing the error message
// 	        */

// 	        header("Location: sell.php?error=$em");
//     	}
//     }
// }
?>