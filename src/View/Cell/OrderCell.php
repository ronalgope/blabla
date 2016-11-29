<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Project cell
 */
class OrderCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
      //$this->loadModel('Projects');
      // $projects = $this->Projects->find('all',[
      //   'limit' => 6,
      //   'order' => 'created DESC'
      //   ]);
      //   $this->set('projects',$projects);
        $this->loadModel('Orders');
        $orders = $this->Orders->find('all',[
          'limit' => 5,
          'order' => 'created DESC',
          'contain' => ['Users', 'Units']
          ]);
          $orders->matching('Users', function ($q) {
      return $q->where(['Users.id =' => '51c0b263-9e97-4642-9469-a1b3871cfdff']);

      //return $orders;
    });
          $this->set('orders',$orders);
    }
}
