<?php

namespace App\Exceptions;

use Exception;
/**
 * Description of Exceptions
 *
 * @author ayme.pignon
 */
class AppException extends Exception{
    // Nom de l'utilisateur connecté
    const NOMUSERCONNECTE = APP_USER;
    // Nom de l'application
    const NOMAPPLICATION = APP_NAME;
    
    public function __construct(string $message){
        parent::__construct("Erreur d'application " . self::NOMAPPLICATION . "<br> user : " . self::NOMUSERCONNECTE . 
                "<br> message : " . $message);
    }
}
