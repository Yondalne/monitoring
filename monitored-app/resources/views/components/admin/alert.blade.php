@if (!empty(session('message')))
    <script>
        $.notify({
            icon: 'icon-bell',
            title: "{{session('message')['title']}}",
            message: "{{session('message')['message']}}",
        },{
            type: "{{session('message')['type']}}",
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });
    </script>
@endif

{{-- @if (session('message'))
    <div class="alert alert-{{ session('message')['type'] }} alert-dismissible fade show" role="alert">
        <strong>{{ session('message')['title'] }}</strong> {{ session('message')['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif --}}
{{--
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur!</strong> Il y a eu des problèmes avec votre saisie.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif --}}
