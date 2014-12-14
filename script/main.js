$(document).ready(function () {
    var check = 0;
    $("#cpassword").keyup(function () {
        check = 0;
        var p1 = $("#password").val();
        var p2 = $("#cpassword").val();
        if (p1 == p2)
        {
            $(this).css("border", "1px solid green");
            $(".passwarning").html("Password Matches");
            $(".passwarning").css("color", "green");
            check = 1;
        } else {
            $(this).css("border", "1px solid red");
            $(".passwarning").html("");
            check = 0;
        } 
        if (!$("#cpassword").val())
        {
             $(this).css("border", "1px solid #c0c8c9");
        }
    });
    $("#registerform").submit(function (event) {
        if(check != 1)
        {
            event.preventDefault();
            $(".passwarning").html("Password Mismatch");
            $(".passwarning").css("color", "red");
        }
    });
    $("#maintable").DataTable();
    $(".dateinput").datepicker();
});