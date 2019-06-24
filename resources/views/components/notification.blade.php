@if(session()->has('notification'))
<div class="alert alert-{{ session('notification.color') ?: 'info' }} alert-dismissible fade show" role="alert">
    {{ session('notification.message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
