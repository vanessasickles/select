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
                $(this).addCLass('text-teal')
            }
        })
    })
    
})(jQuery);