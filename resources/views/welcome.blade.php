<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href={{ asset('fonts/icomoon/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href={{ asset('css/login.css') }}>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("login98");
            var y = document.getElementById("login98h");

            if (x.style.display === "none") {
                x.style.display = "block";
            } /// appper
            else {
                x.style.display = "none";
            }

            if (y.style.display === "none") {
                y.style.display = "block";
            } /// appper
            else {
                y.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li style="margin-right:300px " class="active"><a href="/"><span>Blog System</span></a></li>
                            <li class="has-children">
                                <a href="/"><span>Select Department</span></a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="/">Menu One</a></li>
                                    <li><a href="/">Menu Two</a></li>
                                    <li><a href="/">Menu Three</a></li>
                                </ul>
                            </li>
                            <li><a id="login98h" onclick="myFunction();"><span>Login</span></a></li>
                            <li><a href="/s" id="signup"><span>Signup</span></a></li>
                        </ul>
                    </nav>
                </div>

                <div id="login98" style="display:none">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="api/auth/login">
                                <br><br>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="email" name="email">

                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password" name="password">
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox">Remember Me
                                </div>
                                <div class="form-group">
                                    <input id="submit" type="submit" value="Login" class="btn float-right login_btn">
                                </div>
                            </form><br><br>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center links">Haven't account?<a href="/s">Sign
                                        Up</a></div>
                                <div class="d-flex justify-content-center"><a href="#">Forgot your Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <script type="text/javascript">
        $('#submit').click(function(event)
         {
                event.preventDefault();

                let email1 = $("input[name=email]").val();
                let pass = $("input[name=password]").val();
                if (email1 == "") {
                    alert("email1 must be filled out");
                    return false;
                }

                if (pass == "") {
                    alert("pass must be filled out");
                    return false;
                } else if (pass.length < 8) {
                    alert("password less than 8 ! Not Allowed");
                } else {
                    $.ajax({
                        url: "api/auth/login",
                        type: 'POST',
                        data: {  email: email1,     password: pass  },

                        success: function(response)
                         {
                            var  token = response["token"];
                           localStorage.setItem('token', token );


                           //alert('Login Successfully ^_^ ');

                         //  window.location.href = '/create';

                       window.open('/create',"_self")

                        },

                        error: function(err) {

                            var x = JSON.stringify(err);
                            console.log(x);
                             alert(x);
                        }

                    }) }
                })

</script></body></html>
