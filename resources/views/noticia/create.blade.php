@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Cadastrar Notícia') }}</h5>
            </div>

            <form method="post" action="{{url('cadastrar-noticia')}}" method="POST" autocomplete="off">
                <div class="card-body">
                    @csrf


                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('titulo') ? ' has-danger' : '' }}">
                        <label>{{ _('Título') }}</label>
                        <input type="text" name="titulo"
                            class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}"
                            placeholder="{{ _('Título') }}" value="{{ old('titulo', auth()->user()->titulo) }}">
                        @include('alerts.feedback', ['field' => 'titulo'])
                    </div>

                    <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                        <label>{{ _('Descrição') }}</label>
                        <input type="text" name="descricao"
                            class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                            placeholder="{{ _('Descrição') }}"
                            value="{{ old('descricao', auth()->user()->descricao) }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Cadastrar') }}</button>
                </div>
            </form>
        </div>


    </div>

</div>
@endsection