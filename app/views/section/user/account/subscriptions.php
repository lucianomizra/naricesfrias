<div class="panel panel-default b-a-0">
        <div class="panel-body">
          <?php if($dates_to_final + 4<=$dates_availables) : ?>
            <br>
            <br>
            <br>
            <h3 class="text-xs-center">¡Ténes todo el torneo pago!</h3>
            <br>
            <br>
            <br>
          <?php else: ?>

            <!-- START All Forms -->
            <div class="row">
                <div class="clearfix"></div>
                  <div class="col-xs-12">

                    <div class="legend m-b-2">Jugar la liga DQSS</div>

                      <p class="text-centr m-b-3 m-t-2">Nos encontramos en la fase N° <?= $current_phase ?> jugando su fecha N° <?= $current_phase_date ?>.
                      </p>
                      <?php if ($dates_availables): ?>
                        <p class="text-centr m-b-3 m-t-2">Has contratado hasta la fase N° <?= $exiration_phase ?>.
                          Tenes <?= $dates_availables ?> fechas de juego.</p>
                      <?php endif ?>
                      <?php if ($dates_availables<=1): ?>
                        <p class="text-centr m-b-3 m-t-2 text-warning">Paga la proxima fecha antes de que comience para jugarla, antes de su comienzo el proximo sábado!</p>
                      <?php endif ?>
                  </div>
                  

                  <?php foreach ($plans as $key => $plan): ?>
                      <div class="col-md-<?= (count($plans)==3) ? '4' : '6' ?>">
                          <div class="panel panel-default no-bg b-gray-dark bg-succes">
                              <div class="panel-heading p-t-2 p-b-3">
                                  <div class="text-left m-t-1">
                                      <div class="text-uppercase" style="border-bottom: 1px solid white; display:inline-block"><?= $plan->plan ?></div>
                                      <small style="display:block"><?= $plan->description ?></small>
                                      <?php if ($dates_to_final <= $plan->incluid_dates): ?>
                                        <?php if ($dates_to_final>0): ?>
                                          <br><small style="display:block"><b>Incluye:</b> <?= $dates_to_final ?> fechas</small>
                                        <?php endif ?>
                                      <?php else: ?>
                                        <br><small style="display:block"><b>Incluye:</b> <?= $plan->incluid_dates ?> fechas</small>
                                        <?php if ($plan->plan_dates != $plan->incluid_dates): ?>
                                          <small style="display:block">Permitiendo jugar esta fase
                                          <?php if ($plan->plan_phases>0): ?>
                                            y <?= $plan->plan_phases ?> más.
                                          <?php else: ?>
                                            hasta el final presencial.
                                          <?php endif ?>
                                          </small>
                                        <?php endif ?>
                                        <h2 class="m-t-1 m-b-0">$<?= round($plan->cost_for_date,2) ?></h2>
                                        <p>/ fecha</p>
                                      <?php endif ?>

                                      <form action="<?= base_url('user/account/subscriptions') ?>" class="ajaxForm">
                                          <input type="hidden" name="id_plan" value="<?= $plan->id_plan ?>">
                                          <button type="submit" class="btn btn-success btn-lg btn-block m-t-1">Pagar $<?= round($plan->final_amount,2) ?></button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endforeach ?>

<!--                 <form action="<?php echo base_url() ?>User/Payments/ajax_subscribe" method="post">
            <div class="row" style=" margin-top: 30px; margin-bottom: 30px; margin-left: 60px; margin-right: 60px; ">
              <div class="col-md-4">
                <button type="submit" name="type" value="mp" class="btn btn-primary">MercadoPago</button>
              </div>
              <div class="col-md-4">
                <button type="submit" name="type" value="test" class="btn btn-primary">Simular pago</button>
              </div>
                 <input type="hidden" name="id" value="<?= $this->user->id_user ?>">
                 <input type="hidden" name="total" value="2">
                 <input type="hidden" name="paymentfull" value="1">
            </div>
 -->
<!--             <div class="form-check m-t-2 m-b-2">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input m-t-1" id="moda_terms"><small>
                <a href="<?= base_url('info') . '/condiciones-uso' ?>" target="_blank">He leído y acepto los términos y condiciones.</a></small>
              </label>
            </div> -->

                <div class="clearfix m-b-2"></div>
            </div>
                
                <p>Si una fase ya comenzó a jugarse, podrás sumarte la fecha siguiente, pagando el proporcional de la misma más la fase siguiente. Caso contrario deberés esperar a que se completen las cuatro fechas de la fase.
                </p>
                <p>
                  Por cada fase que pagas, tienes derecho a jugar 4 fechas de la liga semanal más 2 Copas Nacionales ¡y todas las Copas Clasificación y Copas de Campeones a las que clasifiques!
                </p>
                <p>La fase 7, al ser la última de la competencia, no tiene fechas de liga semanal. Se jugará la Copa Repechaje, dos Copas Nacionales y la última Copa Clasificación y Copa de Campeones.</p>

           <?php endif; ?>

        </div>


    </div>

</div>
