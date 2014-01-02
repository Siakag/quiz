<?php
require_once 'QuizQuestion.php';


if( isset( $_POST['count'] ) && !empty( $_POST['count'] ) || $_POST['count'] == 0 )
{
  $quiz = new QuizQuestion();
  $itemCount = $_POST['count'];
  $data = $quiz->returnTheQuizItem($itemCount);
  echo json_encode($data, JSON_FORCE_OBJECT);
}