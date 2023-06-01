<?php
function processForm() {
    $num = isset($_POST['input']) ? $_POST['input'] : '';
    $result = '';

    if (isset($_POST['num'])) {
        $num .= $_POST['num'];
    };
    
    if (isset($_POST['op'])) {
        $value1 = $_POST['input'];
        setcookie('num', $value1, time() + (86400 * 30), "/");

        $value2 = $_POST['op'];
        setcookie('op', $value2, time() + (86400 * 30), "/");
        $num = "";
    };

    if (isset($_POST['equal'])) {
        $num = $_POST['input'];
        switch ($_COOKIE['op']) {
            case "+":
                $result = $_COOKIE['num'] + $num;
                break;
            case "-":
                $result = $_COOKIE['num'] - $num;
                break;
            case "*":
                $result = $_COOKIE['num'] * $num;
                break;
            case "/":
                $result = $_COOKIE['num'] / $num;
                break;
        }
        $num = $result;
    };
    return $num;
}
$num = processForm();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculator</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="input" id="input" value="<?php echo $num; ?>"><br>
        <input type="submit" class="b" name="num" value="7">
        <input type="submit" class="b" name="num" value="8">
        <input type="submit" class="b" name="num" value="9">
        <input type="submit" class="b op" name="op" value="/"><br>
        <input type="submit" class="b" name="num" value="4">
        <input type="submit" class="b" name="num" value="5">
        <input type="submit" class="b" name="num" value="6">
        <input type="submit" class="b op" name="op" value="*"><br>
        <input type="submit" class="b" name="num" value="1">
        <input type="submit" class="b" name="num" value="2">
        <input type="submit" class="b" name="num" value="3">
        <input type="submit" class="b op" name="op" value="-"><br>
        <input type="submit" class="b" name="num" value="0">
        <input type="submit" id="equal" name="equal" value="=">
        <input type="submit" id="plus" class="b op" name="op" value="+">
    </form>
</body>
</html>

