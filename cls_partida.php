<?
require_once("conexion.php");

class Partida {
	
	private  $clave =0 ;
	private  $clave_subcapitulo = 0 ;
	private  $nombre ='' ;
	private  $descripcion ='' ;
	private  $ingreso_propio = 0 ;
	private  $gasto_directo = 0 ;
	private  $vigencia = '000000' ;
	private  $periodo ='';
	private  $id_partida = 0;
	private  $id_subcapitulo=0;
	private  $estado =0;
	
	function __construct($cve_partida = 0, $periodo ='', $depa = 0, $meta = '')
	{
			
			if ($periodo == '')
			{
				$periodo = date ('Y');
			
				$this->periodo = $periodo;
			}
			if ($cve_partida != 0)
			{
						
				$cadena_sql = mysql_query("select * from partida where clave = " .$cve_partida. " and periodo ='".$periodo."'"); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
				
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave=$cve_partida;
					$this->clave_subcapitulo=$resu[1];
					$this->id_subcapitulo=$resu[1];
					$this->nombre=$resu[2];
					$this->descripcion=$resu[3];
					//$this->gasto_directo=$resu[5];
					$this->periodo=$periodo;
					$this->vigencia=$resu[6];
					$this->id_partida=$resu[8];
					$this->estado=$resu[9];
					
					
				
					if ($depa == 0 && $meta == '' )
					{
					
					//Obtener el monto de la partida 
					$que=mysql_query("select SUM(ingreso_propio) from partida_departamento where id_partida = ".$this->id_partida."");
					$res = mysql_fetch_row($que);
					//si el resu es nulo asigna cero a ingreso propio
						if($res[0]!=NULL)
						{
							$this->ingreso_propio=$res[0];
							 
						}else{
							$this->ingreso_propio=0;
						}
						
					//Obtener el gasto directo 
						$que2=mysql_query("select SUM(monto) from gastodirecto_partida where id_partida = ".$this->id_partida."");
						$res2=mysql_fetch_row($que2);
						
						if($res2[0]!=NULL)
						{
							$this->gasto_directo=$res2[0];
							 
						}else{
							$this->gasto_directo=0;
						}
						
						
					
					}else{
						
						$id_depar =mysql_query("select id_departamento from departamento where clave = ".$depa." ");
						$id_dmeta =mysql_query("select id_meta from meta where clave ='".$meta."' ");
						$row = mysql_fetch_array($id_depar);
						$row2 = mysql_fetch_array($id_dmeta);
						
						$cad=mysql_query("select ingreso_propio from partida_departamento where id_departamento = ".$row[0]." and id_meta = ".$row2[0]." and  id_partida = ".$this->id_partida);
						$result = mysql_fetch_row($cad);
						$this->setingreso_propio($result[0]);
				
											
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
	
	
	public function getclave_subcapitulo(){
		return $this->clave_subcapitulo;
	}
	public function setclave_subcapitulo($newval){
		$this->clave_subcapitulo = $newval;
	}

	
	public function getnombre(){
		return $this->nombre;
	}
	public function setnombre($newval){
		$this->nombre = $newval;
	}
	
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	public function setdescripcion($newval){
		$this->descripcion = $newval;
	}
	
	
	
	public function getingreso_propio(){
		return $this->ingreso_propio;
	}
	public function setingreso_propio($newval){
		$this->ingreso_propio = $newval;
	}
	
	
	public function getgasto_directo(){
		return $this->gasto_directo;
	}
	public function setgasto_directo($newval){
		$this->gasto_directo = $newval;
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

	public function getid_subcapitulo(){
		return $this->id_subcapitulo;
	}
	
	public function setid_subcapitulo($newval){
		$this->id_subcapitulo = $newval;
	}
	
	public function getid_partida(){
		return $this->id_partida;
	}
	
	public function setid_partida($newval){
		$this->id_partida = $newval;
	}
	
	
	public function getestado(){
		return $this->estado;
	}
	
	public function setestado($newval){
		$this->estado = $newval;
	}
	
	
	/**
	 * Funcion agregarPartidas()
	 * Agrega una partida a la lista de partidas (graba la partida en la base de
	 * datos)
	 */
	public function agregarPartidas(){

       $que =  mysql_query ("INSERT INTO partida (clave, id_subcapitulo, nombre, descripcion, ingreso_propio, gasto_directo, vigencia, periodo, estado) VALUES (".$this->clave.",".$this->id_subcapitulo.",'".$this->nombre."', '".$this->descripcion."',".$this->ingreso_propio.",".$this->gasto_directo.",'".$this->vigencia."','".$this->periodo."',".$this->estado." )");			
		  
	   $resultado=mysql_query($que);		  
	
	}

	
	/**
	 * Funcion modificaPartidas()
	 * Actualiza la descripcion de una partida especifica
	 */
	 
	public function modificaPartidas(){
	  
	  $que = "UPDATE partida SET clave = ".$this->clave.",id_subcapitulo = ".$this->id_subcapitulo.", nombre = '".$this->nombre."',descripcion = '".$this->descripcion."', ingreso_propio = ".$this->ingreso_propio.", gasto_directo=".$this->gasto_directo.",vigencia = '".$this->vigencia."',periodo='".$this->periodo."',estado = ".$this->estado." WHERE id_partida = ".$this->id_partida." "; 
	    
	  	$res = mysql_query($que);
		//echo $res;
		//die();
			
	}
	
	//Funcion especial 
	
	public function modificamonto(){
		$que = "UPDATE partida SET ingreso_propio = ".$this->ingreso_propio." WHERE id_partida = ".$this->id_partida." ";
		$res = mysql_query($que);
		
	}



	/**
	 * Funcion eliminaPartidas()
	 * Elimina una partida de la lista
	 */
	
	public function eliminaPartidas(){
	 
	  $que = "DELETE from partida 
	  		  WHERE id_partida = ".$this->id_partida." "; 
				  
	   $res = mysql_query($que);
	  
	  	
	  	
	}

}
?>
