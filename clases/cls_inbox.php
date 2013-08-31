<?

class inbox
{
	
	private $id_encargado = 0;
	private $id_requisicion = 0;
	private $departamento = "";
	private $fecha_ingreso = "";
	private $fecha_salida="";
	
	
   function __construct($clave_inbox=0)
   {
	   
	   if($clave_inbox != 0)
		{
			$Sql = "SElECT * FROM inbox WHERE id_encargado = $clave_inbox";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_encargado=$clave_inbox;				
				$this->id_requisicion=$row[1];
				$this->departamento=$row[2];
				$this->fecha_ingreso=$row[3];
				$this->fecha_salida=$row[4];
				

			}
		}
   }
   
   function __destruct(){}
   
   
   
  //________________________________
 // Agregar, Modificar, Eliminar
 
 
 public function agregar()
 {
		$Sql="INSERT INTO inbox (id_encargado,id_requisicion,departamento,fecha_ingreso,fecha_salida)  VALUES (".$this->id_encargado.",".$this->id_requisicion.", '".$this->departamento."', '".$this->fecha_ingreso."', '".$this->fecha_salida."')";      
   		mysql_query($Sql); 
			 
	 
 }
 
 public function modificar()
 {
		$Sql="UPDATE inbox SET id_encargado=".$this->id_encargado.", id_requisicion=".$this->id_requisicion.", departamento='".$this->departamento."', fecha_ingreso='".$this->fecha_ingreso."', fecha_salida='".$this->fecha_salida."' WHERE id_encargado=".$this->id_encargado.""; 
  	 	
		mysql_query($Sql);
		  					 
	 
	 
 }
 
 public function eliminar()
 {
		$Sql="DELETE FROM inbox WHERE id_encargado =".$this->id_encargado."";   
		
		mysql_query($Sql);	 
	 
 }
 
 
 //___________________________________________
 // SET & GET
 
 //____________________________________________________
 public function getid_encargado()
 {
		return $this->id_encargado;
 }
	
 public function setid_encargado($newval)
 {
		$this->id_encargado = $newval;
 }
	
//____________________________________________________
 public function getid_requisicion()
 {
		return $this->id_requisicion;
 }
	
 public function setid_requisicion($newval)
 {
		$this->id_requisicion = $newval;
 }
 
 
 //____________________________________________________
 public function getdepartamento()
 {
		return $this->departamento;
 }
	
 public function setdepartamento($newval)
 {
		$this->departamento = $newval;
 }
	
//____________________________________________________
 public function getfecha_ingreso()
 {
		return $this->fecha_ingreso;
 }
	
 public function setfecha_ingreso($newval)
 {
		$this->fecha_ingreso = $newval;
 }
	
//____________________________________________________
 public function getfecha_salida()
 {
		return $this->fecha_salida;
 }
	
 public function setfecha_salida($newval)
 {
		$this->fecha_salida = $newval;
 }
 
	
	
	
}



?>