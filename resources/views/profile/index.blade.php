@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    </div>
    <div class="card text-center">
        <div class="card-header">
            {{ __('site.profile') }}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h5>{{ __('site.profile_dear') }} {{ Auth::user()->name }},
                    @if($t < "10" ) Have a good morning! @elseif($t < "20" ) Have a good day! @else Have a good night!
                        @endif</h5> </div> <div class="card-text">
                        {{ __('site.profile_text') }}
                        <hr />
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('site.profile_edit')}}</a>
                        <a href="{{ route('profile.ads') }}" class="btn btn-primary">{{ __('site.ad_my') }}</a>
                        <a href="{{ route('ads.create') }}" class="btn btn-primary">{{ __('site.ad_new') }}</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
