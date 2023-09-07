<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->


<div wire:ignore.self class="modal fade" id="tambahSuratIzin" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="tambahSuratIzin">
                    <div class="container">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="keperluanIzin" class="form-label">Keperluan Izin<span class="text-danger">*</span></label>
                                    <select class="form-select keperluanIzin card-hover" id="keperluanIzin" wire:click='ketIzin()'  wire:model.live='keperluanIzin'  >
                                        <option ></option>
                                        <option value="Izin Datang Terlambat" {{old("keperluanIzin") == "Izin Datang Terlambat" ? "selected":""}}>Izin Datang Terlambat</option>
                                        <option value="Izin Tidak Masuk Kerja" {{old("keperluanIzin") == "Izin Tidak Masuk Kerja" ? "selected":""}}>Izin Tidak Masuk Kerja</option>
                                        <option value="Izin Meninggalkan Kantor" {{old("keperluanIzin") == "Izin Meninggalkan Kantor" ? "selected":""}}>Izin Meninggalkan Kantor</option>
                                        <option value="Tugas Meninggalkan Kantor" {{old("keperluanIzin") == "Tugas Meninggalkan Kantor" ? "selected":""}}>Tugas Meninggalkan Kantor</option>
                                    </select>
                                    <div>
                                        @error('keperluanIzin') 
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_izin" class="form-label">Tanggal Izin<span class="text-danger">*</span></label>
                                    <input type="date" id="tanggal_izin"  name="tanggal_izin" class="form-control card-hover" wire:model.live='tanggal_izin'>
                                    <div>
                                        @error('tanggal_izin') 
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                @if($keperluanIzin == null || $keperluanIzin == 'Izin Meninggalkan Kantor' || $keperluanIzin == 'Tugas Meninggalkan Kantor')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3" id="pilih">
                                                <label for="jam_mulai" class="form-label">Jam Masuk<span class="text-danger ">*</span></label>
                                                <input type="time" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control card-hover" wire:model.live='jam_mulai'>
                                                <div>
                                                    @error('jam_mulai') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc col-lg-6" id="Pilihp">
                                            <div class="mb-3">
                                                <label for="jam_akhir" class="form-label">Jam Keluar<span class="text-danger">*</span></label>
                                                <input type="time" id="jam_akhir" name="jam_akhir" value="{{old('jam_akhir')}}" class="form-control card-hover" wire:model.live='jam_akhir'>
                                                <div>
                                                    @error('jam_akhir') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($keperluanIzin == 'Izin Datang Terlambat')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3" id="pilih">
                                                <label for="jam_mulai" class="form-label">Jam Masuk<span class="text-danger">*</span></label>
                                                <input type="time" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control card-hover" wire:model.live='jam_mulai'>
                                                <div>
                                                    @error('jam_mulai') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="keterangan_izin" class="form-label">Keterangan Izin<span class="text-danger">*</span></label>
                                    <textarea name="keterangan_izin" id="keterangan_izin" cols="30" rows="5" class="form-control card-hover" wire:model.blur='keterangan_izin'></textarea>
                                    @if($errors->has('keterangan_izin'))
                                        <span class="text-danger">{{ $errors->first('keterangan_izin') }}</span>
                                    @endif
                                </div>
                            </div>
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

<div wire:ignore.self class="modal fade" id="ubahSuratIzin" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeSuratIzin()'></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UbahDataSuratIzin">
                    <div class="container">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="keperluanIzin" class="form-label">Keperluan Izin<span class="text-danger">*</span></label>
                                    <select class="form-select keperluanIzin card-hover" id="keperluanIzin" wire:click='ketIzin()'  wire:model.live='keperluanIzin'  >
                                        <option ></option>
                                        <option value="Izin Datang Terlambat" {{old("keperluanIzin") == "Izin Datang Terlambat" ? "selected":""}}>Izin Datang Terlambat</option>
                                        <option value="Izin Tidak Masuk Kerja" {{old("keperluanIzin") == "Izin Tidak Masuk Kerja" ? "selected":""}}>Izin Tidak Masuk Kerja</option>
                                        <option value="Izin Meninggalkan Kantor" {{old("keperluanIzin") == "Izin Meninggalkan Kantor" ? "selected":""}}>Izin Meninggalkan Kantor</option>
                                        <option value="Tugas Meninggalkan Kantor" {{old("keperluanIzin") == "Tugas Meninggalkan Kantor" ? "selected":""}}>Tugas Meninggalkan Kantor</option>
                                    </select>
                                    <div>
                                        @error('keperluanIzin') 
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_izin" class="form-label">Tanggal Izin<span class="text-danger">*</span></label>
                                    <input type="date" id="tanggal_izin"  name="tanggal_izin" class="form-control card-hover" wire:model.live='tanggal_izin'>
                                    <div>
                                        @error('tanggal_izin') 
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                @if($keperluanIzin == null || $keperluanIzin == 'Izin Meninggalkan Kantor' || $keperluanIzin == 'Tugas Meninggalkan Kantor')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3" id="pilih">
                                                <label for="jam_mulai" class="form-label">Jam Masuk<span class="text-danger">*</span></label>
                                                <input type="time" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control card-hover" wire:model.live='jam_mulai'>
                                                <div>
                                                    @error('jam_mulai') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc col-lg-6" id="Pilihp">
                                            <div class="mb-3">
                                                <label for="jam_akhir" class="form-label">Jam Keluar<span class="text-danger">*</span></label>
                                                <input type="time" id="jam_akhir" name="jam_akhir" value="{{old('jam_akhir')}}" class="form-control card-hover" wire:model.live='jam_akhir'>
                                                <div>
                                                    @error('jam_akhir') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($keperluanIzin == 'Izin Datang Terlambat')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3" id="pilih">
                                                <label for="jam_mulai" class="form-label">Jam Masuk<span class="text-danger">*</span></label>
                                                <input type="time" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control card-hover" wire:model.live='jam_akhir'>
                                                <div>
                                                    @error('jam_mulai') 
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="keterangan_izin" class="form-label">Keterangan Izin<span class="text-danger">*</span></label>
                                    <textarea name="keterangan_izin" id="keterangan_izin" cols="30" rows="5" class="form-control card-hover" wire:model.blur='keterangan_izin'></textarea>
                                    @if($errors->has('keterangan_izin'))
                                        <span class="text-danger">{{ $errors->first('keterangan_izin') }}</span>
                                    @endif
                                </div>
                            </div>
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
                <h6>Apakah anda yakin ingin membatalkan surat izin ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" wire:click='destroySuratIzin()'>Iya! Batalkan</button>
            </div>
        </div>
    </div>
</div>




{{-- <div wire:ignore.self  class="modal fade" id="tambahSuratIzin" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeTambahDataModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="tambahSuratIzin">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="keperluanIzin" class="form-label">Keperluan Izin</label>
                                    <select class="form-select keperluanIzin" id="keperluanIzin" name="keperluanIzin">
                                        <option ></option>
                                        <option value="Izin Datang Terlambat" {{old("keperluanIzin") == "Izin Datang Terlambat" ? "selected":""}}>Izin Datang Terlambat</option>
                                        <option value="Izin Tidak Masuk Kerja" {{old("keperluanIzin") == "Izin Tidak Masuk Kerja" ? "selected":""}}>Izin Tidak Masuk Kerja</option>
                                        <option value="Izin Meninggalkan Kantor" {{old("keperluanIzin") == "Izin Meninggalkan Kantor" ? "selected":""}}>Izin Meninggalkan Kantor</option>
                                        <option value="Tugas Meninggalkan Kantor" {{old("keperluanIzin") == "Tugas Meninggalkan Kantor" ? "selected":""}}>Tugas Meninggalkan Kantor</option>
                                    </select>
                                    <div>
                                        @error('keperluanIzin') 
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_izin" class="form-label">Tanggal Izin</label>
                                    <input type="date" id="tanggal_izin" value="{{old('tanggal_izin')}}" name="tanggal_izin" class="form-control">
                                    @if($errors->has('tanggal_izin'))
                                        <span class="text-danger">{{ $errors->first('tanggal_izin') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3" id="pilih">
                                            <label for="jam_mulai" class="form-label">Jam Masuk</label>
                                            <input type="time" name="jam_mulai" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control">
                                            @if($errors->has('jam_mulai'))
                                                <span class="text-danger">{{ $errors->first('jam_mulai') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="desc col-lg-6" id="Pilihp">
                                        <div class="mb-3">
                                            <label for="jam_akhir" class="form-label">Jam Keluar</label>
                                            <input type="time" id="jam_akhir" name="jam_akhir" value="{{old('jam_akhir')}}" class="form-control">
                                            @if($errors->has('jam_akhir'))
                                                <span class="text-danger">{{ $errors->first('jam_akhir') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_izin" class="form-label">Keterangan Izin</label>
                                    <textarea name="keterangan_izin" id="keterangan_izin" cols="30" rows="5" class="form-control">{{old('keterangan_izin')}}</textarea>
                                    @if($errors->has('keterangan_izin'))
                                        <span class="text-danger">{{ $errors->first('keterangan_izin') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary form-control"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>

                        </div>
                    </form>
            </div>
        </div>
    </div>
</div> --}}



@push('suratIzinRadio')
    
    <script>
        $('#keperluanIzin').on('change', function() {
            var data = $( "#keperluanIzin option:selected" ).val();
            console.log(data);
            if(data == 'Izin Datang Terlambat') {
                $("#pilih").show();
                $("#Pilihp").hide();
            } else if(data == 'Izin Tidak Masuk Kerja') {
                $("#pilih").hide();
                $("#Pilihp").hide();
            } else if(data == 'Izin Meninggalkan Kantor') {
                $("#pilih").show();
                $("#Pilihp").show();
            } else if(data == 'Tugas Meninggalkan Kantor') {
                $("#pilih").show();
                $("#Pilihp").show();
            } else {
                $("#pilih").show();
                $("#Pilihp").show();
            }
        });

        window.addEventListener('close-modal', event =>{
            $('#tambahSuratIzin').modal('hide');
        });
        window.addEventListener('show-confirm-cancel', event =>{
            $('#confirmCancel').modal('show');
        });
        window.addEventListener('show-ubah-modal', event =>{
            $('#ubahSuratIzin').modal('show');
        });
    </script>
@endpush