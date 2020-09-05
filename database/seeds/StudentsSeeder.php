<?php
use App\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
              'user_id' => '1',
              'firstname' => "Student",
              'lastname' => 'One',
            ]
        ];

        foreach ($students as $key => $student) {
            $result = Student::create($student);
        }
    }
}
