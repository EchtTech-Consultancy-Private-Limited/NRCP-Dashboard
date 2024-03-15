$(document).ready(function () {
    expenditure_edit();
    $('#expenditureA').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'expenditure-add',
            data: $(this).serialize(),
            success: function (data) {
                $('#item-list').append('<li>' + data.name + ' <button type="button" class="edit-item" data-id="' + data.id + '">Edit</button> <a href="#" class="delete-item" value="' + data.id + '">Delete</a></li>');
            }
        });
    });

    function expenditure_edit() {
        $.ajax({
            type: "GET",
            url: "expenditure-profile",
            dataType: "json",
            success: function (response) {
                $('tbody').html("");
                $.each(response.expenditure, function (key, item) {
                    $('tbody').append('<tr>\
                      <td>' + item.id + '</td>\
                      <td>' + item.financial_year + '</td>\
                      <td>' + item.fund_recieved + '</td>\
                      <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                      <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                  \</tr>');
                });
            }
        });
    }

    $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var expenditureedit = $(this).val();
        $('#expenditure_edit').modal('show');
        $.ajax({
            type: "GET",
            url: "expenditure-edit/" + expenditureedit,
            success: function (response) {
                $('#edit_financial_year').val(response.expenditure.financial_year);
                $('#edit_fund_recieved').val(response.expenditure.fund_recieved);
                $('#edit_equipment_purchase').val(response.expenditure.equipment_purchase);
                $('#expenditure_edit_type').val(expenditureedit);
            }
        });
    });

    $("#submit_edit_expenditure").click(function () {
        var expenditure_id = $('#expenditure_edit_type').val();
        var formData = $("#edit_expenditure").serialize();
        $.ajax({
            url: 'expenditure-submit/' + expenditure_id,
            type: 'put',
            data: formData,
            success: function (response) {
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
                    $('#expenditure_edit').modal('hide');
                }
                expenditure_edit();
            },
        });
    });
});