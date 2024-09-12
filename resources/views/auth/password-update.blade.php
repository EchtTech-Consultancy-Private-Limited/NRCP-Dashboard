@extends('layouts.main')
@section('title')
{{__('User List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form method="POST" action="{{ route('change-password', Auth::user()->id) }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">Old Password<span class="text-danger">*</span></label>
                      <div class="position-relative">
                        <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
                        <i class="toggle-password btn-psw fa fa-fw fa-eye-slash"></i>
                      </div>

                        @error('oldpassword')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">New Password<span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                            <i class="toggle-password btn-psw fa fa-fw fa-eye-slash"></i>
                        </div>
                        @error('newpassword')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger w-auto ml-2">Reset</button>
            </form>
        </div>
    </div>
</div>

<script>
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


  $(".toggle-password.btn-psw").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

});
</script>

@endsection