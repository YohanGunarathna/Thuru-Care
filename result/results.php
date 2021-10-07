
<?php
session_start();
error_reporting(0);
   if(isset($_FILES['image']) and isset($_FILES['imagetrunk']) ){
      $_SESSION["ImgUrl"]=$_FILES['image']['name'];
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../Rubber_disease_API/uploadsLeaf/".$file_name);
         $_SESSION["boolisOkay"] = true;
      }else{
         print_r($errors);
      }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $_SESSION["ImgUrltrunk"]=$_FILES['imagetrunk']['name'];
      $errors= array();
      $file_nametrunk = $_FILES['imagetrunk']['name'];
      $file_sizetrunk = $_FILES['imagetrunk']['size'];
      $file_tmptrunk = $_FILES['imagetrunk']['tmp_name'];
      $file_typetrunk = $_FILES['imagetrunk']['type'];
      $file_exttrunk=strtolower(end(explode('.',$_FILES['imagetrunk']['name'])));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_exttrunk,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_sizetrunk > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmptrunk,"../Rubber_disease_API/uploadsTrunk/".$file_nametrunk);
         $_SESSION["boolisOkay"] = true;
      }else{
         print_r($errors);
      }
   }
   $response = file_get_contents('http://localhost/ThuruCareFinal/Rubber_disease_API/processing.php');
   $jsonArray = json_decode($response, True);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/navBar.css" />
    <link rel="stylesheet" href="../css/results.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Thuru Care - Result</title>
  </head>
  <body style="margin: 0px">
    <ul>
      <li><img class="logo" src="../images/logo4.png" alt="" srcset="" /></li>
      <li><a class="active" href="../home/home.php">Home</a></li>
      <li><a href="../AskQA/ask.php">Ask Question</a></li>
      <li><a href="../community/post_details.php">Community</a></li>
      <li><a href="../about/about.php">About</a></li>
    </ul>
    <div class="page">
      <div class="pageBody">
        
        <div class="page_main">
                <div class="page_header">Thuru Care - Result</div>

<!--                 <div class="page_desc">THIS IS PAGE DESCRIPTION</div> -->

<!--                 <div class="main_title">
                  <h3>
                    blahhhhhhhhh
                  </h3>
                </div>
 -->

                <div class="container">

                    <?php 
                        if (($jsonArray[0]['status'])=="healthy") {
                          $_SESSION["ImgUrl"]="healthy_tree_image.png";
                        }else{
                          $_SESSION["ImgUrl"]="unhealthy_tree_image.png";
                        }
                    ?>

  <div class="leaf">

      <div >   <img  <?php echo('src="../images/'.$_SESSION["ImgUrl"].'"'); ?>class="leaf_photo" >   </div>

      <div class="card-body">
        <h1 class="card-title"><?php  print_r($jsonArray[0]['status']) ?>  </h1>
        <h3 class="card-text"><?php  print_r($jsonArray[0]['solution']) ?></h3>
      </div>
      
  </div>

                </div>

        </div>



      </div>
   <!--  </div> -->



        <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        $(document).ready(function () {
            // hide and open menu on small screen
            $(".ui.toggle.button").click(function () {
                $(".mobile.only.grid .ui.vertical.menu").toggle(100);
            });

            // toggle right sidebar
            $(".ui.sidebar")
                .sidebar({
                    context: $(".pushable"),
                    animation: "slide along",
                    dimPage: false
                })
                .sidebar("attach events", ".ui.top.attached.blue.button");
        });
    </script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            (i[r] =
                i[r] ||
                function () {
                    (i[r].q = i[r].q || []).push(arguments);
                }),
            (i[r].l = 1 * new Date());
            (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m);
        })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");

        ga("create", "UA-87734989-1", "auto");
        ga("send", "pageview");
    </script>



  </body>
</html>
