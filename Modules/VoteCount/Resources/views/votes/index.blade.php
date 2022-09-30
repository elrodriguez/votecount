@extends('votecount::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="breadcrumb-item">{{ __('votecount::labels.lbl_record_votes') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-money-check-edit"></i></i>{{ __('votecount::labels.lbl_record_votes') }}<sup class='badge badge-primary fw-500'>{{ __('labels.new') }}</sup>   
    </h1>
    <div class="subheader-block">
        {{ __('labels.new') }}
    </div>
@endsection
@section('content')

@endsection
