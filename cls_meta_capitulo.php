<?
require_once("conexion.php"); 
//require_once("cls_meta.php"); 

	class Meta_capitulo
	{
		private $clave_meta = '';
		private $clave_capitulo = 0;		
		private $ingreso_propio = 0;
		private $gasto_directo = 0;						
		private $ene_jun = 0;
		private $jul_dic = 0;		
		private $monto_total = 0;
		private $periodo = '';
		private $id_meta = 0;
		private $id_capitulo = 0;		

		
		function __construct($clave_met = '',$clave_capitul=0,$perio='')
		{
			if ($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;
			}	
			
			if($clave_met != '' && $clave_capitul!=0)
			{
				$id_demeta = mysql_query("select id_meta from meta where clave='".$clave_met."' and periodo='".$perio."'");
				$id_decapit = mysql_query("select id_capitulo from capitulo where clave=".$clave_capitul." and periodo='".$perio."'");
				$a_meta = mysql_fetch_row($id_demeta);
				$a_capi = mysql_fetch_row($id_decapit);
				$this->id_meta=$a_meta[0];
				$this->id_capitulo=$a_capi[0];					
				$cadena_sql = mysql_query("select * from meta_capitulo where id_meta=".$this->id_meta." and id_capitulo=". $this->id_capitulo. " and periodo='" . $perio."'");
				 	
				$diez=$clave_capitul;
				$diez=$diez."0";
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave_meta=$clave_met;
					$this->clave_capitulo=$clave_capitul;
					$this->ene_jun=$resu[4];
					$this->jul_dic=$resu[5];
					$this->monto_total=$resu[6];
					$this->periodo=$perio;
					
					//consulta sin ver
					//$cho=mysql_query("select sum(ingreso_propio) from partida_departamento WHERE clave_meta='".$this->id_meta."' and clave_partida between ".$clave_capitul." and (".$clave_capitul."+999)");
					
					$cho=mysql_query("select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=".$this->id_meta." and clave between ".$diez." and (".$diez."+9999)");
					$re = mysql_fetch_row($cho);
					if($re[0]!=NULL)
					{
						$this->ingreso_propio=$re[0];
					}else{
						$this->ingreso_propio=0;
					}										
					//$this->ingreso_propio=$re[0];

					//mando llamar al metodo para sacar el gasto directo
					//$resul=$this->getgastodirecto($clave_met,$clave_capitul,$perio);
					//echo $resul;
					//$this->gasto_directo=$resul;
					$this->gasto_directo=$resu[3];
							
				}
				else
				{
					$juas=mysql_query("select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=".$this->id_meta." and clave between ".$diez." and (".$diez."+9999)");
				$rew = mysql_fetch_row($juas);
					if($rew[0]!=NULL)
					{
						$this->ingreso_propio=$rew[0];
					}else{
						$this->ingreso_propio=0;
					}					
				}
			}	
		}
		function __destruct(){
		
		}


		public function agregar()
		{
		
			$cadena_sql = mysql_query("insert into meta_capitulo(id_meta,id_capitulo,ingreso_propio,gasto_directo,ene_jun,jul_dic,monto_total,periodo) values (".$this->id_meta.",".$this->id_capitulo.",".$this->ingreso_propio.",".$this->gasto_directo.",".$this->ene_jun.",".$this->jul_dic.",".$this->monto_total.",'".$this->periodo."')"); 

		$resultado = mysql_query($cadena_sql);
		
		}
		
	public function modificar()
	{
		$CadenaSQL = " update meta_capitulo set ingreso_propio = ".$this->ingreso_propio.", gasto_directo=".$this->gasto_directo.", ene_jun=".$this->ene_jun.", jul_dic=".$this->jul_dic.", monto_total=".$this->monto_total.", periodo='".$this->periodo."' where id_meta=".$this->id_meta. " and id_capitulo=". $this->id_capitulo. " and periodo='".$this->periodo."'";
		$resultado = mysql_query($CadenaSQL);
		
	}
	public function modificamonto(){
		$que = "UPDATE meta_capitulo SET ingreso_propio = ".$this->ingreso_propio." WHERE id_meta=".$this->id_meta. " and id_capitulo=". $this->id_capitulo. " and periodo='".$this->periodo."'";
		mysql_query($que);
		
	}	
	
	public function eliminar()
	{
		$cadenaSQL = "delete from meta_capitulo where id_meta=".$this->id_meta. " and id_capitulo=". $this->id_capitulo. " and periodo='".$this->periodo."'";
				
		$resultado = mysql_query($cadenaSQL);
	}
	
		public function getgastodirecto($newval,$newval2,$newval3){
		
			$cho=mysql_query("select sum(gasto_directo) from partida where clave in 
(select p.clave_partida from meta_capitulo m 
join partida_departamento p on m.clave_meta=p.clave_meta 
where m.clave_meta='".$newval."' and m.clave_capitulo=".$newval2 ." and m.periodo=".$newval3." and p.clave_partida BETWEEN m.clave_capitulo AND (m.clave_capitulo+999))");	
			$resu = mysql_fetch_row($cho);	
			return $resu[0];
		}	

		public function getclave_meta(){
			return $this->clave_meta;
		}
		public function setclave_meta($newval){
			 $this->clave_meta = $newval;
		}		
		public function getclave_capitulo(){
			return $this->clave_capitulo;
		}
		public function setclave_capitulo($newval){
			 $this->clave_capitulo = $newval;
		}

		public function getingreso_propio(){
			return $this->ingreso_propio;
		}
		public function setingreso_propio($newval){
			return $this->ingreso_propio = $newval;
		}
		public function getgasto_directo(){
			return $this->gasto_directo;
		}
		public function setgasto_directo($newval){
			return $this->gasto_directo = $newval;
		}		
		
		public function getene_jun(){
			return $this->ene_jun;
		}
		public function setene_jun($newval){
			return $this->ene_jun = $newval;
		}
		public function getjul_dic(){
			return $this->jul_dic;
		}
		public function setjul_dic($newval){
			return $this->jul_dic = $newval;
		}
		
		public function getmonto_total(){
			return $this->monto_total;
		}
		public function setmonto_total($newval){
			return $this->monto_total = $newval;
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
		
		public function getid_capitulo(){
			return $this->id_capitulo;
		}
		public function setid_capitulo($newval){
			return $this->id_capitulo = $newval;
		}		
					
		
}

?>