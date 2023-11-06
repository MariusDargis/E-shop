<?php

declare(strict_types=1);


function UpdateAdUser(object $pdo, int $resultId, bool $create_user, bool $delete_user, 
bool $create_item, bool $update_item, bool $delete_item, bool $add_pr_user, 
bool $remove_pr_user , bool $update_privileges) 
{
    setUpdateAdUser($pdo, $resultId, $create_user, $delete_user, $create_item, 
    $update_item, $delete_item, $add_pr_user, 
    $remove_pr_user , $update_privileges);
}
 