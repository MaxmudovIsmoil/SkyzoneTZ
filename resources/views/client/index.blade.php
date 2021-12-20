@extends('layouts.app')

@section('style')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
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
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="form-modal-ex">
                    <!-- add btn click show modal -->
                    <a href="#" data-store_url="{{ route('client.store') }}" class="btn btn-outline-primary js_add_btn">Qo'shish</a>
                </div>

            <!-- users list start -->
                <section class="app-user-list">
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="table table-striped" id="datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>№</th>
                                        <th>Ism familiya</th>
                                        <th>Login</th>
                                        <th>Active</th>
                                        <th class="text-right">Harakatlar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- list section end -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Edit Modal -->
    @include('client.addEditClientModal')


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection


@section('script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/scripts/forms/form-validation.js') }}"></script>
    <!-- END: Page JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>

        function clear_from(form) {
            form.find(".js_full_name").val('')
            form.find(".js_username").val('')
            form.find('.js_username').attr('disabled', false)
            form.find(".js_password").val('')
            let active = form.find('.js_active option')
            $.each(active, function(index, value) {
                $(value).removeAttr('selected')
            })

            form.find("input[name='_method']").remove()
        }


        $(document).ready(function() {

            var modal = $(document).find('#addEditModal');
            var form = modal.find('#js_add_edit_from');

            var table = $('#datatable').DataTable({
                paging: true,
                pageLength: 10,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                language: {
                    search: "",
                    searchPlaceholder: " Izlash...",
                    sLengthMenu: "Кўриш _MENU_ тадан",
                    sInfo: "Ko'rish _START_ dan _END_ gacha _TOTAL_ jami",
                    emptyTable: "Ma'lumot mavjud emas",
                    sInfoFiltered: "(Jami _MAX_ ta yozuvdan filtrlangan)",
                    sZeroRecords: "Hech qanday mos yozuvlar topilmadi",
                    oPaginate: {
                        sNext: "Keyingi",
                        sPrevious: "Oldingi",
                    },
                },
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{{ route("client.getClients") }}',
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'full_name'},
                    {data: 'username'},
                    {data: 'active'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });


            /** Qo'shish btn **/
            $(document).on('click', '.js_add_btn', function(e) {
                e.preventDefault()
                clear_from(form);

                let action = $(this).data('store_url');
                modal.find('.modal-title').html("Mijoz qo'shish");
                form.attr('action', action);
                modal.find('.js_form_save_btn').removeClass('d-none')
                modal.modal('show');
            });


            /** Tahrirlash btn **/
            $(document).on('click', '.js_edit_btn', function(e){
                e.preventDefault();

                modal.find('.modal-title').html('Mijoz tahrirlash')
                let url = $(this).data('one_data_url')
                let update_url = $(this).data('update_url')
                form.attr('action', update_url)

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: (response) => {

                        clear_from(form);
                        form.append("<input type='hidden' name='_method' value='PUT'>");
                        if(response.status) {
                            form.find("input[name='old_username']").val(response.client.username)
                            form.find('.js_full_name').val(response.client.full_name)
                            form.find('.js_username').val(response.client.username)
                            form.find('.js_username').attr('disabled', true)
                            modal.find('.js_form_save_btn').addClass('d-none')
                            let active = form.find('.js_active option')
                            $.each(active, function(index, value) {
                                if($(value).val() == response.client.active) {
                                    $(value).attr('selected', true)
                                }
                            })
                            modal.modal('show')
                        }
                    },
                    error: (response) => {
                        console.log('error: ',response)
                    }
                });
            });


            /** Save btn form submit **/
            $(document).on('submit', '#js_add_edit_from' , function(e) {
                e.preventDefault()
                let form = $(this)

                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    dataType: "json",
                    data: form.serialize(),
                    success: (response) => {
                        console.log(response)
                        if(!response.status) {
                            if (response.errors !== 'undefined') {

                                if (response.errors.full_name == "The full name field is required.") {
                                    form.find('.js_full_name').addClass('is-invalid')
                                    // form.find('.js_phone').siblings('.invalid-feedback').html('Ism familiyani kiriting!')
                                }

                                if(response.errors.username == "The username field is required.") {
                                    form.find('.js_username').addClass('is-invalid')
                                    form.find('.js_username').siblings('.invalid-feedback').html('Loginni kiriting!')
                                }

                                if (response.errors.username == "The username has already been taken.") {
                                    form.find('.js_username').addClass('is-invalid')
                                    form.find('.js_username').siblings('.invalid-feedback').html('Bunday login bazada mavjud')
                                }

                                if (response.errors.password == "The password field is required.") {
                                    form.find('.js_password').addClass('is-invalid')
                                    form.find('.js_password').siblings('.invalid-feedback').html("Parolni kiriting!")
                                }
                                if (response.errors.password == "The password must be at least 6 characters.") {
                                    form.find('.js_password').addClass('is-invalid')
                                    form.find('.js_password').siblings('.invalid-feedback').html("parol 6 xonali belgidan kam bo'lmasligi kerak.")
                                }
                            }
                        }

                        if(response.status) {
                            table.draw()
                            modal.modal('hide')
                            clear_from(form)
                        }
                    },
                    error: (response) => {
                        console.log('error: ', response)
                    }
                });
            })
        });
    </script>

@endsection
