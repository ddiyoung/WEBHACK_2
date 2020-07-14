<?php
$conn = mysqli_connect('localhost','root','ssg','open');
$comment = $_POST['comment1'];
$sql = "
    INSERT INTO comment
        (b_code,comment,writer,reg_datetime)
        VALUES(
            '{$_POST['b_code1']}',
            '{$_POST['comment1']}',
            '{$_POST['writer']}',
            NOW()          
        )
";
$result = mysqli_query($conn,$sql);
if($result === false){
    echo 'save error';
    echo json_encode(array("comment"=>"error"));
}
else {
    echo json_encode(array("comment"=>"$comment"));
}