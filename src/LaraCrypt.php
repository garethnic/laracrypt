<?php

namespace garethnic\laracrypt;

use ParagonIE\Halite\Symmetric\Crypto;
use ParagonIE\Halite\KeyFactory;

class LaraCrypt
{
    /**
     * Generate encryption key and save the file
     *
     */
    public static function generateKey()
    {
        $enc_key = KeyFactory::generateEncryptionKey();

        KeyFactory::save($enc_key, config('laracrypt.path'));
    }

    /**
     * Perform encryption
     *
     * @param $field
     * @return string
     */
    public static function encrypt($field)
    {
        $key = KeyFactory::loadEncryptionKey(config('laracrypt.path'));

        return Crypto::encrypt($field, $key);
    }

    /**
     * Perform decryption
     *
     * @param $text
     * @return mixed
     */
    public static function decrypt($text)
    {
        $key = KeyFactory::loadEncryptionKey(config('laracrypt.path'));

        return Crypto::decrypt($text, $key);
    }
}