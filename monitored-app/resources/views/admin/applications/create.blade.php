@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Créer des Applications</h3>
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
                    <a href="#">Créer</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('components.admin.messages')

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Formulaire de création de Applications</div>
                    </div>
                    <form action="{{ route('admin.applications.store') }}" method="POST" id="category-form">
                        @csrf
                        <div class="card-body">
                            <div id="applications-container">
                                <div class="category-input mb-3">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" name="applications[0][name]" class="form-control" placeholder="Titre de l'application" required>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="applications[0][url]" class="form-control" placeholder="URL de l'API" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-category" style="display:none;">
                                                <i class="fa fa-trash"></i> Supprimer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-category" class="btn btn-info">
                                <i class="fa fa-plus"></i> Ajouter une application
                            </button>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Enregistrer les Applications
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
        let categoryCount = 0;

        $('#add-category').click(function() {
            categoryCount++;
            let newCategory = `
                <div class="category-input mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" name="applications[${categoryCount}][name]" class="form-control" placeholder="Titre de la application" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="applications[${categoryCount}][url]" class="form-control" placeholder="Slug de la application" required>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-category">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#applications-container').append(newCategory);
            updateRemoveButtons();
        });

        $(document).on('click', '.remove-category', function() {
            $(this).closest('.category-input').remove();
            updateRemoveButtons();
        });

        function updateRemoveButtons() {
            let applications = $('.category-input');
            if (applications.length > 1) {
                applications.find('.remove-category').show();
            } else {
                applications.find('.remove-category').hide();
            }
        }
    });
</script>
@endsection
