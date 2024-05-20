@extends('backend.layout.master')
@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless datatable">
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
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row"><a
                                            href="{{ route('tasks.show', $task->id) }}">{{ $task->id }}</a></th>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>
                                        <div class="justify-content-around d-flex">
                                            @can('delete', $task)
                                                <div>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                        class='form-delete'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            @endcan
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
    </section>
@endsection
