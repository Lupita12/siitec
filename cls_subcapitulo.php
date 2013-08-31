<?
require_once("conexion.php");
require_once("cls_partida.php"); 

class Subcapitulo
{
	private $clave =0 ;
	
	private $id_capitulo=0;
	private $nombre ='';
	private $vigencia ='000000';
	private $periodo = '';
	private $id_subcapitulo=0;
	//private $id = 0;
	
	private $lst_partida = array();// Declaramos un array de objetos tipo partida
	
	function __construct($cve_subcapitulo = 0, $periodo = '', $depa = 0, $meta = '')
	{
			if ($periodo == '')
			{
				$periodo = date ('Y');
			
				$this->periodo = $periodo;
			}
			
			if ($cve_subcapitulo != 0)
			{
	
				$cadena_sql = mysql_query("select * from subcapitulo where clave = " .$cve_subcapitulo. " and periodo ='".$periodo."' "); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave=$cve_subcapitulo;
					//$this->clave_capitulo=$resu[1];
					$this->id_capitulo=$resu[1];
					$this->nombre=$resu[2];
					$this->vigencia=$resu[3];
					$this->periodo=$resu[4];	
					$this->id_subcapitulo=$resu[5];
					//$this->id=$resu[5];
		
					if ($depa == 0 && $meta== '')
					{
					
					//consulta para obtener las partidas q tiene un subcapitulo
					$cad="select clave from partida where id_subcapitulo=".$this->id_subcapitulo." and periodo = '".$periodo."'";
					$res = mysql_query($cad);
					while($partida = mysql_fetch_array($res)){
						$this->lst_partida[] = new Partida($partida[0]);
						}		
							
					}else {
					// consulta para obtener las partidas q tiene un subcapitulo sobre un departamento
					
						$id_depar =mysql_query("select id_departamento from departamento where clave = ".$depa." ");
						$id_dmeta =mysql_query("select id_meta from meta where clave = '".$meta."' ");
						
						$row = mysql_fetch_array($id_depar);
						$row2 = mysql_fetch_array($id_dmeta);
						
					
						$cadena=mysql_query("select p.clave from partida p join partida_departamento pd on pd.id_partida = p.id_partida where pd.id_meta =".$row2[0]." and pd.id_departamento =".$row[0]." and pd.periodo = '".$periodo."' and p.id_subcapitulo = ".$this->id_subcapitulo."");
						
							while($partida = mysql_fetch_array($cadena)){
							$this->lst_partida[] = new Partida($partida[0],$periodo,$depa,$meta);
							}		
						
					
					}	
				}
			
			}	
	
	}
	
	function __destruct()
	{
	}
	
	public function getclave(){
		return $this->clave;
	}
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	
	public function getnombre(){
		return $this->nombre;
	}
	public function setnombre($newval){
		$this->nombre = $newval;
	}
	
	
	
	public function getvigencia(){
		return $this->vigencia;
	}
	public function setvigencia($newval){
		$this->vigencia = $newval;
	}
	
	
	public function getperiodo(){
		return $this->periodo;
	}
	public function setperiodo($newval){
		$this->periodo = $newval;
	}
	
	
	public function getlst_partida(){
		return $this->lst_partida;
	}
	public function setlst_partida($newval){
		$this->lst_partida = $newval;
	}
	
	public function getid_capitulo(){
		return $this->id_capitulo;
	}
	public function setid_capitulo($newval){
		$this->id_capitulo = $newval;
	}
	
	public function getid_subcapitulo(){
		return $this->id_subcapitulo;
	}
	
	public function setid_subcapitulo($newval){
		$this->id_subcapitulo = $newval;
	}
	
	
	// Agregar
	public function agregarSubcapitulos()
	{

       $que = ("INSERT INTO subcapitulo (clave, id_capitulo, nombre, vigencia, periodo) VALUES (".$this->clave.", ".$this->id_capitulo.", '".$this->nombre."','".$this->vigencia."','".$this->periodo."')");	
	    
	   $res = mysql_query($que);
	
	}
	
	//Modificar
	public function modificaSubcapitulos(){
	  
	  $que = "UPDATE subcapitulo
	  		  SET clave = ".$this->clave.",
			  	  id_capitulo = ".$this->id_capitulo.",
			  	  nombre = '".$this->nombre."',
				  vigencia = '".$this->vigencia."',
				  periodo='".$this->periodo."'  
			  WHERE id_subcapitulo = ".$this->id_subcapitulo;
	    
	  	$res = mysql_query($que);
		
	}
	
	//Eliminar
	public function eliminaSubcapitulos(){
	 
	  $que = "DELETE from subcapitulo 
	  		  WHERE id_subcapitulo = ".$this->id_subcapitulo." " ; 
				  
	   $res = mysql_query($que);	
	  	
	}

}
?>