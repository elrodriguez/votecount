<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <div class="form-row needs-validation input-group <?php echo e($errors->any()?'was-validated':''); ?>" novalidate="">
                <div class="input-group bg-white shadow-inset-2">
                    <input wire:keydown.enter="searchPerson" wire:model="number_search" maxlength="11" type="text" class="form-control border-left-1 bg-transparent pl-1" id="number_search" required="" placeholder="<?php echo e(__('staff::labels.lbl_enter_identity_document_number')); ?>">
                    <?php $__errorArgs = ['number_search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-group-append">
                        <button wire:click="searchPerson" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed"><?php echo app('translator')->get('staff::labels.btn_search'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        document.addEventListener('per-employees-search_a', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('staff::labels.lbl_success')); ?>!</span>",
                message: "<span>"+event.detail.msg+"</span>",
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
                callback: function(result) {
                    if(result){
                        let url = "<?php echo e(route('staff_employees_create', ':id')); ?>";
                        url = url.replace(':id', 'A_'+event.detail.numberPerson);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });

        document.addEventListener('per-employees-search_b', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('staff::labels.lbl_success')); ?>!</span>",
                message: "<span>"+event.detail.msg+"</span>",
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
                callback: function(result) {
                    if(result) {
                        let url = "<?php echo e(route('staff_employees_create', ':id')); ?>";
                        url = url.replace(':id', 'B_' + event.detail.personId);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });

        document.addEventListener('per-employees-search_c', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('staff::labels.lbl_success')); ?>!</span>",
                message: "<span>"+event.detail.msg+"</span>",
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
                                label: '<?php echo e(__('pestaffrsonal::labels.btn_not')); ?>',
                                className: 'btn-default'
                            }
                    },
                className: "modal-alert",
                closeButton: false,
                callback: function(result) {
                    if(result) {
                        let url = "<?php echo e(route('staff_employees_edit', ':id')); ?>";
                        url = url.replace(':id', event.detail.employeeId);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/Staff\Resources/views/livewire/employees/employees-search.blade.php ENDPATH**/ ?>