<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<!--[if IE 10]> <html class="lt-ie11 ie10"> <![endif]-->
<!--[if IE]> <html class="ie11"> <![endif]-->
<!--[if gte IE 11]> ><! <![endif]-->
<html class="no-js" lang="en">
<!-- <![endif] -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JavaScript Quiz</title>
    <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css" >
  </head>
  <body>
    <h1>JS</h1>

  <!-- question data pulled in by ajax -->
    <div id="content"> </div>

  <!-- scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/handlebars-v1.2.0.js"></script>
    <script src="js/app.js"></script>

  <!-- template -->
    <script id="content-template" type="text/x-handlebars-template">
      {{#if quizObject}}
        {{#each quizObject}}

          {{#if this.question}}
            <h2>Q: {{question}}</h2>
          {{/if}}

          {{#if this.answer}}
            <form id='answers' action='includes/questionHandler.php' method='post'>
              <input id='hInput' class='hide' type='text' value='' />
              {{#each answer}}
                <input type='radio' name='answerChoices' class='answerChoices' value={{this}}>{{this}}</input><br>
              {{/each}}
              <input id='submit' type='submit' value={{submitValue}} disabled='disabled'>
            </form>
          {{/if}}

        {{/each}}
      {{/if}}
    </script>

  </body>
</html>