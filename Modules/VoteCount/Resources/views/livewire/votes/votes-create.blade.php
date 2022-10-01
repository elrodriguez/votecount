<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="type_id">Tipo<span class="text-danger">*</span> </label>

                        <select wire:model="type_id" id="type_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <option value="P">Provincial</option>
                            <option value="D">Distrital</option>
                        </select>

                        @error('type_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="school_id">Colegio<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="school_id" id="school_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('school_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="classroom_id">Aula<span class="text-danger">*</span> </label>
                        <select wire:change="getTables" wire:model="classroom_id" id="classroom_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="table_id">Mesa<span class="text-danger">*</span> </label>
                        <select wire:model="table_id" id="table_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            @foreach($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->number_table }}</option>
                            @endforeach
                        </select>
                        @error('table_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <ul class="list-group">
                            @foreach($politicalparties as $key => $politicalparty)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center p-0 m-0">
                                    <img src="{{ asset($politicalparty['logo']) }}" class="mr-5 p-0 m-0" style="width: 50px">
                                    <h3 class="p-0 m-0">{{ $politicalparty['name'] }}</h3>
                                </div>
                                <input wire:model="politicalparties.{{ $key }}.quantity" name="politicalparties[{{ $key }}].quantity" type="number" class="form-control" style="width: 100px">
                                @error('politicalparties.'.$key.'.quantity')
                                <div class="invalid-feedback-2">{{ $message }}</div>
                                @enderror
                            </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center p-0 m-0">
                                    <h3 class="p-0 m-0">Total Votos</h3>
                                </div>
                                <input wire:model="total" type="number" readonly class="form-control" style="width: 100px">
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('votecount_tables')}}" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">Guardar</button>
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
        document.addEventListener('vote-table-save', event => {
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
