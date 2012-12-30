/**
 * Gemaakt door van den Berg Multimedia
 * User: Stef van den Bergt
 * Date: 10-04-12
 * Time: 14:38
 */
var Default = {
    init: function() {
        $('.button').bind('click', function() {
            $('.content').animate({
                height: 515
            }, 500, 'linear')
        });
        if ($('#club-plugin').length && $('#club-plugin').length > 0) {
            clubplugin.config.standing = 'none';
            clubplugin.load('#club-plugin');
        }
        $('table').each(function() {
            $(this).children('tr').each(function() {
                var count = 0;
                $(this).children('td').each(function() {
                    $(this).addClass('column'+count);
                    count++;
                })
            });
        });
        if ($('.carrousel')) {
            setTimeout(Default.slide, 5000);
        }
    },
    slide: function() {
        $('.carrousel').children('.items').animate({ left : '-=1024px' }, 500).delay(4500)
            .animate({ left : '-=1024px'}, 500).delay(4500)
            .animate({ left : '-=1024px' }, 500).delay(4500)
            .animate({ left : '-=1024px' }, 500).delay(4500)
            .animate({ left : '-=1024px' }, 500, function() {
                $(this).delay(4500);
                $(this).animate({left : 0}, 100).delay(4900);
                setTimeout(Default.slide, 5000);
            });
    }
}

$(document).ready(function() {
    Default.init();
});