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
                                <button type="submit" class="fas fa-trash text-danger"></button>
                            </form>
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
