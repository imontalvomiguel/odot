<?php
 
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 23) as $index) {

            $name = $faker->name;

            $user = User::create([
                'name'  => $name,
                'email'      => $faker->email,
                'password'   =>  Hash::make('123456')
            ]);

            $todo_list = TodoList::create([
                'user_id' => $user->id,
                'name' => $user->name
            ]);

            foreach (range(1, 7) as $key) {
                TodoItem::create([
                    'todo_list_id' => $todo_list->id,
                    'content' => $faker->sentence($nbWords = 7)
                ]);
            }
        }

    }
 
}