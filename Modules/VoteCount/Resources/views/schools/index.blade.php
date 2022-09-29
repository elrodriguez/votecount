@extends('votecount::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="breadcrumb-item">{{ __('votecount::labels.lbl_schools') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-house"></i></i>{{ __('votecount::labels.lbl_schools') }}<sup class='badge badge-primary fw-500'>{{ __('labels.list') }}</sup>   
    </h1>
    <div class="subheader-block">
        {{ __('labels.list') }}
    </div>
@endsection
@section('content')
<livewire:votecount::sachools.schools-list />
@endsection
