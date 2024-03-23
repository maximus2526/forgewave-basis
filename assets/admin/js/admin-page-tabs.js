// Options page tabs
jQuery(document).ready(function($) {

    $('.nav-tab-wrapper a').click(function(event) {
        event.preventDefault();
        var tab_id = $(this).attr('href');

        $('.nav-tab-wrapper a').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');

        if (tab_id === '#all_tab') {
            $('.fwb-section').show();
        } else {
            $('.fwb-section').hide();
            $('div[id^="' + tab_id.substr(1) + '"]').show();
        }
    });


    var activeTab = $('.nav-tab-wrapper a.nav-tab-active').attr('href');
    if (activeTab === '#all_tab') {
        $('.fwb-section').show();
    } else {
        $('div[id^="' + activeTab.substr(1) + '"]').show();
    }
});