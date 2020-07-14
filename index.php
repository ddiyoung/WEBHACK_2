<?php 
  session_start();
  $nick = $_SESSION['userid']; 
  if(isset($_SESSION['userid'])){
    echo $_SESSION['userid'];?>님 안녕하세요.
<script>
var session = '<?=$_SESSION['userid']?>';
</script>
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
if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
  $conn = mysqli_connect('localhost','root','ssg','open');
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $nick_s = $row['writer'];
}
function print_description(){
  $conn = mysqli_connect('localhost','root','ssg','open');
  if(isset($_GET['id'])){
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
      'description' => $row['description']
    );
    echo "<div style = \"text-align : center; padding-top : 100px\">".$article['description']."</div>";
    $ext = end(explode('.',$row['filename']));
    if($ext =='PNG' || $ext == 'png' ||$ext == 'jpg' ){?>
    <img style='display : block; margin-left : auto; margin-right : auto; width : 30%;' src='/file/<?=$row['filename']?>'/>
    <?php
    }
    if($row['filename'] != NULL){
      echo "<div style = 'text-align : center;padding-left : 750px; display : grid; grid-template-columns: 300px 100px;'>".$row['filename'];
      ?>
      <a href = '/file/<?=$row['filename']?>'download><button type="button" class="button" style = "display : grid;" >다운로드<i id="download"></i></button></a></div>
      <?php
    }
  } 
  else {
    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn,$sql);
    $list = '';
    $name = '';
    while($row = mysqli_fetch_array($result)){
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
      $name = $name."<div>{$row['writer']}</div>";
    }
    echo "<div style = 'display : grid; grid-template-columns: 1200px 1fr;'><ol style = \"padding-left : 600px \" 'display : grid'>{$list}</ol>";
    echo "<div style = 'margin-top : 16px;'>{$name}</div></div>";
  }

}
function print_comment(){
  $conn = mysqli_connect('localhost','root','ssg','open');
  $sql_comment = "SELECT * FROM comment WHERE b_code ={$_GET['id']}";
  $result = mysqli_query($conn,$sql_comment);
  $comment = '';
  while($row = mysqli_fetch_array($result)){
    $comment = $comment."<div style = 'display : flex;'><div style='margin-left: 400px;width: 850px;'>{$row['comment']}</div>
    <div style = 'margin-left: 50px;'>{$row['writer']}</div>
    <div style ='margin-left: 100px;'>{$row['reg_datetime']}</div></div>";
  }
  echo "{$comment}";
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
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

<div id="pr">
    <div  id = "title">
        <h1><a href="index.php">SSG</a></h1>
    </div>
    <div class = "wr">
        <a href="logout.php">LOGOUT</a>
        <a href="create.php">WRITE</a>
        <?php if(isset($_GET['id']) && $nick == $nick_s ) { ?>
      <a href="update.php?id=<?=$_GET['id']?>">UPDATE</a>
    <?php } ?>
    </div>
</div>
<div>
<?php
print_description();
?>
</div>
<div style = "text-align : center;margin-top : 20px;">
<?php 
if(isset($_GET['id']) && $nick == $nick_s ) { ?>
  <form action="delete_process.php" method= "post" >
    <input type="hidden" nick ='writer'  value="<?=$nick ?>">
    <input type="submit" value="delete">
  </form>
<?php } ?>
</div>
<?php
if(isset($_GET['id'])){ ?>
<div id = "area_reply" style = "border-top : 0.5px solid black;">
  <div class = "box_reply_info" style = 'margin-left : 300px; margin-top : 25px;'>댓글</div>
  <div class = "reply_content">
  <div class = "box_comment_list" id = "box_comment_list"></div>
    <div style = "text-align : center;display : grid;grid-template-columns: 1500px 1fr;">
      <input class = "b_code" type = "hidden" name = "id" value = "<?= $_GET['id'] ?>">
      <textarea class = 'comment_text' name="comment" placeholder="내용" cols = 150px rows = 5px style = "margin-left : 400px;"></textarea>
      <button class = 'comment_button' style = "margin-right : 300px;">남기기</button>
      
    </div>
    <div class = 'comments' id = "comments"><?php print_comment(); ?></div>
  </div>
<?php } ?>
</div>
</body>
<script src="comment.js" charset="utf-8"></script>


</html>
