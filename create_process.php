<?php
$conn = mysqli_connect('localhost','root','ssg','open');
if($_FILES['uploadfile']['type']=='image/png' || $_FILES['uploadfile']['type']=='image/jpg' || $_FILES['uploadfile']['type']==''){    
    $uploaddir = './file/';
    $uploadfile = $uploaddir.$_FILES['uploadfile']['name'];
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
}
else{
    echo '이미지 파일만 올리세요 ^___^';
    exit;
}
$sql = "
    INSERT INTO topic
        (title, description, created, writer, filename)
        VALUES(
            '{$_POST['in_title']}',
            '{$_POST['description']}',
            NOW(),
            '{$_POST['writer']}',
            '{$_FILES['uploadfile']['name']}'
        )
";
$result = mysqli_query($conn,$sql);
if($result === false){
    echo 'save error';
}
else {
    header('Location: ./index.php');
}
//header('Location: ./index.php?id='.$_POST['title']);
?>