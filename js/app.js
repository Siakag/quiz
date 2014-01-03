$(function() {

  // populate handlebars template
  (function()
  {
    // first question - static
    var quizItems =   [
                        {
                          question    :   "What is the date?",
                          answer      :   [  "12th", "7th", "1st" ],
                          submitValue :   'next'
                        }
                      ];

    // handlebars functions
    var templateSource = $('#content-template').html();
    var compiledTemplate = Handlebars.compile(templateSource);
    var dataWrapper = { quizObject : quizItems };
    $('#content').append( compiledTemplate(dataWrapper) );

  }());



  // enable 'next' button even on dynamically added content
  $(document).on('click', '.answerChoices', function()
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
    var count = 0, anyQuestionsLeft = true, correctAnswers = 0, getTotal = false, totalQuestions = 100, currentItem = 0, questionsLeftInt;
    // var formEls = $('#answers').serialize();

    function sendResults(d)
    {

      // append to data object
      d.count = count;
      d.question = count + 1;

      // set vars for getting totals
      if(getTotal == true)
      {
        d.count = count;
        d.anyQuestionsLeft = anyQuestionsLeft;
        d.correctAnswers = correctAnswers;
        d.getTotal = getTotal;
        d.totalQuestions = totalQuestions;
        d.currentItem = currentItem;
        d.questionsLeftInt = questionsLeftInt;
      }

      // send AJAX request
      $.ajax({
        url : d.url,
        type : d.sendType,
        data : d,
        dataType : 'html'
      }).done(function(msg)
      {

        var currentQuestion = JSON.parse(msg);

        if(getTotal == true)
        {
          var c = currentQuestion.correct;
          var t = currentQuestion.total;
          var p = currentQuestion.percentage;
          var moddedmsg = 'You answered ' + c + ' questions right out of a possible ' + t + '. You have a score of ' + p + '%';
          $('#content').text(moddedmsg);
          return;
        }

        count++;
        questionsLeftInt = totalQuestions - count;
        // return the results after last question is answered
        if( questionsLeftInt == 1 )
        {
          $('#submit').click(function()
          {
            getTotal = true;
            $(this).parent().attr('action', 'includes/getTotal.php');
          })
        }

        correctAnswers += currentQuestion.correct;
        totalQuestions = currentQuestion.totalPossible;
        anyQuestionsLeft = currentQuestion.itemsLeft;

        console.log( 'count: ' + count );
        console.log( 'correctAnswers: ' + correctAnswers );
        console.log( 'getTotal: ' + getTotal );
        console.log( 'totalQuestions: ' + totalQuestions );
        console.log( 'anyQuestionsLeft: ' + anyQuestionsLeft  );
        console.log( 'questionsLeftInt: ' + questionsLeftInt  );

        $('#content h2').text( 'Q: ' + currentQuestion.question );
        $('#content input[type="radio"]').each(function(index, item)
        {
          $(item).attr('value', currentQuestion.answer[index] );
          $(item).attr('checked', false );
          $(item).next().text( currentQuestion.answer[index] );
        })

        console.log( currentQuestion.quizItemCount == currentQuestion.totalPossible );

        if( !anyQuestionsLeft )
        {
          $('#submit').val('submit & calculate total');
        }
      }).fail(function()
      {
          alert('Sorry the quiz could not be loaded. Please refresh your browser.');
      }).always();
    }

    // returned object once instance of renderQuestion is made
    return {
      getNextQuestion : function(data)
      {
        sendResults(data);
      }
    }
  }



  // submit on click handler (considering dynamically added submit buttons)
  var getResults = renderQuestion();
  $(document).on('click', '#submit', function(event)
  {
    event.preventDefault();

    // create data object
    var data = {
      url : $('#answers').attr('action'),
      sendType : $('#answers').attr('method'),
      ans : $('.answerChoices:checked').val()
    }
    getResults.getNextQuestion(data);
  })

})