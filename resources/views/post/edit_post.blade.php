@extends('layouts.app') 

@section('content') 

<div class="container"> 
     <h3>Edit Data Post</h3> 
     <form action="{{ url('/post/' . $row->id) }}" method="POST"> 
     <input name="_method" type="hidden" value="PATCH"> 
     @csrf 
     <div class="form-group">
         <label for="">ID</label> 
         <input type="text" name="id" class="form-control" value="{{ $row->id }}">
    </div>
     <div class="form-group">
         <label for="">DATE</label> 
         <input type="date" name="date" class="form-control" value="{{ $row->date }}">
    </div> 
    <div class="form-group">
         <label for="">SLUG</label> 
         <input type="text" name="slug" class="form-control" value="{{ $row->slug }}">
    </div> 
    <div class="form-group">
         <label for="">TITLE</label> 
         <input type="text" name="title" class="form-control" value="{{ $row->title }}">
    </div> 
     <div class="form-group">
         <label for="">TEXT</label> 
         <input type="text" name="text" class="form-control" value="{{ $row->text }}">
    </div> 
     <div class="form-group">
         <label for="">CATEGORY ID</label> 
         <input type="ext" name="cat_id" class="form-control" value="{{ $row->cat_id }}">
    </div> 
    <div class="form-group">
        <input type="submit" value="SIMPAN" class="btn btn-primary">
    </div>
</form> 
</div> 

@endsection