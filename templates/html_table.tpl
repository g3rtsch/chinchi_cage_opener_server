<?php
//table
?>
<div class="table" id="wrapper" align="50px">
<table border="1">
        <tr><th height="50px" colspan="2">
                <?php
                  if (isset($ret['data']['h1'])){
                    echo htmlspecialchars($ret['data']['h1']);
                  }elseif(isset ($_GET['section'])){
                    echo htmlspecialchars($_GET['section']);
                  }else{
                   echo "Welcome to Chinchi Land";
                  }
                ?>
        </th></tr>
