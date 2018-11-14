(function($) {
    $(document).ready(function() {
        var $categories = [];
        $category = $('.post-categories li');

        $category.each(function(){
            $category_content = $(this).text().trim();

            if($category_content === 'Analysis') {
                $(this).addClass('text-green')
            } else if($category_content === 'Feature') {
                $(this).addClass('text-yellow')
            } else if($category_content === 'News') {
                $(this).addClass('text-blue')
            } else {
                $(this).addClass('text-teal')
            }
        })
    
        $('.nav-expand').on('click', onMenuClick);
        function onMenuClick(event) {
            $selected =$(event.currentTarget);
            $selected.toggleClass('is-active');
            $('.main-nav ul').toggleClass('is-active');
        }



    // quiz functions
    var score = null;
    var questionQuantity = $('div.quiz-slide').length;
    var questionNumber = 0;

    $('.quiz-slide').hide();
    $('.quiz-back').hide();
    $('.quiz-progress').hide();
    $('.quiz-error').hide();
    $('.bar-value').hide();
    $('.quiz-results').hide();

    $('button.start-quiz').on('click', startQuiz);
    function startQuiz() {
        var parent = $(this).parent();
        var score = 0;

        parent.hide();
        parent.next().show();

        $('.quiz-progress').show();
        $('.quiz-marker:first').toggleClass('selected');
    }

    $('button.option').on('click', answerSelect);
    function answerSelect(){
        $('button.option').removeClass('selected');
        $(this).toggleClass('selected');

        buttonSlide = $(this).parent().parent();
        buttonSlide.data('answered', true);
    } 

    $('button.submit-answer').on('click', submitAnswer);
    function submitAnswer(event){
        var eventTarget = $(event.target);
        var thisParent = $(eventTarget).parent();
        var buttons = $(thisParent).find('button.selected');

        var thisParentParent = thisParent.parent();

        if(thisParentParent.data('answered') == true ) {
            $('.quiz-error').hide();
            $(buttons).each(function() {
                var correctORnot = $(this).data('answer');
                if(correctORnot === 'correct') {    
                    score++;
                    $('h2.answer-message').html("Correct!");
                } else {
                    $('h2.answer-message').html("Incorrect!");
                }

                thisParent.hide();
                thisParent.next().show();

                var graphBars = $(thisParent.next()).find('div.quiz-bar');
                
                graphBars.each(function() {
                    var barValueCon = $(this).find('.bar-value');
                    var width = barValueCon.html();

                    $(this).animate({
                        width: width
                    }, 50, function(){});

                    $(this).find('.bar-value').fadeIn(1250);
                })
            })
        } else {
            quizError = $('.quiz-error');
            quizError.fadeIn(100);
            quizError.html('Please select an answer!');
            quizError.addClass('flicker');
            setTimeout(function(){
                quizError.removeClass('flicker');
            }, 500);
        }
    }
    var parentOfParent = false;
    $('a.skip-quiz').on('click', showResults);
    function showResults(event) {
        var eventTarget = $(event.target);
        var eventParent = eventTarget.parent();

        console.log(parentOfParent);

        if(parentOfParent == true) {
            eventParent.parent().hide();
        } else {
            eventParent.hide();
        }

        $('.quiz-results').show();

        if(score == null) {
            $('.quiz-results h2').html("Gaming Motivations by Gender");
        } else {
            var finalScore = (score/questionQuantity)*100;
            $('.final-score').html(finalScore + '%');
        }
        
        var graphBars = $('.quiz-results').find('div.quiz-bar');
        
        graphBars.each(function() {
            var barValueCon = $(this).find('.bar-value');
            var width = barValueCon.html();

            $(this).animate({
                width: width
            }, 50, function(){});

            $(this).find('.bar-value').fadeIn(1250);
        })
    }
    
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
})}) (jQuery);