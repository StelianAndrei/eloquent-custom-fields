<?php

return [
    /*
    |
    | The class used for defining the Custom Field model. Extend this if you need to add or override functionality
    |
    */

    'field_class' => 'StelianAndrei\\EloquentCustomFields\\CustomField',

    /*
    |
    | The name of the MorphMany relation
    |
    */

    'relation_name' => 'custom_fieldable',

    /*
    |
    | The database table where the CustomField models will be stored
    |
    */
    'fields_table' => 'custom_fields',

    /*
    |
    | The database table that holds the relation between your Eloquent models and the CustomField models, along with
    | the "value" column for that relation
    |
    */

    'fieldables_table' => 'custom_fieldables',
];
