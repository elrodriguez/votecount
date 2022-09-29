<?php
    $path = explode('/', request()->path());
    $path[1] = (array_key_exists(1, $path)> 0)?$path[1]:'';
    $path[2] = (array_key_exists(2, $path)> 0)?$path[2]:'';
    $path[3] = (array_key_exists(3, $path)> 0)?$path[3]:'';
    $path[4] = (array_key_exists(4, $path)> 0)?$path[4]:'';
?>
<div class="page-sidebar">
    <?php if (isset($component)) { $__componentOriginala5469d359b5f07642104d160c27364732eddefa7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CompanyLogo::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('company-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CompanyLogo::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5469d359b5f07642104d160c27364732eddefa7)): ?>
<?php $component = $__componentOriginala5469d359b5f07642104d160c27364732eddefa7; ?>
<?php unset($__componentOriginala5469d359b5f07642104d160c27364732eddefa7); ?>
<?php endif; ?>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.info-card-user','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('info-card-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <ul id="js-nav-menu" class="nav-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('conteodevotos_dashboard')): ?>
            <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'dashboard' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('votecount_dashboard')); ?>" title="Blank Project" data-filter-tags="blank page">
                    <i class="fal fa-tachometer-alt-fast"></i>
                    <span class="nav-link-text" data-i18n="nav.blankpage"><?php echo app('translator')->get('votecount::labels.lbl_dashBoard'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-title"><?php echo app('translator')->get('votecount::labels.lbl_navigation'); ?></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('conteodevotos_colegios')): ?>
            <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'employees_type' ? 'active open' : ''); ?>">
                <a href="javascript:void(0);" title="Colegios" data-filter-tags="Colegios">
                    <i class="fal fa-house"></i>
                    <span class="nav-link-text" data-i18n="nav.colegios"><?php echo app('translator')->get('votecount::labels.lbl_schools'); ?></span>
                </a>
                <ul>
                    <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'schools' && $path[2] == 'list' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('votecount_schools')); ?>" title="Listado de colegios" data-filter-tags="Listado de colegios">
                            <span class="nav-link-text" data-i18n="nav.listado_colegios">Listado de colegios</span>
                        </a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('conteodevotos_colegios')): ?>
                    <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'schools' && $path[2] == 'create' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('votecount_schools_create')); ?>" title="Nuevo Colegio" data-filter-tags="Nuevo Colegio">
                            <span class="nav-link-text" data-i18n="nav.nuevo_olegio">Colegio</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('conteodevotos_mesas')): ?>
            <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'occupations' ? 'active open' : ''); ?>">
                <a href="javascript:void(0);" title="tables" data-filter-tags="tables">
                    <i class="fal fa-person-dolly"></i>
                    <span class="nav-link-text" data-i18n="nav.tables">Mesas</span>
                </a>
                <ul>
                    <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'occupations' && $path[2] == 'list' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('votecount_tables')); ?>" title="Listado" data-filter-tags="Listado">
                            <span class="nav-link-text" data-i18n="nav.listado">Listado de Mesas</span>
                        </a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('conteodevotos_mesas')): ?>
                    <li class="<?php echo e($path[0] == 'votecount' && $path[1] == 'tables' && $path[2] == 'create' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('votecount_tables_create')); ?>" title="Nueva mesa" data-filter-tags="Nueva mesa">
                            <span class="nav-link-text" data-i18n="nav.nueva_mesa">REgistrar Mesa</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/VoteCount\Resources/views/livewire/sidebar.blade.php ENDPATH**/ ?>