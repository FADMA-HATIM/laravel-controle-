@extends('backend.layout.master')
@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du projet</h5>
                    <div class="mb-3">
                        <strong>Nom du projet:</strong> {{ $project->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $project->description }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de début:</strong> {{ $project->start_date }}
                    </div>
                    <div class="mb-3">
                        <strong>Date de fin:</strong> {{ $project->end_date }}
                    </div>
                    <div class="mb-3 d-flex">
                        @can('update', $project)
                            <p> <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary me-2"><i
                                        class="bi bi-pencil"></i> Modifier</a>
                            </p>
                        @endcan

                        @can('delete', $project)
                            <p>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class='form-delete'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Supprimer</button>
                            </form>
                            </p>
                        @endcan
                    </div>

                    <h5 class="card-title">Tâches du projet</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom de la tâche</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date d'échéance</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>

                                        <div class="justify-content-around d-flex">

                                            <div>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    class='form-delete'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </div>


                                            <div>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary sm"
                                                    title="Modifier"><i class="bi bi-pencil"></i></a>
                                            </div>
                                            <div>
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary sm"
                                                    title="Voir"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
