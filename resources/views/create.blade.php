@extends('layouts.app')

@section('title', 'Trainer Create')

@section('content')
<form class="form-group" method="POST" action="{{ route('trainers.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" class="form-control">
        <label for="">Apellido:</label>
        <input type="text" name="apellido" class="form-control">
        <label for="">Avatar:</label>
        <input type="file" name="avatar">
    </div>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</form>
@endsection

