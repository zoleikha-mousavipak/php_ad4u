@extends ('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <a href="{{ route('admin.categories.create') }}"
                class="btn btn-primary">{{ __('site.category_new') }}</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($categoriesList as $category)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p>{{ $category->title }}</p>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('admin.categories.edit', $category) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $categoriesList->links() }}
        </div>
    </div>
</div>
@endsection
