<?php

/**
 * ${Entityname}.php
 *
 * @copyright Copyright © ${commentsYear} ${CommentsCompanyName}. All rights reserved.
 * @author    ${commentsUserEmail}
 */

namespace ${Vendorname}\${Modulename}\Model;

use Ioweb\StockManager\Api\Data\StockEntryExtensionInterface;use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Framework\Model\AbstractModel;
use ${Vendorname}\${Modulename}\Api\Data\${Entityname}Interface;

class ${Entityname} extends AbstractExtensibleModel implements IdentityInterface, ${Entityname}Interface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = '${vendorname}_${modulename}_${entityname}';

    /**
     * @var string
     */
    protected $_cacheTag = '${vendorname}_${modulename}_${entityname}';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = '${vendorname}_${modulename}_${entityname}';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('${Vendorname}\${Modulename}\Model\ResourceModel\${Entityname}');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Save from collection data
     *
     * @param array $data
     * @return $this|bool
     */
    public function saveCollection(array $data)
    {
        if (isset($data[$this->getId()])) {
            $this->addData($data[$this->getId()]);
            $this->getResource()->save($this);
        }
        return $this;
    }

    public function getExtensionAttributes()
    {
        return parent::_getExtensionAttributes();
    }

    public function setExtensionAttributes(${Entityname}ExtensionInterface $extensionAttributes)
    {
        return parent::_setExtensionAttributes($extensionAttributes);
    }
}
