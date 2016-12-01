<?php
namespace App\Controller;
require_once ROOT .DS. 'vendor' . DS . 'veritrans' . DS . 'veritrans-php' . DS . 'Veritrans.php';

use App\Controller\AppController;
use Veritrans_Config;
use Veritrans_VtWeb;
/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
        $this->set('_serialize', ['invoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'orders'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'orders'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function notifications(){
      $this->autoRender = false;
      if ($this->request->is('post')) {
          if($this->request->data['status_code']==200){
            $invoice = $this->Invoices->newEntity();
            $invoice->orders_id = $this->request->data['order_id'];
            $invoice->total = $this->request->data['gross_amount'];
            $invoice->payment_method = $this->request->data['payment_type'];
            $invoice->description = $this->request->data['transaction_time'];
                $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
                if ($this->Invoices->save($invoice)) {
                    $this->Flash->success(__('The invoice has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
                }
          }
      }
    }

    public function payment($orderid = null)
    {
      // $invoice = $this->Invoices->newEntity();
      // if ($this->request->is('post')) {
      //     $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
      //     if ($this->Invoices->save($invoice)) {
      //         $this->Flash->success(__('The invoice has been saved.'));
      //
      //         return $this->redirect(['action' => 'index']);
      //     } else {
      //         $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
      //     }
      // }
      // $orders = $this->Invoices->Orders->find('list', ['limit' => 200]);
      // $this->set(compact('invoice', 'orders'));
      // $this->set('_serialize', ['invoice']);
      //
      $this->autoRender = false;


      $this->loadModel('Orders');

      $orders = $this->Orders->get($orderid);

      //$veritrans = new Veritrans/Veritrans_Config;
      //$veritrans->serverKey = "VT-server-tKNz44klcAUEFxtuyxDddBdv";
      Veritrans_Config::$serverKey = "VT-server-tKNz44klcAUEFxtuyxDddBdv";

      $transaction_details = array(

        'order_id' => $orderid,

        'gross_amount' => $orders->bf,

      );

      // Optional

      $item1_details = array(

        'id' => 'Booking Fee',

        'price' => $orders->bf,

        'quantity' => 1,

        'name' => "Pembayaran Booking Fee"

      );

      $item_details = array ($item1_details);


      // Fill transaction details

      $transaction = array(

        'transaction_details' => $transaction_details,

        'item_details' => $item_details,

      );

      try {
        // Redirect to Veritrans VTWeb page
        //echo Veritrans_VtWeb::getRedirectionUrl($transaction);
        //header('Location: ' . Veritrans_VtWeb::getRedirectionUrl($transaction));
        $this->redirect(Veritrans_VtWeb::getRedirectionUrl($transaction));
      }
      catch (Exception $e) {
        echo $e->getMessage();
        if(strpos ($e->getMessage(), "Access denied due to unauthorized")){
            echo "<code>";
            echo "<h4>Please set real server key from sandbox</h4>";
            echo "In file: " . __FILE__;
            echo "<br>";
            echo "<br>";
            echo htmlspecialchars('Veritrans_Config::$serverKey = \'<your server key>\';');
            die();
      }

      }

    }
}
