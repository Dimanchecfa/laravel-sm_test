@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible px-4">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    {{ session()->get('error') }}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible px-4 col-md-10 offset-md-1">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    {{ session()->get('success') }}
</div>

@endif
