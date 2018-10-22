<?php
    session_start();
    function redirect($place) {
     header ("Location: ".URLROOT."/".$place);
    }

    function flash($name= '', $message = '', $class = 'alert alert-success'){
                if(!empty($name) && !empty($message) && empty($_SESSION[$name])){
                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;

            }elseif(empty($message) && !empty($_SESSION[$name])) {
                echo '<div class="'.$_SESSION[$name.'_class'].'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);

            }
        }