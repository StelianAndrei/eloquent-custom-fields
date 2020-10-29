<?php

namespace StelianAndrei\EloquentCustomFields;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['label', 'type'];

    /**
     * Return the value from the pivot
     *
     * @return null|mixed
     */
    public function getValueAttribute()
    {
        if (!$this->pivot) {
            return null;
        }

        return $this->pivot->value;
    }

    /**
     * Set the value on the pivot
     *
     * @param mixed $value
     */
    public function setValueAttribute($value = null)
    {
        if ($this->pivot) {
            $this->pivot->update(['value' => $value]);
        }
    }
}
