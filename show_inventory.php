<?php

    /*
        Harold Hong
        https://github.com/monkeyoohlala/cs85-module4b-inventory
    */

    try {
        $db = new PDO("mysql:host=localhost", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $create = "CREATE DATABASE inventory_db";

        $db->exec($create);
        
        $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE IF NOT EXISTS items (
            id INT AUTO_INCREMENT PRIMARY KEY,
            item_name VARCHAR(100) NOT NULL,
            category VARCHAR(50),
            quantity INT,
            purchase_date DATE
        )";

        $db->exec($sql);

        $query = "INSERT INTO items (item_name, category, quantity, purchase_date) VALUES 
        (?, ?, ?, ?);";

        $smtm = $db->prepare($query);

        $insertItems = [['Amazon Gift Card', 'Gift Cards', 3, '2024-06-01'],
        ['Swiffer Sweeper Wet Pads', 'Home', 2, '2024-06-01'],
        ['Under Armour Slippers', 'Shoes', 1, '2024-06-01'],
        ['Gold Peak Sweet Tea', 'Beverages', 2, '2024-06-01'],
        ['Neutrogena Makeup Remover', 'Beauty', 5, '2024-05-15']];

        foreach ($insertItems as $item) {
            $smtm->execute($item);
        }
        
          

        $stmt = $db->query("SELECT * FROM items");
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>List of Items</p><br>";
        echo "<ul>";

        foreach ($items as $item) {
            echo "<li>{$item['item_name']} ({$item['quantity']} units)</li>";
        }

        echo "</ul>";

        $pdo=null;
        $stmt=null;
        exit();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    /*
        My reflections:
        I choose these items because they are the last 5 items I ordered from Amazon.com
        I think this would work flawlessly with real world inventory systems.
        PDO prevents SQL injection by using prepared statements which is using placeholders instead of real values. It separates the code and the data.
    */

  

  ;