<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="external_id">ID_LOCAL<span class="text-danger">*</span> </label>
                        <input wire:model="external_id" type="text" class="form-control" id="external_id" required="">
                        @error('external_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="department_id">@lang('setting::labels.department') <span class="text-danger">*</span> </label>
                        <select wire:change="getProvinves" wire:model="department_id" id="department_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->description }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="province_id">PROVINCIA<span class="text-danger">*</span> </label>
                        <select wire:change="getPDistricts" wire:model="province_id" id="province_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->description }}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="district_id">DISTRITO<span class="text-danger">*</span> </label>
                        <select wire:model="district_id" id="district_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->description }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="full_name">NOMBRE DEL LOCAL <span class="text-danger">*</span> </label>
                        <input wire:model="full_name" type="text" class="form-control" id="full_name" required="">
                        @error('full_name')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="address">DIRECCIÓN DEL LOCAL<span class="text-danger">*</span> </label>
                        <input wire:model="address" type="text" class="form-control" id="address" required="">
                        @error('address')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="quamtity_electors">ELECTORES HÁBILES <span class="text-danger">*</span> </label>
                        <input wire:model="quamtity_electors" type="text" class="form-control" id="quamtity_electors" required="">
                        @error('quamtity_electors')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="quantity_tables">MESAS<span class="text-danger">*</span> </label>
                        <input wire:model="quantity_tables" type="text" class="form-control" id="quantity_tables" required="">
                        @error('quantity_tables')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('votecount_schools')}}" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">Guardar</button>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('set-schools-save', event => {
            initApp.playSound('{{ url("themes/smart-admin/media/sound") }}', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>"+event.detail.msg+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
    </script>
</div>
