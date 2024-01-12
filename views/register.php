<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wiki Management System </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div class="login_wrapper">
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <center><img src="/img/Wikipedia-logo.png" alt="..." width="200"></center>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="/register">
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" name="username" class="form-control has-feedback-left" placeholder="Username">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input name="email" class="form-control has-feedback-left" placeholder="Email">
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="password" name="password" class="form-control has-feedback-left" placeholder="Password">
                                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12">
                                    <center>
                                        <button type="submit" class="btn" style="background-color: rgb(169, 169, 169); color: rgb(192, 202, 211);">Register</button>
                                    </center>
                                </div>
                            </div>

                            <div id="error-messages" class="error-messages"></div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/build/js/script.js"></script>
</body>

</html>