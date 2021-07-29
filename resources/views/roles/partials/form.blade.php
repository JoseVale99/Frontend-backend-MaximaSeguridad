<div class="form-group">
    {!! Form::label('nombre', 'Nombre del rol' ,['class'=>'text-black'])!!}
 
     {!! Form::text('name', null, ['class'=>'form-control ',
     'placeholder'=>'Ingrese el nombre del rol'
     ]) !!}
     @error('name')
     <div class="message-error">*{{ $message }}</div>
 @enderror    
</div>

         <h3 class="h3 text-black2">Listado de roles</h3>
         <div class="row justify-content-md-center">
             @foreach ($permissions as $permission)
         
             <div class="col col-lg-3">
                 <label class="text-black2 h4">
                    {!! Form::checkbox('permissions[]', $permission->id,null, ['class'=>'mr-1']) !!} 
                     {{$permission->descripcion}}
                 </label>
             </div>
             
         @endforeach
     </div>