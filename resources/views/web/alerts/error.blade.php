@if (count($errors) > 0)
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
        <div class="text-white">¡Corrige los siguientes errores!</div>
            @foreach ($errors->all() as $error)
                <i class='bx bxs-message-square-x'></i> {{ $error }} <br>
            @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
