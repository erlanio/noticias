$(document).ready(function() {
    $('#enviar').click(function() {
        if (!$('#titulo').val()) {
            $('#titulo').css('border-color', 'red');
            $('#error-titulo').html('<strong> *</strong>');
            $('#error-titulo').css('color', 'red');
        }       

    });
});