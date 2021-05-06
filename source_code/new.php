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
  <?php require_once 'process.php'; ?>
  <div class="p-4">
    <div class="d-flex flex-row align-items-center">
      <div style="cursor: pointer;" onclick="redirectToHome()">
        <img style="width: 100px;" src="./public/logo.png" alt="logo" />
      </div>
      <div style="cursor: pointer;" onclick="redirectToHome()" class="font-weight-bold" style="font-size: larger">
        LearnAcademy
      </div>

      <div class="ml-4 mr-2" style="color: gray">Search</div>
      <input id="searchbar" class="rounded-pill border border-dark pt-2 pb-2 pl-3 pr-3" style="width: 65vw; height: 40px; outline: none" type="text" placeholder="Search by catgeories" />
    </div>

    <!-- Upload new video -->
    <p class="font-weight-bold" style="
          font-size: larger;
          display: block;
          margin-top: 4vh;
          text-align: center;
          margin-bottom: 2vh;
        ">
      Add new video
    </p>
    <div class="row justify-content-center">
      <form style="width:40vw;" action="process.php" method="POST">
        <div class="form-group">
          <label>Course Name</label>
          <input type="text" name="course_name" class="form-control" placeholder="Enter Course name" value="" />
        </div>

        <div class="form-group">
          <label>Course Description</label>
          <textarea type="text" name="description" class="form-control" placeholder="Enter Course Description" value=""></textarea>
        </div>

        <!-- <div class="form-group">
            <label>Course Duration</label>
            <input
              type="number"
              name="duration"
              class="form-control"
              placeholder="Enter Course duration"
              value=""
            />
          </div> -->

        <!-- <div class="form-group">
            <label>Course Thumbnail</label>
            <input
              type="file"
              name="thumbnail"
              class="form-control"
              placeholder="Add thumbnail"
              value=""
            />
          </div> -->

        <div class="form-group">
          <label>Video link</label>
          <input type="url" name="video_link" class="form-control" placeholder="Add video link" value="" />
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
    function redirectToHome() {
      window.open("http://localhost/learnacademy/source_code/index.php", "_self");
    }

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