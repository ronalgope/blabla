<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Project cell
 */
class ProjectCell extends Cell
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
      $this->loadModel('Projects');
      $projects = $this->Projects->find('all',[
        'limit' => 6,
        'order' => 'created DESC'
        ]);
        $this->set('projects',$projects);
    }
}
