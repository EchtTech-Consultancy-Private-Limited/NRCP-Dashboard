// adjusting the placeholder  color
let select = $('select');
console.log(select);
select.each((index, element) => {
    let selectWord = $(element).find(':selected').text().split(' ');
    console.log(selectWord);
    $(element).css('color', 'grey')
    $(element).on('change', function () {
        if ($(this).val() !== selectWord[0]) {
            $(this).css('color', '#000');
            // alert('code is executed');
        } else {
            $(this).css('color', 'grey');
            alert('code is executed');
        }
    });
});