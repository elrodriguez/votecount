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
                <input wire:keydown.enter="updatingSearchSaleexpense" wire:model.defer="search" type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="Escriba aquí...">
                <div class="input-group-append">
                    <button wire:click="updatingSearchSaleexpense" class="btn btn-default waves-effect waves-themed" type="button">Buscar</button>
                    <a href="<?php echo e(route('sales_expenses_create')); ?>" class="btn btn-success waves-effect waves-themed" type="button"><?php echo e(__('labels.new')); ?></a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><?php echo e(__('labels.actions')); ?></th>
                        <th class="text-center"><?php echo e(__('labels.broadcast_date')); ?></th>
                        <th><?php echo e(__('labels.provider')); ?></th>
                        <th class="text-center"><?php echo e(__('labels.number')); ?></th>
                        <th><?php echo e(__('labels.reason')); ?></th>
                        <th class="text-center"><?php echo e(__('labels.state')); ?></th>
                        <th class="text-center"><?php echo e(__('labels.total')); ?></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php if(count($expenses) > 0): ?>
                        <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo e($key + 1); ?></td>
                            <td class="text-center tdw-50 align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary rounded-circle btn-icon waves-effect waves-themed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fal fa-cogs"></i>
                                    </button>
                                    <div class="dropdown-menu" style="position: absolute; will-change: top, left; top: 35px; left: 0px;" x-placement="bottom-start">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ventas_nota_venta_editar')): ?>
                                        <a href="<?php echo e(route('sales_expenses_edit',$expense->external_id)); ?>" class="dropdown-item">
                                            <i class="fal fa-pencil-alt mr-1"></i><?php echo e(__('labels.edit')); ?>

                                        </a>
                                        <?php endif; ?>
                                        <a wire:click="$emit('modalPayment',<?php echo e($expense->id); ?>)" href="javascript:void(0)" class="dropdown-item">
                                            <i class="fal fa-money-bill-alt mr-1"></i><?php echo e(__('labels.payments')); ?>

                                        </a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('configuraciones_establecimientos_eliminar')): ?>
                                        <div class="dropdown-divider"></div>
                                        <button onclick="confirmCancel(<?php echo e($expense->id); ?>)" type="button" class="dropdown-item text-danger">
                                            <i class="fal fa-trash-alt mr-1"></i><?php echo e(__('labels.delete')); ?>

                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center"><?php echo e(\Carbon\Carbon::parse($expense->date_of_issue)->format('d/m/Y')); ?></td>
                            <td class="align-middle"><?php echo e(json_decode($expense->supplier)->full_name); ?></td>
                            <td class="align-middle"><?php echo e($expense->number); ?></td>
                            <td class="align-middle"><?php echo e($expense->expense_reasons->description); ?></td>
                            <td class="align-middle">
                                <?php if($expense->state): ?>
                                    <span class="badge badge-success">Pagado</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Pendiente</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle text-right"><?php echo e($expense->total); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr class="odd"><td valign="top" colspan="10" class="dataTables_empty text-center"><?php echo e(__('labels.no_records_to_display')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer pb-0 d-flex flex-row align-expenses-center">
            <div class="ml-auto"><?php echo e($expenses->links()); ?></div>
        </div>
    </div>
    
    <script type="text/javascript">
        function confirmCancel(id){
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-times-circle text-danger mr-2'></i> ¿<?php echo e(__('labels.you_want_to_cancel_document')); ?>?",
                message: "<span><strong>Advertencia: </strong> ¡Esta acción no se puede deshacer!</span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons:
                {
                    confirm:
                    {
                        label: 'Si',
                        className: 'btn-danger shadow-0'
                    },
                    cancel:
                    {
                        label: 'No',
                        className: 'btn-default'
                    }
                },
                className: "modal-alert",
                closeButton: false,
                callback: function(result)
                {
                    if(result){
                        window.livewire.find('<?php echo e($_instance->id); ?>').cancelDocument(id)
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(255, 0, 0, 0.5)'});
        }
        document.addEventListener('response_anulation_sale_expense', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>"+event.detail.message+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\nuevedoce\Modules/Sales\Resources/views/livewire/expenses/expenses-list.blade.php ENDPATH**/ ?>