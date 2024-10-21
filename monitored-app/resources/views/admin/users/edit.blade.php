@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Modifier un Utilisateur</h3>
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
                    <a href="#">Modifier</a>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-12">
                @include('components.admin.messages')
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Formulaire de modification d'un utilisateur</div>
                    </div>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Rôle</label>
                                        <select class="form-control" id="role_id" name="role_id" required>
                                            <option value="">Sélectionner un rôle</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                                    {{ $role->titre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
