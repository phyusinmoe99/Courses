<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Seat;
use App\Models\User;
use Carbon\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        $basicPhpImagepath = 'images/basicPhp.jpg';
        $laravelImagepath = 'images/laravel.jpg';
        $javaImagepath = 'images/java.jpg';
        $javascriptImagepath = 'images/javascript.png';
        $reactImagepath = 'images/react.jpg';
        $uiuxImagepath = 'images/uiux.jpg';


        $php = ['Getting Started with PHP', 'Control Structures', '  Introduction to Object-Oriented Programming (OOP) in PHP', 'Working with Forms and User Input', ' Working with Files', 'Database Connectivity with MySQL', 'Building a Simple Web Application'];
        $laravel = ['Introduction to Laravel', 'MVC (Model-View-Controller) architecture', '  CRUD Operations', 'Middleware and Requests', ' Authentication and Authorization', 'Error Handling and Logging'];
        $java = ['Introduction to Java', 'Java Basics', 'Object-Oriented Programming (OOP) in Java', 'Exception Handling', 'File Handling', 'Java Generics', 'Java Database Connectivity (JDBC)'];
        $javascript = ['Introduction to JavaScript', 'Functions and Scope', 'DOM Manipulation', 'ES6+ Features', 'Error Handling', 'AJAX and Fetch AP', 'JavaScript Modules'];
        $react = ['Introduction to React', 'Component Lifecycle', 'Handling Events', 'Working with Forms', 'Lists and Keys', 'React Hooks', 'Error Handling and Error Boundaries'];
        $uiux = ['Introduction to UI/UX Design', 'Fundamentals of Design', 'UI Design Tools', 'User Research', 'Interaction Design', 'Responsive Design','Portfolio Building and Presentation'];

        $phpOutline = serialize($php);
        $laravelOutline = serialize($laravel);
        $javaOutline = serialize($java);
        $javascriptOutline = serialize($javascript);
        $reactOutline = serialize($react);
        $uiuxOutline = serialize($uiux);


        Courses::create([
            'image_path' => $basicPhpImagepath,
            'title' => 'PHP',
            'type'=> 'php',
            'content' => 'This course provides an introduction to PHP (Hypertext Preprocessor), a widely-used open-source scripting language suited for web development. Participants will learn the fundamentals of PHP programming, including syntax, variables, control structures, functions, and interaction with databases.',
            'course_outline' => $phpOutline,
            'duration' => '3 months',
            'timetable' => '8AM to 10AM / Mon&Tue',
            'starting_date' => '1/6/2024',
            'fee' => '300,000KS',

        ]);
        Courses::create([
            'image_path' => $laravelImagepath,
            'title' => 'Laravel',
            'type'=> 'php',
            'content' => 'Mastering Laravel is a comprehensive course designed to equip participants with the skills and knowledge necessary to build modern web applications using the Laravel framework. Throughout the course, participants will learn the fundamentals of Laravel, including routing, database interaction, authentication, and more. They will also delve into advanced topics such as RESTful API development, testing, and deployment',
            'course_outline' => $laravelOutline,
            'duration' => '3 months',
            'timetable' => '9AM to 11AM / Sat&Sun',
            'starting_date' => '1/6/2024',
            'fee' => '300,000KS',

        ]);
        Courses::create([
            'image_path' => $javaImagepath,
            'title' => 'Java',
            'type'=> 'java',
            'content' => 'This course is designed to provide a comprehensive understanding of the Java programming language, from basic syntax to advanced concepts and practical application development. Through a combination of lectures, hands-on programming exercises, and projects, students will gain the skills necessary to become proficient Java developers.',
            'course_outline' => $javaOutline,
            'duration' => '4 months',
            'timetable' => '9AM to 11AM / Sat&Sun',
            'starting_date' => '1/6/2024',
            'fee' => '350,000KS',

        ]);
        Courses::create([
            'image_path' => $javascriptImagepath,
            'title' => 'Javascript',
            'type'=> 'javascript',
            'content' => 'This course offers a comprehensive exploration of JavaScript, the programming language that powers dynamic web content. From basic syntax to advanced concepts and real-world application development, students will gain the skills necessary to become proficient JavaScript developers. Through a blend of theory, hands-on exercises, and projects, participants will learn to create interactive and dynamic web pages, handle user events, manipulate the DOM (Document Object Model), and work with popular JavaScript libraries and frameworks.',
            'course_outline' => $javascriptOutline,
            'duration' => '3 months',
            'timetable' => '9AM to 11AM / Fri&Sat',
            'starting_date' => '1/6/2024',
            'fee' => '300,000KS',

        ]);
        Courses::create([
            'image_path' => $reactImagepath,
            'title' => 'React',
            'type'=> 'javascript',
            'content' => 'This course offers a comprehensive exploration of React.js, a popular JavaScript library for building user interfaces. Participants will learn React.js from the ground up, starting with the basics and gradually progressing to advanced topics such as state management, routing, and integration with backend services. Through a combination of lectures, hands-on exercises, and projects, students will gain the skills necessary to build modern, interactive web applications using React.js',
            'course_outline' => $reactOutline,
            'duration' => '2 months',
            'timetable' => '9AM to 11AM / Wed&Thur',
            'starting_date' => '1/6/2024',
            'fee' => '300,000KS',

        ]);
        Courses::create([
            'image_path' => $uiuxImagepath,
            'title' => 'UI/UX',
            'type'=> 'design',
            'content' => 'This course provides a comprehensive introduction to User Interface (UI) and User Experience (UX) design principles and practices. Participants will learn how to create engaging and user-friendly digital experiences across various platforms, including web and mobile applications. Through a combination of lectures, hands-on projects, and case studies, students will gain the skills necessary to design intuitive interfaces and optimize user experiences.',
            'course_outline' => $uiuxOutline,
            'duration' => '2 months',
            'timetable' => '8AM to 10AM / Fri&Sat',
            'starting_date' => '1/6/2024',
            'fee' => '200,000KS',

        ]);
        Enrollment::factory(10)->create();
    }
}
