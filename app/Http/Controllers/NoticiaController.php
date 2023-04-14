<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Http\Requests\NoticiaFormRequest;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    public function index(){
        //$noticias = Noticia::all();

        $search = request('search');

        if($search){
            
            $noticias = Noticia::where([
                ['titulo', 'like', '%' . $search . '%']
            ])->where("id_user", Auth::user()->id)->get();
            

        }else{
            $noticias = Noticia::where("id_user", Auth::user()->id)->get();
        }

        return view('noticia.index', compact('noticias'));
    }
    
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