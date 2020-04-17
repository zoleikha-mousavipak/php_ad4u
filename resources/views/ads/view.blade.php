@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('ads.show', $ad) }}">{{ $ad->title }}</a>
                        </div>
                        @if($owner)
                        <div class="col text-right">
                            @if($ad->status)
                            <i class="fas fa-check text-success"></i>
                            @else
                            <i class="fas fa-times text-warning"></i>
                            @endif
                            <a href="{{ route('ads.edit', $ad) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('ads.destroy', $ad) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger" />
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h5>{{ __('site.category_'.$ad->category->title) }}</h5>
                    <h6>{{ __('site.type_'.$ad->type->title) }}</h6>
                    <h3>{{$ad->price}}</h3>
                    <p>{{$ad->description}}</p>
                    @if($ad->images)
                    @foreach($ad->images as $image)
                    <img class="w-100" src="/uploads/images/{{ $image->url }}" />
                    @endforeach
                    @endif
                    <iframe class="mt-3 w-100"
                        src="https://maps.google.com/maps?q={{$ad->latitude}},{{$ad->longitude}}&z=15&output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
