(function($) {
    $(document).ready(function() {

        // Category Colors - Decides the text color of the categories in the post rolls
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

        // Mobible Navigation - Expands the navigation while on a mobile device
        $('.nav-expand').on('click', onMenuClick);
        function onMenuClick(event) {
            $selected =$(event.currentTarget);
            $selected.toggleClass('is-active');
            $('.main-nav ul').toggleClass('is-active');
        }

        // Search Toggle - Toggles and shows the search function in the navigation
        $('.navigation-search .search-icon').on('click', searchToggle);
        function searchToggle() {
            if($('.search-form').hasClass('search-open')) {
                $('.search-form').removeClass('search-open');
                $('.search-form').animate({
                    width: 0,
                    opacity: 0,
                }, 150, "swing", function() {});

                $('.search-submit').animate({
                    opacity: 0,
                }, 100, "swing", function() {});
            } else {
                $('.search-form').addClass('search-open');
                $('.search-form').animate({
                    width: 127,
                    opacity: 1.0
                }, 150, "swing", function() {});

                $('.search-submit').animate({
                    opacity: 1.0,
                }, 500, "swing", function() {});
            }
        }
})}) (jQuery);