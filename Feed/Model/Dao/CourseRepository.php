<?php
	
require_once('Model/Dao/Repository.php');

 class CourseRepository extends Repository 
 {
	private $db;
	private $courseTable;
	private $rssTable;
 	private static $programID = "ProgramId";
 	private static $courseID = "CourseId";
 	private static $courseName = "CourseName";
 	private static $courseCode = "CourseCode";
 	private static $rssUrl = "RssUrl";
 	private static $rssLink = "rssLink";
 	private static $userId = "UserId";
 	private static $Schema = "Schedule";


 	private $key;

	public function __construct() {
		$this->dbTable = "programcourse";
		$this->courseTable = "course";
		$this->feedTable = "feed";


		$this->db = $this->connection();
	}


	public function removeCourse($id) {
 		try 	
 		{
			$sql = "DELETE FROM $this->courseTable WHERE " . self::$courseID ."= ?";
			$params = array($id);
			$query = $this->db->prepare($sql);
			$query->execute($params);

			return;
 		}
 		catch (Exception $e) 
 		{
 			header("Location: /". Settings::$ROOT_PATH . "/error.html");
 			die('An unknown error has happened');
 		}
 	}


	public function GetAllCourses() 
	{
		try {

				$list = array();
				$sql = "SELECT * FROM $this->courseTable";
				$query = $this->db->prepare($sql);
				$query->execute();

				$results = $query->fetchAll();
				foreach ($results as $result) {
					$list[] = $result;
				}

				return $list;
					
		} catch (Exception $e) {
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');	
		}
	}

	public function doIdExist($id) 
	{

	try{
		$sql = "SELECT * FROM $this->courseTable WHERE " . self::$courseID . "= ?";
		$params = array($id);
		$query = $this->db->prepare($sql);
		$query->execute($params);

		$results = $query->fetch();

		if ($results == false) 
		{
			return false;
		}

		return true;
	}
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}

	public function getCourseCode($id) 
	{
		try {

			$sql = "SELECT " . self::$courseCode . " FROM $this->courseTable WHERE " . self::$courseID . " = ?";
			$query = $this->db->prepare($sql);
			$params = array($id);
			$query->execute($params);

			$result = $query->fetch();

			if ($result) 
			{
				return $result['CourseCode'];
			}

			return null;
			
		} catch (Exception $e) {
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
		
	}

	public function GetAllCourseNr($programId) 
	{
		try {
			$sql = "SELECT CourseId FROM $this->dbTable WHERE " . self::$programID . "= ?";
			$params = array($programId);
			$query = $this->db->prepare($sql);
			$query->execute($params);

			$results = $query->fetchAll();

			return $results;
			
		} catch (Exception $e) {
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}

	}

	public function getCourses($nrcourses) 
	{
		try{
			foreach ($nrcourses as $key) {
				$this->key = $key;
			}
			
			$sql ="SELECT * FROM $this->courseTable WHERE " . self::$courseID . " = ?";
			$query = $this->db->prepare($sql);
			$params = array($this->key);

			$query->execute($params);

			$results = $query->fetchAll();
			if ($results) {

				foreach ($results as $result) 
				{
					if ($result['CourseId'] == $this->key) {

						$courseName[] =  $result['CourseName'];
					}
				
				}
				return $courseName;

			}
			else 
			{
				return null;
			}
	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}



public function getCourseSchema($id) 
	{

		try{
	
			
			$sql ="SELECT * FROM $this->courseTable WHERE " . self::$courseID . " = ?";
			$query = $this->db->prepare($sql);
			$params = array($id);

			$query->execute($params);

			$results = $query->fetchAll();
		
			if ($results) {

				foreach ($results as $result) 
				{
					if ($result['CourseId'] == $id) {

						$courseName[] =  $result['Schedule'];
					}
				
				}
				return $courseName;

			}
			else 
			{
				return null;
			}
	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	public function getCourseName($id) 
	{
		try{
		$sql = "SELECT * FROM $this->courseTable  WHERE " . self::$courseID . " = ?";
		$params = array($id);
		$query = $this->db->prepare($sql);
		$query->execute($params);
		$result = $query->fetch();

		return $result['CourseName'];
	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}
	
	public function CourseNameExists($courseName) 
	{	
		try{
		$sql = "SELECT * FROM $this->courseTable WHERE " . self::$courseName . " = ?";
		$params = array($courseName);
		$query = $this->db->prepare($sql);
		$query->execute($params);

		$results = $query->fetch();

		if ($results == false) 
		{
			return false;
		}

		return true;
	}
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}	
	
	public function CourseCodeExists($courseCode) 
	{
		try{
		$sql = "SELECT * FROM $this->courseTable WHERE " . self::$courseCode . " = ?";
		$params = array($courseCode);
		$query = $this->db->prepare($sql);
		$query->execute($params);

		$results = $query->fetch();

		if ($results == false) 
		{
			return false;
		}

		return true;
	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}

	public function AddCourse($courseName, $courseCode, $rssFeedUrl,$schema) {
		try 
		{	
			$sql = "INSERT INTO $this->courseTable (" . self::$courseName . ", " . self::$courseCode . ", " . self::$rssUrl .", " . self::$Schema . ") VALUES (?, ?, ?, ?)";
			$params = array($courseName, $courseCode, $rssFeedUrl,$schema);
 			$query = $this->db->prepare($sql);
			$query->execute($params);

			$id = $this->db->lastInsertId();
			return $id;
		}

		catch (PDOException $ex) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}

	
	

	public function addRSSData($defaultUsrID, $courseId, $link) {
		try 
		{	
			$sql = "INSERT INTO $this->feedTable (" . self::$userId .",". self::$courseID . "," . self::$rssLink .") VALUES (?,?,?)";
			$params = array($defaultUsrID, $courseId, $link);
 			$query = $this->db->prepare($sql);
			$query->execute($params);

		}

		catch (PDOException $ex) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	

	public function AddCourseToProgram($programId, $courseId) {
		try 
		{	
			$sql = "INSERT INTO $this->dbTable (" . self::$programID . " , " . self::$courseID . ") VALUES (?, ?)";
			$params = array($programId, $courseId);
 			$query = $this->db->prepare($sql);
			$query->execute($params);
		}

		catch (PDOException $ex) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	public function getRSSLink($courseId) 
	{
		try{
		$sql = "SELECT RssUrl FROM $this->courseTable  WHERE " . self::$courseID . "= ?";
		$params = array($courseId);
		$query = $this->db->prepare($sql);
		$query->execute($params);
		$result = $query->fetch();

		return $result['RssUrl'];
	}
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	public function getCourseID($courseName) 
	{
			try{
			$sql ="SELECT * FROM $this->courseTable WHERE " . self::$courseName . " = ?";
			$query = $this->db->prepare($sql);
			$params = array($courseName);

			$query->execute($params);

			$results = $query->fetchAll();
			if ($results) {

				foreach ($results as $result) 
				{
					if ($result['CourseName'] == $courseName) {
						
						$courseid =  $result['CourseId'];
					}
				
				}
				return $courseid;

			}
			else {
				return null;
			}
	}
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}

	public function checkIfRSSUrlExists($courseId) 
	{	
		try{
		$sql = "SELECT RssUrl FROM $this->courseTable WHERE " . self::$courseID . "= ?";
		$params = array($courseId);
		$query = $this->db->prepare($sql);
		$query->execute($params);
		$results = $query->fetch();
		return $results['RssUrl'];
	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	public function searchAutoComplete($keyword)
	{
		try{
		$sql = "SELECT CourseName FROM course WHERE CourseName LIKE (:keyword) ORDER BY CourseId ASC LIMIT 0, 7";
		$query = $this->db->prepare($sql);
		$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		$query->execute();
		$list = $query->fetchAll();

		return $list;

	}

		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


	public function getAllRssLinks($link) 
	{
		try 
		{ 
			$sql = "SELECT * FROM $this->feedTable WHERE RssLink = ?";
			$query = $this->db->prepare($sql);
			$params = array($link);
			$query->execute($params);
			$rssArray = $query->fetchAll();

			return $rssArray;
			
		} 
		
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}

 }

 public function getRSS($courseId) 
	{
		try{
		$sql = "SELECT RssLink FROM $this->feedTable  WHERE " . self::$courseID . "= ?";
		$params = array($courseId);
		$query = $this->db->prepare($sql);
		$query->execute($params);
		$result = $query->fetch();

		return $result['RssLink'];
	}
		catch (PDOException $e) 
		{
			header("Location: /". Settings::$ROOT_PATH . "/error.html");
			die('An unknown error has happened');
		}
	}


 }