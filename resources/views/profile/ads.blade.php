@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($ads as $ad)
            <div class="card mb-3">
                <div class="card-header">{{ $ad->title }}</div>
                <div class="card-body">
                    <h5>{{ __('site.category_'.$ad->category->title) }}</h5>
                    <h6>{{ __('site.type_'.$ad->type->title) }}</h6>
                    <h3>{{$ad->price}}</h3>
                    <p>{{$ad->description}}</p>
                    <iframe class="mt-3 w-100"
                        src="http://maps.google.com/maps?q={{$ad->latitude}},{{$ad->longitude}}&z=15&output=embed"></iframe>
                </div>
            </div>
            @endforeach
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endsection
