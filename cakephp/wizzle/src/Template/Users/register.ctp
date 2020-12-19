<h1>CakePHP Registration Form</h1>

<?php
  echo $this->form->create('Users', array('action' => 'register'));
  echo $this->form->control('username', ['type' => 'text']);
  echo $this->form->control('email', ['type' => 'email']);
  echo $this->form->control('password', ['type' => 'password']);
  echo $this->form->control('password_confirm', ['type' => 'password']);
  echo $this->form->submit();
  echo $this->form->end();
?>