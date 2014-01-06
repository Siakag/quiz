<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <title>JavaScript Quiz</title>
    <meta name="keywords" content="javascript quiz, javascript tutorial, test javascript, online js quiz, online javascript dynamic test">
    <meta name="description" content="Dynamic JavaScript quiz / tutorial">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css" >
  </head>
  <body>
    <h1>JS</h1>

  <!-- question data pulled in with Handlebars & ajax -->
    <div id="content"> </div>

  <!-- scripts (added to bottom to prevent page blocking elements) -->
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
                <input type='radio' name='answerChoices' class='answerChoices' value={{this}}> <span>{{this}}</span><br>
              {{/each}}
              <input id='submit' type='submit' value={{submitValue}} disabled='disabled'>            </form>
          {{/if}}

        {{/each}}
      {{/if}}
    </script>

  </body>
</html>