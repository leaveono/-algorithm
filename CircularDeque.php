<?php
/**
 * Created by PhpStorm.
 * User: Leaveone
 * Date: 2020/1/13
 * Time: 21:45
 */

class CircularDeque
{
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    private $queue;
    private $front;
    private $rear;
    private static $count;

    function __construct($k) {
        $this->queue = array();
        $this->front = 0;
        $this->rear = 0;
        self::$count = $k+1;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    //头部插入 队列
    function insertFront($value) {
        if($this->isFull()) {
            return false;
        }
        //插入元素的指针 $ths->rear++ 指针 和count 都要递增
        $this->front = ($this->front - 1 + self::$count) % self::$count;
        $this->queue[$this->front] = $value;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    //尾部插入 队列
    function insertLast($value) {
        if($this->isFull()) {
            return false;
        }
        $this->queue[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % self::$count;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    //头部删除 队列
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->front = ($this->front + 1) % self::$count;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    //
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->rear = ($this->rear -1 +self::$count) % self::$count;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if($this->isEmpty()){
            return -1;
        }
        return $this->queue[$this->front];
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if($this->isEmpty()){
            return -1;
        }
        return $this->queue[($this->rear -1 + self::$count) % self::$count];
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {

        return $this->front == $this->rear;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return ($this->rear + 1) % self::$count == $this->front;
    }
}