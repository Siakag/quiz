<?php

if( isset( $_POST['ans'] ) && !empty( $_POST['ans'] ) )
{
  $data = '{';
  $totalCorrect = "correct : " . $_POST['correctAnswers'] . ", ";
  $totalQuestions = "total : " . $_POST['totalQuestions'] . ", ";
  $percentage = "percentage : " . ( ((int)$_POST['correctAnswers']) / ((int)$_POST['totalQuestions']) ) * 100;
  $data .= $totalCorrect . $totalQuestions . $percentage . '}';
  echo json_encode($data, JSON_FORCE_OBJECT);
}