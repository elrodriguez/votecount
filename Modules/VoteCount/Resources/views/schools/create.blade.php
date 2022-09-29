@extends('votecount::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('votecount_schools')}}">{{ __('votecount::labels.lbl_schools') }}</a></li>
    <li class="breadcrumb-item">{{ __('labels.new') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-house"></i></i>{{ __('votecount::labels.lbl_schools') }}<sup class='badge badge-primary fw-500'>{{ __('labels.new') }}</sup>   
    </h1>
    <div class="subheader-block">
        {{ __('labels.new') }}
    </div>
@endsection
@section('content')
<livewire:votecount::sachools.schools-create />
@endsection