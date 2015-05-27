<?php
namespace GPM\Config\Element;

final class TV extends Element
{
    protected $type = 'TV';
    protected $caption = null;
    protected $inputOptionValues = '';
    protected $defaultValue = '';
    protected $inputType = 'text';
    protected $sortOrder = '0';
    protected $templates = [];
    protected $category;
    protected $inputProperties = [];
    protected $outputProperties = [];

    protected $section = 'Elements: TV';
    protected $required = ['caption'];

    public function fromArray($config)
    {
        $this->validate($config);
        
        $this->caption = $config['caption'];

        if (isset($config['inputOptionValues'])) {
            $this->inputOptionValues = $config['inputOptionValues'];
        }

        if (isset($config['defaultValue'])) {
            $this->defaultValue = $config['defaultValue'];
        }

        if (isset($config['name'])) {
            $this->name = $config['name'];
        } else {
            $this->name = strtolower($this->caption);
        }

        if (isset($config['type'])) {
            $this->inputType = $config['type'];
        }

        if (isset($config['inputProperties'])) {
            $this->inputProperties = $config['inputProperties'];
        }

        if (isset($config['outputProperties'])) {
            $this->outputProperties = $config['outputProperties'];
        }

        if (isset($config['sortOrder'])) {
            $this->sortOrder = $config['sortOrder'];
        }

        if (isset($config['templates'])) {
            if (is_array($config['templates'])) {
                $this->templates = $config['templates'];
            } else {
                throw new \Exception('Elements: ' . $this->type . ' - templates are not an array');
            }
        }

        if (isset($config['category'])) {
            $currentCategories = array_keys($this->config->getCategories());
            if (!in_array($config['category'], $currentCategories)) {
                throw new \Exception('Elements: ' . $this->type . ' - category: ' . $config['category'] . ' does not exist');
            }

            $this->category = $config['category'];
        }

        return true;
    }

    /**
     * @return null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @return string
     */
    public function getInputOptionValues()
    {
        return $this->inputOptionValues;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @return string
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        return $this->templates;
    }

    public function getInputProperties()
    {
        return $this->inputProperties;
    }

    public function getOutputProperties()
    {
        return $this->outputProperties;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}