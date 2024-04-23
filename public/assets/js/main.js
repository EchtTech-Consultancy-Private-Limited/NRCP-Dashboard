// adjusting the placeholder  color

let selectBox = $('select');
selectBox.each(function () {
    let valueArr = $(this).find(':selected').text().trim().split(' ');
    if (valueArr.includes('select') || valueArr.includes('Select')) {
        $(this).css('color', 'grey');
    } else {
        $(this).css('color', '#000');
    }
    
});

let selectBoxes = $("select");

selectBoxes.each((index, element) => {
    let select = $(element);
    let selectedText = select.find(':selected').text();
    let selectWords = selectedText.split(' ');

    select.on('change', function () {
        let selectedValue = $(this).find(':selected').text();
        let selectedWords = selectedValue.split(' ');
        if (selectedWords.includes('select') || selectedWords.includes('Select')) {
            $(this).css('color', 'grey');
        } else {
            $(this).css('color', '#000');
        }
    });
});


function alertMessage(){
    $('.alert.alert-success').css('display', 'none');
    $('.alert.alert-danger').css('display', 'none');
}

setTimeout(alertMessage, 2000);

function handleTest(e) {
    alert("hellow world")
    if (e.keyCode === 8) { // keyCode 8 corresponds to the Backspace key
        e.preventDefault();
    }
}

let edit_table = $('div#myTabContent');

// let  actualInnerWidth = edit_table.prop("clientWidth"); // El. width minus scrollbar width
let  actualInnerWidth = edit_table[0].offsetWidth; // El. width minus scrollbar width
console.log(actualInnerWidth)
// Element width including overflow (scrollbar)
let offset_width = edit_table[0].offsetWidth; // 1280 in your case
console.log(offset_width)
// Element width excluding overflow (scrollbar)
let clientWidth = edit_table[0].clientWidth; // 1280 - scrollbarWidth
console.log(clientWidth);
// Scrollbar width
let scrollbarWidth = edit_table[0].offsetWidth - edit_table[0].clientWidth; // 0 if no scrollbar
console.log(scrollbarWidth)
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
    var table = $('#general_profiles_TABLE').DataTable({
        'responsive': true,
    });
        // Handle click on "Expand All" button
     

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

