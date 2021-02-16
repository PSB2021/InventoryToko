<?php
 
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
	
	/*
	* The create operation
	* When this method is called a new record is created in the database
	*/
	function createHero($nama, $merek, $jumlah, $tempat){
		$stmt = $this->con->prepare("INSERT INTO gudang (nama, merek, jumlah, tempat) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nama, $merek, $jumlah, $tempat);
		if($stmt->execute())
			return true; 
		return false; 
	}

	/*
	* The read operation
	* When this method is called it is returning all the existing record of the database
	*/
	function getHeroes(){
		$stmt = $this->con->prepare("SELECT id, nama, merek, jumlah, tempat FROM gudang");
		$stmt->execute();
		$stmt->bind_result($id, $nama, $merek, $jumlah, $tempat);
		
		$heroes = array(); 
		
		while($stmt->fetch()){
			$hero  = array();
			$hero['id'] = $id; 
			$hero['nama'] = $nama; 
			$hero['merek'] = $merek; 
			$hero['jumlah'] = $jumlah; 
			$hero['tempat'] = $tempat; 
			
			array_push($heroes, $hero); 
		}
		
		return $heroes;
	}
	 function get_userlogin($email,$pass){
 		$koneksi = $this->con;
 		$data = $koneksi->query("SELECT * FROM user_login WHERE email = '$email' AND pass = '$pass'");
        
        if($data->num_rows == 1){
		    return true;
        }
        return false;

	}
	function regis ($name,$email,$userpass){ 
		$stmt = $this->con->prepare("INSERT INTO user_login (name, email, pass) VALUES (?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $userpass);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	/*
	* The update operation
	* When this method is called the record with the given id is updated with the new given values
	*/
	function updateHero($id, $nama, $merek, $jumlah, $tempat){
		$stmt = $this->con->prepare("UPDATE gudang SET nama = ?, merek = ?, jumlah = ?, tempat = ? WHERE id = ?");
		$stmt->bind_param("ssssi", $nama, $merek, $jumlah, $tempat, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	/*
	* The delete operation
	* When this method is called record is deleted for the given id 
	*/
	function deleteHero($id){
		$stmt = $this->con->prepare("DELETE FROM gudang WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}