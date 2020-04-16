@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($ads as $ad)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('admin.ads.show', $ad) }}">{{ $ad->title }}</a>
                        </div>
                        <div class="col text-right">
                            @if($ad->status)
                            <i class="fas fa-check text-success"></i>
                            @else
                            <i class="fas fa-times text-warning"></i>
                            @endif
                            <a href="{{ route('admin.ads.edit', $ad) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endsection
