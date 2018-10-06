<?php 

include("conn.php");

$post_id = $_POST["post_id"];
$user = $_POST["user"];
$type = "vote";

//$result=mysqli_query($con,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql = "INSERT INTO stats (stats_id,post_id, type, user) VALUES ('','$post_id','$type','$user')";

if ($con->query($sql) === TRUE) {
    $count = "SELECT * FROM stats WHERE post_id = $post_id AND type='vote'";
    $votenya = mysqli_num_rows(mysqli_query($con,$count));
    $update = "UPDATE posts SET vote_count = '$votenya' WHERE post_id = '$post_id'";
    $result=mysqli_query($con,$update);
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    echo "nop";
}
mysqli_close($con);

?>