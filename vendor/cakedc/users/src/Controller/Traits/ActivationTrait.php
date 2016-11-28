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
trait ActivationTrait
{

    /**
     * Register a new user
     *
     * @throws NotFoundException
     * @return type
     */
    public function activation()
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
            'use_tos' => $useTos
        ];
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
}
