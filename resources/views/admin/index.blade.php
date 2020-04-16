@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    </div>
    <div class="card text-center">
        <div class="card-header">
            {{ __('site.admin_panel') }}
        </div>
        <div class="card-body">
            <div class="card-title">
                <div class="card-text">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger m-4 ">{{ __('site.admin_users')}}</a>
                    <a href="{{ route('admin.ads.index') }}" class="btn btn-outline-secondary m-4">{{ __('site.admin_ads') }}</a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="btn btn-outline-success m-4">{{ __('site.admin_categories') }}</a>
                    <a href="{{ route('admin.types.index') }}" class="btn btn-outline-info m-4">{{ __('site.admin_types') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
