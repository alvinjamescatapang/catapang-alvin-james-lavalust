<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $this->view('student_home');
    }

    public function profile()
    {
        $student = [
            'student_id' => '2024-00115',   // replace with your own
            'name'       => 'Alvin James',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F3',
            'email'      => 'catapang.alvinj@minsu.edu.ph'
        ];
        $this->view('student_profile', $student);
    }
}