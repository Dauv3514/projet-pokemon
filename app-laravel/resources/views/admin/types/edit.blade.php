@extends('layouts.app')

@section('content')

<div class="admin-container">

    <h1>Modifier le Type</h1>

    <form action="{{ route('types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $type->name }}" required class="admin-input">

        <button class="btn-save">Mettre à jour</button>
    </form>

</div>

@endsection