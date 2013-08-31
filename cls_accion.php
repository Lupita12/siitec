<?
	require_once("conexion.php"); 

	class Accion
	{
		private $clave_meta = '';
		private $clave = '';		
		private $nombre = '';
		private $descripcion = '';
		private $monto = 0;					
		private $ingreso_propio_ene_jun = 0;
		private $ingreso_propio_jul_dic = 0;		
		private $gasto_directo_ene_jun = 0;
		private $gasto_directo_jul_dic = 0;	
		private $vigencia = '000000';
		private $periodo = '';
		private $id_accion=0;
		private $id_meta=0;		
		
		
		function __construct($clave_accio = '', $perio='')
		{
			if($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;
			}
			if($clave_accio != '')
			{
				$cadena_sql = mysql_query("select * from accion where clave='" .$clave_accio. "' and periodo='".$perio."'"); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
																			
					$this->id_meta=$resu[1];					
					$this->clave_meta=$this->id_meta;
					$this->clave=$clave_accio;
					$this->nombre=$resu[2];
					$this->descripcion=$resu[3];
					$this->ingreso_propio_ene_jun=$resu[5];
					$this->ingreso_propio_jul_dic=$resu[6];
					$this->gasto_directo_ene_jun=$resu[7];
					$this->gasto_directo_jul_dic=$resu[8];
					$this->vigencia=$resu[9];
					$this->periodo=$perio;
					$this->id_accion=$resu[11];
					//echo "select sum(ingreso_propio) from meta_capitulo where clave_meta='".$this->clave_meta."' and periodo='".$perio."'";
					
					$cho=mysql_query("select sum(ingreso_propio) from partida_departamento where id_meta='".$this->id_meta."' and periodo='".$perio."'");
					$resu = mysql_fetch_row($cho);
					//se hace la condicion para ver si nos trae un valor en caso de no haber montos se asigna 0
					if($resu[0]!=NULL)
					{
						$this->monto=$resu[0];
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
			$cadena_sql = mysql_query("insert into accion (clave,id_meta,nombre,descripcion,monto,ingreso_propio_ene_jun,ingreso_propio_jul_dic,gasto_directo_ene_jun,gasto_directo_jul_dic,vigencia,periodo) values ('".$this->clave."',".$this->id_meta.",'".$this->nombre."','".$this->descripcion."',".$this->monto.",".$this->ingreso_propio_ene_jun.",".$this->ingreso_propio_jul_dic.",".$this->gasto_directo_ene_jun.",".$this->gasto_directo_jul_dic.",'".$this->vigencia."','".$this->periodo."')"); 
			mysql_query($cadena_sql);
		
		}
		
	public function modificar()
	{
		$CadenaSQL = " update accion set clave='".$this->clave."', id_meta = ".$this->id_meta.", nombre = '".$this->nombre."', descripcion = '" .$this->descripcion. "', monto = ".$this->monto.", ingreso_propio_ene_jun=".$this->ingreso_propio_ene_jun.", ingreso_propio_jul_dic=".$this->ingreso_propio_jul_dic.", gasto_directo_ene_jun=".$this->gasto_directo_ene_jun.", gasto_directo_jul_dic=".$this->gasto_directo_jul_dic.", vigencia='".$this->vigencia."', periodo='".$this->periodo."' where id_accion=".$this->id_accion;
		mysql_query($CadenaSQL);
	}
	
	public function eliminar()
	{
		$cadenaSQL = "delete from accion where id_accion = '".$this->id_accion. "'";
		mysql_query($cadenaSQL);
	}

		public function getclave_meta(){
			return $this->clave_meta;
		}
		public function setclave_meta($newval){
			 $this->clave_meta = $newval;
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
			return $this->nombre = $newval;
		}
		public function getdescripcion(){
			return $this->descripcion;
		}
		public function setdescripcion($newval){
			return $this->descripcion = $newval;
		}
		public function getmonto(){
			return $this->monto;
		}
		public function setmonto($newval){
			return $this->monto = $newval;
		}		
		
		public function getingreso_propio_ene_jun(){
			return $this->ingreso_propio_ene_jun;
		}
		public function setingreso_propio_ene_jun($newval){
			return $this->ingreso_propio_ene_jun = $newval;
		}
		public function getingreso_propio_jul_dic(){
			return $this->ingreso_propio_jul_dic;
		}
		public function setingreso_propio_jul_dic($newval){
			return $this->ingreso_propio_jul_dic = $newval;
		}
		
		public function getgasto_directo_ene_jun(){
			return $this->gasto_directo_ene_jun;
		}
		public function setgasto_directo_ene_jun($newval){
			return $this->gasto_directo_ene_jun = $newval;
		}
		
		public function getgasto_directo_jul_dic(){
			return $this->gasto_directo_jul_dic;
		}
		public function setgasto_directo_jul_dic($newval){
			return $this->gasto_directo_jul_dic = $newval;
		}		

		public function getvigencia(){
			return $this->vigencia;
		}
		public function setvigencia($newval){
			return $this->vigencia = $newval;
		}

		public function getperiodo(){
			return $this->periodo;
		}
		public function setperiodo($newval){
			return $this->periodo = $newval;
		}
		public function getid_accion(){
			return $this->id_accion;
		}
		public function setid_accion($newval){
			return $this->id_accion = $newval;
		}
		public function getid_meta(){
			return $this->id_meta;
		}
		public function setid_meta($newval){
			return $this->id_meta = $newval;
		}						
}

/*
public function getLstMunicipios()
	{
		$AMpio = array();
		$Sql = "select IdMunicipio from siitec.dbo.Municipio where IdEstado = '{$this->IdEstado}' and IdPais = {$this->IdPais}";
		$ISql = mssql_query($Sql);
		while($AMunicipios = mssql_fetch_object($ISql)){
			$AMpio[] = objectArray(new Municipio($this->IdPais,$this->IdEstado,$AMunicipios->IdMunicipio)); //creo un array con objetos Municipio
}
		return $AMpio;
	}
	
	*/
?>

