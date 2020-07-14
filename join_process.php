<?php
$conn = mysqli_connect('localhost','root','ssg','open');
$sql = "
    INSERT INTO member
        (id, pwd, date, nick)
        VALUES(
            '{$_POST['id']}',
            '{$_POST['pwd']}',
            NOW(),
            '{$_POST['nick']}'
        )
";
$result = mysqli_query($conn,$sql);
if($result === false){
    echo 'save error';
}
else {
?>       <script>
         alert("가입됐습니다");
         location.replace("./login.php");
</script>
<?php   
}
?>