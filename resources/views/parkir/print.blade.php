
@foreach ($parkir as $parkir)
    
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Terima kasih sudah parkir :)</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <strong>ID:<br></strong>
            <h5>{{ $parkir->id }}</h5>
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
@endforeach
