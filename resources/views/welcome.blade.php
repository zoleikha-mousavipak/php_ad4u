@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($ads as $ad)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('ads.show', $ad) }}">{{ $ad->title }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5>{{ __('site.category_'.$ad->category->title) }}</h5>
                    <h6>{{ __('site.type_'.$ad->type->title) }}</h6>
                    <h3>{{$ad->price}} Euro</h3>
                    <p>{{$ad->description}}</p>
                    @if($ad->images)
                    @foreach($ad->images as $image)
                    <img class="w-100" src="/uploads/images/{{ $image->url }}" />
                    @endforeach
                    @endif
                </div>
            </div>
            @endforeach
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endsection
