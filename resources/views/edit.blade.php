<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@extends('layouts.app')
@section('title','Trainers Edit')
@section('content')
<form class="form-group" method="POST" action="{{ route('trainers.update', $trainer->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" value="{{$trainer->name}}" class="form-control">
        <label for="">Apellido:</label>
        <input type="text" name="apellido" value="{{$trainer->apellido}}" class="form-control">
        <label for="">Avatar:</label>
        <input type="file" name="avatar" value="{{$trainer->avatar}}">
    </div>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</form>
@endsection