<?php

class Questions {
    private $quizItems =  array(
                    0 => array(
                      "question"    =>   "What is the big idea?",
                      "answer"      =>   array(  "sure", "why", "you" ),
                      "correct"     =>   'you'
                    ),
                    1 => array(
                      "question"    =>   "What is the year?",
                      "answer"      =>   array( '1900', '2014', '2013' ),
                      "correct"     =>   '2013'
                    ),
                    3 => array(
                      "question"    =>   "What is your fav color?",
                      "answer"      =>   array( 'blue', 'red', 'green' ),
                      "correct"     =>   'blue'
                    ),
                    2 => array(
                      "question"    =>   "What is the time?",
                      "answer"      =>   array( '7am', '4am', '12:00hrs' ),
                      "correct"     =>   '4am'
                    )
                  );

  public function getQuestionsArray()
  {
    return $this->quizItems;
  }
}