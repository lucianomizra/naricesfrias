<form class="form-vertical form-account-details ajaxForm" action="<?= base_url('user/account') ?>">
    <div class="card">
        <div class="card-body">
            <legend>Datos de usuario</legend>
            <div class="row">
                <?php /*<div class="col-lg-4">
                    <!-- <label class="control-label">Avatar</label> -->
                    <? $this->load->view('components/form/update-picture', [
                    	'picture'=> $this->user->file ? thumb($this->user->file, 210, 233) : false, 'name'=>'file', 'w'=>210, 'h'=>233]) ?>
                    </div> */?>

                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><span class="text-danger">*</span> Nombre</label>
                                    <input type="text" name="first_name" class="form-control errorToast" value="<?= $this->user->first_name ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><span class="text-danger">*</span> Apellido</label>
                                    <input type="text" name="last_name" class="form-control errorToast" value="<?= $this->user->last_name ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">E-Mail</label>
                                    <input type="mail" name="email" class="form-control" disabled value="<?= $this->user->mail ?>">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="clearfix m-b-3"></div>

                    <div class="col-md-12">
                        <fieldset>
                            <legend>Datos personales</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"></span> Sexo</label>
                                        <select name="gender" class="form-control errorToast">
                                            <option value="">Seleccionar</option>
                                            <option value="m" <?php if ($this->user->gender == 'm'): ?>selected<?php endif ?>>Hombre</option>
                                            <option value="f" <?php if ($this->user->gender == 'f'): ?>selected<?php endif ?>>Mujer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de nacimiento</label>

                                        <input type="text" name="birthday" class="form-control input-date" value="<?= is_date($this->user->birthday) ? change_format($this->user->birthday, 'Y-m-d', 'd/m/Y') : '' ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Teléfono</label>

                                        <input type="phone" name="phone" class="form-control" value="<?= $this->user->phone ?>">
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group m-t-2">
                                        <legend>¿Qué datos deseas mostrar publicamente en tu perfil?</legend>
                                        <!-- <label class="control-label">Selecciona</label> -->
                                        <div>
                                            <?php $public_data = [
                                            'first_name' => 'Nombre',
                                            'last_name' => 'Apellido',
                                            'phone' => 'Teléfono',
                                            'mail' => 'Mail',
                                            // 'gender' => 'Sexo',
                                            // 'age' => 'Edad',
                                            // 'birthday' => 'Cumpleaños',
                                            ]; ?>
                                            <div class="row">
                                                <?php foreach ($public_data as $key => $t): ?>
                                                    <div class="col-xs-6 col-md-3">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" <?php if ($this->UserM->ShowInProfile($key)): ?>checked="checked"<?php endif ?> name="public_data[]" class="errorToast" value="<?= $key ?>"> <?= $t ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                </div>
                <!-- END All Forms -->


                <script src="<?= layout('spin/vendor/js/moment.min.js') ?>"></script>
                <script src="<?= layout('spin/vendor/js/daterangepicker.min.js') ?>"></script>
                <link rel="stylesheet" href="<?= layout('css/daterangepicker.css') ?>">
                <script>
                    $(document).ready(function() {
                       $('.form-account-details .input-date').daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        locale: {
                            format: 'DD/MM/YYYY'
                        }
                    },
                    function(start, end, label) {
                        var years = moment().diff(start, 'years');
                    });
                   });
               </script>


           </div>

           <div class="card-footer text-xs-right">
            <button type="submit" class="btn btn-primary">Guardar datos</button>
            </div>
    </div>

</div>
</form>
