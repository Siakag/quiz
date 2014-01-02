<?php

class QuizQuestion {

  private $question = '', $correctAnswer = '', $answers = '', $quizItemCount = '', $answerInputString = '', $submitValue = '', $qItem = '';

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
    $this->correctAnswer = $this->qItemArray[$this->quizItemCount]['correct'];
    $this->answers = $this->qItemArray[$this->quizItemCount]['answer'];
    $this->submitValue = $this->qItemArray[$this->quizItemCount]['submitText'];

    for($i=0; $i < count($this->answers); $i++)
    {
      $this->answerInputString .= "<input type='radio' name='answerChoices' class='answerChoices' value=" . $this->answers[$i] . ">" . $this->answers[$i] . "</input><br>";
    }

    // create quiz form to be returned to index
$quiz = <<<FORM
  <h2>Q: $this->question </h2>
  <form id='answers' action='includes/questionHandler.php' method='post'>
    <input id='hInput' class='hide' type='text' value='' />
      $this->answerInputString
    <input id='submit' type='submit' value="$this->submitValue" disabled='disabled'>
  </form>
FORM;

    return $quiz;
  }
}