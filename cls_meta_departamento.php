<?
require_once("conexion.php"); 
//require_once("cls_meta.php"); 

	class Meta_departamento
	{
		private $clave_departamento = 0;
		private $clave_meta = '';		
		private $monto = 0;
		private $periodo = '';
		private $id_meta = 0;
		private $id_departamento = 0;			

		
		function __construct($clave_depa = 0,$clave_me='',$perio='')
		{
			if ($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;				
			}
			
			if($clave_depa != 0 && $clave_me!='')
			{	
			// echo "Esta es la clave de la meta q llega:".$clave_me. "<br>Este es la clave del departamento".$clave_depa;
				//periodo no se puso aver q pedo
				$id_demeta = mysql_query("select id_meta from meta where clave='".$clave_me."' and periodo='".$perio."'");
				$id_depart = mysql_query("select id_departamento from departamento where clave=".$clave_depa." and periodo=".$perio);
				$a_meta = mysql_fetch_array($id_demeta);
				$a_depa = mysql_fetch_array($id_depart);
				$this->id_meta=$a_meta[0];
				$this->id_departamento=$a_depa[0];
			
				// echo "<br>Este es el id de la meta: ".$this->id_meta."<br>";
				// echo "Este es el id del departamento:".$this->id_departamento;
				$kaka="select * from meta_departamento where id_departamento=".$this->id_departamento." and id_meta=".$this->id_meta." and periodo='".$perio."'";
				// echo "<br><br>Esta es la consulta:".$kaka."<br>";
				$cadena_sql = mysql_query("select * from meta_departamento where id_departamento=".$this->id_departamento." and id_meta=".$this->id_meta." and periodo='".$perio."'");
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave_departamento=$clave_depa;
					$this->clave_meta=$clave_me;
					$this->periodo=$perio;
					
					$cade = mysql_query("select sum(ingreso_propio) from partida_departamento where id_meta=".$this->id_meta." and id_departamento=".$this->id_departamento);
					$res = mysql_fetch_row($cade);
					//si el resultado de la consulta es nulo asigna cero a monto
					if($res[0]!=NULL)
					{
						$this->monto=$res[0];
					}else{
						$this->monto=0;
					}								
				}
			}	
		}
		function __destruct(){
		
		}

		public function agregar()
		{	
			$cadena_sql = mysql_query("insert into meta_departamento (id_departamento,id_meta,monto,periodo) values (".$this->id_departamento.",".$this->id_meta.",".$this->monto.",'".$this->periodo."')"); 

		$resultado = mysql_query($cadena_sql);
		}
		
	public function modificar()
	{
		$CadenaSQL = " update meta_departamento set monto = " .$this->monto. ",periodo ='".$this->periodo."' where id_departamento=".$this->id_departamento. " and id_meta=". $this->id_meta. " and periodo='".$this->periodo."'";
		$resultado = mysql_query($CadenaSQL);
		
	}
	public function modificamonto(){
		$que = "UPDATE meta_departamento SET monto = ".$this->monto." WHERE id_departamento=".$this->id_departamento. " and id_meta=". $this->id_meta. " and periodo='".$this->periodo."'";
		mysql_query($que);
		
	}	
	
	public function eliminar()
	{
		$cadenaSQL = "delete from meta_departamento where id_departamento=".$this->id_departamento. " and id_meta=". $this->id_meta. " and periodo='".$this->periodo."'";
				
		$resultado = mysql_query($cadenaSQL);
	}
	
		public function geclave_departamento(){
			return $this->clave_departamento;
		}
		public function setclave_departamento($newval){
			 $this->clave_departamento = $newval;
		}		
		public function getclave_meta(){
			return $this->clave_meta;
		}
		public function setclave_meta($newval){
			 $this->clave_meta = $newval;
		}
		public function getmonto(){
			return $this->monto;
		}
		public function setmonto($newval){
			return $this->monto = $newval;
		}
		public function getperiodo(){
			return $this->periodo;
		}
		public function setperiodo($newval){
			return $this->periodo = $newval;
		}	
		
		public function getid_meta(){
			return $this->id_meta;
		}
		public function setid_meta($newval){
			return $this->id_meta = $newval;
		}	
		public function getid_departamento(){
			return $this->id_departamento;
		}
		public function setid_departamento($newval){
			return $this->id_departamento = $newval;
		}
}

?>
