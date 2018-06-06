<html>
    <head>
        <title>Sign Up</title>
        <meta name="author" content="Eryomenko Maksim">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../JS/validate.js"></script>
    </head>

    <body>

    <div class="container" id="c">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div accept-charset="utf-8" class="form" role="form">
                    <div class="us">
                        <input type="text" id="username" class="form-control input-lg" placeholder="Username"  />
                        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                    </div>
                    <div class="em">
                        <input type="text" id="email" class="form-control input-lg has-error" placeholder="Your Email"  />
                        <p class="help-block">Please provide your E-mail</p>
                    </div>
                    <div class="pa">
                        <input type="password" id="password" class="form-control input-lg" placeholder="Password"  />
                        <p class="help-block">Password should be at least 5 characters</p>
                    </div>
                    <div class="row">
                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" id="submitbtn">Create my account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>