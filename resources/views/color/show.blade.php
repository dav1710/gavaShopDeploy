@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Color</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-4">
                        <div class="mr-2">
                            <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-outline-success">Edit Color</a>
                        </div>
                        <form action="{{ route('colors.destroy', $color->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $color->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $color->title }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
