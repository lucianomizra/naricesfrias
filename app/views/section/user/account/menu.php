<ul class="list-group text-right">
    <li class="list-group-item list-group-item-action <?php if ($this->subview == 'publicdata'): ?>active<?php endif ?>"><a href="<?= base_url('user/account/data') ?>">Datos personales</a></li>
    <li class="list-group-item list-group-item-action <?php if ($this->subview == 'change_password'): ?>active<?php endif ?>"><a href="<?= base_url('user/account/change-password') ?>">Cambiar contraseña</a></li>
    <li class="list-group-item list-group-item-action <?php if ($this->subview == 'my-pets'): ?>active<?php endif ?>"><a href="<?= base_url('user/account/my-pets') ?>">Mascotas publicadas</a></li>

</ul>

