<?php
        //calclating student result
    //calclating student result
    //checking if three exercises ar uploaded
   // Step 1: Count the number of exercise results for the student
   $exercise_select = mysqli_query($connection, "SELECT COUNT(*) AS exercise_count FROM results WHERE student_id = $student_id AND result_type = 'Exercise'");
   $exercise_row = mysqli_fetch_assoc($exercise_select);
   $exercise_count = $exercise_row["exercise_count"];

   if($exercise_count == 3){
       $midsem_select = mysqli_query($connection, "SELECT COUNT(*) AS midterm_count FROM results WHERE student_id = $student_id AND result_type = 'Mid Term'");
       $midterm_row = mysqli_fetch_assoc($midsem_select);
       $midterm_count = $midterm_row["midterm_count"];

       if($midterm_count == 1){
           $exams_select = mysqli_query($connection, "SELECT COUNT(*) AS exams_count FROM results WHERE student_id = $student_id AND result_type = 'Examinatoin'");
           $exams_row = mysqli_fetch_assoc($exams_select);
           $exams_count = $exams_row["exams_count"];
           
           if($exams_count == 1){
               $exercise_select = mysqli_query($connection, "SELECT SUM(marks) AS exercise_marks FROM results WHERE student_id = $student_id AND result_type = 'Exercise'");
               $exercise_row = mysqli_fetch_assoc($exercise_select);
               $exercise_count = $exercise_row["exercise_marks"];
               echo  $exercise_count;

               $midsem_select = mysqli_query($connection, "SELECT SUM(marks) AS midterm_marks FROM results WHERE student_id = $student_id AND result_type = 'Mid Term'");
               $midterm_row = mysqli_fetch_assoc($midsem_select);
               $midterm_count = $midterm_row["midterm_marks"];
               echo  $midterm_count;

               $exams_select = mysqli_query($connection, "SELECT SUM(marks) AS exams_marks FROM results WHERE student_id = $student_id AND result_type = 'Examinatoin'");
               $exams_row = mysqli_fetch_assoc($exams_select);
               $exams_count = $exams_row["exams_marks"];
               echo  $exams_count;

               $class_marks = $exercise_count + $midterm_count;
               $class_percent = 0.30 * $class_marks ;
               echo $class_percent ;

               $exam_percent = 0.70 * $exams_count ;
               echo $exam_percent;

               $total_marks = $class_percent + $exam_percent;
               echo $total_marks;

               //selectin the active semester
               //selectin the active semester
               $active_semester = mysqli_query($connection, "SELECT name FROM semester WHERE status= 'Active'");
               $active_row = mysqli_fetch_array($active_semester);
               $semester_name = $active_row["name"];

                //selectin the active year


               //selectin the active year
               //selectin the active year
               $active_year = mysqli_query($connection, "SELECT year FROM accademicyear WHERE status= 'Active'");
               $active_year_row = mysqli_fetch_array($active_year);
               $year_name = $active_year_row["year"];

               

                // Query to retrieve the class name for the given student ID
               $select_query = "
               SELECT c.class_name
               FROM classese c
               JOIN studentclass sc ON c.id = sc.class_id
               WHERE sc.student_id = $student_id;
               ";

               // Execute the query
               $class_result = mysqli_query($connection,  $select_query );
               $class_row =mysqli_fetch_array($class_result);
               $class  = $class_row["class_name"];

               
               // Retrieve teacher ID based on email session
               $email = $_SESSION['email'];
               $query = "SELECT id FROM teachers WHERE email = '$email'";
               $result = mysqli_query($connection, $query);
               $row = mysqli_fetch_assoc($result);
               $teacherId = $row['id'];

               // Query to retrieve courses for the teacher
               $query = "SELECT * FROM teacherclass WHERE teacher_id = '$teacherId'";
               $courseDetails = mysqli_query($connection, $query);
               $row = mysqli_fetch_array($courseDetails);
               $subject = $row["subject"];

               // Fetch course name based on subject_id
               $subjectId = $row["subject"];
               $query = "SELECT course FROM courses WHERE id = '$subjectId'";
               $result = mysqli_query($connection, $query);
               $courseName = mysqli_fetch_array($result)['course'];


               $date = date("Y-m-d");
               // Now let's move the uploaded image into the folder: image
               // Inserting data into the database
               $insert_query = mysqli_query($connection, "INSERT INTO `final_result` (`year`,`semester`, `student_id`, `subject`,class, `class_mark`,`exams_marks`,`total_marks`,`date`) VALUES (' $year_name','$semester_name', '$student_id', '$courseName', '$class', '$class_percent','$exam_percent','$total_marks','$date')");
   


              
           }
       }
   }
?>