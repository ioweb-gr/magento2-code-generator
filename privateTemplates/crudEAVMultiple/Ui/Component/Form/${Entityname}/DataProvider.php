<?php
/**
 * DataProvider
 *
 * @copyright Copyright © ${commentsYear} ${CommentsCompanyName}. All rights reserved.
 * @author    ${commentsUserEmail}
 */
namespace ${Vendorname}\${Modulename}\Ui\Component\Form\${Entityname};

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\FilterPool;
use Magento\Ui\DataProvider\AbstractDataProvider;
use ${Vendorname}\${Modulename}\Model\ResourceModel\${Entityname}\Collection;
use Magento\Catalog\Model\Attribute\ScopeOverriddenValue;
use ${Vendorname}\${Modulename}\Api\Data\${Entityname}Interface;
use ${Vendorname}\${Modulename}\Api\${Entityname}RepositoryInterface;


class DataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var FilterPool
     */
    protected $filterPool;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ScopeOverriddenValue
     */
    protected $scopeOverriddenValue;

    /**
     * @var ${Entityname}RepositoryInterface
     */
    protected $${entityname}Repository;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * Construct
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Collection $collection
     * @param FilterPool $filterPool
     * @param RequestInterface $request
     * @param ScopeOverriddenValue $scopeOverriddenValue
     * @param ${Entityname}RepositoryInterface $${entityname}Repository
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        FilterPool $filterPool,
        RequestInterface $request,
        ScopeOverriddenValue $scopeOverriddenValue,
        DataPersistorInterface $dataPersistor,
        ${Entityname}RepositoryInterface $${entityname}Repository,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection;
        $this->filterPool = $filterPool;
        $this->request = $request;
        $this->scopeOverriddenValue = $scopeOverriddenValue;
        $this->${entityname}Repository = $${entityname}Repository ;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->loadedData) {
            $storeId = (int)$this->request->getParam('store');
            $this->collection
                ->setStoreId($storeId)
                ->addAttributeToSelect('*');
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $item->setStoreId($storeId);
                $this->loadedData[$item->getId()] = $item->getData();
                break;
            }
        }
        return $this->loadedData;
    }

    public function getMeta(){
        $storeId = (int)$this->request->getParam('store');
        $entityId = (int)$this->request->getParam($this->getRequestFieldName());
        $meta = parent::getMeta();

        if (!$entityId) {
            return $meta;
        }

        $entityModel = $this->${entityname}Repository->getById($entityId);
        $scopedFields = ['name'];//add your own here
        foreach ($scopedFields as $scopedField) {
            if ($storeId) {
                $meta['main_fieldset']['children'][$scopedField]['arguments']['data']['config']['service'] = ['template' => 'ui/form/element/helper/service'];
                $meta['main_fieldset']['children'][$scopedField]['arguments']['data']['config']['disabled'] = !$this->scopeOverriddenValue->containsValue(${Entityname}Interface::class, $entityModel, $scopedField, $storeId);
            }
        }
        return $meta;
    }
}
