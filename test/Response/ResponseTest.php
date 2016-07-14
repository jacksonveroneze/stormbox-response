<?php

namespace InovadoraTest\StormboxResponse\Response;

/**
 * Classe responsável pelo teste unitário.
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
use \Inovadora\StormboxResponse\Response\DataItem;
use \Inovadora\StormboxResponse\Response\DataItemAditional;
use \Inovadora\StormboxResponse\Response\DataItemOthers;
use \Inovadora\StormboxResponse\Response\Pagination;
use \Inovadora\StormboxResponse\Response\Response;
use \PHPUnit_Framework_TestCase;

/**
 * Classe responsável pelo teste unitário.
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
class ResponseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var object
     */
    private $instance;

    /**
     * @var integer
     */
    private $limiteRegistros;

    /**
     * Método responsável por alocar os recursos necessários ao teste.
     * 
     * @return void
     */
    public function setUp()
    {
        $this->limiteRegistros = rand(1, 100);

        $this->instance = new Response();

        for ($i = 0; $i < $this->limiteRegistros; $i++) {
            $others = new DataItemOthers('field_' . $i, $i, 'content_' . $i);
            $additional = new DataItemAditional('Label', $i);
            $dataItem = new DataItem('Content_' . $i, $i, new ArrayIterator([$others]), new ArrayIterator([$additional]));
            $this->instance->setDataItem($dataItem);
        }

        $this->instance->setPagination(new Pagination($this->limiteRegistros, 30, 1));
    }

    /**
     * Método responsável por remover os recursos definidos no setUp.
     * 
     * @return void
     */
    protected function tearDown()
    {
        unset($this->limiteRegistros);
        unset($this->instance);
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testNotEmpty()
    {
        $this->assertNotEmpty($this->instance->toArray());
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testEqualsLimitRegistros()
    {
        $this->assertEquals($this->limiteRegistros, count($this->instance->toArray()['data']));
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testHasOthers()
    {
        $this->assertNotEmpty($this->instance->toArray()['data'][0]['others']);
    }

}
