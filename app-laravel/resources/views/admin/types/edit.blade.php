@extends('layouts.app')

@section('content')

<div class="type-edit-wrapper">

    <h1 class="type-edit-title">Modifier le Type</h1>

    <div class="type-edit-card">

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="type-edit-group">
                <label class="type-edit-label">Nom du type</label>

                <input type="text"
                       name="name"
                       value="{{ $type->name }}"
                       required
                       class="type-edit-input">
            </div>

            <div class="type-edit-actions">
                <button type="submit" class="type-edit-btn">
                    Mettre à jour
                </button>
            </div>

        </form>

    </div>

</div>

@endsection