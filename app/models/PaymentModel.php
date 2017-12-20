<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentModel extends CI_Model
{
  public
    $mpsandbox = false, //dejarlo en false porque en true no podemos hacer las comprobaciones KO PENDING OK, si necesitás datos de TC pedime
    $pconfig = false,
    $error = false;

  public function InitMP()
  {
    require_once APPPATH . "third_party/mercadopago/mercadopago.php";
    $mp = new MP('1008624954255916', 'nD2Wu3LNXTTCgNrH0CUbT7lSM12fiQio');
    $mp->sandbox_mode($this->mpsandbox);
    return $mp;
  }


  public function __construct()
  {
		parent::__construct();
		// $languages = array(
		// 	'spanish' => '_es',
		// 	'english' => '_en',
		// );
		// $this->langdb = $languages[$this->config->item('language')];

  //   $this->config = $this->Config();
  }

   public function Pay($type = '', $id = 0, $total = 0, $payment_full = 0)
  {
    if($type == 'mp')
    {
      return $this->PayMP($id, $total, $payment_full);
    }
    if($type == 'test')
    {
      return $this->PayTest($id, $total);
    }
    return false;
  }

  public function PayTest($id = 0)
  {
    return $id;
  }

  public function PayMP($id = 0, $total = 0, $payment_full = 0)
  {

    $mp = $this->InitMP();
    $env = $this->mpsandbox ? 'sandbox_init_point' : 'init_point';
    $cost = round($total);
    if ($cost < 1) return false;
    if($payment_full == 1){ //payment_full es si es mayor de edad, si está en 1 tiene todas las opcioens de pago en 0 tiene solo tarjeta de crédito
    $preference_data = array(
      "items" => array(
          array(
              "id" => 'id del pago generar', // yo por ahora le estoy pasando id de usuario, pero hay que pasarle id del pago
              "title" => "Pago de fase - DQSS",
              "currency_id" => "ARS",
              "picture_url" => layout("img/logo.png"),
              "description" => "",
              "quantity" => 1,
              "unit_price" => $cost
          )
      ),
      "back_urls" => array(
          "success" => base_url('User/Payments/payment_mp/ok'),
          "failure" => base_url('User/Payments/payment_mp/ko'),
          "pending" => base_url('User/Payments/payment_mp/pending'),
      ),
      "auto_return" => "approved",
      "payment_methods" => array(
             ),
      "capture" => true,
      "expires" => false,
    );
    }
    if($payment_full == 0){
    $preference_data = array(
      "items" => array(
          array(
              "id" => 'id del pago generar',
              "title" => "Pago de abono mensual",
              "currency_id" => "ARS",
              "picture_url" => layout("img/logo.png"),
              "description" => "",
              "quantity" => 1,
              "unit_price" => $cost
          )
      ),
      "back_urls" => array(
          "success" => base_url('User/Payments/payment_mp/ok'),
          "failure" => base_url('User/Payments/payment_mp/ko'),
          "pending" => base_url('User/Payments/payment_mp/pending'),
      ),
      "auto_return" => "approved",
      "payment_methods" => array(
        "excluded_payment_methods" => array(array("id" => "redlink")),
        "excluded_payment_types" => array(
          array("id" => "ticket"),
          array("id" => "debit_card"),
          ),
             ),
      "capture" => true,
      "expires" => false,
    );
    }
    $preference_data['external_reference'] = $this->encryption->encode($id);

    $preference = $mp->create_preference($preference_data);
    if (!$preference || !isset($preference['response'][$env]))
      return false;
    return $preference['response'][$env];
  }

  public function GetPayments($params = []) {
    if( !$this->user ) return;
    $this->db->where('TIMESTAMPDIFF(DAY, date_payment, NOW() ) > 0');
    $this->db->update('payment', ['id_status'=>4]);

    $this->db->select("
      t.id_payment,
      t.amount,
      t.date_payment,
      t.id_user,
      t.text,
      t.id_status as id_status,
      ps.status as status
      ");

    $this->db->where("id_user = {$this->user->id_user}");
    $this->db->join('payment_status ps', 'ps.id_status = t.id_status', 'left');

    if (isset($params['where'])) {
      foreach ($params['where'] as $key => $value) {
          if (is_array($value)) {
            $value = implode(',', $value);
            $this->db->where("$key IN ({$value})");
          } else {
            $this->db->where("$key = {$value}");
          }
       }
    }

    $this->db->order_by('id_payment','DESC');
    $r = $this->db->get("payment as t")->result();


    foreach ($r as $key => $value) {
      $expire = DateTime::createFromFormat('Y-m-d H:i:s', $value->date_payment)->modify('+1 day');
      $r[$key]->date_expire = $expire->format('Y-m-d H:i:s');
    }
    return $r;
  }

  public function GetPayment($id_payment = false) {
    if( !$id_payment ) return;
    $this->db->select("
      t.id_payment,
      t.amount,
      t.date_payment,
      t.id_user,
      t.text,
      t.id_status as id_status,
      ");

    $this->db->where("id_payment = {$id_payment}");
    $r = $this->db->get("payment as t")->row();


    return $r;
  }

  public function MP_Check($id = 0)
  {
    $mp = $this->InitMP();
    if(!$mp || !$id)
    {
      $this->error = 'Datos incorrectos.';
      return false;
    }

    $idCollection = $this->input->get('collection_id');
    $params = array("access_token" => $mp->get_access_token());
    $payment_info = false;
    if(!$idCollection || !$params)
    {
      $this->error = "Sin información de pago.";
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> $this->error]);
      return false;
    }

    try
    {
      $payment_info = $mp->get_payment_info($idCollection);
    } catch (Exception $e) {

    }

    if(!$payment_info)
    {
      $this->error = "Sin información de pago.";
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> $this->error]);
      return false;
    }

    if ($payment_info["status"] != 200)
    {
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> $this->error]);
      return false;
    }

    if (!isset($payment_info['response']['collection']['status']))
    {
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> $this->error]);
      return false;
    }

    if($payment_info['response']['collection']['status'] != 'approved')
    {
      $this->error = "MercadoPago rechazo el pago.";
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> $this->error]);
      return false;
    }
    $id_payment = $payment_info['response']['collection']['id'];

    $this->session->set_flashdata('flash_toast', ['type'=>'success', 'title'=>'Genial!', 'subtitle'=> "El pago fue realizado."]);

    $this->successPayment($id_payment);

    return true;

  }

  public function successPayment($id = false) {
    if( !$id ) return false;

    $this->db->where('id_payment', $id);
    $this->db->update('payment', ['id_status'=>3]);


    $this->db->select('t.*');
    $this->db->where('id_payment', $id);
    $ps = $this->db->get('plan_subcription t')->row();

    if ($ps) {
      $this->load->model('GameModel','GameM');
      $now = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
      $user_expiration = DateTime::createFromFormat('Y-m-d H:i:s', $this->user->payment_expiration);

      $date_start = ( $now->getTimestamp() > $user_expiration->getTimestamp() ) ? $now : $user_expiration;

      $plan = $this->UserM->GetPlan($ps->id_plan);
      $phases = $this->GameM->GetPhases();
      $new_phase = $this->GameM->CurrentPhase($date_start->format('Y-m-d H:i:s')) + $plan->plan_phases;
      $new_phase = $new_phase > $this->GameM->nphases ? $this->GameM->PhasesToFinal() : $new_phase;
      $new_expiration = $phases[ $new_phase ][1];

      $this->db->where('id_subcription', $ps->id_subcription);
      $this->db->update('plan_subcription', ['id_status'=>3]);

      $this->db->where('id_user', $this->user->id_user);
      $this->db->update('user', ['payment_expiration'=> $new_expiration->format('Y-m-d H:i:s') ]);

    } else {
      $this->session->set_flashdata('flash_toast', ['type'=>'error', 'title'=>'Error', 'subtitle'=> "Detectamos un error contactese con los administradores."]);
    }

    return true;
  }
}