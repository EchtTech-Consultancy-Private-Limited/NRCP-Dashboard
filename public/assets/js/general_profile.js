$(document).ready(function () {
    table_generalprofile();
    $('#general_profileA').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'general-add',
            data: $(this).serialize(),
            success: function (data) {
                if (data.status == 201) {
                    $('#state-error').text('Something went wrong.');
                    $('#hospital-error').text('Something went wrong.');
                } else {
                    $('#general_profile_success').addClass('alert alert-success');
                    $('#general_profile_success').text(data.message);
                }
            }
        });
    });

    function table_generalprofile() {
        $.ajax({
            type: "GET",
            url: "general-profile",
            dataType: "json",
            success: function (response) {
                $("#table_general_profile").html("");
                $.each(response.general_profile, function (key, general_profile_item) {
                    $("#table_general_profile").append('<tr>\
                        <td>' + general_profile_item.id + '</td>\
                        <td>' + general_profile_item.state + '</td>\
                        <td>' + general_profile_item.date_of_joining + '</td>\
                        <td><button type="button" value="' + general_profile_item.id + '" class="btn btn-primary editbtn btn-sm" id="general_profile_editbtn">Edit</button></td>\
                        <td><button type="button" value="' + general_profile_item.id + '" class="btn btn-danger deletebtn btn-sm" id="general_profile_deletebtn">Delete</button></td>\
                    \</tr>');
                });
            }
        });
    }

    $(document).on('click', '#general_profile_editbtn', function (e) {
        e.preventDefault();
        var general_profile_id = $(this).val();
        $('#edit_general_profile').modal('show');
        $.ajax({
            type: "GET",
            url: "general-laboratory-profile/" + general_profile_id,
            success: function (response) {
                if (response.status == 201) {
                    $('#general_profile_success').addClass('alert alert-success');
                    $('#general_profile_success').text(response.message);
                    $('#edit_general_profile').modal('hide');
                } else {
                    $('#edit_state').val(response.general_profile.state);
                    $('#edit_hospital').val(response.general_profile.hospital);
                    $('#edit_designation').val(response.general_profile.designation);
                    $('#edit_contact_number').val(response.general_profile.contact_number);
                    $('#edit_mou').val(response.general_profile.mou);
                    $('#edit_date_of_joining').val(response.general_profile.date_of_joining);
                    $('#general_profile_update').val(general_profile_id);
                }
            }
        });


    });

    $("#submit-btn").click(function () {
        var id = $('#general_profile_update').val();
        var formData = $("#general_profile_submit").serialize();
        $.ajax({
            url: 'general-edit/' + id,
            type: 'put',
            data: formData,
            success: function (response) {
                if (response.status == 201) {
                    $('#general_profile_error').html("");
                    $('#general_profile_error').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#general_profile_error').append('<li>' + err_value + '</li>');
                    });
                    $('#general_profile_error').text(response.message);
                } else {
                    $('#general_profile_success').addClass('alert alert-success');
                    $('#general_profile_success').text(response.message);
                    $('#edit_general_profile').modal('hide');
                    table_generalprofile();
                }
            },
        });
    });
});