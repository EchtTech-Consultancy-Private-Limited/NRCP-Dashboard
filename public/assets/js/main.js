// adjusting the placeholder  color

$(document).ready(function() {
    // Select the input elements with data-date attribute using jQuery
    const dateInput = $('input[data-date="date"]');

    // Attach focus event using jQuery
    dateInput.on('focus', function() {
        this.type = 'date';
        // Uncomment the alert for debugging purposes
        // alert("all is well");
    });

    // Attach blur event using jQuery
    dateInput.on('blur', function() {
        if (!this.value) {
            this.type = 'text';
        }
    });
});
// js for auto responsive managing table
// let theadWidth = $('thead').width();
// let tbodyWidth = $('tbody').innerWidth();
// console.log("thead", theadWidth, "tbodywidth",tbodyWidth);

// let tableWidth = $('table').innerWidth();
// console.log("table",tableWidth);

// let containerFluidWidth = $('.container-fluid').innerWidth() - 31.4;
// console.log("containerfluidwidth",containerFluidWidth);

// if (theadWidth) { // Ensure theadWidth is defined
//     if ((theadWidth < tableWidth && tableWidth < containerFluidWidth) && tbodyWidth < tableWidth) {
//         $('table').css('display', 'table');
//     } else {
//         $('table').css('display', 'block');
//     }
// }



let selectBox = $('select');
selectBox.each(function () {
    let valueArr = $(this).find(':selected').text().trim();
    console.log(valueArr)
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
        let selectedValue = $(this).find(':selected').text().trim();
        let selectedWords = selectedValue.split(' ');
        if (selectedWords.includes('select') || selectedWords.includes('Select')) {
            $(this).css('color', 'grey');
        } else {
            $(this).css('color', '#000');
        }
    });
});

// add more 4.5.2

let add_table_row = $(".add-table-row");
let table_4_5_2 = $('.table_4_5_2 tbody'); // Select tbody directly

function addMore() {
    // Create a table row
    let create_tr = $('<tr>');

    create_tr.append(`
        <td></td>
        <td><input type="text" name="number_of_wounds[anatomical_location][]"></td>
        <td><input type="text" name="number_of_wounds[shape][]"></td>
        <td><input type="text" name="number_of_wounds[dimensions_in_cm][]"></td>
        <td><a role="button" class="btn btn-danger remove-table-row float-right"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    `);

    table_4_5_2.append(create_tr);
    srNo1();
}

$('.table_4_5_2').on('click', '.remove-table-row', function() {
    // Find the closest table row and remove it
    $(this).closest('tr').remove();
    srNo1();
});

function srNo1() {
    // Update wound number for each row
    $('.table_4_5_2 tbody tr').each(function(index) {
        $(this).find('td:first').html('<strong>' + (index + 1) + '</strong>');
    });
}


function srNo1(){
let updateCount = table_4_5_2.children();
updateCount.each((index, element)=>{   
    let updateCountBOld =  $(element).find('td:first-child').text(index);
    updateCountBOld.css("font-weight", "bold");
})

}

// add more fuctionality for 5.3
let table_5_3 = $('.table_5_3 tbody'); // Select tbody directly

function addMore2() {
    // Create a table row
    let create_tr = $('<tr>');

    create_tr.append(`
        <td></td>
        <td><input type="text" name="rabies_vaccine_received[date_of_vaccine_administration][]"></td>
        <td><input type="text" name="rabies_vaccine_received[route_of_vaccine_administration][]"></td>
        <td><input type="text" name="rabies_vaccine_received[site_of_vaccine_administration][]"></td>
        <td><input type="text" name="rabies_vaccine_received[brand_vaccine][]"></td>
        <td><a role="button" class="btn btn-danger remove-table-row float-right"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    `);

    table_5_3.append(create_tr);
    srNo2();
}

$('.table_5_3').on('click', '.remove-table-row', function() {
    // Find the closest table row and remove it
    $(this).closest('tr').remove();
    srNo2();
});

function srNo2() {
    // Update Dose No for each row
    $('.table_5_3 tbody tr').each(function(index) {
        $(this).find('td:first').text(index + 1);
    });
}



let table_6_7 = $('.table_6_7 tbody');

function addMore3() {
    // Create a table row
    let create_tr = $('<tr>').append(`
        <td></td>
        <td><input type="text" name="laboratory_specific_test[test_performed][]"></td>
        <td><input type="text" name="laboratory_specific_test[Hospital_lab][]"></td>
        <td><input type="text" name="laboratory_specific_test[specific_test_date][]"></td>
        <td><input type="text" name="laboratory_specific_test[result][]"></td>
        <td><input type="text" name="laboratory_specific_test[comment][]"></td>
        <td>
            <a role="button" class="btn btn-danger remove-table-row float-right">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    `);

    table_6_7.append(create_tr);
    updateSerialNumbers3();
}

$('.table_6_7').on('click', '.remove-table-row', function() {
    // Remove the closest table row
    $(this).closest('tr').remove();
    updateSerialNumbers3();
}); 

function updateSerialNumbers3() {
    table_6_7.children().each(function(index, element) {
        $(element).find('td:first-child').text(index + 1).css("font-weight", "bold");
    });
}



// 8.3 add more table

let table_8_3 = $('#table_8_3 tbody');

function addMore4() {
    // Create a table row
    let create_tr = $('<tr>').append(`
        <td></td>
        <td class="bggrey"><input type="text" name="animal_suspected_transmitting[transmitting_rabies_name_address][]"></td>
        <td class="bggrey"><input type="text" name="animal_suspected_transmitting[transmitting_rabies_relation][]"></td>
        <td class="">
            <a role="button" class="btn btn-danger remove-table-row float-right">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    `);

    // Append the table row to the table
    table_8_3.append(create_tr);

    // Update serial numbers
    srNo3();
}

$('#table_8_3').on('click', '.remove-table-row', function() {
    // Remove the closest table row
    $(this).closest('tr').remove();

    // Update serial numbers
    srNo3();
}); 

function srNo3() {
    // Update serial numbers
    table_8_3.children().each(function(index, element) {
        $(element).find('td:first-child').text(index + 1).css("font-weight", "bold");
    });
}


// 6.4 If deceased, where did deceased die

// deceased_die_health_facility
// deceased_die_health_facility_input

$("input[type='radio']").change(function() {
    // Check if the radio button with ID "Health-care-worker1" is checked
    if ($("#deceased_die_health_facility").is(":checked")) {
        // Show the input field if "Health-care-worker1" radio button is checked
        $("#deceased_die_health_facility_input").css("display", "block");
        $("#deceased_die_other_input").css("display", "none");
    } else if ( $("#deceased_die_other").is(":checked")) {
        $("#deceased_die_other_input").css("display", "block");
        $("#deceased_die_health_facility_input").css("display", "none");
    } else {
        // Hide the input field if any other radio button is checked
        $("#deceased_die_health_facility_input").css("display", "none");
        $("deceased_die_other_input").css("display", "none");
    }
});


// Add change event listener to all radio buttons
$("input[type='radio']").change(function() {
    // Check if the radio button with ID "Health-care-worker1" is checked
    if ($("#Health-care-worker1").is(":checked")) {
        // Show the input field if "Health-care-worker1" radio button is checked
        $("input[name='healthcare_worker_facility_name']").css("display", "block");
        $("input[name='specify_other_name']").css("display", "none");
    } else if ( $("#Other1").is(":checked")) {
        $("input[name='specify_other_name']").css("display", "block");
        $("input[name='healthcare_worker_facility_name']").css("display", "none");
    } else {
        // Hide the input field if any other radio button is checked
        $("input[name='healthcare_worker_facility_name']").css("display", "none");
        $("input[name='specify_other_name']").css("display", "none");
    }
});

// 8.2 add more button 
let contact_with_patient_checkbox = $('.contact_with_patient_checkbox');

contact_with_patient_checkbox.on("change", function() {
    let element = $(this);
    if (element.is(":checked")) {
        let id = $(this).attr('id');
        let contact_with_patient_value = $(`label[for="${id}"]`).text();
        contact_with_patient_value = contact_with_patient_value.replace(/\s+/g, "_").toLowerCase();
        let table_8_2 = $('.table_8_2 tbody');

        // Create a table row with a unique identifier
        let create_tr = $('<tr>').addClass(`row-${id}`).append(`
            <td>${contact_with_patient_value}</td>
            <td class="bggrey"><input type="text" name="${contact_with_patient_value}[relation_with_${contact_with_patient_value}_name]"></td>
            <td class="bggrey"><input type="text" name="${contact_with_patient_value}[relation_with_${contact_with_patient_value}_address]"></td>
            <td class="bggrey"><input type="text" name="${contact_with_patient_value}[relation_with_${contact_with_patient_value}_contact_number]"></td>
        `);

        // Append the table row to the table
        table_8_2.append(create_tr);
        $("#add_more5").css("display", "block");
    } else {
        // Remove the corresponding row
        let id = $(this).attr('id');
        $('.row-' + id).remove();
    }
});


// add more for 8.2 relation with patient

let table_8_2 = $('.table_8_2 tbody');

function addMore5() {
    // Create a table row
    let create_tr = $('<tr>').append(`
        <td></td>
        <td ><input type="text"></td>
        <td ><input type="text"></td>
        <td ><input type="text"></td>
        <td >
            <a role="button" class="btn btn-danger remove-table-row float-right">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    `);

    // Append the table row to the table
    table_8_2.append(create_tr);

    // Update serial numbers
    // srNo4();
}

$('.table_8_2').on('click', '.remove-table-row', function() {
    // Remove the closest table row
    $(this).closest('tr').remove();

    // Update serial numbers
    // srNo4();
}); 

function srNo4() {
    // Update serial numbers
    table_8_2.children().each(function(index, element) {
        $(element).find('td:first-child').text(index + 1).css("font-weight", "bold");
    });
}





// adjusting width  edit form of edit form 
let tabPaneWidth = $(".tab-pane.fade.show.active").innerWidth()
let tableEditFormWidth = $('form.myForm').css('width', `${tabPaneWidth-50}px`)
// success message and failde message popp 
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
// css for adjusting table scroll according to screen width
// $(document).ready(function(){
    
// let general_profiles_TABLE_wrapper = document.querySelector("div#nav-add-patient-record").clientWidth;
// console.log(general_profiles_TABLE_wrapper);

// let responsive  = $("#general_profiles_TABLE");
// responsive.each((index, item)=>{
//     let tableWidth = $(item).children().width()
//     console.log(tableWidth, general_profiles_TABLE_wrapper);
//     if(tableWidth> general_profiles_TABLE_wrapper){
//         $(item).css("display", "block")
//     } else{
//         $(item).css("display", "table")
//     }
// })
// })

// let  actualInnerWidth = edit_table.prop("clientWidth"); // El. width minus scrollbar width

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

    $('form input[type=email]').focus(function(){
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
       
    });
        // Handle click on "Expand All" button
     
});
    var table = $('#general_profiles_TABLE').DataTable({
        // 'responsive': true,
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

function confirmDelete() {
    return confirm('Are you sure you want to delete this report?');
}


