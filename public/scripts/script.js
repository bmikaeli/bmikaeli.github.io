/**
 * Created by bmikaeli on 12/5/2014.
 */
$(document).ready(function ()
{
    $(".popup").popup();
    console.info('pop-up initialized');

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-49257073-3', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    console.info('analytics initialized');
});