import jQuery from 'jquery';
window.$ = jQuery;

// Global theme toggle functionality
$(function(){
    $('#toggle-dark,#toggle-light').on('click', () => {
        $('body').toggleClass('dark');
        $('#toggle-dark').toggleClass('hidden');
        $('#toggle-light').toggleClass('hidden'); 
    });
});