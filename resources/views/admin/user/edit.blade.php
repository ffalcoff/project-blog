@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-auto">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>Имя</td>
                                    <td>Email</td>
                                    <td>Role</td>
                                </tr>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя пользователя" value="{{ $user->name }}"></td>
                                    <td><input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email пользователя" value="{{ $user->email }}"></td>
                                    <td>
                                        <select class="form-control" name="role">
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ $id == $user->role ? ' selected' : ''}}>
                                                    {{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary" value="Изменить">
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
