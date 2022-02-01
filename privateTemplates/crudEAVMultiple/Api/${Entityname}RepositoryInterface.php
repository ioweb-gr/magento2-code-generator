<?php


/**
 * DO NOT use PHP7 scalar argument types or return types if you want to hook this into the REST API!
 * Add PHPDoc annotations for all arguments and the return type to all methods!
 * Use Fully Qualified Class Names in the PHPDoc block!
 */


namespace ${Vendor}\${Module}\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use ${Vendor}\${Module}\Api\Data\${Entityname}Interface;

interface ${Entityname}RepositoryInterface
{
    /**
     * @param int $id
     * @return \${Vendor}\${Module}\Api\Data\${Entityname}Interface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \${Vendor}\${Module}\Api\Data\${Entityname}Interface $${Entityname}
     * @return \${Vendor}\${Module}\Api\Data\${Entityname}Interface
     */
    public function save(${Entityname}Interface $${entityname});

    /**
     * @param \${Vendor}\${Module}\Api\Data\${Entityname}Interface $${Entityname}
     * @return void
     */
    public function delete(${Entityname}Interface $${entityname});

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \${Vendor}\${Module}\Api\Data\${Entityname}SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}