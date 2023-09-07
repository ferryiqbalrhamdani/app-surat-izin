@section('title')
    Surat Izin
@endsection
<div>
    @include('livewire.modal.surat-izin-modal')
    <h1 class="mt-4">Surat Izin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Surat Izin</li>
    </ol>

    <div class="row mb-4">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card card-hover">
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSuratIzin">
                    <div class="card-body px-4 py-4-5 shadow-sm">
                        <div class="row text-center">
                            <div class="col">
                                <h6 class="text-muted">Ajukan Surat Izin</h6>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>        
    </div>
    <div class="card mb-4 shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <i class="fas fa-table me-1"></i>
                    Data Surat Izin Bulan {{Carbon\Carbon::now()->isoFormat('MMMM')}}
                </div>
                <div class="col d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a href="/cetak-pdf" target="_blank" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-file-pdf"></i> Download data bulan ini
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2 col-lg-1">
                    <div class="mb-3">
                        <select class="form-select form-select card-hover" aria-label="Small select example" wire:model.live='perPage'>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-8"></div>
                <div class="col-12 col-lg-3">
                    <div class="mb-3 card-hover">
                        <input class="form-control shadow-sm" placeholder="Cari data keperluan izin" wire:model.live="search">
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th>
                                Tgl Izin 
                                <span wire:click="sortBy('tanggal_izin')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'tanggal_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'tanggal_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>Dari Jam 
                                <span wire:click="sortBy('jam_mulai')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'jam_mulai' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'jam_mulai' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Sampai Jam
                                <span wire:click="sortBy('jam_akhir')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'jam_akhir' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'jam_akhir' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keperluan Izin
                                <span wire:click="sortBy('keperluan_izin')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keperluan_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keperluan_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keterangan
                                <span wire:click="sortBy('keterangan_izin')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keterangan_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keterangan_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Status
                                 <span wire:click="sortBy('status')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'status' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'status' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if ($suratIzin->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data.</td>
                            </tr>
                        @else
                            @foreach ($suratIzin as $s)
                                @if ($s->username_user == Auth::user()->username)
                                    <tr>
                                        <td>{{date('m/d/Y', strtotime($s->tanggal_izin)) }}</td>
                                        <td>
                                            @if($s->jam_mulai != null)
                                                {{date('H:i', strtotime($s->jam_mulai)) }}
                                            @else 
                                                -
                                            @endif</td>
                                        <td>
                                            @if($s->jam_akhir != null)
                                                {{date('H:i', strtotime($s->jam_akhir)) }}
                                            @else 
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{$s->keperluan_izin }}    
                                        </td>
                                        <td>{{$s->keterangan_izin}}</td>
                                        <td>
                                            @if(Auth::user()->role_id == 2)
                                                @if($s->status == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess</span>
                                                @elseif($s->status == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved by atasan</span>
                                                    @if($s->status_hrd == 0)
                                                        <span class="badge rounded-pill text-bg-warning">proccess by HRD</span>
                                                    @elseif($s->status_hrd == 1)
                                                        <span class="badge rounded-pill text-bg-success">approved by HRD</span>
                                                    @elseif($s->status_hrd == 2)
                                                        <span class="badge rounded-pill text-bg-danger">rejected by HRD</span>
                                                    @endif
                                                @elseif($s->status == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected by atasan</span>
                                                @endif
                                            @elseif(Auth::user()->role_id == 3)
                                                @if($s->status_hrd == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess</span>
                                                @elseif($s->status_hrd == 1)
                                                    <span class="badge rounded-pill text-bg-success">success</span>
                                                @elseif($s->status_hrd == 2)
                                                    <span class="badge rounded-pill text-bg-danger">failed</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->role_id == 2)
                                                @if($s->status == 0)
                                                    <button type="button"  wire:click='ubahSuratIzin({{$s->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='Ubah'>
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button"  wire:click='cancelSuratIzin({{$s->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Batalkan'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                    
                                                @endif
                                                @if($s->status_hrd == 1)
                                                    <a href="/cetak-pdf/{{$s->id}}" @if($s->status == 0 || $s->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
                                                @endif
                                            @elseif(Auth::user()->role_id == 3)
                                                @if($s->status_hrd == 0)
                                                    <button type="button"  wire:click='cancelSuratIzin({{$s->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Batalkan'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                @endif
                                                @if($s->status_hrd == 1)
                                                    <a href="/cetak-pdf/{{$s->id}}" @if($s->status_hrd == 0 || $s->status_hrd == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success" data-toggle="tooltip" title='Download PDF'><i class="fa-solid fa-download"></i> Download</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>

                
            </div>
            
            <div class="row">
                <div class="col-12 col-lg-8">
                    <span>Halaman : {{ $suratIzin->currentPage() }} </span><br/>
                    <span>Jumlah Data : @if($search == '') {{$total}}  @else {{$suratIzin->count() }}  @endif</span><br/>
                    <span>Data Per Halaman : {{ $suratIzin->perPage()}} </span><br/><br/>
                </div>
                <div class="col-12 col-lg-4 d-flex justify-content-end">
                    {{$suratIzin->links()}}

                </div>
            </div>
        </div>
    </div>
</div>


