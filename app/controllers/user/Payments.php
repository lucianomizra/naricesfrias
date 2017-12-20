<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends APP_Controller {

  public function __construct()
  {
    parent::__construct();
    if($this->pre) return redirect(base_url('dashboard'));
    
    $this->load->model('PaymentModel','PayM');
  }

  public function mypayments()
  {
    if(!$this->user) return redirect(base_url('login'));

    if($this->input->post('id_payment') && $this->input->post('method')) {
      
    if ( $this->input->post('method') == 'cancel' ) {
        $this->db->where('id_payment', $this->input->post('id_payment'));
        $this->db->update('payment', ['id_status'=>2]);

        $this->session->set_flashdata('flash_toast', ['type'=>'warning', 'title'=>'Cancelado', 'subtitle'=> "El pago fue cancelado."]);
        
        return $this->json(array( 'error'=>0, 'callback'=> 'success-reload' ));
      } else if ( $this->input->post('method') == 'mp' || ($this->input->post('method') == 'test' && APP_MODE == 'dev') ) {


        if ( $this->input->post('method') == 'mp' ) {
          $payment_type = $this->input->post('type');
          $id = $this->input->post('id_payment');
          $payment = $this->PayM->GetPayment($id);
          $payment_full = validate_age($this->user->birthday,18) ? 1 : 0;

          $this->load->model('PaymentModel', 'PayM');
          if ( APP_MODE == 'dev' ) {
            $payment->amount = 1;
          }
          $result = $this->PayM->Pay('mp', $id, $payment->amount, $payment_full);

          return $this->json(array( 'error'=>0, 'callback'=> 'success-go', 'url'=>$result ));
        } elseif( $this->input->post('method') == 'test' && APP_MODE == 'dev' ) {

          $this->PayM->successPayment($this->input->post('id_payment'));

          $this->session->set_flashdata('flash_toast', ['type'=>'success', 'title'=>'Genial!', 'subtitle'=> "El pago fue realizado."]);

          return $this->json(array( 'error'=>0, 'callback'=> 'success-reload' ));
        }

      }
    }

    $this->namespace = 'dashboard';
    $this->view = 'user/account/main';
    $this->subview = 'payments';

    $this->data['breadcrumb'] = [
      ['title'=>'Cuenta','href'=>base_url('user/account')],
      ['title'=>'Pagos'],
    ];

    $this->data['headers'] = $this->Data->GetHeader([
      'title'=> 'Pagos',
    ]);   

    $this->data['pendient_payments'] = $this->PayM->GetPayments(['where'=>['t.id_status'=>1]]);
    $this->data['history_payments'] = $this->PayM->GetPayments(['where'=>['t.id_status'=>[2,3,4]] ]);

    $this->main();
  }

  public function payment_mp($result = '')
  {
    if(!$this->user) 
      return redirect('home');

    $code = $this->input->get('external_reference');
  
    if(!$code)
      return redirect('home');

      $id = $this->encryption->decode($code);
      if(!$id)
    return redirect('home');

    $results = array('ok', 'ko', 'pending');
    if(!in_array($result, $results)) 
      return redirect('home');

    if($result == 'pending')
    {
      $this->session->set_flashdata('flash_toast', ['type'=>'warning', 'title'=>'Pendiente', 'subtitle'=> "El pago se encuentra pendiente."]);
    }
    if($result == 'ko')
    {
// cuando vuelve
    }
    if($result == 'ok')
    {
      $this->load->model('PaymentModel', 'PayM');
      $check = $this->PayM->MP_Check($id);
    }

    redirect('user/account/payments'); 
  }


}