function questionsController($scope, $http)
{
  var correct = 0, questionsArray = [], selectedAnswer = "", totalQs = 0;

  $scope.count = 0;

  $scope.currQuestion = {};

  $scope.totalString = "";

  var getQuestionsObjs = function()
  {
    $http.get("http://www.json-generator.com/j/crdjJKAdMy?indent=4")
    .success(function(data)
    {
      angular.forEach(data, function(val, key)
      {
        questionsArray.push(val);
        if(key == 0) { $scope.currQuestion = val; }
      })
    });
  }

  var getTotalQuestions = function()
  {
    angular.forEach(questionsArray, function(val, key)
    {
      totalQs += 1;
    })
    return totalQs;
  }

  $scope.init = function()
  {
    getQuestionsObjs();
  }

  $scope.finalQ = {
    "question" : "No more questions. Calculate total."
  }

  $scope.submitValue = 'submit';

  $scope.processGetNextQ = function()
  {
    if( ! questionsArray[$scope.count])
    {
      getTotalQuestions();
      $scope.totalString = "You scored " + correct + " out of " + totalQs;
      if( (correct / totalQs) * 100 >= 75 )
      {
        $scope.totalString += "! Good job!";
      }
      $('#qForm').hide();
      $('#results').fadeIn(800);
    }
    else
    {
      var v = document.getElementsByName('qAnswers'), i;
      for (i = 0, length = v.length; i < length; i++)
      {
        if (v[i].checked)
        {
          selectedAnswer = v[i].value;
          break;
        }
      }

      correct = $scope.currQuestion.correct == selectedAnswer ? correct += 1 : correct;

      // increment count for next round of questions, if available
      $scope.count += 1;
      $scope.currQuestion = questionsArray[$scope.count] ? questionsArray[$scope.count] : $scope.finalQ;
      $scope.submitValue = questionsArray[$scope.count] ? $scope.submitValue : "Calculate Total";
    }
  }

}