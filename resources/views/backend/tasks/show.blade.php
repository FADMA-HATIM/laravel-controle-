@extends('backend.layout.master')
@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails de la tâche</h5>
                    <div class="mb-3">
                        <strong>Nom de la tâche:</strong> {{ $task->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $task->description }}
                    </div>
                    <div class="mb-3">
                        <strong>Projet:</strong> {{ $task->project->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Utilisateur:</strong> {{ $task->user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de début:</strong> {{ $task->start_date }}
                    </div>
                    <div class="mb-3">
                        <strong>Date d'échéance:</strong> {{ $task->due_date }}
                    </div>
                    <div class="mb-3 d-flex">
                        @can('update', $task)
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary me-2"><i
                                    class="bi bi-pencil"></i> Modifier</a>
                        @endcan
                        @can('delete', $task)
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class='form-delete'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Supprimer</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
