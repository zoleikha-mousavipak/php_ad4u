@extends ('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ $user->name }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5>{{ $user->email }}</h5>
                            <h5>
                                {{ $user->admin === true ? "Admin" : "User" }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
