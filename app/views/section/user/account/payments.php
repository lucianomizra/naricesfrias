<div class="panel panel-default b-a-0">
        <div class="panel-body">
            <?php if (count($pendient_payments)): ?>
            <legend>Pagos pendientes</legend>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="small text-muted text-uppercase"><strong>Monto</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Plan</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Creado</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Vencimiento</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Acciones</strong></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($pendient_payments as $key => $pay): ?>
                        
                    <tr>
                        <td class="v-a-m"><span class="text-white">$<?= $pay->amount ?></span></td>
                        <td class="v-a-m"><span class="text-white"><?= $pay->text ?></span></td>
                        <td class="v-a-m"><span><?= $pay->date_payment ?></span></td>
                        <td class="v-a-m"><span><?= $pay->date_expire ?></span>
                        </td>
                        <td class="text-right v-a-m">
                            <form action="<?= base_url('user/account/payments') ?>" class="paymentForm ajaxForm">
                                <input type="hidden" name="id_payment" value="<?= $pay->id_payment ?>">
                                <div class="btn-group" role="group">
                                    <?php if (APP_MODE  == 'dev'): ?>
                                        <button data-method="test" type="submit" class="btn btn-default">Simular</button>
                                    <?php endif ?>
                                    <button data-method="mp" type="submit" class="btn btn-success">Pagar</button>
                                    <button data-method="cancel" type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
        
                </tbody>
            </table>
            <?php else: ?>
                <?php if (!count($history_payments)): ?>
                    <br><br><br><br><br>
                <?php endif ?>
                <br>
                <h3 class="text-xs-center">No tienes pagos pendientes.</h3>
                <?php if (!count($history_payments)): ?>
                    <br><br><br><br>
                <?php endif ?>
                <br><br>
            <?php endif ?>

            <?php if (count($history_payments)): ?>
            <legend>Historial de pagos</legend>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="small text-muted text-uppercase"><strong>N°</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Monto</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Pago</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Estado</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Creado</strong></th>
                        <th class="small text-muted text-uppercase"><strong>Vencimiento</strong></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($history_payments as $key => $pay): ?>
                        
                    <tr>
                        <td class="v-a-m"><span class="text-white"><?= str_pad($pay->id_payment, 5, 0, STR_PAD_LEFT) ?></span></td>
                        <td class="v-a-m"><span class="text-white">$<?= $pay->amount ?></span></td>
                        <td class="v-a-m"><span class="text-white"><?= $pay->text ?></span></td>
                        <td class="v-a-m"><span class="<?= ($pay->id_status==3) ? 'text-success' : 'text-danger' ?>"><?= $pay->status ?></span></td>
                        <td class="v-a-m"><span><?= $pay->date_payment ?></span></td>
                        <td class="v-a-m"><span><?= $pay->date_expire ?></span></td>
                    </tr>
                    <?php endforeach ?>
        
                </tbody>
            </table>
            <?php endif ?>


        </div>


    </div>

    <div class="panel-footer b-t-0 m-t-0"></div>

</div>