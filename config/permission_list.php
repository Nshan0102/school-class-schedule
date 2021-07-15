<?php

return [
    'admin' => [
        'name' => 'Users Manager',
        'permissions' => [
            'user.index' => 'View user list',
            'user.store' => 'Create user',
            'user.view' => 'View user',
            'user.edit' => 'Edit user',
            'user.update' => 'Update user',
            'user.destroy' => 'Destroy user',
            'school_class.index' => 'View school classes list',
            'school_class.store' => 'Create school class',
            'school_class.view' => 'Show school class',
            'school_class.edit' => 'Edit school class',
            'school_class.update' => 'Update school class',
            'school_class.destroy' => 'Delete school class',
            'schedule.index' => 'View schedules list',
            'schedule.store' => 'Create schedule',
            'schedule.view' => 'View schedule',
            'schedule.edit' => 'Edit schedule',
            'schedule.update' => 'Update schedule',
            'schedule.destroy' => 'Destroy schedule',
        ]
    ],
    'teacher' => [
        'name' => 'Teacher Manager',
        'permissions' => [
            'school_class.index' => 'View school classes list',
            'school_class.view' => 'Show school class',
            'schedule.index' => 'View schedules list',
            'schedule.view' => 'View schedule',
        ]
    ],
];
