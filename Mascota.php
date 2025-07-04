<?php
namespace App\Controllers;

use App\Models\MascotaModel;

class Mascota extends BaseController
{
public function index()
{
 
    $model = new MascotaModel();
    $data['mascota'] = $model->findAll();
    return view("veterinario/index", $data);

}
public function guardar()
    {
         $model = new MascotaModel();
         $model->insert($this->request->getPost());
         return redirect()->to('/veterinario');
    }

public function editar($id)
    {
        $model = new MascotaModel();
        $data['mascota'] = $model->find($id);
        return view('veterinario', $data);

        
    }

    
 public function eliminar($id)
    {
        $model = new MascotaModel();
        $model->delete($id);
        return redirect()->to('/veterinario');
    }
 public function actualizar($id)
    {
        $model = new MascotaModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/veterinario');
    }






}




?>