<?php 
echo "<div class=\"write_title\">Create a new account</div>";
echo "<div class=\"write\">";  
echo form_open('signup'); 
?>
<label>First Name: </label>
<?php $signup_fname = array(
                            'name'        => 'signup_fname',
                            'id'          => 'signup_fname',
                            'value'       => set_value('signup_fname'),
                            'size'        => '75',
                          );
	echo form_input($signup_fname);
  echo form_error('signup_fname'); 
?>

<label>Last Name: </label>
<?php $signup_lname = array(
                            'name'        => 'signup_lname',
                            'id'          => 'signup_lname',
                            'value'       => set_value('signup_lname'),
                            'size'        => '75',
                          );
  echo form_input($signup_lname);
  echo form_error('signup_lname'); 
?>

<label>Email: </label>
<?php $signup_email = array(
                            'name'        => 'signup_email',
                            'id'          => 'signup_email',
                            'value'       => set_value('signup_email'),
                            'size'        => '75',
                          );
  echo form_input($signup_email);
  echo form_error('signup_email'); 
?>

<label>Tel: </label>
<?php $signup_tel = array(
                            'name'        => 'signup_tel',
                            'id'          => 'signup_tel',
                            'value'       => set_value('signup_tel'),
                            'size'        => '75',
                          );
  echo form_input($signup_tel);
  echo form_error('signup_tel'); 
?>

<label>Password: </label>
<?php 
	$signup_pass = array(
              'name'        => 'signup_pass',
              'id'          => 'signup_pass',
              'maxlength'   => '100',
              'size'        => '75',
            );
	echo form_password($signup_pass);
  echo form_error('signup_pass'); 

?>

<label>Repeat Password: </label>
<?php 
  $signup_re_pass = array(
              'name'        => 'signup_re_pass',
              'id'          => 'signup_re_pass',
              'maxlength'   => '100',
              'size'        => '75',
            );
  echo form_password($signup_re_pass);
  echo form_error('signup_re_pass'); 

  echo form_submit('signup','Sign Up');
  echo "<span><a href=\"".site_url("login")."\">Login if you have an account</a></span>";
  echo '</div>';
	echo form_close();
?>

