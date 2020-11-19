@extends('layouts.site')

@section('title', 'Cadastrar Usuário')

@section('content')
    <h2>Cadastrar Usuário</h2>
    <form action="{{ url('/usuarios/save/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" name="cpf" class="form-control cpf-mask" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Data Nascimento:</label>
                    <input type="text" name="nascimento" class="form-control date-mask" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sexo:</label>
                    <select name="sexo" class="form-control" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
@endsection