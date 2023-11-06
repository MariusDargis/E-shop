<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/login/login_view.inc.php';
    require_once 'includes/admin/create_item_view.inc.php';
    require_once 'includes/admin/update_item_view.inc.php';
    require_once 'includes/admin/delete_item_view.inc.php';
    require_once 'includes/all_items/all_items_view.inc.php';
    require_once 'includes/all_users/all_users_view.inc.php';
    require_once 'includes/all_admin_users/all_admin_users_view.inc.php';
    require_once 'includes/admin/ad_users_menu/ad_create_user_view.inc.php';
    require_once 'includes/admin/ad_users_menu/ad_delete_user_view.inc.php';
    require_once 'includes/admin/ad_admin_users_menu/ad_create_admin_user_view.inc.php';
    require_once 'includes/admin/ad_admin_users_menu/ad_delete_admin_user_view.inc.php';
    require_once 'includes/admin/ad_admin_users_menu/ad_update_admin_user_view.inc.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/admin_style/ad_main.css"> 
    <link rel="stylesheet" href="style/admin_style/ad_header.css"> 
    <link rel="stylesheet" href="style/admin_style/ad_side_menu.css"> 
    <link rel="stylesheet" href="style/all_items.css"> 
    <link rel="stylesheet" href="style/admin_style/ad_users_admin.css">
    <link rel="stylesheet" href="style/admin_style/ad_show_all_ad_users.css">
    <link rel="stylesheet" href="style/admin_style/ad_all_users_side_menu.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".users_admin").click(function(){
                $(".users_admin_box").slideDown(2000).css("display", "flex");
                $(".users_admin_turn_of").css("background", "red");

            });
            $(".users_admin_turn_of").click(function(){
                $(".users_admin_box").slideUp(2000);
                $(".users_admin_turn_of").css("background", "grey");
            }); 
        });
     </script>
     
       
     
</head>

<body>

    <header class="header">
        <div class="logo" id="logoID">
            <h3>E-SHOP</h3>
        </div>

        <div class="signed">
            <h2>ADMINISTRATOR---</h2>
            <?php
                outputUsername();
            ?>
        </div>

        <div class="users_admin_turn_of">
        </div>

        <div class="users_admin">
            <h5>USERS-ADMINS</h5>

            <div class="users_admin_box" id="users_admin_box">
                <div class="users_admin_box_menu">
                    <form class="test1" action="includes/admin/ad_users_menu/ad_create_user.inc.php" method="post">
                        <h6>CREATE USER</h6>
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit">CREATE</button>
                        <?php
                        checkCreateUserErrors();
                        ?>
                    </form>

                    <form action="includes/admin/ad_users_menu/ad_delete_user.inc.php" method="post">
                        <h6>DELETE USER</h6>
                        <input type="text" name="username" placeholder="Username">
                        <button type="submit">DELETE</button>
                        <?php
                        checkDeleteUser();
                        ?>
                    </form>

                    <form action="includes/admin/ad_admin_users_menu/ad_create_admin_user.inc.php" method="post">
                        <h6>CREATE ADMIN USER</h6>
                        <input type="text" name="username" placeholder="Username">
                        <button type="submit">CREATE</button>
                        <?php
                        checkCreateAdUserErrors();
                        ?>
                    </form>

                    <form action="includes/admin/ad_admin_users_menu/ad_delete_admin_user.inc.php" method="post">
                        <h6>DELETE ADMIN USER</h6>
                        <input type="text" name="username" placeholder="Username">
                        <button type="submit">DELETE</button>
                        <?php
                        checkDeleteAdUser();
                        ?>
                    </form>

                    <form action="includes/admin/ad_admin_users_menu/ad_update_admin_user.inc.php" method="post">
                        <h6>UPDATE PRIVILEGES</h6>
                        <select name="username" id="username">
                            <?php
                            showOptionAdUsers($allAdUsers);
                            ?>
                        </select>

                        <div>
                            <input type='hidden' value='0' name='create_user'>
                            <input type="checkbox" id="create_user" name="create_user" value="1">
                            <label for="create_user">CREATE USER</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='delete_user'>
                            <input type="checkbox" id="delete_user" name="delete_user" value="1">
                            <label for="delete_user">DELETE USER</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='create_admin_user'>
                            <input type="checkbox" id="create_admin_user" name="create_admin_user" value="1">
                            <label for="create_admin_user">CREATE ADMIN USER</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='delete_admin_user'>
                            <input type="checkbox" id="delete_admin_user" name="delete_admin_user" value="1">
                            <label for="delete_admin_user">DELETE ADMMIN USER</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='update_privileges'>
                            <input type="checkbox" id="update_privileges" name="update_privileges" value="1">
                            <label for="update_privileges">UPDATE PRIVILEGES</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='create_item'>
                            <input type="checkbox" id="create_item" name="create_item" value="1">
                            <label for="create_item">CREATE ITEM</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='update_item'>
                            <input type="checkbox" id="update_item" name="update_item" value="1">
                            <label for="update_item">UPDATE ITEM</label>
                        </div>

                        <div>
                            <input type='hidden' value='0' name='delete_item'>
                            <input type="checkbox" id="delete_item" name="delete_item" value="1">
                            <label for="delete_item">DELETE ITEM</label>
                        </div>

                        <button type="submit">UPDATE</button>
                    </form>


                </div>

                <div class="users_admin_box_adusers">
                    <h6>ADMIN-USERS</h6>
                    <?php
                    showAllAdUsers($adUsersResults);
                    ?>
                </div>
                
                <div class="users_admin_box_allusers">
                    <h6>ALL-USERS</h6>
                    <?php
                    showAllUsers($usersResults);
                    ?>
                </div>
            </div>
        </div>

        <div class="logout">
            <form action="includes/logout.inc.php"  method="post">
                <button type="submit">LOGOUT</button>
            </form>
        </div>
    </header>
    
    <section class="side-menu">
        <form action="includes/admin/create_item.inc.php" method="post">
            <h2>CREATE ITEM</h2>
            <input type="number" name="item_number" 
            placeholder="Item number">
            <input type="text" name="item_name" 
            placeholder="Name">
            <input type="text" name="item_info" 
            placeholder="Info">
            <input type="number" name="quantity" 
            placeholder="Item quantity">
            <button type="submit">CREATE</button>
            <?php
            checkCreateItemErrors();
            ?>
        </form>

        <form action="includes/admin/update_item.inc.php" method="post">
            <h2>UPDATE ITEM</h2>
            <p>(Item number cannot be changed)</p>
            <input type="number" name="item_number"
            placeholder="Item number">
            <input type="text" name="item_name"
            placeholder="Name">
            <input type="text" name="item_info"
            placeholder="Info">
            <input type="number" name="quantity" 
            placeholder="Item quantity">
            <button type="submit">UPDATE</button>
            <?php
            checkUpdateItemErrors();
            ?>
        </form>

        <form action="includes/admin/delete_item.inc.php" method="post">
            <h2>DELETE</h2>
            <input type="number" name="item_number"
            placeholder="Item number">
            <button type="submit">DELETE ITEM</button>
            <?php
            checkDeleteItemErrors();
            ?>
        </form>
    </section>

    <section class="section_all_items">
        <?php     
            showItems($results);
        ?>
    </section>

</body>
</html>