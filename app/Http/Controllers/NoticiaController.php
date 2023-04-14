<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Http\Requests\NoticiaFormRequest;

class NoticiaController extends Controller
{
    public function create()
    {
        return view('noticia.create');
    }

    public function store(NoticiaFormRequest $request)
    {
        $data = $request->validated();

        //$noticia = Noticia::create($data);
        $noticia = Noticia::create([
            'id_user'=>auth()->user()->id,
            'titulo'=>$data['titulo'],
            'descricao'=>$data['descricao'],
        ]);

        return redirect('/cadastrar-noticia')->with('message','Notícia cadastrada com sucesso!');
    }
}
