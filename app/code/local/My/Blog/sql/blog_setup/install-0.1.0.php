<?php

$installer = $this;
$installer->startSetup();
$installer->addEntityType(
    'my_blog',
    array(
        'entity_model' => 'blog/eavmyblogpost',
        'table' => 'blog/eavmyblogpost',
    )
);