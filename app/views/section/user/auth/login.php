<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="full-height vertical-center">
                <div>
                    <div data-animate-in="fadeInLeftBig,0,fast,100" data-animate-out="fadeOutLeft,0,fast">
                        <? $this->load->view('components/form/sign-in') ?>
                    </div>
                    <div class="panel-footer b-a-0 b-r-a-0 no-bg no-border" data-animate-in="fadeInDown,1000,fast,100" data-animate-out="fadeOut,0,fast">
                        <a href="<?= base_url('forgot') ?>">Recuperar contraseña</a>
                        <a href="<?= base_url('register') ?>" class="pull-right">No tengo cuenta aún</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
