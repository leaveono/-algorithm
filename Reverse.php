<?php
/**
 * Created by PhpStorm.
 * User: Leaveone
 * Date: 2020/1/8
 * Time: 21:11
 */

class Reverse
{
   // 时间复杂度O(1)
    //空间复杂度O(n)
    //数组的拼接
    public static function main(&$nums,$k) {
        $len = count($nums);
        if($len < $k) {
            $k= $k % $len;
        }
        $nums = array_merge(array_slice($nums,-$k),array_slice($nums,0,-$k));
    }
}