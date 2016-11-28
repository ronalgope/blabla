<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;
use Cake\ORM\TableRegistry;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class ActivationController extends AppController
{
  var $uses = array('CakeDC/Users.Users');
  use LoginTrait;
  use RegisterTrait;
  public function index(){

  }

  public function activation(){
    $this->autoRender = false;
    if ($this->request->is('post')) {
      $activation = $this->request->data('kode');
    }
    $this->loadModel('CakeDC/Users.Users');
    $users = $this->Users->find('all');
    $users->where(['vercode'=>$activation]);
    $user = $users->first();

    if($user){
      // $userTable = TableRegistry::get('CakeDC/Users.Users');
      // $saveuser = $userTable->get($user->id);
      // $saveuser->vercode = "kopet";
      // $userTable->save($saveuser);
      $this->Flash->success('AKUN ANDA SUDAH DIAKTIFKAN. SILAHKAN LOGIN');
      return $this->redirect('/login');
    }else{
      $this->Flash->error('KODE AKTIVASI ANDA TIDAK COCOK. SILAHKAN COBA LAGI');
      return $this->redirect($this->referer());
    }

  }
}
