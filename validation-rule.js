$(document).ready(function() {
    $("#registration").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            firstname: "Please enter your firstname",
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});