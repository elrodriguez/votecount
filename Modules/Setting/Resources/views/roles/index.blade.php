@extends('setting::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">{{ __('setting::labels.settings') }}</li>
    <li class="breadcrumb-item active">{{ __('setting::labels.roles') }}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-cubes'></i>{{ __('setting::labels.roles') }} </span> <sup class='badge badge-primary fw-500'>Form</sup>
    </h1>
    <div class="subheader-block">
        {{ __('setting::labels.list') }}
    </div>
@endsection
@section('content')
    @livewire('setting::roles.roles-form')
@endsection
