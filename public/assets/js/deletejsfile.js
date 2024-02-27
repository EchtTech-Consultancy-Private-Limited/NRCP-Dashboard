$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.delete-user', function() {

        var userURL = $(this).data('url');
        var trObj = $(this);

        if (confirm("Are you sure you want to delete this user?") == true) {
            $.ajax({
                url: userURL,
                type: 'DELETE',
                dataType: 'json',
                success: function(data) {
                    //alert(data.success);
                    if(data.success ==1){
                        toastr.success("Deleted successfully.");
                        location.reload();
                    }
                    //trObj.parents("tr").remove();
                }
            });
        }

    });

});