@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Тег</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Главная</li>
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
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex p3">
            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary mr-3">Редактировать</a>
            <form action="{{ route('tag.delete', $tag->id) }}" method="POST">
              @csrf
              @method('Delete')
              <input type="submit" value="Удалить" class="btn btn-danger">
            </form>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Наименование</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>{{ $tag->id }}</th>
                  <th>{{ $tag->title }}</th>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</section>
@endsection