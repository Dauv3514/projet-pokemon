@extends('layouts.app')

@section('content')

<div class="admin-container">

    <h1>Créer un Type</h1>

    <form action="{{ route('types.store') }}" method="POST">
        @csrf

        <input type="text" name="name" required class="admin-input">

        <button class="btn-save">Créer</button>
    </form>

</div>

@endsection