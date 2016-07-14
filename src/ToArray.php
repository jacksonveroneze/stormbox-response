<?php

namespace Inovadora\StormboxResponse;

/**
 * Interface responsável por padronizar o retorno do objeto em forma de array.
 *
 * PHP Version 5.6.0
 *
 * @category Autocomplete
 * @package  Response
 * @author Jackson Veroneze <jackson@inovadora.com.br>
 * @author Ladislau Perrony <ladislau.perrony@inovadora.com.br>
 * @author Mario Mendonça <mario@inovadora.com.br>
 * @author Mateus Calza <mateus@inovadora.com.br>
 * @license  http://inovadora.com.br/licenca  Inovadora
 * @link     #
 * @version 01.00.000
 */
interface ToArray
{

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    function toArray();
}
