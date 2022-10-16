<?php

function getAllFrom($field, $table, $where= NULL, $and = NULL, $orderfield, $ordering = 'DESC'){
    global $con;
    $getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");
    $getAll->execute();
    $all = $getAll->fetchAll();
    return $all;
}

// دالة تطبع عنوان لاصفحة الذي يحمله المتغير، واذا لم يحو المتغير عنوانا، تطبع عنوانا افتراضيا

function getTitle() {
    global $pageTitle;
    if(isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'ساعاتي';
    }
}

// redirect function 
// redirectHome v1.0

function redirectHome($errorMsg, $seconds = 3){
    echo "<div class='alert alert-danger'>$errorMsg</div>";
    echo "<div class='alert alert-info'>سيتم تحويلك إلى الصفحة الرئيسية بعد: $seconds ثوان.</div>";
    header("refresh:$seconds;url=index.php");
    exit();
}

// redirect function 
// redirectHome v2.0

function redirectPage($theMsg, $url = null, $seconds = 3){

    if($url === null){
        $url = 'index.php';
        $link = 'Homepage';
    }else{
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';
        }else{
            $url = 'index.php';
            $link = 'Homepage';
        }
    }

    echo $theMsg;
    echo "<div class='alert alert-info'>سيتم تحويلك إلي <strong>$link</strong> بعد: $seconds ثوان.</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

// Ensure that the item does not already exist
// checkItem v1.0

function checkItem($select, $from, $value){

    global $con;
    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statement->execute(array($value));
    $count = $statement->rowCount();
    return $count;

}

// function to count number of rows of tables

function countItems($item, $table){
    global $con;
    
    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
    $stmt2->execute();
    return $stmt2->fetchColumn();

}

/*
** Get Latest Records Function v1.0
** Function To Get Latest Items From Databse [ users, items, comments ]
** $select = field selected
** $table = the table target
** $limit = number of records
** $order = direction order
*/

function getLatest($select, $table, $order, $limit = 5){

    global $con;
    $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;

}

// The function of verifying the status of the user is activated or not

function checkUserStatus($username) {
            global $con;
            $stmtx = $con->prepare("SELECT 
                                        username, reg_status 
                                    FROM 
                                        users 
                                    WHERE 
                                        username = ? 
                                    AND 
                                        reg_status = 0");
            $stmtx->execute(array($username));
            $status = $stmtx->rowCount();

            return $status;
}

function getComments($where, $value) {
    global $con;
    $getComments = $con->prepare("SELECT * FROM comments WHERE $where = ?");
    $getComments->execute(array($value));
    $comments = $getComments->fetchAll();
    return $comments;
}

function getItems($where, $value, $approve = NULL){

    global $con;
    $sql = $approve == NULL ? 'AND comment_status = 1' : '';
    $getItems = $con->prepare("SELECT * FROM comments WHERE $where = ? $sql ORDER BY comment_date DESC");
    $getItems->execute(array($value));
    $items = $getItems->fetchAll();
    return $items;

}