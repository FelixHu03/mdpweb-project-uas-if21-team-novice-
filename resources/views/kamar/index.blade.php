@extends('layout.main')
@section('title','List Kamar')
@section('halaman', 'Kamar')
@section('namaHalaman', 'List Kamar')
@section('content')

<div class="card">
  
  @can('create', App\Models\Kamar::class)
  <a href="{{ url('kamar/create') }}" class="btn btn-outline-primary">Tambah</a>
  @endcan
  <div class="card-body">
      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Foto</th>
            <th scope="col">Tipe Kamar</th>
            <th scope="col">Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Confirm</th>
     
          </tr>
        </thead>
        <tbody>
          @foreach ($kamar as $kmr)
          <tr>
            <td><img src="{{ url('foto_kamar/' . $kmr['url_foto']) }}" alt="" style="width: 100px"></td>
            <td>{{ $kmr['tipe_kamar'] }}</td>
            <td>{{ $kmr['harga'] }}</td>
            <td>{{ $kmr['Status'] }}</td>
            <td>
              @can('view', $kmr)
              <a href="{{ route('kamar.show', $kmr['id_kamar']) }}" class="btn btn-outline-info btn-sm btn-rounded">Show</a>
              @endcan
              @can('update', $kmr)
              <a href="{{ route('kamar.edit', $kmr['id_kamar']) }}" class="btn btn-outline-info btn-sm btn-rounded">Edit</a>
              @endcan
              @can('delete', $kmr)
              <form action="{{ route('kamar.destroy', $kmr->id_kamar) }}" method="post" style="display: inline">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm btn-rounded show_confirm"
                      data-toggle="tooltip" data-nama="{{ $kmr['id_kamar'] }}" title="Hapus">Hapus</button>
              </form>
              @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
@endsection
