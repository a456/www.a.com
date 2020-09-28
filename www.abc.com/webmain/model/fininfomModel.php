<?php
class fininfomClassModel extends Model
{
	
	public function initModel()
	{
        $this->settable('fininfom');
	}

    /*
     * 查询合同费用
     * num = 合同编号
     */
    public function contractcost($id)
    {
        $rows = $this->db->getall("SELECT SUM(money) as money FROM [Q]fininfom WHERE num='{$id}'");
        return $rows;
    }
}