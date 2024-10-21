@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Détails de l'Utilisateur</h3>
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
                    <a href="{{ route('admin.users.index') }}">Utilisateurs</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Détails</a>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-12">
                @include('components.admin.messages')
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ $user->name }}</div>
                        <div class="card-category">{{ $user->email }}</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Informations générales</h4>
                                <p><strong>Nom:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Rôle:</strong> {{ $user->role->titre ?? 'N/A' }}</p>
                                <p><strong>Date de création:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Dernière mise à jour:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Activité récente</h4>
                                <!-- Ici, vous pouvez ajouter des informations sur l'activité récente de l'utilisateur si vous en avez -->
                                <p>Aucune activité récente enregistrée.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </form>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
