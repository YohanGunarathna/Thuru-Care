
<?php include('../php/function.php');
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=500" />

    <link rel="stylesheet" href="../css/navBar.css" />
    <!-- <link rel="stylesheet" href="../css/index.css" /> -->

    <!-- <link rel="stylesheet" type="text/css" href="cform/css/main.css" /> -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    
    <link rel="stylesheet" href="../css/community.css" />
    <title>Thuru Care-AskQA</title>
  </head>
  


  <body style="margin: 0px">

    <ul>
      <li><img class="logo" src="../images/logo4.png" alt="" srcset="" /></li>
      <li><a href="../home/home.php">Home</a></li>
      <li><a href="../AskQA/ask.php">Ask Question</a></li>
      <li><a class="active" href="../community/post_details.php">Community</a></li>
      <li><a href="../about/about.php">About</a></li>
    </ul>

    <div class="page">
      <div class="pageBody">

        <div class="page_main">

          <div class="page_header">Thuru Care - Community</div>

          <!-- /////////////////////// -->
          <div class="container-contact1">



           <!--  <div class="container"> -->

              <div >
                  <img class="community_photo"<?php echo('src="../images/uploads/'.$_SESSION["ImgUrlComment"].'"'); ?>>
              </div>

              <div class="title_body">
                <h2><?php echo $post['title'] ?></h2>

                <div class="community_body">
                       <p><?php echo $post['body']; ?></p>
                </div>
                      <?php if (isset($user_id)): ?>
                  <form class="clearfix" action="post_details.php" method="post" id="comment_form">
                    <textarea name="comment_text" id="comment_text" class="form-control" placeholder="Comment"></textarea>
                    <div ><button class="comment_button" id="submit_comment">Submit comment</button> </div>
                  </form>

              </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->





  <div class="row">


    <div class="col-md-6 col-md-offset-3 comments-section">
      <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->


      <?php endif ?>

      <!-- Display total number of comments on this post  -->
      <h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
            
      <hr>


 <div class="title_body">
      <!-- comments wrapper -->
      <div id="comments-wrapper">
      <?php if (isset($comments)): ?>
        <!-- Display comments -->
        <?php foreach ($comments as $comment): ?>

        <!-- comment -->

                    <hr class="new1">
                    <!-- <br> -->
        <div class="comment clearfix">
          <div><img src="profile.png" class="profile_pic" ></div>
          <div class="comment_id">
           <span class="comment-name"><?php echo ($comment['user_id']) ?></span> 
            <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
          </div>
          <div class="comment-details">
            <p><?php echo $comment['body']; ?></p>
                        <a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">reply</a>
          </div>


          <!-- reply form -->
          <form action="post_details.php" style="display: none;" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
            <div class="reply_form"> <textarea class="form-control" name="reply_text" id="reply_text" cols="25" rows="2"></textarea></div>

            <div> <button id="submit-reply" class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button> </div>


          </form>



          <!-- GET ALL REPLIES -->
          <?php $replies = getRepliesByCommentId($comment['id']) ?>
          <div class="replies_wrapper_<?php echo $comment['id']; ?>">
            <?php if (isset($replies)): ?>
              <?php foreach ($replies as $reply): ?>
                <!-- reply -->
                <div class="comment reply clearfix">
                  <img src="profile.png" alt="" class="profile_pic" width="40" height="40">
                  <div class="reply-comment-details">
                    
                    <span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
                    <p><?php echo $reply['body']; ?></p>
                    <!-- <a class="reply-btn" href="#">reply</a> -->


                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>

        </div>
          <!-- // comment -->
        <?php endforeach ?>
      <?php else: ?>
        <h2>Be the first to comment on this post</h2>
      <?php endif ?>
      </div><!-- comments wrapper -->

</div>



    </div><!-- // all comments -->
  </div>








            








<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          </div>

          <!-- ////////////////// -->
        </div>

      </div>

    </div>

<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="../js/scripts.js"></script>

  </body>
</html>
