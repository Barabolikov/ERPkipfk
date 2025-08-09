@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Редагування відділення</h1>
                            </div>

                        </div>

                </section>
                <div class="row">
                    <div class="col-md-12 col-xl-8">

                        <div class="card">
                            <div class="card-body">


                                <form class="needs-validation" novalidate="" method="post" action={{ route('department.update', $editData->id) }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="name" class="form-label">Назва групи</label>
                                                <input type="text" class="form-control" id="name" name="name"   value="{{ $editData->name }}" required="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin: 20px;">
                                        <div>
                                            <button class="btn btn-info btn-rounded waves-effect waves-light" type="submit">Зберегти</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- end col -->


        </div>
        <!-- End Page-content -->


    </div>

@endsection
