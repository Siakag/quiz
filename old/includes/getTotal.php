<?php

if( isset( $_POST['ans'] ) && !empty( $_POST['ans'] ) )
{
  $percentage = ( ((int)$_POST['correctAnswers']) / ((int)$_POST['totalQuestions']) ) * 100;
  $data = $_POST['correctAnswers'] . ', ' . $_POST['totalQuestions'] . ', ' . $percentage;
  echo ($data);
}