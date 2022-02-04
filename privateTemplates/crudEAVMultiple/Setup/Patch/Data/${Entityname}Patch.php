<?php
/** *
 * @copyright Copyright ©  Ioweb. All rights reserved.
 * @author
 */

namespace ${Vendorname}\${Modulename}\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use ${Vendorname}\${Modulename}\Setup\${Entityname}SetupFactory;
use ${Vendorname}\${Modulename}\Setup\${Entityname}Setup;

/**
 * @codeCoverageIgnore
 */
class ${Entityname}Patch implements DataPatchInterface,PatchRevertableInterface
{
    /**
     * ${Entityname} setup factory
     *
     * @var ${Entityname}SetupFactory
     */
    protected  $${entityname}SetupFactory;

    /** ModuleDataSetupInterface $moduleDataSetup */
    private $moduleDataSetup;

    /**
     * Init
     *
     * @param ${Entityname}SetupFactory $${entityname}SetupFactory
     */
    public function __construct(${Entityname}SetupFactory $${entityname}SetupFactory, \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->${entityname}SetupFactory = $${entityname}SetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }


    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        //The code that you want apply in the patch
        //Please note, that one patch is responsible only for one setup version
        //So one UpgradeData can consist of few data patches
        $this->install();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        /**
         * This is dependency to another patch. Dependency should be applied first
         * One patch can have few dependencies
         * Patches do not have versions, so if in old approach with Install/Ugrade data scripts you used
         * versions, right now you need to point from patch with higher version to patch with lower version
         * But please, note, that some of your patches can be independent and can be installed in any sequence
         * So use dependencies only if this important for you
         */
        return [
            //SomeDependency::class,
        ];
    }

    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        //Here should go code that will revert all operations from `apply` method
        //Please note, that some operations, like removing data from column, that is in role of foreign key reference
        //is dangerous, because it can trigger ON DELETE statement

        //@todo write code to revert data patch and cleanup
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        /**
         * This internal Magento method, that means that some patches with time can change their names,
         * but changing name should not affect installation process, that's why if we will change name of the patch
         * we will add alias here
         */
        return [];
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install() //@codingStandardsIgnoreLine
    {
        /** @var ${Entityname}Setup $${entityname}Setup */
        $${entityname}Setup = $this->${entityname}SetupFactory->create(['setup' => $this->moduleDataSetup]);

        $this->moduleDataSetup->startSetup();

        $${entityname}Setup->installEntities();
        $entities = $${entityname}Setup->getDefaultEntities();
        foreach ($entities as $entityName => $entity) {
            $${entityname}Setup->addEntityType($entityName, $entity);
        }

        $this->moduleDataSetup->endSetup();
    }
}
