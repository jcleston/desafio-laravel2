@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Notícias</h4>
            </div>

            <form action="/noticias" method="GET">
                <div class="form-group">
                    <input id="search" class="form-control" type="text" name="search" placeholder="Pesquisar" value="" autofocus />
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Título
                                </th>
                                <th>
                                    Descrição
                                </th>
                                <th colspan="3">
                                    Ações
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($noticias as $noticia)
                            <tr>
                                <td>{{ $noticia->id }}</td>
                                <td>{{ $noticia->titulo }}</td>
                                <td>{{ $noticia->descricao }}</td>
                                <td>
                                    <a href="{{ url('/editar-noticia/'.$noticia->id) }}"
                                        class="btn btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('deletar-noticia/'.$noticia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Sem registros</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection