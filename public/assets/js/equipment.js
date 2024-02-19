$(document).ready(function () {
    equipment_edit();
    $('#general_equipment').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'equipment-add',
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status == 201) {
                    $('#equipment-error').html("");
                    $.each(data.errors, function (key, err_value) {
                        $('#equipment-error').append('<li>' + err_value + '</li>');
                    });
                    $('#equipment-error').text('error');
                } else {
                    $('#equipment').addClass('alert alert-success');
                    $('#equipment').text(data.message);
                    $('#addListingModal').modal('hide');
                }
            }
        });
    });

    function equipment_edit() {
        $.ajax({
            type: "GET",
            url: "equipment-profile",
            dataType: "json",
            success: function (response) {
                $('tbody').html("");
                $.each(response.equipments, function (index, equipment_index) {
                    $('tbody').append('<tr>\
                      <td>' + equipment_index.id + '</td>\
                      <td>' + equipment_index.equipment + '</td>\
                      <td>' + equipment_index.quantity + '</td>\
                      <td><button type="button" value="' + equipment_index.id + '" class="btn btn-primary editbtn btn-sm" id="equipment_editbtn">Edit</button></td>\
                      <td><button type="button" value="' + equipment_index.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                  \</tr>');
                });
            }
        });
    }

    $(document).on('click', '#equipment_editbtn', function (e) {
        e.preventDefault();
        var equipmentedit = $(this).val();
        $('#equipment_form').modal('show');
        $.ajax({
            type: "GET",
            url: "equipment-edit/" + equipmentedit,
            success: function (response) {
                $('#edit_equipment').val(response.edit.equipment);
                $('#edit_quantity').val(response.equipment_edit.quantity);
                $('#edit_year_of_purchase').val(response.equipment_edit.year_of_purchase);
                $('#equipment_submit').val(equipmentedit);
            }
        });
    });

    $("#submit-equipment").click(function () {
        var equipment_id = $('#equipment_submit').val();
        var formData = $("#equipment_modal").serialize();
        $.ajax({
            url: 'equipment-submit/' + equipment_id,
            type: 'put',
            data: formData,
            success: function (response) {
                console.log(formData);
                if (response.status == 201) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('#change_general_profile').text('Update');
                } else {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit').modal('hide');
                }
                equipment_edit();
            },
        });
    });
});