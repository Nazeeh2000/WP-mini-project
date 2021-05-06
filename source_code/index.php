<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>Learnacademy</title>

    <style>
    .underline-on-hover:hover {
      text-decoration: underline;
    }
  </style>
  </head>
  <body>
    <?php require_once 'process.php'; ?> 

    <?php
      $mysqli = new mysqli('localhost', 'root', '', 'learnacademy') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM courses") or die($mysqli->error);
      // pre_r($result);
      // pre_r($result->fetch_assoc());

      function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }
     ?>
    <div class="p-4">
      <div class="d-flex flex-row align-items-center">
        <div>
          <img style="width: 100px" src="./public/logo.png" alt="logo" />
        </div>
        <div class="font-weight-bold" style="font-size: larger">
          LearnAcademy
        </div>

        <div class="ml-4 mr-2" style="color: gray">Search</div>
        <input
          class="rounded-pill border border-dark pt-2 pb-2 pl-3 pr-3"
          style="width: 65vw; height: 40px; outline: none"
          type="text"
          placeholder="Search by catgeories"
        />
      </div>


      <div style="background-color: #9ede73; height: 40vh; width: 100%;  padding: 8vh;" class="container mt-3">
        <p style="font-size: xxx-large; font-weight: bold;">Start learning with us!</p>
        <p style="font-size: x-large; font-weight: 600;">and upgrade yourself by learning new and exciting things</p>
      </div>
      <!-- lets start learning -->
      <!-- <div
        class="d-flex justify-content-between mt-4 mb-2"
        style="padding-left: 6vw; padding-right: 5vw"
      >
        <h1 class="font-weight-bold" style="font-size: 80px">
          Start learning now
        </h1>
      </div> -->
      
        <div class=" mt-4">
        <div style="margin: auto; justify-content: center;" class="row w-33">
        <?php
              while($images=$result->fetch_assoc()):
           ?>
          <div
            class="col-3 mt-2 mr-2 ml-2 border rounded border-secondary d-flex flex-row"
            style="height: fit-content; padding: 20px; width: 33vw; cursor: pointer;"
            onclick="redirectToCourse(<?php echo $images['course_id'] ?>)"
          >
          
            <div class="col-sm" style="width: 100%; ">
              <div style="width: 100%; display: inline-block; margin-right: 30px">
                <img
                style="width: 100%; height: auto"
                  src=<?php echo "http://img.youtube.com/vi/".$images['video_id']."/mqdefault.jpg" ?>
                  alt=<?php echo $images['course_name']; ?>
                />
              </div>
              <div style="width: 100%; height: max-content; margin-top: 1vh; ">
                <p
                  class="font-weight-bold underline-on-hover"
                  style="font-size: large; cursor: pointer"
                >
                <?php echo $images['course_name']; ?>
                </p>
                <div>
                <?php echo substr($images['description'], 0, 100);
                  if (strlen($images['description']) > 100) {
                    echo '...';
                  }
                 ?></div>
              </div>
            </div>
          </div>
       <?php endwhile; ?>
        </div>
      </div> 
    </div>
    <script>
      function redirectToCourse(courseId) {
        window.open(`http://localhost/learnacademy/source_code/video.php?id=${courseId}`, "_self");
      }
    </script>
  </body>
</html>
