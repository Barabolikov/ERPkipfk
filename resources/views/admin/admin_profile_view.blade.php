@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Профіль користувача</h1>
                            </div>

                        </div>

                </section>
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="card-img-top rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/admin_images/'.$adminData->photo)
                                :url('upload/no-image.png') }}" alt="" width="50%">
                                </div>

                                <h3 class="profile-username text-center">{{ $adminData->name }}</h3>

                                <p class="text-muted text-center">{{ $adminData->username }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Пошта:</b> <a class="float-right">{{ $adminData->email }}1,322</a>
                                    </li>

                                </ul>

                                <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-block"><b>Редагувати профіль</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div><!-- end col -->


        </div>


    </div>
@endsection
