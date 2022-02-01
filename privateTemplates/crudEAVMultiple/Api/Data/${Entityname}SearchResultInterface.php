<?php
/**
 * Copyright (c) 2020. IOWEB TECHNOLOGIES 
 */

namespace ${Vendor}\${Module}\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ${Entityname}SearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \${Vendor}\${Module}\Api\Data\${Entityname}Interface[]
     */
    public function getItems();

    /**
     * @param \${Vendor}\${Module}\Api\Data\${Entityname}Interface[] $items
     * @return void
     */
    public function setItems(array $items);
}