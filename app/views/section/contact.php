<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default b-a-2 no-bg no-border b-gray-dark">
                <div class="panel-heading" data-animate-in="fadeInLeftBig,0,fast,100" data-animate-out="fadeOut,0,fast">
                    <h1 class="m-b-1">Contacto</h1>
                    <p class="text-box-text">Llená esta formulario y te responderemos a la brevedad.</p>
                </div>
                <div class="panel-body" class="row m-t-2 m-b-2" data-animate-in="fadeInDown,600,fast,100" data-animate-out="fadeOut,0,fast">                        
                    <form class="ajaxForm contact-form" action="<?= base_url('contacto') ?>">
                        <div class="row m-t-2 m-b-2">
                            <div class="form-group col-xs-12">
                                <label>Nombre completo</label>
                                <input class="form-control" name="name" placeholder="Lionel Messi">
                            </div>
                            <div class="form-group col-xs-12">
                                <label>E-Mail</label>
                                <input class="form-control" name="mail" placeholder="leo@messi.com">
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Asunto</label>
                                <input class="form-control" name="subject" placeholder="Consulta sobre...">
                            </div>

                            <div class="form-group col-xs-12">
                                <label>Mensaje</label>
                                <textarea name="comments" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <button role="button" class="btn btn-gradient m-t-2 btn-block btn-lg"><span class="relative">Enviar</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
