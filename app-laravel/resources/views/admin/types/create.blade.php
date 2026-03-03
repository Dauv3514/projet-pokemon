@extends('layouts.app')

@section('content')

<div class="type-create-wrapper">

    <h1 class="type-create-title">Créer un Type</h1>

    <div class="type-create-card">

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="type-create-group">
                <label class="type-create-label">Nom du type</label>

                <input type="text"
                       name="name"
                       required
                       class="type-create-input">
            </div>

            <div class="type-create-actions">
                <button type="submit" class="type-create-btn">
                    Créer
                </button>
            </div>

        </form>

    </div>

</div>

@endsection