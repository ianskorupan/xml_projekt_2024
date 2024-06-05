<?php
    $user = 'root';
    $password = '';
    $db='choons';
    $db = new mysqli('localhost',$user,$password,$db);

    $relname = $_POST['relname'];
    $artist = $_POST['artist'];
    $img = $_POST['img'];
	$media = $_POST['media'];
	$cat = $_POST['cat'];
	$price = $_POST['price'];
	$info = $_POST['info'];
	$user = $_POST['user'];
	$location = $_POST['location'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

    $sql1 = "INSERT INTO forsale (relname, artist, img, media, cat, price, info, user) VALUES ('$relname','$artist','$img','$media','$cat','$price','$info','$user')";
	$sql2 = "INSERT INTO users (name, location, phone, email) VALUES ('$user','$location','$phone','$email')";

    if(!mysqli_query($db, $sql1))
        echo 'There was an error. Please try again.';
	if(!mysqli_query($db, $sql2))
        echo 'There was an error. Please try again.';
	else
    	header("refresh:0; url=index.php");
?>