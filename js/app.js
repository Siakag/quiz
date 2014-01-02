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

  $('#answers input[type="radio"]').on('click', function()
  {
    $(this).attr('checked', 'checked');
    if( $(this).attr('checked') === 'checked' )
    {
      $('#submit').attr('disabled') = 'false';
    }
  })
})