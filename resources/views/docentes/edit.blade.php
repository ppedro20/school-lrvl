@extends('layout')

@section('titulo', 'Alterar Docente')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gestão</li>
        <li class="breadcrumb-item">Curricular</li>
        <li class="breadcrumb-item"><a href="{{ route('docentes.index') }}">Docentes</a></li>
        <li class="breadcrumb-item"><strong>{{ $docente->user->name }}</strong></li>
        <li class="breadcrumb-item active">Alterar</li>
    </ol>
@endsection

@section('main')
    <form id="form_docente" novalidate class="needs-validation" method="POST"
        action="{{ route('docentes.update', ['docente' => $docente]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $docente->user_id }}">
        <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
            <div class="flex-grow-1 pe-2">
                @include('users.shared.fields', ['user' => $docente->user, 'readonlyData' => false])
                @include('docentes.shared.fields', ['docente' => $docente, 'readonlyData' => false])
                <div class="my-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="ok" form="form_docente">Guardar
                        Alterações</button>
                    <a href="{{ route('docentes.show', ['docente' => $docente]) }}"
                        class="btn btn-secondary ms-3">Cancelar</a>
                </div>
            </div>
            <div class="ps-2 mt-5 mt-md-1 d-flex mx-auto flex-column align-items-center justify-content-between"
                style="min-width:260px; max-width:260px;">
                @include('users.shared.fields_foto', [
                    'user' => $docente->user,
                    'allowUpload' => true,
                    'formToDelete' => 'form_delete_photo',
                ])
            </div>
        </div>
    </form>
    <form id="form_delete_photo" action="#" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endsection
