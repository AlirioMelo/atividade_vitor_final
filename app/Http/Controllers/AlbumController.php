<?php

namespace atividade_vitor_final\Http\Controllers;

use atividade_vitor_final\Album;
use atividade_vitor_final\Foto;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $album = Album::paginate(25);

        return view('pagina_usuario.album.inicio',["album"=>$album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::all();
        return view('pagina_usuario.album.formulario',["album"=>$album]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:albums|max:255',
        ]);

        $album = new Album;
        $album->nome = $request->nome;
        $album->save();
        return redirect(route('albums'))->with('mensagem', 'albums cadastrado!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album,$id)
    {

         $album = Album::where('id',$id)->first();
         return view('pagina_usuario.album.editar',['album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, albums $album)
    {
        $request->validate([
            'nome' => 'required|unique:albums|max:255',
        ]);
        $album = Album::find($request->id);
        $album->nome = $request->nome;
        $album->update();
        return redirect(route('albums'))->with('mensagem', 'Atualizado!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Album::destroy($request->id_delete);
        return redirect(route('albums'))->with('mensagem', 'Excluido');;
    }
}
