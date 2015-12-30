<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-12-16
 * Time: 15:05
 */
namespace AppBundle\Services;


use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\DirectoryNamerInterface;

class Namer implements DirectoryNamerInterface
{



    /**
     * Creates a name for the file being uploaded.
     *
     * @param object $obj The object the upload is attached to.
     * @param string $field The name of the uploadable field to generate a name for.
     * @return string The file name.
     */
    public function directoryName($object, PropertyMapping $mapping)
    {

        return $object->oferta;
    }


}