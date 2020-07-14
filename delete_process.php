<?php
session_start();
$conn = mysqli_connect('localhost','root','ssg','open');
$sql = "
    DELETE
        FROM topic
        WHERE id = {$_SESSION['id']}
";
$sql_comment = "
    DELETE
        FROM comment
        WHERE b_code = {$_SESSION['id']}
";
$result = mysqli_query($conn,$sql);
$result_C = mysqli_query($conn,$sql_comment);
if($result === false || $result_C === false){
    echo 'update error';
}
else {
    header('Location: ./index.php');
}
/*unlink('data/'.$_GET['id']);
header('Location: ./index.php');*/
?>