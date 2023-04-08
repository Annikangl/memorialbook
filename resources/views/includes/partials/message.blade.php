@if(session()->has('message'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('message') }}
    </div>
@endif
