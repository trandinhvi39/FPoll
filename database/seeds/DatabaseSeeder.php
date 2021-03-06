<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(PollTableSeeder::class);
        $this->call(OptionTableSeeder::class);
        //$this->call(ParticipantTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        //$this->call(ActivityTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        //$this->call(VoteTableSeeder::class);
        //$this->call(ParticipantVoteTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        Model::reguard();
    }
}
