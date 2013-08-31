<?
include("src/TableGear1.5.2.php");
error_reporting(E_ERROR);
$table = new TableGear(array(
	"database"=> array("username" => "root",
	"password" => "root",
	"database" => "planeacion",
	"table" => "encargado",
	"key" => "id",
	//"columns" => array("nombre,apellido"),
	//"noAutoQuery" => "true"
	//"columns" => ("nombre" => "highlite")
        ),
	
        //"editable" => array("nombre"),
		"editable" => "all",
        "sortable" => "all",
		//"selects"  => array(
		//"nombre" => "increment[min=1,range=5]"),		
		/*"allowDelete" => true,
		"deleteRowLabel" => array(
		"tag" => "img",
		"attrib" => array(
			"src" => "images/delete.gif",
			"alt" => "Delete Row"
		)
	)*/
)
); 
?>