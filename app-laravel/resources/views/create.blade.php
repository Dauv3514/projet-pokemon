@extends('layouts.app')

@section('content')

<div class="deck-container">

    <div class="deck-card">

        <h2 class="deck-title">Créer un nouveau deck</h2>

        {{-- Messages --}}
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error-light">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('decks.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nom du deck</label>
                <input type="text" name="name" id="name"
                       placeholder="Ex: Mon Deck Légendaire" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-primary">
                    Créer le deck
                </button>
            </div>
        </form>

    </div>

</div>

@endsection