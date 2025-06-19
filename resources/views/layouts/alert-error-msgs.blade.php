@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger fw-bold fs-5 text-center rounded">
            {{ $error }}
        </div>
    @endforeach
@endif
