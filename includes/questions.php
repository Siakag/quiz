<?php

class Questions {
    private $quizItems =  array(
                    0 => array(
                      "question"    =>   "What is the big idea?",
                      "answer"      =>   array(  "a", "wiseguy", "ehh" ),
                      "correct"     =>   'you'
                    ),
                    1 => array(
                      "question"    =>   "What is the year?",
                      "answer"      =>   array( '1900', '2014', '2014' ),
                      "correct"     =>   '2014'
                    ),
                    3 => array(
                      "question"    =>   "What is your fav color?",
                      "answer"      =>   array( 'pink', 'red', 'green' ),
                      "correct"     =>   'pink'
                    ),
                    2 => array(
                      "question"    =>   "What is the time?",
                      "answer"      =>   array( '7am', 'party time', '12:00hrs' ),
                      "correct"     =>   'party time'
                    )
                  );

  public function getQuestionsArray()
  {
    return $this->quizItems;
  }
}