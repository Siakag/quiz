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
    var count = 0;
    var questionsLeft = true;
    var formEls = $('#answers').serialize();

    function sendResults(d)
    {
      // append to data object
      d.count = count;
      d.question = count + 1;

      // send AJAX request
      $.ajax({
        url : d.url,
        type : d.sendType,
        data : d,
        dataType : 'html'
      }).done(function(msg)
      {
          $('#content').html(msg);
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
        count++;
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