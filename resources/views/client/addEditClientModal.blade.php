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

                <input type="hidden" name="old_username">
                <div class="modal-body">
                    <div class="row needs-validation">
                       <div class="col-md-8">
                           <label>Ism familiya</label>
                           <div class="form-group">
                               <input type="text" name="full_name" class="form-control js_full_name" />
                               <div class="invalid-feedback">Ism familiyani kiriting!</div>
                           </div>
                       </div>
                        <div class="col-md-4">
                            <label>Active</label>
                            <div class="form-group">
                                <select name="active" class="form-control js_active">
                                    <option value="1">Active</option>
                                    <option value="0">No active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Login</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control js_username" />
                                <div class="invalid-feedback">Loginni kiriting!</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Parol</label>
                            <div class="form-group">
                                <input type="text" name="password" class="form-control js_password" />
                                <div class="invalid-feedback">Parolni kiriting!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer position-relative">
                    <input type="submit" class="btn btn-outline-primary btn-sm js_form_save_close_btn" value="Saqlash va chiqish" />
                    <button type="button" class="btn btn-outline-secondary js_form_close_btn" data-dismiss="modal">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>
