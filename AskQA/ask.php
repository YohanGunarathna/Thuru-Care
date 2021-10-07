
<?php
session_start();
include('../php/config.php');
error_reporting(0);
   if(isset($_FILES['image'])){
      $_SESSION["ImgUrlComment"]=$_FILES['image']['name'];
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
         move_uploaded_file($file_tmp,"../images/uploads/".$file_name);
         $_SESSION["boolisOkay"] = true;
      }else{
         print_r($errors);
      }
   }
   if(!empty($_POST['title'])){
$Title=$_POST["title"];
$Slug=$_POST["slug"];
$description=$_POST["Description"];
$query = sprintf("INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES ('1', '$Title', '$Slug', '$description', current_timestamp(), current_timestamp());");

//execute query
$result = $db->query($query);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=500" />

    <link rel="stylesheet" href="../css/navBar.css" />
    <link rel="stylesheet" href="../css/index.css" />

    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    
    <link rel="stylesheet" href="../css/askqa.css" />
    <title>Thuru Care-AskQA</title>
  </head>
  


  <body style="margin: 0px">

    <ul>
      <li><img class="logo" src="../images/logo4.png" alt="" srcset="" /></li>
      <li><a href="../home/home.php">Home</a></li>
      <li><a class="active" href="../AskQA/ask.php">Ask Question</a></li>
      <li><a href="../community/post_details.php">Community</a></li>
      <li><a href="../about/about.php">About</a></li>
    </ul>

    <div class="page">
      <div class="pageBody">
        <div class="page_main">
          <div class="page_header">Thuru Care</div>
          <!-- /////////////////////// -->
                    <div class="container-contact1">
                      <div class="contact1-pic js-tilt" data-tilt>
                        <img src="../images/img-01.png" alt="IMG" />
                      </div>

                                        <form class="contact1-form validate-form" action="" method="post" enctype="multipart/form-data">
                                              <span class="contact1-form-title"> Ask Question </span>

                                              <div
                                                    class="wrap-input1 validate-input"
                                                    data-validate="title is required"
                                                  >
                                                    <input
                                                      class="input1"
                                                      type="text"
                                                      required="required"
                                                      name="title"
                                                      placeholder="Title"
                                                    />
                                                    <span class="shadow-input1"></span>
                                              </div>

<!--                                               <div
                                                    class="wrap-input1 validate-input"
                                                    data-validate="Valid email is required: ex@abc.xyz"
                                                  >
                                                    <input
                                                      class="input1"
                                                      type="text"
                                                      name="email"
                                                      placeholder="Email"
                                                    />
                                                    <span class="shadow-input1"></span>
                                              </div> -->

                                              <div
                                                      class="wrap-input1 validate-input"
                                                      data-validate="Subject is required"
                                                    >
                                                      <input
                                                        class="input1"
                                                        type="text"
                                                        name="slug"
                                                        placeholder="Keyword"
                                                      />
                                                      <span class="shadow-input1"></span>
                                              </div>

                                              <div
                                                        class="wrap-input1 validate-input"
                                                        data-validate="Message is required"
                                                      >
                                                        <textarea
                                                          class="input1"
                                                          name="Description"
                                                          placeholder="Description"
                                                        ></textarea>
                                                        <span class="shadow-input1"></span>
                                              </div>

                                              <div 
                                                          class="wrap-input1 validate-input"
                                                          >

                                                          <input 
                                                          class="input1"
                                                          name="image" 
                                                          id="selected_image" 
                                                          type="file"  />
                                                          
                                              </div>

                                              <div class="container-contact1-form-btn">
                                                        <button class="contact1-form-btn">
                                                          <span>
                                                            Submit
                                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                          </span>
                                                        </button>
                                              </div>
                                        </form>
                    </div>
          <!-- ////////////////// -->
        </div>
      </div>
    </div>




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
