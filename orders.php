<?php
require_once('includes/app.php');
define("ROW_PER_PAGE", 5);

//if not logged in redirect to login page
if (!$auth->is_logged_in()) { header('Location: login.php'); exit(); }

require_once('includes/database.php');
if(!isset($db)){$db = getDB();}

$search_keyword = '';
if(!empty($_POST['search']['keyword'])) {
    $search_keyword = $_POST['search']['keyword'];
}
$sql = 'SELECT * FROM plenty ';
$where = 'WHERE link LIKE :keyword ';
$order_by = 'ORDER BY id DESC ';
$per_page_html = '';
$page = 1;
$start=0;
if(!empty($_POST["page"])) {
    $page = $_POST["page"];
    $start=($page-1) * ROW_PER_PAGE;
}
$limit=" limit " . $start . "," . ROW_PER_PAGE;
$pagination_statement = $db->prepare($sql);
$pagination_statement->execute();

$row_count = $pagination_statement->rowCount();
$page_prefix_current = '<input type="submit" name="page" value="';
$page_suffix_current = '" class="btn-page current" />';
$page_prefix = '<input type="submit" name="page" value="';
$page_suffix = '" class="btn-page" />';
if(!empty($row_count)){
    $per_page_html .= "<div class='per-page'>";
    $page_count=ceil($row_count/ROW_PER_PAGE);
    if($page_count>1) {
        for($i=1;$i<=$page_count;$i++){
            if($i==$page){
                $per_page_html .= $page_prefix_current . $i . $page_suffix_current;
            } else {
                $per_page_html .= $page_prefix . $i . $page_suffix;
            }
        }
    }
    $per_page_html .= "</div>";
}

$query = $sql.$limit;
$pdo_statement = $db->prepare($query);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
if ($result) {
    require_once('classes/plenty.php');
    $plenty = new Plenty($db);
    $ids = [];
    foreach($result as $row) {
       $ids[] = $row["api_uid"];
    }

    if(count($ids)>0){
        $jids = json_encode($ids);
        $plenty->getTotalData($jids);
    }

    $query = $sql.$where.$order_by.$limit;
    $pdo_statement = $db->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();    
}
//define page title
$title = 'Orders';

//include header template
require_once('layout/header.php');
?>

<div class="row">
    <div class="col col-lg-1">
    </div>
    <div class="col col-lg-8">
        <h2>Orders</h2>
        <br>
        <?php
        if(isset($_GET['payment'])){
            echo "<br><h5 class='bg-success'>Success: Order successful.</h5>";
        }
         ?>
        <form name='frmSearch' action='' method='post'>
            <div class='search-start'>
                <div class="search-inline">
                    <input type='text' name='search[keyword]' value="<?=$search_keyword?>" class='keyword' maxlength='25' placeholder='link'> <input type="submit" class="search-btn" value=" " >
                </div>
            </div>
        <?php if ($result) { ?>    
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Link</th>
                <th>Qty</th>                
                <th>Qty Done</th>
                <th>Create Date</th>                
            </thead>
            <?php 
		        foreach($result as $row) {               
                $ts = $row['created'];
                $date = new DateTime("@$ts");
                $finalDate = $date->format('M d-Y H:i');
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['link']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['qty_done']; ?></td>
                    <td><?php echo $finalDate; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php echo $per_page_html; ?>
        </form>
        <?php } else { ?>
            <div> No Orders</div>
        <?php } ?>
    </div>
    <div class="col col-lg-1">
    </div>
</div>
<?php
require_once('layout/footer.php');
?>