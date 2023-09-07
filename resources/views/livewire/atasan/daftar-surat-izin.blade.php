@section('title')
    Daftar Surat Izin
@endsection

<div>
    @include('livewire.modal.daftar-surat-izin-modal')
    <h1 class="mt-4">Daftar Surat Izin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Surat Izin</li>
    </ol>

    <div class="row mb-4">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card rounded card-hover">
                <a href="" style="text-decoration: none" class="bg-primary" >
                    <div class="card-body px-4 py-4-5 shadow-sm">
                        <div class="row text-center">
                            <div class="col">
                                <h6 class="text-light">Jumlah Surat Izin {{$countSuratIzinAll}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
                @foreach ($suratIzin as $s)
                    @if(Auth::user()->role_id == 3)
                        @if($s->status == 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{$countSuratIzin}} 
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        @endif 
                    @elseif(Auth::user()->role_id == 4)
                        @if($s->status_hrd == 0)
                            @if($countSuratIzinHRD)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{$countSuratIzinHRD}} 
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif
                        @endif 
                    @endif
                @endforeach
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
                                Nama
                                <span wire:click.prevent="sortBy('nama_user')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'nama_user' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'nama_user' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Tgl Izin
                                <span wire:click.prevent="sortBy('tanggal_izin')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'tanggal_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'tanggal_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Dari Jam
                                <span wire:click.prevent="sortBy('jam_mulai')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'jam_mulai' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'jam_mulai' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Sampai Jam
                                <span wire:click.prevent="sortBy('jam_akhir')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'jam_akhir' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'jam_akhir' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keperluan Izin
                                <span wire:click.prevent="sortBy('keperluan_izin')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keperluan_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keperluan_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Keterangan
                                <span wire:click.prevent="sortBy('keterangan_izin')" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up {{$sortField === 'keterangan_izin' && $sortDirection === 'asc' ? '' : 'text-muted'}} "></i>
                                    <i class="fa fa-arrow-down {{$sortField === 'keterangan_izin' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                </span>
                            </th>
                            <th>
                                Status
                                <span wire:click.prevent="@if(Auth::user()->role_id == 3) sortBy('status') @elseif(Auth::user()->role_id == 4) sortBy('status_hrd') @endif" style="cursor: pointer; font-size: 12px" class="float-end">
                                    <i class="fa fa-arrow-up @if(Auth::user()->role_id == 3) {{$sortField ===  'status' && $sortDirection === 'asc' ? '' : 'text-muted'}} @elseif(Auth::user()->role_id == 4) {{$sortField ===  'status_hrd' && $sortDirection === 'asc' ? '' : 'text-muted'}} @endif"></i>
                                    <i class="fa fa-arrow-down @if(Auth::user()->role_id == 3) {{$sortField ===  'status' && $sortDirection === 'desc' ? '' : 'text-muted'}} @elseif(Auth::user()->role_id == 4) {{$sortField ===  'status_hrd' && $sortDirection === 'desc' ? '' : 'text-muted'}} @endif"></i>
                                </span>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($suratIzin->count() == 0)
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data.</td>
                            </tr>
                        @else
                            @if(Auth::user()->role_id == 3)
                                @foreach ($suratIzin as $s)
                                    <tr>
                                        <td>{{$s->nama_user }}</td>
                                        <td>{{date('d/m/Y', strtotime($s->tanggal_izin)) }}</td>
                                        <td>
                                            @if($s->jam_mulai != null)
                                                {{date('H:i', strtotime($s->jam_mulai)) }}
                                            @else 
                                                -
                                            @endif</td>    
                                        </td>
                                        <td>
                                            @if($s->jam_akhir != null)
                                                {{date('H:i', strtotime($s->jam_akhir)) }}
                                            @else 
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{$s->keperluan_izin}}     
                                        </td>
                                        <td>{{$s->keterangan_izin}}</td>
                                        <td>
                                            
                                                    @if($s->status == 0)
                                                    <span class="badge rounded-pill text-bg-warning">proccess</span>
                                                @elseif($s->status == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved</span>
                                                    @if($s->status_hrd == 0)
                                                        <span class="badge rounded-pill text-bg-warning">proccess by HRD</span>
                                                    @elseif($s->status_hrd == 1)
                                                        <span class="badge rounded-pill text-bg-success">approved by HRD</span>
                                                    @elseif($s->status_hrd == 2)
                                                        <span class="badge rounded-pill text-bg-danger">rejected by HRD</span>
                                                    @endif
                                                @elseif($s->status == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected</span>
                                                @endif
                                        </td>
                                        <td>
                                            @if($s->status == 0)
                                                <button type="button"  wire:click='approved({{$s->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='approved'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                    </svg>
                                                </button>
                                                <button type="submit" wire:click='reject({{$s->id}})' class="btn btn-sm btn-danger" data-toggle="tooltip" title='reject'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            @else
                                                @if($s->status_hrd == 0)
                                                    <button type="submit" wire:click='resetData({{$s->id}})' class="btn btn-sm btn-success"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                                                @else 
                                                    <button type="submit" disabled class="btn btn-sm btn-success"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(Auth::user()->role_id == 4)
                                @foreach ($suratIzinHRD as $sh)
                                    <tr>
                                        <td>{{$sh->nama_user }}</td>
                                        <td>{{date('d/m/Y', strtotime($sh->tanggal_izin)) }}</td>
                                        <td>
                                            @if($sh->jam_mulai != null)
                                                {{date('H:i', strtotime($sh->jam_mulai)) }}
                                            @else 
                                                -
                                            @endif</td>    
                                        </td>
                                        <td>
                                            @if($sh->jam_akhir != null)
                                                {{date('H:i', strtotime($sh->jam_akhir)) }}
                                            @else 
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{$sh->keperluan_izin}}     
                                        </td>
                                        <td>{{$sh->keterangan_izin}}</td>
                                        <td>
                                            
                                                @if($sh->status_hrd == 0)
                                                    <span class="badge rounded-pill text-bg-warning">pending</span>
                                                @elseif($sh->status_hrd == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved</span>
                                                @elseif($sh->status_hrd == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected</span>
                                            
                                            @endif
                                        </td>
                                        <td>
                                            @if($sh->status_hrd == 0)
                                                <button type="button"  wire:click='approveHRD({{$sh->id}})'  class="btn  btn-primary btn-sm btn-flat " data-toggle="tooltip" title='approved'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                    </svg>
                                                </button>
                                                <button type="submit" wire:click='rejectHRD({{$sh->id}})' class="btn btn-sm btn-danger" data-toggle="tooltip" title='reject'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            @else
                                                <button type="submit" wire:click='resetDataHRD({{$sh->id}})' class="btn btn-sm btn-success"><i class="fa-solid fa-rotate-right"></i> Reset</button>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
            @if(Auth::user()->role_id == 3)
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <span>Halaman : {{ $suratIzin->currentPage() }} </span><br/>
                        <span>Jumlah Data : @if($search == '') {{$countAllSuratIzin}}   @else {{$suratIzin->count() }}  @endif</span><br/>
                        <span>Data Per Halaman : {{ $suratIzin->perPage()}} </span><br/><br/>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-end">
                        {{$suratIzin->links()}}
                    </div>
                </div>
            @elseif(Auth::user()->role_id == 4)
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <span>Halaman : {{ $suratIzinHRD->currentPage() }} </span><br/>
                        <span>Jumlah Data : @if($search == '') {{$totalHRD}}   @else {{$suratIzinHRD->count() }}  @endif</span><br/>
                        <span>Data Per Halaman : {{ $suratIzinHRD->perPage()}} </span><br/><br/>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-end">
                        {{$suratIzinHRD->links()}}
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</div>
