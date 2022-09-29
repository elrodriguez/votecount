<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="form-row align-items-end"">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="name">Nombre del Aula<span class="text-danger">*</span> </label>
                        <input wire:model="name" type="text" class="form-control" id="name" required="">
                        @error('name')
                        <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <button wire:click="saveClassroom" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">Guardar</button>
                    </div>
                </div>
            </form>
            @if(count($classrooms)>0)
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('labels.actions') }}</th>
                    <th scope="col">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($classrooms as $k => $classroom)
                    <tr>
                        <td width="50px">{{ $k + 1 }}</td>
                        <td width="50px">
                            <button wire:click="deleteClassRoom({{ $classroom->id }})" class="btn btn-danger btn-icon rounded-circle waves-effect waves-themed">
                                <i class="fal fa-times"></i>
                            </button>
                        </td>
                        <td>{{ $classroom->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('votecount_schools')}}" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('vote-schools-classroom-save', event => {
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
        /////prueba PPxFwxh9ShfuFN
    </script>
</div>
