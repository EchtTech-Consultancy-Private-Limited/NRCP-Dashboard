$(document).ready(function () {
    rabies_test_detail();
    $('#rabies_detail_test').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'rabies-test-carried',
            data: $(this).serialize(),
            success: function (data) {
                if (data.status == 200) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(data.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('#change_general_profile').text('Update');
                } else {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(data.message);
                    $('#addTestModal').modal('hide');
                }
            }
        });
    });

    function rabies_test_detail() {
        $.ajax({
            type: "GET",
            url: "rabies-test-carried-out",
            dataType: "json",
            success: function (response) {
                $('tbody').html("");
                $.each(response.rabies_test, function (key, patient) {
                    $('tbody').append('<tr>\
                        <td>' + patient.id + '</td>\
                        <td>' + patient.date + '</td>\
                        <td>' + patient.number_of_patients + '</td>\
                        <td><button type="button" value="' + patient.id + '" class="btn btn-primary editbtn btn-sm"id="rabies_edit_button">Edit</button></td>\
                        <td><button type="button" value="' + patient.id + '" class="btn btn-danger deletebtn btn-sm" id="rabies_delete_button">Delete</button></td>\
                    \</tr>');
                });
            }
        });
    }

    $(document).on('click', '#rabies_edit_button', function (e) {
        e.preventDefault();
        var rabies_id = $(this).val();
        $('#edit_detail').modal('show');
        $.ajax({
            type: "GET",
            url: "rabies-test-edit/" + rabies_id,
            success: function (response) {
                $('#edit_date').val(response.rabies_test.date);
                $('#edit_number_of_patients').val(response.rabies_test.number_of_patients);
                $('#edit_numbers_of_sample_recieved').val(response.rabies_test.numbers_of_sample_recieved);
                $('#edit_type').val(response.rabies_test.type);
                $('#edit_method_of_diagnosis').val(response.rabies_test.method_of_diagnosis);
                $('#edit_numbers_of_test').val(response.rabies_test.numbers_of_test);
                $('#edit_numbers_of_positives').val(response.rabies_test.numbers_of_positives);
                $('#edit_numbers_of_intered_ihip').val(response.rabies_test.numbers_of_intered_ihip);
                $('#edit_detail_out').val(rabies_id);
            }
        });


    });

    $("#submit_edit").click(function () {
        var id = $('#edit_detail_out').val();
        var formData = $("#edit_modal").serialize();
        $.ajax({
            url: 'rabies-test-out/' + id,
            type: 'put',
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('#change_general_profile').text('Update');
                } else {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit_detail').modal('hide');
                }
                rabies_test_detail();
            },
        });
    });
});