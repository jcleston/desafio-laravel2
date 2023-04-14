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

    public function edit($id_noticia)
    {
        //$noticia = Noticia::find($id_noticia);

        //Garantindo que ao editar pela url, somente o dono acesse sua noticia, isso gera erro na aplicação, melhorar depois
        $noticias = Noticia::where("id_user", Auth::user()->id)->get();
        $noticia = $noticias->find($id_noticia);

        //criar condição para verificar se a noticia pertence ao usuário, caso não, redirecionar e emitir mensagem

        return view('noticia.editar', compact('noticia'));
    }

    public function update(NoticiaFormRequest $request, $id_noticia)
    {
        $data = $request->validated();

        $noticia = Noticia::where('id', $id_noticia)->update([
            'titulo' => $data['titulo'],
            'descricao' => $data['descricao']
        ]);

        return redirect('/noticias')->with('message','Notícia editada com sucesso!');
    }
}