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
        margin-top: 50px
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

    .table {

        margin-bottom: 200px;
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
                        @if (!empty($request))
                            <h1>Resultado Pesquisa: <a
                                    href="{{ route('admin.home') }}"><strong>{{ $request->search }}
                                        [x]</strong>
                                </a>
                            </h1>
                        @endif
                        <div class="input-group mb-3 search">
                            <input type="text" name="search" id="search" class="form-control input-text"
                                placeholder="Localizar carro...." aria-label="Recipient's username"
                                aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-lg">
                                    <i class="fa fa-search"></i> Capturar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (!empty($request) && $count_cars === 0)
                <div class="alert alert-warning col-md-6 centered" role="alert">
                    <p>Não encontramos resultado para os termo utilizado..<br> Utilize paravras objetivas, Ex.: Audi</p>
                </div>
            @elseif (!empty($request) && $count_cars > 0)
                <div class="alert alert-success col-md-6 centered" role="alert">
                    <p><strong>Sucesso!</strong> Foram em contratos <strong>{{ $count_cars }}</strong> veículo(s)</p>
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container justify-content-center ">
            @empty(!Session('alert'))
                <div class="alert alert-success" role="alert">
                    <p>{{ Session('alert') }}</p>
                </div>
            @endempty
            @if (count($result_cars) > 0)
                <table class="table table-hover table-striped">
                    <thead>
                        <th>id</th>
                        <th>Veículo</th>
                        <th>Ano</th>
                        <th>Combustível</th>
                        <th>Portas</th>
                        <th>Km</th>
                        <th>Câmbio</th>
                        <th>Cor</th>
                        <th>link</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($result_cars as $cars) : ?>
                        <tr>
                            <td><strong>{{ $cars->id }}</strong></td>
                            <td>{{ $cars->nome_veiculo }}</td>
                            <td>{{ $cars->ano }}</td>
                            <td>{{ $cars->combustivel }}</td>
                            <td>{{ $cars->portas }}</td>
                            <td>{{ $cars->quilometragem }}</td>
                            <td>{{ $cars->cambio }}</td>
                            <td>{{ $cars->cor }}</td>
                            <td> <a href="{{ $cars->link }}" target="_blank" class="btn btn-sm btn-outline-primary"
                                    rel="noopener noreferrer">Link</a></td>
                            <td>
                                {{-- Atenção não foi utilizado verificações de segurança pois é um exemplo simples --}}
                                <a href="{{ route('admin.delete', ['id' => $cars->id]) }}"
                                    class="btn btn-sm btn-outline-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            @else
                sem resultado
            @endif
        </div>

    </section>
</body>

{{-- Include Rodapé --}}
@include('includes/footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</html>
