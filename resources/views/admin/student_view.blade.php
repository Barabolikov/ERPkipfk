@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb2">
                            <div class="col-sm-6">
                                <h1>Список користувачів</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('user.add') }}" class="btn btn-info">Додати користувача</a>
                            </div>
                        </div>


            <section class="content">


                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="card-img-top rounded-circle" src="{{ (!empty($editData->photo))? url('upload/admin_images/'.$editData->photo)
                                :url('upload/no-image.png') }}" alt="" width="50%">
                                </div>

                                <h3 class="profile-username text-center">{{ $editData->pip }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Група:</b> <p class="float-right">{{ $editData->group->name}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Телефон:</b> <p class="float-right">{{ $editData->tel }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Пошта:</b> <p class="float-right">{{ $editData-> birth_email}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Дата народження:</b> <p class="float-right">{{ $editData-> birth_date}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Поспорт серія:</b> <p class="float-right">{{ $editData->pas_ser }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Поспорт номер:</b> <p class="float-right">{{ $editData->pas_nom }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Стать:</b> <p class="float-right">{{ $editData->gender }}</p>
                                    </li>
                                </ul>

                                <a href="{{ route('student.edit',$editData->id) }}" class="btn btn-primary btn-block"><b>Редагувати профіль</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div><!-- end col -->
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center">Додаткові дані</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Telegram:</b> <p class="float-right">{{ $editData->group->telegram}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Область:</b> <p class="float-right">{{ $editData->ad_obl }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Район:</b> <p class="float-right">{{ $editData->ad_ray }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Населений пункт:</b> <p class="float-right">{{ $editData->ad_nas }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Кімната в гуртожитку:</b> <p class="float-right">{{ $editData->gurt_room }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Пільга:</b> <p class="float-right">{{ $editData->pilga }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Пільга серія:</b> <p class="float-right">{{ $editData->pilga_ser }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Пільга номер:</b> <p class="float-right">{{ $editData->pilga_nom }}</p>
                                    </li>

                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div><!-- end col -->

                </div>

            </section>

        <!-- End Page-content -->



@endsection
