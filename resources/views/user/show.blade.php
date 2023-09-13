@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
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
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-success">Edit User</a>
                        </div>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Surname</td>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr>
                                    <td>Patronymic</td>
                                    <td>{{ $user->patronymic }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $user->gender == '1' ? 'Male' : 'Female' }}</td>
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
