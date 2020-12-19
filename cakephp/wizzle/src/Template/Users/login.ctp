<h1>Login</h1>

<?php
  echo $this->form->create('Users', array('action' => 'login'));
  echo $this->form->input('username');
  echo $this->form->input('password', array('type' => 'password'));
  echo $this->form->button("Submit");
  echo $this->form->end();

  echo $this->Form->button('Forgot Password', [
    'type' => 'button',
    'onclick' => 'location.href=\'/users/forgot_pass/\';',
    ]);