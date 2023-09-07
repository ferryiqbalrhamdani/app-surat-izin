<div wire:ignore.self class="modal fade" id="tambahSuratLembur" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='tambahDataLembur'>
                    <div class="container">
                        <div class="mb-3">
                            <label for="tgl_lembur" class="form-label">Tanggal lembur<span class="text-danger">*</span></label>
                            <input type="date" wire:model.live='tgl_lembur' id="tgl_lembur" class="form-control card-hover">
                            @if($errors->has('tgl_lembur'))
                                <span class="text-danger">{{ $errors->first('tgl_lembur') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Jam Mulai<span class="text-danger">*</span></label>
                                    <input type="time" wire:model.live='start_time'  id="start_time" value="18:00" class="form-control card-hover">
                                    @if($errors->has('start_time'))
                                        <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 text-center mt-5" >
                                <div class="mb-3" style="margin-top: -7px;">
                                    <span class="text-center">
                                        <i class="fa fa-arrow-right text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">Jam Selesai<span class="text-danger">*</span></label>
                                    <input type="time" wire:model.live='end_time'  id="end_time" value="19:00" class="form-control card-hover">
                                    @if($errors->has('end_time'))
                                        <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_lembur" class="form-label">Keterangan Lembur<span class="text-danger">*</span></label>
                            <textarea wire:model.blur='keterangan_lembur'  id="keterangan_lembur" cols="30" rows="5" class="form-control card-hover">{{old('keterangan_lembur')}}</textarea>
                            @if($errors->has('keterangan_lembur'))
                                <span class="text-danger">{{ $errors->first('keterangan_lembur') }}</span>
                            @endif
                        </div>
                        <hr>
                        <br>
                        <div class="mb-3">
                            <button type="submit" class="form-control btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ubahSuratLembur" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='ubahDataLembur'>
                    <div class="container">
                        <div class="mb-3">
                            <label for="tgl_lembur" class="form-label">Tanggal lembur</label>
                            <input type="date" wire:model.live='tgl_lembur' id="tgl_lembur" class="form-control card-hover">
                            @if($errors->has('tgl_lembur'))
                                <span class="text-danger">{{ $errors->first('tgl_lembur') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Jam Mulai</label>
                                    <input type="time" wire:model.live='start_time'  id="start_time" value="18:00" class="form-control card-hover">
                                    @if($errors->has('start_time'))
                                        <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 text-center mt-5" >
                                <div class="mb-3" style="margin-top: -7px;">
                                    <span class="text-center">
                                        <i class="fa fa-arrow-right text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">Jam Selesai</label>
                                    <input type="time" wire:model.live='end_time'  id="end_time" value="19:00" class="form-control card-hover">
                                    @if($errors->has('end_time'))
                                        <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_lembur" class="form-label">Keterangan Lembur</label>
                            <textarea wire:model.blur='keterangan_lembur'  id="keterangan_lembur" cols="30" rows="5" class="form-control card-hover">{{old('keterangan_lembur')}}</textarea>
                            @if($errors->has('keterangan_lembur'))
                                <span class="text-danger">{{ $errors->first('keterangan_lembur') }}</span>
                            @endif
                        </div>
                        <hr>
                        <br>
                        <div class="mb-3">
                            <button type="submit" class="form-control btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="confirmCancel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Batalkan Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin membatalkan surat cuti ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" wire:click='destroySuratLembur()'>Iya! Batalkan</button>
            </div>
        </div>
    </div>
</div>


@push('modalLembur')
    <script>
        window.addEventListener('show-ubah-modal', event =>{
            $('#ubahSuratLembur').modal('show');
        });
        window.addEventListener('show-confirm-modal', event =>{
            $('#confirmCancel').modal('show');
        });
    </script>
@endpush