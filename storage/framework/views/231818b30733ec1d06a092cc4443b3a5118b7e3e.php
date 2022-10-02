<div class="p-5 rounded">
    <h1>Exportacion</h1>
    <p class="lead">Resultados de todas las mesas.</p>
</div>
<div class="container">
    <table class="table table-bordered">
        <caption>Reporte <?php echo e(\Carbon\Carbon::now()->format('d/m/Y')); ?></caption>
        
    <?php $__currentLoopData = $gas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr >
            <th style="background-color: #AEB6BF ;">PERSONERO</th>
            <th style="background-color: #AEB6BF  ;">PROVINCIA</th>
            <th style="background-color: #AEB6BF  ;">DISTRITO</th>
            <th style="background-color: #AEB6BF  ;">NOMBRE DEL LOCAL</th>
            <th style="background-color: #AEB6BF  ;">AULA</th>
            <th style="background-color: #AEB6BF  ;">MESA</th>
            <th style="background-color: #AEB6BF  ;">TOTAL VOTOS</th>
        </tr>
        <tr>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->person_number); ?> - <?php echo e($ga->person_name); ?></td>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->province_name); ?></td>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->district_name); ?></td>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->school_name); ?></td>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->classroom_name); ?></td>
            <td style="background-color: #AEB6BF ;"><?php echo e($ga->number_table); ?></td>
            <td ><?php echo e($ga->votes_total); ?></td>
        </tr>
        <?php
            $par = \Modules\VoteCount\Entities\VoteVotesTablesPoPa::join('vote_political_parties','political_party_id','vote_political_parties.id')
                ->where('votes_table_id',$ga->id)
                ->select(
                    'vote_political_parties.name',
                    'vote_reg',
                    'vote_pro',
                    'vote_dis'
                )
                ->get();
            
        ?>
        <tr>
            <th colspan="4">Partido o Movimiento Político</th>
            <th>V. Regional</th>
            <th>V. Provincial</th>
            <th>V. Distrital</th>
        </tr>
        <?php $__currentLoopData = $par; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="4"><?php echo e($pa->name); ?></td>
            <td><?php echo e($pa->vote_reg); ?></td>
            <td><?php echo e($pa->vote_pro); ?></td>
            <td><?php echo e($pa->vote_dis); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div><?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/votes/export_excel_all.blade.php ENDPATH**/ ?>