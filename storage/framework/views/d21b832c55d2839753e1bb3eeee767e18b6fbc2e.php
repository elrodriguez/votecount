<div>
    <div class="card mb-g rounded-top">
        <div class="card-header">
            <div class="input-group bg-white shadow-inset-2">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-default dropdown-toggle waves-effect waves-themed" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($show); ?></button>
                    <div class="dropdown-menu" style="">
                        <button class="dropdown-item" wire:click="$set('show', 10)">10</button>
                        <button class="dropdown-item" wire:click="$set('show', 20)">20</button>
                        <button class="dropdown-item" wire:click="$set('show', 50)">50</button>
                        <div role="separator" class="dropdown-divider"></div>
                        <button class="dropdown-item" wire:click="$set('show', 100)">100</button>
                        <button class="dropdown-item" wire:click="$set('show', 500)">500</button>
                    </div>
                </div>
                <div class="input-group-prepend">
                    <?php if($search): ?>
                        <button wire:click="$set('search', '')" type="button" class="input-group-text bg-transparent border-right-0 py-1 px-3 text-danger">
                            <i class="fal fa-times"></i>
                        </button>
                    <?php else: ?>
                        <span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success">
                            <i wire:loading.class="spinner-border spinner-border-sm" wire:loading.remove.class="fal fa-search" class="fal fa-search"></i>
                        </span>
                    <?php endif; ?>
                </div>
                <input wire:keydown.enter="employeesSearch" wire:model.defer="search" type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="<?php echo e(__('staff::labels.lbl_type_here')); ?>">
                <div class="input-group-append">
                    <button wire:click="employeesSearch" class="btn btn-default waves-effect waves-themed" type="button"><?php echo app('translator')->get('staff::labels.btn_search'); ?></button>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('personal_empleados_nuevo')): ?>
                    <a href="<?php echo e(route('staff_employees_search')); ?>" class="btn btn-success waves-effect waves-themed" type="button"><?php echo app('translator')->get('staff::labels.btn_new'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center"><?php echo app('translator')->get('staff::labels.lbl_actions'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_name'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_number'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_admission_date'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_employee_type'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_occupation'); ?></th>
                    <th><?php echo app('translator')->get('staff::labels.lbl_company'); ?></th>
                    <th class="text-center"><?php echo e(__('setting::labels.state')); ?></th>
                </tr>
                </thead>
                <tbody class="">
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo e($key + 1); ?></td>
                        <td class="text-center tdw-50 align-middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary rounded-circle btn-icon waves-effect waves-themed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fal fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu" style="position: absolute; will-change: top, left; top: 35px; left: 0px;" x-placement="bottom-start">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('personal_empleados_editar')): ?>
                                    <a href="<?php echo e(route('staff_employees_edit',$employee->id)); ?>" class="dropdown-item">
                                        <i class="fal fa-pencil-alt mr-1"></i><?php echo app('translator')->get('staff::labels.btn_edit'); ?>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('personal_empleados_eliminar')): ?>
                                    <div class="dropdown-divider"></div>
                                    <button onclick="confirmDelete(<?php echo e($employee->id); ?>)" type="button" class="dropdown-item text-danger">
                                        <i class="fal fa-trash-alt mr-1"></i><?php echo app('translator')->get('staff::labels.btn_delete'); ?>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle"><?php echo e($employee->full_name); ?></td>
                        <td class="align-middle text-center"><?php echo e($employee->number); ?></td>
                        <td class="align-middle"><?php echo e(date('d-m-Y', strtotime($employee->admission_date))); ?></td>
                        <td class="align-middle"><?php echo e($employee->name_employee_type); ?></td>
                        <td class="align-middle"><?php echo e($employee->name_occupation); ?></td>
                        <td class="align-middle">
                            <?php if($employee->name_company): ?>
                                <?php echo e($employee->name_company); ?>

                            <?php else: ?>
                                <?php echo e($company_name); ?>

                            <?php endif; ?>
                        </td>
                        <td class="text-center align-middle">
                            <?php if($employee->state): ?>
                                <span class="badge badge-success"><?php echo e(__('staff::labels.lbl_active')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-danger"><?php echo e(__('staff::labels.lbl_inactive')); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer  pb-0 d-flex flex-row align-items-center">
            <div class="ml-auto"><?php echo e($employees->links()); ?></div>
        </div>
    </div>
    <script type="text/javascript">
        function confirmDelete(id){
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-times-circle text-danger mr-2'></i> <?php echo e(__('staff::labels.msg_0001')); ?>",
                message: "<span><strong><?php echo e(__('staff::labels.lbl_warning')); ?>: </strong> <?php echo e(__('staff::labels.msg_0002')); ?></span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons:
                    {
                        confirm:
                            {
                                label: '<?php echo e(__('staff::labels.btn_yes')); ?>',
                                className: 'btn-danger shadow-0'
                            },
                        cancel:
                            {
                                label: '<?php echo e(__('staff::labels.btn_not')); ?>',
                                className: 'btn-default'
                            }
                    },
                className: "modal-alert",
                closeButton: false,
                callback: function(result)
                {
                    if(result){
                    window.livewire.find('<?php echo e($_instance->id); ?>').deleteEmployee(id)
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(255, 0, 0, 0.5)'});
            box.find('.modal-content').css({'background-color': 'rgba(255, 0, 0, 0.5)'});
        }
        document.addEventListener('per-employees-delete', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('staff::labels.lbl_success')); ?>!</span>",
                message: "<span><strong><?php echo e(__('staff::labels.lbl_excellent')); ?>... </strong>"+event.detail.msg+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/Staff\Resources/views/livewire/employees/employees-list.blade.php ENDPATH**/ ?>