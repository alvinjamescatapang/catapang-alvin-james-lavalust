<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $this->call->view('student_home');
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00115',
            'name' => 'Alvin James L. Catapang',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'F3',
            'email' => 'catapang.alvinj@minsu.edu.ph',
        ];

        $this->call->view('student_profile', $student);
    }
}