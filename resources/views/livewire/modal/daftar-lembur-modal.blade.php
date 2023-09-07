<div wire:ignore.self class="modal fade" id="approved" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Approved Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin menyetujui surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-primary" wire:click='approveSuratIzinAtasan()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="detail" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Informasi Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>{{ $nama_user }}</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-primary" wire:click='approveSuratIzinAtasan()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="reject" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Reject Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin menolak surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-danger" wire:click='rejectSuratIzinAtasan()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="reset" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Reset Data Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin reset surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-success" wire:click='resetSuratIzinAtasan()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="approvedHRD" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Approved Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin menyetujui surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-primary" wire:click='approveSuratIzinHRD()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="rejectHRD" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Reject Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin menolak surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-danger" wire:click='rejectSuratIzinHRD()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="resetHRD" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Reset Data Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin reset surat lembur ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-success" wire:click='resetSuratIzinHRD()'>Iya! Setuju</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="detailHRD" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Detail Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCanceDaftarlIzinCuti()'></button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">{{ $nama_user }}</h5>
                <hr>
                <table class="table table-bordered table-striped table-hover bg-body-tertiary rounded shadow-sm ">
                    <tbody>
                        <tr>
                            <th class="col-5">Tanggal Lembur </th>
                            <td>{{Carbon\Carbon::parse($tgl_lembur)->translatedFormat('l, d/m/Y')}}</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Jam Mulai</th>
                            <td>{{date('H:i', strtotime($start_time))}}</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Jam Selesai</th>
                            <td>{{date('H:i', strtotime($end_time))}}</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Lama lembur</th>
                            <td>{{date('G', strtotime($lama_lembur))}} jam</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Upah Makan</th>
                            <td>@rupiah($uang_makan)</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Upah Lembur Perjam</th>
                            <td>@rupiah($upah_lembur_perjam)</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Upah Lembur</th>
                            <td>@rupiah($upah_lembur)</td>
                        </tr>
                        <tr>
                            <th class="col-auto">Keterangan Lembur</th>
                            <td>{{$keterangan_lembur}}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal" wire:click='closeCanceDaftarlIzinCuti()'>Keluar</button>
            </div>
        </div>
    </div>
</div>


@push('daftar-surat-izin')
    <script>
        window.addEventListener('show-approved-modal', event =>{
            $('#approved').modal('show');
        });
        window.addEventListener('show-reject-modal', event =>{
            $('#reject').modal('show');
        });
        window.addEventListener('show-reset-modal', event =>{
            $('#reset').modal('show');
        });
        window.addEventListener('show-detail-modal', event =>{
            $('#reset').modal('show');
        });
    </script>
    <script>
        window.addEventListener('show-approved-hrd-modal', event =>{
            $('#approvedHRD').modal('show');
        });
        window.addEventListener('show-reject-hrd-modal', event =>{
            $('#rejectHRD').modal('show');
        });
        window.addEventListener('show-reset-hrd-modal', event =>{
            $('#resetHRD').modal('show');
        });
        window.addEventListener('show-detail-hrd-modal', event =>{
            $('#detailHRD').modal('show');
        });
    </script>
@endpush