<?php
class Helper{

    public static function uploadDocuments($files, $path)
    {
        $imageName = substr(time(),-5). $files->getClientOriginalName();
        $files->move($path, $imageName);
        return $imageName;
    }

}
