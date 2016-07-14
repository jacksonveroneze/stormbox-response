<?php

namespace InovadoraTest\StormboxResponse;

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
use \Inovadora\StormboxResponse\Pagination;
use \PHPUnit_Framework_TestCase as TestCase;

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
class PaginationTest extends TestCase
{

    /**
     * @var object
     */
    private $instance;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var integer
     */
    private $perPage;

    /**
     * @var integer
     */
    private $currentPage;

    /**
     * Método responsável por alocar os recursos necessários ao teste.
     * 
     * @return void
     */
    public function setUp()
    {
        $this->size = rand(1, 10000);
        $this->perPage = rand(1, 10000);
        $this->currentPage = rand(1, 10000);
        $this->instance = new Pagination($this->size, $this->perPage, $this->currentPage);
    }

    /**
     * Método responsável por remover os recursos definidos no setUp.
     * 
     * @return void
     */
    protected function tearDown()
    {
        unset($this->size);
        unset($this->perPage);
        unset($this->currentPage);
        unset($this->instance);
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testAssertNotEmpty()
    {
        $this->assertNotEmpty($this->instance->toArray());
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testAssertCount()
    {
        $this->assertCount(3, $this->instance->toArray());
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testAssertEqualsSize()
    {
        $this->assertEquals($this->size, $this->instance->toArray()['size']);
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testAssertEqualsPerPage()
    {
        $this->assertEquals($this->perPage, $this->instance->toArray()['per_page']);
    }

    /**
     * Método responsável por testar.
     * 
     * @return void
     */
    public function testAssertEqualsCurrentPage()
    {
        $this->assertEquals($this->currentPage, $this->instance->toArray()['current_page']);
    }

}
