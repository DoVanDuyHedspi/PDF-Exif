<?php
/**
 * Created by PhpStorm.
 * User: Van Duy
 * Date: 4/17/2018
 * Time: 11:25 AM
 */
namespace App;

include __DIR__ . '/../vendor/autoload.php';

use App\Exceptions\FileCantOpenException;
use App\Exceptions\PathEmptyException;
use App\Exceptions\PathNotFoundException;

class PDFExif
{
    private $output = array();
    private $p;
    private $indoc;
    public function __construct($filePDF)
    {
        $this->p = new \PDFlib();
        if($filePDF == ''){
            throw new PathEmptyException('Filename is empty');
        }else {
            try{
                $this->indoc = $this->p->open_pdi_document(realpath($filePDF),"");
            }catch (\Exception $e){
                throw new PathNotFoundException('Can\'t found file pdf');
            }
            if ($this->indoc != 0) {
                $this->setInfoKeys();
            }
        }
    }
    protected function setInfoKeys()
    {
        try{
            $count = $this->p->pcos_get_number($this->indoc,"length:/Info");
            for($i=0;$i<$count;$i++){
                $info = "type:/Info[".$i."]";
                $objtype = $this->p->pcos_get_string($this->indoc,$info);
                $info = "/Info[".$i."].key";
                $key = $this->p->pcos_get_string($this->indoc,$info);
                if($objtype == "string" || $objtype == "name"){
                    $info = "/Info[".$i."]";
                    $this->output[$key] = $this->p->pcos_get_string($this->indoc,$info);
                }else {
                    $info = "type:/Info[".$i."]";
                    $this->output[$key] = $this->p->pcos_get_string($this->indoc,$info);
                }
            }
        }catch (\Exception $e){
            throw new FileCantOpenException('File can\' open');
        }

    }
    public function getAllInfoKeys()
    {
        return $this->output;
    }
    public function get($key)
    {
        if(array_key_exists($key,$this->output)){
            return $this->output[$key];
        }else {
            return null;
        }
    }
}

