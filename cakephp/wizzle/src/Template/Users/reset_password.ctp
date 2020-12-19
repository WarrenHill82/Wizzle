<h1>Reset Password</h1>

<?php
  echo $this->form->create('Users', array('action' => 'reset_password'));
  echo $this->form->control('password', ['type' => 'password', 'label' => "New Password"]);
  echo $this->form->control('password_confirm', ['type' => 'password', 'label' => "New Password (Confirm)"]);
  echo $this->form->submit();
  echo $this->form->end();
?>