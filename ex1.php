<?php

session_start();
require 'config.php';


//add item cart atble#
if(isset($_POST['$pid']))
{
	$pid=$_POST['$pid'];
	$pid=$_POST['pcode'];
	$pname=$_POST['$pname'];
	$pqty=$_POST['$pqty'];
	$pprice=$_POST['$pprice'];
	
	$totalprice=$pprice*$pqty;
	
	$stmt=$conn->prepare('select pcode form cart where=?')
	$stmt->bind_param('s',$pcode);
	$stmt->execute();
	$result=$stmt->GET_result()
	$rows=$result->fetch_assoc();
	
	
	if(!$conn)
	{
		$quary=$conn->prepare('INSRT INTO cart (pid,pname,pcode,pprice)values(?,?,?,?,?)');
		$quaery->bind_param('sssss',$pid,$pcod,$pname,$pqty,$pprice);
		$quary->execute();
	}
	
	
	//get number of item avilable//
	if(isset($_GET['cartitem'])  && (isset($_GET['cartitem'])==cart_item))
	{
		$stmt=$conn->prepare('select *from cart');
		$stmt->execute();
		$stmt->store_result();
		$rows=$stmt->num_rows();
		
		echo $rows;
	}
	
	//remove itemto carttabel//
	if(isset($_GET[remove])){
		$id=$_GET[remove];
		
		$stmt=$conn->$stmt('delete from cart where id=?');
		$stmt=bind_param("i",$id);
		$stmt->execute();
		
		$session['showalert']='back';
		$session["message"]="item removed from card";
		header("location.php");
	}
	
	//update table//
	if(isset($_POST['qty']))
	{
		$qty=$_POST['$qty'];
		$pprice=$_POST['pprice'];
		$ppname=$_POST['$ppname'];
		
		$tprice=$qty*$pprice;
		
		$stmt=$conn->prepare("update cart set qty=?,tprice=? where pid=?")
		$stmt->bind_param('isi',$qty,$pprice,$tprice);
		$stmt->execute();
	}
	
		
	
		