@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {{ session('success') }}
        </strong>
    </div>

    <script>
        $(".alert").alert();
    </script>
@endif
