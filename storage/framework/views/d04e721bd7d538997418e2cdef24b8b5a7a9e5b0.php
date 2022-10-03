<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(url('themes/smart-admin/css/formplugins/select2/select2.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php if (isset($component)) { $__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CompanyName::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('company-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CompanyName::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9)): ?>
<?php $component = $__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9; ?>
<?php unset($__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9); ?>
<?php endif; ?>
    <li class="breadcrumb-item"><?php echo e(__('votecount::labels.module_name')); ?></li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><?php if (isset($component)) { $__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\JsGetDate::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('js-get-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\JsGetDate::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525)): ?>
<?php $component = $__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525; ?>
<?php unset($__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525); ?>
<?php endif; ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheader'); ?>
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-tachometer-alt-fast'></i>Tablero <span class='fw-300'>de resumen</span> <sup class='badge badge-primary fw-500'>New</sup>
        <small>Disponibles para el usuario</small>
    </h1>
    <div class="subheader-block">
        Dashboard
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-6 col-xl-3 mb-3">
        <a href="<?php echo e(route('votecount_votes_export')); ?>" type="button" class="btn btn-warning btn-pills waves-effect waves-themed">Exportar Toda la data a excel</a>
    </div>
</div>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('votecount::votes.votes-analytics', [])->html();
} elseif ($_instance->childHasBeenRendered('B7YkFBZ')) {
    $componentId = $_instance->getRenderedChildComponentId('B7YkFBZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('B7YkFBZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('B7YkFBZ');
} else {
    $response = \Livewire\Livewire::mount('votecount::votes.votes-analytics', []);
    $html = $response->html();
    $_instance->logRenderedChild('B7YkFBZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('votecount::votes.votes-total', [])->html();
} elseif ($_instance->childHasBeenRendered('ER1Y6ub')) {
    $componentId = $_instance->getRenderedChildComponentId('ER1Y6ub');
    $componentTag = $_instance->getRenderedChildComponentTagName('ER1Y6ub');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ER1Y6ub');
} else {
    $response = \Livewire\Livewire::mount('votecount::votes.votes-total', []);
    $html = $response->html();
    $_instance->logRenderedChild('ER1Y6ub', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('votecount::votes.votes-total-political-parties', [])->html();
} elseif ($_instance->childHasBeenRendered('Wg7lxuS')) {
    $componentId = $_instance->getRenderedChildComponentId('Wg7lxuS');
    $componentTag = $_instance->getRenderedChildComponentTagName('Wg7lxuS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Wg7lxuS');
} else {
    $response = \Livewire\Livewire::mount('votecount::votes.votes-total-political-parties', []);
    $html = $response->html();
    $_instance->logRenderedChild('Wg7lxuS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('themes/smart-admin/js/statistics/easypiechart/easypiechart.bundle.js')); ?>"></script>
    <script src="<?php echo e(url('themes/smart-admin/js/statistics/flot/flot.bundle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('votecount::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/index.blade.php ENDPATH**/ ?>