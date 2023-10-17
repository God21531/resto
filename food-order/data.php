<?php 
$name=$_POST['name'];
$phno=$_POST['phno'];
$order=$_POST['order'];
$extra=$_POST['extra'];
$much=$_POST['much'];
$date=$_POST['date'];
$add=$_POST['add'];
$mage=$_POST['mage'];
$conn=new mysqli('localhost','root','','food-order');
if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into register(name,phno,order,extra,much,date,add,mage)values(?,?,?,?,?,?,?,?) ");
    $stmt->bind_param("si",$name,$phno,$order,$extra,$much,$date,$add,$mage);
    $stmt->execute();
    echo "Registration Successful"."<br>";
    $stmt->close();
}
$sql="SELECT name,phno,order,extra,much,date,add,mage FROM register";
$result=$conn->query($sql);
if($result->num_rows>0)
    while($row=$result->fetch_assoc()){
        echo "<br>"."Name:".$row["name"]."<br>"."phno:".$row["phno"]."<br>"."order:".$row["order"]."<br>"."extra:".$row["order"]."<br>"."extra:".$row["extra"]."<br>"."much:".$row["much"]."<br>"."date:".$row["date"]."<br>"."address:".$row["add"]."<br>"."message:".$row["mage"]."<br>";
    
    
    }
    else{
        echo "0 results";
    }
    $conn->close();

?>