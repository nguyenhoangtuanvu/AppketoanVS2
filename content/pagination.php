<?php 
if($current_page > 1) {
    $prePage = $current_page - 1;
?>
    <a class="second-footer__prev" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $prevPage ?>">Trước</a>
<?php
}
if($current_page > 3) {
    $firstPage = 1;
?>
    <a class="second-footer__count-paging" href="&?per_page=<?= $item_per_page ?>&currant_page=<?= $firstPage ?>">1</a>
<?php 
}
for($num = 1; $num <= $totalRecords; $num++) {
    if($num != $current_page) {
        if($num > $current_page - 2 && $num < $current_page + 2) {
?>
            <a class="second-footer__count-paging" href="?purchaseNav=<?= $tam ?>&?per_page=<?= $item_per_page ?>&currant_page=<?= $num ?>"><?= $num ?></a>
<?php
        }
    }else {
?>
            <a class="second-footer__count-paging current-page" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $num ?>"><?= $num ?></a>
<?php
        }
}
if($current_page < $totalPage - 3) {
    $endPage = $totalPage;
?>  
    <a class="second-footer__count-paging" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $endPage ?>">Cuối</a>
<?php 
}
if($current_page < $current_page - 1) {
    $nextPage = $current_page + 1;
?>
    <a class="second-footer__next" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $nextPage ?>">Sau</a>
<?php
}
?>