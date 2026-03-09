<?php

require_once 'Usuario.php';

/**
 * Clase Admin
 *
 * Extiende la clase base Usuario agregando el rol
 * de Administrador. Hereda nombre, correo, constructor,
 * getters y setters sin necesidad de redefinirlos.
 *
 * @author Práctica POO - PHP
 * @version 1.0
 */
class Admin extends Usuario
{
    /**
     * Retorna el rol del administrador
     *
     * @return string
     */
    public function getRol(): string
    {
        return 'Administrador';
    }
}
