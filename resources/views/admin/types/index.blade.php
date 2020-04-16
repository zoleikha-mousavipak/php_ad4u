@extends ('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <a href="{{ route('admin.types.create') }}"
                class="btn btn-primary">{{ __('site.type_new') }}</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($typesList as $type)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p>{{ $type->title }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('admin.types.edit', $type) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $typesList->links() }}
        </div>
    </div>
</div>
@endsection
