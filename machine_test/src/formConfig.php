<?php
use App\Form;

$formConfig = [
    ['type' => 'TextInput', 'name' => 'name', 'label' => 'Name'],
    ['type' => 'TextInput', 'name' => 'phone', 'label' => 'Phone'],
    ['type' => 'TextInput', 'name' => 'email', 'label' => 'Email'],
    ['type' => 'TextAreaField', 'name' => 'address', 'label' => 'Address'],
];

$form = new Form($formConfig);
echo $form->render();
