<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Usuário Logado</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
</head>

<style>
    .container {
        margin-top: 200px
    }

    .btn:hover {
        color: #fff
    }

    .input-text:focus {
        box-shadow: 0px 0px 0px;
        border-color: #007bff;
        outline: 0px
    }

    .form-control {
        border: 1px solid #007bff;
    }

    h1 {
        font-size: 1.6rem;
        font-weight: 300;
    }

    .search {
        display: flexbox;
    }

    .centered {
        margin: 0 auto !important;
        float: none !important;
    }

</style>

<body>
    {{-- Include Nav Menu --}}
    @include('includes/header')

    {{-- Formulário de Busca --}}
    <section>
        <div class="container justify-content-center">
            <form action="{{ route('admin.search') }}" method="get">
                {{-- opcional @csrf --}}
                <div class="row">
                    <div class="col-md-6 centered">
                        <h1>Capturar:</h1>
                        <div class="input-group mb-3 search">
                            <input type="text" name="search" id="search" class="form-control input-text"
                                placeholder="Localizar carro...." aria-label="Recipient's username"
                                aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-lg">
                                    <i class="fa fa-search"></i> Capturar Veículos:
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            @empty(!Session::get('error'))
                <div class="alert alert-warning col-md-6 centered" role="alert">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endempty
        </div>
    </section>
</body>

{{-- Include Rodapé --}}
@include('includes/footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
