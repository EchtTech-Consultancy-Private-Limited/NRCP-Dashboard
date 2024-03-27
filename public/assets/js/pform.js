$(document).ready(function() {
    // $("#first-name-error").text("New word");
    // console.log(fname);
    //Detect that a user has started entering their name itno the name input
    // Name can't be blank
    $('#first-name').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
        var name = regex.test(is_name);
        if (name) {
            $("#first-name-error").text("");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#first-name-error").text("Please enter valid name");
        }
    });

    $('#last-name').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
        var name = regex.test(is_name);
        if (name) {
            $("#last-name-error").text("");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#last-name-error").text("Please enter valid last name");
        }
    });



    $('#dob').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "") {
            $("#dob-error").text("Dob is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#dob-error").text("");
        }
    });


    $('#gander').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your Gender") {
            $("#gander-error").text("Gander  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#id-type').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your id-type") {
            $("#id-type-error").text("Id Type  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#identification').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        var regex = /^[0-9]+$/;
        var name = regex.test(is_name);


        if (name) {
            $("#identification-error").text("");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#identification-error").text("Please enter valid identity no");
        }
    });


    $('#citizenship').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your Citizenship") {
            $("#citizenship-error").text("citizenship   is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#citizenship-error").text("");
        }
    });


    $('#house-no').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "") {
            $("#house-no-error").text("House no is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#house-no-error").text("");
        }
    });

    $('#state').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your state") {
            $("#state-error").text("state number  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#district').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your district") {
            $("#district-error").text("district number  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#taluka').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your taluka") {
            $("#taluka-error").text("taluka number  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#village').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your village") {
            $("#village-error").text("Village number  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#street-name').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "") {
            $("#street-name-error").text("Street-name  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#street-name-error").text("");
        }
    });

    $('#landmark').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "") {
            $("#landmark-error").text("Landmark  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#landmark-error").text("");
        }
    });

    $('#pin-code').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        var regex = /^[0-9]+$/;
        var name = regex.test(is_name);

        if (name) {
            $("#pin-code-error").text("");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#pin-code-error").text("Please enter valid pin code");
        }
    });

    $('#provisinal-diagnosis').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your Diagnosis") {
            $("#provisinal-diagnosis-error").text("Diagnosis number  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#gander-error").text("");
        }
    });

    $('#date-of-onset').on('input', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "") {
            $("#date-of-onset-error").text("date-of-onset  is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#pin-code-error").text("");
        }
    });


    $('#OPD-IPD').on('click', function() {
        var input = $(this);

        var is_name = input.val();
        if (is_name == "Select Your OPD-IPD") {
            $("#opd-ipd-error").text("OPD/IPD is required");
            // input.removeClass("invalid").addClass("valid");
        } else {
            $("#opd-ipd-error").text("");
        }
    });

    // Email must be an email
    $('#contact_email').on('input', function() {
        var input = $(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email = re.test(input.val());
        if (is_email) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.removeClass("valid").addClass("invalid");
        }
    });
    // Website must be a website
    $('#contact_website').on('input', function() {
        var input = $(this);
        if (input.val().substring(0, 4) == 'www.') {
            input.val('http://www.' + input.val().substring(4));
        }
        var re = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
        var is_url = re.test(input.val());
        if (is_url) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.removeClass("valid").addClass("invalid");
        }
    });
    // Message can't be blank
    $('#contact_message').keyup(function(event) {
        var input = $(this);
        var message = $(this).val();
        if (message) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.removeClass("valid").addClass("invalid");
        }
    });
    // After Form Submitted Validation

    // city filter by state
    $(document).on('change', '#pform_state', function() {
        let state_id = $(this).val();
        $.ajax({
        type: "GET",
        url: BASE_URL + "/get-city",
        data: {
            'state_id': state_id
        },
        success: function(data) {
            $("#pform_city").html(data);
        }
        });

    });

});