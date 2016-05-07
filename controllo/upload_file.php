<?php

$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if(!file_exists($uploaddir)) {
    mkdir($uploaddir, 0755, true);
}

echo '<pre>';

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed.\n";
}

echo 'Alcune informazioni di debug:';
print_r($_FILES);
print "</pre>";

echo "<br>";
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
?> 
