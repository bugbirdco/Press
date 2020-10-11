<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Global Settings')
    ->add_fields([
        Field::make_text('my_field', 'My Field'),
    ]);