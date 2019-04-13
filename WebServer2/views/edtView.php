<header>
  <?php require('header/header.php'); ?>
  </header>
<body>

<h1> Emploi du Temps </h1>
    <link rel="stylesheet" href="css/styleEdt.css">
    <?php
class Evt {
		 private $_Start;
		 private $_End;
		 private $_Teacher;
		 private $_Date;
		 private $_Class;
		 private $_Room;
	

	function __construct($Start,$End,$Teacher,$Date,$Room,$Class){

		$this->_Start = $Start;
		$this->_End = $End;
		$this->_Teacher = $Teacher;
		$this->_Date = $Date;
		$this->_Room = $Room;
		$this->_Class = $Class;

	}
	
	public function Start(){
		return $this->_Start;

	}
	public function End(){
		return $this->_End;

	}
	public function Teacher(){
		return $this->_Teacher;	

	}
	public function Date(){
		return $this->_Date;
	}
	public function Room(){
		return $this->_Room;
	}
	public function Class(){
		return $this->_Class;
	}

}

    $raw = file_get_contents($agendaLink);

    $status = "";
    $events = [];
    $event = [];
    foreach (explode("\n", $raw) as $l=>$v){
          if (trim($v) == "BEGIN:VEVENT") {
                $status = "event";
                continue;
        }


        if (trim($v) == "END:VEVENT") {
                $status = "";
                $events[] = $event;
                $event = [];
                continue;
        }

        if ($status != "event") {
                continue;
        }

        list($key, $value) = explode(":", $v, 2);
        $event[$key] = $value;
        continue;

}
$tableau = array();

for ($i = 0 ; $i < sizeof($events) ; $i ++) {

  list($StDate, $StHour) =  explode("T", $events[$i]['DTSTART'], 2);
  list($StDate2, $StHourEnd) =  explode("T", $events[$i]['DTEND'], 2);
  
  list($StHour) =  explode("Z", $StHour);
  list($StHourEnd) =  explode("Z", $StHourEnd);
  $date = new DateTime($StDate);
  
  $dateHour = new DateTime($StHour);
  $dateHourEnd = new DateTime($StHourEnd);
  
  

  	
  list($empty, $Info, $Teacher) =  explode('\n', $events[$i]['DESCRIPTION']);
  $class = $events[$i]['SUMMARY'];	
  $room = $events[$i]['LOCATION'];

  $Evt = new Evt($dateHour->format('H:i'),$dateHourEnd->format('H:i'),$Teacher,$date->format('Y/m/d'),$room,$class);
  $tableau[] = $Evt;  
}
echo ' <h2>'.$Info.'</h2> ';  

function cmp($a, $b)
{
    if ($a->Date() == $b->Date()) {
        return 0;
    }
    return ($a->Date() < $b->Date()) ? -1 : 1;
}


usort($tableau, 'cmp');

echo '<div class ="window"> ';

for ($i = 0 ; $i < sizeof($tableau) ; $i ++) {
  echo'
    <div class ="table">

     <div class="head">
        <div class ="text"> '.$tableau[$i]->Date().' <br>
        '.$tableau[$i]->Start().'-'.$tableau[$i]->End().' </div>
     </div>

     <div class ="body">
	<div class ="textBody">
        '.$tableau[$i]->Class().'<br>
        '.$tableau[$i]->Teacher().'
	</div>
     </div>

     <div class="bottom">
       <div class ="text"> '.$tableau[$i]->Room().' <br></div>
    </div>
    </div>
   ';

}
echo ' </div> ';
echo ' </body></html> ';
  
?>