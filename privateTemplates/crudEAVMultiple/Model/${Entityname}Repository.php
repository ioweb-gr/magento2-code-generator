<?php
/**
 * Copyright (c) 2020. IOWEB TECHNOLOGIES
 */

namespace ${Vendor}\${Module}\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use ${Vendor}\${Module}\Api\Data\${Entityname}Interface;
use ${Vendor}\${Module}\Api\Data\${Entityname}SearchResultInterface;
use ${Vendor}\${Module}\Api\Data\${Entityname}SearchResultInterfaceFactory;
use ${Vendor}\${Module}\Api\${Entityname}RepositoryInterface;
use ${Vendor}\${Module}\Model\ResourceModel\${Entityname}\CollectionFactory as ${Entityname}CollectionFactory;
use ${Vendor}\${Module}\Model\ResourceModel\${Entityname}\Collection;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class ${Entityname}Repository implements ${Entityname}RepositoryInterface
{
    /**
     * @var ${Entityname}Factory
     */
    private $${entityname}Factory;

    /**
     * @var ${Entityname}CollectionFactory
     */
    private $${entityname}CollectionFactory;

    /**
     * @var ${Entityname}SearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /** @var $collectionProcessor \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface */
    private $collectionProcessor;

    public function __construct(
        ${Entityname}Factory $${entityname}Factory,
        ${Entityname}CollectionFactory $${entityname}CollectionFactory,
        ${Entityname}SearchResultInterfaceFactory $${entityname}SearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->${entityname}Factory = $${entityname}Factory;
        $this->${entityname}CollectionFactory = $${entityname}CollectionFactory;
        $this->searchResultFactory = $${entityname}SearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }


    public function getById($id)
    {
        $${entityname} = $this->${entityname}Factory->create();
        $${entityname}->getResource()->load($${entityname}, $id);
        if (! $${entityname}->getId()) {
            throw new NoSuchEntityException(__('Unable to find ${entityname} with ID "%1"', $id));
        }
        return $${entityname};
    }

    public function save(${Entityname}Interface $${entityname})
    {
        $${entityname}->getResource()->save($${entityname});
        return $${entityname};
    }


    public function delete(${Entityname}Interface $${entityname})
    {
        $${entityname}->getResource()->delete($${entityname});
    }

        /**
         * Load Page data collection by given search criteria
         *
         * @SuppressWarnings(PHPMD.CyclomaticComplexity)
         * @SuppressWarnings(PHPMD.NPathComplexity)
         * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
         * @return \${Vendor}\${Module}\Api\Data\${Entityname}SearchResultInterface
         */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \{$Vendorname}\${Module}\Model\ResourceModel\${Entityname}\Collection $collection */
        $collection = $this->${entityname}CollectionFactory->create();
        $collection->addAttributeToSelect('*');

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }



}