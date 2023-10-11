<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')
@section('title','Trainer Create')
@section('content')
<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" class="form-control">
        <label for="">Apellido:</label>
        <input type="text" name="apellido" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Avatar:</label>
        <input type="file" name="avatar">
    <button type="submit" class="btn btn-primary">
        Guardar</button>
    </form>
@endsection


