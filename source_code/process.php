<?php
function ms_escape_string($data) {
  if ( !isset($data) or empty($data) ) return '';
  if ( is_numeric($data) ) return $data;

  $non_displayables = array(
      '/%0[0-8bcef]/',            // url encoded 00-08, 11, 12, 14, 15
      '/%1[0-9a-f]/',             // url encoded 16-31
      '/[\x00-\x08]/',            // 00-08
      '/\x0b/',                   // 11
      '/\x0c/',                   // 12
      '/[\x0e-\x1f]/'             // 14-31
  );
  foreach ( $non_displayables as $regex )
      $data = preg_replace( $regex, '', $data );
  $data = str_replace("'", "''", $data );
  return $data;
}

$mysqli = new mysqli('localhost', 'root', '', 'learnacademy') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
  // print_r($_POST);

  $course_name = $_POST['course_name'];
  $description = $_POST['description'];
  $duration = $_POST['duration'];
  // $thumbnail = $_POST['thumbnail'];
  $video_link = $_POST['video_link'];

  $url = $video_link;
  parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
  $video_id = $my_array_of_vars['v'];

  $f_name = ms_escape_string($course_name);
  $f_desc = ms_escape_string($description);

  $mysqli->query("INSERT INTO courses (course_name, description, duration, video_link, video_id) VALUES('$f_name', '$f_desc', '$duration', '$video_link', '$video_id')") or 
    die($mysqli->error);
}