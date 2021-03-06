<?php

namespace Msi\Bundle\BlockBundle\Block\Type;

use Msi\Bundle\BlockBundle\Block\BaseType;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class TemplateType extends BaseType
{
    protected $templates;

    public function __construct($nameChoices, $templates)
    {
        parent::__construct($nameChoices);

        $this->templates = $templates;
    }

    public function render($block)
    {
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());

        return $this->templating->render($settings['template'], array('settings' => $settings));
    }

    public function buildForm($builder, $fields = array())
    {
        $fields = array(
            array('template', 'choice', array('choices' => $this->templates)),
        );

        parent::buildForm($builder, $fields);
    }
}
