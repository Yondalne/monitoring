@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Modifier une Application</h3>
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
                    <a href="{{ route('admin.applications.index') }}">Applications</a>
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
                        <div class="card-title">Formulaire de modification de Application</div>
                    </div>
                    <form action="{{ route('admin.applications.update', ["application" => $application->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $application->name) }}" required>
                                @error('titre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $application->url) }}" required>
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Enregistrer les modifications
                            </button>
                            <a href="{{ route('admin.applications.index') }}" class="btn btn-danger">
                                <i class="fa fa-times"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Auto-générer le slug à partir du titre
        $('#titre').on('input', function() {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/\s+/g, '-')           // Remplace les espaces par des tirets
                .replace(/[^\w\-]+/g, '')       // Supprime tous les caractères non-word
                .replace(/\-\-+/g, '-')         // Remplace les multiples tirets par un seul tiret
                .replace(/^-+/, '')             // Supprime les tirets au début
                .replace(/-+$/, '');            // Supprime les tirets à la fin
            $('#slug').val(slug);
        });
    });
</script>
@endsection
