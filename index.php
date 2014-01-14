<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<html class="no-js" lang="en" ng-app>
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
  <body ng-controller="questionsController" ng-init="init()">
    <h1>JS Quiz</h1>

  <!--  -->
    <form id="qForm" data-ng-model="currQuestion" data-ng-submit="processGetNextQ()">
      <h1> {{ currQuestion.question }} </h1>
      <div ng-repeat="answer in currQuestion.answers">
        <input type="radio" name="qAnswers" value="{{ answer.ans }}" data-ng-model="selectedAnswer" >
        <span> {{ answer.ans }}</span>
      </div>
      <input type="submit" value="{{ submitValue }}" id='submit' >
    </form>

    <p id='results'> {{ totalString }} </p>

  <!-- scripts (added to bottom to prevent page blocking elements) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="model-views/questions.js"></script>

  </body>
</html>