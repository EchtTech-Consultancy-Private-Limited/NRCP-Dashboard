// adjusting the placeholder  color
let select = $('select');
<<<<<<< HEAD

select.each((index, element) => {
    let selectWord = $(element).find(':selected').text().split(' ');
    
=======
select.each((index, element) => {
    let selectWord = $(element).find(':selected').text().split(' ');
>>>>>>> f7b15b73b0694d983ab7ba7cd183c8e2d9cf5209
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
