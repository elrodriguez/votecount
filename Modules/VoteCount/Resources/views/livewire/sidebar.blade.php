@php
    $path = explode('/', request()->path());
    $path[1] = (array_key_exists(1, $path)> 0)?$path[1]:'';
    $path[2] = (array_key_exists(2, $path)> 0)?$path[2]:'';
    $path[3] = (array_key_exists(3, $path)> 0)?$path[3]:'';
    $path[4] = (array_key_exists(4, $path)> 0)?$path[4]:'';
@endphp
<div class="page-sidebar">
    <x-company-logo></x-company-logo>
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
        <x-info-card-user></x-info-card-user>
        <ul id="js-nav-menu" class="nav-menu">
            @can('conteodevotos_dashboard')
            <li class="{{ $path[0] == 'votecount' && $path[1] == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('votecount_dashboard') }}" title="Blank Project" data-filter-tags="blank page">
                    <i class="fal fa-tachometer-alt-fast"></i>
                    <span class="nav-link-text" data-i18n="nav.blankpage">@lang('votecount::labels.lbl_dashBoard')</span>
                </a>
            </li>
            @endcan
            <li class="nav-title">@lang('votecount::labels.lbl_navigation')</li>
            @can('conteodevotos_colegios')
            <li class="{{ $path[0] == 'votecount' && $path[1] == 'employees_type' ? 'active open' : '' }}">
                <a href="javascript:void(0);" title="Colegios" data-filter-tags="Colegios">
                    <i class="fal fa-house"></i>
                    <span class="nav-link-text" data-i18n="nav.colegios">CENTROS DE VOTACIÓN</span>
                </a>
                <ul>
                    <li class="{{ $path[0] == 'votecount' && $path[1] == 'schools' && $path[2] == 'list' ? 'active' : '' }}">
                        <a href="{{ route('votecount_schools') }}" title="Listado de colegios" data-filter-tags="Listado de colegios">
                            <span class="nav-link-text" data-i18n="nav.listado_colegios">Listado</span>
                        </a>
                    </li>
                    @can('conteodevotos_colegios')
                    <li class="{{ $path[0] == 'votecount' && $path[1] == 'schools' && $path[2] == 'create' ? 'active' : '' }}">
                        <a href="{{ route('votecount_schools_create') }}" title="Nuevo Colegio" data-filter-tags="Nuevo Colegio">
                            <span class="nav-link-text" data-i18n="nav.nuevo_olegio">Nuevo</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('conteodevotos_mesas')
            <li class="{{ $path[0] == 'votecount' && $path[1] == 'tables' ? 'active open' : '' }}">
                <a href="javascript:void(0);" title="tables" data-filter-tags="tables">
                    <i class="fal fa-keynote"></i>
                    <span class="nav-link-text" data-i18n="nav.tables">{{ __('votecount::labels.lbl_tables') }}</span>
                </a>
                <ul>
                    <li class="{{ $path[0] == 'votecount' && $path[1] == 'tables' && $path[2] == 'list' ? 'active' : '' }}">
                        <a href="{{ route('votecount_tables') }}" title="Listado" data-filter-tags="Listado">
                            <span class="nav-link-text" data-i18n="nav.listado">Listado</span>
                        </a>
                    </li>
                    @can('conteodevotos_mesas')
                    <li class="{{ $path[0] == 'votecount' && $path[1] == 'tables' && $path[2] == 'create' ? 'active' : '' }}">
                        <a href="{{ route('votecount_tables_create') }}" title="Nueva mesa" data-filter-tags="Nueva mesa">
                            <span class="nav-link-text" data-i18n="nav.nueva_mesa">Nuevo</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </nav>
</div>
