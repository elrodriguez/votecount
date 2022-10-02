<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="form-row">
                    {{-- <div class="col-md-3 mb-3">
                        <label class="form-label" for="type_id">Tipo<span class="text-danger">*</span> </label>

                        <select wire:model="type_id" id="type_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <option value="P">Provincial</option>
                            <option value="D">Distrital</option>
                        </select>

                        @error('type_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div> --}}
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
                        <label class="form-label" for="classroom_id">Aula <a onclick="openModalClassRoom()" href="javascript:void(0)">[Agregar +]</a></label>
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
                        <label class="form-label" for="table_id">Mesa <a onclick="openModalTables()" href="javascript:void(0)">[Agregar +]</a></label>
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
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="votes_total">Total Votantes<span class="text-danger">*</span> </label>
                        <input wire:model="votes_total" type="text" class="form-control" id="votes_total">
                        @error('votes_total')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <table class="table">
                            <tr>
                                <th colspan="2">Partido o Movimiento Político</th>
                                <th class="text-center">Voto Regional</th>
                                <th class="text-center">Voto Provincial</th>
                                <th class="text-center">Voto Distrital</th>
                            </tr>
                            @foreach($politicalparties as $key => $politicalparty)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset($politicalparty['logo']) }}" class="mr-5 p-0 m-0" style="width: 50px">
                                </td>
                                <td class="align-middle">
                                    <h3 class="p-0 m-0">{{ $politicalparty['name'] }}</h3>
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.{{ $key }}.total_r" name="politicalparties[{{ $key }}].total_r" type="number" class="form-control" style="width: 100px">
                                    @error('politicalparties.'.$key.'.total_r')
                                    <div class="invalid-feedback-2">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.{{ $key }}.total_p" name="politicalparties[{{ $key }}].total_p" type="number" class="form-control" style="width: 100px">
                                    @error('politicalparties.'.$key.'.total_p')
                                    <div class="invalid-feedback-2">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.{{ $key }}.total_d" name="politicalparties[{{ $key }}].total_d" type="number" class="form-control" style="width: 100px">
                                    @error('politicalparties.'.$key.'.total_d')
                                    <div class="invalid-feedback-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right align-middle" colspan="2">
                                    <h3 class="p-0 m-0">Total de Votos</h3>
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="total_r" type="number" readonly class="form-control" style="width: 100px">
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="total_p" type="number" readonly class="form-control" style="width: 100px">
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="total_d" type="number" readonly class="form-control" style="width: 100px">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('votecount_tables')}}" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">Guardar</button>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalClassRoom" tabindex="-1" aria-labelledby="modalClassRoomLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalClassRoomLabel">Nuevo Aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="new_classroom">Nombre<span class="text-danger">*</span> </label>
                            <input wire:model="new_classroom" id="new_classroom" type="text" class="form-control">
                            @error('new_classroom')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                            @enderror
                            @error('school_id')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button wire:click="saveNewClassRoom" type="button" class="btn btn-primary">{{ __('labels.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalTables" tabindex="-1" aria-labelledby="modalTablesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTablesLabel">Nuevo Mesa de Votacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="new_number_table">Numero Mesa<span class="text-danger">*</span> </label>
                        <input wire:model="new_number_table" id="new_number_table" type="text" class="form-control">
                        @error('new_number_table')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                        @error('classroom_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                        @error('school_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="person_id">Personero<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="personero_id" id="person_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                @foreach($people as $person)
                                <option value="{{ $person->id }}">{{ $person->number }} - {{ $person->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('personero_id')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button wire:click="saveNewTables" type="button" class="btn btn-primary">{{ __('labels.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            $('#school_id').select2().on('select2:select', function (e) {
                let data = e.params.data;
                @this.set('school_id',data.id);
                @this.getClassroom(data.id);
            });
            
            $('#person_id').select2().on('select2:select', function (e) {
                let data = e.params.data;
                @this.set('personero_id',data.id);
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
        document.addEventListener('vote-close-modal-classroom', event => {
            $('#modalClassRoom').modal('hide');
        });
        document.addEventListener('vote-close-modal-table', event => {
            $('#modalTables').modal('hide');
        });
        function openModalClassRoom(){
            $('#modalClassRoom').modal('show');
        }
        function openModalTables(){
            $('#modalTables').modal('show');
        }
    </script>
</div>
