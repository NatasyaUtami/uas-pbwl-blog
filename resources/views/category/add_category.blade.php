@extends('layouts.app')

@section('content') 

<div class="container"> 
    

    <h3>Tambah Data Category</h3> 
    <form action="{{ url('/category') }}" method="POST"> 
    @csrf
    <div class="form-group">
         <label for="">ID</label> 
         <input type="text" name="id" class="form-control">
    </div>
    <div class="form-group">
         <label for="">NAMA</label> 
         <input type="text" name="name" class="form-control">
    </div> 
    <div class="form-group">
         <label for="">TEXT</label> 
         <input type="text" name="text" class="form-control">
    </div> 
    <div class="form-group">
        <input type="submit" value="SIMPAN" class="btn btn-primary">
    </div>
</form> 
</div> 

@endsection