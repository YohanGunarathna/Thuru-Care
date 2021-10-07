<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/navBar.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Thuru Care</title>
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
          
          <div class="page_header">Thuru Care</div>

          <div class="page_desc"> The ThuruCare web application is designed to identify the White Root Disease of the Rubber plants. White root disease is one of the fatal diseases that can affect the Rubber plants resulting a lot of destruction. The ThuruCare web application identifies the White Root Disease by using the Rubber plant leaf image and using the tree trunk image.
          Please insert the image of the rubber plant and the image of the rubber plant trunk for the White Root Disease Prediction
          
          </div>



          <div class="main_title">
            <h3>
              UPLOAD THE RUBBER LEAF AND TRUNK IMAGE AND INDENTIFY ROOT DISEASE
            </h3>
          </div>

          <div class="container" id="form">
            <form class="ui form" action="../result/results.php" id="form2" method="post" enctype="multipart/form-data">
              
                  <div class="leaf">
                    <div class="leaf_head">Insert Leaf Image</div>
                    <!-- <div class="leaf_photo"></div> -->
                    <div > <img src="../images/leaf_image.png"  class="leaf_photo" id="selected_image"> </div>
                    <div class="leaf_input">
                        <input name="image" required id="selected_image" type="file" onchange="readURL(this)" />
                    </div>
                  </div>

                  <div class="trunk">
                    <div class="leaf_head">Insert Trunk Image</div>
                    <!-- <div class="trunk_photo"></div> -->
                    <div ><img src="../images/trunk_image.png" class="trunk_photo" id="selected_imagetrunk"> </div>
                    <div class="leaf_input">
                        <input name="imagetrunk" required id="selected_imagetrunk" type="file" onchange="readURLtrunk(this)" />
                    </div>
                  </div>

                  



          </div>
                <div class="btn">
                    <!-- <button>Analyze</button> -->
                     <button id="analyze-button" class="analyze-button" > <span>Analyze</span> </button>
                </div>

            </form>
        </div>

      </div>



    </div>

  <!-- <p>© 2021 Copyright : ThuruCare</p> -->
<!-- <div class="footer">
  <p>Yohan Gunarathna - W1673702</p>
</div> -->

<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>

<script>
var uploadFiles;
var uploadFilestrunk;

function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#selected_image')
            .attr('src', e.target.result)
            .width(220)
            .height(220);

        };
        
        reader.readAsDataURL(input.files[0]);
        uploadFiles = input.files;
      }
    }

function readURLtrunk(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
// console.log("Osa");
        reader.onload = function (e) {
          $('#selected_imagetrunk')
            .attr('src', e.target.result)
            .width(220)
            .height(220);

        };
        // alert("Image selected,Click analyse to proceed further");
        reader.readAsDataURL(input.files[0]);
        uploadFilestrunk = input.files;
      }
    }


  $(document).ready(function () {
    // fix menu when passed
    $(".masthead").visibility({
      once: false,
      onBottomPassed: function () {
        $(".fixed.menu").transition("fade in");
      },
      onBottomPassedReverse: function () {
        $(".fixed.menu").transition("fade out");
      }
    });

    // create sidebar and attach to menu open
    $(".ui.sidebar").sidebar("attach events", ".toc.item");
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
