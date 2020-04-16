@extends ('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <a href="{{ route('admin.users.create') }}"
                class="btn btn-primary">{{ __('site.user_new') }}</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($usersList as $user)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p><b>{{ $user->name }}</b></p> {{ $user->email }}
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('admin.users.edit', $user) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fas fa-trash text-danger"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $usersList->links() }}
        </div>
    </div>
</div>
@endsection
