@extends('../admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Shoes Size</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('shoes.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="number" name="shoes_size" class="form-control" id="exampleInputEmail1" placeholder="Enter Shoes Size">
                        </div>
                    </div>

                    <div class="card-footer" style="background-color: transparent !important;">
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
