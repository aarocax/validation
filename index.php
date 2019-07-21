<?php

require 'Validation.php';

$val = new Validation; ?>
    
<form method="post" action="#">
	<label for="name">Name:</label>
  <input type="text" name="name" >
  <input type="text" name="apellidos" >
  <label for="email">E-Mail:</label>
  <input type="text" name="email" >
  <label for="tel">Telephone:</label>
  <input type="text" name="tel" pattern="<?php echo $val->patterns['tel']; ?>">
  <label for="message">Message:</label>
  <textarea name="message" cols="40" rows="6" ></textarea>
  <button type="submit">Send</button>
</form>

<?php 
	
    if(!empty($_POST)){
	
    	$val->name('anselmo')->value($_POST['name']);
    	echo 'nmbre_'.$val->name."<br>";
    	echo 'val_'.$val->value."<br>";
    	echo 'patl_'.$val->pattern."<br>";


      if( $val->value($_POST['name'])->pattern('words')->required()->isSuccess() ) {
      	echo "name: ".$_POST['name']." es válido."."<br>";
      	echo $val->name."<br>";
      }

      if ( $val->name('email')->value($_POST['email'])->pattern('email')->isSuccess() ) {
      	echo "e-mail: ".$_POST['email']." es válido."."<br>";
      } else {
      	echo $_POST['email']."<br>";
      }
      // $var = $val->name('apellidos')->value($_POST['apellidos'])->pattern('alpha')->required()->isSuccess();
      // $var2 = $val->purify($_POST['apellidos']);
      // $val->name('e-mail')->value($_POST['email'])->pattern('email')->required();
      // $val->name('tel')->value($_POST['tel'])->pattern('tel');
      // $val->name('message')->value($_POST['message'])->pattern('text')->required();

      if($val->isSuccess()){
          echo 'Validation ok!';        
      }else{
          echo $val->displayErrors();
      }

      echo 'var:'.$var;
      echo 'var2:'.$var2;
      echo "<br>";
      var_dump($val->getErrors());


  	}