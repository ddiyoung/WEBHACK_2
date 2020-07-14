<?php 
  session_start();
    $nic = $_SESSION['userid'];
  if(isset($_SESSION['userid'])){
    echo $_SESSION['userid'];?>님 안녕하세요.

<?php
    }
    else {
    ?> <script>
      alert("로그인 해주세요");
      location.href='./login.php';
     </script>
<?php
    }
?>
    </script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!doctype html>
<html>
<head>
    <title>
    SSG 게시판
    </title>
    <link rel="stylesheet" href="/style.css" >
</head>
<body>
<div id="pr">
    <div  id = "title">
        <h1><a href="index.php">SSG</a></h1>
    </div>
    <div class = "wr">
        <a href="create.php">WRITE</a>
    </div>
</div>
<div style = "text-align : center">
        <form action="create_process.php" enctype="multipart/form-data" method='POST' name='write' id='write'>
        <script>
        $(document).ready(function() {
            $('#write').submit(function() {
                if ($('#in_title').val() == ''){
                    alert("제목을 입력해주세요");
                    $('#in_title').focus();
                    return false;
                }
            });
        });
        </script>
            <p> <input type = 'hidden' name = writer value = <?php echo $nic;?> > </p>
            <p>
                <input type='text' name="in_title" Placeholder='제목' id = 'in_title' maxlength = "45" >
            </p>
            <p>
                <textarea name="description" placeholder="내용" cols = 70px rows = 30px></textarea>
            </P>
            <p>
            <input type = 'file' name = "uploadfile" accept="image/*"/>
            </p>
            <p>
                <input type='submit' name='submit' id='submit' value='submit' >
            </p>
        </form>
</div>
</body>
</html>