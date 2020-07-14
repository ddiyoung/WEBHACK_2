<script src="http://code.jquery.com/jquery-latest.js"></script>
<?php

$conn = mysqli_connect('localhost','root','ssg','open');
$sql = "SELECT id,nick FROM member";
$result = mysqli_query($conn, $sql);
$id = array();
$nick = array();
while($row = mysqli_fetch_array($result)){
    array_push($id,$row['id']);
    array_push($nick,$row['nick']);
  }
?> 
<!doctype html>
<html>
<head>
    <title>
    SSG 게시판
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div id="pr">
    <div  id = "title">
        <h1><a href="login.php">SSG</a></h1>
    </div>
</div>
<div style = "text-align : center;margin-top : 20px;">
    <form action="join_process.php" method="POST" id = 'join'>
    <script>
        let join_id = <?php echo json_encode($id) ?>;
        let join_nick  = <?php echo json_encode($nick) ?>;
        $(document).ready(function() {
            $('#join').submit(function() {
                if ($('#id').val() == ''){
                    alert("id를 입력해주세요");
                    $('#id').focus();
                    return false;
                }
                if ($('#pwd').val() == ''){
                    alert("pw를 입력해주세요");
                    $('#pwd').focus();
                    return false;
                }
                if ($('#nick').val() == ''){
                    alert("닉네임을 입력해주세요");
                    $('#nick').focus();
                    return false;
                }
                if((join_id.includes($('#id').val()))){
                    alert("id가 중복입니다!");
                    $('#id').focus();
                    return false;
                }
                if((join_nick.includes($('#nick').val()))){
                    alert("닉네임이 중복입니다!");
                    $('#nick').focus();
                    return false;
                }
                
            });
        });
</script>
            <p><label style = "padding-right: 17px;">아이디</label>
            <input type="text" name="id" id='id'/></p>
            <p><label>비밀번호</label>
            <input type="password" name="pwd" id = 'pwd' /></p>
            <p><label style = "padding-right: 17px;" >닉네임</label>
            <input type="text" name="nick" id='nick' /></p>
        <input type="submit" value = "회원가입" />
    </form>
</div>
</body>
</html>