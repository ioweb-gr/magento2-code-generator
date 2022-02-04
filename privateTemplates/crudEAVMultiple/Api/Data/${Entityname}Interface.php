<?php
/**
 * Copyright (c) 2020. IOWEB TECHNOLOGIES
 */

namespace ${Vendorname}\${Modulename}\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface ${Entityname}Interface
 *
 * @package ${Vendorname}\${Modulename}\Api\Data
 */
interface ${Entityname}Interface extends ExtensibleDataInterface
{

    const JSON_KEYS = [
      self::KEY_IDENTIFIER,
    ];

    const KEY_IDENTIFIER = 'identifier';

    const KEY_CREATED_AT = 'created_at';

    const KEY_UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId($id);


    /**
     * @return \${Vendorname}\${Modulename}\Api\Data\${Entityname}ExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \${Vendorname}\${Modulename}\Api\Data\${Entityname}ExtensionInterface $extensionAttributes
     *
     * @return void
     */
    public function setExtensionAttributes(
      ${Entityname}ExtensionInterface $extensionAttributes
    );

}