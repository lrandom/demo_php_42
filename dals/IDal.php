<?php

interface IDal
{
    function getList($page = 1, $pageSize = 10);

    function get($id); //lấy về một bản ghi dựa theo id

    function add($data); //thêm một bản ghi

    function update($data, $id); //cập nhật mật bản ghi

    function delete($id);

}