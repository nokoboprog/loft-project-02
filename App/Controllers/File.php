<?php

namespace App\Controllers;

use App\Models\File as FileModel;
use Base\Controller;
use Base\Session;
use Intervention\Image\ImageManagerStatic as Image;

class File extends Controller
{
    public function listAction()
    {
        $userId = Session::instance()->getUserId();
        if (!$userId) {
            header('Location: /auth');
            die();
        }

        $files = FileModel::all();
        $this->view->files = $files->toArray();
    }

    public function saveUserPhotoFile($file)
    {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $photo = Image::make($file['tmp_name']);
        $photo->resize(100, null, function ($image) {
            $image->aspectRatio();
        });
        $photoName = '/images/' . md5(microtime()) . '.' . $ext;
        if (!$photo->save('../public' . $photoName)) {
            return false;
        }

        return $photoName;
    }

    public function saveUserPhotoToDb($photoName, $userId)
    {
        $this->deleteUserPhoto($userId);

        $file = new FileModel();
        $file->name = $photoName;
        $file->user_id = $userId;

        if (!$file->save()) {
            return false;
        }

        return true;
    }

    public function deleteUserPhoto($userId)
    {
        $oldFile = FileModel::where('user_id', '=', $userId)->first();
        if ($oldFile) {
            $this->deleteFileDisk($oldFile->name);
            FileModel::destroy($oldFile->getKey('id'));
        }
    }

    public function deleteFileDisk($fileName)
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
