<?php

class AuthView {
    function showLogin($error = null) {
        require_once './templates/formlogin.phtml';
    }

    function showFormRegister($error = null) {
        require_once './templates/formregistro.phtml';
    }
}