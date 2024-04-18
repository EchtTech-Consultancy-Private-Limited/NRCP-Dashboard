
function alertMessage(){
    $('.alert-success').css('display', 'none');
    $('.alert-danger').css('display', 'none');
}

setTimeout(alertMessage, 5000)



$(document).ready(function() {
    // validate the comment form when it is submitted

    // validate signup form on keyup and submit
    $("#login").validate({
        rules: {
            captcha: {
                required: true,
            },
            user_type: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
           
           
        },
        messages: {
            user_type: "Please select user type",
            email: "Please enter a valid email address",
            password: {
                required: "Please enter  password",
            },
            captcha: "Please enter the captcha code"
           
           
           
        }
        
    });

});