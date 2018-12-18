@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fotos</div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('mensagem'))
                                <div class="alert alert-success">
                                    {{ session('mensagem') }}
                                </div>
                            @endif

                            <a href="{{ route('form_salvar_foto') }}" class="btn btn-primary">Adicionar Foto <b style="font-size:16"> +</b></a>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome da Foto</th>
                                        <th>Autor</th>
                                        <th>Album</th>
                                        <th>Imagem</th>
                                        <th>Editar/Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>

                        @foreach ($foto as $valor)
                        <tr>
                        <td>{{ $valor->nome }}</td>
                        <td>{{ $valor->autor }}</td>
                        <td>{{ $valor->album_nome }}</td>
                        <td>{{ $valor->nome }}</td>
                        <td>
    <a href="{{ url('/foto/formulario_atualizar/'.$valor->id)}}" class="btn btn-primary">Editar</a>

    <form action="{{ route('apagar_foto') }}" method="post" style="display:inline-block">
            @csrf
            <input type="hidden" name="id_delete" value="{{ $valor->id }}">
            <button  class="btn btn-primary" >Excluir</button>
    </form>
                        </a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        </div>
                        {{ $foto->links() }}
                            </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
@endsection
