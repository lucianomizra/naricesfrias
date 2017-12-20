<?php $n=0; ?>
<header>
    <div class="container">
        <a href="<?= base_url() ?>" class="app-logo"><figure><img src="<?= layout() ?>imgs/logo.png" alt="Naricesfrias.org"></figure></a>
        <nav class="pull-right hidden-sm-down">
            <ul class="list-inline text-center principal-nav">
                <li><a data-rmenu-add="<? $n++; echo $n; ?>" href="<?= base_url() ?>">Mapa</a></li>
                <li><a data-rmenu-add="<? $n++; echo $n; ?>" href="<?= base_url() ?>pets">Mascotas</a></li>
                <!-- <li><a data-rmenu-add="<? $n++; echo $n; ?>" href="<?= base_url() ?>blog">Blog</a></li> -->
                <!-- <li><a href="<?= base_url() ?>comunidad">Comunidad</a></li> -->
                <? if(!$this->user) : ?>
                <li><a data-rmenu-add="<? $n++; echo $n; ?>" data-toggle="modal" data-target="#sign-modal" href="#signin">Login</a></li>
                <li><a data-rmenu-add="<? $n++; echo $n; ?>" data-toggle="modal" data-target="#sign-modal" href="#signup">Registro</a></li>
                <? else: ?>
                <li class="active"><a data-rmenu-add="<? $n++; echo $n; ?>" href="<?= base_url() ?>user/account"><?= $this->user->user_name ?> <i class="fa fa-gear"></i></a></li>
                <li class="active"><a data-rmenu-add="<? $n++; echo $n; ?>" href="<?= base_url() ?>logout" class="pageRender"><i class="fa fa-sign-out"></i></a></li>
                <? endif; ?>
            </ul>
        </nav>
    </div>
    <div class="rmenu-btn"><div class="bars"></div></div>
    <div class="clearfix"></div>
</header>