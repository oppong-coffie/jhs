

<!-- navigation bar -->
<div class="nav" style="font-family: poppins;">
    <div class="h-[665px] w-[230px] fixed rounded-md bg-white shadow-md p-6">
        <!-- school name -->
        <div class="pb-2">
            <p class="text-center text-sm  text-gray-700">School Name</p>
        </div>
        <hr>

        <!-- nav links -->
        <!-- nav links -->
        <div class="justify-between">
            <div class="mt-8">
                <li class="list-none active">
                    <i class="fa-regular fa-house text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="dashboard.php">Dashboard</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-solid fa-user-lock text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="admin_reg.php">Admins</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="teacher_reg.php">Teachers</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="subjects.php">Subjects</a>
                </li>
                
                <li class="list-none mt-4">
                    <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="teacher_class_assigment.php">Teacher Classes</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-users text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="students_reg.php">Students</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-users text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="student_subject_registeration.php">Student Subjects</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-users text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="class_reg.php">Classes</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-user text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="parents_reg.php">Parents</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-square-poll-vertical text-gray-500 text-sm"></i><a
                        class="ml-2 text-gray-500 text-sm" href="">Results</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-comment text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="">Chat</a>
                </li>
                <li class="list-none mt-4">
                    <i class="fa-regular fa-gear text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm"
                        href="">Settings</a>
                </li>
            </div>

            <form action="" method="post" onsubmit="return confirmLogout()">
                <div class="">
                    <input class="h-10 rounded-md  bg-[#736FE1]  text-white flex justify-center w-40 flex text-md"
                        type="submit" value="LOGOUT" name="logout">
                </div>
                 
            </form>

        </div>
    </div>
</div>