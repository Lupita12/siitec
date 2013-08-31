<?
require_once ("conexion.php");

class partida_departamento
{
	private $id_meta=0;
	private $id_partida=0;
	private $id_departamento=0;
	private $ingreso_propio=0;
	private $vigencia='';
	private $gastado=0;
	private $comprometido=0;
	private $periodo='';
	
	public function __construct($clave_me = '',$clave_part = 0, $clave_depa = 0,$perio='')
	
	{	
	
	
	
	
	if ($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;				
			}
	
	
	
	
	
		if($clave_me !='' && $clave_part != 0 && $clave_depa !=0)
		{
						
						
				$id_demeta = mysql_query("select id_meta from meta where clave='".$clave_me."' and periodo='".$perio."'");
				$id_departida= mysql_query("select id_partida from partida where clave =".$clave_part."");
				$id_depart = mysql_query("select id_departamento from departamento where clave=".$clave_depa."");
				
				
				$a_meta = mysql_fetch_row($id_demeta);
				$a_departida = mysql_fetch_row($id_departida);
				$a_depart = mysql_fetch_row($id_depart);
				
				
				
				
				$this->id_meta =$a_meta[0];
				$this->id_partida=$a_departida[0];
				
				$this->id_departamento=$a_depart[0];
						
						
	

						
						
						
						
						$Sql = mysql_query("SElECT * FROM partida_departamento WHERE id_meta = ".$this->id_meta." and id_partida =".$this->id_partida." and id_departamento = ".$this->id_departamento." and periodo='".$perio."'"); 
						
						
						

			$num = mysql_num_rows($Sql);				
						
						if($num!=0)
						{
						
							$row = mysql_fetch_row($Sql);
							
							// $this->setid_meta($id_meta);				
							//$this->setid_partida($id_partida);
							// $this->setid_departamento($id_departamento);
							$this->setingreso_propio($row[3]);
							$this->setvigencia($row[4]);
							$this->setgastado($row[5]);
							$this->setcomprometido($row[6]);
							$this->setperiodo=$perio;

							
							
							
							
							
							
						
						}
								
			
		}
	
	
	
	}
	
	public function __destruct(){}
	
	
	public function agregar()
		{
		
			$cadena_sql = mysql_query("insert into partida_departamento(id_meta,id_partida,id_departamento,ingreso_propio,vigencia,gastado,comprometido,periodo) values ('".$this->id_meta."',".$this->id_partida.",".$this->id_departamento.",'".$this->ingreso_propio."','".$this->vigencia."','".$this->gastado."','".$this->comprometido."','".$this->periodo."')"); 

		$resultado = mysql_query($cadena_sql);
		
		}

	public function modificar()
	{
		$CadenaSQL = " update partida_departamento set id_meta = '".$this->id_meta."', id_partida = ".$this->id_partida.", id_departamento = ".$this->id_departamento.", ingreso_propio=".$this->ingreso_propio.", vigencia=".$this->vigencia.", gastado=".$this->gastado.", comprometido=".$this->comprometido.", periodo=".$this->periodo." where id_meta='".$this->id_meta. "'";
		$resultado = mysql_query($CadenaSQL);
		
	}
	
	
	
	
	public function eliminar()
	{
		$cadenaSQL = "delete from partida_departamento where id_meta='".$this->id_meta. "'";				
		$resultado = mysql_query($cadenaSQL);
	}
	
	
	
	public function modificamonto(){
       mysql_query("update partida_departamento set ingreso_propio=".$this->ingreso_propio. " id_meta = ".$this->id_meta." and id_partida =".$this->id_partida." and id_departamento = ".$this->id_departamento."");        
   }
	
	
	//----
	
		public function getid_meta(){
			return $this->id_meta;
		}
		public function setid_meta($newval){
			 $this->id_meta = $newval;
		}		


	//----
	
		public function getid_partida()
		{
			return $this->id_partida;
		}
		public function setid_partida($newval)
		{
			 $this->id_partida = $newval;
			 
		}		
		
		
		//----
		public function getid_departamento()
		{
			return $this->id_departamento;
		}
		public function setid_departamento($newval)
		{
			 $this->id_departamento= $newval;
		}		
		
		// ---

		public function getingreso_propio(){
			return $this->ingreso_propio;
		}
		public function setingreso_propio($newval){
			 $this->ingreso_propio = $newval;
		}		



	// ---

		public function getvigencia(){
			return $this->vigencia;
		}
		public function setvigencia($newval){
			 $this->vigencia = $newval;
		}		

	// ---

		public function getgastado(){
			return $this->gastado;
		}
		public function setgastado($newval){
			 $this->gastado = $newval;
		}		
		
		// ---

		public function getcomprometido(){
			return $this->comprometido;
		}
		public function setcomprometido($newval){
			 $this->comprometido = $newval;
		}		
		
		// ---

		public function getperiodo(){
			return $this->periodo;
		}
		public function setperiodo($newval){
			 $this->periodo = $newval;
		}		


}


?>