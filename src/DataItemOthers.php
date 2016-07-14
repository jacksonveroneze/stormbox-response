<?php

namespace Inovadora\StormboxResponse;

/**
 * Classe responsável por armazenar os valores(outros) da resposta.
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
use \ArrayIterator;

/**
 * Classe responsável por armazenar os valores(outros) da resposta.
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
class DataItemOthers implements ToArray
{

    /**
     * @var string
     */
    private $field = '';

    /**
     * @var string
     */
    private $value = '';

    /**
     * @var string
     */
    private $content = '';

    /**
     * Método construtor da classe.
     * 
     * @param string $field
     * @param string $value
     * @param string $content
     */
    public function __construct($field, $value, $content = '')
    {
        $this->field = $field;
        $this->value = $value;
        $this->content = $content;
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $result = new ArrayIterator();
        $result->offsetSet('field', $this->field);
        $result->offsetSet('value', $this->value);
        $result->offsetSet('content', $this->content);

        return $result->getArrayCopy();
    }

}
