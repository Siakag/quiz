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
    if( $('.answerChoices:checked').size() > 0 )
    {
      $('#submit').attr('disabled', false);
      return;
    }
    $('#submit').attr('disabled', true);
  })

})