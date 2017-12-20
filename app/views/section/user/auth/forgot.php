<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="full-height vertical-center">
                <div>  
                    <div>
                        <div data-animate-in="fadeInDown,600,fast,100" data-animate-out="fadeOut,0,fast">
                            <div>
                                <h1 class="m-b-1">Recuperar contraseña</h1>
                                <p class="text-box-text">Podemos ayudarlo a restablecer su contraseña utilizando su dirección de correo electrónico asociada a su cuenta.</p>
                            </div>
                            <form class="ajaxForm forgot-form" method="POST" action="<?= $url_forgot ?>">
                                <?php if ($ruser): ?>
                                    <div class="row m-t-2 m-b-2">
                                        <div class="form-group col-xs-12">
                                            <label class="control-label">Mail</label>
                                            <input class="form-control disabled" disabled value="<?= $ruser->mail ?>" >
                                        </div>

                                        <div class="form-group col-xs-12">
                                            <label class="control-label"><span class="text-danger">*</span> Nueva Contraseña</label>
                                            <input class="form-control errorToast" placeholder="•••••" type="password" name="password">
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <label class="control-label"><span class="text-danger">*</span> Repetir Contraseña</label>
                                            <input class="form-control errorToast" placeholder="•••••" type="password" name="repeat_password">
                                        </div>
                                    </div>

                                    <button role="button" class="btn btn-success m-t-2 btn-block"><span class="relative">Cambiar contraseña</span></button>
                                <?php else: ?>
                                    <div class="row m-t-2 m-b-2">
                                        <div class="form-group col-xs-12">
                                            <label class="control-label">E-Mail</label>
                                            <input class="form-control errorToast" name="user" placeholder="mail@mail.com">
                                        </div>
                                    </div>

                                    <button role="button" class="btn btn-primary m-t-2 btn-block"><span class="relative">Recuperar contraseña</span></button>
                                <?php endif ?>
                            </form>
                        </div>
                        <div class="panel-footer b-a-0 b-r-a-0 no-bg no-border" data-animate-in="fadeInDown,1000,fast,100" data-animate-out="fadeOut,0,fast">
                            <a href="<?= base_url('register') ?>">No tengo cuenta aún</a>
                            <a href="<?= base_url('login') ?>" class="pull-right">Ya tengo cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
