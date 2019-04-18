<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\User;
        $administrator->username = "user123";
        $administrator->name = "Site user";
        $administrator->email = "user@larashop.test";
        $administrator->roles = json_encode(["USER"]);
        $administrator->password = \Hash::make("user123");
        $administrator->address = "office";
        $administrator->phone = "081218303585";
        $administrator->avatar = "null";
        


        $administrator->save();

        $this->command->info("User admin berhasil diinsert");
    }
}
