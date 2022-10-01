<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation <?php echo e($errors->any()?'was-validated':''); ?>" novalidate="">
                <div class="form-row">
                    
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
                        <select wire:change="getTables" wire:model="classroom_id" id="classroom_id" class="custom-select" required="">
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
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="table_id">Mesa<span class="text-danger">*</span> </label>
                        <select wire:model="table_id" id="table_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($table->id); ?>"><?php echo e($table->number_table); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['table_id'];
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
                        <label class="form-label" for="votes_total">Total Votantes<span class="text-danger">*</span> </label>
                        <input wire:model="votes_total" type="text" class="form-control" id="votes_total">
                        <?php $__errorArgs = ['votes_total'];
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
                    <div class="col-md-12 mb-3">
                        <table class="table">
                            <tr>
                                <th colspan="2">Partido o Movimiento Político</th>
                                <th class="text-center">Voto Regional</th>
                                <th class="text-center">Voto Provincial</th>
                                <th class="text-center">Voto Distrital</th>
                            </tr>
                            <?php $__currentLoopData = $politicalparties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $politicalparty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle">
                                    <img src="<?php echo e(asset($politicalparty['logo'])); ?>" class="mr-5 p-0 m-0" style="width: 50px">
                                </td>
                                <td class="align-middle">
                                    <h3 class="p-0 m-0"><?php echo e($politicalparty['name']); ?></h3>
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.<?php echo e($key); ?>.total_r" name="politicalparties[<?php echo e($key); ?>].total_r" type="number" class="form-control" style="width: 100px">
                                    <?php $__errorArgs = ['politicalparties.'.$key.'.total_r'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.<?php echo e($key); ?>.total_p" name="politicalparties[<?php echo e($key); ?>].total_p" type="number" class="form-control" style="width: 100px">
                                    <?php $__errorArgs = ['politicalparties.'.$key.'.total_p'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                                <td class="text-center align-middle">
                                    <input wire:model="politicalparties.<?php echo e($key); ?>.total_d" name="politicalparties[<?php echo e($key); ?>].total_d" type="number" class="form-control" style="width: 100px">
                                    <?php $__errorArgs = ['politicalparties.'.$key.'.total_d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/livewire/votes/votes-create.blade.php ENDPATH**/ ?>