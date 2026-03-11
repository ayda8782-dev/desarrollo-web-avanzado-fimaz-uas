# Practica 1 - programcion orientada a objetos en php

## Objetivo
Aplicar los fundamentos de la programcion orientada a objetos en php, implementando una clase con atrivutos privados, constructor y merodos de accceso (getters/setters), siguiendo las buenas practicas de encapsulamiento.

## Descripcion de la clase 

### Usuario.php

La clase Usuario modela a un usuario del sistema con los siguientes elementos:

| Elemento | Tipo | Descripcion |
|---|---|---|
| nombre | private string | Nombre del usuario |
| correo | private string | Correo del usuario |
| Construct | constructor | Inicializa ambos atributos |
| getNombre | getter | Retorna el nombre del usuario |
| getCorreo | getter | Retorna el correo del usuario |
| setNombre | setter | Actualiza el nombre del usuario |
| setCorreo | setter | Actualiza el correo del usuario |

## Principios aplicados:
Los atributos son private, por lo que solo se pueden leer o modificar a traves de los metodos publicos de la clas, garantizando el encapsulamiento.
