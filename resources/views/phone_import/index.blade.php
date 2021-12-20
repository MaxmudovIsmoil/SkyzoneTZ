@extends('layouts.app')

@section('style')
    <!-- BEGIN: Vendor CSS-->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">--}}
    <!-- END: Vendor CSS-->
@endsection

@section('style2')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/app-user.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- list section start -->
            <div class="card p-1">
                @if(session('status'))
                    <h4 class="alert alert-success text-center p-1">
                        {{ session('status') }}
                    </h4>
                @endif
                <h4>Fayl yuklash</h4>
                <form action="{{ route('phoneImport.store') }}" method="POST" class="phone-import" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="phone-file" name="file" required="">
                            <label class="custom-file-label" for="phone-file">Phone file</label>
                        </div>
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" name="save" class="btn btn-primary" value="Saqlash">
                </form>

            </div>
            <!-- list section end -->
        </section>
        <!-- users list ends -->
    </div>
    <!-- END: Content-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection


@section('script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/scripts/forms/form-validation.js') }}"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('js/functions.js') }}"></script>
@endsection
