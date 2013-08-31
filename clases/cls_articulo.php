<?
require_once("../clases/cls_marca.php");
require_once("../clases/cls_clasificacion.php");
require_once("../clases/cls_unidadmedida.php");
require_once("../conexion.php"); 

class Articulo 
{
	private $clave='';
	private $nivel=0;
	private $id_partida=0;
	private $codigo=0;
	private $descripcion='';
	private $id_tipoarticulo=0;
	private $id_articulo=0;
	
	private $lst_marca = array();
	private $lst_clasificacion = array();
	private $lst_unidadmedida = array();
	
	
	
	public function getclave(){
		return $this->clave;
	}
	
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	public function getnivel(){
		return $this->nivel;
	}
	
	public function setnivel($newval){
		$this->nivel=$newval;
	}
	
	public function getid_partida(){
		return $this->id_partida;
	}
	
	public function setid_partida($newval){
		$this->id_partida=$newval;
	}
	
		public function getcodigo(){
		return $this->codigo;
	}
	
	public function setcodigo($newval){
		$this->codigo=$newval;
	}
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	
	public function setdescripcion($newval){
		$this->descripcion=$newval;
	}
	
	public function getid_tipoarticulo(){
		return $this->id_tipoarticulo;
	}
	
	public function setid_tipoarticulo($newval){
		$this->id_tipoarticulo=$newval;
	}

	public function getlst_marca(){
		return $this->lst_marca;
	}
	
	public function setlst_marca($newval){
		$this->lst_marca=$newval;
	}
	
	public function getlst_clasificacion(){
		return $this->lst_clasificacion;
	}
	
	public function setlst_clasificacion($newval){
		$this->lst_clasificacion=$newval;
	}

	public function getlst_unidadmedida(){
		return $this->lst_unidadmedida;
	}
	
	public function setlst_unidadmedida($newval){
		$this->lst_unidadmedida=$newval;
	}
//-------------------------------------------------------------------------------
	function __construct($clave_articulo = 0)
	{
		if($clave_articulo != 0)
		{
			$Sql = "SElECT * FROM articulo WHERE clave = $clave_articulo";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave=$clave_articulo;				
				$this->nivel=$row[1];
				$this->id_partida=$row[2];
				$this->codigo=$row[3];
				$this->descripcion=$row[4];
				$this->id_tipoarticulo=$row[5];
				$this->id_articulo=$row[6];

				//consulta para obtener las marcas  q tiene articulo
				/*$cad="select clave_marca from articulo_marca where clave_articulo='".$clave_articulo."'";
				$res = mysql_query($cad);
				$i = 0;
				while($marca = mysql_fetch_array($res))
				{
					$this->lst_marca[$i] = new Marca($marca[0]);
					$i++;
				}							
				
				//consulta para obtener las clasificaciones  q tiene articulo
				$cad="select clave_clasificacion from articulo_clasificacion where clave_articulo='".$clave_articulo."'";
				$res = mysql_query($cad);
				$i = 0;
				while($clasificacion = mysql_fetch_array($res))
				{
					$this->lst_clasificacion[$i] = new Clasificacion($clasificacion[0]);
					$i++;
				}
				
				//consulta para obtener las unidades de medida  q tiene articulo
				$cad="select clave_unidadmedida from articulo_unidadmedida where clave_articulo='".$clave_articulo."'";
				$res = mysql_query($cad);
				$i = 0;
				while($unidadmedida = mysql_fetch_array($res))
				{
					$this->lst_unidadmedida[$i] = new UnidadMedida($unidadmedida[0]);
					$i++;
				}*/
			}
		}
	}

//-------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarArticulo()
	{

		$Sql="INSERT INTO articulo (clave,nivel,id_partida,codigo,descripcion,id_tipoarticulo)  VALUES ('".$this->clave."',".$this->nivel.", ".$this->id_partida.", ".$this->codigo.", '".$this->descripcion."', '".$this->id_tipoarticulo."')";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarArticulo()
	{
  
		$Sql="UPDATE articulo SET clave='".$this->clave."', nivel=".$this->nivel.", id_partida=".$this->id_partida.", codigo=".$this->codigo.", descripcion='".$this->descripcion."', id_tipoarticulo='".$this->id_tipoarticulo."' WHERE id_articulo='".$this->id_articulo."'"; 
  	 	
		mysql_query($Sql);
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarArticulo()
	{

   		$Sql="DELETE FROM articulo WHERE clave ='".$this->clave."'";   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>