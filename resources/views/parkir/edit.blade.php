@extends('parkir.layouts')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  

    <form action="{{ route('parkir.update', $parkir->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row justify-content-md-center">
             <div class="col-5">
                <div class="form-group">
                    <strong>ID:</strong>
                    <input type="text" name="name" value="{{ $parkir->id }}" class="form-control" placeholder="Name" readonly="">
                </div>

                <div class="form-group">
                    <strong>Plat:</strong>    
                    <input type="text" name="plat_no" class="form-control" value="{{ $parkir->plat_no }}">
                </div>

                <div class="form-group">
                    <strong>Jenis Kendaraan:</strong>    
                    <select class="form-control" name="jenis_kendaraan" value="{{ $parkir->jenis_kendaraan }}">
                        <option>Mobil</option>
                        <option>Motor</option>
                    </select>
                    
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
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary text-light" onclick="history.back(-1)">< Back</a>
            <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </div>
    </form>

@endsection