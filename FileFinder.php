<?php
// Aryantdot

$__files = [];
function localSearch($file , $dir){
    global $__files;
    $total = 0;
    switch(is_dir($dir)):
        case true:
            foreach(glob($dir.'/*') as $tag):
                if(is_dir($tag)){
                    $e = localSearch($file , $tag);
                    $total += $e;
                }else{
                    if(strpos(basename($tag), $file) !== false){
                        $__files[] = $tag;
                    }
                }
            endforeach;
            return $total;
        case false:
        default:
            throw new Exception('Folder not found :: 404');
    endswitch;
}

echo localSearch('ase', '.');
print_r($__files);
