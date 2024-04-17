<?php

require_once __DIR__ . '/vendor/autoload.php'; // Include Composer autoloader

use Rmunate\Utilities\SpellNumber;

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the input field is set and not empty
    if (isset($_POST['number']) && !empty($_POST['number'])) {
        $number = $_POST['number'];

        try {
            // Encapsulation: Creating an instance of SpellNumber class and using its methods
            $spellNumber = SpellNumber::integer($number); // Encapsulation: Creating an instance of SpellNumber class
            $words = $spellNumber->toLetters(); // Encapsulation: Invoking the public method toLetters()
        } catch (Exception $e) {
            // Handle exceptions
            $error = $e->getMessage();
        }
    } else {
        // Handle empty input
        $error = "Please enter a number.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number to Spanish Words Converter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Number to Spanish Words Converter</h1>
        <form method="post">
            <label for="number">Enter a number:</label><br>
            <input type="number" name="number" id="number" required><br>
            <input type="submit" value="Convert">
        </form>

        <?php if (isset($words)) : ?>
            <p class="result">Number in words: <?php echo $words; ?></p>
        <?php endif; ?>

        <?php if (isset($error)) : ?>
            <p class="result">Error: <?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>

