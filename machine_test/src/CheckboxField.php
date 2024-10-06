<?php
namespace App;

class CheckboxField extends Field {
    public function render() {
        $checked = $this->value ? 'checked' : '';
        return "<label>{$this->label}</label><input type='checkbox' name='{$this->name}' {$checked} />";
    }
}
