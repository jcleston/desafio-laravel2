@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Editar Notícia') }}</h5>
            </div>

            <form action="{{ url('editar-noticia/'.$noticia->id) }}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PUT')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                        <label>{{ _('Título') }}</label>
                        <input type="text" name="titulo"
                            class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}"
                            placeholder="{{ _('Título') }}" value="{{ $noticia->titulo }}">
                        @include('alerts.feedback', ['field' => 'titulo'])
                    </div>

                    <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                        <label>{{ _('Descrição') }}</label>
                        <input type="text" name="descricao"
                            class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                            placeholder="{{ _('Descrição') }}"
                            value="{{ $noticia->descricao }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Editar') }}</button>
                </div>
            </form>
        </div>


    </div>

</div>
@endsection