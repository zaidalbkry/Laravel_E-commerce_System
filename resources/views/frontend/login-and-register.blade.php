<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport"
        content="width=device-width, minimum-scale=1 , initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="theme-color" content="#150e0e" />

    <title>Auth Page</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo.png" />
    <link rel="icon" href="images/logo.png" />
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="css/login.css" />
</head>

<body class="cover-overflow-y">
    <div id="loadingDiv">
        <div class="loader">Loading...</div>
    </div>

    <div id="body" class="home">
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <section class="login-and-register-section">
            <div id="mainBox">
                <div id="overlay">
                    <div id="overlayInner">
                        <div id="signUp" class="">
                            <h1>Welcome !</h1>
                            <p>
                                Please Login To Keep <br />
                                Connected With Us .
                            </p>
                            <button class="btn" onClick="moveSliderRight()">
                                Login
                            </button>
                        </div>

                        <div id="signIn">
                            <h1>New Here !</h1>
                            <p>
                                Sign Up And Discover a Great <br />
                                Amount Of new Properties
                            </p>
                            <button class="btn" onClick="moveSliderLeft()">Sign Up</button>
                        </div>
                    </div>
                </div>

                <div id="forms">
                    <div id="signInForm" class="">
                        <form action="#" class="holder" novalidate autocomplete="off">
                            <div>
                                <h1>Sign In To Berla Store</h1>
                                <br>
                                <br>

                                <div class="input-container">
                                    <input type="email" name="email" class="form-control" id="InEmaill" required
                                        placeholder="E-mail" />
                                </div>

                                <div class="input-container">
                                    <input type="password" name="password" class="form-control" id="InPasss" required
                                        placeholder="Password" />
                                </div>


                                <button type="submit " class="btn">LOGIN</button>
                            </div>
                        </form>
                    </div>

                    <div id="signUpForm" class="shiftLeft">
                        <form class="holder" novalidate autocomplete="off" action="#">
                            <div>
                                <h1>Create Account</h1>

                                <br>
                                <br>

                                <div class="input-container">
                                    <input type="email" name="email" class="form-control" id="InEmaill" required
                                        placeholder="Name" />
                                </div>

                                <div class="input-container">
                                    <input type="email" name="email" class="form-control" id="InEmaill" required
                                        placeholder="E-mail" />
                                </div>

                                <div class="input-container">
                                    <input type="password" name="password" class="form-control" id="InPasss" required
                                        placeholder="Password" />
                                </div>

                                <div class="check-box-container">
                                    <input id="ch" type="checkbox" name="" id="" />
                                    <label for="ch"> Remember Me</label>
                                </div>

                                <button type="submit " class="btn">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------- -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>
