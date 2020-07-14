var comment = $('.comment_text');
var b_code = $('.b_code');
var id = b_code.val();
$(document).ready(function() {
  $('.comment_button').click(function() {
      if ($('.comment_text').val() == ''){
          alert("댓글을 입력해주세요");
          $('.comment_text').focus();
      }
      else {
          $.ajax({
              type:'post',
              dataType:'json',
              url:'addcomment.php',
              data:{comment1: comment.val(),b_code1: b_code.val(),writer: session},
              success:function(data) {
                console.log('success');
                location.reload();
              },
              error:function() {
                console.log('fail');
              }
            })
          
      }
  });
});
