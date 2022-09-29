
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
    <li class="breadcrumb-item">Configuraciones</li>
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
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::company.company-data')->html();
} elseif ($_instance->childHasBeenRendered('rSN0kQ4')) {
    $componentId = $_instance->getRenderedChildComponentId('rSN0kQ4');
    $componentTag = $_instance->getRenderedChildComponentTagName('rSN0kQ4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rSN0kQ4');
} else {
    $response = \Livewire\Livewire::mount('setting::company.company-data');
    $html = $response->html();
    $_instance->logRenderedChild('rSN0kQ4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::establishment.establishment-quantity')->html();
} elseif ($_instance->childHasBeenRendered('u0sImMp')) {
    $componentId = $_instance->getRenderedChildComponentId('u0sImMp');
    $componentTag = $_instance->getRenderedChildComponentTagName('u0sImMp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('u0sImMp');
} else {
    $response = \Livewire\Livewire::mount('setting::establishment.establishment-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('u0sImMp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::roles.roles-quantity')->html();
} elseif ($_instance->childHasBeenRendered('djZ9d2d')) {
    $componentId = $_instance->getRenderedChildComponentId('djZ9d2d');
    $componentTag = $_instance->getRenderedChildComponentTagName('djZ9d2d');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('djZ9d2d');
} else {
    $response = \Livewire\Livewire::mount('setting::roles.roles-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('djZ9d2d', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::modules.module-quantity')->html();
} elseif ($_instance->childHasBeenRendered('QJWcKXn')) {
    $componentId = $_instance->getRenderedChildComponentId('QJWcKXn');
    $componentTag = $_instance->getRenderedChildComponentTagName('QJWcKXn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QJWcKXn');
} else {
    $response = \Livewire\Livewire::mount('setting::modules.module-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('QJWcKXn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-quantity')->html();
} elseif ($_instance->childHasBeenRendered('0xNuQJm')) {
    $componentId = $_instance->getRenderedChildComponentId('0xNuQJm');
    $componentTag = $_instance->getRenderedChildComponentTagName('0xNuQJm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0xNuQJm');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('0xNuQJm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-sessions')->html();
} elseif ($_instance->childHasBeenRendered('aqfx3yR')) {
    $componentId = $_instance->getRenderedChildComponentId('aqfx3yR');
    $componentTag = $_instance->getRenderedChildComponentTagName('aqfx3yR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aqfx3yR');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-sessions');
    $html = $response->html();
    $_instance->logRenderedChild('aqfx3yR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\partido\Modules/Setting\Resources/views/index.blade.php ENDPATH**/ ?>