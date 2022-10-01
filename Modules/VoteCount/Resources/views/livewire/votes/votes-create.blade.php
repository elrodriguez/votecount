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
