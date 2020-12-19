<?php

namespace App\Controller;

use App\Model\Entity\Users;
use Cake\Http\Response;

class UsersController extends AppController
{
    var $name = 'Users';
    var $helpers = array('Html', 'Form');

    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['register', 'logout', 'login', 'forgotPass', 'notFound']);
    }

    function register()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $passwordConf = $_POST['password_confirm'];

            if ($password != $passwordConf) {
                return new Response(['statusCode' => '500', 'body' => 'Passwords dont match']);
            }
            $userModel = new Users();
            $userModel->create(['username' => $username, 'email' => $email, 'password' => $password]);
            return $this->redirect('/users/login');
        }
        return null;
    }


    public function index()
    {
        $users = $this->Users->find();
        $this->set(compact('users'));
    }

    function forgotPass()
    {
        if (!empty($_POST['email'])) {
            $users = $this->Users->find('All')->where(['email' => $_POST['email']]);
            if($users->count() > 0) {
                $row = $users->first();
                $this->Auth->setUser($row);
                return $this->redirect('/users/reset_password/');
            }
            return $this->redirect('/users/not_found/');
        }
        return null;
    }

    function notFound()
    {
        //
    }

    function resetPassword()
    {
        if (!empty($_POST['password'])) {
            $userId = $this->Auth->user('id');
            $newPassword = $_POST['password'];
            $newPasswordConfirm = $_POST['password_confirm'];
            if ($newPassword != $newPasswordConfirm) {
                return new Response(['statusCode' => '500', 'body' => 'Passwords dont match']);
            }
            $userModel = new Users();
            if($userModel->update(['id' => $userId, 'password' => $newPassword])) {
                return $this->redirect('/users/login');
            }
            return new Response(['statusCode' => '500', 'body' => 'Unknown error setting new password']);
        }
        return null;
    }
}