<?php


namespace Inchoo\Sample04\Setup;


use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $newsTable = 'inchoo_news';
        $commentTable = 'inchoo_news_comments';

        if(version_compare($context->getVersion(), '0.0.6', '<')) {
            if ($setup->getConnection()->isTableExists($setup->getTable($newsTable))) {
                $setup->getConnection()
                    ->addColumn($setup->getTable($newsTable), 'content', [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => false,
                        'comment' => 'News Content'
                ]);

                $setup->getConnection()
                    ->addColumn($setup->getTable($newsTable), 'created_at', [
                        'type' => Table::TYPE_TIMESTAMP,
                        'comment' => 'Created at',
                        'default' => Table::TIMESTAMP_INIT
                ]);
                $setup->getConnection()
                    ->addColumn($setup->getTable($newsTable), 'updated_at', [
                        'type' => Table::TYPE_TIMESTAMP,
                        'default' => Table::TIMESTAMP_INIT_UPDATE,
                        'comment' => 'Updated At'
                ]);
            }
        }

        if(version_compare($context->getVersion(), '0.0.7', '<')){
            if(!$setup->getConnection()->isTableExists($setup->getTable($commentTable))) {
                $table = $setup->getConnection()->newTable($setup->getTable($commentTable))
                    ->addColumn('comment_id', Table::TYPE_INTEGER, null, [
                        'primary' => true,
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false
                    ])
                    ->addColumn('news_id', Table::TYPE_INTEGER, null, [
                        'unsigned' => true,
                        'nullable' => false,
                    ])
                    ->addColumn('content', Table::TYPE_TEXT, 255, [
                        'nullable' => false,
                        'default' => ''
                    ])
                    ->addForeignKey(
                        $setup->getFkName($commentTable, 'news_id', 'inchoo_news', 'news_id'),
                        'news_id',
                        'inchoo_news',
                        'news_id',
                        AdapterInterface::FK_ACTION_CASCADE
                    );

                $setup->getConnection()->createTable($table);
            }
        }

        $setup->endSetup();
    }
}
