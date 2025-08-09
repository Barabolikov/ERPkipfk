@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <section class="content-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Профіль користувача</h1>
                        </div>

                    </div>

            </section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Сторінка створення пароля </h4><br><br>
                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                @endforeach

                            @endif
                            <form method="post" action="{{ route('update.password') }}" >
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Старий пароль</label>
                                    <div class="col-sm-9">
                                        <input name="oldpassword" class="form-control" type="password"   id="oldpassword">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Новий пароль</label>
                                    <div class="col-sm-9">
                                        <input name="newpassword" class="form-control" type="password"  id="newpassword">
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Підтвердити пароль</label>
                                    <div class="col-sm-9">
                                        <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                                    </div>
                                </div>
                                <!-- end row -->
               <input type="submit" class="btn btn-info waves-effect waves-light " value="Створити пароль">
                            </form>
                     </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

@endsection
