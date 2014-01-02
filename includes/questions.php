<?php

class Questions {
    private $quizItems =  array(
                    0 => array(
                      "question"    =>   "What is the century?",
                      "answer"      =>   array(  "21st", "17th", "1st" ),
                      "correct"     =>   '21st',
                      "submitText"  =>   'next'
                    ),
                    1 => array(
                      "question"    =>   "What is the year?",
                      "answer"      =>   array( '1900', '2014', '2013' ),
                      "correct"     =>   '2013',
                      "submitText"  =>   'next'
                    ),
                    2 => array(
                      "question"    =>   "What is the time?",
                      "answer"      =>   array( '7am', '4am', '12:00hrs' ),
                      "correct"     =>   '4am',
                      "submitText"  =>   "calculate total"
                    )
                  );

  public function getQuestionsArray()
  {
    return $this->quizItems;
  }
}