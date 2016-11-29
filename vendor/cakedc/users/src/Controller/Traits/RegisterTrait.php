<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace CakeDC\Users\Controller\Traits;

use CakeDC\Users\Controller\Component\UsersAuthComponent;
use Cake\Core\Configure;
use Cake\Datasource\EntityInterface;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Response;

/**
 * Covers registration features and email token validation
 *
 */
trait RegisterTrait
{
    use PasswordManagementTrait;

    /**
     * Register a new user
     *
     * @throws NotFoundException
     * @return type
     */
    public function register()
    {
        if (!Configure::read('Users.Registration.active')) {
            throw new NotFoundException();
        }

        $userId = $this->Auth->user('id');
        if (!empty($userId) && !Configure::read('Users.Registration.allowLoggedIn')) {
            $this->Flash->error(__d('CakeDC/Users', 'You must log out to register a new user account'));

            return $this->redirect(Configure::read('Users.Profile.route'));
        }

        $usersTable = $this->getUsersTable();
        $user = $usersTable->newEntity();
        $validateEmail = (bool)Configure::read('Users.Email.validate');
        $useTos = (bool)Configure::read('Users.Tos.required');
        $tokenExpiration = Configure::read('Users.Token.expiration');
        $options = [
            'token_expiration' => $tokenExpiration,
            'validate_email' => $validateEmail,
            'use_tos' => $useTos,
        ];
        $vercode = $this->_randomPassword();
        $this->request->data['vercode'] = $vercode;
        $this->request->data['active'] = 0;
        $requestData = $this->request->data;

        $event = $this->dispatchEvent(UsersAuthComponent::EVENT_BEFORE_REGISTER, [
            'usersTable' => $usersTable,
            'options' => $options,
            'userEntity' => $user,
        ]);

        if ($event->result instanceof EntityInterface) {
            if ($userSaved = $usersTable->register($user, $event->result->toArray(), $options)) {
                return $this->_afterRegister($userSaved);
            }
        }
        if ($event->isStopped()) {
            return $this->redirect($event->result);
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

        if (!$this->request->is('post')) {
            return;
        }

        if (!$this->_validateRegisterPost()) {
            $this->Flash->error(__d('CakeDC/Users', 'Invalid reCaptcha'));

            return;
        }

        $userSaved = $usersTable->register($user, $requestData, $options);
        if (!$userSaved) {
            $this->Flash->error(__d('CakeDC/Users', 'The user could not be saved'));

            return;
        }

        return $this->_afterRegister($userSaved);
    }

    /**
     * Check the POST and validate it for registration, for now we check the reCaptcha
     *
     * @return bool
     */
    protected function _validateRegisterPost()
    {
        if (!Configure::read('Users.reCaptcha.registration')) {
            return true;
        }

        return $this->validateReCaptcha(
            $this->request->data('g-recaptcha-response'),
            $this->request->clientIp()
        );
    }

    /**
     * Prepare flash messages after registration, and dispatch afterRegister event
     *
     * @param EntityInterface $userSaved User entity saved
     * @return Response
     */
    protected function _afterRegister(EntityInterface $userSaved)
    {
        $this->_sendkodeactivasi($userSaved);
        $validateEmail = (bool)Configure::read('Users.Email.validate');
        //$message = __d('CakeDC/Users', 'Kode validasi sudah dikirimkan ke no. HP anda. Silahkan lakukan aktivasi untuk melanjutkan proses registrasi');
        //$message = __d('CakeDC/Users', 'You have registered successfully, please log in');
        if ($validateEmail) {
            $message = __d('CakeDC/Users', 'Please validate your account before log in');
        }
        $event = $this->dispatchEvent(UsersAuthComponent::EVENT_AFTER_REGISTER, [
            'user' => $userSaved
        ]);
        if ($event->result instanceof Response) {
            return $event->result;
        }
        //$this->Flash->success($message);

        return $this->redirect(['plugin'=>null,'controller' => 'Activation','action'=>'index']);

        //return $this->redirect(['action' => 'login']);
    }

    private function _randomPassword() {
  			$alphabet = "0123456789";
  			$pass = array(); //remember to declare $pass as an array
  			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  			for ($i = 0; $i < 8; $i++) {
  					$n = rand(0, $alphaLength);
  					$pass[] = $alphabet[$n];
  			}
  			return implode($pass); //turn the array into a string
  	}

    protected function _sendkodeactivasi(EntityInterface $userSaved)
    {
      $username = "buyhome";
      $password = "send1288HOME";
      $apikey = "a71fa0cbc7afedcb5cf701e807546c49";
      $number = $userSaved->handphone;
      $message = "KODE AKTIVASI ".$userSaved->vercode;
      $curlHandle = curl_init();
        		curl_setopt($curlHandle, CURLOPT_URL,$url);
  		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
  		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
  		$hasil = curl_exec($curlHandle);
  		curl_close($curlHandle);
      //!die($hasil);
      $this->log($hasil);
  		return $hasil;

    }

    /**
     * Validate an email
     *
     * @param string $token token
     * @return void
     */
    public function validateEmail($token = null)
    {
        $this->validate('email', $token);
    }
}
