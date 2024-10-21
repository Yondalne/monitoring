@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Liste des Applications</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('home') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Applications</a>
                </li>
            </ul>
        </div>

        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('admin.applications.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Ajouter des Applications
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('components.admin.messages')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Toutes les Applications</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($applications as $application)
                                        <tr>
                                            <td>{{ $application->id }}</td>
                                            <td>{{ $application->name }}</td>
                                            <td>{{ $application->url }}</td>
                                            <td>
                                                <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i> Modifier
                                                </a>
                                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Aucune application n'a été trouvée.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
