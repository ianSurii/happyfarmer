 <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fas fa-bars"></span>
                       
                    </button>
        <div id="sidemenu" class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li id="close" class="nav-divider">
                                Menu
                            </li>
                            <script>
                                
                            </script>
                            
                            
                            <?php
                            if(isset($_SESSION['usertype'])){
                                $usertype=$_SESSION['usertype'];

                            if($usertype==1){
                                echo"
                                <li class='nav-item'>
                                <a class='nav-link fas fa-square-full' href='worker.php'>Dashboard</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fas fa-list' href='tasks.php'>Tasks</a>
                                </li>
                                  <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-calendar-alt' href='reports.php'>Reports</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-tree' href='produce.php'>Produce</a>
                                </li>
                                 
                                
                                ";

                            }elseif($usertype==11){
                                echo" <li class='nav-item'>
                                <a class='nav-link fas fa-square-full' href='farmer.php'>Dashboard</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fas fa-tree' href='farms.php'>Farms</a>
                                </li>
                                 <li class='nav-item'>
                                <a class='nav-link fas fa-arrows-alt' href='employees.php'>Employees</a>
                                </li>
                                
                                <li class='nav-item'>
                                <a class='nav-link fa fa-barcode' href='inventory.php'>Inventory</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-tree' href='produce'>Produce</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-calendar-alt' href='farmer_reports.php'>Reports</a>
                                </li>
                                ";

                            }elseif($usertype==111){
                                echo" <li class='nav-item'>
                                <a class='nav-link fas fa-square-full' href='dashboard.php'>Dashboard</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fas fa-tree' href='crops.php'>Crops</a>
                                </li>
                                 <li class='nav-item'>
                                <a class='nav-link fas fa-location-arrow' href='regions.php'>Regions</a>
                                </li>
                                <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-calendar-alt' href='view_calendars.php'>Celendars</a>
                                </li>
                                 <li class='nav-item'>
                                <a class='nav-link fa fa-fw fa-gift' href='farms.php'>Recomendations</a>
                                </li>";

                            }else{
                                // header('Location:index.php');
                            }
                        }else{
                            header('Location:index.php');

                        }
                           ?>
                             <li class="nav-divider">
                               User Info
                            </li>
                            
                            <!-- <li class="nav-item ">
                            <a class="nav-link" href="create_calendars.php">Create</a>
                               
                            </li> -->
                            
                            <li class="nav-item ">
                            <a class="nav-link fa fa-fw fa-cog" href="profile.php">Profile</a>
                              
                            </li>

                            <li class="nav-item ">
                            <a class="nav-link fas fa-fw fa-bell   " href="messages.php">Messages</a>
                              
                            </li>
                            
                          
                            
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Apps <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/inbox.html">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/email-details.html">Email Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/email-compose.html">Email Compose</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/message-chat.html">Message Chat</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
