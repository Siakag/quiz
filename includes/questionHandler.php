<?php
require_once 'QuizQuestion.php';

$quiz = new QuizQuestion();

if( isset( $_POST['count'] ) && !empty( $_POST['count'] ) || $_POST['count'] == 0 )
{
  $answerChosen = $_POST['ans'];
  $itemCount = (int)$_POST['count'];
  $data = $quiz->returnTheQuizItem( $itemCount, $answerChosen );
  echo json_encode($data, JSON_FORCE_OBJECT);
}