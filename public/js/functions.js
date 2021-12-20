
$(document).ready(function() {


    /** Phones **/
    $('#addEditModal button[data-dismiss="modal"]').click(function () {

        let form = $('#js_add_edit_from')

        let phone = form.find('.js_phone')
        phone.val('')
        phone.removeClass('is-invalid')
        phone.siblings('.invalid-feedback').addClass('valid-feedback')

        /** client **/
        let full_name = form.find('.js_full_name')
        full_name.val('')
        full_name.removeClass('is-invalid')
        full_name.siblings('.invalid-feedback').addClass('valid-feedback')

        let username = form.find('.js_username')
        username.val('')
        username.removeClass('is-invalid')
        username.siblings('.invalid-feedback').addClass('valid-feedback')

        let password = form.find('.js_password')
        password.val('')
        password.removeClass('is-invalid')
        password.siblings('.invalid-feedback').addClass('valid-feedback')
    })


    $('.js_phone').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_full_name').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_username').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_password').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

})
