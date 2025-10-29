<?php

namespace App\Repositories;

use App\Models\OTP;

class verificationCodeRepository extends Repository
{
   public function model()
   {
    return OTP::class;
   }

   public function findOrCreateByContact($contact): OTP
   {
      return  $this->model()::updateOrCreate([
           'phone' => $contact
        ],[
         'otp' => $this->generateUniqueOtp(),
         'token' => $this->generateUniqueToken(),
      ]);
   }

   public function checkCode($contact, $otp)
    {
      return $this->model()::where(['phone' => $contact, 'otp' => $otp])->first();
    }

    public function checkByToken($token)
    {
        return $this->model()::where('token', $token)->first();
    }

   private function generateUniqueOtp(): int
   {
      do {
         $otp = mt_rand(100000, 999999);
     } while ($this->query()->where('otp', $otp)->exists());

     return $otp;
   }

   private function generateUniqueToken()
    {
        do {
            $token = $this->generateToken();
        } while ($this->query()->where('token', $token)->exists());

        return $token;
    }

    private function generateToken()
    {
      return hash_hmac(
         'sha256',
         uniqid(rand(100000000, 100000000000000), true),
         substr(md5(mt_rand()), 500000000, 700000000000)
     );
    }

}