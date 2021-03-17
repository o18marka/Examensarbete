<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Skapa produkt</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="images/favicon.svg" type="image/ico" />
        
</head>

<body>
    <form action="insert.php" method="post">
        <table>
            <tr>
                <td>Titel:</td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td>Bild:</td>
                <td><input type="file" name="image" required></td>
            </tr>
            <tr>
                <td>Beskrivning:</td>
                <td><input type="text" name="description" required></td>
            </tr>
        </table>
        <input type="submit" value="Submit">
    </form>
</body>
</html>