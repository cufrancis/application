<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            // 站点标题
            ['name' =>  'website_title', 'value'    =>  'findLink'],
             // 管理员电子邮箱
            ['name' =>  'website_admin_email', 'value'  =>  'cufrancis.com@gmail.com'],
             // 站点地址
            ['name' =>  'website_url', 'value'  =>  'http://localhost'],
            // 网站备案号
            ['name' =>  'website_icp', 'value' => ''],
            // 网站默认模板
            ['name' =>  'website_theme', 'value' => 'default'],
            // 缓存
            ['name' =>  'website_cache_time',   'value' => 1],
            ['name' =>  'website_header', 'value' => ''],
            ['name' =>  'website_footer', 'value' => ''],

            // 网页SEO设置
            // Keywords 内容
            ['name' =>  'keywords',  'value' =>  ''],
            // description
            ['name' =>  'description', 'value' =>   ''],
            // author
            ['name' =>  'author',   'value' =>  'cufrancis.com@gmail.com'],

            // 本地时间与服务器时间差
            ['name' => 'time_diff', 'value' =>  '0'],
            // 时区设置
            ['name' =>  'time_offset', 'value' => '8'],
            // 时间格式
            ['name' =>  'time_format', 'value'  =>  'H:i'],
            // 人性化时间格式
            ['name' => 'time_friendly', 'value' => '1'],

            // 日期格式
            ['name' =>  'date_format', 'value'  =>  'Y-m-d'],

            // 下载文件显示设置
            // 显示下载操作
            ['name' =>  'isShowUse',    'value' =>  0],
            // 显示文件大小
            ['name' =>  'isShowSize',   'value' =>  1],
            // 显示下载量
            ['name' =>  'isShowDownloadNumber', 'value'   =>    1],
            // 显示浏览量
            ['name' =>  'isShowVisitNumber',    'value' =>  1],
            // 显示发布者
            ['name' =>  'isShowAuthor', 'value' =>  1],
            // 显示标签
            ['name' =>  'isShowTag',    'value'    =>  1],
            // 显示所需积分
            ['name' =>  'isShowIntegration',    'value' =>  1],
            // 显示发布时间
            ['name' =>  'isShowDate',   'value' =>  1],

            //上传文件设置
            // 上传文件白名单
            ['name' =>  'fileFilter', 'value'   =>  'zip,png,jpg,jpeg,exe'],

        ]);
    }
}
