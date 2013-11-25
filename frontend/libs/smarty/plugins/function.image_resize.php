<?php
function smarty_function_image_resize($params, &$smarty) {
    // Original dimensions
    if (!list($oldWidth, $oldHeight, $imgType) = getimagesize($params['src'])) {
        echo 'getimagesize niet goed';
    }

    $filename = substr($params['src'], strrpos($params['src'], '/'));

    $finalSize = getNewSize($params);
    // Target dimensions
    $width = $finalSize[0];
    $height = $finalSize[1];

    // Don't resize if we don't need to
    if ( ($width >= $oldWidth) && ($height >= $oldHeight) && !$params['bw'] && !$params['radius'] ) return $params['src'];

    switch ($imgType)
    {
        case IMAGETYPE_GIF:
            $filename = str_replace('.gif', '', $filename);
            break;
        case IMAGETYPE_JPEG:
            $filename = str_replace('.jpg', '', $filename);
            break;
        case IMAGETYPE_PNG:
            $filename = str_replace('.png', '', $filename);
            break;
        default:
            return false;
    }

    if (!$finalSize[2])
    {
        // Resize it - no cropping needed
    }
    else
    {
        // Resize and crop
        $oldRatio = $oldWidth / $oldHeight;
        $newRatio = $width / $height;
        $widthMargin = 0;
        $heightMargin = 0;

        if ($oldRatio > $newRatio)
        {
            // Crop the width
            $adjustedWidth = floor( $oldWidth * ($height / $oldHeight) );
            $adjustedHeight = $height;
            $widthMargin = ($adjustedWidth - $width) / 2;
        }
        elseif ($oldRatio < $newRatio)
        {
            // Crop the height
            $adjustedHeight = floor( $oldHeight * ($width / $oldWidth) );
            $adjustedWidth = floor( $oldWidth * ($height / $oldHeight) );
            $heightMargin = ($adjustedHeight - $height) / 2;
            $widthMargin = ($adjustedWidth - $width) / 2;
        } elseif ($oldRatio == $newRatio)
        {
            // Crop the height
            $adjustedHeight = floor( $oldHeight * ($width / $oldWidth) );
            $adjustedWidth = $width;
            $heightMargin = ($adjustedHeight - $height) / 2;
        }
    }

    if (!is_dir(root . 'cached_images/' . $params['profile'] . '/')) {
        mkdir(root . 'cached_images/' . $params['profile'] . '/');
    }

    $completeFilename = url . 'cached_images/' . $params['profile'] . $filename . '_' . $width . '_' . $height . '_cache.jpg';
    $completeFile = root . 'cached_images/' . $params['profile'] . $filename . '_' . $width . '_' . $height . '_cache.jpg';
    if (!file_exists($completeFile)) {
        // Read the image into memory
        switch ($imgType)
        {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($params['src']);
                $filename = str_replace('.gif', '', $filename);
                break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($params['src']);
                $filename = str_replace('.jpg', '', $filename);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($params['src']);
                $filename = str_replace('.png', '', $filename);
                break;
            default:
                return false;
        }

        // Create a new blank image to hold the resized image
        $newImage = imagecreatetruecolor($width, $height);

        if (!$finalSize[2]) {
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight);
        } else {
            imagecopyresampled($newImage, $image, -$widthMargin, -$heightMargin, 0, 0, $adjustedWidth, $adjustedHeight, $oldWidth, $oldHeight);
        }
        imagejpeg($newImage, root . 'cached_images/' . $params['profile'] . $filename . '_' . $width . '_' . $height . '_cache.jpg');
    }
    return '<img src="' . $completeFilename . '" height="' . $height . '" width="' . $width . '" />';
}

function getNewSize($params)
{
    // Get the size and ratio of the original image
    list($oldWidth, $oldHeight) = getimagesize($params['src']);

    // Store the target dimensions for convenience
    $width = $params['width'];
    $height = $params['height'];
    $crop = (!isset($params['crop'])) ? false : true;

    // Figure out what to do based on the new and old sizes
    if (($oldWidth <= $width) && ($oldHeight <= $height) || (!$width && !$height))
    {
        // The image is already smaller than the requested sizes
        $newWidth = $oldWidth;
        $newHeight = $oldHeight;
    }
    elseif ($width && !$height)
    {
        // Resize based on the width
        if ($width > $oldWidth) $width = $oldWidth;
        $newWidth = $width;
        $newHeight = floor( $oldHeight * ($width / $oldWidth) );
    }
    elseif ($height && !$width)
    {
        // Resize based on the height
        if ($height > $oldHeight) $height = $oldHeight;
        $newHeight = $height;
        $newWidth = floor( $oldWidth * ($height / $oldHeight) );
    }
    else
    {
        // If they specified both, we need to decide whether to crop it
        if ($crop)
        {
            // Crop it to the exact dimensions
            $newWidth = ($width > $oldWidth) ? $oldWidth : $width;
            $newHeight = ($height > $oldHeight) ? $oldHeight : $height;
            $crop = true;
        }
        else
        {
            // Resize to fit within the box

            // First based on the width
            if ($width > $oldWidth) $width = $oldWidth;
            $newWidth = $width;
            $newHeight = floor( $oldHeight * ($width / $oldWidth) );

            // Then based on height
            if ($newHeight > $height)
            {
                $newWidth = floor( $newWidth * ($height / $newHeight) );
                $newHeight = $height;
            }
        }
    }

    return array($newWidth, $newHeight, $crop);
}

// Figure out various urls and paths that we will need later on
function getImagePath($fileUrl, $smarty)
{
    // Store the image url
    $paths['fileUrl'] = $fileUrl;

    // The name of the file: image.jpg
    $paths['fileName'] = basename($fileUrl);

    // The paths to the document we are working with
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $paths['docPath'] = removeFileFromPath(removeDoubleSlashes(str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['SCRIPT_FILENAME']) . '/' . $_SERVER['REQUEST_URI']));

    // The relative path to the document
    $docUri = dirname($_SERVER['SCRIPT_NAME']);
    $docUri = removeDoubleSlashes('/' . $docUri . '/');
    // If we've got an absolute image url...make it relative!
    $fileUri = str_replace('http://'.$_SERVER['HTTP_HOST'], '', $fileUrl);
    $fileUri = str_replace('https://'.$_SERVER['HTTP_HOST'], '', $fileUri);
    if (substr($fileUri, 0, 1) == DIRECTORY_SEPARATOR)
    {
        $docSegments = explode(DIRECTORY_SEPARATOR, $docUri);
        $fileSegments = explode(DIRECTORY_SEPARATOR, $fileUri);

        // Cycle through the url segments, working back from the current url to the image url
        while ( count($docSegments) || count($fileSegments) )
        {
            $docSegment = array_shift($docSegments);
            $fileSegment = array_shift($fileSegments);

            if ( ($docSegment != $fileSegment) || $up) {
                $up = ($docSegment) ? '../' : '';
                $relativeUri = $up . $relativeUri . $fileSegment . '/';
            }
        }

        $fileUrl = rtrim($relativeUri,'/');
    }

    // Get the actual path to the file on the server
    $filePath = '/' . get_absolute_path(removeDoubleSlashes($paths['docPath'] . '/' . $fileUrl));

    // Make sure there is actually an image at that path
    if (!is_readable($filePath))
    {
        echo "<!-- Imagesizer Error: Could not find the file {$filePath} -->";
        return false;
    }

    // Calculate all the other paths we will need
    $pathInfo = pathinfo($filePath);
    $paths['filePath'] = $pathInfo['dirname'];
    $paths['fileExt'] = $pathInfo['extension'];
    $paths['fileBasename'] = $pathInfo['filename'] ? $pathInfo['filename'] : substr($paths['fileName'],0,strrpos($paths['fileName'],'.'));
    $paths['fileSrc'] = removeDoubleSlashes($paths['filePath'] . '/' . $paths['fileName']);

    return $paths;
}


// Just like it says on the box
function removeDoubleSlashes($str)
{
    return str_replace(array('//', '\\', '\\\\'), '/', $str);
}


// Removes any .php file from the end of a path
function removeFileFromPath($path)
{
    $segments = explode(DIRECTORY_SEPARATOR, $path);
    $lastSegment = end($segments);

    if (strpos($lastSegment, '.php'))
    {
        array_pop($segments);
    }

    return implode('/', $segments);
}


// Resolves /../ in paths. From the PHP docs.
function get_absolute_path($path) {
    $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
    $absolutes = array();
    foreach ($parts as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) {
            array_pop($absolutes);
        } else {
            $absolutes[] = $part;
        }
    }
    return implode('/', $absolutes);
}


// Finds a url based on a relative path. From the PHP docs.
function mapURL($relPath)
{
    $filePathName = realpath($relPath);
    $filePath = realpath(dirname($relPath));
    $basePath = realpath($_SERVER['DOCUMENT_ROOT']);

    // can not create URL for directory lower than DOCUMENT_ROOT
    if (strlen($basePath) > strlen($filePath)) {
        return '';
    }

    return 'http://' . $_SERVER['HTTP_HOST'] . substr($filePathName, strlen($basePath));
}



?>