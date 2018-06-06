$(function() {
    $("#submitbtn").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username.length > 0 && password.length > 0) {
            $.ajax({
                type: 'POST',
                url: '../Modules/login.php',
                data: 'username=' + username + '&password=' + password,
            });
        }
    });
});