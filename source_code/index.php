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
        <!-- <div style="font-size: large;">My learning</div> -->
      </div>
      
      <div class="container mt-4">
        <div class="row">
        <?php
              while($images=$result->fetch_assoc()):
           ?>
          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0;"
          >
          
            <!-- <div class="d-flex flex-row" style="width: 100%"> -->
            <div class="col-sm" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src=<?php echo $images['thumbnail'] ?>
                  alt=<?php echo $images['course_name']; ?>
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                <?php echo $images['course_name']; ?>
                </p>
                <div><?php echo $images['description']; ?></div>
                <div>Duration: <?php echo $images['duration']; ?></div>
              </div>
            </div>
            
          </div>
      <?php endwhile; ?>


          <!-- <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/go.png"
                  alt="go"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Go programming language
                </p>
                <div>Learn Go from complete scratch</div>
                <div>Duration: 16 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                  style="width: 95%; height: 19.7vh"
                  src="./public/c_sharp.png"
                  alt="c#"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  C#
                </p>
                <div>Learn C# from complete scratch</div>
                <div>Duration: 29 hours</div>
              </div>
            </div>
          </div>-->
        </div>
      </div> 

      <!-- <div class="container mt-4">
        <div class="row">
          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/hacking.png"
                  alt="hacking"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Ethical Hacking
                </p>
                <div>Learn Ethical Hacking from complete scratch</div>
                <div>Duration: 20 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/go.png"
                  alt="go"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Go programming language
                </p>
                <div>Learn Go from complete scratch</div>
                <div>Duration: 16 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                  style="width: 95%; height: 19.7vh"
                  src="./public/c_sharp.png"
                  alt="c#"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  C#
                </p>
                <div>Learn C# from complete scratch</div>
                <div>Duration: 29 hours</div>
              </div>
            </div>
          </div>
        </div>
      </div> -->


      <!-- explore new courses -->
      <!-- <div
        class="d-flex justify-content-between mt-4 mb-2"
        style="padding-left: 6vw; padding-right: 5vw"
      >
        <div class="font-weight-bold" style="font-size: larger">
          Explore new courses
        </div>
      </div> -->

      <!-- <div class="container mt-4">
        <div class="row">
          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/etherium.png"
                  alt="etherium"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Etherium and Blockchain
                </p>
                <div>Learn Etherium and master developing smart contracts</div>
                <div>Duration: 21 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/python.png"
                  alt="python"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Python
                </p>
                <div>Learn python from complete scratch</div>
                <div>Duration: 10 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                  style="width: 95%; height: 19.7vh"
                  src="./public/data_science.png"
                  alt="data_science"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Data Science
                </p>
                <div>Learn Data Science from complete scratch</div>
                <div>Duration: 30 hours</div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      
      <!-- Top courses -->

      <!-- <div
        class="d-flex justify-content-between mt-4 mb-2"
        style="padding-left: 6vw; padding-right: 5vw"
      >
        <div class="font-weight-bold" style="font-size: larger">
          Top courses
        </div>
      </div> -->

      <!-- <div class="container mt-4">
        <div class="row">
          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/digital_marketing.png"
                  alt="digital_marketing"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Digital Marketing
                </p>
                <div>Get started with Digital Marketing</div>
                <div>Duration: 24 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                style="width: 95%; height: 19.7vh"
                  src="./public/sql.png"
                  alt="sql"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Complete SQL Bootcamp
                </p>
                <div>Go from zero to hero</div>
                <div>Duration: 10 hours</div>
              </div>
            </div>
          </div>

          <div
            class="col mr-2 ml-2 border rounded border-secondary"
            style="height: 20vh; padding: 0"
          >
            <div class="d-flex flex-row" style="width: 100%">
              <div style="width: 40%">
                <img
                  style="width: 95%; height: 19.7vh"
                  src="./public/ai.png"
                  alt="ai"
                />
              </div>
              <div style="width: 60%; height: max-content; margin-top: 1vh">
                <p
                  class="font-weight-bold"
                  style="font-size: large; cursor: pointer"
                >
                  Artificial Intelligence A-Z
                </p>
                <div>Learn how to build an AI from complete scratch</div>
                <div>Duration: 20 hours</div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

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
        <form action="process.php" method="POST">
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
  </body>
</html>
