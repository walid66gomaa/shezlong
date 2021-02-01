
<?php


    if (!function_exists('therapistImagePath')) {
    /**
     * Access the gravatar helper.
     */
      function therapist_image_path($imgName)
    {
     
        $imgpath = 'images/therapist_profile/' . $imgName;

        return $imgpath;
    }

}

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}
