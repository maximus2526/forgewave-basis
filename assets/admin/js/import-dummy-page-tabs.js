// // Import page tabs
// jQuery(document).ready(function($) {
//     $('.nav-tab-wrapper a').click(function(event) {
//         event.preventDefault();
//         var tab_id = $(this).attr('href');

//         $('.nav-tab-wrapper a').removeClass('nav-tab-active');
//         $(this).addClass('nav-tab-active');

//         $('.fwb-tabs > div').hide();
//         $(tab_id + '-tab').show();
//     });

//     var activeTab = $('.nav-tab-wrapper a.nav-tab-active').attr('href');
//     $(activeTab + '-tab').show();

//     $('.button-primary').click(function(event) {
//         event.preventDefault();
//         alert('Changes saved successfully.');
//     });
// });