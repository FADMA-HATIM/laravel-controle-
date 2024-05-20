@extends('backend.layout.master')
@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails de l'utilisateur</h5>
                    <div class="mb-3">
                        <strong>Nom:</strong> {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Rôle:</strong> {{ $user->role }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de création:</strong> {{ $user->created_at->format('d-m-Y H:i:s') }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de mise à jour:</strong> {{ $user->updated_at->format('d-m-Y H:i:s') }}
                    </div>
                    <div class="mb-3 d-flex">
                       
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary me-2"><i
                                    class="bi bi-pencil"></i> Modifier</a>
                   
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class='form-delete'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Supprimer</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
