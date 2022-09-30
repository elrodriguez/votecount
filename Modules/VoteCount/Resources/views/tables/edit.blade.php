@extends('votecount::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ url('themes/smart-admin/css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('votecount::labels.module_name') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('votecount_tables')}}">{{ __('votecount::labels.lbl_tables') }}</a></li>
    <li class="breadcrumb-item active">{{ __('labels.edit') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-keynote"></i></i>{{ __('votecount::labels.lbl_tables') }}<sup class='badge badge-primary fw-500'>{{ __('labels.edit') }}</sup>   
    </h1>
    <div class="subheader-block">
        {{ __('labels.edit') }}
    </div>
@endsection
@section('content')
<livewire:votecount::tables.table-edit :table_id="$id" />
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/formplugins/select2/select2.bundle.js') }}"></script>
@endsection
