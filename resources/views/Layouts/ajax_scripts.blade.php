<script>
     $("#adminForm").validate({

            rules: {
               first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                password:
                {
                required: true,
                minlength: 8,
                } ,
                password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#password"
                }
            },
            // Specify validation error messages
            messages: {
                first_name: "Please Enter a First Name.",
                last_name: "Please Enter a First Name.",
                email:{
                    required: "Please Enter a Email.",
                    email: "Please Enter a Valid."
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirm: {
                    required: "Please enter same password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo:"Please Enter the Same password"
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

</script>