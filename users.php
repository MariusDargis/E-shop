<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/login/login_view.inc.php';
    require_once 'includes/all_items/all_items_view.inc.php';
    require_once 'includes/privileges/privileges_view.inc.php';
    require_once 'includes/admin/create_item_view.inc.php';
    require_once 'includes/admin/update_item_view.inc.php';
    require_once 'includes/admin/delete_item_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/users_style/us_header.css">
    <link rel="stylesheet" href="style/users_style/us_main.css">
    <link rel="stylesheet" href="style/all_items.css">
    <link rel="stylesheet" href="style/users_style/us_side_menu.css">
</head>

<body>

    <header class="header">
        <div class="logo">
            <h3>E-SHOP</h4>
        </div>

        <div class="signed">
            <?php
                outputUsername();
            ?>
        </div>

        <div class="logout">
            <form action="includes/logout.inc.php"  method="post">
                <button type="submit">LOGOUT</button>
            </form>
        </div>
    </header>

    <section class="side-menu">
        <?php
            privilegeCreateItem($result);
            privilegeUpdateItem($result);
            privilegeDeleteItem($result);
        ?>
    </section>
    
    <section class="section_all_items">
        <?php     
            showItems($results);
        ?>
    </section>
    
</body>

</html>