<?php

namespace Msi\Bundle\BlockBundle\Block\Type;

use Msi\Bundle\BlockBundle\Block\BaseType;

class TextType extends BaseType
{
    protected $appLocales;

    public function __construct($names, $appLocales)
    {
        parent::__construct($names);

        $this->appLocales = $appLocales;
    }

    public function render($block)
    {
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());

        return $this->templating->render('MsiBlockBundle:Block:block_text.html.twig', array('settings' => $settings));
    }

    public function buildForm($builder, $fields = array())
    {
        foreach ($this->appLocales as $locale) {
            $fields[] = array('content_'.$locale, 'textarea', array('label' => 'Content '.strtoupper($locale), 'attr' => array('class' => 'tinymce')));
        }

        parent::buildForm($builder, $fields);
    }
}
