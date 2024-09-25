# Bohol Police Provincial Office Scoreboard Management System

## Overview

The Bohol Police Provincial Office Scoreboard Management System is a web-based application designed to manage and display various metrics related to police operations and performance. The system provides an intuitive interface for managing scores, statistics, and other relevant data for the police department.

## Features

- **User Authentication:** Secure login and registration for different user roles.
- **Role Management:** Define and assign roles with specific permissions.
- **Score Management:** Add, update, and view scores and statistics.
- **Responsive Design:** Accessible and functional across various devices.

## Technologies Used

- **Laravel:** PHP framework for backend development.
- **Livewire:** Full-stack framework for dynamic interfaces.
- **Spatie Permission:** For role and permission management.
- **Bootstrap/Tailwind CSS:** For styling and responsive design.
- **MySQL:** Database for storing user data and scores.

![BPPO Logo](https://www.boholchronicle.com.ph/wp-content/uploads/2018/07/bppo-logo.jpg)


        $startDate = Carbon::parse('2020-10-25');
        $endDate = Carbon::now();

        $diff = $startDate->diff($endDate);

        $years = $diff->y;
        $months = $diff->m;
        $formattedDifference = "{$years} years and {$months} months";

        $now = now()->format('F d, Y g:i A');


         $this->user_total_points = $total_output + $total_job_knowledge + $total_work_management + $total_interpersonal + $total_concern + $total_personal;

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->middle_name = $this->user->middle_name;
        $this->position = $this->user->position->position_name;
        $this->year_attended = $this->user->year_attended;
        $this->rank = $this->user->rank;
        $this->unit_assign = $this->user->unit->unit_assignment;
