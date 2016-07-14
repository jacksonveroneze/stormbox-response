<?php

namespace Inovadora\StormboxResponse\Response;

/**
 * Classe responsável por armazenar os itens da resposta.
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
 * Classe responsável por armazenar os itens da resposta.
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
class DataItem implements ToArray
{

    /**
     * @var string
     */
    private $content = '';

    /**
     * @var integer
     */
    private $value = null;

    /**
     * @var ArrayIterator
     */
    private $others = null;

    /**
     * @var ArrayIterator
     */
    private $additional = null;

    /**
     * Método construtor da classe.
     * 
     * @param string $content
     * @param integer $value
     * @param ArrayIterator $others
     * @param ArrayIterator $additional
     */
    public function __construct($content, $value, ArrayIterator $others = null, ArrayIterator $additional = null)
    {
        $this->content = $content;
        $this->value = $value;
        $this->others = new ArrayIterator();
        $this->additional = new ArrayIterator();

        if (!is_null($others)) {
            $this->others = $others;
        }

        if (!is_null($additional)) {
            $this->additional = $additional;
        }
    }

    /**
     * Método responsável por retornar o objeto como array.
     * 
     * @return array
     */
    public function toArray()
    {
        $listOthers = new ArrayIterator();
        $listAdditional = new ArrayIterator();

        foreach ($this->others as $others) {
            $listOthers->append($others->toArray());
        }

        foreach ($this->additional as $additional) {
            $listAdditional->append($additional->toArray());
        }

        $result = new ArrayIterator();
        $result->offsetSet('content', $this->content);
        $result->offsetSet('value', $this->value);
        $result->offsetSet('others', $listOthers->getArrayCopy());
        $result->offsetSet('additional', $listAdditional->getArrayCopy());

        return $result->getArrayCopy();
    }

}
