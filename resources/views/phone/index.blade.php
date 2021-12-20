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
                    <a href="#" data-store_url="{{ route('phone.store') }}" class="btn btn-outline-primary js_add_btn" data-sys_admin="{{ $sys_admin }}">Qo'shish</a>
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
                                        <th>Telefon raqamlar</th>
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
    @include('phone.addEditPhoneModal')


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

        /***
         * Save data
         * Show icon check
         */
        function show_check_icon() {
            let icon = $(document).find('.js_check_icon')
            icon.removeClass('d-none')
            setTimeout(function () {
                icon.addClass("d-none");
            }, 2000);
        }

        function ajax_form_submit(form, table, modal, btn_type) {

            $.ajax({
                url: form.attr('action'),
                type: "POST",
                dataType: "json",
                data: form.serialize(),
                success: (response) => {
                    console.log(response)
                    if(!response.status) {
                        if (response.errors !== 'undefined') {
                            let phone_length = response.errors.phone.length-1
                            if (response.errors.phone[phone_length] == "The phone field is required.") {
                                form.find('.js_phone').addClass('is-invalid')
                                form.find('.js_phone').siblings('.invalid-feedback').html('Telefon raqamni kiriting!')
                            }
                            if (response.errors.phone[phone_length] == "The phone has already been taken.") {
                                form.find('.js_phone').addClass('is-invalid')
                                form.find('.js_phone').siblings('.invalid-feedback').html('Bu raqam bazada mavjud')
                            }
                            if (response.errors.phone[phone_length] == "The phone must be at least 9 characters.") {
                                form.find('.js_phone').addClass('is-invalid')
                                form.find('.js_phone').siblings('.invalid-feedback').html("Telefon 9 xonali raqamdan kam bo'lmasligi kerak.")
                            }
                            if (response.errors.phone[phone_length] == "The phone must not be greater than 12 characters.") {
                                form.find('.js_phone').addClass('is-invalid')
                                form.find('.js_phone').siblings('.invalid-feedback').html('Telefon 12 xonali raqamdan oshmasligi kerak!')
                            }
                        }
                    }

                    if(response.status) {
                        table.draw()
                        if (btn_type === 'save_btn') {
                            show_check_icon()
                        }
                        if(btn_type === 'save_close_btn') {
                            modal.modal('hide')
                        }
                        clear_from(form)
                    }
                },
                error: (response) => {
                    console.log('error: ', response)
                }
            });
        }

        function clear_from(form) {
            form.find("input[type='number']").val('')
            form.find("input[name='_method']").remove()
        }

        function create_table_thead(sys_admin) {
            let thead = ''
            if(sys_admin === 1)
                thead = '<tr>\n' +
                            '<th>№</th>\n' +
                            '<th></th>\n' +
                            '<th>Telefon raqamlar</th>\n' +
                            '<th class="text-right">Harakatlar</th>\n' +
                        '</tr>';
            else
                thead = '<tr>\n' +
                            '<th>№</th>\n' +
                            '<th>Telefon raqamlar</th>\n' +
                        '</tr>';

            $('#datatable thead').html(thead)
        }

        function create_table_columns(sys_admin) {
            if(sys_admin === 1)
                return [
                    {data: 'DT_RowIndex'},
                    {data: 'client'},
                    {data: 'phone'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            else
                return [
                    {data: 'DT_RowIndex'},
                    {data: 'phone'},
                ];
        }



        $(document).ready(function() {

            var modal = $(document).find('#addEditModal');
            var form = modal.find('#js_add_edit_from');

            var sys_admin = $('.js_add_btn').data('sys_admin')
            create_table_thead(sys_admin)

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
                    "url": '{{ route("phone.getPhones") }}',
                },
                columns: create_table_columns(sys_admin),
                columnDefs: [
                    { "visible": false, "targets": 1 }
                ],
                drawCallback: function ( settings ) {
                    if(sys_admin === 1) {
                        let api = this.api();
                        let rows = api.rows({page: 'current'}).nodes();
                        let last = null;
                        let groupColumn = 1
                        api.column(groupColumn, {page: 'current'}).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td class="text-center" colspan="5">' + group + '</td></tr>'
                                );
                                last = group;
                            }
                        });
                    }
                }
            });


            /** Qo'shish btn **/
            $(document).on('click', '.js_add_btn', function(e) {
                e.preventDefault()
                clear_from(form);

                let action = $(this).data('store_url');
                modal.find('.modal-title').html("Telefon raqam qo'shish");
                form.attr('action', action);
                modal.find('.js_form_save_btn').removeClass('d-none')
                modal.modal('show');
            });


            /** Tahrirlash btn **/
            $(document).on('click', '.js_edit_btn', function(e){
                e.preventDefault();

                modal.find('.modal-title').html('Telefon raqam tahrirlash')
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
                            form.find("input[name='old_phone']").val(response.phone.phone)
                            form.find('input[name="phone"]').val(response.phone.phone)
                            modal.find('.js_form_save_btn').addClass('d-none')
                            modal.modal('show')
                        }
                    },
                    error: (response) => {
                        console.log('error: ',response)
                    }
                });
            });


            /** add || edit unit
             ** save close btn
             */
            $(document).on('click', ".js_form_save_close_btn", function(e) {
                e.preventDefault()
                let form = $(this).closest('#js_add_edit_from')
                let btn_type = 'save_close_btn';
                ajax_form_submit(form, table, modal, btn_type)
            });

            /** Save btn **/
            $(document).on('click', '.js_form_save_btn' , function(e) {
                e.preventDefault()
                let form = $(this).closest('#js_add_edit_from')
                let btn_type = 'save_btn';
                ajax_form_submit(form, table, modal, btn_type)
            })
        });
    </script>

@endsection
