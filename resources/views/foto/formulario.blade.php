@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                <div class="card-header">Criar Album de fotos</div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @if (isset($mensagens))
                                    <span class="help-block">
                                    <strong>{{ $mensagens }}</strong>
                                    </span>
                                    @endif

                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif
            <div class="col-lg-12">
                <form role="form" method="POST" action="{{ route('salvar_foto') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="ex">Nome</label>
                <input name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group">
                <label for="ex">Autor</label>
                <input name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group">
                <label for="ex">Album</label>
                <select  class="form-control" id="loja_id" name="loja_id" required>

                <option value="" selected>...</option>
                @foreach ($album as $valor)
                   <option value="{{ $valor->id }}">{{ $valor->nome }}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                <label for="ex">Imagem</label>
                <input type="file" name="nome" id="nome" class="form-control">
                </div>
               <button type="submit" class="btn btn-success">Criar</button>
                </form>
                 </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
