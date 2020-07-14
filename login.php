<style>
    #login {
        text-align : center;margin-top : 20px;
    }
    .id_label {
        padding-right : 17px;
    }

</style>
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
<div id="login">
    <form action="login_process.php" method="POST" class="login">
            <p><label class = id_label>아이디</label>
            <input type="text" name="id" /></p>
            <p><label>비밀번호</label>
            <input type="password" name="pwd" /></p>
        <input type="submit" value = "로그인" />
    </form>
    <button type="button" onclick="document.location='join.php'" class = "join">회원가입</button> 
</div>
</body>
</html>