<?php

    $skuArray = $_POST["skuArray"];
    // echo json_encode(array_map('intval', explode(",",$skuArray)));
    echo json_encode(explode(",",$skuArray));
    