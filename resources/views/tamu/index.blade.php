@extends('layout.main')
@section('title','List Tamu')
@section('halaman', 'Tamu')
@section('namaHalaman', 'Tamu')
@section('content')

<div class="card">
  @can('create', App\Models\Tamu::class)
  <a href="{{ url('tamu/create') }}"  class="btn btn-outline-primary">Tambah</a>
  @endcan
  <div class="card-body">

      <!-- Default Table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id Tamu</th>
            <th scope="col">Nama</th>
            <th scope="col">Confirm</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tamu as $tm)
              
          <tr>
            <td>{{ $tm['id_tamu'] }}</td>
            <td>{{ $tm['nama'] }}</td>
            {{-- <td>{{ $tm ['create_at'] }}</td> --}}
            <td>
              @can('view', $tm)
              <a href="{{ route('tamu.show', $tm['id_tamu']) }}"
              class="btn btn-outline-info btn-sm btn-rounded"> Show</a>
              @endcan
              @can('update', $tm)
          <a href="{{ route('tamu.edit', $tm['id_tamu']) }}"
              class="btn btn-outline-info btn-sm btn-rounded">Ubah</a>
              @endcan
              @can('delete', $tm)
          <form action="{{ route('tamu.destroy', $tm->id_tamu) }}" method="post" style="display: inline">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm btn-rounded show_confirm"
                  data-toggle="tooltip" data-nama="{{ $tm['nama'] }}"
                  title="Hapus" >Hapus</button>
          </form>
          @endcan
      </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $tamu->links()}}
    </div>
      <!-- End Default Table Example -->
    </div>
  </div>
@endsection