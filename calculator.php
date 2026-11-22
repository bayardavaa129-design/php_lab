
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Тооны машин</title>
</head>
<body>
    <h2>PHP Тооны машин</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          method="post">

        <input type="number" name="num01"
               step="any" placeholder="Тоо 1">

        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
            <option value="modulo">%</option>
            <option value="power">**</option>
        </select>

        <input type="number" name="num02"
               step="any" placeholder="Тоо 2">

        <button type="submit">Бодох</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // 1. Формоос өгөгдөл авах
        $num01 = filter_input(
            INPUT_POST, "num01",
            FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_FRACTION
        );

        $num02 = filter_input(
            INPUT_POST, "num02",
            FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_FRACTION
        );

        $operator = htmlspecialchars(
            $_POST["operator"] ?? ""
        );

        // 2. Алдаа шалгах
        $errors = false;

        if ($num01 === "" || $num02 === "" ||
            $num01 === null || $num02 === null ||
            $operator === "") {

            echo "<p>Бүх талбарыг бөглөнө үү!</p>";
            $errors = true;

        } elseif (!is_numeric($num01) ||
                  !is_numeric($num02)) {

            echo "<p>Зөвхөн тоо оруулна уу!</p>";
            $errors = true;

        } elseif (
            ($operator === "divide" ||
             $operator === "modulo") &&
            (float)$num02 == 0
        ) {

            echo "<p>0-д хуваах боломжгүй!</p>";
            $errors = true;
        }

        // 3. Тооцоолол хийх
        if (!$errors) {

            $num01 = (float)$num01;
            $num02 = (float)$num02;

            $value = match ($operator) {
                "add" => $num01 + $num02,
                "subtract" => $num01 - $num02,
                "multiply" => $num01 * $num02,
                "divide" => $num01 / $num02,
                "modulo" => (int)$num01 % (int)$num02,
                "power" => $num01 ** $num02,
                default => null
            };

            if ($value === null) {
                echo "<p>Үйлдэл буруу байна!</p>";
            } else {
                echo "<p>Хариу = " .
                    number_format($value, 2, ".", "") .
                    "</p>";
            }
        }
    }
    ?>
</body>
</html>
