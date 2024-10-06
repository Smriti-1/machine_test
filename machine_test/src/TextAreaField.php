<?php
namespace App;

class TextAreaField extends Field {
    public function render() {
        return "<label>{$this->label}</label><textarea name='{$this->name}'>{$this->value}</textarea>";
    }
}
