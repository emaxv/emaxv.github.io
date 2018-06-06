$(function(){

    var username = "";
    var email = "";
    var password = "";

    $("#username").keyup(function () {
        var vall = $(this).val();
        username = vall;
    });

    $("#email").keyup(function () {
        var vall = $(this).val();
        if(vall == ""){
            $(".em").removeClass( "has-success" ).addClass("has-error");
            email = "";
        } else {
            $.ajax({
                type: 'POST',
                url: '../Modules/signup.php',
                data: "email="+vall,
                success: function (msg){
                    if(msg == "invalid") {
                        $(".em").removeClass( "has-success" ).addClass("has-error");
                        email = "";

                    } else if(msg == "exist"){
                        $(".em").removeClass( "has-success" ).addClass("has-error");
                        email = "";

                    } else if(msg == "ok"){
                        $(".em").removeClass( "has-error" ).addClass("has-success");
                        email = vall;
                    }
                }
            });
        }
    });

    $("#password").keyup(function () {
        var vall = $(this).val();
        password = vall;
    });

    
    $("#submitbtn").click(function() {
        if(username == "" || email == "" || password == "" ){
        } else {
            $.ajax({
                type: 'POST',
                url: '../Modules/signup.php',
                data: "username="+username+"&email="+email+"&password="+password,
                success: function(html){
                    alert("Поздравляю, вы зарегистрированы!");
                    var url = "enter.form.php";
                    $(location).attr('href',url);
                }
            });
        }
    });
});