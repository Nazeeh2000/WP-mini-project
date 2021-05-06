<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <title>Learnacademy</title>
</head>

<body>
  <!-- Fetch the current video -->
  <?php
  $mysqli = new mysqli('localhost', 'root', '', 'learnacademy') or die(mysqli_error($mysqli));
  // pre_r($result);
  // pre_r($result->fetch_assoc());

  function pre_r($array)
  {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
  $get_array = array();

  $get_string = $_SERVER['QUERY_STRING'];

  parse_str($get_string, $get_array);

  $course_id = $get_array["id"];

  $result = $mysqli->query("SELECT * FROM courses WHERE course_id=$course_id") or die($mysqli->error);
  $res = $result->fetch_assoc();
  // pre_r($res);

  $url = $res["video_link"];
  parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
  $video_id = $my_array_of_vars['v'];
  // echo $video_id;

  $embed_src = "https://youtube.com/embed/" . $video_id;

  $title = $res["course_name"];
  $desc = $res["description"];

  // Fetch the rest of the videos
  $vids_query = $mysqli->query("SELECT * FROM courses WHERE course_id<>$course_id") or die($mysqli->error);
  $vids = $vids_query->fetch_all();
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
      <input class="rounded-pill border border-dark pt-2 pb-2 pl-3 pr-3" style="width: 65vw; height: 40px; outline: none" type="text" placeholder="Search by catgeories" />
    </div>
  </div>
  <div class="row" style="gap: 20px">
    <div class="col">
      <div style="padding: 20px; text-align: left; width: 100%">
        <iframe width="800" height="400" src="<?php echo $embed_src ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3 style="margin-top: 20px">
          <?php echo $title ?>
        </h3>
        <p>
          <?php echo $desc ?>
        </p>

        <hr>

        <h5>Ask a question</h5>
        <div class="input-group">
          <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
      </div>
    </div>
    <div class="col">
      <?php
      foreach ($vids as $item) :
      ?>
        <div onclick="redirectToCourse(<?php echo $item[5] ?>)" class="row" style="margin-bottom: 20px;">
          <div style="width:100px;" class="col-3">
            <img class="rounded" style="width: 100%;cursor:pointer;" src="public/ver.jpg" />
          </div>
          <div class="col-8">
            <h5><?php echo $item[0] ?></h1>
              <p>
                <?php
                echo substr($item[1], 0, 200);
                if (strlen($item[1]) > 200) {
                  echo '...';
                }
                ?>
              </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script>
    function redirectToCourse(courseId) {
      window.open(`http://localhost/learnacademy/source_code/video.php?id=${courseId}`, "_self");
    }
  </script>
</body>

</html>