<?php
namespace App;

class TextInput extends Field {
    public function render() {
        return "<label>{$this->label}</label><input type='text' name='{$this->name}' value='{$this->value}' />";
    }
}
