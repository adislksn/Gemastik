@extends('layouts.app')

@section('title', 'Lihat Laporan')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Lihat Laporan {{$pelaporan->nama_company}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status Proyek</label>
                                @if ($pelaporan->status == 1)
                                    <input name="status" class="form-control" id="status"value="Belum Diperbaiki" disabled>
                                @elseif ($pelaporan->status == 2)
                                    <input name="status" class="form-control" id="status"value="Proses Perbaikan" disabled>
                                @elseif ($pelaporan->status == 3)
                                    <input name="status" class="form-control" id="status"value="Sudah Diperbaiki" disabled>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_lokasi">Nama Lokasi</label>
                                <input name="nama_lokasi" class="form-control" id="nama_lokasi" placeholder="{{ $pelaporan->nama_lokasi }}" value="{{ $pelaporan->nama_lokasi }}"
                                disabled>
                            </div>
                            <div class="form-group">
                                <label for="password">Nama Perusahaan</label>
                                <input name="nama_company" type="nama_company" class="form-control" id="nama_company" value="{{ $pelaporan->nama_company }}"
                                placeholder="{{ $pelaporan->nama_company }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Panjang Perbaikan</label>
                                <input name="panjang_perbaikan" type="text" class="form-control" id="panjang_perbaikan" value="{{ $pelaporan->panjang_perbaikan }} Meter"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Lebar Perbaikan</label>
                                <input name="lebar_perbaikan" type="text" class="form-control" id="lebar_perbaikan" value="{{ $pelaporan->lebar_perbaikan }} Meter"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama">Longitude dan Latitude</label>
                                <div class="input-group">
                                    <input name="longitude" class="form-control" id="longitude" value="{{ $pelaporan->longitude}},{{ $pelaporan->latitude }}"
                                        disabled>
                                    <span class="input-group-text">
                                        <a class="text-decoration-none text-white" href="https://maps.google.com/?q={{ $pelaporan->longitude }},{{ $pelaporan->latitude }}" target="_blank">
                                            <i class="fa-solid fa-map-location-dot px-1">
                                            </i> 
                                            Cek Peta
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_end">Tanggal Mulai</label>
                                <input type="datetime" name="tgl_start" class="form-control" id="tgl_start" placeholder="{{ $pelaporan->tgl_start}}" value="{{ $pelaporan->tgl_start}}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="tgl_end">Tanggal Selesai</label>
                                <input type="datetime" name="tgl_end" class="form-control" id="tgl_end" value="@if ($pelaporan->tgl_end==null) Belum Selesai @else {{ $pelaporan->tgl_end}} @endif"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="foto">Foto</label>
                                    <a class="text-decoration-none" role="button" data-toggle="modal" data-target="#image-{{ $pelaporan->id }}">
                                        <img name="foto" style="max-width: 150px; max-height: 150px; object-fit: contain;" src="{{asset('storage/images/'.$pelaporan->foto)}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    {{-- Modal Image --}}
                    <div id="image-{{ $pelaporan->id }}" class="modal fade" tabindex="-1"
                        role="dialog" aria-hidden="true">
                        <div class="modal-dialog bd-danger">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        <strong>Lihat Foto Laporan</strong>
                                    </h5>
                                </div>
                                <div class="modal-body justify-content-center d-flex">
                                    <img style="max-width: 500px; max-height: 500px; object-fit: contain;" class="px-3" src="{{asset('storage/images/'.$pelaporan->foto)}}" alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
