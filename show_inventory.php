<?php

    /*
        Harold Hong
        https://github.com/monkeyoohlala/cs85-module4b-inventory
    */

    try {
        $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM items");
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>List of Items</p><br>";
        echo "<ul>";

        foreach ($items as $item) {
            echo "<li>{$item['item_name']} ({$item['quantity']} units)</li>";
        }

        echo "</ul>";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
  

  