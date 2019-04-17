$(document).ready(function() {
    $("#registration").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            url: {
                required: true,
                url: true
            },
            phone:{
                required: true,
                regex_pattern: true
            }
        },
        messages: {
            name: "Please enter your name",
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            url: {
                required: "Please enter an url address",
                url: "Please enter a valid url"
            },
            phone: {
                required: "Please enter your phone number",
                regex_pattern: "Please enter at least 3 character"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});


jQuery.validator.addMethod("regex_pattern", function(value){
    return /^$|^\d{3}$/.test(value); 
});