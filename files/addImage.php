<?php

/*NOTE 
    TO ANYONE SEEING THIS: 
    
    THIS IS ALEX TESTING ADDING IMAGES. THIS IS NOT TO BE IMPLEMENTED FOR ACTUAL USE

*/
// Include the database configuration file
include 'config.php';
$statusMsg = '';
//$SL = $_POST['slug'];
// File upload path
$targetDir = "dogPhotos/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        $test = "i got the file ".$fileName. " ";
        echo $test;
        echo $targetFilePath  . " ";
        echo $_FILES["file"]["name"] . " ";
        echo $_FILES["file"]["tmp_name"] . " ";
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $CN->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
