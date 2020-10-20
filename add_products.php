<?php
    include "add_product.php";

    $categoryID = filter_input(type:INPUT_POST, variable_name:'categoryID');
    $productCode = filter_input(type:INPUT_POST, variable_name:'productCode');
    $productName = filter_input(type:INPUT_POST, variable_name:'productName');
    $listPrice = filter_input(type:INPUT_POST, variable_name:'listPrice');

    try {
        $query = 'INSERT_INTO products
                    (categoryID, productCode, productName, listPrice)
                  VALUES
                    (:categoryID, :productCode, :productName, :listPrice)';
        $statement= $db->prepare($query);
        $statement->bindValue(parameter:':categoryID', $categoryID);
        $statement->bindValue(parameter:':productCode', $productCode);
        $statement->bindValue(parameter:':productName', $productName);
        $statement->bindValue(parameter:':listPrice', $listPrice);

        $statement->execute();
        $statement->closeCursor();

        header(string: "Location: index.php?categoryID=categoryID");
    } catch (Exception $error) {
        $error_message = $error->getMessage();
        echo "Error INSERTING into SQL: $error_message";
    }


