@section('title')
    Izin Lembur
@endsection
<div>
    @include('livewire.modal.surat-lembur-modal')
    <h1 class="mt-4">Izin Lembur</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Izin Lembur</li>
    </ol>

    <div class="row mb-4">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card card-hover">
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSuratLembur">
                    <div class="card-body px-4 py-4-5 shadow-sm">
                        <div class="row text-center">
                            <div class="col">
                                <h6 class="text-muted">Ajukan Surat Lembur</h6>
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
                    Data Lembur Izin Bulan {{Carbon\Carbon::now()->isoFormat('MMMM')}}
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
                        <input class="form-control shadow-sm " placeholder="Cari data keterangan lembur" wire:model.live="search">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th>
                                Tgl Lembur
                                <span wire:click="sortBy('tgl_lembur')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'tgl_lembur' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'tgl_lembur' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Jam Mulai
                                <span wire:click="sortBy('start_time')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'start_time' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'start_time' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Jam Selesai
                                <span wire:click="sortBy('end_time')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'end_time' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'end_time' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Lama Lembur
                                <span wire:click="sortBy('lama_lembur')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'lama_lembur' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'lama_lembur' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keterangan
                                <span wire:click="sortBy('keterangan_lembur')" style="cursor: pointer; font-size: 10px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keterangan_lembur' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keterangan_lembur' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
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
                        @if($lembur->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data.</td>
                            </tr>
                        @else
                            @foreach ($lembur as $l)
                                @if($l->user_id == Auth::user()->id)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($l->tgl_lembur)->translatedFormat('l, d/m/Y')}}</td>
                                        <td>
                                            {{date('H:i', strtotime($l->start_time)) }}
                                        <td>
                                            {{date('H:i', strtotime($l->end_time)) }}
                                        </td>
                                        <td>
                                            {{date('G', strtotime($l->lama_lembur)) }} Jam
                                        </td>
                                        <td>{{$l->keterangan_lembur}}</td>
                                        <td>
                                            @if(Auth::user()->role_id == 2)
                                                @if($l->status == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess</span>
                                                @elseif($l->status == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved by atasan</span>
                                                    @if($l->status_hrd == 0)
                                                        <span class="badge rounded-pill text-bg-warning">proccess by HRD</span>
                                                    @elseif($l->status_hrd == 1)
                                                        <span class="badge rounded-pill text-bg-success">approved by HRD</span>
                                                    @elseif($l->status_hrd == 2)
                                                        <span class="badge rounded-pill text-bg-danger">rejected by HRD</span>
                                                    @endif
                                                @elseif($l->status == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected by atasan</span>
                                                @endif
                                            @elseif(Auth::user()->role_id == 3)
                                                @if($l->status_hrd == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess</span>
                                                @elseif($l->status_hrd == 1)
                                                    <span class="badge rounded-pill text-bg-success">success</span>
                                                @elseif($l->status_hrd == 2)
                                                    <span class="badge rounded-pill text-bg-danger">failed</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->role_id == 2)
                                                @if($l->status == 0)
                                                    <button type="button"  wire:click='ubahIzinLembur({{$l->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='Ubah'>
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button"  wire:click='cancelIzinLembur({{$l->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Batalkan'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                @endif
                                                @if($l->status_hrd == 1)
                                                    <a href="/cetak-pdf/{{$l->id}}" @if($l->status == 0 || $l->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
                                                @endif
                                            @elseif(Auth::user()->role_id == 3)
                                               @if($l->status_hrd == 0)
                                                    <button type="button"  wire:click='ubahIzinLembur({{$l->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='Ubah'>
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button"  wire:click='cancelIzinLembur({{$l->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Batalkan'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                @endif
                                                @if($l->status_hrd == 1)
                                                    <a href="/cetak-pdf/{{$l->id}}" @if($l->status == 0 || $l->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
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
                    <span>Halaman : {{ $lembur->currentPage() }} </span><br/>
                    <span>Jumlah Data : @if($search == '') {{$total}}  @else {{$lembur->count() }}  @endif</span><br/>
                    <span>Data Per Halaman : {{ $lembur->perPage()}} </span><br/><br/>
                </div>
                <div class="col-12 col-lg-4 d-flex justify-content-end">
                    {{$lembur->links()}}

                </div>
            </div>
        </div>
    </div>
</div>


