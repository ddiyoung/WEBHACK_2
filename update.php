<?php 
  session_start();

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

<?php
$conn = mysqli_connect('localhost','root','ssg','open');
$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article = array(
    'description' => $row['description']
);
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
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
        <h1><a href="index.php">SSG</a></h1>
    </div>
    <div class = "wr">
        <a href="create.php">WRITE</a>
        <?php if(isset($_GET['id'])) { ?>
      <a href="update.php?id=<?=$_GET['id']?>">UPDATE</a>
    <?php } ?>
    </div>
</div>
<div style = "text-align : center">
        <form action="update_process.php" enctype="multipart/form-data" method='POST' name = 'update' id = 'update'>
        <script>
        $(document).ready(function() {
            $('#update').submit(function() {
                if ($('#in_title').val() == ""){
                    alert("제목을 입력해주세요");
                    $('#in_title').focus();
                    return false;
                }
            });
        });
        </script>
            <input type = "hidden" name = 'id' value ="<?=$_GET['id']?>">
            <p>
                <input type='text' name="title" Placeholder='제목' id = 'in_title' value = "<?=$row['title']?>">
            </p>
            <p>
                <textarea name="description" placeholder="내용" cols = 70px rows = 30px> <?= $article['description'] ?> </textarea>
            </P>
            <p>
                <input type = 'file' name = "uploadfile" accept="image/*"/>
            </P>
            <p>
                <input type='submit' name='submit' id='submit' value='submit' >
            </p>
        </form>
</div>
</body>
</html>