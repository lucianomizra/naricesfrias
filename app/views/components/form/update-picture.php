<div class="update-picture" >
    <div class="panel panel-default no-bg b-a-2 b-gray b-dashed m-b-0">
        <div class="panel-body">
                <p class="text-center">
                    <i class="fa fa-3x fa-<?= isset($icon) ? $icon : 'user' ?> text-gray-light text-center m-t-2"></i>
                    <br>
                </p>
                <p class="text-center">Arrastra o <a href="javascript: void(0)"> selecciona</a> un archivo para subir.</p>
                <p class="small text-center">JPG, GIF, PNG. <br> 20MB como máximo. <br> Recomendamos imagenes de <?= $w ?>x<?= $h ?>px o proporcionalmente mayor.</p>
                <p></p>
                <div class="cropme" data-width="<?= $w ?>" data-height="<?= $h ?>" style="
                    width: <?= $w ?>px;
                    max-width: calc(100% - 40px);
                    max-height: <?= $h ?>px;
                    margin: auto;
                    overflow-y: auto">
                <?php if ($picture): ?><img src="<?= $picture ?>"><?php endif ?>
                    </div>
                <input type="text" class="cropmeInput errorToast" <?php if (isset($id_file)): ?> value="<?= $id_file ?>"<?php endif ?> name="<?= $name ?>" id="<?= $name ?>" style="display:none" >
        </div>
    </div>
    <div class="clearfix"></div>
    <script src="<?= layout('js/vendor/jquery.SimpleCropper.js') ?>"></script>
    <script src="<?= layout('js/vendor/jquery.Jcrop.js') ?>"></script>
    <link rel="stylesheet" href="<?= layout('css/query.Jcrop.css') ?>">
</div>
