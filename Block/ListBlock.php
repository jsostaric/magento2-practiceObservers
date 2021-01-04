<?php


namespace Inchoo\Sample04\Block;


use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;

class ListBlock extends \Magento\Framework\View\Element\Template
{

    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
}
