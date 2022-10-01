@extends('votecount::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ url('themes/smart-admin/css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('votecount_votes')}}">{{ __('votecount::labels.lbl_record_votes') }}</a></li>
    <li class="breadcrumb-item">{{ __('labels.new') }}</li>
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
<livewire:votecount::votes.votes-create />
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/formplugins/select2/select2.bundle.js') }}"></script>
@endsection