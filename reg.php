 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "services";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $cus = $_POST["customer"];
        $fn = $_POST["firstname"];
        $ln = $_POST["lastname"];
        $email = $_POST["email"];
        $pn = $_POST["phone"];
        $ad = $_POST["address"];
        $t = $_POST["town"];
        $c = $_POST["comments"];

        $query = "INSERT INTO customers (customer_id, first_name,last_name, email, phone_number, address1, town, comments) VALUES (:cus,:fn,:ln,:email,:pn,:ad,:t,:c)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':cus', $cus);
        $statement->bindParam(':fn', $fn);
        $statement->bindParam(':ln', $ln);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':pn', $pn);
        $statement->bindParam(':ad', $ad);
        $statement->bindParam(':t', $t);
        $statement->bindParam(':c', $c);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>