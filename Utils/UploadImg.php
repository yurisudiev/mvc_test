<?php

/**
 * Class UploadImg. Upload & resize images
 */
class UploadImg
{
    /**
     * Checks for correct image type, resizes uploaded image if needed & moves to upload dir.
     * @param $img
     * @return bool|string
     */
    public static function upload($img)
    {
        $tmp_name = $_FILES[$img]['tmp_name'];
        $file_name = uniqid(rand(), true) . '.' . pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION);

        list($width, $height, $type) = getimagesize($tmp_name);

        if (!in_array($type, ALLOWED_IMG_TYPES)) return false;

        if ($width > MAX_IMG_WIDTH || $height > MAX_IMG_HEIGHT) {

            switch ($type) {
                case IMG_PNG:
                    $image_res = imagecreatefrompng($tmp_name);
                    break;
                case IMG_JPEG:
                    $image_res = imagecreatefromjpeg($tmp_name);
                    break;
                case IMG_JPG:
                    $image_res = imagecreatefromjpeg($tmp_name);
                    break;
                case IMG_GIF:
                    $image_res = imagecreatefromgif($tmp_name);
                    break;
            }

            if (!$image_res) return false;

            if ($height / MAX_IMG_HEIGHT > $width / MAX_IMG_WIDTH) {
                $image_res = imagescale($image_res, floor($width * MAX_IMG_HEIGHT / $height), MAX_IMG_HEIGHT);
            } else {
                $image_res = imagescale($image_res, MAX_IMG_WIDTH, -1);
            }

            $saved = false;

            switch ($type) {
                case IMG_PNG:
                    $saved = imagepng($image_res, $tmp_name);
                    break;
                case IMG_JPEG:
                    $saved = imagejpeg($image_res, $tmp_name);
                    break;
                case IMG_JPG:
                    $saved = imagejpeg($image_res, $tmp_name);
                    break;
                case IMG_GIF:
                    $saved = imagegif($image_res, $tmp_name);
                    break;
            }

            if (!$saved) return false;
        }

        if (move_uploaded_file($tmp_name, UPLOAD_DIR . $file_name)) {
            return $file_name;
        } else return false;
    }
}