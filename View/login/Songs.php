<?php

class Songs {

    private int $employee_id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $phone_number;
    private string $hire_date;
    private int $job_id;
    private float $salary;
    private int $manager_id;
    private int $department_id;

    public function getEmployeeId(){
        return $this->employee_id;
    }
    public function setEmployeeId($employee_id){
        $this->employee_id = $employee_id;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function setFirstName($last_name){
        $this->last_name = $last_name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPhoneNumber(){
        return $this->phone_number;
    }
    public function setPhoneNumber($phone_number){
        $this->phone_number = $phone_number;
    }
    public function getHireDate(){
        return $this->hire_date;
    }
    public function setHireDate($hire_date){
        $this->hire_date = $hire_date;
    }
    public function getJobId(){
        return $this->job_id;
    }
    public function setJobId($job_id){
        $this->job_id = $job_id;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function setSalary($salary){
        $this->salary = $salary;
    }
    public function getManagerId(){
        return $this->manager_id;
    }
    public function setManagerId($manager_id){
        $this->manager_id = $manager_id;
    }
    public function getDepartmentId(){
        return $this->department_id;
    }
    public function setDepartmentId($department_id){
        $this->department_id = $department_id;
    }
}

?>