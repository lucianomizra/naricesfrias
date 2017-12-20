<form class="form-vertical form-account-details ajaxForm" action="<?= base_url('user/account/change_password') ?>">
	<div class="card card-default b-a-0">
        <div class="card-body">
            <div class="row">


                <div class="form-group col-xs-12">
                    <label class="control-label"><span class="text-danger">*</span> Contraseña actual</label>
                    <input class="form-control errorToast" placeholder="•••••" type="password" name="current_password">
                </div>
                <div class="form-group col-xs-12">
                    <label class="control-label"><span class="text-danger">*</span> Nueva Contraseña</label>
                    <input class="form-control errorToast" placeholder="•••••" type="password" name="password">
                </div>
                <div class="form-group col-xs-12">
                    <label class="control-label"><span class="text-danger">*</span> Repetir Contraseña</label>
                    <input class="form-control errorToast" placeholder="•••••" type="password" name="repeat_password">
                </div>
                <div class="clearfix"></div>
                

            </div>


        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </div>
    </div>
</form>
