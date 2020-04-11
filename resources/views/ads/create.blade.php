@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('site.ad_new') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ads.store') }}">
                        @csrf
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="title"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.category') }}</label>
                            <div class="col-md-6">
                                <select id="type" name="category" class="form-control" required>
                                    <option value="">{{ __('site.please_select') }}</option>
                                    @foreach($categoriesList as $category)
                                    <option value="{{ $category->id }}">{{ __('site.category_'.$category->title) }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.type') }}</label>
                            <div class="col-md-6">
                                <select id="type" name="type" class="form-control" required>
                                    <option value="">{{ __('site.please_select') }}</option>
                                    @foreach($typesList as $type)
                                    <option value="{{ $type->id }}">{{ __('site.type_'.$type->title) }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description"
                                    class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description"
                                    class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location"
                                class="col-md-4 col-form-label text-md-right">{{ __('site.my_location') }}</label>
                            <div class="col-md-6">
                                <a href="#" id="locationButton"
                                    class="btn btn-primary">{{ __('site.get_location') }}</a>
                                <iframe class="hidden mt-3 w-100" id="userLocation" src=""></iframe>
                                <input type="hidden" name="latitude" id="userLatitude" />
                                <input type="hidden" name="longitude" id="userLongitude" />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="adSubmitButton" type="submit" class="btn btn-primary" disabled>
                                    {{ __('site.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
