<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation <?php echo e($errors->any()?'was-validated':''); ?>" novalidate="">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="number_table">Número Mesa<span class="text-danger">*</span> </label>
                        <input wire:model="number_table" type="text" class="form-control" id="number_table" required="">
                        <?php $__errorArgs = ['number_table'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="number_order">Número Orden<span class="text-danger">*</span> </label>
                        <input wire:model="number_order" type="text" class="form-control" id="number_order" required="">
                        <?php $__errorArgs = ['number_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="pavilion">Pabellón<span class="text-danger">*</span> </label>
                        <input wire:model="pavilion" type="text" class="form-control" id="pavilion" required="">
                        <?php $__errorArgs = ['pavilion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="flat">Piso<span class="text-danger">*</span> </label>
                        <input wire:model="flat" type="text" class="form-control" id="flat" required="">
                        <?php $__errorArgs = ['flat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="person_id">Personero<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="person_id" id="person_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($person->id); ?>"><?php echo e($person->full_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__errorArgs = ['person_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="school_id">Colegio<span class="text-danger">*</span> </label>
                        <div wire:ignore>
                            <select wire:model="school_id" id="school_id" class="custom-select" required="">
                                <option value="">Seleccionar</option>
                                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($school->id); ?>"><?php echo e($school->full_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__errorArgs = ['school_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="classroom_id">Aula<span class="text-danger">*</span> </label>
                        <select wire:model="classroom_id" id="classroom_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($classroom->id); ?>"><?php echo e($classroom->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['classroom_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="<?php echo e(route('votecount_tables')); ?>" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">Guardar</button>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            $('#school_id').select2().on('select2:select', function (e) {
                let data = e.params.data;
                window.livewire.find('<?php echo e($_instance->id); ?>').set('school_id',data.id);
                window.livewire.find('<?php echo e($_instance->id); ?>').getClassroom(data.id);
            });
            $('#person_id').select2().on('select2:select', function (e) {
                let data = e.params.data;
                window.livewire.find('<?php echo e($_instance->id); ?>').set('person_id',data.id);
            });
        });
        
        document.addEventListener('vote-table-save', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>"+event.detail.msg+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
            $('#person_id').val('');
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/livewire/tables/table-create.blade.php ENDPATH**/ ?>