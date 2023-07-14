

<!-- navigation bar -->
<div class="nav" style="font-family: poppins;">
    <div class="h-[615px] w-[230px] fixed rounded-md bg-white shadow-md p-6">
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
                        href="result.php">Results</a>
                </li>
              
            </div>

            <form action="" method="post" onsubmit="return confirmLogout()">
                <div class=" mt-[410px]">
                    <input class="h-10 rounded-md  bg-[#736FE1]  text-white flex justify-center w-40 flex text-md"
                        type="submit" value="LOGOUT" name="logout">
                </div>
                 
            </form>

        </div>
    </div>
</div>