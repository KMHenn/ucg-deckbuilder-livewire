import jQuery from 'jquery';
window.$ = jQuery;

import select2 from 'select2';
select2($);

// Global theme toggle functionality
$(function(){
    $('#toggle-dark,#toggle-light').on('click', () => {
        $('body').toggleClass('dark');
        $('#toggle-dark').toggleClass('hidden');
        $('#toggle-light').toggleClass('hidden'); 
    });
});

$('.select2-field').select2({
    placeholder: 'Select one or more options',
    allowClear: true
});