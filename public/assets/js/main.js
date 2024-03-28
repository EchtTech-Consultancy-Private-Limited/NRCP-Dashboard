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

$(document).ready(function(){
    // Define and initialize the rowDetailsOpen variable outside of the click event handler
    let rowDetailsOpen = false;

    $('.pformEdit').click(function() {
        let clickedElementId = $(this).attr('id');
        let clickEmentDataId = $(this).attr('data-id');

        // Toggle the row details open/close state
        if (rowDetailsOpen) {
            // Collapse row details for the clicked row
            $(this).closest('tr').find('td:first-child').trigger('click');
        } else {
            // Expand row details for the clicked row
            $(this).closest('tr').find('td:first-child').trigger('click');
        }
        // Toggle the flag
        rowDetailsOpen = !rowDetailsOpen;

        // Remove 'd-content' class from all elements with class 'editForm'
        $('.editForm').removeClass('d-content');

        // Toggle 'd-content' class for the clicked element
        $('#editTr_' + clickEmentDataId).toggleClass('d-content');
    });




      // var table = $('#general_profiles_TABLE2').DataTable({
    //   'responsive': true
    // });
    var table = $('#general_profiles_TABLE2').DataTable({
        'responsive': true,
        'columnDefs': [
            {
                'targets': '.none', // Target the columns with the "none" class
                'visible': false // Hide the targeted columns
            }
        ]
    });
        // Handle click on "Expand All" button
     
});

$(document).ready(function(){
    // Flag to track the state of row details
    var rowDetailsOpen = false;
    
    
    
    // Handle click on "Collapse All" button
    $('#btn-hide-all').on('click', function() {
        // Collapse all row details
        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    
    // Handle click on ".pformEdit" elements
    $('.pformEdit').on('click', function() {
        var columnIndex = $('.none').index(); // Get the index of the column with the "none" class
        table.column(columnIndex).visible(true); // Show the column
    });

  // Get the width of the container


});

