@if (Session::has('message_save'))
<div class="alert alert-primary alert-dismissible fade show  alert-save">
    <strong><i class="fas fa-check-circle"></i> {{ session('message_save') }}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif



@if (session('message_delete'))
<div class="alert alert-primary alert-dismissible fade show  alert-delete">
    <strong> <i class="fas fa-trash"></i> {{ session('message_delete')}}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif


@if (Session::has('status'))
<div class="alert alert-primary alert-dismissible fade show  alert-save">
    <strong><i class="fas fa-check-circle"></i> {{ session('status') }}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif
{{-- Cart notifications --}}
@if (session('alert'))
<div class="alert alert-primary alert-dismissible fade show  alert-delete">
    <strong> <i class="fas fa-exclamation-triangle"></i> {{ session('alert')}}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

@if (session('compra_sucess'))
<div class="alert alert-primary alert-dismissible fade show  alert-save">
    <strong> <i class="fas fa-clipboard-check"></i> {{ session('compra_sucess')}}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

