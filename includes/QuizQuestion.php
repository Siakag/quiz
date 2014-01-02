<?php

class QuizQuestion {

  private $question = '', $answers = '', $quizItemCount = '';

  public function __construct()
  {
    include 'Questions.php';
    $this->qItem = new Questions();
    $this->qItemArray = $this->qItem->getQuestionsArray();
  }

  public function returnTheQuizItem($count)
  {
    $this->quizItemCount = $count;
    $this->question = $this->qItemArray[$this->quizItemCount]['question'];
    $this->answers = implode(',', $this->qItemArray[$this->quizItemCount]['answer']);
    $this->itemsLeft = ( $this->quizItemCount < count($this->qItemArray) - 1 ) ? true : false;

    // debuging
    $this->qItemArray[$this->quizItemCount]['itemsCount'] = $this->quizItemCount;
    $this->qItemArray[$this->quizItemCount]['totalItems'] = count($this->qItemArray)-1;

    // return data
    $this->qItemArray[$this->quizItemCount]['itemsLeft'] = $this->itemsLeft;
    return $this->qItemArray[$this->quizItemCount];

  }
}