@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментраии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
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
                    <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
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
                                    <td>{{ $comment->id }}</td>
                                    <td><textarea class="form-control" name="message" >{{ $comment->message }}</textarea></td>
                                </tr>
                                </tbody>
                            </table>
                            @error('message')
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
