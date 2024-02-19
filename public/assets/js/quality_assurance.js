$(document).ready(function () {
    profilequality_assurance();
    $('#quality_assurance').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'quality-add',
            data: $(this).serialize(),
            success: function (data) {
                if (data.status == 201) {
                    $('#quality_assurance_error').text("");
                    $('#pt-error').text('Something went wrong.');
                } else {
                    $('#quality_assurance_success').addClass('alert alert-success');
                    $('#quality_assurance_success').text(data.message);
                    $('#addListingModal').modal('hide');
                }
            }
        });
    });

    function profilequality_assurance() {
        $.ajax({
            type: "GET",
            url: "quality-profile",
            dataType: "json",
            success: function (response) {
                $("#table_quality_assurance").html("");
                $.each(response.quality_assurance, function (key, item) {
                    $("#table_quality_assurance").append('<tr>\
                        <td>' + item.id + '</td>\
                        <td>' + item.pt + '</td>\
                        <td>' + item.accredited_pt + '</td>\
                        <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm" id="quality_assurance_editbtn">Edit</button></td>\
                        <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                    \</tr>');
                });
            }
        });
    }

    $(document).on('click', '#quality_assurance_editbtn', function (e) {
        e.preventDefault();
        var quality_assurance_id = $(this).val();
        $('#edit_quality_assurance').modal('show');
        $.ajax({
            type: "GET",
            url: "quality-assurance-profile/" + quality_assurance_id,
            success: function (response) {
                if (response.status == 201) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit_quality_assurance').modal('hide');
                } else {
                    $('#edit_pt').val(response.quality_assurance.pt);
                    $('#edit_accredited_pt').val(response.quality_assurance.accredited_pt);
                    $('#edit_supervisors_trained').val(response.quality_assurance.supervisors_trained);
                    $('#edit_lims').val(response.quality_assurance.lims);
                    $('#quality_assurance_update').val(quality_assurance_id);
                }
            }
        });


    });

    $("#submit-btn").click(function () {
        var id = $('#quality_assurance_update').val();
        var formData = $("#quality_assurance_submit").serialize();
        $.ajax({
            url: 'quality-edit/' + id,
            type: 'put',
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('#change_quality_assurance').text('Update');
                } else {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit_quality_assurance').modal('hide');
                }
                profilequality_assurance();
            },
        });
    });
});