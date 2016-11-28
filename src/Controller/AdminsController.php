<?php
namespace App\Controller;

use App\Controller\AppController;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
use CakeDC\Users\Exception\AccountNotActiveException;
use CakeDC\Users\Exception\MissingEmailException;
use CakeDC\Users\Exception\UserNotActiveException;
use CakeDC\Users\Model\Table\SocialAccountsTable;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use League\OAuth1\Client\Server\Twitter;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 */
class AdminsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function initialize()
     {
         parent::initialize();
         $this->loadComponent('Security');
         $this->loadComponent('Csrf');
     }

    public function index()
    {

    }

    public function dashboard()
    {
      $this->viewBuilder()->layout('admin');
    }

}
