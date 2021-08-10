@extends('parkir.layouts')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Detail</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>ID:<br></strong>
                <h5>{{ $parkir->id }}</h5>
            </div>
            <div class="form-group">
                <strong>Foto:</strong><br>
                <img src="{{url ('gambar/'.$parkir->foto)}}" width="250px">
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <strong>Plat:</strong>
                <h5>{{ $parkir->plat_no }}</h5>
            </div>
            <div class="form-group">
                <strong>Jenis Kendaraan:</strong>
                <h5>{{ $parkir->jenis_kendaraan }}</h5>
            </div>
            <div class="form-group">
                <strong>Jam Parkir:</strong>
                <h5>{{ $parkir->created_at }}</h5>
            </div>
            <div class="form-group">
                <strong>Biaya:</strong>
                @switch($parkir->id)
                    @case($parkir->biaya === '1-2 jam')
                        <h5>Rp. 4.000</h5>
                        @break
                    @case($parkir->biaya === '3-4 jam')
                        <h5>Rp. 6.000</h5>
                        @break
                    @case($parkir->biaya === '5-6 jam')
                        <h5>Rp. 8.000</h5>
                        @break
                    @case($parkir->biaya === '7-8 jam')
                        <h5>Rp. 10.000</h5>
                        @break
                    @case($parkir->biaya === '>8 jam')
                        <h5>Rp. 30.000</h5>
                        @break
                    @default
                    <h5>-</h5>
                @endswitch
            </div>
        </div>
    </div>

    <div style="float: left;">
        <a class="btn btn-primary" href="{{ route('parkir.index') }}"> < Back</a>
    </div>
    <div style="float: right;">
    <form action="{{ route('parkir.destroy',$parkir->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <a class="btn btn-success" href="{{ route('parkir.edit',$parkir->id) }}">Edit</a>
        <button type="submit" class="btn btn-danger"> Delete</button>
        <a class="btn btn-warning" href="{{$parkir->id}}/cetak" target="_blank" >Cetak</a>

    </form>
    </div>
@endsection