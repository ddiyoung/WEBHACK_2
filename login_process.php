<?php 
    session_start();

    $conn = mysqli_connect('localhost','root','ssg','open');

    $id = $_POST['id'];
    $pwd = $_POST['pwd'];

    $query = "select * from member where id='$id'";
    $result = $conn->query($query);
    $row=mysqli_fetch_array($result);
    $nick = $row['nick'];

    if(mysqli_num_rows($result)==1){
        
        
        if($row['pwd']==$pwd){
            $_SESSION['userid']=$nick;
            if(isset($_SESSION['userid'])){
                ?> <script>
                        alert("로그인 됐습니다.");
                        location.replace("./index.php");
            </script>
<?php
            }
            else{
                echo "session fail";
            }
        }
        else {
            ?> <script>
                    alert("아이디 혹은 비밀번호가 잘못됐습니다.");
                    history.back();
        </script>
<?php
        }
        }
        else {
            ?> <script>
            alert("아이디 혹은 비밀번호가 잘못됐습니다.");
            history.back();
</script>
<?php
        }
?>