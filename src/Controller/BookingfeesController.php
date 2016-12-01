<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookingfees Controller
 *
 * @property \App\Model\Table\BookingfeesTable $Bookingfees
 */
class BookingfeesController extends AppController
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
        $bookingfees = $this->paginate($this->Bookingfees);

        $this->set(compact('bookingfees'));
        $this->set('_serialize', ['bookingfees']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookingfee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookingfee = $this->Bookingfees->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('bookingfee', $bookingfee);
        $this->set('_serialize', ['bookingfee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        $bookingfee = $this->Bookingfees->newEntity();
        if ($this->request->is('post')) {
            //$bookingfee = $this->Bookingfees->patchEntity($bookingfee, $this->request->data);
            $bookingfee->orders_id = $this->request->data['orders_id'];
            $bookingfee->name = $this->request->data['name'];
            $bookingfee->statement = $this->request->data['statement'];
            $bookingfee->project = $this->request->data['project'];
            $bookingfee->type = $this->request->data['type'];
            $bookingfee->price = $this->request->data['price'];
            $bookingfee->dp = $this->request->data['dp'];
            $bookingfee->hp = $this->request->data['hp'];
            $bookingfee->otherhp = $this->request->data['otherhp'];
            $bookingfee->total = $this->request->data['total'];
            if ($this->Bookingfees->save($bookingfee)) {
                $this->Flash->success(__('The bookingfee has been saved.'));

                return $this->redirect(['controller' => 'orders','action'=>'mydetailorder',$this->request->data['orders_id']]);
            } else {
                $this->Flash->error(__('The bookingfee could not be saved. Please, try again.'));
                return $this->redirect(['controller' => 'orders','action'=>'mydetailorder',$this->request->data['orders_id']]);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookingfee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookingfee = $this->Bookingfees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookingfee = $this->Bookingfees->patchEntity($bookingfee, $this->request->data);
            if ($this->Bookingfees->save($bookingfee)) {
                $this->Flash->success(__('The bookingfee has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bookingfee could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Bookingfees->Orders->find('list', ['limit' => 200]);
        $this->set(compact('bookingfee', 'orders'));
        $this->set('_serialize', ['bookingfee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookingfee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookingfee = $this->Bookingfees->get($id);
        if ($this->Bookingfees->delete($bookingfee)) {
            $this->Flash->success(__('The bookingfee has been deleted.'));
        } else {
            $this->Flash->error(__('The bookingfee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
