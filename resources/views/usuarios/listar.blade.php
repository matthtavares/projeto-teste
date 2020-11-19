@extends('layouts.site')

@section('title', 'Listar')

@section('content')
    <style type="text/css">
        #table_users thead tr th:nth-child(6),
        #table_users tbody tr td:nth-child(6) {
            width: 150px;
        }
        #table_users tbody tr td:nth-child(6) {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <table id="table_users" class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>CPF</th>
                <th>Sexo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection