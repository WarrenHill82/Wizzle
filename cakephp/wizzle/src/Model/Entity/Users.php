<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Users extends Entity
{
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true
    ];

    function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    public function create($data)
    {
        $usersTable = TableRegistry::getTableLocator()->get('users');
        $user = $usersTable->newEntity();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $this->_setPassword($data['password']);
        $usersTable->save($user);
    }

    public function update($data)
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $user = $usersTable->get($data['id']);
        $user->password = $this->_setPassword($data['password']);
        $usersTable->save($user);
        return true;
    }
}