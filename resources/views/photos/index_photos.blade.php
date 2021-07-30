@extends('layouts.app')

@section('content')

    <div class="container"> 
        <h3>Data Photos
        <a href="{{ url('/photos/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>

        </h3> 


          <table class="table table-bordered"> 
               <tr> 
                     <th>ID</th>
                     <th>DATE</th>
                     <th>TITLE</th>
                     <th>TEXT</th>
                     <th>POST ID</th>
                     <th>EDIT</th>
                     <th>DELETE</th>
                </tr> 
             @foreach($rows as $row) 
                 <tr> 
                      <td>{{ $row->id }}</td> 
                      <td>{{ $row->date }}</td> 
                      <td>{{ $row->title }}</td> 
                      <td>{{ $row->text }}</td> 
                      <td>{{ $row->post_id }}</td> 
                      <td><a href="{{ url('photos/' . $row->id  . '/edit') }}" class="btn btn-info btn-sm">Edit</a></td> 
                      <td>
                          <form action="{{ url('/photos/' . $row->id) }}" method="POST">
                          <input name="_method" type="hidden" value="DELETE">
                          @csrf 
                          <button class="btn btn-danger btn-sm">Hapus</button> 
                          </form>
                     </td> 
                </tr>
             @endforeach 
            </table>
    </div>

@endsection