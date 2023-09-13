@extends('../admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Colors</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('colors.create') }}" class="btn btn-outline-primary">Add Color</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                      <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Color</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('colors.show', $item->id) }}">{{ $item->title }}</a></td>
                                        <td><div style="width: 15px; height: 15px; background: {{ '#'.$item->title}}"></div></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
