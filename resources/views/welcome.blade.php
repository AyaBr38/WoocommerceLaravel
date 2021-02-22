<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;

            }

            button {
                background-color:teal;
                color:white;
                border-radius: 4px;
                border: none;
                padding: 15px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
                margin: 4px 2px;
                cursor: pointer;
            }

            a {
                color:white;
                text-decoration: none;
            }
        </style>
    </head>
    <body style="background-image:url({{url('img/bfg.jpg')}});background-position: center center;background-repeat: no-repeat;background-size: cover;height: 100vh;width: 100%;">
        <h1 style="color: white;float:right;font-size:50px;font-family:Garamond,Times,serif;">Bienvenue à notre site E-commerce!</h1><img src="{{ asset('img/nature-logo.jpg') }}" width="42" height="42" style="left:550px;top:40px;position:absolute;"/>
            <div class="container" style="left:700px;top:100px;position:absolute;background-color: rgba(255,255,255, 0.7);padding:15px;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center"><i class="fas fa-business-time fa-10x" style="color: #0eb4fd" ></i></div>
                                <h2 class="font-18 text-center">Veuillez fournir vos informations d'identification :</h2>
                                <form class="form-horizontal m-t-30" action="{{url('/connection')}}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <div class="col-12" style="margin-bottom:20px;">
                                            <label style="font-weight:bold;">Lien :</label>
                                            <input name="host" class="form-control" type="text" required="" placeholder="Host">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12" style="margin-bottom:20px;">
                                            <label style="font-weight:bold;">API clé client :</label>
                                            <input name="key" class="form-control" type="password" required="" placeholder="Api key">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12" style="margin-bottom:20px;">
                                            <label style="font-weight:bold;">API clé secrete :</label>
                                            <input name="secret" class="form-control" type="password" required="" placeholder="Secret key">
                                        </div>
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
