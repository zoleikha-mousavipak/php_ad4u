@extends ('layouts.app')

@section('content')

<section id="register" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>
                            <i class="fas fa-user-plus"></i> Create Ad</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" required></textarea>
                            </div>

                            <input type="submit" value="Create" class="btn btn-secondary btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
