$(function() {



  // populate handlebars template
  (function()
  {
    var quizItems =   [
                        {
                          question    :   "What is the date?",
                          answer      :   [  "12th", "7th", "1st" ],
                          submitValue :   'next'
                        }
                      ];

    var dataWrapper = { quizObject : quizItems };


    console.log(dataWrapper);

    var templateSource = $('#content-template').html();
    var compiledTemplate = Handlebars.compile(templateSource);
    $('#content').append( compiledTemplate(dataWrapper) );

  }());

  $('.answerChoices').on('click', function()
  {
    if( $('.answerChoices:checked').size() > 0 && $('#hInput').val() == '' )
    {
      $('#submit').attr('disabled', false);
      return;
    }
    $('#submit').attr('disabled', true);
  })



  // create object to send and receive JSON data
  function renderQuestion()
  {
    var count = 0;
    var questionsLeft = true;
    var formEls = $('#answers').serialize();
    function sendResults(data)
    {

    }
    function setQuestionsLeft(tof)
    {
      questionsLeft = tof;
    }

    return {
      getNextQuestion : function(data)
      {
        sendResults(data, count);
        setQuestionsLeft(data);
        count++;
      }
    }
  }



  // submit on click handler
  var getResults = renderQuestion();
  $('#submit').on('click', function()
  {
    var answer = {
      a : $('.answerChoices:checked').val()
    }
    var data  = {
      d : JSON.stringify(answer)
    }

    getResults.getNextQuestion(data);
    // console.log( JSON.stringify(data) );
  })



  //
  console.log( $('#answers').serialize() );
})