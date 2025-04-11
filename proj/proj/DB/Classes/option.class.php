<?php
class options{
    public function show(){
        try {
            $show = Connection::getInstance()->connect();
            $stmt = $show->query('SELECT * from Members');
            echo '<div class="container"><table class="table"><thead><tr><th>ID</th><th>Должность</th><th>Фамилия</th><th>Инициалы</th></tr></thead><tbody>';
         echo '<form action="Modules/send.php" method="post"><tr>
            <td></td>
            <td><input class="form-control" type="text" name="FName" placeholder="Должность"></td>
            <td><input class="form-control" type="text" name="SName" placeholder="Введите фамилию"></td>
            <td><input class="form-control" type="text" name="TName" placeholder="Введите инициалы"></td>
            <td></td>
            <td><input type="submit" class="btn btn-success" value="Добавить"></td>
            </tr></form>';
while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>'.$row['ID'].'</td>';
    echo '<td>'.$row['FName'].'</td>';
    echo '<td>'.$row['SName'].'</td>';
    echo '<td>'.$row['TName'].'</td>';
    echo "<form action='Modules/delete.php' method='post'>
    <input type=hidden name=ID  value = '".$row['ID']."'>
    <input type=hidden name=del value=yes>
    <td><input type=submit class='btn btn-danger' value=Удалить></td>
    </form>";
    echo '</tr>';
    }
    $row = $stmt->fetch();
    $maxID=$row['ID'];
                echo '<form action="Modules/update.php" method="post">
                <tr>
                <td><input type="number" max="$maxID" class="form-control" size="5" name="ID" placeholder="Введите ID"></td>
                <td><input class="form-control"  type="text" name="FName" placeholder="Должность"></td>
                <td><input class="form-control"  type="text" name="SName" placeholder="Ввеите фамилию"></td>
                <td><input class="form-control" type="text" name="TName" placeholder="Введите инициалы"></td>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="Исправить"></td>
                </tr>
                </form>';

            echo "</tbody></table></div>";
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
    public function delete(){
        try {
            $delete = Connection::connect();
            $ID = $_POST["ID"];
            if (isset($_POST['del']) && isset($_POST['ID']))
            {
                $stmt = $delete->prepare("DELETE FROM Members WHERE ID =:ID");
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
    public function send(){
        try {
            $send = Connection::getInstance()->connect();
                $FName = filter_var($_POST['FName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
                $SName = filter_var($_POST['SName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS); 
                $TName = filter_var($_POST['TName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
            if (isset($_POST['FName']) &&
                isset($_POST['SName']) &&
                isset($_POST['TName']))
            {
                $stmt = $send->prepare("INSERT INTO Members (FName,SName,TName)
                VALUES (:FName,:SName,:TName)");
                $stmt->bindParam(':FName', $FName);
                $stmt->bindParam(':SName', $SName);
                $stmt->bindParam(':TName', $TName);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }

    public function update()
    {
        try {
            $upd = Connection::connect();
                $FName = filter_var($_POST['FName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
                $SName = filter_var($_POST['SName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS); 
                $TName = filter_var($_POST['TName'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
                $ID = $_POST['ID'];
            if (isset($_POST['ID'])) {
                $stmt = $upd->prepare("UPDATE Members SET FName = :FName, SName = :SName, TName = :TName WHERE ID = :ID");
                $stmt->bindParam(':FName', $FName);
                $stmt->bindParam(':SName', $SName);
                $stmt->bindParam(':TName', $TName);
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
}

?>