<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'list roles',
            'create roles',
            'edit roles',
            'delete roles',

            'list users',
            'create users',
            'edit users',
            'delete users',

            'list accounts',
            'create accounts',
            'edit accounts',
            'delete accounts',

            'list actions',
            'create actions',
            'edit actions',
            'delete actions',

            'list action_histories',
            'create action_histories',
            'edit action_histories',
            'delete action_histories',

            'list action_status',
            'create action_status',
            'edit action_status',
            'delete action_status',

            'list agendas',
            'create agendas',
            'edit agendas',
            'delete agendas',

            'list agenda_options',
            'create agenda_options',
            'edit agenda_options',
            'delete agenda_options',

            'list announcements',
            'create announcements',
            'edit announcements',
            'delete announcements',

            'list contributors',
            'create contributors',
            'edit contributors',
            'delete contributors',

            'list directories',
            'create directories',
            'edit directories',
            'delete directories',

            'list documents',
            'create documents',
            'edit documents',
            'delete documents',

            'list groups',
            'create groups',
            'edit groups',
            'delete groups',

            //Manage meeting

            'list meetings',
            'create meetings',
            'edit meetings',
            'delete meetings',

            //Meeting status

            'publish meetings',
            'start meetings',
            'close meetings',
            'reset meetings',
            'pause meetings',

            'join meetings',
            'export meetings_packs',
            'send meetings_packs',
            'export meetings_minutes',
            'send meetings_minutes',
            'assign presenter',
            'add shared_annotation',
            'add private_annotation',
            'download meeting_documents',
            'schedule next_meetings',

            'list meeting_roles',
            'create meeting_roles',
            'edit meeting_roles',
            'delete meeting_roles',

            'list meeting_types',
            'create meeting_types',
            'edit meeting_types',
            'delete meeting_types',


            'list notifications',
            'create notifications',
            'edit notifications',
            'delete notifications',

            'send contributor_notifications',
            'send participants_notifications',
            'send action_notifications',

            'list organizers',
            'create organizers',
            'edit organizers',
            'delete organizers',

            'list participants',
            'create participants',
            'edit participants',
            'delete participants',

            'list presenters',
            'create presenters',
            'edit presenters',
            'delete presenters',

            'list purposes',
            'create purposes',
            'edit purposes',
            'delete purposes',

            'list resolutions',
            'create resolutions',
            'edit resolutions',
            'delete resolutions',

            'list review_rooms',
            'create review_rooms',
            'edit review_rooms',
            'delete review_rooms',

            'list schedules',
            'create schedules',
            'edit schedules',
            'delete schedules',

            'list settings',
            'create settings',
            'edit settings',
            'delete settings',

            'list votes',
            'create votes',
            'edit votes',
            'delete votes',


         ];

        //  foreach ($permissions as $permission) {
        //     // Permission::create(['guard_name' => 'sanctum', 'name' => $permission ]);
        //     Permission::create(['name' => $permission]);
        //  }

         foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'sanctum', 'name' => $permission ]);
            // Permission::create(['name' => $permission]);
         }
    }
}
