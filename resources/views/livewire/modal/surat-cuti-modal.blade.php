<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->


<div wire:ignore.self class="modal fade" id="tambahSuratCuti" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card-body">
                        <div class="container">
                            <form wire:submit.prevent='tambahSuratCuti'>
                                <div class="mb-3">
                                    <label for="keperluanCuti" class="form-label">Keperluan Cuti<span class="text-danger">*</span></label>
                                    <select class="form-select keperluanCuti card-hover" id="keperluanCuti" wire:model.live='keperluanCuti' >
                                        <option ></option>
                                        <option value="Cuti Pribadi" >Cuti Pribadi</option>
                                        <option value="Cuti Khusus" >Cuti Khusus</option>
                                    </select>
                                    @error('keperluanCuti') 
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($keperluanCuti == 'Cuti Khusus')
                                    <div class="mb-3">
                                    
                                        <label for="pilihan" class="form-label">Pilihan<span class="text-danger">*</span></label>
                                        <select name="pilih" id="pilih" class="form-select card-hover" wire:model.live='pilihan'>
                                            <option ></option>
                                            <option value="Bencana Alam">Bencana Alam</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Keluarga Inti">Keluarga Inti</option>
                                            @if(Auth::user()->jk == 'L')
                                                <option value="Istri Melahirkan">Istri Melahirkan</option>
                                            @elseif(Auth::user()->jk == 'P')
                                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                            @endif
                                        </select>
                                        @error('pilihan') 
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    @if($pilihan == 'Cuti Melahirkan')
                                        <div id="lamaCuti">
                                            <div class="mb-3">
                                                <label  class="form-label">Mulai Cuti<span class="text-danger">*</span></label>
                                                <input type="date"  id="date1" wire:model.live='date1'  class="form-control card-hover">
                                                @error('date1') 
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="lama"  class="form-label">Lama Cuti<span class="text-danger">*</span></label>
                                                <input type="text" id="lama" wire:model.live="lama_cuti" value="3 Bulan" readonly  class="form-control card-hover">
                                            </div>

                                        </div>
                                    @endif
                                    

                                @endif



                                <div class="mb-3" id="rangeCuti" @if($pilihan == 'Cuti Melahirkan') style="display: none" @endif>
                                    <label for="rangeWakatu" class="form-label">Lama Cuti<span class="text-danger">*</span></label>
                                    <div class="row">
                                        
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" wire:model.live='lamaCuti' value="1 hari" id="1Hari">
                                                        <label class="form-check-label" for="1Hari">
                                                            1 hari
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" wire:model.live='lamaCuti' value="lebih dari sehari" id="lebihSehari">
                                                        <label class="form-check-label" for="lebihSehari">
                                                            Lebih dari sehari
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        @if($lamaCuti == '1 hari')
                                            <div class="col-12 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='start'>
                                                    @if($errors->has('start'))
                                                        <span class="text-danger">{{ $errors->first('start') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif($lamaCuti == 'lebih dari sehari')
                                            <div class="col-12 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='start'>
                                                    @if($errors->has('start'))
                                                        <span class="text-danger">{{ $errors->first('start') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2 text-center" style="margin-top: 8px">
                                                <div class="mb-3">
                                                    <span class="text-center">
                                                        <i class="fa fa-arrow-right text-muted"></i>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='end'>
                                                    @if($errors->has('end'))
                                                        <span class="text-danger">{{ $errors->first('end') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="keterangan_cuti" class="form-label">Keterangan Cuti<span class="text-danger">*</span></label>
                                    <textarea  wire:model.blur="keterangan_cuti" id="keterangan_cuti" cols="30" rows="5" class="form-control card-hover "></textarea>
                                    @if($errors->has('keterangan_cuti'))
                                        <span class="text-danger">{{ $errors->first('keterangan_cuti') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <br>
                                <div class="mb-3">
                                    <button type="submit" class="form-control btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ubahSuratCuti" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ajukan Surat Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeUbahData()'></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card-body">
                        <div class="container">
                            <form wire:submit.prevent='ubahSuratCuti'>
                                <div class="mb-3">
                                    <label for="keperluanCuti" class="form-label">Keperluan Cuti<span class="text-danger">*</span></label>
                                    <select class="form-select keperluanCuti card-hover" id="keperluanCuti" wire:model.live='keperluanCuti' >
                                        <option ></option>
                                        <option value="Cuti Pribadi" >Cuti Pribadi</option>
                                        <option value="Cuti Khusus" >Cuti Khusus</option>
                                    </select>
                                    @error('keperluanCuti') 
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($keperluanCuti == 'Cuti Khusus')
                                    <div class="mb-3">
                                    
                                        <label for="pilihan" class="form-label">Pilihan<span class="text-danger">*</span></label>
                                        <select name="pilih" id="pilih" class="form-select card-hover" wire:model.live='pilihan' >
                                            <option ></option>
                                            <option value="Bencana Alam">Bencana Alam</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Keluarga Inti">Keluarga Inti</option>
                                            @if(Auth::user()->jk == 'L')
                                                <option value="Istri Melahirkan">Istri Melahirkan</option>
                                            @elseif(Auth::user()->jk == 'P')
                                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                            @endif
                                        </select>
                                        @error('pilihan') 
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                    </div>

                                    @if($pilihan == 'Cuti Melahirkan')
                                        <div id="lamaCuti">
                                            <div class="mb-3">
                                                <label  class="form-label">Mulai Cuti<span class="text-danger">*</span></label>
                                                <input type="date"  id="date1" wire:model.live='date1'  class="form-control card-hover">
                                            </div>
                                            <div class="mb-3">
                                                <label for="lama"  class="form-label">Lama Cuti<span class="text-danger">*</span></label>
                                                <input type="text" id="lama" wire:model.live="lama_cuti" value="3 Bulan" readonly  class="form-control card-hover">
                                            </div>

                                        </div>
                                    @endif
                                    

                                @endif



                                <div class="mb-3" id="rangeCuti" @if($pilihan == 'Cuti Melahirkan') style="display: none" @endif>
                                    <label for="rangeWakatu" class="form-label">Lama Cuti<span class="text-danger">*</span></label>
                                    <div class="row">
                                        
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input card-hover" type="radio" wire:model.live='lamaCuti' value="1 hari" id="1Hari">
                                                        <label class="form-check-label" for="1Hari">
                                                            1 hari
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input card-hover" type="radio" wire:model.live='lamaCuti' value="lebih dari sehari" id="lebihSehari">
                                                        <label class="form-check-label" for="lebihSehari">
                                                            Lebih dari sehari
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        @if($lamaCuti == '1 hari')
                                            <div class="col-12 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='start'>
                                                    @if($errors->has('start'))
                                                        <span class="text-danger">{{ $errors->first('start') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif($lamaCuti == 'lebih dari sehari')
                                            <div class="col-5 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='start'>
                                                    @if($errors->has('start'))
                                                        <span class="text-danger">{{ $errors->first('start') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-2 text-center" style="margin-top: 8px">
                                                <div class="mb-3">
                                                    <span class="text-center">
                                                        <i class="fa fa-arrow-right text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg-5">
                                                <div class="mb-3">
                                                    <input type="date" class="form-control card-hover" wire:model.live='end'>
                                                    @if($errors->has('end'))
                                                        <span class="text-danger">{{ $errors->first('end') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="keterangan_cuti" class="form-label">Keterangan Cuti<span class="text-danger">*</span></label>
                                    <textarea  wire:model.blur="keterangan_cuti" id="keterangan_cuti" cols="30" rows="5" class="form-control card-hover "></textarea>
                                    @if($errors->has('keterangan_cuti'))
                                        <span class="text-danger">{{ $errors->first('keterangan_cuti') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <br>
                                <div class="mb-3">
                                    <button type="submit" class="form-control btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="cancelSuratCuti" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Batalkan Surat Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCancelIzinCuti()'></button>
            </div>
            <div class="modal-body text-center">
                <h6>Apakah anda yakin ingin membatalkan surat cuti ini?</h6>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCancelIzinCuti()'>Batal</button>
                <button type="button" class="btn btn-danger" wire:click='destroyIzinCuti()'>Iya! Batalkan</button>
            </div>
        </div>
    </div>
</div>

@push('suratIzinRadio')
        <script>
            $(document).ready(function() {
                $('.keperluanCuti').select2({
                    placeholder: "Pilih Keperluan Cuti",
                    allowClear: true
                    
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $("input[name$='check']").click(function() {
                    var test = $(this).val();

                    // console.log(test);

                    $("div.desc").hide();
                    $("#Pilih" + test).show();
                });
            });

        </script>
        <script>
            $('#keperluanCuti').on('change', function() {
                var data = $( "#keperluanCuti option:selected" ).val();
                // console.log(data);
                if(data == 'Cuti Melahirkan') {
                    $("#rangeCuti").hide();
                    $("#pilihan").hide();
                    $("#lamaCuti").show();
                } else if(data == 'Cuti Pribadi') {
                    $("#rangeCuti").show();
                    $("#pilihan").hide();
                    $("#lamaCuti").hide();
                } else if(data == 'Cuti Khusus') {
                    $("#pilihan").show();
                    $("#rangeCuti").show();
                    $("#lamaCuti").hide();
                } else {
                    $("#rangeCuti").show();
                    $("#pilihan").hide();
                    $("#lamaCuti").hide();
                }
            });
            $(document).ready(function() {
                $("input[name$='rentanCuti']").click(function() {
                    var data = $(this).val();
                    // console.log(test);
                    if(data == 'Sehari') {
                        $("#tanggalCuti").show();
                        $("#sampaiCuti").hide();
                        $("#lamaCuti").hide();
                    } else if(data == 'Custom') {
                        $("#tanggalCuti").show();
                        $("#sampaiCuti").show();
                        $("#lamaCuti").hide();
                    }
                });
            });


        </script>

        <script>
            window.addEventListener('show-ubah-modal', event =>{
                $('#ubahSuratCuti').modal('show');
            });
            window.addEventListener('show-cancel-modal', event =>{
                $('#cancelSuratCuti').modal('show');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#date2').daterangepicker({
                    "showDropdowns": true,
                    "singleDatePicker": true,
                    "locale": {
                        "format": "DD-MM-YYYY",
                    }
                });

                
            });
        </script>
    @endpush