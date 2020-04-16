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
                            <h2>{{ $type->title }}</h2>
                            <h5>{{ $type->status }}
                                {{-- <h5>@if({{ $type->status == 1 ? True:False }})@endif
                                   </h5> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
