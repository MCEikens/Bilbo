<?php
/**
 * Created by PhpStorm.
 * User: Kami
 * Date: 17.10.17
 * Time: 12:22
 */

class Settings
{

    /*
     * Function for special settings
     *
     */
    public function getSettings($settingType) {
        $settingsArr = array(
            'HIER KOMMT UNSER TABELLENNAME rein' => 'PERSONTABLE',
            '' => 'BOOKTABLE',
            '50' => 'ITEMSPERPAGE'
        );

        $setting = array_search($settingType, $settingsArr);

        return $setting;
    }
}