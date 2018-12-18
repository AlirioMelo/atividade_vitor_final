@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                <div class="card-header">Atualizar Album de fotos</div>
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
                <form role="form" method="POST" action="{{ route('atualizar_foto') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $foto->id }}" class="form-control">
                        <div class="form-group">
                                <label for="ex">Nome</label>
                                <input name="nome" id="nome" class="form-control" value="{{ $foto->nome }}">
                                </div>
                                <div class="form-group">
                                <label for="ex">Usuario da Foto</label>
                                <input type="hidden" name="autor"  class="form-control" value="{{ Auth::user()->name }}">
                                <input  class="form-control" value="{{ Auth::user()->name }}" disabled>
                                </div>
                                <div class="form-group">
                                <label for="ex">Album</label>
                                <select  class="form-control"  name="album_id" required>

                                <option value="" selected>...</option>
                                @foreach ($album as $valor)
                                   <option value="{{ $valor->id }}">{{ $valor->nome }}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="ex">Imagem</label>
                                <img src="{{ url("storage/Fotos/{$foto->imagem}") }}" alt="">
                                </div>
                      <center> <button type="submit" class="btn btn-primary">Atualizar</button>
                      </center>
                </form>
                @if (isset($mensagens))
                <span class="help-block">
                <strong>{{ $mensagens }}</strong>
            </span>
            @endif
            </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
