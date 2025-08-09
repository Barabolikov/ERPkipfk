@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb2">
                            <div class="col-sm-6">
                                <h1>Редагування студента</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('student.add') }}" class="btn btn-info">Додати користувача</a>
                            </div>
                        </div>


            <section class="content">



                    <form class="needs-validation" novalidate="" method="post" action=" {{ route('student.update', $editData->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="mb-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $editData->name }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="pip" class="form-label">ПІП</label>
                                    <input type="text" class="form-control" name="pip" id="pip" value="{{ $editData->pip }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="pip" class="form-label">Група</label>
                                    <select class="form-control" name="department_id" id="department_id" required>
                                        <option value="">Оберіть групу</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="tel" class="form-label">Телефон</label>
                                    <input type="text" class="form-control" name="tel" id="tel" value="{{ $editData->tel }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="email" class="form-label">Еmail</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $editData->email }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="telegram" class="form-label">Тelegram</label>
                                    <input type="text" class="form-control" name="telegram" id="telegram" value="{{ $editData->telegram }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="birth_date" class="form-label">Дата народження</label>
                                    <input type="text" class="form-control" name="birth_date" id="birth_date" value="{{ $editData->birth_date }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="pas_ser" class="form-label">Паспорт</label>
                                    <p>Серія:</p> <input type="text" class="form-control" name="pas_ser" id="pas_ser" value="{{ $editData->pas_ser }}" required="">
                                    Номер: <input type="text" class="form-control" name="pas_nom" id="pas_nom" value="{{ $editData->pas_nom }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="gender" class="form-label">Стать</label>
                                    <input type="text" class="form-control" name="gender" id="gender" value="{{ $editData->gender }}" required="">
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div><!-- end col -->
                    <div class="col-md-6 col-xl-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center">Додаткові дані</h3>

                                <div class="text-center">
                                    <p>Фото</p>
                                    <img class="card-img-top rounded-circle" src="{{ (!empty($editData->photo))? url('upload/admin_images/'.$editData->photo)
                                :url('upload/no-image.png') }}" alt="" width="50%">
                                </div>
                                <div class="mb-6">
                                    <label for="ad_obl" class="form-label">Адреса:</label>
                                    <p>Область:</p> <input type="text" class="form-control" name="ad_obl" id="ad_obl" value="{{ $editData->ad_obl }}" required="">
                                    Район: <input type="text" class="form-control" name="ad_ray" id="ad_ray" value="{{ $editData->ad_ray }}" required="">
                                    Район: <input type="text" class="form-control" name="ad_nas" id="ad_nas" value="{{ $editData->ad_nas }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="pilga" class="form-label">Пільга:</label>
                                    <p>Область:</p> <input type="text" class="form-control" name="pilga" id="pilgal" value="{{ $editData->pilga }}" required="">
                                    Район: <input type="text" class="form-control" name="pilga_ser" id="pilga_ser" value="{{ $editData->pilga_ser }}" required="">
                                    Район: <input type="text" class="form-control" name="pilga_nom" id="pilga_nom" value="{{ $editData->pilga_nom }}" required="">
                                </div>
                                <div class="mb-6">
                                    <label for="gurt_roomr" class="form-label">Кімната в гуротжитку</label>
                                    <input type="text" class="form-control" name="gurt_room" id="gurt_room" value="{{ $editData->gurt_room }}" required="">
                                </div>
                                <div class="mb-6 mt-4">
                                    <a href="{{ route('student.update',$editData->id) }}" class="btn btn-primary btn-block"><b>Зберегти профіль</b></a>
                                </div>

                            <!-- /.card-body -->
                        </div>


                    </div><!-- end col -->
                   </div>
                    </form>


            </section>

        <!-- End Page-content -->



@endsection
