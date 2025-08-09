@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Додавання групи</h1>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="row">
                    <div class="col-md-12 col-xl-8">

                        <div class="card">
                            <div class="card-body">


                                <form class="needs-validation" novalidate="" method="post" action=" {{ route('group.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="name" class="form-label">Назва групи</label>
                                                <input type="text" class="form-control" id="name" name="name"  placeholder="Введыть назву" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Випадаючий список для вибору відділення -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <label for="department_id">Відділення:</label>
                                                <select class="form-control" name="department_id" id="department_id" required>
                                                    <option value="">Оберіть відділення</option>
                                                    @foreach($departments as $department)
                                                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 20px;">
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

@endsection
