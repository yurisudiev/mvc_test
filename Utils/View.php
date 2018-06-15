<?php

/**
 * Class View
 */
class View
{
    /**
     * @var string
     */
    private $template;

    /**
     * View constructor.
     * @param $template
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Renders template file & extracts parameters
     * @param array $params
     */
    public function render(array $params = null)
    {
        if ($params) extract($params);
        include '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $this->template;
    }

}