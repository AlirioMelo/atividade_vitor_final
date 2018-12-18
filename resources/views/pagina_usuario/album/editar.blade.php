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
                <form role="form" method="POST" action="{{ route('atualizar_album') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $album->id }}" class="form-control">
                    <div class="form-group">
                        <label for="ex">Nome</label>
                        <input name="nome"  value="{{ $album->nome }}" class="form-control">
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
