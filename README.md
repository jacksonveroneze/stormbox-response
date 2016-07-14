# StormBox Response AutoComplete

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
