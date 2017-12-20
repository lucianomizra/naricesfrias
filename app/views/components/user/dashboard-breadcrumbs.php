<?php if (isset($breadcrumb) && $breadcrumb): ?>
    <div class="dashboard-breadcrumbs">
        <div class="sub-navbar sub-navbar__header-breadcrumbs">
            <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb m-t-3 m-b-2">
                <li class="breadcrumb-item" data-animate-in="fadeIn,0,fast,100">
                    <a class="current-parent" href="<?= base_url('dashboard') ?>">
                        <i class="fa fa-fw fa-home"></i>
                    </a>
                </li>
                <?php foreach ($breadcrumb as $key => $item): ?>
                    <?php if ($key < count($breadcrumb)-1 ): ?>
                        <li class="breadcrumb-item" data-animate-in="fadeInLeft,<?= 100 * $key * 3 ?>,fast,100">
                            <?php if (isset($item['href'])): ?><a href="<?= $item['href'] ?>"><?php else: ?><span><?php endif ?>
                                <?= $item['title'] ?>
                            <?php if (isset($item['href'])): ?></a><?php else: ?></span><?php endif ?>
                        </li>
                    <?php else: ?>
                        <li class="breadcrumb-item active" active" data-animate-in="fadeInLeft,<?= 100 * $key * 3 ?>,fast,100">
                            <?= $item['title'] ?>
                    <?php endif ?>
                <?php endforeach ?>

                <?php if (isset($search) && $search): ?>
                <li class="search pull-right">
                    <form action="<?= $search['action'] ?>">
                    <div class="input-group">
                       <input type="text" name="s" class="form-control" placeholder="Buscar...">
                       <span class="input-group-btn">
                       <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-search"></i> </button>
                    </span>
                    </form>
                </div>
                </li>
                <?php endif ?>
            </ol>
            </nav>
        </div>
    </div>
<?php endif ?>
