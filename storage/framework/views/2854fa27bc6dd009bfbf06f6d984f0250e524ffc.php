<div>
    
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th colspan="2">Partido o Movimiento Político</th>
                    <th class="text-center">Regional</th>
                    <th class="text-center">Provincial</th>
                    <th class="text-center">Distrital</th>
                </tr>
                <?php
                    $ttp = 0;
                ?>
                <?php $__currentLoopData = $parties_totales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parties_total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $ttp = $ttp + ($parties_total['total_reg'] + $parties_total['total_pro'] + $parties_total['total_dis']);
                    ?>
                    <tr>
                        <td class="text-center align-middle">
                            <img style="width: 60px" src="<?php echo e($parties_total['img']); ?>" />
                        </td>
                        <td class="align-middle">
                            <h4><?php echo e($parties_total['name']); ?></h4>
                        </td>
                        <td class="text-right align-middle">
                            <?php if($this->totales->total_reg): ?>
                                <?php echo e($parties_total['total_reg']); ?> / <?php echo e($totales->total_reg); ?>

                                <?php
                                    $pc = (($parties_total['total_reg']/$totales->total_reg)*100);
                                ?>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo e($pc); ?>%" aria-valuenow="<?php echo e($pc); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(number_format($pc, 2, ',', '')); ?>%</div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-right align-middle">
                            <?php if($this->totales->total_pro): ?>
                                <?php echo e($parties_total['total_pro']); ?> / <?php echo e($totales->total_pro); ?>

                                <?php
                                    $pp = (($parties_total['total_pro']/$totales->total_pro)*100);
                                ?>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($pp); ?>%" aria-valuenow="<?php echo e($pp); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(number_format($pp, 2, ',', '')); ?>%</div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-right align-middle">
                            <?php if($this->totales->total_dis): ?>
                                <?php echo e($parties_total['total_dis']); ?> / <?php echo e($totales->total_dis); ?>

                                <?php
                                    $pd = (($parties_total['total_dis']/$totales->total_dis)*100);
                                ?>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo e($pd); ?>%" aria-valuenow="<?php echo e($pd); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(number_format($pd, 2, ',', '')); ?>%</div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
    
</div><?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/livewire/votes/votes-total-political-parties.blade.php ENDPATH**/ ?>