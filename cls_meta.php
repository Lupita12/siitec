<?
require_once("cls_accion.php"); 
require_once("cls_capitulo.php"); 
require_once("conexion.php"); 
require_once("cls_departamento.php");

	class Meta
	{
		private $clave = '';
		private $nombre = '';
		private $descripcion_numero = '';
		private $unidad_de_medida = '';
		private $cantidad = '';				
		private $vigencia = '000000';
		private $monto = 0;
		private $periodo = '';		
		private $ingreso_propio_ene_jun = 0;
		private $ingreso_propio_jul_dic = 0;		
		private $gasto_directo_ene_jun = 0;
		private $gasto_directo_jul_dic = 0;		
		private $clave_encargado = 0;
		private $id_meta=0;
		private $descripcion='';
		
		//cuando llega el departamento
		private $id_depa=0;
		private $id_encargado=0;				
		
		private $lst_accion = array();
		private $lst_departamento = array();
		private $lst_capitulo = array();					
		
		function __construct($clav_met='', $perio='', $depa=0)
		{
			if ($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;
			}
			if($clav_met != '')
			{		
				$cadena_sql = mysql_query("select * FROM meta where clave='".$clav_met."' and periodo='".$perio."'"); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					$this->clave=$clav_met;
					$this->nombre=$resu[1];
					$this->descripcion_numero=$resu[2];
					$this->unidad_de_medida=$resu[3];
					$this->cantidad=$resu[4];
					$this->vigencia=$resu[5];
					$this->periodo=$resu[7];
					$this->ingreso_propio_ene_jun=$resu[8];
					$this->ingreso_propio_jul_dic=$resu[9];
					$this->gasto_directo_ene_jun=$resu[10];
					$this->gasto_directo_jul_dic=$resu[11];					
					$this->id_encargado=$resu[12];					
					$this->clave_encargado=$resu[12];
					$this->id_meta=$resu[13];
					$this->descripcion=$resu[14];
					

						//consulta para obtener las acciones q tiene una meta
						$cad="select clave from accion where id_meta=".$this->id_meta." and periodo='".$perio."'";
						$res = mysql_query($cad);
						while($accion = mysql_fetch_array($res)){
							$this->lst_accion[] = new Accion($accion[0]);
						}

					//entra si es llamado el objeto comunmente sin el departamento			
					if($depa==0)
					{	
						//consulta para obtener el monto
						$cho=mysql_query("select sum(ingreso_propio) FROM partida_departamento where id_meta=".$this->id_meta);
						$resu = mysql_fetch_row($cho);
						//si el resultado de la consulta es nulo asigna cero a monto
						if($resu[0]!=NULL)
						{
							$this->monto=$resu[0];
						}else{
							$this->monto=0;
						}
					
						//consulta para obtener departamentos q tienen a asignadas la meta
						$kad=mysql_query("select d.clave from meta_departamento m join departamento d on m.id_departamento=d.id_departamento where m.id_meta=".$this->id_meta." and m.periodo='".$perio."'");
						while($depa = mysql_fetch_array($kad)){
							$this->lst_departamento[] = new Departamento($depa[0]);
						}		
						//consulta para obtener capitulos q tiene una meta DUDA CONEL PERIODO POR LA BASE DE DATOS Q NO TIENE EL CAMPO
						$qad=mysql_query("select clave from capitulo where clave in(select cast(concat(LPAD(pa.clave,1,0),'000') as BINARY) as cosa from partida_departamento p join partida pa on p.id_partida=pa.id_partida where p.id_meta=".$this->id_meta." and p.periodo='".$perio."')");

						while($capi = mysql_fetch_array($qad)){
							$this->lst_capitulo[] = new Capitulo($capi[0]);
						}
	
					}else
					{
						//jalar el id del departamento y periodo no se puso aver q pedo
						$id_d = mysql_query("select id_departamento from departamento where clave=".$depa);
						$id_depart = mysql_fetch_array($id_d);
						$this->id_depa=$id_depart[0];
						
						//consulta para obtener el monto
						$ji="select monto from meta_departamento where id_departamento=".$this->id_depa." and periodo='".$perio."' and id_meta=".$this->id_meta;
						// echo $ji."<br>";
						$ch=mysql_query($ji);
						$re = mysql_fetch_row($ch);
						$varia=$re[0];
						if($varia!=NULL)
						{
							$this->monto=$varia;
						}else{
							$this->monto=0;
						}						
						//consulta para obtener capitulos q tiene una meta
						$qad=mysql_query("select clave from capitulo where clave in(select cast(concat(LPAD(pa.clave,1,0),'000') as BINARY) as cosa from partida_departamento p join partida pa on p.id_partida=pa.id_partida where p.id_meta=".$this->id_meta." and p.id_departamento=".$this->id_depa." and p.periodo='".$perio."')");					
						while($capi = mysql_fetch_array($qad)){
						// echo "<br>".$capi[0]." perio:".$perio." depar: ".$depa." meta: ".$clav_met."<br>";
							$this->lst_capitulo[] = new Capitulo($capi[0],$perio,$depa,$clav_met);
						}													
					}											
				}	
			}
		}
		function __destruct(){
		
		}				

		public function agregar()
		{
		
			$cadena_sql = mysql_query("insert into meta  (clave,nombre,descripcion_numero,unidad_de_medida,cantidad,vigencia,monto,periodo,ingreso_propio_ene_jun,ingreso_propio_jul_dic,gasto_directo_ene_jun,gasto_directo_jul_dic,id_encargado,descripcion) values ('" .$this->clave. "','".$this->nombre."','" .$this->descripcion_numero. "','".$this->unidad_de_medida."','".$this->cantidad."','".$this->vigencia. "'," .$this->monto. ",'".$this->periodo."',".$this->ingreso_propio_ene_jun."," .$this->ingreso_propio_jul_dic."," .$this->gasto_directo_ene_jun."," .$this->gasto_directo_jul_dic.",".$this->id_encargado.", '".$this->descripcion."')"); 

			mysql_query($cadena_sql);
		
		}
		
	public function modificar()
	{
		$CadenaSQL = " update meta set clave = '".$this->clave."', nombre = '".$this->nombre."', descripcion_numero = '" .$this->descripcion_numero. "',unidad_de_medida = '".$this->unidad_de_medida."', cantidad='".$this->cantidad. "', vigencia='".$this->vigencia. "', monto=".$this->monto.", periodo='".$this->periodo."', ingreso_propio_ene_jun=".$this->ingreso_propio_ene_jun. ", ingreso_propio_jul_dic=".$this->ingreso_propio_jul_dic.", gasto_directo_ene_jun=".$this->gasto_directo_ene_jun. ", gasto_directo_jul_dic=" .$this->gasto_directo_jul_dic.", id_encargado=".$this->id_encargado. ", descripcion='".$this->descripcion."' where id_meta=".$this->id_meta;
		$resultado = mysql_query($CadenaSQL);
		
	}	
	
	public function modificamonto(){
		$que = "UPDATE meta SET monto = ".$this->monto." WHERE id_meta = ".$this->id_meta;
		mysql_query($que);
		
	}
		
	public function eliminar()
	{
		$cadenaSQL = "delete from meta where id_meta = ".$this->id_meta;
				
		$resultado = mysql_query($cadenaSQL);
	}		
		
	
		//get y set para listados
		public function getlst_accion(){
			return $this->lst_accion;
		}		
		
		public function setlst_accion($newval){
			 $this->lst_accion = $newval;
		}
	
		public function getlst_departamento(){
			return $this->lst_departamento;
		}		
		
		public function setlst_departamento($newval){
			 $this->lst_departamento = $newval;
		}
		
		public function getlst_capitulo(){
			return $this->lst_capitulo;
		}		
		
		public function setlst_capitulo($newval){
			 $this->lst_capitulo = $newval;
		}			
		
		
		
		//get y set para variables
		public function getclave(){
			return $this->clave;
		}		
		public function setclave($newval){
			 $this->clave = $newval;
		}
		public function getclave_encargado(){
			return $this->clave_encargado;
		}
		public function setclave_encargado($newval){
			 $this->clave_encargado = $newval;
		}		
		
		public function getnombre(){
			return $this->nombre;
		}
		public function setnombre($newval){
			return $this->nombre = $newval;
		}
		
		public function getdescripcion_numero(){
			return $this->descripcion_numero;
		}
		public function setdescripcion_numero($newval){
			return $this->descripcion_numero = $newval;
		}		
		public function getunidad_de_medida(){
			return $this->unidad_de_medida;
		}
		public function setunidad_de_medida($newval){
			return $this->unidad_de_medida = $newval;
		}
		
		public function getcantidad(){
			return $this->cantidad;
		}
		public function setcantidad($newval){
			return $this->cantidad = $newval;
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
		public function getid_meta(){
			return $this->id_meta;
		}
		public function setid_meta($newval){
			return $this->id_meta = $newval;
		}
		public function getid_encargado(){
			return $this->id_encargado;
		}
		public function setid_encargado($newval){
			return $this->id_encargado = $newval;
		}				
		public function getdescripcion(){
			return $this->descripcion;
		}
		public function setdescripcion($newval){
			return $this->descripcion = $newval;
		}			
		
	}


?>