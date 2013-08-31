<?
require_once("cls_marca.php");
require_once("cls_clasificacion.php");
require_once("cls_unidadmedida.php");
require_once("conexion.php"); 

class Articulo 
{
	private $clave;
	private $nivel;
	private $partida;
	private $descripcion;
	private $clave_tipo_articulo;
	
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
	
	public function getpartida(){
		return $this->partida;
	}
	
	public function setpartida($newval){
		$this->partida=$newval;
	}
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	
	public function setdescripcion($newval){
		$this->descripcion=$newval;
	}
	
	public function getclave_tipo_articulo(){
		return $this->clave_tipo_articulo;
	}
	
	public function setclave_tipo_articulo($newval){
		$this->clave_tipo_articulo=$newval;
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
				$this->setclave($clave_articulo);				
				$this->setnivel($row[1]);
				$this->setpartida($row[2]);
				$this->setdescripcion($row[3]);
				$this->setclave_tipo_articulo($row[4]);

				//consulta para obtener las marcas  q tiene articulo
				$cad="select clave_marca from articulo_marca where clave_articulo='".$clave_articulo."'";
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
				}
			}
		}
	}

//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------
	public function mostrarArticulo()
	{
		echo $this->clave;
			echo "<br>";
		echo $this->nivel;	
			echo "<br>";
		echo $this->partida;
			echo "null<br>";
		echo $this->descripcion;
			echo "null<br>";	
		echo $this->clave_tipo_articulo;
			echo "<br>";	

	}

//-------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarArticulo()
	{

		$Sql="INSERT INTO articulo (clave,nivel,partida,descripcion,clave_tipo_articulo)  VALUES ('".clave."',".nivel.", ".partida.", '".descripcion."', '".clave_tipo_articulo."')";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarArticulo()
	{
  
		$Sql="UPDATE articulo SET clave='".clave."', nivel=".nivel.", partida=".partida.", descripcion='".descripcion."', clave_tipo_articulo='".clave_tipo_articulo."' WHERE clave='".clave."'"; 
  	 	
		mysql_query($Sql);
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarArticulo()
	{

   		$Sql="DELETE FROM articulo WHERE clave ='".clave."'";   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>