<?php

class QuizQuestion {




  private $question = '', $answers = '', $quizItemCount;
  public static $correct = 0;



  //
  public function __construct()
  {
    include 'Questions.php';
    $this->qItem = new Questions();
    $this->qItemArray = $this->qItem->getQuestionsArray();
    define( 'TOTAL_POSSIBLE_POINTS', count($this->qItemArray) );
  }



  // return the current quiz object
  public function returnTheQuizItem( $count, $answered )
  {
    $this->quizItemCount = $count;
    $this->question = $this->qItemArray[$this->quizItemCount]['question'];
    $this->answers = implode(',', $this->qItemArray[$this->quizItemCount]['answer']);
    $this->itemsLeft = ( $this->quizItemCount < TOTAL_POSSIBLE_POINTS - 1 ) ? true : false;

    if($count == 0)
    {
      self::$correct = $answered == '1st' ? 1 : 0;
    }
    else
    {
      $this->setCorrect($answered);
    }

    // return data
    $this->qItemArray[$this->quizItemCount]['correct'] = self::$correct;
    $this->qItemArray[$this->quizItemCount]['totalPossible'] = TOTAL_POSSIBLE_POINTS + 1;
    $this->qItemArray[$this->quizItemCount]['quizItemCount'] = $count;
    $this->qItemArray[$this->quizItemCount]['itemsLeft'] = $this->itemsLeft;
    return $this->qItemArray[$this->quizItemCount];
  }



  // set correct answers as static property once instantiated
  private function setCorrect($a)
  {
    self::$correct = ( $a == $this->qItemArray[$this->quizItemCount - 1]['correct']) ? 1 : 0;
  }



  // return total questions answered
  public function getTotalAnswered()
  {
    return $this->quizItemCount;
  }



  // return total quiz questions
  public function getTotalQuestion()
  {
    return TOTAL_POSSIBLE_POINTS;
  }
}