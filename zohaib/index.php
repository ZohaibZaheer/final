<?php
include("db.php");

class Person {
    protected $id;
    protected $name;
    protected $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function displayInfo() {
        echo "Person Information:<br> ";
        echo "ID: {$this->id}<br> ";
        echo "Name: {$this->name} <br> ";
        echo "Age: {$this->age}<br> ";
    }
}

class Student extends Person {
    private $courseEnrolledFor;

    public function __construct($id, $name, $age, $courseEnrolledFor) {
        parent::__construct($id, $name, $age);
        $this->courseEnrolledFor = $courseEnrolledFor;
    }

    public function displayInfo() {
        parent::displayInfo();
        echo "Role: Student<br> ";
        echo "Course Enrolled For: {$this->courseEnrolledFor}<br> ";
    }
}

class Professor extends Person {
    private $courseTeach;

    public function __construct($id, $name, $age, $courseTeach) {
        parent::__construct($id, $name, $age);
        $this->courseTeach = $courseTeach;
    }

    public function displayInfo() {
        parent::displayInfo();
        echo "Role: Professor<br> ";
        echo "Course They Teach: {$this->courseTeach}<br> ";
    }
}

$sql = "SELECT * FROM Person";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row == "student") {
            $person = new Student($row["id"], $row["name"], $row["age"], "Course not available");
        } elseif ($row == "professor") {
            $person = new Professor($row["id"], $row["name"], $row["age"], "Course not available");
        } else {
            $person = new Person($row["id"], $row["name"], $row["age"]);
        }

        $person->displayInfo();
        echo "<br>";
    }
} else {
    echo "No records found";
}

$connection->close();
?>