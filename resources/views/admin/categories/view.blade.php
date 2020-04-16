@extends ('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2>{{ $category->title }}</h2>
                            <h5>{{ $category->status }}
                                {{-- <h5>@if({{ $category->status == 1 ? True:False }})@endif
                            </h5> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
