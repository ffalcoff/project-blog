@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование тега</h1>
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
                    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>Название</td>
                                </tr>
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td><input type="text" class="form-control" name="title" placeholder="Название тега" value="{{ $tag->title }}"></td>
                                </tr>
                                </tbody>
                            </table>
                            @error('title')
                                <div class="text-danger">Это поле обязательно для заполнения</div>
                            @enderror
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
