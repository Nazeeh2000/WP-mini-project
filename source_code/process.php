<?php

$mysqli = new mysqli('localhost', 'root', '', 'learnacademy') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
  $course_name = $_POST['course_name'];
  $description = $_POST['description'];
  $duration = $_POST['duration'];
  $thumbnail = $_POST['thumbnail'];
  $video_link = $_POST['video_link'];

  $mysqli->query("INSERT INTO courses (course_name, description, duration, thumbnail, video_link) VALUES('$course_name', '$description', '$duration', '$thumbnail', '$video_link')") or 
    die($mysqli->error);
}