<?php
namespace App\Controller;

use App\Controller\AppController;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
  var $uses = array('Projects','Units');
  public function initialize()
  {
      parent::initialize();

      $this->loadComponent('CakeDC/Users.UsersAuth');
      //$this->Auth->allow('view','cart','createorder');

  }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Units']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    public function successorder(){

    }

    public function createorder(){
      $this->autoRender = false;
      $order = $this->Orders->newEntity();
      if ($this->request->is('post')) {

        $user = $this->Auth->identify();
        //!die(print_r($this->request->data));
          //$order = $this->Orders->patchEntity($order, $this->request->data);
          $order->users_id = $user['id'];
          $order->units_id = $this->request->data['units_id'];
          switch($this->request->data['optradio']){
            case 0:
            $billing_method = "KPR";
            $order->bf = $this->request->data['0bf'];
            $order->dp = $this->request->data['0dp'];
            $order->lamaangsuran = $this->request->data['0lamaangsur'];
            $order->totalangsuran = $this->request->data['0totalangsur'];
            break;
            case 1:
            $billing_method = "HARD CASH";
            $order->bf = $this->request->data['1bf'];
            $order->lamaangsuran = $this->request->data['1lamaangsur'];
            $order->totalangsuran = $this->request->data['1totalangsur'];
            break;
            case 2:
            $billing_method = "CASH BERTAHAP";
            $order->bf = $this->request->data['2bf'];
            $order->lamaangsuran = $this->request->data['2lamaangsur'];
            $order->totalangsuran = $this->request->data['2totalangsur'];
            break;
            case 3:
            $billing_method = "CASH DP";
            $order->bf = $this->request->data['3bf'];
            $order->dp = $this->request->data['3dp'];
            $order->lamaangsuran = $this->request->data['3lamaangsur'];
            $order->totalangsuran = $this->request->data['3totalangsur'];
            break;
          }
          if($this->request->data['optradio2']==0){
            $isbuyforself = 1;
          }elseif($this->request->data['optradio2']==1){
            $isbuyforself = 0;
          }
          $order->price = 1235;
          $order->status = "NEW";
          $order->isbuyforself = $isbuyforself;
          $order->billing_method = $billing_method;
          if ($this->Orders->save($order)) {
              $this->Flash->success(__('The order has been saved.'));

              return $this->redirect(['controller' => 'profile']);
          } else {
              $this->Flash->error(__('The order could not be saved. Please, try again.'));
              return $this->redirect(['action' => 'cart'],$this->request->data['units_id']);
          }
      }
      $users = $this->Orders->Users->find('list', ['limit' => 200]);
      $units = $this->Orders->Units->find('list', ['limit' => 200]);
      $this->set(compact('order', 'users', 'units'));
      $this->set('_serialize', ['order']);
    }

    public function cart($id = null)
    {
      $user = $this->Auth->identify();
      if(!$user){
        $this->redirect(['controller'=>'login']);
      }
      $thisid = $id;
      $this->loadModel('Projects');
      $this->loadModel('Units');

    $projects = $this->Projects->find();
    $projects->matching('Units', function ($q) use ($id){
        return $q->where(['Units.id' => $id]);
    });
    $order = $this->Orders->newEntity();
    foreach($projects as $project){
      $this->set(compact('project','order'));
    }

    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Units']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('CakeDC/Users.UsersAuth');
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $units = $this->Orders->Units->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'units'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $units = $this->Orders->Units->find('list', ['limit' => 200]);
        $this->set(compact('order', 'users', 'units'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
