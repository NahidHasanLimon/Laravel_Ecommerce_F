<?php
namespace App\Helpers;


 /**
  * Image Helper
  */
 /**
  *
  */
  use App\Models\User;
  use App\Helpers\GravatarHelper;

 class ImageHelper
 {
  public static function getUserImage($id)
  {
      $user=User::find($id);
      $avatar_url="";
      if (!is_null($user)) {
        if ($user->avatar== NULL) {

            // if no image in database then return email to gravatar Hepler
            $email=$user->email;
            if (GravatarHelper::validate_gravatar($email)) {
              // if Validate Grvatar Found
                $avatar_url=GravatarHelper::gravatar_image($email,100);

            }else {
              // if There is no validate Grvatar image
              $avatar_url=url('images/defaults/user.png');
            }

        }else {
          // Return User database  Saved Image
            $avatar_url=url('images/defaults/Users/'.$user->avatar);

        }
      }else {
        // return redirect('/');
      }
      return $avatar_url;

  }


 }
