<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        // Load the view directly
        $this->load->view('student_home');
    }

    public function profile()
    {
        $student = [
            'student_id' => '2024-00115',
            'name'       => 'Alvin James',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F3',
            'email'      => 'alvin@example.com'
        ];
        // Pass data as second parameter
        $this->load->view('student_profile', $student);
    }
}