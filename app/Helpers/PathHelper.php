<?php

/**
 * Created by PhpStorm.
 * User: mfouad
 * Date: 25/02/19
 * Time: 11:58
 */
function getSliderImage($pic)
{
    if (File::exists('uploads/slider/' . $pic)) {
        return url('uploads/slider/' . $pic);
    }
    return url('images/shadow-img.png');
}

function getProjectImage($pic)
{
    if (File::exists('uploads/project/' . $pic)) {
        return url('uploads/project/' . $pic);
    }
    return url('images/clogo1.png');
}