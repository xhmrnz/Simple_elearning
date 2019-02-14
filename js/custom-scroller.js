/**
 *
 * @author arman
 * @since 7/24/2016
 *
 */

(function ($) {
    $.fn.customScroller = function (configs) {
        configs = $.extend({
            'scrollSpeed'  : 500,
            'mySelector'     : 'div'
        }, configs);

        $(this).addClass('custom-scroller');
        var navs = [];
        var lastScrollTop = 0;
        var menu = $('.custom-scroller');
        var menuHeight = $(".custom-scroller").height();
        var menuList = menu.find('li');
        var menuClicked = false;
        var clickedItem = null;
        var scrollSpeed = configs.scrollSpeed;
        var scrollTimeout = null;
        var mySelector = configs.mySelector;

        (function init() {
            menu.css({ 'position': 'fixed', 'top':0,'left':0 });
            $('body').css('padding-top', menuHeight );
            menuList.each(handleMenuItems);
            $(window).on('scroll', handleWinScroll);
            updateMenu();
        }());

        function handleMenuItems(index) {
            var route = $(this).attr('data-route');

            navs.push(route);
            $(this).attr('id', route);
            $(this).on('click', handleMenuClick);
        }

        function handleMenuClick(event) {
            var myOffset = menuHeight;
            var goTo = $(mySelector+'.'+ $(this).attr('data-route')).offset().top - myOffset;

            menuClicked = true;
            clickedItem = $(this);
            $("html, body").stop().animate({ scrollTop: goTo }, scrollSpeed);
        }

        function handleWinScroll(event) {
            var st = $(this).scrollTop() + menuHeight;
            var direction;

            if (st > lastScrollTop) {
                direction = "down";
            } else if (st < lastScrollTop ){
                direction = "up";
            }

            lastScrollTop = st;
            updateMenu();

            if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                menuList.removeClass('active');
                if (menuClicked && clickedItem) {
                    clickedItem.addClass('active');
                } else {
                    $(".custom-scroller li:last").addClass('active');
                }
            }

            if (scrollTimeout) {
              clearTimeout(scrollTimeout);
            }

            scrollTimeout = setTimeout(function () {
                menuClicked = false;
                clickedItem = null;
            }, 250);
        }

        function updateMenu() {
            var minDistance = 10000;
            var route = '';
            var foundSection = false;

            navs.forEach(function (nav) {
                if (elementInViewport($(mySelector+'.'+ nav))) {
                    var distance = parseInt($(mySelector+"." + nav).offset().top) - parseInt($(".custom-scroller").offset().top);

                    if (distance < minDistance) {
                        minDistance = distance;
                        route = nav;
                        foundSection = true;
                    }
                }
            });

            if (foundSection) {
              menuList.removeClass('active');
            }

            $(".custom-scroller li[data-route=" + route + "]").addClass('active');
        }

        function elementInViewport(el) {
            var rect;
            //special bonus for those using jQuery
            if (typeof jQuery === "function" && el instanceof jQuery) {
                el = el[0];
            }

            rect = el.getBoundingClientRect();

            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                /*or $(window).height() */
                rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or
                 $(window).width() */
            );
        }
    };

}(jQuery));
