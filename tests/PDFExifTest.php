<?php
/**
 * Created by PhpStorm.
 * User: Van Duy
 * Date: 4/20/2018
 * Time: 8:22 AM
 */
include __DIR__ . '/../Vendor/Autoload.php';

use PHPUnit\Framework\TestCase;
use App\PDFExif;
use App\Exceptions\PathNotFoundException;
use App\Exceptions\FileCantOpenException;
use App\Exceptions\PathEmptyException;
class PDFExifTest extends TestCase
{
    public function testPathNotFound()
    {
        $this->expectException(PathNotFoundException::class);
        $path = '/pdf/ceo.png';
        $output = new PDFExif($path);
    }
    public function testPathEmpty()
    {
        $this->expectException(PathEmptyException::class);
        $path = '';
        $output = new PDFExif($path);
    }
    public function  testFileCantOpen()
    {
        $this->expectException(FileCantOpenException::class);
        $path='./pdf/Chapter6.pdf';
        $output = new PDFExif($path);
    }
    public function testGetAllInfo()
    {
        $path = './pdf/Chapter7.pdf';
        $p = new PDFExif($path);
        $output = $p->getAllInfoKeys();
        $title = $output['Title'];
        $this->assertEquals($title,'PDFlib pCOS Test Manual');
        $creationDate = $output['CreationDate'];
        $this->assertEquals($creationDate,'D:20071019124011Z');
        $subject = $output['Subject'];
        $this->assertEquals($subject,'pCOS: PDF Information Retrieval Tool');
        $author = $output['Author'];
        $this->assertEquals($author,'PDFlib GmbH');
        $creator = $output['Creator'];
        $this->assertEquals($creator,'FrameMaker 7.0');
        $producer = $output['Producer'];
        $this->assertEquals($producer,'Acrobat Distiller 7.0.5 (Windows)');
        $modDate = $output['ModDate'];
        $this->assertEquals($modDate,'D:20080701135333+02\'00\'');
    }
    public function testGetOneInfoKey()
    {
        $path = './pdf/Chapter7.pdf';
        $p = new PDFExif($path);
        $this->assertEquals($p->get('Title'),'PDFlib pCOS Test Manual');
        $this->assertEquals($p->get('CreationDate'),'D:20071019124011Z');
        $this->assertEquals($p->get('Subject'),'pCOS: PDF Information Retrieval Tool');
        $this->assertEquals($p->get('Author'),'PDFlib GmbH');
        $this->assertEquals($p->get('Creator'),'FrameMaker 7.0');
        $this->assertEquals($p->get('Producer'),'Acrobat Distiller 7.0.5 (Windows)');
        $this->assertEquals($p->get('ModDate'),'D:20080701135333+02\'00\'');

    }
}
