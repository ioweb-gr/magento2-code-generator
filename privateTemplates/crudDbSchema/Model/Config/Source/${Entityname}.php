<?php
/**
 * Copyright (c) 2017. IOWEB TECHNOLOGIES
 */

/**
 * Created by IntelliJ IDEA.
 * User: gabtz
 * Date: 4/12/2017
 * Time: 9:05 μμ
 */

namespace ${Vendorname}\${Modulename}\Model\Config\Source;


use ${Vendorname}\${Modulename}\Api\${Entityname}RepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterfaceFactory;
use Magento\Framework\Data\OptionSourceInterface;

class ${Entityname} implements OptionSourceInterface
{

    protected $${entityname}Repository;

    protected $searchCriteriaInterfaceFactory;

    public function __construct(
      ${Entityname}RepositoryInterface $${entityname}Repository,
      SearchCriteriaInterfaceFactory $searchCriteriaInterfaceFactory
    ) {
        $this->${entityname}Repository = $${entityname}Repository;
        $this->searchCriteriaInterfaceFactory = $searchCriteriaInterfaceFactory;
    }

    /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
        /** @var  \Magento\Framework\Api\SearchCriteriaInterface $criteria */
        $criteria = $this->searchCriteriaInterfaceFactory->create();
        $items = $this->${entityname}Repository->getList($criteria)->getItems();
        $ret = [];

        foreach ($items as $key => $item) {
            /** @var $item \${Vendorname}\${Modulename}\Api\Data\${Entityname}Interface */
            $ret[] = [
              'value' => $item->getId(),
              'label' => $item->getName(),
            ];
        }

        return $ret;
    }


}