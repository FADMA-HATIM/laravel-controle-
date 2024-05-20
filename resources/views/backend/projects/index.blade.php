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
                                <th scope="col">Nom du projet</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row"><a
                                            href="{{ route('projects.show', $project->id) }}">{{ $project->id }}</a></th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>
                                        <div class="justify-content-around d-flex">
                                            @can('delete', $project)
                                                <div>
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                        class='form-delete'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            @endcan
                                            @can('update', $project)
                                                <div>
                                                    <a href="{{ route('projects.edit', $project->id) }}"
                                                        class="btn btn-primary sm" title="Modifier"><i
                                                            class="bi bi-pencil"></i></a>
                                                </div>
                                            @endcan
                                            <div>
                                                <a href="{{ route('projects.show', $project->id) }}"
                                                    class="btn btn-primary sm" title="Voir"><i class="bi bi-eye"></i></a>
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
