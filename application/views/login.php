<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIMKEU </title>

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">
        <!-- Animate.css -->
        <!--<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">-->

        <!-- Custom Theme Style -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/build/css/custom.min.css">

    </head>

    <body class="login">
        <div>


            <div class="login_wrapper">
                <div class="animate form login_form" style="border: 1px solid #cccccc; padding: 20px;background-color: white;">
                    <section class="login_content">
                        <!--<img width="120" src="<?= base_url() ?>assets/images/logo.png" />-->
                        <form>
                            <h1>Halaman Login</h1>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" placeholder="masukkan username">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input type="password" class="form-control has-feedback-left" placeholder="masukkan password">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-line-chart"></i> SIMKEU - UIJ</h1>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>