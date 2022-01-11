<?php

namespace Bluethink\Faq\Api;


interface FaqInterface
{
    /**
     * GET for Post api
     * @param string $data
     * @return string
     */
    public function getPost($data);

    /**
     * @return string
     */
    public function getData();

     /**
     * @param int $id
     * @return string
     */
    public function getById($id);

    /**
     * GET for Post api
     * @param string $data
     * @return string
     */
    public function getEdit($data);

    /**
     * @param int $id
     * @return bool true on success
     */
    public function getDelete($id);

}