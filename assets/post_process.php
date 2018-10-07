<?php 

include("conn.php");

$user = $_POST["user"];
$text = $_POST["text"];
$category = $_POST["category"];

$sql = "INSERT INTO posts (post_id, user, text, vote_count, category) VALUES ('','$user','$text','0','$category')";

if ($con->query($sql) === TRUE) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    echo "nope";
}

mysqli_close($con);

?>