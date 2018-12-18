@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Album de fotos</div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('mensagem'))
                                <div class="alert alert-success">
                                    {{ session('mensagem') }}
                                </div>
                            @endif

                            <a href="{{ route('form_salvar_album') }}" class="btn btn-primary">Novo Album <b style="font-size:16"> +</b></a>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome do Album</th>
                                        <th>Editar/Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>

                        @foreach ($album as $valor)
                        <tr>
                        <td>{{ $valor->nome }}</td>
                        <td>
    <a href="{{ url('/album/formulario_atualizar/'.$valor->id)}}" class="btn btn-primary">Editar</a>

    <form action="{{ route('apagar_album') }}" method="post" style="display:inline-block">
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
                        {{ $album->links() }}
                            </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
@endsection
