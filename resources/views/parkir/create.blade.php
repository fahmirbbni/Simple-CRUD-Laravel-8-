@extends('parkir.layouts')

@section('content')

@if ($errors->any())

    <div class="alert alert-danger">
        <strong>terjadi kesalahan!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ URL('parkir') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- menghindari SQL injection dengan penggunaan csrf --}}

     <div class="row justify-content-md-center">
            <div class="col-5">
            <div class="form-group">
                <strong>Plat:</strong>
                <input type="text" name="plat_no" class="form-control">
            </div>

            <div class="form-group">
                <strong>Jenis Kendaraan:</strong>
                <select class="form-control" name="jenis_kendaraan">
                    <option>Mobil</option>
                    <option>Motor</option>
                </select>
            </div>

            <div class="form-group">
                <input type="file" class="form-control" id="inputGroupFile02" name="foto">
            </div>

            <div class="form-group">
                <strong>Biaya Parkir:</strong>
                <select class="form-control" name="biaya">
                    <option>1-2 jam</option>
                    <option>3-4 jam</option>
                    <option>5-6 jam</option>
                    <option>7-8 jam</option>
                    <option>>8 jam</option>
                </select>
            </div>

            <div style="float: right;" class="form-group">
                <a class="btn btn-primary" href="{{ route('parkir.index') }}"> < Back</a>
                <button type="submit" class="btn btn-success text-light">Submit</button>
            </div>
        </div>

</div>
</form>

@endsection