<?php 
class MyDB extends SQLite3{
function __construct(){
$this->open('Routine.db');
}
}
$db = new MyDB();
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$class = $_POST['class'];

function add ($num1, $num2, $class, $db){
$sql = "INSERT INTO routine664 (Subject) VALUES (`$class`) WHERE (Period = `$num1` && Day = `$num2`)";
$db->exec($sql);
}
function remove ($num1, $num2, $db){
$sql = "INSERT INTO routine664 (Subject) VALUES ('0') WHERE (Period = `$num1` && Day = `$num2`)";
$db->exec($sql);
}
function show (){
$sql2 = "select * from routine664";
$result = $db->query($sql2);
while($row = $result->fetcharray(SQLITE_ASSOC)){
	echo $row['Day']."<br>";
	echo $row['Period']."<br>";
	echo $row['Subject']."<hr>";
}
if(isset($_POST['add'])){
add ($num1, $num2, $class, $db);
show ();	
}
if(isset($_POST['sub'])){ 
remove ($num1, $num2, $db);
show ();	
}
if(isset($_POST['mul'])){ 
show ();	
}
?>
<html>
<body>
<form action="664Service2.php" method="post">
Period: <input type="number" name="num1"><br>
Day: <input type="number" name="num2"><br>
Class Name: <input type="text" name="class"><br>
add<input type="submit" name ="add">
remove<input type="submit" name ="sub">
show<input type="submit" name ="mul">
</form>
</body>
</html>