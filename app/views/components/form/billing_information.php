<form class="ajaxForm billing_information" action="<?= base_url('user/psn-information') ?>">
    <input type="hidden" value="<?= $this->namespace ?>" name="ns">
        <?php if (!$adult): ?>
            <div class="col-xs-12">
                <legend class="text-white">Tus datos personales</legend>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <label class="control-label"><span class="text-danger">*</span> DNI</label>
                <input class="form-control errorToast" placeholder="30000000" name="dni">
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <label class="control-label"><span class="text-danger">*</span> Teléfono</label>
                <input class="form-control errorToast" placeholder="011 54 4444-4444" name="phone">
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="profile-edit-first-name" class="control-label"><span class="text-danger">*</span> País</label>
                    <select name="id_country" class="form-control">
                        <?php foreach ($countries as $key => $c): ?>
                            <option value="<?= $c->id_country ?>"><?= $c->country ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="profile-edit-first-name" class="control-label"><span class="text-danger">*</span> Provincia</label>
                    <input type="province" name="province" class="form-control">
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label class="control-label"><span class="text-danger">*</span> Dirección</label>
                <input class="form-control errorToast" placeholder="Rivadavia 2000" name="address">
            </div>
            <div class="form-group col-xs-6 col-xs-12">
                <label class="control-label">Piso - Departamento</label>
                <input class="form-control errorToast" placeholder="5° C" name="address_more">
            </div>

            <div class="form-group col-xs-6 col-xs-12">
                <label class="control-label"><span class="text-danger">*</span> Codígo posta</label>
                <input class="form-control errorToast" placeholder="C1033AAW" name="postal_code">
            </div>

            <div class="col-xs-12">
                 <p class="text-box-text text-info">Como menor de edad deberás completar el siguiente formulario con los datos de un mayor de edad responsable.</p>
                 <br>
                <legend class="text-white">Datos del responsable</legend>
            </div>
        <?php endif ?>

        <div class="form-group col-sm-6 col-xs-12">
            <label class="control-label"><span class="text-danger">*</span> Nombre</label>
            <input class="form-control errorToast" placeholder="Lionel Andrés" name="name_legal" value="<?= $this->user->name_legal ?>">
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="control-label"><span class="text-danger">*</span> Apellido</label>
            <input class="form-control errorToast" placeholder="Messi Cuccittini" name="lastname_legal" value="<?= $this->user->lastname_legal ?>">
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="profile-edit-first-name" class="control-label"><span class="text-danger">*</span>  Sexo</label>
                <select name="gender_legal" class="form-control errorToast">
                    <option value="">Seleccionar</option>
                    <option value="0" <?php if ($this->user->gender_legal == '0'): ?>selected<?php endif ?>>Hombre</option>
                    <option value="1" <?php if ($this->user->gender_legal == '1'): ?>selected<?php endif ?>>Mujer</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label"><span class="text-danger">*</span> Fecha de nacimiento</label>

                <input type="text" name="birthday_legal" class="form-control input-date-birthday_legal errorToast" value="<?= is_date($this->user->birthday_legal) ? change_format($this->user->birthday_legal, 'Y-m-d', 'd/m/Y') : '' ?>">

                <script src="<?= layout('spin/vendor/js/moment.min.js') ?>"></script>
                <script src="<?= layout('spin/vendor/js/daterangepicker.min.js') ?>"></script>
                <script>
                    $(document).ready(function() {
                         $('.input-date-birthday_legal').daterangepicker({
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
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="profile-edit-first-name" class="control-label"><span class="text-danger">*</span> País</label>
                <select name="id_country_legal" class="form-control errorToast">
                    <option value="">Seleccionar</option>
                    <?php foreach ($countries as $key => $c): ?>
                        <option value="<?= $c->id_country ?>" <?php if ($this->user->id_country_legal == $c->id_country): ?>selected<?php endif ?>><?= $c->country ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="profile-edit-first-name" class="control-label"><span class="text-danger">*</span> Provincia</label>
                <input type="text" name="province_legal" placeholder="CABA" class="form-control errorToast" value="<?= $this->user->province_legal ?>">
            </div>
        </div>


        <div class="form-group col-xs-12">
            <label class="control-label"><span class="text-danger">*</span> Dirección</label>
            <input class="form-control errorToast" placeholder="Rivadavia 2000" name="address_legal" value="<?= $this->user->address_legal ?>">
        </div>
        <div class="form-group col-xs-6">
            <label class="control-label">Piso - Departamento</label>
            <input class="form-control errorToast" placeholder="5° C" name="address_more_legal" value="<?= $this->user->address_more_legal ?>">
        </div>

        <div class="form-group col-xs-6">
            <label class="control-label"><span class="text-danger">*</span> Codígo posta</label>
            <input class="form-control errorToast" placeholder="C1033AAW" name="postal_code_legal" value="<?= $this->user->postal_code_legal ?>">
        </div>

        <div class="form-group col-xs-6">
            <label class="control-label"><span class="text-danger">*</span> Teléfono</label>
            <input class="form-control errorToast" placeholder="011 54 4444-4444" name="phone_legal" value="<?= $this->user->phone_legal ?>">
        </div>

        <div class="form-group col-xs-6">
            <label class="control-label"><span class="text-danger">*</span> DNI</label>
            <input class="form-control errorToast" placeholder="00000000" name="dni_legal" value="<?= $this->user->dni_legal ?>">
        </div>

        <?/* <div class="col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="errorToast" name="terms" value="1"> Los datos privados corresponden a un mayor de edad.</a></small>
                </label>
            </div>
        </div>*/?>
        
    <?php if ($this->namespace == 'single'): ?>
        <div class="form-group col-xs-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="errorToast" name="terms" value="1"> <small>Acepto ser agregado a un grupo de WhatsApp para coordinar partidos de una mejor forma.</small>
                </label>
            </div>
        </div>

        <div class="clearfix"></div>
        <button class="btn btn-success m-t-3 btn-block btn-lg"><span class="relative">Continuar</span></button>
        </form>
    <?php else: ?>
    </div>

    <input type="hidden" class="errorToast" name="terms" value="1">

    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary">Guardar perfil</button>
    </div>
    <!-- START Panel Footer -->
    <?php endif ?>
