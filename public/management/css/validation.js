// Wait for the DOM to be ready
// $(document).ready(function () {
//
//     $('#regform').validate({
$(function () {
// Initialize form validation on the registration form.
// It has the name attribute "registration"
    $("form[name='regform']").validate({
// Specify validation rules
        rules: {
            fname: "required",
            lname: "required",
            email: {
                required: true,
                email: true
            },
            // email: "required",
            uname: "required",
            password: "required",
            // address: "required",
            cpassword: {
                equalTo: "#pass",
                required: true
            },
            mobile: {
                required: true,
                digits: true,
                //pattern: [/^[7-9]{1}[0-9]{9}$/],
            },
            address: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
        },

        messages: {
            fname: "Please Enter FirstName.",
            lname: "Please Enter LastName.",
            email: "Please Enter valid Email.",
            uname: "Please Enter UserName.",
            password: "Please Enter Password",
            cpassword: "Enter Confirm Password Same as Password",
            mobile: "Please Enter Valid Mobile Number",
            address: "Please Enter Address",
            // role: "Please select any one ",
            // status: "Please select any one",
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});
