@section('title')
    Izin Cuti
@endsection
<div>
    @include('livewire.modal.surat-cuti-modal')
    <h1 class="mt-4">Izin Cuti</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Izin Cuti</li>
    </ol>

    <div class="row mb-4">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card card-hover">
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSuratCuti">
                    <div class="card-body px-4 py-4-5 shadow-sm">
                        <div class="row text-center">
                            <div class="col">
                                <h6 class="text-muted">Ajukan Surat Cuti</h6>
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
                    Data Izin Cuti Bulan {{Carbon\Carbon::now()->isoFormat('MMMM')}}
                </div>
                <div class="col d-flex justify-content-end">
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
                    <div class="mb-3 shadow-sm ">
                        <input type="text" class="form-control card-hover" placeholder="cari data keperluan cuti" wire:model.live='search'>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th>
                                Dari Tanggal
                                <span wire:click.prevent="sortBy('start_date')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'start_date' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'start_date' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Sampai Tanggal
                                <span wire:click.prevent="sortBy('end_date')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'end_date' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'end_date' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Lama Cuti
                                <span wire:click.prevent="sortBy('lama_cuti')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'lama_cuti' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'lama_cuti' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keperluan Cuti
                                <span wire:click.prevent="sortBy('keperluan_cuti')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keperluan_cuti' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keperluan_cuti' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keterangan
                                <span wire:click.prevent="sortBy('keterangan_cuti')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keterangan_cuti' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keterangan_cuti' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($izinCuti->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data.</td>
                            </tr>
                        @else 
                            @foreach ($izinCuti as $i)
                                @if($i->user_id == Auth::user()->id)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($i->start_date)->translatedFormat('l, d/m/Y')}}</td>
                                    <td>{{ Carbon\Carbon::parse($i->end_date)->translatedFormat('l, d/m/Y')}}</td>
                                    <td wire:key="{{ $i->lama_cuti }}">{{$i->lama_cuti}}</td>
                                    <td>{{$i->keperluan_cuti}}</td>
                                    <td>{{$i->keterangan_cuti}}</td>
                                    <td>
                                        @if(Auth::user()->role_id == 2)
                                            @if($i->status == 0)
                                                <span class="badge rounded-pill text-bg-warning">proccess</span>
                                            @elseif($i->status == 1)
                                                <span class="badge rounded-pill text-bg-success">approved by atasan</span>
                                                @if($i->status_hrd == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess by HRD</span>
                                                @elseif($i->status_hrd == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved by HRD</span>
                                                @elseif($i->status_hrd == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected by HRD</span>
                                                @endif
                                            @elseif($i->status == 2)
                                                <span class="badge rounded-pill text-bg-danger">rejected by atasan</span>
                                            @endif
                                        @elseif(Auth::user()->role_id == 3)
                                            @if($i->status_hrd == 0)
                                                <span class="badge rounded-pill text-bg-warning">proccess</span>
                                            @elseif($i->status_hrd == 1)
                                                <span class="badge rounded-pill text-bg-success">success</span>
                                            @elseif($i->status_hrd == 2)
                                                <span class="badge rounded-pill text-bg-danger">failed</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->role_id == 2)
                                            @if($i->status == 0)
                                                <button type="button"  wire:click='ubahIzinCuti({{$i->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='Ubah'>
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                                <button type="button"  wire:click='cancelIzinCuti({{$i->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Batalkan'>
                                                    <i class="fa-solid fa-arrow-rotate-left"></i>
                                                </button>
                                            @endif
                                            @if($i->status_hrd == 1)
                                                <a href="/cetak-pdf/{{$i->id}}" @if($i->status == 0 || $i->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
                                            @endif
                                        @elseif(Auth::user()->role_id == 3)
                                            @if($i->status_hrd == 0)
                                                <button type="submit" wire:click='cancelIzinCuti({{$i->id}})'  class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Unsend'>
                                                    <i class="fa-solid fa-arrow-rotate-left"></i> Cancel
                                                </button>
                                            @endif
                                            @if($i->status_hrd == 1)
                                                <a href="/cetak-pdf/{{$i->id}}" @if($i->status_hrd == 0 || $i->status_hrd == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success" data-toggle="tooltip" title='Download PDF'><i class="fa-solid fa-download"></i> download</a>
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
                <div class="col-12 col-lg-6">
                    <span>Halaman : {{ $izinCuti->currentPage() }} </span><br/>
                    <span>Jumlah Data : @if($search == '') {{$total}}  @else {{$izinCuti->count() }}  @endif</span><br/>
                    <span>Data Per Halaman : {{ $izinCuti->perPage()}} </span><br/><br/>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-end">
                    {{$izinCuti->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
