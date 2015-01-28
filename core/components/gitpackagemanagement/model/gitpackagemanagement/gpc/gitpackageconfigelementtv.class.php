<?php

class GitPackageConfigElementTV extends GitPackageConfigElement{
    protected $type = 'TV';
    protected $caption = null;
    protected $inputType = 'text';
    protected $templates = array();

    public function fromArray($config) {
        if(isset($config['caption'])){
            $this->caption = $config['caption'];
        }else{
            $this->config->error->addError('Elements: ' . $this->type . ' - caption is not set', true);
            return false;
        }

        if(isset($config['name'])){
            $this->name = $config['name'];
        }else{
            $this->name = strtolower($this->caption);
        }

        if(isset($config['type'])){
            $this->inputType = $config['type'];
        }

        if(isset($config['templates'])){
            if(is_array($config['templates'])){
                $this->templates = $config['templates'];
            }else{
                $this->config->error->addError('Elements: ' . $this->type . ' - templates are not an array', true);
                return false;
            }
        }

        return true;
    }

    /**
     * @return null
     */
    public function getCaption() {
        return $this->caption;
    }

    /**
     * @return string
     */
    public function getInputType() {
        return $this->inputType;
    }

    /**
     * @return array
     */
    public function getTemplates() {
        return $this->templates;
    }


}