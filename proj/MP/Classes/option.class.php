<?php
class options{
    public function show(){
        try {
            $show = Connection::getInstance()->connect();
            $stmt = $show->query('SELECT * from Members');
while ($row = $stmt->fetch()) {
    echo '<input type="checkbox" checked name="member[]" value="'.$row['FName']." ".$row['SName']." ".$row['TName'].'">'." ".$row['FName']." ".$row['SName']." ".$row['TName']."<br>";
    }
            echo "</tbody></table></div>";
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
}

?>