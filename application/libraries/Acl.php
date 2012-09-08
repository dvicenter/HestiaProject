<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class Acl
{
	var $permisos = array();		//Array : Stores the permissions for the user
	var $IdUsuario;			//Integer : Stores the ID of the current user
	var $rolesDeUsuario = array();	//Array : Stores the roles of the current user
	var $ci;
	function __construct($config=array()) {
		$this->ci = &get_instance();
		$this->IdUsuario = floatval($config['IdUsuario']);
		$this->rolesDeUsuario = $this->getRolesDeUsuario();
		$this->construirACL();
	}

	function construirACL() {
		
		//Primero, lista las reglas para los roles del usuario
		if (count($this->rolesDeUsuario) > 0)
		{
			$this->permisos = array_merge($this->permisos,$this->getPermisosDeRol($this->rolesDeUsuario));
		}
		//Luego los permisos individuales del usuario
		$this->permisos = array_merge($this->permisos,$this->getPermisosDeUsuario($this->IdUsuario));
	}
	function getPermisos(){
		return $this->permisos;
	}

	function getClavePermisoPorId($IdPermiso) {
		//$strSQL = "SELECT `clavePermiso` FROM `".DB_PREFIX."permissions` WHERE `ID` = " . floatval($IdPermiso) . " LIMIT 1";
		$this->ci->db->select('ClavePermiso');
		$this->ci->db->where('IdPermiso',floatval($IdPermiso));
		$sql = $this->ci->db->get('permiso',1);
		$data = $sql->result();
		return $data[0]->ClavePermiso;
	}

	function getNombrePermisoPorId($IdPermiso) {
		//$strSQL = "SELECT `nombrePermiso` FROM `".DB_PREFIX."permissions` WHERE `ID` = " . floatval($IdPermiso) . " LIMIT 1";
		$this->ci->db->select('NombrePermiso');
		$this->ci->db->where('IdPermiso',floatval($IdPermiso));
		$sql = $this->ci->db->get('permiso',1);
		$data = $sql->result();
		return $data[0]->NombrePermiso;
	}

	function getNombreRolPorId($IdRol) {
		//$strSQL = "SELECT `NombreRol` FROM `".DB_PREFIX."roles` WHERE `ID` = " . floatval($IdRol) . " LIMIT 1";
		$this->ci->db->select('NombreRol');
		$this->ci->db->where('IdRol',floatval($IdRol),1);
		$sql = $this->ci->db->get('rol');
		$data = $sql->result();
		return $data[0]->NombreRol;
	}

	function getRolesDeUsuario() {
		//$strSQL = "SELECT * FROM `".DB_PREFIX."user_roles` WHERE `IdUsuario` = " . floatval($this->IdUsuario) . " ORDER BY `addDate` ASC";

		$this->ci->db->where(array('IdUsuario'=>floatval($this->IdUsuario)));
		$this->ci->db->order_by('FechaCreacion','asc');
		$sql = $this->ci->db->get('usuario_rol');
		$data = $sql->result();

		$resp = array();
		foreach( $data as $row )
		{
			$resp[] = $row->roleID;
		}
		return $resp;
	}

	function getTodoLosRoles($format='ids') {
		$format = strtolower($format);
		//$strSQL = "SELECT * FROM `".DB_PREFIX."rol` ORDER BY `NombreRol` ASC";
		$this->ci->db->order_by('NombreRol','asc');
		$sql = $this->ci->db->get('rol');
		$data = $sql->result();

		$resp = array();
		foreach( $data as $row )
		{
			if ($format == 'full')
			{
				$resp[] = array("IdRol" => $row->ID,"NombreRol" => $row->NombreRol);
			} else {
				$resp[] = $row->ID;
			}
		}
		return $resp;
	}

	function getTodosLosPermisos($format='ids') {
		$format = strtolower($format);
		//$strSQL = "SELECT * FROM `".DB_PREFIX."permissions` ORDER BY `clavePermiso` ASC";

		$this->ci->db->order_by('ClavePermiso','asc');
		$sql = $this->ci->db->get('permiso');
		$data = $sql->result();

		$resp = array();
		foreach( $data as $row )
		{
			if ($format == 'full')
			{
				$resp[$row->clavePermiso] = array('IdPermiso' => $row->ID, 'NombrePermiso' => $row->nombrePermiso, 'ClavePermiso' => $row->clavePermiso);
			} else {
				$resp[] = $row->ID;
			}
		}
		return $resp;
	}

	function getPermisosDeRol($role) {
		if (is_array($role))
		{
			//$roleSQL = "SELECT * FROM `".DB_PREFIX."role_permisos` WHERE `roleID` IN (" . implode(",",$role) . ") ORDER BY `ID` ASC";
			$this->ci->db->where_in('IdRol',$role);
		} else {
			//$roleSQL = "SELECT * FROM `".DB_PREFIX."role_permisos` WHERE `roleID` = " . floatval($role) . " ORDER BY `ID` ASC";
			$this->ci->db->where(array('IdRol'=>floatval($role)));

		}
		$this->ci->db->order_by('id','asc');
		$sql = $this->ci->db->get('rol_permiso'); //$this->ci->db->select($roleSQL);
		$data = $sql->result();
		$permisos = array();
		foreach( $data as $row )
		{
			$pK = strtolower($this->getClavePermisoPorId($row->permID));
			if ($pK == '') { continue; }
			if ($row->value === '1') {
				$hP = true;
			} else {
				$hP = false;
			}
			$permisos[$pK] = array('ClavePermiso' => $pK,'inheritted' => true,'Valor' => $hP,'NombrePermiso' => $this->getNombrePermisoPorId($row->IdPermiso),'IdPermiso' => $row->IdPermiso);
		}
		return $permisos;
	}

	function getPermisosDeUsuario($IdUsuario) {
		//$strSQL = "SELECT * FROM `".DB_PREFIX."user_permisos` WHERE `IdUsuario` = " . floatval($IdUsuario) . " ORDER BY `addDate` ASC";

		$this->ci->db->where('IdUsuario',floatval($IdUsuario));
		$this->ci->db->order_by('FechaCreacion','asc');
		$sql = $this->ci->db->get('usuario_permiso');
		$data = $sql->result();

		$permisos = array();
		foreach( $data as $row )
		{
			$pK = strtolower($this->getClavePermisoPorId($row->IdPermiso));
			if ($pK == '') { continue; }
			if ($row->Valor == '1') {
				$hP = true;
			} else {
				$hP = false;
			}
			$permisos[$pK] = array('ClavePermiso' => $pK,'inheritted' => false,'Valor' => $hP,'NombrePermiso' => $this->getNombrePermisoPorId($row->IdPermiso),'id' => $row->IdPermiso);
		}
		return $permisos;
	}

	function tieneRol($IdRol) {
		foreach($this->rolesDeUsuario as $k => $v)
		{
			if (floatval($v) === floatval($IdRol))
			{
				return true;
			}
		}
		return false;
	}

	function tienePermiso($clavePermiso) {
		$clavePermiso = strtolower($clavePermiso);
		if (array_key_exists($clavePermiso,$this->permisos))
		{
			if ($this->permisos[$clavePermiso]['Valor'] === '1' || $this->permisos[$clavePermiso]['Valor'] === true)
			{
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
?>