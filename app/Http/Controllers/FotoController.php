<?php

namespace atividade_vitor_final\Http\Controllers;

use File;
use atividade_vitor_final\Foto;
use atividade_vitor_final\Album;
use Illuminate\Http\Request;
class FotoController extends Controller
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

    public function index(){
        $foto = Foto::join('albums','fotos.album_id','=','albums.id')->select('fotos.*','fotos.id as foto_id','albums.*','albums.nome as album_nome')->paginate(25);
        return view('pagina_usuario.foto.inicio',["foto"=>$foto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $foto = Foto::all();
        $album = Album::all();
        return view('pagina_usuario.foto.formulario',["foto"=>$foto,'album'=>$album]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required|max:255',
            'autor' => 'required|max:255',
            'imagem' => 'required',
            'album_id' => 'required|max:255',
        ]);

        $foto = new Foto;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $nome = uniqid(date('HisYmd'));
            $extension = $request->imagem->extension();
            $nome_imagem = "{$nome}.{$extension}";
            $enviar = $request->imagem->storeAs('public/Fotos',$nome_imagem);
            if ( $enviar ){


            }else{
                return 'Não foi possivel enviar a imagem';
            }

        }
        $foto->autor = $request->autor;
        $foto->nome = $request->nome;
        $foto->imagem = $nome_imagem;
        $foto->album_id = $request->album_id;
        $foto->save();
        return redirect(route('fotos'))->with('mensagem', 'Foto Inserida');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto,$id){

         $foto = Foto::where('id',$id)->first();
         $album = Album::all();

         return view('pagina_usuario.foto.editar',['foto'=>$foto,'album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto){
        $request->validate([
            'nome' => 'required||max:255',
            'autor' => 'required||max:255',
            'album_id' => 'required||max:255',
        ]);

            $foto = Foto::find($request->id);
            $foto->nome = $request->nome;
            $foto->autor = $request->autor;
            $foto->album_id = $request->album_id;
            $foto->update();
            return redirect(route('fotos'))->with('mensagem', 'Atualizado.');;
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $foto = Foto::find($request->id_delete);
        $foto->delete();
        return redirect(route('fotos'))->with('mensagem', 'Excluido.');;
    }
}
