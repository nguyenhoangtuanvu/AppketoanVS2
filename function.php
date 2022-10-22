<?php 
    function checkPrivilege($uri = false) {
        $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
        // var_dump($uri);exit;
        if(empty($_SESSION['logged']['Privileges'])) {
            return false;
        }
        $privileges = $_SESSION['logged']['Privileges'];
        $privileges = implode("|", $privileges);
        // var_dump($privileges);exit;
        
        $pattern = '/cash\.php\?cashNav=cashThird$|purchase\.php\?purchaseNav=purchaseThird$|purchase\.php\?purchaseNav=purchaseFourth|sales\.php\?salesNav=salesThird|sales\.php\?salesNav=salesFourth|inventory\.php\?inventoryNav=inventoryThird|inventory\.php\?inventoryNav=inventoryFourth|';
        // $patterntow = "/addData\.php\?purchaseNav=purchaseThird&data=delete&id=\d+$|addData\.php\?purchaseNav=purchaseThird&data=edit&id=\d+$/";
        // preg_match($patterntow, 'http://localhost/AppketoanVS2/content/purchase/addData.php?purchaseNav=purchaseThird&data=delete&id=5', $matches);

        preg_match($pattern .$privileges . "/", $uri, $matches);
        return !empty($matches);
    }
    $checkPrivilege = checkPrivilege();
    // var_dump($checkPrivilege);exit;
?>