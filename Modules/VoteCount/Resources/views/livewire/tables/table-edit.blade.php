<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="number_table">Número Mesa<span class="text-danger">*</span> </label>
                        <input wire:model="number_table" type="text" class="form-control" id="number_table" required="">
                        @error('number_table')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="number_order">Número Orden<span class="text-danger">*</span> </label>
                        <input wire:model="number_order" type="text" class="form-control" id="number_order" required="">
                        @error('number_order')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="pavilion">Pabellón<span class="text-danger">*</span> </label>
                        <input wire:model="pavilion" type="text" class="form-control" id="pavilion" required="">
                        @error('pavilion')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="flat">Piso<span class="text-danger">*</span> </label>
                        <input wire:model="flat" type="text" class="form-control" id="flat" required="">
                        @error('flat')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="person_id">Personero<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="person_id" id="person_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                @foreach($people as $person)
                                <option {{ $person_id == $person->id ? 'selected' : '' }} value="{{ $person->id }}">{{ $person->number }} - {{ $person->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('person_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="school_id">Colegio<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="school_id" id="school_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                @foreach($schools as $school)
                                <option {{ $school_id == $school->id ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('school_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="classroom_id">Aula<span class="text-danger">*</span> </label>
                        <select wire:model="classroom_id" id="classroom_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($classrooms as $classroom)
                            <option {{ $classroom_id == $classroom->id ? 'selected' : '' }} value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('votecount_tables')}}" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            <button wire:click="update" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">{{ __('labels.to_update') }}</button>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            $('#school_id').select2().on('select2:select', function (e) {
                let data = e.params.data;
                @this.set('school_id',data.id);
                @this.getClassroom(data.id);
            });
        });
        document.addEventListener('vote-table-update', event => {
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
