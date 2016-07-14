<?php

namespace Inovadora\StormboxResponse;

/**
 * Classe responsável por armazenar os valores(adicionais) da resposta.
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
 * Classe responsável por armazenar os valores(adicionais) da resposta.
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
class DataItemAditional implements ToArray
{

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $content = '';

    /**
     * Método construtor da classe.
     * 
     * @param string $label
     * @param string $content
     */
    public function __construct($label, $content)
    {
        $this->label = $label;
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
        $result->offsetSet('label', $this->label);
        $result->offsetSet('content', $this->content);

        return $result->getArrayCopy();
    }

}
