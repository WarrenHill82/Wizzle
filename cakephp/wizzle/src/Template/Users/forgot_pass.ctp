<h1>CakePHP Registration Form</h1>

<?php
  echo $this->form->create('Users', array('action' => 'forgot_pass'));
  echo $this->form->control('email', ['type' => 'email']);
  echo $this->form->submit();
  echo $this->form->end();
?>