<div class="panel panel-default b-a-2 b-gray-dark user-profile">
    <div class="panel-body">
        <div class="avatar avatar-image avatar-lg center-block loaded">
            <img class="center-block m-t-1 m-b-2" src="<?= user_thumb( $user->file, 189,210 ) ?>" alt="<?= $user->name ?>">

            <i class="avatar-status avatar-status-bottom bg-<?= $user->activity_state ?> b-brand-gray-darker"></i>
        </div>
        <h4 class="text-center"><span><?= $user->name ?></span></h4>
             <p class="m-t-0 text-center"><span> <i class="fa fa-trophy yellow-gradient"></i>
                                <a href="<?= base_url('group/'.$user->id_current_league) ?>">Grupo <?= $user->league ?></a> - <a href="<?= base_url('division/'.$user->id_current_division) ?>">División <span class="division"><?= $user->division ?></span></a></span></p>

            <div class="text-center">
                <div class="btn-group m-t-2 m-b-2" role="group" aria-label="...">
                    <a href="<?= base_url('user/profile/'.$user->id_user) ?>" class="btn btn-default" data-toggle="modal" data-target=".modal-profile">Ver perfil</a>
                </div>

            </div>
    </div>
</div>
