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
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="justify-content-around d-flex">
                                            @if($user->role !== 'admin')
                                            <div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class='form-delete'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                           
                                            <div>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary sm" title="Modifier"><i class="bi bi-pencil"></i></a>
                                            </div>
                                            <div>
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary sm" title="Voir"><i class="bi bi-eye"></i></a>
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
