$(document).ready(function() {
    $("#username").blur(function() {
        var username = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                user_name: username
            },
            datatype: "text",
            success: function(html) {
                $('#availname').html(html);
            }

        });
    });

    $("#phone").blur(function() {
        var phone = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                phone_num: phone
            },
            datatype: "text",
            success: function(html) {
                $('#availphone').html(html);
            }

        });
    });

    $("#email").blur(function() {
        var email = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                check_email: email
            },
            datatype: "text",
            success: function(html) {
                $('#availemail').html(html);
            }

        });
    });

    $("#lastname").blur(function() {
        var lname = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                check_lname: lname
            },
            datatype: "text",
            success: function(html) {
                $('#availlname').html(html);
            }

        });
    });



    $("#firstname").blur(function() {
        var fname = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                check_fname: fname
            },
            datatype: "text",
            success: function(html) {
                $('#availfname').html(html);
            }

        });
    });

    $("#password").blur(function() {
        var pass = $(this).val();
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                check_pass: pass
            },
            datatype: "password",
            success: function(html) {
                $('#availpass').html(html);
            }

        });
    });

    $("#confirm").blur(function() {
        var cf = $(this).val();
        var pass = document.getElementById("password").value;
        $.ajax({
            url: "/checkRegister",
            method: "POST",
            data: {
                cf_pass: pass,
                confirm: cf
            },
            datatype: "password",
            success: function(html) {
                $('#availcf').html(html);
            }

        });
    });

});