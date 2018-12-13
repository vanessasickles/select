(function($) {
    $(document).ready(function() {
        // quiz functions
        var score = null;
        var questionQuantity = $('div.quiz-slide').length; // Counts the number of questions
        var questionNumber = 0;

        // Hiding all relevant slides that need to be hidden
        $('.quiz-slide').hide();
        $('.quiz-back').hide();
        $('.quiz-progress').hide();
        $('.quiz-error').hide();
        $('.bar-value').hide();
        $('.quiz-results').hide();

        // Start Quiz - Opening slide button that starts the interactive quiz
        $('button.start-quiz').on('click', startQuiz);
        function startQuiz() {
            var parent = $(this).parent();
            var score = 0; // Sets score from null to 0 to signify that the quiz has been started

            parent.hide();
            parent.next().show();

            $('.quiz-progress').show();
            $('.quiz-marker:first').toggleClass('selected');
        }

        // Answer Select - Highlights and checks whether the selected answer is correct
        $('button.option').on('click', answerSelect);
        function answerSelect(){
            $('button.option').removeClass('selected');
            $(this).toggleClass('selected');

            buttonSlide = $(this).parent().parent();
            buttonSlide.data('answered', true); // Sets data to ensure question has been answered before allowing it to move to show the correct answer
        } 

        // Submit Answer - Checks whether or not the correct answer was selected, then displays correct answer with graph
        $('button.submit-answer').on('click', submitAnswer);
        function submitAnswer(event){
            var eventTarget = $(event.target);
            var thisParent = $(eventTarget).parent();
            var buttons = $(thisParent).find('button.selected');

            var thisParentParent = thisParent.parent();

            if(thisParentParent.data('answered') == true ) { // If an answer has been selected...
                $('.quiz-error').hide();
                $(buttons).each(function() {
                    var correctORnot = $(this).data('answer');
                    if(correctORnot === 'correct') {    
                        score++; // Adds +1 to score on a correct answer
                        $(thisParent.next()).find('h2.answer-message').html("Correct!");
                        $(thisParent.next()).find('h2.answer-message').addClass("correct");
                    } else {
                        $(thisParent.next()).find('h2.answer-message').html("Incorrect!");
                        $(thisParent.next()).find('h2.answer-message').addClass("incorrect");
                    }

                    thisParent.hide();
                    thisParent.next().show();

                    var graphBars = $(thisParent.next()).find('div.quiz-bar'); // Select graph bars in next slide
                    
                    graphBars.each(function() { // for each graph bar, grab the % label for the bar and use it to determine the % width it's supposed to animate to
                        var barValueCon = parseInt($(this).find('.bar-value').html());
                        var graphCeiling = parseInt($(this).parent().parent().find('.graph-label.ceiling').html().replace('%',''));
                        var width = (barValueCon / graphCeiling)*100;

                        $(this).animate({
                            width: width + '%',
                        }, 50, function(){});

                        $(this).find('.bar-value').fadeIn(1250);
                    })
                })
            } else { // ...else, show an error asking to select an answer.
                quizError = $('.quiz-error');
                quizError.fadeIn(100);
                quizError.html('Please select an answer!');
                quizError.addClass('flicker');
                setTimeout(function(){
                    quizError.removeClass('flicker');
                }, 500);
            }
        }

         // Next Question - Advances to the next question
         $('button.next-question').on('click', nextQuestion);
         function nextQuestion(event) {
             questionNumber++;
 
             var eventTarget = $(event.target);
             var eventParent = eventTarget.parent();
 
             if(questionNumber<questionQuantity) {
                 eventParent.parent().hide();
                 eventParent.parent().next().show();
 
                 $('.quiz-marker.selected').toggleClass('selected');
                 $('.quiz-marker').eq(questionNumber).toggleClass('selected');
             } else if(questionNumber>=questionQuantity) {
                 $('.quiz-progress').hide();
                 var parentOfParent = true;
 
                 showResults(event);
             }
         }

        var parentOfParent = false;

        // Skip Quiz - Instead of taking the quiz, skip it to see all statistics and the article
        $('a.skip-quiz').on('click', showResults);
        function showResults(event) {
            var eventTarget = $(event.target);
            var eventParent = eventTarget.parent();

            if(parentOfParent == true) {
                eventParent.parent().hide();
            } else {
                eventParent.hide();
            }

            $('.quiz-results').show();

            if(score == null) { // If quiz has been attempted, show personal results. If not, only show stats and article
                $('.quiz-results h2').html("Gaming Motivations by Gender");
            } else {
                var finalScore = (score/questionQuantity)*100;
                $('.final-score').html(Math.round(finalScore) + '%');
            }
            
            var graphBars = $('.quiz-results').find('div.quiz-bar');
            
            graphBars.each(function() { // Get all of the graph bars and show + animate them
                var barValueCon = parseInt($(this).find('.bar-value').html());
                var graphCeiling = parseInt($(this).parent().parent().find('.graph-label.ceiling').html().replace('%',''));
                var width = (barValueCon / graphCeiling) * 100;

                console.log(barValueCon);

                $(this).animate({
                    width: width + '%',
                }, 50, function(){});

                $(this).find('.bar-value').fadeIn(1250);
            })
        }
})}) (jQuery);