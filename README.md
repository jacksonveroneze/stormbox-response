# StormBox Response AutoComplete [![Build Status](https://travis-ci.org/jacksonveroneze/stormbox-response.svg?branch=master)](https://travis-ci.org/jacksonveroneze/stormbox-response)

[![Total Downloads](https://img.shields.io/packagist/dt/jacksonveroneze/stormbox-response.svg)](https://packagist.org/packages/jacksonveroneze/stormbox-response)
[![Code Climate](https://codeclimate.com/github/jacksonveroneze/stormbox-response/badges/gpa.svg)](https://codeclimate.com/github/jacksonveroneze/stormbox-response)
[![Test Coverage](https://codeclimate.com/github/jacksonveroneze/stormbox-response/badges/coverage.svg)](https://codeclimate.com/github/jacksonveroneze/stormbox-response/coverage)
[![Issue Count](https://codeclimate.com/github/jacksonveroneze/stormbox-response/badges/issue_count.svg)](https://codeclimate.com/github/jacksonveroneze/stormbox-response)

> **Caution!** This element is under construction.

## Installation

Install the latest version with

```bash
$ composer require jacksonveroneze/stormbox-response
```

## Basic Usage

```php
<?php

use \ArrayIterator;
use \Inovadora\StormboxResponse\DataItem;
use \Inovadora\StormboxResponse\DataItemAditional;
use \Inovadora\StormboxResponse\DataItemOthers;
use \Inovadora\StormboxResponse\Pagination;
use \Inovadora\StormboxResponse\Response;

class ResponseTest
{
    /**
     * @var integer
     */
    private $limiteRegistros;

    /**
     * @var object
     */
    private $instance;

    public function test()
    {
        $this->limiteRegistros = 1;
        
        $this->instance = new Response();
        
        for ($i = 0; $i < $this->limiteRegistros; $i++) {
            $others = new DataItemOthers('field_' . $i, $i, 'content_' . $i);
            $additional = new DataItemAditional('Label', $i);
            $dataItem = new DataItem('Content_' . $i, $i, new ArrayIterator([$others]), new ArrayIterator([$additional]));
            $this->instance->setDataItem($dataItem);
        }
        $this->instance->setPagination(new Pagination($this->limiteRegistros, 30, 1));

		$result = json_encode($this->instance->toArray());
    }

```

## Response example
```
{
  "data": [
    {
      "content": "Content_0",
      "value": 0,
      "others": [
        {
          "field": "field_0",
          "value": 0,
          "content": "content_0"
        }
      ],
      "additional": [
        {
          "label": "Label",
          "content": 0
        }
      ]
    }
  ],
  "pagination": {
    "size": 1,
    "per_page": 30,
    "current_page": 1
  }
}
```

## Documentation

### Author

Jackson Veroneze - <jackson@jacksonveroneze.com> - <http://jacksonveroneze.com><br />
See also the list of [contributors](https://github.com/jacksonveroneze/stormbox-response/graphs/contributors) which participated in this project.

### License

Stormbox Response is licensed under the MIT License - see the `LICENSE` file for details
