<?php
class LoginAuth
{
    //pcreate a property for the loginaut class
    private $db;

    //initializing the property
    public function __construct($db)
    {
      $this->db = $db;  
    }

    public function loginLogic($email, $password, $role){
        //retrieving data from the  input field
        $email = $this->db->escapeString($email);
        $password = $this->db->escapeString($password);
        $role = $this->db->escapeString($role);

        //checking if the admin details actully exist in the database
        $admin_select_query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password' AND role='$role'";
        $admin_query = $this->db->query($admin_select_query);

       //checking if the parents details actully exist in the database
        $parent_select_query = "SELECT * FROM parents WHERE email = '$email' AND password = '$password'";
        $parent_query = $this->db->query($parent_select_query);

         //checking if the teachers details actully exist in the database
        $teacher_select_query = "SELECT * FROM teachers WHERE email = '$email' AND password = '$password'";
        $teacher_query = $this->db->query($teacher_select_query);

        //checking if the students details actully exist in the database
        $student_select_query = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
        $student_query = $this->db->query($student_select_query); 

        if($admin_query->num_rows === 1){
            $admin = $this->db->fetchArray($admin_query);
            if($admin){
                header("location:./admin/admin.php");           
             }else{
                return false;
            }
        }elseif($parent_query->num_rows === 1){
            $parents = $this->db->fetchArray($parent_query);
            if($parents){
                return $parents;
            }else{
                return false;
            }
        }elseif($teacher_query->num_rows === 1){
            $teacher = $this->db->fetchArray($teacher_query);
            if($teacher){
                
                header("location:./teacher_dashboard.php");  

            }else{
                return false;
            }
        }elseif($student_query->num_rows === 1){
            $student = $this->db->fetchArray($student_query);
            if($student){
                header("location:./student_dashboard.php");  
            }else{
                return false;
            }
        }else{
            //invalid credentials
            return false;
        }


    }
}
?>