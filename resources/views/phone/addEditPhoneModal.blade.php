<div class="modal fade text-left" id="addEditModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add & edit shop</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="js_add_edit_from">
                @csrf

                <input type="hidden" name="old_phone">
                <div class="modal-body">
                    <div class="needs-validation">
                        <label>Telefon raqam</label>
                        <div class="form-group">
                            <input type="number" name="phone" class="form-control js_phone" />
                            <div class="invalid-feedback">Telefon raqamni kiriting!</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer position-relative">
                    <i class="fas fa-check check-success-icon d-none js_check_icon"></i>
                    <button type="button" class="btn btn-outline-success btn-sm js_form_save_btn">Saqlash</button>
                    <button type="button" class="btn btn-outline-primary btn-sm js_form_save_close_btn">Saqlash va chiqish</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm js_form_close_btn" data-dismiss="modal">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>
