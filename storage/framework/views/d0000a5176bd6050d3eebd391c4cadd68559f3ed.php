<div>
    
    <div class="row">
        <div class="col-sm-4 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php echo e($totales->total_reg); ?>

                        <small class="m-0 l-h-n">Total Votos Regional</small>
                    </h3>
                </div>
                <i class="fal fa-check-double position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
        <div class="col-sm-4 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php echo e($totales->total_pro); ?>

                        <small class="m-0 l-h-n">Total Votos Regional</small>
                    </h3>
                </div>
                <i class="fal fa-check-double position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
        <div class="col-sm-4 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        <?php echo e($totales->total_dis); ?>

                        <small class="m-0 l-h-n">Total Votos Distrital</small>
                    </h3>
                </div>
                <i class="fal fa-check-double position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/livewire/votes/votes-total.blade.php ENDPATH**/ ?>