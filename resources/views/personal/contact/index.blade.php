@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Форма</h1>
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

                        <form class="w-50" method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label><br>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label><br>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="message">Message:</label><br>
                                <textarea class="form-control" id="message" name="message"></textarea><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
