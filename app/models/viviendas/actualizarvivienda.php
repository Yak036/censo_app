<?php

/**
 * Este objeto agrega, solicita y elimina las viviendas
 * @param $conexion Conexion con la db
 * @param $floorNum El piso y numero de departamento
 */
class Vivienda
{
  private $id;
  private $error;
  public function aggVivienda($conexion, string $floorNum)
  {
    try {
      $insert = $conexion->prepare("INSERT INTO viviendas(numero) VALUES(:floorNum)");
      $insert->bindParam(":floorNum", $floorNum, PDO::PARAM_STR);
      $insert->execute();
    } catch (PDOException $e) {
      $this->error = "Error al subir datos " . $e->getMessage();
    }
  }
  public function getViviendas($conexion, INT $idVivienda = -1)
  {
    try {
      $select = $conexion->prepare("
      SELECT v.id AS viviendaId,v.numero, p.id AS personaId,p.nombre AS personaNombre, p.apellido AS personaApellido, p.genero, p.cedula, p.telefono, p.fecha_nacimiento, p.grado_instruccion, p.parentesco, p.es_jefe, ayu.nombre AS ayudaNombre, cen.nombre AS centroNombre, prof.nombre AS profeNombre,prof.prof_sector, medi.nombre AS medicamentoNombre, enfer.nombre AS enfermedadNombre, masc.nombre AS mascotaNombre, masc.genero AS mascotaGenero, joseGregorio, hogares, parto_humanizado, amor_mayor, inn, patria_cod, psuv_cod, patria_ser, psuv_ser   FROM viviendas v
      LEFT JOIN personas p ON v.id = p.viviendas_id
      LEFT JOIN personas_has_ayudas_tecnicas perAt ON p.id = perAt.personas_id
      LEFT JOIN ayudas_tecnicas ayu ON perAt.ayudas_tecnicas_id = ayu.id
      LEFT JOIN personas_has_centros_de_votaciones perVo ON p.id = perVo.personas_id
      LEFT JOIN centros_de_votaciones cen ON perVo.centros_de_votaciones_id = cen.id
      LEFT JOIN personas_has_profesiones perPro ON p.id = perPro.personas_id
      LEFT JOIN profesiones prof ON perPro.profesiones_id = prof.id
      LEFT JOIN medicamentos_has_personas perMedi ON p.id = perMedi.personas_id
      LEFT JOIN medicamentos medi ON perMedi.medicamentos_id = medi.id
      LEFT JOIN enfermedades_has_personas perEnfer ON p.id = perEnfer.personas_id
      LEFT JOIN enfermedades enfer ON perEnfer.enfermedades_id = enfer.id
      LEFT JOIN mascotas masc ON v.id = masc.viviendas_id
      LEFT JOIN beneficios bene ON p.id = bene.personas_id
      LEFT JOIN carnets car ON p.id = car.personas_id ".$idVivienda = ($idVivienda != -1) ? " WHERE v.id = $idVivienda" : " WHERE p.es_jefe = 1 or p.id IS NULL");
      $select->execute();
      return $select->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $this->error = "Error al subir datos " . $e->getMessage();
    }
  }
  public function deleteViviendas($conexion, int $idVivienda)
  {
    try {
      $delete = $conexion->prepare("DELETE v, p, perAt, perVo, perPro, perMedi, perEnfer, masc
      FROM viviendas v
      LEFT JOIN personas p ON v.id = p.viviendas_id
      LEFT JOIN personas_has_ayudas_tecnicas perAt ON p.id = perAt.personas_id
      LEFT JOIN personas_has_centros_de_votaciones perVo ON p.id = perVo.personas_id
      LEFT JOIN personas_has_profesiones perPro ON p.id = perPro.personas_id
      LEFT JOIN medicamentos_has_personas perMedi ON p.id = perMedi.personas_id
      LEFT JOIN enfermedades_has_personas perEnfer ON p.id = perEnfer.personas_id
      LEFT JOIN mascotas masc ON v.id = masc.viviendas_id
      WHERE v.id = {$idVivienda};");
      $delete->execute();
    } catch (PDOException $e) {
      $this->error = "Error al subir datos " . $e->getMessage();
    }
  }

}


// SELECT v.id AS viviendaId, p.id AS personaId,p.nombre AS personasNombre, p.apellido AS personaApellido, p.genero, p.cedula, p.telefono, p.fecha_nacimiento, p.grado_instruccion, p.parentesco, p.es_jefe, ayu.nombre AS ayudaNombre, cen.nombre AS centroNombre, prof.nombre AS profeNombre,prof.prof_sector, medi.nombre AS medicamentoNombre, enfer.nombre AS enfermedadNombre, masc.nombre AS mascotaNombre, masc.genero AS mascotaGenero, joseGregorio, hogares, parto_humanizado, amor_mayor, inn, patria_cod, psuv_cod, patria_ser, psuv_ser
// FROM viviendas v
// LEFT JOIN personas p ON v.id = p.viviendas_id
// LEFT JOIN personas_has_ayudas_tecnicas perAt ON p.id = perAt.personas_id
// LEFT JOIN ayudas_tecnicas ayu ON perAt.ayudas_tecnicas_id = ayu.id
// LEFT JOIN personas_has_centros_de_votaciones perVo ON p.id = perVo.personas_id
// LEFT JOIN centros_de_votaciones cen ON perVo.centros_de_votaciones_id = cen.id
// LEFT JOIN personas_has_profesiones perPro ON p.id = perPro.personas_id
// LEFT JOIN profesiones prof ON perPro.profesiones_id = prof.id
// LEFT JOIN medicamentos_has_personas perMedi ON p.id = perMedi.personas_id
// LEFT JOIN medicamentos medi ON perMedi.medicamentos_id = medi.id
// LEFT JOIN enfermedades_has_personas perEnfer ON p.id = perEnfer.personas_id
// LEFT JOIN enfermedades enfer ON perEnfer.enfermedades_id = enfer.id
// LEFT JOIN mascotas masc ON v.id = masc.viviendas_id
// LEFT JOIN beneficios bene ON p.id = bene.personas_id
// LEFT JOIN carnets car ON p.id = car.personas_id
// WHERE v.id =6 AND p.es_jefe = 1
