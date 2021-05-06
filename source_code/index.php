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
        <p style="font-size: x-large; font-weight: 600;">and upgrade yourself by learning new and exciting stuffs</p>
      </div>
      <!-- lets start learning -->
      <div
        class="d-flex justify-content-between mt-4 mb-2"
        style="padding-left: 6vw; padding-right: 5vw"
      >
        <div class="font-weight-bold" style="font-size: larger">
          Lets start learning
        </div>
        <div style="font-size: large;">My learning</div>
      </div>
      
        <div class=" mt-4">
        <div style="margin: auto; justify-content: center;" class="row w-33">
        <?php
              while($images=$result->fetch_assoc()):
           ?>
          <div
            class="col-3 mt-2 mr-2 ml-2 border rounded border-secondary d-flex flex-row"
            style="height: 25vh; padding: 0; width: 33vw; cursor: pointer;"
            onclick="redirectToCourse(<?php echo $images['course_id'] ?>)"
          >
          
            <div class="col-sm d-flex" style="width: 100%; ">
              <div style="width: 40%; display: inline-block">
                <img
                style="width: 95%; height: 19.7vh"
                  src=./public/<?php echo $images['thumbnail'] ?>
                  alt=<?php echo $images['course_name']; ?>
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh; ">
                <p
                  class="font-weight-bold"
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
                <div>Duration: <?php echo $images['duration']." mins"; ?></div>
              </div>
            </div>
          </div>
       <?php endwhile; ?>
        </div>
      </div> 

      <!-- Upload new video -->
      <p
        class="font-weight-bold"
        style="
          font-size: larger;
          display: block;
          margin-top: 4vh;
          text-align: center;
          margin-bottom: 2vh;
        "
      >
        Upload new video
              </p>
      <div class="row justify-content-center">
        <form action="process.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Course Name</label>
            <input
              type="text"
              name="course_name"
              class="form-control"
              placeholder="Enter Course name"
              value=""
            />
          </div>

          <div class="form-group">
            <label>Course Description</label>
            <input
              type="text"
              name="description"
              class="form-control"
              placeholder="Enter Course Description"
              value=""
            />
          </div>

          <div class="form-group">
            <label>Course Duration</label>
            <input
              type="number"
              name="duration"
              class="form-control"
              placeholder="Enter Course duration"
              value=""
            />
          </div>

          <div class="form-group">
            <label>Course Thumbnail</label>
            <input
              type="file"
              name="thumbnail"
              class="form-control"
              placeholder="Add thumbnail"
              value=""
            />
          </div>

          <div class="form-group">
            <label>Video link</label>
            <input
              type="url"
              name="video_link"
              class="form-control"
              placeholder="Add video link"
              value=""
            />
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="save">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <script>
      function redirectToCourse(courseId) {
        window.open(`http://localhost/learnacademy/source_code/video.php?id=${courseId}`, "_self");
      }
    </script>
  </body>
</html>
