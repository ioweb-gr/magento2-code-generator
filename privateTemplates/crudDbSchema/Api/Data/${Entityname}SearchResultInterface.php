<?php
/**
 * Copyright (c) 2020. IOWEB TECHNOLOGIES 
 */

namespace ${Vendorname}\${Modulename}\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ${Entityname}SearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \${Vendorname}\${Modulename}\Api\Data\${Entityname}Interface[]
     */
    public function getItems();

    /**
     * @param \${Vendorname}\${Modulename}\Api\Data\${Entityname}Interface[] $items
     * @return void
     */
    public function setItems(array $items);
}