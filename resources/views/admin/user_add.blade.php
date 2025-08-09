@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Додавання користувача</h1>
                            </div>

                        </div>

                </section>
                <div class="row">
                    <div class="col-md-12 col-xl-8">

                        <div class="card">
                            <div class="card-body">


                                <form class="needs-validation" novalidate="" method="post" action=" {{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"  placeholder="Ваше ім'я" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         ndforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="login" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="username" class="form-label">Пароль</label>
                                                <input type="password" class="form-control" name="password" id="password" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="username" class="form-label">Фото</label>
                                            <div class="mb-6">
                                                <img id="showImage" class="card-img-top rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/admin_images/'.$adminData->photo)
                                                :url('upload/no-image.png') }}" alt="" width="50%">
                                                <div class="form-group">

                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 100px; text-align: center;">
                                        <div>
                                            <button class="btn btn-info btn-rounded waves-effect waves-light" type="submit">Створити</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- end col -->



        </div>
        <!-- End Page-content -->


    </div>
<script type="text/javascript">
     $(document).ready(function (){
         $('#photo').change(function (e) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $('#showImage').attr('src',e.target.result)
             }
             reader.readAsDataURL(e.target.files[0]);
         })
     })
</script>
@endsection
