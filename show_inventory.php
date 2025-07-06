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

    /*
        My reflections:
        I choose these items because they are the last 5 items I ordered from Amazon.com
        I think this would work flawlessly with real world inventory systems.
        PDO prevents SQL injection by using prepared statements which is using placeholders instead of real values. It separates the code and the data.
    */
?>
  

  