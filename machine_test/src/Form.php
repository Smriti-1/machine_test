<?php
namespace App;

class Form {
    private $fields = [];

    public function __construct($fieldsConfig) {
        foreach ($fieldsConfig as $fieldConfig) {
            $class = 'App\\' . $fieldConfig['type'];  // Resolve class name dynamically
            $this->fields[] = new $class($fieldConfig['name'], $fieldConfig['label'], $fieldConfig['value'] ?? '');
        }
    }

    public function render() {
        $html = '<form method="POST">';
        foreach ($this->fields as $field) {
            $html .= $field->render() . '<br>';
        }
        $html .= '<button type="submit">Submit</button></form>';
        return $html;
    }
}
