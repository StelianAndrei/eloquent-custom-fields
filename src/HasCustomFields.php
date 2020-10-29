<?php

namespace StelianAndrei\EloquentCustomFields;

trait HasCustomFields
{
    /**
     * Retrive the CustomField relation for the current model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function customFields()
    {
        return $this->morphToMany(
            config('custom_fields.field_class', 'StelianAndrei\\EloquentCustomFields\\CustomField'),
            config('custom_fields.relation_name', 'custom_fieldable'),
            config('custom_fields.fieldables_table', 'custom_fieldables'),
        )->withPivot(['value']);
    }
}
