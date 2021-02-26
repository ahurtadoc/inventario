<?php


namespace Gestor\Controller;


class InventarioController extends Controller
{
    public function read()
    {
        $productos = $this->db->findAll('productos');
        return $this->toJson($productos);
    }
    
    public function create($params)
    {
        $datos = $this->fromJson($params);
        $datos['fechaCreacion'] = date('Y-m-d');
        $response = $this->db->insert('productos', $datos);
        return $this->toJson($response);
    }

    public function update($params)
    {
        $datos = $this->fromJson($params);
        $cambios = $datos['cambios'];
        $id = $datos['id'];
        $response = $this->db->update('productos', $cambios, $id);
        return $this->toJson($response);
    }

    public function delete($params)
    {
        $id = $this->fromJson($params);
        $response = $this->db->delete('productos', $id);
        return $this->toJson($response);
    }

    public function sell($params)
    {
        $id = $this->fromJson($params);
        $stock = $this->db->find('productos',$id,array("stock"));
        $stock = $stock[0]["stock"];
        if ($stock <= 0){
            return $this->toJson(array('No hay stock de este producto'));
        }else{
            $cambios = array("stock" => $stock-1, "UltimaVenta" => date('Y-m-d H:i:s'));
            if($this->db->update('productos',$cambios,$id)){
                return $this->toJson(array('producto vendido '));
            }
        }
    }

}