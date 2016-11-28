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
        //!die(print_r('2132'.$user['id']));
          //$order = $this->Orders->patchEntity($order, $this->request->data);
          $order->users_id = $user['id'];
          $order->units_id = $this->request->data['units_id'];
          $order->price = 1235;
          $order->status = "PENDING";
          $order->isbuyforself = 1;
          $order->billing_method = "HARD CASH";
          if ($this->Orders->save($order)) {
              $this->Flash->success(__('The order has been saved.'));

              return $this->redirect(['action' => 'index']);
          } else {
              $this->Flash->error(__('The order could not be saved. Please, try again.'));
              return $this->redirect(['action' => 'index']);
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
