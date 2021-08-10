@extends('parkir.layouts')

@section('content')
<form class="form-inline mr-auto" action="{{ route('search') }}" method="GET" role="search">
    
    <select class="form-control col-3 bg-light mr-3" aria-label=".form-select-lg example">
        <option selected>List Kendaraan</option>
        <option value="jenis_kendaraan">Motor</option>
        <option value="jenis_kendaraan">Mobil</option>
    </select>
    <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="search">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
        <div class="search-result">
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif
    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>plat</th>
            <th>Jenis Kendaraan</th>
            <th>Jam Masuk</th>
            <th width="280px">Action</th>
        </tr>

        {{-- <?php $no=1; ?> --}}
        @foreach ($parkir as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->plat_no }}</td>
            <td>{{ $data->jenis_kendaraan }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('parkir.show',$data->id) }}">Detail</a>
            </td>
        </tr>

        @endforeach

    </table>
      
@endsection