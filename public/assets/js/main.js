// adjusting the placeholder  color
let select = $('select');

select.each((index, element) => {
    let selectWord = $(element).find(':selected').text().split(' ');
    
    $(element).css('color', 'grey')
    $(element).on('change', function () {
        if ($(this).val() !== selectWord[0]) {
            $(this).css('color', '#000');
            // alert('code is executed');
        } else {
            $(this).css('color', 'grey');
           
        }
    });
});


function handleTest(e) {
    alert("hellow world")
    if (e.keyCode === 8) { // keyCode 8 corresponds to the Backspace key
        e.preventDefault();
    }
}

// validate input
function validateInput(input) {
    input.value = input.value.replace(/\D/g, '');
}
// error msg hide
jQuery( document ).ready(function() {
    $('form input[type=text]').focus(function(){
        $(this).siblings(".text-muted").hide();
    });
    
    $('form input[type=number]').focus(function(){
        $(this).siblings(".text-muted").hide();
    });

    $('form input[type=date]').focus(function(){
        $(this).siblings(".text-muted").hide();
    });

    $('form input[type=file]').focus(function(){
        $(this).siblings(".text-muted").hide();
    });

    $('select').focus(function(){
        $(this).siblings(".text-muted").hide();
    });
});
