@extends('votecount::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ url('themes/smart-admin/css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-tachometer-alt-fast'></i>Tablero <span class='fw-300'>de resumen</span> <sup class='badge badge-primary fw-500'>New</sup>
        <small>Disponibles para el usuario</small>
    </h1>
    <div class="subheader-block">
        Dashboard
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-3 mb-3">
        <a href="{{ route('votecount_votes_export') }}" type="button" class="btn btn-warning btn-pills waves-effect waves-themed">Exportar Toda la data a excel</a>
    </div>
</div>
<livewire:votecount::votes.votes-analytics />
<livewire:votecount::votes.votes-total />
<livewire:votecount::votes.votes-total-political-parties />
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/statistics/easypiechart/easypiechart.bundle.js') }}"></script>
    <script src="{{ url('themes/smart-admin/js/statistics/flot/flot.bundle.js') }}"></script>
@endsection
