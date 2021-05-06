<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
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
  function pre_r($array)
  {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }

  $get_array = array();
  $get_string = $_SERVER['QUERY_STRING'];
  parse_str($get_string, $get_array);
  $query_term = $get_array["q"];

  $result = $mysqli->query("SELECT * FROM courses WHERE course_name LIKE '%$query_term%'") or die($mysqli->error);
  $res = $result->fetch_all();

  // pre_r($result);
  // pre_r($res);
  ?>
  <div class="p-4">
    <div class="d-flex flex-row align-items-center">
      <div style="cursor: pointer;" onclick="redirectToHome()">
        <img style="width: 100px;" src="./public/logo.png" alt="logo" />
      </div>
      <div style="cursor: pointer;" onclick="redirectToHome()" class="font-weight-bold" style="font-size: larger">
        LearnAcademy
      </div>

      <div class="ml-4 mr-2" style="color: gray">Search</div>
      <input id="searchbar" class="rounded-pill border border-dark pt-2 pb-2 pl-3 pr-3" style="width: 65vw; height: 40px; outline: none" type="text" placeholder="Type keywords and press Enter" />
    </div>

    <div class="col" style="margin-top: 40px;">
      <?php
      foreach ($res as $item) :
      ?>
        <div class="row" style="margin-bottom: 20px;">
          <div onclick="redirectToCourse(<?php echo $item[5] ?>)" style="width:100px;" class="col-3">
            <img class="rounded" style="width: 100%;cursor:pointer;" src=<?php echo "http://img.youtube.com/vi/" . $item[4] . "/mqdefault.jpg" ?> />
          </div>
          <div class="col-8">
            <h5 class="underline-on-hover" onclick="redirectToCourse(<?php echo $item[5] ?>)" style="cursor:pointer"><?php echo $item[0] ?></h1>
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
        <hr />
      <?php endforeach; ?>
    </div>
  </div>
  <script>
    function redirectToHome() {
      window.open("http://localhost/learnacademy/source_code/index.php", "_self");
    }

    function redirectToCourse(courseId) {
      window.open(`http://localhost/learnacademy/source_code/video.php?id=${courseId}`, "_self");
    }

    document.getElementById('searchbar').addEventListener('onkeyup', (e) => {
      
    })

    function onSearch(event) {
      if (event.keyCode === 13) {
        const query = document.getElementById('searchbar').value;
        window.open(`http://localhost/learnacademy/source_code/search.php?q=${query}`, "_self");
      }
    }

    document.getElementById('searchbar').addEventListener('keyup', onSearch);
  </script>
</body>

</html>