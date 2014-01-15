<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<html data-ng-app="quizApp">
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
    <h1>JS Quiz</h1>

    <div ng-view></div>

  <!-- scripts (added to bottom to prevent page blocking elements) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/quizApp.js"></script>

  </body>
</html>