<html>
    <head>
        <title>Home | Campus Chapter</title>
        <link type="text/css" rel="stylesheet" href="home.css">
    </head>

    <body>
       <div class="container">
           <div class="rcontainer">
               <div class="sidebar-hidden" style="position: fixed;">
                    <div class="side-cal"><center><p align="center" id="side-cal">NOW</p></center></div>
                    <div class="sidebar" style="position: fixed; background-color: #053853;">
                            <div class='side' style="height: 40px; background-color: black; opacity: 0.8;">
                                <center><span style="position: relative; top: 12px;" padding-top: 0px !important;><b>NOW</b></span></center>
                            </div>
                        <?php getcalendar($conn);?>
                    </div>
                </div>
                <div class="header">
                   <div class="home" style="background-color: white;">
                       <center>
                           <a href=".">
                               <div style="color: #333333; width: 100%; height: 100%;">Home</div>
                           </a>
                       </center>
                   </div>
                   <div class="profile">
                        <center>
                            <a href="..\profile/profile.php">
                                <div class="hover-header-profile" style="width: 100%; height: 100%;">Profile</div>
                            </a>
                        </center>
                   </div>
                   <div class="college">
                       <center>
                           <a href="..\college/gallary.php">
                               <div class="hover-header-college" style="width: 100%; height: 100%;">Gallary</div>
                           </a>
                       </center>
                   </div>
                </div>
                <div class="header" style="height: 40px !important; border-top: 1px solid white;">
                    <div class="ppicon">
                         <a href="..\profile/profile.php">
                             <?php
                                // $sql = "select * from profileimg where uid = '{$_SESSION['id']}'";
                                // $result = $conn->query($sql);
                                // $row = mysqli_fetch_assoc($result);
                                //     if($row['status'] == '0'){
                                //         $sql3 = "select u_gender from signup where uid = '{$_SESSION['id']}'";
                                //         $result3 = $conn->query($sql3);
                                //         $row3 = mysqli_fetch_assoc($result3);
                                //         if($row3['u_gender'] == 'Female'){
                                //             echo"<img src='..\Upload/pp/dpf.jpg' id='ppicon'>";
                                //             }
                                //         else{
                                //             echo"<img src='..\Upload/pp/dpm.jpg' id='ppicon'>";
                                //             }
                                //         }
                                //     else{
                                //         echo"<img src='..\Upload/pp/profile".$_SESSION['id'].".jpg' id='ppicon'>";
                                //         }
                             ?>
                         </a>
                    </div>
                    <div class="pfname">
                        <span style="color: white;">
                            <a href="..\profile/profile.php" style="color: white; text-decoration: none; font-size: 18px;">
                                <?php
                                    // $sql = "SELECT * FROM signup where uid='{$_SESSION['id']}'";
                                    // $result = $conn->query($sql);
                                    // $row = mysqli_fetch_assoc($result);
                                    // echo $row['first']. "&nbsp;" . $row['last'];
                                ?>
                            </a>
                        </span>
                    </div>
                <!--Branch Name-->
                    <div>
                        <span class="branch-name" style='left: 43%;'>
                            <?php
                                // $sql3 = "select u_trade from user_details where uid = '".$row['uid']."'";
                                // $result3 = $conn->query($sql3);
                                // $row3 = mysqli_fetch_assoc($result3);
                                //     echo "<span style='font-size: 80%;'>".$row3['u_trade']."</span>";
                            ?>
                        </span>
                    </div>
                <!--Search feild-->
                    <div class="search_feild">
                        <form method="post" action="search.php">
                            <input type="text" name="f_name" placeholder="Search for friends" id="search_feild" autocomplete="off">
                            <button name="f_search" class="search-btn">Search</button>
                        </form>
                    </div>
                    <div>
                        <form method="post" action="..\logout/logout.php">
                            <button class="logout" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
               <br>
                <div class="rchcontainer">
                    <div class="feed">
                        <?php
                            echo "
                                <div class='form-status-post'>
                                    <form method='post' action='".setPost($conn)."' style='margin-bottom: 0px;' position: absolute; action=''>
                                        <center>
                                            <div class='status'>
                                                <input type='hidden' name='pid'>
                                                <input type='hidden' name='uid'>
                                                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                                                    <div class='ppicon-post-textarea'>";
                                //                         $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                //                         $user = strtolower(substr($url, strpos($url, '?') + 1));
                                //                         echo"
                                //                             <a href=..\profile/profile.php?".$_SESSION['id'].">";
                                //                                 $sql2 = "select * from profileimg where uid = '{$row['uid']}'";
                                //                                 $result2 = $conn->query($sql2);
                                //                                 $row2 = mysqli_fetch_assoc($result2);
                                //                                     if($row2['status'] == '0'){
                                //                                         $sql3 = "select u_gender from signup where uid = '{$row['uid']}'";
                                //                                         $result3 = $conn->query($sql3);
                                //                                         $row3 = mysqli_fetch_assoc($result3);
                                //                                         if($row3['u_gender'] == 'Female'){
                                //                                             echo"<img src='..\Upload/pp/dpf.jpg' id='ppicon-post'>";
                                //                                             }
                                //                                         else{
                                //                                             echo"<img src='..\Upload/pp/dpm.jpg' id='ppicon-post'>";
                                //                                             }
                                //                                         }
                                //                                     else{
                                //                                         echo"<img src='..\Upload/pp/profile".$row['uid'].".jpg' id='ppicon-post'>";
                                //                                         }
                                //
                                //                             echo"
                                //                             </a>";
                                //
                                //                     echo"
                                //                     </div>
                                //                     <div class='post-textarea'>
                                //                         <textarea name='postmsg' placeholder='Write something here!' cols='116' rows='2' id='post'></textarea>
                                //                     </div>
                                //                     <div id='post-button'>
                                //                         <input type='submit' name='postSubmit' value='Post' style='float: right; margin-top: 5px;'>
                                //                     </div>
                                //             </div>
                                //         </center>
                                //     </form>
                                // </div>";
                        ?>
                        <div class="subrchcontainer">
                            <?php
                                //     <div>";
                                //         getpost($conn);
                                //  echo "
                                //     </div>";
                                // ob_end_flush();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
