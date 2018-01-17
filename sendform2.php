<?php

include 'includes/sessions.php';
include 'includes/dbh.inc.php';



$author = mysqli_real_escape_string($conn, $_POST['author']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$body = mysqli_real_escape_string($conn, $_POST['editor1']);
$image = mysqli_real_escape_string($conn, $_POST['image']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

$tets = $_SESSION['userid'];


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
// var_dump($target_file);
// exit();
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image or not

$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
    // "";
    $uploadOk = 1;
} else {
    // "Dit bestand is geen afbeelding.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    // "<br />Dit bestand bestaat al.<br />";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 20000000) {
    // "Sorry, bestandsgrootte mag maximaal 200KB zijn.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    // "Sorry, alleen JPG, JPEG, PNG & GIF afbeeldingen toegestaan.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // "Uw bestand is niet ge-upload. Neem contact op met de website beheerder.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // "<br />De afbeelding ". basename( $_FILES["image"]["name"]). " is met succes ge-upload";
    } else {
        // "Er is iets fout gegaan met het uploaden van het bestand. Neem contact op met de website beheerder.";
    }
}




$last_id;
$sql = "INSERT INTO blog_articles (userid,author,title,body,afbeelding,blog_category) VALUES ('$tets','$author','$title','$body','$target_file','$category')";



if ($conn->query($sql) === TRUE) {
    $last_id = mysqli_insert_id($conn);

    // var_dump($_SESSION["blogid"]);
    // exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();



header("Location: pages/blog.php?blogid=$last_id");




?>
