<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teste Site de Carros">
    <meta name="author" content="Jonas Ferreira">

    <title>Teste Site de Carros</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 100px;
        }

        button {
            margin-top: 20px;
        }

        .centered {
            margin: 0 auto !important;
            float: none !important;
        }

    </style>

</head>

<body>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-4 centered">
                <form action="{{ route('login.login') }}" class="form-signin" method="post">
                    @csrf
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal">Login Sistema</h1>

                    </div>
                    @empty(!Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endempty
                    <div class="form-label-group">
                        <label for="inputEmail">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Informe o e-mail correto" required="" autofocus="">

                    </div>

                    <div class="form-label-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha"
                            required="">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block " type="submit">Acessar</button>
                    <p class="mt-5 mb-3 text-muted text-center">Sistema teste © <?= date('Y') ?></p>
                </form>
            </div>

        </div>

    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('div.alert').delay(3000).fadeOut(350);
</script>

</html>
