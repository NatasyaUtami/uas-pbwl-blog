@extends('layouts.app') 

@section('content') 

<div class="container"> 
     <h3>Edit Data Album</h3> 
     <form action="{{ url('/album/' . $row->id) }}" method="POST"> 
     <input name="_method" type="hidden" value="PATCH"> 
     @csrf 
     <div class="form-group">
         <label for="">ID</label> 
         <input type="text" name="id" class="form-control" value="{{ $row->id }}">
    </div>
     <div class="form-group">
         <label for="">NAMA</label> 
         <input type="text" name="name" class="form-control" value="{{ $row->name }}">
    </div> 
     <div class="form-group">
         <label for="">TEXT</label> 
         <input type="text" name="text" class="form-control" value="{{ $row->text }}">
    </div> 
     <div class="form-group">
         <label for="">PHOTO ID</label> 
         <input type="text" name="text" class="form-control" value="{{ $row->photo_id }}">
    </div> 
    <div class="form-group">
        <input type="submit" value="SIMPAN" class="btn btn-primary">
    </div>
</form> 
</div> 

@endsection