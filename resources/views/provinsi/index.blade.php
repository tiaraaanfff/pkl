@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Data Provinsi</b>
               <a href="{{ route('provinsi.create') }}" class="btn btn-primary float-right">
                  Add Data
               </a>
            </div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <th>No</th>
                     <th>Kode Provinsi</th>
                     <th>Provinsi</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                     @foreach ($provinsi as $data)
                        <tr>
                           <td align="center">{{ $no++ }}</td>
                           <td>{{ $data->kode_provinsi }} </td>
                           <td>{{ $data->nama_provinsi }} </td>
                           <td align="center">
                              <form action="{{route('provinsi.destroy', $data->id)}}" method="post">
                              @csrf
                              @method("DELETE")
                              <a class="btn btn-success" href="{{ route('provinsi.show', $data->id) }}">Show</a>
                              <a class="btn btn-warning" href="{{ route('provinsi.edit', $data->id) }}">Edit</a>
                              <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
