<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    /**
     * Méthode à gérer un fichier.
     * @param $reform
     * @param Request $request
     * @return void
     * @Route("/file/{reform}", name="develop_file")
     */
    public function DevelopFile($reform,Request$request ){

        $file = $request->query->get('file');
        $fileContent = file_get_contents($file);
        $fileContent = mb_convert_case($fileContent, MB_CASE_UPPER, "UTF-8");
        if ($reform === 'lower') {
            $newFile = mb_convert_case($fileContent, MB_CASE_LOWER, "UTF-8");
        }

        $newFile = 'New' . $file;
        file_put_contents($newFile, $fileContent);


        return $this->md(['file' => $newFile]);

    }
}