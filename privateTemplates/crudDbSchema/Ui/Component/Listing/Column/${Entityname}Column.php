<?php
/*
 * Copyright (c) 2022. IOWEB TECHNOLOGIES
 */

namespace ${Vendorname}\${Modulename}\Ui\Component\Listing\Column;


use ${Vendorname}\${Modulename}\Api\${Entityname}RepositoryInterface;
use Magento\Framework\Escaper;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface as StoreManager;
use Magento\Store\Model\System\Store as SystemStore;
use Magento\Ui\Component\Listing\Columns\Column;

class ${Entityname}Column extends Column
{
    /**
     * Escaper
     *
     * @var \Magento\Framework\Escaper
     */
    protected $escaper;

    /**
     * System store
     *
     * @var SystemStore
     */
    protected $systemStore;

    /**
     * Store manager
     *
     * @var StoreManager
     */
    protected $storeManager;

    /**
     * @var string
     */
    protected $key;

    protected $entityRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param SystemStore $systemStore
     * @param Escaper $escaper
     * @param ${Entityname}RepositoryInterface $entityRepository
     * @param array $components
     * @param array $data
     * @param string $key
     */
    public function __construct(
        ContextInterface         $context,
        UiComponentFactory       $uiComponentFactory,
        SystemStore              $systemStore,
        Escaper                  $escaper,
        ${Entityname}RepositoryInterface $entityRepository,
        array                    $components = [],
        array                    $data = [],
                                 $key = 'group_id'
    )
    {
        $this->entityRepository = $entityRepository;
        $this->systemStore = $systemStore;
        $this->escaper = $escaper;
        $this->key = $key;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = $this->prepareItem($item);
            }
        }

        return $dataSource;
    }

    /**
     * Get data
     *
     * @param array $item
     * @return string
     */
    protected function prepareItem(array $item)
    {
        $content = '';
        if (!empty($item[$this->key])) {
            try{
                $object = $this->entityRepository->getById($item[$this->key]);
                return $object->getIdentifier(); //todo replace with whatever field you want
            }
            catch (NoSuchEntityException $noSuchEntityException){
                return $content;
            }
        }

        return $content;
    }
}
