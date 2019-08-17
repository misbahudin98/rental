<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */

    public $imageFile;
    

    public function rules()
    {
        return [
            [['logo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {    
            
            $men = $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            var_dump($men) or die;
            return true;
        } else {
            return false;
        }
    }
}?>