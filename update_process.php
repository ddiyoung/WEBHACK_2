<?php
$conn = mysqli_connect('localhost','root','ssg','open');
if(($_FILES['uploadfile']["type"]=='image/png' || $_FILES['uploadfile']['type'] == 'image/jpg' || $_FILES['uploadfile']['type']=='' )){
    $uploaddir = './file/';
    $uploadfile = $uploaddir.$_FILES['uploadfile']['name'];
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
}
else {
    echo '이미지 파일만 올리세요 ^___^';
    exit;
}
$sql = "
    UPDATE topic
        SET
            title = '{$_POST['title']}',
            description = '{$_POST['description']}',
            filename = '{$_FILES['uploadfile']['name']}'
        WHERE
            id = {$_POST['id']}
";
$uploaddir = './file/';
$uploadfile = $uploaddir.$_FILES['uploadfile']['name'];
move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
$result = mysqli_query($conn,$sql);
$result = mysqli_query($conn,$sql);
if($result === false){
    echo 'update error';
}
else {
    header('Location: ./index.php');
}
?>