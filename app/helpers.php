<?php

/*数据库setting表操作*/
if (! function_exists('Setting')) {

    function Setting(){
        return app('App\Model\Setting');
    }
}

if(! function_exists('AppTypes')) {

    function AppTypes(){
        return app('App\Model\Type');
    }
}

if(! function_exists('splitFileName')){
    /**
     * 分割文件名，分别返回文件名和后缀名
     * @param  string $str 加后缀的文件名
     * @return array       分割后的文件名
     */
    function splitFileName($str) {
        $name = explode('.', $str);
        $ext = array_pop($name); // 去除最后一个元素

        // 现在 $name 是不包含后缀名的数组
        $title = [
            'name' => implode('.', $name),
            'ext' => $ext,
        ];
        return $title;
    }
}

if (!function_exists('formatBytes')) {
    /**
     * 将byte转换成可读性强的格式
     * @param  integer  $size      byte格式
     * @param  integer  $precision 小数点后保留几位，默认2位
     * @return string              [description]
     */
    function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int)$size;
            $base = log($size) / log(1024);
            $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
