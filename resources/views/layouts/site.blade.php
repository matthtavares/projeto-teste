<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mateus Tavares">
        <title>@yield('title') - CRUD de Usuários</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/usuarios/') }}">CRUD de Usuários</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/usuarios/') }}">Listar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/usuarios/cadastrar/') }}">Cadastrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main role="main" class="container py-5">
            <div class="mt-5">
                @yield('content')
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                if( document.querySelector('#table_users') != null ){
                    var tableUsers = $('#table_users').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ url('/usuarios/list') }}',
                            type: 'GET'
                        },
                        columns: [
                            { data: 'id' },
                            { data: 'nome' },
                            { data: 'cpf' },
                            { data: 'sexo' },
                            { data: "nascimento" },
                            { data: "buttons" }
                        ]
                    });

                    $("body").on("click", ".btn-delete", function (e) {
                        e.preventDefault();
                        let uId = $(this).data('id');
                        $.ajax({
                            url: `{{ url('/usuarios') }}/${uId}`,
                            data: { '_token': '{{ csrf_token() }}' },
                            type: 'DELETE',
                            success: function(result) {
                                tableUsers.clear().draw();
                                alert('Usuário excluído!');
                            }
                        });
                    });
                }

                $('.date-mask').mask('00/00/0000');
                $('.cpf-mask').mask('000.000.000-00', {reverse: true});
            });
        </script>
    </body>
</html>