<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentField extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'field_name',
        'field_type',
        'field_label',
        'field_options',
        'field_placeholder',
        'is_required',
        'validation_rules',
        'sort_order',
    ];

    protected $casts = [
        'field_options' => 'array',
        'validation_rules' => 'array',
        'is_required' => 'boolean',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getValidationRulesAttribute($value)
    {
        $rules = [];
        
        if ($this->is_required) {
            $rules[] = 'required';
        }

        // Add field-specific rules
        switch ($this->field_type) {
            case 'email':
                $rules[] = 'email';
                break;
            case 'phone':
                $rules[] = 'regex:/^[\d\s\-\+\(\)]+$/';
                break;
            case 'date':
                $rules[] = 'date';
                break;
            case 'number':
                $rules[] = 'numeric';
                break;
        }

        // Add custom validation rules
        if ($this->validation_rules) {
            $rules = array_merge($rules, $this->validation_rules);
        }

        return $rules;
    }

    public function renderField($value = null)
    {
        $attributes = [
            'id' => $this->field_name,
            'name' => $this->field_name,
            'placeholder' => $this->field_placeholder,
            'class' => 'input-focus w-full px-4 py-3 rounded-xl',
        ];

        if ($this->is_required) {
            $attributes['required'] = 'required';
        }

        switch ($this->field_type) {
            case 'textarea':
                $attributes['rows'] = '4';
                return '<textarea ' . $this->buildAttributes($attributes) . '>' . e($value ?? '') . '</textarea>';
            
            case 'select':
                $options = '';
                foreach ($this->field_options as $option) {
                    $selected = $value == $option ? 'selected' : '';
                    $options .= '<option value="' . e($option) . '" ' . $selected . '>' . e($option) . '</option>';
                }
                return '<select ' . $this->buildAttributes($attributes) . '>' . $options . '</select>';
            
            case 'radio':
                $html = '';
                foreach ($this->field_options as $index => $option) {
                    $id = $this->field_name . '_' . $index;
                    $checked = $value == $option ? 'checked' : '';
                    $html .= '<label class="flex items-center gap-2 mb-2">';
                    $html .= '<input type="radio" id="' . $id . '" name="' . $this->field_name . '" value="' . e($option) . '" ' . $checked . ' class="mr-2">';
                    $html .= '<span>' . e($option) . '</span>';
                    $html .= '</label>';
                }
                return $html;
            
            case 'checkbox':
                $html = '';
                foreach ($this->field_options as $index => $option) {
                    $id = $this->field_name . '_' . $index;
                    $checked = is_array($value) && in_array($option, $value) ? 'checked' : '';
                    $html .= '<label class="flex items-center gap-2 mb-2">';
                    $html .= '<input type="checkbox" id="' . $id . '" name="' . $this->field_name . '[]" value="' . e($option) . '" ' . $checked . ' class="mr-2">';
                    $html .= '<span>' . e($option) . '</span>';
                    $html .= '</label>';
                }
                return $html;
            
            case 'date':
                $attributes['type'] = 'date';
                return '<input ' . $this->buildAttributes($attributes) . ' value="' . e($value ?? '') . '">';
            
            case 'email':
                $attributes['type'] = 'email';
                return '<input ' . $this->buildAttributes($attributes) . ' value="' . e($value ?? '') . '">';
            
            case 'phone':
                $attributes['type'] = 'tel';
                return '<input ' . $this->buildAttributes($attributes) . ' value="' . e($value ?? '') . '">';
            
            case 'number':
                $attributes['type'] = 'number';
                return '<input ' . $this->buildAttributes($attributes) . ' value="' . e($value ?? '') . '">';
            
            default: // text
                $attributes['type'] = 'text';
                return '<input ' . $this->buildAttributes($attributes) . ' value="' . e($value ?? '') . '">';
        }
    }

    private function buildAttributes($attributes)
    {
        $html = '';
        foreach ($attributes as $key => $value) {
            $html .= $key . '="' . e($value) . '" ';
        }
        return $html;
    }
}
