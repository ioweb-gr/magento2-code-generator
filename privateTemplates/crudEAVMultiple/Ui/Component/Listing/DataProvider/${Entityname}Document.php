<?php
/**
 * Document
 *
 * @copyright Copyright © ${commentsYear} ${CommentsCompanyName}. All rights reserved.
 * @author    ${commentsUserEmail}
 */

namespace ${Vendorname}\${Modulename}\Ui\Component\Listing\DataProvider;

class ${Entityname}Document extends \Magento\Framework\View\Element\UiComponent\DataProvider\${Entityname}Document
{
    protected $_idFieldName = 'entity_id';

    public function getIdFieldName()
    {
        return $this->_idFieldName;
    }
}
