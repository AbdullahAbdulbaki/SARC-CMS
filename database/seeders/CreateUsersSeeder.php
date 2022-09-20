<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Reception User',
               'email'=>'Reception@sarc-sy.org',
               'role_id'=>4,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'PSIS User',
               'email'=>'PSIS@sarc-sy.org',
               'role_id'=> 4,
               'password'=> bcrypt('123456'),
            ],
          
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}