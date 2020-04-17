@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($results as $ad)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('ads.show', $ad) }}">{{ $ad->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $results->links() }}
        </div>
    </div>
</div>
@endsection
