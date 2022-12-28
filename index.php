<?php if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
{
    $csv = file_get_contents($_FILES["file"]["tmp_name"]);
    $rows = explode(PHP_EOL, $csv);
    $data = [];
    $delimiter = $_POST["delimiter"];

    foreach ($rows as $row)
    {
        $data[] = explode($delimiter, $row);
    }
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSV-Reader</title>
</head>
<body>
<style>
    .wrapper {margin: auto; width: 960px;}
    form {width: 100%; border: 1px solid gray}
</style>
<div class="wrapper">
<form enctype="multipart/form-data" action="index.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type="file" name="file" accept=".csv">
    <input type="text" maxlength="1" name="delimiter" value=";">
    <input type="submit">
</div>
</form>
</body>
</html>